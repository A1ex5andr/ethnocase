<?php if ( !defined('MITH') ) {exit;} 

if ($loc["0"] == "cases"){ $level = "2"; }

$menus = menu($lang, $level);
$i = "0";

check_link($menus);



?>

    <section class="container">

<?php 



    foreach($menus as $data)
        {
            
        	if ($data["parent"] == "0")
            {
            	if ($i == '1'){ echo "</div>"; $i = '0'; }
                echo '        <div class="catalog-brand">
                <header class="headline">
                    <h1><img class="headlineImg '.$data["class"].'" src="'.$site.'img/category/'.$data["img"].'" alt="'.$data["alt"].'"></h1>
                </header>';
            	$i = $i+1;
                $parent = $data["id"];
                
                    foreach($menus as $dat)
                        {
                            
                            if ($dat["parent"] == $parent){
                                echo '            <div class="brandModel">
                                                    <a href="'.$link.$loc["0"].'/'.$dat["link_item"].'/">
                                                        <div class="brandPicWrap"><img src="'.$site.'img/category/'.$dat["img"].'" alt="'.$dat[$lang].'"></div>
                                                        <h2>'.$dat[$lang].'</h2>
                                                    </a>
                                                </div> ';
                            }
                        }



            }
        }

?>

	</section>
