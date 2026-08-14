@php
$title = "Featured List";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->

<style type="text/css">
    td.phn-email span{
        display: block;
    } 
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <ul role="tablist" class="nav nav-tabs featured-bold-tab" id="profile_tablist">
                        <li role="presentation" class="active">
                            <a aria-expanded="true" id="profile_tab_15" href="/dashboard/user/featured/pending">Pending</a>
                        </li>
                        <li role="presentation" class="">
                            <a  id="agent_tab_15" href="/dashboard/user/featured/reject" aria-expanded="false">Rejected</a>
                        </li>
                        <li role="presentation" >
                            <a id="architecture_tab_15" href="/dashboard/user/featured/approved" aria-expanded="false">Approved</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="admin-pending-property" class="tab-pane fade active in" role="tabpanel">
                             <div class="row">
								<!-- Responsive Table -->
								<div class="col-lg-12">
									<div class="panel panel-default card-view recent-add-class-padding">
										<h6 class="panel-title add-heading-text txt-dark mt-20">Pending Featured Properties</h6>
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
																	<th>Created</th>
																	<th>Address</th>
																	<th>Phone / Email</th>
																	<th>Status</th>
																	<th>Packages</th>
																</tr>
															</thead>
															<tbody>
															<?php $i=1?>
															@foreach($allPendingFeaturedProperties as $allPendingFeaturedPropertie)
																<tr>
																	<td><?php echo $i?></td>
																	<td>{{$allPendingFeaturedPropertie->p_id}}</td>
                                                					<td>{{$allPendingFeaturedPropertie->title}}</td>
                                                					<td>{{date('M jS, Y',strtotime($allPendingFeaturedPropertie->p_created_at))}}</td>
                                                					<td>{{$allPendingFeaturedPropertie->p_address}}</td>
																
																	<td class="phn-email"><span>{{$allPendingFeaturedPropertie->mobile}}</span><span>{{$allPendingFeaturedPropertie->email}}</span></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-featured">Pending</a></td>
																	<td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">{{$allPendingFeaturedPropertie->pkg_name}}</a></td>
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
                                        {{$allPendingFeaturedProperties->links()}}
										
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
