@php
$title = "$property->title";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section prop-detail-page">
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Overview</a>
						</li>
						<li><a data-toggle="tab" href="#menu1">Features</a>
						</li>
						<li><a data-toggle="tab" href="#menu2">Nearby</a>
						</li>
						@if($property->purpose == 4)
						<li><a data-toggle="tab" href="#menu3">Property Schemes</a>
						</li>
						@endif
					</ul>
					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<section class="page-section">
								<div class="col-md-6 col-sm-12 col-xs-12" style="padding-left:0">
									<div class="slider blog-slider">
										<div class="demo">
											<ul id="lightSlider">

												@if($property->gallery != null)
												<?php
												$images =explode(';', $property->gallery)
												?>
												@foreach($images as $image)			
												<li data-thumb= "<?php echo asset("/images/property/user_property/thumb_$image");?>"> 
													<img src="<?php echo asset("/images/property/user_property/original_$image");?>"/>
													<a download="property_{{$image}}" href="<?php echo asset("/images/property/user_property/original_$image");?>" class="save-img"><i class="fa fa-download"></i></a>
												</li>
												@endforeach
												@else
												<li data-thumb="<?php echo asset("/images/property/user_property/dummy1.jpg");?>"> <img src="<?php echo asset("/images/property/user_property/dummy1.jpg");?>"/> <a class="save-img" href="#"><i class="fa fa-download"></i></a> </li>
												<li data-thumb="<?php echo asset("/images/property/user_property/dummy2.jpg");?>"> <img src="<?php echo asset("/images/property/user_property/dummy2.jpg");?>"/> <a class="save-img" href="#"><i class="fa fa-download"></i></a> </li>
												
												
												@endif

											</div>
											<h3>{{$property->title}}</h3>
											<p>{{$property->address}}</p>
										</div>
									</div>
									<div class="col-md-5 col-sm-12 col-xs-12 col-sm-12 col-xs-12 col-md-offset-1 pull-right feature-summery" style="padding-right:0">
										<div class="features">
											<figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
											<div class="feature-heading pull-left">
												<h2>FEATURED <span> Summary</span></h2>
												<p>World Best Property Portal.</p>
											</div>
										</div>
										<table class="prop-detail-table" style="width:100%">
											<tbody>
												<tr>
													<td>Property ID </td>
													<td> {{$property->id}}</td>
												</tr>
												@if($property->purpose != 4)
												<tr>
													<td>Type </td>
													<td>{{App\Property::getPropertyType($property->property_type_id)}}</td>
												</tr>
												@endif
												<tr>
													<td>Status</td>
													<td>{{App\Property::getPurpose($property->purpose)}}</td>
												</tr>
												@if($property->purpose != 4)
												<tr>
													<td>Area </td>
													<td>{{$property->area}} {{$property->area_type}}</td>
												</tr>
												@else
												<tr>
													<td>Residential Area </td>
													<td>{{$property->min_area_residential}} {{$property->min_area_type_residential}}  - {{$property->max_area_residential}} {{$property->max_area_type_residential}} </td>
												</tr>

												<tr>
													<td>Commercial Area </td>
													<td>{{$property->min_area_commercial}} {{$property->min_area_type_commercial}}  - {{$property->max_area_commercial}} {{$property->max_area_type_commercial}} </td>
												</tr>
												@endif
												@if($property->purpose != 4)
												<tr>
													<td>Price</td>
													<td class="color"><strong>Rs {{$property->price}}</strong>

													</td>
												</tr>
												@endif
												<tr>
													<td>Publish </td>
													<td>{{App\Property::time_elapsed_string($property->created_at)}}</td>
												</tr>
<!-- <tr>
<td>Bedrooms </td>
@if($property->bed == 0)
<td>-</td>
@else
<td>{{$property->bed}}</td>

