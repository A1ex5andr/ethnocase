	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['newest']; ?></h2></div>

<?php 

$cases = cases($lang, '0', '3');
$name = "name_".$lang;
$model = "model_".$lang;

foreach($cases as $data)
    {

echo '      <div class="itemBlock">
            <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">'.$data["price"].'&#8372;</div>';
if ($data["price_old"] != '0'){echo '                    <div class="itemPrice-old">&nbsp;'.$data["price_old"].'&#8372;&nbsp;</div>';}
if ($data["disc"] != '0'){echo '                    <div class="itemPrice-disc">-'.$data["disc"].'%</div>';}    
echo '                </div>
                <div class="picWrap">
                    <img class="picIndex" src="img/cases/'.$data["img"].'" alt="">
                </div>
            </a>
            <h3 class="itemName">'.$data[$name].'</h3>
            <h2 class="itemName">'.$data[$model].'</h2>
        </div>
';
    }

?>
	</section>

	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['bestsell']; ?></h2></div>

	    <div class="itemBlock">
	        <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">399&#8372;</div>   
                </div>
                <div class="picWrap">
		            <img class="picIndex" src="img/cases/iphone_5/5_8_1.jpg" alt="">
		        </div>
	        </a>
            <h3 class="itemName">Freedom</h3>
            <h2 class="itemName">Чехоля для iPhone 4s</h2>
	    </div>
	    <div class="itemBlock">
	        <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">319&#8372;</div>
                    <div class="itemPrice-old">&nbsp;399&#8372;&nbsp;</div>
                    <div class="itemPrice-disc">-20%</div>    
                </div>
                <div class="picWrap">
		            <img class="picIndex" src="img/cases/iphone_5/5_1_1.jpg" alt="">
                </div>
	        </a>
            <h3 class="itemName">Capital Embroidery</h3>
            <h2 class="itemName">Чехоля для iPhone 4s</h2>
	    </div>
	    <div class="itemBlock">
	        <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">360&#8372;</div>
                    <div class="itemPrice-old">&nbsp;399&#8372;&nbsp;</div>
                    <div class="itemPrice-disc">-10%</div>    
                </div>
                <div class="picWrap">
		            <img class="picIndex" src="img/cases/iphone_5/5_9_1.jpg" alt="">
		        </div>
	        </a>
            <h3 class="itemName">«Чумацький Шлях»</h3>
            <h2 class="itemName">Чехоля для iPhone 4s</h2>
	    </div>
	</section>

	<section class="items container">
	    <div class="headline"><h2><?php echo $texts['onsell']; ?></h2></div>

	    <div class="itemBlock">
	        <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">399&#8372;</div>   
                </div>
                <div class="picWrap">
		            <img class="picIndex" src="img/cases/iphone_5/5_1_1.jpg" alt="">
		        </div>
	        </a>
            <h3 class="itemName">Freedom</h3>
            <h2 class="itemName">Чехоля для iPhone 4s</h2>
	    </div>
	    <div class="itemBlock">
	        <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">319&#8372;</div>
                    <div class="itemPrice-old">&nbsp;399&#8372;&nbsp;</div>
                    <div class="itemPrice-disc">-20%</div>    
                </div>
                <div class="picWrap">
		            <img class="picIndex" src="img/cases/iphone_5/5_6_1.jpg" alt="">
                </div>
	        </a>
            <h3 class="itemName">Capital Embroidery</h3>
            <h2 class="itemName">Чехоля для iPhone 4s</h2>
	    </div>
	    <div class="itemBlock">
	        <a href="#" class="itemBlockLink">
                <div class="itemPrice priceDiscount">
                    <div class="itemPrice-final">360&#8372;</div>
                    <div class="itemPrice-old">&nbsp;399&#8372;&nbsp;</div>
                    <div class="itemPrice-disc">-10%</div>    
                </div>
                <div class="picWrap">
		            <img class="picIndex" src="img/cases/iphone_5/5_9_1.jpg" alt="">
		        </div>
	        </a>
            <h3 class="itemName">«Чумацький Шлях»</h3>
            <h2 class="itemName">Чехоля для iPhone 4s</h2>
	    </div>
	</section>