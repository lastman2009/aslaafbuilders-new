@php
$title = "Discount Offer Trash List";
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
							<h2><a class="add-blog" href="/createDiscountOffer">Add New DiscountOffer</a></h2>
							<div class="table-wrap loadyou">
								<div class="table-responsive">
									<table id="discountOffer-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Name</th>
					                        	<th>Percentage</th>
					                        	<th>Status</th>
					                        	
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($discountOffers as $discountOffer)
                                            <tr>
                                                <td>{{$discountOffer->id}}</td>
					                        	<td>{{$discountOffer->name}}</td>
					                        	<td>{{$discountOffer->percent_price}}</td>
					                        	
													<td><a href="discountOfferRestore/{{$discountOffer->id}}/{{$discountOffer->status}}" class="blogstatus" >
					                        	<span 
                                				class="label label-success ">Restore</span></a></td>
												
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

    });
</script>