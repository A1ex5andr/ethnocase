<?php

require_once("./incl/medoo.min.php");

    $database = new medoo();

    $news = $database->select("menus", ["id", "link_item"]);


foreach ($news as $key) {

$k = '0';
if ($key["link_item"] == "cases") { $k = "1"; }
if ($key["link_item"] == "auto") { $k = "2"; }
if ($key["link_item"] == "18") { $k = "3"; }
if ($key["link_item"] == "25") { $k = "4"; }
if ($key["link_item"] == "35") { $k = "5"; }
if ($key["link_item"] == "apple") { $k = "6"; }
if ($key["link_item"] == "samsung") { $k = "7"; }
if ($key["link_item"] == "lg") { $k = "8"; }
if ($key["link_item"] == "sony") { $k = "9"; }
if ($key["link_item"] == "iphone_5c") { $k = "10"; }
if ($key["link_item"] == "iphone_5") { $k = "11"; }
if ($key["link_item"] == "iphone_4") { $k = "12"; }
if ($key["link_item"] == "iphone_3") { $k = "13"; }
if ($key["link_item"] == "galaxy_s3") { $k = "14"; }
if ($key["link_item"] == "galaxy_s4") { $k = "15"; }
if ($key["link_item"] == "lg_g2") { $k = "16"; }
if ($key["link_item"] == "lg_nex5") { $k = "17"; }
if ($key["link_item"] == "sony_xc1") { $k = "18"; }
if ($key["link_item"] == "sony_z1") { $k = "19"; }


	$id = $key["id"];

	$database = new medoo();

	$database->update("menus", [
		"category" => $k,
	],[
	"id" => $key["id"]
	]);


}




?>