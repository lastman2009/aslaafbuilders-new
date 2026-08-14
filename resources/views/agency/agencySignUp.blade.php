@php
$title = "Register";
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
    <div id="regContainer" class="container signup-page">
      <div class="row">
        <div class="col-md-7 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-heading signin-panelheading">
              <div class="row">
                <div class="col-md-12 features pright">
                  <figure class="pull-left home-icon"><img src="../assets/images/signup-page.png"> </figure>
                  <div class="feature-heading pull-left">
                    <h2>Agent Sign <span> Up</span></h2>
                    <p class="pt-5">Register yourself as RightDeed Property Agents</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12 acount-create">
                <form method="POST" action="/agenct_signup" role="form" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group form-group-margin">
                    <div class="">
                      <input id="first_name" type="text" class="form-control" name="first_name" required placeholder="Name" required> 
                    </div>
                  </div>
                  <div class="form-group form-group-margin">
                    <div class="email-field">
                      <input id="text" type="text" class="form-control" name="username" required placeholder="Email / Phone" required>
                    </div>
                  </div>
                  <div class="form-group form-group-margin">
                    <div class="company-name">
                      <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>       
                    </div>
                  </div>
                  <div class="form-group form-group-margin">
                    <div class="tele">
                      <input type="text" name="company_telephone" class="form-control"  placeholder="Telephone" required>       
                    </div>
                  </div>
                  <div class="form-group form-group-margin">
                    <div class="location">
                      <input type="text" name="company_location" class="form-control"  placeholder="Company Location" required>      
                    </div>
                  </div>
                  <div class="form-group form-group-margin">
                    <div class="pas-agency">
                      <input type="password" name="password" class="form-control"  placeholder="Password" required>       
                    </div>
                  </div>

                  <div class="form-group agency-signupdropdown">
                    <div class="col-sm-12 padding-left">
                          <select class="selectpicker agency-signupdrop" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Select City--" required>
                          @foreach($cities as $city)

                              <option value="{{ $city->id }}" selected>{{$city->name}}</option>
                          @endforeach

                          </select>
                      </div>
                  </div>

                  <div class="col-lg-12 col-sm-12 edit-profile-img padding-left">
                            <div class="panel panel-default card-view profile-Image-tab new-profile-img">
                              <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                  <div class="col-lg-12 col-sm-12 text-center profile_image">
                                    <figure class="edit-profile-image">
                                        <i class="zmdi zmdi-check editpic-icon"></i>
                                        <img id="myImg1" class="img-profile-agent img-circle" src="
                                        /assets_admin/dist/img/logo1.png" alt="Profile Image"> 
                                    </figure>
                                    <div class="text-center agency-signuppic">
                                      <input type="file" name="logo" id="file-1" class="inputfile inputfile-1"  />
                                      <label class="fileupload-profile" for="file-1">Choose File</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                  <div class="btn-wraper">
                    <input id="signUp2" type="checkbox">
                    <label for="signUp2">&nbsp;I Agree With <span class="color">Terms And Condition</span></label>

                    <button type="submit" class="btn btn-default">CREATE A FREE ACCOUNT</button>
                  </div>
                </form>
              </div>
             <div class="row">  
                  <div class="col-md-12 padding-right social-signup"> 
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="/auth/facebook" class="fb-acount"><i class="fa fa-facebook"></i> Signup With facebook</a> </div>
                    <div class="col-md-6 col-sm-6 padding-left"> <a href="{{ url('login/google') }}" class="fb-acount g-plus"><i class="fa fa-google-plus"></i> Signup With Google plus</a> </div>
                  </div>
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

<script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $("#file-1").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

           function imageIsLoaded(e) {
                $('#myImg1').attr('src', e.target.result);
            };
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