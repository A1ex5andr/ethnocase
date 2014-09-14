<?php if ( !defined('MITH') ) {exit;} ?>

	<div class="slogan container">
        <h1><?php echo $texts['your_order']; ?></h1>
    </div>

	<section class="container">

            <header class="headline">
                <h2><?php echo $texts['goodincart']; ?></h2>
            </header>

            <div class="inCart">

<?php
if (!empty($_SESSION['cart'])) {


$i = '0';

foreach ($_SESSION['cart'] as $value) {

    list ($id, $q) = split(":", $value);

    $case = product($lang, "id", $id, "1");

    $name = "name_".$lang;
    $model = "model_".$lang;
    $about = "about_".$lang;

    echo '                <div class="inCart-item" id="item_0'.$i.'">

                    <div class="inCart-itemPicture">
                        <img class="picIndex" src="'.$site.'img/products/'.$case['0']["img"].'" alt="">
                    </div>

                    <div class="inCart-details">
                        <ul>
                            <li>
                                <h2>'.$texts['model_name'].'</h2>
                                <h4>'.$case['0'][$name].'</h4>
                            </li>
                            <li>
                                <h2>'.$texts['model'].'</h2>
                                <h4>'.$case['0'][$model].'</h4>
                            </li>
                            <li class="inCart-details-priceInfo">
                                <h2>'.$texts['price'].'</h2>
                                <h4>
                                    <div class="itemPrice priceDiscount">
                                        <span class="itemPrice-final">'.$case['0'][$pri].'</span>
                                        <span class="priceCur">'.$cur_symbol.'</span>';

if ($case['0'][$prio] != '0') { 
echo '                                            <div class="itemPrice-old">&nbsp;'.$case['0'][$prio].''.$cur_symbol.'&nbsp;</div>';
}
if ($case['0']['disc'] != '0') { 
echo '                                            <div class="itemPrice-disc">'.$case['0']['disc'].'</div>';
} 

echo '                                        </div>
                                </h4>
                            </li>
                            <li>
                                <h2>'.$texts['quantity'].'</h2>
                                <h4 class="noSelection">
                                    <div class="quantity qMinus"><span class="quantity_minus">&#8211;</span></div>
                                    <input class="quantity-select" type="text" value="'.$q.'" length="2" maxlength="3" disabled="disabled">
                                    <div class="quantity qPlus"><span class="quantity_plus">&#43;</span></div>
                                </h4>
                                <form action="'.$link.'cart/'.$case['0']['id'].'/del" class="removeButton"><button class="btn btn-Remove"><!--i class="fa fa-trash-o"></i--> '.$texts['remove'].'</button></form>
                            </li>
                            <li>
                                <h2>'.$texts['payment'].'</h2>
                                <h4>
                                    <span class="priceTotal">'.$case['0'][$pri].'</span>
                                    <span class="priceCur">'.$cur_symbol.'</span>
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>';

$i++;
}


}

?>

                <div class="inCart-more">
	                <form action="<?php echo $link."cases/"; ?>" class="addButton"><button class="btn btn-addMore"><i class="fa fa-plus-square-o"></i> <?php echo $texts['addmore']; ?></button></form>
                </div>

            </div>

            <header class="headline">
                <h2><?php echo $texts['dodelivery']; ?></h2>
            </header>

            <form class="orderForm" method="post" action="<?php echo $link.'order/'; ?>" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="orderForm-field">
                    <div class="orderForm-name">
                        <span class="orderInput">
	                        <input name="name" placeholder="<?php echo $texts['name']; ?>" type="text" class="checkField text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-phone">
                        <span class="orderInput">
	                        <input name="phone" placeholder="<?php echo $texts['phone']; ?>" type="text" class="checkField text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-email">
                        <span class="orderInput">
	                        <input name="email" placeholder="<?php echo $texts['email']; ?>" type="text" class="checkField text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-city">
                        <span class="orderInput">
	                        <input name="city" placeholder="<?php echo $texts['city']; ?>" type="text" class="checkField text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-address">
                        <span class="orderInput">
	                        <input name="address" placeholder="<?php echo $texts['adress']; ?>" type="text" class="checkField text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-address">
                        <span class="orderInput">
	                        <input name="address2" placeholder="<?php echo $texts['adress']; ?> 2" type="text" class="text">
                        </span>
                    </div>
                </div>

                <div class="orderForm-delivery" id="deliveryType">
                    <div class="delTypeTitle"><?php echo $texts['del_way']; ?>:</div>
                        <div class="delType">
                            <input class="delCost" type="radio" name="delivery" id="delivery_1" value="1">
                            <label for="delivery_1">
                                <?php echo $texts['delivery_1']; ?>
                            </label>
                            <span class="delBtn"><?php echo $texts['free']; ?></span>
                             (<span class="delivery_cost">0</span> <?php echo $cur_symbol; ?>)
                        </div>
                        <div class="delType">
                            <input class="delCost" type="radio" name="delivery" id="delivery_2" value="2" checked="">
                            <label for="delivery_2">
                                <?php echo $texts['delivery_2']; ?>
                            </label>
                            <?php if ($_SESSION["valuta"] == "usd")  { echo '<span class="delBtn delivery_cost">1 '.$cur_symbol.'</span>';} else { echo '<span class="delBtn delivery_cost">30 '.$cur_symbol.'</span>'; } ?>
                        </div>
                        <div class="delType">
                            <input class="delCost" type="radio" name="delivery" id="delivery_3" value="3">
                            <label for="delivery_3">
                                <?php echo $texts['delivery_3']; ?>
                            </label>
                            <?php if ($_SESSION["valuta"] == "usd")  { echo '<span class="delBtn delivery_cost">17 '.$cur_symbol.'</span>';} else { echo '<span class="delBtn delivery_cost">200 '.$cur_symbol.'</span>'; } ?>
                        </div>
                        <div class="delWorld">
                            <div class="orderForm-country">
                                <span class="orderInput">
                                    <input name="country" placeholder="country" type="text" class="checkField text" value="-">
                                </span>
                            </div>
                            <div class="orderForm-zip">
                                <span class="orderInput">
                                    <input name="zip" placeholder="zip" type="text" class="checkField text" value="-">
                                </span>
                            </div>
                            <div class="orderForm-state">
                                <span class="orderInput">
                                    <input name="state" placeholder="state" type="text" class="checkField text" value="-">
                                </span>
                            </div>
                        </div>
                    </div>
                <div class="orderForm-note">
                    <div class="orderForm-info">
                        <textarea name="info" placeholder="<?php echo $texts['notes']; ?>"></textarea>
                    </div>
                </div>
                <div class="finalPriceWrap">
                    <h2>До сплати <span class="finalPrice"></span> <span><?php echo $cur_symbol; ?></span></h2>
                </div>
                <div class="sendOrder">
                    <button class="btn btn-sendOrder" type="submit" class="btn"><i class="fa fa-upload"></i> <?php echo $texts['sendme']; ?></button>
                </div>
            </form>
        </section>
