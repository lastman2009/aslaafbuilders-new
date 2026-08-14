@php
$title = "Project Edit -$project->title";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="tab-struct custom-tab-2 mt-40">
					<div class="tab-content edit-property-page">
						<form action="/updateProject/{{$project->id}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field()}}
							<div class="row">
								<div class="col-lg-12 padding-right theme-heading">
									<div class="col-lg-6 col-md-6 col-sm-12 property-section padding-left">
										<div class="panel panel-default card-view">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<h1>Project Details</h1>
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">project title:</label>
																	<input type="text" name="title" value="{{$project->title}}" placeholder="" id="title" required/>
																	@if ($errors->has('title'))
																	<div class="error" style="color: red">{{ $errors->first('title') }}</div>
																	@endif
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">Property brief description:</label>
																	<textarea class="form-control summernote" rows="8" cols="50" name="description" placeholder=""><?= $project->description;?></textarea>
																	@if ($errors->has('description'))
																	<div class="error" style="color: red">{{ $errors->first('description') }}</div>
																	@endif
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">Design Specifications:</label>
																	<textarea class="form-control summernote-limited" rows="15" cols="50" name="design_description" placeholder="" data-height="200"><?= $project->design_description;?></textarea>
																</div>
															</div>
															<h3>Add Address</h3>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">select city:</label>
																	<select class="selectpicker" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
																		@foreach($cities as $city)
																		@if($city->id == $project->city_id)
																		<option value="{{ $city->id }}" selected>{{$city->name}}</option>
																		@else
																		<option value="{{ $city->id }}">{{$city->name}}
																		</option>

																		@endif 
																		@endforeach
																		@if ($errors->has('city_id'))
																		<div class="error" style="color: red">{{ $errors->first('city_id') }}</div>
																		@endif

																	</select>


																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">select town:</label>
																	<select name="town_id" id="town" class="selectpicker townclass" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>

																		@foreach($towns as $town)
																		@if($town->id == $project->town_id)
																		<option value="{{ $town->id }}" selected>{{$town->name}}</option>
																		@else
																		<option value="{{ $town->id }}">{{$town->name}}
																		</option>

																		@endif 
																		@endforeach
																		@if ($errors->has('town_id'))
																		<div class="error" style="color: red">{{ $errors->first('town_id') }}</div>
																		@endif
																	</select>

																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">Add complete address</label>
																	<input type="text" name="address" value="{{$project->address}}" required placeholder=""/>
																	@if ($errors->has('address'))
																	<div class="error" style="color: red">{{ $errors->first('address') }}</div>
																	@endif
																</div>
															</div>
									<!-- <div class="col-md-12 padding-left">
										<label class="control-label mb-10" for="email_de">Search Map Location:</label>
										<div class="row">
											<div class="col-sm-12">
												<input id="address5" type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete="off" onmousedown="return resetAddress()" required="" placeholder="">
											</div>
										</div>
										<div class="col-sm-12 marginbot10 gmap-locator">
											<div id="locationpicker" class="gmap-frame">
										
											</div>
											<div style="position: absolute; left: -10000%">
												<input type="text" id="lat" class="" readonly>
												<input type="text" id="lng" class="" readonly>
											</div>
											<input type="text" name="latitude" id="latitude" class="" readonly hidden>
											<input type="text" name="longitude" id="longitude" class="" readonly hidden>
										</div>
									</div> -->
									<div class="col-md-12 padding-left">
										<label class="control-label mb-10" for="email_de">Search Map Location:</label>
										<div class="row">
											<div class="col-sm-12 input-group" style="padding-left: 15px;padding-right:15px;">
												<input id="address5" type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete=""  placeholder="" style="background:#323232;">
												<div class="input-group-addon" style="padding-left: 20px;padding-right: 20px;background: #323232;"><i class="fa fa-search"></i></div>
											</div>
										</div>
										<div class="col-sm-12 marginbot10 gmap-locator" style="margin-top:10px;">
											<div id="locationpicker" class="gmap-frame">
												<!-- Location picker handled with js  -->
											</div>
											<div  >
												<input type="text" id="latitude" value="{{$project->latitude}}" name="latitude" class="" readonly>
												<input type="text" id="longitude" value="{{$project->longitude}}" name="longitude" class="" readonly>
											</div>
										</div>
									</div>


									<!-- //////new insert -->
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">expiry date:</label>
											<div class='input-group date col-md-12 col-sm-12 padding-right padding-left' id='datetimepicker1'>
												<input type="text" class="form-control" value="{{$project->expire_date }}" name="expire_date" placeholder="Expire date">
												<div class="input-group-addon"><i class="fa fa-calendar"></i> </div>
											</div>
										</div>
									</div>
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Construction Status:</label>

											<?php
											$construction_status = array("Complete" ,"Under Construction" ,"Gray Structure");
											?>	
											<select name="construction_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Notihng Selected--">


												@foreach($construction_status  as $status)
												@if($status == $project->construction_status)
												<option value="{{$status}}" selected>{{$status}}</option>
												@else

												<option value="{{$status}}" >{{$status}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
									<h3>Basic Feature</h3>
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Bed Rooms:</label>
											<input type="number" name="bed" value="{{$project->bed}}" placeholder=""/>
										</div>
									</div>
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Bath Rooms:</label>
											<input type="number" name="bath" value="{{$project->bath}}" placeholder=""/>
										</div>
									</div>
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">Built in Year:</label>
											<select name="construction_year" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">

												@for($i =1960; $i<= 2017; $i++)
												@if($i == $project->construction_year)
												<option value="{{$i}}" selected>{{$i}}</option>
												@else
												<option value="{{$i}}">{{$i}}</option>
												@endif
												@endfor

											</select>


										</div>
									</div>
									<div class="col-md-6 padding-left">
										<div class="form-group">
											<label class="control-label mb-10" for="email_de">number of floors:</label>
											<input type="number" name="total_floor" value="{{$project->total_floor}}" placeholder=""/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 padding-left">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 property-section">
						<div class="panel panel-default card-view propertytypeheight">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<h3>Project Type</h3>
									<div class="tab-content" id="property_tabcontent">
										<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">
											<div class="row">
												<div class="col-md-12 padding-right">
													<?php

													$areas = array("Square Feet", "Square Yards", "Square Meters", "Marla", "Kanal", "Acre");

													?>
													<div class="col-md-6 residential box padding-left">
														<div class="col-md-8 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10">Min Area for Residential</label>
																<input type="number" class="form-control" name="min_area_residential" value="{{$project->min_area_residential}}">
																@if ($errors->has('min_area_residential'))
																<div class="error" style="color: red">{{ $errors->first('addmin_area_residentialress') }}</div>
																@endif
															</div>	
														</div>
														<div class="col-md-4 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">&nbsp;</label>
																<select name="min_area_type_residential" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="Type" >
																	@foreach($areas as $area)
																	@if($area == $project->min_area_type_residential)
																	<option value="{{$area}}" selected>{{$area}}</option>
																	@else
																	<option value="{{$area}}">{{$area}}</option>
																	@endif
																	@endforeach
																</select>
																@if ($errors->has('min_area_type_residential'))
																<div class="error" style="color: red">{{ $errors->first('min_area_type_residential') }}</div>
																@endif
															</div>
														</div>
													</div>
													<div class="col-md-6 residential box padding-left">
														<div class="col-md-8 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10">Max Area for Residential</label>
																<input type="number" class="form-control" name="max_area_residential" value="{{$project->max_area_residential}}">
																@if ($errors->has('max_area_residential'))
																<div class="error" style="color: red">{{ $errors->first('max_area_residential') }}</div>
																@endif
															</div>	
														</div>
														<div class="col-md-4 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">&nbsp;</label>
																<select name="max_area_type_residential" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="Type" >
																	@foreach($areas as $area)
																	@if($area == $project->max_area_type_residential)
																	<option value="{{$area}}" selected>{{$area}}</option>
																	@else
																	<option value="{{$area}}">{{$area}}</option>
																	@endif
																	@endforeach
																</select>
																@if ($errors->has('max_area_type_residential'))
																<div class="error" style="color: red">{{ $errors->first('max_area_type_residential') }}</div>
																@endif
															</div>
														</div>
													</div>
													<div class="col-md-6 commercial box padding-left">
														<div class="col-md-8 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10">Min Area for Commercial</label>
																<input type="number" class="form-control" name="min_area_commercial" value="{{$project->min_area_commercial}}">
																@if ($errors->has('min_area_commercial'))
																<div class="error" style="color: red">{{ $errors->first('min_area_commercial') }}</div>
																@endif
															</div>	
														</div>
														<div class="col-md-4 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">&nbsp;</label>
																<select name="min_area_type_commercial" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="Type">
																	@foreach($areas as $area)
																	@if($area == $project->min_area_type_commercial)
																	<option value="{{$area}}" selected>{{$area}}</option>
																	@else
																	<option value="{{$area}}">{{$area}}</option>
																	@endif
																	@endforeach
																</select>
																@if ($errors->has('min_area_type_commercial'))
																<div class="error" style="color: red">{{ $errors->first('min_area_type_commercial') }}</div>
																@endif
															</div>
														</div>
													</div>
													<div class="col-md-6 commercial box padding-left">
														<div class="col-md-8 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10">Max Area for Commercial</label>
																<input type="number" class="form-control" name="max_area_commercial" value="{{$project->max_area_commercial}}">
																@if ($errors->has('max_area_commercial'))
																<div class="error" style="color: red">{{ $errors->first('max_area_commercial') }}</div>
																@endif
															</div>	
														</div>
														<div class="col-md-4 padding-left padding-right">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">&nbsp;</label>
																<select name="max_area_type_commercial" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="Type">
																	@foreach($areas as $area)
																	@if($area == $project->max_area_type_commercial)
																	<option value="{{$area}}" selected>{{$area}}</option>
																	@else
																	<option value="{{$area}}">{{$area}}</option>
																	@endif
																	@endforeach
																</select>
																@if ($errors->has('max_area_type_commercial'))
																<div class="error" style="color: red">{{ $errors->first('max_area_type_commercial') }}</div>
																@endif
															</div>
														</div>
													</div>
													<h3>Property Schemes</h3>

													@if(!$schemes->isEmpty())
													<div class="col-md-12 padding-right padding-left property-schemes">
														<div class="col-md-12 padding-right padding-left nicescroll-bar">
													@foreach($schemes as $scheme)

															<h5><span>Scheme (*title , area , prices and area type "MUST"*)</span></h5>
															<div class="col-md-12 padding-left padding-right">
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Select Property Type:</label>
																		<select name="scheme[{{$scheme->id}}][property_type_name]" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required>
																			@foreach($propertyTypes as $propertyType)
																			<optgroup label="{{$propertyType->name}}">
																				@foreach($data[$propertyType->id] as $datas)
																				@if($datas->id == $scheme->property_type_name)
																				<option value="{{$datas->id}}" selected >{{$datas->name}}</option>

																				@else
																				<option value="{{$datas->id}}">{{$datas->name}}</option>

																				@endif
																				@endforeach
																				<hr>
																			</optgroup>
																			@endforeach
																		</select>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Scheme Title:</label>
																		<input type="text" name="scheme[{{$scheme->id}}][title]" value="{{$scheme->title}}" placeholder=""/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Land Area:</label>
																		<input type="number" name="scheme[{{$scheme->id}}][area]" value="{{$scheme->area}}" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<?php

																	$areas = array("Square Feet", "Square Yards", "Square Meters", "Marla", "Kanal", "Acre");

																	?>
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Select Area Type:</label>
																		<select name="scheme[{{$scheme->id}}][area_type]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" >
																			@foreach($areas as $area)
																			@if($area == $scheme->area_type)
																			<option value="{{$area}}" selected>{{$area}}</option>
																			@else
																			<option value="{{$area}}">{{$area}}</option>
																			@endif
																			@endforeach
																		</select>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">No. of Bed Rooms:</label>
																		<input type="number" name="scheme[{{$scheme->id}}][bed]" value="{{$scheme->bed}}" placeholder=""/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">No. of Bath Rooms:</label>
																		<input type="number" name="scheme[{{$scheme->id}}][bath]" value="{{$scheme->bath}}" placeholder="" />
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">No. of Floors:</label>
																		<input type="number" name="scheme[{{$scheme->id}}][no_of_floor]" value="{{$scheme->no_of_floor}}" placeholder="" />
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Minimum Price Range (PKR):</label>
																		<input type="text" id="mytext" name="scheme[{{$scheme->id}}][min_price]" onkeypress='return validateQty(event);' class="tooltip-color myText" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" 
																		value="{{$scheme->min_price}}" 
																		data-toggle="tooltip" data-placement="top" placeholder=""/>
																	</div>
																	<!-- <input type="text" name="number" placeholder="Number OR Amount" onkeyup="word.innerHTML=convertNumberToWords(this.value)" /> -->
																	<div id="word"></div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Maximum Price Range (PKR):</label>
																		<input type="text" id="mytext" name="scheme[{{$scheme->id}}][max_price]" onkeypress='return validateQty(event);' class="tooltip-color myText" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" 
																		value="{{$scheme->max_price}}" 
																		data-toggle="tooltip" data-placement="top" placeholder=""/>
																	</div>
																	<div id="word" style=""></div>
																</div>
																<div class="col-md-6 padding-left">
																	<?php

																	$payment_methods= array("On Cash","On Installments","On Both");

																	?>
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Payment Procedure:</label>
																		<select name="scheme[{{$scheme->id}}][payment_method]" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" >

																			@foreach($payment_methods as $area)
																			@if($area == $scheme->payment_method)
																			<option value="{{$area}}" selected>{{$area}}</option>
																			@else
																			<option value="{{$area}}">{{$area}}</option>
																			@endif
																			@endforeach
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<hr/>
															</div>
													@endforeach
														</div>
													</div>
													@else
													<h3>Property Schemes</h3>
													<div class="col-md-12 padding-right padding-left property-schemes">
														<div class="col-md-12 padding-right padding-left nicescroll-bar">
															<h5><span>Scheme (*title , area , prices and area type "MUST" *)</span></h5>
															<div class="col-md-12 padding-left padding-right">
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Select Property Type:</label>
																		<select name="scheme_new[property_type_name]" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----">

																			@foreach($propertyTypes as $propertyType)

																			<optgroup label="{{$propertyType->name}}">
																				@foreach($data[$propertyType->id] as $datas)

																				<option value="{{$datas->name}}">{{$datas->name}}</option>

																				@endforeach


																			</optgroup>

																			@endforeach

																		</select>


																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Scheme Title:</label>
																		<input type="text" name="scheme_new[title]" value="" placeholder=""/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Land Area:</label>
																		<input type="number" name="scheme_new[area]" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Select Area Type:</label>
																		<select name="scheme_new[area_type]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" >
																			<option value="Square Feet">Square Feet</option>
																			<option value="Square Yards">Square Yards</option>
																			<option value="Square Meters">Square Meters</option>
																			<option value="Marla">Marla</option>
																			<option value="Kanal">Kanal</option>
																			<option value="Acre">Acre</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">No. of Bed Rooms:</label>
																		<input type="number" name="scheme_new[bed]" value="" placeholder="" min="1"/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">No. of Bath Rooms:</label>
																		<input type="number" name="scheme_new[bath]" value="" placeholder="" min="1"/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">No. of Floors:</label>
																		<input type="number" name="scheme_new[no_of_floor]" value="" placeholder="" min="1"/>
																	</div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Minimum Price Range (PKR):</label>
																		<input type="text" id="mytext" name="scheme_new[min_price]" onkeypress='return validateQty(event);' class="tooltip-color myText" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" data-toggle="tooltip" data-placement="top" placeholder=""/>
																	</div>
																	<!-- <input type="text" name="number" placeholder="Number OR Amount" onkeyup="word.innerHTML=convertNumberToWords(this.value)" /> -->
																	<div id="word"></div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Maximum Price Range (PKR):</label>
																		<input type="text" id="mytext" name="scheme_new[max_price]" onkeypress='return validateQty(event);' class="tooltip-color myText" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" data-toggle="tooltip" data-placement="top" placeholder=""/>
																	</div>
																	<div id="word" style=""></div>
																</div>
																<div class="col-md-6 padding-left">
																	<div class="form-group">
																		<label class="control-label mb-10" for="email_de">Payment Procedure:</label>
																		<select name="scheme_new[payment_method]" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" >
																			<option value="On Cash">On Cash</option>
																			<option value="On Installments">On Installments</option>
																			<option value="On Both">On Both</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<hr/>
															</div>
														</div>
													</div>
													@endif
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 property-section">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<h3>Extra Features</h3>
									<div class="row extra-feature project-extra-features myeditproject">
										<div class="col-md-12 padding-right nicescroll-bar">
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<?php 
													$flooring =['tiles' ,'marble','wooden' ,'chip','cement','expoxy']
													?>	
													<label class="control-label mb-10" for="email_de">flooring:</label>
													<select name="flooring[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
														<?php $data=explode(';', $project->flooring);?>
														@foreach($flooring as $floor)
														@if(in_array($floor, $data))
														<option value="{{$floor}}" selected><?= ucfirst($floor);?></option>
														@else
														<option value="{{$floor}}"><?= ucfirst($floor);?></option>
														@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group quantity">
													<label class="control-label mb-10" for="email_de">parking space:</label>
													<input type="number" name="parking_space" min="1" max="50" step="1" value="{{$project->parking_space}}" placeholder=""/>
													<!--																			<input type="number"  name="parking_space" min="1" max="50" step="1" value="1" placeholder="Type Here"/>-->
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby banks:</label>
													<input type="text" name="near_bank" value="{{$project->near_bank}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby schools:</label>
													<input type="text" name="near_school" value="{{$project->near_school}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby hospitals:</label>
													<input type="text" name="near_hospital" value="{{$project->near_hospital}}"  placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby shopping malls:</label>
													<input type="text" name="near_shopping_mall" value="{{$project->near_shopping_mall}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby restaurants:</label>
													<input type="text" name="near_restaurant" value="{{$project->near_restaurant}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">distance from airport (kms):</label>
													<input type="number" name="distance_airport" value="{{$project->distance_airport}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">distance from railway station (kms):</label>
													<input type="number" name="distance_railway" value="{{$project->distance_railway}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby water filteration plants:</label>
													<input type="number" name="near_water_filter" value="{{$project->near_water_filter}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">nearby public transport:</label>
													<input type="text" name="near_public_transport" value="{{$project->near_public_transport}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">servant quarters:</label>
													<input type="number" name="servant_quarter" value="{{$project->servant_quarter}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">drawing rooms:</label>
													<input type="number" name="drawing_room" value="{{$project->drawing_room}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">dinning room:</label>
													<input type="number" name="dinning_room"  value="{{$project->dinning_room}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">Kitchens:</label>
													<input type="number" name="no_of_kitchens" value="{{$project->no_of_kitchens}}"  placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">Study rooms:</label>
													<input type="number" name="study_room" value="{{$project->study_room}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">prayer rooms:</label>
													<input type="number" name="prayer_room" value="{{$project->prayer_room}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">dressing rooms:</label>
													<input type="number" name="powder_room" value="{{$project->powder_room}}"  placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">gym rooms:</label>
													<input type="number" name="gym" value="{{$project->gym}}"  placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">store rooms:</label>
													<input type="number" name="no_of_store_room" value="{{$project->no_of_store_room}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">lounge of sitting rooms:</label>
													<input type="number" name="lounge" value="{{$project->lounge}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">laundry rooms:</label>
													<input type="number" name="laundry_room" value="{{$project->laundry_room}}" placeholder="">
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="double_glazed_window" type="checkbox" id="double-glazed-window" value="1" <?php if(!empty($project->double_glazed_window)) echo "checked"; else ""; ?>  />
															<label for="double-glazed-window">Double Glazed Window</label>
														</li>

													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="beautiful_modern_planning" type="checkbox" value="1" id="beautiful-modern-planning"
															<?php if(!empty($project->beautiful_modern_planning)) echo "checked"; else ""; ?> />
															<label for="beautiful-modern-planning">Beautiful Modern Planning</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="wide_carpeted_roads" type="checkbox"  value="1" id="wide-carpeted-roads"
															<?php if(!empty($project->wide_carpeted_roads)) echo "checked"; else ""; ?> />
															<label for="wide-carpeted-roads">Wide Carpeted Roads</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="central_ac" type="checkbox" id="air-conditioning" value="1"
															<?php if(!empty($project->central_ac)) echo "checked"; else ""; ?> />

															<label for="air-conditioning">Central Air Conditioning</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="central_heating" type="checkbox" id="central-heating" value="1"
															<?php if(!empty($project->central_heating)) echo "checked"; else ""; ?>
															/>
															<label for="central-heating">Central Heating</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="waste_disposal" type="checkbox" id="waste-disposal" value="1"
															<?php if(!empty($project->waste_disposal)) echo "checked"; else ""; ?>
															/>
															<label for="waste-disposal">Waste Disposal</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="furnished" type="checkbox" id="furnished" value="1"
															<?php if(!empty($project->furnished)) echo "checked"; else ""; ?>
															/>
															<label for="furnished">Furnished</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="internet" type="checkbox" id="internet" value="1"
															<?php if(!empty($project->internet)) echo "checked"; else ""; ?>
															/>
															<label for="internet">Broadband Internet Access</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="cabel_tv" type="checkbox" id="satelite" value="1"
															<?php if(!empty($project->cabel_tv)) echo "checked"; else ""; ?>/>

															<label for="satelite">Satellite or Cable TV Ready</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="intercom" type="checkbox" id="intercom" value="1"
															<?php if(!empty($project->intercom)) echo "checked"; else ""; ?>/>

															<label for="intercom">Intercom</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="swimming_pool" type="checkbox" value="1" id="swimming-pool"
															<?php if(!empty($project->swimming_pool)) echo "checked"; else ""; ?>/>

															<label for="swimming-pool">Swimming Pool</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="sauna" type="checkbox" id="sauna" value="1"
															<?php if(!empty($project->sauna)) echo "checked"; else ""; ?>/>

															<label for="sauna">Sauna</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="jacuzzi" type="checkbox" id="jacuzzi" value="1"
															<?php if(!empty($project->jacuzzi)) echo "checked"; else ""; ?>/>

															<label for="jacuzzi">Jacuzzi</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="maintenance" type="checkbox" id="maintenance-staff" value="1"
															<?php if(!empty($project->maintenance)) echo "checked"; else ""; ?>
															/>
															<label for="maintenance-staff">Maintenance Staff</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="security" type="checkbox" id="security-staff" value="1"
															<?php if(!empty($project->security)) echo "checked"; else ""; ?>

															/>
															<label for="security-staff">Security Staff</label>
														</li>
													</ul>
												</div>
											</div>

											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="community_club" type="checkbox" id="community_club" value="1"
															<?php if(!empty($project->community_club)) echo "checked"; else ""; ?>
															/>
															<label for="community_club">Community Club</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input type="checkbox" id="disabled" value="1" name="facility_disabled"
															<?php if(!empty($project->facility_disabled)) echo "checked"; else ""; ?>
															/>
															<label for="disabled">Facilities for Disabled</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="elevator" type="checkbox" id="elevator" value="1"
															<?php if(!empty($project->elevator)) echo "checked"; else ""; ?>
															/>
															<label for="elevator">Services Elevators</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="conference_room" type="checkbox" id="conference-room" value="1"
															<?php if(!empty($project->conference_room)) echo "checked"; else ""; ?>
															/>
															<label for="conference-room">Conference Room</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="visitor_parking" type="checkbox" id="visitor-parking" value="1"
															<?php if(!empty($project->visitor_parking)) echo "checked"; else ""; ?>/>

															<label for="visitor-parking">Visitor Parking</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="ground" type="checkbox" id="ground" value="1"
															<?php if(!empty($project->ground)) echo "checked"; else ""; ?>
															/>
															<label for="ground">ground</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="underground_sewerage_system" type="checkbox" id="underground-sewerage-system" value="1"
															<?php if(!empty($project->underground_sewerage_system)) echo "checked"; else ""; ?>
															/>
															<label for="underground-sewerage-system">Underground Sewerage System</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="underground_electricity_supply" type="checkbox" id="underground-electricity-supply" value="1"
															<?php if(!empty($project->underground_electricity_supply)) echo "checked"; else ""; ?>
															/>
															<label for="underground-electricity-supply">Underground Electricity Supply</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="fitness_center" type="checkbox" id="fitness-center" value="1"
															<?php if(!empty($project->fitness_center)) echo "checked"; else ""; ?>
															/>
															<label for="fitness-center">Fitness Center</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="restaurant" type="checkbox" id="restaurant" value="1"
															<?php if(!empty($project->restaurant)) echo "checked"; else ""; ?>
															/>
															<label for="restaurant">Restaurant</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="dancing_fountain" type="checkbox" id="dancing-fountain" value="1"
															<?php if(!empty($project->dancing_fountain)) echo "checked"; else ""; ?>
															/>
															<label for="dancing-fountain">Dancing Fountain</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="parks" type="checkbox" id="parks" value="1"

															<?php if(!empty($project->parks)) echo "checked"; else ""; ?>
															/>

															<label for="parks">Parks</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="play_grounds" type="checkbox" id="play-grounds" value="1"
															<?php if(!empty($project->play_grounds)) echo "checked"; else ""; ?>
															/>

															<label for="play-grounds">Play Grounds</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="zoo" type="checkbox" id="zoo" value="1"
															<?php if(!empty($project->zoo)) echo "checked"; else ""; ?>
															/>

															<label for="zoo">Zoo</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="commercial_center" type="checkbox" id="commercial-center" value="1"
															<?php if(!empty($project->commercial_center)) echo "checked"; else ""; ?>
															/>
															<label for="commercial-center">Commercial Center</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="community_center" type="checkbox" id="community-center" value="1"
															<?php if(!empty($project->community_center)) echo "checked"; else ""; ?>
															/>
															<label for="community-center">Community Center</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="cc_tv_surveillance" type="checkbox" id="cc-tv-surveillance" value="1"
															<?php if(!empty($project->cc_tv_surveillance)) echo "checked"; else ""; ?>/>

															<label for="cc-tv-surveillance">CC TV surveillance</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="gated_community" type="checkbox" id="gated-community" value="1"
															<?php if(!empty($project->gated_community)) echo "checked"; else ""; ?>
															/>
															<label for="gated-community">Gated Community</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="independent_drive_way" type="checkbox" id="independent-drive-way" value="1"
															<?php if(!empty($project->independent_drive_way)) echo "checked"; else ""; ?>

															/>
															<label for="independent-drive-way">Independent Drive Way</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="high_class_finishing" type="checkbox" id="high-class-finishing" value="1"
															<?php if(!empty($project->high_class_finishing)) echo "checked"; else ""; ?>
															/>
															<label for="high-class-finishing">High Class Finishing</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="security_service" type="checkbox" id="24-hour-security-service" value="1"
															<?php if(!empty($project->security_service)) echo "checked"; else ""; ?>
															/>
															<label for="24-hour-security-service">24 Hour Security Service</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="underground_plumbing" type="checkbox" id="underground-plumbing" value="1"
															<?php if(!empty($project->underground_plumbing)) echo "checked"; else ""; ?>
															/>
															<label for="underground-plumbing">Underground Plumbing</label>
														</li>
													</ul>
												</div>
											</div>



											<!-- ///RUk JAO ////. -->
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="underground_water_supply" type="checkbox" id="underground-water-supply" value="1"
															<?php if(!empty($project->underground_water_supply)) echo "checked"; else ""; ?>
															/>
															<label for="underground-water-supply">Underground Water Supply</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="solid_wood_finishes" type="checkbox" id="solid-wood-finishes" value="1"
															<?php if(!empty($project->solid_wood_finishes)) echo "checked"; else ""; ?>
															/>
															<label for="solid-wood-finishes">Solid Wood Finishes</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="imported_kitchens" type="checkbox" id="imported-kitchens" value="1"
															<?php if(!empty($project->imported_kitchens)) echo "checked"; else ""; ?>
															/>
															<label for="imported-kitchens">Imported Kitchens</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="boundary_wall" type="checkbox" id="boundary-wall" value="1"
															<?php if(!empty($project->boundary_wall)) echo "checked"; else ""; ?>
															/>
															<label for="boundary-wall">Boundary Wall</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="wide_roads_with_green_belts" type="checkbox" id="wide-roads-with-green-belts" value="1"
															<?php if(!empty($project->wide_roads_with_green_belts)) echo "checked"; else ""; ?>
															/>
															<label for="wide-roads-with-green-belts">Wide Roads With Green Belts</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="mosques" type="checkbox" id="mosques" value="1"
															<?php if(!empty($project->mosques)) echo "checked"; else ""; ?>
															/>
															<label for="mosques">Mosques</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="gas" type="checkbox" id="gas" value="1"
															<?php if(!empty($project->gas)) echo "checked"; else ""; ?>
															/>
															<label for="gas">Gas</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="housekeeping_laundry_facility" type="checkbox" id="housekeeping-laundry-facility" value="1"
															<?php if(!empty($project->housekeeping_laundry_facility)) echo "checked"; else ""; ?>
															/>
															<label for="housekeeping-laundry-facility">Housekeeping and Laundry Facility</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="room_service" type="checkbox" id="24-hour-room-service" value="1"
															<?php if(!empty($project->room_service)) echo "checked"; else ""; ?>
															/>
															<label for="24-hour-room-service">24 Hours Room Service</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="hot_cold_water_supply" type="checkbox" id="hot-cold-water-supply" value="1"
															<?php if(!empty($project->hot_cold_water_supply)) echo "checked"; else ""; ?>
															/>

															<label for="hot-cold-water-supply">Hot and Cold Water Supply</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="tv_cable_network" type="checkbox" id="tv-cable-network" value="1"
															<?php if(!empty($project->tv_cable_network)) echo "checked"; else ""; ?>
															/>
															<label for="tv-cable-network">TV Cable Network</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="cafe" type="checkbox" id="cafe" value="1"
															<?php if(!empty($project->cafe)) echo "checked"; else ""; ?>
															/>
															<label for="cafe">Cafe</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="roof_top_barbeque" type="checkbox" id="roof-top-barbeque" value="1"
															<?php if(!empty($project->roof_top_barbeque)) echo "checked"; else ""; ?>
															/>
															<label for="roof-top-barbeque">Roof Top Barbeque</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="car_rental_service" type="checkbox" id="car-rental-service" value="1"
															<?php if(!empty($project->car_rental_service)) echo "checked"; else ""; ?>
															/>
															<label for="car-rental-service">Car Rental Service</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<ul class="profile-information extra-select">
														<li>
															<input name="valet_car_parking" type="checkbox" id="valet-car-parking" value="1"
															<?php if(!empty($project->valet_car_parking)) echo "checked"; else ""; ?>
															/>
															<label for="valet-car-parking">Valet Car Parking</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 padding-left" style="min-height: 60px">
											</div>
											<div class="col-md-6 padding-left">
												<div class="form-group">
													<label class="control-label mb-10" for="email_de">Other Facilities:</label>
													<input type="text" name="other_facilities" value="{{$project->other_facilities}}" placeholder="">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 property-section">
						<div class="panel panel-default card-view propertyvideoheight">
							<div class="panel-wrapper collapse in">
								<div class="panel-body" style="padding: 5px 0 5px;">
									<h3>Add Video</h3>
									<div class="row">
										<div class="col-md-12 padding-right">
											<div class="col-md-12 mr-btm padding-left">
												<div class="form-group">
													<!-- <label class="control-label mb-10" for="email_de">Upload video:</label>
														<input id="input-41" name="video" type="file" accept="video/*" class="file-loading" data-show-preview="false"> -->
													</div>
												</div>
												<div class="col-md-12 mr-btm padding-left">
													<div class="form-group">
														<label class="control-label mb-10" for="email_de">Upload YouTube URL for video:</label>
														<div class="input-group mb-15"> <span class="input-group-btn">
															<button type="button" class="btn btn-youtube"><img src="/assets_admin/dist/img/youtube-play.png" /></button>
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

			<div class="col-lg-3 col-md-3 col-sm-6 property-section padding-left">
				<div class="panel panel-default card-view blogimageheight">
					<div class="panel-wrapper collapse in">
						<div class="panel-body project-map-old">
							<h3>Old Project MAP</h3>
							<p class="note"><em><strong>Note:</strong></em> Upload project map with maximum resolution for the best view.</p>
							<div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section pt-15">
								<div class="blog-img-uploaded">
									@if($project->photo != null)
									<figure class="edit-profile-image img-blogs"> <img  class="blog_img_upload" src="/images/user_property/{{$project->photo}}" alt="Profile Image">
									</figure>
									
									@else

									<figure class="edit-profile-image img-blogs"> <img  class="blog_img_upload" src="/assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
									</figure>
									

									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 property-section padding-left">
				<div class="panel panel-default card-view blogimageheight">
					<div class="panel-wrapper collapse in">
						<div class="panel-body project-map-new">
							<h3>Project MAP</h3>
							<div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section pt-15 pb-25">
								<div class="blog-img-uploaded">

									<figure class="edit-profile-image img-blogs"> <img id="myImg2" class="blog_img_upload" src="/assets_admin/dist/img/selcetimg.jpg" alt="Profile Image"> 
									</figure>
									<div class="text-center">
										<input type="file" name="photo" id="file-2" class="inputfile inputfile-1"/>
										<label class="fileupload-blog" for="file-2">Upload Image</label>
										@if ($errors->has('photo'))
										<div class="error" style="color: red">{{ $errors->first('photo') }}</div>
										@endif
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
		<div class="col-lg-12 col-md-12 col-sm-12 property-section">
			<div class="panel panel-default card-view propertytypeheight">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="tab-content" id="property_tabcontent">
							<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">
								<div class="row">
									<div class="col-md-12 padding-right">
 										<div class="col-md-6">
											<h3>Payment Plan</h3>
										</div>
										<div class="col-md-6">
											<button class="add_payment_plan pull-right add-scheme">Add New Payment Plan &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
										</div>
										<div class="col-md-12 padding-right padding-left ">

											<div class="padding-right padding-left container2">
												<div class="inter col-md-12">
													@if(!$payments->isEmpty())
													<h5><span>Old Payment Plan </span></h5>
													@endif
													@foreach($payments as $payment)
													<div class="col-md-12 padding-left padding-right">														
														<div class="col-md-3 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Title</label>
																<input type="text" name="payment_old[title][]" value="{{ $payment->title }}" placeholder="" />
																<input type="hidden" name="payment_old[id][]" value="{{ $payment->id }}">
															</div>
														</div>
														<div class="col-md-6 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Description</label>
																<input type="text" name="payment_old[description][]" value="{{ $payment->description }}" placeholder="" />
															</div>
														</div>
														<div class="col-md-2 padding-left">
															<div class="form-group">
																<img src="/images/property/paymentPlan/thumb_{{ $payment->image }}" class="img-responsive" alt="" width="50" height="50" style="margin-top: 31px;">
																<label class="control-label mb-10" for="email_de"></label>
																<input type="file" name="payment_old[image][]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-1 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Delete</label>
																<div style=" margin-top: 13px;">
																	
																<a href="javascript:void(0)" data-id="{{$payment->id}}" class="delete_payment mr-5" data-toggle="tooltip" data-original-title="Delete"> 
			                                                        <i class="fa fa-trash-o m-r-10"></i> 
			                                                    </a>
																</div>
															</div>
														</div>
													</div>
													@endforeach
													<h5><span>New Payment Plan </span></h5>	
													<div class="col-md-12 padding-left padding-right">														
														<div class="col-md-3 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Title</label>
																<input type="text" name="payment[title][]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-7 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Description</label>
																<input type="text" name="payment[description][]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-2 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Image</label>
																<input type="file" name="payment[image][]" value="" placeholder="" />
															</div>
														</div>
													</div>
													{{-- <div class="col-md-12 padding-left">
														<hr/>
													</div> --}}
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
		<div class="col-lg-12 col-md-12 col-sm-12 property-section">
			<div class="panel panel-default card-view propertytypeheight">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="tab-content" id="property_tabcontent">
							<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">
								<div class="row">
									<div class="col-md-12 padding-right">
 										<div class="col-md-6">
											<h3>Floor Plan</h3>
										</div>
										<div class="col-md-6">
											<button class="add_floor_plan pull-right add-scheme">Add New Floor Plan &nbsp; <span style="font-size:16px; font-weight:bold;"> + </span></button>
										</div>
										<div class="col-md-12 padding-right padding-left ">
											<div class="padding-right padding-left nicescroll-bar container3">
												<div class="inter col-md-12">
													@if(!$floors->isEmpty())
													<h5><span>Old Floor Plan </span></h5>
													@endif
													@foreach($floors as $floor)
													<div class="col-md-12 padding-left padding-right">														
														<div class="col-md-3 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Title</label>
																<input type="text" name="floor_old[title][]" value="{{ $floor->title }}" placeholder="" />
																<input type="hidden" name="floor_old[id][]" value="{{ $floor->id }}">
															</div>
														</div>

														<div class="col-md-6 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Description</label>
																<input type="text" name="floor_old[description][]" value="{{ $floor->description }}" placeholder="" />
															</div>
														</div>
														<div class="col-md-2 padding-left">
															<div class="form-group">
																<img src="/images/property/floorPlan/thumb_{{ $floor->image }}" class="img-responsive" alt="" width="50" height="50" style="margin-top: 31px;">
																<label class="control-label mb-10" for="email_de"></label>
																<input type="file" name="floor_old[image][]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-1 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Delete</label>
																<div style=" margin-top: 13px;">
																<a href="javascript:void(0)" data-id="{{$floor->id}}" class="delete mr-5" data-toggle="tooltip" data-original-title="Delete"> 
			                                                        <i class="fa fa-trash-o m-r-10"></i> 
			                                                    </a>
			                                                </div>
															</div>
														</div>
													</div>			
													@endforeach
													<h5><span>New Floor Plan </span></h5>
													<div class="col-md-12 padding-left padding-right">														
														<div class="col-md-3 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Title</label>
																<input type="text" name="floor[title][]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-7 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Description</label>
																<input type="text" name="floor[description][]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-2 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="email_de">Image</label>
																<input type="file" name="floor[image][]" value="" placeholder="" />
															</div>
														</div>
													</div>
													{{-- <div class="col-md-12 padding-left">
														<hr/>
													</div> --}}
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

		<div class="col-lg-12 col-md-12 col-sm-12 property-section">
			<div class="panel panel-default card-view propertytypeheight">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="tab-content">
							<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">
								<div class="row">
									<div class="col-md-12 padding-right">
 										<div class="col-md-6">
											<h3>Development Patner</h3>
										</div>
										<div class="col-md-12 padding-right padding-left ">
											@if($developer != null)
											<div class="padding-right padding-left nicescroll-bar">
												<div class="inter col-md-12">
													<div class="col-md-12 padding-left padding-right">													
														<div class="col-md-4 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_name">Name</label>
																<input type="text" name="development[name]" value="{{ $developer->name }}" placeholder="" />
															</div>
														</div>
														<div class="col-md-4 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_email">Email</label>
																<input type="text" name="development[email]" value="{{ $developer->email }}" placeholder="" />
															</div>
														</div>
														<div class="col-md-4 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_contact">Contact</label>
																<input type="text" name="development[contact]" value="{{ $developer->contact }}" placeholder="" />
															</div>
														</div>
													</div>
												</div>
												<div class="inter col-md-12">
													<div class="col-md-12 padding-left padding-right">													
														<div class="col-md-10 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_name">Description</label>
																<textarea name="development[description]" rows="5">{{ $developer->description }}</textarea> 
															</div>
														</div>
														<div class="col-md-2 padding-left">
															<div class="form-group">
																<img src="/images/property/developer/original_{{ $developer->image }}" class="img-responsive" alt="" width="100" height="100" style="margin-top: 31px;">
																<label class="control-label mb-10" for="development_logo"></label>
																<input type="file" name="development[image]" value="" placeholder="" />
															</div>
														</div>
													</div>
												</div>
											</div>
											@else
											<div class="padding-right padding-left nicescroll-bar container3">
												<div class="inter col-md-12">
													<div class="col-md-12 padding-left padding-right">													
														<div class="col-md-4 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_name">Name</label>
																<input type="text" name="development[name]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-4 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_email">Email</label>
																<input type="text" name="development[email]" value="" placeholder="" />
															</div>
														</div>
														<div class="col-md-4 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_contact">Contact</label>
																<input type="text" name="development[contact]" value="" placeholder="" />
															</div>
														</div>
													</div>
												</div>
												<div class="inter col-md-12">
													<div class="col-md-12 padding-left padding-right">													
														<div class="col-md-10 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_name">Description</label>
																<textarea name="development[description]" rows="5"></textarea> 
															</div>
														</div>
														<div class="col-md-2 padding-left">
															<div class="form-group">
																<label class="control-label mb-10" for="development_logo">Logo</label>
																<input type="file" name="development[image]" value="" placeholder="" />
															</div>
														</div>
													</div>
												</div>
											</div>
											@endif
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
	<div class="row">
		<div class="col-lg-12 col-sm-12 ">
			<div class="panel panel-default card-view agency-about loadagain">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="col-md-12 padding-right ">
							<h3>Added Images</h3>
							<?php
							$array=explode(";",$project->gallery);

							foreach ($array as $img_name) {
								if(!empty($project->gallery)){


									?>
									<div class="col-md-3 padding-left">
										<div class="col-md-12 add-images padding-left padding-right">
											<img class="img-responsive img-height" src="/images/property/user_property/original_<?php echo $img_name?>" alt="">
											<span data-url="/deleteimageforproperty/{{$project->id}}/{{$img_name}}" class="zmdi zmdi-close editpicicon deleteImage"></span>
										</div>
									</div>
									<?php
								}
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 padding-right theme-heading">
			<div class="col-lg-12 col-md-12 col-sm-12 padding-left property-sectione add-property-img-uploader">
				<div class="form-actions edit-form-submit">
					<div class="panel panel-default card-view portfolio-img-tab profile-Image-tab multi-files-uploader">
						<div class="panel-wrapper collapse in">
							<div class="panel-body portfolio-role profile-role">
								<div class="form-group">
									<input id="file-1" type="file" style="z-index: 0;" name="images[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
									@if ($errors->has('images'))
									<div class="error" style="color: red">{{ $errors->first('images') }}</div>
									@endif
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
<style>
#word {
	position: absolute;
	top: -74px;
	background: #000;
	color: #fff;
	text-align: center;
	border-radius: 5px;
	line-height: 25px;
	padding: 10px;
	font-size: 14px;
	display: none;
}
</style>
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
allowedFileTypes: [ 'image', 'video', 'flash' ],
slugCallback: function ( filename ) {
	return filename.replace( '(', '_' ).replace( ']', '_' );
}
} );
</script>
<script>
	$( document ).on( 'ready', function () {
		$( "#input-41" ).fileinput( {
			maxFileCount: 1,
			allowedFileTypes: [ "video" ],
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
		} );
	} );
