@php
$title = "Home";
@endphp
@include("includes.title")<!-- banner-wraper starts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet">
<style>
  .counter-section{
  	padding: 30px 0 0;
  }
  .counter-section span {
    font-size: 66px;
    color: #555;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    font-family: 'Roboto', sans-serif;
  }
  .counter-section h5{
  	text-transform: uppercase;
  	font-size: 20px;
  	font-weight: 500;
  }
  .counter-section .counter-area{
  	border: 1px solid #cccccc;
  }
  .counter-section span > span {
    margin-bottom: 0;
  }
  .counter-section .circle {
    background: #2980b9;
    width: 200px;
    line-height: 200px;
    display: inline-block;
    color: #fff;
    border-radius: 100%;
  }
  .counter-section code, .counter-section code > span {
    text-align: left;
    display: block;
    font-family: 'Roboto', sans-serif;
    background: #444;
    color: #fff;
    padding: 20px;
    font-size: 14px;
    margin-bottom: 100px;
  }
  .counter-section code > span {
    padding: 0;
    margin: 0;
  }
  @media only screen and (max-width: 1024px) {
    .counter-section span {
      font-size: 33px;
      margin-bottom: 200px;
    }
  }
  @media only screen and (max-width: 800px) {
    .counter-section div > span {
      font-size: 66px;
      display: block;
      width: 100% !important;
      margin-bottom: 100px;
    }
    .counter-section span {
      font-size: 66px;
    }
    .counter-section code {
      margin-bottom: 100px;
    }
  }
