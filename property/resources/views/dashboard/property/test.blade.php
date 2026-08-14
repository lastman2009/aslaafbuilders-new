@include( 'includes_admin.header' )
@include( 'includes_admin.sidebar' )


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"    >
            <div class="col-lg-12 col-sm-12">
                <div class="tab-struct custom-tab-2 mt-40">
                    <div class="tab-content">

                        <form action="/addproperty" method="POST" enctype="multipart/form-data">
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
                                                                    <input type="radio" id="a25" class="radio-btn" name="purpose" value="1" checked="checked" />
                                                                    <label for="a25">For Sale</label>
                                                                </li>   
                                                                <li>
                                                                    <input type="radio" class="radio-btn" id="a50" name="purpose" value="2" />
                                                                    <label for="a50">For Rent</label>
                                                                </li>
                                                                <li>
                                                                    <input type="radio" id="a75" name="purpose" class="last-radio-btn" value="3" />
                                                                    <label for="a75">Wanted</label>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content" id="property_tabcontent">
                                                                <div id="wanted_property" class="tab-pane fade active in" role="tabpanel">

                                                                    <div class="row" style="min-height: 65px">
                                                                        <div class="col-md-12 padding-right show-checkbox" style="display: none;">
                                                                            <div class="col-md-12 padding-left">
                                                                                <ul class="propertytypelist">
                                                                                    <li>
                                                                                        <input name="wanted_rent" type="checkbox" id="wanted-rent"/>
                                                                                        <label for="wanted-rent">Rent</label>
                                                                                    </li>
                                                                                    <li>
                                                                                        <input name="wanted_buy" type="checkbox" id="wanted-buy"/>
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
                                                                                    <select name="property_type_id" class="cascade selectpicker" data-style="form-control btn-font btn-default btn-outline" title=" Select Property Type" required>
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
                                                                            </div>
                                                                            <div class="col-md-6 padding-left">
                                                                                <div class="form-group">
                                                                                    <input type="number" id="" name="area" value="" placeholder="Land Area"  onkeypress="return event.charCode >= 48" min="1"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 padding-left">
                                                                                <div class="form-group">
                                                                                    <select name="area_type" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="Select Area Type" required>
                                                                                        
                                                                                        <option value="Square Feet">Square Feet</option>
                                                                                        <option value="Square Yards">Square Yards</option>
                                                                                        <option value="Square Meters">Square Meters</option>
                                                                                        <option value="Marla">Marla</option>
                                                                                        <option value="Kanal">Kanal</option>
                                                                                        <option value="Acre">Acre</option>
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
                                                                            <select name="Flooring[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline"
                                                                            title="Flooring" multiple>
                                                                                <option value="tiles">Tiles</option>
                                                                                <option value="marble">Marble</option>
                                                                                <option value="wooden">Wooden</option>
                                                                                <option value="chip">Chip</option>
                                                                                <option value="cement">Cement</option>
                                                                                <option value="epoxy">Epoxy</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <select name="electricity_backup[]" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" title="Electriity Backup" multiple>
                                                                                <!-- <option value="">Electricity Backup</option> -->
                                                                                <option value="UPS">UPS</option>
                                                                                <option value="Generator">Generator</option>
                                                                                <option value="Solar">Solar</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="parking_space" value="" placeholder="Parking Spaces"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="" name="near_bank" value="" placeholder="Nearby Banks">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="" name="near_school" value="" placeholder="Nearby Schools">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="" name="near_hospital" value="" placeholder="Nearby Hospitals">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="" name="near_shopping_mall" value="" placeholder="Nearby Shopping Malls">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="" name="near_restaurant" value="" placeholder="Nearby Restaurants">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="distance_airport" value="" placeholder="Distance from Airport (kms)">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="distance_railway" value="" placeholder="Distance from Railway Station (kms)">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="near_water_filter" value="" placeholder="Nearby Water Filtration Plant">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="" name="near_public_transport" value="" placeholder="Nearby Public Transport Service">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="servant_quarter" value="" placeholder="Number of Servant Quaters">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="" value="" placeholder="Drawing Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="drawing_room" value="" placeholder="Dinning Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="no_of_kitchens" value="" placeholder="Number of Kitchens">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="study_room" value="" placeholder="Study Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="prayer_room" value="" placeholder="Prayer Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="powder_room" value="" placeholder="Powder Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="gym" value="" placeholder="Gym Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="no_of_store_room" value="" placeholder="Number of Store Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="lounge" value="" placeholder="Lounge of Sitting Room">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <input type="number" id="" name="laundry_room" value="" placeholder="Laundry Room">
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
                                                                                    <input name="double_glazed_window" type="checkbox" id="double-glazed-window"/>
                                                                                    <label for="double-glazed-window">Double Glazed Window</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="central_ac" type="checkbox" id="air-conditioning"/>
                                                                                    <label for="air-conditioning">Central Air Conditioning</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="central_heating" type="checkbox" id="central-heating"/>
                                                                                    <label for="central-heating">Central Heating</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="waste_disposal" type="checkbox" id="waste-disposal"/>
                                                                                    <label for="waste-disposal">Waste Disposal</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="furnished" type="checkbox" id="furnished"/>
                                                                                    <label for="furnished">Furnished</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="internet" type="checkbox" id="internet"/>
                                                                                    <label  for="internet">Broadband Internet Access</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="cabel_tv" type="checkbox" id="satelite"/>
                                                                                    <label for="satelite">Satellite or Cable TV Ready</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="intercom" type="checkbox" id="intercom"/>
                                                                                    <label for="intercom">Intercom</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="swimming_pool" type="checkbox" id="swimming-pool"/>
                                                                                    <label for="swimming-pool">Swimming Pool</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="sauna" type="checkbox" id="sauna"/>
                                                                                    <label for="sauna">Sauna</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="jacuzzi" type="checkbox" id="jacuzzi"/>
                                                                                    <label for="jacuzzi">Jacuzzi</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="maintenance" type="checkbox" id="maintenance-staff"/>
                                                                                    <label for="maintenance-staff">Maintenance Staff</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="security" type="checkbox" id="security-staff"/>
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
                                                                                    <input name="elevator" type="checkbox" id="elevator"/>
                                                                                    <label for="elevator">Services Elevators</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="conference_room" type="checkbox" id="conference-room"/>
                                                                                    <label for="conference-room">Conference Room</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 load-features padding-left">
                                                                        <div class="form-group">
                                                                            <ul class="profile-information extra-select">
                                                                                <li>
                                                                                    <input name="visitor_parking" type="checkbox" id="visitor-parking"/>
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
                                                                            <input type="text" id="" name="other_facilities" value="" placeholder="Other Facilities">
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
                                                <div class="panel panel-default card-view">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <h1>Contact Detail</h1>
                                                            <div class="row">
                                                                <div class="col-md-12 padding-right">
                                                                    <div class="col-md-6 padding-left">
                                                                        <div class="form-group">
                                                                            <select id="yourdropdownid" class="selectpicker" data-style="form-control btn-font btn-default btn-outline" name="clientdata">
                                                                                <option value="user">Myself</option>
                                                                                @foreach($clients as  $client)
                                                                                <option value="{{$client->id}}">{{$client->name}}</option>
                                                                                @endforeach
                                                                                <option value="new">New Client</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="c_name" name="client[name]" value="" placeholder="Contact Person Name"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="c_mobile" name="client[mobile_no]" value="" placeholder="Phone Number"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 padding-left">
                                                                        <div class="form-group">
                                                                            <input type="text" id="c_address" name="client[address]" value="" placeholder="Address"/>
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
                <input type="file" name="video" placeholder="Upload Your Video">
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
                                                                                <button type="button" class="btn btn-youtube"><img src="../../assets_admin/dist/img/youtube-play.png" /></button>
                                                                            </span>

                                                                            <input type="text" id="example-input1-group4" name="youtube_link" class="form-control youtube-link" placeholder="Paste Here Your Youtube Video Link">
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
                                                                    <input type="text" id="" name="title" value="" placeholder="Property Title" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <input type="text" id="mytext" name="price"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="tooltip-color" value="" data-toggle="tooltip" data-placement="top"  title="53 Crore 53 Lakh and 53 Thousand" placeholder="All-inclusive price(PKR)"  required/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 padding-left">
                                                                <div class="form-group">
                                                                    <textarea class="form-control summernote" rows="8" cols="50" name="description" id="" placeholder="Property Description ..."></textarea>
                                                                </div>
                                                            </div>
                                                            <h1>Add Address</h1>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <select  class="selectpicker" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline">
                                                                        
                                                                        <option value="">City</option>
                                                                        @foreach($cities as $city)
                                                                        @if($city->name  == "Lahore")
                                                                        <option value="{{ $city->id }}" selected>{{$city->name}}</option>
                                                                        
                                                                        @else
                                                                        <option value="{{ $city->id }}">{{$city->name}}

                                                                        </option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <select name="town_id" id="town" class="selectpicker townclass" data-style="form-control btn-font btn-default btn-outline">
                                                                    
                                                                    @foreach($towns as $town)
                                                                    <option value="{{ $town->id }}">{{$town->name}}</option>
                                                                    @endforeach
                
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 padding-left">
                                                                <div class="form-group">
                                                                <select name="phase_id" id="phase"  class="selectpicker" data-style="form-control btn-font btn-default btn-outline">                                                            
                                                                    @foreach($phases as $phase)
                                                                    <option value="{{ $phase->id }}">{{$phase->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 padding-left">
                                                                <div class="form-group">
                                                                    <select  name="block_id" id="block" class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
                                                                    
                                                                        @foreach($blocks as $block)
                                                                        <option value="{{ $block->id }}">{{$block->name}}</option>
                                                                        @endforeach
                                                                
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 padding-left">
                                                                <div class="form-group">
                                                                    <input type="text" id="" name="property_no" value="" required placeholder="Property No."/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 padding-left">
                                                                <div class="">
                                                               <label>Search:</label>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input id="address5"  type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete="off" onmousedown="return resetAddress()" required="" placeholder="Enter a location">                                                           
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 marginbot10 gmap-locator">
                                                                <div id="locationpicker" class="gmap-frame">
                                                                    <!-- Location picker handled with js  -->
                                                                </div>
                                                                <div  style="position: absolute; left: -10000%">
                                                                    <input type="text" id="lat"  class="" readonly="readonly" >
                                                                    <input type="text"  id="lng" class="" readonly="readonly" >
                                                                </div>
                                                                <input type="text" name="latitude" id="latitude" class="" readonly="readonly" hidden>
                                                                 <input type="text" name="longitude" id="longitude" class="" readonly="readonly" hidden>


                                                            </div>
                                                            </div>

                                                            <!-- //////new insert -->
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <input type="text" name="expire_date" placeholder="Expiry Date" data-mask="99/99/9999" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <select name="ownership_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
                                                                        <option value="">Ownership Status</option>
                                                                        <option value="Freehold">Freehold</option>
                                                                        <option value="Leasehold">Leasehold</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <select name="occupancy_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
                                                                        <option value="">Occupancy Status</option>
                                                                        <option value="Vacant">Vacant</option>
                                                                        <option value="Occupied">Occupied</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <select name="construction_status" class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
                                                                        <option value="">Construction Status</option>
                                                                        <option value="Complete">Complete</option>
                                                                        <option value="Under Construction">Under Construction</option>
                                                                        <option value="Gray Structure">Gray Structure</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <h3>Basic Feature</h3>

                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <input type="number" id="" name="bed" value="" placeholder="Number of Bed Rooms"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <input type="number" id="" name="bath" value="" placeholder="Number of Bath Rooms"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <select name="construction_year" class="selectpicker" data-style="form-control btn-font btn-default btn-outline">
                                                                        <option value="">Built in Year</option>
                                                                        @for($i =1960; $i<= 2017; $i++)
                                                                        <option value="{{$i}}">{{$i}}</option>
                                                                        @endfor

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 padding-left">
                                                                <div class="form-group">
                                                                    <input type="number" id="" name="total_floor" value="" placeholder="Total Number of Floors"/>
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
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left property-section">
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
    $(".file").fileinput({

uploadUrl: '#', // you must set a valid URL here else you will get an error
allowedFileExtensions: ['jpg', 'png', 'gif'],
overwriteInitial: true,
maxFileSize: 100000,
maxFilesNum: 10,
showRemove: false,
showUpload: false,
showUploadedThumbs: false,
allowedFileTypes: ['image', 'video', 'flash'],
slugCallback: function (filename) {
    return filename.replace('(', '_').replace(']', '_');
}


});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#file-1').click(function(){
            $('.fileinput-remove').trigger('click');
        });
    });

