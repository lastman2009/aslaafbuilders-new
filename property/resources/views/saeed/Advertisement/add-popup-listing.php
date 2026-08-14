<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search add-static">
                <div class="panel panel-default card-view admin-payment-sect">
                   
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
								<a class="add-static-btn" href="">Add New</a>
                                <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Static id</th>
                                                <th>Title</th>
                                                <th>Start Date</th>
												<th>End Date</th>
												<th>Images</th>
												<th>Positions</th>
												<th>Link</th>
												<th>Status</th>
												<th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
												<td>01</td>
												<td>Lorem ipsum dolor sit amet, </br>consectetur adipisicing elit ...</td>
												<td>24/8/2016</td>
												<td>24/8/2016</td>
												<td><img src="dist/img/property-list-img1.jpg" alt=""></td>
												<td>Home Page Top</br>Right Sidebar</td>
												<td>www.larawel.com</td>
												<td><div class="label label-table label-success new-label-style">Active</div></td>
												<td><div class="label label-table label-default new-label-style static-assign-default">Re-Assign</div></td>
                                            </tr>
											<tr>
												<td>02</td>
												<td>Lorem ipsum dolor sit amet, </br>consectetur adipisicing elit ...</td>
												<td>24/8/2016</td>
												<td>24/8/2016</td>
												<td><img src="dist/img/property-list-img2.jpg" alt=""></td>
												<td>Home Page Top</br>Right Sidebar</td>
												<td>www.larawel.com</td>
												<td><div class="label label-table label-danger new-label-style">Reject</div></td>
												<td><div class="label label-table label-success new-label-style static-assign-color">Re-Assign</div></td>
                                            </tr>
											<tr>
												<td>03</td>
												<td>Lorem ipsum dolor sit amet, </br>consectetur adipisicing elit ...</td>
												<td>24/8/2016</td>
												<td>24/8/2016</td>
												<td><img src="dist/img/property-list-img3.jpg" alt=""></td>
												<td>Home Page Top</br>Right Sidebar</td>
												<td>www.larawel.com</td>
												<td><div class="label label-table label-primary new-label-style">Pending</div></td>
												<td><div class="label label-table label-success new-label-style static-assign-color">Re-Assign</div></td>
                                            </tr>
											<tr>
												<td>04</td>
												<td>Lorem ipsum dolor sit amet, </br>consectetur adipisicing elit ...</td>
												<td>24/8/2016</td>
												<td>24/8/2016</td>
												<td><img src="dist/img/property-list-img4.jpg" alt=""></td>
												<td>Home Page Top</br>Right Sidebar</td>
												<td>www.larawel.com</td>
												<td><div class="label label-table label-danger new-label-style">Reject</div></td>
												<td><div class="label label-table label-success new-label-style static-assign-color">Re-Assign</div></td>
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
				$('#datable_property').DataTable();
			});
		</script>
        

