<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Tricon%20Theme%20Pro/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Tricon%20Theme%20Pro/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Tricon%20Theme%20Pro/css/owl.carousel.min.css">
    <link href="/unzips/Tricon%20Theme%20Pro%20Haiti/css/theme.css" rel="stylesheet">
    <link href="/unzips/Tricon%20Theme%20Pro%20Haiti/css/custom.css" rel="stylesheet">
    <link href="/unzips/Tricon%20Theme%20Pro/css/slick.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/unzips/Tricon%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Tricon%20Theme%20Pro/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Tricon%20Theme%20Pro/css/slick.css">
    <link rel="stylesheet" href="/unzips/Tricon%20Theme%20Pro/css/slick-theme.css">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid ">
            <div class="row">
                <div class="container">
                    <div class="col-md-12 top-nav">
                        <div class="col-md-4 col-sm-4 col-xs-12 top-contact">
                            <ul class=" list-unstyled">
                                <li>contact us</li>
                                <li>
                                    @if(!empty($offices[0]->address))
                                        {{$offices[0]->telephone}}, {{$offices[0]->mobile_no}}
                                    @else
                                        {{'No info Available'}}
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 top-logo">
                            <a href="/">
                                <img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width:150px">
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 top-social">
                            <ul class="list-unstyled list-inline">
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
        <div class="container-fluid" id="header">
            <div class="row mynav">
                <div class="container">
                    <div class="col-lg-12 no-padding">
                        <nav class="navbar navbar-default main-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse no-padding" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="#home1">Home</a></li>
                                    <li><a href="#work">Our Work</a></li>
                                    <li><a href="#about">About Us</a></li>
                                    <li><a href="#team">Our Team</a></li>
                                    <li><a href="#ceo">Ceo Message</a></li>
                                    <li><a href="#contact">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-caption text-center">
            <p>Welcome To {{$agencyWebsite->agency_name}}</p>
            <h2>Get Your Dreamed House</h2>
        </div>
    </header>
    <div class="main">
        <section class="property-sect" id="work">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h2 class="head">Featured Properties</h2>
                            @foreach($properties as $property)
                            <div class="col-md-4 col-sm-4 iproperty">
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
                                            <img class="img-responsive" src="/unzips/Tricon%20Theme%20Pro/images/no-image.jpg" alt="{{$property->title}}">
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
                                                <img src="/unzips/Tricon%20Theme%20Pro/images/bed.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title="No. of Parkings" data-placement="bottom" data-toggle="popover" data-content='<?php echo (!empty($property->valet_car_parking)) ? $property->valet_car_parking : "NA"; ?>'>
                                                <img src="/unzips/Tricon%20Theme%20Pro/images/car.png">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-12 col-sm-12">
                                <a href="" id="loadMore">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="aboutus-sect" id="about">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>About Us</h2>
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
        <section class="ceo-sect" id="ceo">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Ceo Message</h2>
                            <div class="mCustomScrollbar">
                                <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="information" id="contact">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center contact">
                            <h3 class="text-centre">
                                <a href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 170px;"></a>
                            </h3>
                            <p>
                                @if(strlen($agencyWebsite->about_us) <= 250)
                                    {{strip_tags($property->title)}}
                                @else
                                    <?php echo substr(strip_tags($agencyWebsite->about_us),0,250).'...';?>
                                @endif
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="contact">
                                <div class="contact-portion">
                                    <h2>Send Us a Message</h2>
                                    <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pl">
                                                <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-6 pl email-contact">
                                                <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 pl">
                                                <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pl">
                                                <textarea style="resize:vertical;" id="message" class="form-control" placeholder="Message..." rows="6" name="message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pl">
                                                <button type="submit" name="submit" class="btn">Send</button>
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
                                    <div class="mCustomScrollbar">
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
            <div class="container-fluid footer-btn">
                <div class="container">
                    <div class="col-md-12">
                        <div class="col-lg-6 col-md-6 col-sm-6 copyright">
                            <p>&copy; Copyright Technological.inc 2017</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 backtotop">
                            <a href="javascript:" id="return-to-top" style=""><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
<html>
<script src="/unzips/Tricon%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
<script src="/unzips/Tricon%20Theme%20Pro/js/bootstrap.min.js"></script>
<script src="/unzips/Tricon%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
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
<script>
   $(function () {
       $(".iproperty").slice(0, 3).show();
       $("#loadMore").on('click', function (e) {
           e.preventDefault();
           $(".iproperty:hidden").slice(0, 3).slideDown();
           if ($(".iproperty:hidden").length == 0) {
               $("#load").fadeOut('slow');
               $('#loadMore').hide();
           }
       });
   });
</script>
<script>
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
</script>

</html>