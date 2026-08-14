// Adding Class in navbar of home


function closeValueProp(){
	$(".evaluateProperty").slideUp();
	$('header').slideDown();
}

jQuery( document ).ready( function ( $ ) {

$('[data-toggle="tooltip"]').tooltip();   
if($("#main").hasClass("home")){
	$("nav").addClass("home-nav");
}
    

    /**

     * Menu Bar classtoggle
     **/
    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
            $('.nav-bar').addClass('fixed-nav');
        } else {
            $('.nav-bar').removeClass('fixed-nav');
        }
    });



    /**
     * Height resizing of home page slider
     **/

    var $item = $('.banner');

    var $wHeight = $(window).height();
    var $wWidth = screen.width; 
    $item.eq(0).addClass('active');

    $item.height($wHeight);

    $item.addClass('full-screen');

var $bIcon = $('.banner-icons');
changeIcon();
$(window).on('resize', function () {
changeIcon();
});


function changeIcon(){
     $wHeight = $(window).height();
     $wWidth = screen.width; 
    if($wWidth <= 480 && $wHeight >= 600){
	$bIcon.css({"top": $wHeight - 80 + 'px',"left": ($wWidth/2) - 60 + 'px', "right": ($wWidth/2) - 60 + 'px'});
}

if($wWidth <= 420 && $wHeight <= 600){
	$bIcon.css({"top": $wHeight - 40 + 'px',"left": ($wWidth/2) - 60 + 'px', "right": ($wWidth/2) - 60 + 'px'});
}
}
/*

if($wWidth <= 480 && $wHeight < 600){

$bIcon.css({"top": '0px',"left": ($wWidth/2) - 60 + 'px', "right": ($wWidth/2) - 60 + 'px'});
}

*/

    $('.top-banner-section .carousel img').each(function () {

        var $src = $(this).attr('src');

        var $color = $(this).attr('data-color');

        $(this).parent().css({

            'background-image': 'url(' + $src + ')',

            'background-color': $color

        });

        $(this).remove();

    });


    $(window).on('resize', function () {

        $wHeight = $(window).height();

        $item.height($wHeight);

    });

    $(window).on("scroll",function(){
        if($(this).scrollTop() > 250){
            $(".back-to-top").fadeIn();
        }else if($(this).scrollTop() < 250){
          $(".back-to-top").fadeOut();   
        } 
    });



    /**
     * Advance Search
     **/
    $(document).ready(function(){
        $('.advance-search-content').hide();
        $('.advance-search-btn').click( function() {
            $('.advance-search-content').slideToggle();
        });
    });


    /**
     * Show Hide Password
     **/
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password2").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    /**
     * Evaluate Property Trigger
     **/
    $('#evaluateProperty').click(function(){
        $('.evaluate_Property').slideToggle();
        if($wWidth <= 480){
        	$('header').slideUp();
        }
    });
