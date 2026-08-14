@php
$title = "Reset Password";
@endphp
@include("includes.title")

<!-- Main Starts -->
<main class="main-section detail-page">
 
 <div id="fullscreens">
        <div id="regContainer" class="container signin-page forgot-page">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-12 features">
                        <div class="mb-30">
                            <h3 class="text-center txt-dark mb-10">Reset Password</h3>
                        </div>  


                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
             @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif


                         
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body forgot-section">
                <div class="row">
                  <div class="col-md-12">
                    <form  method="POST" action="resetpassword">

                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Old Password</label>
                            <input  class="form-control"   type="password" name="password" required id="exampleInputpwd_2" placeholder="Enter New Password">

                             @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}"">
                            <label class="pull-left control-label mb-10" for="exampleInputpwd_3">New Password</label>
                            <input type="password" class="form-control"  id="exampleInputpwd_3" placeholder="Re-Enter Password" name="new_password" required>

                             @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                        </div>
                      <div class="btn-wraper">
                        <button type="submit" class="btn btn-default btn-forgot">Reset</button>
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