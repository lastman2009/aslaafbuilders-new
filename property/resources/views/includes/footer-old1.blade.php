<div class="homemap-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217758.2886152636!2d74.18612126751579!3d31.483672979831642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc23abe6ccc7e2462!2sLahore%2C+Pakistan!5e0!3m2!1sen!2s!4v1506594453801" width="100%" height="470" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<footer>
  <div class="container-fluid page-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 padding-right">
          <div class="col-md-6 col-sm-6 ftr-section padding-left">
            <h2>It's easy to find us</h2>
            <p>Rightdeed.com is one of the leading property portals in Pakistan. We connect buyers with sellers, renters with owners and we are darn good at this. We are rapidly turning into a focal point of online buying, selling, and renting of real estate in Pakistan.</p>
            <ul>
              <li>
                <span class="icon-ftr icon-ftr-home"><i class="fa fa-home"></i></span>
                  <span class="ftr-sec1">Address</span>
                  <span class="ftr-sec2">Pearl One 94-FF, Gazi Road DHA Phase 4, Lahore</span>
              </li>
              <li>
                <span class="icon-ftr icon-ftr-mobile"><i class="fa fa-mobile"></i></span>
                  <span class="ftr-sec1">Phone</span>
                  <span class="ftr-sec2">(+92) 321 8433312</span>
              </li>
              <li>
                <span class="icon-ftr"><i class="fa fa-envelope"></i></span>
                  <span class="ftr-sec1">Email</span>
                  <span class="ftr-sec2">support@rightdeed.com</span>
              </li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-6 ftr-section padding-left">
            <h2>Contact Us</h2>
            <form method="post" action="/contactus">
                {{ csrf_field()}}
                <div class="form-group col-lg-6 col-md-6 col-sm-6 padding-left">
                    <input class="form-control" name="username" placeholder="User Name" type="text" required />
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 padding-left">
                    <input class="form-control" name="email" placeholder="Email" type="email" required />
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 padding-left">
                    <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 padding-left">
                    <textarea class="form-control" placeholder="Message" rows="10" name="message" required></textarea>
                </div>
                <button class="btn btn-primary btn-homecontact">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid page-footer1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <img class="img-responsive" src="assets/images/ftr-img.png" alt="">

            <ul class="ftr-social-link">
              <li><a href="https://www.facebook.com/Right-Deed-1547944875263557/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/right_deed" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/in/right-deed-80924a150/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://www.pinterest.com/rightdeed/pins/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="https://plus.google.com/u/0/b/106323851732551559745/116587637553760893275" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://youtu.be/7bNIkrtZwTw" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul>

            <ul class="ftr-link">
              <li><a href="/about-us">About Us</a><span>/</span></li>
              <li><a href="/career-center">Career Center</a><span>/</span></li>
              <li><a href="/contact-us">Contact Us</a><span>/</span></li>
              <li><a href="/private-policy">Privacy Policy</a><span>/</span></li>
              <li><a href="javascript:void(0);">Site Map</a></li>
            </ul>

        </div>
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
<script src='http://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>

<!-- Cusotm JQuery for Plugins -->
<script type="text/javascript" src="{{asset('assets/js/plugin.js')}}"></script>
<!-- tilezoom plugin -->
<script type="text/javascript" src="{{asset('js/jquery.mousewheel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tilezoom/jquery.tilezoom.js')}}"></script>

<!-- Social Icons plugin -->
<script src="{{asset('assets/js/jquery.simpleSocialShare.js')}}"></script>

<!-- Social Icons plugin -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>

<!-- Cusotm JQuery -->
<!-- <script type="text/javascript" src="../../assets/js/main.js"></script> -->
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script> 


<!-- cometChat -->
@if(Auth::check())
<script type="text/javascript" src="//fast.cometondemand.net/11250xa0d44.js" charset="utf-8"></script>
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
//      node.setAttribute("disabled", true);
//      node.setAttribute("selected", true);
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
  //        tabindexOffset: 100,
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
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107297391-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());
  gtag('config', 'UA-107297391-1');
</script>
<!-- Sign Up -->
@includeIf('includes.signupModal')

<!-- Sign In -->
@includeIf('includes.signInModal')

</body>
</html>