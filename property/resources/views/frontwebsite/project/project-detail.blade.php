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
<style>
   /*Lightbox Style*/
   #lightbox_1234,#lightbox_1234567 {
   position:fixed;
   /* keeps the lightbox window in the current viewport */
   top:0;
   left:0;
   width:100%;
   height:100%;
   background:rgba(51, 51, 51, .6);
   text-align:center;
   z-index: 9999999999999999
   }
   #content_abc,
   #content_1234 {
   position: absolute;
   left: 0;
   right: 0;
   top: 10%;
   bottom: 0;
   }
   #lightbox_1234 p,
   #lightbox_1234567 p {
   text-align:right;
   color:#fff;
   margin-right:20px;
   font-size:12px;
   }
   #lightbox_1234 img,
   #lightbox_1234567 img {
   box-shadow:0 0 25px #111;
   -webkit-box-shadow:0 0 25px #111;
   -moz-box-shadow:0 0 25px #111;
   max-width:940px;
   max-height: 500px;
   }
   .lightbox_close_btn {
   position: absolute;
   right: 0;
   cursor: pointer;
   background: white;
   display: inline-block;
   padding: 5px 10px;
   color: red;
   margin-right: 10px;
   margin-top: 10px;
   }
   #wrapper_1234 ul li{
   margin: 0 40px !important;
   }
   #wrapper_1234567 ul li{
   margin: 0 48px !important;
   }
   .project #planImg {
   border-radius: 5px;
   cursor: pointer;
   transition: 0.3s;
   }
   .project #planImg:hover {opacity: 0.7;}
   /* The Modal (background) */
   .project .modal {
   display: none; /* Hidden by default */
   position: fixed; /* Stay in place */
   z-index: 9999; /* Sit on top */
   padding-top: 100px; /* Location of the box */
   left: 0;
   top: 0;
   width: 100%; /* Full width */
   height: 100%; /* Full height */
   overflow: auto; /* Enable scroll if needed */
   background-color: rgb(0,0,0); /* Fallback color */
   background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
   }
   /* Modal Content (image) */
   .project .modal-content {
   margin: auto;
   display: block;
   width: 80%;
   max-width: 700px;
   }
   /* Caption of Modal Image */
   .project #caption {
   margin: auto;
   display: block;
   width: 80%;
   max-width: 700px;
   text-align: center;
   color: #ccc;
   padding: 10px 0;
   height: 150px;
   }
   /* Add Animation */
   .project .modal-content, #planImg-caption {  
   -webkit-animation-name: zoom;
   -webkit-animation-duration: 0.6s;
   animation-name: zoom;
   animation-duration: 0.6s;
   }
   @-webkit-keyframes zoom {
   from {-webkit-transform:scale(0)} 
   to {-webkit-transform:scale(1)}
   }
   @keyframes zoom {
   from {transform:scale(0)} 
   to {transform:scale(1)}
   }
   /* The Close Button */
   .project .close {
   position: absolute;
   top: 15px;
   right: 35px;
   color: #f1f1f1;
   font-size: 40px;
   font-weight: bold;
   transition: 0.3s;
   }
   .project .close:hover,
   .project .close:focus {
   color: #bbb;
   text-decoration: none;
   cursor: pointer;
   }
   /* 100% Image Width on Smaller Screens */
   @media only screen and (max-width: 700px){
   .modal-content {
   width: 100%;
   }
   }
