<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$agencyWebsite->agency_name}} - RightDeed</title>
	<link href="/unzips/Default%20Theme/css/bootstrap.min.css" rel="stylesheet">
	<link href="/unzips/Default%20Theme/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="/unzips/Default%20Theme/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="/unzips/Default%20Theme/css/jquery.mCustomScrollbar.css">
	<link href="/unzips/Default%20Theme/css/theme.css" rel="stylesheet">
	<link href="/unzips/Default%20Theme/css/custom.css" rel="stylesheet">
	
</head>

<body>
	<style>
		.header {
			<?php 
		        $active_index = 0;
		        foreach($agencyWebsite->Images as $key => $image){
		            if($image->active == 1){
		                $active_index = $key;
		            }
		        }
	        ?>
	        @if(!$agencyWebsite->Images->isEmpty())
	            @if($agencyWebsite->Images[$active_index]->active==1) 
	                background-image: url("/images/banners/original_{{$agencyWebsite->Images[$active_index]->image}}");
	            @endif
	        @else
	            background-image: url(../unzips/Default%20Theme/images/banner.jpg);
	        @endif
	        background-color: rgba(106, 94, 102);
	        background-repeat: no-repeat;
	        background-size: cover;
	        height: 750px;
	        position: relative;
		}
		#map-canvas {
			height: 508px;
		}
		#iw_container .iw_title {
			font-size: 16px;
			font-weight: bold;
		}
		.iw_content {
			padding: 15px 15px 15px 0;
		}
		.edit-link {
		    background-color: #fff;
		    display: inline-block;
		    padding: 5px 10px;
		    color: #000;
		    border-radius: 3px;
		    border: 1px solid #fff;
		    margin-right: 5px;
		    margin-top: 15px
		}
		.edit-link:hover{
		    background: #DBC10A;
		    border: 1px solid #DBC10A;
		    color: #fff;
		    text-decoration: none;
		}
	</style>
	<header class="header" id="home">
		<div class="container-fluid menu-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12 pr">
						<div class="top-bar">
							<div class="pl col-md-6 col-sm-12">
								<ul>
									@if(!empty($offices[0]->email))
										<li class="pr-40">
											<span><i class="fa fa-mobile"></i></span> 
											{{$offices[0]->telephone}}&nbsp;&nbsp;{{$offices[0]->uan_number}}&nbsp;&nbsp;{{$offices[0]->mobile_no}}
										</li>
										<li>
											<span><i class="fa fa-home"></i></span> 
											{{$offices[0]->address}}
										</li>
									@endif
								</ul>
							</div>
							<div class="col-md-6 col-sm-12 social-media">
								<ul>
									
									<li>
										@if(!empty($offices[0]->fb_link))
										<a href="{{$offices[0]->fb_link}}"><span><i class="fa fa-facebook"></i></span></a>
										@else
											@if(Auth::id() == $agencyWebsite->user_id)
											<a href="javascript:void(0)" data-toggle="popover" data-placement="bottom" title="Facebook Link" data-content="No Facebook Link Available. Fill from website settings."><span><i class="fa fa-facebook"></i></span></a>
											@endif
										@endif
									</li>
									<li>
										@if(!empty($offices[0]->google_link))
										<a href="{{$offices[0]->google_link}}"><span><i class="fa fa-google-plus"></i></span></a>
										@else
											@if(Auth::id() == $agencyWebsite->user_id)
											<a href="javascript:void(0)" data-toggle="popover" data-placement="bottom" title="Google Plus Link" data-content="No Google Plus Link Available. Fill from website settings."><span><i class="fa fa-google-plus"></i></span></a>
											@endif
										@endif
									</li>
									<li>
										<a href="mailto:{{$offices[0]->email}}"><span><i class="fa fa-envelope-o"></i></span></a>
									</li>
									
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
										<a class="navbar-brand" href="{{Request::url()}}"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
									</div>
									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
										<ul class="nav navbar-nav">
											<li class="active"><a href="#home">Home</a></li>
											<li><a href="#ceo">CEO Message</a></li>
											<li><a href="#work">Our Work</a></li>
											<li><a href="#about">About Us</a></li>
											<li><a href="#team">Our Team</a></li>
											<li><a href="#contact">Contact</a></li>
											<li><a href="#office">Our Offices</a></li>
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
					<h1>FIND YOUR PERFECT HOME TODAY</h1>
					<p>We have a great selection for you</p>
				</div>
			</div>
		</div>
	</header>
	<div class="main">
		<section class="ceo-msg-sect" id="ceo">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 ceo-msg pr">
						<div class="col-lg-5 col-md-5 col-sm-6 ceo-img pl">
							<figure>
								<div class="img-container">
									<div class="img-block">
										<img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo" />
									</div>
								</div>
							</figure>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-6 pl ceo-text">
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
				<div class="row">
					<div class="team-portion text-center">
						<h2>Our Work</h2>
						<p>Our Best Projects</p>
					</div>
					<?php
						$count = count($properties);
						$adjustColumns = '';
						switch ($count) {
							case 1:
								$adjustColumns = 'col-lg-4 col-lg-offset-4';
								break;

							case 2:
								$adjustColumns = 'col-lg-8 col-lg-offset-2';
								break;

							case 3:
								$adjustColumns = 'col-lg-10 col-lg-offset-1';
								break;

							default:
								$adjustColumns = 'col-lg-12';
								break;
						}
					?>
					<div class="{{$adjustColumns}}">
						@if(!$properties->isEmpty())
						<div class="owl-carousel">
							@foreach($properties as $property)
                        	<div class="item">
								<figure>
									<div class="abc">
										<a href="{{$property->url}}/{{$property->id}}">
										@if($property->gallery != "")
		                                    <?php
		                                    	$images =explode(';',$property->gallery);
		                                    ?>
											<img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
											<?php
	                                        	$images = null;
	                                        ?>
                                        @else
                                        	<img class="img-responsive" src="assets/images/img1.jpg" alt="{{$property->title}}">
                                        @endif
										<span class="facebook-icon"><i class="fa fa-search"></i></span>
										<div class="shades"></div>
										</a>
									</div>
									
								</figure>
								<p class="project-para">
									@if($property->purpose == 4)
                                    	project
                                    @else
                                    	property
                                    @endif
								</p>
								<h3 class="pro-loc">
									{{App\Property::getCityName($property->city_id)}} &#x21d2; {{App\Property::getTownName($property->town_id)}}
								</h3>
							</div>
							@endforeach
						</div>
						@else
							<p class="text-center" style="font-size: 20px; color: white">No property or project available yet!</p>
							@if(Auth::id() == $agencyWebsite->user_id)
							<p class="text-center">
                                <a href="/dashboard/quick/add/Property" class="edit-link"><i class="fa fa-home"></i> Add Property</a>
                                <a href="/dashboard/project/add" class="edit-link"><i class="fa fa-university"></i> Add Project</a>
                            </p>
                            @endif
						@endif
					</div>
				</div>
			</div>
		</section>
		<section class="about" id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 pr">
						<div class="col-lg-7 col-md-7 pl">
							<div class="about-section">
								<h2>About</h2>
								<div class="mCustomScrollbar about-content">
									{!! $agencyWebsite->about_us !!}
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 pl">
							<figure><img class="img-responsive" src="/unzips/Default%20Theme/images/about-img.jpg" alt="About"></figure>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="team" id="team">
			<div class="container">
				<div class="row">
					<?php
						$countStaff = count($staffs);
						switch ($countStaff) {
							case 1:
								$staffMainClass = 'col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4';
								$staffItemClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
								break;
							case 2:
								$staffMainClass = 'col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2';
								$staffItemClass = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
								break;
							default:
								$staffMainClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
								$staffItemClass = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
								break;
						}
					?>
					<div class="{{$staffMainClass}}">
						<div class="team-portion">
							<h2>Our Team</h2>
							<p>Leading Professionals</p>
						</div>
						@foreach($staffs as $staff)
						<div class="{{$staffItemClass}} padding-adjust">
							<div class="team-section">
								<figure>
									<div class="abc">
										<img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
										@if(!empty($staff->fb_link))
											<a href="{{$staff->fb_link}}" target="_blank">
												<span class="facebook-icon"><i class="fa fa-facebook"></i></span>
											</a>
										@else
											@if(Auth::id() == $agencyWebsite->user_id)
											<a href="javascript:void(0)" data-toggle="popover" data-placement="bottom" title="Facebook Link" data-content="No Facebook Link Available. Fill from website settings.">
												<span class="facebook-icon"><i class="fa fa-facebook"></i></span>
											</a>
											@endif
										@endif
										<div class="shades">
											<a href="@if(!empty($staff->site_profile_url)){{$staff->site_profile_url}} @else {{Request::url()}} @endif" target="_blank"></a>
										</div>
									</div>
									<figcaption>
										<h2>{{$staff->name}}</h2>
										<span>{{$staff->designation}}</span>
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
				<div class="row">
					<div class="col-lg-12 pr">
						<div class="col-lg-5 col-md-5 pl">
							<figure><img class="img-responsive" src="/unzips/Default%20Theme/images/contact-img.jpg" alt="ceo-image"></figure>
						</div>
						<div class="col-lg-7 col-md-7 pl">
							<div class="contact-form">
								<h2>Contact Us</h2>
								<form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="NAME" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="email" name="email" placeholder="EMAIL" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="phone" name="phone" placeholder="PHONE" required>
									</div>
									<div class="form-group">
										<textarea class="form-control textarea-height" name="message" type="textarea" id="message" placeholder="MESSAGE" rows="7"></textarea>
									</div>
									<button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <section class="map-sect" id="map">
			<div class="container-fluid no-padding">
				<iframe src="https://maps.google.com/maps?q='+YOUR_LAT+','+YOUR_LON+'&hl=es;z=14&amp;output=embed"></iframe>

				<a href="https://maps.google.com/maps?q='+data.lat+','+data.lon+'&hl=es;z=14&amp;output=embed" style="color:#0000FF;text-align:left" target="_blank">See map bigger</a></small>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.7227736383365!2d74.32938531522932!3d31.504303081374974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190468fac707b5%3A0xccf10281e353bf7f!2sKalma+Chowk+Flyover!5e0!3m2!1sen!2s!4v1502435999670" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>

				{{-- @if(!empty($offices[0]->address))
					{{$offices[0]->id}}
					<iframe src="https://maps.google.com/maps?q='+$offices[lat]+','+$offices[lng]+'&hl=es;z=14&amp;output=embed" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>
					
				@endif --}}
				<div id="map-canvas"></div>
			</div>



		</section>-->
		<style type="text/css">
			ul.border {
				border-right: 1px solid #3d3c3c;
			}
			ul.border-none {
				border-right: none;
			}
		</style>
	</div>
	<footer class="footer">
		<div class="container-fluid footer-top" id="office">
			<div class="container">
				<div class="row">
					<?php
						$countOffice = count($offices);
						switch ($countOffice) {
							case 1:
								$officeMainClass = 'col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4';
								$officeItemClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12 office-one';
								break;
							case 2:
								$officeMainClass = 'col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2';
								$officeItemClass = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
								break;
							case 3:
								$officeMainClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
								$officeItemClass = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
								break;
							default:
								$officeMainClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
								$officeItemClass = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
								break;
						}
					?>
					<div class="{{$officeMainClass}}">
						<?php $i = 1; ?>
						@foreach($offices as $office)
						<div class="{{$officeItemClass}} office-addresses">
							
							<h3>{{App\Property::getCityName($office->city_id)}} Office</h3>

							<ul class="<?php echo ($i%3 == 0 || $i == $countOffice)? 'border-none' : 'border'; ?>">
								<li><span><i class="fa fa-home"></i></span> <p>{{$office->address}}</p></li>
								<li><span><i class="fa fa-mobile"></i></span><p> {{$office->telephone}}</p></li>
								<li><span><i class="fa fa-envelope"></i></span> <p class="email-break">{{$office->email}}</p></li>
							</ul>
							<?php $i++ ?>
						</div>
						<!-- <?php $last_id=$office->id; ?> -->
						@endforeach
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
<script src="/unzips/Default%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Default%20Theme/js/bootstrap.min.js"></script>
<script src="/unzips/Default%20Theme/js/owl.carousel.js"></script>
<script type="text/javascript" src="/unzips/Default%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap"></script>
<script>
	var count = $("#office div.office-addresses").length;
	if(count == 1){
		//$('#office div.office-addresses:first-child').addClass('col-lg-offset-4 col-lg-4 col-md-offset-3 office-one');
		$('#office div.office-addresses:first-child h3').addClass('text-center');
	}
</script>
<?php
	$countItems = count($properties);
	$itemClass = '';
	switch ($countItems) {
		case 1:
			$itemClass = 1;
			break;

		case 2:
			$itemClass = 2;
			break;

		case 3:
			$itemClass = 3;
			break;

		default:
			$itemClass = 4;
			break;
	}
?>
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
					items: {{$itemClass}},
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
<script>
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})
</script>
</body>

</html>