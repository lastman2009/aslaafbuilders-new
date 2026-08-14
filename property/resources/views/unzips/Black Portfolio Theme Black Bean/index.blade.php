<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Black%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Black%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Black%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link href="/unzips/Black%20Portfolio%20Theme%20Black%20Bean/css/theme.css" rel="stylesheet">
    <link href="/unzips/Black%20Portfolio%20Theme%20Black%20Bean/css/custom.css" rel="stylesheet">
    <link href="/unzips/Black%20Portfolio%20Theme/css/slick.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Black%20Portfolio%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Black%20Portfolio%20Theme/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Black%20Portfolio%20Theme/css/slick.css">
    <link rel="stylesheet" href="/unzips/Black%20Portfolio%20Theme/css/slick-theme.css">
</head>

<body>
    <header class="header" id="home">
        <div class="hdr-shade"></div>
        <div class="container-fluid">
            <div class="container menu-bar">
                <div class="row">
                    <div class="col-md-12 pr">
                        <div class="top-bar">
                            <div class="col-md-4 col-sm-4 pull-left support-section">
                                <p>CONTACT US<br />
                                    <span>
                                        @if(!empty($offices[0]->address))
                                            {{$offices[0]->telephone}}, {{$offices[0]->mobile_no}}
                                        @else
                                            {{'No info Available'}}
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-4 text-center">
                                <div class="logo">
                                    <a href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width:150px"></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 social-media pull-right">
                                <ul>
                                    @if(!empty($offices[0]->address))
                                    <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook-official" aria-hidden="true"></i></a> </li>
                                    <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                    <li><a href="mailto:{{$offices[0]->email}}"><i class="fa fa-envelope" aria-hidden="true"></i></a> </li>
                                    @else
                                        {{'No info Available'}}
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pr">
                        <div class="primary-menu">
                            <nav class="navbar navbar-inverse mb">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#about">About Us</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#contact">Contact</a></li>
                                            <li><a href="#office">Our Offices</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.container-fluid -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 banner-text">
                    <h1>Get Your Dreamed House</h1>
                    <p>{{$agencyWebsite->agency_name}}</p>
                    <a href="javascript:void(0);" class="start">Start Now</a>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="main-section">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4 col-sm-4 col-xs-12 color-section" id="about">
                                <div class="about-section caption color-panel text-center">
                                    <div class="first-panel">
                                        <img class="img-responsive" src="/unzips/Black%20Portfolio%20Theme/images/about-img.png" alt="">
                                        <h3>About Us</h3>
                                        <img src="/unzips/Black%20Portfolio%20Theme/images/line.jpg" alt=""></div>
                                    <div class="caption__overlay caption__overlay__content mCustomScrollbar">
                                        <?php
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($agencyWebsite->about_us);
                                            $content = $doc->saveHTML();
                                            echo $content;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 color-section" id="ceo">
                                <div class="ceo-section caption color-panel text-center">
                                    <div class="first-panel">
                                        <img class="img-responsive" src="/unzips/Black%20Portfolio%20Theme/images/ceo-img.png" alt="">
                                        <h3>Ceo Message</h3>
                                        <img src="/unzips/Black%20Portfolio%20Theme/images/line.jpg" alt=""></div>
                                    <div class="caption__overlay caption__overlay__content mCustomScrollbar">
                                        {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 color-section">
                                <div class="contact-section caption color-panel text-center">
                                    <div class="first-panel">
                                        <img class="img-responsive" src="/unzips/Black%20Portfolio%20Theme/images/contact-img.png" alt="">
                                        <h3>Contact</h3>
                                        <img src="/unzips/Black%20Portfolio%20Theme/images/line.jpg" alt=""></div>
                                    <div class="caption__overlay">
                                        <ul class="contact-address">
                                            @if(!empty($offices[0]->address))
                                            <li>
                                                <span>
                                                    <img src="/unzips/Black%20Portfolio%20Theme/images/address.png" alt="">
                                                </span>
                                                <span class="second-portion">
                                                    {{$offices[0]->address}}
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <img src="/unzips/Black%20Portfolio%20Theme/images/phone.png" alt="">
                                                </span>
                                                <span class="second-portion">
                                                    {{$offices[0]->telephone}}, {{$offices[0]->mobile_no}}
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <img class="msg-img" src="/unzips/Black%20Portfolio%20Theme/images/msg.png" alt="">
                                                </span>
                                                <span class="second-portion" style="word-break: break-all;">
                                                    {{$offices[0]->email}}
                                                </span>
                                            </li>
                                            @endif
                                        </ul>
                                        <img class="img-responsive second-line" src="/unzips/Black%20Portfolio%20Theme/images/second-line.jpg" alt="">
                                        <ul class="social-address">
                                            @if(!empty($offices[0]->address))
                                            <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook-official" aria-hidden="true"></i></a> </li>
                                            <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="mailto:{{$offices[0]->email}}"><i class="fa fa-envelope" aria-hidden="true"></i></a> </li>
                                            @else
                                                {{'No info Available'}}
                                            @endif
                                        </ul>
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
                        <div class="col-md-12 col-sm-12 pl">
                            <h2 class="head">Featured Works</h2>
                            @foreach($properties as $property)
                            <div class="col-md-4 col-sm-4 pr property-section">
                                <div class="img-container">
                                    <div class="img-block">
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                            @if($property->gallery != "")
                                            <?php
                                                $images =explode(';',$property->gallery);
                                                $count = count($images);
                                            ?>
                                            <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                            @else
                                            <img class="img-responsive" src="/unzips/Black%20Portfolio%20Theme/images/no-image.jpg" alt="{{$property->title}}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="property-content">
                                    <h2>
                                        @if(strlen($property->title) <= 35)
                                                  {{$property->title}}
                                        @else
                                          <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                        @endif
                                    </h2>
                                    <p>
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
                                    </p>
                                    <h5><strong>Price: </strong>
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
                                                </h5>
                                    <ul class="list-inline list-unstyled">
                                        <li>
                                            <a href="javascript:void(0)" title="No. of Beds" data-placement="top" data-toggle="popover" data-content='<?php echo  ($property->purpose !== 4) ? $property->bed : "NA"; ?>'>
                                                <img src="/unzips/Black%20Portfolio%20Theme/images/bed.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title="No. of Parkings" data-placement="bottom" data-toggle="popover" data-content='<?php echo (!empty($property->valet_car_parking)) ? $property->valet_car_parking : "NA"; ?>'>
                                                <img src="/unzips/Black%20Portfolio%20Theme/images/car.png">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="property-anchor" href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View Detail</a>
                            </div>
                            @endforeach
                            <a href="javascript:void(0)" id="loadMore">Show More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="office-sect" id="office">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php $i = 1; ?>
                                    @foreach($offices as $office)
                                        <li role="presentation">
                                            <a href="#office{{$i}}" aria-controls="office1" role="tab" data-toggle="tab">office {{$i}}</a>
                                        </li>
                                        @if($i==3)
                                            @break
                                        @endif
                                    <?php $i++ ?>
                                    @endforeach
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <?php $i = 1; ?>
                                    @foreach($offices as $office)
                                        <div role="tabpanel" class="tab-pane fade in" id="office{{$i}}">
                                            <div class="flexslider">
                                                <ul class="slides">
                                                    <li>
                                                        <div class="address-office">
                                                            <h3>{{sprintf("%02d", $i)}}</h3>
                                                            <h4>Office</h4>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="address-office">
                                                            <ul class="list-unstyled">
                                                                <li><span class="ftr-pic"><img src="/unzips/Black%20Portfolio%20Theme/images/home.png" alt=""></span>
                                                                    <p>{{$office->address}}</p>
                                                                </li>
                                                                <li><span class="ftr-pic"><img style="width: 27px !important;" src="/unzips/Black%20Portfolio%20Theme/images/phone.png" alt=""></span>
                                                                    <p class="phone">{{$office->telephone}}, {{$office->uan_number}}</p>
                                                                </li>
                                                                <li><span class="ftr-pic"><img src="/unzips/Black%20Portfolio%20Theme/images/envelope.png" alt=""></span>
                                                                    <p class="email">{{$office->email}}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if($i==3)
                                            @break
                                        @endif
                                    <?php $i++ ?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-sect" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-6 col-sm-6 pr pl team-text">
                            <div class="tab-content">
                                <?php $i = 1; ?>
                                @foreach ($staffs as $staff)
                                <div class="tab-pane fade in" id="staff{{$i}}">
                                    <h2>{{$staff->name}}</h2>
                                    <h4>{{$staff->designation}}</h4>
                                    <ul>
                                        <li><a href="javascript:void(0);" title="Contact Number" data-toggle="popover" data-placement="left" data-content="{{$staff->contact_number}}"><i class="fa fa-mobile mob"></i></a></li>
                                        <li><a href="javascript:void(0);" title="Facebook" data-toggle="popover" data-placement="bottom" data-content="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                        <li class="blue"><a href="javascript:void(0);" title="Google Plus" data-toggle="popover" data-placement="top" data-content="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="blue"><a href="javascript:void(0);" title="E-mail" data-toggle="popover" data-placement="right" data-content="{{$staff->email}}"><i class="fa fa-envelope-o"></i></a></li>
                                    </ul>
                                </div>
                                    @if($i==4)
                                        @break
                                    @endif
                                <?php $i++ ?>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 pr pl">
                            <ul class="nav nav-tabs tabs-right">
                                <?php $i = 1; ?>
                               @foreach ($staffs as $staff)
                                    <li>
                                        <a href="#staff{{$i}}" data-toggle="tab">
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <figure><img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></figure>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @if($i==4)
                                        @break
                                    @endif
                                <?php $i++ ?>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer id="office" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-4 col-sm-4">
                            <div class="ftr-1 text-center">
                                <a href="/"><img class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 170px;"></a>
                                <p>
                                    @if(strlen($agencyWebsite->about_us) <= 150)
                                        {{strip_tags($property->title)}}
                                    @else
                                        <?php echo substr(strip_tags($agencyWebsite->about_us),0,150).'...';?>
                                    @endif
                                </p>
                                <ul>
                                    @if(!empty($offices[0]->address))
                                    <li><a href="javascript:void(0);" title="Contact Numbers" data-toggle="popover" data-placement="left" data-content="{{$offices[0]->telephone}}, {{$offices[0]->uan_number}}"><i class="fa fa-mobile mob"></i></a></li>
                                    <li><a href="javascript:void(0);" title="Facebook" data-toggle="popover" data-placement="top" data-content="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0);" title="Google Plus" data-toggle="popover" data-placement="bottom" data-content="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="blue"><a href="javascript:void(0);" title="E-mail" data-toggle="popover" data-placement="right" data-content="{{$offices[0]->email}}"><i class="fa fa-envelope"></i></a></li>
                                    @else
                                        {{'No info Available for Head Office'}}
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="ftr-menu text-center">
                                <ul>
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#about">About Us</a></li>
                                    <li><a href="#work">Our Work</a></li>
                                    <li><a href="#team">Our Team</a></li>
                                    <li><a href="#ceo">CEO Message</a></li>
                                    <li><a href="#contact">Contact Us</a></li>
                                    <li><a href="#office">Offices</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 contact-form">
                            <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                            {{csrf_field()}}
                                <div class="col-lg-6 col-md-6 col-sm-6 form-group pl">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 form-group pl">
                                    <input class="form-control" id="email" name="email" placeholder="E-mail" type="text" required>
                                </div>
                            
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group pl">
                                    <textarea class="form-control textheight" id="message" name="message" placeholder="Message..." rows="6" name="message" required></textarea>
                                </div>
                            
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group pl">
                                    <input type="submit" name="submit" class="btn btn-success" value="Send">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 backtotop"> <a href="javascript:" id="return-to-top" style="">Back to top<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/unzips/Black%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
    <script src="/unzips/Black%20Portfolio%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/Black%20Portfolio%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/unzips/Black%20Portfolio%20Theme/js/owl.carousel.js"></script>
    <script src="/unzips/Black%20Portfolio%20Theme/js/owl.carousel.min.js"></script>
    <script src="/unzips/Black%20Portfolio%20Theme/js/jquery.flexslider.js"></script>
    <script>
        $('.card .nav-tabs li:first-child').addClass('active');
        $('.card .tab-content div.tab-pane:first-child').addClass('active');
        $('.team-sect .nav-tabs li:first-child').addClass('active');
        $('.team-sect .tab-content div.tab-pane:first-child').addClass('active');
    </script>
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
    <script src="/unzips/Black%20Portfolio%20Theme/js/slick.js"></script>
    <script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,

            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,

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
        $(".property-section").slice(0, 3).show();
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".property-section:hidden").slice(0, 3).slideDown();
            if ($(".property-section:hidden").length == 0) {
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


    $(window).scroll(function() {
        var sticky = $('.sticky'),
            scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    });
    </script>
    <script>
    $(document).ready(function() {
        $(".navbar-nav li a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function() {});
            }
        });

        $(function() {
            $('.navbar-nav li a').click(function() {
                $('.navbar-nav').find('li.active').removeClass('active');
                $(this).parent().addClass('active');
                return false; //return false to aviod scroll top.
            });
        });
    })
    </script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
    </script>
</body>

</html>