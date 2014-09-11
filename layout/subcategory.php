<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

if ($loc["0"] == "auto"){ 

    $level = "3"; 

    $menus = menu($lang, $level);
    $i = "0";

    if (empty($menus)) {
        require_once("layout/404.php");
        exit;
    }


    $cars = products($lang, "any", "1", "100", $loc[0]);
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

                    $my_menu_txt = menu_one($lang, $menu["link_item"]);
                    //check_link($my_menu_txt);
                    echo $menu["link_item"];
                    if ($data[0]["catalog"] == $menu["link_item"]){
                    echo '      <div class="itemBlock">
                                <a href="'.$site.'auto/'.$menu["link_item"].'/'.$data["link_item"].'/" class="itemBlockLink">
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


}elseif ($loc["0"] == "cases"){ 

    $level = "2"; 

    $cases = products($lang, "any", "1", "100", $loc[1]);

    $my_menu_txt = menu_one($lang, $loc[1]);


    check_link($my_menu_txt);

echo '        <section class="items container">
            <div class="headline"><h2>'.$my_menu_txt[0][$lang].'</h2></div>';


    $name = "name_".$lang;
    $model = "model_".$lang;

    check_link($cases);

    foreach($cases as $data)
        {

      
    echo '      <div class="itemBlock">
                <a href="'.$site.$loc["0"]."/".$my_menu_txt[0]["link_item"]."/".$data["link_item"].'/" class="itemBlockLink">
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
                        <img class="picIndex" src="'.$site.'img/cases/'.$data["img"].'" alt="">
                    </div>
                </a>
                <h3 class="itemName">'.$data[$name].'</h3>
                <h2 class="itemName">'.$data[$model].'</h2>
            </div>
    ';
        }


echo '        </section>';

}
?>
