<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

if ($loc["2"] == "del"){
$x = count($_SESSION["cart"]);

	for ($i=0; $i < $x; $i++) {

		list ($id, $q) = split(":", $_SESSION["cart"][$i]); 
		if ($loc["1"] == $id){ $_SESSION["cart"][$i] = ""; }
	}

$array_empty = array(null);
$_SESSION["cart"] = array_diff($_SESSION["cart"], $array_empty);

$i = '0';
$o = array();
foreach ($_SESSION["cart"] as $value) {
	$o[$i] = $value;
	$i++;
}

unset($_SESSION['cart']);
$_SESSION['cart'] = $o;

header('Location: '.$site.'cart');
exit;	
}

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
exit;
}

?>