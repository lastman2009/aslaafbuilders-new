@php
$title = "Rejected Featured Property Add List";
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
                            <a aria-expanded="true" role="tab" id="profile_tab_15" href="/dashboard/admin/featured/pending">Pending</a>
                        </li>
                        <li role="presentation" class="active">
                            <a id="agent_tab_15" role="tab" href="/dashboard/admin/featured/reject" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" class="">
                            <a id="architecture_tab_15" role="tab" href="/dashboard/admin/featured/approved" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="agent_tab_15" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Admin Rejected Properties</h6>
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
																
																	<th>Reason</th>
																</tr>
															</thead>
															<tbody>
															<?php $i=1?>
															@foreach($adminRejectFeaturedProperties as $adminRejectFeaturedPropertie)
																<tr>
																	<td><?php echo $i?></td>
																	<td>{{$adminRejectFeaturedPropertie->u_id}}</td>
                                                					<td>{{$adminRejectFeaturedPropertie->title}}</td>
                                                					<td>{{$adminRejectFeaturedPropertie->u_first_name}} &nbsp;
                                                					{{$adminRejectFeaturedPropertie->u_last_name}} </td>
                                                					<td>{{date('M jS, Y',strtotime($adminRejectFeaturedPropertie->p_created_at))}}</td>
                                                					<td>{{$adminRejectFeaturedPropertie->p_address}}</td>
																	<td class="phn-email"><span>{{$adminRejectFeaturedPropertie->mobile}}</span><span>{{$adminRejectFeaturedPropertie->email}}</span></td>
																	
																	
																	<td><a  data-toggle="modal" data-target="#myModal<?php echo $i;?>" href="javascript:void(0);" class="btn btn-sm add-property-featured">Read</a></td>
																</tr>

																 <div id="myModal<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															        <div class="modal-dialog">
															            <div class="modal-content">
															                <div class="modal-header">
															                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															                    <h5 class="modal-title" id="myModalLabel">Why you reject?</h5>
															                </div>
															                <div class="modal-body model-popup">
															                    
																                <p>{{$adminRejectFeaturedPropertie->reject_reason}} </p>
																				
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
										{{$adminRejectFeaturedProperties->links()}}
										
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
