@php
$title = "Add Blog";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )
<style type="text/css">
   .file-preview{
   padding: 20px !important;
   }
   .file-caption-main{
        margin-left: 15px;
    padding-right: 30px;
   }
</style>
<div class="page-wrapper">
<div class="container-fluid">
<div class="row">
   <div class="col-lg-12 col-sm-12">
      <div  class="tab-struct custom-tab-2 mt-40">
         <div class="tab-content">
            <form action="/uploaded_images_save" class="form-horizontal" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">
                  <div class="col-lg-12 padding-right theme-heading">
                     <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                        <div class="">
                           <div class="panel-wrapper collapse in">
                              <div class="panel-body">
                                 <div class="row">
                                    <div class="col-md-12 padding-right">
                                       <div class="col-md-12 padding-left">
                                          <div class="form-group">
                                             <label for="title" class="control-label col-md-2">Title</label>
                                             <div class="col-md-10">
                                                <input type="text" name="title" required class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 padding-left">
                                          <div class="form-group">
                                             <label for="contant" class="control-label col-md-2">Description</label>
                                             <div class="col-md-10">
                                                <input type="text" name="description" class="form-control" required>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 padding-right theme-heading image-info-tab" >
                           <div class="col-lg-12 col-md-12 col-sm-12 padding-left property-sectione add-property-img-uploader">
                              <div class="form-actions edit-form-submit">
                                 <div class="panel panel-default card-view portfolio-img-tab profile-Image-tab multi-files-uploader">
                                    <div class="panel-wrapper collapse in">
                                       <div class="panel-body portfolio-role profile-role">
                                          <div class="form-group">
                                             <input id="file-1" type="file" style="z-index: 0;" name="images[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="panel panel-default card-view">
                     <div class="panel-wrapper collapse in">
                        <div class="panel-body submit-property">
                           <button type="reset" class="btn btn-reset">Reset</button>
                           <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                     </div>
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /Row -->
@include( 'includes_admin.footer' )
<script>
   $(function() {
       $('.property_type_extra_feature').change(function(){
   // $('.extra-feature-tab').show();
   $('#image-info').show();
   $('#extraFeature').show();
   // blink();
   });
   });
   $('#image-info').click(function() {
      $('.image-info-tab').toggle('slow');
   // $('#target2').hide();
   });
   $('#extraFeature').click(function() {
      $('.extra-feature-tab').toggle('slow');
   // $('#target2').hide();
   });   
</script>
<script>
   $( ".file" ).fileinput( {
   
   uploadUrl: '#', // you must set a valid URL here else you will get an error
   allowedFileExtensions: [ 'jpg', 'png', 'gif','jp2' ],
   overwriteInitial: true,
   maxFileSize: 4000,
   maxFilesNum: 1,
   maxFileCount: 11,
   showRemove: false,
   showUpload: false,
   showUploadedThumbs: false,
   resizeImage: {
   width: 800,
   height: 800,
   crop: false,
   quality: 100        },
   allowedFileTypes: [ 'image', 'video', 'flash','jp2' ],
   slugCallback: function ( filename ) {
   return filename.replace( '(', '_' ).replace( ']', '_' );
   }
   
   
   } );
</script>
<script>
   $(document).on('ready', function() {
       $("#input-41").fileinput({
           maxFileCount: 1,
           allowedFileTypes: ["video"],
           showUpload: false,
           layoutTemplates: {
               main1: "{preview}\n" +
               "<div class=\'input-group {class}\'>\n" +
               "   <div class=\'input-group-btn\'>\n" +
               "       {browse}\n" +
               "       {upload}\n" +
               "       {remove}\n" +
               "   </div>\n" +
               "   {caption}\n" +
               "</div>"
           },
           previewFileType: "image",
           browseIcon: "<i class=\"fa fa-play\"></i> ",
           browseLabel: " ",
           removeLabel: " ",
       });
   });
</script>
<script type="text/javascript">
   $( document ).ready( function () {
       $( '#file-1' ).click( function () {
           $( '.multi-files-uploader .fileinput-remove' ).trigger( 'click' );
       } );
   
   ///////Function to ristrict max lenght of price input field///////
   $("#mytext").attr('maxlength', '9');
   } );
</script>