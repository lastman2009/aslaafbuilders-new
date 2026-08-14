
    <div class="row">
      <div class="col-md-12 features">
        <figure class="pull-left home-icon"><img src="assets/images/home-icon5.jpg" /> </figure>
        <div class="feature-heading">
          <h2>Our <span> blog</span></h2>
          <p>See our blog for the hottest updates on Pakistan Real Estate</p>
        </div>
      </div>
      <div class="">

        <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel3">

          <div class="carousel-inner">

            <?php 

            $count =1;
            $active="";
            ?>
            @foreach($blogs as $blog)
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
            <?php
            $title = explode(" ", $blog->title);
            $title = implode("-", $title);
            ?>
            <div class="item <?= $active;?>">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="../../images/blogs_images/thumb_{{$blog->gallery}}" />
                    <figcaption>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <h4 title="{{$blog->title}}">{!! \Illuminate\Support\Str::words($blog->title, 10,'...')  !!}</h4>
                  <p><?php echo substr(strip_tags($blog->contant),0,40).'...';?></p>
                  <div class="prices-details"> <a class="btn-style details no-bg" href="blog/{{$blog->id}}/{{$title}}">Read</a> </div>
                </div>
              </div>
            </div>
            <?php $count++;?>
            @endforeach

          </div>
          <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><i class="fa fa-caret-left"></i></a> <a class="right carousel-control" href="#myCarousel3" data-slide="next"><i class="fa fa-caret-right"></i></a> 

        </div>

      </div>
    </div>
