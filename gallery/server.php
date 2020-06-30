<?php

include "config.php";
//adding new images for gallery
if (isset($_POST['images'])) {
    $title      = $_POST['title'];
 
    $target_dir = "images";
 

    //changing the file name into '.png' along with timestamp
    $imageName = rand() . "_" . time() . ".png";
    $target_dir = $target_dir . "/" . $imageName;
    //moving temp file into target directory
    try {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {
            $filepath = "images/".$imageName;
        }
        //if file not uploaded
        else {
            throw new DbException('This file not uploaded' . " -> " . rand() . "_" . time() . ".png");
        }
    }
    catch (DbException $file) {
        //display error message
        $file->fileerror();
        //creating log
        logToFile($filelog, $file, 1);
    }
    //inserting all the details and filepath into  table
    $insert = mysqli_query($con, "INSERT INTO images_list(name,location,timemodified)values('$title','$filepath',NOW())");
    try {
        if ($insert) {
            //on successfull insertion passing the session 
            $_SESSION['success'] = "Image Uploaded";
            #redirecting to 'index.php' page
            header('location:index.php');
        }
        #error in query 'insert'
        else {
            #on failure passing error session
            $_SESSION['error'] = "try again";
            #redirecting to 'index.php' page
            header('location:index.php');
            #throwing an exception
            throw new DbException($insert);
        }
    }
    #catching exception
    catch (DbException $ex) {
        //display error message
        $ex->errorMessage();
        //creating log
        logToFile($errlog, $ex, 1);
    }
    
}
?>

