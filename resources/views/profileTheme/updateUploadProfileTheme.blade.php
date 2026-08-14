@extends('layouts.master')

@section('header')
    <h2>Add new Profile Theme</h2>
@stop

@section('content')

    <form action="/uploadUpdatedProfileTheme" class="form-horizontal" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
       <div>
            <label>Name</label>
            <div >
                <select name="name" required="">
           <option>Please Select Name</option>
                    @foreach($files as $file)
                        <option value="{{basename($file)}}">{{basename($file)}}</option>
                    @endforeach

                </select>
            </div>
        </div>



        <div>
            <label>Description</label>
            <div>
                <input type="text" name="description" required>
            </div>
        </div>

        <div>
            <label>Theme File</label>
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

    if (isset($_POST['submit']))
    {   $new_name = $_POST["name"];
    //unlink("profiletheme/" .$new_name);

    $array = explode(".", $_FILES["file"]["name"]);
    $fileName = $array[0];
    $fileExtension = strtolower(end($array));

    $existing_file_name="profiletheme/" . $new_name;
    if (file_exists($existing_file_name)) {
    echo "The file $existing_file_name exists";
    } 
    else 
    {
    if ($fileExtension == "zip")
    {
    move_uploaded_file($_FILES["file"]["tmp_name"], "tmp/" . $_FILES["file"]["name"]);

    $zip = new ZipArchive();
    $zip->open("tmp/" . $_FILES["file"]["name"]);

    for ($num = 0; $num < $zip->numFiles; $num++) {
        $fileInfo = $zip->statIndex($num);
        $zip->extractTo("profiletheme/" . $new_name);
    }
    $zip->close();
    unlink("tmp/" . $_FILES["file"]["name"]);
    }
    ?>
    <script>
        window.location = "blogs";

    </script>
    <?php
    }
    
    }

    ?>
@stop