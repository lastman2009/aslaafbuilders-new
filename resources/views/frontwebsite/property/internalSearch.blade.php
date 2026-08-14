
@extends('layouts.masterindexNew')
@section('body')

<style type="text/css">
.input-results-wrapper{
  display: none;
}
.ui-autocomplete{
    background-color:white;
    /*position: absolute;*/
    display: block;
    height:200px;
    width: 200px;
    /*overflow: hidden;*/
    overflow-y: auto;
    margin-top:10px;
    padding: 30px;
    z-index: 9999999
}
.ui-autocomplete li{
    list-style-type: none;
    border-bottom: 1px solid #f7f7f7;
    line-height: 30px
}




.price-range ul li, .area-range ul li  {
      background: white;
    color: #1d1c1c;
    cursor: pointer;
    margin: 5px;
    text-align: center;
    padding: 5px;
    border: 1px solid #eeeeee;
}
.price-range ul, .area-range ul {
     padding: 0px;
    height: 200px !important;
    overflow: hidden;
    overflow-y: scroll;
}

.price-range ul li:hover, .area-range ul li:hover{
    background: #eeeeee;
    /*border-top-left-radius: 5px;*/
    /*border-bottom-left-radius: 5px;*/
}
.price-selector-top, .area-selector-top{
        border: 2px solid #eeeeee;
}


.price-showcase, .area-showcase {
    text-align: center;
    font-weight: bold;
    color: black;
    margin-bottom: 10px;
}

.price-selector-top .close-price,.area-selector-top .close-area{
       color: #ff7b06;
}
.price-range-result, .area-result{
    
    margin-top:0px;
    position: relative;
}
.price-range-result .caret,.area-result .caret{
    position: absolute;
    right: 8px;
    top: 15px;
    bottom: -15px;
}
.price-range ul::-webkit-scrollbar-track, .area-range ul::-webkit-scrollbar-track  {
    box-shadow: inset 0 0 5px white;
    border-radius: 0px;
background:white;
}
.price-range ul::-webkit-scrollbar, .area-range ul::-webkit-scrollbar {
    width: 5px;
}
.price-range ul::-webkit-scrollbar-thumb, .area-range ul::-webkit-scrollbar-thumb{
	background: #182331;
}