</script>
<script type="text/javascript">
	$( document ).ready( function () {
		$( '#file-1' ).click( function () {
			$( '.multi-files-uploader .fileinput-remove' ).trigger( 'click' );
		} );

///////Function to ristrict max lenght of price input field///////
$( "#mytext" ).attr( 'maxlength', '9' );
} );
</script>
<script type="text/javascript">


	$('.deleteImage').click(function(){
		var url=$(this).data('url');
		var current =$(this);

		if (confirm('Are you sure you want to delete this Image?')) {
			$.ajax( {
				url: url,
				datatype: 'json',
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				success: function (e) {
					current.parent().parent().remove();
				}

			} );
		}
	});



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
			$( '#c_address_input' ).prop( 'required', false );
			$( '#c_mobile_input' ).prop( 'required', false );
			$( '#c_name_input' ).prop( 'required', false );
		}
		$( "select#yourdropdownid" ).change( function () {

			if ( $( "#yourdropdownid option:selected" ).text() == "New Client" ) {
				$( '#c_address' ).prop( "disabled", false ).show();
				$( '#c_mobile' ).prop( "disabled", false ).show();
				$( '#c_name' ).prop( "disabled", false ).show();
				$( '#c_address_input' ).prop( 'required', true );
				$( '#c_mobile_input' ).prop( 'required', true );
				$( '#c_name_input' ).prop( 'required', true );
			} else {
				$( '#c_address' ).attr( "disabled", "true" ).hide();
				$( '#c_mobile' ).attr( "disabled", "true" ).hide();
				$( '#c_name' ).attr( "disabled", "true" ).hide();
				$( '#c_address_input' ).prop( 'required', false );
				$( '#c_mobile_input' ).prop( 'required', false );
				$( '#c_name_input' ).prop( 'required', false );
			}

		} );


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

					}
				});
			}
		}
		$( '#city' ).change( function () {
			loadTowns();
		} );
	} );
