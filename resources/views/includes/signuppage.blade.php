@php
$title = "Sign Up";
@endphp
@include("includes.title")
<script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Main Starts -->
<main class="main-section detail-page signin-pagetop">
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
 <div id="fullscreens">
        <div id="regContainer" class="container signup-page signup-pages">
          <div class="row">
            <div class="col-md-7 col-md-offset-3">
              <div class="panel panel-login">
                <div class="panel-heading signin-panelheading">
                  <div class="row">
                    <div class="col-md-12 features pright">
                      <figure class="pull-left home-icon"><img src="../assets/images/signup-page.png"> </figure>
                      <div class="feature-heading pull-left">
                        <h2>Sign <span> Up</span></h2>
                        <p class="pt-5">Signup to RightDeed Property Portal</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 acount-createa">
                     <form method="POST" action="/register" role="form">
                     {{ csrf_field() }}
                    <div class="col-md-6 padding-left">
                       <div class="form-group name-field{{ $errors->has('first_name') ? ' has-error' : '' }}">
                       
                            <div class="email-login">
                              <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="Name">

                                      @if ($errors->has('first_name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('first_name') }}</strong>
                                          </span>
                                      @endif
                              </div>
                        </div>
                      </div>
                      <div class="col-md-6 padding-left padding-right">
                        <div class="form-group">
                           <div class="email-field{{ $errors->has('email') ? ' has-error' : '' }}">
                               
                               
                                    <input id="username" type="text" class="form-control" name="username" required placeholder="Email / Phone">
                                
                          </div>
                        </div>
                      </div>


                     <div class="col-md-6 padding-left">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} password">
                            
                                  <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                      </div>
          <div class="col-md-6 padding-left padding-right">
                                           
                        <div class="form-group password">
                            
                                  <input type="password" class="form-control" id="pwd1" placeholder="Re-password" required>
                            
                        </div>
                  
                    </div>
                      <div class="btn-wraper">
					  <div class="signin-text">
                        <input id="signUp2" type="checkbox">
                        <label class="signup-inpage for="signUp2">&nbsp;I Agree With <span class="color">Terms And Condition</span></label>
						<p class="need-signin ptop" style="color:#000;">Signup as  Agent <a href="/signup_agent">Sign up</a></p>
                        <p class="need-signin ptop" style="color:#000;">Already have an account? <a href="/loginForm">Sign in</a></p>
                        </div>
                        <button type="submit" id="submit-button" class="btn btn-default">CREATE A FREE ACCOUNT</button>
                      </div>
                    </form>
                  </div>
                  </div>
                 <!-- <div class="row">  -->
                 <!--<div class="col-md-12 social-signin pleft pright">-->
                 <!--  <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>-->
                   
                 <!--  <div class="col-md-6 col-sm-6 padding-left pright"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>-->
                 <!--  </div>-->
                 <!--</div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
      </main>

<!-- main ends -->
@include('includes.footer')
<script>
  $(document).ready(function(){

    $('#submit-button').click(function(){
        var pass = $('#pwd').val();
        var pass2 = $('#pwd1').val();
        if(pass != pass2){
              toastr.warning("password not match");
              $('#submit-button').attr("disabled",true);  
      
        var pass2 = $('#pwd1').val("");
        }
        else
           toastr.success("password match"); 
         $('#submit-button').attr("disabled",false);

    });
});
</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
