<?php
/*
Name:healthcheckFile.php

purpose:to check server connection

Developer: haripriya
*/
/* original code starts */

//session starts here 
session_start();
//if session status has passed
if (isset($_SESSION['status'])) {
	//assigning session value to 'status'
	$status = $_SESSION['status'];
	//if status value in true
	if ($status=="true") {
?>
	<!doctype html>
<title>Site Maintenance</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>We&rsquo;ll be back soon!</h1>
    <div>
        <p>Sorry for the inconvenience Server Down!!.If you need, you can always contact us <a href="#"> contact.vizdum@gmail.com</a>, otherwise we&rsquo;ll be back online shortly!</p>
        <p>&mdash; The Team</p>
    </div>
</article>
<?php	
}
//closing session
}
?>
