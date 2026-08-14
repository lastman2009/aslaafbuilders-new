@php
$title = "Property Edit -$property->title";
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

<form action="/dashboard/edit/property/{{$property->id}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
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

									<?php 
									$values = ['1' =>'For Sale' ,'2' => 'For Rent' ,'3' => 'Wanted'];
									?>
										@foreach($values as $key => $value)
										@if($key == $property->purpose)
									<li>
										<input type="radio" id="ab-{{$key}}" class="radio-btn" name="purpose" value="{{$key}}" checked="checked"/>
										<label for="ab-{{$key}}">{{ $value }}</label>
									</li>								
										@else

									<li>
										<input type="radio" id="ab-{{$key}}" class="radio-btn" name="purpose" value="{{$key}}"/>
										<label for="ab-{{$key}}">{{ $value }}</label>
									</li>
							

										@endif
										@endforeach
									
								</ul>
								<div class="tab-content" id="property_tabcontent">
									<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">
										<div class="row" style="min-height: 65px">
											<div class="col-md-12 padding-right show-checkbox" style="display: none;">
												<div class="col-md-12 padding-left">
													<ul class="propertytypelist">
														@if($property->wanted_purpose == "Rent")
														<li>
															<input name="wanted_purpose" type="radio" id="wanted-rent" value="Rent" checked />
															<label for="wanted-rent">Rent</label>
														</li>
														<li>
															<input name="wanted_purpose" type="radio" value="Buy" id="wanted-buy"/>
															<label for="wanted-buy">Buy</label>
														</li>
														@else
														<li>
															<input name="wanted_purpose" type="radio" id="wanted-rent" value="Rent"  />
															<label for="wanted-rent">Rent</label>
														</li>
														<li>
															<input name="wanted_purpose" type="radio" value="Buy" id="wanted-buy" checked/>
															<label for="wanted-buy">Buy</label>
														</li>

														@endif
													</ul>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12 padding-right">
												<div class="col-md-12 padding-left">
													<div class="form-group">
		<label class="control-label mb-10" for="email_de">Select Property Type:</label>
		<select name="property_type_id" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required>
		@foreach($propertyTypes as $propertyType)
		<optgroup label="{{$propertyType->name}}">
			@foreach($data[$propertyType->id] as $datas)
			@if($datas->id == $property->property_type_id)
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
														<label class="control-label mb-10" for="email_de">Land Area:</label>
														<input type="number" id="" name="area" value="{{$property->area}}" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
													</div>
												</div>
<div class="col-md-6 padding-left">
<div class="form-group">
<label class="control-label mb-10" for="email_de">Select Area Type:</label>
<?php

$areas = array("Square Feet", "Square Yards", "Square Meters", "Marla", "Kanal", "Acre");

?>
<select name="area_type" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required>

	@foreach($areas as $area)
		@if($area == $property->area_type)
		<option value="{{$area}}" selected>{{$area}}</option>
		@else
		<option value="{{$area}}">{{$area}}</option>
		@endif
	@endforeach
</select>
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
					<div class="panel panel-default card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<h1>Extra Features</h1>
								<div class="row extra-feature">
									<div class="col-md-12 padding-right nicescroll-bar">
<?php 
$flooring =['tiles' ,'marble','wooden' ,'chip','cement','expoxy']
?>											
<div class="col-md-6 padding-left">
<div class="form-group">
<label class="control-label mb-10" for="email_de">flooring:</label>
<select name="flooring[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
<?php $data=explode(';', $property->flooring);?>
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
<?php 
$Backups =['UPS' ,'Generator','Solar'];
?>

<div class="col-md-6 padding-left">
<div class="form-group">
	<label class="control-label mb-10" for="email_de">electricity backup:</label>
	<select name="electricity_backup[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
		<?php $data=explode(';', $property->electricity_backup);?>
@foreach($Backups as $Backup)
@if(in_array($Backup, $data))
<option value="{{$Backup}}" selected>{{$Backup}}</option>
@else
<option value="{{$Backup}}">{{$Backup}}</option>
@endif
@endforeach

	</select>

