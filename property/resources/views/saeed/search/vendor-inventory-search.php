<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        
		
		
		 <div class="row">
            <div class="col-lg-12 mt-40 inventory-search architecture-inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Vendor Directory Search.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
							<form action="" method="post">
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Vendor Name">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Vendor ID">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Type Product">
											</div>
										</div>
										<div class="col-md-6 padding-left">
										  <select class="selectpicker" data-style="form-control btn-default btn-outline">
											<option>City</option>
											<option>Lahore</option>
											<option>Karachi</option>
											<option>Faislabad</option>
										  </select>
										</div>
										
										<div class="col-md-12 padding-left">
											<button type="submit" class="btn btn-submit-webinfo btn-client btn-anim"><i class="fa fa-search"></i><span class="btn-text">Search</span></button>
										</div>
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		

        <div class="row">
            <div class="col-lg-12 inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class client-list-heading txt-dark">Vendor Directory Search Result.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Images</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Listed Date</th>
                                                <th>Location</th>
                                                <th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img1.jpg" alt=""/></a></td>
                                                <td>Commercial</td>
                                                <td><div class="label label-table label-info new-label-style">Trash</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-info new-label-style">Lahore</div></td>
                                                <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img2.jpg" alt=""/></a></td>
                                                <td>Residential</td>
                                                <td><div class="label label-table label-primary new-label-style">Block</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-primary new-label-style">Karachi</div></td>
                                                <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img3.jpg" alt=""/></a></td>
                                                <td>Shops</td>
                                                <td><div class="label label-table label-success new-label-style">Active</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-success new-label-style">Bangla</div></td>
                                                <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img4.jpg" alt=""/></a></td>
                                                <td>Plots</td>
                                                <td><div class="label label-table label-warning new-label-style">In Active</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-warning new-label-style">Garden</div></td>
                                                <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img1.jpg" alt=""/></a></td>
                                                <td>House</td>
                                                <td><div class="label label-table label-danger new-label-style">Rejected</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-danger new-label-style">DHA Phase 4</div></td>
                                                <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		


        <!-- /Row -->

        <?php include './footer.php'; ?>
		<script>
			$(document).ready(function () {
				$('#datable_property').DataTable({});
			});
		</script>
        

