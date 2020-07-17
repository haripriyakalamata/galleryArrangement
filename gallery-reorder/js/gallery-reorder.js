
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
                url: 'server.php',
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
                url: 'server.php',
                type: 'post',
                data: {imageid: id},
                success: function(response){
                    $('#image_'+id).remove();
                }
            });
	;
});
			
    