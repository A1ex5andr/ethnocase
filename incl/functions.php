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
		setcookie("lang", "", time()-3600);
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
    $menus = $database->select("menus", ["id", "link_item", "menu", "img", "parent", "category", "orders", $lang, "class", "alt" ], 
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

function menu_one($lang, $menu, $limit)
{
    $database = new medoo();
    $menus = $database->select("menus", ["id", "link_item", "menu", "img", "parent", "orders", $lang, "class", "alt" ], 
        [
        "AND" => [
            "active" => "1",
            "link_item" => $menu
            ],
        "LIMIT" => "1"
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

function minmenu ($parent) {
    $database = new medoo();
    $minmenu = "";
    $min = $database->select("menus", "id", [
        "parent" => $database->select("menus", "id", ["link_item" => $parent])
    ]);
// echo $database->last_query();   
// var_dump($database->error());
    foreach ($min as $value) {
        $minmenu .= $value.",";
    }
    $minmenu = mb_substr($minmenu, 0, -1);
    return $minmenu;
}

function product($lang, $type, $typev, $limit)
{
    $name = "name_".$lang;
    $model = "model_".$lang;
    $about = "about_".$lang;

    $database = new medoo();
    $product = $database->select("products", ["id", "parent", "link_item", "img", $name, $model, $about, "price", "price_old", "price_eng", "price_old_eng", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
            "active" => "1",
            $type => $typev
            ],
        "ORDER" => ["id DESC"],
        "LIMIT" => $limit
        ]);

    return $product;
}


function products($lang, $type, $typev, $limit, $parent)
{
    $val = category($parent);
    if (($type == "new") || ($type == "top") || ($type == "sale")) { $types = "1"; } else { $type = "new"; $types = explode(", ", "1, 0"); }
    if (($type == "parent") || ($type == "link_item") || ($type == "id")) { $types = $typev; }
     $name = "name_".$lang;
     $model = "model_".$lang;
     $about = "about_".$lang;

     if (count(explode(", ", $val)) >1) { $mm = explode(", ", $val); }
     else { $mm = $val; }
    
    $database = new medoo();
    $products = $database->select("products", ["id", "parent", "link_item", "img", $name, $model, $about, "price", "price_old", "price_eng", "price_old_eng", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
            "active" => "1",
            $type => $types,
            "parent" => $mm
            ],
        "ORDER" => ["id DESC"],
        "LIMIT" => $limit
        ]);
// echo $database->last_query();   
// var_dump($database->error());
// $products = $database->query("SELECT id, parent, link_item, img, $name, $model, $about, price, price_old, price_eng, price_old_eng, disc, stock, top, new, sale FROM products WHERE active = 1 AND $type = $types AND parent IN ($val) ORDER BY id DESC LIMIT $limit")->fetchAll();    

    return $products;
}

function category($menu)
{
    $list = "";
    $database = new medoo();
    $category = $database->select("category", ["id", "parent", "name"], 
        [
        "active" => "1",
        "ORDER" => ["id ASC"]
        ]);

if ($menu == '0') {$name = "parent"; } else {$name = "name"; }


    foreach ($category as $key) {
        if ($key[$name] == $menu) { 
            $list .= $key["id"].", ";
            $x = $key["id"];
            foreach ($category as $key2) {
                if ($key2["parent"] == $x) {
                    $list .= $key2["id"].", ";
                    $y = $key2["id"];
                        foreach ($category as $key3) {
                            if ($key3["parent"] == $y) {
                                $list .= $key3["id"].", ";
                            }
                        }
                }
            }
        }
    }
    $list = mb_substr($list, 0, -2);

    return $list;
}

// function cases($lang, $sel)
// {
// 	$database = new medoo();

// 	$name = "name_".$lang;
// 	$model = "model_".$lang;
// 	$about = "about_".$lang;

//     $cases = $database->select("cases", ["id", "parent", "link_item", "img", $name, $model, $about, "price", "price_old", "price_eng", "price_old_eng", "disc", "stock", "top", "new", "sale"], 
//         [
//         "AND" => [
//         	"active" => "1",
//         	$sel => "1"
//         	],
//         "ORDER" => ["id DESC"],
//         "LIMIT" => ["3"]
//         ]);

//     return $cases;
// }

function cases_model($lang, $parent)
{
	$database = new medoo();

	$name = "name_".$lang;
	$model = "model_".$lang;
	$about = "about_".$lang;

    $cases = $database->select("cases", ["id", "parent", "link_item", "img", $name, $model, $about, "price", "price_old", "price_eng", "price_old_eng", "disc", "stock", "top", "new", "sale"], 
        [
        "AND" => [
        	"active" => "1",
        	"parent" => $parent
        	],
        "ORDER" => ["id DESC"]
        ]);

    return $cases;
}

// function cases_details($lang, $id)
// {
// 	$database = new medoo();

// 	$name = "name_".$lang;
// 	$model = "model_".$lang;
// 	$about = "about_".$lang;

//     $cases = $database->select("cases", ["id", "parent", "link_item", "img", $name, $model, $about, "price", "price_old", "price_eng", "price_old_eng", "disc", "stock", "top", "new", "sale"], 
//         [
//         "AND" => [
//         	"active" => "1",
//         	"link_item" => $id
//         	]
//         ]);

//     return $cases;
// }

// function cases_one($lang, $id)
// {
//     $database = new medoo();

//     $name = "name_".$lang;
//     $model = "model_".$lang;
//     $about = "about_".$lang;

//     $cases = $database->select("cases", ["id", "parent", "link_item", "img", $name, $model, $about, "price", "price_old", "price_eng", "price_old_eng", "disc", "stock", "top", "new", "sale"], 
//         [
//         "AND" => [
//             "active" => "1",
//             "id" => $id
//             ]
//         ]);

//     return $cases;
// }

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

function images($lang, $parent) {
    $alt = "alt_".$lang;

    $database = new medoo();
    $images = $database->select("images", ["id", "name", $alt], 
        [
        "AND" => [
            "active" => "1",
            "parent" => $parent
            ],
        "ORDER" => ["name ASC"]
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

function adm_images() {

    $database = new medoo();
    $pages = $database->select("images", ["id", "parent", "name", "type", "alt", "active"], 
        [
        "ORDER" => ["parent DESC", "type ASC"]
        ]);
    return $pages;
    
}
?>