</style>
<div class="banner-wraper">
<!-- <span><span class="counter circle">12345</span></span> -->



	<!-- slider ends -->
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="banner-contents col-md-12">
					<div class="col-md-4 col-sm-4" style="padding:0">
						<div class="banner-inner-contents-left myHeight1">
							<h4>DREAM LANDS
								PAKISTAN LANDS
								PORTAL</h4>
						</div>
					</div>
					<div class="col-md-8 col-sm-8 myHeight1" style="padding:0">
						<div class="banner-inner-contents basic-srch col-md-12">
							<div class="col-md-9">
								<button type="submit" class="btn btn-default search pull-left"><i class="fa fa-search"></i></button>
								<ul class="nav nav-pills">
									<li class="active"><a data-toggle="pill" href="#searchBuyTab">Buy</a> </li>
									<li><a data-toggle="pill" href="#searchRentTab">Rent</a> </li>
									<li><a data-toggle="pill" href="#searchProjectsTab">Projects</a> </li>
									<li><a data-toggle="pill" href="#searchWantedTab">Wanted</a> </li>
								</ul>
							</div>
							<!-- <div class="col-md-3 srch-id">
                              <input type="text" class="input inputid" placeholder="Property ID">
                            </div> -->
							<div class="tab-content col-md-12 srch-content">
								<div id="searchBuyTab" class="tab-pane fade in active">
									<form class="navbar-form navbar-left" method="get" action="/property" role="search">
										<div class="row srch-flds">
											<div class="col-md-12 form-select">
												<input type="text" name="search_purpose" value="1" hidden>

												<input type="text" class="input inputid" name="id" placeholder="Property ID">
											</div>
											<div class="col-md-6 form-select" style="padding-right: 8px;">
												<select class="form-control selectpicker city" id="city1" name="city_id" title="---- Select City ----" id="radiusSelect2">
													@foreach($cities as $city)
														<option data-icon="fa fa-map-marker"  value="{{ $city->id }}">{{$city->name}}
														</option>

													@endforeach
												</select>
											</div>
											<div class="col-md-6 form-select" style="padding-left: 8px">
												<select class="form-control selectpicker" name="property_type" title="---- Select Property Type ----" id="radiusSelect4" data-selected-text-format="count > 5">
													@foreach($propertyTypes as $propertyType)
														<optgroup label="{{$propertyType->name}}">
															@foreach($data[$propertyType->id] as $datas)
																<option value="{{$datas->id}}">{{$datas->name}}</option>
															@endforeach
															<hr>
														</optgroup>
													@endforeach
												</select>
											</div>
											<div class="col-md-12 form-select">
												<select class="form-control selectpicker show-menu-arrow town" id="town1" title=" ---- Select Location ---- " data-selected-text-format="count > 6" name="town_id">

												</select>
											</div>
											<div class="col-md-12 range-wraper">
												<div class="col-md-6 rang-slider">
													<div id="buyPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper">
														<span class="price"><strong> Price: </strong></span>
														<span class="range-inputs">
															<input id="buyPrice-input-0" value="Min" name="min_price" type="text">
															<input id="buyPrice-input-1" value="Max" name="max_price" type="text">
														</span>
													</div>
												</div>
												<div class="col-md-6 rang-slider rang-slider-next">
													<div id="buyAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
														  <input id="buyArea-input-0" value="Min" name="min_area" type="text">
														  <input id="buyArea-input-1" value="Max" name="max_area" type="text">
														  </span>
													</div>
												</div>
											</div>
											<div class="col-md-12 text-right clearfix">
												<button type="submit" class="btn btn-default btn-style">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<div id="searchRentTab" class="tab-pane fade in">
									<form class="navbar-form navbar-left" action="/property" role="search">
										<div class="row srch-flds">
											<div class="col-md-12 form-select">
												<input type="text" name="search_purpose" value="2" hidden>

												<input type="text" class="input inputid" name="id" placeholder="Property ID">
											</div>

											<div class="col-md-6 form-select">
												<select class="form-control selectpicker" name="city_id" id="city2" title="---- Select City ----" >
													@foreach($cities as $city)
														<option data-icon="fa fa-map-marker"  value="{{ $city->id }}">{{$city->name}}
														</option>

													@endforeach
												</select>
											</div>
											<div class="col-md-6 form-select">
												<select class="form-control selectpicker city" name="property_type" title="---- Select Property Type ----" id="radiusSelect4"  data-selected-text-format="count > 5" multiple>
													@foreach($propertyTypes as $propertyType)
														<optgroup label="{{$propertyType->name}}">
															@foreach($data[$propertyType->id] as $datas)
																<option value="{{$datas->id}}">{{$datas->name}}</option>
															@endforeach
															<hr>
														</optgroup>
													@endforeach
												</select>
											</div>
											<div class="col-md-12 form-select">
												<select class="form-control selectpicker show-menu-arrow town" title=" ---- Select Locations ----" name="town_id" id="town2" data-live-search="true" data-selected-text-format="count > 5" >

												</select>
											</div>
											<div class="col-md-12 range-wraper">
												<div class="col-md-6 rang-slider">
													<div id="rentPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
							  <input id="rentPrice-input-0" name="min_price" value="Min" type="text">
							  <input id="rentPrice-input-1" name="max_price" value="Max" type="text">
							  </span> </div>
												</div>
												<div class="col-md-6 rang-slider rang-slider-next">
													<div id="rentAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
							  <input id="rentArea-input-0" name="min_area" value="Min" type="text">
							  <input id="rentArea-input-1" name="max_area" value="Max" type="text">
							  </span> </div>
												</div>
											</div>
											<div class="col-md-12 text-right clearfix">
												<button type="submit" class="btn btn-default btn-style">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<div id="searchProjectsTab" class="tab-pane fade in ">
									<form class="navbar-form navbar-left" action="/property" role="search">
										<div class="row srch-flds">
											<div class="col-md-12 form-select">
												<input type="text" class="input inputid" placeholder="Property ID">
												<input type="text" name="search_purpose" value="4" hidden>
											</div>
											<div class="col-md-12 form-select">
												<select class="form-control selectpicker city"  name="city_id" title="---- Select City ----" id="city3">
													@foreach($cities as $city)
														<option data-icon="fa fa-map-marker"  value="{{ $city->id }}">{{$city->name}}
														</option>

													@endforeach
												</select>
											</div>
											<!-- <div class="col-md-6 form-select">
												<select class="form-control selectpicker town" name="property_type" title="---- Select Property Type ----" id="radiusSelect4" data-selected-text-format="count > 5" >
													@foreach($propertyTypes as $propertyType)
														<optgroup label="{{$propertyType->name}}">
															@foreach($data[$propertyType->id] as $datas)
																<option value="{{$datas->id}}">{{$datas->name}}</option>
															@endforeach
															<hr>
														</optgroup>
													@endforeach
												</select>
											</div> -->
											<div class="col-md-12 form-select">
												<select class="form-control selectpicker show-menu-arrow" title=" ---- Select location ----" id="town3" name="town_id" data-live-search="true" data-selected-text-format="count > 5" >

												</select>
											</div>
											<div class="col-md-12 range-wraper">
												<div class="col-md-6 rang-slider">
													<div id="projectsPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
													  <input id="projectsPrice-input-0" value="Min" name="min_price" type="text">
													  <input id="projectsPrice-input-1" value="Max" name="max_price" type="text">
													  </span> </div>
												</div>
												<div class="col-md-6 rang-slider rang-slider-next">
													<div id="projectsAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
											  <input id="projectsArea-input-0" value="Min" name="min_area" type="text">
											  <input id="projectsArea-input-1" value="Max" name="max_area" type="text">
											  </span>
													</div>
												</div>
											</div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-default btn-style">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<div id="searchWantedTab" class="tab-pane fade in ">
									<form class="navbar-form navbar-left" action="/property" role="search">
										<div class="row srch-flds">
											<div class="col-md-12 form-select">
												<input type="text" class="input inputid" placeholder="Property ID">
												<input type="text" name="search_purpose" value="3" hidden>
											</div>
											<div class="col-md-6 form-select">
												<select class="form-control selectpicker city" name="city_id" title="---- Select City ----" id="city4">
													@foreach($cities as $city)
														<option data-icon="fa fa-map-marker"  value="{{ $city->id }}">{{$city->name}}
														</option>

													@endforeach
												</select>
											</div>
											<div class="col-md-6 form-select">
												<select class="form-control selectpicker" name="property_type" title="---- Select Property Type ----" id="radiusSelect4" data-selected-text-format="count > 5">
													@foreach($propertyTypes as $propertyType)
														<optgroup label="{{$propertyType->name}}">
															@foreach($data[$propertyType->id] as $datas)
																<option value="{{$datas->id}}">{{$datas->name}}</option>
															@endforeach
															<hr>
														</optgroup>
													@endforeach
												</select>
											</div>
											<div class="col-md-12 form-select">
												<select class="form-control selectpicker show-menu-arrow town" title=" ---- Select Locations ----" data-live-search="true" id="town4" name ="town_id" data-selected-text-format="count > 5" >

													<!-- <option value="">DHA PHASE 1</option> -->

													<!-- 	  <option value="2" data-tokens="DHA" data-icon="fa fa-map-marker" data-subtext="Lahore">DHA PHASE 3</option> -->
												</select>
											</div>
											<div class="col-md-12 range-wraper">
												<div class="col-md-6 rang-slider">
													<div id="wantedPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
							  <input id="wantedPrice-input-0" value="Min" name="min_price" type="text">
							  <input id="wantedPrice-input-1" value="Max" name="max_price" type="text">
							  </span> </div>
												</div>
												<div class="col-md-6 rang-slider rang-slider-next">
													<div id="wantedAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
													<div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
							  <input id="wantedArea-input-0" value="Min" name="min_area" type="text">
							  <input id="wantedArea-input-1" value="Max" name="max_area" type="text">
							  </span> </div>
												</div>
											</div>
											<div class="col-md-12 text-right clearfix">
												<button type="submit" class="btn btn-default btn-style">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="arow-down">
				<button id="button"><img src="/assets/images/arow-down.png"></button>
			</div>
		</div>
	</div>
