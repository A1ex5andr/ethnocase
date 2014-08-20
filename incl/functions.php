<?php
// ====================FUNCTIONS=====================================
// function startSession() {
//     if ( session_id() ) return true;
//     else return session_start();
// }

// startSession();

function language($lang){

if ((!isset($_COOKIE['lang'])) || (!is_numeric($_COOKIE['lang'])) || ($_COOKIE['lang']>3) || (empty($_SESSION['lang'])) || ($_SESSION['lang'] != $lang) )
	{
		$lang = langtcook($lang);
		setcookie('lang',$lang,time() + (86400 * 7));
		$_SESSION['lang'] = langfcook($lang);
		$lang = langfcook($lang);
	}

	return $lang;
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

function menu($lang, $menu)
{
	$database = new medoo();
    $menus = $database->select("menus", ["id", "link_item", "menu", "img", "parent", "orders", $lang, "class", "alt" ], 
        [
        "AND" => [
        	"active" => "1",
        	"menu" => $menu
        	],
        "ORDER" => ["orders ASC", "id ASC"]
        ]);
// echo $database->last_query();   
// var_dump($database->error());
    return $menus;
}

function news($lang, $lim_from, $lim_step)
{
	$database = new medoo();
	$txt = $lang."_txt";
    $news = $database->select("news", ["id", "link_item", "img", $lang, $txt, "top", "pos", "active"], 
        [
        "active" => "1",
        "ORDER" => ["top DESC", "id DESC", "pos ASC"],
        "LIMIT" => [$lim_from, $lim_step]
        ]);

    return $news;
}

function news_one($lang, $link_item)
{
    $database = new medoo();
    $txt = $lang."_txt";
    $news = $database->select("news", ["link_item", "img", $lang, $txt,], 
        [
        "AND" => [
        "active" => "1",
        "link_item" => $link_item
        ]
        ]);

    return $news;
}

function common_txt($lang)
{
	$max = array("no_text" => "ERROR");
	$database = new medoo();
    $sel = $database->select("texts", ["link_item", $lang]);
		foreach($sel as $data)
			{
				$mix = $data["link_item"];
				array_push($max[$mix] = $data[$lang]);
				
			}

    return $max;
}

function cases($lang, $sel)
{
	$database = new medoo();

	$name = "name_".$lang;
	$model = "model_".$lang;
	$about = "about_".$lang;

    $cases = $database->select("cases", ["link_item", "img", $name, $model, $about, "price", "price_old", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
        	"active" => "1",
        	$sel => "1"
        	],
        "ORDER" => ["id DESC"],
        "LIMIT" => ["3"]
        ]);

    return $cases;
}

function cases_model($lang, $parent)
{
	$database = new medoo();

	$name = "name_".$lang;
	$model = "model_".$lang;
	$about = "about_".$lang;

    $cases = $database->select("cases", ["parent", "link_item", "img", $name, $model, $about, "price", "price_old", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
        	"active" => "1",
        	"parent" => $parent
        	],
        "ORDER" => ["id DESC"]
        ]);

    return $cases;
}

function cases_details($lang, $id)
{
	$database = new medoo();

	$name = "name_".$lang;
	$model = "model_".$lang;
	$about = "about_".$lang;

    $cases = $database->select("cases", ["id", "link_item", "img", $name, $model, $about, "price", "price_old", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
        	"active" => "1",
        	"link_item" => $id
        	]
        ]);

    return $cases;
}

function cars($lang)
{
	$database = new medoo();

	$name = "name_".$lang;
	$model = "model_".$lang;
	$about = "about_".$lang;

    $cars = $database->select("cars", ["link_item", "catalog", "img", $name, $model, $about, "price", "price_old", "disc", "stock", "sale"], 
        [
        "AND" => [
        	"active" => "1"
        	],
        "ORDER" => ["id DESC"],
        "LIMIT" => ["3"]
        ]);

    return $cars;
}

