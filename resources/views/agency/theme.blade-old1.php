@php
	$title = "Select Theme";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="tab-struct custom-tab-2 mt-40 web-basic-info">
					<div class="col-md-12 padding-left padding-right">
						<div class="form-wrap">
							<form action="javascript:void(0)" class="form-horizontal">
								<div class="theme-selection agency-theme">
									<div class="col-md-12">
										<div class="form-group srch-id mb-30">

											<input class="inputid form-control" placeholder="Search you Theme" type="text">
											<a href="javascript:void(0)" class="btn btn-search"><i class="fa fa-search"></i></a>
										</div>
									</div>
									<div class="col-md-12 padding-left padding-right">

										@if(!isset($_GET['page']) || $_GET['page'] == 1)
											@if(!empty($activated_theme))
                                                <?php
                                                $activeName = $activated_theme->name;
                                                $activeName = str_replace("-", " ", $activeName)
                                                ?>
												<div class="col-md-12">
													<h3 class="theme-name">{{$activeName}} <span class="pull-right btn btn-info">Your Activated Theme</span></h3>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-12 theme-margin" style="padding-right: 2.5px">
													<div class="panel panel-default card-view" style="padding:0">
														<div class="activated-theme">
															<figure>
																<a><img class="img-responsive" src="/unzips/{{$activated_theme->name}}/thumbnail.jpg"></a>
															</figure>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-12 theme-margin" style="padding-left: 2.5px">
													<div class="theme-desc panel panel-default card-view">
														<div class="panel-heading">
															<div class="pull-left">
																<h4 class="panel-title txt-dark chart_heading">Theme Description</h4>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<div class="nicescroll-bar theme-desc-content">
                                                                    <?php
                                                                    $desc = new DOMDocument();
                                                                    $desc->loadHTML($activated_theme->description);
                                                                    echo $desc->saveHTML();
                                                                    ?>

																</div>

															</div>
														</div>
													</div>
												</div>
											@endif
										@endif
									</div>
									<hr>
									@foreach($themes as $theme)
										@if($theme->id != $activated_theme->id)
                                            <?php
                                            $deactivatedName = $theme->name;
                                            $deactivatedName = str_replace("-", " ", $deactivatedName)
                                            ?>
											<div class="col-md-6 col-sm-6 col-xs-12 theme-margin">
												<h3 class="theme-name">{{$deactivatedName}}</h3>
												<div class="theme-border to-active-theme">
													<figure>
														<a href="javascript:void(0)"><img class="img-responsive" src="/unzips/{{$theme->name}}/thumbnail.jpg"></a>
														<figcaption>
															<h4><a href="javascript:void(0)" class="sa-success" data-id="{{$theme->id}}"  >active now</a></h4>
															@if(Auth::user()->role_id ==1)
															<a class="del-theme" href="/deleteTheme/{{$theme->id}}">&#10006</a>
															@endif
														</figcaption>
													</figure>
												</div>
											</div>
										@endif
									@endforeach


								</div>
							</form>
						</div>
					</div>

					<div class="col-md-12 agency-theme">
						<ul class="pagination">
							<!-- <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
							</li> -->
							{{ $themes->links() }}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Row -->

	@include( 'includes_admin.footer' )
	<script>
		var customHeight = $('.activated-theme').height();
		$('.agency-theme .theme-desc').css('height', customHeight+2.5);
		$('.card-view.panel .panel-body').css('height', customHeight-105);
	</script>
	<script>
        //Success Message
        //        $('.sa-success').on('click',function(e){
        //            swal({
        //                title: "Default Theme is Activated",
        //                type: "success",
        //                text: "You can change the theme at any time according to your requirements.",
        //                confirmButtonColor: "#01c853",
        //                customClass: "myAlert",
        //            });
        //            return false;
        //        });
        $( '.sa-success' ).on( 'click', function ( e ) {
            id =$(this).data('id');

            $.ajax({
                url: 'activateTheme/'+id,
                type: 'POST',
                datatype: 'html',
                headers: {
                    'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                success: function (json) {
                    //alert(id);
                    swal( {
                        title: "New Theme Activated",
                        type: "success",
                        text: "Plaase Wait For Your Theme Activation ",
                        confirmButtonColor: "#01c853",
                        customClass: "myAlert",
                    });
                    $('.sa-confirm-button-container .confirm').on( 'click', function ( e ) {
                        //alert('hello');
                        window.location.reload();
                    });
                    //return false;
                }
            });
//		   window.location.reload();
        });

	</script>
	<!-- <script>
 // 	$(document).on("click", "..sa-success", function() {
	// 	id =$(this).data('id');

	// 	 $.ajax( {
 //          url: 'activateTheme/'+id,
 //          type: 'POST',
 //          datatype: 'html',
 //          headers: {
 //            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
 //          },
 //          success: function ( json ) {

 //          }
 //        } );

	// });
	</script> -->