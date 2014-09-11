<?php if ( !defined('MITH') ) {exit;} ?>
<?php 
require_once("layout/head.php");
require_once("layout/header.php");

unset($_SESSION['cart']);

?>



<!--     <header class="container">
        <div class="headLogo">
            <a href="//ethnocase.com">
                <img src="http://new.ethnocase.com/img/logo.jpg" alt="" class="logo">
            </a>
        </div>

    </header> -->

        <div class="slogan container">
            <h1><?php echo $texts['thankyou']; ?></h1>
        </div>
<?php require_once("layout/contacts.php"); ?>
    </body>
</html>
