@php
$title = "Login";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page">
 
 <div id="fullscreens">
        <div id="regContainer" class="container signin-page">
          <div class="row">
            <div class="col-md-7 col-md-offset-3 col-sm-12">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                   <!-- ////// Testing  -->
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
    <!-- end testing .... -->
                    <div class="col-md-12 features">
                      <figure class="pull-left home-icon"><img src="assets/images/signin-page.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> In</span></h2>
                        <p>Property portal .</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-create">
                    <form role="form" method="POST" action="/login">
                    {{ csrf_field()   }}
                    <div class="{{ $errors->has('email') ? ' has-error' : '' }} email-login"></div>
                      <div class="form-group">
                        <input class="form-control" type="text" id="email" name="username"  required placeholder="Email / Phone">
                      </div>
                      <div class="{{ $errors->has('password') ? ' has-error' : '' }} password">
                      </div>
                      <div class="form-group password">
                        <input class="form-control" id="pwd" name="password" placeholder="password" required type="Password">
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="btn-wraper">
                        <input id="test2" name="remember" type="checkbox"{{ old('remember') ? 'checked' : ''}}>>
                        <label for="test2">&nbsp;Remember Me</label>
                        <a href="/password/reset" class="test3 pull-right">Forgot Password ?</a>
                        <p class="need-signuppage">Need an account? <a href="">Sign up</a></p>
                        <button type="submit" class="btn btn-default">Log in</button>
                      </div>
                    </form>
                  </div>
                  <div class="row">  
                  <div class="col-md-12 social-signin padding-right"> 
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Login With facebook</a> </div>
                    
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Login With Google plus</a> </div>
                    </div>
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