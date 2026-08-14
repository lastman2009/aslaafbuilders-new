@php
$title = "Site Map";
@endphp
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
              <h2><img src="assets/images/home-icon-contact.png">Site <span>Map</span></h2>
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

  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-8">
            <div class="col-md-12 pright pleft feature-heading">
              <h2>SITEMAP <span class="color"> STRUCTURE</span></h2>
              <p>Click on the links to find your page.</p>
            </div>
            <div class="col-md-12 sitemap">
              <div class="col-md-6">
                <ul id="sitemap">
                  <li><a href="/">Home</a></li>
                  <li><a href="/forums">Forums</a></li>
                  <li><a href="/property">Property</a></li>
                  <li><a href="/property/Project">Project</a></li>
                  <li><a href="/property/Buy">Buy</a></li>
                  <li><a href="/property/Rent">Rent</a></li>
                  <li><a href="/property/Wanted">Wanted</a></li>
                  <li><a href="/maps">Maps</a></li>
                  <li><a href="/vendors">Vendors</a></li>
                  <li><a href="/architects">Architects</a></li>
                  <li><a href="/agencies">Agencies</a></li>
                  <li><a href="/blog">Blog</a></li>
                  <li><a href="/about-us">About Us</a></li>
                  <li><a href="/contact-us">Contact</a></li>
                  <!--<li><a href="/why-us">Why Us</a></li>-->
                  <!--<li><a href="/help-center">Help & Support</a></li>-->
                  <li><a href="/privacy-policy">Privacy Policy</a></li>
                  <!--<li><a href="#">Terms & Conditions</a></li>-->
                  <!--<li><a href="/property/Wanted">Site Map</a></li>-->
                </ul>
              </div>
            </div>

          </div>

          <div class="col-md-4">
            <div class="col-md-12 pright pleft margin-bottom">

              <div class="telephone">
                <div class="telephone-content">
                  <span><i class="fa fa-phone-square phone" aria-hidden="true"></i></span>
                  <h4>Call Us</h4>
                </div>
                <div class="telephone-detail">
                  <!--<p>Phone: 123-456-789-000</p>-->
                  <p>Mobile: 0305-6666227</p>
                </div>
              </div>
            </div>

            <div class="col-md-12 pright pleft margin-bottom">

              <div class="email">
                <div class="email-content">
                  <span><i class="fa fa-envelope envelop" aria-hidden="true"></i></span>
                  <h4>Email</h4>
                </div>
                <div class="email-detail">
                  <!--<p>Info@yoursite.com </p>-->
                  <p>Support@rightdeed.com</p>
                </div>
              </div>
            </div>

            <div class="col-md-12 pright pleft margin-bottom">

              <div class="adderess">
                <div class="adderess-content">
                  <span><i class="fa fa-home home" aria-hidden="true"></i></span>
                  <h4>Address</h4>
                </div>
                <div class="adderess-detail">
                  <p>191 FF, Y Block Commercial Area, Phase 3, DHA ,54000 Lahore, Pakistan</p>
                </div>
              </div>
            </div>

            <!--<div class="col-md-12 pright pleft margin-bottom">-->

            <!--  <div class="fax">-->
            <!--    <div class="fax-content">-->
            <!--      <span><i class="fa fa-fax fax-icon" aria-hidden="true"></i></span>-->
            <!--      <h4>Fax</h4>-->
            <!--    </div>-->
            <!--    <div class="fax-detail">-->
            <!--      <p>+44) 870 7063021</p>-->
            <!--      <p>(880) 1723801729</p>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->


          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <section>
      <div class="container contact-inputs">
       <form action="/contactus" method="post">
       {{ csrf_field()}}
        <div class="row">

          <div class="col-md-12">
            <div class="col-md-12">
              <div class="feature-heading pull-left">
                <h2>CONTACT <span class="color"> US</span></h2>
                <p>Feel free to contact us and send us your query.</p>
              </div>
            </div>
            <div class="col-md-6 form-group padding-right">
          
                <input class="form-control inout-size" type="text" name="name" id="name" placeholder="NAME">
             
            </div>

            <div class="col-md-6 form-group">
          
                <input class="form-control inout-size" type="email" name="email" id="email" placeholder="EMAIL">
             
            </div>

            <div class="col-md-6 form-group padding-right">
          
                <input class="form-control inout-size" type="text" name="phone" id="phone" placeholder="PHONE">
             
            </div>

            <div class="col-md-6 form-group">
            
                <input class="form-control inout-size" type="text" id="subject" name="subject" placeholder="SUBJECT">
             
            </div>

            <div class="col-md-12">
              <div class="form-group mycmnt">
                <textarea class="form-control" rows="10" id="comment" name="comment" placeholder="MESSAGE"></textarea>
              </div>
              <button type="submit" class="btn btn-default btn-lg btn-block send-button">SEND MESSAGE</button>
            </div>
          </div>

        
        </div>

        </form>
      </div>
    </section>
 -->
</main>
<!-- wraper ends -->
@include( 'includes.footer' )
