{{-- <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"><strong>Registered User,</strong><br> <strong>Login</strong> to your account</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="/login">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label"><span class="primary-color"><sup>*</sup></span> Username/Email:</label>
                        <div class="col-sm-8">
                            
                           <input type="text" class="form-control" name="username"  required placeholder="Email / Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label"><span class="primary-color"><sup>*</sup></span> Password</label>
                        <div class="col-sm-8">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
                     <div class="btn-wraper">
                       <input type="checkbox" name="remember" id="signIn2" {{ old('remember') ? 'checked' : ''}}>
                        <label for="signIn2">&nbsp;Remember Me</label>
                        <a href="/password/reset" class="test3 pull-right">Forget Password?</a>
                        <p class="need-signup">Need an account? <a href="/signup">Sign up</a></p>
                        <button type="submit" class="btn btn-default">Log in</button>
                      </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="javascript:void(0)" class="forgot-link" data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">Forgot Password</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6 text-center">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
                <div class="row">  
                  <div class="col-md-12 padding-right social-signup"> 
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><strong>Registered User,</strong><br> <strong>Login</strong> to your account</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="/login">
                        {{ csrf_field() }}
    
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label"><span class="primary-color"><sup>*</sup></span> Username/Email:</label>
                            <div class="col-sm-7">
     
                               <input type="text" class="form-control" id="inputEmail3"  name="username"  required placeholder="Email / Phone">
    
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label"><span class="primary-color"><sup>*</sup></span> Password</label>
                            <div class="col-sm-7">
                                  <input type="password" id="password-field" class="form-control" name="password" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <a href="javascript:void(0)" class="forgot-link" data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">Forgot Password</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="submit" class="col-md-3 btn button_theme_color">Login Now</button>
                            </div>
                        </div>
                    </form>
                    <div class="additional-signIn">
                       Don't have account ? Register <a href="javascript:void(0)" data-toggle="modal" data-target="#registerModal" id="register-here">here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type= "text/javascript">
    $("#register-here").click(()=>{
        $("#loginModal").modal('toggle'); 
    });
       
    </script>
    