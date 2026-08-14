@php
$title = "Map- $image";
@endphp
@include("includes.title")

  <?php

ini_set('upload_max_filesize', '512M');
ini_set('post_max_size', '512M');
ini_set('max_execution_time', '360'); //10 min

session_start();
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath('./lib'),
    get_include_path(),
)));
require_once('inc/pa.php');
require_once('inc/functions.php');

$messages = show_messages();

if (!empty($_POST['upload'])) {
    processUpload();
}
$images = get_existing_images();
?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>jQuery Tilezoom Generator</title>
    <link rel="stylesheet" type="text/css" media="all" href="../../js/tilezoom/jquery.tilezoom.css"/>
    <!-- <link rel="stylesheet" type="text/css" media="all" href="../css/style.css"/> -->
    
    <!-- <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/tilezoom/jquery.tilezoom.js')}}"></script> -->

    

    <style type="text/css">
        .area-map h3{
        	margin-bottom: 20px;
        }
        .area-map h3 span {
		    text-transform: uppercase;
		    background: #eeeeee;
		    padding: 10px 20px;
		    font-style: italic;
		    font-weight: bold;
		    font-size: 22px;
		}
        #container {
            /*width: 100%;
            */height: 600px;
            background-color: white;
            border: 1px solid #ececec;
            color: white; /* for error messages, etc. */
            /*margin: 0 auto;*/
        }
        #content {
		    max-width: 100%;
		    width: 100%;
		    padding: 0;
		    border-radius: 0;
		    border: none;
		}
        #content div.form-item {
            width: 100%;
            overflow: hidden;
            padding: 0.2em 0;
        }

        #content label {
            display: block;
            float: left;
            width: 100px;
        }
    </style>

<div class="banner-wraper"> 
  <div class="banner-cover">
    <div class="container">
      <div class="row">
        <div class="banner-contents banner-contact col-md-12">
          <div class="col-md-12 features">
            <div class="feature-heading">
              <h2><img src="../../assets/images/home-icon-contact.png">Area  <span>Map</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<main class="main-section"> 

  <section class="page-section area-map">
    <div class="container">
      <div class="row">
        <div class="col-md-12 padding-right">
			<div id="page">
		        <div id="main">
		        	<h3><span>{{$image}}</span></h3>
		            <div id="content" class="clearfix">
		                <form enctype="multipart/form-data" method="post" accept-charset="UTF-8" action="">
		                    <div>
		                        <input type="hidden" name="image" id="edit-image" value="{{$image}}">
		                    </div>
		                </form>
		                <div id="container" class="col-md-12"></div>
		            </div>
		        </div>
		    </div>
			
			
        </div>
      </div>
    </div>
  </section>
  
  
</main>

@include('includes.footer')
<script type="text/javascript">

        $(document).ready(function () {

            var image = $('#edit-image').val();
               if(!image) return;
            $('#container').tilezoom('destroy');
            $('#container').tilezoom({
                width :2800,
                height:4200,
                xml: '../../dest/' + image + '.xml',
                mousewheel: true
            });


        });
    </script>