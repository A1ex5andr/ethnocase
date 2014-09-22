<?php if ( !defined('MITH') ) {exit;} ?>
            <header class="container">
                <div class="headLogo">
                    <a href="<?php echo $link; ?>">
                        <img src="<?php echo $site; ?>img/logo.jpg" alt="" class="logo">
                    </a>
                </div>
<?php 

$menuhead = menu($lang, '1');
$pr_menu = '';

foreach($menuhead as $datahead)
	{

		if ($datahead["parent"] == "0")
		{
			if ( $datahead["link_item"] == "cart" ){
					$pr_menu .= '
		        <li>
		        	<a href="'.$link.$datahead["link_item"].'/"><i class="fa '.$datahead["class"].'"></i> '.$datahead[$lang].' '.$inthecart.'</a>
		        </li>';
		    }else{
				$pr_menu .= '
		        <li>
		        	<a href="'.$link.$datahead["link_item"].'/"><i class="fa '.$datahead["class"].'"></i> '.$datahead[$lang].'</a>
		        </li>';
		    }
	    }
	}

?>


                <nav id="navigation" class="nav-collapse">
                  <ul>
                <?php echo $pr_menu; ?>
                <!-- <li>
                        <a href="<?php echo $site; ?>cart/"><i class="fa fa-shopping-cart"></i> Cart
                            <span class="inCart">1</span>
                        </a>
                    </li>-->
                    <li class="lang">
                        <ul>
                            <li><a href="<?php flags_url("eng"); ?>">en</a></li>
                            <li><a href="<?php flags_url("ukr"); ?>">ua</a></li>
                            <li><a href="<?php flags_url("rus"); ?>">ru</a></li>
                            <li class="currency"><a href="<?php flags_url($lang); ?>uah/">₴</a></li>
                            <li class="currency"><a href="<?php flags_url($lang); ?>usd/">$</a></li>
                        </ul>
                    </li>
                  </ul>
                </nav>
            </header>