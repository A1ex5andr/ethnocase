	<section class="news container">
<?php 

$news = news($lang, '0', '10');
$txt = $lang."_txt";

foreach($news as $data)
	{

echo '	    <div class="headline"><h2>'.$data[$lang].'</h2></div>
	    <div class="newsBlock newsDetailed">
	        <img class="img-news pullLeft" src="img/news/'.$data["img"].'" alt="">
	        '.$data[$txt].'
	    </div>';
	}

?>
	</section>