<?php
$base = "https://www.rightdeed.com/";
if (!function_exists('nice_number')) {
function nice_number($n)
{
    // first strip any formatting;
    $n = (0 + str_replace(",", "", $n));
   
    if (!is_numeric($n)) return false;

    // now filter it;
    if ($n > 1000000000000) return round(($n / 1000000000000), 2) . ' Trillion';
    elseif ($n > 1000000000) return round(($n / 1000000000), 2) . ' Billion';
    elseif ($n > 10000000) return round(($n / 10000000), 2) . ' Crore';
    elseif ($n > 100000) return round(($n / 100000), 2) . ' Lac';
    elseif ($n > 1000) return round(($n / 1000), 2) . ' Thousand';

    return number_format($n);
}
}
?>  

@if(!$properties->isEmpty())
@foreach($properties as $property)
@php
$property_type_array = ["25","26","27","28","29","30","31"]; 
@endphp
<div class="col-md-12 property-section <?php  if($property->purpose != 4) {
echo '';} else{
echo "project";} ?> ">
    <div class="row mr ml">
        <div class="col-md-4 property-image">
            @if (in_array($property->property_type_id ,$property_type_array))
        
            @if($property->gallery != "")    
            @php
            $images =explode(';',$property->gallery);
            @endphp
            <figure>
                <a  href="{{$property->url}}/{{$property->id}}" class="plotsOrginal">
                    <img class=""  src="{{ ab_image('images/property/user_property/original_' . $images[0]) }}" alt="{{ $property->title }}" width="282px" />
                </a>
                @else
                <figure>
                <!---<a href="{{$property->url}}/{{$property->id}}"><img src="https://maps.googleapis.com/maps/api/staticmap?center={{$property->latitude}},{{$property->longitude}}&markers=color:orange%7Clabel:R%7C{{$property->latitude}},{{$property->longitude}}&zoom=12&size=512x384&key=AIzaSyBq8gdCcmzERDnikFG5ZXPT2cl_HBIXEWY"  height="259px" width="282px" /></a>--->
                
                 <a href="{{$property->url}}/{{$property->id}}" class="plots"><img src="/assets/images/dummy.jpg" width="282px" /></a>
            
                @endif
                @else

                @if($property->gallery != "")
                @php
                $images =explode(';',$property->gallery);
                @endphp
                <figure>
                <a href="{{$property->url}}/{{$property->id}}" class="homesoriginal"> <img  src="{{ ab_image('images/property/user_property/original_' . $images[0]) }}" alt="{{ $property->title }}" width="282px" height="259px" ></a>

                @else
                  <figure>
                <a href="{{$property->url}}/{{$property->id}}" class="homes"> <img src="/assets/images/img1.jpg"  height="259px" width="282px" ></a>
                
                @endif    
                @endif
                


                    <figcaption>
                      @if($property->purpose == 1)
                      <span class="forsale-tag">For Sale</span>
                      @elseif($property->purpose ==2)
                      <span class="feature-tag-rent">For Rent</span>

                      @elseif($property->purpose ==3)
                      <span class="feature-tag-wanted">For Wanted</span>
                      @else
                      <span class="feature-tag-wanted">Project</span>
                      @endif
                  </figcaption>
              </figure>
          </div>


          <div class="col-md-8 property-details">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8 col-sm-8 property-detail-inner">
                        <div class="mobile-view-property">
                       	
                            @if(strlen($property->title) <= 20)
                            <a href="{{$property->url}}/{{$property->id}}" class="property-title">
                                <h4 class="property-title">{{$property->title}}</h4>
                            </a>
                            @else
                            <a href="{{$property->url}}/{{$property->id}}" class="property-title">
                                <h4 class="property-title"><?php echo substr(strip_tags($property->title),0,50).'...';?></h4>
                            </a>
                            @endif
                            <p class="property-location <?php echo (strlen($property->title) <= 30) ? 'title-small' : "" ?>"><i class="fa fa-map-marker orange"></i>
                             <?php echo substr(strip_tags($property->address),0,40).'...';?></p>
                         </div>
                         @if($property->purpose == 4)
                         <h4 class="orange">{{ucfirst(App\Property::getCityName($property->city_id))}}</h4>
                         @endif
                         <div class="section-detailed col-md-12 no-padding <?php echo (strlen($property->area) > 3) || (strlen($property->area_type) > 8) ? 'plot-inc'  : "" ?>">
                         
                         @if($property->purpose == 4)
                             <div class="col-md-12 col-sm-6 no-padding additional-info">
                                <p class="residential" title="Residential">
                                   <i class="fa fa-home"></i>
                                   {{$property->min_area_residential}} {{$property->min_area_type_residential}}  - {{$property->max_area_residential}} {{$property->max_area_type_residential}}
                                </p>
                             </div>
                            @endif
                            @if($property->purpose == 4) 
                            <div class="col-md-12 col-sm-6 no-padding additional-info">
                                <p class="commercial" title="Commercial">
                                <i class="fa fa-building"></i>
                                   
                                   {{$property->min_area_commercial}} {{$property->min_area_type_commercial}} 
                                   - {{$property->max_area_commercial}} {{$property->max_area_type_commercial}}
                                </p>
                             </div>
                           @endif
                           @if($property->purpose != 4) 
                            <div class="col-md-6 col-sm-6 no-padding additional-info">
                                <p class="bedroms">
                                    <img src="/home_images/icons/bed.webp" class="img-responsive feature-icon">
                                    {{$property->bed}} Bedrooms
                                </p>
                            </div>
                            
                            <div class="col-md-6 col-sm-6  no-padding additional-info">
                                <p class="bathrooms">
                                    <img src="/home_images/icons/bathtub.webp" class="img-responsive feature-icon">
                                    {{$property->bath}} Bathrooms
                                </p>
                            </div>
                           
                             
                            <div class="col-md-6 col-sm-6 no-padding additional-info">
                                <p class="plotSize ">
                                    <img src="/home_images/icons/area.webp" class="img-responsive feature-icon">
                                    {{$property->area}} {{$property->area_type}}
                                </p>

                            </div>
                           
                           
                            <div class="col-md-6 col-sm-6  no-padding additional-info">
                                <p class="parking">
                                    <img src="/home_images/icons/garage.webp" class="img-responsive feature-icon">
                                    2 Parking
                                </p>
                            </div>
                           @endif
                           @if($property->purpose != 4) 
                             
                            <div class="col-md-12 col-sm-12 no-padding">
                                <h2 class="property-price">PKR {{nice_number($property->price)}} </h2>
                            </div>
                           @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4  property-side-actions">

       
        
                     @if(!empty($property->agency_website_logo))
                         <a href="/{{$property->agency_website_url}}" class="state-image"><img  class="estate-logo" src="/images/logo/{{$property->agency_website_logo}}" alt="{{$property->agency_name}}" /></a>
                     
                       
                   @else
                    <a href="#" class="state-image"><span class="chatter_avatar_circle"
                             style="background-color:#<?= substr(md5((string) $property->username), 0, 6) ?>">
                           {{ strtoupper(substr($property->username, 0,1)) }}
                            </span></a>
                     @endif
                  

                    <div class="property-actions">

                        <a data-toggle="dropdown" class="share-advance"
                        href="javascript:void(0);" aria-expanded="false">
                        <i class="fa fa-share-alt" aria-hidden="true"><span class="caret"></span></i>
                        
                    </a>
                    <ul class="dropdown-menu" id="share-menu">
                        <li>
                            <a href="tel">
                                <i class="fa fa-phone fa-lg"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 481.6 481.6" style="enable-background:new 0 0 481.6 481.6;" xml:space="preserve">
