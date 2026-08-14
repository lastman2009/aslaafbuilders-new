@php
$title = "Access Forbidden";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page">

  <div id="fullscreens">
    <div id="regContainer" class="container signin-page">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="error-403">
            <h3>Access Forbidden</h3>
            <h1>403</h1> 
            <h4>The page you are looking for could have been deleted or never have existed</h4>
          </div>

         
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