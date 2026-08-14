<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/New%20Techno%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/New%20Techno%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/New%20Techno%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/New%20Techno%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/New%20Techno%20Theme%20Green/css/theme.css" rel="stylesheet">
    <link href="/unzips/New%20Techno%20Theme%20Green/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home">
        <div class="hdr-shade"></div>
        <div class="container-fluid menu-bar sticky">
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
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#about">About Us</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#office">Offices</a></li>
                                            <li><a href="#contact">Contact Us</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 banner-text">
                    <p>Your House Your Paradise.</p>
                    <h1><span>Choose</span> Your <span>Favourite</span> House</h1>
                    <div class="diamond-section">
                        <div class="container diamond-shape">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="col-lg-8 col-md-8 col-sm-8 pl">
                            <div class="about-section">
                                <h5>Professional</h5>
                                <h2>Home Design &amp; Interiors</h2>
                                <div class="mCustomScrollbar">
                                    <?php
                                        $doc = new DOMDocument();
                                        $doc->loadHTML($agencyWebsite->about_us);
                                        echo $doc->saveHTML();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 about-img-section pl">
                            <figure>
                                <div class="abc">
                                    <a href="javascript:void(0);">
                                        <div class="img-container">
                                            <div class="img-block">
                                                <img class="img-responsive" src="/unzips/New%20Techno%20Theme/images/about-img.jpg" alt="about-image">
                                            </div>
                                        </div>
                                        <div class="shades"></div>
                                    </a>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel">
                            @foreach($properties as $property)
                            <div class="item">
                                <figure>
                                    <div class="abc">
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                            @if($property->gallery != "")
                                            <?php
                                                $images =explode(';',$property->gallery);
                                                $count = count($images);
                                            ?>
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$agencyWebsite->agency_name}}-property-image">
                                                </div>
                                            </div>
                                            @endif
                                            <span class="facebook-icon"><img src="/unzips/New%20Techno%20Theme/images/project-open.png" alt=""></span>
                                            <div class="shades"></div>
                                        </a>
                                    </div>
                                    <figcaption>
                                        <div class="property-heading">
                                            <h2>

                                                @if($property->purpose == 4)
                                                    <?php echo substr(strip_tags(App\Property::getTownName($property->town_id)),0,35).'...';?>
                                                @else
                                                    <?php echo substr(strip_tags(App\Property::getPhaseName($property->phase_id).'&nbsp;'.App\Property::getTownName($property->town_id)),0,35).'...';?>
                                                @endif
                                           
                                            </h2>
                                            <p>{{App\Property::getCityName($property->city_id)}}</p>
                                        </div>
                                        <div class="property-detail">
                                            <div class="col-md-6 col-sm-6 property-description pl pr">
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
														<img src="/unzips/New%20Techno%20Theme/images/property-photo.png" alt=""><p>
                                                        @if($count !== 0)
                                                        {{$count}}
                                                        @else
                                                        {{'No'}}
                                                        @endif Photos</p>
													</a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 property-description pl pr">
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
														<img src="/unzips/New%20Techno%20Theme/images/property-square.png" alt=""><p>{{$property->area}} {{$property->area_type}}</p>
													</a>
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
        <section class="ceo" id="ceo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="col-lg-4 col-md-4 col-sm-4 ceo-img-section pl">
                            <figure>
                                <div class="abc">
                                    <a href="javascript:void(0);">
                                        <div class="img-container">
                                            <div class="img-block">
                                                <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo">
                                            </div>
                                        </div>
                                        <div class="shades"></div>
                                    </a>
                                </div>
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 pl">
                            <div class="ceo-section">
                                <h5>Professionals</h5>
                                <h2>FOLLOW CEO&rsquo;s MESSAGE</h2>
                                <div class="mCustomScrollbar">
                                    <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                                </div>
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
                                                <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                            </div>
                                        </div>
                                        <div class="facebook-icon">
                                            <a href="{{$staff->fb_link}}"><i class="fa fa-envelope"></i></a>
                                            <a href="{{$staff->google_plus}}"><i class="fa fa-facebook"></i></a>
                                        </div>
                                        <div class="shades"></div>
                                    </div>
                                    <figcaption>
                                        <div class="team-heading">
                                            <h2>{{$staff->name}}</h2>
                                            <p>{{$staff->designation}}</p>
                                        </div>
                                        <div class="team-detail">
                                            <div class="col-md-6 col-sm-6 team-description pl pr">
                                                <a href="">
														<img src="/unzips/New%20Techno%20Theme/images/team-phone.png" alt=""><p>{{$staff->contact_number}}</p>
													</a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 team-description pl pr">
                                                <a href="">
														<img class="team-service-img" src="/unzips/New%20Techno%20Theme/images/team-service.png" alt=""><p>{{$staff->year_of_service}}</p>
													</a>
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
        <section class="location" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($offices as $office)
                        <div class="col-lg-3 col-md-3 pl pr location-addresses">
                            @foreach($cities as $city)
								@if($city->id == $office->city_id)
								<h1>{{$city->name}} Office</h1>
								@endif
							@endforeach
                            <ul>
                                <li><span><i class="fa fa-home"></i></span> <p>{{$office->address}}</p></li>
                                <li><span><i class="fa fa-mobile"></i></span><p> {{$office->telephone}}</p></li>
                                <li><span><i class="fa fa-envelope"></i></span> <p class="email-break">{{$office->email}}</p></li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer id="contact" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4  col-md-4 office-addresses">
                            <a href="/"><h3><img class="img-responsive" style="width:130px;" src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}} Logo"></h3></a>
                            <p>
                                @if(strlen($agencyWebsite->about_us) <= 150)
                                {{strip_tags($agencyWebsite->about_us)}}
                                @else
                                <?php echo substr(strip_tags($agencyWebsite->about_us),0,150).'...';?>
                                @endif
                            </p>
                        </div>
                        <div class="col-lg-4  col-md-4 col-xs-12 office-addresses follow">
                            <h1>Follow on</h1>
                            <p>Follow us on the social media links to view our portal or user views and likes. Posts and reviews will be seen. Latest news about our online property portal also can be seen on social media.</p>
                            <ul>
                                @if(!empty($offices[0]->address))
                                <li>
                                    <a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-4  col-md-4 col-xs-12 office-addresses">
                            <h1>Contact us</h1>
                            <ul class="border-none">
                                @if(!empty($offices[0]->address))
                                    <li><span><i class="fa fa-home"></i></span><p> {{$offices[0]->address}}</p></li>
                                    <li><span><i class="fa fa-map-marker"></i></span><p> {{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</p></li>
                                    <li><span><i class="fa fa-envelope"></i></span><p class="email-break"> {{$offices[0]->email}}</p></li>
                                @else
                                    {{'No info Available'}}
                                    {{--<br />--}}
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 backtotop"> <a href="javascript:" id="return-to-top" style=""><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Back to top</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/unzips/New%20Techno%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/New%20Techno%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/New%20Techno%20Theme/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/unzips/New%20Techno%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
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




        $(window).scroll(function() {
            var sticky = $('.sticky'),
                scroll = $(window).scrollTop();

            if (scroll >= 100) sticky.addClass('fixed');
            else sticky.removeClass('fixed');
        });

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
</body>

</html>