<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<link href="http://demos.codexworld.com/includes/css/style.css" rel="stylesheet">
	<style type="text/css">
		.none {
		    display: none;
		}
	</style>
</head>
<body>
	<form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="/tempuploaderprocess">
		{{csrf_field()}}
	    <input type="hidden" name="image_form_submit" value="1"/>
	    <label>Choose Image</label>
	    <input type="file" name="images[]" id="images" multiple >
	    <div class="uploading none">
	        <label>&nbsp;</label>
	        <img src="http://demos.codexworld.com/upload-multiple-images-using-jquery-ajax-php/uploading.gif" alt="uploading......"/>
	    </div>
	    <input type="button" name="" value="Submit" id="submit">
	</form>
	<div id="images_preview">
		<?php
			if(!empty($images_arr)){ 
			    foreach($images_arr as $image_src){ ?>
			        <ul>
			            <li >
			                <img src="<?php echo $image_src; ?>" alt="">
			            </li>
			        </ul>
			<?php }
			}
		?>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://demos.codexworld.com/upload-multiple-images-using-jquery-ajax-php/jquery.form.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $('#submit').on('click',function(){
	    	//alert("hello");
	        $('#multiple_upload_form').ajaxForm({
	            //display the uploaded images
	            target:'#images_preview',
	            beforeSubmit:function(e){
	                $('.uploading').show();
	            },
	            success:function(e){
	                $('.uploading').hide();
	            },
	            error:function(e){
	            }
	        }).submit();
	    });
	});
	</script>
</body>
</html>