<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Classic%20Theme%20Pro/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Classic%20Theme%20Pro/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Classic%20Theme%20Pro/css/owl.carousel.min.css">
    <link href="/unzips/Classic%20Theme%20Pro/css/theme.css" rel="stylesheet">
    <link href="/unzips/Classic%20Theme%20Pro/css/custom.css" rel="stylesheet">
    <link href="/unzips/Classic%20Theme%20Pro/css/slick.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Classic%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Classic%20Theme%20Pro/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Classic%20Theme%20Pro/css/slick.css">
    <link rel="stylesheet" href="/unzips/Classic%20Theme%20Pro/css/slick-theme.css">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid ">
            <div class="row">
                <div class="container">
                    <div class="col-md-12 top-nav pl pr">
                        <div class="col-md-2 col-sm-12 col-xs-12 home pl pr">
                            <ul class="list-unstyled list-inline">
                                <li><a href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 160px;"></a></li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12 sociall pr">
                            <ul class="list-inline list-unstyled text-right">
                                @if(!empty($offices[0]->address))
                                <li class="text-left">email
                                    <p>{{$offices[0]->email}}</p>
                                </li>
                                <li class="text-left">phone
                                    <p>{{$offices[0]->telephone}}, {{$offices[0]->mobile_no}}</p>
                                </li>
                                <li class="text-left">Follow Us<br>
                                        <a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a>
                                        <a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a>
                                        <a href="mailto:{{$offices[0]->email}}"><i class="fa fa-envelope-o"></i></a>
                                    
                                </li>
                                @else
                                    {{'No info Available'}}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="col-lg-12 no-padding">
                        <nav class="navbar navbar-default main-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse no-padding" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="#home1">Home</a></li>
                                    <li><a href="#about">About Us</a></li>
                                    <li><a href="#contact">Offices</a></li>
                                    <li><a href="#work">Our Work</a></li>
                                    <li><a href="#team">Our Team</a></li>
                                    <li><a href="#contact">Contact Us</a></li>
                                    <li><a href="#" class="start">Start Now</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="banner-caption text-center">
                            <p>Welcome To {{$agencyWebsite->agency_name}}</p>
                            <h2>Visit &amp; Get Your</h2>
                            <h2>Dreamed House Here</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="aboutus-sect" id="about">
            <div class="container-fluid" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 position">
                                <div class="background">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a data-toggle="pill" href="#home">ABOUT US</a></li>
                                        <li><a data-toggle="pill" href="#menu1">OFFICES</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="mCustomScrollbar">
                                         <?php
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($agencyWebsite->about_us);
                                            $content = $doc->saveHTML();
                                            echo $content;
                                        ?>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade" style="overflow-x: hidden;">
                                    <div class="owl-carousel office-content">
                                        <?php $i = 1; ?>
                                        @foreach($offices as $office)
                                        <div class="item">
                                            <div class="col-md-12 col-sm-12 pl pr">
                                                <div class="col-md-6 col-sm-6 pl pr">
                                                    <div class="address-office display">
                                                        <h3>{{sprintf("%02d", $i)}}</h3>
                                                        <h4>Office</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 pl pr">
                                                    <div class="address-office">
                                                        <ul class="list-unstyled">
                                                            <li><span class="ftr-pic"><img src="/unzips/Classic%20Theme%20Pro/images/6th-Thame_03.png" alt=""></span>
                                                                <p>{{$office->address}}</p>
                                                            </li>
                                                            <li><span class="ftr-pic"><img src="/unzips/Classic%20Theme%20Pro/images/asas_07.png" alt=""></span>
                                                                <p class="phone">{{$office->telephone}}, {{$office->uan_number}}</p>
                                                            </li>
                                                            <li><span class="ftr-pic"><img src="/unzips/Classic%20Theme%20Pro/images/6th-Thame_11.png" alt=""></span>
                                                                <p class="email">{{$office->email}}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++ ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container maincont pl">
                                <div class="mainttl-wrap">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pl">
                                        <div class="col-md-6 col-sm-6 col-xs-6 pl">
                                            <h1 class="mainttl"><span>Featured <b>Properties</b></span></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row prop-grid" id="myList">
                                    @foreach($properties as $property)
                                    <div class="col-xs-12 col-sm-6 col-md-4 prop-i-col">
                                        <div class="prop-i">
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="prop-i-img">
                                                @if($property->gallery != "")
                                                <?php
                                                    $images =explode(';',$property->gallery);
                                                    $count = count($images);
                                                ?>
                                                <img src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                                @else
                                                <img src="/unzips/Classic%20Theme%20Pro/images/no-image.jpg" alt="{{$property->title}}">
                                                @endif
                                            </a>
                                            <div class="prop-i-top">
                                                <p class="prop-i-loc">
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                        <?php
                                                            $town = ucwords(str_replace("-", " ", App\Property::getTownName($property->town_id)));
                                                            $city = ucwords(str_replace("-", " ", App\Property::getCityName($property->city_id)));
                                                            $phase = ucwords(str_replace("-", " ", App\Property::getPhaseName($property->phase_id)));
                                                        ?>
                                                        @if($property->purpose == 4) 
                                                            {{$town}}, {{$city}}
                                                        @else 
                                                            {{$town}}, {{$city}}, {{$phase}}
                                                        @endif
                                                    </a>
                                                </p>
                                            </div>
                                            <h3 class="prop-i-ttl">
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                    @if(strlen($property->title) <= 35)
                                                              {{$property->title}}
                                                    @else
                                                      <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                                    @endif
                                                </a>
                                            </h3>
                                            <dl class="prop-i-info">
                                                <dt>
                                                    <span class="prop-i-info-icon">
                                                        <img src="/unzips/Classic%20Theme%20Pro/images/propinfo1.png" alt="">
                                                    </span> 
                                                    @if($property->purpose !== 4)
                                                        {{$property->area_type}}
                                                    @else
                                                        {{"AREA TYPE"}}
                                                    @endif
                                                </dt>
                                                <dd>
                                                    @if($property->purpose !== 4)
                                                        {{$property->area}}
                                                    @else
                                                        {{"NA"}}
                                                    @endif
                                                </dd>
                                                <dt>
                                                    <span class="prop-i-info-icon">
                                                        <img src="/unzips/Classic%20Theme%20Pro/images/propinfo2.png" alt="">
                                                    </span> 
                                                    Bedrooms
                                                </dt>
                                                <dd>
                                                    @if($property->purpose !== 4)
                                                        {{$property->bed}}
                                                    @else
                                                        {{"NA"}}
                                                    @endif
                                                </dd>
                                                <dt>
                                                    <span class="prop-i-info-icon">
                                                        <img src="/unzips/Classic%20Theme%20Pro/images/propinfo3.png" alt="">
                                                    </span> 
                                                    Bath
                                                </dt>
                                                <dd>
                                                    @if($property->purpose !== 4)
                                                        {{$property->bed}}
                                                    @else
                                                        {{"NA"}}
                                                    @endif
                                                </dd>
                                            </dl>
                                            <div class="prop-i-bottom">
                                                <p class="prop-i-price"><span class="prop-i-price-val">
                                                    @if($property->purpose !== 4)
                                                    <?php
                                                        echo "Rs. ";
                                                        $price = $property->price;
                                                        $formated_num = number_format((double)$price);
                                                        echo $formated_num;
                                                    ?>
                                                    @else
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View Schemes</a>
                                                    @endif
                                                </span></p>
                                                <p class="prop-i-type"><a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                    @if($property->purpose == 1)
                                                        {{"For Sale"}}
                                                    @elseif($property->purpose == 2)
                                                        {{"For Rent"}}
                                                    @elseif($property->purpose == 3)
                                                        {{"Wanted"}}
                                                    @elseif($property->purpose == 4)
                                                        {{"Project"}}
                                                    @endif
                                                </a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a href="" id="loadMore" class="more">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-sect" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mainttl"><span>Our <b>Great Team</b></span></h2>
                            <div class="regular">
                                @foreach ($staffs as $staff)
                                <div class="internal-sec">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pl pr">
                                        <div class="col-sm-6 col-sm-12 col-xs-12 pl pr width">
                                            <p>{{$staff->designation}}</p>
                                            <h2>{{$staff->name}}</h2>
                                            <div class="boxes">
                                                <ul>
                                                    <li class="green"><span>{{$staff->year_of_service}} Year Servies</span></li>
                                                    <li><a href="javascript:void(0);" title="Phone Number" data-toggle="popover" data-placement="top" data-content="{{$staff->contact_number}}"><i class="fa fa-mobile mob"></i></a></li>
                                                    <li><a href="javascript:void(0);" title="Facebook" data-toggle="popover" data-placement="right" data-content="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="javascript:void(0);" title="Google Plus" data-toggle="popover" data-placement="top" data-content="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 pl pr">
                                            <div class="img-container">
                                                <div class="img-block"><img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer">
            <div class="container-fluid footer-btm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 backtotop">
                                <a href="javascript:" id="return-to-top" style=""><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/unzips/Classic%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
    <script src="/unzips/Classic%20Theme%20Pro/js/bootstrap.min.js"></script>
    <script src="/unzips/Classic%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/unzips/Classic%20Theme%20Pro/js/owl.carousel.js"></script>
    <script src="/unzips/Classic%20Theme%20Pro/js/owl.carousel.min.js"></script>
    <script src="/unzips/Classic%20Theme%20Pro/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
    $('#return-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });
    </script>
    <script>
    $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: true,
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
                    items: 1,
                    dots: true,
                    nav: false,
                    loop: false
                }
            }
        });


        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {

                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    })
    </script>
    <script src="/unzips/Classic%20Theme%20Pro/js/slick.js"></script>
    <script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 2,

            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2,

                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

    });
    </script>
    <script>
    $(function() {
        $(".prop-i-col").slice(0, 3).show();
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".prop-i-col:hidden").slice(0, 3).slideDown();
            if ($(".prop-i-col:hidden").length == 0) {
                $("#load").fadeOut('slow');
                $('#loadMore').hide();
            }
        });
    });
    $(".start").click(function() {
        $('html,body').animate({
                scrollTop: $("#about").offset().top
            },
            'slow');
    });
    </script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
    </script>
</body>

</html>