/* ----------------- Range Slider For Search Custom Jquery --------------------- */
/* Jquery for Buy Price */
var buyPriceSlider = document.getElementById('buyPriceRange');
var buyPriceinput0 = document.getElementById('buyPrice-input-0');
var buyPriceinput1 = document.getElementById('buyPrice-input-1');
var buyPriceinputs = [buyPriceinput0, buyPriceinput1];
noUiSlider.create(buyPriceSlider, {
	start: [0, 100000000],
	connect: true,
	direction: 'ltr',
	//step: 50000,
	//tooltips: [true, wNumb({ decimals: 1 })],
	range: {
	    'min': [0,15000],
		'5%': [15000,20000],
		'10%': [20000 ,30000],
		'20%': [30000,40000],
		'25%': [40000,50000],
		'35%': [500000,100000],
		'40%': [100000,200000],
		'50%': [200000,400000],
		'60%': [400000,700000],
		'70%': [700000,800000],
		'80%': [800000,850000],
		'90%': [850000,900000],
		'max': [100000000]
	},
	format: wNumb({
		decimals: 0,
		thousand: ',',
		postfix: ' ',

	}),
//	pips: {
//		mode: 'values',
//		values: [50000, 500000, 5000000, 50000000, 100000000],
//		density: 2,
//		stepped: true,
//		format: wNumb({
//			decimals: 0,
//			thousand: '.',
//			postfix: '',
//
//		})
//
//
//	}
});
buyPriceSlider.noUiSlider.on('update', function (values, handle) {
	buyPriceinputs[handle].value = "Rs. " + values[handle];
});
/* Jquery for Buy Area */
var buyAreaSlider = document.getElementById('buyAreaRange');
var buyAreainput0 = document.getElementById('buyArea-input-0');
var buyAreainput1 = document.getElementById('buyArea-input-1');
var buyAreainputs = [buyAreainput0, buyAreainput1];
noUiSlider.create(buyAreaSlider, {
	start: [0, 1000],
	connect: true,
	direction: 'ltr',
	//step: 10,
	//tooltips: [true, wNumb({ decimals: 1 })],
	range: {
		'min': [0,2],
		'2%': [20,20],
		'14%': [140,80],
//		'50%': [500,10],
//		'80%': [800,10],
		'max': [1000]
	},
	format: wNumb({
		decimals: 0,
		thousand: '',
		postfix: ' ',

	}),
});
buyAreaSlider.noUiSlider.on('update', function (values, handle) {
	buyAreainputs[handle].value = "Marla " + values[handle];
});

/* ------------------------------------------------------------ */




/* ----------------- JQuery for Carousel of Featured Properties, Projects, Featured Blogs  --------------------- */


$('.carousel[data-type="multi"] .item, .carousel2[data-type="multi"] .item, .carousel3[data-type="multi"] .item').each(function () {

	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i = 0; i < 1; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}
});
// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
    interval: 3000,
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    if (next.next().length>0) {
        next.next().children(':first-child').clone().appendTo($(this));
    } else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});

// commented on 4-10-2018 By Atif Malik
    // $(".multi-item-carousel .carousel-inner").swiperight(function() {
    //     $(this).parent().carousel('prev');
    // });
    // $(".multi-item-carousel .carousel-inner").swipeleft(function() {
    //     $(this).parent().carousel('next');
    // });
    
    
// $(".multi-item-carousel").swipe({
//
//     swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
//
//         if (direction == 'left') $(this).carousel('next');
//         if (direction == 'right') $(this).carousel('prev');
//
//     },
//     allowPageScroll:"vertical"
//
// });