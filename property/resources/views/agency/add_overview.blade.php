@php
$title = "Website Data";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40 web-basic-info">
                    <div class="col-md-12 padding-left padding-right">
                        <div class="form-wrap">
                            <form action="/dashboard/agency/create-website-save" enctype="multipart/form-data" method="post">
                                {{ csrf_field()}}
                                <div class="col-lg-12 form-body edit-profile-body form-edit">
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Company Name</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="agency_name" value="{{$website->agency_name}}" placeholder="Type Title ..."
                                                           @if(empty($website->agency_name))
                                                           required
                                                            @endif

                                                    >

                                                </div>
                                            </div>
                                            @if ($errors->has('agency_name'))
                                            <div class="error" style="color: red">{{ $errors->first('agency_name') }}</div>
                                                                    @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Contact Us Email</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="email" class="form-control" name="email" value="{{$website->email}}" placeholder="Type Email ..."
                                                           @if(empty($website->email))
                                                           required
                                                            @endif

                                                    >

                                                </div>
                                            </div>
                                            @if ($errors->has('email'))
                                            <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                                                    @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Address</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="address" value="{{$website->address}}" placeholder="Type Address ..."
                                                           @if(empty($website->address))
                                                           required
                                                            @endif

                                                    >

                                                </div>
                                            </div>
                                            @if ($errors->has('address'))
                                                                        <div class="error" style="color: red">{{ $errors->first('address') }}</div>
                                                                    @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label web-info-about col-md-3 col-sm-12">About Us</label>
                                                <div class="col-md-6 col-sm-12 agency-webeditor padding-right padding-left">
                                                    <textarea class="form-control summernote about-content" name="about_us" @if(empty($website->about_us)) @endif>{{$website->about_us}}</textarea>
                                                </div>
                                                @if ($errors->has('about_us'))
                                                <div class="error" style="color: red">{{ $errors->first('about_us') }}</div>
                                                                    @endif
                                                <div class="control-label agency-information col-md-3 col-sm-12">
                                                    <h2>Agency Verification</h2>
                                                    <p>Property.techologicalinc.com also offer web development services to its clients with striking UI and irresistible design.  </p><a href="" data-toggle="modal" data-target="#myModal">Benefits</a><a class="instruction-agency" href="" data-toggle="modal" data-target="#myModal1">Instruction</a>
                                                    <div class="whatspp-portion">
                                                        <img src="{{asset("assets_admin/dist/img/whatsapp-logo.png")}}" alt="" />
                                                        <span>092246879213574</span>
                                                    </div>
                                                    <div class="form-group whatsapp-section">
                                                        <label class="control-label mb-10">Your Whatsapp Number</label>
                                                        <input type="text" id="whatsapp-number" name="contact_number" value="{{$website->contact_number}}" class="form-control" placeholder="+92 300 000 0000"
                                                               @if(empty($website->contact_number))
                                                               required
                                                                @endif
                                                        >
                                                        @if ($errors->has('contact_number'))
                                                                        <div class="error" style="color: red">{{ $errors->first('contact_number') }}</div>
                                                                    @endif
                                                    </div>
                                                    <div class="box choose-agency-pic">
                                                        <input type="file" name="verification_documents[]" id="file-3" class="inputfile inputfile-1 docs"
                                                               multiple />
                                                        <label for="file-3">
                                                            <span>Choose Files<img src="{{asset("assets_admin/dist/img/file-upload.png")}}" alt=""></span></label>
                                                            @if ($errors->has('verification_documents'))
                                                            <div class="error" style="color: red">{{ $errors->first('verification_documents') }}</div>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group mrbtm-zero">
                                                <label class="control-label ceoheight col-md-3 col-sm-12">CEO Message</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <textarea class="form-control ceo-message" name="ceo_message" rows="15" placeholder="Type ..."
                                                              @if(empty($website->ceo_message))
                                                              required
                                                            @endif
                                                    ><?= $website->ceo_message; ?></textarea>
                                                </div>
                                                @if ($errors->has('ceo_message'))
                                                            <div class="error" style="color: red">{{ $errors->first('ceo_message') }}</div>
                                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-lg-6 col-sm-12 padding-left">
                                            <div class="panel panel-default card-view webinfoheight">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="col-lg-12 col-sm-12 text-center">
                                                            @if(empty($website->logo))
                                                                <figure class="edit-profile-image">
                                                                    <img id="myImg1" class="web-info-img" src="{{asset("assets_admin/dist/img/selcetimg.jpg")}}" alt="Profile Image">
                                                                </figure>
                                                            @else
                                                                <figure class="edit-profile-image">
                                                                    <img id="myImg1" class="web-info-img" src="/images/logo/thumb_<?= $website->logo;?>" alt="Profile Image">
                                                                </figure>
                                                            @endif
                                                            <?php
                                                            $required = "";
                                                            $class = "";
                                                            if(empty($website->logo)){
                                                                $required = "required";
                                                                $class = "logo";
                                                            }
                                                            ?>
                                                            <div class="text-center">
                                                                <input type="file" name="logo" id="file-1" class="inputfile inputfile-1 
                                                                {{$class}}"
                                                                       accept="image/x-png,image/jpeg"
                                                                        {{$required}}
                                                                />

                                                                <label class="fileupload-profile add-webinfo-img" for="file-1">Add Logo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 padding-left">
                                            <div class="panel panel-default card-view webinfoheight">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="col-lg-12 col-sm-12 text-center">
                                                            @if(empty($website->ceo_image))
                                                                <figure class="edit-profile-image">
                                                                    <img id="myImg2" class="web-info-img" src="{{asset("assets_admin/dist/img/selcetimg.jpg")}}" alt="Profile Image">
                                                                </figure>
                                                            @else
                                                                <figure class="edit-profile-image">
                                                                    <img id="myImg2" class="web-info-img" src="/images/ceo/thumb_<?= $website->ceo_image; ?>" alt="Profile Image">
                                                                </figure>

                                                            @endif
                                                            <div class="text-center">
                                                                <?php
                                                                $required_ceo = "";
                                                                $class_ceo = "";
                                                                if(empty($website->logo)){
                                                                    $required_ceo = "required";
                                                                    $class_ceo = "ceo-image";
                                                                }
                                                                ?>

                                                                <input type="file" name="ceo_image" id="file-2" class="myfile inputfile inputfile-1 {{$class_ceo}}" accept="image/x-png,image/jpeg"
                                                                        {{$required_ceo}}

                                                                />



                                                                <label class="fileupload-profile add-webinfo-img" for="file-2">Add CEO Image</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 ">
                                        <div class="panel panel-default card-view agency-about loadagain">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="col-md-12 padding-right imagePreview">
                                                        <h3>Add Banner images</h3>

                                                        @foreach($website->Images as $image)
                                                            <div class="col-md-12 padding-left padding-right mt-20">
                                                                <div class="form-group">
                                                                    @if($image->active == 1)
                                                                        <input type="radio" class="check_it" name="new" data-id="{{$image->id}}" checked>
                                                                        <label class="control-label pl-10">This is main banner</label>

                                                                    @else
                                                                        <input type="radio" class="check_it" name="new" data-id="{{$image->id}}">
                                                                        <label class="control-label pl-10">Select this as main banner</label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 added-images padding-left">

                                                                <div class="img-container">
                                                                    <div class="img-block">
                                                                        <img class="img-responsive" src="/images/banners/original_{{$image->image}}" alt="">
                                                                    </div>
                                                                </div>

                                                                <span  class="zmdi zmdi-close editpicicon deleteImage" data-id="{{$image->id}}"></span>
                                                                <div class="banner-caption">
                                                                    <input class="form-control" name="banners[caption_title][{{$image->id}}]" value="{{$image->title}}" type="text" placeholder="Title Caption" required>
                                                                    <input class="form-control" name="banners[caption][{{$image->id}}]" value="{{$image->caption}}" type="text" placeholder="Caption" required>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 padding-right ">
                                        <div class="col-lg-12 col-md-12 col-sm-12 padding-left property-sectione add-property-img-uploader">
                                            <div class="form-actions edit-form-submit">
                                                <div class="panel panel-default card-view portfolio-img-tab profile-Image-tab multi-files-uploader">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body portfolio-role profile-role">
                                                            <div class="form-group">

                                                                <?php
                                                                $required_banner = "";
                                                                $class_banner = "";
                                                                if(empty($website->logo)){
                                                                    $required_ceo = "required";
                                                                    $class_ceo = "ceo-image";
                                                                }
                                                                ?>
                                                                <input id="input-43" type="file" style="z-index: 0;" name="new_banners[]" multiple class="{{$class_banner}}" data-overwrite-initial="false" data-min-file-count="0"
                                                                        {{$required_banner}}
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-lg-6 col-md-6 col-sm-6 padding-left">
                                            <button type="submit" class="btn btn-submit-webinfo btn-anim" name="action" value="website"><i class="fa fa-paper-plane"></i><span class="btn-text">Stay Here</span></button>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 padding-left">
                                            <button type="submit" class="btn btn-submit-webinfo btn-anim" name="action" value="continue"><i class="fa fa-paper-plane"></i><span class="btn-text">Save & Continue</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->



    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myModalLabel">Agency Benefits</h5>
                </div>
                <div class="modal-body agency-benefits">
                    <ol>
                        <li>Now you can have your own property website developed by a team of skilled professionals</li>
                        <li>It will give you a platform to place all your data in one place</li>
                        <li>Will Increase your sale ratio</li>
                        <li>Will give you a wide range of customers</li>
                        <li>Compared to print media and digital media, a website is the least expensive form of advertising your business</li>
                        <li>You’ll have access to info. You can keep track of each and everything that’s happening on your website. How many visitors came to your site, which portion of your business is performing well and which needs improvement, etc. You can even make updates to it anytime of the day/night you want. </li>
                    </ol>
                    <strong><em>Note:</em></strong>
                    <p>The registered companies will have their URL look like this: property.technologicalinc.com/company name<br>
                        If you are a non-registered company, the URL’s will look like this: property.techonologicalinc.com/companyname1234</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-model-agency" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myModalLabel">Agency Benefits</h5>
                </div>
                <div class="modal-body agency-benefits">
                    <ol>
                        <li>Now you can have your own property website developed by a team of skilled professionals</li>
                        <li>It will give you a platform to place all your data in one place</li>
                        <li>Will Increase your sale ratio</li>
                        <li>Will give you a wide range of customers</li>
                        <li>Compared to print media and digital media, a website is the least expensive form of advertising your business</li>
                        <li>You’ll have access to info. You can keep track of each and everything that’s happening on your website. How many visitors came to your site, which portion of your business is performing well and which needs improvement, etc. You can even make updates to it anytime of the day/night you want. </li>
                    </ol>
                    <strong><em>Note:</em></strong>
                    <p>The registered companies will have their URL look like this: property.technologicalinc.com/company name<br>
                        If you are a non-registered company, the URL’s will look like this: property.techonologicalinc.com/companyname1234</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-model-agency" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    @include( 'includes_admin.footer' )

    <script>
        $(document).ready(function () {
            $(function () {
                $("#file-1").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

            function imageIsLoaded(e) {
                $('#myImg1').attr('src', e.target.result);
            };


            $(function () {
                $("#file-2").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoad;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

            function imageIsLoad(e) {
                $('#myImg2').attr('src', e.target.result);
            };

        });

    </script>
    <style>
        .added-images{
            margin-bottom: 30px;
            position: relative;
        }
        .banner-caption{
            position: absolute;
            width: 40%;
            top: 84%;
            left: 0.8%;
            background: rgba(92, 92, 92, 1.0);
            padding: 5px;
        }
        .banner-caption input:first-child{
            margin-bottom: 5px;
        }
        .img-container{
            display: table;
            width: 100%;
            margin-bottom: 0;
        }
        .img-block{
            display: table-cell;
            vertical-align: middle;
            height: auto;
            background: black;
            text-align: center;
            border: 1px solid #c1c1c1 ;
            padding: 4px;
        }
        .img-block img{
            max-height: auto !important;
            margin: 0 auto
        }
        @media (min-width: 768px)
        {
            .img-container {
                min-height: 200px;
            }
        }
        a.zmdi.zmdi-close.editpicicon, span.zmdi.zmdi-close.editpicicon {
            right: 20px;
            position: absolute;
        }
        .imagePreview label{
            color: #898989 !important;
        }
    </style>
    <script>
        /*$( ".banners-file" ).fileinput( {

         uploadUrl: '#', // you must set a valid URL here else you will get an error
         allowedFileExtensions: [ 'jpg' ],
         overwriteInitial: true,
         maxFileSize: 100000,
         maxFilesNum: 10,
         rtl: true,
         showRemove: false,
         showUpload: false,
         showUploadedThumbs: false,
         allowedFileTypes: [ 'image' ]
         /!*slugCallback: function ( filename ) {
         return filename.replace( '(', '_' ).replace( ']', '_' );
         }*!/


         } );*/
        $(document).on("click", ".deleteImageRuntime", function() {
            
            $(this).parent().remove();
            finalFiles = [];
            $.each($("#input-43").files,function(idx,elm){
                finalFiles[idx]=elm;
            });
            console.log($(this).data('index'));
            //delete finalFiles[$(this).data('index')];
            finalFilesArray.prototype.slice.call($("#input-43").files).splice($(this).data('index'),1);
            console.log(finalFiles);
            $("#input-43").val(finalFiles);
        });
        $(document).on('ready', function() {
            $("#input-43").click(function(){
                $(".fresh").remove();
            });
            /*$(".deleteImageRuntime").on("click",function(){
             alert("chalo");
             $(this).parent().remove();
             });*/
            $("#input-43").fileinput({
                uploadUrl: '#', // you must set a valid URL here else you will get an error
                showPreview: false,
                //allowedFileTypes: ["image"],
                allowedFileExtensions: ["jpg"],
                //overwriteInitial: true,
                maxFileSize: 10000,
                maxFilesNum: 10,
                showRemove: false,
                showUpload: false,
                showUploadedThumbs: false,
                slugCallback: function ( filename ) {
                    return filename.replace( '(', '_' ).replace( ']', '_' );
                }
            }).on("filebatchselected", function(event, files) {
                var flag = false;
                var allowed_extensions = ["jpg", "jpeg"];
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    var ext = $(this).get(0).files[i].name.split('.');
                    var extension = ext[ext.length-1].toLowerCase();
                    if(jQuery.inArray(extension, allowed_extensions) === -1){
                        flag = true;
                    }
                }
                if(flag){
                    alert("Please enter JPG or JPEG format only!");
                    $(".btn-submit-webinfo").prop( "disabled", true );
                }else {
                    $(".btn-submit-webinfo").prop("disabled", false);
                }
                var fileList = this.files;
                finalFiles = [];
                finalIndexes = [];
                $.each(this.files,function(idx,elm){
                    finalFiles[idx]=elm;
                    finalIndexes[idx]=idx;
                });

                var anyWindow = window.URL || window.webkitURL;
                console.log(finalFiles);
                for(var i = 0; i < fileList.length; i++){
                    var objectUrl = anyWindow.createObjectURL(fileList[i]);
                    $('.imagePreview').append(
                        '<div class="col-md-12 added-images padding-left fresh">' +
                        '<div class="img-container">' +
                        '<div class="img-block">' +
                        '<img class="img-responsive" src="' + objectUrl + '" alt="">' +
                        '</div>' +
                        '</div>' +
                        '<span data-url="/deleteimageforwebsite/" data-index="'+finalIndexes[i]+'" class="zmdi zmdi-close editpicicon deleteImageRuntime"></span>' +
                        '<div class="banner-caption">' +

                        '<input class="form-control" name="new_banners[caption_title][]" type="text" placeholder="Title Caption" required>'+
                        '<input class="form-control" name="new_banners[caption][]" type="text" placeholder="Caption" required>'+
                        '</div>' +
                        '</div>');
                    window.URL.revokeObjectURL(fileList[i]);
                }
            });
            /*function previewImages(){
             var fileList = this.files;

             var anyWindow = window.URL || window.webkitURL;
             console.log(this.files);
             for(var i = 0; i < fileList.length; i++){
             var objectUrl = anyWindow.createObjectURL(fileList[i]);
             //$('.imagePreview').append('<img src="' + objectUrl + '" />');
             $('.imagePreview').append('<div class="col-md-3 padding-left">' +
             '<div class="col-md-12 add-images padding-left padding-right">' +
             '<img class="img-responsive img-height" src="' + objectUrl + '" alt="">' +
             '<span data-url="/deleteimageforwebsite/" class="zmdi zmdi-close editpicicon deleteImage"></span>' +
             '<input class="form-control" name="caption1[]" type="text" placeholder="Title Caption">'+
             '<input class="form-control" name="caption2[]" type="text" placeholder="Caption">'+
             '</div>' +
             '</div>');
             window.URL.revokeObjectURL(fileList[i]);
             }
             }*/
        });


        $(".btn-submit-webinfo").click(function(e){
            var val = $(".ceo-image").val();
            var logo = $(".logo").val();
            var docs = $(".docs");
            if (!val.match(/(?:jpg|png)$/) || !logo.match(/(?:jpg|png)$/)) {
                alert("Please select JPG or JPEG or PNG format only!");
                e.preventDefault();
            }

            var docs_allowed_extensions = ["pdf", "jpeg", "docx", "docs"];
            for (var i = 0; i <  docs.get(0).files.length; ++i) {
                var ext =  docs.get(0).files[i].name.split('.');
                var extension = ext[ext.length-1].toLowerCase();
                if(jQuery.inArray(extension, docs_allowed_extensions) === -1){
                    flag = true;
                }
            }
            if(flag){
                if (docs.get(0).files.length === 0) {
                    alert("For verification, please enter PDF or JPEG or DOCX format only!");
                    e.preventDefault();
                }
            }
        });
    </script>
    <script>
        $('.deleteImage').click(function(){
            var id =$(this).data('id');
            var url='/deleteWebsiteImage/'+id;
            // var
            var current =$(this);

            if (confirm('Are you sure you want to delete this Image?')) {
                $.ajax( {
                    url: url,
                    datatype: 'json',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                    },
                    success: function (e) {
                        alert(e.success);
                        current.parent().remove();
                    }
                } );
            }
        });
    </script>
    <script>
        $(document).on("click", ".check_it", function() {
            var id =$(this).data('id');
            var url='/check_image/'+id;
            // var
            var current =$(this);

            if (confirm('Are you to make this Image as Front Banner')) {
                $.ajax( {
                    url: url,
                    datatype: 'json',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                    },
                    success: function (e) {

                    }
                } );
            }
        });
    </script>
    <script>
        $('.agency-webeditor .summernote').summernote({
            height: 304,
            //placeholder: 'Type Description Here ....',
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear", "strikethrough", "superscript", "subscript"]],
                ["fontname", ["fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ['cleaner',['cleaner']], // The Button
                ["table", ["table"]],
                ["insert", ["link", /*"picture",*/ "video"]],
                ["view", ["fullscreen", /*"codeview",*/ "help"]]
            ],
            cleaner:{
                notTime: 5400, // Time to display Notifications.
                action: 'paste', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
                newline: '<br>', // Summernote's default is to use '<p><br></p>'
                notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
                icon: '<i class="fa fa-file-word-o">  Word Paste</i>',
                keepHtml: true, // Remove all Html formats
                keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>', '<h2>', '<h3>', '<h4>', '<h5>', '<span>', '<ol>', '<h6>', '<em>', '<sup>', '<sub>'], // If keepHtml is true, remove all tags except these
                keepClasses: false, // Remove Classes
                badTags: ['script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
                badAttributes: ['start'] // Remove attributes from remaining tags
            }
        });
    </script>