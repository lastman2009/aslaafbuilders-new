@php
$title = "Blog Edit";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )
<!-- Row -->
<div class="page-wrapper">
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12 col-sm-12">
         <div  class="tab-struct custom-tab-2 mt-40">
            <div class="tab-content">
               <form action="/update_blog/{{$blog->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-lg-12 padding-right theme-heading">
                        <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                           <div class="panel panel-default card-view blogimageheight">
                              <div class="panel-wrapper collapse in">
                                 <div class="panel-body">
                                    <div class="row">
                                       <div class="col-md-12 padding-right">
                                          <div class="col-md-12 padding-left">
                                             <div class="form-group">
                                                <input type="text" id="" name="title" value="{{$blog->title}}" placeholder="Blog Title" required/>
                                                @if ($errors->has('title'))
                                                <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                                @endif
                                             </div>
                                          </div>
                                           <div class="col-md-12 padding-left">
                                             <div class="form-group">
                                                <input type="text" id="" name="author_name" value="{{$blog->author_name}}" placeholder="Blog Author Name" />
                                                @if ($errors->has('author'))
                                                <div class="error" style="color: red">{{ $errors->first('author_name') }}</div>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="col-md-12 padding-left">
                                             <div class="form-group">
                                                <textarea  class="form-control blog-tinymice" rows="8" cols="50" name="contant" id="" placeholder="Blog Description ...">{{$blog->contant}}</textarea>
                                                @if ($errors->has('contant'))
                                                <div class="error" style="color: red">{{ $errors->first('contant') }}</div>
                                                @endif
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                           <div class="panel panel-default card-view blogimageheight margin-blog-img">
                              <div class="panel-wrapper collapse in">
                                 <div class="panel-body imgheights">
                                    <div class="col-md-offset-4 col-md-4 add-images padding-left padding-right">
                                       <img class="img-responsive img-height" src="../../images/blogs_images/{{$blog->gallery}}" alt="">
                                       <a href="/delete_blog_image/{{$blog->gallery}}/{{$blog->id}}" class="zmdi zmdi-close editpicicon"></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel panel-default card-view blogimageheight">
                              <div class="panel-wrapper collapse in">
                                 <div class="panel-body">
                                    <div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section">
                                       <div class="blog-img-uploaded">
                                          <figure class="edit-profile-image img-blogs">
                                             <img id="myImg1" class="blog_img_upload" src="../../assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
                                          </figure>
                                          <div class="text-center">
                                             <input type="file" name="photo" id="file-1" class="inputfile inputfile-1" />
                                             <label class="fileupload-blog" for="file-1">Upload Image</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 padding-left padding-right blog-portion">
                     <div class="panel panel-default card-view blogimageheight newblog-height" style="    padding: 69px 31px 0px;">
                        <div class="panel-wrapper collapse in category-multi newmulti">
                           <h2>Meta</h2>
                           <div class="panel-body">
                              <div class="col-md-4">
                                 <label for="meta_keyword">Meta Keyword</label>
                                 <input type="text" name="meta_keyword" value="{{$blog->meta_keyword}}">
                              </div>
                              <div class="col-md-4"> 
                                 <label for="meta_keyword">Meta Description</label>
                                 <input type="text" name="meta_description"  value="{{$blog->meta_description}}">
                              </div>
                              <div class="col-md-4"> 
                                 <label for="meta_title">Meta Title</label>
                                 <input type="text" name="meta_title" value="{{$blog->meta_title}}" >
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 pd-top blog-portion padding-left">
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-right ">
                           <div class="panel panel-default card-view blogimageheight margin-blog-img">
                              <div class="panel-wrapper collapse in">
                                 <div class="panel-body">
                                    <div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section padding-left padding-right">
                                       <div class="blog-img-uploaded mynewpadding" style="padding-bottom: 71px;">
                                          @if($blog->info_graphic != "")
                                          <figure class="edit-profile-image">
                                             <img class="blog_img_upload img-responsive img-height" src="../../images/blogs_images/{{$blog->info_graphic}}" alt="">
                                             <a href="/delete_blog_info_graphic/{{$blog->info_graphic}}/{{$blog->id}}" class="zmdi zmdi-close editpicicon"></a>
                                          </figure>
                                          @else
                                          <figure class="edit-profile-image img-blogs">
                                             <img class="blog_img_upload img-responsive img-height" src="../../assets_admin/dist/img/selcetimg.jpg" alt="">
                                          </figure>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-right">
                           <div class="panel panel-default card-view blogimageheight">
                              <div class="panel-wrapper collapse in category-multi newmulti">
                                 <h2>Info Graphic Image</h2>
                                 <div class="panel-body">
                                    <div class="col-lg-12 col-sm-12 text-center profile_image blog-img-section padding-left padding-right">
                                       <div class="blog-img-uploaded mynewpadding">
                                          <figure class="edit-profile-image img-blogs">
                                             <img id="myImg2" class="blog_img_upload" src="../../assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
                                          </figure>
                                          <div class="text-center">
                                             <input type="file" name="info_graphic" id="file-2" class="inputfile inputfile-1"/>
                                             <label class="fileupload-blog" for="file-2">Upload Image</label>
                                             @if ($errors->has('info_graphic'))
                                             <div class="error" style="color: red">{{ $errors->first('info_graphic') }}</div>
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 padding-right theme-heading">
                        <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                           <div class="col-lg-12 category-multi">
                              <h2>Categories</h2>
                              <div class="row">
                                 <div class="col-md-12 padding-right">
                                    <div class="col-sm-12 padding-left">
                                       <div class="button-box"> 
                                          <a id="select-all" class="btn-select-all btn btn-outline mt-15" href="#"><i class="fa fa-forward" aria-hidden="true"></i></a> 
                                          <a id="deselect-all" class="btn-deselect-all btn btn-outline mt-15" href="#"><i class="fa fa-backward" aria-hidden="true"></i></a> 
                                       </div>
                                       <select multiple id="public-methods" name="category_id[]">
                                          <?php
                                             $blog_cat = array();
                                             if(isset($blog_categories))
                                             {
                                                 foreach($blog_categories as $blog_catg)
                                                 {
                                                     $blog_cat[]=$blog_catg->category_id;
                                                 }
                                             }
                                                 foreach($categories as $category)
                                                 {
                                                     $select_atr = '';
                                                     if(in_array($category->id,$blog_cat))
                                                     {
                                                         $select_atr = 'selected="selected"';
                                                     }
                                             ?>
                                          <option value="{{$category->id}}" <?php echo $select_atr;?> >{{$category->title}}</option>
                                          <?php
                                             }
                                             
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 padding-right theme-heading">
                        <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                           <div class="col-lg-12 category-multi">
                              <h2>Tags</h2>
                              <div class="row">
                                 <div class="col-md-12 padding-right">
                                    <div class="col-sm-12 padding-left">
                                       <div class="button-box"> 
                                          <a id="select-tag-all" class="btn-select-all btn btn-outline mt-15" href="#"><i class="fa fa-forward" aria-hidden="true"></i></a> 
                                          <a id="deselect-tag-all" class="btn-deselect-all btn btn-outline mt-15" href="#"><i class="fa fa-backward" aria-hidden="true"></i></a> 
                                       </div>
                                       <select multiple id="pre-selected-options" name="tags_ids[]">
                                          <?php
                                             $blog_tagss = array();
                                             if(isset($blog_tags))
                                             {
                                                 foreach($blog_tags as $blog_tag)
                                                {
                                                     $blog_tagss[]=$blog_tag->tag_id;
                                                 }
                                             }
                                             
                                             foreach($tags as $tag)
                                             {
                                             $select_atr = '';
                                             if(in_array($tag->id,$blog_tagss))
                                             {
                                                 $select_atr = 'selected="selected"';
                                             }
                                             ?>
                                          <option value="{{$tag->id}}" <?php echo $select_atr;?> >{{$tag->title}}</option>
                                          <?php
                                             }
                                             
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 padding-right theme-heading">
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-left">
                           <div class="panel panel-default card-view">
                              <div class="panel-wrapper collapse in">
                                 <div class="panel-body submit-blog">
                                    <div class="col-lg-offset-4 col-lg-8 col-md-12 col-sm-12">
                                       <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
   $(document).ready(function(){
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
@if (session('error'))
<script>
   $(window).load(function(){
        //window.setTimeout(function(){
            $.toast({
                heading: 'Error',
                text: '{{ Session::get('error') }}',
                position: 'top-right',
                loaderBg:'#fec107',
                icon: 'error',
                hideAfter: 6000, 
                stack: 6
            });
        //}, 6000);
    });
    
</script>
@endif