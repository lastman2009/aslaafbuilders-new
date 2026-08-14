@php
$title = "Office Edit -$staff->name";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40 agency-contact-page">

                    <div class="col-md-12 padding-left padding-right">

                        

                        <div class="form-wrap">
                            <form action="/editStaff/{{$staff->id}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            
                            {{ csrf_field()}}
                                <h2 class="mb-20">Edit Staff.</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-body form-edit">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Name</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="name" value="{{$staff->name}}" placeholder="Name" required>
                                                                 @if ($errors->has('name'))
                                                                <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Designation</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="designation" value="{{$staff->designation}}" placeholder="Designation" required>
                                                                  @if ($errors->has('designation'))
                                                                <div class="error" style="color: red">{{ $errors->first('designation') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Join Year</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="number" class="form-control" name="year_of_service" value="{{$staff->year_of_service}}" placeholder="2017">
                                                                 @if ($errors->has('year_of_service'))
                                                                <div class="error" style="color: red">{{ $errors->first('year_of_service') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="mt-20 mb-20">Edit Contact Detail.</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-body form-edit">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Phone Number</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="contact_number" value="{{$staff->contact_number}}"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Phone No" required>
                                                                @if ($errors->has('contact_number'))
                                                                <div class="error" style="color: red">{{ $errors->first('contact_number') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Email</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="email" class="form-control" name="email" value="{{$staff->email}}" placeholder="Email">
                                                                @if ($errors->has('email'))
                                                                <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Site Profile URL</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name=" site_profile_url" value="{{$staff->site_profile_url}}" placeholder="Type ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label fb-profile col-md-3 col-sm-12">Facebook Link</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="fb_link" value="{{$staff->fb_link}}" placeholder="Type ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label gplus-profile col-md-3 col-sm-12">Google Plus</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="google_plus" value="{{$staff->google_plus}}" placeholder="Type ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                 @if($staff->image !=null)
                                <h2 class="mt-20 mb-20">Old Image</h2>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-md-12 col-sm-12 padding-left">
                                            <div class="panel panel-default card-view">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="col-lg-12 col-sm-12 add-staff-img text-center">
                                                           
                                                           <figure class="edit-profile-image">
                                                                <img  class="web-info-img" src="/images/staff/thumb_{{$staff->image}}" alt="Profile Image">
                                                           </figure>                                                          
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <h2 class="mt-20 mb-20">Edit Staff Image</h2>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-md-12 col-sm-12 padding-left">
                                            <div class="panel panel-default card-view">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="col-lg-12 col-sm-12 add-staff-img text-center">
                                                            <figure class="edit-profile-image">
                                                                <img id="myImg1" class="web-info-img" src="/assets_admin/dist/img/selcetimg.jpg" alt="Profile Image">
                                                            </figure>
                                                            <div class="text-center">
                                                                <input type="file" name="images" id="file-1" class="inputfile inputfile-1" required />
                                                                <label class="fileupload-profile add-webinfo-img" for="file-1">Add Image</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-30 padding-right">
                                        <div class="col-lg-12 col-sm-12 padding-left">
                                            <button class="btn btn-submit-webinfo btn-anim"><i class="fa fa-paper-plane"></i><span class="btn-text">Edit &amp; Continue</span></button>
                                        </div>                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->


    @include( 'includes_admin.footer' )
    <script>
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
            }
            ;

        });

    </script>

