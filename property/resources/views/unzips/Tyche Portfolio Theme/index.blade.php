<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Tyche%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Tyche%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Tyche%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Tyche%20Portfolio%20Theme/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Tyche%20Portfolio%20Theme/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Tyche%20Portfolio%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Tyche%20Portfolio%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Tyche%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
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
                                <a class="navbar-brand" href="#"><img src="/unzips/Tyche%20Portfolio%20Theme/images/logo_YourLogoHere.png"></a>
                            </div>
                            <div class="collapse navbar-collapse pr" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="#home1">HOME</a></li>
                                    <li><a href="#ceo">CEO MESSAGE</a></li>
                                    <li><a href="#work">OUR WORK</a></li>
                                    <li><a href="#about">ABOUT US</a></li>
                                    <li><a href="#team">OUR TEAM</a></li>
                                    <li><a href="#contact">CONTACT</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="ceo-msg" id="ceo">
                            <h2> CEO&rsquo;s Message</h2>
                            <div class="mCustomScrollbar">
                                <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="our-work" id="work">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="work-heading text-center">
                                <h2>Our Work</h2>
                                <p>View our recent work sold or rented.</p>
                            </div>
                            <div class="owl-carousel">
                                @foreach($properties as $property)
                                <div class="item hover">
                                    
                                    <figure>
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                            <div class="abc">
                                                @if($property->gallery != "")
                                                <?php
                                                    $images =explode(';',$property->gallery);
                                                    $count = count($images);
                                                ?>
                                                <div class="img-container">
                                                    <div class="img-block">
                                                        <img class="img-responsive image" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}"/>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="middle">
                                                    <div class="text text-center">
                                                        <p>
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
                                                        </p>
                                                        <p>{{$property->bed}} bedrooms, {{$property->bath}} bathrooms, {{$property->area}} {{$property->area_type}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                    
                                    <div class="col-md-12 slider-content text-center">
                                        <h3>
                                            @if(strlen($property->title) <= 35)
                                                {{$property->title}}
                                            @else
                                                <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                            @endif
                                        </h3>
                                        <p>
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
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="" id="about">
            <div class="container-fluid no-padding aboutt">
                <div class="aboutus-heading text-center">
                    <h2>About Us</h2>
                    <p>We are the right choice for your dreamed house.</p>
                </div>
                <div class="col-md-8 col-sm-8 col col-xs-12 no-padding aboutus-text mCustomScrollbar">
                    <?php
                        $doc = new DOMDocument();
                        $doc->loadHTML($agencyWebsite->about_us);
                        echo $doc->saveHTML();
                    ?>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 no-padding aboutus-img">
                    <img src="/unzips/Tyche%20Portfolio%20Theme/images/about-us_03.jpg" class="img-responsive">
                </div>
            </div>
        </section>
        <section class="team" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-content">
                                <div class="team-heading text-center">
                                    <h2>Our Team</h2>
                                    <p>We have professionals to fullfill your needs.</p>
                                </div>
                                <div class="row">
                                    @foreach ($staffs as $staff) 
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="team-members">
                                            <div class="team-avatar">
                                                <div class="img-container">
                                                    <div class="img-block">
                                                       <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="team-desc text-center">
                                              <h2>{{$staff->name}}</h2>
                                              <h3>{{$staff->designation}}</h3>
                                              <h4>{{$staff->mobile_no}}</h4>
                                              <p>{{$staff->email}}</p>

                                              <ul class="list-unstyled list-inline">
                                                  <li><a href="{{$staff->fb_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                  <li><a href="{{$staff->google_plus}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                              </ul>
                                            </div>
                                            <div class="team-detail text-center">
                                                <h2>{{$staff->name}}</h2>
                                                <p>{{$staff->designation}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer" id="contact">
                <div class="container-fluid footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="col-md-3 col-sm-4 col-xs-12 contactus">
                                    <h2><span>CONTACT US</span></h2>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <!--<ol class="carousel-indicators">
                                            @for($i=0; $i<count($offices); $i++)
                                                <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                                            @endfor
                                        </ol>-->
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            @foreach($offices as $office)
                                            <div class="item social"> 
                                                <ul class="pl">
                                                    <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span><p>{{$office->telephone}}</p></li>
                                                    <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span><p class="email-break">{{$office->email}}</p></li>
                                                    <li><span><i class="fa fa-map-marker" aria-hidden="true"></i></span><p>{{$office->address}}</p></li>
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-offset-1 col-md-4  col-sm-4 col-xs-12 bottom-logo contact-form">
                                    <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Contact Number" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                                        </div>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Send</button>
                                    </form>
                                </div>
                                <div class="col-md-offset-1 col-md-3  col-sm-4 col-xs-12 followon">
                                    <h2><span>FOLLOW ON</span> </h2>
                                    <p>You can follows us on google and as well as on facebook by clicking on the links for your latest posts.</p>
                                    <ul class="list-inline follow-social">
                                        <li><a href="{{$offices[0]->fb_link}}"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                        <li><a href="{{$offices[0]->google_link}}"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="container-fluid footer-btm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg- col-md-6 col-sm-12 col-xs-12">
                        <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 backtotop">
                        <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<html>
<script src="/unzips/Tyche%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/unzips/Tyche%20Portfolio%20Theme/https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
<script src="/unzips/Tyche%20Portfolio%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/unzips/Tyche%20Portfolio%20Theme/js/bootstrap.min.js"></script>
<script src="/unzips/Tyche%20Portfolio%20Theme/js/owl.carousel.js"></script>
<script src="/unzips/Tyche%20Portfolio%20Theme/js/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(".carousel-inner div.item:first-child").addClass('active');
    $(".carousel-indicators li:first-child").addClass("active");
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
        dots: false,
        nav: true,
        navText: [
            "<i class='fa fa-long-arrow-left'>",
            "<i class='fa fa-long-arrow-right'>"
        ],
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            580: {
                items: 2,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1024: {
                items: 4,
                dots: false,
                nav: true,
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

</html>