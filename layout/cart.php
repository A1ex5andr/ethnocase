<?php if ( !defined('MITH') ) {exit;} ?>

	<div class="slogan container">
        <h1><?php echo $texts['your_order']; ?></h1>
    </div>

	<section class="container">

            <header class="headline">
                <h2><?php echo $texts['goodincart']; ?></h2>
            </header>

            <script>
                $(document).ready( function() {

                    $('.inCart-item').on('click', '.quantity', function(){

                        var itemsTarget = $(this).siblings('.quantity-select');
                        var itemsCount = itemsTarget.val();
                        //add one
                        if ($(this).hasClass('qPlus') && (itemsCount < 5)){
                            console.log(itemsCount);
                            var newCount = ++itemsCount;
                            console.log(itemsCount);
                            $.ajax({
                                url: "layout/cart.php",
                                datatype: "JSON",
                                type: "POST",
                                data: newCount,
                                success: function (data) {
                                    $(itemsTarget).val(newCount);
                                }
                            });
                            return false
                        };
                        //subtract one
                        if ($(this).hasClass('qMinus') && (itemsCount > 1)){
                            console.log(itemsCount);
                            var newCount = --itemsCount;
                            console.log(itemsCount);
                            $.ajax({
                                url: "layout/cart.php",
                                datatype: "JSON",
                                type: "POST",
                                data: newCount,
                                success: function (data) {
                                    $(itemsTarget).val(newCount);
                                }
                            });
                            return false
                        };
                    });
                });
            </script>

            <div class="inCart">

<?php
if (!empty($_SESSION['cart'])) {


$i = '0';

foreach ($_SESSION['cart'] as $value) {

    list ($id, $q) = split(":", $value);

    $case = cases_one($lang, $id);

    $name = "name_".$lang;
    $model = "model_".$lang;
    $about = "about_".$lang;

    echo '                <div class="inCart-item" id=""item_0'.$i.'>

                    <div class="inCart-itemPicture">
                        <img class="picIndex" src="'.$site.'img/cases/'.$case['0']["img"].'" alt="">
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
                                        <div class="itemPrice-final">'.$case['0']['price'].'₴</div>';

if ($case['0']['price_old'] != '0') { 
echo '                                            <div class="itemPrice-old">&nbsp;'.$case['0']['price_old'].'₴&nbsp;</div>';
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
                                <form action="'.$site.'cart/'.$case['0']['id'].'/del" class="removeButton"><button class="btn btn-Remove"><!--i class="fa fa-trash-o"></i--> '.$texts['remove'].'</button></form>
                            </li>
                            <li>
                                <h2>'.$texts['payment'].'</h2>
                                <h4>399<span class="priceCur">'.$texts['uah'].'</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>';

$i++;
}

//list ($id, $q) = split(":::", $_SESSION['cart']);


}

?>



                <div class="inCart-more">
	                <form action="<?php echo $site.'products/'; ?>"><button class="btn btn-addMore"><i class="fa fa-plus-square-o"></i> <?php echo $texts['addmore']; ?></button></form>
                </div>

            </div>

            <header class="headline">
                <h2><?php echo $texts['dodelivery']; ?></h2>
            </header>

            <form class="orderForm" method="post" action="<?php echo $site.'order/'; ?>" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="orderForm-field">
                    <div class="orderForm-name">
                        <span class="orderInput">
	                        <input name="name" placeholder="<?php echo $texts['name']; ?>" type="text" class="text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-phone">
                        <span class="orderInput">
	                        <input name="phone" placeholder="<?php echo $texts['phone']; ?>" type="text" class="text">
                        </span>
                    </div>
                    <div class="orderForm-email">
                        <span class="orderInput">
	                        <input name="email" placeholder="<?php echo $texts['email']; ?>" type="text" class="text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-city">
                        <span class="orderInput">
	                        <input name="city" placeholder="<?php echo $texts['city']; ?>" type="text" class="text">
                        </span>
                    </div>
                    <div class="orderForm-address">
                        <span class="orderInput">
	                        <input name="address" placeholder="<?php echo $texts['adress']; ?>" type="text" class="text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-delivery" id="deliveryType">
                        <div class="delTypeTitle"><?php echo $texts['del_way']; ?>:</div>
                            <div class="delType">
                                <input class="delCost" type="radio" name="delivery" id="delivery_1" value="0">
                            	<label for="delivery_1">
	                            	<?php echo $texts['delivery_1']; ?>
                            	</label>
                            </div>                                   
                            <div class="delType">
                                <input class="delCost" type="radio" name="delivery" id="delivery_2" value="30" checked="">
                            	<label for="delivery_2">
	                            	<?php echo $texts['delivery_2']; ?>
                            	</label>
                            </div>                                   
                            <div class="delType">
                                <input class="delCost" type="radio" name="delivery" id="delivery_3" value="World Wide">
                            	<label for="delivery_3">
	                            	<?php echo $texts['delivery_3']; ?> <span><?php echo $texts['delivery_31']; ?></span>
                            	</label>
                            </div>
                            <div class="delWorld">
                                <div class="orderForm-zip">
                                    <span class="orderInput">
                                        <input name="zip" placeholder="zip" type="text" class="text">
                                    </span>
                                </div>
                                <div class="orderForm-state">
                                    <span class="orderInput">
                                        <input name="state" placeholder="state" type="text" class="text">
                                    </span>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-info">
                        <textarea name="info" placeholder="<?php echo $texts['notes']; ?>" rows="4"></textarea>
                    </div>
                </div>
                <div class="orderForm-field sendOrder">
                    <button class="btn btn-sendOrder" type="submit" class="btn"><i class="fa fa-upload"></i> <?php echo $texts['sendme']; ?></button>
                </div>
            </form>
        </section>
