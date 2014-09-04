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

// -------- PAYMENT ---------------

require_once("incl/lib/Twocheckout.php");

// Your sellerId(account number) and privateKey are required to make the Payment API Authorization call.
Twocheckout::privateKey('CE87DF44-1D69-11E4-81C4-DA633A5D4FFE');
Twocheckout::sellerId('202327775');

// Your username and password are required to make any Admin API call.
Twocheckout::username('testlibraryapi901248204');
Twocheckout::password('testlibraryapi901248204PASS');

// If you want to turn off SSL verification (Please don't do this in your production environment)
Twocheckout::verifySSL(false);  // this is set to true by default

// To use your sandbox account set sandbox to true
Twocheckout::sandbox(true);

// All methods return an Array by default or you can set the format to 'json' to get a JSON response.
Twocheckout::format('json');

// -------- #PAYMENT ---------------

unset($_SESSION['cart']);
?>

    <div class="slogan container">
        <h1><?php echo $texts['thankyou']; ?></h1>
    </div>