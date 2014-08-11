<?php if ( !defined('MITH') ) {exit;} ?>
<?php	

$page = pages($lang, $loc["0"]);
foreach($page as $data)
    {
	    if (!empty($data[$lang])){

			echo $data[$lang];

		}else{

			header( 'Refresh: 0; url='.$site.'/404' );

		}
	}
?>