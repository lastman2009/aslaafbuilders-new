<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Floral%20Theme%20Pro/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Floral%20Theme%20Pro/css/font-awesome.css" rel="stylesheet">
    <link href="/unzips/Floral%20Theme%20Pro/css/theme.css" rel="stylesheet">
    <link href="/unzips/Floral%20Theme%20Pro/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Floral%20Theme%20Pro/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Floral%20Theme%20Pro/css/jquery.fullPage.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Floral%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/unzips/Floral%20Theme%20Pro/css/flexslider.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="/unzips/Floral%20Theme%20Pro/css/jquery-responsiveGallery.css">
</head>

<body>
    <header id="menu">
        <div class="container-fluid menu-bar">
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
                                        <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li data-menuanchor="home" class="active"><a href="#home">Home</a></li>
                                            <li data-menuanchor="about"><a href="#about">About Us</a></li>
                                            <li data-menuanchor="work"><a href="#work">Our Work</a></li>
                                            <li data-menuanchor="team"><a href="#team">Our Team</a></li>
                                            <li data-menuanchor="contact"><a href="#contact">Contact Us</a></li>
                                            <li data-menuanchor="office"><a href="#office">Our Offices</a></li>
                                            <li data-menuanchor="bar"><a href="javascript:void(0);"><img src="/unzips/Crystal%20Theme%20Pro/images/line-bar.png" alt=""></a></li>
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
    </header>
    <div id="fullpage">
        <div class="section active" id="section0">
            <div class="container">
                <div class="home-page">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>we are bring <span>your</span>dream house</h2>
                            <!-- <a class="btn-down" href="javascript:void(0);"><img src="/unzips/Crystal%20Theme%20Pro/images/down-arrow.png" alt=""></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section1">
            <div class="container">
                <div class="about-us">
                    <div class="row">
                        <div class="col-md-12 mCustomScrollbar pl pr">
                            <h2>About  Us.</h2>
                            <div class="col-md-12 col-sm-12 pl pr">
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
        <div class="section" id="section2">
            <div class="container">
                <div class="work">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel" id="owls">
                                @foreach($properties as $property)
                                <div class="item">
                                    <div class="col-md-6 col-sm-6 work-section">
                                        <div class="work-detail">
                                            <h5>
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
                                            </h5>
                                            <h2>
                                                @if(strlen($property->title) <= 45)
                                                          {{$property->title}}
                                                @else
                                                  <?php echo substr(strip_tags($property->title),0,45).'...';?>
                                                @endif
                                            </h2>
                                            <p>
                                                @if(strlen($property->description) <= 350)
                                                          {{$property->description}}
                                                @else
                                                  <?php echo substr(strip_tags($property->description),0,350).'...';?>
                                                @endif
                                            </p>
                                            <a href="">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <figure>
                                            <div class="img-container">
                                                <div class="img-block">
                                                    @if($property->gallery != "")
                                                    <?php
                                                        $images =explode(';',$property->gallery);
                                                        $count = count($images);
                                                    ?>
                                                    <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                                    @else
                                                    <img class="img-responsive" src="/unzips/Black%20Portfolio%20Theme/images/no-image.jpg" alt="{{$property->title}}">
                                                    @endif
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="col-md-12 property-details">
                                        <div class="col-md-3 property-description pr pl">
                                            <h2>
                                                @if($property->purpose !== 4)
                                                    {{$property->area}}
                                                @else
                                                    {{"NA"}}
                                                @endif
                                            </h2>
                                            
                                            <h3>
                                                @if($property->purpose !== 4)
                                                    {{$property->area_type}}
                                                @else
                                                    {{"AREA TYPE"}}
                                                @endif
                                            </h3>
                                            
                                        </div>
                                        <div class="col-md-3 property-description box-2 pr pl">
                                            <h2>
                                                @if($property->purpose !== 4)
                                                    {{$property->bed}}
                                                @else
                                                    {{"NA"}}
                                                @endif
                                            </h2>
                                            <h3>Bedrooms</h3>
                                        </div>
                                        <div class="col-md-3 property-description pr pl">
                                            <h2>
                                                @if($property->purpose !== 4)
                                                <?php
                                                    echo "Rs. ";
                                                    $price = $property->price;
                                                    $formated_num = number_format((double)$price);
                                                    echo $formated_num;
                                                ?>
                                                @else
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">VIEW Schemes</a>
                                                @endif
                                            </h2>
                                            <h3>
                                                @if($property->purpose !== 4)
                                                    {{"Price"}}
                                                @else
                                                    {{"For Price"}}
                                                @endif
                                            </h3>
                                        </div>
                                        <div class="col-md-3 property-description box-2 pr pl">
                                            <h2>
                                                @if($property->purpose !== 4)
                                                    {{$property->bath}}
                                                @else
                                                    {{"NA"}}
                                                @endif
                                            </h2>
                                            <h3>BATH</h3>
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
        <div class="section" id="section3">
            <div class="container">
                <div class="team">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel" id="owls">
                                @foreach ($staffs as $staff)
                                <div class="item">
                                    <div class="col-md-6 col-sm-6 team-section">
                                        <div class="team-detail">
                                            <h5>{{$staff->designation}}</h5>
                                            <h2>{{$staff->name}}</h2>
                                            <div class="boxes">
                                                <ul>
                                                    <li><span>{{$staff->year_of_service}} Year Servies</span></li>
                                                    <li><a href="javascript:void(0);" title="Phone Number" data-toggle="popover" data-placement="top" data-content="{{$staff->contact_number}}"><i class="fa fa-mobile mob"></i></a></li>
                                                    <li><a href="javascript:void(0);" title="Facebook" data-toggle="popover" data-placement="right" data-content="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="blue"><a href="javascript:void(0);" title="E-mail" data-toggle="popover" data-placement="top" data-content="{{$staff->email}}"><i class="fa fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <figure>
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section4">
            <div class="container">
                <div class="contact">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12 pl">
                                            <div class="col-md-12 col-sm-12 pr">
                                                <h2>Contact Us.</h2>
                                            </div>
                                            <div class="col-md-12 col-sm-12 margin-topbottom pr">
                                                <div class="col-md-6 first-name pl">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl pr">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pl pr">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pr pl">
                                                    <div class="form-group">
                                                        <textarea class="form-control textarea-height" type="textarea" id="message" name="message" placeholder="Message" rows="7"></textarea>
                                                    </div>
                                                </div>
                                                <button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flexslider">
                            <ul class="slides">
                                <?php $i = 1; ?>
                                @foreach($offices as $office)
                                <li>
                                    <div class="address-office">
                                        <h3>{{sprintf("%02d", $i)}}</h3>
                                        <h4>Office</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="address-office">
                                        <ul class="list-unstyled">
                                            <li><span class="ftr-pic"><img src="/unzips/Crystal%20Theme%20Pro/images/home.png" alt=""></span>
                                                <p>{{$office->address}}</p>
                                            </li>
                                            <li><span class="ftr-pic"><img style="width: 27px !important;" src="/unzips/Crystal%20Theme%20Pro%20Dark%20Red/images/phone.png" alt=""></span>
                                                <p class="phone">{{$office->telephone}}, {{$office->uan_number}}</p>
                                            </li>
                                            <li><span class="ftr-pic"><img src="/unzips/Crystal%20Theme%20Pro/images/envelope.png" alt=""></span>
                                                <p class="email">{{$office->email}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php $i++ ?>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/unzips/Floral%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Floral%20Theme%20Pro/js/bootstrap.min.js"></script>
    <script src="/unzips/Floral%20Theme%20Pro/js/jquery-ui.min.js"></script>
    <script src="/unzips/Floral%20Theme%20Pro/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/unzips/Floral%20Theme%20Pro/js/jquery.fullPage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.4/jquery.fullpage.extensions.min.js"></script>
    <script type="text/javascript" src="/unzips/Floral%20Theme%20Pro/js/examples.js"></script>
    <script type="text/javascript" src="/unzips/Floral%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/unzips/Floral%20Theme%20Pro/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#fullpage').fullpage({
            anchors: ['home', 'about', 'work', 'team', 'contact', 'office'],
            menu: '#menu',
            fadingEffect: true,
        });

        $(".btn-down").click(function() {
            $('html,body').animate({
                    scrollTop: $("#section1").offset().top
                },
                'slow');
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 210,
            itemMargin: 5,
            minItems: 2,
            maxItems: 2,
            controlNav: true,
            directionNav: false
        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            navText: ['', ''],
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    dots: false,
                    nav: true,
                    loop: false
                }
            }
        });

        $('[data-toggle="popover"]').popover();

        $('#owls').owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            navText: ['', ''],
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    dots: false,
                    nav: true,
                    loop: false
                }
            }
        });
    });
    </script>
    <script type="text/javascript" src="/unzips/Floral%20Theme%20Pro/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="/unzips/Floral%20Theme%20Pro/js/jquery.responsiveGallery.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.responsiveGallery-wrapper').responsiveGallery({
            animatDuration: 400,
            $btn_prev: $('.responsiveGallery-btn_prev'),
            $btn_next: $('.responsiveGallery-btn_next')
        });
    });
    </script>
</body>

</html>