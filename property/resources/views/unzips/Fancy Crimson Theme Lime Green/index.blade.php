<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}} - RightDeed</title>
    <link href="/unzips/Fancy%20Crimson%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Fancy%20Crimson%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Fancy%20Crimson%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet prefetch" href="/unzips/Fancy%20Crimson%20Theme/css/owl.carousel.min.css">
    <!-- custom scrollbar stylesheet -->
    <link rel="stylesheet" href="/unzips/Fancy%20Crimson%20Theme/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/unzips/Fancy%20Crimson%20Theme/css/style.css">
    <link href="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/css/theme.css" rel="stylesheet">
    <link href="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/css/custom.css" rel="stylesheet">
    <style>
        .banner{
            <?php 
                $active_index = 0;
                foreach($agencyWebsite->Images as $key => $image){
                    if($image->active == 1){
                        $active_index = $key;
                    }
                }
            ?>
            @if(!$agencyWebsite->Images->isEmpty())
                @if($agencyWebsite->Images[$active_index]->active==1) 
                    background-image: url("/images/banners/original_{{$agencyWebsite->Images[$active_index]->image}}");
                @endif
            @else
                background-image: url(../unzips/Fancy%20Crimson%20Theme%20Lime%20Green/images/banner.jpg);
            @endif
            height:750px;
            position:relative;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .edit-link {
            background-color: #DF3D2D;
            display: inline-block;
            padding: 13px 30px;
            color: #fff;
            border-radius: 0;
            border: none;
            margin-right: 5px;
            margin-bottom: 50px;
        }
        .edit-link:hover{
            /*background: #DBC10A;*/
            /*border: 1px solid #DBC10A;*/
            color: #fff;
            text-decoration: none;
        }
    </style>

</head>

<body>

<header id="home" class="header"><div class="container">
        <div class="row">
            <div class="menu-bar fixed-nav" id="header">
                <div class="col-md-12 pr">
                    <div class="primary-menu">
                        <nav class="navbar navbar-inverse mb"><div class="container">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    <a class="navbar-brand" href="{{Request::url()}}"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav"><li><a href="#home">Home</a></li>
                                        <li><a href="#aboutus">About Us</a></li>
                                        <li><a href="#team">Our Team</a></li>
                                        <li><a href="#msg">CEO Message</a></li>
                                        <li><a href="#msg">Contact</a></li>
                                    </ul></div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.container-fluid -->
                        </nav></div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 banner-carousal">
                    @if(!$properties->isEmpty())
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @for($i=0; $i<count($properties); $i++)
                            <li data-target="#carousel" data-slide-to="{{$i}}"></li>
                            @endfor
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            @foreach($properties as $property)
                            <div class="item">
                                <h2>
                                    @if(strlen($property->title) <= 25)
                                        {{$property->title}}
                                    @else
                                        {{str_limit($property->title, 25, '...')}}
                                    @endif
                                </h2>
                                <p>
                                    @if(strlen($property->description) <= 84)
                                        {{strip_tags($property->description)}}
                                    @else
                                        {{str_limit(strip_tags($property->description), 84, '...')}}
                                    @endif
                                </p>
                                <ul class="list-inline">
                                    <li> <span> <?php echo (!empty($property->bed))? $property->bed : '<em>NA</em>'; ?></span> <span>Bedroom(s)</span></li>
                                    <li> <span> <?php echo (!empty($property->bath))? $property->bath : '<em>NA</em>';  ?> </span> <span>Bathroom(s)</span></li>
                                    <li> 
                                        @if($property->purpose !== 4)
                                            <span> <?php echo (!empty($property->area))? $property->area : 'No';  ?> </span>
                                            <span> <?php echo (!empty($property->area_type))? $property->area_type : 'Area';  ?></span>
                                        @else
                                            <a href="{{$property->url}}/{{$property->id}}" style="font-size:22px"><span style="color: #337ab7; font-size: 22px">View</span> <span>Areas</span></a>
                                        @endif
                                    </li>
                                </ul>
                                <a class="view-details gray" href="{{$property->url}}/{{$property->id}}">
                                    @if($property->purpose !== 4)
                                        Rs. {{number_format((double)$property->price)}}
                                    @else
                                        View Schemes
                                    @endif
                                </a>
                                <a class="view-details" href="{{$property->url}}/{{$property->id}}">View Details</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                        <p class="text-center" style="font-size: 20px; color: #383637;margin-bottom: 50px">No property or project available yet!</p>
                        @if(Auth::id() == $agencyWebsite->user_id)
                        <p class="text-center">
                            <a href="/dashboard/quick/add/Property" class="edit-link"><i class="fa fa-home"></i> Add Property</a>
                            <a href="/dashboard/project/add" class="edit-link"><i class="fa fa-university"></i> Add Project</a>
                        </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<div class="main">
    <section id="aboutus" class="about-section"><div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 col-sm-6 col-xs-12 img-about"> <a href="#"><img class="img-responsive" src="../unzips/Fancy%20Crimson%20Theme/images/img-about.jpg"></a> </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2>about us</h2>
                        <div class="content mCustomScrollbar">
                            {!! $agencyWebsite->about_us !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- team -->
    <section id="team" class="team-section">
        <div class="bg-team">
            <div class="container">
                <div class="row">
                    <h2>our team</h2>
                    <?php
                        $count = count($properties);
                        $adjustColumns = '';
                        switch ($count) {
                            case 1:
                                $adjustColumns = 'col-lg-4 col-lg-offset-4';
                                break;

                            case 2:
                                $adjustColumns = 'col-lg-8 col-lg-offset-2';
                                break;

                            case 3:
                                $adjustColumns = 'col-lg-10 col-lg-offset-1';
                                break;

                            default:
                                $adjustColumns = 'col-lg-12';
                                break;
                        }
                    ?>
                    <div class="{{$adjustColumns}}">
                        <div class="owl-carousel">
                            @foreach($staffs as $staff)
                            <div class="item">
                                <div class="col-md-4 text-center pr">
                                    <div class="media-left media-middle"> 
                                        <a href="{{$staff->site_profile_url}}"> 
                                            <img src="/images/staff/thumb_{{$staff->image}}" alt="" class="media-object img-circle">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 pr">
                                    <div class="pl">
                                        <div class="list-group"> <a class="list-group-item" href="{{$staff->site_profile_url}}">
                                                <h3 class="list-group-item-heading">{{$staff->name}}</h3>
                                                <h5>{{$staff->designation}}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pers-detail">
                                    <p>
                                        <strong>Email:</strong><br />{{$staff->email}}<br />
                                        <strong>Year of Servive:</strong> 
                                        {{$staff->year_of_service}}<br />
                                        <strong>Contact Number:</strong> 
                                        {{$staff->contact_number}}<br />
                                        <strong>Profile:</strong><br /> 
                                        <a href="{{$staff->site_profile_url}}" target="_blank">{{$staff->site_profile_url}}</a><br />
                                    </p>
                                    <ul>
                                        <li><a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ceo message -->
    <section id="msg" class="ceo-msg-sect"><div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center"> <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}"></div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>CEO&rsquo;s Message</h2>

                        <p id="content-1" class="content">
                            {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                        </p>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <h2>Contact Us</h2>
                            <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" required="" type="text"></div>
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email" required="" type="text"></div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone" required="" type="text"></div>
                                <div class="form-group">
                                    <textarea class="form-control textarea-height" type="textarea" id="message" placeholder="Message" rows="7" name="message"></textarea></div>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="footer"><div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="content-3" class="col-lg-4 col-sm-4 col-sm-4 col-xs-12 office-addresses">
                            @foreach($offices as $office)
                            <div class="col-lg-12 col-sm-12 col-xs-12 pl pr">
                                <h3>{{App\Property::getCityName($office->city_id)}} Office</h3>
                                <ul class="border-none">
                                    <li><span><i class="fa fa-home"></i></span><p> {{$office->address}}</p></li>
                                    <li><span><i class="fa fa-mobile"></i></span><p> {{$office->telephone}},{{$office->uan_number}}</p></li>
                                    <li><span><i class="fa fa-envelope"></i></span><p class="email-break"> {{$office->email}}</p></li>
                                </ul>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-lg-4  col-sm-4  col-sm-4  col-xs-12 office-addresses follow">
                            <h3>Follow us</h3>

                            <p>
                                @if(!empty($offices[0]->email))
                                    {{App\Property::getCityName($offices[0]->city_id)}}
                                    <br />
                                    {{$offices[0]->address}}
                                    <br />
                                    {{$offices[0]->telephone}} {{$offices[0]->uan_number}} {{$offices[0]->mobile_no}}
                                    <br />
                                    {{$offices[0]->email}}
                                @else
                                    {{'No info Available'}}
                                    {{--<br />--}}
                                @endif
                            </p>
                            <ul>
                                @if(!empty($offices[0]->address))
                                <li>
                                    <a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a>
                                </li>
                                @endif
                            </ul>

                        </div>
                        <div class="col-lg-4  col-sm-4  col-sm-4  col-xs-12 office-addresses">
                            <div class="footer-logo text-center">
                                <a href="{{Request::url()}}"><img class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}"></a>
                            </div>
                            <p>
                               @if(strlen($agencyWebsite->about_us) <= 250)
                                    {{strip_tags($agencyWebsite->about_us)}}
                               @else
                                   {{ str_limit(strip_tags($agencyWebsite->about_us), 250, '...') }}
                               @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section></div>

<script src="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/js/jquery-migrate-3.0.0.js"></script>
<script src="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/js/bootstrap.min.js"></script>
<script src="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="/unzips/Fancy%20Crimson%20Theme%20Lime%20Green/js/owl.carousel.js"></script>
<!-- custom scrollbar plugin --><script src="/unzips/Fancy%20Crimson%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<?php
    $countItems = count($properties);
    $itemClass = '';
    switch ($countItems) {
        case 1:
            $itemClass = 1;
            break;

        case 2:
            $itemClass = 2;
            break;

        case 3:
            $itemClass = 3;
            break;

        default:
            $itemClass = 3;
            break;
    }
?>
<script>
    $(document).ready(function () {

        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            navText: [ '', '' ],
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items:{{$itemClass}},
                    dots: true,
                    nav: false,
                    loop: false
                }
            }
        });


        $('#return-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });


        $(function(){
            createSticky($("#header"));
        });
        function createSticky(sticky) {
            if (typeof sticky !== "undefined") {
                var pos = sticky.offset().top,
                    win = $(window);
                win.on("scroll", function() {
                    win.scrollTop() >= pos ? sticky.addClass("fixed") : sticky.removeClass("fixed");
                });
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $("div.carousel-inner div.item:first").addClass("active");
    });
</script>
<script>
    $(document).ready(function () {

        $('#return-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
    });
</script><script type="text/javascript">
    // Page Scroll
    jQuery(document).ready(function ($) {
        $('.menu-bar a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 32
                    }, 1000);
                    return false;
                }
            }
        });
    });

    // Fixed Nav

    $(function(){
        createSticky($("#header"));
    });
    function createSticky(sticky) {
        if (typeof sticky !== "undefined") {
            var    pos = sticky.offset().top,
                win = $(window);
            win.on("scroll", function() {
                win.scrollTop() >= pos ? sticky.addClass("fixedtop") : sticky.removeClass("fixedtop");
            });
        }
    }

</script><script>
    (function($){
        $(window).on("load",function(){

            $("#content-1,#content-2").mCustomScrollbar({
                theme:"minimal"
            });
            $("#content-3").mCustomScrollbar({
                theme:"inset-2-dark",
                setLeft: 0,
            });

        });
    })(jQuery);
</script>
</body></html>
