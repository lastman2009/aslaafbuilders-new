@php
$title = "Rejected Static Property Add Payment Method";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
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
                            <a aria-expanded="true" role="tab" id="profile_tab_15" href="/dashboard/user/static/ads/pending">Pending</a>
                        </li>
                        <li role="presentation" class="active">
                            <a id="agent_tab_15" role="tab" href="/dashboard/admin/static/ads/reject" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="">
                            <a id="architecture_tab_15" role="tab" href="/dashboard/admin/static/ads/approve" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="agent_tab_15" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Admin Rejected Static And Popup Ads</h6>
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
																	<th>User Name</th>
																	<th>Created At</th>
																	<th>Phone / Email</th>
																	<th>Positions</th>
																	<th>Category</th>
																	<th>Page</th>
																	<th>Link</th>
																	<th>Reject Resion</th>
																	<th>Packages</th>
																</tr>
															</thead>
															<tbody>
															<?php $i=1?>
															@foreach($allRejectStaticAds as $allRejectStaticAd)
																<tr>
																	<td><?php echo $i?></td>
																	<td>{{$allRejectStaticAd->static_id}}</td>
                                                					<td>{{$allRejectStaticAd->static_ad_title}}</td>
                                                					<td><img style="width: 70px;" src="/images/staticAd/{{$allRejectStaticAd->static_ad_image}}" alt=""></td>
                                                					<td>{{$allRejectStaticAd->u_first_name}}&nbsp;
                                                					{{$allRejectStaticAd->u_last_name}} </td>
                                                					<td>{{date('M jS, Y',strtotime($allRejectStaticAd->created_at))}}</td>
                                                					
																	<td class="phn-email"><span>{{$allRejectStaticAd->mobile}}</span><span>{{$allRejectStaticAd->email}}</span></td>
                                                					<td>{{$allRejectStaticAd->position_name}}</td>
                                                					<td>{{$allRejectStaticAd->category_name}}</td>
                                                					<td>{{$allRejectStaticAd->page_name}}</td>
                                                					<td>{{$allRejectStaticAd->static_ad_link}}</td>
																
																	<td><a  data-toggle="modal" data-target="#myModal<?php echo $i;?>" href="javascript:void(0);" class="btn btn-sm add-property-featured">Read</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">{{$allRejectStaticAd->package_name}}</a></td>
																</tr>

																 <div id="myModal<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															        <div class="modal-dialog">
															            <div class="modal-content">
															                <div class="modal-header">
															                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															                    <h5 class="modal-title" id="myModalLabel">Why This reject.</h5>
															                </div>
															                <div class="modal-body model-popup">
															                    
																                <p>{{$allRejectStaticAd->reject_reason}} </p>
																				
															                </div>
															            </div>
															        </div>
															    </div>
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
										{{$allRejectStaticAds->links()}}
										
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
