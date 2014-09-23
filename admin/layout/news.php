<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

if (!empty($form['remove'])) {

	$news = adm_news_one("eng", $form['remove']);

		if ($news[0]['id'] == $form['remove']){
			$file = "/home/ethnocas/ethnocase.com/new/img/news/".$news[0]['img'];
			unlink($file);
			    $database = new medoo();
     
			    $database->delete("news", [
			    "AND" => [
			    "id" => $news[0]['id']
			    ]
			    ]);
		}
}

if ((!empty($form['link_items'])) && ($form['act'] == "add")) {

		//image upload
		$filename = "img/news/".$form["link_items"]."-".basename($_FILES['img']['name']);
		$img = $form["link_items"]."-".basename($_FILES['img']['name']);

		   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
		   {
		     move_uploaded_file($_FILES["img"]["tmp_name"], $filename);
		   }
		//#image upload


	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }

		$database = new medoo();

		$last_user_id = $database->insert("news", [
		"link_item" => $form["link_items"],
		"img" => $img,
		"eng" => $form["titlee"],
		"rus" => $form["titler"],
		"ukr" => $form["titleu"],
		"eng_txt" => $form["texte"],
		"rus_txt" => $form["textr"],
		"ukr_txt" => $form["textu"],
		"top" => $top,
		"active" => $active
		]);

}elseif($form['act'] == "edit") {

	if (!empty($_FILES["img"]["tmp_name"])){
		//image upload
		$filename = "img/news/".$form["link_items"]."-".basename($_FILES['img']['name']);
		$img = $form["link_items"]."-".basename($_FILES['img']['name']);

		   if(is_uploaded_file($_FILES["img"]["tmp_name"]))
		   {
		     move_uploaded_file($_FILES["img"]["tmp_name"], $filename);
		   }
		//#image upload
	}else{
		$img = $form["img_old"];
	}

	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }

	$database = new medoo();

	$database->update("news", [
		"link_item" => $form["link_items"],
		"img" => $img,
		"eng" => $form["titlee"],
		"rus" => $form["titler"],
		"ukr" => $form["titleu"],
		"eng_txt" => $form["texte"],
		"rus_txt" => $form["textr"],
		"ukr_txt" => $form["textu"],
		"top" => $top,
		"active" => $active
	], [
	"id" => $form["id"]
	]);

}elseif(!empty($form['links'])) {

	if ($form["top"] == "1") { $top = "1"; } else { $top = "0"; }
	if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }

	$database = new medoo();

	$database->update("news", [
		"top" => $top,
		"active" => $active
	], [
	"link_item" => $form["links"]
	]);

}



$news = adm_news($lang, '0', '100');
$txt = $lang."_txt";

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
	$titleu = "";
	$titler = "";
	$titlee = "";
	$txtu = "";
	$txtr = "";
	$txte = "";
	$top = "";
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
			<input name="titleu" type="text" class="form-control" placeholder="ukr" value="<?php echo $titleu; ?>"></br>
			<input name="titler" type="text" class="form-control" placeholder="rus" value="<?php echo $titler; ?>"></br>
			<input name="titlee" type="text" class="form-control" placeholder="eng" value="<?php echo $titlee; ?>"></br>
		</td>
	</tr>
	<tr>
		<td>Text</td>
		<td>
			<textarea name="textu" class="form-control" rows="3" placeholder="ukr"><?php echo $txtu; ?></textarea></br>
			<textarea name="textr" class="form-control" rows="3" placeholder="rus"><?php echo $txtr; ?></textarea></br>
			<textarea name="texte" class="form-control" rows="3" placeholder="eng"><?php echo $txte; ?></textarea></br>
		</td>
	</tr>
	<tr>
		<td>TOP</td>
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
		<th>TOP</th>
		<th>ACTIVE</th>
		<th>Action</th>
	</tr>
<?php 
foreach($news as $data)
	{
		if ($data["top"] == "1") { $top = "checked"; } else { $top = ""; }
		if ($data["active"] == "1") { $active = "checked"; } else { $active = ""; }
		echo '	<tr>
		<td><form role="form" method="post" enctype="multipart/form-data" name="ed">'.$data["id"].'</td>
		<td><img src="'.$site.'img/news/'.$data["img"].'" width="50%" height="50%" alt=""></td>
		<td><a href="'.$asite.'news/'.$data["id"].'">'.$data[$lang].'</a></td>
		<td><input type="checkbox" name="top" value="1" '.$top.'></td>
		<td><input type="checkbox" name="active" value="1" '.$active.'></td>
		<td><input type="hidden" name="links" value="'.$data["link_item"].'"><button type="submit" class="btn btn-default">Submit</button></form> <br> <form role="form" method="post" enctype="multipart/form-data" name="del"><input type="hidden" name="remove" value="'.$data["id"].'"><button type="submit" class="btn btn-default">Remove</button></form></td>
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