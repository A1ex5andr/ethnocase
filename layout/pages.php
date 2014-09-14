<?php if ( !defined('MITH') ) {exit;} ?>
<?php	
$page = pages($lang, $loc["0"]);

if (!empty($page)){
	foreach($page as $data)
	    {
		    if (!empty($data[$lang])){

				echo $data[$lang];

			}
		}
}else{
	require_once("layout/404.php");
	exit;
}
?>