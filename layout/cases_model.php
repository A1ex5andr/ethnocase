<?php if ( !defined('MITH') ) {exit;} ?>
<?php 
$menus = menu($lang, '2');

$my_menu_txt = "";
$id = "";

foreach($menus as $data)
    {

        if ($data["link_item"] == $loc["1"])
        {
            $my_menu_txt = $data[$lang];
            $id = $data["id"];
            $links = "products/".$data["link_item"]."/";
        }
    }

check_link($my_menu_txt);
?>
	<section class="items container">
	    <div class="headline"><h2><?php echo $my_menu_txt; ?></h2></div>

<?php 

$cases = cases_model($lang, $id);
$name = "name_".$lang;
$model = "model_".$lang;

check_link($cases);

foreach($cases as $data)
    {

  
echo '      <div class="itemBlock">
            <a href="'.$site.$links.$data["link_item"].'/" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data[$pri].''.$cur_symbol.'</div>';
if ($data[$prio] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data[$prio].''.$cur_symbol.'&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <form action="'.$site.'cart/'.$data["id"].'/" class="buyForm" method="post" enctype="multipart/form-data">
			     <button class="btn btn-buy_cat">'.$texts['buy'].'</button>
			     <input type="hidden" name="type" value="1">
			    </form>
                <div class="picWrap">
                    <img class="picIndex" src="'.$site.'img/cases/'.$menu_id.'/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>