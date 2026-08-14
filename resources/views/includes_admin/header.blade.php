<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <!--   <title>Admin Dashboard</title> -->
       <title>%TITLE%</title>
       	<link href="/image/fav.jpg" rel="icon" type="image/x-icon" />

       <link href="/image/fav.jpg" rel="icon" type="image/x-icon" />

        <meta name="description" content="Online Property Portal User Dashboard" />
        <meta name="keywords" content="" keyword="%META%"/>
        <meta name="author" content=""/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
      
        <!-- Morris Charts CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Data table CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets_admin/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap toaster CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap toaster CSS -->
        <link href="{{asset('assets_admin/dist/css/fancy-buttons.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap TextEditor CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- bootstrap-tagsinput CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- Bootstrap Colorpicker CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- Bootstrap Datetimepicker CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- Bootstrap Daterangepicker CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- fileinput New Plugin CSS -->
        <link href="{{asset('assets_admin/vendors/fileinput/css/fileinput.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets_admin/vendors/fileinput/themes/explorer/theme.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- Jasny-bootstrap CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- Owl carousel CSS -->
        <link href="{{asset('assets_admin/dist/css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets_admin/dist/css/owl.transitions.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- multi-select CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css"/>
		
		<!-- Summernote css -->
		<link href="{{asset('assets_admin/vendors/bower_components/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css"/>

		<!-- bootstrap-select CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
    
       	<!-- JQuery.fs.Stepper CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/jquery.fs.stepper/dist/css/jquery.fs.stepper.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- Sweet Alerts CSS -->
        <link href="{{asset('assets_admin/vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
       
        <!-- Custom CSS -->
        <link href="{{asset('assets_admin/dist/css/style.css')}}" rel="stylesheet" type="text/css"/>
       
    </head>

    <body>
        <!-- /Preloader -->
        <div class="wrapper theme-4-active pimary-color-red">
            <!-- Top Menu Items -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="mobile-only-brand pull-left">
                    <div class="nav-header pull-left">
                        <div class="logo-wrap">
                            <a href="/" style="display:flex;align-items:center;gap:9px;text-decoration:none;padding-top:11px">
                                <span style="width:38px;height:38px;border-radius:50%;background:#e8641c;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                    <svg viewBox="0 0 24 24" fill="none" style="width:22px;height:22px"><path d="M4 13 L12 5 L20 13" stroke="#e0a400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5 L12 10" stroke="#e0a400" stroke-width="2" stroke-linecap="round"/></svg>
                                </span>
                                <span>
                                    <b style="display:block;font-family:Georgia,'Times New Roman',serif;font-size:16px;font-weight:700;letter-spacing:2.5px;color:#fff;line-height:1">ASLAAF</b>
                                    <small style="display:block;font-size:8px;font-weight:600;letter-spacing:1.6px;color:#c9b6a6;margin-top:2px">BUILDERS (PVT) LTD</small>
                                </span>
                            </a>
                        </div>
                    </div>  
                    <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                    <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                    <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                    
                    <a href="/dashboard/inventory/search" class="btn btn-search btn-default btn-outline btn-rounded">Inventory Search</a>
                    <div id="search_form" role="search" class="top-nav-search collapse pull-left">
						<div class="input-group">
							<a href="/dashboard/inventory/search" class="btn btn-default btn-outline btn-rounded">Inventory Search</a>
