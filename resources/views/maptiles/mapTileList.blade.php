@php
$title = "Maps";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')


<?php

ini_set('upload_max_filesize', '512M');
ini_set('post_max_size', '512M');
ini_set('max_execution_time', '720'); //10 min

session_start();
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath('./lib'),
    get_include_path(),
)));
if (!empty($_POST['upload'])) {
    /*echo '<pre>';
    print_r($_POST['upload']);
    die();*/
    $filename = pathinfo($_FILES['upload']['name'], PATHINFO_FILENAME);
    $dsn = 'mysql:dbname=rightdeed_com;host=127.0.0.1';
    $user = 'root';
    $password = '';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO maps (image, status)
        VALUES ('$filename', 1)";
        // use exec() because no results are returned
        $dbh->exec($sql);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
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


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view recent-add-class-padding mt-40">
					<div class="panel-wrapper collapse in">
					
						<div class="panel-body">
						 
							<div class="row">
								<div class="col-lg-12 padding-right">
								<?php if (!empty($messages)): ?>
								<?php echo $messages ?>
								<?php endif; ?>
								 <?php if(!empty($images)):?>
                                <?php foreach($images as $image): ?>
									<div class="col-md-3 padding-left">
										<div class="thumb-container">
											<div class="thumb-block">
												<a href="show_container/<?php echo $image ?>"><img class="img-responsive" src="dest/<?php echo $image?>_files/thumb.jpg">
												</a>
											</div>
										</div>
									</div>
									<?php

                                endforeach; ?>
								</div>
							</div>
							
                                <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

    <!-- /Row -->
@include('includes_admin.footer')