@endif
</tr>
<tr>
<td>Bathrooms</td>
@if($property->bath == 0)
<td>-</td>
@else
<td>{{$property->bath}}</td>
@endif
</tr> -->
<tr>
	<td>Construction Year</td>
	@if($property->construction_year == 0)
	<td>-</td>
	@else
	<td>{{$property->construction_year}}</td>
	@endif
</tr>
@if($property->purpose != 4)
<tr>
	<td>Ownership </td>
	@if($property->ownership_status == "")
	<td>-</td>
	@else
	<td>{{$property->ownership_status}}</td>
	@endif

</tr>
<tr>
	<td>Occupancy Status </td>
	@if($property->occupancy_status == "")
	<td>-</td>
	@else
	<td>{{$property->occupancy_status}}</td>
	@endif
</tr>
<tr>
	<td>Construction Status </td>
	@if($property->construction_status == "")
	<td>-</td>
	@else
	<td>{{$property->construction_status}}</td>
	@endif
</tr>
@endif
</tbody>
</table>
<div class="mailsave-btn"> <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email" class="btn-prop"> Mail to friend</a>
	<div id="popover-content-email" class="hide">
		<form class="form-inline" role="form">
			<div class="form-group text-center">
				<input class="headerSearch search-query" id="" name="" type="text" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;"/>
				<input class="btn btn-primary btn-xs" id="phSearchButton" type="submit" value="Send" style="width: 100%;height: 25px;background: #fa6919 ;border: 1px solid #fa6919 ;"/>
			</div>
		</form>
	</div>
	@if(Auth::check())
	<a class="btn-prop bg-orange tst1 btn btn-info" data-id="{{$property->id}}" id="saveProperty">save property</a> 
	@else
	<a class="btn-prop bg-orange tst1 btn btn-info" data-toggle="modal" data-target="#fsModal2">save property</a> 
	@endif
</div>
</div>
</section>
<section class="page-section">
	<div class="col-md-12 view-agent-details">
		<div class="col-md-6 col-sm-612 col-xs-12 text-center">
			<figure>

				@if($data['image'] != "")
				<a href="#"><img id="myImg"  class="img-profile img-circle" src="/image/profile/{{$data['image']}}" ></a>
				@else
				<a href="#"><img id="myImg"  class="img-profile img-circle" src="/assets_admin/dist/img/user_thumb.jpg" ></a>
				@endif

			</figure>
			<h4>{{$data['name']}}</h4>
			<!-- <div class="col-md-12"> <a class="color to-ag-pro" href="#">View Agency profile</a> </div> -->
			<div class="mailsave-btn"> 
				<div id="popover-content-send-email" class="hide">
					<form class="form-inline" role="form">
						<div class="form-group text-center">
							<input class="headerSearch search-query" id="" name="" type="text" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;"/>
							<input class="btn btn-primary btn-xs" id="phSearchButton" type="submit" value="Send" style="width: 100%;height: 25px;background: #fa6919 ;border: 1px solid #fa6919 ;"/>
						</div>
					</form>
				</div>	
				<a class="btn-prop bg-orange view_number" data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" data-id="{{$property->id}}" id="numb">View Number</a>
				<div class="view_number_div" style="display: none;">
					<ul class="list-unstyled text-center">
						@if(!empty($data['mobile_no']))
						<li>{{$data['mobile_no']}}</li>
						@else
						<li>No Contact Given</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="form-area">
				<form role="form" action="/contactMessage" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
					</div>
					<input type="text"  name="property_id" value="{{$property->id}}" hidden>
					<input type="text"  name="user_id" value="{{$property->user_id}}" hidden>

					<div class="form-group">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
					</div>
					{{csrf_field()}}
					<div class="form-group">
						<textarea class="form-control" type="textarea" id="message" placeholder="Message" name="message" maxlength="140" rows="7" required></textarea>
					</div>
					<button type="submit" id="submit"  class="btn btn-primary pull-right">Contact Seller</button>
				</form>
			</div>
		</div>
	</div>
