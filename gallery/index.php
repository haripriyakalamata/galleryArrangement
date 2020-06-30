<?php
include "config.php";
?>
<!doctype html>
<html >
<head>
  <title>How to Reorder Images and Save to MySQL with jQuery AJAX</title>
  <link rel="stylesheet" href="jquery-ui.min.css">
  
    <!--bootstrap styles-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>
  #sortable { 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
    width: 100%; 
  }
  #sortable li { 
    margin: 3px 3px 3px 0; 
    padding: 1px; 
    float: left; 
    border: 0;
    background: none;
  }
  #sortable li img{
    width: 180px;
    height: 140px;
  }
  .img-wrap {
    position: relative;
    display: inline-block;
    border: 1px red solid;
    font-size: 0;
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    background-color: #FFF;
    padding: 5px 2px 2px;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    opacity: .2;
    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
}
.img-wrap:hover .close {
    opacity: 1;
}
  </style>

  <script src="jquery-3.3.1.min.js"></script>
  <script src="jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
</head>
<body>
 
    <div style='float: left; width: 100%;'>
        <!-- List Images -->
        <ul id="sortable" >
            <?php
            // Fetch images
            $fetch_images = mysqli_query($con,"SELECT * FROM images_list where status != 'deactive' ORDER BY sort ASC");
            
            while($row = mysqli_fetch_assoc($fetch_images)){
                $id = $row['id'];
                $name = $row['name'];
                $location = $row['location'];

                echo '<li class="ui-state-default" id="image_'.$id.'">
				      <div class="img-wrap">
                       <span class="close">&times;</span>
                        <img src="'.$location.'" title="'.$name.'" data-id="'.$id.'"></div>
                      </li>';
            }
			
            ?>	
        </ul>
		
		 <div ><a  href="#" data-toggle="modal" data-target="#myModal"><img height="200" width="200" alt="" src="images/plus.png" /></a></div>
		
		
    </div>
    <div style="clear: both; margin-top: 20px;">
        <input type='button' value='Submit' id='submit'>
    </div>
	
	
	<!--popup box-->
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
	

    <script>
      $(document).ready(function(){

        // Initialize sortable
        $( "#sortable" ).sortable();

        // Save order
        $('#submit').click(function(){
            var imageids_arr = [];
            // get image ids order
            $('#sortable li').each(function(){
                var id = $(this).attr('id');
                var split_id = id.split("_");
                imageids_arr.push(split_id[1]);
            });

            // AJAX request
            $.ajax({
                url: 'ajaxfile.php',
                type: 'post',
                data: {imageids: imageids_arr},
                success: function(response){
                    alert('Save successfully.');
                }
            });
        });
      } );
	  
	$('.img-wrap .close').on('click', function() {
    var id = $(this).closest('.img-wrap').find('img').data('id');
    if(confirm('remove picture: ' + id))
		  $.ajax({
                url: 'ajaxfile2.php',
                type: 'post',
                data: {imageid: id},
                success: function(response){
                    $('#image_'+id).remove();
                }
            });
	;
});
			
    </script>
</body>
</html>
