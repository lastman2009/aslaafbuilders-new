@php
$title = "Password Reset ";
@endphp
@include("includes.title")
<main class="main-section detail-page">
 
 <div id="fullscreens">
        <div id="regContainer" class="container signin-page">
          <div class="row">
            <div class="col-md-7 col-md-offset-3 col-sm-12">
              <div class="panel panel-login">
                <div class="panel-heading">
                  <div class="row">
                   <!-- ////// Testing  -->
                 <!--  <div class="form-group ">
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
                    </div> -->
    <!-- end testing .... -->
                    <div class="col-md-12 features" style="margin-left: -30px;">
                      <figure class="pull-left home-icon"><img src="assets/images/signin-page.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Reset <span>Password</span></h2>
                        <p>Property portal .</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-create">
                    <form role="form" method="POST" action="/update_password">
                        <input type="text" name="token" value="{{$token}}" hidden>
                    {{ csrf_field()   }}
                   
                      <div class="form-group">
                        <input class="form-control"  name="password" id="password" type="text"  required placeholder="Password">
                        />
                      </div>
                      <div class="form-group password">
                        <input class="form-control" type="text" name="confirm_password" id="confirm_password" required placeholder="Confirm Password">
                        <span id='message'></span>
                      </div>
                      <div class="btn-wraper">
                        <button type="submit" class="btn btn-default">Reset</button>
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
@include('includes.footer')
<script>
    $('#confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Match').css('color', 'red');
});
</script>