</div>
</div>
<div class="col-md-6 padding-left">
<div class="form-group quantity">
<label class="control-label mb-10" for="email_de">parking space:</label>
<input type="number" id="" name="parking_space" min="1" max="50" step="1"  placeholder="" value="{{$property->parking_space}}" />
<!--																			<input type="number" id="" name="parking_space" min="1" max="50" step="1" value="1" placeholder="Type Here"/>-->
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="near bank">nearby banks:</label>
												<input type="text" id="" name="near_bank" value="{{$property->near_bank}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="near school">nearby schools:</label>
												<input type="text" id="" name="near_school" value="{{$property->near_school}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="near hospital">nearby hospitals:</label>
												<input type="text" id="" name="near_hospital" value="{{$property->near_hospital}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="near shopping mall">nearby shopping malls:</label>
												<input type="text" id="" name="near_shopping_mall" value="{{$property->near_shopping_mall}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="near restauarant">nearby restaurants:</label>
												<input type="text" id="" name="near_restaurant" value="{{$property->near_restaurant}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="distance airport">distance from airport (kms):</label>
												<input type="number" id="" name="distance_airport" value="{{$property->distance_airport}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="distance railway station">distance from railway station (kms):</label>
												<input type="number" id="" name="distance_railway" value="{{$property->distance_railway}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="near water filter">nearby water filteration plants:</label>
												<input type="number" id="" name="near_water_filter" value="{{$property->near_water_filter}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="email_de">nearby public transport:</label>
												<input type="text" id="" name="near_public_transport" value="{{$property->near_public_transport}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="servant quarter">servant quarters:</label>
												<input type="number" id="" name="servant_quarter" value="{{$property->servant_quarter}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="drawing room">drawing rooms:</label>
												<input type="number" id="" name="drawing_room" value="{{$property->drawing_room}}" placeholder="">
											</div>
										</div>
										<!-- <div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="email_de">dinning room:</label>
												<input type="number" id="" name="drawing_room" value="" placeholder="">
											</div>
										</div> -->
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="email_de">Kitchens:</label>
												<input type="number" id="" name="no_of_kitchens" value="{{$property->no_of_kitchens}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="study room">Study rooms:</label>
												<input type="number" id="" name="study_room" value="{{$property->study_room}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="prayer room">prayer rooms:</label>
												<input type="number" id="" name="prayer_room" value="{{$property->prayer_room}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="powder room">dressing rooms:</label>
												<input type="number" id="" name="powder_room" value="{{$property->powder_room}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="gym">gym rooms:</label>
												<input type="number" id="" name="gym" value="{{$property->gym}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="No of store rooms">store rooms:</label>
												<input type="number" id="" name="no_of_store_room" value="{{$property->no_of_store_room}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="lounge">lounge of sitting rooms:</label>
												<input type="number" id="" name="lounge" value="{{$property->lounge}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="laundry room">laundry rooms:</label>
												<input type="number" id="" name="laundry_room" value="{{$property->laundry_room}}" placeholder="">
											</div>
										</div>
										<div class="col-md-6 padding-left" style="min-height: 95px;">
											<div class="form-group">

											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<ul class="profile-information extra-select">
													<li>
														<input name="double_glazed_window" type="checkbox" id="double-glazed-window" value="1" <?php if(!empty($property->double_glazed_window)) echo "checked"; else ""; ?>  />
														<label for="double-glazed-window">Double Glazed Window</label>
													</li>
												
												</ul>
											</div>
										</div>
<div class="col-md-6 padding-left">
<div class="form-group">
<ul class="profile-information extra-select">

<li>
<input name="central_ac" type="checkbox" id="air-conditioning" value="1"<?php if(!empty($property->central_ac)) echo "checked"; else ""; ?> />
<label for="air-conditioning">Central Air Conditioning</label>
</li>

</ul>
</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<ul class="profile-information extra-select">
										
													<li>
														<input name="central_heating" type="checkbox" id="central-heating" value="1"<?php if(!empty($property->central_heating)) echo "checked"; else ""; ?> />
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
														 <?php if(!empty($property->waste_disposal)) echo "checked"; else ""; ?> />
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
														 <?php if(!empty($property->furnished)) echo "checked"; else ""; ?>
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
														 <?php if(!empty($property->internet)) echo "checked"; else ""; ?>
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
														  <?php if(!empty($property->cabel_tv)) echo "checked"; else ""; ?>
