@php
$title = "Discount Offer List";
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
							<h2><a class="add-blog" href="/createDiscountOffer">Add New Discount Offers</a></h2>
							<div class="table-wrap loadyou">
								<div class="table-responsive">
									<table id="discountOffer-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Name</th>
					                        	<th>Percentage</th>
					                        	<th>Status</th>
					                        	<th>Action</th>
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($discountOffers as $discountOffer)
                                            <tr>
                                                <td>{{$discountOffer->id}}</td>
					                        	<td>{{$discountOffer->name}}</td>
					                        	<td>{{$discountOffer->percent_price}}</td>
					                        	

					                        	@if($discountOffer->status == 1)
					                        	<td><a href="javascipt:void(0);" class="discountOfferstatus" data-url="discountOfferStatusChange/{{$discountOffer->id}}/{{$discountOffer->status}}" data-id="{{$discountOffer->id}}">
					                        	<span 
                                				class="label label-success ">Active</span></a></td>
			                    				@else
												<td><a href="javascipt:void(0);" class="discountOfferstatus" data-url="discountOfferStatusChange/{{$discountOffer->id}}/{{$discountOffer->status}}" data-id="{{$discountOffer->id}}">
					                        	<span
                                				class="label label-default ">In Active</span></a></td>
			                    				@endif
					                        	<td>
													<a href="#" data-id="{{$discountOffer->id}}" class="delete mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
													<a href="/editDiscountOffer/
													{{$discountOffer->id}}" data-toggle="tooltip" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
												</td>
                        	 				</tr>
                        	 			@endforeach
                                        </tbody>
                                    </table>	
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
	    $('#discountOffer-listing').DataTable();

	    $('.discountOfferstatus').click(function()
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
						$(current).data("url", "discountOfferStatusChange/"+id+"/"+e.success);
					}
					else
					{	
						$(current).children("span").attr("class", "label label-default");
						$(current).children("span").text("In Active");
						$(current).data("url", "discountOfferStatusChange/"+id+"/"+e.success);
					}

				}
	    	});
		});

		$('.delete').click(function(){
			var id=$(this).data('id');
			var url ='discountOfferDelete/'+id;
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