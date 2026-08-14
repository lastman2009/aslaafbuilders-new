@php
$title = "Detail - $property->title";
@endphp
@include("includes.title")
<link rel="stylesheet" type="text/css" media="all" href="/js/tilezoom/jquery.tilezoom.css"/>

<style>
.plural {
    font-weight: normal !important;
    text-transform: lowercase;
    font-style: normal;
    margin: 0 -20px !important;
    display: inline-block !important;
    padding: 0 !important;
}
.atif{
    margin-top: 10px;
}
</style>

<style>
.view-agent-details .img-circle {
    width: 120px;
    height: 110px;
    margin-right: 30px;
}
.paddingtb{
    padding-top: 0;
    padding-bottom: 20px;
}
#home,#menu1,#menu0,#menu2,#menu3{
    float: left;
    width: 100%;
    height: auto;
    padding-top: 50px;
}
.property-scroll{
    position; relative;
}
.nav-float {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999;
    left: 0;
    background: #fffcfc;
    padding: 20px 0;
}
.property-scroll li a.active {
    background: #fa6919 !important;
    color: #fff !important;
}
.prop-detail-page ul.nav{
    background: transparent;
    border: none;
    text-align: center;
}
.prop-detail-page .nav-tabs > li {
    display: inline-block;
    float: none;
}
.prop-detail-page .nav-tabs > li a {
    color: #000;
    background: transparent;
    margin-right: 15px;
    padding: 15px 40px;
    border: 1px solid #c1c1c1;
    border-radius: 5px;
}
.calculator-headings span{
    display: inline-block;
    background: #fa6919;
    border: 1px solid #fa6919;
    color: #fff;
    padding: 15px 22px;
    border-radius: 8px;
    font-size: 18px;
}
.calculator-headings img{
    padding-right: 15px;
}
.calculator-headings h3{
    margin: 20px 0 30px 0;
    font-size: 24px;
}
.calculator-headings p{
    color: #000;
    font-size: 16px;
    margin-bottom: 20px;
}
.calculator-headings form{
    float: left;
    width: 100%;
    background: #f5f5f5;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 2px 2px 7px #a59c9c;
}
.calculator-headings .form-group{
    float: left;
    width: 100%;
    margin-bottom: 0;
}
#svg {
    width: 500px;
    height: 300px;
}
.donut-graph{
    float: left;
    width: 100%;
    height: 400px;
    display: none;
}
.btn-calculate{
    padding: 10px 40px;
    margin-top: 25px;
    background: #fa6919;
    border: 1px solid #fa6919;
    font-size: 18px;
}
.btn-calculate:hover,.btn-calculate:focus{
    padding: 10px 40px;
    margin-top: 25px;
    background: #fa6919;
    border: 1px solid #fa6919;
    font-size: 18px;
}
#chartdiv {
    width: 100%;
    height: 500px;
    font-size: 11px;
}

.amcharts-pie-slice {
    transform: scale(1);
    transform-origin: 50% 50%;
    transition-duration: 0.3s;
    transition: all .3s ease-out;
    -webkit-transition: all .3s ease-out;
    -moz-transition: all .3s ease-out;
    -o-transition: all .3s ease-out;
    cursor: pointer;
    box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
    transform: scale(1.1);
    filter: url(#shadow);
}
.property-scroll .main-section{
    margin-top: 105px;
}
.view-agent-details h2{
    font-size: 22px;
    font-weight: bold;
}
.view-agent-details .btn-prop{
    width: 75%;
}
.pg-map{
    width: 100%;
    float: left;
    padding: 30px 0 0px 0;
}
.feature-page .panel-group .panel {
    margin-bottom: 10px;
}
.feature-page .panel-group {
    margin-bottom: 0;
}
.calculator-headings .form-group{
    float: left;
    width: 100%;
    background: #f5f5f5;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 2px 2px 7px #a59c9c;
    border: 1px solid #e0dddd;
}
.calculator-headings .field {
    display: block;
    background: #fa6919;
    border: 1px solid #fa6919;
    color: #fff;
    padding: 6px 12px;
    border-radius: 5px;
    font-size: 18px;
    height: 39px;
}
.cost-property{
    width: 100%;
    margin-bottom: 15px;
}
.cost-property td{
    line-height: 35px;
    font-weight: bold;
    font-size: 27px;
}
.cost-property td.td-price{
    width: 20%;
}
#message{
    resize: none;
}
@media only screen and (max-width: 991px){
    .pt15{
        padding-top: 15px;
    }
    .td-price{
        width: 15%;
    }
}
.overview-img:hover img{
    content: url('/assets/images/Overview-white.png');
    transition: all 0.3s linear 0s;
}
.feature-img:hover img{
    content: url('/assets/images/Features-(White).png');
    transition: all 0.3s linear 0s;
}
.nearby-img:hover img{
    content: url('/assets/images/nearby-white.png');
    transition: all 0.3s linear 0s;
}
.overview-img.active img{
    content: url('/assets/images/Overview-white.png');
    transition: all 0.3s linear 0s;
}
.feature-img.active img{
    content: url('/assets/images/Features-(White).png');
    transition: all 0.3s linear 0s;
}
.nearby-img.active img{
    content: url('/assets/images/nearby-white.png');
    transition: all 0.3s linear 0s;
}
.area-map h3{
    margin-bottom: 20px;
}
.area-map h3 span {
    text-transform: uppercase;
    background: #eeeeee;
    padding: 10px 20px;
    font-style: italic;
    font-weight: bold;
    font-size: 22px;
}
#container1 {
/*width: 100%;
*/height: 600px;
background-color: white;
border: 1px solid #ececec;
color: white; /* for error messages, etc. */
/*margin: 0 auto;*/
}
#content {
    max-width: 100%;
    width: 100%;
    padding: 0;
    border-radius: 0;
    border: none;
}
#content div.form-item {
    width: 100%;
    overflow: hidden;
    padding: 0.2em 0;
}

#content label {
    display: block;
    float: left;
    width: 100px;
}
</style>
<style>
.tabcontent {
    display: none;
}
.area-map {
    padding: 0;
}
.tablinks {
    background-color: #fff !important;
    color: #000;
    margin-right: 15px;
    padding: 0px;
    border: 1px solid #c1c1c1;
    border-radius: 5px;
    height: 60px !important;
    line-height: 60px;
    width: 200px;
    cursor: pointer;
    font-size: 20px;
    text-align: center;

}
.tablinks.active {
    background-color: #fa6919 !important;
    color: #fff;
}
.maps-tabs.on-map{
    background-color: rgba(0,0,0,.65) !important;
    padding: 5px !important;
    border: 1px solid #fff !important;
    height: 92px !important;
}
.maps-tabs.on-map img:first-child{
    margin-right: 3px
}
.maps-tabs.out-map{
    text-align: left !important;
}

/*agency image */
span.chatter_avatar_circle {
    width: 85%;
    height: 130px;
    line-height: 130px;
    text-align: center;
    background: #263238;
    display: inline-block;
    border-radius: 0px;
    color: #fff;
    font-size: 75px;
    border-radius: 35px;
}
</style>

