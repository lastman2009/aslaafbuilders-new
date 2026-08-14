@php
$title = "Approved Static Property Add Payment Method";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )
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
                                @if(empty($account))
                                <li><span class="lable">Balance Amount: </span><span class="value">0</span></li>
                                @else 
                                <li><span class="lable">Balance Amount: </span><span class="value">{{$account->total_balance}}</span></li>
                                @endif
									
									<li><span class="lable">User Phone Number: </span><span class="value">{{$users->mobile}}</span></li>
									<li><span class="lable">User Email Address: </span><span class="value">{{$users->email}}</span></li>
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
                            <form action="/saveStaticAccountDetail/{{$staticAd->id}}" class="form-horizontal ">
                            {{ csrf_field() }}
                                <div class="col-lg-12 form-body edit-profile-body form-edit">
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Account Name</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="{{$users->first_name}} {{$users->last_name}} " disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     @if(empty($account))
                                    <input type="hidden" name="pervious_balance" value="0">
                                     @else
                                     <input type="hidden" name="pervious_balance" value="{{$account->total_balance}}">
                                    @endif 
                                    
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">User ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" name="user_id" value="{{$users->id}}" disabled>
                                                    <input type="hidden" name="u_id" value="{{$users->id}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Support ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="" value="25" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Support Name</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" name="" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Static Ad ID</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="property_id" value="{{$staticAd->id}}" disabled>

                                                    <input type="hidden" name="staticAd_id" value="{{$staticAd->id}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Payment Method</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <select class="selectpicker" title="---- Select Payment Method ----" id="payment-dropdown" name="payment_method" data-style="form-control btn-default btn-outline">
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
                                                    <input type="text" class="form-control" name="transaction_id" value="" placeholder="Enter Transaction ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row deposit box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Recipt Number</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="recipt_no" value="" placeholder="Enter Recipt Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row cheque box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Cheque Number</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control" name="cheque_no" value="" placeholder="Enter Cheque Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Packages</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <select class="selectpicker" id="pkg" data-url="/getPackagedetail/" title="---- Select Package ----" name="package_id" data-style="form-control btn-default btn-outline">
														<?php 
                                                            $selected = "";
                                                             ?>
                                                            @foreach($packages as $package)

                                                            @if($staticAd->package_id == $package->id)
                                                            <?php 
                                                            $selected = "selected"; 
                                                            ?>
                                                            
                                                            <option value="{{$package->id}}" <?php echo $selected; ?>>{{$package->name}}</option>
                                                            @else
                                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                                            @endif
                                                            @endforeach
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
                                                    <input type="text" class="form-control" id="pkg_price" name="package_price" value="{{$staticAd->price}}" placeholder="Enter Package Amount">

                                                     @foreach($packages as $package)
                                                     @if($staticAd->package_id == $package->id)
                                                    <input type="hidden" name="duration" id="duration" value="{{$package->duration}}">
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Discount Offer</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <select class="selectpicker" title="---- Select Discount Offer ----" id="discount-dropdown" data-url="/getdiscountdetail/" name="discount_offer_id" data-style="form-control btn-default btn-outline">
														<option value="no-offer">No Offer</option>
                                                         @foreach($discountOffers as $discountOffer)
                                                        <option data-id="one" value="{{$discountOffer->id}}">{{$discountOffer->name}}</option>
                                                            @endforeach
														
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
                                                    <input type="text" class="form-control" name="refrence_name" value="" placeholder="Enter Reference Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row discount-amount box" style="display:none">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-12">Discount Amount</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" id="percent_price" name="discount_amount" value="" placeholder="Enter Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group mrbtm-zero">
                                                <label class="control-label col-md-3 col-sm-12">Total Amount</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" id="total_amount" name="total_amount" value="{{$staticAd->price}}" placeholder="Your Total Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-lg-12 mt-20 form-body edit-profile-body form-edit">
                                    <div class="row">
                                        <div class="col-md-12 padding-left padding-right">
                                            <div class="form-group mrbtm-zero">
                                                <label class="control-label col-md-3 col-sm-12">Recieved Amount</label>
                                                <div class="col-md-9 col-sm-12 padding-right padding-left">
                                                    <input type="text" class="form-control specific-bg" id="recieved_amount" name="recieved_amount" value="" placeholder="Your Recieved Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 padding-right">
                                        <div class="col-lg-12 col-md-12 col-sm-12 padding-left">
                                            <button type="submit" class="btn btn-submit-webinfo btn-anim"><i class="fa fa-paper-plane"></i><span class="btn-text">Update</span></button>
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
                        $(".discount-amount").show();
					}
                    if ($(this).attr("value") == "no-offer") {
                        $(".personal-discount").hide();
                        $(".discount-amount").hide();
                    }
                    if ($(this).attr("data-id") == "one") {
                        $(".personal-discount").hide();
                        $(".discount-amount").show();
                    }
                    if ($(this).attr("data-id") == "two") {
                        $(".personal-discount").hide();
                        $(".discount-amount").show();
                    }
					
				});
			});
		});		






	</script>

    <script type="text/javascript">
     
     $(document).ready(function(){


       $('#pkg').change(function()
        {
            var id =this.value;
            var url = $(this).data('url')+id;
            $.ajax({
                url:url,
                datatype: 'json',
                method: 'POST',
                headers: {
                            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                success: function ( e ) {
                    var obj = e.success;
                    var name =obj.package_name;
                    var category =obj.category_name;
                    var page =obj.page_name;
                    var position =obj.position_name;
                    var duration =obj.duration;
                    var price =obj.price;
                    
                    $('#duration').val(duration);
                    $('#price').html(price);
                    $('#pkg_price').val(price);

                  }
                });

         });


        $('#discount-dropdown').change(function()
        {
            var id =this.value;
            var url = $(this).data('url')+id;
            $.ajax({
                url:url,
                datatype: 'json',
                method: 'POST',
                headers: {
                            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                success: function ( e ) {
                    var obj = e.success;
                    var name =obj.name;
                    var percent_price =obj.percent_price;

                    var package_price=$('#pkg_price').val();
                    var afterdis=(percent_price/100*package_price);

                    
        
                    $('#percent_price').val(afterdis);

                    var total=(package_price-afterdis);
                    $('#total_amount').val(total);

                  }
                });

         });
        $('#percent_price').blur(function(){

           var refDisount=$('#percent_price').val();
           var pkg_price=$('#pkg_price').val();
           var total_prise=(pkg_price-refDisount);
                    $('#total_amount').val(total_prise);

        });




   });
 </script>


