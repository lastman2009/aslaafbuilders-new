@include("includes.title")
<!-- Toaster -->
<script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>

<!-- banner-wraper starts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet">
<style>
    .counter-section {
        padding: 0px 0 0;
    }

    .counter-section span {
        font-size: 66px;
        color: #555;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        font-family: 'Roboto', sans-serif; 
    }

    .counter-section h5 {
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 500;
    }

    .counter-section .counter-area {
        border: 1px solid #cccccc;
    }

    .counter-section span > span {
        margin-bottom: 0;
    }

    .counter-section .circle {
        background: #2980b9;
        width: 200px;
        line-height: 200px;
        display: inline-block;
        color: #fff;
        border-radius: 100%;
    }

    .counter-section code, .counter-section code > span {
        text-align: left;
        display: block;
        font-family: 'Roboto', sans-serif;
        background: #444;
        color: #fff;
        padding: 20px;
        font-size: 14px;
        margin-bottom: 100px;
    }

    .counter-section code > span {
        padding: 0;
        margin: 0;
    }

    @media only screen and (max-width: 1067px) {
        .img-topimg {
            margin-top: 75px !important;
            min-height: 483px !important;
            padding: 120px 0 113px 0 !important;
        }

        .counter-section .counter-area {
            min-height: 150px;
        }
    }

    @media only screen and (max-width: 1024px) {
        .counter-section span {
            font-size: 66px;
            margin-bottom: 0px;
        }

        .counter-section .counter-area {
            margin: 15px 0;
        }
    }

    @media only screen and (max-width: 800px) {
        .counter-section div > span {
            font-size: 66px;
            display: block;
            width: 100% !important;
            margin-bottom: 100px;
        }

        .counter-section span {
            font-size: 66px;
        }

        .counter-section code {
            margin-bottom: 100px;
        }
    }

    @media only screen and (max-width: 667px) {
        .vc_container {
            background-size: 30% auto !important;
        }

        .image-zoommain {
            float: left;
            width: 100%;
            padding: 0 30px;
        }

        .img-topimg {
            margin-top: 25px !important;
            min-height: 445px !important;
            padding: 59px 0 59px 0 !important;
            float: left;
            width: 100%;
        }

        .apple-banner img {
            height: auto;
        }

        .counter-section div > span {
            margin-bottom: 20px;
        }

        .latest-properties .prices-details p {
            font-size: 13px;
        }

        .latest-properties .prices-details .details {
            font-size: 15px;
        }

    }

    @media only screen and (max-width: 580px) {
        .apple-banner img {
            height: auto;
        }
    }

    @media only screen and (max-width: 480px) {
        .counter-section .counter-area {
            padding: 15px;
        }

        .range-wraper #buyPrice-input-1, .range-wraper #rentPrice-input-1, .range-wraper #projectsPrice-input-1, .range-wraper #wantedPrice-input-1 {
            float: right;
        }

        .range-wraper #buyPrice-input-1, .range-wraper #buyArea-input-1, .range-wraper #rentPrice-input-1, .range-wraper #rentArea-input-1, .range-wraper #projectsPrice-input-1, .range-wraper #projectsArea-input-1, .range-wraper #wantedPrice-input-1, .range-wraper #wantedArea-input-1 {
            float: right;
        }

        .counter-section {
            padding: 0px 0 0;
            margin-top: -20px;
        }
    }

    .img-topimg {
        padding: 0;
        border: 1px solid #cccccc;
        margin-top: 84px;
        background-image: url('assets/images/mobile-application_new.jpg');
        min-height: 550px;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 120px 0;
    }

    .img-topimg .android-banner {
        padding-right: 0px;
        padding-left: 5px;
    }

    .img-topimg .apple-banner {
        padding-right: 5px;
        padding-left: 8px;
    }

    .zoom {
        -webkit-transition: all 0.35s ease-in-out;
        -moz-transition: all 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        cursor: -webkit-zoom-in;
        cursor: -moz-zoom-in;
        cursor: zoom-in;
    }

    .zoom:hover,
    .zoom:active,
    .zoom:focus {
        /**adjust scale to desired size, 
        add browser prefixes**/
        -ms-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -webkit-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
        position: relative;
        z-index: 100;
    }
     .give-padding-left{
            padding-left: 10px;
    }
    .give-padding-right{
        padding-right: 10px;
    }
    .hdg-main span {
        display: inline-block;
        background-color: rgba(0, 0, 0, 0.75);
        color: white;
        text-transform: capitalize;
        font-size: 25px;
        padding: 10px 20px;
        font-weight: 500;
        margin-top: 10px;
    }
