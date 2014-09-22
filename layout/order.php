<?php if ( !defined('MITH') ) {exit;} ?>


<?php
if (!empty($_SESSION['cart'])) {

$order = "";
$all = '0';
$usd = '0';

foreach ($_SESSION['cart'] as $value) {

    list ($id, $q) = split(":", $value);

    $case = product($lang, "id", $id, "1");

    $name = "name_".$lang;
    $model = "model_".$lang;

$order = $order.$case['0'][$name]." ".$case['0'][$model]." ".$case['0']["link_item"]." ".$q." ".$case['0'][$pri]." = ".$q*$case['0'][$pri]."<br>";
$all = $q*$case['0'][$pri] + $all;
$usd = $q*$case['0']['price_eng'] + $usd;
}
$foreign = "";
if ($form["delivery"] == "02") { $foreign = " Country: ".$form["country"]." Zip: ".$form["zip"]." State: ".$form["state"]; }

$from = "From: ".$form["name"]." Phone: ".$form["phone"]." Email: ".$form["email"]." Address: ".$form["address"]." City: ".$form["city"]." ".$foreign."<br> Info: ".$form["info"]."<br>";

$topay = $form["delivery"]." To pay: ".$all." + ".$form["delivery"];

}else{

    header('Location: '.$link.'cart/');
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


mailto($to,$subject,$message,$fromemail,"0");
mailto($toc,$subjectc,$message,$fromemail,"0");

if ($form["delivery"] == '3'){

require ("./layout/head.php");

echo'

    <div class="container prePay">

        <header class="container">
            <div class="headLogo">
                    <img src="http://new.ethnocase.com/img/logo.jpg" alt="" class="logo">
            </div>
	        <hr>
	    </header>


        <div><span class="prePay-title">Your Order </span><span class="prePay-data orderInput"><input name="li_0_name" value="invoice'.$last_user_id.'" disabled/></span></div>
        <div><span class="prePay-title">Amount To Be Paid </span><span class="prePay-data orderInput"><input name="li_0_price" value="'.$usd.'&#36;" disabled/></span></div>
        <div><span class="prePay-title">Delivery Type </span><span class="prePay-data orderInput"><input name="li_1_name" value="World wide" disabled/></span></div>
        <div><span class="prePay-title">Delivery Cost </span><span class="prePay-data orderInput"><input name="li_1_price" value="17" disabled/></span></div>
        <div><span class="prePay-title">Name </span><span class="prePay-data orderInput"><input name="card_holder_name" value="'.$form["name"].'" disabled/></span></div>
        <div><span class="prePay-title">Address </span><span class="prePay-data orderInput"><input name="street_address" value="'.$form["address"].'" disabled/></span></div>
        <div><span class="prePay-title">Address #2  </span><span class="prePay-data orderInput"><input name="street_address2" value="'.$form["address2"].'" disabled/></span></div>
        <div><span class="prePay-title">City </span><span class="prePay-data orderInput"><input name="city" value="'.$form["city"].'" disabled/></span></div>
        <div><span class="prePay-title">State </span><span class="prePay-data orderInput"><input name="state" value="'.$form["state"].'" disabled/></span></div>
        <div><span class="prePay-title">ZIP </span><span class="prePay-data orderInput"><input name="zip" value="'.$form["zip"].'" disabled/></span></div>
        <div><span class="prePay-title">Country </span><span class="prePay-data orderInput"><input name="country" value="'.$form["country"].'" disabled/></span></div>
        <div><span class="prePay-title">E-mail </span><span class="prePay-data orderInput"><input name="email" value="'.$form["email"].'" disabled/></span></div>
        <div><span class="prePay-title">Phone </span><span class="prePay-data orderInput"><input name="phone" value="'.$form["phone"].'" disabled/></span></div>




        <form action="https://sandbox.2checkout.com/checkout/purchase" method="post">
        <input type="hidden" name="sid" value="901254072" />
        <input type="hidden" name="mode" value="2CO" />
        <input type="hidden" name="li_0_type" value="product" />
        <input type="hidden" name="li_0_name" value="invoice'.$last_user_id.'" />
        <input type="hidden" name="li_0_price" value="'.$usd.'" />
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


header('Location: '.$link.'thankyou/');
exit;

?>
