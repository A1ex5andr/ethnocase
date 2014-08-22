	<div class="slogan container">
        <h1><?php echo $texts['your_order']; ?></h1>
    </div>

	<section class="container">

            <header class="headline">
                <h2><?php echo $texts['goodincart']; ?></h2>
            </header>

            <div class="inCart">

                <div class="inCart-item item_01">

                    <div class="inCart-itemPicture">
                        <img class="picIndex" src="<?php echo $site; ?>img/cases/5_4_1.jpg" alt="">
                    </div>

                    <div class="inCart-details">
                        
                        <div class="">
                            <ul>
                                <li>
                                    <h2><?php echo $texts['model_name']; ?></h2>
                                    <h4>Полтавка</h4>
                                </li>
                                <li>
                                    <h2><?php echo $texts['model']; ?></h2>
                                    <h4>Apple iPhone 5s</h4>
                                </li>
                                <li class="inCart-details-priceInfo">
                                    <h2><?php echo $texts['price']; ?></h2>
                                    <h4>
                                    	<div class="itemPrice priceDiscount">
						                    <div class="itemPrice-final">399₴</div>
                                            <div class="itemPrice-old">&nbsp;399₴&nbsp;</div>
                                            <div class="itemPrice-disc">-20%</div>  
						                </div>
                                    </h4>
                                </li>
                                <li>
                                    <h2><?php echo $texts['quantity']; ?></h2>
                                    <h4 class="quantity">
                                        <span class="quantity_minus">&#8212;</span>
                                        <input class="quantity-select" type="text" value="1" length="2" maxlength="3">
                                        <span class="quantity_plus">&#43;</span>
                                    </h4>
                                </li>
                                <li>
                                    <h2><?php echo $texts['payment']; ?></h2>
                                    <h4>399<span class="priceCur"><?php echo $texts['uah']; ?></span></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-Remove"><i class="fa fa-trash-o"></i> <?php echo $texts['remove']; ?></button>
                </div>

                <div class="inCart-more">
	                <button class="btn btn-addMore"><i class="fa fa-plus-square-o"></i> <?php echo $texts['addmore']; ?></button>
                </div>

            </div>

            <header class="headline">
                <h2><?php echo $texts['dodelivery']; ?></h2>
            </header>

            <form class="orderForm" method="post" action="includes/buy.php" accept-charset="utf-8">
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
                        <span><?php echo $texts['del_way']; ?>:</span>
                            <div><input class="delCost" type="radio" name="delivery" id="delivery_1" value="0">
                            	<label for="delivery_1">
	                            	<?php echo $texts['delivery_1']; ?>
                            	</label>
                            </div>                                   
                            <div><input class="delCost" type="radio" name="delivery" id="delivery_2" value="30" checked="">
                            	<label for="delivery_2">
	                            	<?php echo $texts['delivery_2']; ?>
                            	</label>
                            </div>                                   
                            <div><input class="delCost" type="radio" name="delivery" id="delivery_3" value="World Wide">
                            	<label for="delivery_3">
	                            	<?php echo $texts['delivery_3']; ?> <span><?php echo $texts['delivery_31']; ?></span>
                            	</label>
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
