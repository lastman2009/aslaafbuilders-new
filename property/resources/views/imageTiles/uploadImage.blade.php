<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>jQuery Tilezoom Generator</title>
    <link rel="stylesheet" type="text/css" media="all" href="js/tilezoom/jquery.tilezoom.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="js/tilezoom/jquery.tilezoom.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#edit-image').change(function () {
                var image = $('#edit-image').val();
                if (!image) return;
                $('#container').tilezoom('destroy');
                $('#container').tilezoom({
                    xml: 'dest/' + image + '.xml',
                    mousewheel: true
                });

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
            <div id="main">
                <div id="content" class="clearfix">
                    <form action="/show_uploaded_image" enctype="multipart/form-data" method="post"
                          accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div>

                            <div class="form-item">
                                <label for="edit-upload">Upload New:</label>
                                <input type="file" name="upload" id="edit-upload" class="form-file"/>
                                <input type="submit" name="upload" value="Upload" id="edit-upload" class="form-submit"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
