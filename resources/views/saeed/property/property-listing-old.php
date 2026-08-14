<?php include './header.php'; ?>
<?php include './aside.php'; ?>


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <!--<div class="tab-slider">
                        <div class="wrap">
                            <ul class="nav nav-tabs tab-property" id="menus">
                                <li class="active"><a href="#">For Sale</a></li>
                                <li><a href="#">For Rent</a></li>
                                <li><a href="#">Wanted</a></li>
                                <li><a href="#">Trashed</a></li>
                                <li><a href="#">Expired</a></li>
                                <li><a href="#">Saved</a></li>
                                <li><a href="#">Published</a></li>
                                <li><a href="#">Pending</a></li>
                                <li><a href="#">Rejected</a></li>
                                <li><a href="#">Favourite</a></li>
                            </ul>
                            <button id="goPrev" class="btn btn-default btn-icon"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button id="goNext" class="btn btn-default btn-icon"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>
                    </div>-->
                    <div class="tab-slider">
                        <ul id="owl_demo_2" class="owl-carousel owl-theme nav nav-tabs tab-property">
                            <li class="active"><a href="#">All Listing</a></li>
                            <li><a href="#">Active</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Saved</a></li>
                            <li><a href="#">Rejected</a></li>
                            <li><a href="#">Favourite</a></li>
                            <li><a href="#">Expired</a></li>
                            <li><a href="#">Trash</a></li>


                        </ul>
                    </div>


                </div>
            </div>
        </div>


        <div class="row">
            <!-- Responsive Table -->
            <div class="col-lg-12">
                <div class="panel panel-default card-view recent-add-class-padding">
                    <h6 class="panel-title recent-add-class txt-dark mt-40">Recently Added List</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
                                <div class="table-responsive">



                                    <table id="datable_property" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Images</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Purpose</th>
                                                <th>Price</th>
                                                <th>Listed Date</th>
                                                <th>Location</th>
                                                <th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>45</td>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img1.jpg" alt=""/></a></td>
                                                <td>Commercial</td>
                                                <td><div class="label label-table label-info new-label-style">Trash</div></td>
                                                <td>Sale</td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-info new-label-style">Lahore</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Block" ><i class="fa fa-hand-paper-o" aria-hidden="true"></i></a><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img2.jpg" alt=""/></a></td>
                                                <td>Residential</td>
                                                <td><div class="label label-table label-primary new-label-style">Block</div></td>
                                                <td>Rent</td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-primary new-label-style">Karachi</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Block" ><i class="fa fa-hand-paper-o" aria-hidden="true"></i></a><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>36</td>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img3.jpg" alt=""/></a></td>
                                                <td>Shops</td>
                                                <td><div class="label label-table label-success new-label-style">Active</div></td>
                                                <td>Wanted</td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-success new-label-style">Bangla</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Block" ><i class="fa fa-hand-paper-o" aria-hidden="true"></i></a><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>28</td>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img4.jpg" alt=""/></a></td>
                                                <td>Plots</td>
                                                <td><div class="label label-table label-warning new-label-style">In Active</div></td>
                                                <td>Sale</td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-warning new-label-style">Garden</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Block" ><i class="fa fa-hand-paper-o" aria-hidden="true"></i></a><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td><a href="javascript:void(0)"><img src="dist/img/property-list-img1.jpg" alt=""/></a></td>
                                                <td>House</td>
                                                <td><div class="label label-table label-danger new-label-style">Rejected</div></td>
                                                <td>Rent</td>
                                                <td>122,233,344</td>
                                                <td>24/08/2016</td>
                                                <td><div class="label label-table label-danger new-label-style">DHA Phase 4</div></td>
                                                <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Block" ><i class="fa fa-hand-paper-o" aria-hidden="true"></i></a><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="Edit" ><i class="zmdi zmdi-edit"></i></a> <a href="javascript:void(0)" class="pr-10" title="View" data-toggle="tooltip"><i class="zmdi zmdi-eye"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Responsive Table -->
        </div>
        <div class="row">
            <div class="page-nation">
                <ul class="pagination pagination-large">
                    <li><a href="#"><span>«</span></a></li>
                    <li><a href="#"><span>1</span></a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><span>»</span></a></li>

                </ul>
            </div>
        </div>



        <!-- /Row -->

        <?php include './footer.php'; ?>
        <script>
            $(document).ready(function () {
                $('#datable_property').DataTable({
                    "lengthMenu": false,
                    "paginate": false
                });
            });
        </script>

