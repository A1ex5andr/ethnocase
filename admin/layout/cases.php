<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

if ((!empty($form['link_items'])) && ($form['act'] == "add")) {

	$menu = menu($lang, '2');
	foreach ($menu as $menus) { if($form["parent"] == $menus["id"]) { $menu_id = $menus["link_item"]; } }

		//image upload
		$filename = "img/cases/".$menu_id."/".$form["link_items"]."-".basename($_FILES['img']['name']);
		$img = $form["link_items"]."-".basename($_FILES['img']['name']);

		   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
		   {
		     move_uploaded_file($_FILES["img"]["tmp_name"], $filename);
		   }
		//#image upload


	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }
	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
	if ($form["new"] == "1") { $new = "1"; } else { $new = "0"; }
	if ($form["sale"] == "1") { $sale = "1"; } else { $sale = "0"; }
	if ($form["price"] == "") { $price = "0"; } else { $price = $form["price"]; }
	if ($form["price_old"] == "") { $price_old = "0"; } else { $price_old = $form["price_old"]; }

		$database = new medoo();

		$last_user_id = $database->insert("cases", [
		"link_item" => $form["link_items"],
		"img" => $img,
		"parent" => $form["parent"],
		"name_eng" => $form["namee"],
		"name_rus" => $form["namer"],
		"name_ukr" => $form["nameu"],
		"model_eng" => $form["modele"],
		"model_rus" => $form["modelr"],
		"model_ukr" => $form["modelu"],
		"about_eng" => $form["aboute"],
		"about_ukr" => $form["aboutr"],
		"about_rus" => $form["aboutu"],
		"price" => $price,
		"price_old" => $price_old,
		"active" => $active,
		"top" => $top,
		"new" => $new,
		"sale" => $sale
		]);
}

elseif($form['act'] == "edit") {

	$menu = menu($lang, '2');
	foreach ($menu as $menus) { if($form["parent"] == $menus["id"]) { $menu_id = $menus["link_item"]; } }

	if (!empty($_FILES["img"]["tmp_name"])){
		//image upload
		$filename = "img/cases/".$menu_id."/".$form["link_items"]."-".basename($_FILES['img']['name']);
		$img = $form["link_items"]."-".basename($_FILES['img']['name']);

		   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
		   {
		     move_uploaded_file($_FILES["img"]["tmp_name"], $filename);
		   }
		//#image upload
	}else{
		$img = $form["img_old"];
	}

	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }
	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
	if ($form["new"] == "1") { $new = "1"; } else { $new = "0"; }
	if ($form["sale"] == "1") { $sale = "1"; } else { $sale = "0"; }
	if ($form["price"] == "") { $price = "0"; } else { $price = $form["price"]; }
	if ($form["price_old"] == "") { $price_old = "0"; } else { $price_old = $form["price_old"]; }

	$database = new medoo();

	$database->update("cases", [
		"link_item" => $form["link_items"],
		"img" => $img,
		"parent" => $form["parent"],
		"name_eng" => $form["namee"],
		"name_rus" => $form["namer"],
		"name_ukr" => $form["nameu"],
		"model_eng" => $form["modele"],
		"model_rus" => $form["modelr"],
		"model_ukr" => $form["modelu"],
		"about_eng" => $form["aboute"],
		"about_ukr" => $form["aboutr"],
		"about_rus" => $form["aboutu"],
		"price" => $price,
		"price_old" => $price_old,
		"active" => $active,
		"top" => $top,
		"new" => $new,
		"sale" => $sale
	], [
	"id" => $form["id"]
	]);

}elseif(!empty($form['links'])) {

	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }
	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
	if ($form["new"] == "1") { $new = "1"; } else { $new = "0"; }
	if ($form["sale"] == "1") { $sale = "1"; } else { $sale = "0"; }

	$database = new medoo();

	$database->update("cases", [
		"active" => $active,
		"top" => $top,
		"new" => $new,
		"sale" => $sale
	], [
	"link_item" => $form["links"]
	]);

}



$cases = adm_cases();
$menu = menu($lang, '2');


