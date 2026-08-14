<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <ul role="tablist" class="nav nav-tabs featured-bold-tab" id="profile_tablist">
                        <li class="active" role="presentation">
                            <a aria-expanded="true"  data-toggle="tab" role="tab" id="profile_tab_15" href="#admin-pending-property">Pending</a>
                        </li>
                        <li role="presentation" class="">
                            <a  data-toggle="tab" id="agent_tab_15" role="tab" href="#admin-reject-property" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="">
                            <a  data-toggle="tab" id="architecture_tab_15" role="tab" href="#admin-approve-property" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="admin-pending-property" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Featured Properties</h6>
										<div class="panel-wrapper collapse in">
											<div class="panel-body">	
												<div class="table-wrap">
													<div class="table-responsive">
														<table id="user_active_property" class="table table-hover display  pb-30" >
															<thead>
																<tr>
																	<th>S.N</th>
																	<th>ID</th>
																	<th>Title</th>
																	<th>Name</th>
																	<th>Created</th>
																	<th>Address</th>
																	<th>Phone / Email</th>
																	<th>Status</th>
																	<th>Packages</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>01</td>
																	<td>45</td>
																	<td>3 Marla House</td>
																	<td>Ali</td>
																	<td>24/8/2016</td>
																	<td>DHA Phase 4 Lahore</td>
																	<td>ali@gmail.com</td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Active</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">Standard</a></td>
																</tr>
																<tr>
																	<td>02</td>
																	<td>50</td>
																	<td>Shop For Sale</td>
																	<td>Ali</td>
																	<td>24/8/2016</td>
																	<td>DHA Phase 4 Lahore</td>
																	<td>0315689789</td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Active</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">Business</a></td>
																</tr>
																<tr>
																	<td>03</td>
																	<td>36</td>
																	<td>Land For Sale</td>
																	<td>Ali</td>
																	<td>24/08/2016</td>
																	<td>DHA Phase 4 Lahore</td>
																	<td>ali@gmail.com</td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Active</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">Premium</a></td>
																</tr>
																<tr>
																	<td>04</td>
																	<td>28</td>
																	<td>School For Rent</td>
																	<td>Ali</td>
																	<td>24/08/2016</td>
																	<td>DHA Phase 4 Lahore</td>
																	<td>0315689789</td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Active</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">Standard</a></td>
																</tr>
																<tr>
																	<td>05</td>
																	<td>12</td>
																	<td>House 3 Room</td>
																	<td>Ali</td>
																	<td>24/08/2016</td>
																	<td>DHA Phase 4 Lahore</td>
																	<td>ali@gmail.com</td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Active</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">Business</a></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Responsive Table -->
							</div>
							<div class="row">
								<div class="page-nation">
									<ul class="pagination pagination-large">
										<li><a href="#"><span>«</span></a></li>
										<li><a href="#"><span>1</span></a></li>
										<li><a href="#">2</a></li>
										<li class="active"><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#"><span>»</span></a></li>
									</ul>
								</div>
							</div>



							<!-- /Row -->
                        </div>
                        <div id="admin-reject-property" class="tab-pane fade" role="tabpanel">
                            
                        </div>
                        <div id="admin-approve-property" class="tab-pane fade" role="tabpanel">
                            
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
			$('#user_active_property').DataTable({
				"lengthMenu": false,
				"paginate": false
			});
		});
	</script>
