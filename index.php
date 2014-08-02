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

if (($args["0"] == "news") OR ($args["1"] == "news")){

}else{
    
    include("layout/main.php");

}


require_once("layout/footer.php");

exit;
?>


<?php require_once("layout/head.php"); ?>
<?php require_once("layout/header.php"); ?>
	<div class="slogan container">
        <h1>We combine authenticity &amp; modern technologies!</h1>
    </div>
<?php require_once("layout/slider.php"); ?>
<?php require_once("layout/indexNews.php"); ?>
<?php require_once("layout/indexCatalog.php"); ?>
<?php require_once("layout/contacts.php"); ?>
<?php require_once("layout/footer.php"); ?>