<g>
	<path d="M381.6,309.4c-27.7,0-52.4,13.2-68.2,33.6l-132.3-73.9c3.1-8.9,4.8-18.5,4.8-28.4c0-10-1.7-19.5-4.9-28.5l132.2-73.8
		c15.7,20.5,40.5,33.8,68.3,33.8c47.4,0,86.1-38.6,86.1-86.1S429,0,381.5,0s-86.1,38.6-86.1,86.1c0,10,1.7,19.6,4.9,28.5
		l-132.1,73.8c-15.7-20.6-40.5-33.8-68.3-33.8c-47.4,0-86.1,38.6-86.1,86.1s38.7,86.1,86.2,86.1c27.8,0,52.6-13.3,68.4-33.9
		l132.2,73.9c-3.2,9-5,18.7-5,28.7c0,47.4,38.6,86.1,86.1,86.1s86.1-38.6,86.1-86.1S429.1,309.4,381.6,309.4z M381.6,27.1
		c32.6,0,59.1,26.5,59.1,59.1s-26.5,59.1-59.1,59.1s-59.1-26.5-59.1-59.1S349.1,27.1,381.6,27.1z M100,299.8
		c-32.6,0-59.1-26.5-59.1-59.1s26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1S132.5,299.8,100,299.8z M381.6,454.5
		c-32.6,0-59.1-26.5-59.1-59.1c0-32.6,26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1C440.7,428,414.2,454.5,381.6,454.5z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                                <!--<i class="fa fa-share-alt fa-lg"></i>-->
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-heart-o fa-lg"></i>

                            </a>
                        </li>
                    </ul>
                    <ul class="linking">
                        <li>
                            <a href="tel" class="sharing-icons">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512.076 512.076" style="enable-background:new 0 0 512.076 512.076;" xml:space="preserve" class="sharing-ico" width="25" height="25">
