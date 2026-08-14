<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Solo%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Solo%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Solo%20Portfolio%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid">
            <div class="row">
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
                                    <li><a href="#ceo">CEO MESSAGE</a></li>
                                    <li><a href="#work">OUR WORK</a></li>
                                    <li><a href="#contact">CONTACT</a></li>
                                    <li><a href="#about">ABOUT US</a></li>
                                    <li><a href="#team">OUR TEAM</a></li>
                                    <li><a href="#office">OUR OFFICES</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="col-md-12 pl pr">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($i=0; $i
                <count($agencyWebsite->Images); $i++)
                    <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                    @endfor
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach($agencyWebsite->Images as $image)
                <div class="item">
                    <img src="/images/banners/original_{{$image->image}}" alt="{{$image->title}}">
                    <div class="carousel-caption cap">
                        <h2>{{$image->title}}</h2>
                        <p>{{$image->caption}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="main">
        <section class="ceo-msg-sect" id="ceo">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ceo-msg">
                            <div class="col-md-4 col-sm-6 col-xs-12 ceo-img">
                                <figure>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo" />
                                        </div>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 ceo-text">
                                <h2>Hamza<span>(CEO)</span> </h2>
                                <div class="mCustomScrollbar">
                                    <p>{{strip_tags($agencyWebsite->ceo_message, '
                                        <br>')}}</p>
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
                        <div class="property-portion">
                            <h2>Our <span>Work</span></h2>
                            <p>Explore Our Projects</p>
                        </div>
                        <div class="col-lg-12  pr">
                            @foreach($properties as $property)
                            <div class="col-md-4 col-sm-6 workportion pl">
                                <figure class="internal-sec">
                                    @if($property->gallery != "")
                                    <?php
                                        $images =explode(';',$property->gallery);
                                    ?>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img src="/images/property/user_property/original_{{$images[0]}}" class="imgs img-responsive">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="overlay">
                                        <div class="text">
                                            <p>
                                                @if(strlen($property->title) <= 35)
                                                      {{$property->title}}
                                                @else
                                                      <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                                @endif
                                            </p>
                                            <p>PRICE:<span>RS. 
                                                <?php
                                                            if($property->purpose !== 4){ 
                                                              echo "Rs. ";
                                                              $price = $property->price;
                                                              $formated_num = number_format((double)$price);
                                                              echo $formated_num;
                                                            }
                                                          ?>
                                                              
                                                          </span></p>
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="btn btn-default">VIEW DETAIL</a>
                                        </div>
                                        <span class="top">
                                            @if($property->purpose !== 4)
                                            {{"Property"}}
                                            @else
                                            {{"Project"}}
                                            @endif
                                        </span>
                                    </div>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-sect" id="contact">
            <div class="container-fluid" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills abtandcntct">
                                <li class="rr rr-left active"><a data-toggle="pill" href="#home">CONTACT US
                                </a></li>
                                <li class="rr rr-right"><a data-toggle="pill" href="#menu1">ABOUT US</a></li>
                            </ul>
                            <div class="tab-content about-content">
                                <div id="home" class="tab-pane fade in active">
                                    <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control textarea-height" type="textarea" name="message" id="message" placeholder="Message" rows="7"></textarea>
                                        </div>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                                <div id="menu1" class="tab-pane fade about-text">
                                    <h3>ABOUT US</h3>
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
        <section class="team hidden-xs" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-content">
                                <div class="team-heading">
                                    <h2><span>Our</span> Team</h2>
                                    <span>Best In Best Member</span>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="Cube">
                                        <h2>Shoaib</h2>
                                        <p>Project Manager</p>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span>5 year of services</p>
                                        <p><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567 </p>
                                        <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com </p>
                                    </div>
                                    <div class="tab-pane fade" id="Rollcake">
                                        <h2>Tayyab</h2>
                                        <p>Project Manager</p>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span>5 year of services</p>
                                        <p><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567 </p>
                                        <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com </p>
                                    </div>
                                    <div class="tab-pane fade" id="Spun">
                                        <h2>Usman</h2>
                                        <p>Project Manager</p>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span>5 year of services</p>
                                        <p><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567 </p>
                                        <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com </p>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs tabs">
                                    <li class="col-md-4 col-sm-4 pl img-hover active">
                                        <a href="#Cube" data-toggle="tab">
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <img src="images/team-img-1_13.jpg" class="img=responsive team-img">
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="fb-lnk"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a>
                                    </li>
                                    <li class="col-md-4 col-sm-4 pl img-hover">
                                        <a href="#Rollcake" data-toggle="tab">
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <img src="images/team-img-1_13.jpg" class="img=responsive team-img">
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="fb-lnk"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a>
                                    </li>
                                    <li class="col-md-4 col-sm-4 pl img-hover">
                                        <a href="#Spun" data-toggle="tab">
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <img src="images/team-img-1_13.jpg" class="img=responsive team-img">
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="fb-lnk"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team hidden-md hidden-lg hidden-sm" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="team-content">
                                <div class="team-heading">
                                    <h2><span>Our</span> Team</h2>
                                    <span>Best In Best Member</span>
                                </div>
                                <div class="col-xs-12 team-one">
                                    <div class="col-xs-12 img-bottom">
                                        <img src="images/team-img-1_13.jpg" class="img=responsive team-img">
                                    </div>
                                    <div class="col-xs-12">
                                        <h2>Shoaib</h2>
                                        <p>Project Manager</p>
                                        <ul>
                                            <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span>5 year of services</li>
                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567</li>
                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 team-two">
                                    <div class="col-xs-12 img-bottom">
                                        <img src="images/team-img-2_13.jpg" class="img=responsive team-img">
                                    </div>
                                    <div class="col-xs-12">
                                        <h2>Tayyab</h2>
                                        <p>Project Manager</p>
                                        <ul>
                                            <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span>5 year of services</li>
                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567</li>
                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 team-three">
                                    <div class="col-xs-12 img-bottom">
                                        <img src="images/team-img-1_13.jpg" class="img=responsive team-img">
                                    </div>
                                    <div class="col-xs-12">
                                        <h2>Usman</h2>
                                        <p>Project Manager</p>
                                        <ul>
                                            <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span>5 year of services</li>
                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567</li>
                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-sect" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-heading">
                            <h2>Our <span>Offices</span></h2>
                            <p>Best In Best Member</p>
                        </div>
                        <div class="col-md-8 map">
                            <div class="container-fluid no-padding">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.7227736383365!2d74.32938531522932!3d31.504303081374974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190468fac707b5%3A0xccf10281e353bf7f!2sKalma+Chowk+Flyover!5e0!3m2!1sen!2s!4v1502435999670" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-4 location">
                            <div id="text-carousel" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <ol class="carousel-indicators small">
                                    <li data-target="#text-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#text-carousel" data-slide-to="1"></li>
                                    <li data-target="#text-carousel" data-slide-to="2"></li>
                                </ol>
                                <div class="row">
                                    <div class="col-md-12 location-detail">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <div class="carousel-content">
                                                    <div>
                                                        <h2>Lahore Office</h2>
                                                        <ul>
                                                            <li><span><i class="fa fa-home fot-home" aria-hidden="true"></i></span>Dha Main buliwar, phase 4 ,house 45.</li>
                                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567</li>
                                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="carousel-content">
                                                    <div>
                                                        <h2>Karachi Office</h2>
                                                        <ul>
                                                            <li><span><i class="fa fa-home fot-home" aria-hidden="true"></i></span>Dha Main buliwar, phase 4 ,house 45.</li>
                                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567</li>
                                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="carousel-content">
                                                    <div>
                                                        <h2>Islamabad Office</h2>
                                                        <ul>
                                                            <li><span><i class="fa fa-home fot-home" aria-hidden="true"></i></span>Dha Main buliwar, phase 4 ,house 45.</li>
                                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span>+92 300 1234567</li>
                                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>ali@gmail.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer">
                <div class="container-fluid footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="col-md-4 bottom-logo">
                                    <h2><span>LOGO</span></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div class="col-md-4 followon">
                                    <h2><span>FOLLOW ON</span> </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut .</p>
                                    <ul class="list-inline follow-social">
                                        <li><a href="#"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                        <li><a href="#"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span></a> </li>
                                        <li><a href="#"><span><i class="fa fa-twitter" aria-hidden="true"></i></span> </a> </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 contactus">
                                    <h2><span>CONTACT US</span></h2>
                                    <ul class="pl">
                                        <li><span><i class="fa fa-home" aria-hidden="true"></i></span>Dha Main buliwar, phase 4 ,house 45 lahore.</li>
                                        <li><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>Dha Main buliwar, phase 4 ,house 45 lahore.</li>
                                        <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span>Dha Main buliwar, phase 4 ,house 45 lahore.</li>
                                    </ul>
                                </div>
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
<script src="/unzips/Solo%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Solo%20Portfolio%20Theme/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/unzips/Solo%20Portfolio%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
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