<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - {{Config::get("name.name.app") }}</title>
    <!-- Favicon — the Aslaaf Builders badge from the header logo -->
    <link rel="icon" href="/image/favicon.ico" sizes="32x32">
    <link rel="icon" href="/image/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="icon" href="/image/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/image/apple-touch-icon.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fontawsome -->
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css"> -->
    <link href="{{asset('/assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- No UI Slider -->
    <!-- <link href="../../assets/css/nouislider.css" rel="stylesheet"> -->
    <link href="{{asset('assets/css/nouislider.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Bootstrap Plugin -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css"> -->

    <!-- jquery.mCustomScrollbar Plugin -->
    <!-- <link rel="stylesheet" href="../../assets/css/jquery.mCustomScrollbar.min.css" type="text/css" media="screen"/> -->
    <link href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet" type="text/css"/>
    

    <!--<link rel="stylesheet" type="text/css" href="../../assets/css/plugin.css">-->

    <!-- CSS for Animations -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css'>

    <!-- lightslider CSS -->
    <link rel='stylesheet prefetch' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    
    <!-- bootstrap-select CSS -->
    <link href="{{asset('assets_admin/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
     @yield('css')


<link href="{{asset('assets/chatter/assets/css/app.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/chatter/assets/css/simplemde.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/chatter/assets/vendor/spectrum/spectrum.css')}}" rel="stylesheet">
<link href="{{asset('assets/chatter/assets/css/chatter.css')}}" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/style.css"> -->

    <!-- Responsiveness -->
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css"> -->
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
    
    <!--commeet chat -->
    <!--<link type="text/css" href="//fast.cometondemand.net/11250xa0d44.css" rel="stylesheet" charset="utf-8">-->
    <link type="text/css" rel="stylesheet" media="all" href="//fast.cometondemand.net/11421x_x6b3af.css" />
    <style>
		#thumbwrap {
	position:relative;
	margin:75px auto;
	width:252px; height:252px;
}
.thumb img { 
	border:1px solid #000;
	margin:3px;
	float:left;
}
.thumb span { 
	position:absolute;
	visibility:hidden;
	left: 0
}
.thumb:hover, .thumb:hover span { 
	visibility:visible;
	top:0; 
	left:0; 
	z-index:1;
}
.top-bar .social-media li{
	padding-left: 0 !important;
	padding-right: 0 !important
}
.top-bar .social-media a {
    color: #fff;
    display: block;
    padding: 6px 0;
    position: relative;
    width: 30px;
}
	</style>
    @if(Auth::check())
    <script>
         var chat_name = "{{Auth::user()->first_name}}";
         var chat_id = "{{Auth::user()->id }}";
    </script>
    @endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115969528-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115969528-1');
</script>
</head>

