@php
$title = "Profile View";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
	<!-- Row -->
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<div class="tab-struct custom-tab-2 mt-40">
						<ul role="tablist" class="nav nav-tabs" id="profile_tablist">
						@if(Request::segment(2) == "profile")
							<li class="active" role="presentation">
								<a aria-expanded="true" data-toggle="tab" role="tab" id="profile_tab_15" href="#dashboard_profile">Profile</a>
							</li>
							@foreach($characterTypes as $characterType) 
								@if(in_array($characterType->name, $selectedNames))
								<li role="presentation" class="">
									<a data-toggle="tab" id="agent_tab_15" role="tab" href="#dashboard_{{$characterType->name}}" aria-expanded="false">
										<?php echo ucfirst($characterType->name);?>
									</a>
								</li>
								@endif 
							@endforeach
						@else
							@foreach($characterTypes as $characterType) 
								@if(in_array($characterType->name, $selectedNames))
									@if(Request::segment(2) == $characterType->name)
									<li role="presentation" class="active">
										<a data-toggle="tab" id="agent_tab_15" role="tab" href="#dashboard_{{$characterType->name}}" aria-expanded="false">
											<?php echo ucfirst($characterType->name);?>
										</a>
									</li>
									@endif
								@endif 
							@endforeach
						@endif
							<!--  <li role="presentation" class="">
