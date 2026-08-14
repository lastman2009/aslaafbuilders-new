@php
$title = "Page Not Found";
@endphp
@include("includes.title")
<!-- Main Starts -->
<main class="main-section detail-page">

	<div id="fullscreens">
		<div id="regContainer" class="container signin-page">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="error-404">
						<h3>Page Not Found</h3>
						<h1>404</h1>
						<h4>The page you are looking for could have been deleted or never have existed</h4>
					</div>

	@if(Auth::check())

          <div class="col-md-12 error-btn">
            <a href="/dashboard"><button type="button" class="btn btn-default btn-left-error">Go to Dashboard</button> </a> 
            <a href="/"><button type="button" class="btn btn-default">Go to Website</button></a>
          </div>
    @endif
				</div>
			</div>
		</div>
	</div>
</main>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>

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
{{-- <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/js/lightslider.min.js"></script>

<!-- Cusotm JQuery for Plugins -->
<script type="text/javascript" src="{{asset('assets/js/plugin.js')}}"></script>
<!-- tilezoom plugin -->
<script type="text/javascript" src="{{asset('js/jquery.mousewheel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tilezoom/jquery.tilezoom.js')}}"></script>

<!-- Social Icons plugin -->
<script src="{{asset('assets/js/jquery.simpleSocialShare.js')}}"></script>

<!-- Social Icons plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>

<!-- Cusotm JQuery -->
<!-- <script type="text/javascript" src="../../assets/js/main.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script> 
<!-- Lightbox -->
<script type="text/javascript" src="{{asset('assets/js/lightbox.js')}}"></script> 

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

{{-- commented by Atif Malik on 4-10-18 --}}
{{-- <script>
var province = [];
	province['punjab'] = ["Lahore", "Rawalpindi", "Sialkot"];
	province['sindh'] = ["Karachi", "Hyderabad", "Sakhar"];
	province['balochistan'] = ["Quetta", "Khuzdar", "Turbat"];
	
	document.querySelector("select[name='province']").addEventListener("change", function(){
		var element = province[this.value.toString().toLowerCase()];
		if (element)
		{
			//clone:
			var select = document.querySelector("select[name='city']").cloneNode();
			var node = document.createElement("option");
			node.value = 0;
//			node.setAttribute("disabled", true);
//			node.setAttribute("selected", true);
			node.textContent = "---- Select City ----";
			select.appendChild(node);
			province[this.value.toString().toLowerCase()].forEach(function(element){
				var node = document.createElement("option");
				node.value = element;
				node.textContent = element;	
				select.appendChild(node);				
			});
			
			document.querySelector("select[name='city']").parentElement.replaceChild(select, document.querySelector("select[name='city']"));
		}
	}, false);                                                                                                                                                                                                                                                                                                                  
</script>  --}}
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
	//			  tabindexOffset: 100,
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

$("[data-toggle=popover]").each(function(i, obj) {
   $(this).popover({
     //trigger: 'focus',
     html: true,
     content: function() {
       var id = $(this).attr('id')
       return $('#popover-content-' + id).html();
     }
   });
 });
 </script>
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
<script>
	/* Scroll to down to MAIN SECTION */
	$("#button").click(function () {
		$('html, body').animate({
			scrollTop: $(".main-section").offset().top
		}, 1500);
	});


	/* Back to Top */
	$(window).scroll(function () {
		if ($(this).scrollTop() > 500) {
			$('.backToTop').fadeIn();
		} else {
			$('.backToTop').fadeOut();
		}
	});


	$('a.topTobottom').on('click', function(event) {

	    var target = $(this.getAttribute('href'));

	    if( target.length ) {
	        event.preventDefault();
	        $('html, body').stop().animate({
	            scrollTop: target.offset().top
	        }, 1000);
	    }

	});
</script>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107297391-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());
  gtag('config', 'UA-107297391-1');
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '876600309181286');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=876600309181286&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Sign Up -->


<div id="fsModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!-- header -->
      <div class="">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <div id="fullscreen_bg" class="fullscreen_bg"/>
        <div id="regContainer" class="container">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-12 features pleft pright">
                      <figure class="pull-left home-icon"><img src="/assets/images/signup.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> Up</span></h2>
                        <p class="pt-5">Login to RightDeed Property Portal</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-create signuppage">
                    <form method="POST" action="/register" role="form">
                     {{ csrf_field() }}
                        <div class="form-group name-field">
                            
                                <input id="first_name" type="text" class="form-control" name="first_name" value="" required placeholder="Name" required>

                              
                                    <span class="help-block">
                                        {{-- <strong>{{ $errors->first('first_name') }}</strong> --}}
                                    </span>
                            
                            
                        </div>
                      <div class="form-group email-field">
                           
                           
                                <input id="username" type="text" class="form-control" name="username" placeholder="Email / Phone" required>

                            
                      </div>
                       <div class="form-group password">
                            
                                  <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>

                               
                                    <span class="help-block">
                                        {{-- <strong>{{ $errors->first('password') }}</strong>  --}}
                                    </span>
                           
                            
                        </div>
                       <div class="form-group password">
                            
                                  <input type="password" class="form-control" id="pwd1" placeholder="Confirm Password" required>
                        </div> 

                      <div class="btn-wraper">
                        <input type="checkbox" id="signUp1" />
                        <label for="signUp1"> &nbsp; I agree with terms &amp; Conditions</label>
                        <!--<a href="/password/reset" class="test3 pull-right">Forget Password?</a>-->
                        <p class="need-signin">Signup as  Agent <a href="/signup-agent">Sign up</a></p>

                        <p class="need-signin">Already have an account? <a href="/loginForm">Sign in</a></p>
                        <button type="submit" id="submit-button" class="btn btn-default">CREATE A FREE ACCOUNT</button>
                      </div>
                    </form>
                  </div>
                  <div class="row">  
                    <div class="col-md-12 padding-right social-signup"> 
                      <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>
                      <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Sign In -->
<div id="fsModal2" class="modal fade" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!-- header -->
      <div class="">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <div id="fullscreen_bg" class="fullscreen_bg"/>
        <div id="regContainer" class="container">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                  <!-- ////// Testing  -->
                  <div class="form-group ">                 
                    </div>
    <!-- end testing .... -->
                    <div class="col-md-12 features pleft pright">
                      <figure class="pull-left home-icon"><img src="/assets/images/signin.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> In</span></h2>
                        <p class="mt-10">You must log in to access full features of this site.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-create">
                    <form role="form" method="POST" action="/login">
                      {{ csrf_field() }}
                      <div class="form-group email-login">
                            <div>
                                <input type="text" class="form-control" name="username"  required placeholder="Email / Phone">
                             
                            </div>
                        </div>
                        <div class="form-group password">
                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                              
                            </div>
                        </div>
                        <div class="btn-wraper">
                       <input type="checkbox" name="remember" id="signIn2">
                        <label for="signIn2">&nbsp;Remember Me</label>
                        <a href="/password/reset" class="test3 pull-right">Forget Password?</a>
                        <p class="need-signup">Need an account? <a href="/signup">Sign up</a></p>
                        <button type="submit" class="btn btn-default">Log in</button>
                      </div>
                    </form>
                  </div>
                <div class="row">  
                  <div class="col-md-12 padding-right social-signup"> 
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

</body>
</html>
