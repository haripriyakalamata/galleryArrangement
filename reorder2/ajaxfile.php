<?php

include "config.php";

$imageids_arr = $_POST['imageids'];

// Update sort position of images
$position = 1;
foreach($imageids_arr as $id){
	mysqli_query($con,"UPDATE fieldActivity1 SET image_order=".$position." WHERE id=".$id);
	$position ++;
}

echo "Update successfully";
exit;