<body id="page-top" data-spy="scroll" data-offset="50" data-spy="scroll" data-target=".navbar-fixed-top">
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119747840-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-119747840-1');
</script>
    <header class="header"> <a href="#bottom" id="top"> </a>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">

                        @if(Auth::check())
                        <div class="col-md-5" style="padding: 0"> <a href="/addproperty" class="color add_property"><i class="fa fa-plus"></i> add property </a> </div>
                        @else
                        <div class="col-md-5" style="padding: 0"> <a class="color add_property" data-toggle="modal" data-target="#fsModal2"><i class="fa fa-plus"></i> add property </a> </div>
                        @endif


                       <!-- <div class="col-md-7 col-sm-6 col-xs-6 phone-num"> <a href="#"><i class="fa fa-phone"></i> &nbsp; <span class="color"> Call Us At : </span> 1800-222-222 </a> </div> -->
                    </div>
                    @if(Auth::user() == "")
                    <div class="col-md-5 col-sm-7 col-xs-12 welcome-user col-md-offset-2">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="social-media col-md-12 col-xs-12 col-sm-12 text-center"  style="padding:0px">
         <!--                       <ul class="list-inline text-center">-->
         <!--                           <li><a href="https://www.facebook.com/Right-Deed-1547944875263557/" target="_blank"><i class="fa fa-facebook"></i></a>-->
									<!--</li>-->
									<!--<li><a href="https://twitter.com/right_deed" target="_blank"><i class="fa fa-twitter"></i></a>-->
									<!--</li>-->
									<!--<li><a href="https://www.linkedin.com/in/right-deed-80924a150/" target="_blank"><i class="fa fa-linkedin"></i></a>-->
									<!--</li>-->
									<!--<li><a href="https://www.pinterest.com/rightdeed/pins/"><i class="fa fa-pinterest" target="_blank"></i></a>-->
									<!--</li>-->
									<!--<li><li><a href="https://plus.google.com/u/0/b/106323851732551559745/116587637553760893275" target="_blank"><i class="fa fa-google-plus"></i></a>-->
									<!--</li>-->
         <!--                       </ul>-->
         	<ul class="list-inline text-center">
									<li><a  class="thumb" href="{{Config::get("name.social_media.facebook")}}" target="_blank"><i class="fa fa-facebook"></i><span><img src="/social/face.png"></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.twitter")}}" target="_blank"><i class="fa fa-twitter"></i>
									<span><img src="/social/twitter.png"></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.linkedin")}}" target="_blank"><i class="fa fa-linkedin"></i>
									<span><img src="/social/linkedin.png"></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.pinterest")}}" target="_blank"><i class="fa fa-pinterest"></i>
									<span><img src="/social/pinterest.png" alt=""></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.googleplus")}}" target="_blank"><i class="fa fa-google-plus"></i>
									<span><img src="/social/google-plus.png" alt=""></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.instagram")}}" target="_blank"><i class="fa fa-instagram"></i>
									<span><img src="/social/instagram.png" alt=""></span></a>
									</li>
								</ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="signup text-center"> <a data-toggle="modal" data-target="#fsModal2">sign in </a> &#124; <a data-toggle="modal" data-target="#fsModal"> Sign up</a>
                            </div>
                        </div>
                    </div>
                    @else

                        <!-- <div class="col-md-4 col-sm-5">
              <div class="social-media pull-left"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> </div>
              <div class="signup pull-right"> <a data-toggle="modal" data-target="#fsModal2">sign in </a> <a data-toggle="modal" data-target="#fsModal"> Sign up</a></div>
            </div> -->
                        <div class="col-md-7 col-sm-7 welcome-user">

                            <div class="col-md-4 col-sm-4 col-xs-12" style="padding: 0">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <h4 class="text-center user-name"><span>{{ Auth::user()->first_name }} <span class="caret"></span></span></h4>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                        <li>
                                            <a href="/profileView">
                                                Profile
                                            </a>
                                         </li>
                                        <li>
                                            <a href="/profile">
                                                Settings
                                            </a>
                                        </li>
										<li>
										<a href="/password">
												Password Reset
										</a>
									</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                <div class="social-media col-md-12 col-xs-12 col-sm-12 text-center" style="padding:0px">
                                    <ul class="list-inline text-center">
									<li><a  class="thumb" href="{{Config::get("name.social_media.facebook")}}" target="_blank"><i class="fa fa-facebook"></i><span><img src="/social/face.png"></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.twitter")}}" target="_blank"><i class="fa fa-twitter"></i>
									<span><img src="/social/twitter.png"></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.linkedin")}}" target="_blank"><i class="fa fa-linkedin"></i>
									<span><img src="/social/linkedin.png"></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.pinterest")}}" target="_blank"><i class="fa fa-pinterest"></i>
									<span><img src="/social/pinterest.png" alt=""></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.googleplus")}}" target="_blank"><i class="fa fa-google-plus"></i>
									<span><img src="/social/google-plus.png" alt=""></span></a>
									</li>
									<li><a class="thumb" href="{{Config::get("name.social_media.instagram")}}" target="_blank"><i class="fa fa-instagram"></i>
									<span><img src="/social/instagram.png" alt=""></span></a>
									</li>
								</ul>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <a href="/dashboard" class="color add_property">dashboard</a>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
        <!--top-bar-->
        <div class="hdr_top_nav" style="background:#fff;">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <a class="navbar-brand" href="#"><img src="{{asset('/assets/images/logo.png')}}"></a> </div>
    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class=""><a href="/">Home</a> </li>


                                <li class="dropdown">
                                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Buy <b class="caret"></b></a>
                                  <ul class="dropdown-menu header-dropdown">
                                    <li><a href="/buy/residential">Residential</a> </li>
                                    <li><a href="/buy/commercial">Commercial</a> </li>
                                    <li><a href="/buy/plots">Plots</a> </li>
                                    <li><a href="/property/Buy">Others</a> </li>

                                  </ul>
                                </li>


                                <li><a href="/property/Rent">Rent</a></li>
                                <li><a href="/property/Wanted">Wanted</a></li>
                                <li><a href="/property">Property</a></li>
                                <li><a href="/agencies">Agencies</a> </li>
                                <li><a href="/blog">blog</a> </li>
                                <li class=""><a href="/forums">Forum</a></li>
                                
                                <li class="dropdown">
                                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                                  <ul class="dropdown-menu header-dropdown">
                                    <li><a href="/index">Index</a> </li>
                                    <li><a href="/maps">Maps</a> </li>
                                    <li><a href="/vendors">Vendors</a> </li>
                                    <li><a href="/architects">Architects</a> </li>
                                    <li><a href="/property/Project">Project</a></li>
                                    
                                    <li><a href="/about-us">about us</a> </li>
                                    <li><a href="/contact-us">contact</a> </l>


                                  </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
