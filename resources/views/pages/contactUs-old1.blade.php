@php
$title = "Contact Us";
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
              <h2><img src="assets/images/home-icon-contact.png">Contact <span>Us</span></h2>
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
           <div class="col-md-3 margin-bottom">
             
             <div class="telephone">
              <div class="telephone-content">
                <span><i class="fa fa-phone-square phone" aria-hidden="true"></i></span>
                <h4>Call Us</h4>
              </div>
              <div class="telephone-detail">
                <p>Phone: 123-456-789-000</p>
                <p>Mobile: 123-456-789-000</p>
              </div>
             </div>
           </div>

           <div class="col-md-3 margin-bottom">
             
             <div class="email">
              <div class="email-content">
                <span><i class="fa fa-envelope envelop" aria-hidden="true"></i></span>
                <h4>Email</h4>
              </div>
              <div class="email-detail">
                <p>Info@yoursite.com </p>
                <p>Support@yoursite.com</p>
              </div>
             </div>
           </div>

           <div class="col-md-3 margin-bottom">
             
             <div class="adderess">
              <div class="adderess-content">
                <span><i class="fa fa-home home" aria-hidden="true"></i></span>
                <h4>Address</h4>
              </div>
              <div class="adderess-detail">
                <p>3015 Grand Ave, Coconut Grove,Merrick Way, FL 12345</p>
              </div>
             </div>
           </div>

           <div class="col-md-3 margin-bottom">
             
             <div class="fax">
              <div class="fax-content">
                <span><i class="fa fa-fax fax-icon" aria-hidden="true"></i></span>
                <h4>Fax</h4>
              </div>
              <div class="fax-detail">
                <p>+44) 870 7063021</p>
                <p>(880) 1723801729</p>
              </div>
             </div>
           </div>
        </div>
      </div>
    </div>
  </section>

    <section>
      <div class="col-md-12 paddingleftright">
        <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.7227736383466!2d74.32938531554211!3d31.504303081374918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190468fac707b5%3A0xccf10281e353bf7f!2sKalma+Chowk+Flyover!5e0!3m2!1sen!2s!4v1501676126603" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </section>


    <section>
      <div class="container contact-inputs">
       <form action="/contactus" method="post">
       {{ csrf_field()}}
        <div class="row">
          <div class="col-md-12">
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


</main>
<!-- wraper ends -->
@include( 'includes.footer' )