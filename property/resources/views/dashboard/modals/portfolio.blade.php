<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12 padding-right">
                <div class="col-lg-6 col-md-6 col-sm-12 padding-left">
                    <div class="panel panel-default card-view agency-about portfolio-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body" style="padding: 0">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                     @if($data->images != "")
                                         <?php
                                              $images =explode(';',$data->images);
                                          ?> 
                                     @endif
                                     <?php
                                        $i="";
                                        for($i=0; $i<count($images); $i++)
                                        {
                                        ?>
                                        <div class="single-product-gallery-item" id="slide{{$i}}"> <a data-lightbox="image-{{$i}}" data-title="Gallery" href="dist/img/single-product/1.jpg"> <img class="img-responsive" alt="" src="/images/User_portfolio_images/{{$images[$i]}}" /> </a> 
                                        </div>
                                        
                                        <?php
                                        }
                                       ?> 
                                    </div>
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                             <?php
                                        $i="";
                                        for($i=0; $i<count($images); $i++)
                                        {
                                        ?>

                                            <div class="item"> <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{$i}}" href="#slide{{$i}}"> <img class="img-responsive" width="85" alt="" src="/images/User_portfolio_images/{{$images[$i]}}" /> </a> 
                                            </div>
                                         <?php
                                        }
                                       ?> 
                                        </div>
                                        <!-- /#owl-single-product-thumbnails --> 

                                    </div>
                                    <!-- /.gallery-thumbs --> 

                                </div>

                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 padding-left">
                    <div class="panel panel-default card-view agency-about portfolio-summary">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body profile-information">
                                <div class="col-lg-9 col-lg-offset-3 col-sm-12 profile_image">
                                    <button type="button" class="close btnclose" data-dismiss="modal" aria-hidden="true">×</button>
                                    <ul class="edit-agent-li portoflio-modal-li">
                                        <li><i class="fa fa-user" aria-hidden="true"></i>{{$data->title}}</li>
                                        <li><i class="fa fa-calendar"></i>{{$data->created_at}}</li>
                                        <li><i class="fa fa-calendar-times-o"></i>{{$data->updated_at}}</li>
                                    </ul>
                                    @if($data->user_id == Auth::id())
                                    <a href="/dashboard/edit/portfolio/{{$data->id}}" class="edit-agent-btn">Edit your Portfolio</a>
                                    @else
                                    <a href="javascript:void(0)" class="edit-agent-btn">{{$data->title}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 padding-right theme-heading">
                <div class="col-lg-12 col-sm-12 padding-left">
                    <div class="panel panel-default card-view agency-about">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="agency-overview">
                                    <h2>Overview</h2>
                                    <p><?= $data->description; ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*===================================================================================*/
    /* SINGLE PRODUCT GALLERY
    /*===================================================================================*/
    $(document).ready(function() {
        $('#owl-single-product').owlCarousel({
            items: 1,
            itemsTablet: [768, 2],
            itemsDesktop: [1199, 1]

        });

        $('#owl-single-product-thumbnails').owlCarousel({
            items: 4,
            pagination: true,
            rewindNav: true,
            itemsTablet: [768, 4],
            itemsDesktop: [1199, 3]
        });

        $('#owl-single-product2-thumbnails').owlCarousel({
            items: 6,
            pagination: true,
            rewindNav: true,
            itemsTablet: [768, 4],
            itemsDesktop: [1199, 3]
        });

        $('.single-product-slider').owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            singleItem: true,
            pagination: true
        });

        $(".slider-next").click(function() {
            var owl = $($(this).data('target'));
            owl.trigger('owl.next');
            return false;
        });

        $(".slider-prev").click(function() {
            var owl = $($(this).data('target'));
            owl.trigger('owl.prev');
            return false;
        });

        $('.single-product-gallery .horizontal-thumb').click(function() {
            var $this = $(this),
                owl = $($this.data('target')),
                slideTo = $this.data('slide');
            owl.trigger('owl.goTo', slideTo);
            $this.addClass('active').parent().siblings().find('.active').removeClass('active');
            return false;
        });
		
		$('.product-item-holder .single-product-gallery-item, .single-product-gallery-thumbs .item').addClass('thumb-container');
		$('.product-item-holder .single-product-gallery-item > a, .single-product-gallery-thumbs .item > a').addClass('thumb-block portfolio-thumb');

    });
</script>