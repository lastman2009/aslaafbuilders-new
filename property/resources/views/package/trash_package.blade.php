@php
$title = "Trash Package List";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')


<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<!-- Basic Table -->
			
			<div class="col-sm-12">
				<div class="panel panel-default card-view add-new-blog">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<h2><a class="add-blog" href="/dashboard/admin/create/package">Add New Package</a></h2>
							<div class="table-wrap loadyou">
								<div class="table-responsive">
									<table id="package-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Name</th>
					                        	<th>Price</th>
					                        	<th>Duration</th>
					                        	<th>Status</th>
					                        	
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($packages as $package)
                                            <tr>
                                                <td>{{$package->id}}</td>
					                        	<td>{{$package->name}}</td>
					                        	<td>{{$package->price}}</td>
					                        	<td>{{$package->duration}}</th>
													<td><a href="/dashboard/admin/package/restore/{{$package->id}}/{{$package->status}}" class="blogstatus" >
					                        	<span 
                                				class="label label-success ">Restore</span></a></td>
												
                        	 			@endforeach
                                        </tbody>
                                    </table>
                                    {{$packages->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Basic Table -->
		</div>
	</div>
@include( 'includes_admin.footer' )
<script type="text/javascript">
	$(document).ready(function(){
	    $('#package-listing').DataTable({
	    	 "bPaginate": false,
	    });

    });
</script>