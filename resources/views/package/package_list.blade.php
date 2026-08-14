@php
$title = "Packages List";
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
					                        	<th>Action</th>
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($packages as $package)
                                            <tr>
                                                <td>{{$package->id}}</td>
					                        	<td>{{$package->name}}</td>
					                        	<td>{{$package->price}}</td>
					                        	<td>{{$package->duration}} days</td>

					                        	@if($package->status == 1)
					                        	<td><a href="javascipt:void(0);" class="packagestatus" data-url="/packageStatusChange/{{$package->id}}/{{$package->status}}" data-id="{{$package->id}}">
					                        	<span 
                                				class="label label-success ">Active</span></a></td>
			                    				@else
												<td><a href="javascipt:void(0);" class="packagestatus" data-url="/packageStatusChange/{{$package->id}}/{{$package->status}}" data-id="{{$package->id}}">
					                        	<span
                                				class="label label-default ">In Active</span></a></td>
			                    				@endif
					                        	<td>
													<a href="javascript:void(0)" data-id="{{$package->id}}" class="delete mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
													<a href="/dashboard/admin/edit/package/
													{{$package->id}}" data-toggle="tooltip" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
												</td>
                        	 				</tr>
                        	 			@endforeach
                                        </tbody>
                                    </table>	
                                    {{ $packages->links()}}
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

	    $('.packagestatus').click(function()
	    {
	    	var url = $(this).data('url');
	    	var current =$(this);
	    	var id =$(this).data('id');
	    	// alert(id);
	    	$.ajax({
	    		url:url,
	    		datatype: 'json',
				method: 'POST',
				headers: {
							'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				success: function ( e ) {
					//alert(e.success);
					if(e.success ==  1)
					{
						$(current).children("span").attr("class", "label label-success");
						$(current).children("span").text("Active");
						$(current).data("url", "/packageStatusChange/"+id+"/"+e.success);
					}
					else
					{	
						$(current).children("span").attr("class", "label label-default");
						$(current).children("span").text("In Active");
						$(current).data("url", "/packageStatusChange/"+id+"/"+e.success);
					}

				}
	    	});
		});

		$('.delete').click(function(){
			var id=$(this).data('id');
			var url ='/packageDelete/'+id;
			var current =$(this);
			  if (confirm('Are you sure you want to remove this?')) {
			$.ajax({
	    		url:url,
	    		datatype: 'json',
				method: 'POST',
				headers: {
							'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				success: function ( e ) {
				current.parent().parent().remove();

				}
			});
		}
		});
    });
</script>