@include("includes.title")
<?php $base="https://www.rightdeed.com"; ?>
<!-- Main Starts -->
<style>
  .form-wrapper {
        width: 100%;
        padding: 15px;
        background: #444;
        background: transparent;
        display: flex;
    }

    .form-wrapper input {
        width: 90%;
        height: 40px;
        padding: 10px 15px;
        float: left;
        font: bold 15px "lucida sans", "trebuchet MS", "Tahoma";
        border: 1px solid #ccc;
        background: #eee;
        -moz-border-radius: 3px 0 0 3px;
        -webkit-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;
    }
    .form-wrapper input:focus{
        outline: none;
    }
    .form-wrapper input::-webkit-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    .form-wrapper input:-moz-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    .form-wrapper input:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    .form-wrapper button {
        overflow: visible;
        position: relative;
        float: right;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 110px;
        font: bold 15px/40px "lucida sans", "trebuchet MS", "Tahoma";
        color: #fff;
        text-transform: uppercase;
        margin-right: 1px;
        background: #fc7303;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    }

    .form-wrapper button:hover {
        background: #fc7303;
    }

    .form-wrapper button:before {
        content: "";
        position: absolute;
        border-width: 8px 8px 8px 0;
        border-style: solid solid solid none;
        border-color: transparent #fc7303 transparent;
        top: 12px;
        left: -6px;
    }
    .news-list, .news-list-latest{
        padding:0;
        min-height: 136px;
	    margin-bottom: 40px !important;
    }
    .news-list .news-thumb,
    .news-list-latest .new-img{
        padding-left: 0;
    }
    .news-list-latest .new-img{
        border:1px solid #ccc;
        padding-right: 0;
    }
    .news-list-latest .post-info{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .news-list-latest .post-date, 
    .news-list-latest .post-date a {
    	color: #bdbdbd !important;
    }
    .news-list .post-title,
    .news-list-latest .post-title{
        min-height: 25px;
    }
    .news-list .post-title h3{
        margin-top: 0;
        margin-bottom: 0;
    }
    .news-list-latest .post-title h3{
        margin-bottom: 0;
    }
    .news-list .post-info.lower {
    	margin-top: 0;
    	border-bottom: none;
    	padding: 0;
    }
    .news-list .post-text p {
    	margin-top: 5px;
    }
    @media only screen and (max-width: 1199px){
        .form-wrapper input {
            width: 87.8%;
        }
    }
    @media only screen and (max-width: 991px){
        .form-wrapper input {
            width: 83.8%;
        }
    }
    @media only screen and (max-width: 767px){
        .form-wrapper input {
            width: 84%;
        }
    }
    @media only screen and (max-width: 753px){
        .form-wrapper input {
            width: 83.8%;
        }
    }
    @media only screen and (max-width: 753px){
        .form-wrapper input {
            width: 83.7%;
        }
    }
    @media only screen and (max-width: 400px){
        .padding-left{
            display: contents;
        }
    }

</style>
<main class="main-section blog-details blog-lisiting">
  <section class="page-section">
    <div class="container">
      <div class="row">

        <div class="col-md-12 blogs">
          <div class="col-md-12">
            <form action="/blog-search" class="form-wrapper cf">
                <input type="text" name="title" placeholder="Search here...">
                <button type="submit">Search</button>
            </form>
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12">

            
          @if(!empty($year) && !empty($month))
              <?php
          
              $dateObj = DateTime::createFromFormat('!m', $month);
                                
               $monthName = $dateObj->format('F');
              ?>
          <h2>Blog Of {{$monthName}} {{$year}} </h2>
          @elseif(!empty($category))
            <h2>Category: {{ucwords(implode(" ", explode("-", $category)))}}</h2>
          @else
            <h2>List Of All Latest News </h2>           
          @endif
         <?php $i = 0; ?>
          @foreach($blogs as $blog)  
          <?php
            $i++;
             $title = str_slug($blog->title);
          ?>
          <div class="col-md-12 col-sm-12 col-xs-12 bloglists <?php echo ($i<4) ? "news-list-latest" : "news-list"; ?>">
  <div class="<?php echo ($i<4) ? "new-img col-md-12" : "news-thumb col-md-4"; ?> col-sm-4 col-xs-12"> 
    <a href="/blog/{{$blog->id}}/{{$title}}">
      <img class="<?php echo ($i<4) ? "img-responsive" : "img-thumbnail"; ?>" src="<?php echo ($i<4) ? ab_image("images/blogs_images/$blog->gallery", 'home_images/placeholders/area-' . (($i % 5) + 1) . '.svg') : ab_image("images/blogs_images/thumb_$blog->gallery", 'home_images/placeholders/area-' . (($i % 5) + 1) . '.svg'); ?>" alt="{{ $blog->title }}">
    </a> 
  </div>
  <div class="blog-description  <?php echo ($i<4) ? "col-md-12" : "col-md-8 col-sm-8"; ?>  col-xs-12">
    <div class="post-title">
      <h3>
        <a href="/blog/{{$blog->id}}/{{$title}}" title="{{$blog->title}}">
            @if($i<4)
                {!! \Illuminate\Support\Str::words($blog->title, 100,'...')  !!}
            @else
                {!! \Illuminate\Support\Str::words($blog->title, 7,'...')  !!}
            @endif
        </a>
      </h3>
    </div>
    <div class="post-info post-date">
      Posted On<a class="extraspace"><strong>{{date('M jS, Y',strtotime($blog->created_at))}}</strong></a>
    </div>
    <div class="post-text">
      <p>
          @if($i<4)
            <?php if(strlen(strip_tags($blog->contant)) > 100) echo substr(strip_tags(strip_tags($blog->contant)),0,300).'...'; else echo strip_tags($blog->contant); ?>
          @else
            <?php if(strlen(strip_tags($blog->contant)) > 100) echo substr(strip_tags(strip_tags($blog->contant)),0,100).'...'; else echo strip_tags($blog->contant); ?>
          @endif
         
      </p>
    </div>

    <div class="post-info lower">
      <ul>
        <li>
          <a href="javascript:void(0)">
            <i class="fa fa-comments"></i>
            <strong>
              @if($blog->comment_count == 0)
              No Comments
              @else 
              {{$blog->comment_count}} Comments 

              @endif
            </strong>
          </a>
        </li>
        <li class="pull-right">
          <a href="/blog/{{$blog->id}}/{{$title}}" class="read-more">Read More</a>
        </li>
      </ul>
    </div> 
  </div>
</div>

            @endforeach
            
        <div class="col-md-12 text-center">
          <nav aria-label="Page navigation example" style="float:left;width:100%;">
          {{$blogs->links()}}
         
          </nav>
        </div>
          </div>
         <div class="col-md-4 col-sm-12 col-xs-12 sidebar" style="background-color: #EEEDEA;border-radius: 35px;">
              <div class="recent-blogs">
                 <h2>Subscribe For Daily Alert</h2>
            <form action="/subscribeme" id="submit_form">

                <div class="">
                    <div class="input-group">
                        <input type="text" class="form-control" id="sub_email" name="email"
                               placeholder="Enter your email">
                        <span class="input-group-btn" style="top:-7px;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <button class="btn btn-theme subscribe_email">Subscribe</button>
              </span>
                    </div>
                </div>
            </form>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12 sidebar">
           <div class="recent-blogs">
              <h2>Latest News</h2>
            @include('blog_front.blog_front_popular')
              
            
            </div>
                
           
            <div class="recent-blogs text-center">
              <img src="/assets/images/sidebar_ad_1.jpg">
            </div>
         
            </div>
          </div>
          
      </div>
    </div>
  </section>
  <section class="page-section comments">
    <div class="container">
      <div class="row"> </div>
    </div>
  </section>
</main>
<!-- main ends -->
@include('includes.footer')
<script>
  $(document).ready(function (e) {

    $('.subscribe_email').click(function (e) {
      e.preventDefault();

      function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
      };

      var email = $('#sub_email').val();

      if (email !== "") {  // If something was entered
        if (isValidEmailAddress(email)) {
          // alert('email hun');
          var form = $('#submit_form').serialize();
          // alert(form);
          var type = 'GET';
          $('#sub_email').val("");
          $('#loadingmessage').show();

          $.ajax({

            type: type,
            url: '/subscribe/email',
            data: form,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (e) {
              $('#loadingmessage').hide();

              if (e.success == 1) {
                toastr.success("You are Subscribed");
              }
              else if (e.success == 2) {
                toastr.error("Some Error in Connection");
              }
              else if (e.success == 3) {
                toastr.warning("You Are Already Subscribed");
              }
              else if (e.success == 4) {
                toastr.warning("Connection Failed");
              }
            }

          });
        }
        else {
          toastr.error("Please Enter proper Email Format");
        }
      }

    });
  });
</script>