<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_PARSE);
if ( !defined('MITH') )
    define('MITH', 'zeusz');

require_once("./incl/common.php");
require_once("./incl/medoo.min.php");
require_once("./incl/functions.php"); 

if ((empty($_SESSION['lang'])) || ($_SESSION['lang'] != $lang))
	{
		$lang = language($lang);
	}

$texts = common_txt($lang);

require_once("layout/head.php");
require_once("layout/header.php");

if ($loc["0"] == "news"){

		require_once("layout/newsDetailed.php");
		require_once("layout/bestseller.php");
		require_once("layout/onsale.php");
		require_once("layout/contacts.php");

}elseif ($loc["0"] == "auto"){

		require_once("layout/cars.php");
		require_once("layout/contacts.php");

}elseif ($loc["0"] == "products"){

		if (!empty($loc["2"])) { require_once("layout/cases_details.php"); }
		elseif (!empty($loc["1"])) { require_once("layout/cases_model.php"); }
		else { require_once("layout/cases.php"); }
		require_once("layout/contacts.php");

}elseif ($loc["0"] == "404"){

	require_once("layout/404.php");

}elseif(empty($loc["0"])){
    
	    echo '<div class="slogan container">
	        <h1>'.$texts['sloganSmall'].'</h1>
	    </div>';
		require_once("layout/slider.php");
		require_once("layout/indexNews.php");
		require_once("layout/newest.php");
		require_once("layout/bestseller.php");
		require_once("layout/onsale.php");
		require_once("layout/contacts.php");

}else{
	
	require_once("layout/pages.php");
	require_once("layout/contacts.php");

}


require_once("layout/footer.php");

exit;
?>
