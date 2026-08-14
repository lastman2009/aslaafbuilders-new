<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Solus%20Theme%20Pro/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Solus%20Theme%20Pro/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Solus%20Theme%20Pro/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Solus%20Theme%20Pro/css/nanoscroller.css">
    <link href="/unzips/Solus%20Theme%20Pro/css/theme.css" rel="stylesheet">
    <link href="/unzips/Solus%20Theme%20Pro/css/custom.css" rel="stylesheet">
    <link href="/unzips/Solus%20Theme%20Pro/css/slick.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Solus%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Solus%20Theme%20Pro/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Solus%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="col-lg-12 no-padding">
                        <nav class="navbar navbar-default top-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand img-responsive" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 185px"></a>
                            </div>
                            <div class="collapse navbar-collapse pr" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="#home1">HOME</a></li>
                                    <li><a href="#about">ABOUT US</a></li>
                                    <li><a href="#team">OUR TEAM</a></li>
                                    <li><a href="#work">OUR WORK</a></li>
                                    <li><a href="#contact">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="banner-caption">
                            <h2>Find Your Dream House</h2>
                            <p class="hidden-xs">{{$agencyWebsite->agency_name}}, we have a lot of locations which matches with your dreams. Visit our site and get your wished property with ease and trust.</p>
                        </div>
                        <div class="scroll">
                            <div class="scroll-icon">
                                <p class="scroll-text">Scroll For More Info</p>
                                <a href="#info" class="smoothscroll">
                                    <div class="mouse"></div>
                                </a>
                                <div class="end-top"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="aboutus-sect" id="about">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home"><span><i class="fa fa-user-o" aria-hidden="true"></i></span>ABOUT</a></li>
                                    <li><a data-toggle="tab" href="#menu1"><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>CONTACT</a></li>
                                    <li><a data-toggle="tab" href="#menu2"><span><i class="fa fa-book" aria-hidden="true"></i></span> CEO MESSAGE</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active text-center aboutus">
                                        <h3>Get To Know Us.</h3>
                                        <div class="mCustomScrollbar">
                                            <?php
                                                $doc = new DOMDocument();
                                                $doc->loadHTML($agencyWebsite->about_us);
                                                $content = $doc->saveHTML();
                                                echo $content;
                                            ?>
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade text-center contact-us">
                                        <h3>Get To Know Us.</h3>
                                        <form class="form-horizontal" role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="4" name="message" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary contact-button">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="menu2" class="tab-pane fade text-center ceo-message">
                                        <h3>CEO Message</h3>
                                        <div class="mCustomScrollbar">
                                            <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
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
                        <div class="owl-carousel">
                            @foreach ($staffs as $staff)
                            <div class="item">
                                <figure>
                                    <div class="abc">
                                        <div class="img-container">
                                            <div class="img-block">
                                                <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></div>
                                        </div>
                                        <div class="facebook-icon">
                                            <a href="mailto:{{$staff->email}}"><i class="fa fa-envelope"></i></a>
                                            <a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a>
                                            <a href="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                        <div class="shades"></div>
                                    </div>
                                    <figcaption>
                                        <div class="team-heading">
                                            <h2>{{$staff->name}}</h2>
                                            <p>{{$staff->designation}}</p>
                                        </div>
                                        <div class="team-detail">
                                            <div class="col-md-6 col-sm-6 col-xs-6 team-description pl pr">
                                                <img src="/unzips/Solus%20Theme%20Pro/images/team-phone.png" alt="">
                                                <p>{{$staff->contact_number}}</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 team-description pl pr">
                                                <img class="team-service-img" src="/unzips/Solus%20Theme%20Pro/images/team-service.png" alt="">
                                                <p>{{$staff->year_of_service}} Year services</p>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
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
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="property-heading text-center">
                                    <h2>Our Work</h2>
                                    <p>We have a lot for you. You can view our projects and properties. There must be a choice or your match.</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="your-class">
                                @foreach($properties as $property)
                                <figure class="internal-sec">
                                    @if($property->gallery != "")
                                    <?php
                                        $images =explode(';',$property->gallery);
                                        $count = count($images);
                                    ?>
                                    <img src="/images/property/user_property/original_{{$images[0]}}" class="imgs" alt="{{$property->title}}">
                                    @else
                                    <img src="/unzips/Solus%20Theme%20Pro/images/no-image.jpg" class="imgs" alt="{{$property->title}}">
                                    @endif
                                    <div class="img-content">
                                        <div class="img-text">
                                            <p>
                                                @if(strlen($property->title) <= 35)
                                                      {{$property->title}}
                                                @else
                                                  <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                                @endif
                                            </p>
                                            <p>Price:&nbsp;&nbsp; 
                                                <span class="price"> 
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
                                        </div>
                                        <span class="bottom">
                                            @if($property->purpose !== 4)
                                                {{"Property"}}
                                            @else
                                                {{"Project"}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="overlay">
                                        <div class="text">
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="btn btn-default">VIEW DETAIL</a>
                                        </div>
                                        <span class="top">
                                            @if($property->purpose == 1)
                                                {{"For Sale"}}
                                            @elseif($property->purpose == 2)
                                                {{"For Rent"}}
                                            @elseif($property->purpose == 3)
                                                {{"Wanted"}}
                                            @elseif($property->purpose == 4)
                                                {{"Project"}}
                                            @endif
                                        </span>
                                    </div>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="social-sect" id="contact">
            <div class="container-fluid">
                <div class="col-md-12 social text-center">
                    @if(!empty($offices[0]->address))
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <img src="/unzips/Solus%20Theme%20Pro/images/email_06.png">
                        <h3>{{$offices[0]->email}}</h3>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 phon">
                        <img src="/unzips/Solus%20Theme%20Pro/images/address_09.png">
                        <h3>{{$offices[0]->telephone}}<br />{{$offices[0]->uan_number}}</h3>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 addr">
                        <img src="/unzips/Solus%20Theme%20Pro/images/address_06.png">
                        <h3>{{$offices[0]->address}}</h3>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer">
            <div class="container-fluid footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 ">
                        </div>
                        <div class="col-md-8 col-sm-8 footerr col-xs-12 text-center ">
                            <img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo">
                            <p>
                                @if(strlen($agencyWebsite->about_us) <= 250)
                                {{strip_tags($property->title)}}
                                @else
                                <?php echo substr(strip_tags($agencyWebsite->about_us),0,250).'...';?>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-2 ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid footer-btm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-12  col-sm-12 col-xs-12 backtotop">
                                <a href="javascript:" id="return-to-top" style=""><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a>
                            </div>
                            <div class="col-md-2">
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
<script src="/unzips/Solus%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
<script src="/unzips/Solus%20Theme%20Pro/js/bootstrap.min.js"></script>
<script src="/unzips/Solus%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/unzips/Solus%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/unzips/Solus%20Theme%20Pro/js/owl.carousel.js"></script>
<script src="/unzips/Solus%20Theme%20Pro/js/owl.carousel.min.js"></script>
<script type="text/javascript">
$('#return-to-top').click(function() {
    $('body,html').animate({
        scrollTop: 0
    }, 500);
});

$(".scroll").click(function() {
    $('html,body').animate({
            scrollTop: $("#about").offset().top
        },
        'slow');
});
</script>
<script>
$(document).ready(function() {


    $('.owl-carousel').owlCarousel({
        loop: true,
        dots: true,
        nav: false,

        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            580: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1024: {
                items: 3,
                dots: true,
                nav: false
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
<script src="/unzips/Solus%20Theme%20Pro/js/slick.js"></script>
<script type="text/javascript">
$(document).on('ready', function() {
    $(".your-class").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,

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
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

});
</script>

</html>