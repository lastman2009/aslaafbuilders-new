@php
$title = "Search Architects";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        
		
		
		 <div class="row">
            <div class="col-lg-12 mt-40 inventory-search architecture-inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Architecture Directory Search.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
							<form action="/dashboard/architecture/search/result" method="post">
                            {{ csrf_field() }}
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Architecture Name" name="name">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<input type="text" class="form-control inventory-area" placeholder="Architecture ID" name="id">
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
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Website</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @foreach($user_character_details as $user_character_detail)
                                            
                                            <tr>
                                               <td>{{$user_character_detail->user_id}}</td>
                                               <td>{{$user_character_detail->name}}</td>
                                               <td>{{$user_character_detail->telephone}}</td>
                                               <td>{{$user_character_detail->website}}</td>
                                               <td>{{$user_character_detail->location}}</td>
                                               <td>{{$user_character_detail->city_name}}</td>
                                               <td><a href="/dashboard/architecture/pk1000-{{$user_character_detail->user_id}}/{{$user_character_detail->name}}" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

                                               
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
        

