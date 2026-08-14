<?php
$base_path = "https://www.rightdeed.com/";
if (!function_exists('nice_number')) {
function nice_number($n){
    // first strip any formatting;
    $n = (0 + str_replace(",", "", $n));
    // is this a number?
    if (!is_numeric($n)) return false;
    // now filter it;
    if ($n > 1000000000000) return round(($n / 1000000000000), 2) . ' Trillion';
    elseif ($n > 1000000000) return round(($n / 1000000000), 2) . ' Billion';
    elseif ($n > 10000000) return round(($n / 10000000), 2) . ' Crore';
    elseif ($n > 100000) return round(($n / 1000000), 2) . ' Lac';
    elseif ($n > 1000) return round(($n / 10000), 2) . ' Thousand';

    return number_format($n);
}
}
?>

<div class="container-fluid">
				<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="feature-prop-heading">
									<span>featured</span>
									<h3>properties</h3>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12 pl">
								@foreach($properties as $property)
								<div class="col-md-3 col-xs-12 pr featured-property">
									<div class="feature-image hvrbox">
										@if($property->gallery != "")
					                <?php
					                $images = explode(';', $property->gallery);
					                ?> 
					                <figure>
					                <img class="img-responsive hvrbox-layer_bottom" src="/images/property/user_property/original_{{$images[0]}}" alt="{{$property->title}}">
					                @else
					                <figure><img class="img-responsive hvrbox-layer_bottom" src="assets/images/img1.jpg" alt="rightdeed">
					                @endif
										<div class="hvrbox-layer_top">
												<a href="{{ $property->url }}/{{ $property->id }}" >
												   <span class="hvrbox-text"> View Property</span>
												    </a>
										</div>
										<span class="feature-tag">Featured</span>
										 @if($property->purpose == 1)
										<span class="feature-saletag">For Sale</span>
										  @elseif($property->purpose == 2)
										<span class="feature-saletag">For Rent</span>
										@else
										<span class="feature-saletag">For Wanted</span>
										 @endif
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 no-padding border">
										<div class="feature-prop-detail">
											<h3><a href="{{ $property->url }}/{{ $property->id }}" ><?php echo substr(strip_tags($property->title), 0, 27) . '...'; ?></a></h3>
											<div class="col-md-12 col-sm-12 col-xs-12 no-padding feature-location">
											 <?php $address = (strlen($property->address) > 40) ? substr($property->address, 0, 40) . '...' : $property->address; ?>
												<i class="fa fa-map-marker orange"></i> <span><?= $address; ?></span> 
											</div>
											<ul class="list-inline list-unstyled">
												<li><img src="/home_images/icons/bed.webp" alt="bed-cion" class="img-responsive feature-icon"><span>{{ $property->bed }} Bedrooms</span></li>
												<li><img src="/home_images/icons/bathtub.webp" alt="bathtub-cion" class="img-responsive feature-icon"><span>{{ $property->bath }} Bathrooms</span></li>
												<li><img src="/home_images/icons/area.webp" alt="area-cion" class="img-responsive feature-icon"><span>{{ $property->area }} {{ $property->area_type }}</span></li>
												<li><img src="/home_images/icons/garage.webp" alt="garage-cion" class="img-responsive feature-icon"><span>{{ $property->parking_space }} Parking</span></li>
											</ul>	
										</div>
										<div class="col-md-7 col-sm-7 col-xs-7 no-padding feature-amount">
											<span>PKR {{nice_number($property->price)}}</span>
										</div>
										<div class="col-md-5 col-sm-5 col-xs-5 no-padding feature-share">
											<ul class="list-inline pull-right">
												<li><a href=""><img src="/home_images/icons/share.svg" alt="share-cion" class="img-responsive feature-icon"></a> </li>
												@if(Auth::check())

                                                <li><a data-id="{{$property->id}}" data-toggle="tooltip"  data-placement="top"
                                                       title="Save Property" class="saveProperty"><img src="/home_images/icons/like (outline).svg" alt="like-cion" class="img-responsive feature-icon"> </a></li>
                                                @else
                                              <li><a data-id="{{$property->id}}" data-toggle="tooltip" data-placement="top"
                                                       title="Favourite Property" class="favouriteProperty"><img src="/home_images/icons/like (outline).svg" alt="like-cion" class="img-responsive feature-icon"></i></a></li>
                                                @endif</a> </li>
											</ul>
										</div>
									</div>
								</div>
								@endforeach

							</div>
						</div>
					
				</div>
			</div>