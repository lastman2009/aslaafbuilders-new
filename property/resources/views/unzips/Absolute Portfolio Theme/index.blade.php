<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Absolute%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Absolute%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Absolute%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Absolute%20Portfolio%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Absolute%20Portfolio%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Absolute%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
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
                                        <a class="navbar-brand" href=""><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
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
                    <h1>Your Beautiful Dream House.</h1>
                    <p>Visit our site to view your dream house with comfort. We are providing all correct information regarding properties. We have beautiful houses, plots, commercial properties etc. For more informtion explore our portal.</p>
                    <div class="banner-button">
                        <a href="javascript:void(0);">
								<img src="/unzips/Absolute%20Portfolio%20Theme/images/drop-drow.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="team-sect" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team-title text-center">
                            <h2>Our Property Agents</h2>
                            <p>We have professionals to fullfil your requirenments.</p>
                        </div>
                        <div class="owl-carousel">
                        	@foreach ($staffs as $staff)
                            <div class="item">
                                <figure>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                        </div>
                                    </div>
                                    <figcaption>
                                        <div class="team-heading">
                                            <h2>{{$staff->name}}</h2>
                                        </div>
                                        <div class="team-detail">
                                            <p><span>{{$staff->designation}}</span>:</p>
                                            <p>{{$staff->year_of_service}} Years of service</p>
                                            <a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a>
                                            <a href="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a>
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
                                <div class="img-container">
                                    <div class="img-block">
                                        <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="CEO {{$agencyWebsite->agency_name}}"></div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 pl">
                            <div class="ceo-section">
                                <h2>CEO&rsquo;s Message</h2>
                                <div class="mCustomScrollbar">
                                    {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="contact-title text-center">
                            <h2>Contact us</h2>
                            <p>Feel free to contact us. We are available to solve issues regarding your query.</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 margin-topbottom ceo-img-section pl">
                            <div class="slider-contact">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                    	@for($i=0; $i<count($offices); $i++)
			                            	<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
			                            @endfor
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @foreach($offices as $office)
                                        <div class="item">
                                            @foreach($cities as $city)
				                                @if($city->id == $office->city_id)
				                                <h4>{{$city->name}} Office</h4>
				                                @endif 
				                            @endforeach
                                            <div class="office-addresses">
                                                <ul>
                                                    <li><span><i class="fa fa-home"></i></span> {{$office->address}}</li>
                                                    <li><span><i class="fa fa-mobile"></i></span> {{$office->telephone}}</li>
                                                    <li><span><i class="fa fa-envelope"></i></span> {{$office->email}}</li>
                                                </ul>
                                            </div>
                                        </div>
										@endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 margin-topbottom pl">
                            <div class="contact-form">
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
                                        <textarea class="form-control textarea-height" type="textarea" id="message" name="message" placeholder="Message" rows="7"></textarea>
                                    </div>
                                    <button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="col-lg-12 col-md-12 col-sm-12 pl">
                            <div class="about-section">
                                <h2>About Us</h2>
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
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="work-title text-center">
                            <h2>Our Work</h2>
                            <p>See our projects and properties.</p>
                        </div>
                        <div class="col-lg-12 pr">
                           @foreach($properties as $property)
                           <div class="col-md-4 col-sm-6 workportion pl">
                                <figure class="internal-sec">
                                	@if($property->gallery != "")
                                    <?php
                                        $images =explode(';',$property->gallery);
                                        $count = count($images);
                                    ?>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
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
                                            <p>PRICE:
                                            	<span> 
													
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
				                                	
                                            	</span>
                                            </p>
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
                            </div>
							@endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer id="office" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4  col-md-4 office-addresses">
                            <h1><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 170px;" ></h1>
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
                            <p>You can follows us on google and as well as on facebook by clicking on the links for your latest posts.</p>
                            <ul>
                                @if(!empty($offices[0]->address))
                                <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                @else
                                    {{'No info Available'}}
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-4  col-md-4 col-xs-12 office-addresses">
                            <h1>Contact us</h1>
                            <ul class="border-none">
                            	@if(!empty($offices[0]->address))
                                <li><span><i class="fa fa-home"></i></span> {{$offices[0]->address}}</li>
                                <li><span><i class="fa fa-map-marker"></i></span> {{$offices[0]->telephone}}, {{$offices[0]->mobile_no}}</li>
                                <li><span><i class="fa fa-envelope"></i></span> {{$offices[0]->email}}</li>
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
    <script src="/unzips/Absolute%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Absolute%20Portfolio%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/Absolute%20Portfolio%20Theme/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/unzips/Absolute%20Portfolio%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
        $(".carousel-inner div.item:first-child").addClass('active');
        $(".carousel-indicators li:first-child").addClass("active");
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
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    dots: true,
                    nav: false,
                    loop: false
                }
            }
        });


        $(".banner-button a").click(function() {
            $('html,body').animate({
                    scrollTop: $("#team").offset().top
                },
                'slow');
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