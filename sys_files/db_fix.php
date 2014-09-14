<?php

require_once("./incl/medoo.min.php");


// 	$database = new medoo();

//     $cases = $database->select("cases", ["id", "active", "parent", "link_item", "img", "name_eng", "name_rus", "name_ukr", "model_eng", "model_rus", "model_ukr", "about_eng", "about_ukr", "about_rus", "price", "price_old", "disc", "stock", "top", "new", "sale", "price_eng", "price_old_eng"] 
// );


// foreach ($cases as $value) {
// echo $value['link_item'];
// 	$database = new medoo();

// 	$last_user_id = $database->insert("products", [
// 		"id" => $value["id"], 
// 		"active" => $value["active"], 
// 		"parent" => $value["parent"], 
// 		"link_item" => "c_".$value["link_item"], 
// 		"img" => "c_".$value["img"], 
// 		"name_eng" => $value["name_eng"], 
// 		"name_rus" => $value["name_rus"], 
// 		"name_ukr" => $value["name_ukr"], 
// 		"model_eng" => $value["model_eng"], 
// 		"model_rus" => $value["model_rus"], 
// 		"model_ukr" => $value["model_ukr"], 
// 		"about_eng" => $value["about_eng"], 
// 		"about_ukr" => $value["about_ukr"], 
// 		"about_rus" => $value["about_rus"], 
// 		"price" => $value["price"], 
// 		"price_old" => $value["price_old"], 
// 		"disc" => $value["disc"], 
// 		"stock" => $value["stock"], 
// 		"top" => $value["top"], 
// 		"new" => $value["new"], 
// 		"sale" => $value["sale"], 
// 		"price_eng" => $value["price_eng"], 
// 		"price_old_eng" => $value["price_old_eng"]

// ]);

// }

	$database = new medoo();

    $cases = $database->select("cars", ["id", "active", "link_item", "catalog", "img", "name_eng", "name_rus", "name_ukr", "model_eng", "model_rus", "model_ukr", "about_eng", "about_ukr", "about_rus", "price", "price_old", "sale", "disc", "stock"] 
);


foreach ($cases as $value) {
echo $value['link_item'];
	$database = new medoo();

	$last_user_id = $database->insert("products", [

		"active" => $value["active"], 
		"parent" => $value["catalog"], 
		"link_item" => "a_".$value["link_item"], 
		"img" => "a_".$value["img"], 
		"name_eng" => $value["name_eng"], 
		"name_rus" => $value["name_rus"], 
		"name_ukr" => $value["name_ukr"], 
		"model_eng" => $value["model_eng"], 
		"model_rus" => $value["model_rus"], 
		"model_ukr" => $value["model_ukr"], 
		"about_eng" => $value["about_eng"], 
		"about_ukr" => $value["about_ukr"], 
		"about_rus" => $value["about_rus"], 
		"price" => $value["price"], 
		"price_old" => $value["price_old"], 
		"disc" => $value["disc"], 
		"stock" => $value["stock"], 
		"top" => "0", 
		"new" => "0", 
		"sale" => $value["sale"], 
		"price_eng" => "40", 
		"price_old_eng" => "0"

]);
// echo $database->last_query();   
// var_dump($database->error());
// exit;
}



?>