<!-- Main Starts -->
@php
$property_type_array = ["25","26","27","28","29","30","31"]; 
$Property_type_commercial=["13",'14','15','16','17','18','19','20','21','22','23','24'];
@endphp
<div class="property-scroll" data-spy="scroll" data-target=".navbar" data-offset="50">
    <main class="main-section prop-detail-page">


        <div class="container">
            <div id="myHeader">
                <ul class="nav nav-tabs property-nav">
                    <li><a class="overview-img" href="#home" class="active"><img src="/assets/images/Overview-black.png" style="margin-right: 10px;"/>Overview</a>
                    </li>
                    @if($property->frequent_add != 1)
                    <li><a class="feature-img" href="#menu1"><img src="/assets/images/Features-(Black).png" style="margin-right: 10px;"/>Features</a>
                    </li>
                    <li style="display:none"><a href="#menu0">Calculator</a>
                    </li>
                    <li><a class="nearby-img" href="#menu2"><img src="/assets/images/nearby-512.png" style="margin-right: 10px;" />Nearby</a>
                    </li>
                    @endif
                    @if($property->purpose == 4)
                    <li><a href="#menu3">Property Schemes</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <section class="page-section pbbottom ptop">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div id="home">
                                <section class="page-section ptop">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-right:0">
                                            <div class="col-md-6 col-sm-12 col-xs-12" style="padding-left:0">
                                                <div class="slider blog-slider">
                                                    <div class="demo">
                                                        <ul id="lightSlider">

                                                            @if($property->gallery != null)
                                                            <?php
                                                            $images =explode(';', $property->gallery)
                                                            ?>
                                                            @foreach($images as $image)
                                                            <li data-thumb= "<?php echo asset("/images/property/user_property/thumb_$image");?>">
                                                                <img src="<?php echo asset("/images/property/user_property/original_$image");?>"/>
                                                                <a download="property_{{$image}}" href="<?php echo asset("/images/property/user_property/original_$image");?>" class="save-img"><i class="fa fa-download"></i></a>
                                                            </li>
                                                            @endforeach
                                                            @else
                                                            @if(in_array($property->property_type_id ,$property_type_array))
                                                            <li > <img src="https://maps.googleapis.com/maps/api/staticmap?center={{$property->latitude}},{{$property->longitude}}&markers=color:orange%7Clabel:R%7C{{$property->latitude}},{{$property->longitude}}&zoom=12&size=512x384&sensor=true&key=AIzaSyBq8gdCcmzERDnikFG5ZXPT2cl_HBIXEWY"/> </li>
                                                            @else
                                                            <li data-thumb="<?php echo asset("/assets/images/img1.jpg");?>"> <img src="<?php echo asset("/assets/images/img1.jpg");?>"/> <a class="save-img" href="#"><i class="fa fa-download"></i></a> </li>
                                                            @endif
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <h3>{{$property->title}}</h3>
                                                    <p>{{$property->address}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-12 col-xs-12 col-sm-12 col-xs-12 col-md-offset-1 pull-right feature-summery" style="padding-left:0">
                                                <div class="features pt15">
                                                    <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
                                                    <div class="feature-heading pull-left">
                                                        <h2>Salient<span> Features</span></h2>
                                                        <p>Pakistan's Best Property Portal.</p>
                                                    </div>

                                                    <table class="cost-property">
                                                        @if($property->purpose != 4)
                                                        <tr>
                                                            <td class="td-price">Price:</td>
                                                            <td class="color"><strong>Rs {{number_format($property->price)}}</strong>

                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </table>


                                                </div>
                                                <table class="prop-detail-table" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Property ID</td>
                                                            <td> {{$property->id}}</td>
                                                        </tr>
                                                        @if($property->purpose != 4)
                                                        <tr>
                                                            <td>Property Type</td>
                                                            <td>{{App\Property::getPropertyType($property->property_type_id)}}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>{{App\Property::getPurpose($property->purpose)}}</td>
                                                        </tr>
                                                        @if($property->purpose != 4)
                                                        <tr>
                                                            <td>Area span</td>
                                                            <td>{{$property->area}} {{$property->area_type}}</td>
                                                        </tr>
                                                        @else
                                                        <tr>
                                                            <td>Residential Area </td>
                                                            <td>{{$property->min_area_residential}} {{$property->min_area_type_residential}}  - {{$property->max_area_residential}} {{$property->max_area_type_residential}} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Commercial Area </td>
                                                            <td>{{$property->min_area_commercial}} {{$property->min_area_type_commercial}}  - {{$property->max_area_commercial}} {{$property->max_area_type_commercial}} </td>
                                                        </tr>
                                                        @endif

                                                        <tr>
                                                            <td>Published</td>
                                                            <td>{{App\Property::time_elapsed_string($property->created_at)}}</td>
                                                        </tr>
                                                        @if($property->frequent_add != 1)
                                                        <tr>
                                                            <td>Completed in</td>
                                                            @if($property->construction_year == 0)
                                                            <td>-</td>
                                                            @else
                                                            <td>{{$property->construction_year}}</td>
                                                            @endif
                                                        </tr>
                                                        @if($property->purpose != 4)
                                                        <tr>
                                                            <td>Ownership </td>
                                                            @if($property->ownership_status == "")
                                                            <td>-</td>
                                                            @else
                                                            <td>{{$property->ownership_status}}</td>
                                                            @endif

                                                        </tr>
                                                        <tr>
                                                            <td>Occupancy Status</td>
                                                            @if($property->occupancy_status == "")
                                                            <td>-</td>
                                                            @else
                                                            <td>{{$property->occupancy_status}}</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Construction Status </td>
                                                            @if($property->construction_status == "")
                                                            <td>-</td>
                                                            @else
                                                            <td>{{$property->construction_status}}</td>
                                                            @endif
                                                        </tr>
                                                        @endif
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <div class="mailsave-btn"> <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email" class="btn-prop">Tell a friend</a>
                                                    <div id="popover-content-email" class="hide">
                                                        <form action="/tell_friend" class="form-inline" role="form" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="form-group text-center">
                                                                <input class="headerSearch search-query" id="" name="email" type="email" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;" required />
                                                                <input type="text" name="url" value="{{$property->url}}" hidden />
                                                                <input type="text" name="id" value="{{$property->id}}" hidden />

                                                                <input class="btn btn-primary btn-xs" id="phSearchButton" type="submit" value="Send" style="width: 100%;height: 25px;background: #fa6919 ;border: 1px solid #fa6919 ;"/>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    @if(Auth::check())
                                                    <a class="btn-prop bg-orange tst1 btn btn-info" data-id="{{$property->id}}" id="saveProperty">Save property</a>
                                                    @else
                                                    <a class="btn-prop bg-orange tst1 btn btn-info" data-toggle="modal" data-target="#fsModal2">Save property</a>
                                                    @endif
                                                </div>
                                                <div class="shareon-property text-center">
                                                    <hr>
                                                    <span class="pull-left">Share</span>
                                                    <ul class="social-blog-share pull-right">
                                                        <li>
                                                            <a class="share-button btn btn-facebook" data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="facebook" data-share-text="Share on Facebook" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
                                                                @else
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
                                                                @endif href="#">
                                                                <i class="fa fa-facebook" style="color: #fff;"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-button btn btn-twitter" data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="twitter" data-share-text="Share on twitter" data-share-title="<?= $property->title ?>" data-share-via="jqueryscript" data-share-tags="" @if($property->gallery != "")
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
                                                                @else
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
                                                                @endif>
                                                                <i class="fa fa-twitter" style="color: #fff;"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-button btn btn-google" data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="googleplus" data-share-text="Share on Google+" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
                                                                @else
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
                                                                @endif href="#">
                                                                <i class="fa fa-google-plus" style="color: #fff;"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-button btn btn-linkedin" data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="linkedin" data-share-text="Share on LinkedIn" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
                                                                @else
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
                                                                @endif href="#">
                                                                <i class="fa fa-linkedin" style="color: #fff;"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-button btn btn-pinterest" data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="pinterest" data-share-text="Share on Pinterest" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
                                                                @else
                                                                data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
                                                                @endif href="#">
                                                                <i class="fa fa-pinterest" style="color: #fff;"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="page-section pbbottom ptop">
                                    <div class="col-md-12 pleft">
                                        <div class="col-md-8 col-sm-12 col-xs-12 pleft">
                                            <section class="page-section quick-access-wraper ptop">
                                                <div class="col-md-12 col-sm-12 col-xs-12 pleft">
                                                    <div class="col-md-12 pleft features">
                                                        <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
                                                        @php
                                                        $type="";
                                                        if(in_array($property->property_type_id ,$property_type_array))
                                                        {
                                                            $type = "Plot";
                                                        }
                                                        else if($property->purpose == 4)
                                                        {
                                                            $type = "Project";
                                                        }
                                                        else
                                                        {
                                                            $type = "Property";
                                                        }
                                                        @endphp

                                                        <h2 style="margin-bottom: 5px;">{{$type}}<span> overview </span></h2>
                                                        <p>Pakistan's Best Property Portal.</p>
                                                    </div>
                                                    <div class="overview quick-access" style="padding: 20px;line-height: 22px;">
                                                        <?= $property->description?>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 view-agent-details">
                                            <div class="">

                                                {{-- atif old code  --}}
{{--  <div class="col-md-4 col-sm-12 col-xs-12">
<figure>

@if($data['image'] != "")
<a href="#"><img id="myImg"  class="img-profile img-circle" src="/image/profile/{{$data['image']}}" ></a>
@else
<a href="#"><img id="myImg"  class="img-profile img-circle" src="/assets_admin/dist/img/user_thumb.jpg" ></a>
@endif

</figure>
</div> --}}
{{-- naqash new code for agency profile image  --}}
<div class="col-md-4 col-sm-12 col-xs-12">
    <figure>
        @if($prop != null)
        @if(strpos($prop->logo ,'anything-logo') !== false)
        <a href="/{{$prop->url}}"><span class="chatter_avatar_circle"
            style="background-color:#<?= substr(md5((string) $prop->agency_name), 0, 6) ?>">
            {{ strtoupper(substr($prop->agency_name, 0, 1)) }}
        </span></a>
        @else
        <a href="#"><img id="myImg"  class="img-profile img-circle" src="/image/logo/{{$prop['logo']}}" ></a>
        @endif
        @else
        @if($data['image'] != "")
        <a href="#"><img id="myImg"  class="img-profile img-circle" src="/image/profile/{{$data['image']}}" ></a>
        @else
        <a href="#"><img id="myImg"  class="img-profile img-circle" src="/assets_admin/dist/img/user_thumb.jpg" ></a>
        @endif
        @endif
    </figure>
</div>


<div class="col-md-8 col-sm-12 col-xs-12 text-center">
    <h2>{{$data['name']}}</h2>
    <!-- <div class="col-md-12"> <a class="color to-ag-pro" href="#">View Agency profile</a> </div> -->
    <div class="mailsave-btn">
        <div id="popover-content-send-email" class="hide">
            <form class="form-inline" role="form">
                <div class="form-group text-center">
                    <input class="headerSearch search-query" id="" name="" type="text" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;"/>
                    <input class="btn btn-primary btn-xs" id="phSearchButton" type="submit" value="Send" style="width: 100%;height: 25px;background: #fa6919 ;border: 1px solid #fa6919 ;"/>
                </div>
            </form>
        </div>
        <a class="btn-prop bg-orange view_number" data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" data-id="{{$property->id}}" id="numb">View Number</a>
        <div class="view_number_div" style="display: none;">
            <ul class="list-unstyled text-center">
                @if(!empty($data['mobile_no']))
                <li><h3>{{$data['mobile_no']}}</h3></li>
                @else
                <h3>No Contact Given</h3>
                @endif
            </ul>
        </div>
    </div>
</div>
</div>
<div class="form-area">
    <form role="form" action="/contactMessage" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
        </div>
        <input type="text"  name="property_id" value="{{$property->id}}" hidden>
        <input type="text"  name="user_id" value="{{$property->user_id}}" hidden>

        <div class="form-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
        </div>
        {{csrf_field()}}
        <div class="form-group">
            <textarea class="form-control" type="textarea" id="message" placeholder="Message" name="message" maxlength="140" rows="7" required></textarea>
        </div>
        <button type="submit" id="submit"  class="btn btn-primary pull-right">Contact Seller</button>
    </form>
</div>
</div>
</div>              
@if($map_image != null)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tab">
                <ul class="nav nav-tabs maps-tabs out-map">
                    <li class="tablinks " onclick="openCity(event, 'google_map')" >Google Map</li>
                    <li class="tablinks active" onclick="openCity(event, 'society_map')">Society Map</li>

                </ul>
            </div>
        </div>
    </div>          
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="map-button" style="position: absolute;right:26px;z-index: 99999999;top: 38px;">
                <ul class="nav nav-tabs maps-tabs on-map">
                    <img onclick="openCity(event, 'society_map')"img src="/dest/Phase-8_files/thumb.jpg" width="80px" height="80px">
                    <img onclick="openCity(event, 'google_map')"img src="/image/google-map-logo.png" width="80px" height="80px">
                </ul>
            </div>
            <div id="google_map" class="tabcontent">
                <section class="pg-map">
                    @if(!empty($property->latitude))
                    <div id="map" style="width: 100%; height: 500px"></div>
                    @endif
                </section>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="society_map" class="tabcontent col-md-12" style="display:block;">
            <section class="pg-map">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="margin-top: -23px;">
                            <div id="page">
                                <div id="main">
                                    <div id="content" class="clearfix" style="background:#fff;">
                                        <form enctype="multipart/form-data" method="post" accept-charset="UTF-8" action="">
                                            <div>
                                                <input type="hidden" name="image" id="edit-image" value="{{$map_image}}">
                                            </div>
                                        </form>
                                        <div id="container1" class="col-md-12"></div>
                                    </div>
                                </div>`
                            </div>  
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
{{--  </div> --}}
@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tab">
                <ul class="nav nav-tabs maps-tabs out-map">
                    <li class="tablinks active" onclick="openCity(event, 'google_map')" >Google Map</li>
                    {{-- <li class="tablinks active" onclick="openCity(event, 'society_map')">Society Map</li> --}}

                </ul>
            </div>
        </div>
    </div>          
</div>
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="map-button" style="position: absolute;right:26px;z-index: 99999999;top: 38px;">
                <ul class="nav nav-tabs maps-tabs on-map">
                    {{-- <img onclick="openCity(event, 'society_map')"img src="/dest/Phase-8_files/thumb.jpg" width="80px" height="80px"> --}}
                    <img onclick="openCity(event, 'google_map')"img src="/image/google-map-logo.png" width="80px" height="80px">
                </ul>
            </div>
            <div id="google_map" class="tabcontent" style="display: block">
                <section class="pg-map">
                    @if(!empty($property->latitude))
                    <div id="map" style="width: 100%; height: 500px"></div>
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>
@endif
</section>
<?php
$type="";
if($property->purpose == 4)
{
    $type="project";
}
else
{
    $type ="property";
}
?>
@if(!empty($property->video) || !empty($property->youtube_link))
<section class="page-section">
    <div class="row">
        <div class="col-md-12 usr-vid pa-0">
            @if(!empty($property->video) && !empty($property->youtube_link))
            <div class="col-md-6 utube-vid">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="/images/user_{{$type}}_video/{{$property->video}}" type="video/mp4" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6 up-vid">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{$property->youtube_link}}" allowfullscreen></iframe>
                </div>
            </div>
            @elseif(!empty($property->video) && empty($property->youtube_link))
            <div class="col-md-12 utube-vid">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="/images/user_{{$type}}_video/{{$property->video}}" type="video/mp4" allowfullscreen></iframe>
                </div>
            </div>

            @elseif(empty($property->video) && !empty($property->youtube_link))
            <div class="col-md-12 utube-vid">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{$property->youtube_link}}" allowfullscreen></iframe>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif


</div>
<div id="menu1">
    <section class="page-section feature-page" style="padding-bottom: 0">

        <div class="row">
            <div class="col-md-12 padding-right">
                <div class="features">
                    <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
                    <div class="feature-heading pull-left">
                        <h2>Main<span> Features</span></h2>

                        <p>Pakistan's Best Property Portal.</p>

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding-left">
                    <div class="panel-group" id="accordion">
                        @if(!in_array($property->property_type_id ,$property_type_array))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/fea_main.png"></figure>
                                        <span class="color"><strong>main</strong></span> features
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    @if($property->construction_year != 0)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Built in</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->construction_year}}</span> </div>

                                    </div>
                                    @endif

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Security black.png"></span><span> Security</span>
                                        </div>
                                        @if($property->security != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/elevator (1).png"></span><span> Elevator</span>
                                        </div>
                                        @if($property->elevator != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/opened-window-door-of-glasses (1).png"></span><span> Double Glazed windows</span>
                                        </div>
                                        @if($property->double_glazed_window != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/maintenance.png"></span><span> Maintenance</span>
                                        </div>
                                        @if($property->Maintenance != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/air-conditioner.png"></span><span>Central Air Conditioning</span>
                                        </div>
                                        @if($property->central_ac != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>

                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Heating.png"></span><span>Central Heating</span>
                                        </div>
                                        @if($property->central_heating != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>

                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Electricity Backup.png"></span><span>Electricity backup</span>
                                        </div>
                                        @if($property->electricity_backup != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->electricity_backup}}</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Floors.png"></span><span> floors</span>
                                        </div>
                                        @if($property->total_floor != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12">
                                            <span>{{$property->total_floor}}floor </span> 
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    @if($property->flooring != null)

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/flooring.png"></span><span>flooring</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->flooring}}</span> </div>
                                    </div>
                                    @endif

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/waste.png"></span><span>waste disposal</span>
                                        </div>
                                        @if($property->waste_disposal != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>

                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/parked-car.png"></span><span>parking</span>
                                        </div>
                                        @if($property->parking_space != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"><span>{{ $property->parking_space }} cars</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"><span> - </span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>          
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/Room Information.png"></figure>
                                        <span class="color"><strong>rooms</strong></span> information
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">

                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Kitchen.png"></span><span>kitchen</span><span class="plural">(s)</span>
                                        </div>
                                        @if($property->no_of_kitchens != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->no_of_kitchens}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Store Room.png"></span><span>store room</span><span class="plural">(s)</span>
                                        </div>
                                        @if($property->no_of_store_room != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->no_of_store_room}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Bathroom.png"></span><span>bathroom</span><span class="plural">(s)</span>
                                        </div>
                                        @if($property->bath != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->bath}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/muslim-prayer.png"></span><span>prayer room</span>
                                        </div>
                                        @if($property->prayer_room != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->prayer_room}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/bed.png"></span><span>bedroom</span><span class="plural">(s)</span>
                                        </div>
                                        @if($property->bed != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->bed}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    @if(!in_array($property->property_type_id ,$Property_type_commercial))
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">

                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/lounge-chair.png"></span><span>lounge/sitting room</span>
                                        </div>
                                        @if($property->lounge != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->lounge}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Loundry Room.png"></span><span>laundry room</span>
                                        </div>

                                        @if($property->laundry_room != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->laundry_room}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Gym.png"></span><span>gym</span>
                                        </div>
                                        @if($property->gym != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"><span>{{$property->gym}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"><span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Drawing Room.png"></span><span>drawing room</span>
                                        </div>
                                        @if($property->drawing_room != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->drawing_room}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Servant-Room.png"></span><span>servant quarter</span>
                                        </div>
                                        @if($property->servant_quarter  != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->servant_quarter }}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/study.png"></span><span>study room</span>
                                        </div>
                                        @if($property->study_room != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->study_room}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Steaming Room.png"></span><span>steaming room</span>
                                        </div>
                                        @if($property->sauna != null)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Powder.png"></span><span>powder room</span>
                                        </div>
                                        @if($property->powder_room != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->powder_room}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>                                                                                  
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsebusiness">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/Business and communication.png"></figure>
                                        <span class="color"><strong>Business </strong></span> And Communication
                                    </a>
                                </h2>
                            </div>
                            <div id="collapsebusiness" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">

                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Broadband Internet.png"></span><span>Broadband internet</span>
                                        </div>
                                        @if($property->internet != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->internet}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Intercom.png"></span><span>Intercom</span>
                                        </div>

                                        @if($property->intercom != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->intercom}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Community Club.png"></span><span>Community Club</span>
                                        </div>
                                        @if($property->community_club != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->community_club}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Satellite.png"></span><span>Satellite & Cable Tv</span>
                                        </div>
                                        @if($property->cabel_tv != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->cabel_tv}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapselifestyle">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/Life style and Luxury.png"></figure>
                                        <span class="color"><strong>Life Style </strong></span> And Luxury
                                    </a>
                                </h2>
                            </div>
                            <div id="collapselifestyle" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">

                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Jacuzzi.png"></span><span>Jacuzzi</span>
                                        </div>
                                        @if($property->jacuzzi != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->jacuzzi}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Furnished.png"></span><span>Furnished</span>
                                        </div>

                                        @if($property->furnished != 0)

                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->furnished}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">

                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Swimming.png"></span><span>Swimming Pool</span>
                                        </div>
                                        @if($property->swimming_pool != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->swimming_pool}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/garden.png"></span><span>Ground</span>
                                        </div>
                                        @if($property->ground != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->ground}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Lawn.png"></span><span>Lawn</span>
                                        </div>
                                        @if($property->lawn != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->lawn}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/sauna.png"></span><span>Sauna</span>
                                        </div>
                                        @if($property->sauna != 0)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->sauna}}</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($property->purpose != 4)
                        @if(!in_array($property->property_type_id ,$property_type_array))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/Extra_f.png"></figure>
                                        <span class="color"><strong>Extra</strong></span> features
                                    </a>
                                </h2>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Facility for Disabled.png"></span><span>Facility For Disabled</span>
                                        </div>
                                        @if($property->facility_disabled != null)

                                        <div class="col-md-5 col-sm-6 col-xs-12"><span>yes</span>
                                        </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"><span>-</span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/elevator (1).png"></span><span> Elevator</span>
                                        </div>
                                        @if($property->elevator != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/Conference.png"></span><span> Conference Room</span>
                                        </div>
                                        @if($property->conference_room != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span style="padding-right: 0;"><img style="width:25px" src="/assets/images/parked-car.png"></span><span> Visitor Parking</span>
                                        </div>
                                        @if($property->visitor_parking != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsethree">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/hotel.png"></figure>
                                        <span class="color"><strong>Plot</strong></span> features
                                    </a>
                                </h2>
                            </div>
                            <div id="collapsethree" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    @if($property->wide_carpeted_roads != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Carpeted Road</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->underground_sewerage_system != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Sewerage</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->underground_electricity_supply != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Electricity</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->fitness_center != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Fitness Center</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->dancing_fountain != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Dancing Fountain</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif


                                    @if($property->parks != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Park</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->ground != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Play Ground</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->zoo != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Zoo</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->community_center != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->gated_community != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Gated Community</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div> 
                                    @endif

                                    @if($property->security_service != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Security</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->underground_plumbing != null)    
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Plumbing</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->underground_water_supply != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Water Supply</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->boundary_wall != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Boundry Wall</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->wide_roads_with_green_belts != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Road + Green Belt</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->mosques != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Mosque</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif

                                    @if($property->gas != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Gas</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif


                                    @if($property->tv_cable_network != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Tv Cable</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif


                                    @if($property->car_rental_service != null)
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Car Rent Service</span>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        @else

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsethree">
                                        <figure class="pull-left home-icon"> <img class="img-responsive atif" src="/assets/images/hotel.png"></figure>
                                        <span class="color"><strong>Project</strong></span> features
                                    </a>
                                </h2>
                            </div>
                            <div id="collapsethree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Carpeted Road</span>
                                        </div>
                                        @if($property->wide_carpeted_roads != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Modren Planning</span>
                                        </div>
                                        @if($property->beautiful_modern_planning != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Carpeted Road</span>
                                        </div>
                                        @if($property->wide_carpeted_roads != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Sewerage</span>
                                        </div>
                                        @if($property->underground_sewerage_system != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>=</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Electricity</span>
                                        </div>
                                        @if($property->underground_electricity_supply != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Fitness Center</span>
                                        </div>
                                        @if($property->fitness_center != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Dancing Fountain</span>
                                        </div>
                                        @if($property->dancing_fountain != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Park</span>
                                        </div>
                                        @if($property->parks != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Play Ground</span>
                                        </div>
                                        @if($property->ground != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Zoo</span>
                                        </div>
                                        @if($property->zoo != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Commercial Center</span>
                                        </div>
                                        @if($property->commercial_center != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
                                        </div>
                                        @if($property->community_center != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>





                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>CC TV Surveillance</span>
                                        </div>
                                        @if($property->cc_tv_surveillance != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Gated Community</span>
                                        </div>
                                        @if($property->gated_community != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>High Class Finishing</span>
                                        </div>
                                        @if($property->high_class_finishing != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
                                        </div>
                                        @if($property->community_center != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Independent Drive Way</span>
                                        </div>
                                        @if($property->independent_drive_way != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>



                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Security</span>
                                        </div>
                                        @if($property->security_service != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
                                        </div>
                                        @if($property->community_center != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Plumbing</span>
                                        </div>
                                        @if($property->underground_plumbing != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Water Supply</span>
                                        </div>
                                        @if($property->underground_water_supply != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Solid Wood Finishing</span>
                                        </div>
                                        @if($property->solid_wood_finishes != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Imported Kitchen</span>
                                        </div>
                                        @if($property->imported_kitchens != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Boundry Wall</span>
                                        </div>
                                        @if($property->boundary_wall != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Road + Green Belt</span>
                                        </div>
                                        @if($property->wide_roads_with_green_belts != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Mosque</span>
                                        </div>
                                        @if($property->mosques != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Gas</span>
                                        </div>
                                        @if($property->gas != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Laundry</span>
                                        </div>
                                        @if($property->housekeeping_laundry_facility != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Room Service</span>
                                        </div>
                                        @if($property->room_service != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Tv Cable</span>
                                        </div>
                                        @if($property->tv_cable_network != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Hot + Cold Water Supply</span>
                                        </div>
                                        @if($property->hot_cold_water_supply != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Cafe</span>
                                        </div>
                                        @if($property->cafe != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Roof Top BBQ</span>
                                        </div>
                                        @if($property->roof_top_barbeque != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Car Rent Service</span>
                                        </div>
                                        @if($property->car_rental_service != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
                                        <div class="col-md-7 col-sm-6 col-xs-12"><span>Valet Car Parking</span>
                                        </div>
                                        @if($property->valet_car_parking != null)
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
                                        @else
                                        <div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<div id="menu0" style="display:none">
    <section class="page-section pbbottom">
        <div class="col-md-12">
            <div class="features">
                <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
                <div class="feature-heading pull-left">
                    <h2>Calculate<span> Finance</span></h2>
                    <p>Pakistan's Best Property Portal.</p>
                </div>
            </div>
            <div class="calculator-headings">
<!--<span><img src="assets/images/calculator.png">Calculate Finance</span>
<h3>Affordability</h3>
<p>Calculate your monthly mortage payments.</p>-->

<div class="form-group">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <label for="">Loan Amount</label>
                <input type="text" class="form-control" value="" id="amount" onchange="calculate();">
            </div>
            <div class="col-md-4 col-xs-12">
                <label for="">Interest Rate (%)</label>
                <input type="text" class="form-control" value="" id="apr" onchange="calculate();">
            </div>
            <div class="col-md-4 col-xs-12">
                <label for="">Payment Cycle (years)</label>
                <input type="text" class="form-control" value="" id="years" onchange="calculate();">
            </div>

        </div>
        <div class="row" style="margin-top: 20px;">
<!--<div class="col-md-12 text-center">
<button type="submit" class="btn btn-primary btn-calculate pull-right">Calculate</button>
</div>-->
<div class="col-md-4 col-xs-12">
    <label for="">Monthly Payment</label>
    <!--                                                                <input type="text" class="form-control" value="" id="payment">-->
    <div class="output field" id="payment">0</div>
</div>
<div class="col-md-4 col-xs-12">
    <label for="">Total Payment</label>
    <!--                                                                <input type="text" class="form-control" value="" id="total">-->
    <div class="output field" id="total">0</div>
</div>
<div class="col-md-4 col-xs-12">
    <label for="">Total Interest</label>
    <!--                                                                <input type="text" class="form-control" value="" id="totalinterest">-->
    <div class="output field" id="totalinterest">0</div>
</div>

</div>
<div class="row">
    <div class="col-md-12 col-xs-12 text-right">
<!--<label for="">Loan Type</label>
    <input type="text" class="form-control" value="">-->
    <input type="text" id="zipcode" class="form-control"  hidden>
    <button onclick="calculate();" class="btn btn-primary btn-calculate " >Calculate</button>
</div>
</div>
</div>
</div>

</div>
<div class="donut-graph">
    <div id="chartdiv"></div>
</div>

</div>
</section>
</div>


<div id="menu2">
    <section class="page-section prop-detail-page prop-maps" style="padding-bottom: 0">
        <div class="features">
            <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
            <div class="feature-heading pull-left">
                <h2>Nearby<span> Location</span></h2>
                <p>Pakistan's Best Property Portal.</p>

            </div>
        </div>
        <!--<h3 class="color">Nearby locations</h3>-->
        <div class="col-md-12 map-mrgn" style="margin-bottom: 0;">
            <div class="masonry masonry-columns-3">
                <div class="masonry-item">
                    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
                        <h4>Hospitals and Health care</h4>
                        <ul class="list-unstyled" id="hos">
<!--  @if($property->near_hospital != null)
<li>{{$property->near_hospital}}</li>
@else

@endif
-->
</ul>
</div>
</div>
<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Education</h4>
        <ul class="list-unstyled" id="sch">
<!--  @if($property->near_school != null)

<li>{{$property->near_school}} </li>
@else

@endif -->
</ul>
</div>
</div>
<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Malls and Public Places</h4>
        <ul class="list-unstyled" id="sto">
<!--  @if($property->near_shopping_mall != null)

<li>{{$property->near_shopping_mall}} </li>
@else


@endif -->

</ul>
</div>
</div>
<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Restaurants and Hotels</h4>
        <ul class="list-unstyled" id="res">
<!--  @if($property->near_restaurant != null)

<li>{{$property->near_restaurant}}</li>
@else

@endif -->

</ul>
<!-- <ul class="list-unstyled" id="res"></ul> -->
</div>
</div>
<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Banks and Financial Institutions</h4>
        <ul class="list-unstyled" id="ban">
<!--   @if($property->near_bank != null)

<li>{{$property->near_bank}}</li>
@else

@endif -->
</ul>
</div>
</div>

<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Travel, Tourism, and Transportation </h4>
        <ul class="list-unstyled" id="tra">
<!-- @if($property->near_public_transport != 0)

<li>{{$property->near_public_transport}} km</li>
@else

@endif -->
</ul>
</div>
</div>
<!-- <div class="masonry-item">
<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
<h4>Government Institutes </h4>
<ul class="list-unstyled">
<li>Timeless Cosmetic Surgery &amp; </li>
<li>Nutritional Health Consultants</li>
<li>Kaleem Ahmed Baig</li>
</ul>
</div>
</div> -->
<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Distace from Airport</h4>
        <ul class="list-unstyled">
            @if($property->distance_airport != 0)

            <li>{{$property->distance_airport}} Km</li>
            @else
            <li>-</li>
            @endif
        </ul>
    </div>
</div>
<div class="masonry-item">
    <div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
        <h4>Distace from Railway</h4>
        <ul class="list-unstyled">
            @if($property->distance_railway != 0)

            <li>{{$property->distance_railway}} Km</li>
            @else
            <li>-</li>
            @endif
        </ul>
    </div>
</div>
<!--   <div class="masonry-item">
<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
<h4>Nearby Water Filtration Plant</h4>
<ul class="list-unstyled">
@if($property->near_water_filter != 0)
<li>{{$property->near_water_filter}} Km </li>
@else
<li>-</li>
@endif
</ul>
</div>
</div> -->
</div>
</div>

<!--<div class="col-md-12 nrby-gmaps">-->
    <!--<iframe src="http://maps.google.com/maps/ms?vpsrc=6&amp;ctz=-480&amp;ie=UTF8&amp;msa=0&amp;msid=210840796990572645528.00049770919ccd6759de3&amp;t=m&amp;ll=30.751278,68.203125&amp;spn=84.446143,175.429688&amp;z=2&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="" height="550"> </iframe>-->
    <!--</div>-->
</section>
</div>
@php
$i=1;
@endphp
@if($property->purpose == 4)
<div id="menu3">
    <div class="features">
        <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
        <div class="feature-heading pull-left" style="margin-bottom: 0">
            <h2>Property<span> Scheme</span></h2>
            <p>Pakistan's Best Property Portal.</p>
        </div>
    </div>
    @foreach($data['scheme'] as $scheme)
    <section class="page-section paddingtb">
        <div class="col-md-12 prj-schms pa-0">

            <div class="scheme mb-35 col-md-12">
                <h3 class="color"><span>Scheme No. {{$i++}}</span></h3>
                <ul class="list-unstyled">
                    <li><span class="label-text">Sceheme Title</span> <span class="value pull-right">{{$scheme->title}}</span></li>
                    {{-- <li><span class="label-text">Property Type</span> <span class="value pull-right">{{App\Property::getPropertyType($scheme->property_type_name)}}</span></li>--}}
                    <li><span class="label-text">Property Type</span> <span class="value pull-right">{{ $scheme->property_type_name }}</span></li>
                    <li><span class="label-text">Area</span> <span class="value pull-right">{{$scheme->area}} {{$scheme->area_type}}</span></li>
                    <li><span class="label-text">Payment Method</span> <span class="value pull-right">{{$scheme->payment_method}}</span></li>
                    <li><span class="label-text">bed</span> <span class="value pull-right">{{$scheme->bed}}</span></li>
                    <li><span class="label-text">bath</span> <span class="value pull-right">{{$scheme->bath}}</span></li>
                    <li><span class="label-text">Min Price</span> <span class="value pull-right">{{$scheme->min_price}}</span></li>
                    <li><span class="label-text">Max Price</span> <span class="value pull-right">{{$scheme->max_price}}</span></li>
                </ul>
            </div>



<!--
<div class="scheme mb-35 col-md-6">
<h3 class="color"><span>Scheme No. 1</span></h3>
<ul class="list-unstyled">
<li><span class="label-text">Sceheme Title</span> <span class="value pull-right">{{$scheme->title}}</span></li>
<li><span class="label-text">Property Type</span> <span class="value pull-right">{{$scheme->property_type_name}}</span></li>
<li><span class="label-text">Area</span> <span class="value pull-right">{{$scheme->area}} {{$scheme->area_type}}</span></li>
<li><span class="label-text">Payment Method</span> <span class="value pull-right">{{$scheme->payment_method}}</span></li>
<li><span class="label-text">bed</span> <span class="value pull-right">{{$scheme->bed}}</span></li>
<li><span class="label-text">bath</span> <span class="value pull-right">{{$scheme->bath}}</span></li>
<li><span class="label-text">Min Price</span> <span class="value pull-right">{{$scheme->min_price}}</span></li>
<li><span class="label-text">Max Price</span> <span class="value pull-right">{{$scheme->max_price}}</span></li>
</ul>
</div> -->
</div>
</section>
@endforeach
</div>
@endif
<section class="page-section latest-properties">
    <?php
    if (!function_exists('nice_number')) {
function nice_number($n)
    {
// first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

// is this a number?
        if (!is_numeric($n)) return false;

// now filter it;
        if ($n > 1000000000000) return round(($n / 1000000000000), 2) . ' Trillion';
        elseif ($n > 1000000000) return round(($n / 1000000000), 2) . ' Billion';
        elseif ($n > 1000000) return round(($n / 1000000), 2) . ' Million';
        elseif ($n > 100000) return round(($n / 100000), 2) . ' Lac';
        elseif ($n > 1000) return round(($n / 1000), 2) . ' Thousand';

        return number_format($n);
    }
}

// echo nice_number('14120000'); //14.12 million

    ?>
    <div class="col-md-12 features">
        @if($property->purpose != 4)
        <div class="feature-heading">
            <figure class="pull-left home-icon"><img src="/assets/images/home-icon2.jpg"></figure>
            <h2>Related Property <span>LISTINGS</span></h2>
        </div>
        <div class="row">
            @foreach($properties as $property)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="family-house">
                    @if(strlen($property->title) <= 20)
                    <h4>{{$property->title}}</h4>
                    @else
                    <h4><?php echo substr(strip_tags($property->title), 0, 20) . '...'; ?></h4>
                    @endif
                    <?php $string = (strlen($property->address) > 50) ? substr($property->address, 0, 50) . '...' : $property->address; ?>
                    <p class="text-muted"><i class="fa fa-map-marker"></i><?= $string; ?></p>


                    @if($property->gallery != "")
                    <?php
                    $images = explode(';', $property->gallery);
                    ?>
                    <figure>
                        <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}">
                    </figure>

                    @else
                    <figure><img src="https://maps.googleapis.com/maps/api/staticmap?center={{$property->latitude}},{{$property->longitude}}&markers=color:orange%7Clabel:R%7C{{$property->latitude}},{{$property->longitude}}&zoom=12&size=512x384&key=AIzaSyBq8gdCcmzERDnikFG5ZXPT2cl_HBIXEWY"/></figure>
                    @endif

                    <figcaption>
                        @if($property->purpose == 1)
                        <div class="feature-tag">for sale</div>
                        @elseif($property->purpose ==2)
                        <div class="feature-tag for-rent">for rent</div>

                        @else
                        <div class="feature-tag">wanted</div>

                        @endif
                        <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                        <li>

                            <a data-toggle="dropdown" class="share-propertryadvance" title="Share"
                            href="javascript:void(0);" aria-expanded="true">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </a>
                        <ul class="share-propertrysearch dropdown-menu">
                            <li>
                                <a class="share-button btn btn-facebook"
                                data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                                data-share-network="facebook"
                                data-share-text="Share this property on Facebook"
                                data-share-title="<?= $property->title ?>" data-share-via=""
                                data-share-tags="" @if($property->gallery != "")
                                data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                                /images/property/user_property/original_{{$images[0]}}"
                                @else
                                data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                                /assets/images/img1.jpg"
                                @endif href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="share-button btn btn-twitter"
                            data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                            data-share-network="twitter" data-share-text="Share this property on Twitter"
                            data-share-title="<?= $property->title ?>" data-share-via=""
                            data-share-tags="" @if($property->gallery != "")
                            data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                            /images/property/user_property/original_{{$images[0]}}"
                            @else
                            data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                            /assets/images/img1.jpg"
                            @endif href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="share-button btn btn-google"
                        data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                        data-share-network="googleplus"
                        data-share-text="Share this property on Google+"
                        data-share-title="<?= $property->title ?>" data-share-via=""
                        data-share-tags="" @if($property->gallery != "")
                        data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                        /images/property/user_property/original_{{$images[0]}}"
                        @else
                        data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                        /assets/images/img1.jpg"
                        @endif href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
                <li>
                    <a class="share-button btn btn-linkedin"
                    data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                    data-share-network="linkedin"
                    data-share-text="Share this property on LinkedIn"
                    data-share-title="<?= $property->title ?>" data-share-via=""
                    data-share-tags="" @if($property->gallery != "")
                    data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                    /images/property/user_property/original_{{$images[0]}}"
                    @else
                    data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                    /assets/images/img1.jpg"
                    @endif href="#">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
            <li>
                <a class="share-button btn btn-pinterest"
                data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                data-share-network="pinterest"
                data-share-text="Share this property on Pinterest"
                data-share-title="<?= $property->title ?>" data-share-via=""
                data-share-tags="" @if($property->gallery != "")
                data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                /images/property/user_property/original_{{$images[0]}}"
                @else
                data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>
                /assets/images/img1.jpg"
                @endif href="#">
                <i class="fa fa-pinterest"></i>
            </a>
        </li>
<!-- <li>
<a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
<i class="fa fa-envelope"></i>
</a>
</li> -->
</ul>

</li>
@if(Auth::check())

<li><a data-id="{{$property->id}}" data-toggle="tooltip" data-placement="top"
    title="Save Property" class="saveProperty"><i class="fa fa-bookmark "></i></a></li>
    @else
    <li><a data-toggle="modal" title="Save Property" data-target="#fsModal2"><i
        class="fa fa-bookmark"></i></a></li>
        @endif
        <li><a href="{{$property->url}}/{{$property->id}}" target="_blank"><i class="fa fa-eye"
            title="View"></i></a>
        </li>
    </ul>
</figure>

<div class="prices-details">
    <p class="pull-left">{{nice_number($property->price)}}</p>
    <a class="pull-right btn-style details no-bg" href="{{$property->url}}/{{$property->id}}">Details</a>
</div>
</div>
</div>
@endforeach
</div>
@endif

</section>
</div>
</div>
</div>
</div>
</section>

</main>
</div>
<!-- wraper ends -->

@include('includes.footer')
@if(!empty($property->latitude))

<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB83c_hl3-8ZEedKuJ1ReIL1D3aIy2i2NA&libraries=places&callback=initMap" async defer></script>-->
<!-- <script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap" type="text/javascript"></script> -->

<script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFTfCu2rXDn78zX7Tc2IEpBuxBYr__WVA&v=3.exp&callback=initMap&libraries=places&callback=initMap" type="text/javascript"></script>
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
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.share-button').simpleSocialShare();

    });
</script>
<script type="text/javascript">    
    var map;    
    var infowindow;
    var restaurant = new Array();
    var hospital =new Array();
    var school =new Array();
    var store =new Array();
    var bank =new Array();
    var travel =new Array();

    var latitude = parseFloat("{{$property->latitude}}");
    var lngitude = parseFloat("{{$property->longitude}}");

    function initMap() {
        var pyrmont = {lat:latitude, lng:lngitude};
        map = new google.maps.Map(document.getElementById('map'), {
            center: pyrmont,
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: pyrmont,
            map: map,
            title: 'Hello World!'
        });
        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        var places = [
        "restaurant", 
        "hospital",
        "shopping_mall",
        "school",
        "hotel",
        "bank",
        "university",
        "travel_agency",
        "train_station",
        "taxi_stand",
        "bus_station",
        "airport",
        ];
        for (i = 0; i < places.length; i++) { 
            service.nearbySearch({
                location: pyrmont,
                rankBy: google.maps.places.RankBy.DISTANCE,
                type: places[i]
            }, callback);
        }
    }

    function callback(results, status) {
        var count;
// var type1= 
console.log(results[0]);

var type= results[0].types[0];

if (status === google.maps.places.PlacesServiceStatus.OK) {
    if(results.length >= 5)
    {
        count = 3;
    } 
    else
    {
        count = results.length;
    }
    for (var i = 0; i < count; i++) {
        addToList(results[i].name ,type); 
    }
}   
}

function addToList(data,type){
    if(type == "restaurant" || type == "locality")
    {
        var mainList = document.getElementById("res");
        var item = data
        var elem = document.createElement("li");
        elem.value=item;
        elem.innerHTML=item;
        mainList.appendChild(elem);

// mainList.append(data+",");

}
if(type == "hospital" )
{
    var mainList = document.getElementById("hos");
    var item = data
    var elem = document.createElement("li");
    elem.value=item;
    elem.innerHTML=item;
    mainList.appendChild(elem);
// mainList.append(data+",");

}
if(type == "school" || type == "university")
{
    var mainList = document.getElementById("sch");
    var item = data
    var elem = document.createElement("li");
    elem.value=item;
    elem.innerHTML=item;
    mainList.appendChild(elem);
// mainList.append(data+",");

}
if(type == "shopping_mall")
{
    var mainList = document.getElementById("sto");
    var item = data
    var elem = document.createElement("li");
    elem.value=item;
    elem.innerHTML=item;
    mainList.appendChild(elem);
// mainList.append(data+",");

}
if(type == "bank")
{
    var mainList = document.getElementById("ban");
    var item = data
    var elem = document.createElement("li");
    elem.value=item;
    elem.innerHTML=item;
    mainList.appendChild(elem);
// mainList.append(data+",");

}
if(type == "travel_agency" || type == "taxi_stand" || type == "transit_station"  || type == "bus_station")
{
    var mainList = document.getElementById("tra");
    var item = data
    var elem = document.createElement("li");
    elem.value=item;
    elem.innerHTML=item;
    mainList.appendChild(elem);
// mainList.append(data+",");    
}
}


function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}

</script>
@endif
<script type="text/javascript">
    $('#saveProperty').click(function(){
        id =$(this).attr('data-id');
        var url ="/saveProperty/"+id;

        $.ajax({
            url:url,
            data:id,
            method:'post',
            type:'json',
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            },
            success:function(e){
                alert(e.success);
            }

        });
    });
    $('#numb').click(function(){

    });
</script>
<script type="text/javascript">
    $(".view_number").click(function(){
        $(".view_number").hide();
        $(".view_number_div").show();
        id =$(this).attr('data-id');
        var url ="/viewCount/"+id;
        $.ajax({
            url:url,
            data:id,
            method:'post',
            type:'json',
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            },
            success:function(e){
            }
        });
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {
        var image = $('#edit-image').val();
        if(!image) return;
        $('#container1').tilezoom('destroy');
        $('#container1').tilezoom({
            xml: '/dest/' + image + '.xml',
            mousewheel: true
        });
    });
</script>



<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&libraries=places&callback=initMap" async defer></script> -->
<!-- Chart code -->

<script>
    $(document).ready(function(){
        $('.property-scroll').scrollspy({target: "#myHeader", offset: 50});
    });
</script>
<script>
    $(window).scroll(function () {
        var scroll_top = $(this).scrollTop();
        if (scroll_top >= 1) {
            $("#myHeader").addClass("nav-float");
        } else {
            $("#myHeader").removeClass("nav-float");;
        }
    });

</script>
 <script>
    $(document).ready(function () {
        $(document).on("scroll", onScroll);

        $('.property-nav li a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");

            $('.property-nav li a').each(function () {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            var target = this.hash,
            menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top+2
            }, 500, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });

        $('.property-nav li a[href^="#"]').on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){
                });
            }
        });
        $('.property-nav li').removeClass('active')

    });

    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('#myHeader a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#myHeader ul li a').removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }

    $('.btn-calculate').on("click", function() {
        $('.donut-graph').slideToggle( 1000, function() {
            $('.donut-graph').show( 100 );
        });
    });
</script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

{{-- <script>
    function calculate() {
//Look up the input and output elements in the document
var amount = document.getElementById("amount");
var apr = document.getElementById("apr");
var years = document.getElementById("years");
var zipcode = document.getElementById("zipcode");
var payment = document.getElementById("payment");
var total = document.getElementById("total");
var totalinterest = document.getElementById("totalinterest");

// Get the user's input from the input elements.
// Convert interest from a percentage to a decimal, and convert from
// an annual rate to a monthly rate. Convert payment period in years
// to the number of monthly payments.
var principal = parseFloat(amount.value);
var interest = parseFloat(apr.value) / 100 / 12;
var payments = parseFloat(years.value) * 12;

// compute the monthly payment figure
var x = Math.pow(1 + interest, payments); //Math.pow computes powers
var monthly = (principal*x*interest)/(x-1);

// If the result is a finite number, the user's input was good and
// we have meaningful results to display
if (isFinite(monthly)){
// Fill in the output fields, rounding to 2 decimal places
payment.innerHTML = monthly.toFixed(2);
total.innerHTML = (monthly * payments).toFixed(2);
totalinterest.innerHTML = ((monthly*payments)-principal).toFixed(2);

// Save the user's input so we can restore it the next time they visit
save(amount.value, apr.value, years.value, zipcode.value);

// Advertise: find and display local lenders, but ignore network errors
try { // Catch any errors that occur within these curly braces
    getLenders(amount.value, apr.value, years.value, zipcode.value);
}

catch(e) { /* And ignore those errors */ }
// Finally, chart loan balance, and interest and equity payments
//chart(principal, interest, monthly, payments);
}
else {
// Result was Not-a-Number or infinite, which means the input was
// incomplete or invalid. Clear any previously displayed output.
payment.innerHTML = ""; // Erase the content of these elements
total.innerHTML = ""
totalinterest.innerHTML = "";
//chart(); // With no arguments, clears the chart
}
var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "startDuration": 0,
    "theme": "light",
    "addClassNames": true,
    "legend":{
        "position":"right",
        "marginRight":100,
        "autoMargins":false
    },
    "allLabels": [{
        "text": payment.innerHTML,
        "align": "center",
        "size": 25,
        "bold": true,
        "y": 220
    }, {
        "text": "/month",
        "align": "center",
        "bold": false,
        "size": 20,
        "y": 250
    }],
    "innerRadius": "70%",
    "defs": {
        "filter": [{
            "id": "shadow",
            "width": "400%",
            "height": "400%",
            "feOffset": {
                "result": "offOut",
                "in": "SourceAlpha",
                "dx": 0,
                "dy": 0
            },
            "feGaussianBlur": {
                "result": "blurOut",
                "in": "offOut",
                "stdDeviation": 5
            },
            "feBlend": {
                "in": "SourceGraphic",
                "in2": "blurOut",
                "mode": "normal"
            }
        }]
    },
    "dataProvider": [{
        "name": "Interest",
        "value": totalinterest.innerHTML,
        "color": "#f87558"

    }, {
        "name": "Property Price",
        "value": total.innerHTML - totalinterest.innerHTML,
        "color": "#92cef2"
    }],
    "valueField": "value",
    "titleField": "name",
    "colorField": "color",
    "export": {
        "enabled": false
    }
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
    handleRollOver(e);
});

}
function handleInit(){
    chart.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
    var wedge = e.dataItem.wedge.node;
    wedge.parentNode.appendChild(wedge);
}
// Save the user's input as properties of the localStorage object. Those
// properties will still be there when the user visits in the future
// This storage feature will not work in some browsers (Firefox, e.g.) if you
// run the example from a local file:// URL. It does work over HTTP, however.
function save(amount, apr, years, zipcode) {
if (window.localStorage) { // Only do this if the browser supports it
    localStorage.loan_amount = amount;
    localStorage.loan_apr = apr;
    localStorage.loan_years = years;
    localStorage.loan_zipcode = zipcode;
}
}
// Automatically attempt to restore input fields when the document first loads.
window.onload = function() {
// If the browser supports localStorage and we have some stored data
if (window.localStorage && localStorage.loan_amount) {
    document.getElementById("amount").value = localStorage.loan_amount;
    document.getElementById("apr").value = localStorage.loan_apr;
    document.getElementById("years").value = localStorage.loan_years;
    document.getElementById("zipcode").value = localStorage.loan_zipcode;
}
};
// Pass the user's input to a server-side script which can (in theory) return
// a list of links to local lenders interested in making loans. This example
// does not actually include a working implementation of such a lender-finding
// service. But if the service existed, this function would work with it.
function getLenders(amount, apr, years, zipcode) {
// If the browser does not support the XMLHttpRequest object, do nothing
if (!window.XMLHttpRequest) return;
// Find the element to display the list of lenders in
var ad = document.getElementById("lenders");
if (!ad) return; // Quit if no spot for output

// Encode the user's input as query parameters in a URL
var url = "getLenders.php" + // Service url plus
"?amt=" + encodeURIComponent(amount) + // user data in query string
"&apr=" + encodeURIComponent(apr) +
"&yrs=" + encodeURIComponent(years) +
"&zip=" + encodeURIComponent(zipcode);
// Fetch the contents of that URL using the XMLHttpRequest object
var req = new XMLHttpRequest(); // Begin a new request
req.open("GET", url); // An HTTP GET request for the url
req.send(null); // Send the request with no body
// Before returning, register an event handler function that will be called
// at some later time when the HTTP server's response arrives. This kind of
// asynchronous programming is very common in client-side JavaScript.
req.onreadystatechange = function() {
    if (req.readyState == 4 && req.status == 200) {
// If we get here, we got a complete valid HTTP response
var response = req.responseText; // HTTP response as a string
var lenders = JSON.parse(response); // Parse it to a JS array
// Convert the array of lender objects to a string of HTML
var list = "";
for(var i = 0; i < lenders.length; i++) {
    list += "<li><a href='" + lenders[i].url + "'>" +
    lenders[i].name + "</a>";
}
// Display the HTML in the element from above.
ad.innerHTML = "<ul>" + list + "</ul>";
}
}
}
// Chart monthly loan balance, interest and equity in an HTML <canvas> element.
// If called with no arguments then just erase any previously drawn chart.
function chart(principal, interest, monthly, payments) {
var graph = document.getElementById("graph"); // Get the <canvas> tag
graph.width = graph.width; // Magic to clear and reset the canvas element
// If we're called with no arguments, or if this browser does not support
// graphics in a <canvas> element, then just return now.
if (arguments.length == 0 || !graph.getContext) return;
// Get the "context" object for the <canvas> that defines the drawing API
var g = graph.getContext("2d"); // All drawing is done with this object
var width = graph.width, height = graph.height; // Get canvas size
// These functions convert payment numbers and dollar amounts to pixels
function paymentToX(n) { return n * width/payments; }
function amountToY(a) { return height-(a * height/(monthly*payments*1.05));}
// Payments are a straight line from (0,0) to (payments, monthly*payments)
g.moveTo(paymentToX(0), amountToY(0)); // Start at lower left
g.lineTo(paymentToX(payments), // Draw to upper right
    amountToY(monthly*payments));

g.lineTo(paymentToX(payments), amountToY(0)); // Down to lower right
g.closePath(); // And back to start
g.fillStyle = "#f88"; // Light red
g.fill(); // Fill the triangle
g.font = "bold 12px sans-serif"; // Define a font
g.fillText("Total Interest Payments", 20,20); // Draw text in legend
// Cumulative equity is non-linear and trickier to chart
var equity = 0;
g.beginPath(); // Begin a new shape
g.moveTo(paymentToX(0), amountToY(0)); // starting at lower-left
for(var p = 1; p <= payments; p++) {
// For each payment, figure out how much is interest
var thisMonthsInterest = (principal-equity)*interest;
equity += (monthly - thisMonthsInterest); // The rest goes to equity
g.lineTo(paymentToX(p),amountToY(equity)); // Line to this point
}
g.lineTo(paymentToX(payments), amountToY(0)); // Line back to X axis
g.closePath(); // And back to start point
g.fillStyle = "green"; // Now use green paint
g.fill(); // And fill area under curve
g.fillText("Total Equity", 20,35); // Label it in green
// Loop again, as above, but chart loan balance as a thick black line
var bal = principal;
g.beginPath();
g.moveTo(paymentToX(0),amountToY(bal));
for(var p = 1; p <= payments; p++) {
    var thisMonthsInterest = bal*interest;
bal -= (monthly - thisMonthsInterest); // The rest goes to equity
g.lineTo(paymentToX(p),amountToY(bal)); // Draw line to this point
}
g.lineWidth = 3; // Use a thick line
g.stroke(); // Draw the balance curve
g.fillStyle = "black"; // Switch to black text
g.fillText("Loan Balance", 20,50); // Legend entry
// Now make yearly tick marks and year numbers on X axis
g.textAlign="center"; // Center text over ticks
var y = amountToY(0); // Y coordinate of X axis
for(var year=1; year*12 <= payments; year++) { // For each year
var x = paymentToX(year*12); // Compute tick position
g.fillRect(x-0.5,y-3,1,3); // Draw the tick
if (year == 1) g.fillText("Year", x, y-5); // Label the axis
if (year % 5 == 0 && year*12 !== payments) // Number every 5 years
    g.fillText(String(year), x, y-5);
}
// Mark payment amounts along the right edge
g.textAlign = "right"; // Right-justify text
g.textBaseline = "middle"; // Center it vertically
var ticks = [monthly*payments, principal]; // The two points we'll mark
var rightEdge = paymentToX(payments); // X coordinate of Y axis
for(var i = 0; i < ticks.length; i++) { // For each of the 2 points
var y = amountToY(ticks[i]); // Compute Y position of tick

g.fillRect(rightEdge-3, y-0.5, 3,1); // Draw the tick mark
g.fillText(String(ticks[i].toFixed(0)), // And label it.
    rightEdge-5, y);
}
}
</script>
 --}}