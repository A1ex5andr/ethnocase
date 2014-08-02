<?php if ( !defined('MITH') ) {exit;} ?>	<header class="container">
		<div class="headLogo">
			<a href="<?php echo $site; ?>">
				<img src="img/logo.jpg" alt="" class="logo">
			</a>
		</div>
<?php 

$menus = menu($lang);
$pr_menu = '';

foreach($menus as $data)
	{
		$i = "0";
        foreach($menus as $dat)
        {
			if ($data["id"] == $dat["parent"]){$i++;}
        }

		if ($data["parent"] == "0")
		{
			$pr_menu .= '
	        <li>
	        	<a href="'.$site.$data["link_item"].'/"><i class="fa '.$data["class"].'"></i> '.$data[$lang].'</a>
	        </li>';
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
	        	</ul>
	        </li>
	      </ul>
	    </nav>
	</header>