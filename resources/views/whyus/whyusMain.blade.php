@php
$title = "Carrer Center";
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
              <h2><img src="assets/images/home-icon-contact.png">Career <span>Center</span></h2>
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
      <div class="row mrginleftright">
        <div class="col-md-12 whyus-content">

        
            {!! $whyUs->contant !!}

        </div>
      </div>
    </div>
  </section>


</main>
<!-- wraper ends -->
@include('includes.footer')
