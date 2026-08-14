<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Silver%20Estate%20Pro%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Silver%20Estate%20Pro%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Silver%20Estate%20Pro%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Silver%20Estate%20Pro%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Silver%20Estate%20Pro%20Theme%20Dark%20Golden%20Rod/css/theme.css" rel="stylesheet">
    <link href="/unzips/Silver%20Estate%20Pro%20Theme%20Dark%20Golden%20Rod/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home">
        <div class="container-fluid menu-bar" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 col-xs-12 pr">
                        <div class="primary-menu">
                            <nav class="navbar navbar-inverse mb">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                        <a class="navbar-brand" href=""><img class="img-responsive" src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a> </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#contact">contact</a></li>
                                            <li><a href="#aboutus">about us</a></li>
                                            <li><a href="#msg">ceo message</a></li>
                                            <li><a href="#work">our work</a></li>
                                            <li><a href="#team">our team</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.container-fluid -->
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-xs-12 pr pl">
                        <div class="social-links">
                            <ul>
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
        <div class="container">
            <div class="row">
                <div class="col-md-8 ceo-msg">
                    <div class="text-center pr pull-left">
                        <div class="media-left media-middle"> <a href="/"><img src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo" class="media-object img-circle"></a> </div>
                    </div>
                    <div class="content pull-left">
                        <div class="list-group">
                            <a class="list-group-item" href="javascript:void(0);">
                                <h2 class="list-group-item-heading"> CEO's Message</h2>
                                <div class="mCustomScrollbar">
                                     <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="project-sect" id="work">
            <div class="container">
                <div class="row">
                    <div class="property-portion">
                        <h2>Our Projects</h2>
                        <p>we sincerely look forward to working with you </p>
                    </div>
                </div>
            </div>
            <section class="page-section luxury-farms">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @foreach($properties as $property)
                                        <div class="item">
                                            <div class="col-md-4 col-sm-6 col-xs-6 f-house-detail">
                                                <h2>
                                                    @if(strlen($property->title) <= 25)
                                                        {{$property->title}}
                                                    @else
                                                        <?php echo substr(strip_tags($property->title),0,25).'...';?>
                                                    @endif
                                                </h2>
                                                <h4>
                                                    <?php 
                                                        $city = App\Property::getCityName($property->city_id);
                                                        $town = App\Property::getTownName($property->town_id);
                                                        $city_town = $city . ', ' . $town;
                                                    ?> 
                                                    @if(strlen($city_town) <= 25)
                                                        {{$city_town}}
                                                    @else
                                                        <?php echo substr(strip_tags($city_town),0,25).'...';?>
                                                    @endif
                                                </h4>
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}" class="view-property">View</a>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-3">
                                                <figure>
                                                    @if($property->gallery != "")
                                                    <?php
                                                        $images =explode(';',$property->gallery);
                                                        
                                                    ?>
                                                    <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                                    @endif
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
            </section>
        </section>
        <section class="our-team" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr team-section">
                        <div class="text-center">
                            <div class="property-portion">
                                <h2>Our Team</h2>
                                <p>We sincerely look forward to working with you</p>
                            </div>
                            @foreach ($staffs as $staff)
                            <div class="col-md-3 col-sm-4 col-xs-12 text-center team-img"> <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                <div class="person-details">
                                    <h3>{{$staff->name}}</h3>
                                    <p>{{$staff->designation}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="logo text-center"><a href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a></div>
                        <div class="mCustomScrollbar">
                            <?php
                                $doc = new DOMDocument();
                                $doc->loadHTML($agencyWebsite->about_us);
                                $content = $doc->saveHTML();
                                echo $content;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
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
                                    <textarea class="form-control textarea-height" type="textarea" name="message" id="message" placeholder="Message" rows="7" style="min-height:150px"></textarea>
                                </div>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer">
        <div class="container-fluid footer-top" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($offices as $office)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 office-addresses text-center">
                            @foreach($cities as $city)
								@if($city->id == $office->city_id)
								<h2>{{$city->name}} Office</h2>
								@endif
							@endforeach
                            <p class="text-center"> {{$office->telephone}},{{$office->uan_number}}<br />{{$office->email}}<br />{{$office->address}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <section class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <p>&copy;2017 ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="/unzips/Silver%20Estate%20Pro%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Silver%20Estate%20Pro%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/Silver%20Estate%20Pro%20Theme/js/owl.carousel.js"></script>
    <script src="/unzips/Silver%20Estate%20Pro%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.carousel-inner div.item:first-child').addClass('active');
        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            navText: ['', ''],
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