</script>
<script type="text/javascript">
    $("#select1").change(function() {
        if ($(this).data('options') === undefined) {
            /*Taking an array of all options-2 and kind of embedding it on the select1*/
            $(this).data('options', $('#select2 option').clone());
        }
        var id = $(this).val();
        var options = $(this).data('options').filter('[value=' + id + ']');
        $('#select2').html(options);
    });

    $('.last-radio-btn').click(function(){
        $('.show-checkbox').fadeIn();
    });
    $('.radio-btn').click(function(){
        $('.show-checkbox').fadeOut();
    });
</script>
<script>
        $(document).ready(function(){
                

            if($("#yourdropdownid option:selected").text() == "Myself")
            {
                
                $('#c_address').attr("disabled", "true").hide();
                $('#c_mobile').attr("disabled", "true").hide();
                $('#c_name').attr("disabled", "true").hide();

            }
            $("select#yourdropdownid").change(function(){
                
                 if($("#yourdropdownid option:selected").text() == "New Client")
                 {
                    $('#c_address').prop("disabled", false).show();
                    $('#c_mobile').prop("disabled", false).show();
                    $('#c_name').prop("disabled", false).show();
                 }
                 else
                 {
                    $('#c_address').attr("disabled", "true").hide();
                    $('#c_mobile').attr("disabled", "true").hide();
                    $('#c_name').attr("disabled", "true").hide();
                 }
            
            });
            function loadBlocks(){
                phase_id =$('#phase option:selected').val();
                // alert(phase_id);
                $.ajax({
                    url: 'townPhase/'+phase_id,
                    type: 'POST',
                    datatype:'html',
                    data:phase_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        $('#block').html(json); 
                        $('.selectpicker').selectpicker('refresh');
                    }
                });
            }
            function loadPhases(){
                town_id =$('#town option:selected').val();
                $.ajax({
                    url: 'cityTown/'+town_id,
                    type: 'POST',
                    datatype:'html',
                    data:town_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        $('#phase').html(json); 
                        $('.selectpicker').selectpicker('refresh');
                        loadBlocks();
                    }
                });
            }
            function loadTowns(){
                id =$('#city option:selected').val()
                $.ajax({
                    url: 'LocationCity/'+id,
                    type:'POST',
                    datatype:'html',
                    data: id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                    
                        $('#town').html(json);
                        $('.selectpicker').selectpicker('refresh');
                        loadPhases();
                    }
                });
            }
            $('#city').change(function () { 

                loadTowns();
            });
            $('#town').change(function () {
                loadPhases();
            });
            $('#phase').change(function () {
                loadBlocks();
            });             

         });
    </script>
    <!--  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap">
    </script> -->
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&sensor=false&libraries=places"></script>
        <script src="../assets_admin/dist/js/locationPicker.js"></script>

     <script>




                var inital_lat = "31.554397"; /*lahore pakistan*/
                var inital_lng = "74.356078";
                $('#locationpicker').locationpicker({

                    location: {latitude: inital_lat, longitude: inital_lng},    
                    radius: 25,
                    inputBinding: {
                        latitudeInput: $("#lat"),
                        longitudeInput: $("#lng"),
                        locationNameInput: $('#address5')
                    },
                    enableAutocomplete: true,
                    onchanged: function (currentLocation, radius, isMarkerDropped) {
                        var addressComponents = $(this).locationpicker('map').location.addressComponents;
                        updateControls(addressComponents);
                        $("#town option:selected").text(addressComponents.addressLine2);
                    },
                    oninitialized: function(component) {
                        var addressComponents = $(component).locationpicker('map').location.addressComponents;
                        updateControls(addressComponents);
                    }
                });                
                        
            /* address field for map */

            function updateControls(addressComponents) {
                $('#address5').val(addressComponents.addressLine2);
            }


            $('#address5').val("Pakistan, " + $("#city option:selected").text() + " ");
            var readOnlyLength = $('#address5').val().length;
           

            $('#address5').on('click focusin', function () {
                this.value = "Pakistan, " + $("#city option:selected").text() + " ";
        
            
            });

            $('#city').on('change', function () {
                $('#address5').val("Pakistan, " + $("#city option:selected").text() + " ");
                readOnlyLength = $('#address5').val().length;

            });

            $('#address5').on('keypress, keydown', function (event) {
                if ((event.which != 37 && (event.which != 39)) && ((this.selectionStart < readOnlyLength) || ((this.selectionStart == readOnlyLength) && (event.which == 8)))) {
                    return false;
                }
            });
            /* loading location picker  */

            
            $("#city").change(function (e) {
                        // alert($("#city option:selected").text());
                var geocoder =  new google.maps.Geocoder();
                geocoder.geocode( {'address': ""+$("#city option:selected").text()+", Pakistan"}, function(results, status) {
                    
                    if (status == google.maps.GeocoderStatus.OK) {
                    $("#lat").val(results[0].geometry.location.lat()).removeAttr("disabled").trigger('focus').prop('disabled', true);
                    $("#lng").val(results[0].geometry.location.lng()).removeAttr("disabled").trigger('focus').prop('disabled', true);
                      // console.log(latVal);
                        latVal = $("#lat").val();
                        lngVal = $("#lng").val();

                        $('#latitude').attr('value',latVal);
                        $('#longitude').attr('value',lngVal);

                      
                    } else {
                        alert("Something got wrong " + status);
                    }
                });

            });

        </script>
        <script>
            window.onload = function () { 

                var vallat= $('#lat').val();
                var vallng= $('#lng').val();

                $('#latitude').attr('value',vallat);
                $('#longitude').attr('value',vallng);

              

    }
        </script>
      
