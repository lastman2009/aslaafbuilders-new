@php
$title = "Pending Featured Property Add List";
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
                            <a aria-expanded="true" role="tab" id="profile_tab_15" href="/dashboard/admin/featured/pending">Pending</a>
                        </li>
                        <li role="presentation">
                            <a id="agent_tab_15" role="tab" href="/dashboard/admin/featured/reject" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="">
                            <a id="architecture_tab_15" role="tab" href="/dashboard/admin/featured/approved" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="admin-pending-property" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Admin Featured Properties</h6>
										<div class="panel-wrapper collapse in">
											<div class="panel-body">	
												<div class="table-wrap">
													<div class="table-responsive">
														<table id="user_active_property" class="table table-hover display  pb-30" >
															<thead>
																<tr>
																	<th>S.N</th>
																	<th>User ID</th>
																	<th>Title</th>
																	<th>Name</th>
																	<th>Created</th>
																	<th>Address</th>
																	<th>Phone / Email</th>
																	<th>Packages</th>
																	<th>Controls</th>
																</tr>
															</thead>
															<tbody>
														<?php $i=1?>
															@foreach($adminPendingFeaturedProperties as $adminPendingFeaturedPropertie)
																<tr>
																	<td><?php echo $i?></td>
																	<td>{{$adminPendingFeaturedPropertie->u_id}}</td>
                                                					<td>{{$adminPendingFeaturedPropertie->title}}</td>
                                                					<td>{{$adminPendingFeaturedPropertie->u_first_name}}&nbsp;
                                                					{{$adminPendingFeaturedPropertie->u_last_name}} </td>
                                                					<td>{{date('M jS, Y',strtotime($adminPendingFeaturedPropertie->p_created_at))}}</td>
                                                					<td>{{$adminPendingFeaturedPropertie->p_address}}</td>
																	<td class="phn-email"><span>{{$adminPendingFeaturedPropertie->mobile}}</span><span>{{$adminPendingFeaturedPropertie->email}}</span></td>
																	
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">{{$adminPendingFeaturedPropertie->pkg_name}}</a></td>
																	<td>
																		<a href="/dashboard/admin/advertising/payment/method/{{$adminPendingFeaturedPropertie->u_id}}/{{$adminPendingFeaturedPropertie->paid_property_id}}" class="mr-5" data-toggle="tooltip" data-original-title="Proceed"> 
																			<i class="fa fa-arrow-circle-right m-r-10"></i> 
																		</a>
																		<a data-toggle="modal" data-target="#myModal<?php echo $i;?>" href="javascript:void(0)" class="mr-5" data-toggle="tooltip" data-original-title="Reject"> 
																			<i class="fa fa-ban text-inverse m-r-10"></i> 
																		</a>
																		<!-- <a href="#" data-toggle="tooltip" data-original-title="Approve"> 
																			<i class="fa fa-file-text-o"></i> 
																		</a> -->
																	</td>
																</tr>
																    <div id="myModal<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<form action="/rejectFeatureAdverteAd/{{$adminPendingFeaturedPropertie->paid_pro_id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
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
										{{$adminPendingFeaturedProperties->links()}}
										
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