</section>
<?php 
$type="";
if($property->purpose == 4)
{
	$type="project";
}
else
{
	$type ="property";
}
?>
@if(!empty($property->video) || !empty($property->youtube_link))
<section class="page-section">
	<div class="row">
		<div class="col-md-12 usr-vid pa-0">
			@if(!empty($property->video) && !empty($property->youtube_link))
			<div class="col-md-6 utube-vid">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="/images/user_{{$type}}_video/{{$property->video}}" type="video/mp4" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-md-6 up-vid">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="{{$property->youtube_link}}" allowfullscreen></iframe>
				</div>
			</div>
			@elseif(!empty($property->video) && empty($property->youtube_link))
			<div class="col-md-12 utube-vid">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="/images/user_{{$type}}_video/{{$property->video}}" type="video/mp4" allowfullscreen></iframe>
				</div>
			</div>

			@elseif(empty($property->video) && !empty($property->youtube_link))
			<div class="col-md-12 utube-vid">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="{{$property->youtube_link}}" allowfullscreen></iframe>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
@endif

<section class="page-section quick-access-wraper">
	<div class="col-md-9 col-sm-12 col-xs-12">
		<div class="col-md-12 features">
			<figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
			<h2>Property <span> overview </span></h2>
			<p>Lorem ispusm the doler site lorem ispusm the doler site.</p>
		</div>
		<div class="overview quick-access">
			<?= $property->description?>
<!-- <p>10 marla double unit luxury solid constructed house in most prime location, near Masjid park &amp; commercial area in very reasonable price from market in a very peaceful atmosphere.</p>
<h4>NEARBY LOCATIONS</h4>
<ul>
<li> Airport</li>
<li>Broadway</li>
<li>Park</li>
<li>Central commercial area</li>
<li>Ring road</li>
<li>Masjid</li>
<li>Hospital</li>
<li>Sports complex</li>
<li>Gym</li>
<li>Sector shops</li>
<li>Carpeted roads</li>
<li>Full green area</li>
</ul>
<h4> DETAILS</h4>
<p>The architect holds the title in his own name.</p>
<p>He designed it for himself &amp; personally supervised construction at every step.ensured the use of best quality &amp; complete quantity of all materials. A one quality bricks, grade 60 rebar (sarya), complete cement/sand ratio, whereas it could be verified by the testing through the laboratory. Life time warranty structure.</p>
<p> Solid foundation 4 feet below nsl at load bearing soil.</p>
<p>Quality ash wood work. 100% electrical wiring, quality fixtures &amp; fittings. Warrantied energy saving smd lights, acs &amp; ups. Grohe &amp; besile washroom sanitary fittings.</p>
<p> More living space due to column &amp; beam structure.</p>
<p>Precision flat finishing of walls with matching wall paper/wall lights/chandeliers/niches. Professionally laid tile work. </p>
<h4>GROUND FLOOR</h4>
<p>Master bedroom attach tub tiled bath.</p>
<p>Italian sanitary fittings with warranty.</p>
<p>Company fitted kitchen with full loaded kitchen appliances.</p>
<p>Wooden &amp; Italian tiled flooring.</p>
<p>Drawing/dining &amp; huge TV lounge with proper fireplace.</p>
<p>Heating &amp; cooling system.</p>
<p>Security &amp; sound system.</p>
<ol>
<li> Airport</li>
<li>Broadway</li>
<li>Park</li>
<li>Central commercial area</li>
<li>Ring road</li>
<li>Masjid</li>
<li>Hospital</li>
<li>Sports complex</li>
<li>Gym</li>
<li>Sector shops</li>
<li>Carpeted roads</li>
<li>Full green area</li>
</ol>
<p>Italian sanitary fittings with warranty.</p>
<p>Company fitted kitchen with full loaded kitchen appliances.</p>
<p>Wooden &amp; Italian tiled flooring.</p>
<p>Drawing/dining &amp; huge TV lounge with proper fireplace.</p>
<p>Heating &amp; cooling system.</p>
<p>Security &amp; sound system.</p>
<p>Italian sanitary fittings with warranty.</p>
<p>Company fitted kitchen with full loaded kitchen appliances.</p>
<p>Wooden &amp; Italian tiled flooring.</p>
<p>Drawing/dining &amp; huge TV lounge with proper fireplace.</p>
<p>Heating &amp; cooling system.</p>
<p>Security &amp; sound system.</p>
<p>Solid ash wood work with imported wardrobes.</p> -->
</div>
</div>
<div class="col-md-3 text-center q-acces">
	<div class="col-md-12"> <img class="img-responsive" src="/assets/images/img2.jpg"> </div>
	<div class="col-md-12"> <img class="img-responsive" src="/assets/images/img2.jpg"> </div>
