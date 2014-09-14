<?php
require_once("../../incl/medoo.min.php");

		$database = new medoo();

		$fix = $database->select("products", ["id", "link_item", "name_rus", "name_eng", "name_ukr"]);



$files = glob('*'); // get all file names
foreach($files as $file){ // iterate files
	//echo $file."<br>";
  if(is_file($file)){

  		$name = mb_substr($file, 0, -6);


  		foreach ($fix as $value) {

  			if ($value["link_item"] == $name){
  					$database = new medoo();

					$database->insert("images", [
						"parent" => $value["id"],
						"name" => $file,
						"alt_ukr" => strip_tags($value["name_ukr"]),
						"alt_rus" => strip_tags($value["name_rus"]),
						"alt_eng" => strip_tags($value["name_eng"])
					]);

  			}

  		}




  }

print_r(error_get_last());
}

// require_once("./incl/medoo.min.php");

//     $database = new medoo();

//     $news = $database->select("products", ["id", "parent"]);


// foreach ($news as $key) {


// 	if ($key["parent"] == "18") { $k = "3"; }
// 	if ($key["parent"] == "25") { $k = "4"; }
// 	if ($key["parent"] == "35") { $k = "5"; }
// 	if ($key["parent"] == "72") { $k = "11"; }
// 	if ($key["parent"] == "71") { $k = "10"; }
// 	if ($key["parent"] == "73") { $k = "12"; }
// 	if ($key["parent"] == "75") { $k = "14"; }
// 	if ($key["parent"] == "76") { $k = "15"; }
// 	if ($key["parent"] == "80") { $k = "13"; }
// 	if ($key["parent"] == "81") { $k = "16"; }
// 	if ($key["parent"] == "82") { $k = "17"; }
// 	if ($key["parent"] == "83") { $k = "18"; }
// 	if ($key["parent"] == "84") { $k = "19"; }

// 	$id = $key["id"];

// 	$database = new medoo();

// 	$database->update("products", [
// 		"parent" => $k,
// 	],[
// 	"id" => $key["id"]
// 	]);


// }

?>