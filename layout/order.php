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

$order = $order.$case['0'][$name]." ".$case['0'][$model]." ".$case['0']["link_item"]." ".$q." ".$case['0']['price']." = ".$q*$case['0']['price']."<br>";
$all = $q*$case['0']['price'] + $all;
}
$foreign = "";
if ($form["delivery"] == "02") { $foreign = " Country: ".$form["country"]." Zip: ".$form["zip"]." State: ".$form["state"]; }

$from = "From: ".$form["name"]." Phone: ".$form["phone"]." Email: ".$form["email"]." Address: ".$form["address"]." City: ".$form["city"]." ".$foreign."<br> Info: ".$form["info"]."<br>";

$topay = $form["delivery"]." To pay: ".$all." + ".$form["delivery"];
}

$message = $order."\n".$from."\n".$topay;

$database = new medoo();
 
$last_user_id = $database->insert("orders", [
    "order" => $order,
    "price" => $all,
    "currency" => "",
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

 echo $database->last_query();   
 var_dump($database->error());


//mailto($to,$subject,$message,$fromemail,$exit)
//mailto($to,$subject,$message,$fromemail,$exit)


?>

    <div class="slogan container">
        <h1><?php echo $texts['thankyou']; ?></h1>
    </div>