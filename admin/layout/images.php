<?php if ( !defined('MITH') ) {exit;} ?>
<?php 

if ($form['act'] == "add") {

		//image upload
for($i=0; $i<count($_FILES['img']['name']); $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['img']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "img/".$form['type']."/" . $_FILES['img']['name'][$i];
    $img = basename($_FILES['img']['name'][$i]);
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      if ($form["active"] == "1") { $active = "1"; } else { $active = "0"; }


		$database = new medoo();
 
		$last_user_id = $database->insert("images", [
		"parent" => $form["parent"],
		"name" => $img,
		"type" => $form["type"],
		"alt" => $form["alt"],
		"active" => $active
		]);

 echo $database->last_query();   
 var_dump($database->error());

    }
  }
}


		//#image upload



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



$images = adm_images();
$cases = adm_cases();
$name = "name_".$lang;
$model = "model_".$lang;


?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">

<form role="form" method="post" enctype="multipart/form-data">
<table class="table table-hover">
	<tr>
		<td>Type</td>
		<td>
			<select class="form-control" name="type">
				<option value="cases" <?php echo $type; ?>>Cases</option>
				<option value="cars" <?php echo $type; ?>>Cars</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Model</td>
		<td>
			<select class="form-control" name="parent">
<?php 
		foreach ($cases as $case) {
			echo '<option value="'.$case["id"].'">'.$case[$model].' - '.$case[$name].'</option>';	
		}
?>
			</select>
		</td>
	</tr>
	<tr>
		<td>IMG</td>
		<td><input name="img[]" type="file" id="exampleInputFile">
    		<p class="help-block"><input name="alt[]" type="text" class="form-control" placeholder="alt" value=""></p></td>
	</tr>
	<tr>
		<td>IMG</td>
		<td><input name="img[]" type="file" id="exampleInputFile">
    		<p class="help-block"><input name="alt[]" type="text" class="form-control" placeholder="alt" value=""></p></td>
	</tr>
	<tr>
		<td>IMG</td>
		<td><input name="img[]" type="file" id="exampleInputFile">
    		<p class="help-block"><input name="alt[]" type="text" class="form-control" placeholder="alt" value=""></p></td>
	</tr>
	<tr>
		<td>IMG</td>
		<td><input name="img[]" type="file" id="exampleInputFile">
    		<p class="help-block"><input name="alt[]" type="text" class="form-control" placeholder="alt" value=""></p></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="hidden" name="act" value="add"><button type="submit" class="btn btn-default">Submit</button></td>
	</tr>
</table>
</form>

<table class="table table-hover">
	<tr>
		<th>#</th>
		<th>IMG</th>
		<th>NAME</th>
		<th>ALT</th>
		<th>PARENT</th>
		<th>TYPE</th>
		<th>ACTIVE</th>
		<th>Action</th>
	</tr>
<?php 
foreach($images as $data)
	{
		if ($data["active"] == "1") { $active = "checked"; } else { $active = ""; }
		
		echo '	<tr>
		<td><form role="form" method="post" enctype="multipart/form-data">'.$data["id"].'</td>
		<td><img src="'.$site.'img/cases/'.$data["name"].'" width="30%" height="30%" alt=""></td>
		<td><a href="'.$asite.'images/'.$data["id"].'">'.$data["name"].'</a></td>
		<td>'.$data["alt"].'</td>
		<td>'.$data["parent"].'</td>
		<td>'.$data["type"].'</td>
		<td><input type="checkbox" name="active" value="1" '.$active.'></td>
		<td><input type="hidden" name="links" value="'.$data["id"].'"><button type="submit" class="btn btn-default">Submit</button></form></td>
	</tr>';
	}
?>

</table>

	</div>
  <div class="col-md-2"></div>
</div>