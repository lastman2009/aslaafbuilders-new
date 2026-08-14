<footer class="ab-footer">
    @include('partials.footer.content')
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
@includeIf('includes.signupModal')

<!-- Sign In -->
@includeIf('includes.signInModal')

</body>
</html>