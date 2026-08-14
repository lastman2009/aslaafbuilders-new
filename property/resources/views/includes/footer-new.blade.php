<footer class="ab-footer">
    @include('partials.footer.content')
    <button class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></button>
</footer>
    <!--<script  type="text/javascript" src="{{asset('assets/js-new/jquery-3.2.1.min.js')}}"></script>-->
    <!--<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>-->
    <!--<script  type="text/javascript" src="{{asset('assets/js-new/bootstrap.min.js')}}"></script>-->
    <!--<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>-->
    <!--<script  type="text/javascript" src="{{asset('assets/js-new/slick.js')}}"></script>-->
    <!--<script  type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>-->
    <!--<script  type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>-->
    <!--<script  type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>-->
    <!--<script  type="text/javascript" src="{{asset('assets/js-new/jquery.mCustomScrollbar.concat.min.js')}}"></script>-->
    <!--<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>-->
    <script  language="javascript" type="text/javascript" src="{{asset('assets/js-new/all-in-one.js')}}"></script>
    @yield('script')
    <script async language="javascript" type="text/javascript" src="{{asset('assets/js-new/custom.js')}}"></script>

    <script async language="javascript" type="text/javascript">

/**
 * Slick Slider
 **/
$(document).on('ready', function() {
    $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });
});

$("#back-to-top").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
  });
</script>


<!--<script type='text/javascript'>-->
<!--$(document).ready(function(){-->
	<!--var width = $(window).width(); //get the width of the screen-->
<!--	  var screenWidth = width;-->
<!--	  $.ajax({-->
<!--	    type: "GET",-->
<!--	    url:'/?width='+ screenWidth,-->
<!--		success: function(res){-->
		
<!--// 		$("body").empty();-->
<!--// 		$("body").html(res);-->
	       <!--// do something-->

	       <!--// alert( "Browser Dimensions Saved" );-->

<!--	    },-->
<!--            error: function(e){-->
<!--		console.log(e);-->
<!--	   }-->
<!--	  });-->
<!--	});-->
<!--</script>-->
@yield('chart_script')
@yield('form_search_script')
@yield('home_contactForm_script')
@yield('value_form_script')
@yield('detial-page-footer')
@include('partials.modal.signup')
@include('partials.modal.signin')
@include('partials.modal.agentModal')
@include('partials.modal.forgetpassword')



<script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $("#file-1").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

           function imageIsLoaded(e) {
                $('#myImg1').attr('src', e.target.result);
            };
            });
            
            
          </script>

</body>
</html>