<g transform="translate(-1 -1)">
	<g>
		<g>
			<path d="M499.639,396.039l-103.646-69.12c-13.153-8.701-30.784-5.838-40.508,6.579l-30.191,38.818
				c-3.88,5.116-10.933,6.6-16.546,3.482l-5.743-3.166c-19.038-10.377-42.726-23.296-90.453-71.04s-60.672-71.45-71.049-90.453
				l-3.149-5.743c-3.161-5.612-1.705-12.695,3.413-16.606l38.792-30.182c12.412-9.725,15.279-27.351,6.588-40.508l-69.12-103.646
				C109.12,1.056,91.25-2.966,77.461,5.323L34.12,31.358C20.502,39.364,10.511,52.33,6.242,67.539
				c-15.607,56.866-3.866,155.008,140.706,299.597c115.004,114.995,200.619,145.92,259.465,145.92
				c13.543,0.058,27.033-1.704,40.107-5.239c15.212-4.264,28.18-14.256,36.181-27.878l26.061-43.315
				C517.063,422.832,513.043,404.951,499.639,396.039z M494.058,427.868l-26.001,43.341c-5.745,9.832-15.072,17.061-26.027,20.173
				c-52.497,14.413-144.213,2.475-283.008-136.32S8.29,124.559,22.703,72.054c3.116-10.968,10.354-20.307,20.198-26.061
				l43.341-26.001c5.983-3.6,13.739-1.855,17.604,3.959l37.547,56.371l31.514,47.266c3.774,5.707,2.534,13.356-2.85,17.579
				l-38.801,30.182c-11.808,9.029-15.18,25.366-7.91,38.332l3.081,5.598c10.906,20.002,24.465,44.885,73.967,94.379
				c49.502,49.493,74.377,63.053,94.37,73.958l5.606,3.089c12.965,7.269,29.303,3.898,38.332-7.91l30.182-38.801
				c4.224-5.381,11.87-6.62,17.579-2.85l103.637,69.12C495.918,414.126,497.663,421.886,494.058,427.868z"/>
			<path d="M291.161,86.39c80.081,0.089,144.977,64.986,145.067,145.067c0,4.713,3.82,8.533,8.533,8.533s8.533-3.82,8.533-8.533
				c-0.099-89.503-72.63-162.035-162.133-162.133c-4.713,0-8.533,3.82-8.533,8.533S286.448,86.39,291.161,86.39z"/>
			<path d="M291.161,137.59c51.816,0.061,93.806,42.051,93.867,93.867c0,4.713,3.821,8.533,8.533,8.533
				c4.713,0,8.533-3.82,8.533-8.533c-0.071-61.238-49.696-110.863-110.933-110.933c-4.713,0-8.533,3.82-8.533,8.533
				S286.448,137.59,291.161,137.59z"/>
			<path d="M291.161,188.79c23.552,0.028,42.638,19.114,42.667,42.667c0,4.713,3.821,8.533,8.533,8.533s8.533-3.82,8.533-8.533
				c-0.038-32.974-26.759-59.696-59.733-59.733c-4.713,0-8.533,3.82-8.533,8.533S286.448,188.79,291.161,188.79z"/>
		</g>
	</g>
