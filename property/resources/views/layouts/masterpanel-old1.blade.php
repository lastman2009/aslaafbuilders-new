@php
$title = "Project Dashboard";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<style type="text/css">
    .panel-achor a{
        text-align: center;
        display: block;
        width: 200px;
        margin: 0 auto;
        border: 1px solid #454545;
        padding: 15px 0;
        font-size: 16px;
    }
    .panel-achor a:hover{
        border: 1px solid #fff;
    }
</style>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-35 main_container">
        <!-- Row -->

        <!--<div class="row">
            <div class="page-title-heading">
                <h3>Dashboard</h3>
            </div>
        </div>-->

        <div class="row top-panelbox" style="margin-right: -10px; margin-left: -10px;">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-red">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{$statuses->active}}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">Active Properties</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="assets_admin/dist/img/telescope.png" alt="" />
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-green">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{$statuses->pending}}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">Pending Properties</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="assets_admin/dist/img/heart.png" alt="" />
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-yellow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{$no_of_total_featured_properties->total_featured_properties}}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">Featured Properties</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="assets_admin/dist/img/wanted-list.png" alt="" />
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-blue">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-7 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span class="counter-anim">{{$statuses->all_properties}}</span></span>
                                            <span class="weight-500 uppercase-font txt-light block font-15">All Properties</span>
                                        </div>
                                        <div class="col-xs-5 text-center  pl-0 pr-0 data-wrap-right">
                                            <img class="top-color-icon" src="assets_admin/dist/img/home.png" alt="" />
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

         <div class="row panel-downbox">
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">    
                            <div class="col-lg-4 col-md-6 col-xs-12 border-panel">
                                <div class="panel-boxes panel-achor">
                                    <a href="/dashboard/inventory/search" class="btn btn-primary btn-outline fancy-button btn-0">
                                        Inventory Search
                                    </a>
                                </div>  
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 border-panel">
                                <div class="panel-boxes panel-achor">
                                    <a href="/dashboard/vendor/search" class="btn btn-success btn-outline fancy-button btn-0">
                                        Vendor Search
                                    </a>
                                </div>  
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 ">
                                <div class="panel-boxes panel-achor">
                                    <a href="/dashboard/architecture/search" class="btn btn-warning btn-outline fancy-button btn-0">
                                        Architecture Search
                                    </a>
                                </div>  
                            </div>
{{--                             <div class="col-lg-3 col-md-6 col-xs-12">
                                <div class="panel-boxes panel-achor">
                                    <a href="" class="btn btn-danger btn-outline fancy-button btn-0">
                                       Agent Search
                                    </a>
                                </div>  
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h4 class="panel-title txt-dark chart_heading">Properties Overview</h4>
                        </div>


                        <div  class="tab-struct custom-tab-1 pull-right">
                            <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                                <li class="active" role="presentation">
                                    <a aria-expanded="true"  data-toggle="tab" role="tab" href="#property_view_tab">Property View</a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="tab-content" id="myTabContent_7">
                                <div  id="property_view_tab" class="tab-pane fade active in" role="tabpanel">
                                    <div id="morris_area_chart" class="morris-chart"></div>
                                </div>
                                <div  id="phone_view_tab" class="tab-pane fade" role="tabpanel">
                                    Area 2
                                </div>
                                <div  id="ctr_tab" class="tab-pane fade" role="tabpanel">
                                    Area 3
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row panel-topbox" style="margin-right: -10px; margin-left: -10px;">
            
            <div class="col-lg-3 col-md-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view sm-data-box-3">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body panel-box">
                            <a href="@if(Auth::user()->role_id == 1)
                                        /dashboard/admin/users
                                        @else
                                        /agencies
                                        @endif">
                                <div class="panel-dashboard text-center">
                                    <figure>
                                        <img src="assets_admin/dist/img/total-user.png" alt="total-user" />
                                    </figure>
                                    <h2 class="col-blue">
                                        @if(Auth::user()->role_id == 1)
                                        {{$no_of_total_users->total_user}}
                                        @else
                                        {{$no_of_total_agents->total_agents}}
                                        @endif
                                    </h2>
                                    <p>Registered 
                                        @if(Auth::user()->role_id == 1)
                                        Users
                                        @else
                                        Agents
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view sm-data-box-3">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body panel-box">
                            <a href="/architects">
                                <div class="panel-dashboard text-center">
                                    <figure>
                                        <img src="assets_admin/dist/img/total-architecture.png" alt="total-architecture" />
                                    </figure>
                                    <h2 class="col-red">{{$no_of_total_architects}}</h2>
                                    <p>Registered Architectures</p>
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view sm-data-box-3">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body panel-box">
                            <a href="/vendors">
                                <div class="panel-dashboard text-center">
                                    <figure>
                                        <img src="assets_admin/dist/img/total-vendor.png" alt="total-vendor" />
                                    </figure>
                                    <h2 class="col-green">{{$no_of_total_vendor}}</h2>
                                    <p>Registered Vendors</p>
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12 padding-left-right">
                <div class="panel panel-default card-view sm-data-box-3">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body panel-box">
                            <a href="/dashboard/themes">
                                <div class="panel-dashboard text-center">
                                    <figure>
                                        <img src="assets_admin/dist/img/total-theme.png" alt="total-theme" />
                                    </figure>
                                    <h2 class="col-yellow">{{$no_of_total_themes->total_themes}}</h2>
                                    <p>Total Themes</p>
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-6 pr-right">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark chart_heading">Monthly View</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                             <div id="morris_bar_chart" class="morris-chart"></div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-lg-6 pl-left">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark chart_heading">Properties Chart</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body flot-css">
                            <div class="flot-container flot_chart">
                                <div id="flot_pie_chart" class="demo-placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        
        <div class="row panel-downbox">
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">    
                            <div class="col-lg-3 col-md-6 col-xs-12 padding-left">
                                <div class="panel-boxes">
                                    <a href="/dashboard/message">
                                        <div class="panel-dashboard border-panel text-center">
                                            <figure>
                                                <img src="assets_admin/dist/img/total-sms.png" alt="total-sms" />
                                            </figure>
                                            <h2 class="col-blue">{{$unread_msg->unread_msg}}</h2>
                                            <p>Unread Messages</p>
                                        </div>
                                    </a>
                                </div>  
                            </div>
                            <div class="col-lg-3 col-md-6 col-xs-12 padding-left">
                                <div class="panel-boxes">
                                    <a href="">
                                        <div class="panel-dashboard border-panel text-center">
                                            <figure>
                                                <img src="assets_admin/dist/img/total-website.png" alt="total-website" />
                                            </figure>
                                            <h2 class="col-red">
                                                @if(Auth::user()->role_id == 1)
                                                {{$no_of_active_website->active_website}}
                                                </h2>
                                                <p>Active Websites</p>
                                                @else
                                                {{$no_of_user_property_views->all_user_property_views}}
                                                </h2>
                                                <p>Total Property Views</p>
                                                @endif
                                        </div>
                                    </a>
                                </div>  
                            </div>
                            <div class="col-lg-3 col-md-6 col-xs-12 padding-left">
                                <div class="panel-boxes">
                                    <a href="@if(Auth::user()->role_id == 1)
                                        /blogs
                                        @else
                                        /blog
                                        @endif">
                                        <div class="panel-dashboard border-panel text-center">
                                            <figure>
                                                <img src="assets_admin/dist/img/total-blog.png" alt="total-blog" />
                                            </figure>
                                            <h2 class="col-green">{{$no_of_active_blogs->active_blogs}}</h2>
                                            <p>Active Blog Posts</p>
                                        </div>
                                    </a>
                                </div>  
                            </div>
                            <div class="col-lg-3 col-md-6 col-xs-12 padding-left">
                                <div class="panel-boxes">
                                    <a href="@if(Auth::user()->role_id == 1)
                                        /dashboard/admin/websiteRequestList
                                        @else
                                        /dashboard/user/search/history
                                        @endif">
                                        <div class="panel-dashboard border-panel last-border-panel text-center">
                                            <figure>
                                                <img src="assets_admin/dist/img/total-request.png" alt="total-request" />
                                            </figure>
                                            <h2 class="col-yellow">
                                                @if(Auth::user()->role_id == 1)
                                                {{$no_of_new_website_request->new_website_request}}
                                                </h2>
                                                <p>Total Web Requests</p>
                                                
                                                @else
                                                {{$no_of_searches->total_search}}
                                                </h2>
                                                <p>Total Searches</p>
                                                @endif
                                        </div>
                                    </a>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        

        <div class="row">
            <!-- Responsive Table -->
            <div class="col-lg-12">
                <div class="panel panel-default card-view recent-add-class-padding">
                    <h6 class="panel-title recent-add-class txt-dark mt-40">Recently Added List</h6>
                    <a href="@if(Auth::user()->role_id == 1)/dashboard/admin/property/pending @else /dashboard/property/pending @endif" class="btn btn-success" style="float: right;margin-top: -30px;">View More</span></a>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">    
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Listed Date</th>
                                                <th>Location</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($properties as $property)
                                            <tr>
                                                <td><a href="javascript:void(0)">{{$property->id}}</a></td>
                                                <td><div class="label label-table" style="font-size: 13px;">{{strtoupper(App\Property::getPurpose($property->purpose))}}</div></td>
                                                <td><div class="label label-table label-info new-label-style">Pending</div></td>
                                                <td>{{$property->price}}</td>
                                                <td>{{date('Y-m-d' , strtotime($property->created_at))}}</td>
                                                
                                                <td><div class="label label-table label-primary new-label-style">{{$property->address}}</div></td>
                                                
                                            </tr>
                                            @endforeach
                                           
                                           
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

        <!-- Row -->
    </div>
    @include('includes_admin.footer')
<script>
    $(function() {
    "use strict";
    
    if($('#morris_area_chart').length > 0)
        // Area Chart
        Morris.Area({
            element: 'morris_area_chart',
            data: [
            <?php $i = 1; ?>
            @if(!$property_views->isEmpty())
            @foreach($property_views as $views)
                {
                    period: '{{date('Y-m-d', strtotime($views->created_at))}}',
                    iphone: {{$views->views}}     
                }
                <?php
                    if((count($property_views)) != $i){ 
                        echo ",";
                    }
                    $i++;
                ?>
            @endforeach
            @else
            {
                period: "<?php echo date('Y-m-d'); ?>",
                iphone: 0
            }
            @endif
            ],
            xkey: 'period',
            ykeys: ['iphone'],
            labels: ['Property View'],
            pointSize: 0,
            pointStrokeColors:['#1b88ea'],
            behaveLikeLine: true,
            gridLineColor: '#878787',
            lineWidth: 0,
            smooth: true,
            hideHover: 'auto',
            lineColors: ['#1b88ea'],
            resize: true,
            gridTextColor:'#878787',
            gridTextFamily:"Roboto",
        });

        if($('#morris_bar_chart').length > 0)
       // Bar Chart
        Morris.Bar({
            element: 'morris_bar_chart',
            data: [
            <?php $i = 0; ?>
            @if(!$property_monthly_views->isEmpty())
            @foreach($property_monthly_views as $views)
                {
                    device: '{{date('M', strtotime($views->created_at))}}',
                    geekbench: {{$views->views}}     
                }
                <?php
                    if((count($property_views)) != $i){ 
                        echo ",";
                    }
                    $i++;
                ?>
            @endforeach
            @else
            {
                device: "<?php echo date('M'); ?>",
                geekbench: 0     
            }

            @endif
            ],
            xkey: 'device',
            ykeys: ['geekbench'],
            labels: ['Geekbench'],
            barRatio: 0.4,
            xLabelAngle: 35,
            pointSize: 1,
            pointStrokeColors:['#fec107'],
            behaveLikeLine: true,
            gridLineColor: '#878787',
            gridTextColor:'#878787',
            hideHover: 'auto',
            barColors: ['#fec107'],
            resize: true,
            gridTextFamily:"Roboto"
        });

            if( $('#flot_pie_chart').length > 0 ){
        var pie_data = [{
            label: "Pending Properties",
            data: {{$statuses->pending}},
            color: "#01c853",
            
        }, {
            label: "Active Properties",
            data: {{$statuses->active}},
            color: "#e91e63",
        },  {
            label: "Trash Properties",
            data: {{$statuses->trash}},
            color:"#ff2a00",
        }];

        var pie_op = {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true,
                    stroke: {
                        width: 0,
                    }
                }
            },
            legend : {
                backgroundColor: 'transparent',
            },
            grid: {
                hoverable: true
            },
            color: null,
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            },
        };
        $.plot($("#flot_pie_chart"), pie_data, pie_op);
    }

    });
</script>
