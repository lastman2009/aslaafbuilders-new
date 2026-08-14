@php
$title = "Static Add Information";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid add-static-page">
        
		<div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40"> 
					<div class="form-wrap">
						<form action="/saveAddStaticAdvertise" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
							<div class="row">
								<div class="col-md-12 padding-right">
								
						
									<div class="col-lg-6 col-sm-6 inventory-search architecture-inventory-search padding-left">
										<div class="panel panel-default card-view add-static-padding">
											<h6 class="panel-title inventory-add-class txt-dark">Advertisement Information</h6>
											<div class="panel-wrapper collapse in">
												<div class="panel-body">	
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<label>Title:</label>
																	<input type="text" name="title" class="form-control static-field" placeholder="Type Title">
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<label>Link</label>
																	<input type="text" name="link" class="form-control static-field" placeholder="http://www.example.com">
																</div>
															</div>
															
															<div class="col-md-12 padding-left">
															  <label>Packages</label>
															   <select class="selectpicker" id="pkg" data-url="/getPackagedetail/" title="Select Package" name="package_id" data-style="form-control btn-font btn-default btn-outline">
					                                            @foreach($packages as $package)
					                                        <option value="{{$package->id}}">{{$package->name}}</option>
					                                         @endforeach
					                                         </select>
															</div>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 padding-left">
										<div class="panel panel-default card-view profile-Image-tab new-profile-img">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<div class="col-lg-12 col-sm-12 text-center profile_image">
														<figure class="edit-profile-image">
															<img id="myImg" src="../../assets_admin/dist/img/selcetimg.jpg" alt="Image">
														</figure>
														<div class="text-center">
															<input type="file" name="image" id="file-1" class="inputfile inputfile-1" />
															<label class="fileupload-profile" for="file-1">Upload Images</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 padding-right">
									<div class="col-lg-12 col-sm-12 padding-left">
										<div class="panel panel-default card-view package-static-detail">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">	
													<h6 class="panel-title inventory-add-class txt-dark">Package Detail</h6>
					                                <ul class="add-staff-portion">
					                                    <li><span class="lable">Package Name: </span><span id="name" class="value"></span></li>
					                                    <li><span class="lable">Package Category: </span><span id="category" class="value"></span></li>
					                                    <li><span class="lable">Ad Page: </span><span id="page" class="value"></span></li>
					                                    <li><span class="lable">Page position: </span><span id="position" class="value"></span></li>
					                                    <li><span class="lable">Package Duration: </span><span id="duration" class="value"></span></li>
					                                    <li><span class="lable" style="color: #f0b709; font-weight: bold;">Package Price: </span><span id="price" class="value"></span></li>
					                                </ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<input type="hidden" value="" name="price" id="pkg_price"/>
							<div class="form-actions edit-form-submit">
								<div class="panel panel-default card-view profile-Image-tab">
									<div class="panel-wrapper collapse in">
										<div class="panel-body profile-role btn-static-update">

											<div class="row">
												<button type="reset" class="btn btn-reset">Reset</button>
												<button type="submit" class="btn btn-update">Request</button>
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
    $(document).ready(function () {
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
        ;

    });

</script>

<script type="text/javascript">
     
     $(document).ready(function(){

       $('#pkg').change(function()
        {
            var id =this.value;
            var url = $(this).data('url')+id;
            $.ajax({
                url:url,
                datatype: 'json',
                method: 'POST',
                headers: {
                            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                success: function ( e ) {
                    var obj = e.success;
                    var name =obj.package_name;
                    var category =obj.category_name;
                    var page =obj.page_name;
                    var position =obj.position_name;
                    var duration =obj.duration;
                    var price =obj.price;
                    $('#name').html(name);
                    $('#category').html(category);
                    $('#page').html(page);
                    $('#position').html(position);
                    $('#duration').html(duration);
                    $('#price').html(price);
                    $('#pkg_price').val(price);                    
                  }
                });
         });
   });
 </script>
