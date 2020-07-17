<?php
   /*
   Name:website
   
   version: 1
   purpose: single page web
   
   Developer: Haripriya
   */
   
   /* original code starts */
   //including dbconfig file
 include "resources/dbconfig/dbconfig.php";
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>VIZDUM CONSTRUCTIONS</title>
      <!-- Favicon -->
      <link rel="icon" href="images/vizdum-logo.png" type="image/x-icon" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />


   </head>
   <body>
      
      <!-- Our gallery Area -->
      <section class="featured_works row" >
         <div  class="featured_gallery">
            <?php
               // Fetch images
               $fetch_images = mysqli_query($con,"SELECT * FROM gallery where status != 'deactive' ORDER BY imageOrder ASC");
               
               while($row = mysqli_fetch_assoc($fetch_images)){
                   $id = $row['id'];
                   $title = $row['title'];
                   $imagePath = $row['imagePath'];
               
                   echo ' 
				   
				   <div class="col-md-3 col-sm-4 col-xs-6" id="image_'.$id.' style="height:300px;">
				   
               <div class="thumbnail" >
                         
                           <img class="rounded img-responsive" src="'.$imagePath.'" title="'.$title.'" data-id="'.$id.' style="display: block;
  max-width: 100%;
  height: auto; ">
                         
                        <div class="caption">
                       <p>'.$title.'</p>
                         </div>
                 </div> 
               
               </div>';
               }
               
               ?>	         
         </div>
      </section>
      <!-- End Our gallery Area -->

      <!-- jQuery JS -->
      <script
         src="https://code.jquery.com/jquery-1.12.0.min.js"
         integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
         crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   </body>
</html>