</style>
<div class="banner-wraper">
    <!-- <span><span class="counter circle">12345</span></span> -->
    <!-- slider ends -->
    <div class="banner">
        <div class="container">
            <div class="row">
             <div class="col-md-12 text-center hdg-main">
                    <h1 ><span>Pakistan Largest Property Portal</span></h1>
            </div>
                <div class="banner-contents basic-srch col-sm-12 col-md-10 col-md-offset-1">
                    <div class="tab-content col-md-12 srch-content">
                        <form class="navbar-form navbar-left" method="get" action="/property" role="search">
                            <div class="row srch-flds">
                                <div class="col-md-12 top-fields">
                                    <span class="btn-default search pull-left"><i class="fa fa-search"></i></span>
                                    <div class="col-md-3 buy rent wanted residence project form-select btn-city-pad pleft">
                                        <select class="form-control selectpicker " name="search_purpose"
                                                id="radiusSelect2">
                                            <option data-icon="" value="1"  id="buy" selected>Buy</option>
                                            <option data-icon="" value="2" id="rent">Rent</option>
         
                                            <option data-icon="" value="3"  id="wanted">Wanted</option>
                                            <option data-icon="" value="4"  id="projects">Projects</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 buy rent wanted residence project form-select btn-city-pad">
                                        <select class="form-control selectpicker city" id="city1" name="city_id"
                                                title="Select City" id="radiusSelect2">
                                            @foreach($cities as $city)
                                                <option data-icon="fa fa-map-marker" value="{{ $city->id }}">
                                                    {{$city->name}}
                                                </option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 buy rent wanted residence project form-select btn-city-pad">
                                        <select class="form-control selectpicker show-menu-arrow town"
                                                id="town1" title="Select Location"
                                                data-selected-text-format="count > 6" name="town_id">

                                        </select>
                                    </div>
                                    <div class="col-md-3 buy rent wanted residence form-select btn-city-pad">
                                        <select class="form-control selectpicker city" name="property_type"
                                                title="Select Property Type" id="radiusSelect4" 
                                                data-selected-text-format="count > 5"> 
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
                                <div class="col-md-12 range-wraper">
                                    <div class="col-md-5 rang-slider">
                                        <div id="buyPriceRange"
                                             class="noUi-target noUi-rtl noUi-horizontal"></div>
                                        <div class="prices-wraper">
                                            <span class="price"><strong> Price: </strong></span>
                                            <span class="range-inputs">
                                    <input id="buyPrice-input-0" value="Min" name="min_price"
                                           type="text">
                                    <input id="buyPrice-input-1" value="Max" name="max_price"
                                           type="text">
                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 rang-slider rang-slider-next">
                                        <div id="buyAreaRange"
                                             class="noUi-target noUi-rtl noUi-horizontal"></div>
                                        <div class="prices-wraper"><span
                                                    class="price"><strong> Area: </strong></span> <span
                                                    class="range-inputs">
                                <input id="buyArea-input-0" value="Min" name="min_area"
                                       type="text">
                                <input id="buyArea-input-1" value="Max" name="max_area"
                                       type="text">
                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-right btn-searchbtn pright pleft">
                                        <button type="submit" class="btn btn-default btn-style">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="arow-down">
                <button id="button"><img src="/assets/images/arow-down.png"></button>
            </div>
        </div>
    </div>
</div>

<!-- slider ends -->
<!-- Main Starts -->
    
