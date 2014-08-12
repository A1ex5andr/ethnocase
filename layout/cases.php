<?php if ( !defined('MITH') ) {exit;} ?>

    <section class="container">

<?php 

$menus = menu($lang, '2');
$i = "0";

if (empty($menus)) {
    require_once("layout/404.php");
    exit;
}



    foreach($menus as $data)
        {
            
        	if ($data["parent"] == "0")
            {
            	if ($i == '1'){ echo "</div>"; $i = '0'; }
                echo '        <div class="catalog-brand">
                <header class="headline">
                    <h1><img class="headlineImg '.$data["class"].'" src="'.$site.'img/cases/catModels/'.$data["img"].'" alt="'.$data["alt"].'"></h1>
                </header>';
            	$i = $i+1;
                $parent = $data["id"];

                    foreach($menus as $dat)
                        {
                            
                            if ($dat["parent"] == $parent){
                                echo '            <div class="brandModel">
                                                    <a href="'.$dat["link_item"].'">
                                                        <div class="brandPicWrap"><img src="'.$site.'img/cases/catModels/'.$dat["img"].'" alt=""></div>
                                                        <h2>'.$dat[$lang].'</h2>
                                                    </a>
                                                </div> ';
                            }
                        }



            }
        }

?>


	</section>