</div>

<!-- slider ends -->
<!-- Main Starts -->
<main class="main-section">

	<section class="page-section counter-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 padding-left padding-right">
					
					<div class="col-md-3 text-center">
						<div class="col-md-12 counter-area" style="border: 1px solid rgba(30, 179, 0, 0.61);">
							<span class="counter" style="display: inline-block; width: 100%; color: rgba(30, 179, 0, 0.61);">{{$statuses->active}}</span>
							<h5 style="color: rgba(30, 179, 0, 0.61);">Property Listing</h5>
						</div>
					</div>
					
					<div class="col-md-3 text-center">
						<div class="col-md-12 counter-area" style="border: 1px solid #fd7777;">
							<span class="counter" style="display: inline-block; width: 100%; color: #fd7777;">{{$no_of_total_locations->total_locations}}</span>
							<h5 style="color: #fd7777;">Locations Covered</h5>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="col-md-12 counter-area" style="border: 1px solid rgba(0, 152, 255, 0.65) ;">
							<span class="counter" style="display: inline-block; width: 100%; color: rgba(0, 152, 255, 0.65);">{{$no_of_total_cities->total_cities}}</span>
							<h5 style="color: rgba(0, 152, 255, 0.65);">Cities Covered</h5>
						</div>
					</div>
					<div class="col-md-3  text-center">
						<div class="col-md-12 counter-area" style="border: 1px solid rgba(250, 105, 25, 0.76);">
							<span class="counter" style="display: inline-block; width: 100%; color: rgba(250, 105, 25, 0.76);">{{$no_of_total_agents->total_agents}}</span>
							<h5 style="color: rgba(250, 105, 25, 0.76);">Estate Agents</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- featured-properties section -->
{{-- 	<section class="slider main-slider">
		<div class="container">
		@include('home.featured_properties')
			
		</div>
	</section> --}}

	<!-- latest-properties section -->
	<section class="page-section latest-properties">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						@include('home.latest_properties')
					</div>
					<div class="col-md-3 verticalCarousel locations">
						<div class="col-md-12">
							<h3><i class="fa fa-map-marker color"></i> Top<span class="color"> Locations</span></h3>
							<div class="verticalCarouselHeader"> <a href="#" class="vc_goDown"><i class="fa fa-fw fa-angle-up"></i></a> </div>
							<ul class="verticalCarouselGroup list-group vc_list">
									@foreach($locations as $location)
								<li class="list-group-item">
									<h5><a class="color" href="/property/location/{{$location->name}}">{{$location->name}} <span class="pull-right">{{$location->number}}</span></a></h5>
								</li>
								@endforeach
							</ul>
							<div class="verticalCarouselFooter text-center"> <a href="javascript:void(0)" class="vc_goUp"><i class="fa fa-fw fa-angle-down"></i></a> </div>
						</div>
						{{--<div class="col-md-12 mb-20"> <img class="img-responsive" src="assets/images/img2.jpg"> </div>--}}
						{{--<div class="col-md-12 mb-20"> <img class="img-responsive" src="assets/images/img2.jpg"> </div>--}}
						<div class="col-md-12 fb-twit-tabs">
							<ul class="nav nav-pills nav-justified" role="tablist">
								<li class="active"><a data-toggle="tab" href="#facebook">Facebook</a></li>
								<li><a data-toggle="tab" href="#twitter">Twitter</a></li>
							</ul>

							<div class="tab-content">
								<div id="facebook" class="tab-pane fade in active">
									<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
								</div>
								<div id="twitter" class="tab-pane fade">
									<a class="twitter-timeline" data-height="500" data-dnt="true" href="https://twitter.com/TwitterDev">Tweets by TwitterDev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								</div>
							</div>
						</div>


						<div class="col-md-12 mb-20 forum-discussions">
							<h3><i class="fa fa-comments color"></i> Recent<span class="color"> Forums</span></h3>
							<ul class="list-unstyled">
								@foreach($forum_discussions as $forum)
								<li><a href="/forums/discussion/{{$forum->category}}/{{$forum->slug}}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
 								<span>{{$forum->title}}</span></a></li>
								@endforeach
							</ul>
							<a href="/forums" class="mb-20 view-more text-center">More Discussions</a>
						</div>


					</div>
					<!--   <div class="col-md-12 view-more-wraper text-center margin-top"> <a href="#" class="view-more">View More <i class="fa fa-home"></i></a> </div> -->
				</div>
			</div>
		</div>
		</div>
	</section>

	<!-- Projects section -->
