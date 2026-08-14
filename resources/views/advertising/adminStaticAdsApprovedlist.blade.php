@php
$title = "Approved Static Property Add List";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )
<style type="text/css">
    td.phn-email span{
        display: block;
    } 
</style>
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <ul role="tablist" class="nav nav-tabs featured-bold-tab" id="profile_tablist">
                        <li class="" role="presentation">
                            <a aria-expanded="true" role="tab" id="profile_tab_15" href="/dashboard/admin/static/ads/pending">Pending</a>
                        </li>
                        <li role="presentation">
                            <a id="agent_tab_15" role="tab" href="/dashboard/admin/static/ads/reject" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="active">
                            <a id="architecture_tab_15" role="tab" href="/dashboard/admin/static/ads/approve" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="architecture_tab_15" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Admin Approved Static Ads</h6>
										<div class="panel-wrapper collapse in">
											<div class="panel-body">	
												<div class="table-wrap">
													<div class="table-responsive">
														<table id="user_active_property" class="table table-hover display  pb-30" >
															<thead>
																<tr>
																	
																	<th>ID</th>
																	<th>Title</th>
																	<th>Images</th>
																	<th>User Name</th>
																	<th>Created At</th>
																	<th>Phone / Email</th>
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
															@foreach($allApprovedStaticAds as $allApprovedStaticAd)
																<tr>
																	
																	<td>{{$allApprovedStaticAd->static_id}}</td>
                                                					<td>{{$allApprovedStaticAd->static_ad_title}}</td>
                                                					<td><img style="width: 70px;" src="/images/staticAd/{{$allApprovedStaticAd->static_ad_image}}" alt=""></td>
                                                					<td>{{$allApprovedStaticAd->u_first_name}}&nbsp;
                                                					{{$allApprovedStaticAd->u_last_name}} </td>
                                                					<td>{{date('M jS, Y',strtotime($allApprovedStaticAd->created_at))}}</td>
                                                					
																	<td class="phn-email"><span>{{$allApprovedStaticAd->mobile}}</span><span>{{$allApprovedStaticAd->email}}</span></td>
                                                					<td>{{$allApprovedStaticAd->position_name}}</td>
                                                					<td>{{$allApprovedStaticAd->category_name}}</td>
                                                					<td>{{$allApprovedStaticAd->page_name}}</td>
                                                					<td>{{$allApprovedStaticAd->static_ad_link}}</td>
                                                					<td>{{$allApprovedStaticAd->start_date}}</td>
                                                					<td>{{$allApprovedStaticAd->end_date}}</td>															
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Aproved</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">{{$allApprovedStaticAd->package_name}}</a></td>
																	
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
									{{$allApprovedStaticAds->links()}}
										<!-- <li><a href="#"><span></span></a></li>
										<li><a href="#"><span>1</span></a></li>
										<li><a href="#">2</a></li>
										<li class="active"><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#"><span>»</span></a></li> -->
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