/> 
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
														<?php if(!empty($property->intercom)) echo "checked"; else ""; ?>
														/>
														<label for="intercom">Intercom</label>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<ul class="profile-information extra-select">
													<li>
														<input name="swimming_pool" type="checkbox" id="swimming-pool" value="1"
															<?php if(!empty($property->swimming_pool)) echo "checked"; else ""; ?>
														/>
														<label for="swimming-pool">Swimming Pool</label>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<ul class="profile-information extra-select">
													<li>
														<input name="sauna" type="checkbox" id="sauna" value="1" <?php if(!empty($property->sauna)) echo "checked"; else ""; ?>/>
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
														<?php if(!empty($property->jacuzzi)) echo "checked"; else ""; ?>
														/>
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
														<?php if(!empty($property->maintenance)) echo "checked"; else ""; ?>
														
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
			<input name="community_club" type="checkbox" id="community_club" value="1" 
			<?php if(!empty($property->community_club)) echo "checked"; else ""; ?>
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
			<input name="security" type="checkbox" id="security-staff" value="1"
			<?php 
			if(!empty($property->security)) echo "checked"; else ""; ?>
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
														<input type="checkbox" name="facility_disabled" id="disabled" value="1"
														<?php 
														if(!empty($property->facility_disabled)) echo "checked"; else ""; ?>

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
														<?php 
														if(!empty($property->elevator)) echo "checked"; else ""; ?>
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
														<?php 
														if(!empty($property->conference_room)) echo "checked"; else ""; ?>
														
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
														<?php 
														if(!empty($property->visitor_parking)) echo "checked"; else ""; ?> 
														
														/>
														<label for="visitor-parking">Visitor Parking</label>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<ul class="profile-information extra-select">
													<li>
														<input name="ground" type="checkbox" id="ground" value="1" <?php 
														if(!empty($property->ground)) echo "checked"; else ""; ?> />
														<label for="ground">ground</label>
													</li>
												</ul>
											</div>
										</div>	
										<div class="col-md-6 padding-left" style="min-height: 95px;">
											<div class="form-group">

											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="other facility">Other Facilities:</label>
												<input type="text" id="" name="other_facilities" value="{{$property->other_facilities}}" placeholder="">
											</div>
										</div>
<!--
										<div class="col-md-12 padding-left">
											<div class="form-group">
												<button type="button" class="property-btn show-btn-property">View More</button>
											</div>
										</div>
-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 property-section">
					<div class="panel panel-default card-view" style="min-height: 295px;">
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<h1>Contact Detail</h1>
								<div class="row">
									<div class="col-md-12 padding-right">
<div class="col-md-6 padding-left">
<div class="form-group">
<label class="control-label mb-10" for="email_de">Select User:</label>
<select id="yourdropdownid" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" name="clientdata">
@if(!empty($property->myself) && $property->myself == $property->user_id)
<option value="user" selected>Myself</option>
@else
<option value="user">Myself</option>
@endif
@foreach($clients as $client)
	@if($client->id == $property->client_id)
	<option value="{{$client->id}}" selected>{{$client->name}}</option>
	@else
	<option value="{{$client->id}}">{{$client->name}}</option>
	@endif