if (!empty($loc["2"])){
	$cases_one = adm_cases_one($loc["2"]);
	$link_item = $cases_one['0']['link_item'];
	$img = '<input type="hidden" name="img_old" value="'.$cases_one['0']['img'].'">';
	$parent = $cases_one['0']['parent'];
	$name_eng = $cases_one['0']['name_eng'];
	$name_ukr = $cases_one['0']['name_ukr'];
	$name_rus = $cases_one['0']['name_rus'];
	$model_eng = $cases_one['0']['model_eng'];
	$model_ukr = $cases_one['0']['model_ukr'];
	$model_rus = $cases_one['0']['model_rus'];
	$about_eng = $cases_one['0']['about_eng'];
	$about_ukr = $cases_one['0']['about_ukr'];
	$about_rus = $cases_one['0']['about_rus'];
	if ($cases_one['0']["price"] == "0") { $price = "0"; } else { $price = $cases_one['0']["price"]; }
	if ($cases_one['0']["price_old"] == "0") { $price_old = "0"; } else { $price_old = $cases_one['0']["price_old"]; }
	if ($cases_one['0']['active'] == "1") { $active = "checked"; } else { $active = ""; }
	if ($cases_one['0']['top'] == "1") { $top = "checked"; } else { $top = ""; }
	if ($cases_one['0']['new'] == "1") { $new = "checked"; } else { $new = ""; }
	if ($cases_one['0']['sale'] == "1") { $sale = "checked"; } else { $sale = ""; }
	$y = '<input type="hidden" name="act" value="edit"><input type="hidden" name="id" value="'.$cases_one['0']['id'].'">';
	
	
}else{

	$link_item = "";
	$parent = "";
	$img = "";
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
	$top = "";
	$new = "";
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
		<td>Catalog</td>
		<td>
			<select class="form-control" name="parent">
			  <?php
			  	foreach ($menu as $menus) {
			  		if ($menus["id"] == $parent){ $cat = "selected"; } else { $cat = ""; }
			  		if (!empty($menus[$lang])) { echo '<option value="'.$menus["id"].'" '.$cat.'>'.$menus[$lang].'</option>'; }
			  	}
			  ?>
			</select>
		</td>
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
		<td><input name="price" type="text" class="form-control" placeholder="Price" value="<?php echo $price; ?>"></td>
	</tr>
	<tr>
		<td>Price old</td>
		<td><input name="price_old" type="text" class="form-control" placeholder="Price old" value="<?php echo $price_old; ?>"></td>
	</tr>
	<tr>
		<td>Active</td>
		<td><input name="active" type="checkbox" value="1" <?php echo $active; ?>></td>
	</tr>
	<tr>
		<td>New</td>
		<td><input name="new" type="checkbox" value="1" <?php echo $new; ?>></td>
	</tr>
	<tr>
		<td>Top</td>
		<td><input name="top" type="checkbox" value="1" <?php echo $top; ?>></td>
	</tr>
	<tr>
		<td>Sale</td>
		<td><input name="sale" type="checkbox" value="1" <?php echo $sale; ?>></td>
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
		<th>CATALOG</th>
		<th>TEXT</th>
		<th>PRICE</th>
		<th>ACTIVE</th>
		<th>TOP</th>
		<th>NEW</th>
		<th>SALE</th>
		<th>Action</th>
	</tr>
<?php 
foreach($cases as $data)
	{
		if ($data["active"] == "1") { $active = "checked"; } else { $active = ""; }
		if ($data["top"] == "1") { $top = "checked"; } else { $top = ""; }
		if ($data["new"] == "1") { $new = "checked"; } else { $new = ""; }
		if ($data["sale"] == "1") { $sale = "checked"; } else { $sale = ""; }
		foreach ($menu as $menus) { if($data["parent"] == $menus["id"]) { $menu_item = $menus[$lang]; $menu_id = $menus["link_item"]; } }
		echo '	<tr>
		<td><form role="form" method="post" enctype="multipart/form-data">'.$data["id"].'</td>
		<td><img src="'.$site.'img/cases/'.$menu_id.'/'.$data["img"].'" width="30%" height="30%" alt=""></td>
		<td>'.$menu_item.'</td>
		<td><a href="'.$asite.'cases/'.$data["id"].'">'.$data["name_ukr"].'</a></td>
		<td>'.$data["price"].'</br>'.$data["price_old"].'</td>
		<td><input type="checkbox" name="active" value="1" '.$active.'></td>
		<td><input type="checkbox" name="top" value="1" '.$top.'></td>
		<td><input type="checkbox" name="new" value="1" '.$new.'></td>
		<td><input type="checkbox" name="sale" value="1" '.$sale.'></td>
		<td><input type="hidden" name="links" value="'.$data["link_item"].'"><button type="submit" class="btn btn-default">Submit</button></form></td>
	</tr>';
	}
?>


</table>

	</div>
  <div class="col-md-2"></div>
</div>