	<div class="slider container">
		<ul class="bxslider">
<?php 
	$database = new medoo();
    $menus = $database->select("sliders", ["link_item", "img"], 
        [
        "active" => "1",
        "ORDER" => ["orders ASC"]
        ]);

foreach($menus as $data)
	{

		echo '			<li><a href="'.$data['link_item'].'"><img src="img/slider/'.$data['img'].'" /></a></li>\n';

	}
?>
		</ul>
	</div>