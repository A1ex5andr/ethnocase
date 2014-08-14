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

    	echo '
	<div class="slogan container">
        <h1>'.$data[$name].'</h1>
        <h2>'.$data[$model].'</h2>
    </div>

    <div class="container">

		<div class="picsGallery">
			<div class="picsGallery-thumbs">
				<span><img src="'.$site.'img/cases/iphone_5/'.$data["link_item"].'_1.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="1"></span>
				<span><img src="'.$site.'img/cases/iphone_5/'.$data["link_item"].'_2.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="2"></span>
				<span><img src="'.$site.'img/cases/iphone_5/'.$data["link_item"].'_3.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="3"></span>
				<span><img src="'.$site.'img/cases/iphone_5/'.$data["link_item"].'_4.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="4"></span>
			</div>

			<div class="picsGallery-show">
				<img src="'.$site.'img/cars/'.$data["img"].'" class="singleCasePic" alt="Чехол для iPhone - этно чехол вышиванка на iPhone">						
			</div>
		</div>

		<div class="singleCase">
			<header class="headline">
				<h3>'.$texts['about_case'].'</h3>
			</header>
			<p class="singleCase-about">
				'.$data[$about].'
			</p>
			<div class="share42init"></div>
		</div>

    </div>';
}

?>