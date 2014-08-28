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

$from = "From: ".$form["name"]." Phone: ".$form["phone"]." Email: ".$form["email"]." Address: ".$form["address"]." City: ".$form["city"]."<br> Info: ".$form["info"]."<br>";

$topay = $form["delivery"]." To pay: ".$all." + ".$form["delivery"];
}

echo $order;
echo $from;
echo $topay;

?>