<a  data-toggle="tab" id="architecture_tab_15" role="tab" href="#dashboard_architecture" aria-expanded="false">Architecture</a>
</li>
<li role="presentation" class="">
<a  data-toggle="tab" id="vendor_tab_15" role="tab" href="#dashboard_vendor" aria-expanded="false">Vendor</a>
</li>
-->
						</ul>
						<div class="tab-content" id="profile_tabcontent">
							<div id="dashboard_profile" class="tab-pane fade @if(Request::segment(2) == "profile") active in @endif " role="tabpanel">
								<div class="col-lg-7 col-sm-12 padding-left profile_small_padding profile_pad_right">
									<div class="panel panel-default card-view profile-Image-tab profile-view-pannel">
										<div class="panel-wrapper collapse in">
											<div class="panel-body">
												<div class="col-lg-5 col-lg-offset-1 col-sm-12 text-center profile_image">
													<figure>
														@if($userdata[0]->image != "") @foreach(json_decode($userdata[0]->image) as $image)

														<img id="myImg" class="img-profile img-circle" src="/image/profile/{{$image}}" alt="Vendor Profile Image"> @endforeach @else
														<img id="myImg" class="img-profile img-circle" src="/images/avatar/user-avatar.jpg" alt="Agent Profile Image" > @endif
													</figure>
													<h2>{{ucfirst($userdata[0]->first_name)}} {{ucfirst($userdata[0]->last_name)}}</h2>
													<p>
														@foreach($selectedNames as $name) {{ucfirst($name)}} | @endforeach
													</p>
												</div>
												<div class="col-lg-5 col-lg-offset-1 col-sm-12 profile_social">
													<ul>
														@if($userdata[0]->facebook_link != "")
														<li><a href=" {{$userdata[0]->facebook_link}}"><i class="zmdi zmdi-facebook"></i><span>Click your facebook</span></a>
														</li>
														@endif @if($userdata[0]->google_link != "")
														<li><a href="{{$userdata[0]->google_link}}"><i class="zmdi zmdi-google-plus"></i><span>Click your Google +</span></a>
														</li>
														@endif @if($userdata[0]->twitter_link != "")

														<li><a href="{{$userdata[0]->twitter_link}}"><i class="zmdi zmdi-twitter"></i><span>Click your Google +</span></a>
														</li>
														@endif
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-5 col-sm-12 padding-right profile_small_padding profile_pad_left">
									<div class="panel panel-default card-view profile-Image-tab profile-edit-pannel">
										<div class="panel-wrapper collapse in">
											<div class="panel-body">
												<div class="col-lg-5 col-lg-offset-1 pa-0">
													<span id="pie_chart_2" class="easypiechart skill-circle counter-height" data-percent="{{$profile_completion}}">
                                						<span class="percent head-font">{{$profile_completion}}</span>
													</span>
												</div>
												<div class="col-lg-6 col-sm-12 profile_counter">
													<p>Profile is <span class="counter-color">{{$profile_completion}}%</span> Complete</p>
													<p>@if($property_count != 0 )Total Listings<span class="counter-lisiting">{{$property_count}}</span> @else <span style="font-style:italic;">No listing yet</span> @endif
													</p>
													@if(Auth::id() ==$userdata[0]->id )
													<a href="/dashboard/profile/edit">		
													<button class="btn btn-edit-profile btn-lable-wrap left-label"> 
														<span class="btn-text">Edit Your Profile</span>
														<span class="btn-label btn-gear"><i class="fa fa-gear"></i> </span>
													</button>
													</a>
												@endif	
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="profile-second-row">
									<div class="col-lg-4 col-sm-12 padding-left padding-right">
										<div class="panel panel-default card-view profile-Image-tab profile-binfo-pannel">
											<div class="panel-wrapper collapse in">
												<div class="panel-body profile-information">
													<h1>Basic Information</h1>
													<ul class="padding-left-profile">
														<li><i class="fa fa-user"></i>{{ucfirst($userdata[0]->first_name)}}</li>
														@if($userdata[0]->last_name =="")
														<li><i class="fa fa-user"></i><span class="text-muted">Last Name</span>
														</li>
														@else
														<li><i class="fa fa-user"></i>{{ucfirst($userdata[0]->last_name)}}</li>
														@endif @if($userdata[0]->email =="")
														<li><i class="fa fa-envelope"></i><span class="text-muted">Email Address</span>
														</li>
														@else
														<li><i class="fa fa-envelope"></i>{{$userdata[0]->email}}</li>
														@endif @if($userdata[0]->address =="")
														<li><i class="fa fa-building"></i><span class="text-muted">Address</span>
														</li>
														@else
														<li><i class="fa fa-building"></i>{{$userdata[0]->address}}</li>
														@endif @if($userdata[0]->created_at =="")
														<li><i class="fa fa-refresh"></i><span class="text-muted">Created at</span>
														</li>
														@else
														<li><i class="fa fa-refresh"></i>{{App\Property::time_elapsed_string($userdata[0]->created_at)}}</li>
														@endif
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-sm-12 profile_small_padding">
										<div class="panel panel-default card-view profile-Image-tab profile-cinfo-pannel">
											<div class="panel-wrapper collapse in">
												<div class="panel-body profile-information profile-contact">
													<h1>Contact Information</h1>
													<ul class="padding-left-profile">
														@if($userdata[0]->cnic =="")
														<li><i class="fa fa-newspaper-o"></i><span class="text-muted">CNIC</span>
														</li>
														@else
														<li><i class="fa fa-newspaper-o"></i>{{$userdata[0]->cnic}}</li>
														@endif @if($userdata[0]->telephone =="")
														<li><i class="fa fa-phone"></i><span class="text-muted">Telephone No</span>
														</li>
														@else
														<li><i class="fa fa-phone"></i>{{$userdata[0]->telephone}}</li>
														@endif @if($userdata[0]->mobile =="")
														<li><i class="fa fa-mobile"></i><span class="text-muted">Phone</span>
														</li>
														@else
														<li><i class="fa fa-mobile"></i>{{$userdata[0]->mobile}}</li>
														@endif @if($userdata[0]->address =="")
														<li><i class="fa fa-building-o"></i><span class="text-muted">Address</span>
														</li>
														@else
														<li><i class="fa fa-building-o"></i>{{$userdata[0]->address}}</li>
														@endif
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-sm-12 padding-left padding-right">
										<div class="panel panel-default card-view profile-Image-tab profile-interest-pannel">
											<div class="panel-wrapper collapse in">
												<div class="panel-body profile-information profile-checkbox">
													<h1>Interests</h1>
													<form action="#">
														<ul class="padding-left-profile">
															@foreach($interests as $interest)
															<li>
																@if(in_array($interest->id, $selected))
																<input type="checkbox" id="data-{{$interest->id}}" name="interest[{{$interest->id}}]" checked/>
																<label for="data-{{$interest->id}}">{{$interest->name}}</label> @else
																<!-- <input type="checkbox" id="data-{{$interest->id}}" name="interest[{{$interest->id}}]" />
    <label for="data-{{$interest->id}}">{{$interest->name}}</label> -->
																@endif
															</li>
															@endforeach
														</ul>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@if(isset($checkedName['agent']) &&!empty($checkedName['agent']))
							<div id="dashboard_agent" class="tab-pane fade @if(Request::segment(2) == "agent") active in @endif " role="tabpanel">
								<div class="row">
									<div class="col-lg-12 padding-right">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agent_tab_section">
												<div class="panel-wrapper collapse in edit-agent-profile">
													<div class="panel-body">
														<div class="col-lg-4 col-sm-12 text-center profile_image">
															<figure>
																@if($checkedName['agent'][0]['logo']!= "") @foreach(json_decode($checkedName['agent'][0]['logo']) as $image)
																<img id="myImg" class="img-profile img-circle" src="/image/logo/{{$image}}" alt="Vendor Profile Image"> @endforeach @else
																<img id="myImg" class="img-profile img-circle" src="/images/avatar/logo-avatar.jpg" alt="Agent Profile Image"> @endif
															</figure>
															@if(Auth::id() ==$userdata[0]->id )
															<a href="/dashboard/profile/edit" class="edit-agent-btn">Edit your Profile</a>
															@endif
														</div>
														<div class="col-lg-7 col-lg-offset-1 col-sm-12">
															<div class="profile-second-row">
																<div class="panel panel-default card-view agent_tab_section">
																	<div class="panel-wrapper collapse in">
																		<div class="panel-body profile-information">
																			<ul class="edit-agent-li">
																				<li><i class="fa fa-credit-card" aria-hidden="true"></i>{{$checkedName['agent'][0]['name']}}</li>
																				<li><i class="fa fa-phone" aria-hidden="true"></i>{{$checkedName['agent'][0]['telephone']}}</li>
																				<li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$checkedName['agent'][0]['location']}}</li>
																				<li><i class="fa fa-globe" aria-hidden="true"></i>{{$checkedName['agent'][0]['website']}}</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 padding-right theme-heading">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agency-about">
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="agency-overview">
															<h2>Agency Overview</h2>
															<?php echo $checkedName['agent'][0]['description']; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 padding-right">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default theme-choose">
												<div class="panel-wrapper collapse in">
													<div class="theme-panel">
														<div class="theme-text">
															<h2>Your Website View</h2>
															<a href="">Change Your Theme</a>
														</div>
														<span class="link-img">
															<img width="300px" height="auto" src="http://dribbble.s3.amazonaws.com/users/197532/screenshots/1145931/freebie-1.png" style="top: 0px" />
														</span>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
							</div>
							@endif @if(isset($checkedName['architecture']) &&!empty($checkedName['architecture']))
							<div id="dashboard_architecture" class="tab-pane fade @if(Request::segment(2) == "architecture") active in @endif " role="tabpanel">
								<div class="row">
									<div class="col-lg-12 padding-right">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agent_tab_section">
												<div class="panel-wrapper collapse in edit-agent-profile">
													<div class="panel-body">
														<div class="col-lg-4 col-sm-12 text-center profile_image">
															<figure>
																@if($checkedName['architecture'][0]['logo']!= "") @foreach(json_decode($checkedName['architecture'][0]['logo']) as $image)
																<img id="myImg" class="img-profile img-circle" src="/image/logo/{{$image}}" alt="Architecture Profile Image"> @endforeach @else
																	<img id="myImg" class="img-profile img-circle" src="/images/avatar/logo-avatar.jpg" alt="Architecture Profile Image"> @endif
															</figure>
															@if(Auth::id() ==$userdata[0]->id )
															<a href="/dashboard/profile/edit" class="edit-agent-btn">Edit your Profile</a>
															@endif
														</div>
														<div class="col-lg-7 col-lg-offset-1 col-sm-12">
															<div class="profile-second-row">
																<div class="panel panel-default card-view agent_tab_section">
																	<div class="panel-wrapper collapse in">
																		<div class="panel-body profile-information">
																			<ul class="edit-agent-li">
																				<li><i class="fa fa-credit-card" aria-hidden="true"></i>{{$checkedName['architecture'][0]['name']}}</li>
																				<li><i class="fa fa-phone"></i>{{$checkedName['architecture'][0]['telephone']}}</li>
																				<li><i class="fa fa-building-o"></i>{{$checkedName['architecture'][0]['location']}}</li>
																				<li><i class="fa fa-globe"></i>{{$checkedName['architecture'][0]['website']}}</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agency-about">
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="agency-overview agency-list profile-information">
															<h2>Overview</h2>
															<!--  <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipisicing elit, sed do eiusmod tempor  incididunt ut labore  et dolore magna aliqua Ut enim ad minim veniam.</p>
                                <ul class="agency-list profile-information">
                                    <li><i class="fa fa-circle"></i></li>
                                  
                                </ul> -->

															<?php echo $checkedName['architecture'][0]['description']; ?>


														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 padding-right theme-heading">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agency-about">
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="agency-overview architecture-portpolio">
															<h2>Portfolio</h2>
															<div class="col-lg-12 padding-left">
																@if($architecturecheck == 1)
																<h2 style="color: red">No Portfolio is Added</h2> @endif @foreach($portfolio['architecture'][0] as $architecture)

																<div class="col-lg-3 col-sm-6 padding-right">
																	<div class="col-md-12 portfolio-box">
																		
																			@if($architecture->images != "")
																			<?php
																			$image = explode( ';', $architecture->images );
																			?>
																			<div class="thumb-container padding-left padding-right">
																				<div class="thumb-block portfolio-thumb">
																					<img class="img-responsive portfolio-img" src="/images/User_portfolio_images/{{$image[0]}}" alt="Portfolio Image"/>
																					<div class="middle">
																						<a data-toggle="modal" class="portfolio" data-id="{{$architecture->id}}" data-target="#responsive-modal" href="#">View</a>
																					</div>

																				</div>
																			</div>
																			@endif
																			<div class="col-md-12 padding-right padding-left">
																				<h1>{{$architecture->title}}</h1>
																				@if(Auth::id() ==$userdata[0]->id )
																				<a href="/dashboard/edit/portfolio/{{$architecture->id}}">Edit <i class="fa fa-gear"></i></a>
																				@endif
																			</div>
																		
																	</div>
																</div>
																
																@endforeach
															</div>
															<!--  <div class="col-lg-12 padding-left">
                                    <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                        <img class="img-responsive portfolio-img" src="dist/img/portfolio-1.jpg" alt="Portfolio Image" />
                                        <div class="middle">
                                            <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                        </div>
                                        <h1>Project Name</h1>
                                        <a href="">Edit <i class="fa fa-gear"></i></a>
                                    </div>
                                    <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                        <img class="img-responsive portfolio-img" src="dist/img/portfolio-2.jpg" alt="Portfolio Image" />
                                        <div class="middle">
                                            <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                        </div>
                                        <h1>Project Name</h1>
                                        <a href="">Edit <i class="fa fa-gear"></i></a>
                                    </div>
                                    <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                        <img class="img-responsive portfolio-img" src="dist/img/portfolio-3.jpg" alt="Portfolio Image" />
                                        <div class="middle">
                                            <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                        </div>
                                        <h1>Project Name</h1>
                                        <a href="">Edit <i class="fa fa-gear"></i></a>
                                    </div>
                                    <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                        <img class="img-responsive portfolio-img" src="dist/img/portfolio-4.jpg" alt="Portfolio Image" />
                                        <div class="middle">
                                            <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                        </div>
                                        <h1>Project Name</h1>
                                        <a href="">Edit <i class="fa fa-gear"></i></a>
                                    </div>
                                    <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                        <img class="img-responsive portfolio-img" src="dist/img/portfolio-5.jpg" alt="Portfolio Image" />
                                        <div class="middle">
                                            <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                        </div>
                                        <h1>Project Name</h1>
                                        <a href="">Edit <i class="fa fa-gear"></i></a>
                                    </div>
                                </div> -->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif @if(isset($checkedName['vendor']) &&!empty($checkedName['vendor']))
							<div id="dashboard_vendor" class="tab-pane fade @if(Request::segment(2) == "vendor") active in @endif " role="tabpanel">
								<div class="row">
									<div class="col-lg-12 padding-right">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agent_tab_section">
												<div class="panel-wrapper collapse in edit-agent-profile">
													<div class="panel-body">
														<div class="col-lg-4 col-sm-12 text-center profile_image">
															<figure>
																@if($checkedName['vendor'][0]['logo']!= "") @foreach(json_decode($checkedName['vendor'][0]['logo']) as $image)
																<img id="myImg" class="img-profile img-circle" src="/image/logo/{{$image}}" alt="Vendor Profile Image"> @endforeach @else
																<img id="myImg" class="img-profile img-circle" src="/images/avatar/logo-avatar.jpg" alt="Vendor Profile Image"> @endif
															</figure>
															@if(Auth::id() ==$userdata[0]->id )
															<a href="/profile" class="edit-agent-btn">Edit your Profile</a>
															@endif
														</div>
														<div class="col-lg-7 col-lg-offset-1 col-sm-12">
															<div class="profile-second-row">
																<div class="panel panel-default card-view agent_tab_section">
																	<div class="panel-wrapper collapse in">
																		<div class="panel-body profile-information">
																			<ul class="edit-agent-li">
																				<li><i class="fa fa-credit-card" aria-hidden="true"></i>{{$checkedName['vendor'][0]['name']}}</li>
																				<li><i class="fa fa-phone"></i>{{$checkedName['vendor'][0]['telephone']}}</li>
																				<li><i class="fa fa-building-o"></i>{{$checkedName['vendor'][0]['location']}}</li>
																				<li><i class="fa fa-globe"></i>{{$checkedName['vendor'][0]['website']}}.com</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agency-about">
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="agency-overview">
															<h2>Overview</h2>


															<?php echo $checkedName['vendor'][0]['description']; ?>


														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 padding-right theme-heading">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agency-about">
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="agency-overview architecture-portpolio">
															<h2>Portfolio</h2>
															<div class="col-lg-12 padding-left">
																@if($vendorcheck == 1)
																<h2 style="color: red">No Portfolio is Added</h2> @endif @foreach($portfolio['vendor'][0] as $vendor)
																<div class="col-lg-3 col-sm-6 padding-right">
																	<div class="col-md-12 portfolio-box">
																		@if($vendor->images != "")
																		<?php
																		$image = explode( ';', $vendor->images );
																		?>
																		<div class="thumb-container padding-left padding-right">
																			<div class="thumb-block portfolio-thumb">
																				<img class="img-responsive portfolio-img" src="/images/User_portfolio_images/{{$image[0]}}" alt="Portfolio Image"/> 
																				<div class="middle">
																					<a data-toggle="modal" class="portfolio" data-id="{{$vendor->id}}" data-target="#responsive-modal" href="javascipt:void(0)">View</a>
																				</div>
																			</div>
																		</div>
																		@endif
																		<div class="col-md-12 padding-right padding-left">
																			<h1>{{$vendor->title}}</h1>
																			@if(Auth::id() ==$userdata[0]->id )
																			<a href="/dashboard/edit/portfolio/{{$vendor->id}}">Edit <i class="fa fa-gear"></i></a>
																			@endif
																		</div>
																	</div>
																</div>
																@endforeach
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="
        ?> col-lg-12 padding-right theme-heading">
										<div class="col-lg-12 col-sm-12 padding-left">
											<div class="panel panel-default card-view agency-about">
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="agency-overview architecture-portpolio vendor-portfolio">
															<h2>Products</h2>