<main class="main-section">
    @include('home.verified_agencies')
    <section class="page-section latest-properties" style="padding: 20px 0;margin-bottom: -70px; ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row" id="latest_properties_listing">
                        {{-- @include('home.latest_properties') --}}
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="page-section sidebar-section properties-count-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-left">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Top locations of rent <span class="color">Houses</span></h3>
                        </div>
                        <div class="col-md-4 row-1">
                            @if($rentData['lahore'] != null )
                                <h4>Lahore Rent</h4>
                                <ul>
                                    @foreach($rentData['lahore'] as $town)
                                        <li>
                                            <a class="color-black" href="/property/lahore-rent/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left give-padding-left" >{{$town->name}}</span>
                                                {{--<span class="pull-right give-padding-right">({{$town->number}})</span>--}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4 row-1">
                            @if($rentData['karachi'] != null )
                                <h4>Karachi Rent</h4>
                                <ul>
                                    @foreach($rentData['karachi'] as $town)
                                        <li>
                                            <a class="color-black" href="/property/karachi-rent/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left give-padding-left">{{$town->name}}</span>
                                                  {{--<span class="pull-right give-padding-right">({{$town->number}})</span>--}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4 row-1">
                            @if($rentData['islamabad'] != null )
                                <h4>Islamabad Rent</h4>
                                <ul>
                                    @foreach($rentData['islamabad'] as $town)
                                        <li>
                                            <a class="color-black" href="/property/islamabad-rent/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left give-padding-left">{{$town->name}}</span>
                                                  {{--<span class="pull-right give-padding-right">({{$town->number}})</span>--}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        {{-- <div class="col-md-3 row-1">
                            @if($isl_towns_plot != null )
                                <h4>Lahore plot</h4>
                                <ul>
                                    @foreach($isl_towns_plot as $town)
                                        <li>
                                            <a class="color-black" href="/property/islamabad-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left">{{$town->name}}</span>
                                                  <span class="pull-right">({{$town->number}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Top locations for sales of <span class="color">PLOTS</span></h3>
                        </div>
                        <div class="col-md-4 row-2">
                            @if($plotData['lahore'] != null )
                                <h4>Lahore plot</h4>
                                <ul>
                                    @foreach($plotData['lahore'] as $town)
                                        <li>
                                            <a class="color-black" href="/property/lahore-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left give-padding-left">{{$town->name}}</span>
                                                  <span class="pull-right give-padding-right">({{$town->number}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4 row-2">
                            @if($plotData['karachi'] != null )
                                <h4>Karachi plot</h4>
                                <ul>
                                    @foreach($plotData['karachi'] as $town)
                                        <li>
                                            <a class="color-black" href="/property/karachi-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left give-padding-left">{{$town->name}}</span>
                                                  <span class="pull-right give-padding-right">({{$town->number}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4 row-2">
                            @if($plotData['islamabad'] != null )
                                <h4>Islamabad plot</h4>
                                <ul>
                                    @foreach($plotData['islamabad'] as $town)
                                        <li>
                                            <a class="color-black" href="/property/islamabad-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                                <span class="pull-left give-padding-left">{{$town->name}}</span>
                                                  <span class="pull-right give-padding-right">({{$town->number}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Top locations for sales of <span class="color">HOUSES</span></h3>
                        </div>
                        <div class="col-md-4 row-3">
                            <h4>Lahore</h4>
                            <ul>
                                 @foreach($townData['lahore'] as $town)
                                    <li>
                                        <a class="color-black" href="/property/lahore/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                            <span class="pull-left give-padding-left">{{$town->name}}</span>
                                              <span class="pull-right give-padding-right">({{$town->number}})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4 row-3">
                            <h4>Karachi</h4>
                            <ul>
                                 @foreach($townData['karachi'] as $town)
                                    <li>
                                        <a class="color-black" href="/property/lahore/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                            <span class="pull-left give-padding-left">{{$town->name}}</span>
                                              <span class="pull-right give-padding-right">({{$town->number}})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-4 row-3">
                            <h4>Islamabad</h4>
                            <ul>
                                @foreach($townData['islamabad'] as $town)
                                    <li>
                                        <a class="color-black" href="/property/islamabad/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">
                                            <span class="pull-left give-padding-left">{{$town->name}}</span>
                                              <span class="pull-right give-padding-right">({{$town->number}})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-right verticalCarousel locations">
                    <div class="col-md-12">
                        <h3><i class="fa fa-map-marker color"></i> Top<span class="color">Locations</span></h3>
                        <div class="verticalCarouselHeader">
                            <a href="#" class="vc_goDown"><i class="fa fa-fw fa-angle-up"></i></a>
                        </div>
                        <ul class="verticalCarouselGroup list-group vc_list">
                            @foreach($locations as $location)
                                <li class="list-group-item">
                                    <h5>
                                        <a class="color-black" href="/property/location/{{$location->name}}">
                                            {{$location->name}}
                                            <span class="pull-right">{{$location->number}}</span>
                                        </a>
                                    </h5>
                                </li>
                            @endforeach
                        </ul>
                        <div class="verticalCarouselFooter text-center">
                            <a href="javascript:void(0)" class="vc_goUp">
                                <i class="fa fa-fw fa-angle-down"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 fb-twit-tabs">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#facebook">Facebook</a></li>
                            <li><a data-toggle="tab" href="#twitter">Twitter</a></li>
                        </ul>

                        <div class="tab-content text-center">
                            <div id="facebook" class="tab-pane fade in active ">
                                <div class="fb-page"
                                     data-href="https://www.facebook.com/rightdeedcom-170312050190930/"
                                     data-tabs="timeline" data-small-header="false"
                                     data-adapt-container-width="true" data-hide-cover="false"
                                     data-show-facepile="true">
                                    <blockquote cite="{{Config::get(" name.social_media.facebook")}}"
                                                class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/rightdeedcom-170312050190930/">Facebook</a>
                                    </blockquote>
                                </div>

                            </div>
                            <div id="twitter" class="tab-pane fade ">
                                <a class="twitter-timeline" data-height="500" data-dnt="true" href="{{Config::get("
                                    name.social_media.twitter")}}">Tweets by TwitterDev</a>
                                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('home.projects')
    <section class="page-section blogs">
        <div class="container">
            @include('home.blog')

        </div>
    </section>


    

    <style>
        .subscribe {
            background: black;
            display: block;
            float: none;
            height: 100px;
            position: relative;
            text-align: center;
            width: 100%;
            bottom: -45px;
        }
        .subscribe .container {
            position: relative;
            height: 100%;
        }
        .mobile-apps {
            position: absolute;
            top: -21px;
            right: 0;
        }
    </style>
</main>
<style>
    .img-topimg{
        padding: 50px 0 0 0;
    }
    .image-zoommain p{
        font-family: Century Gothic;
        font-weight: bold;
        font-size: 19px;
        color: #fff;
        float: left;
        width: 100%;
    }
    .image-zoommain p span{
        color: #fa6919;
    }
    .update-deviceimage{
        float: left;
        width: 100%;
        padding-top: 20px;
    }
    .update-deviceimage p {
        margin-bottom: 2px;
    }
    @media only screen and (max-width:480px){
        .img-topimg .android-banner {
            padding-right: 5px;
            padding-left: 9px;
        }
    }
</style>
<!-- wraper ends -->
@include( 'includes.footer' )
<script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>
@if (session('status'))

<script>
  toastr.success("{{ Session::get('status') }}");
</script>
@endif
@if (session('message'))

<script>
  toastr.info("{{ Session::get('message') }}");
</script>
@endif
@if (session('error'))

<script>
  toastr.error("{{ Session::get('error') }}");
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
       function loadajax(){
  $.ajax({ 
    url:'/lastest_listing',
    type:"get",
    success:function(){
     //do action
    }
  });
}
 $('document').load(function(){
setTimeout(function(){
    alert('12');
   
 },10000);

});


 function loadajax(){
  $.ajax({ 
    url:'/lastest_listing',
    type:"get",
    headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    dataType: 'html',
    success:function(data){
     $('#latest_properties_listing').html(data);
    }
  });
}
</script>
<script>
  $(document).ready(function (e) {

    $('.subscribe_email').click(function (e) {
      e.preventDefault();

      function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
      };

      var email = $('#sub_email').val();

      if (email !== "") {  // If something was entered
        if (isValidEmailAddress(email)) {
          // alert('email hun');
          var form = $('#submit_form').serialize();
          // alert(form);
          var type = 'GET';
          $('#sub_email').val("");
          $('#loadingmessage').show();

          $.ajax({

            type: type,
            url: '/subscribe/email',
            data: form,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (e) {
              $('#loadingmessage').hide();

              if (e.success == 1) {
                toastr.success("You are Subscribed");
              }
              else if (e.success == 2) {
                toastr.error("Some Error in Connection");
              }
              else if (e.success == 3) {
                toastr.warning("You Are Already Subscribed");
              }
              else if (e.success == 4) {
                toastr.warning("Connection Failed");
              }
            }

          });
        }
        else {
          toastr.error("Please Enter proper Email Format");
        }
      }

    });
  });
</script>

<!--/////Save Property from Latest Property Listing  /////-->
<script>
  $(document).ready(function () {
  
    $('.saveProperty').click(function () {

      id = $(this).attr('data-id');

      var url = "/saveProperty/" + id;

      $.ajax({  
        url: url,
        data: id,
        method: 'post',
        type: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
          toastr.success(e.success);
        }

      });
    });
    
   $(".favouriteProperty").on("click",function(e){
 // $('.saveProperty').click(function(e){
  e.preventDefault();
    id =$(this).attr('data-id');
    var url ="/favouriteProperty/"+id;


    $.ajax({
      url:url,
      data:id,
      method:'post',
      type:'json',
      headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
      success:function(e){
        $('#counter').text(e.count)
        if(e.val == 2){
         toastr.success(e.success);
        }
        else
        {
         toastr.warning(e.warning);
        }
        // alert(e.success);
      }

    });
  });
  });
</script>
<script>



  function loadTowns(num) {
    id = $('#city' + num + ' option:selected').val();
    $.ajax({
      url: 'LocationCity/' + id,
      type: 'POST',
      datatype: 'html',
      data: id,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (json) {

        $('#town' + num).html(json);
        $('.selectpicker').selectpicker('refresh');

      }
    });
  }

  $('#city1').change(function () {
    loadTowns(1);
  });
  // $('#city2').change(function () {
  //   loadTowns(2);
  // });
  // $('#city3').change(function () {
  //   loadTowns(3);
  // });
  // $('#city4').change(function () {
  //   loadTowns(4);
  // });
</script>
<script>
  jQuery(document).ready(function ($) {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });
  });
</script>
@if (!session('showPopUp'))
<script>
  $(window).load(function () {

    $('#myModalIndex').modal('show');

    $('#myModalIndex').on('shown', function () {
      $('body').on('wheel.modal mousewheel.modal', function () {
        return true;
      });
    });
    $('#myModalIndex').hover(function () {
      $(".carousel").carousel('cycle');
    }, function () {
      $(".carousel").carousel('cycle');
    });

    $.ajax({
      url: '/session',
      type: 'GET',

      success: function (json) {
      }
    });

  });
</script>
@endif
<script>
    $(".verified-agencies-section li").hover(function () {
        $(".verified-agencies-section li").not(this).children("div").hide();
        $(this).children("div").show();
    });
</script>
<style type="text/css">
    .popup-index .modal {
        background-color: rgba(0, 0, 0, .85);
    !important;
    }

    .popup-index .modal-content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 25%;
        border-radius: 0;
        border: none;
        box-shadow: none;
        background: none;
        width: 45%;
    }

    .popup-index .modal-body {
        position: relative;
        top: 120px;
        bottom: 60px;
        width: 100%;
        font-weight: 300;
        overflow: auto;
    }

    .popup-index button.close {
        color: #fff;
        opacity: 1;
        position: relative;
        z-index: 15;
        margin: 0;
        top: 166px;
        left: -14.89px;
        background: red !important;
        padding: 5px 10px !important;
        display: block;
    }

    .carousel-fade.popup-index .carousel-inner .item {
        opacity: 0;
        transition-property: opacity;
    }

    .carousel-fade.popup-index .carousel-inner .active {
        opacity: 1;
    }

    .carousel-fade.popup-index .carousel-inner .active.left,
    .carousel-fade.popup-index .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }

    .carousel-fade.popup-index .carousel-inner .next.left,
    .carousel-fade.popup-index .carousel-inner .prev.right {
        opacity: 1;
    }

    .carousel-fade.popup-index .carousel-control {
        z-index: 2;
    }

    /*
      WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
      Need to override the 3.3 new styles for modern browsers & apply opacity
    */
    @media all and (transform-3d), (-webkit-transform-3d) {
        .carousel-fade.popup-index .carousel-inner > .item.next,
        .carousel-fade.popup-index .carousel-inner > .item.active.right {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .carousel-fade.popup-index .carousel-inner > .item.prev,
        .carousel-fade.popup-index .carousel-inner > .item.active.left {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .carousel-fade.popup-index .carousel-inner > .item.next.left,
        .carousel-fade.popup-index .carousel-inner > .item.prev.right,
        .carousel-fade.popup-index .carousel-inner > .item.active {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    @media screen and (max-width: 480px) {
        .popup-index .modal-content {
            left: 0;
            width: 100%;
        }
    }

    .modal-open {
        overflow: auto;
    }

    /*.popup-index img{*/
    /*  opacity: 0.75;*/
    /*}*/
</style>

<div class="modal carousel slide carousel-fade popup-index" id="myModalIndex" data-ride="carousel" data-interval="3000">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body">
                <ol class="carousel-indicators" style="display: none;">
                    <li data-target="#myModal" data-slide-to="0" class="active"></li>
                    <li data-target="#myModal" data-slide-to="1"></li>
                    <li data-target="#myModal" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="images/pop-up-ad-2.png" style="width: 100%;"/>
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="images/pop-up-ad-3.png" style="width: 100%;"/>
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="images/pop-up-ad.png" style="width: 100%;"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


