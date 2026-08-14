@php
$title = "Office Add";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40 agency-contact-page">

                    <div class="col-md-12 padding-left padding-right">
                        
                        <div class="row">
                            <div class="col-lg-12 padding-right">
                            @foreach($offices  as $office)
                                <div class="col-md-4 col-sm-12 padding-left">
                                    <div class="panel panel-default card-view add-staff-portion">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <a href="#" class="trash" data-id="{{$office->id}}"><i class="fa fa-trash" ></i></a>
                                                <a href="/editOffice/{{App\AgencyWebsite::getId($office->id)}}"><i class="fa fa fa-pencil-square-o"></i></a>
                                                <ul>
                                                    <li><span class="lable">Phone Number: </span><span class="value">{{$office->telephone}}</span></li>
                                                    <li><span class="lable">Email Address: </span><span class="value">{{$office->email}}</span></li>
                                                    <li><span class="lable">Address: </span><span class="value">{{$office->address}}</span></li>
                                                    <li><span class="lable">City: </span><span class="value">
                                                    @foreach($cities as $city)
                                                    @if($city->id == $office->city_id)
                                                        {{$city->name}}
                                                    @endif
                                                    @endforeach

                                                    </span></li>

                        
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                        
                        
                        <div class="form-wrap">
                            <form action="/addOffice/{{$id}}"  method="post" class="form-horizontal ">
                            
                               {{ csrf_field()}}
                                <h2 class="mb-20">Contact Detail.</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-body form-edit">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Phone Number</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="telephone" value="" placeholder="Phone No"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'  required>
                                                                  @if ($errors->has('telephone'))
                                                            <div class="error" style="color: red">{{ $errors->first('telephone') }}</div>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Email</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
                                                                @if ($errors->has('email'))
                                                            <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            

                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label fb-profile col-md-3 col-sm-12">Facebook Link</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="fb_link" value="" placeholder="Facebook link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label gplus-profile col-md-3 col-sm-12">Google Plus</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="google_link" value="" placeholder="Google plus">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="col-lg-12 padding-right">
                                        <h2 class="mt-40 mb-20">Office Address.</h2>
                                        <div class="col-lg-12 col-sm-12 padding-left">
                                            <div class="form-body edit-profile-body form-edit bg-none">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Mobile Number</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="mobile_no" value="" placeholder="Mobile number"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                                                                  @if ($errors->has('mobile_no'))
                                                            <div class="error" style="color: red">{{ $errors->first('mobile_no') }}</div>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">UAN Number</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="uan_number" value="" placeholder="UAN number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Address</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="address" value="" placeholder="Adress" required>
                                                                 @if ($errors->has('address'))
                                                            <div class="error" style="color: red">{{ $errors->first('address') }}</div>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">City</label>
                                                                <select class="col-md-9 col-sm-12 padding-right padding-left agency-cityname selectpicker" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--" required>
                                                                    @foreach($cities as $city)
                                                                        
                                                                    <option value="{{ $city->id }}">{{$city->name}}</option>                        
                                                                    @endforeach
                                                                </select>
                                                                   @if ($errors->has('city_id'))
                                                                <div class="error" style="color: red">{{ $errors->first('city_id') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12 padding-left">
                                <label class="control-label mb-10" for="email_de" style="width: 25.3%;">Search Map Location:</label>
                                <div class="row">
                                    <div class="col-sm-12 input-group" style="padding-left:15px;">
                                        <input id="address5" type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete="off"  required="" placeholder="">
                                        <div class="input-group-addon" style="padding-left: 20px;padding-right: 20px;background: #323334;"><i class="fa fa-search"></i></div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-12 marginbot10 gmap-locator" style="width: 101.2%;margin-top:5px;">-->
                                <!--    <div id="locationpicker" class="gmap-frame">-->
                                        <!-- Location picker handled with js  -->
                                <!--    </div>-->
                                <!--    <div>-->
                                <!--        <label for="">Latitude</label>-->
                                <!--        <input type="text" id="latitude" name="latitude" class="" readonly>-->
                                <!--        <label for="">Longitude</label>-->
                                <!--        <input type="text" id="longitude" name="longitude" class="" readonly>-->
                                <!--    </div>-->
                                <!--</div>-->
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
                                            
<button class="btn-submit-agencycontact btn btn-default" name="action" value="more" ><span class="mr-15">Add More Office</span> <i class="fa fa-plus"></i> </button>




<button class="btn btn-submit-webinfo btn-anim" name="action" value="save"><i class="fa fa-paper-plane"></i><span class="btn-text">Save &amp; Continue</span></button>
</div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    @include( 'includes_admin.footer' )
    <script type="text/javascript">
        $('.trash').click(function(e){
            e.preventDefault();
            current =$(this);
           id =$(this).data('id'); 
           url ="/deleteOffice/"+id;
            if (confirm('Are you sure you want to delete this Image?')) {
                $.ajax( {
                        url: url,
                        datatype: 'json',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                        },
                        success: function (e) {
                        current.parent().parent().parent().parent().remove();
                        }

                    } );
            }
        });
    </script>
   <script src="https://maps.google.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="{{asset('assets_admin/dist/js/locationPicker.js')}}"></script>


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
    
</script>
