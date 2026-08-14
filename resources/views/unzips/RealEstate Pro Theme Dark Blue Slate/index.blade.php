<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/RealEstate%20Pro%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/RealEstate%20Pro%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/RealEstate%20Pro%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet prefetch" href="/unzips/RealEstate%20Pro%20Theme/css/owl.carousel.min.css">
    <!-- custom scrollbar stylesheet -->
    <link rel="stylesheet" href="/unzips/RealEstate%20Pro%20Theme/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/unzips/RealEstate%20Pro%20Theme/css/style.css">
    <link href="/unzips/RealEstate%20Pro%20Theme%20Dark%20Blue%20Slate/css/theme.css" rel="stylesheet">
    <link href="/unzips/RealEstate%20Pro%20Theme%20Dark%20Blue%20Slate/css/custom.css" rel="stylesheet">
</head>

<body>
    <header id="home" class="header">
        <div class="container">
            <div class="row">
                <div class="menu-bar fixed-nav" id="header">
                    <div class="col-md-12 col-sm-12 col-xs-12 pr">
                        <div class="primary-menu">
                            <nav class="navbar navbar-inverse mb">
                                <div class="container">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                        <a class="navbar-brand" href="#"><img src="/images/logo/{{$agencyWebsite->logo}}"></a> </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#home">Home</a></li>
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#aboutus">About Us</a></li>
                                            <li><a href="#contact">Contact</a></li>
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
        <div class="banner" id="ceo"> 
            <div class="ceo-msg">
                <h2> CEO’s Message</h2>
                <div class="mCustomScrollbar">
                    <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section id="aboutus" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="bottom-border">about us</h2>
                        <div class="content mCustomScrollbar">
                            <?php
                                $doc = new DOMDocument();
                                $doc->loadHTML($agencyWebsite->about_us);
                                echo $doc->saveHTML();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ceo message -->
        <section id="contactus" class="contact-form contactus">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <h2 class="bottom-border">Contact Us</h2>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Enter Full Name" required="" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Enter Contact Number" required="" type="text">
                                </div>
                                <div class="form-group text-area">
                                    <textarea class="form-control textarea-height" type="textarea" name="message" id="message" placeholder="Message" rows="7"></textarea>
                                </div>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our work -->
        <section id="work" class="property-sect">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 property-portion text-left">
                        <h2 class="bottom-border">Our Work</h2>
                    </div>
                    <div class="col-lg-12 our-work" style="padding: 0;">
                        @foreach($properties as $property)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding-adjust">
                            <div class="team-section">
                                <figure>
                                    <div class="abc"> 
                                        
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                        @if($property->gallery != "")
                                        <?php
                                            $images =explode(';',$property->gallery);
                                        ?>
                                        <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="ceo-image">
                                        @endif
                                        <div class="info-text">
                                            <h3>
                                            @if(strlen($property->title) <= 25)
                                                {{$property->title}}
                                            @else
                                                <?php echo substr(strip_tags($property->title),0,25).'...';?>
                                            @endif
                                            </h3>
                                            <p>
                                                @if(strlen($property->title) <= 30)
                                                    {{App\Property::getTownName($property->town_id)}} {{App\Property::getCityName($property->city_id)}}
                                                @else
                                                    <?php 
                                                        $town = App\Property::getTownName($property->town_id);
                                                        $city = App\Property::getCityName($property->city_id);
                                                        $town_city = $town . ', ' . $city;
                                                        echo substr(strip_tags($town_city),0,30).'...';
                                                    ?>
                                                @endif

                                            </p>
                                            <p>Rs. 
                                                <?php  
                                                    $price = $property->price;
                                                    $formated_num = number_format((double)$price);
                                                    echo $formated_num;
                                                ?>
                                            </p>
                                        </div>
                                        </a>
                                        <div class="shade"><a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}"><i class="fa fa-plus"></i></a></div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- our Team -->
        <section id="team" class="team-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 property-portion team-portion text-left pl">
                        <h2 class="bottom-border">Our Team</h2>
                    </div>

                    <div class="col-lg-12 our-team" style="padding: 0;">
                        <ul class="nav nav-tabs">
                            <?php $i = 0; ?>
                            @foreach($staffs as $staff)

                            <li class="@if($i==0) in active @endif"><a data-toggle="tab" href="#menu{{$i}}"><img src="/images/staff/thumb_{{$staff->image}}"></a></li>
                            <?php $i++ ?>
                            @if($i==5)
                            @break
                            @endif
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            @foreach($staffs as $staff)
                            <div id="menu{{$i}}" class="tab-pane fade in @if($i==0) active @endif">
                                <h3><span class="color"> {{$staff->name}} </span> / {{$staff->designation}}</h3>
                                <p class="color">Year of service: {{$staff->year_of_service}}</p>
                                <ul class="info-agent">
                                    <li><a href="#"><i class="fa fa-envelope color"></i> {{$staff->email}}</a></li>
                                    <li><a href="#"><i class="fa fa-phone color"></i> {{$staff->contact_number}}</a></li>
                                </ul>
                                <ul class="social-media">
                                    <li><a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <?php $i++ ?>
                            @if($i==5)
                            @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-sm-4 col-xs-12 office-addresses follow">
                                <h1>Follow us</h1>
                                 @if(!empty($offices[0]->address))
                                    <p>{{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}<br />{{$offices[0]->email}}<br />{{$offices[0]->address}} </p>
                                    {{$offices[0]->city}}
                                @else
                                    <p>{{'No info Available'}}</p>
                                @endif
                                
                                <ul>
                                    @if(!empty($offices[0]->address))
                                    <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-4  col-sm-4 col-xs-12 office-addresses">
                                <div class="footer-logo text-center"><a href="/"><img class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}"></a></div>
                                <p>
                                    @if(strlen($agencyWebsite->about_us) <= 250)
                                    {{strip_tags($agencyWebsite->about_us)}}
                                    @else
                                        <?php echo substr(strip_tags($agencyWebsite->about_us),0,250).'...';?>
                                    @endif
                                </p>
                            </div>
                            <div class="col-lg-4  col-sm-4  col-sm-4  col-xs-12 office-addresses">
                                <div class="contact-form">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                       <!-- <ol class="carousel-indicators">
                                            @for($i=0; $i<count($offices); $i++)
                                            <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                                            @endfor
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            @foreach($offices as $office)
                                            <div class="item">
                                                @foreach($cities as $city)
													@if($city->id == $office->city_id)
													<h1>{{$city->name}} Office</h1>
													@endif
												@endforeach
                                                <div class="office-addresses">
                                                    <ul>
                                                        <li><span><i class="fa fa-home"></i></span><p> {{$office->address}}</p></li>
                                                        <li><span><i class="fa fa-mobile"></i></span> <p>{{$office->telephone}}</p></li>
                                                        <li><span><i class="fa fa-envelope"></i></span> <p class="email-break">{{$office->email}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center copy-right">
                            <p>All Rights Reserved and Powered by Technological Inc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="/unzips/RealEstate%20Pro%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/RealEstate%20Pro%20Theme/js/jquery-migrate-3.0.0.js"></script>
    <script src="/unzips/RealEstate%20Pro%20Theme/js/bootstrap.min.js"></script>
    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>  -->
    <script src="/unzips/RealEstate%20Pro%20Theme/http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="/unzips/RealEstate%20Pro%20Theme/js/owl.carousel.js"></script>
    <!-- custom scrollbar plugin -->
    <script src="/unzips/RealEstate%20Pro%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        $("div.carousel-inner div.item:first").addClass("active");
        $(".carousel-indicators li:first-child").addClass("active");
    </script>
    <script>
    $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            navText: ['', ''],
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    dots: true,
                    nav: false,
                    loop: false
                }
            }
        });


        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });


        $(function() {
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

        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
    });
    </script>
    <script type="text/javascript">
    // Page Scroll
    jQuery(document).ready(function($) {
        $('.menu-bar a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') ||
                location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
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

    $(function() {
        createSticky($("#header"));
    });

    function createSticky(sticky) {
        if (typeof sticky !== "undefined") {
            var pos = sticky.offset().top,
                win = $(window);
            win.on("scroll", function() {
                win.scrollTop() >= pos ? sticky.addClass("fixedtop") : sticky.removeClass("fixedtop");
            });
        }
    }
    </script>
    <script>
    (function($) {
        $(window).on("load", function() {

            $("#content-1,#content-2,#content-3").mCustomScrollbar({
                theme: "minimal"
            });

        });
    })(jQuery);
    </script>
</body>

</html>