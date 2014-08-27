<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

if(($loc['1'] != "") && (is_numeric($loc['1'])))  
{

    $cases = cases_one($lang, $loc['1']);

    $name = "name_".$lang;
    $model = "model_".$lang;
    $about = "about_".$lang;

if (!empty($_SESSION['cart'])) { $i = count($_SESSION['cart']); }
else { $i = '0'; }

$_SESSION['cart'][$i] = $cases['0']['id'].":1";     

header('Location: '.$site.'cart');
}

?>