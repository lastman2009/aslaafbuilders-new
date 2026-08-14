@php
$title = "Client Trash";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search client-list">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class client-list-heading txt-dark">Client Trash List</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30" >
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Controls</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->id}}</td>
                                                <td><div class="label label-table label-primary new-label-style">{{$client->name}}</div></td>
                                                <td>{{$client->mobile_no}}{{--</br >03314537789</br >03314537789--}}</td>
                                                <td>{{$client->address}}</td>
                                                <td>
                                                    <?php

                                                    $status_class = 'label-success';
                                                    $status_text = 'Restore';

                                                    ?>
                                                    <a href="clientStatusChange/{{$client->id}}/{{$client->status}}" class="text-inverse"><span
                                                                class="label <?php echo $status_class; ?>"><?php echo $status_text; ?></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{--<tr>
                                            <td>02</td>
                                            <td>02</td>
                                            <td><div class="label label-table label-primary new-label-style">Kouhram</div></td>
                                            <td>03314537789</br >03314537789</br >03314537789</td>
                                            <td>DHA Phase 4 FF Block Lahore</td>
                                            <td>atif502@gmail.com</td>
                                            <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>03</td>
                                            <td><div class="label label-table label-success new-label-style">Nauman</div></td>
                                            <td>03314537789</br >03314537789</br >03314537789</td>
                                            <td>DHA Phase 4 FF Block Lahore</td>
                                            <td>atif502@gmail.com</td>
                                            <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>04</td>
                                            <td><div class="label label-table label-warning new-label-style">Zain Mukhtar</div></td>
                                            <td>03314537789</br >03314537789</br >03314537789</td>
                                            <td>DHA Phase 4 FF Block Lahore</td>
                                            <td>atif502@gmail.com</td>
                                            <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>05</td>
                                            <td><div class="label label-table label-danger new-label-style">Syed Ali Naqvi</div></td>
                                            <td>03314537789</br >03314537789</br >03314537789</td>
                                            <td>DHA Phase 4 FF Block Lahore</td>
                                            <td>atif502@gmail.com</td>
                                            <td><a href="javascript:void(0)" class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascript:void(0)" class="text-inverse" title="Favourite" data-toggle="tooltip"><i class="fa fa-heart" aria-hidden="true"></i></a></td>
                                        </tr>--}}
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

        @include( 'includes_admin.footer' )
        <script>
            $(document).ready(function () {
                $('#datable_property').DataTable({});
            });
        </script>