<!--							<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">-->
							<span class="input-group-btn">
							<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
							</span>
						</div>
					</div>
                    
                </div>
                <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                    <ul class="nav navbar-right top-nav pull-right">
                        <li class="btn-group margin-select">
                            <div class="dropdown">
                                <i class="zmdi zmdi-plus plus-style"></i>
                                <button type="button" class="btn btn-default dropdown-toggle top-dropdown" data-toggle="dropdown">
                                    Add <span class="caret btn-caret"></span>
                                </button>
                                <ul class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" role="menu">
                                    <!-- <li><a href="/dashboard/message">Messages</a></li> -->

                
                                    @if(App\User::checkAgent(Auth::id()))
                                    <li>
                                        <a href="/dashboard/property/add">Add Detail Property</a>
                                    </li>
                                    @endif
                                  
                                    <li class="divider"></li>
                                    <li><a href="/dashboard/project/add">Add Project</a></li>
                                    @if(App\User::checkVendor(Auth::id()) == true)
                                    <li><a href="/dashboard/portfolio">Add Portfolio</a></li>
                                    @endif
                                    <li>
                                        <a href="/dashboard/quick/add/Property">Add Quick Property</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown app-drp">
                            <a href="/dashboard/message">
                                <img class="list-img" src="/assets_admin/dist/img/msg.png" alt="list-img" />
                                 <span id="message-count" class="top-nav-icon-badge" style="background-color:#ff6d2f;display:none;"></span>
                                <!-- <span class="top-nav-icon-badge"></span> -->
                            </a>
                            <!-- <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                                <li>
                                    <div class="notification-box-head-wrap">
                                        <span class="notification-box-head pull-left inline-block">Listing Properties</span>
                                        <a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
                                        <div class="clearfix"></div>
                                        <hr class="light-grey-hr ma-0"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="streamline message-nicescroll-bar">
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-green">
                                                    <i class="zmdi zmdi-flag"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                                                        New subscription created</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">2pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-yellow">
                                                    <i class="zmdi zmdi-trending-down"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
                                                    <span class="inline-block font-11 pull-right notifications-time">1pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Some technical error occurred needs to be resolved.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-blue">
                                                    <i class="zmdi zmdi-email"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">4pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="sl-avatar">
                                                    <img class="img-responsive" src="/assets_admin/dist/img/avatar.jpg" alt="avatar"/>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-red">
                                                    <i class="zmdi zmdi-storage"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">consectetur, adipisci velit.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="notification-box-bottom-wrap">
                                        <hr class="light-grey-hr ma-0"/>
                                        <a class="block text-center read-all" href="javascript:void(0)"> read all </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul> -->
                          
                        </li>
                        
                        <!-- <li class="dropdown alert-drp">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i>
                            <span class="top-nav-icon-badge">5</span>
                         </a>
                            <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                                <li>
                                    <div class="notification-box-head-wrap">
                                        <span class="notification-box-head pull-left inline-block">notifications</span>
                                        <a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
                                        <div class="clearfix"></div>
                                        <hr class="light-grey-hr ma-0"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="streamline message-nicescroll-bar">
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-green">
                                                    <i class="zmdi zmdi-flag"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                                                        New subscription created</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">2pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>                   
                                    </div>
                                </li>
                                
                            </ul>
                        </li> -->
                        <li class="dropdown auth-drp">
                         @if(Auth::user()->image != "")
                             @foreach(json_decode(Auth::user()->image) as $images)
                            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="/image/profile/{{$images}}" alt="user_auth" class="user-auth-img img-circle"/>
                                <div class="pull-right"><i class="zmdi zmdi-caret-down arrow-style"></i></div>
                            </a>
                            @endforeach
                            @else
                            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="/assets_admin/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>
                                <div class="pull-right"><i class="zmdi zmdi-caret-down arrow-style"></i></div>
                            </a>
                            @endif
                            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                <li>
                                    <a href="/dashboard/profile/view"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                                </li>
                                
                                <li>
                                    <a href="/dashboard/profile/edit"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                                </li>
                                 <li>
                                    <a href="/password"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>Reset Password</span></a>
                                </li>
                                <li class="divider"></li>
                                <li class="sub-menu show-on-hover">
                                    <a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
                                    <!--<ul class="dropdown-menu open-left-side">-->
                                    <!--    <li>-->
                                    <!--        <a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--        <a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--        <a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>-->
                                    <!--    </li>-->
                                        
                                    <!--</ul>   -->
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                       <i class="zmdi zmdi-power"></i><span>Log Out</span>
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>  
            </nav>
            <!-- /Top Menu Items -->