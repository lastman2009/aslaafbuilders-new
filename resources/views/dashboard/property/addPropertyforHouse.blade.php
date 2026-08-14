@php
$title = "Property Add";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Row -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="tab-struct custom-tab-2 mt-40">
					<div class="tab-content edit-property-page">	

						<form action="/addpropertyForHouse" method="post" enctype="multipart/form-data">
							{{ csrf_field()}}
							<div class="row">
								<div class="col-lg-12 padding-right theme-heading">
									<div class="col-lg-6 col-md-6 col-sm-12 padding-left">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 property-section">
												<div class="panel panel-default card-view propertytypeheight">
													<div class="panel-wrapper collapse in">
														<div class="panel-body">
															<h1>Property Type</h1>
															<ul class="donate-now list-inline">
																<li>
																	<input type="radio" id="a25" class="radio-btn" name="purpose" value="1" checked="checked"/>
																	<label for="a25">For Sale</label>
																</li>
																<li>
																	<input type="radio" class="radio-btn" id="a50" name="purpose" value="2"/>
																	<label for="a50">For Rent</label>
																</li>
																<li>
																	<input type="radio" id="a75" name="purpose" class="last-radio-btn" value="3"/>
																	<label for="a75">Wanted</label>
																</li>
															</ul>
															<div class="tab-content" id="property_tabcontent">
																<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">
																	<div class="row" style="min-height: 50px">
																		<div class="col-md-12 padding-right show-checkbox" style="display: none;">
																			<div class="col-md-12 padding-left">
																				<ul class="propertytypelist">
																					<li>
																						<input name="wanted_purpose" type="radio" id="wanted-rent" value="Rent" />
																						<label for="wanted-rent">Rent</label>
																					</li>
																					<li>
																						<input name="wanted_purpose" type="radio" value="Buy" id="wanted-buy"/>
																						<label for="wanted-buy">Buy</label>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12 padding-right">
																			<div class="col-md-12 padding-left">
																				<div class="form-group">
																					<label class="control-label mb-10" for="email_de">Select Property Type:</label>
																					<select name="property_type_id" id="property_type" class="cascade selectpicker property_type_extra_feature" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required>
																						@foreach($propertyTypes as $propertyType)
																						<optgroup label="{{$propertyType->name}}">
																							@foreach($data[$propertyType->id] as $datas)
																							<option class="{{$propertyType->name}}" value="{{$datas->id}}">{{$datas->name}}</option>
																							@endforeach
																							<hr>
																						</optgroup>
																						@endforeach
																					</select>

																				</div>
																				@if ($errors->has('property_type_id'))
																				<div class="error" style="color: red">{{ $errors->first('property_type_id') }}</div>
																				@endif
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<label class="control-label mb-10" for="email_de">Land Area:</label>
																					<input type="number" id="number" min="0.1" step="0.1" name="area"  />
																				</div>
																				@if ($errors->has('area'))
																				<div class="error" style="color: red">{{ $errors->first('area') }}</div>
																				@endif
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<label class="control-label mb-10" for="email_de">Select Area Type:</label>
																					<select name="area_type" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required>
																						<option value="Square Feet">Square Feet</option>
																						<option value="Square Yards">Square Yards</option>
																						<option value="Square Meters">Square Meters</option>
																						<option value="Marla">Marla</option>
																						<option value="Kanal">Kanal</option>
																						<option value="Acre">Acre</option>
																					</select>
																				</div>
																				@if ($errors->has('area_type'))
																				<div class="error" style="color: red">{{ $errors->first('area_type') }}</div>
																				@endif
																			</div>
																			<div class="col-md-6 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">property title:</label>
									<input type="text" id="" name="title" value="" placeholder="" required/>
								</div>
								@if ($errors->has('title'))
							    <div class="error" style="color: red">{{ $errors->first('title') }}</div>
							@endif
							</div>
							<div class="col-md-6 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">all inclusive price (PKR):</label>
									<input type="text" id="mytext" name="price" onkeypress='return validateQty(event);' class="tooltip-color" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" data-toggle="tooltip" data-placement="top"  placeholder="" required/>
								</div>
								@if ($errors->has('price'))
							    <div class="error" style="color: red">{{ $errors->first('price') }}</div>
								@endif

								<!-- <input type="text" name="number" placeholder="Number OR Amount" onkeyup="word.innerHTML=convertNumberToWords(this.value)" /> -->
								<div id="word" style="position: absolute;
								top: -74px;
								background: #000;
								color: #fff;
								text-align: center;
								border-radius: 5px;
								line-height: 25px;
								padding: 10px;
								font-size: 14px;
								display:none;"></div>

				
							</div>
																		</div>
																	</div>
																</div>
																
															</div>
															{{-- <button ></button> --}}
															<div class="row">
																<div class="col-md-6"><a href="javascript:void(0)" class="btn" style="width:100%;background-color: #f0b708;color: white;" id="image-info"  >Add Image</a></div>
																<div class="col-md-6"><a href="javascript:void(0)" class="btn" style="width:100%;background-color: #f0b708;display: none;color: white;" id="extraFeature"  >Extra Features</a></div>

															</div>
															


															
														</div>
													</div>
												</div>
											</div>
			<div class="col-lg-12 col-md-12 col-sm-12 property-section client-info-tab">
				<div class="panel panel-default card-view" style="min-height: 295px;">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<h1>Client Detail</h1>
							<div class="row">
								<div class="col-md-12 padding-right">
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Select User:</label>
											<select id="yourdropdownid" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" name="clientdata">
												<option value="user">Myself</option>
												@foreach($clients as $client)
												<option value="{{$client->id}}">{{$client->name}}</option>
												@endforeach
												<option value="new">New Client</option>
											</select>
										</div>
									</div>
									<div  id="c_name" class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Contact Person Name:</label>
											<input type="text" id="c_name_input" name="client[name]" value="" placeholder=""/>
										</div>
									</div>
									<div class="col-md-6 padding-left" id="c_mobile">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Phone number:</label>
											<input type="text"  name="client[mobile_no]" id="c_mobile_input" value="" placeholder=""/>
										</div>
									</div>
									<div class="col-md-6 padding-left"  id="c_address">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Address</label>
											<input type="text" name="client[address]" id="c_address_input" value="" placeholder=""/>
										</div>
									</div>
									<div class="col-md-6 padding-left"  id="my_name">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Number</label>
											<input type="text" name="my[number]" id="my_name_input" value="{{$user->mobile}}" placeholder=""/>
										</div>
									</div>
									<div class="col-md-6 padding-left"  id="my_mobile">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Name</label>
											<input type="text" name="my[name]" id="my_mobile_input" value="{{$user->first_name}} {{$user->last_name}}" placeholder=""/>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		{{-- 	<div class="col-lg-12 col-md-12 col-sm-12 property-section">
				<div class="panel panel-default card-view propertyvideoheight">
					<div class="panel-wrapper collapse in">
						<div class="panel-body" style="padding: 5px 0 5px;">
							<h1>Add Video</h1>
							<div class="row">
								<div class="col-md-12 padding-right">
										<div class="col-md-12 mr-btm padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="email_de">Upload YouTube URL for video:</label>
												<div class="input-group mb-15"> <span class="input-group-btn">
													<button type="button" class="btn btn-youtube"><img src="../../assets_admin/dist/img/youtube-play.png" /></button>
												</span>
												<input type="text" id="example-input1-group4" name="youtube_link" class="form-control youtube-link" placeholder="">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
			<div class="col-lg-12 col-md-12 col-sm-12 property-section plot">
				<div class="panel panel-default card-view propertyvideoheight">
					<div class="panel-wrapper collapse in">
						<div class="panel-body" style="padding: 5px 0 5px;">
							<h1>Basic Feature</h1>
							<div class="row">
								<div class="col-md-6 padding-left plot">
										<div class="form-group plot">
											<label class="control-label mb-10" for="email_de">Bed Rooms:</label>
											<input type="number" id="" name="bed" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Bath Rooms:</label>
											<input type="number" id="" name="bath" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Built in Year:</label>
											<select name="construction_year" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" >
												@for($i =1960; $i<= 2018; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor

											</select>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">number of floors:</label>
											<input type="number" id="" name="total_floor" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
										</div>
									</div>
									<div class="col-md-12 padding-right">
										<div class="col-md-12 mr-btm padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="email_de">Upload YouTube URL for video:</label>
												<div class="input-group mb-15"> <span class="input-group-btn">
													<button type="button" class="btn btn-youtube"><img src="../../assets_admin/dist/img/youtube-play.png" /></button>
												</span>
												<input type="text" id="example-input1-group4" name="youtube_link" class="form-control youtube-link" placeholder="">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 property-section padding-left">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<h1>Property Detail</h1>
					<div class="row">
						<div class="col-md-12 padding-right">
							
							<div class="col-md-12 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">Property brief description:</label>
									<textarea class="form-control summernote" rows="5" cols="50" name="description" id="" placeholder=""></textarea>
								</div>
								@if ($errors->has('description'))
							    <div class="error" style="color: red">{{ $errors->first('description') }}</div>
								@endif
							</div>
							<h1>Add Address</h1>
							<div class="col-md-6 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">select city:</label>
									<select class="selectpicker" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>

										@foreach($cities as $city) 
										<option value="{{ $city->id }}">{{$city->name}}
										</option> @endforeach
									</select>
									@if ($errors->has('city_id'))
							    <div class="error" style="color: red">{{ $errors->first('city_id') }}</div>
								@endif
								</div>
							</div>
							<div class="col-md-6 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">select town:</label>
									<select name="town_id" id="town" class="selectpicker townclass" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
										
									</select>
									@if ($errors->has('town_id'))
							    <div class="error" style="color: red">{{ $errors->first('town_id') }}</div>
								@endif
									
								</div>
							</div>
							<div class="col-md-4 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">select phase:</label>
									<select name="phase_id" id="phase" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
										
									</select>
									@if ($errors->has('phase_id'))
							    <div class="error" style="color: red">{{ $errors->first('phase_id') }}</div>
								@endif
								</div>
							</div>
							<div class="col-md-4 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">select block:</label>
									<select name="block_id" id="block" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>

									</select>
									@if ($errors->has('block_id'))
							    <div class="error" style="color: red">{{ $errors->first('block_id') }}</div>
								@endif
								</div>
							</div>
							<div class="col-md-4 padding-left">
								<div class="form-group">
									<label class="control-label mb-10" for="email_de">property no.:</label>
									<input type="text" id="" name="property_no" value=""  placeholder=""/>
								</div>
							</div>
							<div class="col-md-12 padding-left">
								<label class="control-label mb-10" for="email_de">Search Map Location:</label>
								<div class="row">
									<div class="col-sm-12 input-group" style="padding-left: 15px;padding-right:15px;">
										<input id="address5" type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete="off"  required="" placeholder="" style="background:#323232;">
										<div class="input-group-addon" style="padding-left: 20px;padding-right: 20px;background: #323232;"><i class="fa fa-search"></i></div>
									</div>
								</div>
								<div class="col-sm-12 marginbot10 gmap-locator" style="margin-top:10px;">
									<div id="locationpicker" class="gmap-frame">
										<!-- Location picker handled with js  -->
									</div>

								



							<div style="text-indent: -999999999999999px;position: absolute;">
										<input type="text" id="latitude" name="latitude" class="" readonly>
										<input type="text" id="longitude" name="longitude" class="" readonly>
									</div>
								</div>
							</div>

									<!-- //////new insert -->
									{{-- <div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">expiry date:</label>
											<div class='input-group date col-md-12 col-sm-12 padding-right padding-left' id='datetimepicker1'>
												<input type="text" class="form-control" name="expire_date"  placeholder="Expire date">
												<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">ownership status:</label>
											<select name="ownership_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Notihng Selected--">
												<option value="Freehold">Freehold</option>
												<option value="Leasehold">Leasehold</option>
											</select>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">occupancy status:</label>
											<select name="occupancy_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Notihng Selected--">
												<option value="Vacant">Vacant</option>
												<option value="Occupied">Occupied</option>
											</select>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Construction Status:</label>
											<select name="construction_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Notihng Selected--">
												<option value="Complete">Complete</option>
												<option value="Under Construction">Under Construction</option>
												<option value="Gray Structure">Gray Structure</option>
											</select>
										</div>
									</div> --}}
									{{-- <h1 class="plot">Basic Feature</h1>

									<div class="col-md-6 padding-left plot">
										<div class="form-group plot">
											<label class="control-label mb-10" for="email_de">Bed Rooms:</label>
											<input type="number" id="" name="bed" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Bath Rooms:</label>
											<input type="number" id="" name="bath" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Built in Year:</label>
											<select name="construction_year" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" >
												@for($i =1960; $i<= 2018; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor

											</select>
										</div>
									</div>
									<div class="col-md-6 padding-left plot">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">number of floors:</label>
											<input type="number" id="" name="total_floor" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
										</div>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 property-section extra-feature-tab" style="display: none;">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<h1>Extra Features</h1>
						<div class="row extra-feature">
							<div class="col-md-12 padding-right nicescroll-bar">
								<div class="col-md-6 padding-left plot">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">flooring:</label>
										<select name="flooring[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
											<option value="tiles">Tiles</option>
											<option value="marble">Marble</option>
											<option value="wooden">Wooden</option>
											<option value="chip">Chip</option>
											<option value="cement">Cement</option>
											<option value="epoxy">Epoxy</option>

										</select>
									</div>

								</div>
								<div class="col-md-6 padding-left plot">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">electricity backup:</label>
										<select name="electricity_backup[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
											<!-- <option value="">Electricity Backup</option> -->
											<option value="UPS">UPS</option>
											<option value="Generator">Generator</option>
											<option value="Solar">Solar</option>

										</select>

									</div>
								</div>
{{-- 	<div class="col-md-6 padding-left plot">
<div class="form-group">
<label class="control-label mb-10" for="email_de">number of floors:</label>
<input type="number" id="" name="total_floor" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
</div>
</div> --}}
<div class="col-md-6 padding-left plot">
	<div class="form-group quantity">
		<label class="control-label mb-10" for="email_de">parking space:</label>
		<input type="number" id="" name="parking_space" min="1" max="50" step="1" value="" onkeypress="return event.charCode >= 48"  placeholder=""/>
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby banks:</label>
		<input type="text" id="" name="near_bank" value="" placeholder="">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby schools:</label>
		<input type="text" id="" name="near_school" value="" placeholder="">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby hospitals:</label>
		<input type="text" id="" name="near_hospital" value="" placeholder="">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby shopping malls:</label>
		<input type="text" id="" name="near_shopping_mall" value="" placeholder="">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby restaurants:</label>
		<input type="text" id="" name="near_restaurant" value="" placeholder="">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">distance from airport (kms):</label>
		<input type="number" id="" name="distance_airport" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">distance from railway station (kms):</label>
		<input type="number" id="" name="distance_railway" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby water filteration plants:</label>
		<input type="number" id="" name="near_water_filter" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
{{-- <div class="col-md-6 padding-left residential plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">nearby public transport:</label>
		<input type="text" id="" name="near_transport" value="" placeholder="">
	</div>
</div> --}}
<div class="col-md-6 padding-left plot residential commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">servant quarters:</label>
		<input type="number" id="" name="servant_quarter" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">drawing rooms:</label>
		<input type="number" id="" name="drawing_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div 	class="col-md-6 padding-left plot commercial">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">dinning room:</label>
		<input type="number" id="" name="dinning_room" value="" placeholder="">
	</div>
</div>
<div class="col-md-6 padding-left plot ">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">Kitchens:</label>
		<input type="number" id="" name="no_of_kitchens" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">Study rooms:</label>
		<input type="number" id="" name="study_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">prayer rooms:</label>
		<input type="number" id="" name="prayer_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">dressing rooms:</label>
		<input type="number" id="" name="powder_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot residential">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">gym rooms:</label>
		<input type="number" id="" name="gym" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">store rooms:</label>
		<input type="number" id="" name="no_of_store_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">lounge of sitting rooms:</label>
		<input type="number" id="" name="lounge" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<label class="control-label mb-10" for="email_de">laundry rooms:</label>
		<input type="number" id="" name="laundry_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="double_glazed_window" type="checkbox" value="1" id="double-glazed-window"/>
				<label for="double-glazed-window">Double Glazed Window</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="central_ac" type="checkbox" id="air-conditioning" value="1"/>
				<label for="air-conditioning">Central Air Conditioning</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="central_heating" type="checkbox" id="central-heating" value="1"/>
				<label for="central-heating">Central Heating</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="waste_disposal" type="checkbox" id="waste-disposal" value="1" />
				<label for="waste-disposal">Waste Disposal</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="furnished" type="checkbox" id="furnished" value="1"/>
				<label for="furnished">Furnished</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="internet" type="checkbox" id="internet" value="1"/>
				<label for="internet" >Broadband Internet Access</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="cabel_tv" type="checkbox" id="satelite" value="1"/>
				<label for="satelite">Satellite or Cable TV Ready</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="intercom" type="checkbox" id="intercom" value="1"/>
				<label for="intercom">Intercom</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="swimming_pool" type="checkbox" value="1" id="swimming-pool"/>
				<label for="swimming-pool">Swimming Pool</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="sauna" type="checkbox" id="sauna" value="1"/>
				<label for="sauna">Sauna</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot residential">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="jacuzzi" type="checkbox" id="jacuzzi" value="1"/>
				<label for="jacuzzi">Jacuzzi</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="maintenance" type="checkbox" id="maintenance-staff" value="1"/>
				<label for="maintenance-staff">Maintenance Staff</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="security" type="checkbox" id="security-staff" value="1"/>
				<label for="security-staff">Security Staff</label>
			</li>
		</ul>
	</div>
</div>
	<div class="col-md-6 padding-left plot">
		<div class="form-group ">
			<ul class="profile-information extra-select">
				<li>
					<input name="lawn" type="checkbox" id="lawn" value="1"/>
					<label for="lawn">lawn</label>
				</li>
			</ul>
		</div>
	</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="community_club" type="checkbox" id="community_club" value="1"/>
				<label for="community_club">Community Club</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input type="checkbox" id="community_center" value="1" name="community_center" />
				<label for="community_center">Community Center</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left plot residential">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input type="checkbox" id="disabled" value="1" name="facility_disabled" />
				<label for="disabled" >Facilities for Disabled</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot residential">	
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="elevator" type="checkbox" id="elevator" value="1"/>
				<label for="elevator">Services Elevators</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot residential">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="conference_room" type="checkbox" id="conference-room" value="1"/>
				<label for="conference-room">Conference Room</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left plot">
	<div class="form-group ">
		<ul class="profile-information extra-select">
			<li>
				<input name="visitor_parking" type="checkbox" id="visitor-parking" value="1"/>
				<label for="visitor-parking">Visitor Parking</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="ground" type="checkbox" id="ground" value="1" />
				<label for="ground">Ground</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="gas" type="checkbox" id="gas" value="1" />
				<label for="gas">Gas</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="wide_carpeted_roads" type="checkbox" id="wide_carpeted_roads" value="1" />
				<label for="wide_carpeted_roads">Carpeted Road</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="wide_roads_with_green_belts" type="checkbox" id="wide_roads_with_green_belts" value="1" />
				<label for="wide_roads_with_green_belts">Green Belt </label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="dancing_fountain" type="checkbox" id="dancing_fountain" value="1" />
				<label for="dancing_fountain">Dancing Fountain </label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="fitness_center" type="checkbox" id="fitness_center" value="1" />
				<label for="fitness_center">Fitness Center</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="tv_cable_network" type="checkbox" id="tv_cable_network" value="1" />
				<label for="tv_cable_network">Tv Cable Network</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="underground_sewerage_system" type="checkbox" id="underground_sewerage_system" value="1" />
				<label for="underground_sewerage_system">Underground Sewerage System</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="underground_electricity_supply" type="checkbox" id="underground_electricity_supply" value="1" />
				<label for="underground_electricity_supply">Underground Electricity</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="underground_plumbing" type="checkbox" id="underground_plumbing" value="1" />
				<label for="underground_plumbing">Underground Plumbing</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="underground_water_supply" type="checkbox" id="underground_water_supply" value="1" />
				<label for="underground_water_supply">Underground Water Supply</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="security_service" type="checkbox" id="security_service" value="1" />
				<label for="security_service">Security Service</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="zoo" type="checkbox" id="zoo" value="1" />
				<label for="zoo">Zoo</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="gated_community" type="checkbox" id="gated_community" value="1" />
				<label for="gated_community">Gated Community</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="car_rental_service" type="checkbox" id="car_rental_service" value="1" />
				<label for="car_rental_service">Car Rent Service</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="parks" type="checkbox" id="park" value="1" />
				<label for="park">Park</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="commercial_center" type="checkbox" id="commercial_center" value="1" />
				<label for="commercial_center">Commercial Center</label>
			</li>
		</ul>
	</div>
</div>

<div class="col-md-6 padding-left residential commercial">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="boundary_wall" type="checkbox" id="boundary_wall" value="1" />
				<label for="boundary_wall">Boundary Wall</label>
			</li>
		</ul>
	</div>
</div>


<div class="col-md-6 padding-left">
	<div class="form-group">
		<ul class="profile-information extra-select">
			<li>
				<input name="mosques" type="checkbox" id="mosques" value="1" />
				<label for="mosques">Mosques</label>
			</li>
		</ul>
	</div>
</div>
<div class="col-md-6 padding-left">
	<div class="form-group">
		<label class="control-label mb-10" for="email_de">Other Facilities:</label>
		<input type="text" id="" name="other_facilities" value="" placeholder="">
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

	<div class="row">
		<div class="col-lg-12 padding-right theme-heading image-info-tab" style="display: none">
			<div class="col-lg-12 col-md-12 col-sm-12 padding-left property-sectione add-property-img-uploader">
				<div class="form-actions edit-form-submit">
					<div class="panel panel-default card-view portfolio-img-tab profile-Image-tab multi-files-uploader">
						<div class="panel-wrapper collapse in">
							<div class="panel-body portfolio-role profile-role">
								<div class="form-group">
									<input id="file-1" type="file" style="z-index: 0;" name="images[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 padding-right theme-heading">
			<div class="col-lg-12 col-md-12 col-sm-12 padding-left">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body submit-property">
							<button type="reset" class="btn btn-reset">Reset</button>
							<button type="submit" class="btn btn-submit">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


</div>
</div>
</div>
</div>
</div>
<!-- /Row -->


@include( 'includes_admin.footer' )

<script>
	$( function () {
		$( '[data-toggle="tooltip"]' ).tooltip()
	} );

	$( function () {
		$( ".load-features" ).slice( 0, 12 ).show();

		$( ".show-btn-property" ).on( 'click', function ( e ) {
			e.preventDefault();
			$( ".load-features:hidden" ).slice( 0, 8 ).slideDown();
			if ( $( ".load-features:hidden" ).length == 0 ) {
				$( "#load" ).fadeOut( 'slow' );
				$( ".show-btn-property" ).hide();
			}

		} );
	} );
</script>

<script>
// var blink = function() {
//     $('#extraFeature').animate({
//         opacity: '0'
//     }, function(){
//         $(this).animate({
//             opacity: '1'
//         }, blink);
//     });
// 	}
	$(function() {
	$('.property_type_extra_feature').change(function(){
	// $('.extra-feature-tab').show();
	$('#image-info').show();
	$('#extraFeature').show();
	// blink();
	});
	});
	$('#image-info').click(function() {
       $('.image-info-tab').toggle('slow');
       // $('#target2').hide();
   });
	$('#extraFeature').click(function() {
       $('.extra-feature-tab').toggle('slow');
       // $('#target2').hide();
   });

	$(document).ready(function(){




		$('#extraFeature').click(function(){
			$('.extra-feature-tab').show();
		});
		$( '#property_type' ).change( function () {
		property_type = $( '#property_type option:selected' ).attr('class');
		// alert(property_type);
		if(property_type == "Plots"){
				$('.commercial').show();
				$('.residential').show();
				$('.plot').css('display','none');
		}
		else if(property_type == "Residential")
		{	
			 $('.commercial').show();
			 $('.plot').show();
			 $('.residential').css('display','none');
		}
		else if(property_type == "Commercial")
		{
			 $('.plot').show();
			 $('.residential').show();
			  $('.commercial').css('display','none');
		}
		else
		{	
			$('.plot').show();
			$('.residential').show();
			 $('.commercial').show();

		}
		// else if()
		// (property_type == "Plots")? $('.plot').css('display','none') $('.residential').show() : $('.plot').show() $('.residential').show();
		// if(property_type == "Residential"){
		// 	 $('.residential').css('display','none');
		// }else{
		// 	$('.residential').show();
		// }
		// (property_type == "Residential")? $('.residential').css('display','none') $('.plot').show(); : $('.residential').show() $('.plot').show();

		// (property_type == "Commercial")? $('.commercial').css('display','none') : $('.commercial').show();
		});
	});		
</script>
<script>
	$( ".file" ).fileinput( {

uploadUrl: '#', // you must set a valid URL here else you will get an error
allowedFileExtensions: [ 'jpg', 'png', 'gif' ],
overwriteInitial: true,
maxFileSize: 1700,
maxFilesNum: 1,
maxFileCount: 11,
showRemove: false,
showUpload: false,
showUploadedThumbs: false,
resizeImage: {
          width: 800,
          height: 800,
          crop: false,
          quality: 100        },
allowedFileTypes: [ 'image', 'video', 'flash' ],
slugCallback: function ( filename ) {
	return filename.replace( '(', '_' ).replace( ']', '_' );
}


} );
</script>
<script>
	$(document).on('ready', function() {
		$("#input-41").fileinput({
			maxFileCount: 1,
			allowedFileTypes: ["video"],
			showUpload: false,
			layoutTemplates: {
				main1: "{preview}\n" +
				"<div class=\'input-group {class}\'>\n" +
				"   <div class=\'input-group-btn\'>\n" +
				"       {browse}\n" +
				"       {upload}\n" +
				"       {remove}\n" +
				"   </div>\n" +
				"   {caption}\n" +
				"</div>"
			},
			previewFileType: "image",
			browseIcon: "<i class=\"fa fa-play\"></i> ",
			browseLabel: " ",
			removeLabel: " ",
		});
	});
</script>
<script type="text/javascript">
	$( document ).ready( function () {
		$( '#file-1' ).click( function () {
			$( '.multi-files-uploader .fileinput-remove' ).trigger( 'click' );
		} );

///////Function to ristrict max lenght of price input field///////
$("#mytext").attr('maxlength', '9');
} );
</script>
<script type="text/javascript">
	$( "#select1" ).change( function () {
		if ( $( this ).data( 'options' ) === undefined ) {
			/*Taking an array of all options-2 and kind of embedding it on the select1*/
			$( this ).data( 'options', $( '#select2 option' ).clone() );
		}
		var id = $( this ).val();
		var options = $( this ).data( 'options' ).filter( '[value=' + id + ']' );
		$( '#select2' ).html( options );
	} );

	$( '.last-radio-btn' ).click( function () {
		$( '.show-checkbox' ).fadeIn();
	} );
	$( '.radio-btn' ).click( function () {
		$( '.show-checkbox' ).fadeOut();
	} );
</script>
<script>
	$( document ).ready( function () {


		if ( $( "#yourdropdownid option:selected" ).text() == "Myself" ) {

			$( '#c_address' ).attr( "disabled", "true" ).hide();
			$( '#c_mobile' ).attr( "disabled", "true" ).hide();
			$( '#c_name' ).attr( "disabled", "true" ).hide();
			$( '#c_address_input' ).prop('required',false);
			$( '#c_mobile_input' ).prop('required',false);
			$( '#c_name_input' ).prop('required',false);
			/////new changes ///////
			$( '#my_name_input' ).prop('required',true);
			$( '#my_mobile_input' ).prop('required',true);
			$( '#my_name' ).attr( "disabled", false );
			$( '#my_mobile' ).attr( "disabled", false );
		}
		$( "select#yourdropdownid" ).change( function () {

			if ( $( "#yourdropdownid option:selected" ).text() == "New Client" ) {
				$( '#c_address' ).prop( "disabled", false ).show();
				$( '#c_mobile' ).prop( "disabled", false ).show();
				$( '#c_name' ).prop( "disabled", false ).show();
				$( '#c_address_input' ).prop('required',true);
				$( '#c_mobile_input' ).prop('required',true);
				$( '#c_name_input' ).prop('required',true);
				// chages  new for  requeirment
				$( '#my_name' ).attr( "disabled", "true" ).hide();
				$( '#my_mobile' ).attr( "disabled", "true" ).hide();
				$( '#my_mobile_input' ).prop('required',false);
				$( '#my_name_input' ).prop('required',false);


			} else {
				$( '#c_address' ).attr( "disabled", "true" ).hide();
				$( '#c_mobile' ).attr( "disabled", "true" ).hide();
				$( '#c_name' ).attr( "disabled", "true" ).hide();
				$( '#c_address_input' ).prop('required',false);
				$( '#c_mobile_input' ).prop('required',false);
				$( '#c_name_input' ).prop('required',false);
				// chages  new for  requeirment

				$( '#my_name' ).attr( "disabled", false ).show();
				$( '#my_mobile' ).attr( "disabled", false ).show();
				$( '#my_mobile_input' ).prop('required',true);
				$( '#my_name_input' ).prop('required',true);
			}

		} );

		function loadBlocks() {
			phase_id = $( '#phase option:selected' ).val();
			$('#block').empty();
			if(phase_id != ""){

				$.ajax( {
					url: '/townPhase/' + phase_id,
					type: 'POST',
					datatype: 'html',
					data: phase_id,
					headers: {
						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
					},
					success: function ( json ) {
						$( '#block' ).html( json );
						$( '.selectpicker' ).selectpicker( 'refresh' );
					}
				});
			}
		}

		function loadPhases() {
			town_id = $( '#town option:selected' ).val();
	// alert(town_id);
	$('#phase').empty();
	if(town_id != ""){
		$.ajax( {
			url: '/cityTown/' + town_id,
			type: 'POST',
			datatype: 'html',
			data: town_id,
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			success: function ( json ) {
				$( '#phase' ).html( json );
				$( '.selectpicker' ).selectpicker( 'refresh' );
				loadBlocks();
			}
		});
	}
}

function loadTowns() {
	id = $( '#city option:selected' ).val();
	$('#town').empty();
	if(id != ""){	
		$.ajax({
			url: '/LocationCity/' + id,
			type: 'POST',
			datatype: 'html',
			data: id,
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			success: function ( json ) {
				$( '#town' ).html( json );
				$( '.selectpicker' ).selectpicker( 'refresh' );
				loadPhases();
			}
		});
	}
}
$( '#city' ).change( function () {
	loadTowns();
	$('#phase').empty();
	$('#block').empty();

});
$( '#town' ).change( function () {
	$('#block').empty();
	loadPhases();
});
$( '#phase' ).change( function () {
	loadBlocks();
});

} );
</script>
<!--  <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap">
</script> -->
<!--////// NAQASH API ////-->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&sensor=false&libraries=places"></script>
<script src="/assets_admin/dist/js/locationPicker.js"></script>
 <script>
// 	var inital_lat = "31.554397"; /*lahore pakistan*/
// 	var inital_lng = "74.356078";
// 	$( '#locationpicker' ).locationpicker( {

// 		location: {
// 			latitude: inital_lat,
// 			longitude: inital_lng
// 		},
// 		radius: 25,
// 		inputBinding: {
// 			latitudeInput: $( "#latitude" ),
// 			longitudeInput: $( "#longitude" ),
// 			locationNameInput: $( '#address5' )
// 		},
// 		enableAutocomplete: true,
// 		oninitialized: function ( component ) {
// 			var addressComponents = $( component ).locationpicker( 'map' ).location.addressComponents;
// 			// updateControls( addressComponents );
// 			var vallat = $( '#latitude' ).val();
// 			var vallng = $( '#longitude' ).val();

// 			$( '#latitude' ).attr( 'value', vallat );
// 			$( '#longitude' ).attr( 'value', vallng );
// 		}
// 	} );
// 	/* address field for map */
// 	/* loading location picker  */
// 	$( "#city" ).change( function ( e ) {

// 		var geocoder = new google.maps.Geocoder();
// 		geocoder.geocode({ 'address': $('#city option:selected').text().trim()+', pk'},function ( results, status ) {

// 			if ( status == google.maps.GeocoderStatus.OK ) {
// 				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
// 				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
// 				$("#address5").val($('#city option:selected').text().trim()+', Pakistan');
// 			} else {
// 				alert( "Something got wrong " + status );
// 			}
// 		});
// 	});
// 	$( "#town" ).change( function ( e ) {
// 		var geocoder = new google.maps.Geocoder();
// 		geocoder.geocode({ 'address': $('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', pk'},function ( results, status ) {

// 			if ( status == google.maps.GeocoderStatus.OK ) {
// 				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
// 				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
// 				$("#address5").val($('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', Pakistan');
// 			} else {
// 				alert( "Something got wrong " + status );
// 			}
// 		});
// 	});
	
// </script>

<script>
	var inital_lat = "31.554397"; /*lahore pakistan*/
	var inital_lng = "74.356078";
	$( '#locationpicker' ).locationpicker( {

		location: {
			latitude: inital_lat,
			longitude: inital_lng
		},
		radius: 25,
		inputBinding: {
			latitudeInput: $( "#latitude" ),
			longitudeInput: $( "#longitude" ),
			locationNameInput: $( '#address5' )
		},
		enableAutocomplete: true,
		oninitialized: function ( component ) {
			var addressComponents = $( component ).locationpicker( 'map' ).location.addressComponents;
			// updateControls( addressComponents );
			var vallat = $( '#latitude' ).val();
			var vallng = $( '#longitude' ).val();

			$( '#latitude' ).attr( 'value', vallat );
			$( '#longitude' ).attr( 'value', vallng );
		}
	} );
	/* address field for map */
	/* loading location picker  */
	$( "#city" ).change( function ( e ) {

		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	$( "#town" ).change( function ( e ) {
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	$( "#phase" ).change( function ( e ) {
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#phase option:selected').text().trim()+', '+$('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#phase option:selected').text().trim()+', '+$('#town option:selected').text().trim()+', '+$('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	$( "#block" ).change( function ( e ) {
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#block option:selected').text().trim()+', '+$('#phase option:selected').text().trim()+', '+$('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#block option:selected').text().trim()+', '+$('#phase option:selected').text().trim()+', '+$('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	
</script>
// <script>
// 	$(document).ready(function() {
// 		$("input[type=number]").stepper();
// 	});
// </script>
<script>

	function convertNumberToWords(amount) {
		var words = new Array();
		words[0] = '';
		words[1] = '1';
		words[2] = '2';
		words[3] = '3';
		words[4] = '4';
		words[5] = '5';
		words[6] = '6';
		words[7] = '7';
		words[8] = '8';
		words[9] = '9';
		words[10] = '10';
		words[11] = '11';
		words[12] = '12';
		words[13] = '13';
		words[14] = '14';
		words[15] = '15';
		words[16] = '16';
		words[17] = '17';
		words[18] = '18';
		words[19] = '19';
		words[20] = '20';
		words[30] = '30';
		words[40] = '40';
		words[50] = '50';
		words[60] = '60';
		words[70] = '70';
		words[80] = '80';
		words[90] = '90';
		amount = amount.toString();
		var atemp = amount.split(".");
		var number = atemp[0].split(",").join("");
		var n_length = number.length;
		var words_string = "";
		if (n_length <= 9) {
			var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
			var received_n_array = new Array();
			for (var i = 0; i < n_length; i++) {
				received_n_array[i] = number.substr(i, 1);
			}
			for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
				n_array[i] = received_n_array[j];
			}
			for (var i = 0, j = 1; i < 9; i++, j++) {
				if (i == 0 || i == 2 || i == 4 || i == 7) {
					if (n_array[i] == 1) {
						n_array[j] = 10 + parseInt(n_array[j]);
						n_array[i] = 0;
					}
				}
			}
			value = "";
			for (var i = 0; i < 9; i++) {
				if (i == 0 || i == 2 || i == 4 || i == 7) {
					value = n_array[i] * 10;
				} else {
					value = n_array[i];
				}
				if (value != 0) {
					words_string += words[value] + " ";
				}
				if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
					words_string += "Crores ";
				}
				if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
					words_string += "Lakhs ";
				}
				if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
					words_string += "Thousand ";
				}
				if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
					words_string += "Hundred and ";
				} else if (i == 6 && value != 0) {
					words_string += "Hundred ";
				}
			}
			words_string = words_string.split("  ").join(" ");
		}
		return words_string;
	}
</script>

<script>
	$("#mytext").keyup(function(){
		$("#word").fadeIn();
	});
	$("#mytext").focusin(function(){
// $("#word").fadeIn();
$("#word").html(convertNumberToWords($("#mytext").val()));
$("#word").fadeIn();
});
	$("#mytext").focusout(function(){
		$("#word").fadeOut();
	});

	$('form').on('reset', function() {
		var _this = this;
		setTimeout(function() {
			$('.selectpicker',_this).selectpicker('refresh');
			$('.multi-files-uploader .fileinput-remove').trigger( 'click' );
		});
	});



//		$('.btn-reset').click(function() {
//			$('.selectpicker').selectpicker('deselectAll');
//			$('.selectpicker').selectpicker('render');
//			$('.selectpicker').selectpicker('refresh');
//			$(this).closest('form').find('.selectpicker').each(function() {
//				$(this).selectpicker('render');
//			});
//		});
function validateQty(event) {
	var key = window.event ? event.keyCode : event.which;
	if (event.keyCode == 8 || event.keyCode == 46
		|| event.keyCode == 37 || event.keyCode == 39) {
		return true;
}
else if ( key < 48 || key > 57 ) {
	return false;
}
else return true;
};
</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	@if (session('status'))

	<script>
		toastr.success("{{ Session::get('status') }}");
	</script>                    
	@endif
	
	@if (session('error'))

	<script>
		toastr.error("{{ Session::get('error') }}");
	</script>                    
	@endif
	@if (session('message'))

	<script>
		toastr.error("{{ Session::get('message') }}");
	</script>                    
	@endif
	<script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	</script>
		<script>
		$("#number").keyup(function () {
   this.value = this.value.replace(/([^\d]*)(\d*(\.\d{0,2})?)(.*)/, '$2');
});
	</script>	