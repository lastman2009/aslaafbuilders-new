@php
$title = "Thanks";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page">

  <div id="fullscreens">
    <div id="regContainer" class="container signin-page">
      <div class="row">
        <div class="col-md-12 text-center thanks">
        
            <h1><span class="circle"> <i class="fa fa-check thankscheck" aria-hidden="true"></i></span></h1>
            <h2>THANK YOU</h2> 
            <h4>FOR BEING AWESOME. WE HOPE YOU ENJOY OUR PORTAL</h4>
       

          <div class="col-md-12 error-btn">

            <button type="button" class="btn btn-default btn-left-error">Go to Dashboard</button>  

            <button type="button" class="btn btn-default">Go to Website</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- main ends -->
@include('includes.footer')