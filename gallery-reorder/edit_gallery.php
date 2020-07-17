<?php
   /*
   Name: edit gallery 
   version: 1
   purpose: admin can add,reorder,delete images in gallery
   Developer: Haripriya
   */
   
   /* original code starts */
   //including dbconfig file
include "resources/dbconfig/dbconfig.php";
   ?>
<!doctype html>
<html >
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>VIZDUM CONSTRUCTIONS</title>
      <!-- Favicon -->
       <link rel="icon" href="images/vizdum-logo.png" type="image/x-icon" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- Gallery reorder CSS -->
      <link rel="stylesheet" href="vendors/image-reorder/jquery-ui.min.css">
      <!-- Page CSS -->
      <link rel="stylesheet" href="css/gallery-reorder.css">
   </head>
   <body>
   
      <!--Gallery Arrangement Area-->
      <section>
      <div style='float: left; width: 100%;'>
         <!-- List Images -->
         <ul id="sortable" >
            <?php
               // Fetch images
               $fetch_images = mysqli_query($con,"SELECT * FROM gallery where status != 'deactive' ORDER BY imageOrder ASC");             
               while($row = mysqli_fetch_assoc($fetch_images)){
                   $id = $row['id'];
                   $title = $row['title'];
                   $imagePath = $row['imagePath'];
                   echo '<li class="ui-state-default" id="image_'.$id.'">
                            <div class="img-wrap">
							<span class="close">&times;</span>
							<img src="'.$imagePath.'" title="'.$title.'" data-id="'.$id.'">
							</div>
                         </li>';
               }               
               ?>	
         </ul>
         <div ><a  href="#" data-toggle="modal" data-target="#myModal"><img height="200" width="200" alt="" src="images/plus.png" /></a></div>
      </div>
      <div style="clear: both; margin-top: 20px;">
         <input type='button' value='Submit' id='submit'>
      </div>
	  </section>
    <!--End of Gallery Arrangement Area-->
	  
	  
	  
      <!--popup box-->
	  <section>
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <form name="myForm" action="server.php" method="post" enctype="multipart/form-data"
                     onsubmit="return gallery_images()">
                     <h3 class="title">Upload files</h3>
                     <div class="form-group">
                        <label for="Vehicle">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <span id="titleerr" class="text-danger form-weight-bold">*</span><br>
                     </div>
                     <div class="form-group">
                        <label for="tos">Select Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" />
                        <span class="text-danger form-weight-bold" id="fileErr">*</span><br>
                     </div>
                     <button id="addBtn" type="submit" class="btn"
                        OnClick="addBtn_Click" name="images"><i class="fa fa-cloud-upload" aria-hidden="true">Upload</i></button>
                  </form>
               </div>
            </div>
         </div>
      </div>
	  </section>
	  <!--End popup box-->
	  
	  
	    <!-- Bootstrap Jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	   <!-- Bootstrap Js -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
	   <!-- page ajax script  -->
      <script src="js/gallery-reorder.js"></script>
	   <!-- image-reorder Jquery -->
      <script src="vendors/image-reorder/jquery-ui.min.js"></script>
	   <!-- touch punch Jquery -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
   </body>
</html>