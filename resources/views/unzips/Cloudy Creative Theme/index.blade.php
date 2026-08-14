<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Cloudy%20Creative%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Cloudy%20Creative%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Cloudy%20Creative%20Theme/css/owl.carousel.min.css">
    <link href="/unzips/Cloudy%20Creative%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Cloudy%20Creative%20Theme/css/custom.css" rel="stylesheet">
    <link href="/unzips/Cloudy%20Creative%20Theme/css/slick.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Cloudy%20Creative%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Cloudy%20Creative%20Theme/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Cloudy%20Creative%20Theme/css/slick.css">
    <link rel="stylesheet" href="/unzips/Cloudy%20Creative%20Theme/css/slick-theme.css">
</head>

<body>
    <header id="menu">
        <div class="container-fluid menu-bar sticky" id="home">
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
                                        <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 185px"></a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#about">About Us</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#contact">Contact Us</a></li>
                                            <li><a href="#office">Our Offices</a></li>
                                            <li><a href="javascript:void(0);"><img src="/unzips/Cloudy%20Creative%20Theme/images/line-bar.png" alt=""></a></li>
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
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-text">
                            <h1>FIND YOUR </h1>
                            <h2>DREAM HOUSE</h2>
                            <a href="javascript:void(0);">Get Start Now</a>
                        </div>
                    </div>
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
                                        <img class="img-responsive" src="/unzips/Cloudy%20Creative%20Theme/images/about-img.png" alt="">
                                        <h3>About Us</h3>
                                        <img src="images/line.jpg" alt="">
                                    </div>
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
                                        <img class="img-responsive" src="/unzips/Cloudy%20Creative%20Theme/images/ceo-img.png" alt="">
                                        <h3>Ceo Message</h3>
                                        <img src="images/line.jpg" alt=""></div>
                                    <div class="caption__overlay caption__overlay__content mCustomScrollbar">
                                        {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 color-section">
                                <div class="contact-section caption color-panel text-center">
                                    <div class="first-panel">
                                        <img class="img-responsive" src="/unzips/Cloudy%20Creative%20Theme/images/contact-img.png" alt="">
                                        <h3>Contact</h3>
                                        <img src="/unzips/Cloudy%20Creative%20Theme/images/line.jpg" alt="">
                                    </div>
                                    <div class="caption__overlay">
                                        @if(!empty($offices[0]->address))
                                        <ul class="contact-address">
                                            <li><span><img src="/unzips/Cloudy%20Creative%20Theme/images/address.png" alt=""></span><span class="second-portion">{{$offices[0]->address}}</span></li>
                                            <li><span><img src="/unzips/Cloudy%20Creative%20Theme/images/phone.png" alt=""></span><span class="second-portion">{{$offices[0]->telephone}}, {{$offices[0]->uan_number}}</span></li>
                                            <li><span><img class="msg-img" src="/unzips/Cloudy%20Creative%20Theme/images/msg.png" alt=""></span><span class="second-portion">{{$offices[0]->email}}</span></li>
                                        </ul>
                                        <img class="img-responsive second-line" src="/unzips/Cloudy%20Creative%20Theme/images/second-line.jpg" alt="">
                                        <ul class="social-address">
                                            <li><a href="mailto:{{$offices[0]->email}}"><i class="fa fa-envelope-o"></i></a></li>
                                            <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                        @endif
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
                                        <div class="col-md-6 col-sm-6 col-xs-12 pl">
                                            <h1 class="mainttl"><span>Featured <b>Work</b></span></h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prop-grid" id="myList">
                                    @foreach($properties as $property)
                                    <div class="col-xs-12 col-sm-6 col-md-4 prop-i-col">
                                        <div class="prop-i">
                                            @if($property->gallery != "")
                                            <?php
                                                $images =explode(';',$property->gallery);
                                                $count = count($images);
                                            ?>
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="prop-i-img">
                                                <img src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                            </a>
                                            @endif

                                            <?php
                                                $town = ucwords(str_replace("-", " ", App\Property::getTownName($property->town_id)));
                                                $city = ucwords(str_replace("-", " ", App\Property::getCityName($property->city_id)));
                                                $phase = ucwords(str_replace("-", " ", App\Property::getPhaseName($property->phase_id)));
                                            ?>
                                            <div class="prop-i-top">
                                                <p class="prop-i-loc">
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                        {{$town}}
                                                    </a>,
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                        {{$city}}
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
                                                    <span class="prop-i-info-icon"><img src="/unzips/Cloudy%20Creative%20Theme/images/propinfo1.png" alt=""></span> 
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
                                                    <span class="prop-i-info-icon"><img src="/unzips/Cloudy%20Creative%20Theme/images/propinfo2.png" alt=""></span> Bedrooms
                                                </dt>
                                                <dd>
                                                    @if($property->purpose !== 4)
                                                        {{$property->bed}}
                                                    @else
                                                        {{"NA"}}
                                                    @endif
                                                </dd>
                                                <dt>
                                                    <span class="prop-i-info-icon"><img src="/unzips/Cloudy%20Creative%20Theme/images/propinfo3.png" alt=""></span> Baths
                                                </dt>
                                                <dd>
                                                    @if($property->purpose !== 4)
                                                        {{$property->bath}}
                                                    @else
                                                        {{"NA"}}
                                                    @endif
                                                </dd>
                                            </dl>
                                            <div class="prop-i-bottom">
                                                <p class="prop-i-price">
                                                    <span class="prop-i-price-val">
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
                                                    </span>
                                                </p>
                                                <p class="prop-i-type">
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                        @if($property->purpose == 1)
                                                            {{"For Sale"}}
                                                        @elseif($property->purpose == 2)
                                                            {{"For Rent"}}
                                                        @elseif($property->purpose == 3)
                                                            {{"Wanted"}}
                                                        @elseif($property->purpose == 4)
                                                            {{"Project"}}
                                                        @endif
                                                    </a>
                                                </p>
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
                        <div class="col-md-12 pr">
                            <div class="regular">
                                @foreach ($staffs as $staff)
                                <div class="internal-sec">
                                    <div class="col-md-12 pr pl">
                                        <div class="col-sm-6 col-sm-12 pr pl width">
                                            <p>{{$staff->designation}}</p>
                                            <h2>{{$staff->name}}</h2>
                                            <div class="boxes">
                                                <ul>
                                                    <li class="green"><span>{{$staff->year_of_service}} Year Servies</span></li>
                                                    <li><a href="javascript:void(0);" title="Phone Number" data-toggle="popover" data-placement="top" data-content="{{$staff->contact_number}}"><i class="fa fa-mobile mob"></i></a></li>
                                                    <li><a href="javascript:void(0);" title="Facebook" data-toggle="popover" data-placement="right" data-content="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="blue"><a href="javascript:void(0);" title="E-mail" data-toggle="popover" data-placement="top" data-content="{{$staff->email}}"><i class="fa fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 pr pl team-image">
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
        <section class="information">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="contact">
                                <div class="contact-portion">
                                    <h2>Send Us a Message</h2>
                                    <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pl">
                                                <input class="form-control" name="name" placeholder="Name" type="text" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-6 pl email-contact">
                                                <input class="form-control" name="email" placeholder="E-mail" type="email" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 pl">
                                                <input class="form-control" name="phone" placeholder="Phone" type="text" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pl">
                                                <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pl">
                                                <button class="btn">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" id="office">
                                <div class="office-portion">
                                    <h2>Office Information</h2>
                                    <div class="mCustomScrollbar offices">
                                        <?php $i = 1; ?>
                                        @foreach($offices as $office)
                                        <div class="office-address">
                                            <h3>Office {{$i}}</h3>
                                            <p>{{$office->address}}</p>
                                            <p>{{$office->telephone}}, {{$office->uan_number}}</p>
                                            <p>{{$office->email}}</p>
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
    </div>
    <footer>
        <div class="footer">
            <div class="container-fluid footer-btm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <p class="copyright">&copy; Copyright Technological.inc 2017</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 backtotop">
                                <a href="javascript:" id="return-to-top" style=""><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
<html>
<script src="/unzips/Cloudy%20Creative%20Theme/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
<script src="/unzips/Cloudy%20Creative%20Theme/js/bootstrap.min.js"></script>
<script src="/unzips/Cloudy%20Creative%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/unzips/Cloudy%20Creative%20Theme/js/owl.carousel.js"></script>
<script src="/unzips/Cloudy%20Creative%20Theme/js/owl.carousel.min.js"></script>
<script src="/unzips/Cloudy%20Creative%20Theme/js/jquery.flexslider.js"></script>
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
<script src="/unzips/Cloudy%20Creative%20Theme/js/slick.js"></script>
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


$(".banner-text a").click(function() {
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

</html>