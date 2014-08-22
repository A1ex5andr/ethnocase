<?php

$site = "http://new.ethnocase.com/";
$asite = "http://new.ethnocase.com/lesya-ukrainka/";

// ochistka POST
foreach($_POST as $key => $value) {
	$value = trim($value);
    $value = addslashes(htmlspecialchars($value));
    $form[$key] = $value;
}	

// ochistka GET
foreach($_GET as $key => $value) {
    $value = trim($value);
    $value = addslashes(htmlspecialchars($value));
    $get[$key] = $value;
}

// block obrabotki URL
$args = "";
$loc = "";
$http = "http://".$_SERVER['HTTP_HOST'];
$url = rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/');
$url = explode('/',$url);
	foreach ($url as $val)
	{
	    $args[] = addslashes(htmlspecialchars(urldecode($val)));
	}

if (($args['0'] == "rus") OR ($args['0'] == "eng")){
	$loc[] = $args["1"];
	$loc[] = $args["2"];
	$loc[] = $args["3"];
	$loc[] = $args["4"];
} else {
	$loc[] = $args["0"];
	$loc[] = $args["1"];
	$loc[] = $args["2"];
	$loc[] = $args["3"];

}

	if ($args['0'] == "eng" ) {$lang = "eng";}
	elseif ($args['0'] == "rus") {$lang = 'rus';}
	else {$lang = 'ukr'; }

if (!isset($args['0'])){$lang = 'ukr';}


if ( (isset($_COOKIE["lang"])) && (!isset($_SESSION['lang'])) && (is_numeric($_COOKIE["lang"])) ){
	if ($_COOKIE["lang"] == '1'){ $lang = "rus"; }
	elseif ($_COOKIE["lang"] == '2'){ $lang = "eng"; }
	else { $lang = "ukr"; }
}

?>