</style>
<div class="main project" id="main">
   <section class="top-section" id="overview">
      <div class="container-fluid">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="col-md-12 prop-view-head no-padding">
                     <h3> <?= $property->title;?></h3>
                     <span>{{$property->address}}</span>
                  </div>
                  <!-- Share Icon -->
                  <div class="col-md-12 prop-view-price no-padding">
                     <ul class="list-inline">
                        <li class=" pull-left">
                           <ul class="list-inline">
                              @if(!empty($property->area)&&($property->area_type))
                              <li><img src="/home_images/icons/5 marla.svg">{{$property->area}} {{$property->area_type}}</li>
                              @endif
                              <li><img src="/home_images/icons/parking.svg"> @if($property->visitor_parking != null) yes @else
                                 NA
                                 @endif
                              </li>
                           </ul>
                        </li>
                        @if($property->purpose != 4)
                        <li>
                           <h4>PKR {{number_format($property->price)}}</h4>
                        </li>
                        @endif
                        <li class="pull-right">
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
                     <li data-thumb="<?php  echo "$base/images/user_{{$type}}_video/{{$property->video}}";?>" class="project-video" id="project-video1">
                        <iframe style="width: 100%; height: 100%" src="/images/user_{{$type}}_video/{{$property->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     <li data-thumb="{{$youtube_thumb}}" class="project-video-thumb"  id="project-video2" >
                        <iframe style="width: 100%; height: 100%" class="embed-responsive-item" src="{{$youtube_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     @elseif(!empty($property->video) && empty($property->youtube_link))
                     <li data-thumb="<?php echo "$base/images/user_{{$type}}_video/{{$property->video}}";?>" class="project-video" id="project-video3">
                        <iframe style="width: 100%; height: 100%" class="embed-responsive-item" src="/images/user_{{$type}}_video/{{$property->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     @elseif(empty($property->video) && !empty($property->youtube_link))
                     <li data-thumb="{{$youtube_thumb}}" class="project-video-thumb"  id="project-video4">
                        <iframe style="width: 100%; height: 100%" class="embed-responsive-item" src="{{$youtube_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </li>
                     @endif
                     @endif
                     @foreach($images as $image)
                     <?php $gallery_src = ab_image("images/property/user_property/original_$image"); ?>
                     <li data-thumb= "<?php echo ab_image("images/property/user_property/thumb_$image");?>">
                        <img src="<?php echo $gallery_src;?>"  class="img-responsive images_gallery" />
                        <a download="property_{{$image}}" href="<?php echo $gallery_src;?>" class="save-img"><i class="fa fa-download"></i></a>
                     </li>
                     @endforeach
                     @else
                     @if(in_array($property->property_type_id ,$property_type_array))
                     <!--<li > <img src="https://maps.googleapis.com/maps/api/staticmap?center={{$property->latitude}},{{$property->longitude}}&markers=color:orange%7Clabel:R%7C{{$property->latitude}},{{$property->longitude}}&zoom=12&size=512x384&sensor=true&key=AIzaSyBq8gdCcmzERDnikFG5ZXPT2cl_HBIXEWY"  class="img-responsive"/> </li>-->
                     <li><img src="/assets/images/img1.jpg"  height="auto" width="100%" ></li>
                     @else
                     <li data-thumb="<?php echo asset("/assets/images/img1.jpg");?>"> <img src="<?php echo asset("/assets/images/img1.jpg");?>"  class="img-responsive images_gallery"/> <a class="save-img" href="#"><i class="fa fa-download"></i></a> </li>
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
               <div class="col-md-12 detail-page-nav ">
                  <ul class="list-inline">
                     <li class="li-overview">
                        <a href="#overview">
                           <span>
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                 xml:space="preserve">
                                 <style type="text/css">
                                    .st0 {
                                    fill: #FFFFFF;
                                    }
                                 </style>
                                 <g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M427.6,251.2c-8.3,0-14.8,6.4-14.8,14.8v201.7H308.2v-82.4c0-7.7-6.4-14.5-14.2-14.5h-75.7
                                             c-8.3,0-15,6.8-15,14.5v82.4H98.9v-195c0-7.8-6.4-14.3-14.8-14.3c-7.8,0-14.2,6.5-14.2,14.3v209.8c0,7.8,6.4,14.3,14.2,14.3
                                             h134.2c7.8,0,14.2-6.5,14.2-14.3v-82.4h46.7v82.4c0,7.8,6.4,14.3,14.8,14.3h133.6c7.8,0,14.2-6.5,14.2-14.3V266
                                             C441.8,257.6,435.4,251.2,427.6,251.2z" />
                                          <path id="facebook" fill="#111" class="st0" d="M507.8,262.7L391.4,145.8V66c0-8.3-6.7-14.7-15-14.7c-7.8,0-14.2,6.4-14.2,14.7v50.5l-96.1-96.6
                                             c-2.9-3-6.4-4.6-9.9-4.6c-4,0-7.5,1.7-10.5,4.6L4.5,261.1c-5.8,5.8-6.2,15.1,0,20.4c5.4,6.2,14.6,5.8,20.4,0L256.2,50.7
                                             l230.7,232.9c2.4,2.4,5.9,3.8,10.5,3.8c4,0,7.5-1.4,10.5-3.8C513.2,278.3,513.6,268.5,507.8,262.7z" />
                                       </g>
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Overview</span>
                        </a>
                     </li>
                     <li class="li-overview">
                        <a href="#description">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                 xml:space="preserve">
                                 <style type="text/css">
                                    .st0 {
                                    fill: #FFFFFF;
                                    }
                                 </style>
                                 <g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0"
                                             d="M397.7,78.4c6.8,0,12.4-5.5,12.4-12.4V27c0-14.9-12.1-27-27-27H121.6c-3.3,0-6.4,1.3-8.7,3.6L10.5,106
                                             c-2.3,2.3-3.6,5.5-3.6,8.7V485c0,14.9,12.1,27,27,27h349.1c14.9,0,27-12.1,27-27V296.3c0-6.8-5.5-12.4-12.4-12.4
                                             c-6.8,0-12.4,5.5-12.4,12.4V485c0,1.3-1,2.3-2.3,2.3H33.9c-1.3,0-2.3-1-2.3-2.3V127.1H107c14.9,0,27-12.1,27-27V24.7h249.1
                                             c1.3,0,2.3,1,2.3,2.3v39C385.4,72.8,390.9,78.4,397.7,78.4z M109.3,100.1c0,1.3-1,2.3-2.3,2.3H49.1l60.2-60.2V100.1z" />
                                       </g>
                                    </g>
                                    <g>
                                       <g>
                                          <path id="facebook" fill="#111" class="st0" d="M492.9,100.4l-14.5-14.5c-16.3-16.3-42.8-16.3-59.1,0L303.8,201.3H103.6c-6.8,0-12.4,5.5-12.4,12.4
                                             s5.5,12.4,12.4,12.4H279l-74.4,74.4H103.6c-6.8,0-12.4,5.5-12.4,12.4s5.5,12.4,12.4,12.4H180l-0.2,0.2c-1.5,1.5-2.6,3.4-3.2,5.4
                                             l-19.1,68.7h-53.9c-6.8,0-12.4,5.5-12.4,12.4s5.5,12.4,12.4,12.4h63.3c0,0,2.7-0.3,3.1-0.4c0.1,0,78-21.6,78-21.6
                                             c2.1-0.6,3.9-1.7,5.4-3.2l239.4-239.4C509.2,143.2,509.2,116.7,492.9,100.4z M184.6,394.1l10.1-36.3L221,384L184.6,394.1z
                                             M244.7,372.8L206,334l197.6-197.6l38.7,38.7L244.7,372.8z M475.4,142.1l-15.6,15.6l-38.7-38.7l15.6-15.6
                                             c6.7-6.7,17.5-6.7,24.2,0l14.5,14.5C482.1,124.5,482.1,135.4,475.4,142.1z" />
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
                     <li class="li-feature">
                        <a href="#feature">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 900 900" style="enable-background:new 0 0 900 900;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                 </style>
                                 <g>
                                    <path class="st0" d="M249.2,114.6l-62.3-4.6c-5.6-0.9-10.2-3.7-13-9.3L149.8,43c-5.6-12.1-23.2-12.1-27.9,0l-24.2,57.6
                                       c-1.9,5.6-7.4,9.3-13,9.3l-62.3,4.6c-13.9,0.9-18.6,17.7-8.4,27l47.4,40.9c4.6,3.7,6.5,9.3,4.6,14.9l-14.9,61.3
                                       c-2.8,13,11.2,23.2,23.2,16.7l53.9-32.5c4.6-2.8,11.2-2.8,15.8,0l53.9,32.5c11.2,7.4,26-3.7,23.2-16.7l-14.9-61.3
                                       c-0.9-5.6,0.9-11.2,4.6-14.9l47.4-40.9C268.7,132.2,263.2,115.5,249.2,114.6z"/>
                                    <path class="st0" d="M377.5,225.2H844c26,0,47.4-21.4,47.4-47.4s-21.4-47.4-47.4-47.4H377.5c-26,0-47.4,21.4-47.4,47.4
                                       S351.5,225.2,377.5,225.2z"/>
                                    <path class="st0" d="M249.2,408.3l-62.3-4.6c-5.6,0-10.2-3.7-13-9.3l-24.2-57.6c-5.6-12.1-23.2-12.1-27.9,0l-24.2,57.6
                                       c-1.9,5.6-7.4,9.3-13,9.3l-62.3,4.6c-13.9,0.9-18.6,17.7-8.4,27l47.4,40.9c4.6,3.7,6.5,9.3,4.6,14.9l-14.9,61.3
                                       c-2.8,13,11.2,23.2,23.2,16.7l53.9-32.5c4.6-2.8,11.2-2.8,15.8,0l53.9,32.5c11.2,7.4,26-3.7,23.2-16.7L206.5,491
                                       c-0.9-5.6,0.9-11.2,4.6-14.9l47.4-40.9C268.7,426.8,263.2,410.1,249.2,408.3z"/>
                                    <path class="st0" d="M844,425H377.5c-26,0-47.4,21.4-47.4,47.4s21.4,47.4,47.4,47.4H844c26,0,47.4-21.4,47.4-47.4
                                       S870.1,425,844,425z"/>
                                    <path class="st0" d="M249.2,702.9l-62.3-4.6c-5.6,0-10.2-3.7-13-9.3l-24.2-57.6c-5.6-12.1-23.2-12.1-27.9,0l-24.2,57.6
                                       c-1.9,5.6-7.4,9.3-13,9.3l-62.3,4.6c-13.9,0.9-18.6,17.7-8.4,27l47.4,40.9c4.6,3.7,6.5,9.3,4.6,14.9l-14.9,61.3
                                       c-2.8,13,11.2,23.2,23.2,16.7l53.9-32.5c4.6-2.8,11.2-2.8,15.8,0l53.9,32.5c11.2,7.4,26-3.7,23.2-16.7l-14.9-61.3
                                       c-0.9-5.6,0.9-11.2,4.6-14.9l47.4-40.9C268.7,720.5,263.2,703.8,249.2,702.9z"/>
                                    <path class="st0" d="M844,719.6H377.5c-26,0-47.4,21.4-47.4,47.4c0,26,21.4,47.4,47.4,47.4H844c26,0,47.4-21.4,47.4-47.4
                                       C891.4,740.1,870.1,719.6,844,719.6z"/>
                                 </g>
                              </svg>
                           </span>
                           <span>Features</span> 
                        </a>
                     </li>
                     @endif
                     <li class="li-prop-type">
                        <a href="#prop-type">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 900 900" style="enable-background:new 0 0 900 900;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                 </style>
                                 <g>
                                    <path class="st0" d="M804.7,319.8V210.7c0-12-7.6-21.6-17.1-21.6h-86.4c-9.5,0-17.1,9.6-17.1,21.6v109.2c0,12,7.6,21.6,17.1,21.6
                                       h86.4C797.1,341.4,804.7,331.8,804.7,319.8z M788.5,319.8c0,1.2,0,1.2-0.9,1.2h-86.4c-0.9,0-0.9,0-0.9-1.2V210.7
                                       c0-1.2,0-1.2,0.9-1.2h86.4c0.9,0,0.9,0,0.9,1.2V319.8z"/>
                                    <path class="st0" d="M682.2,448.2v109.2c0,12,7.6,21.6,17.1,21.6h86.4c9.5,0,17.1-9.6,17.1-21.6V448.2c0-12-7.6-21.6-17.1-21.6
                                       h-86.4C690.7,426.6,683.1,436.2,682.2,448.2z M698.3,448.2c0-1.2,0-1.2,0.9-1.2h86.4c0.9,0,0.9,0,0.9,1.2v109.2
                                       c0,1.2,0,1.2-0.9,1.2h-86.4c-0.9,0-0.9,0-0.9-1.2V448.2z"/>
                                    <path class="st0" d="M525.5,577.7h86.4c9.5,0,17.1-9.6,17.1-21.6V447c0-12-7.6-21.6-17.1-21.6h-86.4c-9.5,0-17.1,9.6-17.1,21.6
                                       v109.2C508.4,566.9,516,576.5,525.5,577.7z M611.9,557.3h-86.4c-0.9,0-0.9,0-0.9-1.2V447c0-1.2,0-1.2,0.9-1.2h86.4
                                       c0.9,0,0.9,0,0.9,1.2v109.2C612.9,556.1,612.9,557.3,611.9,557.3z"/>
                                    <path class="st0" d="M630.9,318.6V209.5c0-12-7.6-21.6-17.1-21.6h-86.4c-9.5,0-17.1,9.6-17.1,21.6v109.2c0,12,7.6,21.6,17.1,21.6
                                       h86.4C623.3,340.2,630.9,330.6,630.9,318.6z M614.8,318.6c0,1.2,0,1.2-0.9,1.2h-86.4c-0.9,0-0.9,0-0.9-1.2V209.5
                                       c0-1.2,0-1.2,0.9-1.2h86.4c0.9,0,0.9,0,0.9,1.2V318.6z"/>
                                    <path class="st0" d="M221.7,574.1v19.2c0,15.6,10.4,28.8,22.8,28.8h56c12.3,0,22.8-13.2,22.8-28.8v-19.2
                                       c0-15.6-10.4-28.8-22.8-28.8h-56C232.1,545.3,221.7,558.5,221.7,574.1z M237.8,574.1c0-6,3.8-9.6,7.6-9.6h56c4.7,0,7.6,4.8,7.6,9.6
                                       v19.2c0,6-3.8,9.6-7.6,9.6h-56c-4.7,0-7.6-4.8-7.6-9.6V574.1z"/>
                                    <path class="st0" d="M26.1,647.3c0.9,4.8,3.8,7.2,6.6,7.2l60.8,4.8v194.3c0,18,11.4,33.6,26.6,33.6h92.1h8.5h102.5h102.5h0.9
                                       c0.9,1.2,2.8,1.2,3.8,1.2h167.1h118.7h128.2c19,0,35.1-19.2,35.1-44.4V58.3c0-24-15.2-44.4-35.1-44.4h-376
                                       c-19,0-35.1,19.2-35.1,44.4v477.4L288.2,371.4c-7.6-9.6-21.8-9.6-30.4,0l-77.9,90V405c0-4.8-2.8-9.6-7.6-9.6H103
                                       c-3.8,0-7.6,3.6-7.6,9.6v153.5l-67.4,78C25.1,640.1,24.2,643.7,26.1,647.3z M163.8,414.6v64.8l-53.2,61.2V414.6H163.8z
                                       M605.3,719.2c0-2.4,0.9-3.6,2.8-3.6H705c1.9,0,2.8,1.2,2.8,3.6V868H605.3C605.3,868,605.3,719.2,605.3,719.2z M590.1,719.2v149.9
                                       H449.6c1.9-4.8,2.8-9.6,2.8-15.6V655.7l63.6-2.4c3.8,0,6.6-2.4,7.6-6c0.9-3.6,0.9-8.4-1.9-10.8l-72.2-82.8V58.3
                                       c0-14.4,9.5-25.2,19.9-25.2h375.1c11.4,0,19.9,12,19.9,25.2v784.5c0,14.4-9.5,25.2-19.9,25.2H724V719.2c0-13.2-8.5-24-19-24h-96.8
                                       C597.7,695.2,590.1,706,590.1,719.2z M229.3,757.6c0-8.4,5.7-15.6,12.3-15.6h61.7c6.6,0,12.3,7.2,12.3,15.6v109.2h-86.4
                                       C229.3,866.8,229.3,757.6,229.3,757.6z M52.7,636.5l56-64.8l69.3-80.4l91.2-105.6c2.8-3.6,6.6-3.6,9.5,0L497,634.1l-51.3,1.2
                                       c-3.8,0-7.6,3.6-7.6,9.6v208.7c0,8.4-5.7,14.4-11.4,14.4h-94V758.8c0-20.4-13.3-36-28.5-36h-61.7c-16.1,0-28.5,16.8-28.5,36V868
                                       l0,0h-94c-6.6,0-11.4-7.2-11.4-14.4V649.7c0-4.8-3.8-9.6-7.6-9.6L52.7,636.5z"/>
                                 </g>
                              </svg>
                           </span>
                           <span>Property Type</span>
                        </a>
                     </li>
                     <li class="li-payment-and-floor">
                        <a href="#payment-and-floor">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 900 900" style="enable-background:new 0 0 900 900;" xml:space="preserve">
                                 <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                 </style>
                                 <g>
                                    <g>
                                       <path class="st0" d="M839.9,103.4H161.2V89c0-39.9-32.3-72.2-72.2-72.2S16.8,49.1,16.8,89V811c0,39.9,32.3,72.2,72.2,72.2h751
                                          c23.9,0,43.3-19.4,43.3-43.3V146.7C883.2,122.8,863.8,103.4,839.9,103.4z M782.2,204.5v303.3h-28.9v-72.2c0-3.8-1.5-7.5-4.2-10.2
                                          c-2.7-2.7-6.4-4.2-10.2-4.2c-50.2,0.1-92.7,37-99.9,86.6h-30V204.5H782.2z M608.9,753.3c0-3.8-1.5-7.5-4.2-10.2
                                          c-2.7-2.7-6.4-4.2-10.2-4.2c-34.3,0-63.8-24.2-70.8-57.8h70.8c3.8,0,7.5-1.5,10.2-4.2c2.7-2.7,4.2-6.4,4.2-10.2v-130h43.3
                                          c3.8,0,7.5-1.5,10.2-4.2c2.7-2.7,4.2-6.4,4.2-10.2c0-34.3,24.2-63.8,57.8-70.8v70.8c0,3.8,1.5,7.5,4.2,10.2
                                          c2.7,2.7,6.4,4.2,10.2,4.2h43.3v245.5H608.9V753.3z M580,305.6h-43.3c-3.8,0-7.5,1.5-10.2,4.2s-4.2,6.4-4.2,10.2
                                          c0,34.3-24.2,63.8-57.8,70.8V320c0-3.8-1.5-7.5-4.2-10.2s-6.4-4.2-10.2-4.2H305.6V204.5H580V305.6z M276.7,305.6h-43.3
                                          c-8,0-14.4,6.5-14.4,14.4c0,8,6.5,14.4,14.4,14.4h202.2v72.2c0,3.8,1.5,7.5,4.2,10.2s6.4,4.2,10.2,4.2c50.2-0.1,92.7-37,99.9-86.6
                                          h30v317.7h-72.2c-3.8,0-7.5,1.5-10.2,4.2c-2.7,2.7-4.2,6.4-4.2,10.2c0.1,50.2,37,92.7,86.6,99.9v15.6H450V522.2
                                          c0-3.8-1.5-7.5-4.2-10.2c-2.7-2.7-6.4-4.2-10.2-4.2H334.5v-72.2c0-3.8-1.5-7.5-4.2-10.2c-2.7-2.7-6.4-4.2-10.2-4.2
                                          c-50.2,0.1-92.7,37-99.9,86.6h-58.9V204.5h115.5V305.6z M161.2,782.2V536.6h72.2c3.8,0,7.5-1.5,10.2-4.2c2.7-2.7,4.2-6.4,4.2-10.2
                                          c0-34.3,24.2-63.8,57.8-70.8v70.8c0,3.8,1.5,7.5,4.2,10.2c2.7,2.7,6.4,4.2,10.2,4.2h101.1v245.5H161.2z M89,45.6
                                          c23.9,0,43.3,19.4,43.3,43.3v664.7c-25.5-19.7-61.1-19.7-86.6,0V89C45.7,65,65,45.7,89,45.6z M45.6,811
                                          c0-23.9,19.4-43.3,43.3-43.3s43.3,19.4,43.3,43.3c0,23.9-19.4,43.3-43.3,43.3C65,854.3,45.7,835,45.6,811L45.6,811z M854.4,839.9
                                          c0,8-6.5,14.4-14.4,14.4H146.4c9.6-12.4,14.8-27.6,14.8-43.3h635.4c3.8,0,7.5-1.5,10.2-4.2c2.7-2.7,4.2-6.4,4.2-10.2V190.1
                                          c0-3.8-1.5-7.5-4.2-10.2c-2.7-2.7-6.4-4.2-10.2-4.2H161.2v-43.3h678.8c8,0,14.4,6.5,14.4,14.4V839.9z"/>
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Payment and Floor Plan</span>
                        </a>
                     </li>
                     <li class="li-map-sect">
                        <a href="#map-sect">
                           <span>
                              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                 xml:space="preserve">
                                 <style type="text/css">
                                    .st0 {
                                    fill: none;
                                    stroke: #FFFFFF;
                                    stroke-width: 26;
                                    stroke-miterlimit: 10;
                                    }
                                 </style>
                                 <g>
                                    <g>
                                       <path id="facebook" fill="#111" class="st0" d="M256,22.7c-93.2,0-169,75.8-169,169c0,115.6,151.2,285.4,157.7,292.6c6,6.7,16.6,6.7,22.6,0
                                          c6.4-7.2,157.7-176.9,157.7-292.6C425,98.5,349.2,22.7,256,22.7z M256,276.7c-46.9,0-85-38.1-85-85s38.1-85,85-85s85,38.1,85,85
                                          S302.9,276.7,256,276.7z" />
                                    </g>
                                 </g>
                              </svg>
                           </span>
                           <span>Nearby</span>
                        </a>
                     </li>
                     <li class="pull-right">
                        <span onclick="openNav()" class="detail-bar"><i class="fa fa-bars"></i> </span>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="row detail-pagebtm-sect" id="description">
               <div class="col-md-12">
                  <div class="col-md-12 no-padding">
                     <div class="col-md-12 detail-prop-desc pl">
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
                     <div class="col-md-12 feature-margintop pl prop-type" id="prop-type">
                        <div class="row mr ml">
                           <h3>Property Type</h3>
                           <table class="table prop-type-table" id="table1">
                              <thead>
                                 <tr>
                                    <th class="prop-table-title">Title</th>
                                    <th class="prop-table-area">Area</th>
                                    <th class="prop-table-price">Price</th>
                                    <th class="prop-table-bath">Bath</th>
                                    <th class="prop-table-bed">Bed</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($data['scheme'] as $scheme)
                                 <tr>
                                    <td class="prop-table-title">{{$scheme->title}} {{ $scheme->property_type_name }}</td>
                                    <td class="prop-table-area">{{$scheme->area}} {{$scheme->area_type}}</td>
                                    <td class="prop-table-price">{{$scheme->min_price}} - {{$scheme->max_price}}</td>
                                    @if($scheme->bath != 0)
                                    <td class="prop-table-bath">{{$scheme->bath}}</td>
                                    @else
                                    <td class="prop-table-bath"> -</td>
                                    @endif
                                    @if($scheme->bed != 0)
                                    <td class="prop-table-bed">{{$scheme->bed}}</td>
                                    @else
                                    <td class="prop-table-bed">-</td>
                                    @endif
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="col-md-12 pl payment-and-floor" id="payment-and-floor">
                        <div id="myModal" class="modal">
                           <span class="close">&times;</span>
                           <img class="modal-content" id="planImg">
                           <div id="planImg-caption"></div>
                        </div>
                        <div class="row mr ml">
                           <h3>Payment and Floor Plan</h3>
                           <div class="payment-and-floor-main">
                              <div class="p-actions">
                                 @if(isset($data['floor_plan'][0]->image))
                                 <div class="col-md-2 col-sm-2 col-xs-3 no-padding">
                                    <button class="p-a-f-btn proptablinks active"
                                       onclick="propHandling(event, 'bed1')">1 BED</button>
                                 </div>
                                 @elseif(isset($data['floor_plan'][0]->image))
                                 <div class="col-md-2 col-sm-2 col-xs-3 no-padding main-feature-head ">
                                    <button class="p-a-f-btn proptablinks "
                                       onclick="propHandling(event, 'bed2')">2 BED</button>
                                 </div>
                                 @elseif(isset($data['floor_plan'][0]->image))
                                 <div class="col-md-2 col-sm-2 col-xs-3 no-padding">
                                    <button class="p-a-f-btn proptablinks"
                                       onclick="propHandling(event, 'bed3')">3 BED</button>
                                 </div>
                                 @elseif(isset($data['payment_plan']))
                                 <div class="col-md-3 col-sm-3 col-xs-3 no-padding main-feature-head ">
                                    <button class="p-a-f-btn proptablinks active"
                                       onclick="propHandling(event, 'payment-plan')">PAYMENT PLAN</button>
                                       
                                 </div>
                                 
                                 @endif
                              </div>
                              <div class="p-content">
                                 <div class="col-md-12 col-sm-12 col-xs-12 no-padding payment-floor-content-section">
                                    <div class="bed1-section proptabcontent" id="bed1">
                                       <div id="myCarousel" class="carousel floor-slide slide"
                                          data-ride="carousel">
                                          <!-- Wrapper for slides -->
                                          <div class="carousel-inner">
                                             <div class="item active">
                                                <div class="row ">
                                                   <!--<div class="vertical-align">-->
                                                   <!--   <div class="col-md-6 col-xs-6">-->
                                                   <!--      <h6 class="floor-detail">1 Bed Apartment-->
                                                   <!--      </h6>-->
                                                   <!--      <h6 class="floor-net-area">Net Area: <span-->
                                                   <!--         class="the-color">472.00-->
                                                   <!--         sqft</span>-->
                                                   <!--      </h6>-->
                                                   <!--   </div>-->
                                                   <!--   <div class="col-md-6 col-xs-6">-->
                                                   <!--      <h6 class="text-right floor-price">Base-->
                                                   <!--         Price: <span-->
                                                   <!--            class="f-price">3,500,000</span>-->
                                                   <!--      </h6>-->
                                                   <!--   </div>-->
                                                   <!--</div>-->
                                                   <div class="col-md-12 floor-plan-image">
                                                      @if(isset($data['floor_plan'][0]->image))
                                                      <!--<a href="/images/property/floorPlan/original_{{ $data['floor_plan'][0]->image }}" class="lightbox_trigger_1234567 ">-->
                                                      <figure class="homes"><img src="/images/property/floorPlan/original_{{ $data['floor_plan'][0]->image }}" class="img-responsive" onclick="imgPopup(this)"> </figure>
                                                      <!--</a>-->
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Left and right controls -->
                                          <a class="left carousel-control" href="#myCarousel"
                                             data-slide="prev">
                                          <span class="glyphicon glyphicon-chevron-left"></span>
                                          <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="right carousel-control" href="#myCarousel"
                                             data-slide="next">
                                          <span class="glyphicon glyphicon-chevron-right"></span>
                                          <span class="sr-only">Next</span>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="bed2-section proptabcontent" id="bed2">
                                       <!-- <button id="show-map" class="btn-map">Show Map</button>
                                          <div id="map"></div> -->
                                       <div id="myCarousel" class="carousel floor-slide slide"
                                          data-ride="carousel">
                                          <!-- Wrapper for slides -->
                                          <div class="carousel-inner">
                                             <div class="item active">
                                                <div class="row ">
                                                   <!--<div class="vertical-align">-->
                                                   <!--   <div class="col-md-6 col-xs-6">-->
                                                   <!--      <h6 class="floor-detail">2 Bed Apartment-->
                                                   <!--      </h6>-->
                                                   <!--      <h6 class="floor-net-area">Net Area: <span-->
                                                   <!--         class="the-color">672.00-->
                                                   <!--         sqft</span>-->
                                                   <!--      </h6>-->
                                                   <!--   </div>-->
                                                   <!--   <div class="col-md-6 col-xs-6">-->
                                                   <!--      <h6 class="text-right floor-price">Base-->
                                                   <!--         Price: <span-->
                                                   <!--            class="f-price">13,500,000</span>-->
                                                   <!--      </h6>-->
                                                   <!--   </div>-->
                                                   <!--</div>-->
                                                   <div class="col-md-12 floor-plan-image">
                                                      @if(isset($data['floor_plan'][1]->image))
                                                      <!--<a href="/images/property/floorPlan/original_{{ $data['floor_plan'][1]->image }}" class="lightbox_trigger_1234567 homes">-->
                                                      <figure><img src="/images/property/floorPlan/original_{{ $data['floor_plan'][1]->image }}" class="img-responsive" onclick="imgPopup(this)"> </figure>
                                                      <!--</a>-->
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Left and right controls -->
                                          <a class="left carousel-control" href="#myCarousel"
                                             data-slide="prev">
                                          <span class="glyphicon glyphicon-chevron-left"></span>
                                          <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="right carousel-control" href="#myCarousel"
                                             data-slide="next">
                                          <span class="glyphicon glyphicon-chevron-right"></span>
                                          <span class="sr-only">Next</span>
                                          </a>
                                       </div>
                                    </div>
                                    <!--<div class="bed3-section proptabcontent" id="bed3">-->
                                    <!-- <button id="show-map" class="btn-map">Show Map</button>
                                       <!--    <div id="map"></div> -->
                                    <!--    <div id="myCarousel" class="carousel floor-slide slide"-->
                                    <!--        data-ride="carousel">-->
                                    <!-- Wrapper for slides -->
                                    <!--        <div class="carousel-inner">-->
                                    <!--            <div class="item active">-->
                                    <!--                <div class="row ">-->
                                    <!--                    <div class="vertical-align">-->
                                    <!--                        <div class="col-md-6 col-xs-6">-->
                                    <!--                            <h6 class="floor-detail">3 Bed Apartment-->
                                    <!--                            </h6>-->
                                    <!--                            <h6 class="floor-net-area">Net Area: <span-->
                                    <!--                                    class="the-color">872.00-->
                                    <!--                                    sqft</span></h6>-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-md-6 col-xs-6">-->
                                    <!--                            <h6 class="text-right floor-price">Base-->
                                    <!--                                Price: <span-->
                                    <!--                                    class="f-price">30,500,000</span>-->
                                    <!--                            </h6>-->
                                    <!--                        </div>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-md-12 floor-plan-image"><img-->
                                    <!--                            src="./images/proj/floor-img.png"-->
                                    <!--                            alt="Los Angeles" class="img-responsive">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!-- Left and right controls -->
                                    <!--        <a class="left carousel-control" href="#myCarousel"-->
                                    <!--            data-slide="prev">-->
                                    <!--            <span class="glyphicon glyphicon-chevron-left"></span>-->
                                    <!--            <span class="sr-only">Previous</span>-->
                                    <!--        </a>-->
                                    <!--        <a class="right carousel-control" href="#myCarousel"-->
                                    <!--            data-slide="next">-->
                                    <!--            <span class="glyphicon glyphicon-chevron-right"></span>-->
                                    <!--            <span class="sr-only">Next</span>-->
                                    <!--        </a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="payment-plan-section proptabcontent" id="payment-plan">
                                       <div class="pay-plan-back">
                                          <div id="lightboxprojext">
                                             <div id="wrapper_1234">
                                                <p>
                                                <ul class="list-unstyled list-inline">
                                                   @foreach($data['payment_plan'] as $payment) 
                                                   <li>
                                                      <!--<a href="/images/property/paymentPlan/original_{{ $payment->image }}" class="lightbox_trigger_1234">-->
                                                      <figure class="homes"><img src="/images/property/paymentPlan/original_{{ $payment->image }}" style="height: auto;width: 301px;" class="img-responsive" onclick="imgPopup(this)"></figure>
                                                      <!--</a>-->
                                                   </li>
                                                   @endforeach
                                                </ul>
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!--Payment plan end-->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="map-sect" id="map-sect">
      @if($map_image != null)  
      <div class="container " id="map-sect">
         <div class="row mr ml">
            <section class="map-sect" id="map-sect">
               <div class="map-main">
                  <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
                     <button class="map-btn tablinks" onclick="mapHandling(event, 'society-map')">NearBy</button>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
                     <button class="map-btn tablinks" onclick="mapHandling(event, 'google-map')">Map</button>
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
                        <!--<button id="show-map" class="btn-map">Show Map</button>-->
                        <div id="map"></div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      @else
      <div class="container" id="map-sect">
         <div class="row mr ml">
            <section class="map-sect" id="map-sect">
               <div class="map-main">
                  <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                     <button class="map-btn tablinks active" onclick="mapHandling(event, 'google-map')">Map</button>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 no-padding map-content-section">
                     <div class="map-section tabcontent" id="google-map" style="display:block">
                        <!--<button id="show-map" class="btn-map">Show Map</button>-->
                        <div id="map"></div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      @endif
   </section>
