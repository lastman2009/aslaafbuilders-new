<!DOCTYPE>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="JgeA_wkUnETUFTNjhTg3ttly5YbcmzP2tSo8S3Y5ebA" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta  name="description" content="%DESCRIPTION%">
	<meta  name="keywords" content="%KEYWORD%">
	<title>%TITLE%</title>
	<!-- Favicon — the Aslaaf Builders badge from the header logo -->
	<link rel="icon" href="/image/favicon.ico" sizes="32x32">
	<link rel="icon" href="/image/favicon-32x32.png" type="image/png" sizes="32x32">
	<link rel="icon" href="/image/favicon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/image/apple-touch-icon.png">
    
	<!-- Fontawsome -->
	<!-- <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css"> -->
	<link href="{{asset('/assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>


	<!-- Toaster -->
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
	<link href="{{asset('/assets/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
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
	
	<!-- Custom Styles -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
	<!-- <link rel="stylesheet" type="text/css" href="../../assets/css/style.css"> -->

	<!-- Responsiveness -->
	<!-- <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css"> -->
	<link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
	<!-- Light box  -->
	<link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet" type="text/css"/>
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115969528-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115969528-1');
</script>
<link type="text/css" rel="stylesheet" href="{{asset('/assets/css-new/aslaaf-theme.css')}}"/>
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

@include('partials.header.site-header')
