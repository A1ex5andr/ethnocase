<?php

$site = "http://ethnocase.com/";
$link = $site;
$asite = "http://ethnocase.com/lesya-ukrainka/";
$fromemail = "info@ethnocase.com";

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


if ( (($args['0'] != "rus") && ($args['0'] != "eng")) || (!isset($args['0'])) || ($args['0'] == "ukr") ) {$lang = "ukr"; $_SESSION['lang'] = "ukr"; 
}elseif ( $args['0'] == "rus" ) { $lang = "rus"; $_SESSION['lang'] = "rus"; $link = $link.$lang."/";
}elseif ( $args['0'] == "eng" ) { $lang = "eng"; $_SESSION['lang'] = "eng"; $link = $link.$lang."/";
}

	// if ($args['0'] == "eng" ) {$lang = "eng"; }
	// elseif ($args['0'] == "rus") {$lang = 'rus';}
	// else {$lang = 'ukr'; }

if (!isset($args['0'])){$lang = 'ukr';}


// if ( (isset($_COOKIE["lang"])) && (!isset($_SESSION['lang'])) && (is_numeric($_COOKIE["lang"])) && (empty($loc[0])) ){
// echo $_COOKIE["lang"];
// 	if ($_COOKIE["lang"] == '1'){ $lang = "rus"; $_SESSION['lang'] = "rus"; }
// 	elseif ($_COOKIE["lang"] == '2'){ $lang = "eng"; $_SESSION['lang'] = "eng";}
// 	else { $lang = "ukr"; $_SESSION['lang'] = "ukr";}
// }
//echo $_COOKIE["lang"];

if (!empty($_SESSION['cart'])) {
	$inthecart = '<span class="inCart">'.count($_SESSION["cart"]).'</span>';
}else{
	$inthecart = '';
}

if ($_SESSION["valuta"] == "usd") { $cur_symbol = "&#36;"; $pri = "price_eng"; $prio = "price_old_eng";  }
else { $cur_symbol = "&#8372;"; $pri = "price"; $prio = "price_old";}

?>

