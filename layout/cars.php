<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

$menus = menu($lang, '3');
$i = "0";

if (empty($menus)) {
    require_once("layout/404.php");
    exit;
}


$cars = cars($lang);
$name = "name_".$lang;
$model = "model_".$lang;
$about = "about_".$lang;

check_link($cars);

foreach($menus as $menu)
    {

    echo '    <section class="items container">
        <div class="headline"><h2>'.$menu[$lang].'</h2></div>';

        foreach($cars as $data)
            {
                if ($data["catalog"] == $menu["link_item"]){
                echo '      <div class="itemBlock">
                            <a href="'.$site.'auto/'.$menu["link_item"].'/'.$data["link_item"].'" class="itemBlockLink">
                                <div class="itemPrice priceDiscount">
                                    <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
                if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
                if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
                echo '                </div>
                                <form action="'.$site.'cart/'.$data["id"].'" class="buyForm" method="post" enctype="multipart/form-data">
                                 <button class="btn btn-buy_cat">купить</button>
                                 <input type="hidden" name="type" value="1">
                                </form>
                                <div class="stripeWrap">
                                    <img class="stripeIndex" src="'.$site.'img/cars/'.$data["img"].'" alt="">
                                </div>
                            </a>
                            <h3 class="itemName">'.$data[$name].'</h3>
                            <h2 class="itemName">Вишиванка: наклейка на авто</h2>
                        </div>
                ';
                }
            }

echo '  </section>';
}
?>
