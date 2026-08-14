<?php include './header.php'; ?>
<?php include './aside.php'; ?>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-35 main_container">
        <!-- Row -->

        <!--<div class="row">
            <div class="page-title-heading">
                <h3>Dashboard</h3>
            </div>
        </div>-->


        <div class="row top-panelbox">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-red">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">814,001</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">Active Properties</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="dist/img/telescope.png" alt="" />
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-green">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">214,501</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">Short Listing</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="dist/img/heart.png" alt="" />
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-yellow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">614,401</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">Wanted List</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="dist/img/wanted-list.png" alt="" />
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-blue">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">2332,401</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">All Properties</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="dist/img/home.png" alt="" />
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h4 class="panel-title txt-dark chart_heading">Properties Overview</h4>
                        </div>


                        <div  class="tab-struct custom-tab-1 pull-right">
                            <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                                <li class="active" role="presentation">
                                    <a aria-expanded="true"  data-toggle="tab" role="tab" href="#property_view_tab">Property View</a>
                                </li>
                                <li role="presentation" class="">
                                    <a  data-toggle="tab" role="tab" href="#phone_view_tab" aria-expanded="false">Phone View</a>
                                </li>
                                <li role="presentation" class="">
                                    <a  data-toggle="tab" role="tab" href="#ctr_tab" aria-expanded="false">CTR</a>
                                </li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="tab-content" id="myTabContent_7">
                                <div  id="property_view_tab" class="tab-pane fade active in" role="tabpanel">
                                    <div id="morris_area_chart" class="morris-chart"></div>
                                </div>
                                <div  id="phone_view_tab" class="tab-pane fade" role="tabpanel">
                                    Area 2
                                </div>
                                <div  id="ctr_tab" class="tab-pane fade" role="tabpanel">
                                    Area 3
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row panel-topbox">
			
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="panel panel-default card-view sm-data-box-3">
					<div class="panel-wrapper collapse in">
						<div class="panel-body panel-box">
							<a href="">
								<div class="panel-dashboard text-center">
									<figure>
										<img src="dist/img/total-user.png" alt="total-user" />
									</figure>
									<h2 class="col-blue">3452</h2>
									<p>Total User</p>
								</div>
							</a>
						</div>	
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12 padding-left-right">
				<div class="panel panel-default card-view sm-data-box-3">
					<div class="panel-wrapper collapse in">
						<div class="panel-body panel-box">
							<a href="">
								<div class="panel-dashboard text-center">
									<figure>
										<img src="dist/img/total-architecture.png" alt="total-architecture" />
									</figure>
									<h2 class="col-red">3452</h2>
									<p>Total Architecture</p>
								</div>
							</a>
						</div>	
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12 padding-left-right">
				<div class="panel panel-default card-view sm-data-box-3">
					<div class="panel-wrapper collapse in">
						<div class="panel-body panel-box">
							<a href="">
								<div class="panel-dashboard text-center">
									<figure>
										<img src="dist/img/total-vendor.png" alt="total-vendor" />
									</figure>
									<h2 class="col-green">3452</h2>
									<p>Total Vendor</p>
								</div>
							</a>
						</div>	
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="panel panel-default card-view sm-data-box-3">
					<div class="panel-wrapper collapse in">
						<div class="panel-body panel-box">
							<a href="">
								<div class="panel-dashboard text-center">
									<figure>
										<img src="dist/img/total-theme.png" alt="total-theme" />
									</figure>
									<h2 class="col-yellow">3452</h2>
									<p>Total Theme</p>
								</div>
							</a>
						</div>	
					</div>
				</div>
			</div>
            
        </div>

        <div class="row">
            <div class="col-lg-6 pr-right">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark chart_heading">Monthly View</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="flot-container flot_chart">
                                <div id="flot_line_chart" class="demo-placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            <div class="col-lg-6 pl-left">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark chart_heading">Properties Chart</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="flot-container flot_chart">
                                <div id="flot_pie_chart" class="demo-placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
		
		<div class="row panel-downbox">
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="col-lg-3 col-md-6 col-xs-12 padding-left">
								<div class="panel-boxes">
									<a href="">
										<div class="panel-dashboard border-panel text-center">
											<figure>
												<img src="dist/img/total-sms.png" alt="total-sms" />
											</figure>
											<h2 class="col-blue">3452</h2>
											<p>Total Unread sms</p>
										</div>
									</a>
								</div>	
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12 padding-left">
								<div class="panel-boxes">
									<a href="">
										<div class="panel-dashboard border-panel text-center">
											<figure>
												<img src="dist/img/total-website.png" alt="total-website" />
											</figure>
											<h2 class="col-red">3452</h2>
											<p>Total Active Website</p>
										</div>
									</a>
								</div>	
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12 padding-left">
								<div class="panel-boxes">
									<a href="">
										<div class="panel-dashboard border-panel text-center">
											<figure>
												<img src="dist/img/total-blog.png" alt="total-blog" />
											</figure>
											<h2 class="col-green">3452</h2>
											<p>Total Active Blog</p>
										</div>
									</a>
								</div>	
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12 padding-left">
								<div class="panel-boxes">
									<a href="">
										<div class="panel-dashboard border-panel last-border-panel text-center">
											<figure>
												<img src="dist/img/total-request.png" alt="total-request" />
											</figure>
											<h2 class="col-yellow">3452</h2>
											<p>Total Web Request</p>
										</div>
									</a>
								</div>	
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		

        <div class="row">
            <!-- Responsive Table -->
            <div class="col-lg-12">
                <div class="panel panel-default card-view recent-add-class-padding">
                    <h6 class="panel-title recent-add-class txt-dark mt-40">Recently Added List</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Listed Date</th>
                                                <th>View</th>
                                                <th>Location</th>
                                                <th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:void(0)">01</a></td>
                                                <td>House 3 Beds</td>
                                                <td><div class="label label-table label-warning new-label-style">Rent</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td>34</td>
                                                <td><div class="label label-table label-warning new-label-style">Lahore</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)">82</a></td>
                                                <td>House 2 Beds</td>
                                                <td><div class="label label-table label-primary new-label-style">To Do</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td>433</td>
                                                <td><div class="label label-table label-primary new-label-style">Karachi</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)">03</a></td>
                                                <td>Shops 3</td>
                                                <td><div class="label label-table label-success new-label-style">On Hold</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td>550</td>
                                                <td><div class="label label-table label-success new-label-style">Bangla</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)">54</a></td>
                                                <td>School 8 Rooms</td>
                                                <td><div class="label label-table label-info new-label-style">Sold Property</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td>122</td>
                                                <td><div class="label label-table label-info new-label-style">Garden</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)">45</a></td>
                                                <td>House</td>
                                                <td><div class="label label-table label-danger new-label-style">Rejected</div></td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td>132</td>
                                                <td><div class="label label-table label-danger new-label-style">DHA Phase 4</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
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

        <!-- Row -->
    </div>
    <?php include './footer.php'; ?>