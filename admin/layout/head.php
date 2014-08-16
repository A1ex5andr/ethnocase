<?php if ( !defined('MITH') ) {exit;} ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Etnocase</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
	<meta name = "format-detection" content = "telephone=no">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo $site; ?>admin/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo $site; ?>admin/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo $site; ?>admin/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
if (empty($_SESSION['user'])){

?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $site; ?>lesya-ukrainka">Ethnocase panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="puk" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Леся Українка</h1>
        <p>
<img src="<?php echo $site; ?>admin/img/lesya.jpg" align="left" hspace="10px">
    Гетьте, думи, ви хмари осінні!</br>
    То ж тепера весна золота!</br>
    Чи то так у жалю, в голосінні</br>
    Проминуть молодії літа?</br>
</br>
    Ні, я хочу крізь сльози сміятись,</br>
    Серед лиха співати пісні,</br>
    Без надії таки сподіватись,</br>
    Жити хочу! Геть, думи сумні!</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="http://uk.wikipedia.org/wiki/%D0%9B%D0%B5%D1%81%D1%8F_%D0%A3%D0%BA%D1%80%D0%B0%D1%97%D0%BD%D0%BA%D0%B0">Дізнатися більше &raquo;</a></p>
      </div>
    </div>

    <div class="container">


      <hr>

<?php 
}else{
?>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $site; ?>lesya-ukrainka">Ethnocase panel</a>
        </div>
        <div class="navbar-collapse collapse">

 <ul class="nav navbar-nav">
        <li <?php if ($loc["1"] == "news"){ echo 'class="active"'; } ?>><a href="<?php echo $asite; ?>news"><?php echo $texts['news']; ?></a></li>
        <li <?php if ($loc["1"] == "cars"){ echo 'class="active"'; } ?>><a href="<?php echo $asite; ?>cars"><?php echo $texts['cars']; ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>


        </div><!--/.navbar-collapse -->
      </div>
    </div>

<div style="padding-top:80px;"></div>

<?php
}
?>