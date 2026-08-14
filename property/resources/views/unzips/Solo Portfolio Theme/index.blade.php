<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Solo%20Portfolio%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Solo%20Portfolio%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Solo%20Portfolio%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Solo%20Portfolio%20Theme/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid">
            <div class="row">
                <div class="container pr">
                    <div class="col-lg-12 pr">
                        <nav class="navbar navbar-default top-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
                            </div>
                            <div class="collapse navbar-collapse pr" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="#home1">HOME</a></li>
                                    <li><a href="#ceo">CEO MESSAGE</a></li>
                                    <li><a href="#work">OUR WORK</a></li>
                                    <li><a href="#contact">CONTACT</a></li>
                                    <li><a href="#about">ABOUT US</a></li>
                                    <li><a href="#team">OUR TEAM</a></li>
                                    <li><a href="#office">OUR OFFICES</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="col-md-12 pl pr">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($i=0; $i
                <count($agencyWebsite->Images); $i++)
                    <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                    @endfor
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach($agencyWebsite->Images as $image)
                <div class="item">
                    <img src="/images/banners/original_{{$image->image}}" alt="{{$image->title}}">
                    <div class="carousel-caption cap">
                        <h2>{{$image->title}}</h2>
                        <p>{{$image->caption}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="main">
        <section class="ceo-msg-sect" id="ceo">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ceo-msg">
                            <div class="col-md-4 col-sm-6 col-xs-12 ceo-img">
                                <figure>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo" />
                                        </div>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 ceo-text">
                                <h2><span>CEO Message</span> </h2>
                                <div class="mCustomScrollbar">
                                    <p>{{strip_tags($agencyWebsite->ceo_message, '
                                        <br>')}}</p>
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
                        <div class="property-portion">
                            <h2>Our <span>Work</span></h2>
                            <p>Explore Our Projects</p>
                        </div>
                        <div class="col-lg-12  pr">
                            @foreach($properties as $property)
                            <div class="col-md-4 col-sm-6 workportion pl">
                                <figure class="internal-sec">
                                    @if($property->gallery != "")
                                    <?php
                                        $images =explode(';',$property->gallery);
                                    ?>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img src="/images/property/user_property/original_{{$images[0]}}" class="imgs img-responsive">
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
                                            <p>PRICE:<span>RS. 
                                                <?php
                                                            if($property->purpose !== 4){ 
                                                              echo "Rs. ";
                                                              $price = $property->price;
                                                              $formated_num = number_format((double)$price);
                                                              echo $formated_num;
                                                            }
                                                          ?>
                                                              
                                                          </span></p>
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="btn btn-default">VIEW DETAIL</a>
                                        </div>
                                        <span class="top">
                                            @if($property->purpose !== 4)
                                            {{"Property"}}
                                            @else
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
        <section class="about-sect" id="contact">
            <div class="container-fluid" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills abtandcntct">
                                <li class="rr rr-left active"><a data-toggle="pill" href="#home">CONTACT US
                                </a></li>
                                <li class="rr rr-right"><a data-toggle="pill" href="#menu1">ABOUT US</a></li>
                            </ul>
                            <div class="tab-content about-content">
                                <div id="home" class="tab-pane fade in active">
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
                                            <textarea class="form-control textarea-height" type="textarea" name="message" id="message" placeholder="Message" rows="7"></textarea>
                                        </div>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                                <div id="menu1" class="tab-pane fade about-text">
                                    <h3>ABOUT US</h3>
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
                </div>
            </div>
        </section>
        <section class="team hidden-xs" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-content">
                                <div class="team-heading">
                                    <h2><span>Our</span> Team</h2>
                                    <span>Best In Best Member</span>
                                </div>
                                <div class="tab-content">
                                    <?php $i = 0; ?>
                                    @foreach($staffs as $staff)
                                    <div class="tab-pane fade @if($i==0) in active @endif" id="tab{{$i}}">
                                        <h2>{{$staff->name}}</h2>
                                        <p>{{$staff->designation}}</p>
                                        <p><span><i class="fa fa-calendar" aria-hidden="true"></i></span> {{$staff->year_of_service}}</p>
                                        <p><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span> {{$staff->contact_number}}</p>
                                        <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span> {{$staff->email}}</p>
                                    </div>
                                    <?php $i++ ?>
                                    @endforeach
                                </div>
                                <ul class="nav nav-tabs tabs">
                                    <?php $i = 0; ?>
                                    @foreach($staffs as $staff)
                                    <li class="col-md-4 col-sm-4 pl img-hover @if($i==0) in active @endif">
                                        <a href="#tab{{$i}}" data-toggle="tab">
                                            <div class="img-container">
                                                <div class="img-block">
                                                    <img src="/images/staff/thumb_{{$staff->image}}" class="img=responsive team-img">
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{$staff->fb_link}}" class="fb-lnk"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a>
                                    </li>
                                    <?php $i++ ?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team hidden-md hidden-lg hidden-sm" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="team-content">
                                <div class="team-heading">
                                    <h2><span>Our</span> Team</h2>
                                    <span>Best In Best Member</span>
                                </div>
                                @foreach($staffs as $staff)
                                <div class="col-xs-12 iteam-content">
                                    <div class="col-xs-12 img-bottom">
                                        <img src="/images/staff/thumb_{{$staff->image}}" class="img=responsive team-img">
                                    </div>
                                    <div class="col-xs-12">
                                        <h2>{{$staff->name}}</h2>
                                        <p>{{$staff->designation}}</p>
                                        <ul>
                                            <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span> {{$staff->year_of_service}}</li>
                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span> {{$staff->contact_number}}</li>
                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span> {{$staff->email}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-sect" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-heading">
                            <h2>Our <span>Offices</span></h2>
                            <p>Visit Our Locations</p>
                        </div>
                        <div class="col-md-8 map">
                            <div class="container-fluid no-padding">
                                <div id="map-canvas"></div>
                            </div>
                        </div>
                        <div class="col-md-4 location">
                            <div id="text-carousel" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <!--<ol class="carousel-indicators small">
                                    @for($i=0; $i<count($offices); $i++)
                                    <li data-target="#text-carousel" data-slide-to="{{$i}}"></li>
                                    @endfor
                                </ol>-->
                                <div class="row">
                                    <div class="col-md-12 location-detail">
                                        <div class="carousel-inner">
                                            @foreach($offices as $office)
                                            <div class="item">
                                                <div class="carousel-content">
                                                    <div>
                                                        @foreach($cities as $city)
															@if($city->id == $office->city_id)
															<h2>{{$city->name}} Office</h2>
															@endif
														@endforeach
                                                        <ul>
                                                            <li><span><i class="fa fa-home fot-home" aria-hidden="true"></i></span> <p>{{$office->address}}</p></li>
                                                            <li><span><i class="fa fa-mobile mob" aria-hidden="true"></i></span> <p>{{$office->telephone}}</p></li>
                                                            <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span><p> {{$office->email}}</p></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $last_id=$office->id; ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer">
                <div class="container-fluid footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="col-md-4 bottom-logo">
                                    <h2><a href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" style="width: 130px;"></a></h2>
                                    <p>
                                        @if(strlen($agencyWebsite->about_us) <= 150)
                                        {{strip_tags($property->title)}}
                                        @else
                                        <?php echo substr(strip_tags($agencyWebsite->about_us),0,150).'...';?>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-4 followon">
                                    <h2><span>FOLLOW ON</span> </h2>
                                    <p>You can follow us on the following links where you will find our portal posts and many more.</p>
                                    <ul class="list-inline follow-social">
                                        @if(!empty($offices[0]->address))
                                        <li><a href="{{$offices[0]->fb_link}}"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                        <li><a href="{{$offices[0]->google_link}}"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span></a> </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-4 contactus">
                                    <h2><span>CONTACT US</span></h2>
                                    <ul class="pl">
                                        @if(!empty($offices[0]->address))
                                        <li><span><i class="fa fa-phone" aria-hidden="true"></i></span><p>{{$offices[0]->telephone}}</p></li>
                                        <li><span><i class="fa fa-home" aria-hidden="true"></i></span><p>{{$offices[0]->address}}</p></li>
                                        <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span><p>{{$offices[0]->email}}</p></li>
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
            </div>
        </footer>
    </div>
</body>

</html>
<html>
<script src="/unzips/Solo%20Portfolio%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Solo%20Portfolio%20Theme/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/unzips/Solo%20Portfolio%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
$(".carousel-inner div.item:first-child").addClass('active');
$(".carousel-indicators li:first-child").addClass("active");
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGliLFvAQbzQtcte_CQVjhHa6vQ3ifZjk&callback=initMap"></script>
<script>

var map;
var infoWindow;


var markersData = [
   <?php foreach($offices as $office)
  {
    
    ?>
     {
        lat: "<?php echo $office->lat; ?>",
        lng: "<?php echo $office->lng; ?>",
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
   map.setCenter(latlng);
   map.setZoom(17);
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

</html>