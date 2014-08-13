	<section class="news container">


<?php 

$news = news_one($lang, $loc["1"]);
$txt = $lang."_txt";

check_link($news);

foreach($news as $data)
	{

echo '	    <div class="headline"><h2>'.$data[$lang].'</h2></div>
	    <div class="newsBlock newsDetailed">
	        <img class="img-news pullLeft" src="'.$site.'img/news/'.$data["img"].'" alt="">
	        '.$data[$txt].'
	    </div>';
	}

?>
	</section>