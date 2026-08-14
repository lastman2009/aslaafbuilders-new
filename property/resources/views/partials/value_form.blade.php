
<!-- fileinput New Plugin CSS -->
        <link href="https://beta.rightdeed.com/assets_admin/vendors/fileinput/css/fileinput.css" rel="stylesheet" type="text/css"/>
        <link href="https://beta.rightdeed.com/assets_admin/vendors/fileinput/themes/explorer/theme.css" rel="stylesheet" type="text/css"/>
        <style>

ul{
    list-style:none;
}
.extra-select{
	height: 45px;
	padding:0px;
}
.extra-select [type="checkbox"]:not(:checked) + label::after, .extra-select [type="checkbox"]:checked + label::after {
    content: '✔';
    position: absolute;
    top: 0;
    left: 4px;
    font-size: 26px;
    line-height: 0.8;
    transition: all .2s;
}
.extra-select [type="checkbox"]:not(:checked) + label::before, .extra-select [type="checkbox"]:checked + label::before {
    content: '';
    position: absolute;
    left: 0;
    top: 4px;
    width: 1.50em;
    height: 1.50em;
    background: transparent;
    border-radius: 0;
    box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
    border: 1px solid #fff;
}
.extra-select [type="checkbox"]:not(:checked) + label, .extra-select [type="checkbox"]:checked + label {
    padding-left: 35px;
}
.extra-select li {
    font-size: 14px;
}

/* Base for label styling */
.profile-information [type="checkbox"]:not(:checked),
.profile-information [type="checkbox"]:checked {
    position: absolute;
    left: -9999px;
}
.profile-information [type="checkbox"]:not(:checked) + label,
.profile-information [type="checkbox"]:checked + label {
    position: relative;
    padding-left: 1.95em;
    cursor: pointer;
}

/* checkbox aspect */
.profile-information [type="checkbox"]:not(:checked) + label:before,
.profile-information [type="checkbox"]:checked + label:before {
    content: '';
    position: absolute;
    left: 0; top: 0;
    width: 1.25em; height: 1.25em;
    background: transparent;
    border-radius: 4px;
    box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
}
/* checked mark aspect */
.profile-information [type="checkbox"]:not(:checked) + label:after,
.profile-information [type="checkbox"]:checked + label:after {
    content: '✔';
    position: absolute;
    top: -3px;
    left: 4px;
    font-size: 26px;
    line-height: 0.8;
    transition: all .2s;
}
/* checked mark aspect changes */
.profile-information [type="checkbox"]:not(:checked) + label:after {
    opacity: 0;
    transform: scale(0);
}
.profile-information [type="checkbox"]:checked + label:after {
    opacity: 1;
    transform: scale(1);
}
/* disabled checkbox */
.profile-information [type="checkbox"]:disabled:not(:checked) + label:before,
.profile-information [type="checkbox"]:disabled:checked + label:before {
    box-shadow: none;
    border-color: #bbb;
    background-color: #ddd;
}
.profile-information [type="checkbox"]:disabled:checked + label:after {
    color: #999;
}
.profile-information [type="checkbox"]:disabled + label {
    color: #aaa;
}
/* accessibility */
.profile-information [type="checkbox"]:checked:focus + label:before,
.profile-information [type="checkbox"]:not(:checked):focus + label:before {
}


            
        </style>
<div class="container">
        <div class="row">
            <div class="col-md-12 banner-content">
                <div class="banner-icons no-padding">
                    @if(Auth::user() == "")
                    <a  href="javascript:void(0)" data-toggle="modal" data-target="#loginModal" data-toggle="tooltip" title="Add Property" data-placement="right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    @else
                    <a  href="javascript:void(0)" data-toggle="tooltip" id="add_Property" title="Add Property" data-placement="right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    @endif
                    <a href="javascript:void(0)" id="evaluateProperty" class="evaluate-property" data-toggle="tooltip" data-placement="right" title="Value Property"><i class="fa fa-dollar" aria-hidden="true"></i><span class="label label-success">Value Property</span></a>
                </div>
                <div class="evaluateProperty evaluate_Property col-md-4 card ">
                <div class="close-icon">
        <span class="fa fa-close"  onclick="closeValueProp()"></span>
