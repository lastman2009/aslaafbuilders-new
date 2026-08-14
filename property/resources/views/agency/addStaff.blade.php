@php
$title = "Staff Add";
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

                        <div class="row">
                            <div class="col-lg-12 padding-right">   
                                @foreach($staffs as $staff)
                               
                                <div class="col-md-4 col-sm-12 padding-left">
                                    <div class="panel panel-default card-view add-staff-portion">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="edit-staff">
                                                    <a href="" class="trash" data-id="{{$staff->id}}"><i class="fa fa-trash "  ></i></a>
                                                    <a href="/edit-staff/{{App\AgencyWebsite::getId($staff->id)}}"><i class="fa fa fa-pencil-square-o" ></i></a>
                                                </div>
                                                <ul>
                                                    <li><img src="dist/img/agent-pic.jpg" alt="" /></li>
                                                    <li><span class="lable">Name: </span><span class="value">{{$staff->name}}</span></li>
                                                    <li><span class="lable">Designation: </span><span class="value">{{$staff->designation}}</span></li>
                                                    <li><span class="lable">Year Of Service: </span><span class="value">{{$staff->year_of_service}} Year</span></li>
                                                    <li><span class="lable">Phone Number: </span><span class="value">{{$staff->contact_number}}</span></li>
                                                    <li><span class="lable">Email Address: </span><span class="value">{{$staff->email}}</span></li>
                                                    <li>
                                                    <a 
                                                    @if(empty($staff->fb_link))
                                                    href="#"

                                                    @else
                                                    href="/{{$staff->fb_link}}"

                                                    @endif
                                                    ><i class="zmdi zmdi-facebook"></i></a>
                                                   
                                                    <a 
                                                     @if(empty($staff->google_plus))
                                                     href="#"
                                                    @else
                                                    href="/{{$staff->google_plus}}"

                                                    @endif
                                                    ><i class="zmdi zmdi-google-plus"></i></a>
                                                
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               @endforeach
                            </div>
                        </div>


                        <div class="form-wrap">
                            <form action="/addStaff/{{$id}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            
                            {{ csrf_field()}}
                                <h2 class="mb-20">Add Staff.</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-body form-edit">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Name</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="name" value="" placeholder="Name" required>
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
                                                                <input type="text" class="form-control" name="designation" value="" placeholder="Designation" required>
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
                                                                <input type="number" class="form-control" name="year_of_service" min="2" placeholder="2016" required>
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
                                <h2 class="mt-20 mb-20">Contact Detail.</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-body form-edit">
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-12">Phone Number</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="contact_number" value="" placeholder="Phone Number"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
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
                                                                <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
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
                                                                <input type="text" class="form-control" name=" site_profile_url" value="" placeholder="Type ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label fb-profile col-md-3 col-sm-12">Facebook Link</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="fb_link" value="" placeholder="Type ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 padding-left padding-right">
                                                        <div class="form-group">
                                                            <label class="control-label gplus-profile col-md-3 col-sm-12">Google Plus</label>
                                                            <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                                <input type="text" class="form-control" name="google_plus" value="" placeholder="Type ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <h2 class="mt-20 mb-20">Add Staff Image</h2>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-md-12 col-sm-12 padding-left">
                                            <div class="panel panel-default card-view">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="col-lg-12 col-sm-12 add-staff-img text-center">
                                                            <figure class="edit-profile-image">
                                                                <img id="myImg1" class="web-info-img" src="/dist/img/selcetimg.jpg" alt="Profile Image">
                                                            </figure>
                                                            <div class="text-center">
                                                                <input type="file" name="images" id="file-1" class="inputfile inputfile-1" />
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
                                        <div class="col-lg-6 col-sm-12 padding-left">
                                            <button class="btn btn-submit-webinfo btn-anim" name="action" value="save"><i class="fa fa-paper-plane"></i><span class="btn-text">Save &amp; Continue</span></button>
                                        </div>

                                        <div class="col-lg-6 col-sm-12 padding-left">
                                            <button class="btn-submit-agencycontact btn btn-default" name="action" value="more"><span>Add More Staff</span></button>
                                        </div>
                                    </div>

                                </div>
                            {{ csrf_field()}}
                                
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
     <script type="text/javascript">
        $('.trash').click(function(e){
            e.preventDefault();
           current =$(this);
           id =$(this).data('id'); 
           url ="/deletestaff/"+id;
            if (confirm('Are you sure you want to delete this Image?')) {
                $.ajax( {
                        url: url,
                        datatype: 'json',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                        },
                        success: function (e) {
                        current.parent().parent().parent().parent().parent().remove();
                        }

                    } );
            }
        });

    </script>
    <script>
        var numInput = document.querySelector('input');

// Listen for input event on numInput.
numInput.addEventListener('input', function(){
    // Let's match only digits.
    var num = this.value.match(/^\d+$/);
    if (num === null) {
        // If we have no match, value will be empty.
        this.value = "";
    }
}, false)
    </script>