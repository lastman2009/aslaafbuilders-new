@include('includes_admin.header')
@include('includes_admin.sidebar')






<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <ul role="tablist" class="nav nav-tabs" id="profile_tablist">
                        <li class="active" role="presentation">
                            <a aria-expanded="true"  data-toggle="tab" role="tab" id="profile_tab_15" href="#dashboard_profile">Profile</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="dashboard_profile" class="tab-pane fade active in" role="tabpanel">


                            <div class="col-md-12 padding-left padding-right">
                                <div class="form-wrap">
                                    <form action="#" class="form-horizontal ">
                                        <div class="form-body edit-profile-body form-edit">
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">First Name</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_first_name" value="" placeholder="JOHN">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Last Name</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_last_name" value="" placeholder="DOE">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Email Address</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="email" class="form-control" name="edit_profile_email" value="" placeholder="ALI504@GMAIL.COM">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Telephone</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="tel" class="form-control" name="edit_profile_phone" value="" placeholder="042-1233-344">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Mobile</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_mobile" value="" placeholder="+923114605583">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Created At</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_creation" value="" placeholder="19 MAY 2017">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Update</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_update" value="" placeholder="3 MONTH AGO">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Address</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_address" value="" placeholder="FF BLOCK PHASE 4 DHA LAHORE">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">City</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_city" value="" placeholder="LAHORE">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">CNIC</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_cnic" value="" placeholder="25402-5566-8">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label fb-profile col-md-3 col-sm-12">Facebook Address</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_facebook" value="" placeholder="ALI504@GMAIL.COM">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label gplus-profile col-md-3 col-sm-12">Google Plus</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_gplus" value="" placeholder="TECHNOLOGICAL.INC@GMAIL.COM">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group margin-zero">
                                                        <label class="control-label tw-profile col-md-3 col-sm-12">Twitter</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="edit_profile_twitter" value="" placeholder="TECHNOLOGICAL">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 padding-right">
                                                <div class="col-lg-6 col-sm-12 edit-profile-img padding-left">
                                                    <div class="panel panel-default card-view profile-Image-tab new-profile-img">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body">
                                                                <div class="col-lg-12 col-sm-12 text-center profile_image">
                                                                    <figure class="edit-profile-image">
                                                                        <i class="zmdi zmdi-check editpic-icon"></i>
                                                                        <img id="myImg" class="img-profile img-circle" src="dist/img/profile-img.jpg" alt="Profile Image">
                                                                    </figure>
                                                                    <div class="text-center">
                                                                        <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" />
                                                                        <label class="fileupload-profile" for="file-1">Choose File</label>
                                                                        <button type="button" class="removeupload-profile">Remove Picture</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-sm-12 edit-profile-interest padding-left">
                                                    <div class="profile-second-row">
                                                        <div class="panel panel-default card-view profile-Image-tab">
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body profile-information profile-checkbox editable-interest">
                                                                    <h1>Interests</h1>
                                                                    <ul class="text-center">
                                                                        <li>
                                                                            <input type="checkbox" id="test6" />
                                                                            <label for="test6">Buying</label>
                                                                        </li>
                                                                        <li>
                                                                            <input type="checkbox" id="test2" />
                                                                            <label for="test2">Selling</label>
                                                                        </li>
                                                                        <li>
                                                                            <input type="checkbox" id="test3" />
                                                                            <label for="test3">Investor</label>
                                                                        </li>
                                                                        <li>
                                                                            <input type="checkbox" id="test4" />
                                                                            <label for="test4">Building</label>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-12 col-sm-12 padding-left padding-right">
                                            <div class="profile-second-row">
                                                <div class="panel panel-default card-view profile-Image-tab">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body profile-role">
                                                            <ul class="click_checkbox">
                                                                <li>
                                                                    <h2>You are ... ?</h2>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="role_question" />
                                                                    <label for="role_question">Agent</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="role_question1" />
                                                                    <label for="role_question1">Vendor</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="role_question2" />
                                                                    <label for="role_question2">Architecture</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 padding-right">
                                                <div class="col-lg-6 col-sm-12 role-agent-profile edit-profile-img padding-left">
                                                    <div class="panel panel-default card-view profile-Image-tab">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body profile-role">
                                                                <h1>Agent</h1>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Company Name">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Telephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Location">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Website">
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-control text-profile textarea_editor" name="company_overview" id="" value="" placeholder="Company Overview"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="box">
                                                                    <input type="file" name="file-2[]" id="file-3" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
                                                                    <label for="file-3">
                                                                        <span>Choose Logo</span>
                                                                        <img src="dist/img/file-upload.png" alt="File Upload" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 role-vendor-profile edit-profile-interest padding-left">
                                                    <div class="panel panel-default card-view profile-Image-tab">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body profile-role">
                                                                <h1>Vendor</h1>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Vendor Name">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Telephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Location">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Website">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-control text-profile textarea_editor" name="company_overview" id="" value="" placeholder="Company Overview"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="box">
                                                                    <input type="file" name="file-2[]" id="file-4" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
                                                                    <label for="file-4">
                                                                        <span>Choose Logo</span>
                                                                        <img src="dist/img/file-upload.png" alt="File Upload" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 role-architecture-profile edit-profile-img padding-left">
                                                    <div class="panel panel-default card-view profile-Image-tab">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body profile-role">
                                                                <h1>Architecture</h1>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Architecture Name">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Telephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Location">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="" placeholder="Website">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-control text-profile textarea_editor" name="company_overview" id="" value="" placeholder="Company Overview"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="box">
                                                                    <input type="file" name="file-2[]" id="file-5" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
                                                                    <label for="file-5">
                                                                        <span>Choose Logo</span>
                                                                        <img src="dist/img/file-upload.png" alt="File Upload" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-actions edit-form-submit">
                                            <div class="panel panel-default card-view profile-Image-tab">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body profile-role">

                                                        <div class="row">
                                                            <button type="reset" class="btn btn-reset">Reset</button>
                                                            <button type="submit" class="btn btn-update">Update</button>
                                                        </div>

                                                    </div>
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
        </div>
    </div>
<!-- /Row -->


@include('includes_admin.footer')

<script>
    $(document).ready(function () {
        $(".role-agent-profile").hide();
        $(".role-vendor-profile").hide();
        $(".role-architecture-profile").hide();
        $("#role_question").click(function () {
            if ($(this).is(":checked")) {
                $(".role-agent-profile").show();
            } else {
                $(".role-agent-profile").hide();
            }
        });
        $("#role_question1").click(function () {
            if ($(this).is(":checked")) {
                $(".role-vendor-profile").show();
            } else {
                $(".role-vendor-profile").hide();
            }
        });
        $("#role_question2").click(function () {
            if ($(this).is(":checked")) {
                $(".role-architecture-profile").show();
            } else {
                $(".role-architecture-profile").hide();
            }
        });


        $(function () {
            $(":file").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $('#myImg').attr('src', e.target.result);
        }
        ;

    });

</script>
