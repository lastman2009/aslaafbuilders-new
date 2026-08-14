<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$agencyWebsite->agency_name}}</title>
	<link href="/unzips/Default%20Theme/css/bootstrap.min.css" rel="stylesheet">
	<link href="/unzips/Default%20Theme/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="/unzips/Default%20Theme/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="/unzips/Default%20Theme/css/jquery.mCustomScrollbar.css">
	<link href="/unzips/Default%20Theme/css/theme.css" rel="stylesheet">
	<link href="/unzips/Default%20Theme/css/custom.css" rel="stylesheet">
	
</head>

<body>
	<style>
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
	</style>
	<header class="header" id="home">
		<div class="container-fluid menu-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12 pr">
						<div class="top-bar">
							<div class="pl col-md-6 col-sm-12">
								<ul>
									@if(!empty($offices[0]->address))
									<li class="pr-40"><span><i class="fa fa-mobile"></i></span> {{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
									<li><span><i class="fa fa-home"></i></span> {{$offices[0]->address}}</li>
									@else {{'No info Available'}}
									<br /> @endif
								</ul>
							</div>
							<div class="col-md-6 col-sm-12 social-media">
								<ul>
									@if(!empty($offices[0]->address))
									<li>
										<a href="{{$offices[0]->fb_link}}"><span><i class="fa fa-facebook"></i></span></a>
									</li>
									<li>
										<a href="{{$offices[0]->google_link}}"><span><i class="fa fa-google-plus"></i></span></a>
									</li>
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
										<a class="navbar-brand" href=""><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
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
						<div class="col-lg-5 col-md-5 col-sm-12 ceo-img pl">
							<figure>
								<div class="img-container">
									<div class="img-block">
										<img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo" />
									</div>
								</div>
							</figure>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-12 pl ceo-text">
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
					<div class="col-lg-12">
						<div class="owl-carousel">
							@foreach($properties as $property)
                        	<div class="item">
								<figure>
									@if($property->gallery != "")
                                    <?php
                                    	$images =explode(';',$property->gallery);
                                    ?>
									<div class="abc">
										<a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
											<img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt=""><span class="facebook-icon"><i class="fa fa-search"></i></span>
											<div class="shades"></div>
										</a>
									</div>
									@endif
								</figure>
								<p class="project-para">
									@if($property->purpose == 4)
                                    <?='project'?>
                                    @else
                                    <?='property'?>
                                    @endif
								</p>
								<h3 class="pro-loc">
									{{App\Property::getCityName($property->city_id)}} &#x21d2; {{App\Property::getTownName($property->town_id)}}
								</h3>
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
					<div class="col-lg-12 pr">
						<div class="col-lg-7 col-md-7 pl">
							<div class="about-section">
								<h2>About</h2>
								<div class="mCustomScrollbar about-content">
									<?php
                                        $doc = new DOMDocument();
                                        $doc->loadHTML($agencyWebsite->about_us);
                                        echo $doc->saveHTML();
                                    ?>
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
					<div class="col-lg-12">
						<div class="team-portion">
							<h2>Our Team</h2>
							<p>Leading Professionals</p>
						</div>
						@foreach($staffs as $staff)
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-adjust">
							<div class="team-section">
								<figure>
									<div class="abc">
										<img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
										<a href="{{$staff->fb_link}}" target="_blank"><span class="facebook-icon"><i class="fa fa-facebook"></i></span></a>
										<div class="shades"><a href="{{$staff->site_profile_url}}" target="_blank"></a></div>
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
										<textarea class="form-control textarea-height" type="textarea" id="message" placeholder="MESSAGE" rows="7"></textarea>
									</div>
									<button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="map-sect" id="map">
			<div class="container-fluid no-padding">
				<!-- <iframe src="https://maps.google.com/maps?q='+YOUR_LAT+','+YOUR_LON+'&hl=es;z=14&amp;output=embed"></iframe> -->

				<!-- <a href="https://maps.google.com/maps?q='+data.lat+','+data.lon+'&hl=es;z=14&amp;output=embed" style="color:#0000FF;text-align:left" target="_blank">See map bigger</a></small> -->
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.7227736383365!2d74.32938531522932!3d31.504303081374974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190468fac707b5%3A0xccf10281e353bf7f!2sKalma+Chowk+Flyover!5e0!3m2!1sen!2s!4v1502435999670" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe> -->

				{{-- @if(!empty($offices[0]->address))
					{{$offices[0]->id}}
					<iframe src="https://maps.google.com/maps?q='+$offices[lat]+','+$offices[lng]+'&hl=es;z=14&amp;output=embed" width="100%" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>
					
				@endif --}}
				<div id="map-canvas"></div>
			</div>



		</section>
	</div>
	<footer class="footer">
		<div class="container-fluid footer-top" id="office">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						@foreach($offices as $office)
						<div class="col-md-4 office-addresses">
							<h3>{{$office->city}} Office</h3>
							<ul>
								<li><span><i class="fa fa-home"></i></span> {{$office->address}}</li>
								<li><span><i class="fa fa-mobile"></i></span> {{$office->telephone}}</li>
								<li><span><i class="fa fa-envelope"></i></span> {{$office->email}}</li>
							</ul>
						</div>
						<?php $last_id=$office->id; ?>
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

var map;
var infoWindow;


var markersData = [
   <?php foreach($offices as $office)
	{
		
		?>
	   {
	      lat: <?php echo $office->lat; ?>,
	      lng: <?php echo $office->lng; ?>,
	      name: "<?php echo $office->city; ?>",
	      address1: "<?php echo $office->address; ?>"
	     
	   }
	   
	 <?php if($office->id!=$last_id)
		 echo ','; 
		}
	 ?>
   
];


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(40.601203,-8.668173),
      zoom: 9,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // a new Info Window is created
   infoWindow = new google.maps.InfoWindow();

   // Event that closes the Info Window with a click on the map
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Finally displayMarkers() function is called to begin the markers creation
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);


// This function will iterate over markersData array
// creating markers with createMarker function
function displayMarkers(){

   // this variable sets the map bounds according to markers position
   var bounds = new google.maps.LatLngBounds();
   
   // for loop traverses markersData array calling createMarker function for each marker 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
      var name = markersData[i].name;
      var address1 = markersData[i].address1;
      var address2 = markersData[i].address2;
      var postalCode = markersData[i].postalCode;

      createMarker(latlng, name, address1, address2, postalCode);

      // marker position is added to bounds variable
      bounds.extend(latlng);  
   }

   // Finally the bounds variable is used to set the map bounds
   // with fitBounds() function
   map.fitBounds(bounds);
}

// This function creates each marker and it sets their Info Window content
function createMarker(latlng, name, address1, address2, postalCode){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name
   });

   // This event expects a click on a marker
   // When this event is fired the Info Window content is created
   // and the Info Window is opened.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Creating the content to be inserted in the infowindow
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + name + '</div>' +
         '<div class="iw_content">' + address1 + '<br />' +
         address2 + '<br />' +
         postalCode + '</div></div>';
      
      // including content to the Info Window.
      infoWindow.setContent(iwContent);

      // opening the Info Window in the current map and at the current marker location.
      infoWindow.open(map, marker);
   });
}
</script>
<script>
	var count = $("#office div.office-addresses").length;
	if(count == 1){
		$('#office div.office-addresses:first-child').addClass('col-lg-offset-4 col-lg-4 col-md-offset-3 office-one');
		$('#office div.office-addresses:first-child h3').addClass('text-center');
	}
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
					items: 3,
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