// Add Property
    $('#add_Property').click(function(){
        $('.add_Property').slideToggle();
    });
    
    $('#close_property').click(function(){
        $('.add_Property').slideUp();
    });

    $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
        $('nav').addClass('sticky-nav');
        $('#navbar-btn').addClass('btn-down');
    } else {
        $('nav').removeClass('sticky-nav');
        $('#navbar-btn').removeClass('btn-down');
    }
});

    if ( $('body').scrollTop() > $('.feature').position.top ) {
        $('.detail-page-nav').toggleClass('selected', 'ok');
        // $('.menu-a').addClass('selected');
    }

    // $(window).scroll(function (event) {
    //     var scroll = $(document).scrollTop();
    //     $('.detail-page-nav').toggleClass('ok',
    //         //add 'ok' class when div position match or exceeds else remove the 'ok' class.
    //         scroll >= $('.feature-sect').offset().top
    //     );
    // });
    // $(window).scroll();



    $(function () {

        function nFormatter(val) {
            // var suffixes = ["", " K", " M", " B"," T"];
            // var suffixNum = Math.floor((""+value).length/3);
            // var shortValue = parseFloat((suffixNum != 0 ? (value / Math.pow(1000,suffixNum)) : value).toPrecision(2));
            // if (shortValue % 1 != 0) {
            //     var shortNum = shortValue.toFixed(1);
            // }
            // return shortValue+suffixes[suffixNum];

            if(val >= 10000000) val = (val/10000000).toFixed(2) + ' Crores';
            else if(val >= 100000) val = (val/100000).toFixed(2) + ' Lakhs';
            else if(val >= 1000) val = (val/1000).toFixed(2) + ' Thousands';
            return val;
        }

        $("#priceRangeResult").on('click', function() {
             if(!$(".price-range-selector").is(":hidden")){
                $('.price-range-selector').hide('slow'); 
             }else{
                 $('.price-range-selector').show('slow'); 
                 $('.area-range-selector').hide('slow');
             }
            
        });
        $(".close-price").on('click', function() {
            $('.price-range-selector').hide('slow');
            //return false;
        });

        $("#price-range-slider").slider({
            range: true,
            orientation: "horizontal",
            min: 0,
            max: 100000000,
            values: [0, 100000000],
            step: 1000,
            slide: function (event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
                $("#priceRangeResult").text("Rs. " + nFormatter(ui.values[0])  +" "+ "-- " + nFormatter(ui.values[1]));
            }
        });

        $("#min_price").val($("#price-range-slider").slider("values", 0));
        $("#max_price").val($("#price-range-slider").slider("values", 1));


        $("#min_price,#max_price").on('change', function () {

            var min_price = $('#min_price').val();
            var max_price = $('#max_price').val();


            $("#priceRangeResult").text("Rs. " + nFormatter(min_price)  +" "+ "-- " + nFormatter(max_price));
        });
    });

    $(function () {
        $("#areaResult").on('click', function() {
             if(!$(".area-range-selector").is(":hidden")){
                  $('.area-range-selector').hide('slow');
            }else{
                
            $('.area-range-selector').show('slow');
            $('.price-range-selector').hide('slow');
            }
        });
        $(".close-area").on('click', function() {
            $('.area-range-selector').hide('slow');
            //return false;
        });

        $("#area-range-slider").slider({
            range: true,
            orientation: "horizontal",
            min: 0,
            max: 100,
            values: [0, 100],
            step: 2,
            slide: function (event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }
                $("#min_area").val(ui.values[0]);
                $("#max_area").val(ui.values[1]);
                $("#areaResult").text("Marla " + ui.values[0]  +" "+ "---- " + ui.values[1]);
            }
        });

        $("#min_area").val($("#area-range-slider").slider("values", 0));
        $("#max_area").val($("#area-range-slider").slider("values", 1));

        $("#min_area,#max_area").on('change', function () {

            var min_price = $('#min_price').val();
            var max_price = $('#max_price').val();

            $("#areaResult").text("Marla " + min_price  +" "+ "---- " + max_price);
        });
    });



    $('.center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });


});

    $('.youtube-video').click(function(){
        window.open($(this).children('iframe').attr("src"));
});
$('#close-ad').click(function(){
    $(this).parent().hide("1000");
});


/**
 * Menu Show Hide
 **/
function openNav() {
    var sidenav = document.getElementById("mySidenav");
    if (sidenav) { sidenav.style.width = "250px"; }
}
function closeNav() {
    var sidenav = document.getElementById("mySidenav");
    if (sidenav) { sidenav.style.width = "0"; }
}

$("#navbar-opener").on("click",function(){
openNav(); 
});


$("#close-version").on('click',function(){
    $(".old_version").slideUp();
});

$("#main").on("click",function(){
    closeNav();
});



$("#back-to-top").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
  });
/* if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
  $('.selectpicker').selectpicker('mobile');
} */