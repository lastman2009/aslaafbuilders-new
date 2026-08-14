<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="/unzips/Green%20Structures%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Green%20Structures%20Theme/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Green%20Structures%20Theme/css/nanoscroller.css">
    <link href="/unzips/Green%20Structures%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Green%20Structures%20Theme/css/owl.carousel.min.css">
    <link href="/unzips/Green%20Structures%20Theme%20Rolling%20Stone/css/theme.css" rel="stylesheet">
    <link href="/unzips/Green%20Structures%20Theme%20Rolling%20Stone/css/custom.css" rel="stylesheet">
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
                                    <li><a href="#team">OUR TEAM</a></li>
                                    <li><a href="#work">OUR WORK</a></li>
                                    <li><a href="#contact">CONTACT</a></li>
                                    <li><a href="#about">ABOUT US</a></li>
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
                    <img src="/images/banners/original_{{$image->image}}" alt="">
                    <div class="carousel-caption cap hidden-xs">
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
            <div class="shade"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center ceo-msg">
                        <figure class="figure">
                            <div class="img-container">
                                <div class="img-block">
                                    <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo">
                                </div>
                            </div>
                            <figcaption class="figure-caption">CEO MESSAGE</figcaption>
                        </figure>
                        <div class="mCustomScrollbar">
                            <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-sect" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="team-heading col-md-12 no-padding">
                            <h2>our team</h2>
                        </div>
                        <div class="col-md-12 no-padding members">
                            @foreach($staffs as $staff)
                            <div class="col-md-6 no-padding mb-20">
                                <div class="col-md-6 no-padding triangle">
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}" class="img-responsive">
                                        </div>
                                    </div>
                                    <div id="triangle-left hidden-xs">
                                    </div>
                                </div>
                                <div class="col-md-6 no-padding team-background">
                                    <div class="col-md-12 team-title">
                                        <h2>{{$staff->name}}</h2>
                                    </div>
                                    <div class="team-social">
                                        <ul class="list-inline">
                                            <li><a href="{{$staff->fb_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="{{$staff->google_plus}}"><i class="fa fa-envelope" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 team-detail">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span> {{$staff->year_of_service}}</li>
                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span> {{$staff->contact_number}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 text-center team-designation">
                                        <h3>{{$staff->designation}}</h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="project-sect" id="work">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="work-heading">
                                <h2>OUR <span>PROJECTS</span> </h2>
                            </div>
                            <div class="owl-carousel">
                                @foreach($properties as $property)
                                <div class="item">
                                    <div class="col-md-6 no-padding">
                                        <figure>
                                            @if($property->gallery != "")
                                            <?php
                                            $images =explode(';',$property->gallery);
                                            ?>
                                                <div class="abc">
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                        <div class="img-container">
                                                            <div class="img-block">
                                                                <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                        </figure>
                                    </div>
                                    <div class="col-md-6 property-content no-padding">
                                        <div class="slider-content">
                                            <h3>
                                                @if(strlen($property->title) <= 35)
                                                {{$property->title}}
                                                @else
                                                <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                                @endif
                                            </h3>
                                            <p>
                                                <?php
                                                    $town = ucwords(str_replace("-", " ", App\Property::getTownName($property->town_id)));
                                                    $city = ucwords(str_replace("-", " ", App\Property::getCityName($property->city_id)));
                                                    $phase = ucwords(str_replace("-", " ", App\Property::getPhaseName($property->phase_id)));
                                                ?>
                                                    @if($property->purpose == 4) {{$town}}, {{$city}} @else {{$town}}, {{$city}}, {{$phase}} @endif
                                            </p>
                                        </div>
                                        <div class="slider-content-two text-center">
                                            <ul class="list-inline">
                                                <li><span><i class="fa fa-bed" aria-hidden="true"></i></span>{{$property->bed}} Bedrooms</li>
                                                <li><span><i class="fa fa-bath" aria-hidden="true"></i></span>{{$property->bath}} Bathrooms</li>
                                                <li><span><i class="fa fa-building-o" aria-hidden="true"></i></span>{{$property->area}} {{$property->area_type}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12 slider-bottom no-padding">
                                            <ul class="list-inline">
                                                <li class="background-one">
                                                    @if($property->purpose !== 4)
                                                    <?php
                                                        $formated_num = number_format((double)$property->price);
                                                        echo "Rs. " . $formated_num;
                                                    ?>
                                                        @else
                                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" style="font-size:14px;padding:0;color:#50aff9;background:none;text-decoration:underline;">VIEW Schemes</a> @endif
                                                </li>
                                                <li class="background"><a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View Detail</a></li>
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
        <section class="about-sect" id="contact">
            <div class="container-fluid" id="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 tab-button">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#1a" data-toggle="tab">ABOUT US</a>
                                </li>
                                <li><a href="#2a" data-toggle="tab">CONTACT US</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid about" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content clearfix ">
                                <div class="tab-pane fade in active" id="1a">
                                    <div class="mCustomScrollbar">
                                        <?php
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($agencyWebsite->about_us);
                                            $content = $doc->saveHTML();
                                            echo $content;
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="2a">
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
                                                <textarea class="form-control textarea-height" type="textarea" name="name" id="message" placeholder="Message" rows="7"></textarea>
                                            </div>
                                            <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                                        </form>
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
                            <div class="col-lg-12">
                                <div id="office-address" class="nano contactus col-md-4 col-sm-4 col-xs-12">
                                    <div class="nano-content">
                                        @foreach($offices as $office)
                                        <ul class="pl">
                                            <h2>
                                                <span>
                                                    @foreach($cities as $city)
                                                    @if($city->id == $office->city_id)
                                                    {{$city->name}} Office
                                                    @endif 
                                                    @endforeach
                                                </span>
                                            </h2>
                                            <li><span><i class="fa fa-home" aria-hidden="true"></i></span> {{$office->address}}</li>
                                            <li><span><i class="fa fa-phone" aria-hidden="true"></i></span> {{$office->telephone}}</li>
                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span> {{$office->email}}</li>
                                        </ul>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4 followon col-sm-4 col-xs-12">
                                    <h2><span>FOLLOW ON</span> </h2>
                                    <p>You can follow us on the following links where you will find our portal posts and many more.</p>
                                    <ul class="list-inline follow-social">
                                        @if(!empty($offices[0]->address))
                                        <li><a href="{{$offices[0]->fb_link}}"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                        <li><a href="{{$offices[0]->google_link}}"><span><i class="fa fa-envelope" aria-hidden="true"></i></span></a> </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-4 bottom-logo col-sm-4 col-xs-12">
                                    <h2><a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a></h2>
                                    <p>
                                        @if(strlen($agencyWebsite->about_us)
                                        <=200) {{$agencyWebsite->about_us}} @else
                                            <?php echo substr(strip_tags($agencyWebsite->about_us),0,200).'......';?> @endif
                                    </p>
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
<script src="/unzips/Green%20Structures%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Green%20Structures%20Theme/js/bootstrap.min.js"></script>
<script src="/unzips/Green%20Structures%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/unzips/Green%20Structures%20Theme/js/jquery.nanoscroller.js"></script>
<script src="/unzips/Green%20Structures%20Theme/js/owl.carousel.js"></script>
<script src="/unzips/Green%20Structures%20Theme/js/owl.carousel.min.js"></script>
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


    $('.owl-carousel').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: [
            "<i class='fa fa-chevron-left'>",
            "<i class='fa fa-chevron-right'>"
        ],
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            580: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1024: {
                items: 1,
                dots: false,
                nav: true
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
<script type="text/javascript">
$(document).ready(function() {
    $("#office-address").nanoScroller();
});
</script>
<script>
$('.members > div').each(function(i) {
    $(this).addClass("member-" + i);
});
</script>