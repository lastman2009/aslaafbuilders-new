<?php include './header.php'; ?>
<?php include './aside.php'; ?>

<!-- Row -->
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="tab-struct custom-tab-2 mt-40 web-basic-info">
					<div class="col-md-12 padding-left padding-right">
						<div class="form-wrap">
							<form action="#" class="form-horizontal">
								<div class="theme-selection agency-theme">
									<div class="col-md-12">
										<div class="form-group srch-id">

											<input class="inputid form-control" placeholder="Search you Theme" type="text">
											<a href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 theme-margin">
										<div class="theme-border activated-theme">
											<figure>
												<a href="#"><img class="img-responsive" src="dist/img/themeimg.jpg"></a>
												<figcaption>
													<h3>your activated theme</h3>

												</figcaption>
											</figure>
										</div>
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 theme-margin">
										<div class="theme-border to-active-theme">
											<figure>
												<a href="#"><img class="img-responsive" src="dist/img/themeimg1.jpg"></a>
												<figcaption>
													<h4><a class="sa-success" href="#">active now</a></h4>
												</figcaption>
											</figure>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 theme-margin">
										<div class="theme-border to-active-theme">
											<figure>
												<a href="#"><img class="img-responsive" src="dist/img/themeimg2.jpg"></a>
												<figcaption>
													<h4><a class="sa-success" href="#">active now</a></h4>
												</figcaption>
											</figure>
										</div>
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 theme-margin">
										<div class="theme-border to-active-theme">
											<figure>
												<a href="#"><img class="img-responsive" src="dist/img/themeimg.jpg"></a>
												<figcaption>
													<h4><a class="sa-success" href="#">active now</a></h4>
												</figcaption>
											</figure>
										</div>
									</div>


								</div>
							</form>
						</div>
					</div>

					<div class="col-md-12 agency-theme">
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">3</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">3</a>
							</li>
							<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Row -->

	<?php include './footer.php'; ?>

	<script>
		//Success Message

		$( '.sa-success' ).on( 'click', function ( e ) {
			swal( {
				title: "Default Theme is Activated",
				type: "success",
				text: "You can change the theme at any time according to your requirements.",
				confirmButtonColor: "#01c853",
				customClass: "myAlert",
			} );
			return false;
		} );
	</script>