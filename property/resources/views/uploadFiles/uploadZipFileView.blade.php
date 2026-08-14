@extends('layouts.master')

@section('header')
    <h2>Add new Blog</h2>
@stop

@section('content')

    <form action="/uploadedZipFile" class="form-horizontal" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div>
            <label>Name</label>
            <div>
                <input type="text" name="name" required>
            </div>
        </div>

        <div>
            <label>Templete</label>
            <div>
                <input type="file" name="file" required>
            </div>
        </div>

        <div>
            <div>
                <input type="submit" name="submit" value="Save">
            </div>
        </div>

    </form>


    <?php
    function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    if (isset($_POST['submit']))
    {   $new_name = $_POST["name"];
    $array = explode(".", $_FILES["file"]["name"]);
    $fileName = $array[0];
    $fileExtension = strtolower(end($array));

    if ($fileExtension == "zip")
    {
    move_uploaded_file($_FILES["file"]["tmp_name"], "tmp/" . $_FILES["file"]["name"]);

    $zip = new ZipArchive();
    $zip->open("tmp/" . $_FILES["file"]["name"]);

    for ($num = 0; $num < $zip->numFiles; $num++) {
        $fileInfo = $zip->statIndex($num);
        $zip->extractTo(base_path('/resources/views/unzips/'. $new_name));
        $zip->extractTo('/unzips/'. $new_name);

        // base_path('/resources/views/unzips/'. $new_name);
    $zip->close();
    }
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/css'));
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/js'));
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/css'));
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/fonts'));

    // unlink(base_path('/resources/views/unzips/'. $new_name.'/css/'));
    unlink("tmp/" . $_FILES["file"]["name"]);   

    $html = file_get_contents(base_path('/resources/views/unzips/' . $new_name . "/" . "index.html"));
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($html);
    $tags = $doc->getElementsByTagName('img');
    $links = $doc->getElementsByTagName('link');
    $scripts = $doc->getElementsByTagName('script');


    foreach ($scripts as $script) {
        $old_src = $script->getAttribute('src');
        $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
        //echo $new_src_url;

        $script->setAttribute('src', $new_src_url);
    }

    foreach ($links as $link) {
        $old_src = $link->getAttribute('href');
        $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
        //echo $new_src_url;

        $link->setAttribute('href', $new_src_url);
    }

    foreach ($tags as $tag) {
        $old_src = $tag->getAttribute('src');
        $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
        //echo $new_src_url;

        $tag->setAttribute('src', $new_src_url);
    }
    $doc->saveHTMLFile(base_path('/resources/views/unzips/' . $new_name . "/" . "index.html"));
    ?>
    <script>
        window.location = "blogs";

    </script>
    <?php
    }
    else {
        echo "only .zip file are allowed";
    }
    }

    ?>
@stop