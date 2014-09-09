<?php if ( !defined('MITH') ) {exit;} ?>


<?php
if (!empty($_SESSION['cart'])) {

$order = "";
$all = '0';

foreach ($_SESSION['cart'] as $value) {

    list ($id, $q) = split(":", $value);

    $case = cases_one($lang, $id);

    $name = "name_".$lang;
    $model = "model_".$lang;

$order = $order.$case['0'][$name]." ".$case['0'][$model]." ".$case['0']["link_item"]." ".$q." ".$case['0'][$pri]." = ".$q*$case['0'][$pri]."<br>";
$all = $q*$case['0'][$pri] + $all;
}
$foreign = "";
if ($form["delivery"] == "02") { $foreign = " Country: ".$form["country"]." Zip: ".$form["zip"]." State: ".$form["state"]; }

$from = "From: ".$form["name"]." Phone: ".$form["phone"]." Email: ".$form["email"]." Address: ".$form["address"]." City: ".$form["city"]." ".$foreign."<br> Info: ".$form["info"]."<br>";

$topay = $form["delivery"]." To pay: ".$all." + ".$form["delivery"];

}else{

    header('Location: '.$site.'cart');
    exit;

}

$message = $order."\n".$from."\n".$topay;

$database = new medoo();

$last_user_id = $database->insert("orders", [
    "order" => $order,
    "price" => $all,
    "currency" => $_SESSION['valuta'],
    "delivery" => $form["delivery"],
    "name" => $form["name"],
    "phone" => $form["phone"],
    "email" => $form["email"],
    "address" => $form["address"],
    "address2" => $form["address2"],
    "city" => $form["city"],
    "country" => $form["country"],
    "zip" => $form["zip"],
    "state" => $form["state"],
    "info" => $form["info"],
    "payment_state" => "0",
    "delivery_state" => "0"
]);

 // echo $database->last_query();
 // var_dump($database->error());

$subject = "Новый заказ";
$subjectc = "Ваш заказ в обработке";
$to = "abutyuhin@hotmail.com";
$toc = $form["email"];
$fromemail = "abutyuhin@hotmail.com";


//mailto($to,$subject,$message,$fromemail,"0");
//mailto($toc,$subjectc,$message,$fromemail,"0");

