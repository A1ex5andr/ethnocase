<?php if ( !defined('MITH') ) {exit;} ?>	<header class="container">
		<div class="headLogo">
			<a href="<?php echo $site; ?>">
				<img src="<?php echo $site; ?>img/logo.jpg" alt="" class="logo">
			</a>
		</div>
<?php 

$menus = menu($lang, '1');
$pr_menu = '';

foreach($menus as $data)
	{

		if ($data["parent"] == "0")
		{
			if ( $data["link_item"] == "cart" ){
					$pr_menu .= '
		        <li>
		        	<a href="'.$site.$data["link_item"].'/"><i class="fa '.$data["class"].'"></i> '.$data[$lang].' '.$inthecart.'</a>
		        </li>';
		    }else{
				$pr_menu .= '
		        <li>
		        	<a href="'.$site.$data["link_item"].'/"><i class="fa '.$data["class"].'"></i> '.$data[$lang].'</a>
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
	        		<li><a href="<?php flags_url($lang); ?>usd">USD</a></li>
	        		<li><a href="<?php flags_url($lang); ?>uah">UAH</a></li>
	        	</ul>
	        </li>
	      </ul>
	    </nav>
	</header>