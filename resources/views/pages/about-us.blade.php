@include("includes.title")


<!-- banner-wraper starts -->
<div class="banner-wraper">

    <!-- slider ends -->


    <div class="banner-cover">
        <div class="container">
            <div class="row">
                <div class="banner-contents banner-contact col-md-12">
                    <div class="col-md-12 features">
                        <div class="feature-heading">
                            <h2><img src="assets/images/home-icon-contact.png">ABOUT <span>US</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- slider ends -->
<!-- Main Starts -->
<main class="main-section">

    <section>
        <div class="container">
            <div class="row marginleftandright">
                <div class="col-md-12 aboutus-content">

                    <h2>WHAT IS <span><b>RIGHTDEED.COM?</b></span></h2>
                  
                    <?= $content->first_area; ?>

                </div>
            </div>
        </div>
    </section>
   

    <section>
        <div class="container">
            <div class="row marginleftandright">
                <div class="col-md-12 map-section">

                    <h2>OUR<span> <b>MISSION STATEMENT</b></span></h2>
                    <div class="col-md-6 pright pleft">  
                        <div class="map-heightwidth">
                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.7227736383466!2d74.32938531554211!3d31.504303081374918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190468fac707b5%3A0xccf10281e353bf7f!2sKalma+Chowk+Flyover!5e0!3m2!1sen!2s!4v1501676126603" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <p>{!! $content->second_area !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- wraper ends -->
@include( 'includes.footer' )