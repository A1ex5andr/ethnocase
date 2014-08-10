<?php if ( !defined('MITH') ) {exit;} ?>

<?php 

$cases = cases_details($lang, $loc["2"]);
$name = "name_".$lang;
$model = "model_".$lang;
$about = "about_".$lang;

$i = "0";

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
				<span><img src="'.$site.'img/cases/iphone_5/5_14_1.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="1"></span>
				<span><img src="'.$site.'img/cases/iphone_5/5_14_2.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="2"></span>
				<span><img src="'.$site.'img/cases/iphone_5/5_14_3.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="3"></span>
				<span><img src="'.$site.'img/cases/iphone_5/5_14_4.jpg" alt="Чехол для iPhone - этно чехол вышиванка на iPhone" class="singleCasePic" id="4"></span>
			</div>

			<div class="picsGallery-show">
				<img src="'.$site.'img/cases/iphone_5/5_14_1.jpg" class="singleCasePic" alt="Чехол для iPhone - этно чехол вышиванка на iPhone">						
			</div>
		</div>

		<div class="singleCase">
			<header class="headline">
				<h3>'.$texts['about_case'].'</h3>
			</header>
			<p class="singleCase-about">
				'.$data[$about].'						
			</p>
		</div>

    </div>';
}

?>