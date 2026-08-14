@include('includes.header')
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
                            <h3 class="text-center txt-dark mb-10">Need help with your password?</h3>
                            <h6 class="text-center txt-grey nonecase-font">Enter the email address, and we’ll help you create a new password.</h6>
                        </div>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body forgot-section">
                <div class="row">
                  <div class="col-md-12">
                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                      {{ csrf_field() }}
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                          @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="btn-wraper">
                        <button type="submit" class="btn btn-default btn-forgot"> Send Password Reset Link</button>
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
      <!-- //// -->
@include('includes.footer')
