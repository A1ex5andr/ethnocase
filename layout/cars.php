<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

$cars = cars($lang);
$name = "name_".$lang;
$model = "model_".$lang;
$about = "about_".$lang;
?>

    <section class="items container">
        <div class="headline"><h2><?php echo $texts['cars18']; ?></h2></div>

<?php
foreach($cars as $data)
    {
        if ($data["catalog"] == "18"){
        echo '      <div class="itemBlock">
                    <a href="'.$data["link_item"].'" class="itemBlockLink">
                        <div class="itemPrice priceDiscount">
                            <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
        if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
        if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
        echo '                </div>
                        <div class="picWrap">
                            <img class="picIndex" src="'.$site.'img/cars/'.$data["img"].'" alt="">
                        </div>
                    </a>
                    <h3 class="itemName">'.$data[$name].'</h3>
                    <h2 class="itemName">Вишиванка: наклейка на авто</h2>
                </div>
        ';
        }
    }

?>
	</section>

    <section class="items container">
        <div class="headline"><h2><?php echo $texts['cars25']; ?></h2></div>

<?php
foreach($cars as $data)
    {
        if ($data["catalog"] == "25"){
        echo '      <div class="itemBlock">
                    <a href="'.$data["link_item"].'" class="itemBlockLink">
                        <div class="itemPrice priceDiscount">
                            <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
        if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
        if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
        echo '                </div>
                        <div class="picWrap">
                            <img class="picIndex" src="'.$site.'img/cars/'.$data["img"].'" alt="">
                        </div>
                    </a>
                    <h3 class="itemName">'.$data[$name].'</h3>
                    <h2 class="itemName">Вишиванка: наклейка на авто</h2>
                </div>
        ';
        }
    }

?>
    </section>

	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['cars35']; ?></h2></div>

<?php
foreach($cars as $data)
    {
        if ($data["catalog"] == "35"){
        echo '      <div class="itemBlock">
                    <a href="'.$data["link_item"].'" class="itemBlockLink">
                        <div class="itemPrice priceDiscount">
                            <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
        if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
        if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
        echo '                </div>
                        <div class="picWrap">
                            <img class="picIndex" src="'.$site.'img/cars/'.$data["img"].'" alt="">
                        </div>
                    </a>
                    <h3 class="itemName">'.$data[$name].'</h3>
                    <h2 class="itemName">Вишиванка: наклейка на авто</h2>
                </div>
        ';
        }
    }

?>
    </section>
