<?php

require_once("./incl/medoo.min.php");

    $database = new medoo();

    $news = $database->select("products", ["id", "parent"]);


foreach ($news as $key) {


	if ($key["parent"] == "18") { $k = "3"; }
	if ($key["parent"] == "25") { $k = "4"; }
	if ($key["parent"] == "35") { $k = "5"; }
	if ($key["parent"] == "72") { $k = "11"; }
	if ($key["parent"] == "71") { $k = "10"; }
	if ($key["parent"] == "73") { $k = "12"; }
	if ($key["parent"] == "75") { $k = "14"; }
	if ($key["parent"] == "76") { $k = "15"; }
	if ($key["parent"] == "80") { $k = "13"; }
	if ($key["parent"] == "81") { $k = "16"; }
	if ($key["parent"] == "82") { $k = "17"; }
	if ($key["parent"] == "83") { $k = "18"; }
	if ($key["parent"] == "84") { $k = "19"; }

	$id = $key["id"];

	$database = new medoo();

	$database->update("products", [
		"parent" => $k,
	],[
	"id" => $key["id"]
	]);


}




?>