</script>

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap">
</script> -->
<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&sensor=false&libraries=places"></script> -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&sensor=false&libraries=places"></script>
<script src="/assets_admin/dist/js/locationPicker.js"></script>

<script>
	var inital_lat = "{{$project->latitude}}"; /*lahore pakistan*/
	var inital_lng = "{{$project->longitude}}";
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
			updateControls( addressComponents );
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

</script>
<script>
	$( document ).ready( function () {
		$( "input[type=number]" ).stepper();
	} );
</script>
<script>
	function convertNumberToWords( amount ) {
		var words = new Array();
		words[ 0 ] = '';
		words[ 1 ] = 'One';
		words[ 2 ] = 'Two';
		words[ 3 ] = 'Three';
		words[ 4 ] = 'Four';
		words[ 5 ] = 'Five';
		words[ 6 ] = 'Six';
		words[ 7 ] = 'Seven';
		words[ 8 ] = 'Eight';
		words[ 9 ] = 'Nine';
		words[ 10 ] = 'Ten';
		words[ 11 ] = 'Eleven';
		words[ 12 ] = 'Twelve';
		words[ 13 ] = 'Thirteen';
		words[ 14 ] = 'Fourteen';
		words[ 15 ] = 'Fifteen';
		words[ 16 ] = 'Sixteen';
		words[ 17 ] = 'Seventeen';
		words[ 18 ] = 'Eighteen';
		words[ 19 ] = 'Nineteen';
		words[ 20 ] = 'Twenty';
		words[ 30 ] = 'Thirty';
		words[ 40 ] = 'Forty';
		words[ 50 ] = 'Fifty';
		words[ 60 ] = 'Sixty';
		words[ 70 ] = 'Seventy';
		words[ 80 ] = 'Eighty';
		words[ 90 ] = 'Ninety';
		amount = amount.toString();
		var atemp = amount.split( "." );
		var number = atemp[ 0 ].split( "," ).join( "" );
		var n_length = number.length;
		var words_string = "";
		if ( n_length <= 9 ) {
			var n_array = new Array( 0, 0, 0, 0, 0, 0, 0, 0, 0 );
			var received_n_array = new Array();
			for ( var i = 0; i < n_length; i++ ) {
				received_n_array[ i ] = number.substr( i, 1 );
			}
			for ( var i = 9 - n_length, j = 0; i < 9; i++, j++ ) {
				n_array[ i ] = received_n_array[ j ];
			}
			for ( var i = 0, j = 1; i < 9; i++, j++ ) {
				if ( i == 0 || i == 2 || i == 4 || i == 7 ) {
					if ( n_array[ i ] == 1 ) {
						n_array[ j ] = 10 + parseInt( n_array[ j ] );
						n_array[ i ] = 0;
					}
				}
			}
			value = "";
			for ( var i = 0; i < 9; i++ ) {
				if ( i == 0 || i == 2 || i == 4 || i == 7 ) {
					value = n_array[ i ] * 10;
				} else {
					value = n_array[ i ];
				}
				if ( value != 0 ) {
					words_string += words[ value ] + " ";
				}
				if ( ( i == 1 && value != 0 ) || ( i == 0 && value != 0 && n_array[ i + 1 ] == 0 ) ) {
					words_string += "Crores ";
				}
				if ( ( i == 3 && value != 0 ) || ( i == 2 && value != 0 && n_array[ i + 1 ] == 0 ) ) {
					words_string += "Lakhs ";
				}
				if ( ( i == 5 && value != 0 ) || ( i == 4 && value != 0 && n_array[ i + 1 ] == 0 ) ) {
					words_string += "Thousand ";
				}
				if ( i == 6 && value != 0 && ( n_array[ i + 1 ] != 0 && n_array[ i + 2 ] != 0 ) ) {
					words_string += "Hundred and ";
				} else if ( i == 6 && value != 0 ) {
					words_string += "Hundred ";
				}
			}
			words_string = words_string.split( "  " ).join( " " );
		}
		return words_string;
	}
