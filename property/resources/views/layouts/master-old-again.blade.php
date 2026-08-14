<?php
ob_start(); ?>
@if(Auth::check())
@include('includes.authHeader')
@else
@include('includes.header')
@endif
<?php
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", "Rightdeed: Real Estate Pakistan - Buy, Sell or Rent a Home in Pakistan", $buffer);
$buffer = str_replace("%META%", "NEW META", $buffer);

echo $buffer;
?>
<!-- Toaster -->
<script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
</style>
<div class="banner-wraper">
    <!-- <span><span class="counter circle">12345</span></span> -->


    <!-- slider ends -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="banner-contents col-md-12">
                    <div class="col-md-4 col-sm-4" style="padding:0">
                        <div class="banner-inner-contents-left myHeight1">
                            <h4><b>WE ARE GLAD TO SEE YOU HERE!</b><br>
                                <p style="font-size: 12px;
">
                                    Thank you for visiting rightdeed.com to look up for the latest property listings.
                                    Sign up right now to make your already inspiring inbox a little more inspiring by
                                    staying updated on all the hot trends in the prestigious real estate sector of
                                    Pakistan!</p></h4>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 myHeight1" style="padding:0">
                        <div class="banner-inner-contents basic-srch col-md-12">
                            <div class="col-md-12">
                                <span class="btn-default search pull-left"><i class="fa fa-search"></i></span>
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#searchBuyTab">Buy</a></li>
                                    <li><a data-toggle="pill" href="#searchRentTab">Rent</a></li>
                                    <li><a data-toggle="pill" href="#searchProjectsTab">Projects</a></li>
                                    <li><a data-toggle="pill" href="#searchWantedTab">Wanted</a></li>
                                </ul>
                            </div>
                            <!-- <div class="col-md-3 srch-id">
                              <input type="text" class="input inputid" placeholder="Property ID">
                            </div> -->
                            <div class="tab-content col-md-12 srch-content">
                                <div id="searchBuyTab" class="tab-pane fade in active">
                                    <form class="navbar-form navbar-left" method="get" action="/property" role="search">
                                        <div class="row srch-flds">
                                            <div class="col-md-12 form-select">
                                                <input type="text" name="search_purpose" value="1" hidden>

                                                <input type="text" class="input inputid" name="id"
                                                       placeholder="Property ID">
                                            </div>
                                            <div class="col-md-6 form-select btn-city-pad">
                                                <select class="form-control selectpicker city" id="city1" name="city_id"
                                                        title="---- Select City ----" id="radiusSelect2">
                                                    @foreach($cities as $city)
                                                    <option data-icon="fa fa-map-marker" value="{{ $city->id }}">
                                                        {{$city->name}}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-select btn-city-pad">
                                                <select class="form-control selectpicker" name="property_type"
                                                        title="---- Select Property Type ----" id="radiusSelect4"
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
                                            <div class="col-md-12 form-select">
                                                <select class="form-control selectpicker show-menu-arrow town"
                                                        id="town1" title=" ---- Select Location ---- "
                                                        data-selected-text-format="count > 6" name="town_id">

                                                </select>
                                            </div>
                                            <div class="col-md-12 range-wraper">
                                                <div class="col-md-6 rang-slider">
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
                                                <div class="col-md-6 rang-slider rang-slider-next">
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
                                            </div>
                                            <div class="col-md-12 text-right btn-searchbtn clearfix">
                                                <button type="submit" class="btn btn-default btn-style">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="searchRentTab" class="tab-pane fade in">
                                    <form class="navbar-form navbar-left" action="/property" role="search">
                                        <div class="row srch-flds">
                                            <div class="col-md-12 form-select">
                                                <input type="text" name="search_purpose" value="2" hidden>

                                                <input type="text" class="input inputid" name="id"
                                                       placeholder="Property ID">
                                            </div>

                                            <div class="col-md-6 form-select">
                                                <select class="form-control selectpicker" name="city_id" id="city2"
                                                        title="---- Select City ----">
                                                    @foreach($cities as $city)
                                                    <option data-icon="fa fa-map-marker" value="{{ $city->id }}">
                                                        {{$city->name}}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-select">
                                                <select class="form-control selectpicker city" name="property_type"
                                                        title="---- Select Property Type ----" id="radiusSelect4"
                                                        data-selected-text-format="count > 5" multiple>
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
                                            <div class="col-md-12 form-select">
                                                <select class="form-control selectpicker show-menu-arrow town"
                                                        title=" ---- Select Locations ----" name="town_id" id="town2"
                                                        data-live-search="true" data-selected-text-format="count > 5">

                                                </select>
                                            </div>
                                            <div class="col-md-12 range-wraper">
                                                <div class="col-md-6 rang-slider">
                                                    <div id="rentPriceRange"
                                                         class="noUi-target noUi-rtl noUi-horizontal"></div>
                                                    <div class="prices-wraper"><span
                                                                class="price"><strong> Price: </strong></span> <span
                                                                class="range-inputs">
                              <input id="rentPrice-input-0" name="min_price" value="Min" type="text">
                              <input id="rentPrice-input-1" name="max_price" value="Max" type="text">
                              </span></div>
                                                </div>
                                                <div class="col-md-6 rang-slider rang-slider-next">
                                                    <div id="rentAreaRange"
                                                         class="noUi-target noUi-rtl noUi-horizontal"></div>
                                                    <div class="prices-wraper"><span
                                                                class="price"><strong> Area: </strong></span> <span
                                                                class="range-inputs">
                              <input id="rentArea-input-0" name="min_area" value="Min" type="text">
                              <input id="rentArea-input-1" name="max_area" value="Max" type="text">
                              </span></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right clearfix">
                                                <button type="submit" class="btn btn-default btn-style">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="searchProjectsTab" class="tab-pane fade in ">
                                    <form class="navbar-form navbar-left" action="/property" role="search">
                                        <div class="row srch-flds">
                                            <div class="col-md-12 form-select">
                                                <input type="text" class="input inputid" placeholder="Property ID">
                                                <input type="text" name="search_purpose" value="4" hidden>
                                            </div>
                                            <div class="col-md-12 form-select">
                                                <select class="form-control selectpicker city" name="city_id"
                                                        title="---- Select City ----" id="city3">
                                                    @foreach($cities as $city)
                                                    <option data-icon="fa fa-map-marker" value="{{ $city->id }}">
                                                        {{$city->name}}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-6 form-select">
                                                <select class="form-control selectpicker town" name="property_type" title="---- Select Property Type ----" id="radiusSelect4" data-selected-text-format="count > 5" >
                                                    @foreach($propertyTypes as $propertyType)
                                                        <optgroup label="{{$propertyType->name}}">
                                                            @foreach($data[$propertyType->id] as $datas)
                                                                <option value="{{$datas->id}}">{{$datas->name}}</option>
                                                            @endforeach
                                                            <hr>
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div> -->
                                            <div class="col-md-12 form-select">
                                                <select class="form-control selectpicker show-menu-arrow"
                                                        title=" ---- Select location ----" id="town3" name="town_id"
                                                        data-live-search="true" data-selected-text-format="count > 5">

                                                </select>
                                            </div>
                                            <div class="col-md-12 range-wraper">
                                                <div class="col-md-6 rang-slider">
                                                    <div id="projectsPriceRange"
                                                         class="noUi-target noUi-rtl noUi-horizontal"></div>
                                                    <div class="prices-wraper"><span
                                                                class="price"><strong> Price: </strong></span> <span
                                                                class="range-inputs">
                                                      <input id="projectsPrice-input-0" value="Min" name="min_price"
                                                             type="text">
                                                      <input id="projectsPrice-input-1" value="Max" name="max_price"
                                                             type="text">
                                                      </span></div>
                                                </div>
                                                <div class="col-md-6 rang-slider rang-slider-next">
                                                    <div id="projectsAreaRange"
                                                         class="noUi-target noUi-rtl noUi-horizontal"></div>
                                                    <div class="prices-wraper"><span
                                                                class="price"><strong> Area: </strong></span> <span
                                                                class="range-inputs">
                                              <input id="projectsArea-input-0" value="Min" name="min_area" type="text">
                                              <input id="projectsArea-input-1" value="Max" name="max_area" type="text">
                                              </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-default btn-style">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="searchWantedTab" class="tab-pane fade in ">
                                    <form class="navbar-form navbar-left" action="/property" role="search">
                                        <div class="row srch-flds">
                                            <div class="col-md-12 form-select">
                                                <input type="text" class="input inputid" placeholder="Property ID">
                                                <input type="text" name="search_purpose" value="3" hidden>
                                            </div>
                                            <div class="col-md-6 form-select">
                                                <select class="form-control selectpicker city" name="city_id"
                                                        title="---- Select City ----" id="city4">
                                                    @foreach($cities as $city)
                                                    <option data-icon="fa fa-map-marker" value="{{ $city->id }}">
                                                        {{$city->name}}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-select">
                                                <select class="form-control selectpicker" name="property_type"
                                                        title="---- Select Property Type ----" id="radiusSelect4"
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
                                            <div class="col-md-12 form-select">
                                                <select class="form-control selectpicker show-menu-arrow town"
                                                        title=" ---- Select Locations ----" data-live-search="true"
                                                        id="town4" name="town_id" data-selected-text-format="count > 5">

                                                    <!-- <option value="">DHA PHASE 1</option> -->

                                                    <!--      <option value="2" data-tokens="DHA" data-icon="fa fa-map-marker" data-subtext="Lahore">DHA PHASE 3</option> -->
                                                </select>
                                            </div>
                                            <div class="col-md-12 range-wraper">
                                                <div class="col-md-6 rang-slider">
                                                    <div id="wantedPriceRange"
                                                         class="noUi-target noUi-rtl noUi-horizontal"></div>
                                                    <div class="prices-wraper"><span
                                                                class="price"><strong> Price: </strong></span> <span
                                                                class="range-inputs">
                              <input id="wantedPrice-input-0" value="Min" name="min_price" type="text">
                              <input id="wantedPrice-input-1" value="Max" name="max_price" type="text">
                              </span></div>
                                                </div>
                                                <div class="col-md-6 rang-slider rang-slider-next">
                                                    <div id="wantedAreaRange"
                                                         class="noUi-target noUi-rtl noUi-horizontal"></div>
                                                    <div class="prices-wraper"><span
                                                                class="price"><strong> Area: </strong></span> <span
                                                                class="range-inputs">
                              <input id="wantedArea-input-0" value="Min" name="min_area" type="text">
                              <input id="wantedArea-input-1" value="Max" name="max_area" type="text">
                              </span></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right clearfix">
                                                <button type="submit" class="btn btn-default btn-style">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

    <!--<section class="page-section counter-section">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12 padding-left padding-right">-->

    <!--                <div class="col-md-3 text-center">-->
    <!--                    <div class="col-md-12 counter-area" style="border: 1px solid rgba(30, 179, 0, 0.61);">-->
    <!--                        <span class="counter"-->
    <!--                              style="display: inline-block; width: 100%; color: rgba(30, 179, 0, 0.61);">3{{$statictics->total_properties}}</span>-->
    <!--                        <h5 style="color: rgba(30, 179, 0, 0.61);">Property Listing</h5>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--                <div class="col-md-3 text-center">-->
    <!--                    <div class="col-md-12 counter-area" style="border: 1px solid #fd7777;">-->
    <!--                        <span class="counter" style="display: inline-block; width: 100%; color: #fd7777;">{{$statictics->total_towns}}</span>-->
    <!--                        <h5 style="color: #fd7777;">Locations Covered</h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-3 text-center">-->
    <!--                    <div class="col-md-12 counter-area" style="border: 1px solid rgba(0, 152, 255, 0.65) ;">-->
    <!--                        <span class="counter"-->
    <!--                              style="display: inline-block; width: 100%; color: rgba(0, 152, 255, 0.65);">{{$statictics->total_cities}}</span>-->
    <!--                        <h5 style="color: rgba(0, 152, 255, 0.65);">Cities Covered</h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-3  text-center">-->
    <!--                    <div class="col-md-12 counter-area" style="border: 1px solid rgba(250, 105, 25, 0.76);">-->
    <!--                        <span class="counter"-->
    <!--                              style="display: inline-block; width: 100%; color: rgba(250, 105, 25, 0.76);">{{$statictics->total_estate_agent}}</span>-->
    <!--                        <h5 style="color: rgba(250, 105, 25, 0.76);">Estate Agents</h5>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- featured-properties section -->
    <!--    <section class="slider main-slider">
            <div class="container">
            @include('home.featured_properties')

            </div>
        </section> -->
    <!-- latest-properties section -->
    <section class="page-section latest-properties">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @include('home.latest_properties')
                    </div>
                    <div class="col-md-3 verticalCarousel locations">
                        <div class="col-md-12">
                            <h3><i class="fa fa-map-marker color"></i> Top<span class="color"> Locations</span></h3>
                            <div class="verticalCarouselHeader"><a href="#" class="vc_goDown"><i
                                            class="fa fa-fw fa-angle-up"></i></a></div>
                            <ul class="verticalCarouselGroup list-group vc_list">
                                @foreach($locations as $location)
                                <li class="list-group-item">
                                    <h5><a class="color-black" href="/property/location/{{$location->name}}">{{$location->name}}
                                            <span class="pull-right">{{$location->number}}</span></a></h5>
                                </li>
                                @endforeach
                            </ul>
                            <div class="verticalCarouselFooter text-center"><a href="javascript:void(0)"
                                                                               class="vc_goUp"><i
                                            class="fa fa-fw fa-angle-down"></i></a></div>
                        </div>
                        {{--
                        <div class="col-md-12 mb-20"><img class="img-responsive" src="assets/images/img2.jpg"></div>
                        --}}
                        {{--
                        <div class="col-md-12 mb-20"><img class="img-responsive" src="assets/images/img2.jpg"></div>
                        --}}
                        <div class="col-md-12 fb-twit-tabs">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="active"><a data-toggle="tab" href="#facebook">Facebook</a></li>
                                <li><a data-toggle="tab" href="#twitter">Twitter</a></li>
                            </ul>

                            <div class="tab-content text-center">
                                <!--<div id="facebook" class="tab-pane fade in active">-->
                                <!--    <div class="fb-page"-->
                                <!--         data-href="https://www.facebook.com/rightdeedcom-170312050190930"-->
                                <!--         data-tabs="timeline" data-small-header="false"-->
                                <!--         data-adapt-container-width="true" data-hide-cover="false"-->
                                <!--         data-show-facepile="true">-->
                                <!--        <blockquote cite="{{Config::get(" name.social_media.facebook-->
                                <!--        ")}}" class="fb-xfbml-parse-ignore"><a-->
                                <!--                href="https://www.facebook.com/rightdeedcom-170312050190930">Facebook</a></blockquote>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div id="facebook" class="tab-pane fade in active ">
                                    <div class="fb-page"
                                         data-href="https://www.facebook.com/rightdeedcom-170312050190930/"
                                         data-tabs="timeline" data-small-header="false"
                                         data-adapt-container-width="true" data-hide-cover="false"
                                         data-show-facepile="true">
                                        <blockquote cite="{{Config::get(" name.social_media.facebook
                                        ")}}" class="fb-xfbml-parse-ignore">
                    
                                             <a href="https://www.facebook.com/rightdeedcom-170312050190930/">Facebook</a>
                                        </blockquote>
                                    </div>
                                    
                                </div>
                                <div id="twitter" class="tab-pane fade ">
                                    <a class="twitter-timeline" data-height="500" data-dnt="true" href="{{Config::get("name.social_media.twitter")}}">Tweets by TwitterDev</a>
                                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>
                            </div>
                        </div>
