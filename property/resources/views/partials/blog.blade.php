							<div class="col-md-3 hidden-xs pr home-blog">
								<div class="col-md-12 no-padding">
									<div class="blog-head">
										<h3>Latest from Blogs</h3>
									</div>
								</div>
								@foreach($blogs as $blog)
								<div class="col-md-12 col-sm-6 col-xs-12 no-padding margin-top">
									<div class="col-md-4 col-sm-4 col-xs-3 no-padding blog_thumb">
										<a href="/blog/{{$blog->id}}/{{ str_slug($blog->title)}}">
										    <img class="img-responsive" src="/images/blogs_images/sidebar_thumb_{{$blog->gallery}}" alt="{{ str_slug($blog->title)}}"></a>
									</div>
									<div class="col-md-8 col-sm-8 col-xs-9 no-padding blog-des">
										<h3 ><a href="/blog/{{$blog->id}}/{{ str_slug($blog->title)}}">{{ str_limit($blog->title, 45) }}</a></h3>
										<ul class="list-unstyled list-inline">
											<li><a href="/blog/{{$blog->id}}/{{ str_slug($blog->title)}}"><img src="/home_images/icons/Views.svg" alt="view-icon">{{$blog->view}}</a></li>
											<li><a href="/blog/{{$blog->id}}/{{ str_slug($blog->title)}}"><img src="/home_images/icons/Read More.svg" alt="read-more-icon">Details</a> </li>
										</ul>
									</div>
								</div>
								@endforeach
								<div class="col-md-12 col-sm-12 col-xs-12 no-padding margin-top view-more text-center">
									<a href="/blog">View More</a>
								</div>