</script>
<script>
	$( "#mytext" ).keyup( function () {
		$( "#word" ).fadeIn();
	} );
	$( "#mytext" ).focusin( function () {
// $("#word").fadeIn();
$( "#word" ).html( convertNumberToWords( $( "#mytext" ).val() ) );
$( "#word" ).fadeIn();
} );
	$( "#mytext" ).focusout( function () {
		$( "#word" ).fadeOut();
	} );

	$( 'form' ).on( 'reset', function () {
		var _this = this;
		setTimeout( function () {
			$( '.selectpicker', _this ).selectpicker( 'refresh' );
			$( '.multi-files-uploader .fileinput-remove' ).trigger( 'click' );
		} );
	} );



//		$('.btn-reset').click(function() {
//			$('.selectpicker').selectpicker('deselectAll');
//			$('.selectpicker').selectpicker('render');
//			$('.selectpicker').selectpicker('refresh');
//			$(this).closest('form').find('.selectpicker').each(function() {
//				$(this).selectpicker('render');
//			});
//		});
function validateQty( event ) {
	var key = window.event ? event.keyCode : event.which;
	if ( event.keyCode == 8 || event.keyCode == 46 ||
		event.keyCode == 37 || event.keyCode == 39 ) {
		return true;
} else if ( key < 48 || key > 57 ) {
	return false;
} else return true;
};
</script>
<script type="text/javascript">
	$( document ).ready( function () {
		$( function () {
			$( "#file-1" ).change( function () {
				if ( this.files && this.files[ 0 ] ) {
					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL( this.files[ 0 ] );
				}
			} );
		} );

		function imageIsLoaded( e ) {
			$( '#myImg1' ).attr( 'src', e.target.result );
		};


		$( function () {
			$( "#file-2" ).change( function () {
				if ( this.files && this.files[ 0 ] ) {
					var reader = new FileReader();
					reader.onload = imageIsLoad;
					reader.readAsDataURL( this.files[ 0 ] );
				}
			} );
		} );

		function imageIsLoad( e ) {
			$( '#myImg2' ).attr( 'src', e.target.result );
		};

	} );
