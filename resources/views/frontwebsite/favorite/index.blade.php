@php
$title = "favorite";
@endphp
@include("includes.title")
@foreach($properties as $property)
<div class="col-md-12">
	<div class="page-section">
		<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-12 col-xs-12 advance-search-sidebar"></div>
	<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="col-md-5 col-sm-12 col-xs-12 padding-left padding-right">
      <div class="advance-property-section">
        <div class="family-house advance-house">
          <figure>
              <div class="col-md-12 padding-left padding-right ">
                          @if($property->gallery != "")
                                         <?php
                                              $images =explode(';',$property->gallery);
                                          ?>
                  <a href="{{$property->url}}/{{$property->id}}"> <img class="img-responsive imgFill productImg" src="/images/property/user_property/original_{{$images[0]}}"></a>

                          @else
                  <a href="{{$property->url}}/{{$property->id}}"> <img class="img-responsive imgFill productImg" src="/assets/images/img1.jpg"></a>
                                     @endif    
            </div>

            <figcaption>
              @if($property->purpose == 1)
              <div class="feature-tag">for sale</div>
              @elseif($property->purpose ==2)
              <div class="feature-tag-rent">for rent</div>

              @elseif($property->purpose ==3)
              <div class="feature-tag-wanted">wanted</div>
              @else
              <div class="feature-tag-wanted">Project</div>
              @endif
             {{--  @if(Auth::check()) --}}


              <div class="feature-icons"><a href="javascript:void(0)" data-id="{{$property->id}}" class="saveProperty" data-toggle="tooltip" data-placement="top" title="Saved Properties"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
              {{-- @else

              <div class="feature-icons"><a href="javascript:void(0)" data-toggle="modal" data-target="#fsModal2" title="Saved Properties"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
              
              @endif --}}
              <div class="feature-photo-tag"> 
              <a href="{{$property->url}}/{{$property->id}}">More Photos</a></div>

            </figcaption>
          </figure>
        </div>
      </div>
    </div>

    <div class="col-md-7 col-sm-12 col-xs-12 advance-padding selectProduct" data-title="{{$property->title}}" data-location="{{$property->address}}" 

      @if($property->gallery != "")

      data-img="/images/property/user_property/original_{{$images[0]}}"
      @else
         data-img="/assets/images/img1.jpg"
      @endif



       data-id="{{$property->id}}">
      <div class="advance-property-detail">
        <div class="advance-property-heading">
            @if(strlen($property->title) <= 20)
            <a href="{{$property->url}}/{{$property->id}}"><h4>{{$property->title}}</h4></a>
                    @else
            <a href="{{$property->url}}/{{$property->id}}">  <h4><?php echo substr(strip_tags($property->title),0,20).'...';?></h4></a>
                    @endif
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <p><?php echo substr(strip_tags($property->address),0,50).'...';?></p> 
        </div>
          <style>
              /*** 2-4-2018 ***/
              .detail-with-logo{
                  float: left;
                  width: 100%;
              }
              .advance-property-detail-section ul li span {
                  float: none !important;
                  padding-right: 10px;
              }
              .detail-with-logo img{
                  width: 97px;
              }
          </style>
        <div class="advance-property-detail-section">
           @if($property->purpose != 4)
          <h3>PKR {{$property->price}}</h3>
          <div class="detail-with-logo">
            <div class="col-md-5 padding-left pull-left">
              <ul>
                  <li><span><i class="fa fa-bed" aria-hidden="true"></i></span>{{$property->bed}} bedrooms</li>
                  <li><span><i class="fa fa-bath" aria-hidden="true"></i></span>{{$property->bath}} bath</li>
                  <li><span><i class="fa fa-university" aria-hidden="true"></i></span>{{$property->total_floor}} floors</li>
              </ul>
          </div>
            <div class="col-md-7 padding-right text-right">
                @if(!empty($property->agency_website_logo))
                <a href="{{$property->agency_website_url}}"><img src="/images/logo/{{$property->agency_website_logo}}" alt="Logo" /></a>
                @endif
            </div>
          </div>
          @else
          <h3>{{ucfirst(App\Property::getCityName($property->city_id))}}</h3>
          <ul>
           <li>Residential<span>{{$property->min_area_residential}} {{$property->min_area_type_residential}}  - {{$property->max_area_residential}} {{$property->max_area_type_residential}}</span></li>
           <li>Commercial<span>{{$property->min_area_commercial}} {{$property->min_area_type_commercial}}  - {{$property->max_area_commercial}} {{$property->max_area_type_commercial}}</span></li>
                <li>City<span>{{App\Property::getCityName($property->city_id)}}</span></li>
          </ul>
          @endif    
          
        </div>
        <hr>
        <div class="advance-property-button">
            <a href="{{$property->url}}/{{$property->id}}">View Detail</a>
              @if($property->purpose != 4)

            <a class="addToCompare">Compare</a>
            @endif
          
          <div class="advance-property-btn-icon">
          

            <a href="javascript:void(0);" data-toggle="popover" title="Contact Number" data-content="
           {{App\Property::getphoneNumber($property->user_id)}}
            " data-placement="top"><i class="fa fa-phone" aria-hidden="true"></i></a>

            
            <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email{{$property->id}}"><i class="fa fa-envelope" aria-hidden="true"></i></a>

            <a data-toggle="dropdown" class="share-advance" href="javascript:void(0);">
             <i class="fa fa-share-alt" aria-hidden="true"></i>
              <span class="caret"></span>
           </a>
          <ul class="share-search dropdown-menu">
            <li>
              
             <!-- <a class="share-button btn btn-primary" data-share-url="http://www.jqueryscript.net" data-share-network="twitter" data-share-text="Share this awesome link on Twitter" data-share-title="Twitter Share" data-share-via="jqueryscript" data-share-tags="" data-share-media="" href="#"><i class="fa fa-twitter"></i> Share on Twitter</a> -->
             <a class="share-button btn btn-twitter" data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="twitter" data-share-text="Share this property on Twitter" data-share-title="<?= $property->title ?>" data-share-via="jqueryscript" data-share-tags="" 
              @if($property->gallery != "")
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
              @else
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
              @endif
               href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <a class="share-button btn btn-facebook" data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="facebook" data-share-text="Share this property on Facebook" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
              @else
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
              @endif
               href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>         
            <li>
              <a class="share-button btn btn-google" data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="googleplus" data-share-text="Share this property on Google+" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
              @else
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
              @endif
               href="#">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a class="share-button btn btn-linkedin" data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="linkedin" data-share-text="Share this property on LinkedIn" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
              @else
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
              @endif
               href="#"> 
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a class="share-button btn btn-pinterest" data-share-url="http://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}" data-share-network="pinterest" data-share-text="Share this property on Pinterest" data-share-title="<?= $property->title ?>" data-share-via="" data-share-tags="" @if($property->gallery != "")
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/images/property/user_property/original_{{$images[0]}}"
              @else
              data-share-media="http://<?php echo $_SERVER["SERVER_NAME"] ?>/assets/images/img1.jpg"
              @endif
               href="#">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <!-- <li>
              <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                <i class="fa fa-envelope"></i>
              </a>
            </li> -->
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- <div id="popover-content-email{{$property->id}}" class="hide">
  <form class="form-inline" role="form" id="emailform-{{$property->id}}" method="post" action="#">
    <div class="form-group text-center"> 
      <input class="headerSearch search-query" name="email" type="text" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;" />
      <input type="text" name="property" value="{{$property->id}}" hidden>
      <input class="btn lol" id="phSearchButton" data-id="{{$property->id}}" value="Send" style="width: 100%;height: 25px;background: #fa6919;border: 1px solid #fa6919;" />
    </div>
  </form>
</div> -->
@endforeach
<div class="row">
  <div class="col-md-12 advanced-pagination text-right"> 
    
   
  </div>
</div>
<style>
  .modal {
    /*   display: block;*/
    padding-right: 0px;
    background-color: rgba(4, 4, 4, 0.8);
  }
  
  .modal-dialog {
    top: 0;
    width: 100%;
    position: absolute;
  }
  
  .modal-content {
    border-radius: 0px;
    border: none;
    top: 30%;
  }
  
  .modal-body {
    background-color: #0f8845;
    color: white;
    bottom: auto;
  }
</style>





@include('includes.footer')