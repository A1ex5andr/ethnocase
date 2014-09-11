<?php if ( !defined('MITH') ) {exit;} ?>
    <section class="items container">

<?php 
    
$cases = products($lang, "new", "1", "3", "cases");
$name = "name_".$lang;
$model = "model_".$lang;

if (!empty($cases)){

    echo '        <div class="headline"><h2>'.$texts['newest'].'</h2></div>';

}

foreach($cases as $data)
    {

$link = category_one($data["parent"]);

echo '      <div class="itemBlock">
            <a href="'.$site.$link.$data["link_item"].'" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data[$pri].''.$cur_symbol.'</div>';
if ($data[$prio] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data[$prio].''.$cur_symbol.'&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <div class="picWrap">
                    <img class="picIndex" src="'.$site.'img/products/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>