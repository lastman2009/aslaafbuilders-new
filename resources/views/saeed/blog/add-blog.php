<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <div class="tab-content">
                        <form>
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-6 col-md-6 col-sm-12 blog-portion padding-left">
                                        <div class="panel panel-default card-view blogimageheight">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Blog Title" />
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<textarea class="form-control summernote" rows="8" cols="50" name="" id="" placeholder="Blog Description ..."></textarea>
																</div>
															</div>
														</div>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 blog-portion padding-left">
                                        <div class="panel panel-default card-view blogimageheight">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
													Blog Image Upload
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
														<select multiple id="public-methods" name="public-methods[]">
															<option value="elem_1">elem 1</option>
															<option value="elem_2">elem 2</option>
															<option value="elem_3">elem 3</option>
															<option value="elem_4">elem 4</option>
															<option value="elem_5">elem 5</option>
															<option value="elem_5">elem 5</option>
															<option value="elem_5">elem 5</option>
															<option value="elem_5">elem 5</option>
															<option value="elem_5">elem 5</option>
															<option value="elem_5">elem 5</option>
															
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
														<select multiple id="pre-selected-options" name="pre-selected-options[]">
															<option value="elem_1">elem 1</option>
															<option value="elem_2">elem 2</option>
															<option value="elem_3">elem 3</option>
															<option value="elem_4">elem 4</option>
															<option value="elem_5">elem 5</option>	
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
														<input type="text" class="other-tags" name="" id="" placeholder="Parking Spaces" />
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


    <?php include './footer.php'; ?>
	<script>
	$(document).ready(function(){
		$('#other-tag').click(function() {
			$('.other-tags').toggle();
		});
	});
	</script>

