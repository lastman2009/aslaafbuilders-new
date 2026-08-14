<?php include './header.php'; ?>
<?php include './aside.php'; ?>



<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                   
                    <div class="tab-content" id="profile_tabcontent">
                        <div id="dashboard_profile" class="tab-pane fade active in" role="tabpanel">
							<div class="col-md-12 padding-left padding-right">
                                <div class="form-wrap">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-body edit-profile-body form-edit addprofile">
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Title</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="Type title..." value="" placeholder="Type title...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="row">
                                                <div class="col-md-12 padding-left padding-right form-description">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Description</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <textarea class="form-control textarea_editor textarea-profile" placeholder="Type description here!" style="height:234px !important"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											<div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Start Date</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="Type start date" value="" placeholder="Type start date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">End Date</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                            <input type="text" class="form-control" name="Type start date" value="" placeholder="Type start date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row time-period">
                                                <div class="col-md-12 padding-left padding-right">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-12">Priority</label>
                                                        <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                             <div class="dropdown priority">
															  <button class="dropdown-toggle" type="button" data-toggle="dropdown">Normal
															  <span class="caret"></span></button>
															  <ul class="dropdown-menu">
															    <li><a href="#">HTML</a></li>
															    <li><a href="#">CSS</a></li>
															    <li><a href="#">JavaScript</a></li>
															  </ul>
															</div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
											<!-- time-period -->
										<div class="form-actions edit-form-submit">
                                            <div class="panel panel-default card-view profile-Image-tab">
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body profile-role">
													<div class="input-group browseImg">
											             <div class="form-group">
													        <img src="dist/img/selcetimg.jpg">
													            <span class="input-group-btn">
													                <span class="btn btn-default btn-file">
													                    Select Images <input type="file" id="imgInp">
													                </span>
													            </span>
													           
													        </div>
													        <img id='img-upload'/>
													    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn portfolio-btn">Add Portfolio</button>

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


<?php include './footer.php'; ?>

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