<h2>Lahore</h2> 
  @foreach($lahore_towns as $town)
<h5><a class="color-black" href="/property/lahore/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">{{$town->name}}({{$town->number}})

  @endforeach

  <h2>Karachi</h2>  
  @foreach($karachi_towns as $town)
<h5><a class="color-black" href="/property/karachi/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">{{$town->name}}({{$town->number}})

  @endforeach


  <h2>Islamabad</h2>  
     
  @foreach($isl_towns as $town)
<h5><a class="color-black" href="/property/islamabad/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">{{$town->name}}({{$town->number}})

  @endforeach

@if($lahore_towns_plot != null )
  <h2>Lahore plot</h2>  
     
  @foreach($lahore_towns_plot as $town)
<h5><a class="color-black" href="/property/lahore-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">{{$town->name}}({{$town->number}})
    
  @endforeach
@endif
@if($karachi_towns_plot != null )
    <h2>Karachi plot</h2>  
    @foreach($karachi_towns_plot as $town)
    <h5><a class="color-black" href="/property/karachi-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">{{$town->name}}({{$town->number}})
@endforeach
@endif

@if($isl_towns_plot != null )

  <h2>Islamabad plot</h2>  
     
  @foreach($isl_towns_plot as $town)
<h5><a class="color-black" href="/property/islamabad-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">{{$town->name}}({{$town->number}})
  @endforeach
