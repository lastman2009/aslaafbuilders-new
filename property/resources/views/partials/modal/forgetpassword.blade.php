<div class="modal fade forgot-modal" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"><strong>Forgot Password</strong></h4>
                    <p class="text-center">Enter your email or username to create a new password.</p>
                </div>
                <div class="modal-body">
                    <form role="form" class="form-horizontal" method="POST" action="{{ url('/password-reset') }}">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 pr control-label"><span class="primary-color"><sup>*</sup></span> Username/Email:</label>
                            <div class="col-sm-8">
                                 <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                 @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <p>On Submit, an email with a link to create a password will be sent to your email.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4 text-left">
                                <button type="submit" class="btn btn-default">Retrieve Password</button>
                            </div>
                            <div class="col-sm-2 text-left">
                                <a href="javascript:void(0)" data-dismiss="modal">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
     </div>