@endforeach
<option value="new">New Client</option>
</select>
</div>
</div>
										<div class="col-md-6 padding-left">
											<div class="form-group"  id="c_name">
												<label class="control-label mb-10" for="email_de">Contact Person Name:</label>
												<input type="text" name="client[name]" placeholder=""/>
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group" id="c_mobile">
												<label class="control-label mb-10" for="email_de">Phone number:</label>
												<input type="text"  name="client[mobile_no]" 
												placeholder=""/>
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="form-group" id="c_address">
												<label class="control-label mb-10" for="email_de">Select User:</label>
												<input type="text"  name="client[address]" 
												
												 placeholder=""/>
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
								<h1>Add Video</h1>
								<div class="row">
									<div class="col-md-12 padding-right">
										<div class="col-md-12 mr-btm padding-left">
											<!-- <div class="form-group">
												<label class="control-label mb-10" for="email_de">Upload video:</label>
												<input id="input-41" name="video" type="file" accept="video/*" class="file-loading" data-show-preview="false">
											</div> -->
										</div>
										<div class="col-md-12 mr-btm padding-left">
											<div class="form-group">
												<label class="control-label mb-10" for="email_de">Upload YouTube URL for video:</label>
												<div class="input-group mb-15"> <span class="input-group-btn">
													<button type="button" class="btn btn-youtube"><img src="/assets_admin/dist/img/youtube-play.png" /></button>
												</span>
													<input type="text" id="example-input1-group4" name="youtube_link" value="{{$property->youtube_link}}" class="form-control youtube-link" placeholder="">
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
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="e">property title:</label>
										<input type="text" id="" name="title" value="{{$property->title}}" placeholder="" required/>
									</div>
								</div>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">all inclusive price (PKR):</label>
										<input type="text" id="mytext" name="price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="tooltip-color" value="{{$property->price}}" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" data-toggle="tooltip" data-placement="top"  placeholder="" required/>
									</div>
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
								<div class="col-md-12 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">Property brief description:</label>
										<textarea class="form-control summernote" rows="8" cols="50" name="description" id="" placeholder=""><?= $property->description?></textarea>
									</div>
								</div>
								<h1>Add Address</h1>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">select city:</label>
										<select class="selectpicker" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">
											
											@foreach($cities as $city)
											@if($city->id == $property->city_id)
											<option value="{{ $city->id }}" selected>{{$city->name}}</option>
											@else
											<option value="{{ $city->id }}">{{$city->name}}
											</option>

											@endif @endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">select town:</label>
										<select name="town_id" id="town" class="selectpicker townclass" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">
										@foreach($towns as $town)
										@if($town->id == $property->town_id)
										<option value="{{ $town->id }}" selected>{{$town->name}}</option>
										@else
										<option value="{{ $town->id }}">{{$town->name}}</option>
										@endif
										@endforeach
										</select>

									
									</div>
								</div>
								<div class="col-md-4 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">select phase:</label>
										<select name="phase_id" id="phase" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">															
										@foreach($phases as $phase)
										@if($phase->id == $property->phase_id)
										<option value="{{ $phase->id }}" selected>{{$phase->name}}</option>
										@else
										<option value="{{ $phase->id }}">{{$phase->name}}</option>
										@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">select block:</label>
										<select name="block_id" id="block" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">
											@foreach($blocks as $block)
										@if($block->id == $property->block_id)

											<option value="{{ $block->id }}" selected>{{$block->name}}</option>
										@else
											<option value="{{ $block->id }}">{{$block->name}}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">proeprty no.:</label>
										<input type="text" id="" name="property_no" value="{{$property->property_no}}" placeholder=""/>
									</div>
								</div>
								<!-- <div class="col-md-12 padding-left">
									<div class="">
										<label class="control-label mb-10" for="email_de">Search Map Location:</label>
										<div class="row">
											<div class="col-sm-12">
												<input id="address5" type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete="off" onmousedown="return resetAddress()" required="" placeholder="">
											</div>
										</div>
									</div>
									<div class="col-sm-12 marginbot10 gmap-locator">
										<div id="locationpicker" class="gmap-frame">
											Location picker handled with js 
										</div>
										<div style="position: absolute; left: -10000%">
											<input type="text" value="{{$property->latitude}}" id="lat" class="" readonly="readonly">
											<input type="text" id="lng" class="" readonly="readonly" value="{{$property->longitude}}">
										</div>
										<input type="text" name="latitude" id="latitude" value="{{$property->latitude}}" class="" readonly="readonly" hidden>
										<input type="text" name="longitude" id="longitude" class="" readonly="readonly"  value="{{$property->longitude}}" hidden>


									</div>
								</div> -->
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
									<div>
										<input type="text" id="latitude" value="{{$property->latitude}}" name="latitude" class="" readonly>
										<input type="text" id="longitude" value="{{$property->longitude}}" name="longitude" class="" readonly>
									</div>
								</div>
							</div>

								<!-- //////new insert -->
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">expiry date:</label>
										<div class='input-group date col-md-12 col-sm-12 padding-right padding-left' id='datetimepicker1'>
											<input type="text" class="form-control" name="expire_date"  placeholder="Expire date">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">ownership status:</label>
										<select name="ownership_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Notihng Selected--">
										<?php

									$ownership_status = array("Freehold" ,"Leasehold");

									?>	
											@foreach($ownership_status as $ownership)
											@if($ownership == $property->ownership_status)
											<option value="{{$ownership}}" selected>{{$ownership}}</option>
											@else
											<option value="{{$ownership}}">{{$ownership}}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">occupancy status:</label>
										<?php

									$occupancy_status = array("Vacant" ,"Occupied");

									?>	
										<select name="occupancy_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Notihng Selected--">
										@foreach($occupancy_status as $status)
										@if($status == $property->occupancy_status)
											<option value="{{$status}}" selected>{{$status}}</option>
											@else
											<option value="{{$status}}">{{$status}}</option>
											@endif
											@endforeach
										</select>
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
											@if($status == $property->construction_status)
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
										<label class="control-label mb-10" for="bed">Bed Rooms:</label>
										<input type="number" id="" name="bed" value="{{$property->bed}}" placeholder=""/>
									</div>
								</div>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="bath">Bath Rooms:</label>
										<input type="number" id="" name="bath" value="{{$property->bath}}" placeholder=""/>
									</div>
								</div>
								<div class="col-md-6 padding-left">
									<div class="form-group">
										<label class="control-label mb-10" for="email_de">Built in Year:</label>
										<select name="construction_year" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">
											@for($i =1960; $i<= 2017; $i++)
											@if($i == $property->construction_year)
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
										<input type="number" id="" name="total_floor" value="{{$property->total_floor}}" placeholder=""/>
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
                        <h2>Added Images</h2>
                        <?php
                        $array=explode(";",$property->gallery);

                        foreach ($array as $img_name) {
                        if(!empty($property->gallery)){


                        ?>
    <div class="col-md-3 padding-left">
		<div class="col-md-12 add-images padding-left padding-right">
			<img class="img-responsive img-height" src="/images/property/user_property/original_<?php echo $img_name?>" alt="">
        	<span data-url="/deleteimageforproperty/{{$property->id}}/{{$img_name}}" class="zmdi zmdi-close editpicicon deleteImage"></span>
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
<div class="col-lg-12 col-sm-12 padding-right">
	<!-- <div class="col-lg-6 col-sm-12 padding-left">
        <div class="panel panel-default card-view agency-about loadagain" style="min-height: 602px;">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="col-md-12 padding-right ">
                        <h2>Added Video</h2>
                        <div class="lol">
                        	
                        @if($property->video != "")
                        <div class="col-md-12 text-center padding-left">
							<video width="500" height="350" controls>
						 <source src="/images/user_property_video/{{$property->video}}" type="video/mp4"> 
						</video>
						
                        </div>
						<div class="text-center">
						<button class="btn btn-warning delete_video" data-id="{{$property->id}}" data-name="{{$property->video}}" style="display: inline-block;margin-top: 15px;">Remove Uploaded Video</button>
						</div>

                        @endif
                        </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="col-lg-6 col-sm-12 padding-left">
        <div class="panel panel-default card-view agency-about loadagain" style="min-height: 602px;">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="col-md-12 padding-right ">
                        <h2>Youtube Video</h2>
                        
                        	<div id="youtube">
                        		
                            @if($property->youtube_link != "")
                            <div class="col-md-12 text-center padding-left">
							
							<iframe width="500" height="350"
							src="{{$property->youtube_link}}">
							</iframe>
							
                            </div>
                            <div class="text-center">
							<button class="btn btn-warning youtube" style="display: inline-block;margin-top: 15px;">Remove Youtube Video</button>
							</div>
                            @endif
                        	</div>


                       
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>

</div>

<div class="row">
	<div class="col-lg-12 padding-right theme-heading">
		<div class="col-lg-12 col-md-12 col-sm-12 padding-left property-sectione add-property-img-uploader">
			<div class="form-actions edit-form-submit">
				<div class="panel panel-default card-view portfolio-img-tab profile-Image-tab">
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
$( '.fileinput-remove' ).trigger( 'click' );
} );
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

