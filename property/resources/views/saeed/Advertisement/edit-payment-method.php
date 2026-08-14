<?php include './header.php'; ?>
<?php include './aside.php'; ?>

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        
		<div class="row">
            <div class="col-lg-12 col-sm-12 mt-50 edit-payment-padding">
				<div class="col-md-12 col-sm-12">
					<div class="panel panel-default card-view add-staff-portion">
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<ul>
									<li><span class="lable">Balance Amount: </span><span class="value">540,000,0</span></li>
									<li><span class="lable">User Phone Number: </span><span class="value">123456789</span></li>
									<li><span class="lable">User Email Address: </span><span class="value">atif@gmail.com</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-30 edit-payment-method">
                    <div class="col-md-12 padding-left padding-right">
                        <div class="form-wrap">
                            <form action="#" class="form-horizontal ">
                                <div class="col-lg-12 form-body edit-profile-body form-edit">
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Account Name</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="Techinc" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">User ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" name="" value="105" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Support ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="25" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Support Name</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" name="" value="M. Waleed" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Property ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="1075" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Payment Method</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <select class="selectpicker" title="---- Select Payment Method ----" id="payment-dropdown" data-style="form-control btn-default btn-outline">
														<option value="cash">Cash</option>
														<option value="deposit">Deposit</option>
														<option value="cheque">Bank cheque</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row cash box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Transaction ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="" placeholder="Enter Transaction ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row deposit box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Recipt Number</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="" placeholder="Enter Recipt Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row cheque box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Cheque Number</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="" placeholder="Enter Cheque Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Packages</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <select class="selectpicker" title="---- Select Package ----" data-style="form-control btn-default btn-outline">
														<option>Standard</option>
														<option>Business</option>
														<option>Premium</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Packages Amount</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="" placeholder="Enter Package Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Discount Offer</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <select class="selectpicker" title="---- Select Discount Offer ----" id="discount-dropdown" data-style="form-control btn-default btn-outline">
														<option>No Offer</option>
														<option>1 Offer</option>
														<option>2 Offer</option>
														<option value="personal-discount">Personal Offer</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row personal-discount box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Reference Name</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="" placeholder="Enter Reference Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group mrbtm-zero">
                                                <label class="control-label col-md-3 col-sm-12">Discount Amount</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" name="" value="" placeholder="Enter Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-lg-12 col-md-12 col-sm-12 padding-left">
                                            <button class="btn btn-submit-webinfo btn-anim"><i class="fa fa-paper-plane"></i><span class="btn-text">Update</span></button>
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




    <?php include './footer.php'; ?>
	<script type="text/javascript">
	
		jQuery(function () {
			$("select").change(function () {
				$(this).find("option:selected").each(function () {
					window.onunload = unloadPage;
					function unloadPage(){
						$('#payment-dropdown').find('option:first').attr('selected', 'selected');
					}
					if ($(this).attr("value") == "cash") {
						$(".box").not(".cash").hide();
						$(".cash").fadeIn(1000);
					}
					if ($(this).attr("value") == "deposit") {
						$(".box").not(".deposit").hide();
						$(".deposit").fadeIn(1000);
					}
					if ($(this).attr("value") == "cheque") {
						$(".box").not(".cheque").hide();
						$(".cheque").fadeIn(1000);
					}
					
					
					function unloadPage(){
						$('#discount-dropdown').find('option:first').attr('selected', 'selected');
					}
					if ($(this).attr("value") == "personal-discount") {
						$(".box").not(".personal-discount").hide();
						$(".personal-discount").fadeIn(1000);
					}
					
				});
			});
		});		
	
	
	</script>

