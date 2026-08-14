<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Business%20Empathy%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Business%20Empathy%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Business%20Empathy%20Theme/css/nanoscroller.css">
    <link href="/unzips/Business%20Empathy%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Business%20Empathy%20Theme/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Business%20Empathy%20Theme/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Business%20Empathy%20Theme/css/slick-theme.css">
    <link rel="stylesheet" href="/unzips/Business%20Empathy%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/unzips/Business%20Empathy%20Theme/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Business%20Empathy%20Theme/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid">
            <div class="row ">
                <div class="mynav">
                    <div class="container pr">
                        <div class="col-lg-12 pr">
                            <nav class="navbar navbar-default top-nav">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
                                </div>
                                <div class="collapse navbar-collapse pr" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#home1">HOME</a></li>
                                        <li><a href="#about">ABOUT US</a></li>
                                        <li><a href="#work">OUR WORK</a></li>
                                        <li><a href="#ceo">CEO MESSAGE</a></li>
                                        <li><a href="#team">OUR TEAM</a></li>
                                        <li><a href="#office">OUR OFFICES</a></li>
                                        <li><a href="#contact">CONTACT</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container pr">
                    <div class="col-lg-12 pr">
                        <div class="banner-text">
                            <p>we have</p>
                            <p>lot <span>of</span> choices</p>
                            <p>for your dream house</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="aboutus-sect" id="about">
            <div class="container-fluid text-center no-padding">
                <div id="main-title" style="background-position: -3182px center;" class="text-center section-padding main-title">
                    <h2>About Us</h2>
                    <img src="/unzips/Business%20Empathy%20Theme/images/stick_03.jpg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 text-center about-us">
                                <div class="about-heading">
                                    <p>Here is our brief introduction. You will find us a best option for your solutions to properties.</p>
                                </div>
                                <div class="about-text">
                                    <div class="mCustomScrollbar">
                                        <?php
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($agencyWebsite->about_us);
                                            $content = $doc->saveHTML();
                                            echo $content;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container-fluid no-padding">
                <div id="seconed-title" style="background-position: -3182px center;" class="text-center section-padding main-title">
                    <h2>Our Work</h2>
                    <img src="/unzips/Business%20Empathy%20Theme/images/stick_03.jpg">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="team-heading col-md-12">
                            <div class="property-heading text-center">
                                <p>See our projects and properties.</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 properties">
                            @foreach($properties as $property)
                            <div class="col-md-6 col-sm-6 col-xs-12 property pr pl">
                                <div class="col-md-6 col-sm-6 col-xs-12 property-img pr">
                                    <div class="img-container">
                                        <div class="img-block">
                                            @if($property->gallery != "")
                                            <?php
                                                $images =explode(';',$property->gallery);
                                                $count = count($images);
                                            ?>
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                            </a>
                                            @else
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                <img class="img-responsive" src="/unzips/Business%20Empathy%20Theme/images/no-image.jpg" alt="{{$property->title}}">
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 property-dtl pr">
                                    <div class="property-text">
                                        <p>
                                            @if(strlen($property->title) <= 35)
                                                  {{$property->title}}
                                            @else
                                              <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                            @endif
                                        </p>
                                        <p>
                                            {{$property->address}}
                                        </p>
                                        <p>
                                            @if($property->purpose !== 4)
                                            <?php
                                                echo "Rs. ";
                                                $price = $property->price;
                                                $formated_num = number_format((double)$price);
                                                echo $formated_num;
                                            ?>
                                            @else
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View Schemes For Prices</a>
                                            @endif
                                        </p>
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="dtls">Details</a>
                                    </div>
                                </div>    
                            </div>
                            
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="ceo-sect" id="ceo">
            <div class="container-fluid no-padding">
                <div id="third-title" style="background-position: -3182px center;" class="text-center section-padding main-title">
                    <h2>Ceo Message</h2>
                    <img src="/unzips/Business%20Empathy%20Theme/images/stick_03.jpg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 ceo-heading text-center">
                                <p>Read our ceo message for our performance.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 text-center ceo-text">
                                <div class="mCustomScrollbar">
                                    {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-sect" id="team">
            <div class="container-fluid no-padding">
                <div id="fourth-title" style="background-position: -3182px center;" class="text-center section-padding main-title">
                    <h2>Our Great Team</h2>
                    <img src="/unzips/Business%20Empathy%20Theme/images/stick_03.jpg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-1">
                            </div>
                            <div class="team-heading text-center">
                                <p>We have professionals. They always try to find best options for you.</p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="col-md-12 teams">
                            <div class="owl-carousel">
                                @foreach ($staffs as $staff)
                                <div class="item">
                                    <div class="col-md-5 team-img">
                                        <div class="img-container">
                                            <div class="img-block"><img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 property-content no-padding">
                                        <div class="slider-content team-content">
                                            <p>{{$staff->name}}</p>
                                            <p><span>{{$staff->designation}}</span> </p>
                                            <p>{{$staff->contact_number}}</p>
                                            <p><span>{{$staff->year_of_service}}</span> year of services</p>
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
        <section class="office-sect" id="office">
            <div class="container-fluid no-padding">
                <div id="fifth-title" style="background-position: -3182px center;" class="text-center section-padding main-title">
                    <h2>Our Offices</h2>
                    <img src="/unzips/Business%20Empathy%20Theme/images/stick_03.jpg"></div>
                <div class="container">
                    <div class="row mr">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="office-heading text-center">
                                    <p>Visit our locations and make your dreams true.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 offices">
                            <div class="your-class col-md-12">
                                <?php $i = 1; ?>
                                @foreach($offices as $office)
                                <div class="internal-sec">
                                    <h2>Office {{$i}}</h2>
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
        </section>
        <section class="form-sect" id="contact">
            <div class="container-fluid no-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                {{csrf_field()}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <textarea class="form-control textarea-height" type="textarea" id="message" name="message" placeholder="Message" rows="16"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-default">Send a message</button>
                                </div>
                            </form>
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
                        <div class="col-lg-12 ftr-btm">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 backtotop">
                                <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="/unzips/Business%20Empathy%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Business%20Empathy%20Theme/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
<script src="/unzips/Business%20Empathy%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/unzips/Business%20Empathy%20Theme/js/owl.carousel.js"></script>
<script src="/unzips/Business%20Empathy%20Theme/js/owl.carousel.min.js"></script>
<script>
    $('.properties div.property:nth-child(4n+3) .property-img, .properties div.property:nth-child(4n+4) .property-img').addClass('pull-right');
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
<script src="/unzips/Business%20Empathy%20Theme/js/jquery.flexslider.js"></script>
<script src="/unzips/Business%20Empathy%20Theme/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
$(function() {
    SyntaxHighlighter.all();
});
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 4,
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
<script src="/unzips/Business%20Empathy%20Theme/js/slick.js"></script>
<script type="text/javascript">
$(document).on('ready', function() {
    $(".your-class").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        infinite: false,
        speed: 1000,
        slide: 'div',



        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
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

        ]


    });

});
</script>
<script>
var i = null;

