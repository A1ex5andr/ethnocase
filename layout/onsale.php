<?php if ( !defined('MITH') ) {exit;} ?>

	<section class="items container">

<?php 

$cases = cases($lang, 'sale');
$name = "name_".$lang;
$model = "model_".$lang;

if (!empty($cases)){

    echo '        <div class="headline"><h2>'.$texts['onsell'].'</h2></div>';

}

foreach($cases as $data)
    {

    
echo '      <div class="itemBlock">
            <a href="'.$data["link_item"].'" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <div class="picWrap">
                    <img class="picIndex" src="'.$site.'img/cases/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>