#priceRangeResult,#areaResult{
    text-transform: uppercase;
}
@media (max-width: 993px){
   .price-range-result .caret,.area-result .caret{
       top: 8px;
       bottom: -8px;
   } 
    
}
</style>
 <div class="main " id="main">

    <section class="top-section listing-page-banner">
        <img src="/home_images/prop/Night-View-of-Faisal-Mosque.jpg" alt="Night-View-of-Faisal-Mosque.jpg" width="100%">
    </section>
    <section class="search-bar">
        <div class="container">
            <div class="row">
                <div class="search-section">
                   <form class="form" role="search" method="get" action="/property">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-col" >
                                        <p id="show-search">Search <span class="caret text-right"></span> </p>
                                </div>
                                <div class="search-panel">
                                     <div class="col-md-2 btn-margins">
                            <select class="search_city form-control selectpicker" id="city_id" name="city_id_new"  data-size="10"  >
                                @foreach($cities as $city)
                                     <option value="{{ $city->id }}">{{$city->name}}</option>
                                     @endforeach
                           </select>
                       </div>   
                                   <div class="col-md-3 btn-margins">
                                <input type="text" class="form-control location"   placeholder="Title, keyword, address or property id ..." name="address" id="search_input">
                                <div class="ui-widget input-results-wrapper">
                                   Result:
                                   <div id="log" class="ui-widget-content input-search-results"></div>
                               </div>
                           </div>
                    <div class="col-md-2 btn-margins">
                        <a href="javascript:void(0)" id="priceRangeResult" class="price-range-result form-control" ><img src='/home_images/icons/price.webp' class='search-images' /> <span id="price-tag">Price</span> <span class="caret"></span></a>
                        <div class="price-range-selector price-selector-top " name="price-selector">
                            <span class="close-price"><i class="fa fa-times-circle"></i></span>
                            <div class="price-range row">
                                    <div class="price-min col-md-6 col-sm-6 col-xs-6">
                                        <div class="price-showcase">
                                            <span>MIN:</span>
                                            <input id="min-price-val" class="form-control" value="0" disabled />
                                        </div>
                                        <input type="number" name="min-price" hidden />
                                        <ul class="min-list list-unstyled" id="min-price" disabled>
                                            
                                        </ul>
                                    </div>
                                    <div class="price-max col-md-6 col-sm-6 col-xs-6">
                                        <div class="price-showcase">
                                            <span>MAX:</span>
                                            <input id="max-price-val" class="form-control" value="0" disabled />
                                        </div>
                                        <input type="number" name="max-price" hidden />
                                        <ul class="max-list list-unstyled" id="max-price">
                                            
                                        </ul>
                                    </div>
                            </div>
                            
                           
                        </div>
                                        <!--<select name="type" id="" class="form-control selectpicker" name="area">-->
                                        <!--    <option value="" data-content="<img src='../home_images/icons/area.webp' class='search-images' /> AREA">AREA</option>-->
                                        <!--    <option value="" data-content="<img src='../home_images/icons/area.webp' class='search-images' /> AREA">AREA</option>-->
                                        <!--</select>-->
                                    </div>
                                    <div class="col-md-2 btn-margins">
                                        <a href="javascript:void(0)" id="areaResult" class="area-result form-control" ><img src='/home_images/icons/area.webp' class='search-images' /> <span id="area-tag">Area</span> <span class="caret"></span></a>
                                        <div class="area-range-selector area-selector-top" name="area-selector" >
                                        <span class="close-area"><i class="fa fa-times-circle"></i></span>
                                        <div class="area-range row">
                                            <div class="area-min col-md-6 col-sm-6 col-xs-6">
                                                <div class="area-showcase">
                                                    <span>MIN:</span>
                                                    <input id="min-area-val" class="form-control" value="0" disabled />
                                                </div>
                                                <input type="number" name="min-price" hidden />
                                                <ul class="min-area-list list-unstyled" id="min-area" disabled>
                                                    
                                                </ul>
                                                </div>
                                             <div class="area-max col-md-6 col-sm-6 col-xs-6">
                                                <div class="area-showcase">
                                                <span>MAX:</span>
                                                <input id="max-area-val" class="form-control" value="0" disabled />
                                             </div>
                                             <input type="number" name="max-price" hidden />
                                                <ul class="max-area-list list-unstyled" id="max-area">
                                                    
                                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 btn-margins">
                                        <select name="search_purpose" id="property-type" class="form-control selectpicker"  name="search-of">
                                             <option value="" data-icon="fa fa-home orange">Property Type</option>
                                             <?php
                                              $area_types =['Square Feet','Square Yards' ,'Square Meters' ,'Marla' ,'Kanal' ,' Arce'];
                                                ?>
                                                @foreach($area_types as $type)
                                                 @if(isset($_GET['area_type']) && $type ==$_GET['area_type']) )
                                                 <option value="{{$type}}" selected>{{$type}}</option>
                                                  @else
                                                 <option value="{{$type}}">{{$type}}</option>
                                                  @endif
                                    
                                                @endforeach
                                          
                                        </select>
                                    </div>
                                    <div class="col-md-1 btn-margins search-btn">
                                        <button class="btn search-button">
                                            <i class="fa fa-search"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="listinings">
        <div class="container">
            <div class="row">
                <div class="col-md-9 no-padding properties">

                    <div class="col-md-12 plot-listing">
                        <div class="listing-side list col-md-1 col-sm-1 col-xs-1">
                            <i class="fa fa-list left" id="listing-icon-current"></i>
                        </div>
                       
                        @if($count != 0)
                            @if($name != 3)
                     
                        <div class="col-md-9 col-sm-9 col-xs-7">
                            <h2 class="listining-title">{{$name}} Listing</h2>
                        </div>
                        @else
                          <div class="col-md-9 col-sm-9 col-xs-7">
                            <h2 class="listining-title" title="Post an ad of your property to let others know what you are offering!">Post an ad...</h2>
                        </div>
                        @endif
                        @else
                        <div class="col-md-9 col-sm-9 col-xs-7">
                            <h2 class="listining-title">No Property {{$name}} found</h2>
                        </div>
                         @endif
                        <a
                            class="listing-side right-side col-md-1 col-sm-1 col-xs-1 col-md-push-1 col-sm-push-1 col-xs-push-1 orange-back" id="list-view">
                            <i class="fa fa-list right"></i>
                        </a>
                        <a
                            class="listing-side right-side col-md-1 col-sm-1 col-xs-1 col-md-push-1 col-sm-push-1 col-xs-push-1" id="grid-view">
                            <i class="fa fa-th"></i>
                        </a>
                    </div>
                        <!-- Property Listing Loop at Search Property Blade Page  -->
                      <!--   <div class="col-md-12 property-section ">
                            <div class="row-no-gutters">
                                <div class="col-md-4 property-image">
                                    <figure>
                                        <a href="">
                                            <img class="" src="../home_images/prop/property-featured1.jpg" alt="images"
                                                height="259px" width="282px" />
                                        </a>
                                        <figcaption>
                                            <span class="feature-tag ">Featured</span>
                                            <span class="forsale-tag">For Sale</span>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-8 property-details">
                                    <div class="container-fluid">
                                        <div class="row">

                                            <div class="col-md-8 col-sm-8 property-detail-inner">
                                                <div class="mobile-view-property">
                                                    <a href="#" class="property-title">
                                                        <h4 class="property-title">1 Kanal Brand New Luxurious Bungalow</h4>
                                                    </a>
                                                    <p class="property-location"><i class="fa fa-map-marker orange"></i>
                                                        Block
                                                        F, Phase 5, DHA Defence, Lahore</p>
                                                </div>
                                                <div class="section-detailed col-md-12 no-padding">
                                                    <div class="col-md-6 col-sm-6 no-padding">
                                                        <p class="bedroms">
                                                            <i class="fa fa-bed"></i>
                                                            6 Bedrooms
                                                        </p>

                                                    </div>
                                                    <div class="col-md-6 col-sm-6 no-padding">
                                                        <p class="bathrooms">
                                                            <i class="fa fa-bath"></i>
                                                            3 Bathrooms
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 no-padding">
                                                        <p class="plotSize">
                                                            <img src="../home_images/prop/area.svg" alt="" width="15px">
                                                            720 SQ ft
                                                        </p>

                                                    </div>
                                                    <div class="col-md-6 col-sm-6 no-padding">
                                                        <p class="parking">
                                                            <img src="../home_images/prop/garage.svg" alt="" width="15px">
                                                            2 Parking
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 no-padding">
                                                        <h2 class="property-price">Rs 40,500,000 </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4  property-side-actions">

                                                <a href="#" class="state-image">
                                                    <img src="../home_images/prop/real-estate.jpg" class="estate-logo"
                                                        alt="estate-logo">
                                                </a>
                                                <div class="property-actions">

                                                    <a data-toggle="dropdown" class="share-advance"
                                                        href="javascript:void(0);" aria-expanded="false">
                                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" id="share-menu">
                                                        <li>
                                                            <a href="tel">
                                                                <i class="fa fa-phone fa-lg"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-share-alt fa-lg"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-heart-o fa-lg"></i>

                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="linking">
                                                        <li>
                                                            <a href="tel">
                                                                <i class="fa fa-phone fa-lg"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-share-alt fa-lg"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-heart-o fa-lg"></i>

                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                         @include('frontwebsite.include.searchproperty')
                        <!-- Property Listing Loop at Search Property Blade Page  -->


                   
                </div>
                <div class="col-md-3 sidebar col-xs-12">
                    <div class="right-sidebar col-md-12 no-padding">
                        <h3 class="side-title no-margin"> Featured Cities</h3>
                        <div class="cities col-md-12 no-padding">
                            <ul class="no-padding list-unstyled">
                                  @foreach($locations as $location)
                                <li>
                                    <a  href="/property/location/{{$location->name}}">
                                        <span class="city-name">
                                             {{$location->name}}
                                        </span>
                                        <span class="city-count pull-right">
                                            {{$location->number}}
                                        </span>
                                    </a>
                                </li>
                                    @endforeach
                            </ul>
                            <div class="col-md-12 no-padding">
                                <a href="#" class="see-more btn btn-md"> See
                                    More...</a>
                            </div>
                        </div>
                    </div>

                    <div class="right-sidebar featured-agencies col-md-12 no-padding">
                        <h3 class="side-title no-margin"> Featured Agencies</h3>
                          @include('home.verfied_agencies_internal')
                    </div>
                </div>

            </div>
        </div>
