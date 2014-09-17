<?php if ( !defined('MITH') ) {exit;} ?>
    <section class="items container">

<?php 
    
$cases = products($lang, "new", "1", "6", "cases");
$name = "name_".$lang;
$model = "model_".$lang;

if (!empty($cases)){

    echo '        <div class="headline"><h2>'.$texts['newest'].'</h2></div>';

}

foreach($cases as $data)
    {

$links = category_one($data["parent"]);

echo '      <div class="itemBlock">
            <a href="'.$link.$links.$data["link_item"].'/" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data[$pri].''.$cur_symbol.'</div>';
if ($data[$prio] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data[$prio].''.$cur_symbol.'&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <form action="'.$link.'cart/'.$data["id"].'/" class="buyForm" method="post" enctype="multipart/form-data">
			     <button class="btn btn-buy_cat">'.$texts['buy'].'</button>
			     <input type="hidden" name="type" value="1">
			    </form>
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