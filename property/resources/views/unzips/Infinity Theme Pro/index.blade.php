<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>{{$agencyWebsite->agency_name}}</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="/unzips/Infinity%20Theme%20Pro/css/base.css">
    <link rel="stylesheet" href="/unzips/Infinity%20Theme%20Pro/css/vendor.css">
    <link rel="stylesheet" href="/unzips/Infinity%20Theme%20Pro/css/main.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Infinity%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Infinity%20Theme%20Pro/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Infinity%20Theme%20Pro/css/slick-theme.css">
    <!-- script
   ================================================== -->
    <script src="/unzips/Infinity%20Theme%20Pro/js/modernizr.js"></script>
    <script src="/unzips/Infinity%20Theme%20Pro/js/pace.min.js"></script>
    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="/unzips/Infinity%20Theme%20Pro/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/unzips/Infinity%20Theme%20Pro/favicon.ico" type="image/x-icon">
</head>

<body id="top">
    <!-- header 
   ================================================== -->
    <header>
        <div class="header-logo">
            <a href="/"><img class="img-responsive" style="width: 150px" src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
        </div>
        <a id="header-menu-trigger" href="#0">
		 	<span class="header-menu-text">Menu</span>
		  	<span class="header-menu-icon"></span>
		</a>
        <nav id="menu-nav-wrap"><a href="#0" class="close-button" title="close"><span>Close</span></a>
            <h3>{{$agencyWebsite->agency_name}}</h3>
            <ul class="nav-list">
                <li class="current"><a class="smoothscroll" href="#home" title="">Home</a></li>
                <li><a class="smoothscroll" href="#about" title="">About</a></li>
                <li><a class="smoothscroll" href="#portfolio" title="">Works</a></li>
                <li><a class="smoothscroll" href="#Services" title="">Team</a></li>
                <li><a class="smoothscroll" href="#ceo-msg" title="">CEO Message</a></li>
                <li><a class="smoothscroll" href="#contact" title="">Contact</a></li>
            </ul>
            <ul class="header-social-list">
                @if(!empty($offices[0]->address))
                <li>
                    <a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook-square"></i></a>
                </li>
                <li>
                    <a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                    <a href="mailto:{{$offices[0]->email}}"><i class="fa fa-envelope"></i></a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- end #menu-nav-wrap -->
    </header>
    <!-- end header -->
    <!-- home
   ================================================== -->
    <section id="home">
        <div class="overlay"></div>
        <div class="home-content-table">
            <div class="home-content-tablecell">
                <div class="row">
                    <div class="col-twelve">
                        <h3 class="animate-intro">Welcom to {{$agencyWebsite->agency_name}}</h3>
                        <h1 class="animate-intro">
							Find Youe<br>
							Dream House
				  			</h1>
                        <div class="more animate-intro">
                            <a class="smoothscroll button stroke" href="#about">
				  					Learn More
				  				</a>
                        </div>
                    </div>
                    <!-- end col-twelve -->
                </div>
                <!-- end row -->
            </div>
            <!-- end home-content-tablecell -->
        </div>
        <!-- end home-content-table -->
        <ul class="home-social-list">
            @if(!empty($offices[0]->address))
            <li>
                <a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a>
            </li>
            <li>
                <a href="mailto:{{$offices[0]->email}}"><i class="fa fa-envelope"></i></a>
            </li>
            @endif
        </ul>
        <!-- end home-social-list -->
        <div class="scrolldown">
            <a href="#about" class="scroll-icon smoothscroll">		
		   	Scroll Down		   	
		   	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			</a>
        </div>
    </section>
    <!-- end home -->
    <!-- about
   ================================================== -->
    <section id="about">
        <div class="row about-wrap">
            <div class="col-full">
                <div class="about-profile-bg"></div>
                <div class="intro">
                    <h3 class="animate-this">About Us</h3>
                    <div class="mCustomScrollbar lead animate-this">
                        <?php
                            $doc = new DOMDocument();
                            $doc->loadHTML($agencyWebsite->about_us);
                            $content = $doc->saveHTML();
                            echo $content;
                        ?>
                    </div>
                </div>
            </div>
            <!-- end col-full  -->
        </div>
        <!-- end about-wrap  -->
    </section>
    <!-- end about -->
    <!-- about
   ================================================== -->
    <!-- portfolio
   ================================================== -->
    <section id="portfolio">
        <div class="intro-wrap">
            <div class="row narrow section-intro with-bottom-sep animate-this">
                <div class="col-twelve">
                    <h3>Showcase</h3>
                    <h1>See Our Featured Work.</h1>
                    <p class="lead">
                        We have a lot for you. You can view our projects and properties. There must be a choice or your match. 
                    </p>
                </div>
            </div>
            <!-- end row section-intro -->
        </div>
        <!-- end intro-wrap -->
        <div class="row portfolio-content">
            <div class="col-twelve">
                <div id="folio-wrap" class="bricks-wrapper">
                    <?php $i=1; ?>
                    @foreach($properties as $property)
                        @if($property->gallery != "")
                        <?php
                            $images =explode(';',$property->gallery);
                            $count = count($images);
                        ?>
                        <div class="brick folio-item">
                            <div class="item-wrap animate-this" data-src="/images/property/user_property/original_{{$images[0]}}" data-sub-html="#{{$i}}">
                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="overlay">
                	                <img src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                    <div class="item-text">
                                        <span class="folio-types">
                                            @if($property->purpose !== 4)
                                                {{"Property"}}
                                            @else
                                                {{"Project"}}
                                            @endif
                                        </span>
                                        <h3 class="folio-title">{{$property->title}}</h3>
                                        <span class="folio-types">
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
                                        </span>                             
                                        <h3 class="folio-title">
                                            @if($property->purpose !== 4)
                                            <?php
                                                echo "Rs. ";
                                                $price = $property->price;
                                                $formated_num = number_format((double)$price);
                                                echo $formated_num;
                                            ?>
                                            @else
                                                {{"View Schemes"}}
                                            @endif
                                        </h3>                             
                                    </div>                                        
        	                    </a>
                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="details-link" title="details">
        	                  	    <i class="icon-link"></i>
        	                    </a>
                            </div>
                            <!-- end item-wrap -->
                            <div id="{{$i}}" class="hide">
                                <h4>{{$property->title}}</h4>
                                <p>
                                    @if(strlen($property->description) <= 350)
                                              {{$property->description}}
                                    @else
                                      <?php echo substr(strip_tags($property->description),0,350).'...';?>
                                    @endif
                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">Details</a>
                                </p>
                            </div>
                        </div>
                        @else
                        <div class="brick folio-item">
                            <div class="item-wrap animate-this" data-src="/unzips/Infinity%20Theme%20Pro/images/no-image.jpg" data-sub-html="#{{$i}}">
                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="overlay">
                                    <img src="/unzips/Infinity%20Theme%20Pro/images/no-image.jpg" alt="{{$property->title}}">
                                    <div class="item-text">
                                        <span class="folio-types">
                                            @if($property->purpose !== 4)
                                                {{"Property"}}
                                            @else
                                                {{"Project"}}
                                            @endif
                                        </span>
                                        <h3 class="folio-title">{{$property->title}}</h3>
                                        <span class="folio-types">
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
                                        </span>                             
                                        <h3 class="folio-title">
                                            @if($property->purpose !== 4)
                                            <?php
                                                echo "Rs. ";
                                                $price = $property->price;
                                                $formated_num = number_format((double)$price);
                                                echo $formated_num;
                                            ?>
                                            @else
                                                {{"View Schemes"}}
                                            @endif
                                        </h3>                             
                                    </div>                                        
                                </a>
                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="details-link" title="details">
                                    <i class="icon-link"></i>
                                </a>
                            </div>
                            <!-- end item-wrap -->
                            <div id="{{$i}}" class="hide">
                                <h4>{{$property->title}}</h4>
                                <p>
                                    @if(strlen($property->description) <= 350)
                                              {{$property->description}}
                                    @else
                                      <?php echo substr(strip_tags($property->description),0,350).'...';?>
                                    @endif
                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">Details</a>
                                </p>
                            </div>
                        </div>
                        @endif
                    <?php $i++ ?>
                    @endforeach
                    <!-- end folio-item -->
                </div>
                <!-- end folio-wrap -->
            </div>
            <!-- end twelve -->
        </div>
        <!-- end portfolio-content -->
    </section>
    <!-- end portfolio -->
    <section class="team-sect" id="Services">
        <div class="overlay"></div>
        <div class="gradient-overlay"></div>
        <div class="row narrow section-intro with-bottom-sep animate-this">
            <div class="col-full">
                <h3>Workers</h3>
                <h1>See Our Great Team.</h1>
                <p class="lead">Our professionals know your desire search the option for you.</p>
            </div>
        </div>
        <div class="row services-content">
            <div class="services-list block-1-2 block-tab-full group">
                <div class="your-class">
                    @foreach($staffs as $staff)
                    <div class="slick-item">
                        <figure>
                            <div class="abc">
                                <a href="{{$staff->fb_link}}">
    								<img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                    <span class="facebook-icon"><i class="fa fa-facebook"></i></span>
    								<div class="shades"></div>
    							</a>
                            </div>
                        </figure>
                        <div class="team-text">
                            <h2>{{$staff->name}}</h2>
                            <h3>{{$staff->designation}}</h3>
                            <p>{{$staff->contact_number}}</p>
                            <p>{{$staff->year_of_service}} Year Of Services</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- CEO Message
   ================================================== -->
    <section id="ceo-msg">
        <div class="row ceo-msg-wrap">
            <div class="col-full">
                <div class="ceo-msg-profile-bg"></div>
                <div class="intro">
                    <h3 class="animate-this">CEO Message</h3>
                    <div class="mCustomScrollbar">
                        <p class="lead animate-this">{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                    </div>
                </div>
            </div>
            <!-- end col-full  -->
        </div>
        <!-- end ceo-msg-wrap  -->
    </section>
    <!-- end CEO Message -->
    
    <!-- contact
   ================================================== -->
    <section id="contact">
        <div class="overlay"></div>
        <div class="row narrow section-intro with-bottom-sep animate-this">
            <div class="col-twelve">
                <h3>Contact</h3>
                <h1>Get In Touch.</h1>
                <p class="lead">Feel free to contact us for submitting your issues, questions etc. Our team will sortout and resolve your questions as soon as possible.</p>
            </div>
        </div>
        <!-- end section-intro -->
        <div class="row contact-content">
            <div class="col-seven tab-full animate-this">
                <h5>Send Us A Message</h5>
                <!-- form -->
                <form name="contactForm" id="contactForm" role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                    {{csrf_field()}}
                    <div class="form-field">
                        <input type="text" id="name" name="name" placeholder="Your Name" value="" minlength="2" required="">
                    </div>
                    <div class="row">
                        <div class="col-six tab-full">
                            <div class="form-field">
                                <input type="email" id="email" name="email" placeholder="E-mail" value="" required="">
                            </div>
                        </div>
                        <div class="col-six tab-full">
                            <div class="form-field">
                                <input type="text" id="phone" name="phone" placeholder="Phone" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-field">
                        <textarea id="message" name="message" placeholder="Message" rows="10" cols="50" required=""></textarea>
                    </div>
                    <div class="form-field">
                        <button class="submitform" id="submit" name="submit">Send</button>
                    </div>
                </form>
                <!-- end form -->
                <!-- contact-warning -->
                <div id="message-warning"></div>
                <!-- contact-success -->
                <div id="message-success">
                    <i class="fa fa-check"></i>Your message was sent, thank you!
                    <br>
                </div>
            </div>
            <!-- end col-seven -->
            <div class="col-four tab-full contact-info end animate-this">
                <h5>Office Information</h5>
                <div class="mCustomScrollbar">
                    <?php $i = 1; ?>
                    @foreach($offices as $office)
                    <div class="cinfo">
                        <h6>Office {{$i}}</h6>
                        <p>
                            @foreach($cities as $city)
                                @if($city->id == $office->city_id)
                                    {{$city->name}}
                                @endif 
                            @endforeach
                            <br> {{$office->address}}
                            <br> {{$office->telephone}}
                        </p>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                    <!-- end cinfo -->
                </div>
            </div>
            <!-- end cinfo -->
        </div>
        <!-- end row contact-content -->
    </section>
    <!-- end contact -->
    <!-- footer
   ================================================== -->
    <footer>
        <div class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 main-ftr">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 main-ftr1">
                            <p class="copyright">Copyright Technological.inc 2017</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 backtotop"> <a href="javascript:" id="return-to-top" style="">Back to top <i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer-bottom -->
    </footer>
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- Java Script
   ================================================== -->
    <script src="/unzips/Infinity%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Infinity%20Theme%20Pro/js/plugins.js"></script>
    <script src="/unzips/Infinity%20Theme%20Pro/js/main.js"></script>
    <script>
    $(document).ready(function() {

        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
    });
    </script>
    <script type="text/javascript" src="/unzips/Infinity%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/unzips/Infinity%20Theme%20Pro/js/slick.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.your-class').slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
    </script>
</body>

</html>