<div class="table-wrap mt-40 vendor-products">
<div class="table-responsive">
<table class="table table-hover table-bordered mb-0">
<thead>
<tr>
<th>SR</th>
<th>TITLE</th>
<th>DESCRIPTION</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
@foreach($allProducts as $product)
<tr>
<td>#</td>
<td>{{$product->title}}</td>
<td>
<?php
$string = substr( strip_tags( $product->description ), 0, 150 );
echo $string . '....... ';
?><a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal_{{$product->id}}"> read more</a>
</td>
@if(Auth::id() ==$userdata[0]->id )
<td class="text-center"><a href="/editproduct/{{$product->id}}" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="javascipt:void(0);" data-toggle="tooltip" data-original-title="Delete" class="productRemove" data-id="{{$product->id}}"> <i class="fa fa-trash " ></i> </a> </td>
</tr>
@else
<td class="text-center"><h5>No Authority</h5></td>
@endif

<div id="product-modal_{{$product->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Product Description</h5>
</div>
<div class="modal-body">
<p>
<?= $product->description; ?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
@endforeach

</tbody>
</table>
</div>
</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							@endif


							<!-- ///////////////// modal for porfolio detail ..... -->
							<!-- ////////READ more popup/. -->


						</div>
					</div>
				</div>
			</div>
		</div>


		@include('includes_admin.footer')
		<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="display_content"></div>
		</div>


		<script>
			$( document ).ready( function () {

				$( '.portfolio' ).click( function () {
					var id = $( this ).attr( 'data-id' );

					var url = "/portfolioDisplay/" + id;
					$.ajax( {
						url: url,
						datatype: 'html',
						method: 'POST',
						headers: {
							'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
						},
						success: function ( e ) {

							$( '.display_content' ).html( e );

						}

					} );

				} );
			} );
		</script>
		<script>
			$( document ).ready( function () {

				$( '.productRemove' ).click( function () {
				 if (confirm('Are you sure you want to delete this?')) {
					var id = $( this ).attr( 'data-id' );
					var url = "/deleteproduct/"+id;
					var current = $(this);
					$.ajax( {
						url: url,
						datatype: 'json',
						method: 'POST',
						headers: {
							'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
						},
						success: function ( e ) {

						current.parent().parent().remove();

						}

					} );
					}
				} );
			} );
		</script>