</script>
<script type="text/javascript">
	jQuery( function () {
		$( "select" ).change( function () {
			$( this ).find( "option:selected" ).each( function () {
				window.onunload = unloadPage;

				function unloadPage() {
					$( '#property-type-dropdown' ).find( 'option:first' ).attr( 'selected', 'selected' );
				}
				if ( $( this ).attr( "value" ) == "all-property-types" ) {
					$( ".box" ).not( ".plots" ).fadeOut();
					$( ".box" ).not( ".residential" ).fadeOut();
					$( ".box" ).not( ".commercial" ).fadeOut();
// $(".all-property-types").fadeIn(1000);
$( ".plots" ).fadeIn( 1000 );
$( ".residential" ).fadeIn( 1000 );
$( ".commercial" ).fadeIn( 1000 );
}
if ( $( this ).attr( "value" ) == "plots" ) {
	$( ".box" ).not( ".plots" ).fadeOut();
	$( ".plots" ).fadeIn( 1000 );
}
if ( $( this ).attr( "value" ) == "residential" ) {
	$( ".box" ).not( ".residential" ).fadeOut();
	$( ".residential" ).fadeIn( 1000 );
}
if ( $( this ).attr( "value" ) == "commercial" ) {
	$( ".box" ).not( ".commercial" ).fadeOut();
	$( ".commercial" ).fadeIn( 1000 );
}
} );
		} );
	} );
