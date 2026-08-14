@php
$title = "Register";
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
                      <figure class="pull-left home-icon"><img src="../assets/images/signup-page.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> Up</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-create">
                     <form method="POST" action="/register" role="form">
                     {{ csrf_field() }}
                     <div style="margin-right: 15px" class="form-group name-field{{ $errors->has('first_name') ? ' has-error' : '' }}">
                     
                      <div class="email-login">
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="Name">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                      <div class="form-group" style="margin-right: 0">
                       <div class="email-field{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                           
                                <input id="username" type="text" class="form-control" name="username" required placeholder="Email/Phone">
                            
                      </div>
                      </div>
                      <div class="form-group password">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} password">
                            
                                  <input type="password" name="password" class="form-control" id="pwd" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                      </div>
                      <div class="btn-wraper">
                        <input id="signUp2" type="checkbox">
                        <label for="signUp2">&nbsp;I Agree With <span class="color">Terms And Condition</span></label>
                        
                        <button type="submit" class="btn btn-default">CREATE A FREE ACCOUNT</button>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-12 social-signup"> 
                    <div class="col-md-6 col-sm-6" style="padding-left:0"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>
                    
                    <div class="col-md-6 col-sm-6" style="padding-right:0"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>
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