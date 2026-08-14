@php
$title = "Map Uploader";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<link rel="stylesheet" type="text/css" media="all" href="js/tilezoom/jquery.tilezoom.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="js/tilezoom/jquery.tilezoom.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#edit-image').change(function () {
                var image = $('#edit-image').val();
                if (!image) return;
                $('#container').tilezoom('destroy');
                $('#container').tilezoom({
                    xml: 'dest/' + image + '.xml',
                    mousewheel: true
                });

            });
        });
    </script>

    <style type="text/css">
        #container {
            width: 800px;
            height: 600px;
            background-color: black;
            border: 1px solid black;
            color: white; /* for error messages, etc. */
            margin-top: 20px;
        }

        #content div.form-item {
            width: 100%;
            overflow: hidden;
            padding: 0.2em 0;
        }

        #content label {
            display: block;
            float: left;
            width: 100px;
        }
    </style>
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view recent-add-class-padding mt-40">
					
					<div class="panel-wrapper collapse in">
						<div class="panel-body">	
							
						
							<form action="/show_uploaded_image" enctype="multipart/form-data" method="post" accept-charset="UTF-8">
								{{ csrf_field() }}
							<div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section blog-add-section">
                                <div class="blog-img-uploaded">
                                    <figure class="edit-profile-image img-blogs">
                                        <img id="myImg" class="blog_img_upload" src="../assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
                                    </figure>
                                    <div class="text-center">
                                        <input type="file" name="upload" id="file-1" class="inputfile inputfile-1" required="required" />
                                        <label class="fileupload-blog addfileupload" for="file-1" style="width:180px !important;">Browse File</label>
                                        <input type="submit" name="upload" type="submit" value="submit" style="width:180px !important;display: inline-block;padding:0.625rem 1.25rem;font-size:17px;background: #01c853;margin-left: 15px; border: 1px solid #fff; color: #fff; overflow: initial !important;border-radius: 5px;">
                                    </div>
                                </div>
                            </div>
                         </form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

    <!-- /Row -->


@include('includes_admin.footer')
<script>
	$(document).ready(function(){
		
$(function () {
            $(":file").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

       function imageIsLoaded(e) {
            $('#myImg').attr('src', e.target.result);
        }
	});
	</script>

