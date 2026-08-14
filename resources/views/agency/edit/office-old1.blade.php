@php
$title = "Office Edit -$office->address";
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
                        <div class="form-wrap">
                            <form action="/editOffice/{{$office->id}}"  method="post" class="form-horizontal ">
                            
                               {{ csrf_field()}}
                                <h2 class="mb-20">Edit Contact Detail.1</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-body form-edit">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Phone Number</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="telephone" value="{{$office->telephone}}" placeholder="Phone number"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
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
                                                                <input type="email" class="form-control" name="email" value="{{$office->email}}" placeholder="Email" required>
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
                                                                <input type="text" class="form-control" name="fb_link" value="{{$office->fb_link}}" placeholder="Fb link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label gplus-profile col-md-3 col-sm-12">Google Plus</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="google_link" value="{{$office->google_link}}" placeholder="Google link">
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
                                        <h2 class="mt-40 mb-20">Edit Office Address.</h2>
                                        <div class="col-lg-12 col-sm-12 padding-left">
                                            <div class="form-body edit-profile-body form-edit bg-none">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Phone Num</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="mobile_no" value="{{$office->mobile_no}}" placeholder="Mobile No"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
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
                                                                <input type="text" class="form-control" name="uan_number" value="{{$office->uan_number}}" placeholder="UAN number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Address</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="address" value="{{$office->address}}" placeholder="Address ">
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
                                                                        @if($office->city_id == $city->id)
                                                                    <option value="{{ $city->id }}" selected>{{$city->name}}</option>
                                                                    @else
                                                                    <option value="{{ $city->id }}">{{$city->name}}</option>

                                                                    @endif                        
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
                                                    <label class="control-label mb-10" for="email_de">Search Map Location:</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input id="address5" type="text" value="Pakistan, Lahore " class="form-control input-sm" autocomplete="off"  required="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 marginbot10 gmap-locator">
                                                        <div id="locationpicker" class="gmap-frame">
                                                            <!-- Location picker handled with js  -->
                                                        </div>
                                                        <div style="text-indent: -999999999999999px;position: absolute;">
                                                        
                                                            <input type="text" id="latitude" name="latitude" value="{{$office->lat}}" class="" readonly>
                            
                                                            <input type="text" id="longitude" name="longitude" class="" value="{{$office->lng}}" readonly>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <button class="btn-submit-agencycontact btn btn-default"><span class="mr-15">Edit & continue</span> <i class="fa fa-plus"></i> </button>
                                         
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
   
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&sensor=false&libraries=places"></script>
<script type="text/javascript" src="{{asset('assets_admin/dist/js/locationPicker.js')}}"></script>


<script>
  var inital_lat = "{{$office->lat}}"; /*lahore pakistan*/
var inital_lng = "{{$office->lng}}";
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
                $( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' ).prop( 'disabled', true );
                $( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' ).prop( 'disabled', true );
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
                $( "#latitude" ).val( results[ 0 ].geometry.location.lat() ).removeAttr( "disabled" ).trigger( 'focus' ).prop( 'disabled', true );
                $( "#longitude" ).val( results[ 0 ].geometry.location.lng() ).removeAttr( "disabled" ).trigger( 'focus' ).prop( 'disabled', true );
                $("#address5").val($('#town option:selected').text().trim()+', '+$('#city option:selected').text().trim()+', Pakistan');
            } else {
                alert( "Something got wrong " + status );
            }
        });
    });
    
</script>