@include('home.projects')

<!-- projects ends here -->

	<!-- AGENCIES here -->
<!-- 	<section class="page-section agencies">
		<div class="container">
			<div class="row">
				<div class="col-md-12 features">
					<figure class="pull-left home-icon"><img src="assets/images/home-icon4.jpg"> </figure>
					<div class="feature-heading pull-left">
						<h2>FEATURED <span> AGENCIES</span></h2>
						<p>Browse featured agencies with properties online</p>
					</div>
				</div>
				<div class=" features">
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo2.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo2.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-phone"></i> </a> </li>
							<li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
							<li><a href="#"><i class="fa fa-external-link"></i></a> </li>
						</ul>
					</div>
				</div>
				<div class="col-md-12 view-more-wraper text-center margin-top"> <a href="#" class="view-more">Load More <i class="fa fa-refresh"></i></a> </div>
			</div>
		</div>
	</section> -->
	<!-- company logos section ends -->

	<!-- subscribe News Letter -->
	<section class="page-section blogs">
		<div class="container">
			@include('home.blog')
		</div>
	</section>
	
	<section class="page-section">
		<div class="subscribe">
			<div class="container">
				<div class="row">
					<div class=" subscribe-wraper">
						<div class="input-group">
							<input type="email" class="form-control" placeholder="Enter your email">
							<span class="input-group-btn">
              <button class="btn btn-theme" type="submit">Subscribe</button>
              </span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- blogs started -->
	<!-- <section class="page-section blogs">
		<div class="container">
			@include('home.blog')
		</div>
	</section> -->
	<section class="page-section quick-access-wraper">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="col-md-12 features">
						<div class="feature-heading">
							<figure class="pull-left home-icon"><img src="assets/images/home-icon6.jpg"> </figure>

							<h2>Quick <span> Access</span></h2>
							<p>Read blogs from our property portal online</p>
						</div>

						<div class="quick-access">
							<ul>
								<li>
									<h3>Buying Properties in Pakistan</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
									<a class="btn-style details" href="#">List your Property Now</a>
								</li>

								<li>
									<h3>Selling Pakistan Real Estate</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
									<a class="btn-style details" href="#">List your Property Now</a>
								</li>
								<li>
									<h3>Renting Properties in Pakistan</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
									<a class="btn-style details" href="#">List your Property Now</a>
								</li>
								<li>
									<h3>New Projects</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
									<a class="btn-style details" href="#">List your Property Now</a>
								</li>
								<li>
									<h3>Pakistan Real Estate Portal</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
								</li>
							</ul>

						</div>
					</div>
				</div>
				<div class="col-md-3 text-center q-acces">
					<div class="col-md-12">
						<img class="img-responsive" src="assets/images/img2.jpg">
					</div>
					<div class="col-md-12">
						<img class="img-responsive" src="assets/images/img2.jpg">
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- wraper ends -->
@include( 'includes.footer' )

<script>

    function loadTowns(num) {
        id = $( '#city'+num+' option:selected' ).val();
        $.ajax( {
            url: 'LocationCity/' + id,
            type: 'POST',
            datatype: 'html',
            data: id,
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            },
            success: function ( json ) {

                $( '#town'+num ).html( json );
                $( '.selectpicker' ).selectpicker( 'refresh' );

            }
        } );
    }
    $( '#city1' ).change( function () {
        loadTowns(1);
    });
    $( '#city2' ).change( function () {
        loadTowns(2);
    });
    $( '#city3' ).change( function () {
        loadTowns(3);
    });
    $( '#city4' ).change( function () {
        loadTowns(4);
    });
</script>
<script>
  jQuery(document).ready(function( $ ) {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });
  });
</script>