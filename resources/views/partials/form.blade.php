<link rel="stylesheet" href="{{asset('/assets/css-new/jquery.auto-complete.css')}}">
<form action="/property" method="get">
	<div class="col-md-8 col-md-offset-2 no-padding search-area">
   <?php  $purposes =['1'=>'Buy','2'=>'Rent','3'=>'Wanted' ,'4' =>'Project']; ?>
   <div class="text-right status-field no-padding">
     <select class="selectpicker search_city" id="city_id" name="city_id_new"  data-size="10">
       @foreach($cities as $city)
       <option value="{{ $city->id }}">{{$city->name}}</option>
       @endforeach
     </select>
   </div>
   <div class="search-property">
     <div class="input-address ui-widget">	

      <input type="text"  placeholder="Title, keyword, address or property id ..." name="address" id="search_input" autofocus>
    </div>
    <div class="ui-widget input-results-wrapper">
     Result:
     <div id="log" class="ui-widget-content input-search-results"></div>
   </div>
   <div class="searchand-advance">
    <a  href="javascript:void(0)" class="advance-search-btn"><i class="fa fa-cog" aria-hidden="true"></i> <span class="advance-search-text"> Advance</span></a>

    <button type="submit" class="btn btn-info">
     <span class="fa fa-search"></span> <span class="search-btn-text"> Search Properties</span>
   </button>
 </div>
</div>
</div>
<div class="col-md-8 no-padding col-md-offset-2 advance-search-content">
  <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                    <div class="col-md-3">
                        <?php  $purposes =['1'=>'Buy','2'=>'Rent','3'=>'Wanted' ,'4' =>'Project']; ?>
                        <select class="selectpicker" name="search_purpose" data-width="100%" title="Property Purpose" data-live-search="true">
                            @foreach($purposes as $key => $value)
                         <option value="{{$key}}">{{$value}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:void(0)" id="priceRangeResult" class="price-range-result">Price <span class="caret"></span></a>
                        <div class="price-range-selector">
                            <span class="close-price"><i class="fa fa-times-circle"></i></span>
                            <div id="price-range-slider" class="price-filter-range" name="rangeInput"></div>
                            <div class="form-group col-md-6 range-min no-padding">
                                <label>Min</label>
                                <input type="number" min=0 max="99000000" name="min_price" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field form-control" />
                            </div>
                            <div class="form-group col-md-6 range-max no-padding">
                                <label>Max</label>
                                <input type="number" min=0 max="100000000" name="max_price"  oninput="validity.valid||(value='10000000');" id="max_price" class="price-range-field form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)" id="areaResult" class="area-result">Area <span class="caret"></span></a>
                        <div class="area-range-selector">
                            <span class="close-area"><i class="fa fa-times-circle"></i></span>

                            <div id="area-range-slider" class="area-filter-range" name="rangeInput2"></div>
                            <div class="form-group col-md-6 range-min no-padding">
                                <label>Min</label>
                                <input type="number" min=0 max="99" oninput="validity.valid||(value='0');" id="min_area"  name="min_area" class="area-range-field form-control" />
                            </div>
                            <div class="form-group col-md-6 range-max no-padding">
                                <label>Max</label>
                                <input type="number" min=0 max="100" oninput="validity.valid||(value='100');" id="max_area"  name="max_area" class="area-range-field form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <select class="selectpicker" data-width="100%" title="Beds">
                            <?php $bed_rooms =['1','2','3','4','5','6','7','8','9','10']?>
                            @foreach($bed_rooms as $room)
                            <option value="{{$room}}">{{$room}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
</div>
</form>

@section('form_search_script')
<script> 
    $(function() {
        
        
    // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
    //             $('.selectpicker').selectpicker('mobile');
    //         }
    //         else {
    //             $('.selectpicker').selectpicker({});
    //         }
    
        
     function log( message ) {
       $( "<div>" ).text( message ).prependTo( "#log" );
       $( "#log" ).scrollTop( 0 );
     }
     city = $('#city_id').val();
       $( "#search_input" ).autocomplete({
         source: function( request, response ) {
           $.ajax({
            url: '/search_home',
            type: 'post',
            dataType: "json",
            data:{
             city_id : $('#city_id').val(),
             search : $('#search_input').val(),
             '_token':$('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                  var address = [];
                  for (i = 0; i < result.length; i++) {
                   address[i] = result[i].address;
                     }
                     response( address );
                     console.log(address);
                   }
                 });
         },
         minLength: 3,
         select: function( event, ui ) {
           log( ui.item ?
             "Selected: " + ui.item.label :
             "Nothing selected, input was " + this.value);
         },
         open: function() {
           $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
         },
         close: function() {
           $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
         }
       });
     });
     
     $("#down-to-property").click(function () {
		$('html, body').animate({
			scrollTop: $(".featured-prop-sect").offset().top
		}, 1500);
	});

    </script>
    <script type="text/javascript" src="{{asset('assets/js-new/jquery.auto-complete.js')}}"></script>
@endsection



