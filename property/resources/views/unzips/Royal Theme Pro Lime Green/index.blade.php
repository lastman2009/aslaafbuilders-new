<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Royal%20Theme%20Pro/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Royal%20Theme%20Pro/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Royal%20Theme%20Pro/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Royal%20Theme%20Pro/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Royal%20Theme%20Pro%20Lime%20Green/css/theme.css" rel="stylesheet">
    <link href="/unzips/Royal%20Theme%20Pro%20Lime%20Green/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home">
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
                                        <a class="navbar-brand" href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#about">About Us</a></li>
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
    </header>
    <div class="main">
        <section class="ceo-msg-sect" id="ceo">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 text-center">
                            <div class="media-img">
                                <a href="/"> <img class="img-resposnive img-circle" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="{{$agencyWebsite->agency_name}}-ceo"></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-12 content pl">
                                <div class="list-group">
                                    <a class="list-group-item" href="#">
                                        <h2 class="list-group-item-heading"> CEO's Message</h2>
                                        <div class="list-group-item-text mCustomScrollbar">
                                            <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container">
                <div class="row">
                    <div class="property-portion text-center">
                        <h2>Our Projects</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-carousel">
                            @foreach($properties as $property)
                            <div class="item">
                                <figure>
                                    <div class="abc">
                                        <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                            @if($property->gallery != "")
                                            <?php
                                                $images =explode(';',$property->gallery);
                                                $count = count($images);
                                            ?>
                                            <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}"><div class="shades"> view </div>
                                            @endif
											</a>
                                    </div>
                                </figure>
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
                        <div class="about-section">
                            <h2>About us</h2>
                            <div class="mCustomScrollbar">
                                <?php
                                    $doc = new DOMDocument();
                                    $doc->loadHTML($agencyWebsite->about_us);
                                    echo $doc->saveHTML();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pr team-section">
                        <div class="team-img text-center">
                            <h2>Our Team</h2>
                            @foreach ($staffs as $staff)
                            <div class="col-md-3 col-sm-3 col-xs-12 text-center" style="margin-bottom: 50px">
                                <img src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                <h3>{{$staff->name}}</h3>
                                <p>{{$staff->designation}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid footer-top" id="office">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach ($offices as $office)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 office-addresses text-center">
                                    <a href="#"><img src="/unzips/Royal%20Theme%20Pro/images/img1.png"></a>
                                    <p class="text-center"> {{$office->city}}<br />{{$office->telephone}}<br >{{$office->email}}<br>{{$office->address}}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-12 f-logo text-center">
                                <a href="/"><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo"></a>
                            </div>
                            <div class="copt-right text-center">
                                <p> 
                                    @if(strlen($agencyWebsite->about_us) <= 400)
                                    {{strip_tags($property->title)}}
                                    @else
                                    <?php echo substr(strip_tags($agencyWebsite->about_us),0,400).'...';?>
                                    @endif
                                </p>
                            </div>
                            <div class="social-links">
                                <ul>
                                    @if(!empty($offices[0]->address))
                                    <li><a href="{{$offices[0]->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$offices[0]->google_link}}"><i class="fa fa-google-plus"></i></a></li>
                                    @endif
                                </ul>
                                <p>&copy;2017 ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="/unzips/Royal%20Theme%20Pro/js/jquery-3.2.1.min.js"></script>
            <script src="/unzips/Royal%20Theme%20Pro/js/bootstrap.min.js"></script>
            <script src="/unzips/Royal%20Theme%20Pro/js/owl.carousel.js"></script>
            <script type="text/javascript" src="/unzips/Royal%20Theme%20Pro/js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script>
            $(document).ready(function() {

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
        </section>
    </div>
</body>

</html>