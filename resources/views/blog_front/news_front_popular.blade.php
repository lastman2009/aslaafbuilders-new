  <ul>
@foreach($most_view_blogs as $most_view_blog)
<?php
$base = "https://www.rightdeed.com";
// $title = explode(" ", $most_view_blog->title);
// $title = implode("-", $title);
 $title = str_slug($most_view_blog->title);
?>
<li>
<figure><a href="/blog/{{$most_view_blog->id}}/{{$title}}"><img src="{{ ab_image('images/blogs_images/sidebar_thumb_' . $most_view_blog->gallery, 'home_images/placeholders/area-' . (($loop->index % 5) + 1) . '.svg') }}" alt="{{ $most_view_blog->title }}">

</a></figure> <h4><a href="/blog/{{$most_view_blog->id}}/{{$title}}"> {{substr($most_view_blog->title ,0 , 70)}}..</a></h4>
<p data-max-characters="10"><?php echo strip_tags($most_view_blog->contant); ?></p>
<ul class="read-views">
  <li><a class="readmore"><i class="fa fa-eye"></i>{{$most_view_blog->view}} Views</a></li>
  <li><a class="readmore" href="/blog/{{$most_view_blog->id}}/{{$title}}"><i class="fa fa-external-link"></i> Details</a></li>
</ul>
</li>
@endforeach
</ul>    