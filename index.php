<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_PARSE);
if ( !defined('MITH') )
    define('MITH', 'zeusz');

session_start();

require_once("./incl/common.php");
require_once("./incl/medoo.min.php");
require_once("./incl/functions.php"); 

if ((empty($_SESSION['lang'])) || ($_SESSION['lang'] != $lang))
	{
		$lang = language($lang);
	}

$texts = common_txt($lang);

if (empty($_SESSION["valuta"])) { $_SESSION["valuta"] = "uah"; }
if (($lang == "eng") || ($lang == "rus")) {$langl = $lang."/";}else{$langl = "";}
if( ($loc[0] == "usd") || ($loc[0] == "uah") ) { $_SESSION['valuta'] = $loc[0]; header('Location: '.$site.$langl); exit; }
if( ($loc[1] == "usd") || ($loc[1] == "uah") ) { $_SESSION['valuta'] = $loc[1]; header('Location: '.$site.$langl.$loc[0].'/'); exit; }
if( ($loc[2] == "usd") || ($loc[2] == "uah") ) { $_SESSION['valuta'] = $loc[2]; header('Location: '.$site.$langl.$loc[0].'/'.$loc[1].'/'); exit; }
if( ($loc[3] == "usd") || ($loc[3] == "uah") ) { $_SESSION['valuta'] = $loc[3]; header('Location: '.$site.$langl.$loc[0].'/'.$loc[1].'/'.$loc[2].'/'); exit; }
if( ($loc[4] == "usd") || ($loc[4] == "uah") ) { $_SESSION['valuta'] = $loc[4]; header('Location: '.$site.$langl.$loc[0].'/'.$loc[1].'/'.$loc[2].'/'.$loc[3].'/'); exit; }

// ----------- ADMIN BLOCK --------
if ($loc["0"] == "lesya-ukrainka"){

	require_once("admin/layout/main.php");
	require_once("admin/layout/footer.php");
exit;
}
// ----------- #ADMIN BLOCK -------

if ( ($loc["0"] == "cart") && (!empty($loc["1"])) ) {

	require_once("layout/cartdo.php");

}elseif ($loc["0"] == "order"){

	require_once("layout/order.php");
	exit;

}elseif ($loc["0"] == "thankyou"){

	require_once("layout/thankyou.php");
	exit;

}elseif ($loc["0"] == "contact"){

	require_once("layout/contactsend.php");
	exit;

}

require_once("layout/head.php");
require_once("layout/header.php");

if ($loc["0"] == "news"){

		if (!empty($loc["1"])) { require_once("layout/news_one.php"); }
		else{ require_once("layout/news.php"); }
		require_once("layout/m_bestseller.php");
		require_once("layout/m_sale.php");
		require_once("layout/contacts.php");

}elseif ($loc["0"] == "auto"){

		if (!empty($loc["2"])) { require_once("layout/item.php"); }
		else{ require_once("layout/subcategory.php"); }
		//require_once("layout/contacts.php");

}elseif ($loc["0"] == "cases"){

		if (!empty($loc["2"])) { require_once("layout/item.php"); }
		elseif (!empty($loc["1"])) { require_once("layout/subcategory.php"); }
		else { require_once("layout/category.php"); }
		//require_once("layout/contacts.php");

}elseif ($loc["0"] == "cart"){

		require_once("layout/cart.php");
		//require_once("layout/contacts.php");

}elseif ($loc["0"] == "404"){

	require_once("layout/404.php");
	exit;

}elseif(empty($loc["0"])){
    
	    echo '<div class="slogan container">
	        <h1>'.$texts['sloganSmall'].'</h1>
	    </div>';
		require_once("layout/m_slider.php");
		require_once("layout/m_news.php");
		require_once("layout/m_new.php");
		require_once("layout/m_bestseller.php");
		require_once("layout/m_sale.php");
		require_once("layout/contacts.php");

}else{
	
	require_once("layout/pages.php");
	require_once("layout/contacts.php");

}


require_once("layout/footer.php");

?>
