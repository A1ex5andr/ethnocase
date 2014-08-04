	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['newest']; ?></h2></div>

<?php 

$cases = cases($lang, 'new');
$name = "name_".$lang;
$model = "model_".$lang;

foreach($cases as $data)
    {

echo '      <div class="itemBlock">
            <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <div class="picWrap">
                    <img class="picIndex" src="img/cases/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>

	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['bestsell']; ?></h2></div>

<?php 

$cases = cases($lang, 'top');
$name = "name_".$lang;
$model = "model_".$lang;

foreach($cases as $data)
    {

echo '      <div class="itemBlock">
            <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <div class="picWrap">
                    <img class="picIndex" src="img/cases/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>

	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['onsell']; ?></h2></div>

<?php 

$cases = cases($lang, 'sale');
$name = "name_".$lang;
$model = "model_".$lang;

foreach($cases as $data)
    {

echo '      <div class="itemBlock">
            <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <div class="picWrap">
                    <img class="picIndex" src="img/cases/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>