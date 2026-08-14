@php
$title = "Edit Profile";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="tab-struct custom-tab-2 mt-30">
                    <ul role="tablist" class="nav nav-tabs" id="profile_tablist">
                        <li class="active" role="presentation">
                            <a aria-expanded="true" data-toggle="tab" role="tab" id="profile_tab_15"
                               href="#dashboard_profile">Profile</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <form action="/tesing_data" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div id="dashboard_profile" class="tab-pane fade active in" role="tabpanel">

                                @foreach($all as $all)
                                <div class="col-md-12 padding-left padding-right">
                                    <div class="form-wrap">
                                        {{ csrf_field() }}
                                        <div class="form-body edit-profile-body form-edit">
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">First
                                                            Name</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_first_name"
                                                                   value="{{$all->first_name}}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('edit_profile_first_name'))
                                                    <div class="error" style="color: red">{{
                                                        $errors->first('edit_profile_first_name') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Last
                                                            Name</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_last_name"
                                                                   value="{{$all->last_name}}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('edit_profile_first_name'))
                                                    <div class="error" style="color: red">{{
                                                        $errors->first('edit_profile_first_name') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Email
                                                            Address</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="email" id="emailcheck" class="form-control"
                                                                   name="edit_profile_email" value="{{$all->email}}"
                                                                   @if(!empty($all->email))
                                                            disabled
                                                            @endif


                                                            >
                                                            @if ($errors->has('edit_profile_email'))
                                                            <div class="error" style="color: red">{{
                                                                $errors->first('edit_profile_email') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <p id="checkemial" style="display: none;color:red"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Signup
                                                            Mobile-No</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="tel" class="form-control copy" maxlength="11"
                                                                   id="checkphoneexist" name="edit_profile_phone"
                                                                   value="{{$all->telephone}}"
                                                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'

                                                                   @if(!empty($all->telephone))
                                                            disabled
                                                            @endif

                                                            >

                                                        </div>
                                                    </div>
                                                    @if ($errors->has('edit_profile_phone'))
                                                    <div class="error" style="color: red">{{
                                                        $errors->first('edit_profile_phone') }}
                                                    </div>
                                                    @endif
                                                    <p id="checkphone" style="display: none;color: red"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Mobile for
                                                            Property display</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" maxlength="11" class="form-control copy"
                                                                   name="edit_profile_mobile" id="input-mobile"
                                                                   value="{{$all->mobile}}"
                                                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                            @if ($errors->has('edit_profile_mobile'))
                                                            <div class="error" style="color: red">{{
                                                                $errors->first('edit_profile_mobile') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Address</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_address"
                                                                   value="{{$all->address}}">
                                                            @if ($errors->has('edit_profile_address'))
                                                            <div class="error" style="color: red">{{
                                                                $errors->first('edit_profile_address') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">City</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_city" value="{{$all->city}}">
                                                            @if ($errors->has('edit_profile_city'))
                                                            <div class="error" style="color: red">{{
                                                                $errors->first('edit_profile_city') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">CNIC</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_cnic" id="input-cnic"
                                                                   value="{{$all->cnic}}">
                                                            @if ($errors->has('edit_profile_cnic'))
                                                            <div class="error" style="color: red">{{
                                                                $errors->first('edit_profile_cnic') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label fb-profile col-md-3 col-sm-12">Facebook
                                                            Address</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_facebook"
                                                                   value="{{$all->facebook_link}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label gplus-profile col-md-3 col-sm-12">Google
                                                            Plus</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_gplus"
                                                                   value="{{$all->google_link}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group margin-zero">
                                                        <label class="control-label tw-profile col-md-3 col-sm-12">Twitter</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control"
                                                                   name="edit_profile_twitter"
                                                                   value="{{$all->twitter_link}}">
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

                                                                        @if($all->image != "")
                                                                        @foreach(json_decode($all->image) as $image)
                                                                        <i class="zmdi zmdi-check editpic-icon"></i>
                                                                        <img id="myImg" class="img-profile img-circle"
                                                                             src="/image/profile/{{$image}}"
                                                                             alt="Profile Image">
                                                                        @endforeach

                                                                        @else
                                                                        <i class="zmdi zmdi-check editpic-icon"></i>
                                                                        <img id="myImg" class="img-profile img-circle"
                                                                             src="
																				/assets_admin/dist/img/user1.png"
                                                                             alt="Profile Image">
                                                                        @endif


                                                                    </figure>
                                                                    <div class="text-center">
                                                                        <input type="file" name="edit_profile_image"
                                                                               id="file-1"
                                                                               class="inputfile inputfile-1"/>
                                                                        <label class="fileupload-profile" for="file-1">Choose
                                                                            File</label>
                                                                        <button type="button"
                                                                                class="removeupload-profile">Remove
                                                                            Picture
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="col-lg-6 col-sm-12 edit-profile-interest padding-left">
                                                    <div class="profile-second-row">
                                                        <div class="panel panel-default card-view profile-interests profile-Image-tab">
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body profile-information profile-checkbox editable-interest">
                                                                    <h1>Interests</h1>

                                                                    <ul class="text-center nicescroll-bar">
                                                                        @foreach($interests as $interest)
                                                                        <li>
                                                                            @if(in_array($interest->id, $selected))

                                                                            <input type="checkbox"
                                                                                   id="data-{{$interest->id}}"
                                                                                   name="interest[{{$interest->id}}]"
                                                                                   checked/>
                                                                            <label for="data-{{$interest->id}}">{{$interest->name}}</label>
                                                                            @else
                                                                            <input type="checkbox"
                                                                                   id="data-{{$interest->id}}"
                                                                                   name="interest[{{$interest->id}}]"/>
                                                                            <label for="data-{{$interest->id}}">{{$interest->name}}</label>
                                                                            @endif
                                                                        </li>
                                                                        @endforeach
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
                                                                @foreach($characterTypes as $charactertype)
                                                                <li>
                                                                    <?php
                                                                    if (in_array($charactertype->id, $checked)) {
                                                                        ?>
                                                                        <input type="checkbox" checked
                                                                               name="charactertype"
                                                                               id="role_question{{$charactertype->id}}"
                                                                               data-id="{{$charactertype->id}}"/>
                                                                        <label for="role_question{{$charactertype->id}}">
                                                                            <?php echo ucfirst($charactertype->name); ?>
                                                                        </label>
                                                                        <?php
                                                                    } else {
                                                                        ?>

                                                                        <input type="checkbox" name="charactertype"
                                                                               id="role_question{{$charactertype->id}}"
                                                                               data-id="{{$charactertype->id}}"/>
                                                                        <label for="role_question{{$charactertype->id}}">
                                                                            <?php echo ucfirst($charactertype->name); ?>
                                                                        </label>
                                                                        <?php

                                                                    }
                                                                    ?>
                                                                </li>
                                                                @endforeach

                                                                <!-- <li>
<input type="checkbox" id="role_question" />
<label for="role_question">Agent</label>
</li>
<li>
<input type="checkbox" id="role_question1" />
<label for="role_question1">Vendor</label>
</li>
<li>
<input type="checkbox" id="role_question2" />
<label for="role_question2">Architecture/>
</label>
</li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 padding-right">


                                                <div <?php if (!isset($checkedName['agent'][0])) {
                                                    echo 'style ="display:none;"';
                                                } ?> class="col-lg-6 col-sm-12 role-agent-profile edit-profile-img padding-left">

                                                    <div class="panel panel-default card-view profile-Image-tab">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="profile-role agency-web-chk">
                                                                <input type="checkbox" name="create_website"
                                                                       id="website" {{$websiteCheck}}>
                                                                <label for="website">Do You Want A Website</label>
                                                                <span id="websiteButton" class="profile-role"
                                                                      style="<?php if (empty($websiteCheck)) {
                                                                          echo "display:none";
                                                                      } ?>">
																	<a class="btn btn-primary"
                                                                       href="/dashboard/agency/website/{{App\AgencyWebsite::getId(Auth::id())}}">Click for Settings</a>
																</span>
                                                            </div>


                                                            <div class="panel-body profile-role">
                                                                <h1>Agent</h1>
                                                                <div class="form-group">

                                                                    @if(isset($checkedName['agent'][0]['user_character_type_id'])
                                                                    &&
                                                                    !empty($checkedName['agent'][0]['user_character_type_id']))
                                                                    <input type="hidden" class="agent_characterType"
                                                                           value="{{$checkedName['agent'][0]['user_character_type_id']}}"
                                                                           name="character[agent][id]"> @else
                                                                    <input type="hidden" class="agent_characterType"
                                                                           name="character[agent][id]"> @endif
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['agent'][0]['name']) &&
                                                                        !empty($checkedName['agent'][0]['name']))
                                                                        <input type="text" class="form-control agent"
                                                                               id="" placeholder="Company Name"
                                                                               value="{{$checkedName['agent'][0]['name']}}"
                                                                               name="character[agent][name]"> @else
                                                                        <input type="text" class="form-control agent"
                                                                               id="" placeholder="Company Name"
                                                                               name="character[agent][name]"> @endif

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['agent'][0]['telephone'])
                                                                        &&
                                                                        !empty($checkedName['agent'][0]['telephone']))
                                                                        <input type="text" class="form-control agent"
                                                                               maxlength="11" id="input-agent-telephone"
                                                                               placeholder="Telephone"
                                                                               value="{{$checkedName['agent'][0]['telephone']}}"
                                                                               name="character[agent][telephone]"> @else
                                                                        <input type="text" class="form-control agent"
                                                                               maxlength="11"
                                                                               id="input-agent-telephone2"
                                                                               placeholder="Telephone"
                                                                               name="character[agent][telephone]">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">


                                                                        @if(isset($checkedName['agent'][0]['location'])
                                                                        && !empty($checkedName['agent'][0]['location']))
                                                                        <input type="text" class="form-control agent"
                                                                               id="" placeholder="Location"
                                                                               value="{{$checkedName['agent'][0]['location']}}"
                                                                               name="character[agent][location]"> @else
                                                                        <input type="text" class="form-control agent"
                                                                               id="" placeholder="Location"
                                                                               name="character[agent][location]"> @endif

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['agent'][0]['website'])
                                                                        && !empty($checkedName['agent'][0]['website']))
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="Website"
                                                                               value="{{$checkedName['agent'][0]['website']}}"
                                                                               name="character[agent][website]"> @else
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="Website"
                                                                               name="character[agent][website]"> @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12 architecture-bootstraplist">

                                                                        @if(isset($checkedName['agent'][0]['city_id']))
                                                                        <select class="selectpicker agent"
                                                                                name="character[agent][city_id]"
                                                                                id="city"
                                                                                data-style="form-control btn-font btn-default btn-outline"
                                                                                title="--Select City--" required>

                                                                            @foreach($cities as $city)
                                                                            @if($city->id ==
                                                                            $checkedName['agent'][0]['city_id'])

                                                                            <option value="{{ $city->id }}" selected>
                                                                                {{$city->name}}
                                                                            </option>

                                                                            @else

                                                                            <option value="{{ $city->id }}">
                                                                                {{$city->name}}
                                                                            </option>

                                                                            @endif
                                                                            @endforeach

                                                                        </select>
                                                                        @else

                                                                        <select class="selectpicker agent"
                                                                                name="character[agent][city_id]"
                                                                                id="city"
                                                                                data-style="form-control btn-font btn-default btn-outline"
                                                                                title="--Select City--">

                                                                            @foreach($cities as $city)
                                                                            <option value="{{ $city->id }}">
                                                                                {{$city->name}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        @if(isset($checkedName['agent'][0]['description'])
                                                                        &&
                                                                        !empty($checkedName['agent'][0]['description']))
                                                                        <textarea class="form-control summernote
																				 " id="" placeholder="Company Overview"
                                                                                  name="character[agent][description]">{{$checkedName['agent'][0]['description']}}</textarea>
                                                                        @else
                                                                        <textarea class="form-control summernote " id=""
                                                                                  placeholder="Company Overview"
                                                                                  name="character[agent][description]"></textarea>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="box">
                                                                        @if(isset($checkedName['agent'][0]['logo']) &&
                                                                        !empty($checkedName['agent'][0]['logo']))
                                                                        <input type="file" name="character[agent][logo]"
                                                                               class="inputfile inputfile-2"/>
                                                                        <label for="file-2">
                                                                            <span>Choose Logo</span>
                                                                            @foreach(json_decode($checkedName['agent'][0]['logo'])
                                                                            as $image)
                                                                            <img src="/image/logo/{{$image}}"
                                                                                 width="20%" height="100" alt="">
                                                                            @endforeach
                                                                        </label>
                                                                        @else
                                                                        <input type="file" name="character[agent][logo]"
                                                                               class="inputfile inputfile-2 agent"/>
                                                                        <label for="file-2">
                                                                            <span>Choose Logo</span>
                                                                            <img src="/assets_admin/dist/img/file-upload.png"
                                                                                 alt="File Upload"/>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>


                                                <div <?php if (!isset($checkedName['vendor'][0])) {
                                                    echo 'style ="display:none;"';
                                                } ?> class="col-lg-6 col-sm-12 role-vendor-profile edit-profile-interest padding-left">
                                                    <div class="panel panel-default card-view profile-Image-tab">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body profile-role">
                                                                <h1>Vendor</h1>
                                                                @if(isset($checkedName['vendor'][0]['user_character_type_id'])
                                                                &&
                                                                !empty($checkedName['vendor'][0]['user_character_type_id']))
                                                                <input type="hidden" class="vendor_characterType vendor"
                                                                       name="character[vendor][id]"
                                                                       value="{{$checkedName['vendor'][0]['user_character_type_id']}}">
                                                                @else
                                                                <input type="hidden" class="vendor_characterType vendor"
                                                                       name="character[vendor][id]"> @endif

                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['vendor'][0]['name']) &&
                                                                        !empty($checkedName['vendor'][0]['name']))
                                                                        <input type="text" class="form-control vendor"
                                                                               id="" placeholder="Vendor Name"
                                                                               value="{{$checkedName['vendor'][0]['name']}}"
                                                                               name="character[vendor][name]"> @else
                                                                        <input type="text" class="form-control vendor"
                                                                               id="" placeholder="Vendor Name"
                                                                               name="character[vendor][name]"> @endif

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['vendor'][0]['telephone'])
                                                                        &&
                                                                        !empty($checkedName['vendor'][0]['telephone']))
                                                                        <input type="text" class="form-control vendor"
                                                                               maxlength="11"
                                                                               id="input-vendor-telephone"
                                                                               placeholder="Telephone"
                                                                               name="character[vendor][telephone]"
                                                                               value="{{$checkedName['vendor'][0]['telephone']}}">
                                                                        @else
                                                                        <input type="text" class="form-control vendor"
                                                                               maxlength="11"
                                                                               id="input-vendor-telephone2"
                                                                               placeholder="Telephone"
                                                                               name="character[vendor][telephone]">
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['vendor'][0]['location'])
                                                                        &&
                                                                        !empty($checkedName['vendor'][0]['location']))
                                                                        <input type="text" class="form-control vendor"
                                                                               id="" placeholder="Location"
                                                                               value="{{$checkedName['vendor'][0]['location']}}"
                                                                               name="character[vendor][location]"> @else
                                                                        <input type="text" class="form-control vendor"
                                                                               id="" placeholder="Location"
                                                                               name="character[vendor][location]">
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-sm-6">

                                                                        @if(isset($checkedName['vendor'][0]['website'])
                                                                        && !empty($checkedName['vendor'][0]['website']))
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="Website"
                                                                               value="{{$checkedName['vendor'][0]['website']}}"
                                                                               name="character[vendor][website]"> @else
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="Website"
                                                                               name="character[vendor][website]"> @endif

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-sm-12 architecture-bootstraplist">
                                                                        @if(isset($checkedName['vendor'][0]['city_id']))


                                                                        <select class="selectpicker vendor"
                                                                                name="character[vendor][city_id]"
                                                                                id="city"
                                                                                data-style="form-control btn-font btn-default btn-outline"
                                                                                title="--Select City--">

                                                                            @foreach($cities as $city)

                                                                            @if($city->id ==
                                                                            $checkedName['vendor'][0]['city_id'])

                                                                            <option value="{{ $city->id }}" selected>
                                                                                {{$city->name}}
                                                                            </option>

                                                                            @else

                                                                            <option value="{{ $city->id }}">
                                                                                {{$city->name}}
                                                                            </option>

                                                                            @endif

                                                                            @endforeach

                                                                        </select>
                                                                        @else

                                                                        <select class="selectpicker vendor"
                                                                                name="character[vendor][city_id]"
                                                                                id="city"
                                                                                data-style="form-control btn-font btn-default btn-outline"
                                                                                title="--Select City--">

                                                                            @foreach($cities as $city)
                                                                            <option value="{{ $city->id }}">
                                                                                {{$city->name}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        @if(isset($checkedName['vendor'][0]['description'])
                                                                        &&
                                                                        !empty($checkedName['vendor'][0]['description']))
                                                                        <textarea class="form-control summernote" id=""
                                                                                  placeholder="Vendor Overview"
                                                                                  name="character[vendor][description]">{{$checkedName['vendor'][0]['description']}}</textarea>

                                                                        @else

                                                                        <textarea class="form-control summernote" id=""
                                                                                  placeholder="Vendor Overview"
                                                                                  name="character[vendor][description]"></textarea>

                                                                        @endif


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="box">
                                                                        @if(isset($checkedName['vendor'][0]['logo']) &&
                                                                        !empty($checkedName['vendor'][0]['logo']))
                                                                        <input type="file"
                                                                               value="{{$checkedName['vendor'][0]['logo']}}"
                                                                               name="character[vendor][logo]"
                                                                               class="inputfile inputfile-2 "/>
                                                                        <label for="file-2">
                                                                            <span>Choose Logo</span>
                                                                            @foreach(json_decode($checkedName['vendor'][0]['logo'])
                                                                            as $image)
                                                                            <img src="/image/logo/{{$image}}"
                                                                                 width="20%" height="100" alt="">
                                                                            @endforeach
                                                                        </label>
                                                                        @else
                                                                        <input type="file"
                                                                               name="character[vendor][logo]"
                                                                               class="inputfile inputfile-2 vendor"/>
                                                                        <label for="file-2">
                                                                            <span>Choose Logo</span>
                                                                            <img src="/assets_admin/dist/img/file-upload.png"
                                                                                 alt="File Upload"/>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div <?php if (!isset($checkedName['architecture'][0])) {
                                                    echo 'style ="display:none;"';
                                                } ?> class="col-lg-6 col-sm-12 role-architecture-profile edit-profile-img padding-left">
                                                    <div class="panel panel-default card-view profile-Image-tab">
                                                        <div class="panel-wrapper collapse in">
                                                            <div class="panel-body profile-role">
                                                                <h1>Architecture</h1>
                                                                @if(isset($checkedName['architecture'][0]['user_character_type_id'])
                                                                &&
                                                                !empty($checkedName['architecture'][0]['user_character_type_id']))

                                                                <input type="hidden" class="architecture_characterType"
                                                                       name="character[architecture][id]"
                                                                       value="{{$checkedName['architecture'][0]['user_character_type_id']}}">
                                                                @else
                                                                <input type="hidden" class="architecture_characterType"
                                                                       name="character[architecture][id]"> @endif

                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['architecture'][0]['name'])
                                                                        &&
                                                                        !empty($checkedName['architecture'][0]['name']))
                                                                        <input type="text"
                                                                               class="form-control architecture" id=""
                                                                               placeholder="Architecture Name"
                                                                               name="character[architecture][name]"
                                                                               value="{{$checkedName['architecture'][0]['name']}}">
                                                                        @else
                                                                        <input type="text"
                                                                               class="form-control architecture" id=""
                                                                               placeholder="Architecture Name"
                                                                               name="character[architecture][name]">
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['architecture'][0]['telephone'])
                                                                        &&
                                                                        !empty($checkedName['architecture'][0]['telephone']))
                                                                        <input type="text"
                                                                               class="form-control architecture"
                                                                               maxlength="11"
                                                                               id="input-architecture-telephone"
                                                                               placeholder="Telephone"
                                                                               name="character[architecture][telephone]"
                                                                               value="{{$checkedName['architecture'][0]['telephone']}}">
                                                                        @else
                                                                        <input type="text"
                                                                               class="form-control architecture"
                                                                               maxlength="11"
                                                                               id="input-architecture-telephone2"
                                                                               placeholder="Telephone"
                                                                               name="character[architecture][telephone]">
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['architecture'][0]['location'])
                                                                        &&
                                                                        !empty($checkedName['architecture'][0]['location']))
                                                                        <input type="text"
                                                                               class="form-control architecture" id=""
                                                                               placeholder="Location"
                                                                               name="character[architecture][location]"
                                                                               value="{{$checkedName['architecture'][0]['location']}}">
                                                                        @else
                                                                        <input type="text"
                                                                               class="form-control architecture" id=""
                                                                               placeholder="Location"
                                                                               name="character[architecture][location]">
                                                                        @endif


                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        @if(isset($checkedName['architecture'][0]['website'])
                                                                        &&
                                                                        !empty($checkedName['architecture'][0]['website']))
                                                                        <input type="text" class="form-control " id=""
                                                                               placeholder="Website"
                                                                               name="character[architecture][website]"
                                                                               value="{{$checkedName['architecture'][0]['website']}}">
                                                                        @else
                                                                        <input type="text" class="form-control" id=""
                                                                               placeholder="Website"
                                                                               name="character[architecture][website]">
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12 architecture-bootstraplist">
                                                                        @if(isset($checkedName['architecture'][0]['city_id']))


                                                                        <select class="selectpicker"
                                                                                name="character[architecture][city_id]"
                                                                                id="city"
                                                                                data-style="form-control btn-font btn-default btn-outline"
                                                                                title="--Select City--">

                                                                            @foreach($cities as $city)
                                                                            @if($city->id ==
                                                                            $checkedName['architecture'][0]['city_id'])

                                                                            <option value="{{ $city->id }}" selected>
                                                                                {{$city->name}}
                                                                            </option>

                                                                            @else

                                                                            <option value="{{ $city->id }}">
                                                                                {{$city->name}}
                                                                            </option>

                                                                            @endif
                                                                            @endforeach

                                                                        </select>
                                                                        @else

                                                                        <select class="selectpicker"
                                                                                name="character[architecture][city_id]"
                                                                                id="city"
                                                                                data-style="form-control btn-font btn-default btn-outline"
                                                                                title="--Select City--">

                                                                            @foreach($cities as $city)
                                                                            <option value="{{ $city->id }}">
                                                                                {{$city->name}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        @if(isset($checkedName['architecture'][0]['description'])
                                                                        &&
                                                                        !empty($checkedName['architecture'][0]['description']))
                                                                        <textarea class="form-control summernote "
                                                                                  name="character[architecture][description]"
                                                                                  id="" value=""
                                                                                  placeholder="Architecture Overview">{{$checkedName['architecture'][0]['description']}}</textarea>
                                                                        @else
                                                                        <textarea class="form-control summernote "
                                                                                  name="character[architecture][description]"
                                                                                  id="" value=""
                                                                                  placeholder="Architecture Overview"></textarea>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="box">
                                                                        @if(isset($checkedName['architecture'][0]['logo'])
                                                                        &&
                                                                        !empty($checkedName['architecture'][0]['logo']))
                                                                        <input type="file"
                                                                               name="character[architecture][logo]"
                                                                               class="inputfile inputfile-2 "
                                                                               value="{{$checkedName['architecture'][0]['logo']}}"/>
                                                                        <label for="file-2">
                                                                            <span>Choose Logo</span>
                                                                            @foreach(json_decode($checkedName['architecture'][0]['logo'])
                                                                            as $image)
                                                                            <img src="/image/logo/{{$image}}"
                                                                                 width="20%" height="100" alt="">
                                                                            @endforeach
                                                                        </label>
                                                                        @else
                                                                        <input type="file"
                                                                               name="character[architecture][logo]"
                                                                               class="inputfile inputfile-2 architecture"/>
                                                                        <label for="file-2">
                                                                            <span>Choose Logo</span>
                                                                            <img src="/assets_admin/dist/img/file-upload.png"
                                                                                 alt="File Upload"/>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                <button type="submit" class="btn btn-update cannot">Update</button>
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


    <!-- /Row -->

    @include( 'includes_admin.footer' )
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
          $('#myImg').attr('src', e.target.result);
        }


      });

    </script> `
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
    @if (session('status'))
    <script>
      toastr.success("{{ Session::get('status') }}");
    </script>
    @endif
    <script>
      $(document).ready(function () {


      @foreach($characterTypes as $characterType)
          <?php
          if(in_array($characterType->id, $checked))
          {
          ?>
        $(".role-{{$characterType->name}}-profile").show();
        $(".{{$characterType->name}}").prop('required', true);

          <?php
          }else{
          ?>
        $(".role-{{$characterType->name}}-profile").hide();
        $(".{{$characterType->name}}").prop('required', false);

          <?php
          }
          ?>
        $("#role_question{{$characterType->id}}").click(function () {
          var status = "";
          if ($("#role_question{{$characterType->id}}").is(":checked")) {
            status = 1;
          } else {
            status = 0;
          }
          var id = $(this).data('id');
          $.ajax({
            url: "/assignCharacterRole",
            method: "get",
            datatype: "json",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              'id': id,
              'status': status
            },
            success: function (e) {
              // console.log(e.data.character_type_id);
              // alert("{{$characterType->name}}");
              if (e.success == "1") {
                $(".{{$characterType->name}}_characterType").val(e.data.id);
                $(".role-{{$characterType->name}}-profile").show();
                $(".{{$characterType->name}}").prop('required', true);
              } else {
                $(".role-{{$characterType->name}}-profile").hide();
                $(".{{$characterType->name}}").prop('required', false);

              }
            }

          });
          // if ($(this).is(":checked")) {
          //     $(".role-{{$characterType->name}}-profile").show();
          // } else {
          //     $(".role-{{$characterType->name}}-profile").hide();
          // }


        });
			@endforeach

        function onlyNumeric(id) {
          $(id).keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
              // Allow: Ctrl+A, Command+A
              (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
              // Allow: home, end, left, right, down, up
              (e.keyCode >= 35 && e.keyCode <= 40)) {
              // let it happen, don't do anything
              return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
            }
          });
        }

        onlyNumeric("#input-telephone");
        onlyNumeric("#input-mobile");
        onlyNumeric("#input-architecture-telephone");
        onlyNumeric("#input-vendor-telephone");
        onlyNumeric("#input-agent-telephone");
        onlyNumeric("#input-architecture-telephone2");
        onlyNumeric("#input-vendor-telephone2");
        onlyNumeric("#input-agent-telephone2");

        function cnicMask(id) {
          $(id).mask("99999-9999999-9");
          $(id).on("blur", function () {
            var last = $(this).val().substr($(this).val().indexOf("-") + 1);
            if (last.length == 3) {
              var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
              var lastfour = move + last;
              var first = $(this).val().substr(0, 9);
              $(this).val(first + '-' + lastfour);
            }
          });
        }

        cnicMask("#input-cnic");
      });
    </script>
    <script>

      $("#website").click(function () {
        var status = "";
        if ($(this).is(":checked")) {
          var status = "1";
          $('#websiteButton').fadeIn();
        } else {
          var status = '0';
          $('#websiteButton').fadeOut();

        }
        url = "/createWebsite/" + status;

        $.ajax({
          url: url,
          method: "post",
          datatype: "json",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            'status': status
          },
          success: function (e) {
          }
        });

      });
    </script>

    <script>

      $("#emailcheck").blur(function () {
        {
          var email = $(this).val();
          var url = "/checkEmailExist/" + email;

          $.ajax({
            url: url,
            datatype: 'json',
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
              if (e.success == 2) {
                $('#checkemial').text("Already Exist Email");
                $('#checkemial').show();
              }
              if (e.success == 1) {
                $('#checkemial').hide();
              }

            }
          });
        }
      });


      $("#checkphoneexist").blur(function () {
        {
          var phone = $(this).val();
          var url = "/checkPhoneExist/" + phone;
          $.ajax({
            url: url,
            datatype: 'json',
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
              if (e.success == 2) {
                $('#checkphone').text("Already Exist Phone");
                $('#checkphone').show();
                $('.cannot').attr('disabled', true);
              }
              if (e.success == 1) {
                $('#checkphone').hide();
                $('.cannot').attr('disabled', false);
              }

            }
          });
        }

        $('.copy').bind("cut copy paste", function (e) {
          e.preventDefault();
        });
      });


    </script>
