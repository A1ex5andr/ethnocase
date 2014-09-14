<?php

$files = glob('*'); // get all file names
foreach($files as $file){ // iterate files
	echo $file."<br>";
  if(is_file($file))
    rename ("./".$file, "./a_".$file);
print_r(error_get_last());
}

?>