<!-- banner-wraper starts -->
<div class="banner-wraper">

    <!-- slider ends -->


    <div class="forum-banner-cover">
        <div class="container">
            <div class="row">
                <div class="banner-contents banner-contact col-md-12">
                    <div class="col-md-12 features">
                        <div class="feature-heading">
                            <h2>&nbsp;</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="main-section">
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 propertyForum">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</main>
    <!-- Scripts -->
   <footer>
  <div class="container-fluid page-footer1">
    <div class="container">
      <div class="row">
          <div class="col-md-4 ftr-contact-us">
            <h2>Contact Us</h2>
              <ul class="list-unstyled">
                  <li><span><i class="fa fa-clock-o clock" aria-hidden="true"></i></span><span class="timing">11AM to 07PM </span></li>
                  <li><span><i class="fa fa-map-marker marker" aria-hidden="true"></i></span><span class="street">191 Street 11, Sector Y DHA Phase 3, Lahore,Punjab, Pakistan</span></li>
                  <li><span><i class="fa fa-mobile mobile" aria-hidden="true"></i></span><span class="number">+92 305 6666227</span></li>
                  <li><span><i class="fa fa-envelope envelope" aria-hidden="true"></i></span><span class="support">support@rightdeed.com </span></li>
              </ul>
          </div>
          <div class="col-md-4 text-center ftr-aboutus">
                <h2>About Us</h2>
              <p>We strive to provide a high level of professional service whether you are a possible buyer or a vendor. Whether you’re interested in buying a home or selling one, our team of property professionals will handle your needs and wants in the most proficient way possible.<br>
                  In short we are introducing real estate sector in a way that will help sellers, buyers and real estate experts to make the best real estate choices and produce exceptional results.</p>
          </div>

        <div class="col-md-4 text-center">
            <form action="/subscribeme" id="submit_form">

                <div class=" subscribe-wraper">
                    <div class="input-group">
                        <input type="text" class="form-control" id="sub_email" name="email"
                               placeholder="Enter your email">
                        <span class="input-group-btn">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <button class="btn btn-theme subscribe_email">Subscribe</button>
              </span>
                    </div>
                </div>
            </form>
            <ul class="ftr-social-link">
                <li><a class="ftr-fb" href="{{Config::get("name.social_media.facebook")}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a class="ftr-twtr" href="{{Config::get("name.social_media.twitter")}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="ftr-lnkd" href="{{Config::get("name.social_media.linkedin")}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="ftr-pntrst" href="{{Config::get("name.social_media.pinterest")}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <li><a class="ftr-gplus" href="{{Config::get("name.social_media.googleplus")}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="ftr-utube" href="{{Config::get("name.social_media.youtube")}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <li><a class="ftr-intgram" href="{{Config::get("name.social_media.instagram")}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <ul class="list-inline">
                <li><a href="https://play.google.com/store/apps/details?id=waleedasim.rightdeed" target="_blank"><img width="135" src="/assets/images/android.png" /></a> </li>
                <li><a href="javascript:void(0)" onclick="alert('COMING SOON')" ><img width="135" src="/assets/images/ios.png" /></a> </li>
            </ul>
        </div>

          {{-- <div class="row"> --}}
              <div class="col-md-12 text-center ftr-btm">
                  <ul class="ftr-link">
                      <li><a href="/about-us">About Us</a><span>/</span></li>
                      <li><a href="/career-center">Career Center</a><span>/</span></li>
                      <li><a href="/contact-us">Contact Us</a><span>/</span></li>
                      <li><a href="/privacy-policy">Privacy Policy</a><span>/</span></li>
                      <li><a href="/site-map">Site Map</a></li>
                  </ul>
                  <img class="img-responsive" src="/assets/images/ftr-img.png" alt="">
                  <p class="text-center">All Right Reserved 2017</p>
              </div>

          {{-- </div> --}}
      </div>
    </div>
  </div>


</footer>
<a class="topTobottom" href="#top" id="bottom"><span class="backToTop"></span></a> 

<!-- JQuery libraries --> 
<!-- <script type="text/javascript" src="../../../../assets/js/jquery-3.2.1.min.js"></script> -->
<!-- <script type="text/javascript" src="../../../../assets/js/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap -->
<!-- <script type="text/javascript" src="../../../../assets/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- No UI Slider -->
<!-- <script type="text/javascript" src="../../../../assets/js/nouislider.js"></script>  -->
<!-- <script type="text/javascript" src="../../../../assets/js/wNumb.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/nouislider.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/wNumb.js')}}"></script>

<!-- mCustom Scrollbar -->
<!-- <script type="text/javascript" src="../../../../assets/js/jquery.mCustomScrollbar.concat.min.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Totster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- FlexSlider -->
<!-- <script type="text/javascript" src="../../../../assets/js/jquery.flexslider.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/jquery.flexslider.js')}}"></script>

<!-- <script src="../../../../assets/js/plugin.js"></script> -->
<!-- Bootstrap Select JavaScript -->
<script type="text/javascript" src="{{asset('assets_admin/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

<!-- lightSlider -->
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>

<!-- Cusotm JQuery for Plugins -->
<script type="text/javascript" src="{{asset('assets/js/plugin.js')}}"></script>
<!-- tilezoom plugin -->
<script type="text/javascript" src="{{asset('js/jquery.mousewheel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tilezoom/jquery.tilezoom.js')}}"></script>
<!-- Cusotm JQuery -->
<!-- <script type="text/javascript" src="../../assets/js/main.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script> 
<!-- cometChat -->
@if(Auth::check())
<!--<script type="text/javascript" src="//fast.cometondemand.net/11250xa0d44.js" charset="utf-8"></script>-->
<script type="text/javascript" charset="utf-8" src="//fast.cometondemand.net/11421x_x6b3af.js"></script>
@endif
<script>
  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
<script>
  $(document).ready(function(){

    $('#submit-button').click(function(){
        var pass = $('#pwd').val();
        var pass2 = $('#pwd1').val();
        if(pass != pass2){
              toastr.warning("password not match");
              $('#submit-button').attr("disabled",true);  
      
        var pass2 = $('#pwd1').val("");
        }
        else
           toastr.success("password match"); 
         $('#submit-button').attr("disabled",false);

    });
});
</script>
<script>
$(function(){
    $('#sel10').tagger({
      availableTags: peopleData,
      baseURL: 'assets/images/', 
      displayHierarchy: false,
      placeholder: 'Add Multiple Locations',
      indentMultiplier: 2,
      fieldWidth: null, 
      freeTextInput: true, 
      freeTextMessage: ' (add tag)',
      freeTextPrefix: 'ft/',
      caseSensitive: false,
    //            tabindexOffset: 100,
      noSuggestText: 'Nothing Matched'
    });
});
</script>
<script type="text/javascript">
// Limit number of characters in specific elements
$("h3,h5,p").each(function() {
  var textMaxChar = $(this).attr('data-max-characters');
  var text = $(this).text();

  length = text.split(' ').length;
  if(length > textMaxChar) {
    var lastWord = text.split(' ')[textMaxChar];
    var lastWordIndex = text.indexOf(lastWord);
    $(this).text(text.substr(0, lastWordIndex) + '...');
  }
});
</script>
<!--  
/****************************************************/
                /* jquery Flex slider */
/****************************************************/-->
<script>
   $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 150,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
    </script>
    <script>
        $('.selectpicker').selectpicker({
            iconBase: 'fa',
          tickIcon: 'fa-check'
        });
    </script>

  <script>

$('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop:true,
    slideMargin: 0,
    thumbItem: 5
});

</script> 


    <script>
          //$('.nav li.active').removeClass('active');
          var url = window.location;
          $('.nav li a[href="' + url + '"]').parent().addClass('active');
          $('.nav li a').filter(function () {
              return this.href == url;
          }).parent().addClass('active').parent().parent().addClass('active');
    </script>
    <script>
        $('.propertyForum .col-md-3.left-column > div > ul.nav > li a div').css("display", "none");
    </script>
    <script>
        $('.propertyForum ul.discussions li a > div').addClass('myHeight1');
        $('.propertyForum ul.discussions li a > div:last-child').removeClass('myHeight1');
        $('.propertyForum ul.discussions li a > div:nth-child(1)').addClass('col-md-2 col-xs-12');
        $('.propertyForum ul.discussions li a > div:nth-child(2)').addClass('col-md-9 col-xs-12');
        $('.propertyForum ul.discussions li a > div:nth-child(3)').addClass('col-md-1 col-xs-12');
        $('.propertyForum > div.discussion > div.container.margin-top .conversation ul li span > div:nth-child(1)').addClass('col-md-2 col-xs-12');
        $('.propertyForum > div.discussion > div.container.margin-top .conversation ul li span > div:nth-child(2)').addClass('col-md-10 col-xs-12').removeClass('chatter_middle');
        $('.propertyForum > div.discussion #new_response > div:nth-child(1)').addClass('col-md-2 col-xs-12');
        $('.propertyForum > div.discussion #new_response > div:nth-child(2)').addClass('col-md-10 col-xs-12');
        $('.propertyForum > div.discussion #new_response > div:nth-child(3)').addClass('col-md-12 col-xs-12');
        $('.propertyForum > div.discussion .row .col-md-12 > div').addClass('col-md-12 col-xs-12');
        $('.propertyForum ul.discussions li a.discussion_list, .propertyForum ul.discussions li > .chatter_posts').addClass('forum_posts');
        $('.propertyForum > div.discussion > div.container.margin-top .conversation ul li span > div.chatter_warning_delete').removeClass('col-md-2').addClass('col-md-12 forum_warning_delete');
        $('.propertyForum > div.discussion > div.container.margin-top .conversation ul li span > div.chatter_post_actions').removeClass('col-md-10 col-xs-12').addClass('forum_post_actions');
        $('.propertyForum > div.discussion > div.container.margin-top .conversation ul li span > div.chatter_avatar').addClass('col-md-2 col-xs-12 forum_avatar');
        $('.propertyForum > div.discussion > div.container.margin-top .conversation ul li span > div.chatter_middle').addClass('col-md-10 col-xs-12 forum_middle');
    </script>

<!----- Chatter JS ------>


    <script>
        /* Equal Heights for Elements */
        var maxHeight = function(elems){
            return Math.max.apply(null, elems.map(function ()
            {
                return $(this).height();
            }).get());
        }

        //$(".myHeight").height(maxHeight($(".myHeight")));
        for (var i = 1; i < 10; i++) {
            (function(i) {
                $(".myHeight"+i).height(maxHeight($(".myHeight"+i)));
            })(i);
        }
    </script>

<script src="{{asset('assets/chatter/assets/vendor/tinymce/tinymce.min.js')}}"></script>
	<script src="{{asset('assets/chatter/assets/js/tinymce.js')}}"></script>
	<script>
		var my_tinymce = tinyMCE;
		$('document').ready(function(){
			$('#tinymce_placeholder').click(function(){
				my_tinymce.activeEditor.focus();
			});
		});
	</script>


   

<script src="{{asset('assets/chatter/assets/vendor/spectrum/spectrum.js')}}"></script>
<script src="{{asset('assets/chatter/assets/js/chatter.js')}}"></script>
<script>
	$('document').ready(function(){

		$('.chatter-close').click(function(){
			$('#new_discussion').slideUp();
		});
		$('#new_discussion_btn, #cancel_discussion').click(function(){
							$('#new_discussion').slideDown();
				$('#title').focus();
					});

		$("#color").spectrum({
		    color: "#333639",
		    preferredFormat: "hex",
		    containerClassName: 'chatter-color-picker',
		    cancelText: '',
    		chooseText: 'close',
		    move: function(color) {
				$("#color").val(color.toHexString());
			}
		});

		

	});
</script>


    @yield('js')

<!-- Sign Up -->
@includeIf('includes.signupModal')

<!-- Sign In -->
@includeIf('includes.signInModal')

</body>
</html>

    
</body>
</html>
