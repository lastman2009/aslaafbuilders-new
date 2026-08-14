@include("includes.title")
<?php
$base_url = "https://www.rightdeed.com";
?>
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
            <h2>List Of All Latest Blog </h2>           
            @endif

            @foreach($blogs as $blog)  
            <?php
            $title = str_slug($blog->title);
            ?>
            <div class="col-md-6 col-sm-12 col-xs-12 bloglists">
              <div class="blog-header"> <a href="/blog/{{$blog->id}}/{{$title}}">
                <img class="img-responsive" src="{{ ab_image('images/blogs_images/thumb_' . $blog->gallery, 'home_images/placeholders/area-' . (($loop->index % 5) + 1) . '.svg') }}" alt="{{ $blog->title }}"></a> </div>
              <div class="blog-description">
                <div class="post-info">
                 Posted On<a class="extraspace"><strong>{{date('M jS, Y',strtotime($blog->created_at))}}</strong></a>
               </div>

               <div class="post-title"><h3><a href="/blog/{{$blog->id}}/{{$title}}" title="{{$blog->title}}">{!! \Illuminate\Support\Str::words($blog->title, 14,'...')  !!}</a></h3></div>
               <div class="post-text"><p><?php if(strlen(strip_tags($blog->contant)) > 30) echo substr(strip_tags(strip_tags($blog->contant)),0,30).'...'; else echo strip_tags($blog->contant); ?> </p></div>

               <div class="post-info lower">
                <ul>
                  <li><a href="javascript:void(0)"><i class="fa fa-comments"></i><strong>
                    @if($blog->comment_count == 0)
                    No Comments
                    @else 
                    {{$blog->comment_count}} Comments 

                  @endif</strong></a></li>

                  <li class="pull-right"><a href="/blog/{{$blog->id}}/{{$title}}" class="read-more">Read More</a></li>
                </ul>
              </div> 
            </div>
          </div>
          @endforeach

          <div class="col-md-12 text-center">
            <nav aria-label="Page navigation example" style="float:left;width:100%;">
              {{$blogs->links()}}
          <!--   <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> -->
          </nav>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12 sidebar">
       <div class="recent-blogs">
        <h2>Popular Posts</h2>
        @include('blog_front.blog_front_popular')

        <!-- /////LOL.../ -->
      </div>

      <div class="recent-blogs categories">
        <h2>Categories</h2>
        <ul>
          @foreach($categories as $category)
          <li><i class="fa fa-folder"></i><a href="/blog-{{implode("-",explode(" ", strtolower($category->title)))}}/{{$category->id}}">{{$category->title}}</a></li>
          @endforeach
        </ul>
      </div>
      <!--<div class="recent-blogs text-center">-->
      <!--  <img src="/assets/images/sidebar_ad_1.jpg">-->
      <!--</div>-->
      <!--<div class="recent-blogs text-center">-->
      <!--  <img src="/assets/images/sidebar_ad_2.jpg">-->
      <!--</div>-->
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
