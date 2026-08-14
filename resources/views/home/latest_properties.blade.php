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


<div class="col-md-12 features">
    <div class="row">
        <div class="feature-heading col-md-9">
            <figure class="pull-left home-icon"><img src="assets/images/home-icon2.jpg"></figure>
            <h2>FEATURED <span>PROPERTIES</span></h2>
            <p>Find out what’s new on our latest property listings</p>
        </div>
        <div class="col-md-3 view-more-wraper text-right"><a href="/property" class="view-more">View More<i class="fa fa-home"></i></a></div>
    </div>
    <div class="row">
        @foreach($properties as $property)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="family-house">
                @if(strlen($property->title) <= 20)
                <h4>{{$property->title}}</h4>
                @else
                <h4><?php echo substr(strip_tags($property->title), 0, 20) . '...'; ?></h4>
                @endif
                <?php $string = (strlen($property->address) > 50) ? substr($property->address, 0, 50) . '...' : $property->address; ?>
                <p class="text-muted"><i class="fa fa-map-marker"></i><?= $string; ?></p>


                @if($property->gallery != "")
                <?php
                $images = explode(';', $property->gallery);
                ?> 
                <figure>
                <img class="img-responsive" src="../../images/property/user_property/original_{{$images[0]}}">
                @else
                <figure><img class="img-responsive" src="assets/images/img1.jpg">
                @endif

                        <figcaption>
                            @if($property->purpose == 1)
                            <div class="feature-tag">for sale</div>
                            @elseif($property->purpose ==2)
                            <div class="feature-tag for-rent">for rent</div>

                            @else
                            <div class="feature-tag">wanted</div>

                            @endif
                            <div class="shade"></div>
                        </figcaption>
                        <ul class="social-icons">
                            <li>

                                <a data-toggle="dropdown" class="share-propertryadvance" title="Share"
                                   href="javascript:void(0);" aria-expanded="true">
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                </a>
                                <ul class="share-propertrysearch dropdown-menu">
                                    <li>
                                        <a class="share-button btn btn-facebook"
                                           data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                                           data-share-network="facebook"
                                           data-share-text="Share this property on Facebook"
                                           data-share-title="<?= $property->title ?>" data-share-via=""
                                           data-share-tags="" @if($property->gallery != "")
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /images/property/user_property/original_{{$images[0]}}"
                                            @else
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /assets/images/img1.jpg"
                                            @endif href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="share-button btn btn-twitter"
                                           data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                                           data-share-network="twitter" data-share-text="Share this property on Twitter"
                                           data-share-title="<?= $property->title ?>" data-share-via=""
                                           data-share-tags="" @if($property->gallery != "")
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /images/property/user_property/original_{{$images[0]}}"
                                            @else
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /assets/images/img1.jpg"
                                            @endif href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="share-button btn btn-google"
                                           data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                                           data-share-network="googleplus"
                                           data-share-text="Share this property on Google+"
                                           data-share-title="<?= $property->title ?>" data-share-via=""
                                           data-share-tags="" @if($property->gallery != "")
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /images/property/user_property/original_{{$images[0]}}"
                                            @else
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /assets/images/img1.jpg"
                                            @endif href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="share-button btn btn-linkedin"
                                           data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                                           data-share-network="linkedin"
                                           data-share-text="Share this property on LinkedIn"
                                           data-share-title="<?= $property->title ?>" data-share-via=""
                                           data-share-tags="" @if($property->gallery != "")
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /images/property/user_property/original_{{$images[0]}}"
                                            @else
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /assets/images/img1.jpg"
                                            @endif href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="share-button btn btn-pinterest"
                                           data-share-url="https://<?php echo $_SERVER["SERVER_NAME"] ?>{{$property->url}}/{{$property->id}}"
                                           data-share-network="pinterest"
                                           data-share-text="Share this property on Pinterest"
                                           data-share-title="<?= $property->title ?>" data-share-via=""
                                           data-share-tags="" @if($property->gallery != "")
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /images/property/user_property/original_{{$images[0]}}"
                                            @else
                                            data-share-media="https://<?php echo $_SERVER["SERVER_NAME"] ?>
                                            /assets/images/img1.jpg"
                                            @endif href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <!-- <li>
                                      <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                                        <i class="fa fa-envelope"></i>
                                      </a>
                                    </li> -->
                                </ul>

                            </li>
                            @if(Auth::check())

                            <li><a data-id="{{$property->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Save Property" class="saveProperty"><i class="fa fa-bookmark "></i></a></li>
                            @else
                          <li><a data-id="{{$property->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Favourite Property" class="favouriteProperty"><i class="fa fa-bookmark "></i></a></li>
                            @endif
                            <li><a href="{{$property->url}}/{{$property->id}}" target="_blank"><i class="fa fa-eye"
                                                                                                  title="View"></i></a>
                            </li>
                        </ul>
                    </figure>

                    <div class="prices-details">
                        <p class="pull-left">PKR {{nice_number($property->price)}}</p>
                        <a class="pull-right btn-style details no-bg" href="{{$property->url}}/{{$property->id}}">Details</a>
                    </div>
                </figure>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <script>
      function convertNumberToWords(amount) {
        var words = new Array();
        words[0] = '';
        words[1] = '1';
        words[2] = '2';
        words[3] = '3';
        words[4] = '4';
        words[5] = '5';
        words[6] = '6';
        words[7] = '7';
        words[8] = '8';
        words[9] = '9';
        words[10] = '10';
        words[11] = '11';
        words[12] = '12';
        words[13] = '13';
        words[14] = '14';
        words[15] = '15';
        words[16] = '16';
        words[17] = '17';
        words[18] = '18';
        words[19] = '19';
        words[20] = '20';
        words[30] = '30';
        words[40] = '40';
        words[50] = '50';
        words[60] = '60';
        words[70] = '70';
        words[80] = '80';
        words[90] = '90';
        amount = amount.toString();
        var atemp = amount.split(".");
        var number = atemp[0].split(",").join("");
        var n_length = number.length;
        var words_string = "";
        if (n_length <= 9) {
          var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
          var received_n_array = new Array();
          for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
          }
          for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
          }
          for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
              if (n_array[i] == 1) {
                n_array[j] = 10 + parseInt(n_array[j]);
                n_array[i] = 0;
              }
            }
          }
          value = "";
          for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
              value = n_array[i] * 10;
            } else {
              value = n_array[i];
            }
            if (value != 0) {
              words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
              words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
              words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
              words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
              words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
              words_string += "Hundred ";
            }
          }
          words_string = words_string.split("  ").join(" ");
        }
        return words_string;
      }
    </script>
    <script type="text/javascript">
      $(document).ready(function () {

        $('.share-button').simpleSocialShare();

      });
    </script>