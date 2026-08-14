<?php include './header.php'; ?>
<?php include './aside.php'; ?>






<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid add-static-page">
        
		<div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40"> 
					<div class="form-wrap">
						<form action="#" class="form-horizontal">
						
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
																	<input type="text" class="form-control static-field" placeholder="Type Title">
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<label>Link</label>
																	<input type="text" class="form-control static-field" placeholder="Type Link">
																</div>
															</div>
															
															<div class="col-md-12 padding-left">
															  <label>Packages</label>
															  <select class="selectpicker" title="Choose Packages" data-style="form-control btn-default btn-outline">
																<option>1</option>
																<option>2</option>
																<option>3</option>
																<option>4</option>
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
															<img id="myImg" src="dist/img/selcetimg.jpg" alt="Image">
														</figure>
														<div class="text-center">
															<input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" />
															<label class="fileupload-profile" for="file-1">Upload Images</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions edit-form-submit">
								<div class="panel panel-default card-view profile-Image-tab">
									<div class="panel-wrapper collapse in">
										<div class="panel-body profile-role btn-static-update">

											<div class="row">
												<button type="reset" class="btn btn-reset">Reset</button>
												<button type="submit" class="btn btn-update">Update</button>
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


<?php include './footer.php'; ?>

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
