@php
$title = "Frequent Property Add";
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
						<form action="/dashboard/frequentAddProperty" method="POST" enctype="multipart/form-data">
							{{ csrf_field()}}
							<div class="row">


		
								<div class="col-lg-12 col-md-12 col-sm-12 padding-left">
									<div class="col-lg-12 col-md-12 col-sm-12 property-section padding-right">
										<div class="panel panel-default card-view" style="min-height: 295px;">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<h1>Property Detail</h1>
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
															<textarea class="form-control summernote" rows="8" cols="30" name="description" id="" placeholder="">{{ old('description') }}</textarea>
														</div>
														@if ($errors->has('description'))
														<div class="error" style="color: red">{{ $errors->first('description') }}</div>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
			
								<div class="col-lg-12 padding-right theme-heading">
									<div class="col-lg-12 col-md-12 col-sm-12 padding-left">
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
																					<select name="property_type_id" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required>
																						@foreach($propertyTypes as $propertyType)
																						<optgroup label="{{$propertyType->name}}">
																							@foreach($data[$propertyType->id] as $datas)
																							<option value="{{$datas->id}}">{{$datas->name}}</option>
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
<input type="number" id="number" min="1" step="0.1" name="area"  />
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
										<div class="panel panel-default card-view" style="min-height: 443px;">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-12 padding-right">
															<h1>Add Address</h1>
															<div class="col-md-12 padding-left">
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
															<div class="col-md-12 padding-left">
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
																<div class="form-group">
																	<label class="control-label mb-10" for="email_de">Mobile No:</label>
																	<input type="text" name="number" id="my_name_input" value="{{$user->mobile}}" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required=""/>
																</div>
															</div>
														</div>


													</div>

												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 property-section padding-left">
										<div class="panel panel-default card-view" style="min-height: 443px;">
											<div class="panel-wrapper collapse in">
												<div class="panel-body">
													<div class="row">
														
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

														
													</div>
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
maxFileSize: 1024,
maxFilesNum: 1,
maxFileCount: 4,
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
		}
		$( "select#yourdropdownid" ).change( function () {

			if ( $( "#yourdropdownid option:selected" ).text() == "New Client" ) {
				$( '#c_address' ).prop( "disabled", false ).show();
				$( '#c_mobile' ).prop( "disabled", false ).show();
				$( '#c_name' ).prop( "disabled", false ).show();
				$( '#c_address_input' ).prop('required',true);
				$( '#c_mobile_input' ).prop('required',true);
				$( '#c_name_input' ).prop('required',true);
			} else {
				$( '#c_address' ).attr( "disabled", "true" ).hide();
				$( '#c_mobile' ).attr( "disabled", "true" ).hide();
				$( '#c_name' ).attr( "disabled", "true" ).hide();
				$( '#c_address_input' ).prop('required',false);
				$( '#c_mobile_input' ).prop('required',false);
				$( '#c_name_input' ).prop('required',false);
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
<script>
	$(document).ready(function() {
		$("input[type=number]").stepper();
	});
</script>

<!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&sensor=false&libraries=places"></script> -->
<!-- <script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&callback=initMap" type="text/javascript"></script>
	<script src="/assets_admin/dist/js/locationPicker.js"></script> -->
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&sensor=false&libraries=places"></script>
<script src="/assets_admin/dist/js/locationPicker.js"></script>

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
				$("#address5").val($('#phase option:selected').text().trim()+', '+$('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', Pakistan');
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

	$('form').on('reset', function() {
		var _this = this;
		setTimeout(function() {
			$('.selectpicker',_this).selectpicker('refresh');
			$('.multi-files-uploader .fileinput-remove').trigger( 'click' );
		});
	});
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
@if (session('message'))

<script>
	toastr.warning("{{ Session::get('message') }}");
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