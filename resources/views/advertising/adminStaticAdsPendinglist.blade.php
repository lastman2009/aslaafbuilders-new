@php
$title = "Pending Static Property Add Payment Method";
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
                        <li class="active" role="presentation">
                            <a aria-expanded="true" role="tab" id="profile_tab_15" href="/dashboard/user/static/ads/pending">Pending</a>
                        </li>
                        <li role="presentation">
                            <a id="agent_tab_15" role="tab" href="/dashboard/admin/static/ads/reject" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="">
                            <a id="architecture_tab_15" role="tab" href="/dashboard/admin/static/ads/approve" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="admin-pending-property" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Admin Pending Static And Popup Ads</h6>
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
																	<th>Status</th>
																	<th>Packages</th>
																	<th>Controls</th>
																</tr>
															</thead>
															<tbody>
														<?php $i=1?>
															@foreach($allPendingStaticAdsForAdmin as $allPendingStaticAd)
																<tr>
																	
																	<td>{{$allPendingStaticAd->static_id}}</td>
                                                					<td>{{$allPendingStaticAd->static_ad_title}}</td>
                                                					<td><img style="width: 70px;" src="/images/staticAd/{{$allPendingStaticAd->static_ad_image}}" alt=""></td>
                                                					<td>{{$allPendingStaticAd->u_first_name}}&nbsp;
                                                					{{$allPendingStaticAd->u_last_name}} </td>
                                                					<td>{{date('M jS, Y',strtotime($allPendingStaticAd->created_at))}}</td>
                                                					
																	<td class="phn-email"><span>{{$allPendingStaticAd->mobile}}</span><span>{{$allPendingStaticAd->email}}</span></td>

																	<td>{{$allPendingStaticAd->position_name}}</td>
                                                					<td>{{$allPendingStaticAd->category_name}}</td>
                                                					<td>{{$allPendingStaticAd->page_name}}</td>
                                                					<td>{{$allPendingStaticAd->static_ad_link}}</td>
                                                					<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Pending</a></td>
																	
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">{{$allPendingStaticAd->package_name}}</a></td>
																	<td>
																		<a href="/adminStaticAdsPaymentMethod/{{$allPendingStaticAd->u_id}}/{{$allPendingStaticAd->static_id}}" class="mr-5" data-toggle="tooltip" data-original-title="Proceed"> 
																			<i class="fa fa-arrow-circle-right m-r-10"></i> 
																		</a>
																		<a data-toggle="modal" data-target="#myModal<?php echo $i;?>" href="" class="mr-5" data-toggle="tooltip" data-original-title="Reject"> 
																			<i class="fa fa-ban text-inverse m-r-10"></i> 
																		</a>
																		<a href="#" data-toggle="tooltip" data-original-title="Approve"> 
																			<i class="fa fa-file-text-o"></i> 
																		</a>
																	</td>
																</tr>
																    <div id="myModal<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<form action="rejectStaticAd/{{$allPendingStaticAd->static_id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
																{{ csrf_field() }}
																        <div class="modal-dialog">
																            <div class="modal-content">
																                <div class="modal-header">
																                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																                    <h5 class="modal-title" id="myModalLabel">Why you reject?</h5>
																                </div>
																                <div class="modal-body model-popup">
																                    
																	                    <div class="form-group">
																							<textarea name="reject" class="form-control" rows="10"></textarea>
																						</div>
																					
																                </div>
																                <div class="modal-footer">
																                    <button class="btn btn-info btn-model-agency" type="submit">Submit</button>
																                </div>
																            </div>
																        </div>
																</form>
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
										{{$allPendingStaticAdsForAdmin->links()}}
										
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
