<?php
include "config.php";
?>
<!doctype html>
<html >
<head>
  <title>How to Reorder Images and Save to MySQL with jQuery AJAX</title>
  <link rel="stylesheet" href="jquery-ui.min.css">
  
  <style>
  #sortable { 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
    width: 90%; 
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
            $fetch_images = mysqli_query($con,"SELECT * FROM images_list ORDER BY sort ASC");
            
            while($row = mysqli_fetch_assoc($fetch_images)){
                $id = $row['id'];
                $name = $row['name'];
                $location = $row['location'];

                echo '<li class="ui-state-default" id="image_'.$id.'">
                        <img src="'.$location.'" title="'.$name.'" >
                      </li>';
            }
            
            ?>
        </ul>
    </div>
    <div style="clear: both; margin-top: 20px;">
        <input type='button' value='Submit' id='submit'>
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
    </script>
</body>
</html>
