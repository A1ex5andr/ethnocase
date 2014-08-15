<?php if ( !defined('MITH') ) {exit;} ?>
<?php 
$news = news($lang, '0', '100');
$txt = $lang."_txt";

if (!empty($loc["2"])){
	$news_one = news_one($lang, $loc["2"]);
	$txt_one = $lang."_txt";
}
?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">

<form role="form" method="post" enctype="multipart/form-data">
<table class="table table-hover">
	<tr>
		<td>link_item</td>
		<td><input type="text" class="form-control" placeholder="Text input"></td>
	</tr>
	<tr>
		<td>IMG</td>
		<td><input type="file" id="exampleInputFile">
    		<p class="help-block">Example block-level help text here.</p></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><input type="text" class="form-control" placeholder="Text input"></td>
	</tr>
	<tr>
		<td>Text</td>
		<td><textarea class="form-control" rows="3"></textarea></td>
	</tr>
	<tr>
		<td>TOP</td>
		<td><input type="checkbox" value="1"></td>
	</tr>
	<tr>
		<td>Active</td>
		<td><input type="checkbox" value="1"></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit" class="btn btn-default">Submit</button></td>
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
		<td><form role="form" method="post" enctype="multipart/form-data">'.$data["id"].'</td>
		<td>'.$data["img"].'</td>
		<td>'.$data[$lang].'</td>
		<td><input type="checkbox" name="top" value="1" '.$top.'></td>
		<td><input type="checkbox" name="active" value="1" '.$active.'></td>
		<td><input type="hidden" name="top" value="'.$data["link_item"].'"><button type="submit" class="btn btn-default">Submit</button></form></td>
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