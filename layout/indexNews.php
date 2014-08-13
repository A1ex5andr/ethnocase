	<section class="news container">
	    <div class="headline"><h2><?php echo $texts['news']; ?></h2></div>


<?php 

$news = news($lang, '0', '3');

foreach($news as $data)
	{

echo '	    <div class="newsBlock">
        	<a href="'.$site.'news/'.$data["link_item"].'">
		        <img class="img-responsive" src="img/news/'.$data["img"].'" alt="">
		        <h3 class="truncate newsTitle">
		        		'.$data[$lang].'
		        </h3>
       		</a>
	    </div>
';
	}

?>
	</section>