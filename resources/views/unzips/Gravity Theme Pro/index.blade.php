<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/plugins0a05.css?ver=20170620" type="text/css" media="all">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/style0a05.css?ver=20170620" type="text/css" media="all">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/main0a05.css?ver=20170620" type="text/css" media="all">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/elements0a05.css?ver=20170620" type="text/css" media="all">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/style3469.css?ver=20170318" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/unzips/Gravity%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/flexslider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/custom.css" type="text/css" media="all">
    <link rel="stylesheet" href="/unzips/Gravity%20Theme%20Pro/css/theme.css" type="text/css" media="all">
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/jquery-migrate-3.0.0.js"></script>
    <script type="text/javascript">
    var background_mode = "kenburns";
    var background_kenburns_slides = [
        { "src": "/unzips/Gravity%20Theme%20Pro/images/1.jpg" },
        { "src": "/unzips/Gravity%20Theme%20Pro/images/2.jpg" },
        { "src": "/unzips/Gravity%20Theme%20Pro/images/3.jpg" }
    ];
    var background_kenburns_timeout = 6000;
    var background_kenburns_transition = "fadeInDown";
    var background_kenburns_transition_duration = 700;
    var background_kenburns_effect = "kenburns";
    var background_parallax_effect_toggle = "1";
    var background_parallax_effect_friction_x = 0.86;
    var background_parallax_effect_friction_y = 0.86;
    var background_parallax_effect_invert = "1";
    var background_particle_effect_toggle = "1";
    var background_particle_effect_toggle = "1";
    var background_particle_effect_activation_radius = 200;
    var background_particle_effect_particle_amount = 180;
    var background_particle_effect_particle_speed = 10;
    var background_particle_effect_particle_color = "rgba(255,255,255,0.65)";
    var background_particle_effect_line_color = "rgba(255,255,255,0.65)";
    </script>
</head>

