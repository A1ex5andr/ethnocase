<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

// if ((!empty($form['link_items'])) && ($form['act'] == "add")) {

// 		//image upload
// 		$filename = "img/news/".$form["link_items"]."-".basename($_FILES['img']['name']);
// 		$img = $form["link_items"]."-".basename($_FILES['img']['name']);

// 		   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
// 		   {
// 		     move_uploaded_file($_FILES["img"]["tmp_name"], $filename);
// 		   }
// 		//#image upload


// 	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
// 	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }

// 		$database = new medoo();

// 		$last_user_id = $database->insert("news", [
// 		"link_item" => $form["link_items"],
// 		"img" => $img,
// 		"eng" => $form["titlee"],
// 		"rus" => $form["titler"],
// 		"ukr" => $form["titleu"],
// 		"eng_txt" => $form["texte"],
// 		"rus_txt" => $form["textr"],
// 		"ukr_txt" => $form["textu"],
// 		"top" => $top,
// 		"active" => $active
// 		]);

// }elseif($form['act'] == "edit") {

// 	if (!empty($_FILES["img"]["tmp_name"])){
// 		//image upload
// 		$filename = "img/news/".$form["link_items"]."-".basename($_FILES['img']['name']);
// 		$img = $form["link_items"]."-".basename($_FILES['img']['name']);

// 		   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
// 		   {
// 		     move_uploaded_file($_FILES["img"]["tmp_name"], $filename);
// 		   }
// 		//#image upload
// 	}else{
// 		$img = $form["img_old"];
// 	}

// 	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
// 	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }

// 	$database = new medoo();

// 	$database->update("news", [
// 		"link_item" => $form["link_items"],
// 		"img" => $img,
// 		"eng" => $form["titlee"],
// 		"rus" => $form["titler"],
// 		"ukr" => $form["titleu"],
// 		"eng_txt" => $form["texte"],
// 		"rus_txt" => $form["textr"],
// 		"ukr_txt" => $form["textu"],
// 		"top" => $top,
// 		"active" => $active
// 	], [
// 	"id" => $form["id"]
// 	]);

// }elseif(!empty($form['links'])) {

// 	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
// 	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }

// 	$database = new medoo();

// 	$database->update("news", [
// 		"top" => $top,
// 		"active" => $active
// 	], [
// 	"link_item" => $form["links"]
// 	]);

// }



$cars = adm_cars();


if (!empty($loc["2"])){
	$news_one = adm_news_one($lang, $loc["2"]);

	$link_item = $news_one['0']['link_item'];
	$img = '<input type="hidden" name="img_old" value="'.$news_one['0']['img'].'">';
	$titleu = $news_one['0']['ukr'];
	$titler = $news_one['0']['rus'];
	$titlee = $news_one['0']['eng'];
	$txtu = $news_one['0']['ukr_txt'];
	$txtr = $news_one['0']['rus_txt'];
	$txte = $news_one['0']['eng_txt'];
	if ($news_one['0']['top'] == "1") { $top = "checked"; } else { $top = ""; }
	if ($news_one['0']['active'] == "1") { $active = "checked"; } else { $active = ""; }
	$y = '<input type="hidden" name="act" value="edit"><input type="hidden" name="id" value="'.$news_one['0']['id'].'">';
	
	
}else{

	$link_item = "";
	$img = "";
	$catalog = "";
	$name_eng = "";
	$name_ukr = "";
	$name_rus = "";
	$model_eng = "";
	$model_ukr = "";
	$model_rus = "";
	$about_eng = "";
	$about_ukr = "";
	$about_rus = "";
	$price = "";
	$price_old = "";
	$disc = "";
	$sale = "";

	$active = "checked";
	$y = '<input type="hidden" name="act" value="add">';

}
?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">

<form role="form" method="post" enctype="multipart/form-data">
<table class="table table-hover">
	<tr>
		<td>link_item</td>
		<td><input name="link_items" type="text" class="form-control" placeholder="Text input" value="<?php echo $link_item; ?>"></td>
	</tr>
	<tr>
		<td>IMG</td>
		<td><input name="img" type="file" id="exampleInputFile"><?php echo $img; ?>
    		<p class="help-block">Example block-level help text here.</p></td>
	</tr>
	<tr>
		<td>Title</td>
		<td>
			<input name="nameu" type="text" class="form-control" placeholder="ukr" value="<?php echo $name_ukr; ?>"></br>
			<input name="namer" type="text" class="form-control" placeholder="rus" value="<?php echo $name_rus; ?>"></br>
			<input name="namee" type="text" class="form-control" placeholder="eng" value="<?php echo $name_eng; ?>"></br>
		</td>
	</tr>
	<tr>
		<td>Model</td>
		<td>
			<textarea name="modelu" class="form-control" rows="3" placeholder="ukr"><?php echo $model_ukr; ?></textarea></br>
			<textarea name="modelr" class="form-control" rows="3" placeholder="rus"><?php echo $model_rus; ?></textarea></br>
			<textarea name="modele" class="form-control" rows="3" placeholder="eng"><?php echo $model_eng; ?></textarea></br>
		</td>
	</tr>
	<tr>
		<td>About</td>
		<td>
			<textarea name="aboutu" class="form-control" rows="3" placeholder="ukr"><?php echo $about_ukr; ?></textarea></br>
			<textarea name="aboutr" class="form-control" rows="3" placeholder="rus"><?php echo $about_rus; ?></textarea></br>
			<textarea name="aboute" class="form-control" rows="3" placeholder="eng"><?php echo $about_eng; ?></textarea></br>
		</td>
	</tr>
	<tr>
		<td>Price</td>
		<td><input name="price" type="checkbox" value="1" <?php echo $price; ?>></td>
	</tr>
	<tr>
		<td>Price old</td>
		<td><input name="price_old" type="checkbox" value="1" <?php echo $price_old; ?>></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><input name="top" type="checkbox" value="1" <?php echo $top; ?>></td>
	</tr>
	<tr>
		<td>Active</td>
		<td><input name="active" type="checkbox" value="1" <?php echo $active; ?>></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $y; ?><button type="submit" class="btn btn-default">Submit</button></td>
	</tr>
</table>
</form>

<table class="table table-hover">
	<tr>
		<th>#</th>
		<th>IMG</th>
		<th>TEXT</th>
		<th>PRICE</th>
		<th>ACTIVE</th>
		<th>Action</th>
	</tr>
<?php 
foreach($cars as $data)
	{
		if ($data["active"] == "1") { $active = "checked"; } else { $active = ""; }
		echo '	<tr>
		<td><form role="form" method="post" enctype="multipart/form-data">'.$data["id"].'</td>
		<td><img src="'.$site.'img/auto/'.$data["img"].'" width="50%" height="50%" alt=""></td>
		<td><a href="'.$asite.'cars/'.$data["id"].'">'.$data["name_ukr"].'</a></td>
		<td>'.$data["price"].'</td>
		<td><input type="checkbox" name="active" value="1" '.$active.'></td>
		<td><input type="hidden" name="links" value="'.$data["link_item"].'"><button type="submit" class="btn btn-default">Submit</button></form></td>
	</tr>';
	}
?>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
</table>

	</div>
  <div class="col-md-2"></div>
</div>