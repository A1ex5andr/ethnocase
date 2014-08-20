<?php if ( !defined('MITH') ) {exit;} ?>

<?php 

//check link
$menus = menu($lang, '2');

$my_menu_txt = "";

foreach($menus as $data)
    {

        if ($data["link_item"] == $loc["1"])
        {
            $my_menu_txt = $data[$lang];
        }
    }

check_link($my_menu_txt);

// #check link

$cases = cases_details($lang, $loc["2"]);
$name = "name_".$lang;
$model = "model_".$lang;
$about = "about_".$lang;

$i = "0";

check_link($cases);


foreach($cases as $data)
    {

    	$i = $i + 1;
    	$img = '';
    	
    	$images = images($data["id"] , "cases");
    	$x = '0';
    	foreach($images as $image)
    	{ 
    		$x++;
    		$img = $img.'<span><img src="'.$site.'img/cases/'.$image["name"].'" alt="'.$image["alt"].'" class="singleProductPic" id="'.$x.'"></span>';
		}

    	echo '
	<div class="slogan container">
        <h1>'.$data[$name].'</h1>
        <h2>'.$data[$model].'</h2>
    </div>

    <div class="container">

		<div class="picsGallery">
			<div class="picsGallery-thumbs">
				'.$img.'
			</div>

			<div class="picsGallery-show">
				<img src="'.$site.'img/cases/'.$data["img"].'" class="singleProductPic" alt="Чехол для iPhone - этно чехол вышиванка на iPhone">
			</div>
		</div>

		<div class="singleProduct">
			<header class="headline">
				<h3>'.$texts['about_case'].'</h3>
			</header>
			<form action="#" class="buyForm">
			    <button class="btn btn-buy"><i class="fa fa-shopping-cart"></i> купить</button>
			</form>
			<p class="singleProduct-about">
				'.$data[$about].'
			</p>
			<div class="share42init"></div>
		</div>

    </div>';
}

?>