@endif






                        <div class="col-md-12 mb-20 forum-discussions">
                            <h3><i class="fa fa-comments color"></i> Recent<span class="color"> Forums</span></h3>
                            <ul class="list-unstyled">
                                @foreach($forum_discussions as $forum)

                                <!-- <li><a class="color" href="/forums/discussion/{{$forum->category}}/{{$forum->slug}}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
 <span class="color">{{$forum->title}}</span></a></li> -->

                                <li><a href="/forums/discussion/{{$forum->category}}/{{$forum->slug}}"><span><i
                                                    class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                        <span>{{$forum->title}}</span></a></li>

                                @endforeach
                            </ul>
                            <a href="/forums" class="mb-20 view-more text-center"><i class="fa fa-external-link"></i>
                                More Discussions</a>
                        </div>


                    </div>
                    <!--   <div class="col-md-12 view-more-wraper text-center margin-top"> <a href="#" class="view-more">View More <i class="fa fa-home"></i></a> </div> -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="featured_agencies">
        {{--@foreach($featured_agencies as $agencies)
            <pre>
            {{print_r($agencies)}}
            </pre>
        @endforeach--}}
        
    </section>
    <!-- Projects section -->
    @include('home.projects')
     
    

    <!-- projects ends here -->

    <!-- AGENCIES here -->
    <!--    <section class="page-section agencies">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 features">
                        <figure class="pull-left home-icon"><img src="assets/images/home-icon4.jpg"> </figure>
                        <div class="feature-heading pull-left">
                            <h2>FEATURED <span> AGENCIES</span></h2>
                            <p>Browse featured agencies with properties online</p>
                        </div>
                    </div>
                    <div class=" features">
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo2.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo2.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
                                <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
                                <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 view-more-wraper text-center margin-top"> <a href="#" class="view-more">Load More <i class="fa fa-refresh"></i></a> </div>
                </div>
            </div>
        </section> -->
    <!-- company logos section ends -->

    <!-- subscribe News Letter -->
    <section class="page-section blogs">
        <div class="container">
            @include('home.blog')
        </div>
    </section>
{{--@include('home.agencies')--}}
    <!--<section class="page-section">-->
    <!--    <div class="subscribe">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                <form action="/subscribeme" id="submit_form">-->

    <!--                    <div class=" subscribe-wraper">-->
    <!--                        <div class="input-group">-->
    <!--                            <input type="text" class="form-control" id="sub_email" name="email"-->
    <!--                                   placeholder="Enter your email">-->
    <!--                            <span class="input-group-btn">-->
                <!--            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>-->
    <!--          <button class="btn btn-theme subscribe_email">Subscribe</button>-->
    <!--          </span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--            <div id='loadingmessage' style="display: none">-->
    <!--                <img src='/images/smile_d.gif' style="width: 114px;"/>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- blogs started -->
    <!-- <section class="page-section blogs">
        <div class="container">
            @include('home.blog')
        </div>
    </section> -->
    <!--<section class="page-section quick-access-wraper">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-9">-->
    <!--                <div class="col-md-12 features">-->
    <!--                    <div class="feature-heading">-->
    <!--                        <figure class="pull-left home-icon"><img src="assets/images/home-icon6.jpg"></figure>-->

    <!--                        <h2>A QUICK <span>GLANCE</span></h2>-->
    <!--                        <span>At what RightDeed has in store for you!</span>-->
    <!--                    </div>-->


    <!--                    <div class="quick-access" style="height:480px">-->
    <!--                        <ul>-->
    <!--                            <li>-->
    <!--                                <h3>Buying Properties in Pakistan</h3>-->
    <!--                                <p>Purchasing real estate in an upscale area is a dream for every Pakistani and-->
    <!--                                    rightdeed.com helps you fulfill that dream in the best way possible. Our catalog-->
    <!--                                    comprises of properties from all across the Pakistan as we consider it our job-->
    <!--                                    to make the house-hunt easier for you.</p>-->
    <!--                                <a class="btn-style details" href=-->
    <!--                                @if(App\User::checkAgent(Auth::id()))-->
    <!--                                "/dashboard/property/add"-->

    <!--                                @else-->
    <!--                                "/dashboard/quick/add/Property"-->

    <!--                                @endif>List your Property Now</a>-->
    <!--                            </li>-->

    <!--                            <li>-->
    <!--                                <h3>Selling Pakistan Real Estate</h3>-->
    <!--                                <p>Selling property is a huge decision. So huge that most Pakistanis take this-->
    <!--                                    decision only once in their lifetime. If you are looking to get a good deal on-->
    <!--                                    your home, there is no better place than rightdeed.com to advertise your home.-->
    <!--                                    Our advertising options are endless and will help you find quick buyers for your-->
    <!--                                    home.</p>-->
    <!--                                <a class="btn-style details" href=-->
    <!--                                @if(App\User::checkAgent(Auth::id()))-->
    <!--                                "/dashboard/property/add"-->

    <!--                                @else-->
    <!--                                "/dashboard/quick/add/Property"-->

    <!--                                @endif>List your Property Now</a>-->
    <!--                            </li>-->
    <!--                            <li>-->
    <!--                                <h3>Renting Properties in Pakistan</h3>-->
    <!--                                <p>Pakistan has a rich real estate market and most of its richness comes from the-->
    <!--                                    renters. Since the majority of working class in our big cities is from less-->
    <!--                                    privileged areas, they are always in need of a home for rental homes. At-->
    <!--                                    rightdeed.com, you can have access to all those home.</p>-->
    <!--                                <a class="btn-style details" href=-->
    <!--                                @if(App\User::checkAgent(Auth::id()))-->
    <!--                                "/dashboard/property/add"-->

    <!--                                @else-->
    <!--                                "/dashboard/quick/add/Property"-->

    <!--                                @endif>List your Property Now</a>-->
    <!--                            </li>-->
    <!--                            <li>-->
    <!--                                <h3>New Projects</h3>-->
    <!--                                <p>Rightdeed.com keeps you updated on all the new projects taking place all across-->
    <!--                                    Pakistan. Be it Karachi, Islamabad, Lahore, Rawalpindi, or some far off areas-->
    <!--                                    that no one has ever heard of, you’ll find everything about those projects-->
    <!--                                    here.</p>-->
    <!--                                <a class="btn-style details" href=-->
    <!--                                @if(App\User::checkAgent(Auth::id()))-->
    <!--                                "/dashboard/property/add"-->

    <!--                                @else-->
    <!--                                "/dashboard/quick/add/Property"-->

    <!--                                @endif>List your Property Now</a>-->
    <!--                            </li>-->
    <!--                            <li>-->
    <!--                                <h3>What Our Online Portal Holds For You?</h3>-->
    <!--                                <p>Rightdeed.com aims to revolutionize the real sector of Pakistan by putting all-->
    <!--                                    the real estate related info (buying, selling, renting) on one platform. We-->
    <!--                                    connect with buyers, sellers, investors, builders, developers, and what not to-->
    <!--                                    bring you the latest property updates.</p>-->
    <!--                            </li>-->
    <!--                        </ul>-->

    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 text-center q-acces image-zoommain">-->
    <!--                <div class="col-md-12 img-topimg">-->
    <!--                    <p>New app version released Download <span>RightDeed</span> app for free</p>-->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-6 android-banner padding-left">-->
    <!--                        <img class="img-responsive zoom" src="assets/images/apple-banner.png">-->
    <!--                    </div>-->
    <!--                    <div class="col-md-6 col-sm-6 col-xs-6 apple-banner padding-right">-->
    <!--                        <a href="https://play.google.com/store/apps/details?id=waleedasim.rightdeed&hl=en"-->
    <!--                           target="_blank">-->
    <!--                            <img class="img-responsive zoom" src="assets/images/android-banner.png">-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                    <div class="update-deviceimage">-->
    <!--                        <p>Keep yourself <span>uptodate</span></p>-->
    <!--                        <p style="font-size:14px">with the exclusive property news.</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                {{---->
    <!--                <div class="col-md-12">-->
    <!--                    <img class="img-responsive" src="assets/images/img2.jpg">-->
    <!--                </div>-->
    <!--                --}}-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
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
    <!--  <section class="page-section" style="padding-bottom:0">
        <div class="subscribe">
            <div class="container">
                <div class="mobile-apps">
                    <ul class="list-inline">
                        <li><img width="135" src="/android.png" /></li>
                        <li><img width="135" src="/ios.png" /></li>
                    </ul>
                </div>
                <div class="row">
                    <form action="/subscribeme" id="submit_form">

                        <div class=" subscribe-wraper">
                            <div class="input-group">
                                <input type="text" class="form-control" id="sub_email" name="email"
                                       placeholder="Enter your email">
                                <span class="input-group-btn">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <button class="btn btn-theme subscribe_email">Subscribe</button>
              </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div id='loadingmessage' style="display: none">
                    <img src='/images/smile_d.gif' style="width: 114px;"/>
                </div>
            </div>
        </div>
    </section> -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
  $('#city2').change(function () {
    loadTowns(2);
  });
  $('#city3').change(function () {
    loadTowns(3);
  });
  $('#city4').change(function () {
    loadTowns(4);
  });
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


