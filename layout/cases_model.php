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
            <a href="'.$site.$links.$data["link_item"].'" class="itemBlockLink">
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