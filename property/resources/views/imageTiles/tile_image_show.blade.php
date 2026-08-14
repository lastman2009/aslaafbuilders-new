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

//require_once('lib/Oz/Deepzoom/ImageCreator.php');
//$converter = new Oz_Deepzoom_ImageCreator();
//$converter->create( realpath('source/fortress.jpg'), 'dest/fortress.xml');
$images = get_existing_images();
?>
        <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>jQuery Tilezoom Generator</title>
    <link rel="stylesheet" type="text/css" media="all" href="../js/tilezoom/jquery.tilezoom.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../css/style.css"/>
    {{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>--}}
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/tilezoom/jquery.tilezoom.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            var image = $('#edit-image').val();
//                if(!image) return;
            $('#container').tilezoom('destroy');
            $('#container').tilezoom({
                xml: '../dest/' + image + '.xml',
                mousewheel: true
            });


        });
    </script>

    <style type="text/css">
        #container {
            width: 800px;
            height: 600px;
            background-color: black;
            border: 1px solid black;
            color: white; /* for error messages, etc. */
            margin-top: 20px;
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
</head>
<body>
<div id="page-wrapper">
    <div id="page">
        <div id="header">

        </div>
        <div id="main">

            <div id="content" class="clearfix">
                <form enctype="multipart/form-data" method="post" accept-charset="UTF-8" action="">
                    <div>
                        <input type="hidden" name="image" id="edit-image" value="{{$image}}">
                    </div>
                </form>
                <div id="container"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
