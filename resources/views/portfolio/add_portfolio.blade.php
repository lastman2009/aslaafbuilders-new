@php
$title = "Add Category";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="tab-struct custom-tab-2 mt-40">
					<div class="tab-content" id="profile_tabcontent">
						<div id="dashboard_profile" class="tab-pane fade active in" role="tabpanel">
							<div class="col-md-12 padding-left padding-right">
								<div class="form-wrap">
									<form action="/saveportfolio" method="post" class="form-horizontal" enctype="multipart/form-data" >
										{{ csrf_field() }}
										<div class="form-body edit-profile-body form-edit addprofile">
											<div class="row time-period">
												<div class="col-md-12 padding-left padding-right">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-12">Category</label>
														<div class="col-md-9 col-sm-12 padding-right padding-left">
															<div class="dropdown priority">
																<select class="dropdown-toggle" name="character_type_id" required> 
																
																	@foreach($character_type as $type)
																	<option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
																	@endforeach

																</select>

															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 padding-left padding-right">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-12">Title</label>
														<div class="col-md-9 col-sm-12 padding-right padding-left">
															<input type="text" class="form-control" name="title" value="" placeholder="Type title..." required>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12 padding-left padding-right form-description">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-12">Description</label>
														<div class="col-md-9 col-sm-12 padding-right padding-left">
															<textarea class="form-control summernote" 
															name="description" placeholder="Type description here!" style="height:234px !important"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 padding-left padding-right">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-12">Start Date</label>
														<div class='input-group date col-md-9 col-sm-12 padding-right padding-left' id='datetimepicker1'>
															<input type="text" class="form-control" name="start_date" value="" placeholder="Type start date" required>
															<span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 padding-left padding-right">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-12">End Date</label>
														<div class='input-group date col-md-9 col-sm-12 padding-right padding-left' id='datetimepicker5'>
															<input type="text" class="form-control" name="end_date" value="" placeholder="Type end date" required>
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row time-period">
												<div class="col-md-12 padding-left padding-right">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-12">Priority</label>
														<div class="col-md-9 col-sm-12 padding-right padding-left">
															<div class="dropdown priority">
																<select class="dropdown-toggle" name="priority" >
																	<option value="2" selected>Medium</option>
																	<option value="1">Normal</option>
																	<option value="3">High</option>

																</select>

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions edit-form-submit">
											<div class="panel panel-default card-view portfolio-img-tab profile-Image-tab">
												<div class="panel-wrapper collapse in">
													<div class="panel-body portfolio-role profile-role">
														<div class="form-group">
															<input id="file-1" type="file" style="z-index: 0;" name="images[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="0" required>
															
														</div>

													</div>
												</div>
											</div>
										</div>
										<input type="submit"  class="btn portfolio-btn" value="Add Portfolio">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Row -->

	@include('includes_admin.footer')
	<script>
		$(".file").fileinput({

		uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: true,
        maxFileSize: 100000,
        maxFilesNum: 10,
        showRemove: false,
        showUpload: false,
        showUploadedThumbs: false,
	    allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }


		});

	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#file-1').click(function(){
				$('.fileinput-remove').trigger('click');
			});
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