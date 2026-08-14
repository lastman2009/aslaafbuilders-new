@php
$title = "Add Blog";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <div class="tab-content">
                        <form action="/blogs" class="form-horizontal" method="post" enctype="multipart/form-data">
        						{{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-6 col-md-6 col-sm-12 blog-portion padding-left">
                                        <div class="panel panel-default card-view blog-image-height">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="title" value="" placeholder="Blog Title" required />
                                                                    @if ($errors->has('title'))
                                                    <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                                    @endif
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<textarea class="form-control blog-tinymice" rows="8" cols="50" name="contant" id="" placeholder="Blog Description ..."></textarea>
                                                                    @if ($errors->has('contant'))
                                                                    <div class="error" style="color: red">{{ $errors->first('contant') }}</div>
                                                                    @endif
																</div>
															</div>
														</div>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 blog-portion padding-left">
                                        <div class="panel panel-default card-view blogimageheight addblogheight">
                                            <div class="panel-wrapper collapse in category-multi newmulti">
                                            <h2>Featured Image</h2>
                                                <div class="panel-body">
													<div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section blog-add-section">
                                                        <div class="blog-img-uploaded">
                                                            <figure class="edit-profile-image img-blogs">
                                                                <img id="myImg1" class="blog_img_upload blog-images" src="../assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
                                                            </figure>
                                                            <div class="text-center">
                                                                <input type="file" name="photo" id="file-1" class="inputfile inputfile-1" required="required" />
                                                                <label class="fileupload-blog " for="file-1">Upload Image</label>
                                                                @if ($errors->has('photo'))
                                                                    <div class="error" style="color: red">{{ $errors->first('photo') }}</div>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 padding-left padding-right blog-portion">
                                <div class="panel panel-default card-view blogimageheight newblog-height" style="    padding: 69px 31px 0px;">
                                <div class="panel-wrapper collapse in category-multi newmulti">
                                <h2>Meta</h2>
                                <div class="panel-body">
                                <div class="col-md-4">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input type="text" name="meta_keyword">
                                </div>
                                <div class="col-md-4"> 
                                <label for="meta_keyword">Meta Description</label>
                                <input type="text" name="meta_description" >
                                </div>
                                <div class="col-md-4"> 
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" >
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 padding-left padding-right blog-portion">
                                
                                        <div class="panel panel-default card-view blogimageheight newblog-height">
                                            <div class="panel-wrapper collapse in category-multi newmulti">
                                            <h2>Info Graphic Image</h2>
                                                <div class="panel-body">

                                                    <div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section blog-add-section newoneheight">
                                                        <div class="blog-img-uploaded">
                                                            <figure class="edit-profile-image img-blogs">
                                                                <img id="myImg2" class="blog_img_upload blog-images" src="../assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
                                                            </figure>
                                                            <div class="text-center">
                                                                <input type="file" name="info_graphic" id="file-2" class="inputfile inputfile-1"/>
                                                                <label class="fileupload-blog " for="file-2">Upload Image</label>
                                                                @if ($errors->has('info_graphic'))
                                                                    <div class="error" style="color: red">{{ $errors->first('info_graphic') }}</div>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
							<div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
										<div class="col-lg-12 category-multi">
										<h2>Categories</h2>
											<div class="row">
												<div class="col-md-12 padding-right">
													<div class="col-sm-12 padding-left">
														<div class="button-box">
															<a id="select-all" class="btn-select-all btn btn-outline mt-15" href="#"><i class="fa fa-forward" aria-hidden="true"></i></a>
															<a id="deselect-all" class="btn-deselect-all btn btn-outline mt-15" href="#"><i class="fa fa-backward" aria-hidden="true"></i></a>
														</div>
														<select multiple id="public-methods" name="category_id[]">
															@foreach($categories as $category)
                        									<option value="{{$category->id}}">{{$category->title}}</option>
                   											 @endforeach
														</select>

													</div>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
										<div class="col-lg-12 category-multi">
										<h2>Tags</h2>
											<div class="row">
												<div class="col-md-12 padding-right">
													<div class="col-sm-12 padding-left">
														<div class="button-box">
															<a id="select-tag-all" class="btn-select-all btn btn-outline mt-15" href="#"><i class="fa fa-forward" aria-hidden="true"></i></a>
															<a id="deselect-tag-all" class="btn-deselect-all btn btn-outline mt-15" href="#"><i class="fa fa-backward" aria-hidden="true"></i></a>
														</div>
														<select multiple id="pre-selected-options" name="tags_ids[]">
															@foreach($tags as $tag)
                            									<option value="{{$tag->id}}">{{$tag->title}}</option>
                            								@endforeach

														</select>

													</div>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body submit-blog">
													<div class="col-lg-offset-4 col-lg-8 col-md-12 col-sm-12">
														<ul class="propertytypelist blog-tag">
															<li>
																<input type="checkbox" id="other-tag" />
																<label for="other-tag">Other Tag</label>
															</li>
														</ul>
														<div class="form-group">

                                    							<div class="mt-10 other-tags">
														<select multiple data-role="tagsinput" name="tags[]">

														</select>
															</div>
                                						</div>


														<button type="submit" class="btn btn-submit">Submit</button>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

@include( 'includes_admin.footer' )
    <script>

//        $('.blog-summernote.summernote').summernote({
//            height: 346,
//            toolbar: [
//                ["style", ["style"]],
//                ["font", ["bold", "underline", "clear", "strikethrough", "superscript", "subscript"]],
//                ["fontname", ["fontname"]],
//                ["color", ["color"]],
//                ["para", ["ul", "ol", "paragraph"]],
//                ['cleaner',['cleaner']], // The Button
//                ["table", ["table"]],
//                ["insert", ["link", /*"picture",*/ "video"]],
//                ["view", ["fullscreen", /*"codeview",*/ "help"]]
//            ],
//            cleaner:{
//                notTime: 5400, // Time to display Notifications.
//                action: 'paste', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
//                newline: '<br>', // Summernote's default is to use '<p><br></p>'
//                notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
//                icon: '<i class="fa fa-file-word-o">  Word Paste</i>',
//                keepHtml: true, // Remove all Html formats
//                keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>', '<h2>', '<h3>', '<h4>', '<h5>', '<span>', '<ol>', '<h6>', '<em>', '<sup>', '<sub>'], // If keepHtml is true, remove all tags except these
//                keepClasses: false, // Remove Classes
//                badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
//                badAttributes: ['style', 'start'] // Remove attributes from remaining tags
//            }
//        });
    </script>
	<script>
	$(document).ready(function(){
		$('#other-tag').click(function() {
			$('.other-tags').toggle();
		});


        $(window).resize(function(){

               if ($(window).width() <= 1600) {

                     $('.blog-image-height').css('min-height', '611px');

               }




        });


	});
	</script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $("#file-1").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

           function imageIsLoaded(e) {
                $('#myImg1').attr('src', e.target.result);
            };


           $(function () {
                $("#file-2").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoad;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

           function imageIsLoad(e) {
                $('#myImg2').attr('src', e.target.result);
            };

       });
    </script>
 @if (session('error'))
   <script>
   $(window).load(function(){
        //window.setTimeout(function(){
            $.toast({
                heading: 'Error',
                text: '{{ Session::get('error') }}',
                position: 'top-right',
                loaderBg:'#fec107',
                icon: 'error',
                hideAfter: 6000, 
                stack: 6
            });
        //}, 6000);
    });
    </script>
@endif