function cars_details($lang, $id)
{
    $database = new medoo();

    $name = "name_".$lang;
    $model = "model_".$lang;
    $about = "about_".$lang;

    $cars = $database->select("cars", ["link_item", "catalog", "img", $name, $model, $about, "price", "price_old", "disc", "stock", "sale"], 
        [
        "AND" => [
            "active" => "1",
            "link_item" => $id
            ]
        ]);

    return $cars;
}

function pages($lang, $page)
{
	$database = new medoo();
    $pages = $database->select("pages", ["id", "link_item", $lang], 
        [
        "AND" => [
        	"active" => "1",
        	"link_item" => $page
        	]
        ]);
    return $pages;
}

function images($parent, $type) {

    $database = new medoo();
    $images = $database->select("images", ["id", "name", "alt"], 
        [
        "AND" => [
            "active" => "1",
            "parent" => $parent,
            "type" => $type
            ]
        ]);
    return $images;
    
}

function check_link($tocheck) {
    
    if (empty($tocheck)) {
        require_once("layout/404.php");
        exit;
    }

}






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

// ADMIN

function users($email)
{
    $database = new medoo();
    $users = $database->select("users", ["id", "user", "email", "password"], 
        [
        "AND" => [
            "active" => "1",
            "email" => $email
            ]
        ]);
    return $users;
}

function adm_news($lang, $lim_from, $lim_step)
{
    $database = new medoo();
    $txt = $lang."_txt";
    $news = $database->select("news", ["id", "link_item", "img", $lang, $txt, "top", "pos", "active"], 
        [
        "ORDER" => ["top DESC", "id DESC", "pos ASC"],
        "LIMIT" => [$lim_from, $lim_step]
        ]);

    return $news;
}

function adm_news_one($lang, $id)
{
    $database = new medoo();
    $txt = $lang."_txt";
    $news = $database->select("news", ["id", "link_item", "img", "eng", "eng_txt", "rus", "rus_txt", "ukr", "ukr_txt", "top", "active"], 
        [
        "AND" => [
        "id" => $id
        ]
        ]);

    return $news;
}

function adm_cars()
{
    $database = new medoo();

    $cars = $database->select("cars", ["id", "active", "link_item", "catalog", "img", "name_eng", "name_rus", "name_ukr", "model_eng", "model_rus", "model_ukr", "about_eng", "about_rus", "about_ukr", "price", "price_old", "disc", "stock", "sale"], 
        [
        "ORDER" => ["id DESC"],
        "LIMIT" => ["100"]
        ]);

    return $cars;
}

function adm_cars_one($id)
{
    $database = new medoo();

    $cars = $database->select("cars", ["id", "active", "link_item", "catalog", "img", "name_eng", "name_rus", "name_ukr", "model_eng", "model_rus", "model_ukr", "about_eng", "about_rus", "about_ukr", "price", "price_old", "disc", "stock", "sale"], 
        [
        "AND" => [
            "id" => $id
            ]
        ]);

    return $cars;
}


function adm_cases($lang, $sel)
{
    $database = new medoo();

    $cases = $database->select("cases", ["id", "active", "parent", "link_item", "img", "name_eng", "name_rus", "name_ukr", "model_eng", "model_rus", "model_ukr", "about_eng", "about_ukr", "about_rus", "price", "price_old", "disc", "stock", "top", "new", "sale"], 
        [
        "ORDER" => ["id DESC"],
        "LIMIT" => ["100"]
        ]);

    return $cases;
}

function adm_cases_one($id)
{
    $database = new medoo();

    $cases = $database->select("cases", ["id", "active", "parent", "link_item", "img", "name_eng", "name_rus", "name_ukr", "model_eng", "model_rus", "model_ukr", "about_eng", "about_ukr", "about_rus", "price", "price_old", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
            "id" => $id
            ]
        ]);

    return $cases;
}

function adm_images($parent, $name) {

    $database = new medoo();
    $pages = $database->select("images", ["id", "parent", "name", "type", "alt", "parent"], 
        [
        "AND" => [
            "active" => "1",
            "link_item" => $page
            ]
        ]);
    return $pages;
    
}
?>

