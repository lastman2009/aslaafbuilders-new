<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}}</title>
    <link href="/unzips/Dark%20Site%20Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/Dark%20Site%20Theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/Dark%20Site%20Theme/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/unzips/Dark%20Site%20Theme/css/jquery.mCustomScrollbar.css">
    <link href="/unzips/Dark%20Site%20Theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/Dark%20Site%20Theme/css/custom.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="home">
        <div class="hdr-shade"></div>
        <div class="container-fluid menu-bar sticky">
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
                                        <a class="navbar-brand" href=""><img src="/images/logo/{{$agencyWebsite->logo}}" alt="{{$agencyWebsite->agency_name}}-logo" ></a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#about">About Us</a></li>
                                            <li><a href="#work">Our Work</a></li>
                                            <li><a href="#ceo">CEO Message</a></li>
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#office">Offices</a></li>
                                            <li><a href="#contact">Contact Us</a></li>
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
        <div class="container-fluid banner-text">
            <div class="col-lg-12 pr pl">
                <h1>We have a lot of dream lands</h1>
                <p>Of Your best choice.</p>
                <img src="unzips/Dark%20Site%20Theme/images/crown.png" alt=""></div>
        </div>
    </header>
    <div class="main">
        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="col-lg-12 col-md-12 col-sm-12 pl">
                            <div class="about-section text-center">
                                <h2>About Us</h2>
                                <img src="unzips/Dark%20Site%20Theme/images/crown1.png" alt="">
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
        </section>
        <section class="property-sect" id="work">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="work-title text-center">
                            <h2>Our Work</h2>
                            <img src="unzips/Dark%20Site%20Theme/images/crown1.png" alt=""></div>
                        <div class="col-lg-12 property-portion pr mCustomScrollbar">
                            @foreach($properties as $property)
                            <div class="col-md-3 col-sm-3 workportion pl">
                                <figure class="internal-sec">
                                    @if($property->gallery != "")
                                    <?php
                                        $images =explode(';',$property->gallery);
                                        
                                    ?>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
                                        </div>
                                    </div>
                                    @endif
                                    <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">
                                        <div class="overlay">
                                            <div class="text">
                                                <p>
                                                    @if(strlen($property->title) <= 35)
                                                          {{$property->title}}
                                                    @else
                                                      <?php echo substr(strip_tags($property->title),0,35).'...';?>
                                                    @endif
                                                </p>
                                                <p>
                                                    {{App\Property::getTownName($property->town_id)}}, {{App\Property::getCityName($property->city_id)}}
                                                </p>
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
                                        </div>
                                    </a>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(!empty($agencyWebsite->ceo_message) && !empty($agencyWebsite->ceo_image))
        <section class="ceo" id="ceo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="col-lg-12 col-md-12 col-sm-12 pl">
                            <div class="ceo-section text-center">
                                <h2>CEO&rsquo;s Message</h2>
                                <img src="unzips/Dark%20Site%20Theme/images/crown1.png" alt="">
                                <div class="mCustomScrollbar">
                                    <p>{{strip_tags($agencyWebsite->ceo_message, '<br>')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <section class="team-sect" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team-title text-center">
                            <h2>Our Property Agents</h2>
                            <img src="unzips/Dark%20Site%20Theme/images/crown1.png" alt="">
                        </div>
                        <div class="owl-carousel">
                            @foreach ($staffs as $staff)
                            <div class="item">
                                <figure>
                                    <div class="img-container">
                                        <div class="img-block">
                                            <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                        </div>
                                    </div>
                                    <figcaption>
                                        <div class="team-heading">
                                            <h2>{{$staff->name}}</h2>
                                        </div>
                                        <div class="team-detail">
                                            <p><span>{{$staff->designation}}</span></p>
                                            <p>{{$staff->year_of_service}} Years of service</p>
                                            <a href="{{$staff->fb_link}}"><i class="fa fa-facebook"></i></a>
                                            <a href="{{$staff->google_plus}}"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="office" id="office">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr">
                        <div class="col-lg-12 col-md-12 col-sm-12 pl">
                            <div class="office-section text-center">
                                <h2>Our Offices</h2>
                                <img src="unzips/Dark%20Site%20Theme/images/crown1.png" alt="">
                            </div>
                            <?php /* ?><div class="col-md-4 <?php if($officeNum == 1){echo "col-md-offset-4 text-center ";}elseif($officeNum == 2){if($offices[0] == $office){echo "col-md-offset-3 text-center";}else{echo "text-center";}}?> office-portion"><?php */ ?>
                            <?php $officeNum = count($offices) ?>
                            <?php $i=1; ?>
                            @foreach($offices as $office)
                            <div class="col-md-4 <?php if($officeNum == 1){echo "col-md-offset-4 text-center ";}elseif($officeNum == 2){echo "col-md-offset-2";}?> office-portion">
                                <h3>Office {{$i}}</h3>
                                <p>{{$office->address}}</p>
                                <p>{{$office->email}}</p>
                                <p>{{$office->telephone}}</p>
                            </div>
                            <?php $i++ ?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact" id="contact">
            <div class="container">
                <div class="contact-form">
                    <form role="form" action="/sendmessage/{{$agencyWebsite->email}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 margin-topbottom pr">
                                <div class="col-md-6 pl">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3 pl">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-3 pl pr">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12 pr pl">
                                    <div class="form-group">
                                        <textarea class="form-control textarea-height" type="textarea" name="message" id="message" placeholder="Message" rows="7"></textarea>
                                    </div>
                                </div>
                                <button type="button" id="submit" name="submit" class="btn btn-primary btn-contact">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <footer id="office" class="footer">
        <div class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="copyright">ALL REWARDS ARE CLEAR TECHNOLOGICALINC.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 backtotop"> <a href="javascript:" id="return-to-top" style="">Back to top<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/unzips/Dark%20Site%20Theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/Dark%20Site%20Theme/js/bootstrap.min.js"></script>
    <script src="/unzips/Dark%20Site%20Theme/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/unzips/Dark%20Site%20Theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
                    items: 2,
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


        $(".banner-button a").click(function() {
            $('html,body').animate({
                    scrollTop: $("#team").offset().top
                },
                'slow');
        });


        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });




        $(window).scroll(function() {
            var sticky = $('.sticky'),
                scroll = $(window).scrollTop();

            if (scroll >= 100) sticky.addClass('fixed');
            else sticky.removeClass('fixed');
        });

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