<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search admin-payment">
                <div class="panel panel-default card-view admin-payment-sect">
                    <h6 class="panel-title inventory-add-class client-list-heading admin-payment-heading txt-dark">Admin Payment Detail.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Account</br >Name</th>
                                                <th>User</br >id</th>
                                                <th>Sup</br >id</th>
                                                <th>Support</br >Name</th>
                                                <th>Propt</br >id</th>
                                                <th>Payment</br >Method</th>
                                                <th>Deposit</th>
												<th>Package</th>
												<th>Package</br >price</th>
												<th>Discount</th>
												<th>Discount</br >price</th>
												<th>Reference</th>
												<th>Balance</th>
												<th class="total-amount">Total</br >Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ali</td>
												<td>01</td>
												<td>01</td>
												<td>Gulam Ali</td>
												<td>556</td>
                                                <td><div class="label label-table label-success new-label-style">Recipt 556</div></td>
                                                <td>5.5 Lakh</td>
                                                <td>Standard</td>
												<td>Rs. 4000</td>
												<td>1 Offer</td>
												<td>1K</td>
												<td>Owner</td>
												<td>10 Lakh</td>
                                                <td><div class="label label-table label-success new-label-style">5.5 Lakh</div></td>
                                            </tr>
											<tr>
                                                <td>Ali</td>
												<td>02</td>
												<td>02</td>
												<td>Abbas</td>
												<td>055</td>
                                                <td><div class="label label-table label-danger new-label-style">Credit Card</div></td>
                                                <td>4 Crore</td>
                                                <td>Business</td>
												<td>Rs. 6500</td>
												<td>2 Offer</td>
												<td>2400</td>
												<td>CEO</td>
												<td>10 Lakh</td>
                                                <td><div class="label label-table label-success new-label-style">4 Crore</div></td>
                                            </tr>
											<tr>
                                                <td>Ali</td>
												<td>03</td>
												<td>03</td>
												<td>Malik Riaz</td>
												<td>043</td>
                                                <td><div class="label label-table label-primary new-label-style">Deposit</div></td>
                                                <td>99 Lakh</td>
                                                <td>Premium</td>
												<td>Rs. 8500</td>
												<td>3 Offer</td>
												<td>22K</td>
												<td>Ali Manager</td>
												<td>10 Lakh</td>
                                                <td><div class="label label-table label-success new-label-style">99 Lakh</div></td>
                                            </tr>
											<tr>
                                                <td>Ali</td>
												<td>04</td>
												<td>04</td>
												<td>Shahzad Ali</td>
												<td>054</td>
                                                <td><div class="label label-table label-danger new-label-style">Credit Card</div></td>
                                                <td>9.6 Crore</td>
                                                <td>Business</td>
												<td>Rs. 6500</td>
												<td>4 Offer</td>
												<td>5500</td>
												<td>Shahzad</td>
												<td>10 Lakh</td>
                                                <td><div class="label label-table label-success new-label-style">9.6 Crore</div></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
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
				$('#datable_property').DataTable({});
			});
		</script>
        

