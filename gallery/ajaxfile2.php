<?php

include "config.php";

$imageid = $_POST['imageid'];


	mysqli_query($con,"UPDATE images_list SET status='deactive' WHERE id=$imageid ");


echo "Update successfully";
exit;