function ctmove() {
    i--;
    document.getElementById("main-title").style.backgroundPosition = i + "px";
    document.getElementById("main-title2").style.backgroundPosition = i + "px";
}
window.setInterval(ctmove, 30);
</script>
<script>
var i = null;

function ctmove() {
    i--;
    document.getElementById("seconed-title").style.backgroundPosition = i + "px";
    document.getElementById("seconed-title2").style.backgroundPosition = i + "px";
}
window.setInterval(ctmove, 30);
</script>
<script>
var i = null;

function ctmove() {
    i--;
    document.getElementById("third-title").style.backgroundPosition = i + "px";
    document.getElementById("third-title2").style.backgroundPosition = i + "px";
}
window.setInterval(ctmove, 30);
</script>
<script>
var i = null;

function ctmove() {
    i--;
    document.getElementById("fourth-title").style.backgroundPosition = i + "px";
    document.getElementById("fourth-title2").style.backgroundPosition = i + "px";
}
window.setInterval(ctmove, 30);
</script>
<script>
var i = null;

function ctmove() {
    i--;
    document.getElementById("fifth-title").style.backgroundPosition = i + "px";
    document.getElementById("fifth-title2").style.backgroundPosition = i + "px";
}
window.setInterval(ctmove, 30);
</script>

</html>