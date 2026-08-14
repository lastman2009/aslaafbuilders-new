<div id="fsModal2" class="modal fade" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
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
                    <div class="col-md-12 features pleft pright">
                      <figure class="pull-left home-icon"><img src="/assets/images/signin.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> In</span></h2>
                        <p class="mt-10">You must log in to access full features of this site.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-creates">
                    <form role="form" method="POST" action="/login">
                      {{ csrf_field()   }}
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} email-login">
                            <div>
                                <input type="text" class="form-control" name="username"  required placeholder="Email / Phone">
                                {{-- <input id="username" type="text" class="form-control" name="username"  required placeholder="Email / Phone"> --}}
                               <!--  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} password">
                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                     <!--  <div class="form-group password">
                        <input type="password" class="form-control" id="pwd" placeholder="password">
                      </div> -->
                      <div class="btn-wraper">
                       <input type="checkbox" name="remember" id="signIn2" {{ old('remember') ? 'checked' : ''}}>
                        <label for="signIn2">&nbsp;Remember Me</label>
                        <a href="/password/reset" class="test3 pull-right">Forget Password?</a>
                        <p class="need-signup">Need an account? <a href="/signup">Sign up</a></p>
                        <button type="submit" class="btn btn-default">Log in</button>
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