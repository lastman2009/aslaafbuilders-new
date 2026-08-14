@php
$title = "Upload Profile Theme";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">

                    <div class="tab-content" id="profile_tabcontent">
                        <div id="dashboard_profile" class="tab-pane fade active in" role="tabpanel">
                            <div class="col-md-12 padding-left padding-right">
                                <div class="form-wrap">
                                    <form action="/uploadProfileTheme" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-body edit-profile-body form-edit addprofile">
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Theme Name</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="name" placeholder="Type Theme Name ...." required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right form-description">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Description</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <textarea class="form-control summernote-theme-upload" name="description" placeholder="Type description here!" style="min-height:322px"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <label class="input-group-btn">
                    <span class="btn btn-success" style="padding: 16px 55px; border-radius: 0">
                        UPLOAD &nbsp;&nbsp; <i class="fa fa-upload"></i> <input type="file" name="file" style="display: none;" required>
                    </span>
                                                            </label>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                        <!-- time-period -->
                                        <button type="submit" name="submit" value="Save" class="btn portfolio-btn">Save Theme</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    ini_set('max_execution_time', 300); //300 seconds = 5 minutes
    function deleteDir($dirPath) {
        // if (! is_dir($dirPath)) {
        //     throw new InvalidArgumentException("$dirPath must be a directory");
        // }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                deleteDir($file);
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
        $zip->extractTo('unzips/'. $new_name);
        // base_path('/resources/views/unzips/'. $new_name);
    }

    $zip->close();
    

     deleteDir(base_path('/resources/views/unzips/'. $new_name.'/css'));
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/js'));
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/images'));
    deleteDir(base_path('/resources/views/unzips/'. $new_name.'/fonts'));
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
        if(!empty($old_src)){
            $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
            if (strpos($old_src, 'http') !== false) {
                //echo 'true';
            }else{
                $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
            }
            $script->setAttribute('src', $new_src_url);
        }else{
            $new_src_url = "";
            $script->removeAttribute('src');
        }
        //echo $new_src_url;
    }

    foreach ($links as $link) {
            $old_src = $link->getAttribute('href');
        if(strpos($old_src, 'http') !== false){
        
        }else{
            $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
        }
        
        //echo $new_src_url;

        $link->setAttribute('href', $new_src_url);
    }

    // foreach ($tags as $tag) {
    //     $old_src = $tag->getAttribute('src');
    //     $new_src_url = 'http://' . $_SERVER["HTTP_HOST"] . '/unzips/' . $new_name . '/' . $old_src;
    //     //echo $new_src_url;

    //     $tag->setAttribute('src', $new_src_url);
    // }
    $doc->saveHTMLFile(base_path('/resources/views/unzips/' . $new_name . "/" . "index.blade.php"));
    ?>
    <script>
        window.location = "/dashboard/admin/createprofileTheme";

    </script>
    <?php
    }
    else {
        echo "only .zip file are allowed";
    }
    }

    ?>
  @include( 'includes_admin.footer' )
    <script>
        $(function() {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
            });

        });
    </script>
    <script>
        function shiftHeight() {
            var customHeight = $('.form-description .form-group .col-md-9').height();
            var getWidth = $(window).width();
            if (getWidth > 991) {
                $('.form-description .form-group label').css('height', customHeight);
            }
        }
        tinymce.init({
            selector: 'textarea.summernote-theme-upload',
            //theme: "inlite",
            height: 235,
            menubar: false,
            skin: 'myskinlightblack',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks fullscreen',
                'insertdatetime media table contextmenu paste help',
                'textcolor colorpicker',
                'directionality',
                'wordcount',
                'charactercount'
            ],
            wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g,
            toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | pastetext | table | ltr rtl | custom_tooltip | searchreplace | removeformat fullscreen',
            convert_fonts_to_spans: true,
            paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark,table,tr,td",
            paste_retain_style_properties: "all",
            force_p_newlines : true,
            //paste_postprocess: function(plugin, args) {
            //    args.node.innerHTML = cleanHTML(args.node.innerHTML);
            //},
            setup: function(editor) {
                // Register tooltip button
                editor.addButton('custom_tooltip', {
                    text: 'Tooltip',
                    title: 'Add a tool tip to the selected text.',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Insert Tooltip',
                            body: [{
                                type: 'textbox',
                                name: 'tooltipText',
                                label: 'Tooltip Text',
                                value: ''
                            }],
                            onsubmit: function(e) {
                                var title = e.data.tooltipText;
                                var content = editor.selection.getContent();
                                editor.insertContent('<span class="tooltip" title="' + title + '">' + content + '</span>');
                            }
                        });
                    }
                });
            },
            init_instance_callback : "shiftHeight",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']
        });
        
    </script>