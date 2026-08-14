@include('includes.header')

<!-- banner-wraper starts -->
<div class="banner-wraper">

	<!-- slider ends -->
	<div class="banner-cover">
		<div class="container">
			<div class="row">
				<div class="banner-contents banner-contact col-md-12">
					<div class="col-md-12 features">
						<div class="feature-heading">
							<h2><img src="assets/images/home-icon-contact.png">HELP <span>CENTER</span></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- slider ends --> 
<!-- Main Starts -->
<main class="main-section">

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="col-md-12 col-sm-12 col-xs-12 faqs" style="margin-top: 60px">
						<h2>Frequently Asked Questions</h2>
						<div class="panel-group wrap" id="bs-collapse">
							@foreach($faqs as $faq)
							<div class="faqspanel">
								<div class="faqspanel-heading">
									<h4 class="panel-title">
                      					<a data-toggle="collapse" data-parent="#bs-collapse" href="#one_{{$faq->id}}">
                        					{{$faq->title}}
                      					</a>
                    				</h4>
								</div>
								<div id="one_{{$faq->id}}" class="panel-collapse collapse">
									<div class="panel-body">
									{{$faq->description}}

									</div>
								</div>
							</div>
							@endforeach
				<!-- end of panel -->
						</div>
						<!-- end of #bs-collapse  -->	
						

					</div>


				</div>
			</div>
		</div>
	</section>



</main>
<!-- wraper ends -->
@include('includes.footer')

<script type="text/javascript">
	$( document ).ready( function () {
		$( '.collapse.in' ).prev( '.faqspanel-heading' ).addClass( 'active' );
		$( '#accordion, #bs-collapse' )
			.on( 'show.bs.collapse', function ( a ) {
				$( a.target ).prev( '.faqspanel-heading' ).addClass( 'active' );
			} )
			.on( 'hide.bs.collapse', function ( a ) {
				$( a.target ).prev( '.faqspanel-heading' ).removeClass( 'active' );
			} );
	} );
</script>