<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Creative%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Creative%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Creative%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Creative%20Portfolio%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Creative%20Portfolio%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Creative%20Portfolio%20Theme%20Dark%20Golden%20Rod/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pr">
                        <div class="top-bar">
                            <div class="col-md-6 col-sm-12">
                            </div>
                            <div class="col-md-6 col-sm-12 social-media">
                                <ul>
                                	@if(!empty($offices[0]->address))
									<li><span><i class="fa fa-map-marker"></i></span> {{$offices[0]->address}}</li>
									<li class="pr-40"><span><i class="fa fa-phone"></i></i></span> {{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
									@else 
										{{'No info Available about location or numbers'}}
									@endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid menu-bar" id="header">
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
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#about">About Us</a></li>
                                            <li><a href="#office">Our Offices</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#contact">Contact</a></li>
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
    <div class="main">
        <section class="ceo-msg-sect" id="ceo">
            <div class="container">
                <h2>CEO'S Message</h2>
                <h4>Read CEO's Message to know the policy of our Estate</h4>
                <div class="row">
                    <div class="col-lg-12 ceo-msg">
                        <div class="col-lg-5 col-md-5 col-sm-12 ceo-img pl pr">
                            <figure>
								<div class="img-container">
									<div class="img-block">
										<img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="ceo-image" />
									</div>
								</div>
							</figure>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 pl pr ceo-text mCustomScrollbar">
                            <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container">
                <div class="row">
                    <div class="work-portion text-center">
                        <h2>Our Work</h2>
                        <h4>Take a look at all the work we have done</h4>
                    </div>
                    <div class="col-md-12">
                        @foreach($properties as $property)
                        <div class="col-md-4">
                            <div class="work-section text-center">
                                <h3>
									@if(strlen($property->title) <= 25)
                                        {{$property->title}}
                                    @else
                                        <?php echo substr(strip_tags($property->title),0,25).'...';?>
                                    @endif
                                </h3>
                                
                                <p><img src="/unzips/Creative%20Portfolio%20Theme/images/location.png" alt="">{{App\Property::getTownName($property->town_id)}}, {{App\Property::getPhaseName($property->phase_id)}}, {{App\Property::getCityName($property->city_id)}}</p>
                                <h4>Rs. 
                                	<?php  
                                		$price = $property->price;
                                		$formated_num = number_format((double)$price);
                                		echo $formated_num;
                                	?></h4>
                                <img src="/unzips/Creative%20Portfolio%20Theme/images/line.jpg" alt="">
                                <figure>
                                	@if($property->gallery != "")
                                    <?php
                                    	$images =explode(';',$property->gallery);
                                    ?>
                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                        <div class="img-container">
                                            <div class="img-block">
                                                <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}"></div>
                                        </div>
                                    </a>
                                    @endif
                                    <figcaption class="hover-effect-text">
                                        <!-- <h6>Single Family Residence</h6> -->
                                        <ul>
                                            <li>Bedrooms: {{$property->bed}}</li>
                                            <li>Bathrooms: {{$property->bath}}</li>
                                            <li>Area: {{$property->area}} {{$property->area_type}}</li>
                                        </ul><a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View</a>
                                    </figcaption>
                                </figure>


                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <div class="about-portion" id="about">
            <div class="about-headings">
                <div class="container">
                    <h2>About Us</h2>
                    <h4>Read history and records about our Agency.</h4>
                </div>
            </div>
            <section class="about">
                <div class="about-shade"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 pr">
                            <div class="col-lg-4 col-md-4 pull-right pl">
                                <div class="about-section">
                                    <h2>About</h2>
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
        </div>
        <section class="office" id="office">
            <div class="container">
                <h2>Offices</h2>
                <h4>Visit our offices for the best property options.</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="owl-carousel">
                            	@foreach($offices as $office)
                                <div class="item">
                                    <div class="address-office">
										@foreach($cities as $city)
											@if($city->id == $office->city_id)
											<h3>{{$city->name}} Office</h3>
											@endif
										@endforeach
                                        <ul>
                                            <li><i class="fa fa-phone"></i> {{$office->telephone}}, {{$office->uan_number}}</li>
                                            <li><i class="fa fa-envelope"></i> {{$office->email}}</li>
                                            <li><i class="fa fa-map-marker"></i>{{$office->address}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-sect" id="team">
            <div class="container">
                <div class="row">
                    <div class="team-portion text-center">
                        <h2>Our Team</h2>
                        <h4>We have leading professionals in each department.</h4>
                    </div>
                    <div class="col-md-12">
						@foreach($staffs as $staff)
                        <div class="col-md-4">
                            <div class="team-section text-center">
                                <h3>{{$staff->name}}</h3>
                                <p>{{$staff->designation}}</p>
                                <img src="images/line.jpg" alt="">
                                <figure>
                                    <a href="">
                                        <div class="img-container">
                                            <div class="img-block">
                                                <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></div>
                                        </div>
                                    </a>
                                    <figcaption class="hover-effect-text">
                                        <h6>Year of service: {{$staff->year_of_service}}</h6>
                                        <ul>
                                            <li>{{$staff->contact_number}}</li>
                                            <li>{{$staff->email}}</li>
                                            <li><a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a><a href="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
						@endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="contact" id="contact">
            <div class="container">
                <h2>Contact Us</h2>
                <h4>Feel free to contact us for your support</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-form">
                                <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
									{{csrf_field()}}
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control textarea-height" type="textarea" name="message" id="message" placeholder="" rows="7"></textarea>
                                    </div>
                                    <button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer">
        <div class="container-fluid footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="office-addresses">
                            <h1>Follow Us</h1>
                            <ul>
                            	@if(!empty($offices[0]->address))
                                    <li>{{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
                                    <li>{{$offices[0]->email}}</li>
                                    <li>{{$offices[0]->address}}</li>
                                	<li><a href="https://{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a><a href="https://{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                @else
                                    {{'No info Available'}}
                                @endif
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
    </footer>
    <script src="/unzips/Creative%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Creative%20Portfolio%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/Creative%20Portfolio%20Theme/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/unzips/Creative%20Portfolio%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
                    items: 1,
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


        $(function() {
            createSticky($("#header"));
        });

        function createSticky(sticky) {
            if (typeof sticky !== "undefined") {
                var pos = sticky.offset().top,
                    win = $(window);
                win.on("scroll", function() {
                    win.scrollTop() >= pos ? sticky.addClass("fixed") : sticky.removeClass("fixed");
                });
            }
        }
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