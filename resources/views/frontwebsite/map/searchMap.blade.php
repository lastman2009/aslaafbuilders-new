@include("includes.title")

<div class="banner-wraper"> 
  <div class="banner-cover">
    <div class="container">
      <div class="row">
        <div class="banner-contents banner-contact col-md-12">
          <div class="col-md-12 features">
            <div class="feature-heading">
              <h2><img src="../assets/images/home-icon-contact.png">Map  <span>Search</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<main class="main-section"> 

  <section class="page-section map-search">
    <div class="container">
      <div class="row">
        <div class="col-md-12 padding-right">
			<div class="col-md-12 mapsearch-section padding-left">
				<form action="/maps" method="post">
				{{ csrf_field()}}
					<input class="form-control" type="text" name="search" placeholder="Search property in map...">
					<button class="btn btn-default btn-style map-search-btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<?php if(!empty($images)):?>
	            <?php foreach($new_maps as $image): ?>
	            	
						<div class="col-md-3 col-sm-6 col-xs-12 padding-left">
			                <div class="map-tile-section">
			                	<div class="img-container">
									<div class="img-block">
<a href="maps/view/<?php echo $image ?>"><img class="img-responsive" src="../dest/<?php echo $image?>_files/thumb.jpg">
										</a>
									</div>
								</div>
								<h4>
									<?php echo $image ?>
								</h4>
			                </div>
			            </div>
	          		
	            <?php
				 endforeach; ?>
			<?php endif?>
        </div>
      </div>
    </div>
  </section>
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 padding-right">
		  <div class="map-tile-pagination">
			 <ul class="pagination">
			  	{{$maps->links()}}
			</ul> 
		  </div>
		</div>
		</div>
	</div>
   </section>
  
  
  
  
  
</main>

@include('includes.footer')
