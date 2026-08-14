<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/eVision%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/eVision%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/eVision%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/eVision%20Portfolio%20Theme/css/nanoscroller.css">
    <link href="/unzips/eVision%20Portfolio%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/eVision%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
    <link href="/unzips/eVision%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
    <link href="/unzips/eVision%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/eVision%20Portfolio%20Theme/css/flexslider.css">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid">
            <div class="row">
                <div class="container pr">
                    <div class="col-lg-12 ">
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
                                    <li><a href="#property">OUR WORK</a></li>
                                    <li><a href="#team">OUR TEAM</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="col-md-12 no-padding banner">
        <img src="/unzips/eVision%20Portfolio%20Theme/images/banner.jpeg">
        <div class="modal-links">
            <ul class="list-unstyled">
                <li><a href="#" data-toggle="modal" data-target="#ceoMessage">CEO MESSAGE</a> </li>
                <li><a data-toggle="modal" data-target=".bs-example-modal-lg">ADDERSS</a> </li>
                <li><a href="#" data-toggle="modal" data-target="#contactUs">CONTACT US</a> </li>
            </ul>
        </div>
    </div>
    <div class="main">
        <section class="aboutus-sect" id="about">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 aboutus">
                            <div class="col-md-7">
                                <div class="aboutus-content">
                                    <h2>Some Words About Us</h2>
                                    <?php
                                        $doc = new DOMDocument();
                                        $doc->loadHTML($agencyWebsite->about_us);
                                        $content = $doc->saveHTML();
                                        echo $content;
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-5 aboutus-img">
                                <img src="/unzips/eVision%20Portfolio%20Theme/images/home-image_03.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="property">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="property-portion">
                                <h2>Our Most Recent Work</h2>
                            </div>
                            @foreach($properties as $property)
                            <div class="col-md-4 project">
                                <figure class="figure">
                                    @if($property->gallery != "")
                                    <?php
                                        $images =explode(';',$property->gallery);
                                        
                                    ?>
                                    <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                    @endif
                                    <figcaption class="figure-caption col-sm-12 col-xs-12 pl pr">
                                        <div class="col-md-7 col-sm-7 col-xs-7 name">
                                            <p>
                                              @if(strlen($property->title) <= 30)
                                                  {{$property->title}}
                                              @else
                                                  <?php echo substr(strip_tags($property->title),0,30).'...';?>
                                              @endif
                                            </p>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-5 amount pl pr">
                                            <p>
                                              <?php
                                                if($property->purpose !== 4){ 
                                                  echo "Rs. ";
                                                  $price = $property->price;
                                                  $formated_num = number_format((double)$price);
                                                  echo $formated_num;
                                                }
                                              ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 adrs">
                                            <p><span><i class="fa fa-map-marker loc-marker" aria-hidden="true"></i>{{App\Property::getTownName($property->town_id)}}, {{App\Property::getCityName($property->city_id)}}</span></p>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="middle">
                                    <div class="text">
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="team-heading">
            <div class="container">
                <h1>Meet Our Professional Team</h1>
            </div>
            <section class="team-sect" id="team">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 paddding">
                                <div class="owl-carousel">
                                    @foreach ($staffs as $staff)
                                    <div class="item staff">
                                        <div class="slider-content">
                                            <div class="col-lg-5 col-md-12">
                                                <figure class="figure"><img src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}" class="img-circle"></figure>
                                            </div>
                                            <div class="col-lg-7 col-md-12 team-content">
                                                <h2>{{$staff->name}}</h2>
                                                <h3>{{$staff->designation}}</h3>
                                                <p>{{$staff->year_of_service}}</p>
                                                <p class="email">{{$staff->email}}</p>
                                                <ul class="list-unstyled list-inline">
                                                    <li>{{$staff->mobile_no}}</li>
                                                    <li><a href="{{$staff->fb_link}}"><span><i class="fa fa-facebook" aria-hidden="true"></i></span> </a> </li>
                                                    <li><a href="{{$staff->google_plus}}"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span> </a> </li>
                                                </ul>
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
                <div class="container-fluid footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 followon col-xs-12 text-center ">
                                <h2><span>FOLLOW ON</span> </h2>
                                <ul class="no-padding">
                                    @if(!empty($offices[0]->address))
                                      <li>{{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
                                      <li>{{$offices[0]->email}}</li>
                                      <li>{{$offices[0]->address}}</li>
                                    @else
                                        {{'No info Available'}}
                                    @endif
                                </ul>
                                <ul class="list-inline follow-social">
                                    @if(!empty($offices[0]->address))
                                    <li><a href="{{$offices[0]->fb_link}}"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                    <li><a href="{{$offices[0]->google_link}}"><span><i class="fa fa-envelope" aria-hidden="true"></i></span></a> </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
    </div>
</body>

</html>
<html>
<script src="/unzips/eVision%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/eVision%20Portfolio%20Theme/js/bootstrap.min.js"></script>
<script src="/unzips/eVision%20Portfolio%20Theme/js/owl.carousel.js"></script>
<script src="/unzips/eVision%20Portfolio%20Theme/js/owl.carousel.min.js"></script>
<script src="/unzips/eVision%20Portfolio%20Theme/js/jquery.nanoscroller.js"></script>
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

    // $('.owl-carousel-address').owlCarousel({
    //     loop: true,
    //     dots: true,
    //     nav: false,

    //     margin: 15,
    //     responsiveClass: true,
    //     responsive: {
    //         0: {
    //             items: 3,
    //             nav: true
    //         },
    //         580: {
    //             items: 3,
    //             nav: false
    //         },
    //         600: {
    //             items: 3,
    //             nav: false
    //         },
    //         1024: {
    //             items: 3,
    //             dots: true,
    //             nav: false
    //         }
    //     }
    // });

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
<script type="text/javascript">
$(document).ready(function() {

    $(".nano").nanoScroller();

});
</script>
<div class="modal fade ceo-msg" id="ceoMessage" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-sm-5">
                        <img src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo" class="img-circle ceo-img"></div>
                    <div class="col-md-7 ceo-msg">
                        <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($offices as $office)
                    <li>
                        <div class="address-office">
                            <h3>{{$office->city}} Office</h3>
                            <ul>
                                <li><i class="fa fa-phone"></i> {{$office->telephone}}</li>
                                <li><i class="fa fa-envelope"></i> {{$office->email}}</li>
                                <li><i class="fa fa-map-marker"></i>{{$office->address}}</li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="contactUs" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                    {{csrf_field()}}
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="col-md-12">
                        <textarea class="msg form-control" id="message" name="message" placeholder="Message"></textarea>
                        <input type="submit" value="Submit" name="submit" class="form-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/unzips/eVision%20Portfolio%20Theme/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('.flexslider').flexslider();

});
</script>

</html>