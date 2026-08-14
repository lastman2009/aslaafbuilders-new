<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}} - RightDeed</title>
    <link href="/image/fav.jpg" rel="icon" type="image/x-icon">
    <link href="/unzips/HighTech%20Pro%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/HighTech%20Pro%20Theme/css/font-awesome.css" rel="stylesheet">
    <link href="/unzips/HighTech%20Pro%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/HighTech%20Pro%20Theme/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/HighTech%20Pro%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/HighTech%20Pro%20Theme/css/jquery.fullPage.css">
    <link rel="stylesheet" type="text/css" href="/unzips/HighTech%20Pro%20Theme/css/jquery.mCustomScrollbar.css">
    <link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="/unzips/HighTech%20Pro%20Theme/css/flexslider.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="/unzips/HighTech%20Pro%20Theme/css/jquery-responsiveGallery.css">
</head>

<body>
    <style>
        body{
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
                background-image: url(../unzips/HighTech%20Pro%20Theme/images/background-banner.jpg);
            @endif
        }
        .edit-link {
            background-color: #fff;
            display: inline-block;
            padding: 10px 25px;
            color: #000;
            border-radius: 3px;
            border: 1px solid #fff;
            margin-right: 5px;
            margin-top: 15px;
        }
        .edit-link i {
            font-size: 20px !important;
        }
        .edit-link:hover{
            background: #DBC10A;
            border: 1px solid #DBC10A;
            color: #fff;
            text-decoration: none;
        }
        .add-lnks {
            position: absolute;
            top: 30%;
            bottom: 30%;
            left: 30%;
            right: 30%;
        }
        .popover-title{
            font-weight: bold;
            color: black;
        }
        .popover-content{
            color: black;
        }
    </style>
    <header id="menu">
        <div class="container-fluid menu-bar">
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
                                        <a class="navbar-brand" href="{{Request::url()}}">
                                            <img src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo">
                                        </a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li data-menuanchor="home" class="active"><a href="#home">Home</a></li>
                                            <li data-menuanchor="about"><a href="#about">About Us</a></li>
                                            <li data-menuanchor="work"><a href="#work">Our Work</a></li>
                                            <li data-menuanchor="team"><a href="#team">Our Team</a></li>
                                            <li data-menuanchor="ceo"><a href="#ceo">CEO Message</a></li>
                                            <li data-menuanchor="contact"><a href="#contact">Contact Us</a></li>
                                            <li data-menuanchor="office"><a href="#office">Our Offices</a></li>
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
    <div id="fullpage">
        <div class="section active" id="section0">
            <div class="container">
                <div class="home-page">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>FIND YOUR PERFECT HOME TODAY</h2>
                            <p>We have best selections for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section1">
            <div class="container">
                <div class="about-us">
                    <div class="row">
                        <div class="col-md-12 pr">
                            <h2>About Us.</h2>
                            <div class="col-md-4 col-sm-4 pl">
                                <div class="img-container">
                                    <div class="img-block">
                                        <img class="img-responsive" src="/unzips/HighTech%20Pro%20Theme/images/about-img.jpg" alt="{{$agencyWebsite->agency_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 pl mCustomScrollbar">
                                {!! $agencyWebsite->about_us !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section2">
            <div class="work">
                <section id="responsiveGallery-container" class="responsiveGallery-container"><a class="responsiveGallery-btn responsiveGallery-btn_prev" href="javascript:void(0);"></a>
                    <a class="responsiveGallery-btn responsiveGallery-btn_next" href="javascript:void(0);"></a>
                    <ul class="responsiveGallery-wrapper">
                    @if(!$properties->isEmpty())
                        @foreach($properties as $property)
                            <li class="responsiveGallery-item">
                                <a href="{{$property->url}}/{{$property->id}}" class="responsivGallery-link">
                                    <div class="img-container">
                                        <div class="img-block">
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
                                        </div>
                                    </div>
                                </a>
                                <div class="gallery-text">
                                    <h2>{{$property->title}}</h2>
                                    <!-- <h3>{{--App\Property::getTownName($property->town_id)}}, {{App\Property::getCityName($property->city_id)--}}</h3> -->
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="add-lnks">
                            <p class="text-center" style="font-size: 20px; color: white">No property or project available yet!</p>
                            @if(Auth::id() == $agencyWebsite->user_id)
                                <p class="text-center">
                                    <a href="/dashboard/quick/add/Property" class="edit-link"><i class="fa fa-home"></i> Add Property</a>
                                    <a href="/dashboard/project/add" class="edit-link"><i class="fa fa-university"></i> Add Project</a>
                                </p>
                            @endif
                        </div>
                    @endif
                    </ul>
                </section>
            </div>
        </div>
        <div class="section" id="section3">
            <div class="container">
                <div class="team">
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
                                case 3:
                                    $staffMainClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                    $staffItemClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                    break;
                                default:
                                    $staffMainClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                    $staffItemClass = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                    break;
                            }
                        ?>
                        <div class="{{$staffMainClass}}">
                            <div class="owl-carousel">
                                @foreach($staffs as $staff)
                                <div class="item">
                                    <div class="team-section">
                                        <figure>
                                            <div class="team-detail">
                                                <div class="img-container">
                                                    <div class="img-block">
                                                        <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                                    </div>
                                                </div>
                                                <div class="team-portion">
                                                    <h3>{{$staff->name}}</h3>
                                                    <p>{{$staff->designation}}</p>
                                                    <ul>
                                                        <li>{{$staff->contact_number}}</li>
                                                        <li>{{$staff->email}}</li>
                                                        <li>
                                                            @if(!empty($staff->fb_link))
                                                                <a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a>
                                                            @else
                                                                @if(Auth::id() == $agencyWebsite->user_id)
                                                                <a href="javascript:void(0)" data-toggle="popover" data-placement="top" title="Facebook Link" data-content="No Facebook Link Available. Fill from website settings.">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                                @endif
                                                            @endif
                                                            @if(!empty($staff->google_plus))
                                                                <a href="{{$staff->google_plus}}"><i class="fa fa-google-plus"></i></a>
                                                            @else
                                                                @if(Auth::id() == $agencyWebsite->user_id)
                                                                <a href="javascript:void(0)" data-toggle="popover" data-placement="top" title="Facebook Link" data-content="No Google Plus Link Available. Fill from website settings.">
                                                                    <i class="fa fa-google-plus"></i>
                                                                </a>
                                                                @endif
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="shades"></div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section4">
            <div class="container">
                <div class="ceo">
                    <div class="row">
                        <div class="col-md-12 pr">
                            <h2>CEO Message</h2>
                            <div class="col-md-4 col-sm-4 pl">
                                <div class="img-container">
                                    <div class="img-block">
                                        <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}} CEO"></div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 pl mCustomScrollbar">
                                <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section5">
            <div class="container">
                <div class="contact">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control textarea-height" type="textarea" id="message" name="message" placeholder="Message ..." rows="7"></textarea>
                                    </div>
                                    <button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section6">
            <div class="container">
                <div class="location">
                    <div class="row">
                        <div class="col-md-12 pr">
                            <div class="col-md-8 pl pr">
                                <div id="map-canvas"></div>
                            </div>
                            <div class="col-md-4 pl">
                                <div class="flexslider">
                                    <ul class="slides">
                                        @foreach($offices as $office)
                                        <li>
                                            <div class="address">
                                                @foreach($cities as $city)
                                                    @if($city->id == $office->city_id)
                                                    <h1>{{$city->name}} Office</h1>
                                                    @endif
                                                @endforeach
                                                <ul>
                                                    <li class="mCustomScrollbar"><span><i class="fa fa-home"></i></span><p>{{$office->address}}</p></li>
                                                    <li><span><i class="fa fa-mobile"></i></span><p> {{$office->telephone}}</p></li>
                                                    <li><span><i class="fa fa-envelope"></i></span><p>{{$office->email}}</p></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php $last_id = $office->id; ?>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="office-addresses">
                            <h1>Follow Us</h1>
                            <ul>
                            @if(!empty($offices[0]->address))
                                <li>{{$offices[0]->telephone}}, {{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
                                <li>{{$offices[0]->email}}</li>
                                <li>{{$offices[0]->address}}</li>
                            @else
                                {{'No info Available'}}
                                {{--<br />--}}
                            @endif
                            </ul>
                            <ul class="copyright">
                            @if(!empty($offices[0]->address))
                                <li>
                                    <a href="https://{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a>
                                    <a href="https://{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>All Rights Reserved &amp; Powered by Technological Inc.</li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/unzips/HighTech%20Pro%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/HighTech%20Pro%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/HighTech%20Pro%20Theme/js/jquery-ui.min.js"></script>
    <script src="/unzips/HighTech%20Pro%20Theme/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/unzips/HighTech%20Pro%20Theme/js/jquery.fullPage.js"></script>
    <script type="text/javascript" src="/unzips/HighTech%20Pro%20Theme/js/examples.js"></script>
    <script type="text/javascript" src="/unzips/HighTech%20Pro%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/unzips/HighTech%20Pro%20Theme/js/jquery.flexslider.js"></script>
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
         
       <?php 
        if($office->id!=$last_id)
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
    $(document).ready(function() {
        $('#fullpage').fullpage({
            anchors: ['home', 'about', 'work', 'team', 'ceo', 'contact', 'office'],
            menu: '#menu',
        });

        $('.flexslider').flexslider({
            animation: "slide",
            directionNav: false
        });
    });
    </script>
    <?php
        $countItems = count($staffs);
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
            dots: false,
            nav: true,
            navText: ['', ''],
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: {{$itemClass}},
                    dots: false,
                    nav: true,
                    loop: false
                }
            }
        });
    });
    </script>
    <script type="text/javascript" src="/unzips/HighTech%20Pro%20Theme/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="/unzips/HighTech%20Pro%20Theme/js/jquery.responsiveGallery.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.responsiveGallery-wrapper').responsiveGallery({
            animatDuration: 400,
            $btn_prev: $('.responsiveGallery-btn_prev'),
            $btn_next: $('.responsiveGallery-btn_next')
        });
    });
    </script>
    <script>
        $(function () {
          $('[data-toggle="popover"]').popover()
        })
    </script>
    <!--<script>
            $('#return-to-top').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
            });


            $(function(){
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
    
    $(document).ready(function(){
        $(".navbar-nav li a").on('click', function(event) {
            if (this.hash !== "") {
              event.preventDefault();
              var hash = this.hash;
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 900, function(){
              });
            } 
          });
      
        
    })
    </script>-->
</body>

</html>