</script>
<!-- <script>
$('#title').on('keypress', function (event) {
var regex = new RegExp("^[a-zA-Z0-9]+$");
var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
if (!regex.test(key)) {
event.preventDefault();
return false;
}
});
</script> -->
<script>
	$(function(){
		$('#title').keypress(function(e){
			if(e.which == 47 || e.which == 92){
				return false;
			} else {
			}
		});
	});
</script>
<script>
	var max_fields      = 10;
var wrapper2       = $(".container2");
var add_button2     = $(".add_payment_plan");

var x = 1;


$(add_button2).click(function(e){
//   toastr.success("New Scheme Added");
e.preventDefault();
if(x < max_fields){
	x++;
// $(wrapper).append('<div class ="inter"><input type="text" name="mytext[]"/><input type="text" name="mycar[]"/><input type="text" name="mybike[]"/><input type="text" name="cycle[]"/><a href="#" class="delete">Delete</a></div>');

$(wrapper2).append('<div class="inter col-md-12">'
					+'<h5   ><span>Payment Plan # '+x+'</span></h5>'
					+'<div class="col-md-12 padding-left padding-right">'														
						+'<div class="col-md-3 padding-left">'
							+'<div class="form-group">'
								+'<label class="control-label mb-10" for="email_de">Title:</label>'
								+'<input type="text" name="payment[title][]" value="" placeholder="" />'
							+'</div>'
						+'</div>'
						+'<div class="col-md-5 padding-left">'
							+'<div class="form-group">'
								+'<label class="control-label mb-10" for="email_de">Description </label>'
								+'<input type="text" name="payment[description][]" value="" placeholder="" />'
							+'</div>'
						+'</div>'
						+'<div class="col-md-2 padding-left">'
							+'<div class="form-group">'
								+'<label class="control-label mb-10" for="email_de">Image</label>'
								+'<input type="file" name="payment[image][]" value="" placeholder="" />'
							+'</div>'
						+'</div>'

						+'<div class="col-md-2 padding-left">'
							+'<div class="form-group">'
								// +'<label class="control-label mb-10" for="email_de">Image</label>'
								+'<button type="button" class="btn btn-danger deletePaymentPlan">Delete</button>'
							+'</div>'
						+'</div>'
					+'</div>'
					// +'<div class="col-md-12 padding-left">'
					// 	+'<hr/>'
					// +'</div>'
				+'</div>');

$( '.selectpicker').selectpicker( 'refresh' );
}
else
{	
	alert('You Reached the limits')
}
});