<body class="home">
    <div id="page-loader" class="slideUp">
        <div class="container-mid">
            <img src="/images/logo/{{$agencyWebsite->logo}}" style="max-width:27.5vh;margin-bottom:24px;" class="img-responsive" alt="{{$agencyWebsite->agency_name}}-logo">
            <div class="spinner-container">
               <div class="css-spinner indicator-1" style="border-top-color:rgba(31, 184, 178, 1);border-left-color:"></div>
            </div>
        </div>
    </div>
    <div class="grcs_background_content">
        <div class="level-1">
            <div id="canvas">
                <canvas class="bg-effect layer" data-depth="0.2"></canvas>
            </div>
        </div>
        <div class="level-2">
            <div class="bg-image layer" data-depth="0.04"></div>
            <div class="bg-video layer" data-depth="0.04"></div>
            <div class="bg-color layer" data-depth="0.04"></div>
        </div>
    </div>
    <div class="grcs_hero_container">
        <div class="front-content page-enter-animated">
            <div class="container-mid">
                <div class="enter-animation" data-animation="fadeInDown" data-delay="500">
                    <div class="wpb_single_image logo">
                        <figure><img src="images/logo.png" class="" alt=""></figure>
                    </div>
                </div>
                <div class="enter-animation" data-animation="fadeInUp" data-delay="500">
                    <div class="grcs_text_slider myslide" data-duration="700" data-timeout="6000" data-fx="scrollVert">
                        <div class="slide">
                            <h1>{{$agencyWebsite->agency_name}}'s <span>&amp; </span> Properties Of Your Choice.</h1>
                        </div>
                        <div class="slide">
                            <h1>The Best Portal <span>Of </span> Your House.</h1>
                        </div>
                        <div class="slide">
                            <h1>Modern <span>&amp; </span> Great Infra Structures.</h1>
                        </div>
                    </div>
                </div>
                <div class="enter-animation" data-animation="fadeInUp" data-delay="500">
                    <div class="grcs_button_open_overlay go-down al-center">
                        <i class="ti-arrow-down"></i>
                        <i class="ti-arrow-down"></i>
                    </div>
                </div>
            </div>
            <div class="controls"><i class="volume-button fa fa-volume-up"></i><i class="pause-button ti-control-pause"></i></div>
        </div>
    </div>
    <div class="grcs_overlay overlay-fade-in section-slide-from-bottom" data-bullet-nav="yes">
        <section class="grcs_overlay_section">
            <div class="container-mid">
                <div class="ceo-section">
                    <figure>
                        <div class="ceo-img">
                            <img class="img-circle" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="ceo-{{$agencyWebsite->agency_name}}"></div>
                    </figure>
                    <h2>CEO Message</h2>
                    <div class="mCustomScrollbar">
                        <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="grcs_overlay_section">
            <div class="container-mid">
                <div class="about-section">
                    <h3>About Us</h3>
                    <div class="mCustomScrollbar">
                        <?php
                            $doc = new DOMDocument();
                            $doc->loadHTML($agencyWebsite->about_us);
                            echo $doc->saveHTML();
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="grcs_overlay_section">
            <div class="container-mid">
                <div class="team-section container">
                    <div class="mCustomScrollbar">
                        @foreach($staffs as $staff)
                        <div class="col-md-3 col-sm-3 padleftright">
                            <figure>
                                <div class="img-container">
                                    <div class="img-block">
                                        <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}"></div>
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
        </section>
        <section class="grcs_overlay_section">
            <div class="container-mid">
                <div class="vc_row-fluid">
                    <div class="vc_col-sm-12 my-property">
                        <h2>Our Latest Work</h2>
                        <div id="property-section" class="container">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#showall" data-toggle="tab">Show All</a>
                                </li>
                                <li>
                                    <a href="#property" data-toggle="tab">Property</a>
                                </li>
                                <li>
                                    <a href="#project" data-toggle="tab">Project</a>
                                </li>
                            </ul>
                            <div class="tab-content clearfix">
                                <div class="tab-pane fade in active" id="showall">
                                    <div class="mCustomScrollbar">
                                        @foreach($properties as $property)
                                        <div class="col-md-4 col-sm-6 padleftright">
                                            <div class="property-portion">
                                                <figure>

                                                    <div class="hover-effect">
                                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
															@if($property->gallery != "")
						                                    <?php
						                                    	$images =explode(';',$property->gallery);
						                                    ?>
															<img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="">
															@endif
															<div class="property-text">
																<p>{{App\Property::getCityName($property->city_id)}}&nbsp;{{App\Property::getTownName($property->town_id)}}</p>
																<p> 
																	<?php
																		if($property->purpose !== 4){ 
																			echo "Rs. ";
									                                		$price = $property->price;
									                                		$formated_num = number_format((double)$price);
									                                		echo $formated_num;
								                                		}
								                                	?>
                                								</p>
															</div>
															<span>
																@if($property->purpose == 4)
							                                    <?='project'?>
							                                    @else
							                                    <?='property'?>
							                                    @endif
															</span>
															<div class="shades"></div>
														</a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="property">
                                    <div class="mCustomScrollbar">
                                        @foreach($properties as $property)
                                        @if($property->purpose != 4)
                                        <div class="col-md-4 col-sm-6 padleftright">
                                            <div class="property-portion">
                                                <figure>

                                                    <div class="hover-effect">
                                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
															@if($property->gallery != "")
						                                    <?php
						                                    	$images =explode(';',$property->gallery);
						                                    ?>
															<img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="">
															@endif
															<div class="property-text">
																<p>{{App\Property::getCityName($property->city_id)}}&nbsp;{{App\Property::getTownName($property->town_id)}}</p>
																<p> 
																	<?php
																		if($property->purpose != 4){ 
																			echo "Rs. ";
									                                		$price = $property->price;
									                                		$formated_num = number_format((double)$price);
									                                		echo $formated_num;
								                                		}
								                                	?>
                                								</p>
															</div>
															<span>Property</span>
															<div class="shades"></div>
														</a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="project">
                                    <div class="mCustomScrollbar">
                                        @foreach($properties as $property)
                                        @if($property->purpose == 4)
                                        <div class="col-md-4 col-sm-6 padleftright">
                                            <div class="property-portion">
                                                <figure>

                                                    <div class="hover-effect">
                                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
															@if($property->gallery != "")
						                                    <?php
						                                    	$images =explode(';',$property->gallery);
						                                    ?>
															<img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="">
															@endif
															<div class="property-text">
																<p>{{App\Property::getCityName($property->city_id)}}&nbsp;{{App\Property::getTownName($property->town_id)}}</p>
															</div>
															<span>Project</span>
															<div class="shades"></div>
														</a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="grcs_overlay_section">
            <div class="container-mid">
                <div class="vc_row-fluid">
                    <div class="vc_col-sm-12">
                        <div class="location-section">
                            <div class="mCustomScrollbar">
                            	
                            	<?php $i=1; ?>
                            	@foreach($offices as $office)
                                <div class="col-md-4 pl pr">
                                    <div class="location-addresses">
                                        <h1>0{{$i}}</h1>
                                        @foreach($cities as $city)
											@if($city->id == $office->city_id)
											<h2>{{$city->name}} Office</h2>
											@endif
										@endforeach
                                        <ul>
                                            <li><span class="ftr-pic"><img src="/unzips/Gravity%20Theme%20Pro/images/ftr-home.png" alt=""></span><span>{{$office->address}}</span></li>
                                            <li><span class="ftr-pic"><img src="/unzips/Gravity%20Theme%20Pro/images/ftr-phone.png" alt=""></span><span>{{$office->telephone}}</span></li>
                                            <li><span class="ftr-pic"><img src="/unzips/Gravity%20Theme%20Pro/images/ftr-envelope.png" alt=""></span><span>{{$office->email}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="grcs_overlay_section">
            <div class="container-mid">
                <div class="vc_row-fluid">
                    <div class="vc_col-sm-12">
                        <div class="contact-heading">
                            <h1>Contact Us</h1>
                            <p>Feel free to contact us. We will respond as soon as possible.</p>
                        </div>
                        <form class="grcs_contact_form al-center contact-form" action="" role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                            {{csrf_field()}}
                            <div class="control-group">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="control-group">
                                <input type="text" name="email" placeholder="E-mail" class="form-control">
                            </div>
                            <div class="control-group">
                                <input type="text" name="phone" placeholder="Phone" class="form-control">
                            </div>
                            <div class="control-group">
                                <textarea type="text" name="message" placeholder="Message" class="form-control"></textarea>
                            </div>
                            <div class="control-group">
                                <button type="button" id="submit" name="submit" class="form-control btn-contact">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="up-button go-up"><i class="ti-arrow-up"></i><i class="ti-arrow-up"></i></div>
    </div>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/plugins0a05.js?ver=20170620"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/main0a05.js?ver=20170620"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/three.min3469.js?ver=20170318"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/fss.min3469.js?ver=20170318"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/hero0a05.js?ver=20170620"></script>
    <script type="text/javascript" src="/unzips/Gravity%20Theme%20Pro/js/elements0a05.js?ver=20170620"></script>
</body>

</html>