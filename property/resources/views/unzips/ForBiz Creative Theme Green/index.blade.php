<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/ForBiz%20Creative%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/ForBiz%20Creative%20Theme/css/font-awesome.css" rel="stylesheet">
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <!-- custom scrollbar stylesheet -->
    <link rel="stylesheet" href="/unzips/ForBiz%20Creative%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/ForBiz%20Creative%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/ForBiz%20Creative%20Theme%20Green/css/custom.css" rel="stylesheet">
</head>

<body>
    <header id="home" class="header">
        <div class="container">
            <div class="row">
                <div class="menu-bar fixed-nav" id="header">
                    <div class="col-md-12 pr">
                        <div class="primary-menu">
                            <nav class="navbar navbar-inverse mb">
                                <div class="container">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                        <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}"></a> </div>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                                <li><a href="#home">Home</a></li>
                                                <li><a href="#msg">CEO Message</a></li>
                                                <li><a href="#work">Our Work</a></li>
                                                <li><a href="#aboutus">About Us</a></li>
                                                <li><a href="#offices">Our Offices</a></li>
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
            <div id="carousel" class="carousel slide carousel-fade banner-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i=0; $i<count($agencyWebsite->Images); $i++)
                    <li data-target="#carousel" data-slide-to="{{$i}}"></li>
                    @endfor
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    @foreach($agencyWebsite->Images as $image)
                    <div class="item">
                        <img src="/images/banners/original_{{$image->image}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12 banner-text">
                <h1>FIND <span>YOUR</span> PERFECT <span>HOME</span> TODAY</h1>
                <p>The Best forum for you to find property.</p>
            </div>
        </header>
        <div class="main">
            <section id="msg" class="ceo-msg-sect">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 ceo-msg pr">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ceo-img pl pr">
                                <figure>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="ceo-image" />
                                        </div>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pl ceo-text">
                                <h2>CEO Message</h2>
                                <p id="content-1" class="content">
                                    {{strip_tags($agencyWebsite->ceo_message, '<br>')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="work" class="property-sect">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 property-portion text-left">
                            <h2>Our <span>Work</span></h2>
                            <p class="text-muted">Unique Interior Design</p>
                        </div>
                        <div class="col-lg-12" style="padding: 0;">
                            @foreach($properties as $property)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding-adjust">
                                <div class="team-section">
                                    <figure>
                                        @if($property->gallery != "")
                                        <?php
                                        $images =explode(';',$property->gallery);
                                        ?>
                                        <div class="abc">
                                            <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="ceo-image" />
                                            </a>
                                            <div class="shade">
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}"><i class="fa fa-search"></i></a>
                                            </div>
                                            <div class="tag-property">
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                                    @if($property->property_type_id == 0)
                                                    <?='project'?>
                                                    @else
                                                    <?='property'?>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <figcaption>
                                            <h4>
                                                @if(strlen($property->title) <= 20)
                                                {{strip_tags($property->title)}}
                                                @else
                                                <?php echo substr(strip_tags($property->title),0,20).'...';?>
                                                @endif
                                                <br>
                                                <i class="fa fa-map-marker"></i> {{App\Property::getCityName($property->city_id)}}</h4>
                                                <ul>
                                                    <li><i class="fa fa-bed"></i> {{$property->bed}} beds</li>
                                                    <li><i class="fa fa-bath"></i> {{$property->bath}} bath</li>
                                                    <li><i class="fa fa-area-chart"></i> {{$property->area}} {{$property->area_type}}</li>
                                                </ul>
                                                {{--
                                                <div class="col-md-6 col-sm-6 col-xs-12 photo-squares"> <a href="#"><i class="fa fa-photo"></i> {{count($property->images)}} photos</a> </div>--}} {{--
                                                <div class="col-md-6 col-sm-6 col-xs-12 photo-squares"> <a href="#"><i class="fa fa-area-chart"></i> {{$property->area}} {{$property->area_type}}</a></div>--}}
                                            </figcaption>
                                            @endif
                                        </figure>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <section id="aboutus" class="about">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#menu1">About us</a></li>
                                    <li><a data-toggle="tab" href="#menu2">contact us</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane fade in active">
                                        <?php
                                            $doc = new DOMDocument();
                                            $doc->loadHTML($agencyWebsite->about_us);
                                            echo $doc->saveHTML();
                                        ?>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="contact-form">
                                            <h2>Contact Us</h2>
                                            <form role="form" action="/sendmessage/{{$agencyWebsite->email}}" method="post">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <input class="form-control" id="name" name="name" placeholder="Name" required="" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="email" name="email" placeholder="Email" required="" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="phone" name="phone" placeholder="Phone" required="" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control textarea-height" type="textarea" id="message" placeholder="Message" rows="7" name="message"></textarea>
                                                </div>
                                                <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="offices" class="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 pr">
                                <h2>Our <span>Offices</span></h2>
                                <p class="text-muted">Best in best members</p>
                                <div class="col-lg-8 pl">
                                    <div id="map-canvas"></div>
                                </div>
                                <div class="col-lg-4 pl">
                                    <div class="contact-form">
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                @for($i=0; $i
                                                <count($offices); $i++) <li data-target="#myCarousel" data-slide-to="{{$i}}">
                                            </li>
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
                                                        <li><span><i class="fa fa-home"></i></span> {{$office->address}}.</li>
                                                        <li><span><i class="fa fa-mobile"></i></span> {{$office->telephone}}</li>
                                                        <li><span><i class="fa fa-envelope"></i></span> {{$office->email}}</li>
                                                    </ul>
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
            </section>
        </div>
        <footer id="contact" class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4  col-sm-4  col-sm-4  col-xs-12 office-addresses">
                                <a href="/"><img style="max-height:92px;margin-top:15px;margin-bottom:10px;" class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}"></a>
                                <p>
                                    @if(strlen($agencyWebsite->about_us)<=150) {{strip_tags($agencyWebsite->about_us)}}
                                    @else
                                    <?php echo substr(strip_tags($agencyWebsite->about_us),0,150).'...';?>
                                    @endif
                                </p>
                            </div>
                            <div class="col-lg-4  col-sm-4  col-sm-4  col-xs-12 office-addresses follow">
                                <h1>Follow on</h1>
                                <p>You can also follow us on the famous social media platforms. Click following links to proceed.</p>
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
                            <div class="col-lg-4  col-sm-4  col-sm-4  col-xs-12 office-addresses">
                                <h1>Contact us</h1>
                                <ul class="border-none">
                                    @if(!empty($offices[0]->address))
                                    <li><span><i class="fa fa-home"></i></span> {{$offices[0]->address}}</li>
                                    <li><span><i class="fa fa-mobile"></i></span> {{$offices[0]->telephone}},{{$offices[0]->uan_number}},{{$offices[0]->mobile_no}}</li>
                                    <li><span><i class="fa fa-envelope"></i></span> {{$offices[0]->email}}</li>
                                    @else
                                        {{'No info Available'}}
                                        {{--<br />--}}
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
        <script src="/unzips/ForBiz%20Creative%20Theme/js/jquery-3.2.1.min.js"></script>
        <script src="/unzips/ForBiz%20Creative%20Theme/js/bootstrap.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
        <script src="/unzips/ForBiz%20Creative%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
            $(".carousel-inner div.item:first-child").addClass('active');
            $(".carousel-indicators li:first-child").addClass("active");
        </script>
        <script>
            $(document).ready(function() {
                $('#return-to-top').click(function() {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 500);
                });
            });
        </script>
        <script type="text/javascript">
            // Page Scroll
            jQuery(document).ready(function($) {
                $('.menu-bar a[href*=#]:not([href=#])').click(function() {
                    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                            $('html,body').animate({
                                scrollTop: target.offset().top - 32
                            }, 1000);
                            return false;
                        }
                    }
                });
            });

            // Fixed Nav
            $(function() {
                createSticky($("#header"));
            });

            function createSticky(sticky) {
                if (typeof sticky !== "undefined") {
                    var pos = sticky.offset().top,
                    win = $(window);
                    win.on("scroll", function() {
                        win.scrollTop() >= pos ? sticky.addClass("fixedtop") : sticky.removeClass("fixedtop");
                    });
                }
            }
        </script>
        <script>
            (function($) {
                $(window).on("load", function() {

                    $("#content-1,#content-2").mCustomScrollbar({
                        autoHideScrollbar: false,
                        theme: "rounded"
                    });
                    $("#content-3").mCustomScrollbar({
                        theme: "inset-2-dark",
                        setLeft: 0,
                    });

                });
            })(jQuery);
        </script>
</body>

</html>