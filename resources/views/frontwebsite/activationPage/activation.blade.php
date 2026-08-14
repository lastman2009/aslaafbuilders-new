@php
$title = "Activate Mobile User";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page">
  <div class="form-group ">
                    @if (session('status'))
                         <script>
                            toastr.success("{{ Session::get('status') }}");
                        </script>                    
                        @endif
                    @if (session('block'))
                       <script>
                            toastr.warning("{{ Session::get('block') }}");
                        </script>
                    @endif

                     @if (session('already'))
                        <script>
                            toastr.error("{{ Session::get('already') }}");
                        </script>
                    @endif
                     @if (session('error'))
                       <script>
                            toastr.error("{{ Session::get('error') }}");
                        </script>
                    @endif
                        @if (session('active'))
                        <script>
                            toastr.info("{{ Session::get('active') }}");
                        </script>
                    @endif
                        @if($errors->any())
                         <script>
                            toastr.error("{{$errors->first()}}","Error");
                           
                         </script>  
                          @endif
                    </div>
  
 <div id="fullscreens">
        <div id="regContainer" class="container signup-page">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-12 features">
                      <figure class="pull-left home-icon"><img src="/assets/images/signup-page.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Enter <span>Code</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-create">
                     <form method="POST" action="/activation" role="form">
                     {{ csrf_field() }}                    
                      <div class="form-group password">
                        <input type="text" name="activation" class="form-control">                
                        </div>
                      </div>
                      <div class="btn-wraper">                        
                        <button type="submit" class="btn btn-default">Submit For Activation</button>
                      </div>
                    </form>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </main>

<!-- main ends -->
@include('includes.footer')