<?php
 /*
   Name: database connection
   version: 1
   purpose: connect to database,  
            put website under maintanance, 
			to check  server connection
   Developer: Haripriya
   */
   
   /* original code starts */
   
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "vizdum_constructions"; /* Database name */

$domain_name = "http://localhost/gallery-reorder/";
$con = mysqli_connect($host, $user, $password,$dbname);

//start session
session_start();
// Check connection
if (!$con) {
	//status is true
    $_SESSION['status'] = "true";
    //redirecting to heathcheckFile.php
    header('location:resources/healthCheckFile.php');
}

//change maintanance value to true,to keep the website in maintanance mode
$maintenance="";
if($maintenance==true)
{
	//status is true
    $_SESSION['maintenanceStatus'] = "true";
    //redirecting to maintanance.php
    header('location:resources/maintanance.php');
}

?>

