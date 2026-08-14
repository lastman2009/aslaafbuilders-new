<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Business%20Oriented%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Business%20Oriented%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Business%20Oriented%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Business%20Oriented%20Theme/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Business%20Oriented%20Theme/css/flexslider.css">
    <link href="/unzips/Business%20Oriented%20Theme%20Blue%20Slate/css/theme.css" rel="stylesheet">
    <link href="/unzips/Business%20Oriented%20Theme%20Blue%20Slate/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home1">
        <div class="container-fluid top-border">
            <div class="row">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12  topnav pr">
                        <div class="col-md-6 col-sm-6 col-xs-6 home no-padding">
                            <ul class="list-unstyled list-inline">
                                <li><img class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></li>
                                <li class="hidden-xs">Your Best Real Estate Solution</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 sociall no-padding">
                            @if(!empty($offices[0]->address))                            
                            <span><i class="fa fa-phone fon" aria-hidden="true"></i> {{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</span>
                            <p><i class="fa fa-envelope fon" aria-hidden="true"></i> {{$offices[0]->email}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row secondary-nav">
                <div class="container pr">
                    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                        <nav class="navbar navbar-default top-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse no-padding" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="">HOME</a></li>
                                    <li><a href="">CEO MESSAGE</a></li>
                                    <li><a href="">OUR WORK</a></li>
                                    <li><a href="">CONTACT</a></li>
                                    <li><a href="">ABOUT US</a></li>
                                    <li><a href="">OUR TEAM</a></li>
                                    <li><a href="">OUR OFFICES</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid banner no-padding" id="work">
    <div id="text-carousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-inner">
                    @foreach($properties as $property)
                    <div class="item">
                        <div class="carousel-content">
                            <div class="text-center slider-content">
                                <p>{{$property->title}}</p>
                                <img src="/unzips/Business%20Oriented%20Theme/images/border_03.jpg">
                                <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 
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
                                <p class="color">
                                    @if($property->purpose !== 4)
                                    <?php
                                        echo "Rs. ";
                                        $price = $property->price;
                                        $formated_num = number_format((double)$price);
                                        echo $formated_num;
                                    ?>
                                    @else
                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" style="font-size:14px;padding:0;color:#50aff9;background:none;text-decoration:underline;">VIEW Schemes</a>
                                    @endif
                                </p>
                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Controls --><a class="left carousel-control" href="#text-carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
        <a class="right carousel-control" href="#text-carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
    </div>
</div>
    </header>
    <div class="main">
        <section class="ceo-msg-sect" id="ceo">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ceo-msg">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">ABOUT US</a></li>
                                <li><a data-toggle="tab" href="#menu1">CEO MESSAGE</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active text-center aboutus">
                                    <div class="mCustomScrollbar" id="about">
                                        <?php
                                              $doc = new DOMDocument();
                                              $doc->loadHTML($agencyWebsite->about_us);
                                              $content = $doc->saveHTML();
                                              echo $content;
                                        ?>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="col-md-4 col-sm-6 col-xs-12 ceo-img">
                                        <figure><img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo"></figure>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-12 ceo-text">
                                        <div class="mCustomScrollbar">
                                            {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-sect" id="contact">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                          {{csrf_field()}}
                          <div class="col-md-5 form-line">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                              </div>
                              <div class="form-group">
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group">
                                  <textarea class="form-control" id="description" id="message" name="message" placeholder="Enter Your Message"></textarea>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <button type="button" class="btn btn-default submit" id="submit" name="submit">Send Message</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="team" id="team">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-content">
                                <div class="team-heading text-center">
                                    <h2>Our Team</h2>
                                </div>
                                <div class="row">
                                    @foreach ($staffs as $staff)
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="team-members">
                                            <div class="team-avatar">
                                                <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                            </div>
                                            <div class="team-desc text-center">
                                                <h4>{{$staff->mobile_no}} {{$staff->telephone}}<br></h4>
                                                <p>{{$staff->email}}</p>
                                                <ul class="list-unstyled list-inline">
                                                    <li><a href="{{$staff->fb_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                    <li><a href="{{$staff->google_plus}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </div>
                                            <div class="team-detail text-center">
                                                <h2>{{$staff->name}}</h2>
                                                <p>{{$staff->designation}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-sect" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8 map">
                            <div class="container-fluid no-padding">
                                <div id="map-canvas"></div>
                            </div>
                        </div>
                        <div class="col-md-4 location">
                            <div class="flexslider">
                                <ul class="slides">
                                    @foreach($offices as $office)
                                    <li>
                                        <div class="address-office">
                                            @foreach($cities as $city)
                                                @if($city->id == $office->city_id)
                                                <h3>{{$city->name}} Office</h3>
                                                @endif 
                                            @endforeach
                                            <ul>
                                                <li><span><i class="fa fa-phone"></i> </span><p>{{$office->telephone}} {{$office->mobile_no}}</p></li>
                                                <li><span><i class="fa fa-envelope"></i></span> <p class="email-break">{{$office->email}}</p></li>
                                                <li><span><i class="fa fa-map-marker"></i></span><p>{{$office->address}}</p></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php $last_id=$office->id; ?>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="follow-on">
                                <h2><span>FOLLOW US</span> </h2>
                                <ul class="no-padding list-unstyled">
                                    @if(!empty($offices[0]->address))
                                      <li>{{$offices[0]->address}}</li>
                                      <li>{{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
                                      <li>{{$offices[0]->email}}</li>
                                    @else
                                        {{'No info Available'}}
                                    @endif
                                </ul>
                                <ul class="list-inline follow-social">
                                    @if(!empty($offices[0]->address))
                                    <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                    @endif
                                </ul>
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
                            <div class="col-md-offset-3 col-md-6 col-md-offset-3 text-center">
                                <img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo">
                                <p>
                                  @if(strlen($agencyWebsite->about_us) <= 300)
                                      {{$agencyWebsite->about_us}}
                                  @else
                                      <?php echo substr(strip_tags($agencyWebsite->about_us),0,300).'...';?>
                                  @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid footer-btm">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
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
<script src="/unzips/Business%20Oriented%20Theme/js/jquery-3.2.1.min.js"></script>
<script src="/unzips/Business%20Oriented%20Theme/js/bootstrap.min.js"></script>
<script src="/unzips/Business%20Oriented%20Theme/js/jquery.flexslider.js"></script>
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
        <?php foreach($cities as $city){if($city->id == $office->city_id){?>
        name: "<?php echo $city->name; ?>",
        <?php }} ?>                                  
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
//   map.fitBounds(bounds);
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
  $('.carousel-inner div.item:first-child').addClass('active');
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('.flexslider').flexslider();

});
</script>
<script src="/unzips/Business%20Oriented%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>

</html>