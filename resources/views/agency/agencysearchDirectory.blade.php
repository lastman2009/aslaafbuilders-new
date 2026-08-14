@php
$title = "Search Agency";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        
		
		
		 <div class="row">
            <div class="col-lg-12 mt-40 inventory-search architecture-inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Agency Directory Search.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
							<form action="/directory/agency/result" method="post">
                            {{ csrf_field() }}
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Agency Name" name="name">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Agency ID" name="id">
											</div>
										</div>
										
										<div class="col-md-6 padding-left">
										  
											<select class="selectpicker" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Search By City--">
                                            
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{$city->name}}
                                            </option>
                                             @endforeach
                                        </select>
										</div>
										
										<div class="col-md-12 padding-left mt-15">
											<button type="submit" class="btn btn-submit-webinfo btn-client btn-anim"><i class="fa fa-search"></i><span class="btn-text">Search</span></button>
										</div>
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if(!empty($user_character_details))

        <div class="row">
            <div class="col-lg-12 inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class client-list-heading txt-dark">Architecture Directory Search Result.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Agency Name</th>
                                                <th>Agency No</th>
                                                <th>Website</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @foreach($user_character_details as $user_character_detail)
                                            
                                            <tr>
                                               <td>{{$user_character_detail->agency_websites_id}}</td>
                                               <td>{{$user_character_detail->agency_name}}</td>
                                               <td>{{$user_character_detail->contact_number}}</td>
                                               <td>{{$user_character_detail->website}}</td>
                                               <td>{{$user_character_detail->address}}</td>
                                               <td>{{$user_character_detail->city_name}}</td>
                                               <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

                                               
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
        </div>
        @else

        @endif
		


        <!-- /Row -->

 @include( 'includes_admin.footer' )
        
		<script>
			$(document).ready(function () {
				$('#datable_property').DataTable({});
			});
		</script>
        

