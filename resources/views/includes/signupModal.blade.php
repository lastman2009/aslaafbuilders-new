

<div id="fsModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!-- header -->
      <div class="">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <div id="fullscreen_bg" class="fullscreen_bg"/>
        <div id="regContainer" class="container">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-12 features pleft pright">
                      <figure class="pull-left home-icon"><img src="/assets/images/signup.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> Up</span></h2>
                        <p class="pt-5">Login to RightDeed Property Portal</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-creates signuppage">
                    <form method="POST" action="/register" role="form">
                     {{ csrf_field() }}
                        <div class="form-group name-field{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="Name" required>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                      <div class="form-group email-field{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                           
                                <input id="username" type="text" class="form-control" name="username" placeholder="Email / Phone" required>

                            
                      </div>
                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} password">
                            
                                  <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong> 
                                    </span>
                                @endif
                            
                        </div>
                       <div class="form-group password">
                            
                                  <input type="password" class="form-control" id="pwd1" placeholder="Confirm Password" required>
                        </div> 

                      <div class="btn-wraper">
                        <input type="checkbox" id="signUp1" />
                        <label for="signUp1"> &nbsp; I agree with terms &amp; Conditions</label>
                        <!--<a href="/password/reset" class="test3 pull-right">Forget Password?</a>-->
                        <p class="need-signin">Signup as  Agent <a href="/signup-agent">Sign up</a></p>

                        <p class="need-signin">Already have an account? <a href="/loginForm">Sign in</a></p>
                        <button type="submit" id="submit-button" class="btn btn-default">CREATE A FREE ACCOUNT</button>
                      </div>
                    </form>
                  </div>
                  <!--<div class="row">  -->
                  <!--  <div class="col-md-12 padding-right social-signup"> -->
                  <!--    <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>-->
                  <!--    <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>-->
                  <!--  </div>-->
                  <!--</div>-->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