</div>
</section>

</div>

@endsection
@section('script')
 <script>
 
 
 
                                var prices=[500000,1000000,2000000,3500000,5000000,6500000,8000000,10000000,12500000,15000000,17500000,20000000,25000000,30000000,40000000,50000000,75000000,100000000,250000000,500000000,1000000000];
                                var minPrice = prices;
                                var maxPrice = prices;
                                var areas =[1,2,3,4,5,6,7,8,9,10,12,15,20,30,40,60,80,100];
                                var maxArea = areas;
                                var minArea = areas;
                                
                                var priceFrom,
                                    priceTo,
                                    areaFrom,
                                    areaTo;
                            $(function(){
 
});
                                $(document).ready(function(){
                                    // $(".area-range").on("focusout",function(){
                                    //     	$(".area-selector-top").css("display", "none").fadeOut(2000);;
                                    //     	console.log("focus");
                                    //     });
                                    
                                     $("div[name='price-selector'").focus(function(){
      console.log("focus");
      });
                                    function pricesList(){
                                        if($( ".price-selector-top ul" ).has( "li" ).length){
                                            $( ".price-selector-top ul" ).empty();
                                        }
                                        $.each(minPrice,(index,value)=>{
                                         $("#min-price").append("<li value='"+value+"' class='li-price' >" + value.toLocaleString() +  "</li>");   
                                        });
                                        $.each(maxPrice,(index,value)=>{
                                         $("#max-price").append("<li value='"+value+"' class='li-price' >" + value.toLocaleString() +  "</li>");   
                                        });
                                        
                                        $("#min-price li").click(function(e){
                                         
                                         var priceVal = Number($(this).attr("value"));
                                         $("#min-price-val").val(priceVal.toLocaleString());
                                         $("min-price").val(priceVal);
                                          maxPrice = $.grep(prices,function(n,i){
                                             return n > priceVal;
                                         });
                                         
                                         priceFrom = priceVal;
                                         priceTo = "ANY";
                                         
                                         $("#price-tag").text(priceVal  +  " To "   + priceTo);
                                         
                                         $("#max-price-val").val("ANY");
                                         $("max-price").val(Math.max(...maxPrice));
                                         
                                         minPrice = prices;
                                         pricesList();
                                    });
                                    $("#max-price li").click(function(e){
                                        var priceVal = Number($(this).attr("value"));
                                          $("#max-price-val").val(priceVal.toLocaleString());
                                          $("max-price").val(priceVal);
                                        minPrice = $.grep(prices,function(n,i){
                                             return n < priceVal;
                                         });
                                         
                                         priceTo = priceVal;
                                         if(priceFrom === undefined){
                                             priceFrom = 0;
                                         }
                                        
                                         $("#price-tag").text(priceFrom  +  " To "   + priceTo);
                                         
                                        //  maxPrice = prices;
                                        //  $("#min-price-val").val(priceVal.toLocaleString());
                                        //   $("min-price").val(priceVal);
                                         pricesList();
                                        //   console.log(largestOfFour(prices));
                                        
                                    });
                                    }
                                    
                                    
                                    
                                    
                                    function areasList(){
                                        if($( ".area-selector-top ul" ).has( "li" ).length){
                                            $( ".area-selector-top ul" ).empty();
                                        }
                                        $.each(minArea,(index,value)=>{
                                         $("#min-area").append("<li value='"+value+"' class='li-area' >" + value.toLocaleString() +  "</li>");   
                                        });
                                        $.each(maxArea,(index,value)=>{
                                         $("#max-area").append("<li value='"+value+"' class='li-area' >" + value.toLocaleString() +  "</li>");   
                                        });
                                        
                                        $("#min-area li").click(function(e){
                                         
                                         var areaVal = Number($(this).attr("value"));
                                         $("#min-area-val").val(areaVal.toLocaleString());
                                         $("min-area").val(areaVal);
                                          maxArea = $.grep(areas,function(n,i){
                                             return n > areaVal;
                                         });
                                         
                                         
                                         areaFrom = areaVal;
                                         areaTo = "Any";
                                         
                                         
                                         
                                         
                                         
                                         
                                         $("#area-tag").text(areaFrom  +  " To "   + areaTo);
                                         
                                         $("#max-area-val").val("ANY");
                                          $("max-area").val(Math.max(...maxArea));
                                          
                                          
                                          
                                          
                                         minArea = areas;
                                         areasList();
                                    });
                                    $("#max-area li").click(function(e){
                                        var areaVal = Number($(this).attr("value"));
                                          $("#max-area-val").val(areaVal.toLocaleString());
                                          $("max-area").val(areaVal);
                                          
                                          areaTo = areaVal;
                                          if(areaFrom === undefined){
                                             areaFrom = 0;
                                         }
                                          $("#area-tag").text(areaFrom  +  " To "   + areaTo);
                                          
                                        minArea = $.grep(areas,function(n,i){
                                             return n < areaVal;
                                         });
                                        //  $("#min-price-val").val(areaVal);
                                        //   $("min-price").val(areaVal);
                                        //  maxArea = areas;
                                         areasList();
                                        //   console.log(largestOfFour(prices));
                                        
                                    });
                                    }
                                    areasList();
                                    pricesList();
                                    
                                     
                                     
                                });
                                