</g>

</svg>


                            </a>
                        </li>
                        <li>
                            <a href="#" class="sharing-icons">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 481.6 481.6" style="enable-background:new 0 0 481.6 481.6;" xml:space="preserve" class="sharing-ico" width="25" height="25">
<g>
	<path d="M381.6,309.4c-27.7,0-52.4,13.2-68.2,33.6l-132.3-73.9c3.1-8.9,4.8-18.5,4.8-28.4c0-10-1.7-19.5-4.9-28.5l132.2-73.8
		c15.7,20.5,40.5,33.8,68.3,33.8c47.4,0,86.1-38.6,86.1-86.1S429,0,381.5,0s-86.1,38.6-86.1,86.1c0,10,1.7,19.6,4.9,28.5
		l-132.1,73.8c-15.7-20.6-40.5-33.8-68.3-33.8c-47.4,0-86.1,38.6-86.1,86.1s38.7,86.1,86.2,86.1c27.8,0,52.6-13.3,68.4-33.9
		l132.2,73.9c-3.2,9-5,18.7-5,28.7c0,47.4,38.6,86.1,86.1,86.1s86.1-38.6,86.1-86.1S429.1,309.4,381.6,309.4z M381.6,27.1
		c32.6,0,59.1,26.5,59.1,59.1s-26.5,59.1-59.1,59.1s-59.1-26.5-59.1-59.1S349.1,27.1,381.6,27.1z M100,299.8
		c-32.6,0-59.1-26.5-59.1-59.1s26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1S132.5,299.8,100,299.8z M381.6,454.5
		c-32.6,0-59.1-26.5-59.1-59.1c0-32.6,26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1C440.7,428,414.2,454.5,381.6,454.5z"/>
</g>
</svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sharing-icons">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 51.997 51.997" style="enable-background:new 0 0 51.997 51.997;" xml:space="preserve" class="sharing-ico" width="25" height="25">
<g>
	<path d="M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905
		c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478
		c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014
		C52.216,18.553,51.97,16.611,51.911,16.242z M49.521,21.261c-0.984,4.172-3.265,7.973-6.59,10.985L25.855,47.481L9.072,32.25
		c-3.331-3.018-5.611-6.818-6.596-10.99c-0.708-2.997-0.417-4.69-0.416-4.701l0.015-0.101C2.725,9.139,7.806,3.826,14.158,3.826
		c4.687,0,8.813,2.88,10.771,7.515l0.921,2.183l0.921-2.183c1.927-4.564,6.271-7.514,11.069-7.514
		c6.351,0,11.433,5.313,12.096,12.727C49.938,16.57,50.229,18.264,49.521,21.261z"/>
</g>
</svg>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endforeach




@else
<div class="no-property-found">
<img src="./assets/images/no-property-found.jpg" alt="No Property Found" width="100%">
</div>
@endif
<div class="row">
  <div class="col-md-12 advanced-pagination"> 
    {{$properties->appends(request()->query())->links()}}  

</div>
</div>