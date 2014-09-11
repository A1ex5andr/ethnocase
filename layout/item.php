<?php if ( !defined('MITH') ) {exit;} ?>

<?php 

if ($loc["0"] == "cases"){ $level = 2; }
if ($loc["0"] == "auto"){ $level = 3; }

    $items = product($lang, "link_item", $loc[2], "1", $loc[1]);

	//var_dump($items);
    //$my_menu_txt = menu_one($lang, $loc[1]);

    check_link($items);

$name = "name_".$lang;
$model = "model_".$lang;
$about = "about_".$lang;

$i = "0";


// foreach($items as $data)
//     {

//     	$i = $i + 1;
//     	$img = '';
    	
//     	$images = images($data["id"] , "cases");
//     	$x = '0';
//     	foreach($images as $image)
//     	{ 
//     		$x++;
//     		$img = $img.'<span><img src="'.$site.'img/cases/'.$image["name"].'" alt="'.$image["alt"].'" class="singleProductPic" id="'.$data["link_item"].'_'.$x.'"></span>';
// 		}

    	echo '
	<div class="slogan container">
        <h1>'.$items[0][$name].'</h1>
        <h2>'.$items[0][$model].'</h2>
    </div>

    <div class="container">

		<div class="picsGallery">
			<div class="picsGallery-thumbs">
				'.$img.'
			</div>

			<div class="picsGallery-show">
				<img src="'.$site.'img/cases/'.$items[0]["img"].'" class="singleProductPic" alt="Чехол для iPhone - этно чехол вышиванка на iPhone">
			</div>
		</div>

		<div class="singleProduct">
			<header class="headline">
				<h3>'.$texts['about_case'].'</h3>
			</header>
			<form action="'.$site.'cart/'.$items[0]["id"].'/" class="buyForm" method="post" enctype="multipart/form-data">
			    <button class="btn btn-buy"><i class="fa fa-shopping-cart"></i> '.$texts['buy'].'</button>
			    <input type="hidden" name="type" value="1">
			</form>
			<p class="singleProduct-about">
				'.$items[0][$about].'
			</p>
			<div class="share42init"></div>
		</div>

    </div>';


?>