</div>
                    <form class="form-horizontal" id="value_form">
                         {{ csrf_field() }}
                        <div class="form-group text-center content-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <h2>Value Property</h2>
                                <p>If you want to know about your property
                                    assessment, fill the form given below</p>
                                <p>OR</p>
                                <p>Call Us: +92 324 1800 633</p>
                            </div>
                        </div>
                        <div class="form-group radio-group">
                            <div class="col-sm-12 text-center">
                                <div class="radio-item">
                                     <input value="plot" type="radio" id="ritema" name="property_type" checked>
                                    <label for="ritema">Plot</label>
                                </div>
                                <div class="radio-item">
                                    <input value="house" id="ritemb" type="radio" name="property_type">
                                    <label for="ritemb">House</label>
                                </div>
                                <div class="radio-item">
                                    <input value="files" id="ritemc" type="radio" name="property_type">
                                    <label for="ritemc">Files</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-3 pr control-label text-left">Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 pr control-label text-left"><span class="primary-color">Phone:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="phone" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 pr control-label text-left"><span class="primary-color">Address:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="property_address" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 pr control-label text-left"><span class="primary-color">Message:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" cols="10" rows="5" charswidth="23" name="message" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6 text-center">
                                <button type="submit" class="btn " id="value_form_submit">Submit</button>
                            </div>
                        </div>
                        <p class="text-center text-success success_message" style="display:none;">Submit</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    			<select name="property_type_id" id="property_type" class="selectpicker property_type_extra_feature form-control" data-style="form-control btn-font btn-default btn-outline" title="---- Nothing Selected ----" required data-size="10">
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
                    		     <a href="javascript:void(0)" class="btn control-form" style="width:100%;background-color: rgb(255, 122, 6);display:none ;color: white;" id="extraFeature"  ><i class="fa fa-plus"></i> Extra Features</a>
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
                    <div class="col-md-12 col-md-12 col-sm-12 property-extra-section" style="display: none;" id="extra-feature-tab">
                	    <h1 class="section-heading"><i class="fa fa-edit" aria-hidden="true"></i> Extra Features</h1>
	                    <div class="row extra-feature">
                    	<div class="col-md-4 ">
							<div class="form-group">
								<label class="property_label" for="email_de">flooring:</label>
								<select name="flooring[]" class="selectpicker form-control"  data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
									<option value="tiles">Tiles</option>
									<option value="marble">Marble</option>
									<option value="wooden">Wooden</option>
									<option value="chip">Chip</option>
									<option value="cement">Cement</option>
									<option value="epoxy">Epoxy</option>
								</select>
							</div>
						</div>
                    	<div class="col-md-4 ">
                    									<div class="form-group">
                    										<label class="property_label" for="email_de">electricity backup:</label>
                    										<select name="electricity_backup[]" class="selectpicker form-control"  data-style="form-control btn-font btn-default btn-outline" title="---- nothing slected ----" multiple>
                    											<!-- <option value="">Electricity Backup</option> -->
                    											<option value="UPS">UPS</option>
                    											<option value="Generator">Generator</option>
                    											<option value="Solar">Solar</option>
                    
                    										</select>
                    
                    									</div>
                    								</div>
                    {{-- 	<div class="col-md-4 ">
                         <div class="form-group">
                    <label class="property_label" for="email_de">number of floors:</label>
                    <input type="number" id="" name="total_floor" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1"/>
                    </div>
                             </div> --}}
                    <div class="col-md-4 ">
                    	<div class="form-group quantity">
                    		<label class="property_label" for="email_de">parking space:</label>
                    		<input type="number" id="" class="form-control" name="parking_space" min="1" max="50" step="1" value="" onkeypress="return event.charCode >= 48"  placeholder=""/>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby banks:</label>
                    		<input type="text" id="" class="form-control" name="near_bank" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby schools:</label>
                    		<input type="text" id="" class="form-control" name="near_school" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby hospitals:</label>
                    		<input type="text" id="" class="form-control" name="near_hospital" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby shopping malls:</label>
                    		<input type="text" id="" class="form-control" name="near_shopping_mall" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby restaurants:</label>
                    		<input type="text" id="" class="form-control" name="near_restaurant" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">distance from airport (kms):</label>
                    		<input type="number" id="" class="form-control" name="distance_airport" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    {{-- <div class="col-md-6 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby public transport:</label>
                    		<input type="text" id="" name="near_transport" value="" placeholder="" class="form-control">
                    	</div>
                    </div> --}}
                    <div class="col-md-4  residential commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">servant quarters:</label>
                    		<input type="number" id="" name="servant_quarter" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">drawing rooms:</label>
                    		<input type="number" id="" name="drawing_room" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">dinning room:</label>
                    		<input type="number" id="" name="dinning_room" class="form-control" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">Kitchens:</label>
                    		<input type="number" id="" name="no_of_kitchens" value="" class="form-control" placeholder="" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">Study rooms:</label>
                    		<input type="number" id="" class="form-control" name="study_room" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">prayer rooms:</label>
                    		<input type="number" id="" name="prayer_room" class="form-control" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">dressing rooms:</label>
                    		<input type="number" id="" name="powder_room" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4  residential">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">gym rooms:</label>
                    		<input type="number" id="" name="gym" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">store rooms:</label>
                    		<input type="number" id="" name="no_of_store_room" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">lounge of sitting rooms:</label>
                    		<input type="number" id="" name="lounge" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<label class="property_label" for="email_de">laundry rooms:</label>
                    		<input type="number" id="" name="laundry_room" value="" placeholder="" class="form-control" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">Other Facilities:</label>
                    		<input type="text" id="" name="other_facilities" class="form-control" value="" placeholder="">
                    	</div>
                    </div>
                    <div class="col-md-6 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">distance from railway station (kms):</label>
                    		<input type="number" id="" name="distance_railway" class="form-control" value="" placeholder="" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-6 padding-left residential plot commercial">
                    	<div class="form-group">
                    		<label class="property_label" for="email_de">nearby water filteration plants:</label>
                    		<input type="number" id="" name="near_water_filter" value="" class="form-control" placeholder="" onkeypress="return event.charCode >= 48" min="1">
                    	</div>
                    </div>
                    <div class="col-md-12 row">
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="double_glazed_window" type="checkbox" value="1" id="double-glazed-window"/>
                    				<label for="double-glazed-window">Double Glazed Window</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="central_ac" type="checkbox" id="air-conditioning" value="1"/>
                    				<label for="air-conditioning">Central Air Conditioning</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="central_heating" type="checkbox" id="central-heating" value="1"/>
                    				<label for="central-heating">Central Heating</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="waste_disposal" type="checkbox" id="waste-disposal" value="1" />
                    				<label for="waste-disposal">Waste Disposal</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="furnished" type="checkbox" id="furnished" value="1"/>
                    				<label for="furnished">Furnished</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="internet" type="checkbox" id="internet" value="1"/>
                    				<label for="internet" >Broadband Internet Access</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="cabel_tv" type="checkbox" id="satelite" value="1"/>
                    				<label for="satelite">Satellite or Cable TV Ready</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="intercom" type="checkbox" id="intercom" value="1"/>
                    				<label for="intercom">Intercom</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="swimming_pool" type="checkbox" value="1" id="swimming-pool"/>
                    				<label for="swimming-pool">Swimming Pool</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="sauna" type="checkbox" id="sauna" value="1"/>
                    				<label for="sauna">Sauna</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4  residential">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="jacuzzi" type="checkbox" id="jacuzzi" value="1"/>
                    				<label for="jacuzzi">Jacuzzi</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="maintenance" type="checkbox" id="maintenance-staff" value="1"/>
                    				<label for="maintenance-staff">Maintenance Staff</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="security" type="checkbox" id="security-staff" value="1"/>
                    				<label for="security-staff">Security Staff</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                	<div class="col-md-4 ">
                    		<div class="form-group ">
                    			<ul class="profile-information extra-select">
                    				<li>
                    					<input name="lawn" type="checkbox" id="lawn" value="1"/>
                    					<label for="lawn">lawn</label>
                    				</li>
                    			</ul>
                    		</div>
                    	</div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="community_club" type="checkbox" id="community_club" value="1"/>
                    				<label for="community_club">Community Club</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input type="checkbox" id="community_center" value="1" name="community_center" />
                    				<label for="community_center">Community Center</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4  residential">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input type="checkbox" id="disabled" value="1" name="facility_disabled" />
                    				<label for="disabled" >Facilities for Disabled</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4  residential">	
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="elevator" type="checkbox" id="elevator" value="1"/>
                    				<label for="elevator">Services Elevators</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4  residential">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="conference_room" type="checkbox" id="conference-room" value="1"/>
                    				<label for="conference-room">Conference Room</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 ">
                    	<div class="form-group ">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="visitor_parking" type="checkbox" id="visitor-parking" value="1"/>
                    				<label for="visitor-parking">Visitor Parking</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="ground" type="checkbox" id="ground" value="1" />
                    				<label for="ground">Ground</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="gas" type="checkbox" id="gas" value="1" />
                    				<label for="gas">Gas</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="wide_carpeted_roads" type="checkbox" id="wide_carpeted_roads" value="1" />
                    				<label for="wide_carpeted_roads">Carpeted Road</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="wide_roads_with_green_belts" type="checkbox" id="wide_roads_with_green_belts" value="1" />
                    				<label for="wide_roads_with_green_belts">Green Belt </label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="dancing_fountain" type="checkbox" id="dancing_fountain" value="1" />
                    				<label for="dancing_fountain">Dancing Fountain </label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="fitness_center" type="checkbox" id="fitness_center" value="1" />
                    				<label for="fitness_center">Fitness Center</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="tv_cable_network" type="checkbox" id="tv_cable_network" value="1" />
                    				<label for="tv_cable_network">Tv Cable Network</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="underground_sewerage_system" type="checkbox" id="underground_sewerage_system" value="1" />
                    				<label for="underground_sewerage_system">Underground Sewerage System</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="underground_electricity_supply" type="checkbox" id="underground_electricity_supply" value="1" />
                    				<label for="underground_electricity_supply">Underground Electricity</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="underground_plumbing" type="checkbox" id="underground_plumbing" value="1" />
                    				<label for="underground_plumbing">Underground Plumbing</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="underground_water_supply" type="checkbox" id="underground_water_supply" value="1" />
                    				<label for="underground_water_supply">Underground Water Supply</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="security_service" type="checkbox" id="security_service" value="1" />
                    				<label for="security_service">Security Service</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="zoo" type="checkbox" id="zoo" value="1" />
                    				<label for="zoo">Zoo</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="gated_community" type="checkbox" id="gated_community" value="1" />
                    				<label for="gated_community">Gated Community</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="car_rental_service" type="checkbox" id="car_rental_service" value="1" />
                    				<label for="car_rental_service">Car Rent Service</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="parks" type="checkbox" id="park" value="1" />
                    				<label for="park">Park</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="commercial_center" type="checkbox" id="commercial_center" value="1" />
                    				<label for="commercial_center">Commercial Center</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    
                    <div class="col-md-4 padding-left residential commercial">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="boundary_wall" type="checkbox" id="boundary_wall" value="1" />
                    				<label for="boundary_wall">Boundary Wall</label>
                    			</li>
                    		</ul>
                    	</div>
                    </div>
                    <div class="col-md-4 padding-left">
                    	<div class="form-group">
                    		<ul class="profile-information extra-select">
                    			<li>
                    				<input name="mosques" type="checkbox" id="mosques" value="1" />
                    				<label for="mosques">Mosques</label>
                    			</li>
                    		</ul>
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
    <script>
    $('[data-toggle="tooltip"]').tooltip(); 
        $('#value_form_submit').click(function(e){
            e.preventDefault();
            $.ajax({
                url:'/propertyValueAssessment',
                dataType :'json',
                method :'post',
                data:$('#value_form').serialize(),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success:function(e){
                    $('#value_form')[0].reset();
                    $('.success_message').show('slow').fadeOut(3000);
                }
            })
        });
        
        // Add property 
        $('.last-radio-btn').click( function () {
		$( '.show-checkbox' ).fadeIn();
	});
	$('.radio-btn').click( function () {
		$( '.show-checkbox' ).fadeOut();
	});
        
        
        
    </script>
    <!-- fileinput New Plugin JavaScript -->
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/plugins/sortable.js" ></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/fileinput.js" ></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/locales/fr.js" ></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/js/locales/es.js" ></script>
<script type="text/javascript" src="https://beta.rightdeed.com/assets_admin/vendors/fileinput/themes/explorer/theme.js" ></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyABd9pcDqbIv-Ol89DtKj7HjtEyk6R5irk&v=3.exp&sensor=false&libraries=places" ></script>
<script src="/assets_admin/dist/js/locationPicker.js" ></script>
    <script defer type="text/javascript">
    
    	$('.property_type_extra_feature').change(function(){
    	    $('#extraFeature').show();
    	});
    $('#extraFeature').click(function() {
         $('#extra-feature-tab').toggle('slow');
         if($("#extra-feature-tab").css('display') == 'block'){
            
       $('.add_Property').animate({
      scrollTop: $("#extra-feature-tab").offset().top
    }, 1000)
        }
       
     
       // $('#target2').hide();
   });
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
</script>
    @endsection