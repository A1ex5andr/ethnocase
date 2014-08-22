<?php require_once("layout/head.php"); ?>
<?php require_once("layout/header.php"); ?>


	<div class="slogan container">
        <h1>Your Order</h1>
    </div>

	<section class="container">

            <header class="headline">
                <h2>Товари в корзині</h2>
            </header>

            <div class="inCart">

                <div class="inCart-item item_01">

                    <div class="inCart-itemPicture">
                        <img class="picIndex" src="img/cases/iphone_5/5_4_1.jpg" alt="">
                    </div>

                    <div class="inCart-details">
                        
                        <div class="">
                            <ul>
                                <li>
                                    <h2>Назва</h2>
                                    <h4>Полтавка</h4>
                                </li>
                                <li>
                                    <h2>Модель</h2>
                                    <h4>Apple iPhone 5s</h4>
                                </li>
                                <li class="inCart-details-priceInfo">
                                    <h2>Ціна</h2>
                                    <h4>
                                    	<div class="itemPrice priceDiscount">
						                    <div class="itemPrice-final">399₴</div>   
						                </div>
                                    </h4>
                                </li>
                                <li>
                                    <h2>Кількість</h2>
                                    <h4><input class="quantity-select" type="text" value="1" length="2" maxlength="3"></h4>
                                </li>
                                <li>
                                    <h2>Оплата</h2>
                                    <h4>399<span class="priceCur">uah</span></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-Remove"><i class="fa fa-trash-o"></i> Remove</button>
                </div>

                <div class="inCart-item item_02 ">

                    <div class="inCart-itemPicture">
                        <img class="picIndex" src="img/cases/iphone_5/5_10_1.jpg" alt="">
                    </div>

                    <div class="inCart-details">
                        
                        <div class="">
                            <ul>
                                <li>
                                    <h2>Назва</h2>
                                    <h4>Полтавка</h4>
                                </li>
                                <li>
                                    <h2>Модель</h2>
                                    <h4>Apple iPhone 5s</h4>
                                </li>
                                <li class="inCart-details-priceInfo">
                                    <h2>Ціна</h2>
                                    <h4 class="cartCase-discount">
                                        <div class="itemPrice priceDiscount">
						                    <div class="itemPrice-final">319₴</div>
						                    <div class="itemPrice-old">&nbsp;399₴&nbsp;</div>
						                    <div class="itemPrice-disc">-20%</div>    
						                </div>
                                    </h4>
                                </li>
                                <li>
                                    <h2>Кількість</h2>
                                    <h4><input class="quantity-select" type="text" value="1" length="2" maxlength="3"></h4>
                                </li>
                                <li>
                                    <h2>Оплата</h2>
                                    <h4>399<span class="priceCur">uah</span></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-Remove"><i class="fa fa-trash-o"></i> Remove</button>
                </div>

                <div class="inCart-more">
	                <button class="btn btn-addMore"><i class="fa fa-plus-square-o"></i> Add More</button>
                </div>

            </div>

            <header class="headline">
                <h2>Оформлення доставки</h2>
            </header>

            <form class="orderForm" method="post" action="includes/buy.php" accept-charset="utf-8">
                <div class="orderForm-field">
                    <div class="orderForm-name">
                        <span class="orderInput">
	                        <input name="name" placeholder="Ім'я" type="text" class="text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-phone">
                        <span class="orderInput">
	                        <input name="phone" placeholder="Телефон" type="text" class="text">
                        </span>
                    </div>
                    <div class="orderForm-email">
                        <span class="orderInput">
	                        <input name="email" placeholder="Е-пошта" type="text" class="text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-city">
                        <span class="orderInput">
	                        <input name="city" placeholder="Місто" type="text" class="text">
                        </span>
                    </div>
                    <div class="orderForm-address">
                        <span class="orderInput">
	                        <input name="address" placeholder="Адреса" type="text" class="text">
                        </span>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-delivery" id="deliveryType">
                        <span>Спосіб доставки:</span>
                            <div><input class="delCost" type="radio" name="delivery" id="delivery_1" value="0">
                            	<label for="delivery_1">
	                            	по Києву - безкоштовно.
                            	</label>
                            </div>                                   
                            <div><input class="delCost" type="radio" name="delivery" id="delivery_2" value="30" checked="">
                            	<label for="delivery_2">
	                            	по Україні - 30 грн.
                            	</label>
                            </div>                                   
                            <div><input class="delCost" type="radio" name="delivery" id="delivery_3" value="World Wide">
                            	<label for="delivery_3">
	                            	Міжнародна <span>* Вартість доставки буде уточнена нашим менеджером.</span>
                            	</label>
                            </div>
                    </div>
                </div>
                <div class="orderForm-field">
                    <div class="orderForm-info">
                        <textarea name="info" placeholder="Примітки" rows="4"></textarea>
                    </div>
                </div>
                <div class="orderForm-field sendOrder">
                    <button class="btn btn-sendOrder" type="submit" class="btn"><i class="fa fa-upload"></i> ВІДПРАВИТИ замовлення</button>
                </div>
            </form>
        </section>



<?php require_once("layout/contacts.php"); ?>
<?php require_once("layout/footer.php"); ?>