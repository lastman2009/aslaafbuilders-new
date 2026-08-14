@php
$title = "Internal Search Problem";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page">

  <div id="fullscreens">
    <div id="regContainer" class="container signin-page">
      <div class="row">
        <div class="col-md-12 text-center error-500">
          
            <h3>OOOPS!!!</h3>
            <h4>Something went wrong</h4>
            <h1>500</h1>


            <h4>We're experiencing an internal server problem.</h4>
         
   
  @if(Auth::check())

          <div class="col-md-12 error-btn">
            <a href="/dashboard"><button type="button" class="btn btn-default btn-left-error">Go to Dashboard</button> </a> 
            <a href="/"><button type="button" class="btn btn-default">Go to Website</button></a>
          </div>
    @endif
        </div>
      </div>
    </div>
  </div>
</main>

<!-- main ends -->
@include('includes.footer')