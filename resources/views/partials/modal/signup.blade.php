<div class="modal fade register-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"><strong>Create Account RightDeed </strong> Property Portal</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class="form-horizontal" action="/register" role="form">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Name:</label>
                            <div class="col-sm-7">
                                 <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="Name" required>
    
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Email / Phone No:</label>
                            <div class="col-sm-7">
                                 <input id="username" type="text" class="form-control" name="username" placeholder="Email / Phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Password</label>
                            <div class="col-sm-7">
                                
                                <input type="password" name="password" class="form-control"  id="password-field2" placeholder="Password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong> 
                                        </span>
                                    @endif
                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                            </div>
                        </div>
                     
                        
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <p>Register as Agent <a href="javascript:void(0)" data-toggle="modal" data-target="#agentModal" id="agent-here">here</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <p>By clicking below, you agree to <a href="">Terms & Conditions</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="col-md-6 btn button_theme_color">Register Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <div class="modal fade register-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"><strong>Create your FREE</strong> account</h4>
                </div>
                <div class="modal-body">
                            <form method="POST" class="form-horizontal" action="/register" role="form">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Name:</label>
                            <div class="col-sm-8">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="Name" required>
    
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Email (Your Username):</label>
                            <div class="col-sm-8">
                               <input id="username" type="text" class="form-control" name="username" placeholder="Email / Phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Password</label>
                            <div class="col-sm-8">
                                 <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong> 
                                        </span>
                                    @endif
                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="pwd1" placeholder="Confirm Password" required>
                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                            </div>
                        </div>
    
    
    
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Primary Phone Number:</label>
                            <div class="col-sm-2 pr">
                                <select class="form-control">
                                    <option value="+92" selected>Pak</option>
                                    <option value="+92">Pak</option>
                                    <option value="+92">Pak</option>
                                    <option value="+92">Pak</option>
                                    <option value="+92">Pak</option>
                                </select>
                            </div>
                            <div class="col-sm-6 pl">
                                <input type="text" class="form-control"  placeholder="Enter number">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <p>By clicking below, you agree to <a href="">Terms & Conditions</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6 text-center">
                                <button type="submit" class="btn btn-default">Register Now</button>
                            </div>
                        </div>
                    </form>
    
                      <!--<div class="row">  -->
                      <!--  <div class="col-md-12 padding-right social-signup"> -->
                      <!--    <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>-->
                      <!--    <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                </div>
            </div>
        </div>
    </div> --}}
    