$( '#ab-3' ).click( function () {
$( '.show-checkbox' ).fadeIn();
} );
$( '#ab-2,#ab-1' ).click( function () {
$( '.show-checkbox' ).fadeOut();
} );
</script>
<script>
$( document ).ready( function () {
$( '#c_address' ).attr( "disabled", "true" ).hide();
$( '#c_mobile' ).attr( "disabled", "true" ).hide();
$( '#c_name' ).attr( "disabled", "true" ).hide();

if ( $( "#yourdropdownid option:selected" ).text() == "Myself" ) {

$( '#c_address' ).attr( "disabled", "true" ).hide();
$( '#c_mobile' ).attr( "disabled", "true" ).hide();
$( '#c_name' ).attr( "disabled", "true" ).hide();

}
$( "select#yourdropdownid" ).change( function () {

if ( $( "#yourdropdownid option:selected" ).text() == "New Client" ) {
$( '#c_address' ).prop( "disabled", false ).show();
$( '#c_mobile' ).prop( "disabled", false ).show();
$( '#c_name' ).prop( "disabled", false ).show();
} else {
$( '#c_address' ).attr( "disabled", "true" ).hide();
$( '#c_mobile' ).attr( "disabled", "true" ).hide();
$( '#c_name' ).attr( "disabled", "true" ).hide();
}

} );

function loadBlocks() {
phase_id = $( '#phase option:selected' ).val();
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
id = $( '#city option:selected' ).val()
if(id != ""){
    $.ajax( {
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
$( '#city').change( function () {
	loadTowns();

	$('#phase').empty();
	$('#block').empty();

});
$( '#town').change( function () {
	$('#block').empty();
	loadPhases();
});
$( '#phase').change( function () {
	loadBlocks();
});

} );
</script>

<script type="text/javascript">

				$(document).ready(function(){	
				$('#file-1').click(function(){
					$('.fileinput-remove').trigger('click');	
					});

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

$('.delete_video').click(function(e){
e.preventDefault();
var id=$(this).data('id');
var name=$(this).data('name');
var current=$(this);

url="delete-video/"+id+'/'+name;
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
})
$('.youtube').click(function(e){
e.preventDefault();
$('#example-input1-group4').val('');
$('#youtube').remove();			
});

///////Function to ristrict max lenght of price input field///////
$("#mytext").attr('maxlength', '9');    



});

</script>
<!--  <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap">
</script> -->
<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&sensor=false&libraries=places"></script> -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&sensor=false&libraries=places"></script>
<script src="/assets_admin/dist/js/locationPicker.js"></script>
<script>
var inital_lat = "{{$property->latitude}}"; /*lahore pakistan*/
var inital_lng = "{{$property->longitude}}";
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
$(document).ready(function() {
$("input[type=number]").stepper();
});
</script>

<script>

function convertNumberToWords(amount) {
var words = new Array();
words[0] = '';
words[1] = 'One';
words[2] = 'Two';
words[3] = 'Three';
words[4] = 'Four';
words[5] = 'Five';
words[6] = 'Six';
words[7] = 'Seven';
words[8] = 'Eight';
words[9] = 'Nine';
words[10] = 'Ten';
words[11] = 'Eleven';
words[12] = 'Twelve';
words[13] = 'Thirteen';
words[14] = 'Fourteen';
words[15] = 'Fifteen';
words[16] = 'Sixteen';
words[17] = 'Seventeen';
words[18] = 'Eighteen';
words[19] = 'Nineteen';
words[20] = 'Twenty';
words[30] = 'Thirty';
words[40] = 'Forty';
words[50] = 'Fifty';
words[60] = 'Sixty';
words[70] = 'Seventy';
words[80] = 'Eighty';
words[90] = 'Ninety';
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