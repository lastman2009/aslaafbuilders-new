 <?php
   function nice_numberlol($n) {
       // first strip any formatting;
       $n = (0+str_replace(",", "", $n));

       // is this a number?
       if (!is_numeric($n)) return false;

       // now filter it;
       if ($n > 1000000000000) return round(($n/1000000000000), 2).' Trillion';
       elseif ($n > 1000000000) return round(($n/1000000000), 2).' Billion';
       elseif ($n > 1000000) return round(($n/1000000), 2).' Million';
       elseif ($n > 100000) return round(($n/100000), 2).' Lac';
       elseif ($n > 1000) return round(($n/1000), 2).' Thousand';

       return number_format($n);
   }

// echo nice_number('14120000'); //14.12 million

?>
<div class="row">
				<div class="col-md-12 features">
					<figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
					<div class="feature-heading pull-left">
						<h2>FEATURED <span> PROPERTIES</span></h2>
						<p>Browse a range of featured properties with properties online</p>
					</div>
				</div>
				<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
					<div class="carousel-inner">
					  <?php 

            $count =1;
            $active="";
            ?>
            @foreach($featured_properties as $property)
            <?php 
              if($count ==1)
              {
              $active="active";
              }
              else
              {
                $active="";
              }
              
            ?>		
					 <div class="item <?= $active;?>">
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="family-house">
		                    @if(strlen($property->title) <= 20)
		                    <h4>{{$property->title}}</h4>
		                    @else
		                    <h4><?php echo substr(strip_tags($property->title),0,20).'...';?></h4>
		                    @endif
							<?php $string = (strlen($property->address) > 50) ? substr($property->address,0,50).'...' : $property->address; ?>
                    <p class="text-muted"><i class="fa fa-map-marker"></i><?= $string; ?></p>


									@if($property->gallery != "")
                                         <?php
                                              $images =explode(';',$property->gallery);
                                          ?> 
                          <figure> <img class="img-responsive" src="../../images/property/user_property/original_{{$images[0]}}">

                          @else
                            <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                         @endif
										    <figcaption>
                        @if($property->purpose == 1)
                        <div class="feature-tag">for sale</div>
                        @elseif($property->purpose ==2)
                        <div class="feature-tag for-rent">for rent</div>

                        @else
                        <div class="feature-tag">for wanted</div>

                        @endif
                        <div class="shade"></div>
                      </figcaption>
										<ul class="social-icons">
											<li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
											<li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
											<li><a href="#"><i class="fa fa-share"></i></a> </li>
										</ul>
									</figure>
									<p class="meters"><a class="text-muted" href="#"> <img src="/assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="/assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
									<div class="prices-details">
                      <p class="pull-left">{{nice_numberlol($property->price)}}</p>
										
										 <a class="pull-right btn-style details no-bg" 
                      href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">Details</a></div>
								</div>
							</div>
						</div>	
						<?php $count++;?>
						@endforeach
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-caret-left"></i></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
				</div>
			</div>