$(wrapper2).on("click",".deletePaymentPlan", function(e){
// toastr.success("Scheme Removed");
e.preventDefault(); $(this).parent().parent().parent().parent().remove(); x--;
})


var max_fields      = 10;
var wrapper3       = $(".container3");
var add_button3     = $(".add_floor_plan");

var y = 1;


$(add_button3).click(function(e){
//   toastr.success("New Scheme Added");
e.preventDefault();
if(y < max_fields){
	y++;
$(wrapper3).append('<div class="inter col-md-12">'
					+'<h5   ><span>Floor Plan # '+x+'</span></h5>'
					+'<div class="col-md-12 padding-left padding-right">'														
						+'<div class="col-md-3 padding-left">'
							+'<div class="form-group">'
								+'<label class="control-label mb-10" for="email_de">Title:</label>'
								+'<input type="text" name="floor[title][]" value="" placeholder="" />'
							+'</div>'
						+'</div>'
						+'<div class="col-md-5 padding-left">'
							+'<div class="form-group">'
								+'<label class="control-label mb-10" for="email_de">Description </label>'
								+'<input type="text" name="floor[description][]" value="" placeholder="" />'
							+'</div>'
						+'</div>'
						+'<div class="col-md-2 padding-left">'
							+'<div class="form-group">'
								+'<label class="control-label mb-10" for="email_de">Image</label>'
								+'<input type="file" name="floor[image][]" value="" placeholder="" />'
							+'</div>'
						+'</div>'
						+'<div class="col-md-2 padding-left">'
							+'<div class="form-group">'
								+'<button type="button" class="btn btn-danger deletefloorPlan">Delete</button>'
							+'</div>'
						+'</div>'
					+'</div>'
				+'</div>');
$( '.selectpicker').selectpicker( 'refresh' );
//add input box
//add input box
}
else
{	
	alert('You Reached the limits')
}
});

$(wrapper3).on("click",".deletefloorPlan", function(e){
// toastr.success("Scheme Removed");
e.preventDefault(); 
$(this).parent().parent().parent().parent().remove(); x--;
})


$(document) .ready(function(){
     $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
});

    $('.delete').on('click',function()
    {
    	var current =$(this);
      	var id =$(this).data('id');
      	 if (confirm('Are you sure you want to delete this?')) {
        $.get("{{route('delete_floor')}}",{id:id},function(data){
            current.parent().parent().parent().parent().remove();
        });
    }

    });

    $('.delete_payment').on('click',function()
    {
    	var current =$(this);
      	var id =$(this).data('id');
      	 if (confirm('Are you sure you want to delete this?')) {
        $.get("{{route('delete_payment_plan')}}",{id:id},function(data){
            current.parent().parent().parent().parent().remove();
        });
    }

    });
</script>
