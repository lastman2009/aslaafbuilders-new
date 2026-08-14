@php
$title = "Approved Static Adds";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                      <ul role="tablist" class="nav nav-tabs featured-bold-tab" id="profile_tablist">
                        <li role="presentation">
                            <a aria-expanded="true" id="profile_tab_15" href="/dashboard/user/static/ads/pending">Pending</a>
                        </li>
                        <li role="presentation" >
                            <a  id="agent_tab_15" href="/dashboard/user/static/ads/reject"" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="active">
                            <a id="architecture_tab_15" href="/dashboard/user/static/ads/approve"" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="architecture_tab_15" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Approved Static And Popup Ads</h6>
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
																	<th>Images</th>
																	<th>Positions</th>
																	<th>Category</th>
																	<th>Page</th>
																	<th>Link</th>
																	<th>Start Date</th>
																	<th>End date</th>
																	<th>Status</th>
																	<th>Packages</th>
																</tr>
															</thead>
															<tbody>
															<?php $i=1?>
															@foreach($allApprovestaticAds as $allApprovestaticAd)
																<tr>
																	<td><?php echo $i?></td>
																	<td>{{$allApprovestaticAd->static_id}}</td>
                                                					<td>{{$allApprovestaticAd->static_ad_title}}</td>
                                                					<td><img style="width: 70px;" src="/images/staticAd/{{$allApprovestaticAd->static_ad_image}}" alt=""></td>
                                                					<td>{{$allApprovestaticAd->position_name}}</td>
                                                					<td>{{$allApprovestaticAd->category_name}}</td>
                                                					<td>{{$allApprovestaticAd->page_name}}</td>
                                                					<td>{{$allApprovestaticAd->static_ad_link}}</td>
                                                					<td>{{$allApprovestaticAd->start_date}}</td>
                                                					<td>{{$allApprovestaticAd->end_date}}</td>
																
																	
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Aproved</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">{{$allApprovestaticAd->package_name}}</a></td>
																</tr>
																<?php $i++?>
																@endforeach
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
                                        {{$allApprovestaticAds->links()}}
										
									</ul>
								</div>
							</div>



							<!-- /Row -->
                        </div>
                       
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- /Row -->


@include( 'includes_admin.footer' )

	<script>
		$(document).ready(function () {
			$('#user_active_property').DataTable({
				"lengthMenu": false,
				"paginate": false
			});
		});
	</script>
