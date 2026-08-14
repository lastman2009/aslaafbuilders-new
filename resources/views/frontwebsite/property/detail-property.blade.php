@php
$title = "$property->title";
@endphp
@extends('layouts.masterindexNew')
@section('body')
<link rel="stylesheet" type="text/css" media="all" href="/js/tilezoom/jquery.tilezoom.css"/>
@php
$base = "https://www.rightdeed.com";
@endphp
@php
$property_type_array = ["25","26","27","28","29","30","31"]; 
$Property_type_commercial=["13",'14','15','16','17','18','19','20','21','22','23','24'];
@endphp
<link rel="stylesheet" href="/assets/css-new/magnify.min.css">
<style type="text/css">
   .property-slider .lSPager.lSGallery img{
   width: 100%;
   }
   .show-read-more .more-text{
   display: none;
   }
   #container1{
   height: 600px;
   background-color: white;
   border: 1px solid #ececec;
   color: white;
   }
</style>
<div class="main " id="main">
   <section class="top-section" id="overview">
      <div class="container-fluid">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="col-md-9 prop-view-head no-padding">
                     <h3> <?= $property->title;?></h3>
                     <span>{{$property->address}}</span>
                     <ul class="list-inline">
                        <li><img src="/home_images/icons/5 marla.svg">{{$property->area}} {{$property->area_type}}</li>
                        <li><img src="/home_images/icons/parking.svg"> @if($property->visitor_parking != null) yes @else
                           NA
                           @endif
                        </li>
                     </ul>
                  </div>
                  <!-- Share Icon -->
                  <div class="col-md-3 prop-view-price no-padding">
                     @if($property->purpose != 4)
                     <h4>PKR {{number_format($property->price)}}</h4>
                     @endif
                     <ul class="list-inline prop-ul">
                        <li>
                           <a href=""><i class="fa fa-print" aria-hidden="true"></i></a> 
                        </li>
                        <li class="dropdown">
                           <a href="" class="dropdown-toggle" data-toggle="dropdown">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="
                                 http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 481.6 481.6" style="enable-background:new 0 0 481.6 481.6;" xml:space="preserve">
                                 <g>
                                    <path
                                       id="social-share"
                                       d="M381.6,309.4c-27.7,0-52.4,13.2-68.2,33.6l-132.3-73.9c3.1-8.9,4.8-18.5,4.8-28.4c0-10-1.7-19.5-4.9-28.5l132.2-73.8
                                       c15.7,20.5,40.5,33.8,68.3,33.8c47.4,0,86.1-38.6,86.1-86.1S429,0,381.5,0s-86.1,38.6-86.1,86.1c0,10,1.7,19.6,4.9,28.5
                                       l-132.1,73.8c-15.7-20.6-40.5-33.8-68.3-33.8c-47.4,0-86.1,38.6-86.1,86.1s38.7,86.1,86.2,86.1c27.8,0,52.6-13.3,68.4-33.9
                                       l132.2,73.9c-3.2,9-5,18.7-5,28.7c0,47.4,38.6,86.1,86.1,86.1s86.1-38.6,86.1-86.1S429.1,309.4,381.6,309.4z M381.6,27.1
                                       c32.6,0,59.1,26.5,59.1,59.1s-26.5,59.1-59.1,59.1s-59.1-26.5-59.1-59.1S349.1,27.1,381.6,27.1z M100,299.8
                                       c-32.6,0-59.1-26.5-59.1-59.1s26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1S132.5,299.8,100,299.8z M381.6,454.5
                                       c-32.6,0-59.1-26.5-59.1-59.1c0-32.6,26.5-59.1,59.1-59.1s59.1,26.5,59.1,59.1C440.7,428,414.2,454.5,381.6,454.5z"
                                       />
                                 </g>
                              </svg>
                           </a>
                           <ul class="dropdown-menu list-inline">
                              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           </ul>
                        </li>
                        <li>
                           <a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- Property Images Carousel -->
            <div class="row">
               <div class="col-md-12 property-slider">
                  <ul id="prop-slider-1">
                     @if($property->gallery != null)
                     @php
                     $images =explode(';', $property->gallery)
                     @endphp
                     @if(!empty($property->video) || !empty($property->youtube_link))
                     @php
                     $url = $property->youtube_link;
                     preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)
                     ;                       $youtube_id = $match[1];
                     $youtube_url = "https://www.youtube.com/embed/".$youtube_id;
                     $youtube_thumb = "https://i3.ytimg.com/vi/" . $youtube_id . "/hqdefault.jpg";
                     @endphp
                     @if(!empty($property->video) && !empty($property->youtube_link))
                     <li data-thumb="<?php  echo "/images/user_{{$type}}_video/{{$property->video}}";?>">
                        <iframe style="width: 100%; height: 100%" src="/images/user_{{$type}}_video/{{$property->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     <li data-thumb="{{$youtube_thumb}}">
                        <iframe style="width: 100%; height: 100%" class="embed-responsive-item" src="{{$youtube_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     @elseif(!empty($property->video) && empty($property->youtube_link))
                     <li data-thumb="<?php echo "/images/user_{{$type}}_video/{{$property->video}}";?>">
                        <iframe style="width: 100%; height: 100%" class="embed-responsive-item" src="/images/user_{{$type}}_video/{{$property->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     @elseif(empty($property->video) && !empty($property->youtube_link))
                     <li data-thumb="{{$youtube_thumb}}">
                        <iframe style="width: 100%; height: 100%" class="embed-responsive-item" src="{{$youtube_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     @endif
                     @endif
                     @foreach($images as $image)
                     <?php $gallery_src = ab_image("images/property/user_property/original_$image"); ?>
                     <li data-thumb= "<?php echo $gallery_src;?>">
                        <img src="<?php echo $gallery_src;?>"  class="img-responsive"/>
                        <a download="property_{{$image}}" href="<?php echo $gallery_src;?>" class="save-img"><i class="fa fa-download"></i></a>
                     </li>
                     @endforeach
                     @else
                     @if(in_array($property->property_type_id ,$property_type_array))
                     <!--<li > <img src="https://maps.googleapis.com/maps/api/staticmap?center={{$property->latitude}},{{$property->longitude}}&markers=color:orange%7Clabel:R%7C{{$property->latitude}},{{$property->longitude}}&zoom=12&size=512x384&sensor=true&key=AIzaSyBq8gdCcmzERDnikFG5ZXPT2cl_HBIXEWY"  class="img-responsive"/> </li>-->
                     <li><img src="/assets/images/img1.jpg"  height="auto" width="100%" ></li>
                     @else
                     <li data-thumb="<?php echo asset("/assets/images/img1.jpg");?>"> <img src="<?php echo asset("/assets/images/img1.jpg");?>"  class="img-responsive"/> <a class="save-img" href="#"><i class="fa fa-download"></i></a> </li>
                     @endif
                     @endif
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="feature-sect">
      <div class="container-fluid">
         <div class="container">

            <div class="row">
               <div class="col-md-12 detail-page-nav">

                  <ul class="list-inline">
                     <li 
                        >
                        <a href="#overview" >
                           <span>
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                 </style>
                                 <g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M427.6,251.2c-8.3,0-14.8,6.4-14.8,14.8v201.7H308.2v-82.4c0-7.7-6.4-14.5-14.2-14.5h-75.7
                                             c-8.3,0-15,6.8-15,14.5v82.4H98.9v-195c0-7.8-6.4-14.3-14.8-14.3c-7.8,0-14.2,6.5-14.2,14.3v209.8c0,7.8,6.4,14.3,14.2,14.3
                                             h134.2c7.8,0,14.2-6.5,14.2-14.3v-82.4h46.7v82.4c0,7.8,6.4,14.3,14.8,14.3h133.6c7.8,0,14.2-6.5,14.2-14.3V266
                                             C441.8,257.6,435.4,251.2,427.6,251.2z"/>
                                          <path id="facebook" fill="#111" class="st0" d="M507.8,262.7L391.4,145.8V66c0-8.3-6.7-14.7-15-14.7c-7.8,0-14.2,6.4-14.2,14.7v50.5l-96.1-96.6
                                             c-2.9-3-6.4-4.6-9.9-4.6c-4,0-7.5,1.7-10.5,4.6L4.5,261.1c-5.8,5.8-6.2,15.1,0,20.4c5.4,6.2,14.6,5.8,20.4,0L256.2,50.7
                                             l230.7,232.9c2.4,2.4,5.9,3.8,10.5,3.8c4,0,7.5-1.4,10.5-3.8C513.2,278.3,513.6,268.5,507.8,262.7z"/>
                                       </g>
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Overview</span>
                        </a>
                     </li>

                     <li>
                        <a href="#description">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                 </style>
                                 <g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M397.7,78.4c6.8,0,12.4-5.5,12.4-12.4V27c0-14.9-12.1-27-27-27H121.6c-3.3,0-6.4,1.3-8.7,3.6L10.5,106
                                             c-2.3,2.3-3.6,5.5-3.6,8.7V485c0,14.9,12.1,27,27,27h349.1c14.9,0,27-12.1,27-27V296.3c0-6.8-5.5-12.4-12.4-12.4
                                             c-6.8,0-12.4,5.5-12.4,12.4V485c0,1.3-1,2.3-2.3,2.3H33.9c-1.3,0-2.3-1-2.3-2.3V127.1H107c14.9,0,27-12.1,27-27V24.7h249.1
                                             c1.3,0,2.3,1,2.3,2.3v39C385.4,72.8,390.9,78.4,397.7,78.4z M109.3,100.1c0,1.3-1,2.3-2.3,2.3H49.1l60.2-60.2V100.1z"/>
                                       </g>
                                    </g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M492.9,100.4l-14.5-14.5c-16.3-16.3-42.8-16.3-59.1,0L303.8,201.3H103.6c-6.8,0-12.4,5.5-12.4,12.4
                                             s5.5,12.4,12.4,12.4H279l-74.4,74.4H103.6c-6.8,0-12.4,5.5-12.4,12.4s5.5,12.4,12.4,12.4H180l-0.2,0.2c-1.5,1.5-2.6,3.4-3.2,5.4
                                             l-19.1,68.7h-53.9c-6.8,0-12.4,5.5-12.4,12.4s5.5,12.4,12.4,12.4h63.3c0,0,2.7-0.3,3.1-0.4c0.1,0,78-21.6,78-21.6
                                             c2.1-0.6,3.9-1.7,5.4-3.2l239.4-239.4C509.2,143.2,509.2,116.7,492.9,100.4z M184.6,394.1l10.1-36.3L221,384L184.6,394.1z
                                             M244.7,372.8L206,334l197.6-197.6l38.7,38.7L244.7,372.8z M475.4,142.1l-15.6,15.6l-38.7-38.7l15.6-15.6
                                             c6.7-6.7,17.5-6.7,24.2,0l14.5,14.5C482.1,124.5,482.1,135.4,475.4,142.1z"/>
                                       </g>
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Description</span>
                        </a>
                     </li>

                     @if($property->security != null || $property->central_heating != null || $property->double_glazed_window != null || $property->electricity_backup != null || $property->central_ac != null 
                     || $property->waste_disposal != null || $property->Maintenance != null || $property->flooring != null || $property->elevator != null 
                     || $property->parking_space != null || $property->lounge != 0 || $property->laundry_room != 0 || $property->imported_kitchens != null || $property->bed != 0 || $property->powder_room != 0 
                     || $property->no_of_store_room != 0 || $property->sauna != null || $property->bath != 0 || $property->servant_quarter != 0 || $property->prayer_room != 0 || $property->facility_disabled != null || $property->elevator != null || $property->conference_room != null || $property->visitor_parking != null 
                     || $property->jacuzzi != 0 || $property->furnished != 0 || $property->swimming_pool != 0 || $property->ground != 0 || $property->lawn != 0)

                     <li>
                        <a href="#feature">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                 </style>
                                 <g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M397.7,78.4c6.8,0,12.4-5.5,12.4-12.4V27c0-14.9-12.1-27-27-27H121.6c-3.3,0-6.4,1.3-8.7,3.6L10.5,106
                                             c-2.3,2.3-3.6,5.5-3.6,8.7V485c0,14.9,12.1,27,27,27h349.1c14.9,0,27-12.1,27-27V296.3c0-6.8-5.5-12.4-12.4-12.4
                                             c-6.8,0-12.4,5.5-12.4,12.4V485c0,1.3-1,2.3-2.3,2.3H33.9c-1.3,0-2.3-1-2.3-2.3V127.1H107c14.9,0,27-12.1,27-27V24.7h249.1
                                             c1.3,0,2.3,1,2.3,2.3v39C385.4,72.8,390.9,78.4,397.7,78.4z M109.3,100.1c0,1.3-1,2.3-2.3,2.3H49.1l60.2-60.2V100.1z"/>
                                       </g>
                                    </g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M492.9,100.4l-14.5-14.5c-16.3-16.3-42.8-16.3-59.1,0L303.8,201.3H103.6c-6.8,0-12.4,5.5-12.4,12.4
                                             s5.5,12.4,12.4,12.4H279l-74.4,74.4H103.6c-6.8,0-12.4,5.5-12.4,12.4s5.5,12.4,12.4,12.4H180l-0.2,0.2c-1.5,1.5-2.6,3.4-3.2,5.4
                                             l-19.1,68.7h-53.9c-6.8,0-12.4,5.5-12.4,12.4s5.5,12.4,12.4,12.4h63.3c0,0,2.7-0.3,3.1-0.4c0.1,0,78-21.6,78-21.6
                                             c2.1-0.6,3.9-1.7,5.4-3.2l239.4-239.4C509.2,143.2,509.2,116.7,492.9,100.4z M184.6,394.1l10.1-36.3L221,384L184.6,394.1z
                                             M244.7,372.8L206,334l197.6-197.6l38.7,38.7L244.7,372.8z M475.4,142.1l-15.6,15.6l-38.7-38.7l15.6-15.6
                                             c6.7-6.7,17.5-6.7,24.2,0l14.5,14.5C482.1,124.5,482.1,135.4,475.4,142.1z"/>
                                       </g>
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Features</span> 
                        </a>
                     </li>
                     @endif

                     <li>
                        <a href="#map-sect">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:none;stroke:#FFFFFF;stroke-width:26;stroke-miterlimit:10;}
                                 </style>
                                 <g>
                                    <g>
                                       <path id="facebook" fill="#111" class="st0" d="M256,22.7c-93.2,0-169,75.8-169,169c0,115.6,151.2,285.4,157.7,292.6c6,6.7,16.6,6.7,22.6,0
                                          c6.4-7.2,157.7-176.9,157.7-292.6C425,98.5,349.2,22.7,256,22.7z M256,276.7c-46.9,0-85-38.1-85-85s38.1-85,85-85s85,38.1,85,85
                                          S302.9,276.7,256,276.7z"/>
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Nearby</span> 
                        </a>
                     </li>

                     <li class="col-md-3 prop-view-price pull-right">
                        @if($property->purpose != 4)
                        <h4>PKR {{number_format($property->price)}}</h4>
                        @endif
                        <span onclick="openNav()" class="detail-bar"><i class="fa fa-bars"></i> </span>
                     </li>
                  </ul>

                  
               </div>
            </div>

            <div class="row detail-pagebtm-sect" >
               <div class="col-md-12">
                  <div class="col-md-9 no-padding">
                     <div class="col-md-12 detail-prop-desc pl" id="description">
                        <h3>Property Description</h3>
                        <div class="truncate"> <?= $property->description?></div>
                     </div>

                     @if($property->security != null || $property->central_heating != null || $property->double_glazed_window != null || $property->electricity_backup != null || $property->central_ac != null 
                     || $property->waste_disposal != null || $property->Maintenance != null || $property->flooring != null || $property->elevator != null 
                     || $property->parking_space != null || $property->lounge != 0 || $property->laundry_room != 0 || $property->imported_kitchens != null || $property->bed != 0 || $property->powder_room != 0 
                     || $property->no_of_store_room != 0 || $property->sauna != null || $property->bath != 0 || $property->servant_quarter != 0 || $property->prayer_room != 0 || $property->facility_disabled != null || $property->elevator != null || $property->conference_room != null || $property->visitor_parking != null 
                     || $property->jacuzzi != 0 || $property->furnished != 0 || $property->swimming_pool != 0 || $property->ground != 0 || $property->lawn != 0)

                     <div class="col-md-12 pl">
                        <div class="main-feature-head " id="feature">
                           <h3>Features</h3>
                           @if($property->security != null || $property->central_heating != null || $property->double_glazed_window != null || $property->electricity_backup != null || $property->central_ac != null 
                           || $property->waste_disposal != null || $property->Maintenance != null || $property->flooring != null || $property->elevator != null || $property->parking_space != null)
                           <div class="vertical-align">
                              <div class="col-md-2 col-sm-2 main-featur no-padding">
                                 <h4>Main Features</h4>
                              </div>
                              <div class="col-md-10 col-sm-10 main-featur-des">
                                 @if($property->security != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/Security.webp"></span>     
                                          <span>Security</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->central_heating != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/Heating.webp"></span>      
                                          <span>Central Heating</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->double_glazed_window != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/opened-window-door-of-glasses (1).webp"></span>    
                                          <span>Double Glazed Windows</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->electricity_backup != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/Electricity Backup.webp"></span>    
                                          <span>Electricity Backup</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->central_ac != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/air-conditioner.webp"></span>    
                                          <span>Central Air Conditioning</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->waste_disposal != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/waste.webp"></span>     
                                          <span>Waste Disposal</span>
                                       </li>
                                       <li><span>{{$property->waste_disposal}}</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->Maintenance != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/maintenance.webp"></span>     
                                          <span>Maintenance</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->flooring != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/flooring.webp"></span>     
                                          <span>Flooring</span>
                                       </li>
                                       <li><span>{{$property->flooring}}</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->elevator != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/elevator (1).webp"></span>    
                                          <span>Elevator</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                                 @if($property->parking_space != null)
                                 <div class="col-md-6 col-sm-6">
                                    <ul class="list-inline">
                                       <li class="img-des">
                                          <span><img src="/home_images/icons/Detail Page/Main Features Icon/parked-car.webp"></span>      
                                          <span>Parking</span>
                                       </li>
                                       <li><span>(Yes)</span></li>
                                    </ul>
                                 </div>
                                 @endif
                              </div>
                             
                           </div>
                           @endif
                        </div>
                     </div>

                     

                     @if($property->lounge != 0 || $property->laundry_room != 0 || $property->imported_kitchens != null || $property->bed != 0 || $property->powder_room != 0 
                     || $property->no_of_store_room != 0 || $property->sauna != null || $property->bath != 0 || $property->servant_quarter != 0 || $property->prayer_room != 0)
                     <div class="col-md-12 feature-margintop pl">
                        <div class="main-feature-head vertical-align">
                           <div class="col-md-2 col-sm-2 rooms no-padding">
                              <h4>Rooms Information</h4>
                           </div>
                           <div class="col-md-10 col-sm-10 main-featur-des">
                              @if($property->lounge != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/lounge-Sitting Room.webp"></span>    
                                       <span>Lounge/Sitting Room</span>
                                    </li>
                                    <li><span>{{$property->lounge}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->laundry_room != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Loundry Room.webp"></span>     
                                       <span>Laundry Room</span>
                                    </li>
                                    <li><span>{{$property->laundry_room}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->imported_kitchens != null)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Kitchen.webp"></span>    
                                       <span>Kitchen</span>
                                    </li>
                                    <li><span>(Yes)</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->bed != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/bed.webp"></span>     
                                       <span>Bedroom</span>
                                    </li>
                                    <li><span>{{$property->bed}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->powder_room != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Powder.webp"></span>     
                                       <span>Powder Room</span>
                                    </li>
                                    <li><span>{{$property->powder_room}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->no_of_store_room != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Store Room.webp"></span>    
                                       <span>Store Room</span>
                                    </li>
                                    <li><span>{{$property->no_of_store_room}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->sauna != null)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Steaming Room.webp"></span>    
                                       <span>Steaming Room</span>
                                    </li>
                                    <li><span>(Yes)</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->bath != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Bathroom.webp"></span>      
                                       <span>Bathroom(s)</span>
                                    </li>
                                    <li><span>{{$property->bath}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->servant_quarter  != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/Servant-Room.webp"></span>     
                                       <span>Servant Quarter</span>
                                    </li>
                                    <li><span>{{$property->servant_quarter }}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->prayer_room != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Rooms Information/muslim-prayer.webp"></span>    
                                       <span>Prayer Room</span>
                                    </li>
                                    <li><span>{{$property->prayer_room}}</span></li>
                                 </ul>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                     @endif
                     
                     @if($property->facility_disabled != null || $property->elevator != null || $property->conference_room != null || $property->visitor_parking != null)
                     <div class="col-md-12 feature-margintop pl">
                        <div class="main-feature-head vertical-align ">
                           <div class="col-md-2 col-sm-2 extra-featur no-padding">
                              <h4>Extra Features</h4>
                           </div>
                           <div class="col-md-10 col-sm-10 main-featur-des">
                              @if($property->facility_disabled != null)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Extra Features/Facility for Disabled.webp"></span>     
                                       <span>Facility For Disabled</span>
                                    </li>
                                    <li><span>(Yes)</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->elevator != null)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Extra Features/elevator (1).webp"></span>     
                                       <span>Elevator</span>
                                    </li>
                                    <li><span>(Yes)</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->conference_room != null)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Extra Features/Conference.webp"></span>    
                                       <span>Conference Room</span>
                                    </li>
                                    <li><span>(Yes)</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->visitor_parking != null)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Extra Features/parked-car.webp"></span>    
                                       <span>Visitor Parking</span>
                                    </li>
                                    <li><span>(Yes)</span></li>
                                 </ul>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                     @endif
                     
                     @if($property->internet != 0 || $property->intercom != 0 || $property->community_club != 0 || $property->cabel_tv != 0)
                     <div class="col-md-12 feature-margintop pl">
                        <div class=" main-feature-head vertical-align">
                           <div class="col-md-2 col-sm-2 business-featur no-padding">
                              <h4>Business and Communication</h4>
                           </div>
                           <div class="col-md-10 col-sm-10 main-featur-des">
                              @if($property->internet != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Business and Communication/Broadband Internet.webp"></span>     
                                       <span>Broadband Internet</span>
                                    </li>
                                    <li><span>{{$property->internet}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->intercom != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Business and Communication/Intercom.webp"></span>      
                                       <span>Intercom</span>
                                    </li>
                                    <li><span>{{$property->intercom}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->community_club != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Business and Communication/Community Club.webp"></span>      
                                       <span>Community Club</span>
                                    </li>
                                    <li><span>{{$property->community_club}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->cabel_tv != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Business and Communication/Satellite.webp"></span>     
                                       <span>Satellite & Cable Tv</span>
                                    </li>
                                    <li><span>{{$property->cabel_tv}}</span></li>
                                 </ul>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                     @endif
                     
                     @if($property->jacuzzi != 0 || $property->furnished != 0 || $property->swimming_pool != 0 || $property->ground != 0 || $property->lawn != 0)
                     <div class="col-md-12 feature-margintop pl">
                        <div class=" main-feature-head vertical-align">
                           <div class="col-md-2 col-sm-2 life-featur no-padding">
                              <h4>Life Style and Luxury</h4>
                           </div>
                           <div class="col-md-10 col-sm-10 main-featur-des">
                              @if($property->jacuzzi != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Life Style and Luxury/Jacuzzi.webp"></span>      
                                       <span>Jacuzzi</span>
                                    </li>
                                    <li><span>{{$property->jacuzzi}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->furnished != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Life Style and Luxury/Furnished.webp"></span>    
                                       <span>Furnished</span>
                                    </li>
                                    <li><span>{{$property->furnished}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->swimming_pool != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Life Style and Luxury/Swimming.webp"></span>     
                                       <span>Swimming Pool</span>
                                    </li>
                                    <li><span>{{$property->swimming_pool}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->ground != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Life Style and Luxury/Lawn.webp"></span>      
                                       <span>Ground</span>
                                    </li>
                                    <li><span>{{$property->ground}}</span></li>
                                 </ul>
                              </div>
                              @endif
                              @if($property->lawn != 0)
                              <div class="col-md-6 col-sm-6">
                                 <ul class="list-inline">
                                    <li class="img-des">
                                       <span><img src="/home_images/icons/Detail Page/Life Style and Luxury/Lawn.webp"></span>      
                                       <span>Lawn</span>
                                    </li>
                                    <li><span>{{$property->lawn}}</span></li>
                                 </ul>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                     @endif
                     @endif

                   @if($map_image != null)  
                     <div class="col-md-12 pl " id="map-sect">
                        <div class="row mr ml">
                           <section class="map-sect" id="map-sect">
                              <div class="map-main">
                                  
                                 <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
                                    <button class="map-btn tablinks active" onclick="mapHandling(event, 'society-map')">NearBy</button>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
                                    <button class="map-btn tablinks " onclick="mapHandling(event, 'google-map')">Map</button>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12 no-padding map-content-section">
                                    <div class="nearby-section tabcontent" id="society-map">
                                       <form enctype="multipart/form-data" method="post" accept-charset="UTF-8" action="">
                                          <div>
                                             <input type="hidden" name="image" id="edit-image" value="{{$map_image}}">
                                          </div>
                                       </form>
                                       <div id="container1" class="col-md-12"></div>
                                    </div>
                                    <div class="map-section tabcontent " id="google-map">
                                       <button id="show-map" class="btn-map">Show Map</button>
                                       <div id="map"></div>
                                    </div>
                                 </div>
                              </div>
                            </section>
                        </div>
                     </div>
                     @else
                     <div class="col-md-12 pl " id="map-sect">
                        <div class="row mr ml">
                           <section class="map-sect" id="map-sect">
                              <div class="map-main">
                               
                                 <div class="col-md-12 col-sm-6 col-xs-6 no-padding">
                                    <button class="map-btn tablinks active" onclick="mapHandling(event, 'google-map')">Map</button>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12 no-padding map-content-section">
                                   
                                    <div class="map-section tabcontent " id="google-map" style="display:block">
                                       <button id="show-map" class="btn-map">Show Map</button>
                                       <div id="map"></div>
                                    </div>
                                 </div>
                              </div>
                            </section>
                        </div>
                     </div>
                    @endif
                  </div>
                  
                  <div class="col-md-3 prop-inquiry">
                     <div class="row">
                        <div class="inquiry-btn">
                           <button class="btn btn-primary btn-small">Inquiry <span class="fa fa-envelope"
                              ></span></button>
                        </div>
                        <div class="prop-inquiry-sidebar">
                           @if($prop != null)
                              @if(strpos($prop->logo ,'anything-logo') !== false)
                           <a href="/{{$prop->url}}"><span class="chatter_avatar_circle"
                              style="background-color:#<?= substr(md5((string) $prop->agency_name), 0, 6) ?>">
                              {{ strtoupper(substr($prop->agency_name, 0, 1)) }}
                           </span></a>
                              @else
                           <a href="#"><img id="myImg"  class="img-profile img-circle" src="/image/logo/{{$prop['logo']}}" ></a>
                              @endif
                              
                              @else
                              @if($data['image'] != "")
                           <a href="#"><img id="myImg"  class="img-responsive" src="/image/profile/{{$data['image']}}" ></a>
                              @else
                           <a href="#"><img id="myImg"  class="img-responsive" src="/assets_admin/dist/img/user_thumb.jpg" ></a>
                              @endif
                           @endif
                           <!-- <img src="/home_images/random-images/real-estate.jpg" class="img-responsive"> -->
                           <h4>{{$data['name']}}</h4>
                           <ul class="list-inline">
                              <li><img src="/home_images/icons/phone-black.webp"> </li>
                              <li>
                                 <a class="btn-prop bg-orange view_number" data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" data-id="{{$property->id}}" id="numb">View Number</a>
                                 <div class="view_number_div" style="display: none;">
                                    <ul class="list-unstyled text-center">
                                       @if(!empty($data['mobile_no']))
                                       <li>
                                          <h3>{{$data['mobile_no']}}</h3>
                                       </li>
                                       @else
                                       <h3>No Contact Given</h3>
                                       @endif
                                    </ul>
                                 </div>
                              </li>
                           </ul>
                           <h3>Property Inquiry</h3>
                           <form role="form" action="/contactMessage" method="post">
                              {{csrf_field()}}
                              <input type="text"  name="property_id" value="{{$property->id}}" hidden>
                              <input type="text"  name="user_id" value="{{$property->user_id}}" hidden>
                              <div class="form-group">
                                 <input type="text" class="form-control"  placeholder="Enter Name" id="name" name="name" >
                              </div>
                              <div class="form-group">
                                 <input type="email" class="form-control"  placeholder="Enter email" name="email">
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control"  placeholder="Enter Phone" id="phone" name="phone">
                              </div>
                              <div class="form-group">
                                 <textarea class="form-control" type="textarea" id="message" placeholder="Message" name="message" rows="5" ></textarea>
                              </div>
                              <button type="submit" id="submit"  class="btn btn-primary">Contact Seller</button>
                           </form>
                        </div>
                     </div>
                     <div class="row simi-prop-sidebar">
                        <div class="col-md-12">
                           <div class="simiprop-head">
                              <h3>Similar Properties</h3>
                           </div>
                           @foreach($properties as $related_property)
                           <div class="similar-properties row">
                              <div class="col-md-4 col-xs-4 no-padding">
                                 @if($related_property->gallery != "")
                                 <?php
                                    $images = explode(';', $related_property->gallery);
                                    ?>
                                 <img src="{{ ab_image('images/property/user_property/original_' . $images[0]) }}" class="img-responsive">
                                 @else
                                 <img class="img-responsive" src="/assets/images/img1.jpg">
                                 @endif   
                              </div>
                              <div class="col-md-8 col-xs-8 no-padding simiprop-des">
                                 <a href="{{$related_property->url}}/{{$related_property->id}}"><?php echo substr(strip_tags($related_property->title), 0, 20) . '...'; ?></a>
                                 <ul class="list-unstyled">
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo substr(strip_tags($related_property->address), 0, 20) . '...'; ?></span> </li>
                                    <li>PKR: {{nice_number($related_property->price)}}</li>
                                 </ul>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
</div>
<!-- </section> -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('assets/js-new/lightslider.js')}}"></script>
<script src="/assets/js-new/maginify.min.js"></script>
<script  defer src="https://maps.googleapis.com/maps/api/js?key={{Config::get("name.google.googleMap")}}&callback=initMap&libraries=places" type="text/javascript"></script>
<!-- Google Map Script -->
<script type="text/javascript">   
   let mainNavLinks ;
   
   
   
   var restaurant = new Array();
      var hospital =new Array();
      var school =new Array();
      var store =new Array();
      var bank =new Array();
     var travel =new Array();
      
      var latitude = parseFloat("{{$property->latitude}}");
      var lngitude = parseFloat("{{$property->longitude}}");
   
   function initialize() {
   var pyrmont = {lat:latitude, lng:lngitude};
       var mapOptions = {
           center: pyrmont ,
           zoom: 15
       };
       
       
       var map = new google.maps.Map(document.getElementById('map'), mapOptions);
       
       var marker = new google.maps.Marker({
        position: pyrmont,
   map: map,
   title: 'Hello World!'
          });
   }
   
   $(document).ready(function() {
       $('#show-map').on('click', initialize)
   });
   
   function mapHandling(evt, sectionName) {
       var i, tabcontent, tablinks;
       tabcontent = document.getElementsByClassName("tabcontent");
       for (i = 0; i < tabcontent.length; i++) {
           tabcontent[i].style.display = "none";
       }
       tablinks = document.getElementsByClassName("tablinks");
       for (i = 0; i < tablinks.length; i++) {
           tablinks[i].className = tablinks[i].className.replace(" active", "");
       }
       document.getElementById(sectionName).style.display = "block";
       evt.currentTarget.className += " active";
   }
   
      function callback(results, status) {
          var count;
       var type1= 
       console.log(results[0]);
      
      
      }
   
      function createMarker(place) {
      var placeLoc = place.geometry.location;
      var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
      });
      
      google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
      });
      } 
</script>

@endsection
@section('detial-page-footer')

<script type="text/javascript" src="/js/tilezoom/jquery.tilezoom.js"></script>
<!-- Society Map Script -->
<script type="text/javascript">
   $(document).ready(function () {
       var image = $('#edit-image').val();
       // alert(image);
       if(!image) return;
       $('#container1').tilezoom('destroy');
       $('#container1').tilezoom({
           xml: '/dest/' + image + '.xml',
           mousewheel: true
       });
   });
</script>
<!-- Inquire SideBar Script -->
<script>
   $(".inquiry-btn").click(function(){
      $(".prop-inquiry-sidebar").toggleClass("active");
   $("header").toggleClass("hide");
   $(".btn span").toggleClass("fa-envelope-open-o");
   });   
      $(".detail-bar").click(function(){
          
          $("html").animate({ scrollTop: 0 }, 600);   
      });
      $(window).scroll(function(){
              if ($(this).scrollTop() > 550) {
                  $('.inquiry-btn').addClass('active');
                  $('nav').addClass('hide');
                  $('.detail-page-nav').addClass('fixed-prop-nav');
                  $('.detail-page-nav ul').addClass('container');
                  $('.detail-page-nav span.detail-bar').addClass('show');
                  mainNavLinks = document.querySelectorAll(".fixed-prop-nav ul li a");
              } else {
                  $('.inquiry-btn').removeClass('active');
                  $('nav').removeClass('hide');
                  $('.detail-page-nav').removeClass('fixed-prop-nav');
                   $('.detail-page-nav span.detail-bar').removeClass('show');
                  $('.detail-page-nav ul').removeClass('container');
              }
          });
          $('.detail-page-nav ul li > a').click(function() {
          $('li> a').removeClass();
          $(this).addClass('active');
      });
</script>

<!-- Property Image Slider Script -->
<script>
   $(document).ready(function() {   
       $("#content-slider").lightSlider({
           loop:true,
           keyPress:true
       });
   
   
   var wWidth = $(window).width();
   if(wWidth >= 992 ){
       $('#prop-slider-1').lightSlider({
           gallery:true,
           item:1,
           vertical:true,
           verticalHeight:500,
           vThumbWidth:200,
           thumbItem:4,
           thumbMargin:7,
           slideMargin:0,
           galleryMargin:30,
           onSliderLoad: function() {  
				
			$('#prop-slider-1').magnificPopup({ 
				delegate: 'a', 
				type: 'image',
					gallery:{
				    enabled:true,
				    navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image

			  	},
			  	zoom: {
				    enabled: true, // By default it's false, so don't forget to enable it
				    duration: 300, // duration of the effect, in milliseconds
				    easing: 'ease-in-out', // CSS transition easing function
				}
			});
         } 
       });
       
       }else{
       $('#prop-slider-1').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        galleryMargin:-12,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function() {  
				
			$('#prop-slider-1').magnificPopup({ 
				delegate: 'a', 
				type: 'image',
					gallery:{
				    enabled:true,
				    navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image

			  	},
			  	zoom: {
				    enabled: true, // By default it's false, so don't forget to enable it
				    duration: 300, // duration of the effect, in milliseconds
				    easing: 'ease-in-out', // CSS transition easing function
				}
			});
         } 
    });  
       }
   });
</script>

<!-- Smooth Scroll Script -->
<script>
   $(document).ready(function(){
       // Add smooth scrolling to all links
       $("a").on('click', function(event) {
    
           // Make sure this.hash has a value before overriding default behavior
           if (this.hash !== "") {
               // Prevent default anchor click behavior
               event.preventDefault();
    
               // Store hash
               var hash = this.hash;
                 hash= $(hash).offset().top - 80;
               // Using jQuery's animate() method to add smooth page scroll
               // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
               $('html, body').animate({
                   scrollTop: hash
               }, 800, function(){
    
                   // Add hash (#) to URL when done scrolling (default click behavior)
                   window.location.hash = hash;
               });
           } // End if
       });
   });
</script>

<!-- View Agent Mobile Number Script -->
<script type="text/javascript">
   $('#numb').click(function(){
   
     });
   
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

<!-- Read More And Read Less Description Script -->
<script>
   $(document).ready(function() {
   (function() {
    var showChar = 400;
    var ellipsestext = "...";
   
    $(".truncate").each(function() {
      var content = $(this).html();
      if (content.length > showChar) {
        var c = content.substr(0, showChar);
        var h = content;
        var html =
          '<div class="truncate-text" style="display:block">' +
          c +
          '<span class="moreellipses">' +
          ellipsestext +
          '&nbsp;&nbsp;<a href="" class="moreless more">more</a></span></div>'+
          '<div class="truncate-text" style="display:none">' +
          h +
          '<span class="moreellipses"><a href="" class="moreless less">Less</a></span></div>';
   
        $(this).html(html);
      }
    });
   
    $(".moreless").click(function() {
      var thisEl = $(this);
      var cT = thisEl.closest(".truncate-text");
      var tX = ".truncate-text";
   
      if (thisEl.hasClass("less")) {
        cT.prev(tX).toggle();
        cT.slideToggle();
      } else {
        
        cT.toggle();
        cT.next(tX).fadeToggle();
        
      }
      return false;
    });
    /* end iffe */
   })();
   
   /* end ready */
   });
</script>

<?php
   if (!function_exists('nice_number')) {
function nice_number($n)
      {
      // first strip any formatting;
          $n = (0 + str_replace(",", "", $n));
      
      // is this a number?
          if (!is_numeric($n)) return false;
      
      // now filter it;
          if ($n > 1000000000000) return round(($n / 1000000000000), 2) . ' Trillion';
          elseif ($n > 1000000000) return round(($n / 1000000000), 2) . ' Billion';
          elseif ($n > 1000000) return round(($n / 1000000), 2) . ' Million';
          elseif ($n > 100000) return round(($n / 100000), 2) . ' Lac';
          elseif ($n > 1000) return round(($n / 1000), 2) . ' Thousand';
      
          return number_format($n);
      }
}
      
      // echo nice_number('14120000'); //14.12 million  
?>
@endsection