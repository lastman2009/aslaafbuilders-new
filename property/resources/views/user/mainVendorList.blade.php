@include("includes.title")

<!-- banner-wraper starts -->
<div class="banner-wraper"> 
  
  <!-- slider ends -->
 
  
  <div class="banner-cover">
    <div class="container">
      <div class="row">
        <div class="banner-contents banner-contact col-md-12">
          <div class="col-md-12 features">
            <div class="feature-heading">
              <h2><img src="assets/images/home-icon-contact.png">Vendor <span>Listing</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- slider ends --> 
<!-- Main Starts -->
<main class="main-section"> 

  <section class="agency-listing-page">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-9 col-sm-9 col-xs-12 padding-right padding-left">
					<div class="row">
						<div class="col-md-12">
						@foreach($vendorlists as $vendorlist)
							<div class="col-md-6 agency-list-section">
								<div class="row">
									<div class="col-md-12 padding-right">
										<div class="col-md-6 padding-left">
											<div class="img-container">
												<div class="img-block">
										@if(!empty($vendorlist->logo))
										@foreach(json_decode($vendorlist->logo) as $image)
											<img src="/image/logo/{{$image}}" class="img-responsive" alt="">
										@endforeach
										@else
										<img src="/image/logo/user.jpg" class="img-responsive" alt="">
										@endif
													
												</div>
											</div>
										</div>
										<div class="col-md-6 padding-left">
											<div class="agency-list-detail">
												<h2>{{$vendorlist->name}} </h2>
												</ul>
													<li><i class="fa fa-map-marker"></i>{{$vendorlist->location}} </li>
												</ul>
												<div class="btn-agency-detail">
													<ul>
														<li><a href="javascript:void(0);" data-toggle="popover" title="Phone Number" data-content="@if(!empty($vendorlist->telephone))
													{{$vendorlist->telephone}}
												@else
													No Contact Given
												@endif"" data-placement="top">Phone</a></li>
														@if(Auth::check())
														<li><a class="agency-detail-view" href="/dashboard/vendor/pk1000-{{$vendorlist->user_id}}/{{App\User::getFirstName($vendorlist->user_id)}}">View</a></li>
														@else
														<li><a class="agency-detail-view" href="javascript:void(0)" data-toggle="modal" data-target="#fsModal2">View</a></li>
														@endif
														
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 padding-right padding-left">
    				<div class="recent-blogs text-center">
                        <a href="/blog">
                            <img src="/assets/images/sidebar_ad_1.jpg">
                        </a>
                    </div>
                    <div class="recent-blogs text-center">
                        <a href="/forums">
                      <img src="/assets/images/sidebar_ad_2.jpg">
                      </a>
                    </div>
                </div>
			</div>			
		</div>
    </div>
  </section>


</main>
<!-- wraper ends -->
@include('includes.footer')