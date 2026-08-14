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
    elseif ($n > 10000000) return round(($n / 10000000), 2) . ' Crore';
    elseif ($n > 100000) return round(($n / 1000000), 2) . ' Lac';
    elseif ($n > 1000) return round(($n / 10000), 2) . ' Thousand';

    return number_format($n);
}
}

// echo nice_number('14120000'); //14.12 million

?>

@if(!$properties->isEmpty())
  @foreach($properties as $property)
    <div class="row advance-property-row">
      <div class="col-md-12">
        <div class="col-md-5 col-sm-12 col-xs-12 padding-left padding-right">
          <div class="advance-property-section">
            <div class="family-house advance-house">
              <figure>
                <div class="col-md-12 padding-left padding-right ">
                  @if($property->gallery != "")
                        <?php
                        $images =explode(';',$property->gallery);
                        ?>
                    <img class="img-responsive" src="{{ ab_image('images/property/user_property/original_' . $images[0]) }}" alt="{{ $property->title }}">

                  @else
                    <img class="img-responsive" src="/assets/images/img1.jpg">
                  @endif
                </div>
                <figcaption>
                
                  <div class="feature-tag-hot">Hot</div>
                  <div class="feature-icons"><a href="" data-toggle="tooltip" data-placement="top" title="Saved Properties"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
                  <div class="feature-photo-tag"><a href="">6 More Photos</a></div>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 advance-padding">
          <div class="advance-property-detail">
            <div class="advance-property-heading">
              @if(strlen($property->title) <= 20)
                <h4>{{$property->title}}</h4>
              @else
                <h4><?php echo substr(strip_tags($property->title),0,20).'...';?></h4>
              @endif
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <p> {{$property->address}}</p>
            </div>
            <div class="advance-property-detail-section advance-project">
              {{--<h3>PKR {{$property->price}}</h3>--}}
              <ul>
              	<li>Plots<span>5 Marlas - 10 Kanal</span></li>
                <li>Commercial<span>2 Marlas - 20 Kanal</span></li>
                <li>Residential<span>5 Marlas - 10 Kanal</span></li>
<!--
                <li>{{$property->bed}} bedrooms<span><i class="fa fa-bed" aria-hidden="true"></i></span></li>
                <li>{{$property->bath}} bath<span><i class="fa fa-bath" aria-hidden="true"></i></span></li>
                <li>{{$property->total_floor}} floors<span><i class="fa fa-university" aria-hidden="true"></i></span></li>
-->
              </ul>
            </div>
            <hr>
            <div class="advance-property-button">
              <a href="" >ViewsDetail</a>
              <div class="advance-property-btn-icon">
                <a href="javascript:void(0);" data-toggle="popover" title="Contact Number" data-content="
           {{App\Property::getphoneNumber($property->id)}}
                        " data-placement="top"><i class="fa fa-phone" aria-hidden="true"></i></a>
         
                <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email{{$property->id}}"><i class="fa fa-envelope" aria-hidden="true"></i></a>

                <a data-toggle="dropdown" class="share-advance" href="javascript:void(0);">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                  <span class="caret"></span>
                </a>
                <ul class="share-search dropdown-menu">
                  <li>
                    <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                      <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </li>
                  <li>
                    <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
                      <i class="fa fa-linkedin"></i>
                    </a>
                  </li>
                  <li>
                    <a data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
                      <i class="fa fa-pinterest"></i>
                    </a>
                  </li>
                  <li>
                    <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                      <i class="fa fa-envelope"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="popover-content-email{{$property->id}}" class="hide">
      <form class="form-inline" role="form" id="emailform-{{$property->id}}" method="post" action="#">
        <div class="form-group text-center">
          <input class="headerSearch search-query" name="email" type="text" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;" />
          <input type="text" name="property" value="{{$property->id}}" hidden>
          <input class="btn lol" id="phSearchButton" data-id="{{$property->id}}" value="Send" style="width: 100%;height: 25px;background: #fa6919;border: 1px solid #fa6919;" />
        </div>
      </form>
    </div>
  @endforeach
@else
  <h4>No Property Found! <br><br><br> Try another Search</h4>
@endif
<div class="row">
  <div class="col-md-12 advanced-pagination text-right">
    {{$properties->links()}}
  </div>
</div>

