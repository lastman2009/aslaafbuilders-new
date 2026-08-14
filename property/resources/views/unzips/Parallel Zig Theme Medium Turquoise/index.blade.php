<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Parallel%20Zig%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Parallel%20Zig%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Parallel%20Zig%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/unzips/Parallel%20Zig%20Theme/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Parallel%20Zig%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Parallel%20Zig%20Theme%20Medium%20Turquoise/css/theme.css" rel="stylesheet">
    <link href="/unzips/Parallel%20Zig%20Theme%20Medium%20Turquoise/css/custom.css" rel="stylesheet">
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
                                        <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt=""></a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#about">About Us</a></li>
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
                    <h2>Yes, You Can Use Our Portal For Your Perfect House.</h2>
                    <p>We are the team to find the best house of your desire. It will be the best choice for you. We are the professionals and always wish the best option for you.</p>
                    <div class="banner-button">
                        <a href="javascript:void(0);">Get it now</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="team-sect" id="team">
            <div class="container">
                <div class="team-headings text-center">
                    <h2>Our Team</h2>
                    <p>We have a powerful &amp; hardworking team which works for you.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider">
                            <div class="flexslider carousel">
                                <ul class="slides">
                                	@foreach ($staffs as $staff)
                                	<li>
                                        <div class="team-portion">
                                            <figure class="team-content">
                                                <div class="img-container">
                                                    <div class="img-block">
                                                        <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                                    </div>
                                                </div>
                                                <figcaption>
                                                    <h3>{{$staff->name}}</h3>
                                                    <h4>{{$staff->designation}}</h4>
                                                    <div class="team-social-meta">
                                                        <ul>
                                                            <li class="team-social-social"><a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                                            <li class="team-social-social"><a href="{{$staff->google_plus}}"><i class="fa fa-envelope"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ceo" id="ceo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="ceo-section">
                            <img class="img-circle" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo">
                            <h2>CEO Message</h2>
                            <div class="mCustomScrollbar">
                                <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container">
                <div class="property-headings text-center">
                    <h2>Our  work</h2>
                    <p>Our each Work displayed in a different way and you can also view its details.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel">
                            @foreach ($properties as $property)
                            <div class="item">
                                <figure>
                                    <div class="abc">
                                    	@if($property->gallery != "")
	                                    <?php
	                                    	$images =explode(';',$property->gallery);
	                                    	$count = count($images);

	                                    ?>
                                        <div class="img-container">
                                            <div class="img-block">
                                                <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="property-image">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="facebook-icon">
                                            <span>
											@if($property->purpose == 4)
		                                    <?='project'?>
		                                    @else
		                                    <?='property'?>
		                                    @endif
                                            </span>
                                            <figcaption>
                                                <div class="property-heading">
                                                    <h2>{{App\Property::getTownName($property->town_id)}}</h2>
                                                    <p>{{App\Property::getCityName($property->city_id)}}</p>
                                                    <ul>
                                                        <li><img src="/unzips/Parallel%20Zig%20Theme/images/property-photo.png" alt=""> 
                                                        @if($count !== 0)
                                                        {{$count}}
                                                        @else
                                                        {{'No'}}
                                                        @endif
                                                         Photos</li>
                                                        <li><img src="/unzips/Parallel%20Zig%20Theme/images/property-square.png" alt=""> 
                                                        	@if(!empty($property->area))
                                                        	{{$property->area}} {{$property->area_type}}
                                                        	@else
                                                        	{{'Undefined'}}
                                                        	@endif
                                                        </li>
                                                    </ul>
                                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View</a>
                                                </div>
                                            </figcaption>
                                        </div>
                                        <div class="shades"></div>
                                    </div>
                                </figure>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="about-section">
                            <h2>About US</h2>
                            <h5>We provides you the best Services in our Services.</h5>
                            <div class="mCustomScrollbar">
                                <?php
                                    $doc = new DOMDocument();
                                    $doc->loadHTML($agencyWebsite->about_us);
                                    echo $doc->saveHTML();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="location" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel">
                        	<?php $i=1; ?>
							@foreach ($offices as $office)
							<div class="item">
                                <div class="location-addresses">
                                    <h1>0{{$i}}</h1>
                                    @foreach($cities as $city)
										@if($city->id == $office->city_id)
										<h2>{{$city->name}} Office</h2>
										@endif
									@endforeach
                                    <ul>
                                        <li><span class="ftr-pic"><img src="/unzips/Parallel%20Zig%20Theme/images/ftr-home.png" alt=""></span><span>{{$office->address}}</span></li>
                                        <li><span class="ftr-pic"><img src="/unzips/Parallel%20Zig%20Theme/images/ftr-phone.png" alt=""></span><span>{{$office->telephone}}</span></li>
                                        <li><span class="ftr-pic"><img src="/unzips/Parallel%20Zig%20Theme/images/ftr-envelope.png" alt=""></span><span>{{$office->email}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <?php $i++ ?>
							@endforeach
                        </div>
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
                        <div class="col-lg-4  col-md-4 footer-logo office-addresses">
                            <h3><a href="/"><img class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}} Logo"></a></h3>
                            <p> 
                            	@if(strlen($agencyWebsite->about_us) <= 150)
	                            {{strip_tags($property->title)}}
	                            @else
	                            <?php echo substr(strip_tags($agencyWebsite->about_us),0,150).'...';?>
	                            @endif
                            </p>
                        </div>
                        <div class="col-lg-4  col-md-4 col-xs-12 office-addresses follow">
                            <h1>Follow on</h1>
                            <p>Follow us on the social media links to view our portal or user views and likes. Posts and reviews will be seen on the pages.</p>
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
                                    <li><span><i class="fa fa-home"></i></span> <p>{{$offices[0]->address}}</p></li>
		                            <li><span><i class="fa fa-map-marker"></i></span><p> {{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</p></li>
		                            <li><span><i class="fa fa-envelope"></i></span><p> {{$offices[0]->email}}</p></li>
                                @else
                                    {{'No info Available'}}
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
    <script src="/unzips/Parallel%20Zig%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Parallel%20Zig%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/Parallel%20Zig%20Theme/js/owl.carousel.js"></script>
    <script src="/unzips/Parallel%20Zig%20Theme/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="/unzips/Parallel%20Zig%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
    $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            dots: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
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

        $(".banner-button a").click(function() {
            $('html,body').animate({
                    scrollTop: $("#team").offset().top
                },
                'slow');
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
    <script type="text/javascript">
    (function() {

        // store the slider in a local variable
        var $window = $(window),
            flexslider = { vars: {} };

        // tiny helper function to add breakpoints
        function getGridSize() {
            return (window.innerWidth < 600) ? 1 :
                (window.innerWidth < 992) ? 2 : 4;
        }

        $(function() {
            SyntaxHighlighter.all();
        });

        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                animationSpeed: 400,
                directionNav: false,
                animationLoop: false,
                itemWidth: 250,
                itemMargin: 10,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize(), // use function to pull in initial value
                start: function(slider) {
                    $('body').removeClass('loading');
                    flexslider = slider;
                }
            });
        });

        // check grid size on resize event
        $window.resize(function() {
            var gridSize = getGridSize();

            flexslider.vars.minItems = gridSize;
            flexslider.vars.maxItems = gridSize;
        });
    }());
    </script>
</body>

</html>