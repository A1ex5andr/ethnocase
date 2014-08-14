<?php if ( !defined('MITH') ) {exit;} ?>

<?php 

if (!empty($form["email"]) && (!empty($form["puk"]))){

  $users = users($form["email"]);
  
  if (($form["email"] == $users["0"]["email"]) && ($users["0"]["password"] == md5(md5($form["puk"])))) {

    $_SESSION['user'] = $users["0"]["user"];
    
  }
}

  require_once("admin/layout/head.php");


if (!empty($_SESSION['users'])){

  if ($loc["0"] == "news"){

    require_once("admin/layout/news.php");

  }

exit;  
}


?>
