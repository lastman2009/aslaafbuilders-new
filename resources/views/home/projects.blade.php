 <section class="page-section projects" style="padding-top: 25px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 features">
				<figure class="pull-left home-icon"><img src="assets/images/project.png"> </figure>
				<div class="feature-heading pull-left">
					<h2>Projects </h2>
					<p>Browse new projects on our property portal</p>
				</div>
				<a href="/property/Project" class="pull-right viewMore">View More Projects</a>
			</div>
			<div class="carousel slide col-md-12 pa-0 multi-item-carousel" id="theCarouselProjects">
				<ol class="carousel-indicators">
					@for($i=0; $i<$count; $i++)
							@if($i == 0)
						<li data-target="#theCarouselProjects" data-slide-to="{{$i}}" class="active"></li>
							@else
						<li data-target="#theCarouselProjects" data-slide-to="{{$i}}"></li>
						@endif
					@endfor

				</ol>
				<div class="carousel-inner">
					@foreach($projects  as $project)
						@if($projects[0]->id == $project->id)
							<?php echo "<div class='item active'>" ?>
						@else
						<div class="item">
						@endif
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="family-house">
									<figure>
										@if($project->gallery != "")
											<?php
											$images =explode(';',$project->gallery);
											?>
											<img class="img-responsive" src="/images/property/user_property/original_{{$images[0]}}">
										@else
											<img class="img-responsive" src="assets/images/img1.jpg">
										@endif
										<figcaption>
											<div class="feature-tag">{{$project->title}}</div>
											<div class="feature-tag area"><i class="fa fa-marker"></i> 
										</div>
											<div class="shade"></div>
										</figcaption>
									</figure>
									<div class="prices-details"> <a  class="btn-style details" href="{{$project->url}}/{{$project->id}}">Detail</a> </div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<a class="left carousel-control" href="#theCarouselProjects" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="right carousel-control" href="#theCarouselProjects" data-slide="next"><i class="fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
</section> 