</div>
</section>
</div>
<div id="menu1" class="tab-pane fade">
	<section class="page-section feature-page">

		<div class="row">
			<div class="col-md-12 padding-right">
		<div class="col-md-9 col-sm-12 col-xs-12 padding-left">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title"> 
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								<figure class="pull-left home-icon"> <img class="img-responsive" src="/assets/images/hotel.png"></figure>
								<span class="color"><strong>main</strong></span> features 
							</a>
						</h2>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body">
							@if($property->construction_year != 0)
							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span> Build in Year </span>
								</div>
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->construction_year}}</span> </div>

							</div>
							@endif

							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span> Security</span>
								</div>
								@if($property->security != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
								@endif
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span> Elevator</span>
								</div>
								@if($property->elevator != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
								@endif
							</div>


							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span> Double Glazed windows</span>
								</div>
								@if($property->double_glazed_window != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
								@endif
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span> Maintenance</span>
								</div>
								@if($property->Maintenance != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
								@endif
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span>Central Air Conditioning</span>
								</div>
								@if($property->central_ac != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>

								@endif
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span>Central Heating</span>
								</div>
								@if($property->central_heating != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>

								@endif
							</div>



							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span>Electricity backup</span>
								</div>
								@if($property->electricity_backup != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->electricity_backup}}</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
								@endif
							</div>

							@if($property->central_heating != null)

							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span>central heating</span>
								</div>
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
							</div>
							@endif

							<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span> floors</span>
								</div>
								@if($property->total_floor != 0)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>
									{{$property->total_floor}} floor

								</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>
									-</span> </div>

									@endif
								</div>
								@if($property->flooring != null)

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>flooring</span>
									</div>
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->flooring}}</span> </div>
								</div>
								@endif

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>waste disposal</span>
									</div>
									@if($property->waste_disposal != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>

									@endif
								</div>
								
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>parking spaces</span>
									</div>
									@if($property->parking_space != null)
									<div class="col-md-5 col-sm-6 col-xs-12"><span>{{ $property->parking_space }} cars</span> 
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"><span> - </span> 
									</div>
									@endif												
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									<figure class="pull-left home-icon"> <img class="img-responsive" src="/assets/images/rooms-info.png"></figure>
									<span class="color"><strong>rooms</strong></span> information 
								</a>
							</h2>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">

									<div class="col-md-7 col-sm-6 col-xs-12"><span>lounge or sitting room</span>
									</div>
									@if($property->lounge != 0)

									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->lounge}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>laundry room</span>
									</div>

									@if($property->laundry_room != 0)

									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->laundry_room}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">	

									<div class="col-md-7 col-sm-6 col-xs-12"><span>number of kitchen</span>
									</div>
									@if($property->no_of_kitchens != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->no_of_kitchens}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>number of bed rooms</span>
									</div>
									@if($property->bed != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->bed}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>powder room</span>
									</div>
									@if($property->powder_room != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->powder_room}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>number of store rooms</span>
									</div>
									@if($property->no_of_store_room != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->no_of_store_room}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>study room</span>
									</div>
									@if($property->study_room != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->study_room}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>steaming room</span>
									</div>
									@if($property->sauna != null)

									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>number of bathrooms</span>
									</div>
									@if($property->bath != 0)

									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->bath}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>drawing rooms</span>
									</div>
									@if($property->drawing_room != 0)

									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->drawing_room}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>number of servant quarters</span>
									</div>
									@if($property->servant_quarter  != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->servant_quarter }}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>prayer room</span>
									</div>
									@if($property->prayer_room != 0)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>{{$property->prayer_room}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span>
									</div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>gym room</span>
									</div>
									@if($property->gym != 0)

									<div class="col-md-5 col-sm-6 col-xs-12"><span>{{$property->gym}}</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"><span>-</span>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>

					@if($property->purpose != 4)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"> 
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
									<figure class="pull-left home-icon"> <img class="img-responsive" src="/assets/images/hotel.png"></figure>
									<span class="color"><strong>Extra</strong></span> features 
								</a>
							</h2>
						</div>
						<div id="collapsefour" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Facility For Disabled</span>
									</div>
									@if($property->facility_disabled != null)

									<div class="col-md-5 col-sm-6 col-xs-12"><span>yes</span>
									</div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"><span>-</span>
									</div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span> Elevator</span>
									</div>
									@if($property->elevator != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span> Conference Room</span>
									</div>
									@if($property->conference_room != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span> Visitor Parking</span>
									</div>
									@if($property->visitor_parking != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>
							</div>
						</div>
					</div>
					@else

					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"> 
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsethree">
									<figure class="pull-left home-icon"> <img class="img-responsive" src="/assets/images/hotel.png"></figure>
									<span class="color"><strong>Project</strong></span> features 
								</a>
							</h2>
						</div>
						<div id="collapsethree" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Modren Planning</span>
									</div>
									@if($property->beautiful_modern_planning != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>=</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Carpeted Road</span>
									</div>
									@if($property->wide_carpeted_roads != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>=</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Sewerage </span>
									</div>
									@if($property->underground_sewerage_system != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>=</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Electricity</span>
									</div>
									@if($property->underground_electricity_supply != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Fitness Center</span>
									</div>
									@if($property->fitness_center != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Dancing Fountain</span>
									</div>
									@if($property->dancing_fountain != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>


								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Park</span>
									</div>
									@if($property->parks != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>


								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Restauarant</span>
									</div>
									@if($property->restaurant != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>


								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Play Ground</span>
									</div>
									@if($property->play_grounds != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>


								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Zoo</span>
									</div>
									@if($property->zoo != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>


								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Commercial Center</span>
									</div>
									@if($property->commercial_center != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>


								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
									</div>
									@if($property->community_center != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>





								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>CC TV Surveillance</span>
									</div>
									@if($property->cc_tv_surveillance != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Gated Communitiy</span>
									</div>
									@if($property->gated_community != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>High Class Finishing</span>
									</div>
									@if($property->high_class_finishing != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
									</div>
									@if($property->community_center != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Independent Drive Way</span>
									</div>
									@if($property->independent_drive_way != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>



								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Security Service</span>
									</div>
									@if($property->security_service != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Community Center</span>
									</div>
									@if($property->community_center != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Underground Plumbing</span>
									</div>
									@if($property->underground_plumbing != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Ungerground Water Supply</span>
									</div>
									@if($property->underground_water_supply != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Solid Wood Finishing</span>
									</div>
									@if($property->solid_wood_finishes != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Imported Kitchen</span>
									</div>
									@if($property->imported_kitchens != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Boundry Wall</span>
									</div>
									@if($property->boundary_wall != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Road + Green Belt</span>
									</div>
									@if($property->wide_roads_with_green_belts != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Mosque</span>
									</div>
									@if($property->mosques != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>Gas</span>
									</div>
									@if($property->gas != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 feature-des">
									<div class="col-md-7 col-sm-6 col-xs-12"><span>House-Keeping Laundry Facility</span>
									</div>
									@if($property->housekeeping_laundry_facility != null)
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
									@else
									<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
									@endif
								</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
								<div class="col-md-7 col-sm-6 col-xs-12"><span>Room Service</span>
								</div>
								@if($property->room_service != null)
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
								@else
								<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
								@endif
							</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
							<div class="col-md-7 col-sm-6 col-xs-12"><span>Tv Cable</span>
							</div>
							@if($property->tv_cable_network != null)
							<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
							@else
							<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
							@endif
						</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
						<div class="col-md-7 col-sm-6 col-xs-12"><span>Hot + Cold Water Supply</span>
						</div>
						@if($property->hot_cold_water_supply != null)
						<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
						@else
						<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
						@endif
					</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
					<div class="col-md-7 col-sm-6 col-xs-12"><span>Cafe</span>
					</div>
					@if($property->cafe != null)
					<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
					@else
					<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
					@endif
				</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
				<div class="col-md-7 col-sm-6 col-xs-12"><span>Roof Top BBQ</span>
				</div>
				@if($property->roof_top_barbeque != null)
				<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
				@else
				<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
				@endif
			</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
			<div class="col-md-7 col-sm-6 col-xs-12"><span>Car Rent Service</span>
			</div>
			@if($property->car_rental_service != null)
			<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
			@else
			<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
			@endif
		</div><div class="col-md-6 col-sm-6 col-xs-12 feature-des">
		<div class="col-md-7 col-sm-6 col-xs-12"><span>Valet Car Parking</span>
		</div>
		@if($property->valet_car_parking != null)
		<div class="col-md-5 col-sm-6 col-xs-12"> <span>yes</span> </div>
		@else
		<div class="col-md-5 col-sm-6 col-xs-12"> <span>-</span> </div>
		@endif
	</div>


</div>
</div>
</div>

@endif                                                                                                                     
</div>
</div>

<div class="col-md-3 col-sm-12 col-xs-12 padding-left">
	<div class="sidebar">
		<h3><span class="color">Business</span> and Communication</h3>
		<ul>
			<li>Broadband internet <span class="pull-right color">
				@if($property->internet != null)
				yes
				@else
				no
				@endif

			</span>
		</li>
		<li>intercom <span class="pull-right color">
			@if($property->intercom != null)
			yes
			@else
			no
			@endif
		</span>
	</li>
<!-- <li>other business <span class="pull-right color">yes</span>
</li> -->
<li>flooring <span class="pull-right color">
	@if($property->flooring != null)

	yes
	@else
	no
	@endif
</span>
</li>
<!-- <li>other main features<span class="pull-right color">yes</span>
</li> -->
<li>community club<span class="pull-right color">
	@if($property->community_club != null)

	yes
	@else
	no
	@endif
</span>
</li>
<li>satellite or cable ready<span class="pull-right color">
	@if($property->cabel_tv != null)

	yes
	@else
	no
	@endif</span>
</li>
</ul>
</div>
<div class="sidebar">
	<h3><span class="color">LIFE STYLE </span> and LUXURY</h3>
	<ul>
		<li>jaucuzzi<span class="pull-right color">
			@if($property->jacuzzi != null)

			yes
			@else
			no
			@endif
		</span>
	</li>
	<li>Furnished<span class="pull-right color">
		@if($property->furnished != null)
		yes
		@else
		no
		@endif
	</span>
</li>

<li>Swimming pool<span class="pull-right color">
	@if($property->swimming_pool != null)

	yes
	@else
	no
	@endif
</span>
</li>

<li>garden<span class="pull-right color">
	@if($property->ground != null)

	yes
	@else
	no
	@endif
</span>
</li>
<li>Lawn<span class="pull-right color">
	@if($property->lawn != null)

	yes
	@else
	no
	@endif
</span>
</li>
<li>sauna<span class="pull-right color">
	@if($property->sauna != null)

	yes
	@else
	no
	@endif</span>
</li>
</ul>
</div>
<div class="sidebar nobg"> <img class="img-responsive" src="/assets/images/img2.jpg"> </div>
<div class="sidebar nobg"> <img class="img-responsive" src="/assets/images/img2.jpg"> </div>
</div>
</div>
</div>

</section>
</div>
<div id="menu2" class="tab-pane fade">
	<section class="page-section prop-detail-page prop-maps">
		<h3 class="color">Nearby locations</h3>
		<div class="col-md-12 map-mrgn">
			<div class="masonry masonry-columns-3">
				<div class="masonry-item">
					<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
						<h4>Hospitals and Health care</h4>
						<ul class="list-unstyled">
							@if($property->near_hospital != null)
							<li>{{$property->near_hospital}}</li>
							@else
							<li>-</li>
							@endif

						</ul>
					</div>
				</div>
				<div class="masonry-item">
					<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
						<h4>Education</h4>
						<ul class="list-unstyled">
							@if($property->near_school != null)

							<li>{{$property->near_school}} </li>
							@else
							<li>-</li>
							@endif
						</ul>
					</div>
				</div>
				<div class="masonry-item">
					<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
						<h4>Mall and Public Places</h4>
						<ul class="list-unstyled">
							@if($property->near_shopping_mall != null)

							<li>{{$property->near_shopping_mall}} </li>
							@else
							<li>- </li>

							@endif

						</ul>
					</div>
				</div>
				<div class="masonry-item">
					<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
						<h4>Restaurants and Hotels</h4>
						<ul class="list-unstyled">
							@if($property->near_restaurant != null)

							<li>{{$property->near_restaurant}}</li>
							@else
							<li>-</li>
							@endif

						</ul>
					</div>
				</div>
				<div class="masonry-item">
					<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
						<h4>Banks and Financial Institutions</h4>
						<ul class="list-unstyled">
							@if($property->near_bank != null)

							<li>{{$property->near_bank}}</li>
							@else
							<li>-</li>
							@endif
						</ul>
					</div>
				</div>

				<div class="masonry-item">
					<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
						<h4>Travel, Tourism and Transportation </h4>
						<ul class="list-unstyled">
							@if($property->near_public_transport != 0)

							<li>{{$property->near_public_transport}} km</li>
							@else
							<li>-</li>
							@endif
						</ul>
					</div>
				</div>
<!-- <div class="masonry-item">
<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
<h4>Government Institutes </h4>
<ul class="list-unstyled">
<li>Timeless Cosmetic Surgery &amp; </li>
<li>Nutritional Health Consultants</li>
<li>Kaleem Ahmed Baig</li>
</ul>
</div>
</div> -->
<div class="masonry-item">
	<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
		<h4>Distace Airport</h4>
		<ul class="list-unstyled">
			@if($property->distance_airport != 0)

			<li>{{$property->distance_airport}} Km</li>
			@else
			<li>-</li>
			@endif
		</ul>
	</div>
</div>
<div class="masonry-item">
	<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
		<h4>Distace Railway</h4>
		<ul class="list-unstyled">
			@if($property->distance_railway != 0)

			<li>{{$property->distance_railway}} Km</li>
			@else
			<li>-</li>
			@endif
		</ul>
	</div>
</div>
<div class="masonry-item">
	<div class="col-md-12 col-sm-12 col-xs-12 nby-lctn-pannel pull-right">
		<h4>Nearby Water Filtration Plant</h4>
		<ul class="list-unstyled">
			@if($property->near_water_filter != 0)
			<li>{{$property->near_water_filter}} Km </li>
			@else
			<li>-</li>
			@endif
		</ul>
	</div>
</div>
</div>
</div>
<!-- 
<div class="col-md-12 nrby-gmaps">
<iframe src="http://maps.google.com/maps/ms?vpsrc=6&amp;ctz=-480&amp;ie=UTF8&amp;msa=0&amp;msid=210840796990572645528.00049770919ccd6759de3&amp;t=m&amp;ll=30.751278,68.203125&amp;spn=84.446143,175.429688&amp;z=2&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="" height="550"> </iframe>
</div> -->
</section>
</div>
@if($property->purpose == 4)
<div id="menu3" class="tab-pane fade">
	@foreach($data['scheme'] as $scheme)
	<section class="page-section">
		<div class="col-md-12 prj-schms pa-0">
			<div class="scheme mb-35 col-md-12">
				<h3 class="color"><span>Scheme No. 1</span></h3>
				<ul class="list-unstyled">
					<li><span class="label-text">Sceheme Title</span> <span class="value pull-right">{{$scheme->title}}</span></li>
					<li><span class="label-text">Property Type</span> <span class="value pull-right">{{$scheme->property_type_name}}</span></li>
					<li><span class="label-text">Area</span> <span class="value pull-right">{{$scheme->area}} {{$scheme->area_type}}</span></li>
					<li><span class="label-text">Payment Method</span> <span class="value pull-right">{{$scheme->payment_method}}</span></li>
					<li><span class="label-text">bed</span> <span class="value pull-right">{{$scheme->bed}}</span></li>
					<li><span class="label-text">bath</span> <span class="value pull-right">{{$scheme->bath}}</span></li>
					<li><span class="label-text">Min Price</span> <span class="value pull-right">{{$scheme->min_price}}</span></li>
					<li><span class="label-text">Max Price</span> <span class="value pull-right">{{$scheme->max_price}}</span></li>
				</ul>
			</div>



<!-- 
<div class="scheme mb-35 col-md-6">
<h3 class="color"><span>Scheme No. 1</span></h3>
<ul class="list-unstyled">
<li><span class="label-text">Sceheme Title</span> <span class="value pull-right">{{$scheme->title}}</span></li>
<li><span class="label-text">Property Type</span> <span class="value pull-right">{{$scheme->property_type_name}}</span></li>
<li><span class="label-text">Area</span> <span class="value pull-right">{{$scheme->area}} {{$scheme->area_type}}</span></li>
<li><span class="label-text">Payment Method</span> <span class="value pull-right">{{$scheme->payment_method}}</span></li>
<li><span class="label-text">bed</span> <span class="value pull-right">{{$scheme->bed}}</span></li>
<li><span class="label-text">bath</span> <span class="value pull-right">{{$scheme->bath}}</span></li>
<li><span class="label-text">Min Price</span> <span class="value pull-right">{{$scheme->min_price}}</span></li>
<li><span class="label-text">Max Price</span> <span class="value pull-right">{{$scheme->max_price}}</span></li>
</ul>
</div> -->
</div>
</section>
@endforeach
</div>
@endif
</div>
</div>
</div>
</div>
</section>
</main>
<!-- wraper ends -->
@include('includes.footer')
<script type="text/javascript">
	$('#saveProperty').click(function(){
		id =$(this).attr('data-id');
		var url ="/saveProperty/"+id;

		$.ajax({
			url:url,
			data:id,
			method:'post',
			type:'json',
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			success:function(e){
				alert(e.success);
			}

		});
	});
	$('#numb').click(function(){
		
	});
</script>
<script type="text/javascript">
	$(".view_number").click(function(){
		$(".view_number").hide();
		$(".view_number_div").show();
		id =$(this).attr('data-id');
		var url ="/viewCount/"+id;
		$.ajax({
			url:url,
			data:id,
			method:'post',
			type:'json',
			headers: {
				'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
			},
			success:function(e){
			}
		});
	});
</script>