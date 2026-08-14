<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$agencyWebsite->agency_name}} - RightDeed</title>
    <link href="/unzips/rose-pink-theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="/unzips/rose-pink-theme/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/unzips/rose-pink-theme/css/owl.carousel.min.css">
    <link href="/unzips/rose-pink-theme/css/theme.css" rel="stylesheet">
    <link href="/unzips/rose-pink-theme/css/custom.css" rel="stylesheet">
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
        @if(!empty($agencyWebsite->Images[$active_index]))
            @if($agencyWebsite->Images[$active_index]->active==1) 
                background-image: url("/images/banners/original_{{$agencyWebsite->Images[$active_index]->image}}");
            @endif
        @else
            background-image: url(../unzips/rose-pink-theme/images/banner.jpg);
        @endif
        background-color: rgba(106, 94, 102);
        background-repeat: no-repeat;
        background-size: cover;
        height: 750px;
        position: relative;
    }
    .edit-link {
        background-color: #000;
        display: inline-block;
        padding: 13px 25px;
        color: #fff;
        border-radius: 100px;
        border: none;
        margin-right: 5px;
        margin-top: 15px;
    }
    .edit-link:hover{
        background: #DE4F5D;
        color: #fff;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <header class="header" id="home">
        <div class="hdr-shade"></div>
        <div class="container-fluid menu-bar menutop-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pr">
                        <div class="top-bar">
                            @if(!empty($offices[0]->email))
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-mobile"></i></span>
                                        <p> {{$agencyWebsite->contact_number}}</p>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if(!empty($offices[0]->email))
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-home"></i></span>
                                        <p> {{$agencyWebsite->address}}</p>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-6 col-sm-6 col-xs-12 social-media pull-right">
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
                                            <li><a href="#team">Our Team</a></li>
                                            <li><a href="#about_us">About Us</a></li>
                                            <li><a href="#contact_us">Contact</a></li>
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
                    @foreach($agencyWebsite->Images as $image) @if($image->active == 1)
                    <h1>{{$image->title}}</h1>
                    <p>{{$image->caption}}</p>
                    @endif @endforeach
                    <!-- <a href="">Read More</a> -->
                </div>
            </div>
        </div>
    </header>
    <div class="main">
        <section class="ceo-msg-sect" id="ceo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ceo-msg">
                        <div class="col-lg-5 col-md-5 col-sm-12 pl pr ceo-img">
                            <figure><img class="img-responsive" src="/images/ceo/{{$agencyWebsite->ceo_image}}" alt="ceo-image"></figure>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 pl pr ceo-text">
                            <h2>CEO's Message</h2>
                            <p>{{$agencyWebsite->ceo_message}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="property-sect" id="work">
            <div class="container">
                <div class="row">
                    <div class="property-portion text-center">
                        <h2>Our Works</h2>
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
                                        <span class="facebook-icon">view</span>
                                        <div class="shades"></div>
                                        </a>
                                    </div>
                                </figure>
                                <h3>
                                    @if(strlen($property->title) <= 20)
                                          {{$property->title}}
                                    @else
                                      {{ str_limit($property->title, 20, '...') }}
                                    @endif
                                </h3>
                                <p>
                                    @if($property->purpose !== 4)
                                        Rs. {{number_format((double)$property->price)}}
                                    @else
                                        <a href="{{$property->url}}/{{$property->id}}">View Schemes</a>
                                    @endif
                                </p>
                                <hr>
                                <ul>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i>{{$property->bed}} Bed(s)</li>
                                    <li><i class="fa fa-area-chart" aria-hidden="true"></i><?php echo (!empty($property->area))? $property->area . " " . $property->area_type : "Not Available"; ?></li>
                                    <li><i class="fa fa-bath" aria-hidden="true"></i>{{$property->bath}} Bathroom(s)</li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        @else
                            <p class="text-center" style="font-size: 20px; color: #333">No property or project available yet!</p>
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
                        </div>
                        @foreach($staffs as $staff)
                        <div class="{{$staffItemClass}} padding-adjust">
                            <div class="team-section">
                                <figure>
                                    <div class="abc">
                                        <a href="{{$staff->fb_link}}" target="_blank">
                                            <img class="img-responsive" src="/images/staff/thumb_{{$staff->image}}" alt="{{$staff->name}}">
                                            <span class="facebook-icon"><i class="fa fa-facebook"></i></span>
                                            <div class="shades"></div>
                                        </a>
                                    </div>
                                    <figcaption>
                                        <h2>{{$staff->name}}</h2>
                                        <p>{{$staff->designation}}</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="tab-section" id="about_us">
            <div class="container" id="contact_us">
                <div class="row">
                    <div class="col-md-12">
                        <div id="tabs-data" class="container">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#about" data-toggle="tab">About Us</a></li>
                                <li><a href="#contact" data-toggle="tab">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact" id="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="tabs-content" class="container">
                            <div class="tab-content clearfix">
                                <div class="tab-pane fade in active" id="about">
                                    <h3>About Us</h3>
                                    <p>
                                        {!! $agencyWebsite->about_us !!}
                                    </p>
                                </div>
                                <div class="tab-pane" id="contact">
                                    <h3>Contact Us</h3>
                                    <div class="contact-form">
                                        <form action="/sendmessage/{{$agencyWebsite->email}}" method="post">
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
                                                <textarea class="form-control textarea-height" type="textarea" id="message" name="message" placeholder="Message" rows="7"></textarea>
                                            </div>
                                            <button id="submit" class="btn btn-primary btn-contact">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-top" id="office">
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
                        @foreach($offices as $office)
                        <div class="{{$officeItemClass}} office-addresses">
                            <h2 style="text-transform: capitalize;">{{App\Property::getCityName($office->city_id)}} Office</h2>
                            <ul>
                                <li>{{$office->telephone}} {{$office->uan_number}}</li>
                                <li>{{$office->email}}</li>
                                <li>{{$office->address}}</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer-btm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="/images/logo/{{$agencyWebsite->logo}}" alt="">
                    <p>
                        @if(strlen($agencyWebsite->about_us) <= 600)
                            {{strip_tags($agencyWebsite->about_us)}}
                        @else
                        <?php echo substr(strip_tags($agencyWebsite->about_us),0,600).'...';?>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="/unzips/rose-pink-theme/js/jquery-3.2.1.min.js"></script>
    <script src="/unzips/rose-pink-theme/js/bootstrap.min.js"></script>
    <script src="/unzips/rose-pink-theme/js/owl.carousel.js"></script>
    <script>
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
                $itemClass = 3;
                break;
        }
    ?>
    $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: [
                "<i class='fa fa-chevron-left'>",
                "<i class='fa fa-chevron-right'>"
            ],
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1024: {
                    items: {{$itemClass}},
                    dots: false,
                    nav: true,
                    loop: false
                }
            }
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