</div>
<!-- </section> -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('assets/js-new/lightslider.js')}}"></script>
<script  defer src="https://maps.googleapis.com/maps/api/js?key={{Config::get("name.google.googleMap")}}&callback=initMap&libraries=places" type="text/javascript"></script>
<!-- Google Map Script -->
<script type="text/javascript">   
   var modal = document.getElementById("myModal");
   
   // Get the image and insert it inside the modal - use its "alt" text as a caption
   var img = document.getElementById("bed01");
   var modalImg = document.getElementById("planImg");
   var captionText = document.getElementById("planImg-caption");
   function imgPopup(e){
     modal.style.display = "block";
     modalImg.src = e.src;
     captionText.innerHTML = e.alt;
   }
   
   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];
   
   // When the user clicks on <span> (x), close the modal
   span.onclick = function() { 
     modal.style.display = "none";
   }
   
   
   
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
           initialize();
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
           galleryMargin:30
       });
       
       }else{
       $('#prop-slider-1').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        galleryMargin:10,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        responsive: [
            {
                breakpoint:480,
                settings: {
                    verticalHeight: 300
                  }
            }
        ],
        onSliderLoad: function(el){
            console.log(el);
            el.clientHeight = "350px";
            console.log(el.clientHeight);
            $("#project-video4").css("height","290px");
            $("#prop-slider-1").css("height","290px");
            var images = $(".images_gallery");
            images.map(m=>{
                $(m).css("height","290px");
            })
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
     $('.prop-type-table').on('scroll', function() {
    $("#" + this.id + " > *").width($(this).width() + $(this).scrollLeft());
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
<script type="text/javascript">
   function propHandling(evt, sectionName) {
    var i, proptabcontent, tablinks;
    proptabcontent = document.getElementsByClassName("proptabcontent");
    for (i = 0; i < proptabcontent.length; i++) {
        proptabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("proptablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(sectionName).style.display = "block";
    evt.currentTarget.className += " active";
   }
</script>
@endsection