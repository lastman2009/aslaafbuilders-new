 
<!-- fileinput New Plugin CSS -->
  <link href="https://beta.rightdeed.com/assets_admin/vendors/fileinput/css/fileinput.css" rel="stylesheet" type="text/css"/>
        <link href="https://beta.rightdeed.com/assets_admin/vendors/fileinput/themes/explorer/theme.css" rel="stylesheet" type="text/css"/>
<div class="add_Property"  style="display:none" >
        <div class="container inner_add_Property">
            <span class="close_property" id="close_property">x</span>
            <form action="/addproperty" method="post" enctype="multipart/form-data" >
                {{ csrf_field()}}
                <div class="row">
                    <div class="col-md-12 property-type-section">
                        <h1 class="section-heading"><i class="fa fa-building-o"></i> Property Type</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="property_label" for="purpose">Purpose:</label>
                    		    	<ul class="list-inline" id="purpose">
                    				<li class="radio-item">
                    					<input type="radio" id="a25" class="radio-btn" name="purpose" value="1" checked="checked"/>
                    					<label for="a25">For Sale</label>
                                    </li>
                    				<li class="radio-item">
                    					<input type="radio" class="radio-btn" id="a50" name="purpose" value="2"/>
                    					<label for="a50">For Rent</label>
                    				</li>
                    				<li class="radio-item">
                    					<input type="radio" id="a75" name="purpose" class="last-radio-btn" value="3"/>
                    					<label for="a75">Wanted</label>
                    				</li>
                                </ul>
                                <div class="show-checkbox" style="display: none;">
                    				<ul class="list-inline">
                    					<li class="radio-item">
                    						<input name="wanted_purpose" type="radio" id="wanted-rent" value="Rent" />
                    						<label for="wanted-rent">Rent</label>
                    					</li>
                    					<li class="radio-item">
                    						<input name="wanted_purpose" type="radio" value="Buy" id="wanted-buy"/>
                    						<label for="wanted-buy">Buy</label>
                    					</li>
                    				</ul>
                        			</div>
                                </div>
                                
                                
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                    			<label class="property_label" for="property_type">Select Property Type:</label>
                    			<select name="property_type_id" id="property_type" class="selectpicker form-control" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required data-size="10">
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
                        	<div class="col-md-4 ">
                            		<div class="form-group">
                            		    <label class="property_label" for="land_area">Land Area:</label>
                            			<input type="number" class="form-control" id="land_area" min="0.1" step="0.1" name="area">
                            				
                            		</div>
                            		@if ($errors->has('area'))
    																				<div class="error" style="color: red">{{ $errors->first('area') }}</div>
    																				@endif
                	        </div>
                    	    <div class="col-md-4">
                				<div class="form-group">
                					<label class="property_label" for="area_type">Select Area Type:</label>
                					<select name="area_type" id="area_type" class="selectpicker form-control" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required data-size="10">
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
                    <div class="col-md-12 property-detail-section">
                        <h1 class="section-heading"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Property Detail</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
    									<label class="property_label" for="property_title">Property Title:</label>
    									<input class="form-control" type="text" id="property_title" name="title" value="" placeholder="" required="">
    							</div>
    							@if ($errors->has('title'))
    							    <div class="error" style="color: red">{{ $errors->first('title') }}</div>
    							@endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
    									<label class="property_label" for="property_price">all inclusive price (PKR):</label>
    									<input class="form-control" type="text" id="property_price" name="price" onkeypress='return validateQty(event);' class="tooltip-color" min="1" max="9" onkeyup="word.innerHTML=convertNumberToWords(this.value)" data-toggle="tooltip" data-placement="top"  placeholder="" required/>
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
    								@if ($errors->has('price'))
    							    <div class="error" style="color: red">{{ $errors->first('price') }}</div>
    								@endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="property_label" for="description">Description:</label>
                    		    	<textarea rows="5" cols="20" class="form-control" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                 <label class="property_label" for="property_images">Images:</label>
                                 <div class="row" id="property_images">
                        		 <div>
                        			<div class="col-lg-12 col-md-12 col-sm-12 padding-left property-sectione add-property-img-uploader">
                        				<div class="form-actions edit-form-submit">
                        					<div class="">
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
                    </div>
                    <div class="col-md-12 property-location-section">
                        <h1 class="section-heading"><i class="fa fa-map-marker" aria-hidden="true"></i> Property Location</h1>
                        <div class="row">
                            <div class="col-md-6"  >
                                <div class="form-group">
    									<label class="property_label" for="property_city">select city:</label>
    									<select class="selectpicker form-control" name="city_id" id="property_city" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
                                            @foreach($cities as $city) 
    										<option value="{{ $city->id }}">{{$city->name}}
    										</option> @endforeach
    									</select>
    							</div>
                            </div>
                            <div class="col-md-6" id="prop_town" style="display:none;">
                                	<div class="form-group">
    									<label class="property_label" for="property_town">select town:</label>
    									<select name="town_id" id="property_town" class="selectpicker townclass form-control" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
    									</select>
    								</div>
                            </div>
                            <div class="col-md-6" id="prop_phase" style="display:none;">
                                <div class="form-group">
    									<label class="property_label" for="property_phase">select Phase:</label>
    									<select name="phase_id" id="property_phase" class="selectpicker form-control" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
    									</select>
    								</div>
                            </div>
                            <div class="col-md-6" id="prop_block" style="display:none;">
                                <div class="form-group">
    									<label class="property_label" for="property_block">select block:</label>
    									<select name="block_id" id="property_block" class="selectpicker form-control" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
    									</select>
    							</div>
                            </div> 
                            <div class="col-md-6" >
                                <div class="form-group">
    									<label class="property_label" for="property_no">property no:</label>
    									<input type="text" id="property_no" name="property_no" value="" class="form-control" placeholder=""/>
    							</div>
                            </div> 
                            <div class="col-md-12 padding-left" id="prop_map" style="display:none;">
    								<label class="property_label" for="property_map_location">Search Map Location:</label>
    								<div class="row" id="property_map_location">
    									<div class="col-sm-12 input-group" style="padding-left: 15px;padding-right:15px;">
    										<input id="address5" type="text" value="Pakistan, Lahore " class="form-control" autocomplete="off"  required="" placeholder="" style="">
    										<div class="input-group-addon" style="padding-left: 20px;padding-right: 20px;"><i class="fa fa-search"></i></div>
    									</div>
    								</div>
    								<div class="" style="margin-top:10px;" >
    									<div id="locationpicker" class="gmap-frame" style="height:300px">
    										<!-- Location picker handled with js  -->
    									</div>
    							<div style="text-indent: -999999999999999px;position: absolute;">
    										<input type="text" id="latitude" name="latitude" class="" readonly>
    										<input type="text" id="longitude" name="longitude" class="" readonly>
    									</div>
    								</div>
    							</div>
                    			<div class="col-lg-12 col-md-12 col-sm-12 padding-left">
            						<div class="panel-body submit-property">
            							<button type="submit" class="btn btn-submit btn-primary pull-right btn-lg orange-back">Submit</button>
                			        </div>
                                </div>
                            </div>
                    	</div>
            	 </div>
            </form>
        </div>
    </div>
    
     @section('value_form_script')
      <!-- fileinput New Plugin JavaScript -->
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/plugins/sortable.js"></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/fileinput.js"></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/locales/fr.js"></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/locales/es.js"></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/themes/explorer/theme.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyABd9pcDqbIv-Ol89DtKj7HjtEyk6R5irk&v=3.exp&sensor=false&libraries=places"></script>
<script src="/assets_admin/dist/js/locationPicker.js"></script>
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
	
	
	
		$("#property_price").keyup(function(){
		$("#word").fadeIn();
	});
	$("#property_price").focusin(function(){
// $("#word").fadeIn();
$("#word").html(convertNumberToWords($("#property_price").val()));
$("#word").fadeIn();
});
	$("#property_price").focusout(function(){
		$("#word").fadeOut();
	});
    $("#property_price").attr('maxlength', '9');
    
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
	$( "#property_city" ).change( function ( e ) {
	    $("#prop_map").show("1000");
        $("#prop_town").show("1000");
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#property_city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#property_city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	$( "#property_town" ).change( function ( e ) {
	    $("#prop_phase").show("1000");
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#property_town option:selected').text().trim()+', '+$('#property_city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#property_town option:selected').text().trim()+', '+$('#property_city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	$( "#property_phase" ).change( function ( e ) {
	    $("#prop_block").show("1000");
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#property_phase option:selected').text().trim()+', '+$('#property_town option:selected').text().trim()+', '+$('#property_city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#property_phase option:selected').text().trim()+', '+$('#property_town option:selected').text().trim()+', '+$('#property_town option:selected').text().trim()+', '+$('#property_city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});
	$( "#property_block" ).change( function ( e ) {
	     
	   
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $('#property_block option:selected').text().trim()+', '+$('#property_phase option:selected').text().trim()+', '+$('#property_town option:selected').text().trim()+', '+$('#property_city option:selected').text().trim()+', pk'},function ( results, status ) {

			if ( status == google.maps.GeocoderStatus.OK ) {
				$( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' );
				$( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' );
				$("#address5").val($('#property_block option:selected').text().trim()+', '+$('#property_phase option:selected').text().trim()+', '+$('#property_town option:selected').text().trim()+', '+$('#property_city option:selected').text().trim()+', Pakistan');
			} else {
				alert( "Something got wrong " + status );
			}
		});
	});

	
		function loadBlocks1() {
			phase_id = $( '#property_phase option:selected' ).val();
			$('#property_block').empty();
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
						$( '#property_block' ).html( json );
						$( '.selectpicker' ).selectpicker( 'refresh' );
					}
				});
			}
		}

		function loadPhases1() {
			town_id = $( '#property_town option:selected' ).val();
	// alert(town_id);
	$('#property_phase').empty();
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
				$( '#property_phase' ).html( json );
				$( '.selectpicker' ).selectpicker( 'refresh' );
				loadBlocks();
			}
		});
	}
}

function loadTowns1() {
	id = $( '#property_city option:selected' ).val();
	$('#property_town').empty();
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
				$( '#property_town' ).html( json );
				$( '.selectpicker' ).selectpicker( 'refresh' );
				loadPhases();
			}
		});
	}
}
$( '#property_city' ).change( function () {
	loadTowns1();
	$('#property_phase').empty();
	$('#property_block').empty();

});
$( '#property_town' ).change( function () {
	$('#property_block').empty();
	loadPhases1();
});
$( '#property_phase' ).change( function () {
	loadBlocks1();
});
	
// 	Image Loader
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
$( '#file-1' ).click( function () {
			$( '.multi-files-uploader .fileinput-remove' ).trigger( 'click' );
		} );
		
		
			$('form').on('reset', function() {
		var _this = this;
		setTimeout(function() {
			$('.selectpicker',_this).selectpicker('refresh');
			$('.multi-files-uploader .fileinput-remove').trigger( 'click' );
		});
	});
	
	// Add property 
        $('.last-radio-btn').click( function () {
		$( '.show-checkbox' ).fadeIn();
	});
	$('.radio-btn').click( function () {
		$( '.show-checkbox' ).fadeOut();
	});
</script>
     @endsection