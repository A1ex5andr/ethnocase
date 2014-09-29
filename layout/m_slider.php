	<div class="slider container">
		<ul class="bxslider">
<?php 
	$database = new medoo();
    $menus = $database->select("sliders", ["link_item", "img", "alt"], 
        [
        "active" => "1",
        "ORDER" => ["orders ASC"]
        ]);

foreach($menus as $data)
	{

		echo '			<li><a href="'.$data['link_item'].'"><img src="'.$site.'img/slider/'.$data['img'].'" alt="'.trim($data["alt"]).'" ></a></li>';

	}
?>
		</ul>
	</div>