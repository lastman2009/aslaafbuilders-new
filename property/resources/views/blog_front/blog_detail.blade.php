@php
// if(!empty($blog->meta_title))
// {
// $title =$blog->meta_title;
// }
// else{
// $title =$blog->title;
// }  
$base="https://www.rightdeed.com/";
$title = (!empty($blog->meta_title) ? $blog->meta_title : $blog->title);
$keyword =$blog->meta_keyword;
$description =$blog->meta_description;

@endphp
@include("includes.title")
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<style>
    .hover_news{
    border-radius: 15px;

     border: 2px solid #ff8a2e; 
    background: #fff;
    color:#000;
    }
  .hover_news:hover {
            background: #fa6919!important;
    color: #fff;
    border: 1px solid #fa6919;
    }
</style>
<!-- Main Starts -->
<main class="main-section blog-details">
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blogs">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <h1>{{$blog->title}} </h1>
                        <div class="blog-section col-md-12">
                            <div class="blog-header col-md-12"><img class="img-responsive"
                                                                    src="{{ ab_image('images/blogs_images/' . $blog->gallery, 'home_images/placeholders/area-1.svg') }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="blog-description col-md-12">
                                <?= $blog->contant; ?>
                                @if(!empty($blog->info_graphic) && file_exists(public_path('images/blogs_images/' . $blog->info_graphic)))
                                <div class="blog-header col-md-12"><a
                                            href="/images/blogs_images/{{$blog->info_graphic}}"
                                            data-lightbox="roadtrip"> <img class="img-responsive"
                                                                           src="/images/blogs_images/{{$blog->info_graphic}}" alt="{{ $blog->title }} infographic"></a>
                                </div>
                                @endif
                                <div class="col-md-12 meta-data">
                                    <ul class="pull-left">
                                        <li><span><i class="fa fa-clock-o"></i> {{date('M jS, Y',strtotime($blog->created_at))}}</span>
                                        </li>
                                        <li><span><i class="fa fa-user-o"></i> {{$blog->author_name}}</span>
                                        </li>
                                        <li><span><i class="fa fa-eye"></i> {{$blog->view}} View(s)</span></li>
                                        <li>
                                            <span><i id="comment" class="fa fa-comments"></i> {{$blog->comment_count}} Comment(s)</span>
                                        </li>
                                    </ul>
                                    <ul class="social-blog-share pull-right">
                                        <li style="margin-right: 0;margin-left:5px;">
                                            <a class="share-button btn btn-facebook"
                                               data-share-url="http://rightdeed.com/blog/{{$blog->id}}/{{str_slug($blog->title)}}"
                                               data-share-network="facebook" data-share-text="Share on Facebook"
                                               data-share-title="{{$blog->title}}" data-share-via="" data-share-tags=""
                                               data-share-media="http://rightdeed.com/images/blogs_images/thumb_{{$blog->gallery}}"
                                               href="#" style="width:40px;">
                                                <i class="fa fa-facebook" style="color: #fff;"></i>
                                            </a>
                                        </li>
                                        <li style="margin-right: 0;margin-left:5px;">
                                            <a class="share-button btn btn-twitter"
                                               data-share-url="http://rightdeed.com/blog/{{$blog->id}}/{{str_slug($blog->title)}}"
                                               data-share-network="twitter" data-share-text="Share on twitter"
                                               data-share-title="{{$blog->title}}" data-share-via="jqueryscript"
                                               data-share-tags=""
                                               data-share-media="http://rightdeed.com/images/blogs_images/thumb_{{$blog->gallery}}"
                                               href="#" style="width:40px;">
                                                <i class="fa fa-twitter" style="color: #fff;"></i>
                                            </a>
                                        </li>
                                        <li style="margin-right: 0;margin-left:5px;">
                                            <a class="share-button btn btn-google"
                                               data-share-url="http://rightdeed.com/blog/{{$blog->id}}/{{str_slug($blog->title)}}"
                                               data-share-network="googleplus" data-share-text="Share on Google+"
                                               data-share-title="{{$blog->title}}" data-share-via="" data-share-tags=""
                                               data-share-media="http://rightdeed.com/images/blogs_images/thumb_{{$blog->gallery}}"
                                               href="#" style="width:40px;">
                                                <i class="fa fa-google-plus" style="color: #fff;"></i>
                                            </a>
                                        </li>
                                        <li style="margin-right: 0;margin-left:5px;">
                                            <a class="share-button btn btn-linkedin"
                                               data-share-url="http://rightdeed.com/blog/{{$blog->id}}/{{str_slug($blog->title)}}"
                                               data-share-network="linkedin" data-share-text="Share on LinkedIn"
                                               data-share-title="{{$blog->title}}" data-share-via="" data-share-tags=""
                                               data-share-media="http://rightdeed.com/images/blogs_images/thumb_{{$blog->gallery}}"
                                               href="#" style="width:40px;">
                                                <i class="fa fa-linkedin" style="color: #fff;"></i>
                                            </a>
                                        </li>
                                        <li style="margin-right: 0;margin-left:5px;">
                                            <a class="share-button btn btn-pinterest"
                                               data-share-url="http://rightdeed.com/blog/{{$blog->id}}/{{str_slug($blog->title)}}"
                                               data-share-network="pinterest" data-share-text="Share on Pinterest"
                                               data-share-title="{{$blog->title}}" data-share-via="" data-share-tags=""
                                               data-share-media="http://rightdeed.com/images/blogs_images/thumb_{{$blog->gallery}}"
                                               href="#" style="width:40px;">
                                                <i class="fa fa-pinterest" style="color: #fff;"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="col-md-12 blog-comments">
                                    <h3>{{$blog->comment_count}} Comments</h3>
                                    <ul>
                                        <li>
                                            <input type="hidden" value="{{$blog->id}}" id="b_id">
                                            @foreach($comments as $commentt)
                                            @if($commentt->parent_id==0)
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php $image = App\User::getUserImage($commentt->user_id); ?>
                                                @if($image != "")
                                                <figure><img src="../../image/profile/{{$image}}" alt=""></figure>
                                                @else

                                                <figure><img src="../../images/avatar/user-avatar.jpg" alt=""></figure>
                                                @endif
                                                <div class="infoText">
                                                    <h3>{{App\User::getUserName($commentt->user_id)}}</h3>
                                                    <p>
                                                        <small>{{date('F j, Y \A\T h:i A',
                                                            strtotime($commentt->created_at))}}
                                                        </small>
                                                    </p>
                                                    <p class="coments"> {{$commentt->comment}}
                                                        @if(Auth::check())
                                                        @if(Auth::user()->role_id==1 || $commentt->user_id == Auth::id())
                                                        <button id="edite_{{$commentt->id}}"><i class="fa fa-pencil"
                                                                                                aria-hidden="true"></i>
                                                        </button>
                                                        <button id="delete_comment_{{$commentt->id}}"
                                                                data-id="{{$commentt->id}}"><i class="fa fa-trash-o"
                                                                                               aria-hidden="true"></i>
                                                        </button>
                                                        @endif
                                                        @endif
                                                    </p>
                                                    <div class="showinput">
                                                        <div id='update_{{$commentt->id}}' style="display:none">
                                                            <input type="text" value="{{$commentt->comment}}"
                                                                   name="comment_update" class="form"
                                                                   id="update_comment_{{$commentt->id}}"
                                                                   placeholder="Text">
                                                            <a class="btn show-sned" id="update_send_{{$commentt->id}}"
                                                               data-comment="{{$commentt->id}}"
                                                               data-blog="{{$blog->id}}">Update</a>
                                                        </div>
                                                    </div>
                                                    <script>
                                                      $('#edite_{{$commentt->id}}').click(function () {
                                                        $('#update_{{$commentt->id}}').show();
                                                      });
                                                      $('#update_send_{{$commentt->id}}').click(function () {

                                                        var blog_id = $(this).data("blog");
                                                        var comment_id = $(this).data("comment");
                                                        var comment = $('#update_comment_{{$commentt->id}}').val();
                                                        var url = '/blogCommentsUpdate/' + comment_id + '/' + comment;
                                                        //alert(comment_id);

                                                        $.ajax({
                                                          url: url,
                                                          type: 'POST',
                                                          headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                          },

                                                          success: function (data) {
                                                            //alert(data);
                                                            location.reload();
                                                          }
                                                        });
                                                      });

                                                      $('#delete_comment_{{$commentt->id}}').click(function () {
                                                        var id = $(this).data('id');
                                                        var url = '/commentDelete/' + id;

                                                        if (confirm('Are you sure you want to remove this?')) {
                                                          $.ajax({
                                                            url: url,
                                                            datatype: 'json',
                                                            method: 'POST',
                                                            headers: {
                                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            success: function (e) {
                                                              location.reload();

                                                            }
                                                          });
                                                        }
                                                      });
                                                    </script>
                                                    <?php
                                                    $c_id = "";
                                                    $c_id = $commentt->id;
                                                    ?>
                                                    @if(Auth::id()!="")
                                                    <div class="showinput">
                                                        <div id="btn_<?php echo $c_id; ?>"
                                                             class="reply-coments pull-right action">Reply <i
                                                                    class="fa fa-caret-down"></i>
                                                        </div>
                                                        <div id='reply_<?php echo $c_id; ?>' class=""
                                                             style="display:none">
                                                            <input type="text" name="comment_reply" class="form"
                                                                   id="reply_comment_<?php echo $c_id; ?>"
                                                                   placeholder="Text">
                                                            <a class="btn show-sned"
                                                               id="reply_send_<?php echo $c_id; ?>"
                                                               data-comment="{{$commentt->id}}"
                                                               data-blog="{{$blog->id}}">send</a>
                                                        </div>
                                                        <div>
                                                            <span id="error_massege-{{$c_id}}"
                                                                  style="display:none; float: left; color:red; margin-top:0px;">Please write something to post a comment</span>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                      $("#btn_<?php echo $c_id; ?>").click(function(){
                                                        $("#reply_<?php echo $c_id; ?>").show();
                                                      });
                                                      $('#reply_send_<?php echo $c_id; ?>').click(function () {
                                                        $("#error_massege-{{$c_id}}").hide();
                                                        var blog_id = $(this).data('blog');
                                                        var comment_id = $('#comment_p_id_<?php echo $c_id; ?>').val();
                                                        var url = '/blogComment/' + blog_id + '/' + comment_id;
                                                        var comment = $('#reply_comment_<?php echo $c_id; ?>').val();
                                                        if (comment != "") {
                                                          $.ajax({
                                                            url: url,
                                                            type: 'GET',
                                                            headers: {
                                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            data: {
                                                              idss: comment
                                                            },
                                                            success: function (data) {
                                                              location.reload();
                                                            }
                                                          });
                                                        } else {
                                                          $("#error_massege-{{$c_id}}").show();
                                                        }
                                                      });
                                                    </script>
                                                    @endif
                                                    <input type="hidden" name="comment_p_id"
                                                           id="comment_p_id_<?php echo $c_id; ?>"
                                                           value="{{$commentt->id}}">
                                                </div>
                                            </div>
                                            @endif
                                            @foreach($parentComments as $parentComment)
                                            @if($parentComment->parent_id==$commentt->id)
                                            <div class="col-md-11 col-md-offset-1 col-sm-12 col-xs-12 reply-text">
                                                <?php $image = App\User::getUserImage($parentComment->user_id); ?>
                                                @if($image != "")
                                                <figure><img src="../../image/profile/{{$image}}" alt=""></figure>
                                                @else

                                                <figure><img src="../../images/avatar/user-avatar.jpg" alt=""></figure>
                                                @endif
                                                <div class="infoText">
                                                    <h3>{{App\User::getUserName($parentComment->user_id)}}</h3>
                                                    <p>
                                                        <small>{{date('F j, Y \A\T h:i A',
                                                            strtotime($parentComment->created_at))}}
                                                        </small>
                                                    </p>
                                                    <p class="coments coment-reply">{{$parentComment->comment}}
                                                        @if(Auth::check())
                                                        @if(Auth::user()->role_id==1)

                                                        <button id="edite_child_{{$parentComment->id}}"><i
                                                                    class="fa fa-pencil" aria-hidden="true"></i>
                                                        </button>
                                                        <button id="delete_child_comment_{{$parentComment->id}}"
                                                                data-id="{{$parentComment->id}}"><i
                                                                    class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                        @endif
                                                        @endif

                                                    </p>


                                                    <div class="showinput">
                                                        <div id='update_child_{{$parentComment->id}}'
                                                             style="display:none">
                                                            <input type="text" value="{{$parentComment->comment}}"
                                                                   name="comment_reply" class="form"
                                                                   id="update_child_comment_{{$parentComment->id}}"
                                                                   placeholder="Text">
                                                            <a class="btn show-sned"
                                                               id="update_send_{{$parentComment->id}}"
                                                               data-comment="{{$parentComment->id}}"
                                                               data-blog="{{$blog->id}}">Update</a>
                                                        </div>
                                                    </div>
                                                    <script>
                                                      $('#edite_child_{{$parentComment->id}}').click(function () {
                                                        $('#update_child_{{$parentComment->id}}').show();
                                                      });

                                                      $('#update_send_{{$parentComment->id}}').click(function () {

                                                        var comment_id = $(this).data("comment");
                                                        var comment = $('#update_child_comment_{{$parentComment->id}}').val();


                                                        var url = '/blogCommentsUpdate/' + comment_id + '/' + comment;


                                                        $.ajax({
                                                          url: url,
                                                          type: 'POST',
                                                          headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                          },

                                                          success: function (data) {
                                                            //alert(data);
                                                            location.reload();
                                                          }
                                                        });
                                                      });
                                                      $('#delete_child_comment_{{$parentComment->id}}').click(function () {
                                                        var id = $(this).data('id');
                                                        var url = '/commentDelete/' + id;

                                                        if (confirm('Are you sure you want to remove this?')) {
                                                          $.ajax({
                                                            url: url,
                                                            datatype: 'json',
                                                            method: 'POST',
                                                            headers: {
                                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            success: function (e) {
                                                              location.reload();

                                                            }
                                                          });
                                                        }
                                                      });

                                                    </script>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-area post-comment">
                            <h3>Post a comment</h3>
                            @if(Auth::user()=="")
                            <h4><a href="/loginForm">login</a> before posting a comment.</h4>
                            @else
                            <form role="form">
                                <div class="form-group mesg">
                                    <textarea class="form-control" type="textarea" id="message" placeholder="Message"
                                              maxlength="500" rows="7" required></textarea>
                                </div>
                                <span id="parent_error_massege"
                                      style="display:none; float: left; color:red; margin-top:0px;">Please write something to post a comment</span>
                                <button type="button" id="m_com" class="btn btn-primary pull-right">Post a comment
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 sidebar" >
                        <div class="recent-blogs">
                            <h2>Popular Posts</h2>
                            @include('blog_front.blog_front_popular')
                            <!-- /]////lol..... -->
                        </div>
                        <div class="recent-blogs categories"  style="display:none;">
                            <h2>Categories</h2>
                            <ul>
                                @foreach($categories as $category)
                                <li><i class="fa fa-folder"></i><a href="/blog-{{implode(" -",explode(" ",
                                    strtolower($category->title)))}}/{{$category->id}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="archive-blogs archives" style="display:none;" >
                            <h2>Blog Archives</h2>
                            <ul class="list-unstyled">
                                @foreach($years as $year)
                                <li class="archive-year"><span><i class="fa fa-calendar" aria-hidden="true"></i> {{$year->year}}</span>
                                    <ul class="archive-month">
                                        @foreach($blogsArchives as $blogss)
                                        @if($blogss->year == $year->year)
                                        <?php
                                        $dateObj = DateTime::createFromFormat('!m', $blogss->month);

                                        $month = $dateObj->format('F');
                                        ?>
                                        <li><a href="/blogslist/{{$year->year}}/{{$blogss->month}}"><i
                                                        class="fa fa-check" aria-hidden="true"></i>
                                                {{$month}}<span>({{$blogss->count_blog}})</span></a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                      
                        <div class="recent-blogs text-center"><a href="https://www.rightdeed.com/signup"> <img src="/assets/images/sidebar_ad_1.jpg"></a></div>
                         {{-- <div class="recent-blogs text-center"><img src="../../assets/images/img2.jpg"></div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section comments">
        <div class="container">
            <div class="row"></div>
        </div>
    </section>
</main>
<!-- main ends -->

@include('includes.footer')

<script>
  $(function () {
    var div = $('#showOrHideDiv');
    div.hide();
    $('.action').click(function () {
      div.slideDown("slow");
      $(this).fadeOut();
    });
  });
</script>

<script type="text/javascript">

  $(document).ready(function () {
    $('#m_com').click(function () {
      $("#parent_error_massege").hide();
      var blog_id = $('#b_id').val();
      var url = '/blogComments/' + blog_id;
      var comments = $('#message').val();
//            alert(comment);
      if (comments != "") {
        $.ajax({
          url: url,
          type: 'GET',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            commentt: comments
          },
          success: function (data) {
            //alert(data);
            location.reload();
          }
        });
      } else {
        $("#parent_error_massege").show();
      }
    });


  });
</script>

<script>
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
  })
</script>
<script type="text/javascript">
  $(document).ready(function () {

    $('.share-button').simpleSocialShare();

  });
</script>
