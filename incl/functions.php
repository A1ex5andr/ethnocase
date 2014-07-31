<?php
// ====================FUNCTIONS=====================================
function startSession() {
    if ( session_id() ) return true;
    else return session_start();
}

startSession();

function language($lang){

if ((!isset($_COOKIE['lang'])) || (!is_numeric($_COOKIE['lang'])) || ($_COOKIE['lang']>3) ){
	$lang = langtcook($lang);
	setcookie('lang',$lang,time() + (86400 * 7));
	$_SESSION['lang'] = langfcook($lang);
}

if ((!empty($_COOKIE['lang'])) AND (is_numeric($_COOKIE['lang'])) AND ($_COOKIE['lang']<4)  ){
	$lang =  langfcook($_COOKIE['lang']);
	header('Location: ' . $site."/".$lang);
}


setcookie('first_name',$first_name,time() + (86400 * 7));

	if (($_COOKIE['lang'] == "") OR (!is_numeric($_COOKIE['lang'])) OR ($_COOKIE['lang'] > 3)) {
			$language = '1';
		}else {$language = $_COOKIE['lang'];}
	}

	if (($_COOKIE['lang'] == "") OR ($_COOKIE['lang'] != $language)) {
		setcookie('lang',$language,time() + (86400 * 7));
	}

	if (($_SESSION['lang'] == "") OR ($_SESSION['lang'] != $language)) {
		$_SESSION['lang'] = $language;
	}


	return $language;
}

function langtcook($arg) {

	if ($arg == "rus") {$flag = "2";}
	elseif ($arg == "eng") {$flag = "3";}
	else {$flag = "1";}

	return $flag;
}

function langfcook($arg) {

	if ($arg == "2") {$flag = "rus";}
	elseif ($arg == "3") {$flag = "eng";}
	else {$flag = "ukr";}

	return $flag;
}







function flags($lang) {

	if ($lang == "2") {$flag = "rus";}
	elseif ($lang == "3") {$flag = "eng";}
	else {$flag = "ukr";}

	echo $flag;

}



function flags_url($lang){

$args = "";
global $site;
$i = false;
$http = "http://".$_SERVER['HTTP_HOST'];
$url = rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/');
$url = explode('/',$url);
	foreach ($url as $val)
	{
	    $args[] = urldecode($val);

	    if ($i == false){
	    	if ((($args['0'] != "rus") AND ($args['0'] != "eng")) AND ($lang != "ukr")){
	    		$i = true; echo $site.$lang."/".substr($_SERVER['REQUEST_URI'],1);
	    	}
	    	elseif ((($args['0'] == "rus") OR ($args['0'] == "eng")) AND ($lang != "ukr")){
	    		$i = true; echo $site.$lang."/".substr($_SERVER['REQUEST_URI'],5);
	    	}
	    	elseif ((($args['0'] == "rus") OR ($args['0'] == "eng")) AND ($lang == "ukr")){
	    		$i = true; echo $site.substr($_SERVER['REQUEST_URI'],5);
	    	}
	    	else {
	    		$i = true; echo $site.substr($_SERVER['REQUEST_URI'],1);
	    	}

		}
	   // echo urldecode($val);
	}

}

function common_txt($tb, $txt) {
	global $common;

	$i = false;
	
	foreach($common as $data){
		if ($txt == $data["name"]){
			return $data[$tb];
			$i = true;
		}
	}
	if ($i = false){return "NO_TEXT_ERROR";}
           
}

function news($tb, $q) {

    $database = new medoo();
    $news = $database->select("news", ["link_item", "img", $tb."_title", $tb, "pos"], 
        [
        "ORDER" => "news.dat DESC",
		"LIMIT" => $q
        ]);
    return $news;

}

// function translate($lang) {
// 	$database = new medoo('ethnocase');
//     $words = $database->select("translate", ["id", "lang", "menu", "parent", "orders", $lang], 
//     	[
//     	"ORDER" => "menus.orders ASC"
//     	]);
// }

function is_valid_email($email) 
    {
          $result = true;
          if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
            $result = false;
          }
          return $result;
    }

function mailto($to,$subject,$message,$from,$exit)
    {
    
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= $from."\r\n";

        mail($to, $subject, $message, $headers);
        if ($exit == '1'){exit;}
    
    }
// ==================================================================





?>