if ($form["delivery"] == '3'){

// require_once("./incl/lib/Twocheckout.php");
// Twocheckout::privateKey('F1D4F959-1A1A-49F0-9DCC-2BEA924203CC');
// Twocheckout::sellerId('901254072');
//  Twocheckout::sandbox(true);  #Uncomment to use Sandbox

// try {
//     $charge = Twocheckout_Charge::auth(array(
//         "merchantOrderId" => 'invoice'.$last_user_id,
//         "token" => 'Y2U2OTdlZjMtOGQzMi00MDdkLWJjNGQtMGJhN2IyOTdlN2Ni',
//         "currency" => 'USD',
//         "total" => $all,
//         "billingAddr" => array(
//             "name" => $form["name"],
//             "addrLine1" => $form["address"],
//             "city" => $form["city"],
//             "state" => $form["state"],
//             "zipCode" => $form["zip"],
//             "country" => $form["country"],
//             "email" => 'testingtester@2co.com',
//             "phoneNumber" => '555-555-5555'
//         ),
//         "shippingAddr" => array(
//             "name" => $form["name"],
//             "addrLine1" => $form["address"],
//             "city" => $form["city"],
//             "state" => $form["state"],
//             "zipCode" => $form["zip"],
//             "country" => $form["country"],
//             "email" => $form["email"],
//             "phoneNumber" => $form["phone"]
//         )
//     ), 'array');
//     if ($charge['response']['responseCode'] == 'APPROVED') {
//         echo "Thanks for your Order!";
//     }
// } catch (Twocheckout_Error $e) {
//     $e->getMessage();
// }

require ("./layout/head.php");

echo'

    <header class="container">
		<div class="headLogo">

				<img src="http://new.ethnocase.com/img/logo.jpg" alt="" class="logo">

		</div>

	</header>

    <div class="container prePay">



        <div><span class="prePay-title">Ваш заказ номер</span><span class="prePay-data orderInput"><input name="li_0_name" value="invoice'.$last_user_id.'" disabled/></span></div>
        <div><span class="prePay-title">Всего (сумма)</span><span class="prePay-data orderInput"><input name="li_0_price" value="'.$all.'" disabled/></span></div>
        <div><span class="prePay-title">Доставка службой</span><span class="prePay-data orderInput"><input name="li_1_name" value="World wide" disabled/></span></div>
        <div><span class="prePay-title">цена доставки </span><span class="prePay-data orderInput"><input name="li_1_price" value="17" disabled/></span></div>
        <div><span class="prePay-title">имя </span><span class="prePay-data orderInput"><input name="card_holder_name" value="'.$form["name"].'" disabled/></span></div>
        <div><span class="prePay-title">адресс </span><span class="prePay-data orderInput"><input name="street_address" value="'.$form["address"].'" disabled/></span></div>
        <div><span class="prePay-title">адресс2 </span><span class="prePay-data orderInput"><input name="street_address2" value="'.$form["address2"].'" disabled/></span></div>
        <div><span class="prePay-title">город </span><span class="prePay-data orderInput"><input name="city" value="'.$form["city"].'" disabled/></span></div>
        <div><span class="prePay-title">штат </span><span class="prePay-data orderInput"><input name="state" value="'.$form["state"].'" disabled/></span></div>
        <div><span class="prePay-title">индекс </span><span class="prePay-data orderInput"><input name="zip" value="'.$form["zip"].'" disabled/></span></div>
        <div><span class="prePay-title">страна </span><span class="prePay-data orderInput"><input name="country" value="'.$form["country"].'" disabled/></span></div>
        <div><span class="prePay-title">емейл </span><span class="prePay-data orderInput"><input name="email" value="'.$form["email"].'" disabled/></span></div>
        <div><span class="prePay-title">телефон </span><span class="prePay-data orderInput"><input name="phone" value="'.$form["phone"].'" disabled/></span></div>




        <form action="https://sandbox.2checkout.com/checkout/purchase" method="post">
        <input type="hidden" name="sid" value="901254072" />
        <input type="hidden" name="mode" value="2CO" />
        <input type="hidden" name="li_0_type" value="product" />
        <input type="hidden" name="li_0_name" value="invoice'.$last_user_id.'" />
        <input type="hidden" name="li_0_price" value="'.$all.'" />
        <input type="hidden" name="li_0_tangible" value="Y" />
        <input type="hidden" name="li_1_type" value="shipping" />
        <input type="hidden" name="li_1_name" value="World wide" />
        <input type="hidden" name="li_1_price" value="17" />
        <input type="hidden" name="card_holder_name" value="'.$form["name"].'" />
        <input type="hidden" name="street_address" value="'.$form["address"].'" />
        <input type="hidden" name="street_address2" value="'.$form["address2"].'" />
        <input type="hidden" name="city" value="'.$form["city"].'" />
        <input type="hidden" name="state" value="'.$form["state"].'" />
        <input type="hidden" name="zip" value="'.$form["zip"].'" />
        <input type="hidden" name="country" value="'.$form["country"].'" />
        <input type="hidden" name="ship_name" value="'.$form["name"].'" />
        <input type="hidden" name="ship_street_address" value="'.$form["address"].'" />
        <input type="hidden" name="ship_street_address2" value="'.$form["address2"].'" />
        <input type="hidden" name="ship_city" value="'.$form["city"].'" />
        <input type="hidden" name="ship_state" value="'.$form["state"].'" />
        <input type="hidden" name="ship_zip" value="'.$form["zip"].'" />
        <input type="hidden" name="ship_country" value="'.$form["country"].'" />
        <input type="hidden" name="email" value="'.$form["email"].'" />
        <input type="hidden" name="phone" value="'.$form["phone"].'" />
        <input type="hidden" name="x_receipt_link_url" value="http://new.ethnocase.com/thankyou/'.$last_user_id.'">
        <div class="sendOrder">
            <button class="btn btn-sendOrder" name="submit" type="submit">Checkout</button>
        </div>
        </form>
    </div>


    <script src="https://sandbox.2checkout.com/static/checkout/javascript/direct.min.js"></script>
    </body>
</html>';
exit;
}


unset($_SESSION['cart']);

require_once("layout/head.php");
require_once("layout/header.php");

?>

    <div class="slogan container">
        <h1><?php echo $texts['thankyou']; ?></h1>
    </div>

<?php require_once("layout/contacts.php"); ?>