//                                 function largestOfFour(arr) {
//     let newArr = [];
//     arr.forEach((a) => {
//       newArr.push(Math.max.apply(null, a));
//     });
//     return newArr;
//   }
//                               function toggleSearchMenus(e){
//      console.log(e);
//  } 
                            </script>



<script>
$(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
        $('nav').addClass('sticky-nav');
        // $('#navbar-btn').addClass('btn-down');
    } else {
        $('nav').removeClass('sticky-nav');
        // $('#navbar-btn').removeClass('btn-down');
    }
    
    if ($(document).scrollTop() > 200) {
    $('.search-section').addClass('sticky-search');
    $('.search-section form').addClass('container');
    }else{
    $('.search-section').removeClass('sticky-search');
    $('.search-section form').removeClass('container');
    }
});
$(document).on('ready', function() {
    
$("#show-search").on("click",function(){
$(".search-panel").toggleClass("active");
$(".search-col").toggleClass("active");
});    
    
});

</script>
@endsection
@section('detial-page-footer')
@section('form_search_script')
<script> 
    $(function() {
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
 
 
 
 $(document).ready(function(){
     var $width = window.screen.width;
     if($width <= 1200){
         hideGridSystem();
     }
     $(window).on('resize',function(){
         $width = window.screen.width;
         console.log($width);
         if($width <= 1200){
         hideGridSystem();
        }else{
            $("#list-view").show();
         $("#grid-view").show();
        }
        
     });
     
     function hideGridSystem(){
         $("#list-view").hide();
         $("#grid-view").hide();
         if($(".property-section").hasClass("grid-view")){
             $(".property-section").removeClass("grid-view");
         } 
     }
     
     
        $("#list-view").click(function(){
            console.log($(this).hasClass("orange-back"));
            if(!$(this).hasClass("orange-back")){
              $(".property-section").removeClass("grid-view");
              
               $("#listing-icon-current").removeClass("fa fa-th");
               $("#listing-icon-current").addClass("fa fa-list");
              $(".listing-side.right-side").toggleClass("orange-back");
            }
        });
        
        $("#grid-view").click(function(){
            if(!$(this).hasClass("orange-back")){
               $(".property-section").addClass("grid-view");
               $("#listing-icon-current").removeClass("fa fa-list");
               $("#listing-icon-current").addClass("fa fa-th");
              $(".listing-side.right-side").toggleClass("orange-back");
            }
          
        })
     
 });
 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.js"></script>
@endsection