@php
$title = "Login";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page signin-pagetop">
 
 <div id="fullscreens">
        <div id="regContainer" class="container signin-page">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading signin-panelheading">
                  <div class="row">
                   <!-- ////// Testing  -->
                  <div class="">
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
                      <figure class="pull-left home-icon"><img src="/assets/images/signin-page.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> In</span></h2>
                        <p class="pt-5">You must log in to access full features of this site.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-createa">
                    <form role="form" method="POST" action="/login">
                    {{ csrf_field()   }}
                    <div class="{{ $errors->has('email') ? ' has-error' : '' }} email-login"></div>
                      <div class="form-group">
                        <input class="form-control" type="text" id="email" name="username"  required placeholder="Email / Phone">
                      </div>
                      <div class="{{ $errors->has('password') ? ' has-error' : '' }} password">
                      </div>
                      <div class="form-group password">
                        <input class="form-control" id="pwd" name="password" placeholder="Password" required type="password">
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="btn-wraper">
                        <div class="signin-text">
							<input id="signIn1" name="remember" type="checkbox"{{ old('remember') ? 'checked' : ''}}>>
							<label class="sign-inpage" for="signIn1">&nbsp;Remember Me</label>
							<a href="/password/reset" class="test3 pull-right">Forgot Password ?</a>
							<p class="need-signup" style="color:#000;">Need an account? <a href="/signup">Sign up</a></p>
                        </div>
                        <button type="submit" class="btn btn-default">Log in</button>
                      </div>
                    </form>
                  </div>
                <!--  <div class="col-md-12 social-signin pleft pright"> -->
                <!--  	<div class="col-md-6 col-sm-6 fb-login" style="padding-left:0"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Login With facebook</a> </div>-->
                    
                <!--    <div class="col-md-6 col-sm-6 google-login" style="padding-right:0"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Login With Google plus</a> </div>-->
                <!--    </div>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
      </main>

<!-- main ends -->
@include('includes.footer')