<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="tab-struct custom-tab-2 mt-40">
					<div class="tab-content">

						<form>
							<div class="row">
								<div class="col-lg-12 padding-right theme-heading">
									<div class="col-lg-6 col-md-6 col-sm-12 padding-left">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 property-section">
												<div class="panel panel-default card-view propertytypeheight">
													<div class="panel-wrapper collapse in">
														<div class="panel-body">
															<h1>Property Type</h1>
															<ul role="tablist" class="nav nav-tabs" id="property_tablist">
																<li class="" role="presentation">
																	<a aria-expanded="true" data-toggle="tab" role="tab" href="#rent_property">For Rent</a>
																</li>
																<li role="presentation" class="">
																	<a data-toggle="tab" role="tab" href="#sale_property" aria-expanded="false">For Sale</a>
																</li>
																<li role="presentation" class="active">
																	<a data-toggle="tab" role="tab" href="#wanted_property" aria-expanded="false">Wanted</a>
																</li>
															</ul>
															<div class="tab-content" id="property_tabcontent">
																<div id="rent_property" class="tab-pane fade" role="tabpanel">
																	<div class="row">

																		<div class="col-md-12 padding-right">
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="">Residential</option>
																						<option value="">Commercial</option>
																						<option value="">Plots</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="house-villa">House / Villa</option>
																						<option value="flats">Flats</option>
																						<option value="upper-portion">Upper Portion</option>
																						<option value="lower-portion">Lower Portion</option>
																						<option value="farm-houses">Farm Houses</option>
																						<option value="lodges">Lodges</option>
																						<option value="rooms">Rooms</option>
																						<option value="pent-houses">Pent Houses</option>
																						<option value="others-residential">Others</option>

																						<option value="office">Office</option>
																						<option value="shop">Shop</option>
																						<option value="warehouse">Warehouse</option>
																						<option value="factory">Factory</option>
																						<option value="building">Building</option>
																						<option value="showrooms">Showrooms</option>
																						<option value="office-business">Office in Business Tower</option>
																						<option value="office-it">Office in IT Tower</option>
																						<option value="hotel">Hotels</option>
																						<option value="resort">Resorts</option>
																						<option value="guest-house">Guest House</option>
																						<option value="banquet-hall">Banquet Hall</option>
																						<option value="others-commercial">Others</option>

																						<option value="plot-residential">Residential</option>
																						<option value="plot-commercial">Commercial</option>
																						<option value="plot-industrial">Industrial</option>
																						<option value="plot-agricultural">Agricultural</option>
																						<option value="plot-file">Plot File</option>
																						<option value="plot-form">Plot Form</option>
																						<option value="plot-affidavit">Plot Affidavit</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<input type="number" id="" name="" value="" placeholder="Land Area"/>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="">Type Area</option>
																						<option value="">Square Feet</option>
																						<option value="">Square Yards</option>
																						<option value="">Square Meters</option>
																						<option value="">Marla</option>
																						<option value="">Kanal</option>
																						<option value="">Acre</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>

																<div id="sale_property" class="tab-pane fade" role="tabpanel">
																	<div class="row">
																		<div class="col-md-12 padding-right">
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="">Residential</option>
																						<option value="">Commercial</option>
																						<option value="">Plots</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="house-villa">House / Villa</option>
																						<option value="flats">Flats</option>
																						<option value="upper-portion">Upper Portion</option>
																						<option value="lower-portion">Lower Portion</option>
																						<option value="farm-houses">Farm Houses</option>
																						<option value="lodges">Lodges</option>
																						<option value="rooms">Rooms</option>
																						<option value="pent-houses">Pent Houses</option>
																						<option value="others-residential">Others</option>

																						<option value="office">Office</option>
																						<option value="shop">Shop</option>
																						<option value="warehouse">Warehouse</option>
																						<option value="factory">Factory</option>
																						<option value="building">Building</option>
																						<option value="showrooms">Showrooms</option>
																						<option value="office-business">Office in Business Tower</option>
																						<option value="office-it">Office in IT Tower</option>
																						<option value="hotel">Hotels</option>
																						<option value="resort">Resorts</option>
																						<option value="guest-house">Guest House</option>
																						<option value="banquet-hall">Banquet Hall</option>
																						<option value="others-commercial">Others</option>

																						<option value="plot-residential">Residential</option>
																						<option value="plot-commercial">Commercial</option>
																						<option value="plot-industrial">Industrial</option>
																						<option value="plot-agricultural">Agricultural</option>
																						<option value="plot-file">Plot File</option>
																						<option value="plot-form">Plot Form</option>
																						<option value="plot-affidavit">Plot Affidavit</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<input type="number" id="" name="" value="" placeholder="Land Area"/>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="">Type Area</option>
																						<option value="">Square Feet</option>
																						<option value="">Square Yards</option>
																						<option value="">Square Meters</option>
																						<option value="">Marla</option>
																						<option value="">Kanal</option>
																						<option value="">Acre</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div id="wanted_property" class="tab-pane fade active in" role="tabpanel">

																	<div class="row">
																		<div class="col-md-12 padding-right">
																			<div class="col-md-12 padding-left">
																				<ul class="propertytypelist">
																					<li>
																						<input type="checkbox" id="wanted-rent"/>
																						<label for="wanted-rent">Rent</label>
																					</li>
																					<li>
																						<input type="checkbox" id="wanted-buy"/>
																						<label for="wanted-buy">Buy</label>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12 padding-right">
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select name="category" class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option rel="residential" value="">Residential</option>
																						<option rel="commercial" value="">Commercial</option>
																						<option rel="plot" value="">Plots</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select name="items" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option class="residential" value="house-villa">House / Villa</option>
																						<option class="residential" value="flats">Flats</option>
																						<option class="residential" value="upper-portion">Upper Portion</option>
																						<option class="residential" value="lower-portion">Lower Portion</option>
																						<option class="residential" value="farm-houses">Farm Houses</option>
																						<option class="residential" value="lodges">Lodges</option>
																						<option class="residential" value="rooms">Rooms</option>
																						<option class="residential" value="pent-houses">Pent Houses</option>
																						<option class="residential" value="others-residential">Others</option>

																						<option class="commercial" value="office">Office</option>
																						<option class="commercial" value="shop">Shop</option>
																						<option class="commercial" value="warehouse">Warehouse</option>
																						<option class="commercial" value="factory">Factory</option>
																						<option class="commercial" value="building">Building</option>
																						<option class="commercial" value="showrooms">Showrooms</option>
																						<option class="commercial" value="office-business">Office in Business Tower</option>
																						<option class="commercial" value="office-it">Office in IT Tower</option>
																						<option class="commercial" value="hotel">Hotels</option>
																						<option class="commercial" value="resort">Resorts</option>
																						<option class="commercial" value="guest-house">Guest House</option>
																						<option class="commercial" value="banquet-hall">Banquet Hall</option>
																						<option class="commercial" value="others-commercial">Others</option>

																						<option class="plot" value="plot-residential">Residential</option>
																						<option class="plot" value="plot-commercial">Commercial</option>
																						<option class="plot" value="plot-industrial">Industrial</option>
																						<option class="plot" value="plot-agricultural">Agricultural</option>
																						<option class="plot" value="plot-file">Plot File</option>
																						<option class="plot" value="plot-form">Plot Form</option>
																						<option class="plot" value="plot-affidavit">Plot Affidavit</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<input type="number" id="" name="" value="" placeholder="Land Area"/>
																				</div>
																			</div>
																			<div class="col-md-6 padding-left">
																				<div class="form-group">
																					<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																						<option value="">Type Area</option>
																						<option value="">Square Feet</option>
																						<option value="">Square Yards</option>
																						<option value="">Square Meters</option>
																						<option value="">Marla</option>
																						<option value="">Kanal</option>
																						<option value="">Acre</option>
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
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																				<option value="">Flooring</option>
																				<option value="">Tiles</option>
																				<option value="">Marble</option>
																				<option value="">Wooden</option>
																				<option value="">Chip</option>
																				<option value="">Cement</option>
																				<option value="">Other</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																				<option value="">Electricity Backup</option>
																				<option value="">UPS</option>
																				<option value="">Generator</option>
																				<option value="">Solar</option>
																				<option value="">Other</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Parking Spaces"/>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Nearby Banks">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Nearby Schools">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Nearby Hospitals">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Nearby Shopping Malls">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Nearby Restaurants">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Distance from Airport (kms)">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Distance from Railway Station (kms)">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Nearby Water Filtration Plant">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Nearby Public Transport Service">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Number of Servant Quaters">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Drawing Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Dinning Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Number of Kitchens">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Study Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Prayer Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Powder Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Gym Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Number of Store Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Lounge of Sitting Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Laundry Room">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																				<option value="">Other Heakthcare and Recreation Facilities</option>
																				<option value="">Community Center</option>
																				<option value="">Football / Cricket Playground</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="number" id="" name="" value="" placeholder="Number of Elevators">
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">

																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="double-glazed-window"/>
																					<label for="double-glazed-window">Double Glazed Window</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="air-conditioning"/>
																					<label for="air-conditioning">Central Air Conditioning</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="central-heating"/>
																					<label for="central-heating">Central Heating</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="waste-disposal"/>
																					<label for="waste-disposal">Waste Disposal</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="furnished"/>
																					<label for="furnished">Furnished</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="internet"/>
																					<label for="internet">Broadband Internet Access</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="satelite"/>
																					<label for="satelite">Satellite or Cable TV Ready</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="intercom"/>
																					<label for="intercom">Intercom</label>
																				</li>
																			</ul>
																		</div>
																	</div>

																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="swimming-pool"/>
																					<label for="swimming-pool">Swimming Pool</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="sauna"/>
																					<label for="sauna">Sauna</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="jacuzzi"/>
																					<label for="jacuzzi">Jacuzzi</label>
																				</li>
																			</ul>
																		</div>
																	</div>

																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="maintenance-staff"/>
																					<label for="maintenance-staff">Maintenance Staff</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="security-staff"/>
																					<label for="security-staff">Security Staff</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="disabled"/>
																					<label for="disabled">Facilities for Disabled</label>
																				</li>
																			</ul>
																		</div>
																	</div>

																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="elevator"/>
																					<label for="elevator">Services Elevators</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="conference-room"/>
																					<label for="conference-room">Conference Room</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<ul class="profile-information extra-select">
																				<li>
																					<input type="checkbox" id="visitor-parking"/>
																					<label for="visitor-parking">Visitor Parking</label>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">

																		</div>
																	</div>
																	<div class="col-md-6 load-features padding-left">
																		<div class="form-group">
																			<input type="text" id="" name="" value="" placeholder="Other Facilities">
																		</div>
																	</div>
																	<div class="col-md-12 padding-left">
																		<div class="form-group">
																			<button type="button" class="property-btn show-btn-property">View More</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12 property-section">
												<div class="form-actions edit-form-submit">
													<div class="panel panel-default card-view portfolio-img-tab profile-Image-tab" style="min-height: 350px;">
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
									<div class="col-lg-6 col-md-6 col-sm-12 property-section padding-left">
										<div class="panel panel-default card-view">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<h1>Property Detail</h1>
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Property Title"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="mytext" name="" class="tooltip-color" value="" data-toggle="tooltip" data-placement="top" title="53 Crore 53 Lakh and 53 Thousand" placeholder="All-inclusive price(PKR)"/>
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<textarea class="form-control summernote" rows="8" cols="50" name="" id="" placeholder="Property Description ..."></textarea>
																</div>
															</div>
															<div class="col-md-2 extra-width padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">City</option>
																	</select>
																</div>
															</div>
															<div class="col-md-2 extra-width padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Town</option>
																	</select>
																</div>
															</div>
															<div class="col-md-2 extra-width padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Phase</option>
																	</select>
																</div>
															</div>
															<div class="col-md-2 extra-width padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Block</option>
																	</select>
																</div>
															</div>
															<div class="col-md-2 extra-width padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Property No."/>
																</div>
															</div>
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.7227736383365!2d74.32938531522929!3d31.504303081374967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190468fac707b5%3A0xccf10281e353bf7f!2sKalma+Chowk+Flyover!5e0!3m2!1sen!2s!4v1500899143464" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" placeholder="Expiry Date" data-mask="99/99/9999" class="form-control">
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Ownership Status</option>
																		<option value="">Freehold</option>
																		<option value="">Leasehold</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Occupancy Status</option>
																		<option value="">Vacant</option>
																		<option value="">Occupied</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Construction Status</option>
																		<option value="">Complete</option>
																		<option value="">Under Construction</option>
																		<option value="">Gray Structure</option>
																	</select>
																</div>
															</div>

															<h3>Basic Feature</h3>

															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="number" id="" name="" value="" placeholder="Number of Bed Rooms"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="number" id="" name="" value="" placeholder="Number of Bath Rooms"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Built in Year</option>
																		<option value="">1960</option>
																		<option value="">2017</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="number" id="" name="" value="" placeholder="Total Number of Floors"/>
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
								<div class="col-lg-12 padding-right theme-heading">
									<div class="col-lg-6 col-md-6 col-sm-12 property-section padding-left">
										<div class="panel panel-default card-view">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<h1>Contact Detail</h1>
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<select class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
																		<option value="">Myself</option>
																		<option value="">Client 1</option>
																		<option value="">Client 2</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Contact Person"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Phone Number"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Cell Number"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Office Number"/>
																</div>
															</div>
															<div class="col-md-6 padding-left">
																<div class="form-group">
																	<input type="text" id="" name="" value="" placeholder="Office Number 2"/>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 property-section padding-left">
										<div class="panel panel-default card-view propertyvideoheight">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<h1>Add Video</h1>
													<div class="row">
														<div class="col-md-12 padding-right">
															<div class="col-md-12 mr-btm padding-left">
																<div class="form-group">
																	<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																		<span class="input-group-addon fileupload btn btn-info btn-file">
																			<i class="fa fa-play"></i> 
																			<span class="fileinput-new btn-text"></span>
																	
																		<span class="fileinput-exists btn-text"></span>
																		<input type="file" name="" placeholder="Upload Your Video">
																		</span>
																		<a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">
																			<i class="fa fa-trash"></i>
																			<span class="btn-text"></span>
																		</a>
																	
																		<div class="form-control border-video" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
																		</div>


																	</div>
																</div>
															</div>
															<div class="col-md-12 mr-btm padding-left">
																<div class="form-group">
																	<div class="input-group mb-15"> <span class="input-group-btn">
																		<button type="button" class="btn btn-youtube"><img src="dist/img/youtube-icon.jpg" /></button>
																		</span>
																	
																		<input type="text" id="example-input1-group4" name="example-input1-group4" class="form-control youtube-link" placeholder="Paste Here Your Youtube Video Link">
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


	<?php include './footer.php'; ?>

	<script>
		$( function () {
			$( '[data-toggle="tooltip"]' ).tooltip()
		} );

		$( function () {
			$( ".load-features" ).slice( 0, 16 ).show();

			$( ".show-btn-property" ).on( 'click', function ( e ) {
				e.preventDefault();
				$( ".load-features:hidden" ).slice( 0, 6 ).slideDown();
				if ( $( ".load-features:hidden" ).length == 0 ) {
					$( "#load" ).fadeOut( 'slow' );
					$( ".show-btn-property" ).hide();
				}

			} );
		} );
	</script>
	@if (session('error'))
   <script>
   $(window).load(function(){
		//window.setTimeout(function(){
			$.toast({
				heading: 'Error',
				text: '{{ Session::get('error') }}',
				position: 'top-right',
				loaderBg:'#fec107',
				icon: 'error',
				hideAfter: 6000, 
				stack: 6
			});
		//}, 6000);
	});
    </script>
@endif