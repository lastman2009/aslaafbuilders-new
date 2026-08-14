@include('includes_admin.header')
@include('includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <ul role="tablist" class="nav nav-tabs" id="profile_tablist">
                        <li class="active" role="presentation">
                            <a aria-expanded="true"  data-toggle="tab" role="tab" id="profile_tab_15" href="#dashboard_profile">Profile</a>
                        </li>
                        <li role="presentation" class="">
                            <a  data-toggle="tab" id="agent_tab_15" role="tab" href="#dashboard_agent" aria-expanded="false">Agent</a>
                        </li>
                        <li role="presentation" class="">
                            <a  data-toggle="tab" id="architecture_tab_15" role="tab" href="#dashboard_architecture" aria-expanded="false">Architecture</a>
                        </li>
                        <li role="presentation" class="">
                            <a  data-toggle="tab" id="vendor_tab_15" role="tab" href="#dashboard_vendor" aria-expanded="false">Vendor</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="profile_tabcontent">
                        <div  id="dashboard_profile" class="tab-pane fade active in" role="tabpanel">

                            <div class="col-lg-7 col-sm-12 padding-left profile_small_padding profile_pad_right">
                                <div class="panel panel-default card-view profile-Image-tab">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="col-lg-5 col-lg-offset-1 col-sm-12 text-center profile_image">
                                                <figure class="edit-profile-image">
                                                    <img class="img-profile img-circle" src="dist/img/profile-img.jpg" alt="Profile Image">
                                                    <i class="zmdi zmdi-check editpicicon"></i>
                                                </figure>
                                                <h2>James Solliven</h2>
                                                <p>Agent</p>
                                            </div>
                                            <div class="col-lg-5 col-lg-offset-1 col-sm-12 profile_social">
                                                <ul>
                                                    <li><i class="zmdi zmdi-facebook"></i>Alit25402@gmail.com</li>
                                                    <li><i class="zmdi zmdi-google-plus"></i>Technological.com</li>
                                                    <li><i class="zmdi zmdi-twitter"></i>Technologicalinc</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-12 padding-right profile_small_padding profile_pad_left">
                                <div class="panel panel-default card-view profile-Image-tab">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="col-lg-5 col-lg-offset-1 pa-0">
                                                <span id="pie_chart_2" class="easypiechart skill-circle counter-height" data-percent="52">
                                                    <span class="percent head-font">52</span>
                                                </span>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 profile_counter">
                                                <p>Your Profile <span class="counter-color">52%</span> Complete</p>
                                                <p>Total Listings<span class="counter-lisiting">422</span></p>
                                                <button class="btn btn-edit-profile btn-lable-wrap left-label"> 
                                                    <span class="btn-text">Edit Your Profile</span>
                                                    <span class="btn-label btn-gear"><i class="fa fa-gear"></i> </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-second-row">
                                <div class="col-lg-4 col-sm-12 padding-left padding-right">
                                    <div class="panel panel-default card-view profile-Image-tab">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body profile-information">
                                                <h1>Basic Information</h1>
                                                <ul class="padding-left-profile">
                                                    <li><i class="fa fa-user"></i>Tayyab</li>
                                                    <li><i class="fa fa-user"></i>Ali</li>
                                                    <li><i class="fa fa-envelope"></i>atif@gmail.com</li>
                                                    <li><i class="fa fa-building"></i>Lahore</li>
                                                    <li><i class="fa fa-refresh"></i>Creation 3 Month Ago</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 profile_small_padding">
                                    <div class="panel panel-default card-view profile-Image-tab">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body profile-information profile-contact">
                                                <h1>Contact Information</h1>
                                                <ul class="padding-left-profile">
                                                    <li><i class="fa fa-newspaper-o"></i>35202-0785432-5</li>
                                                    <li><i class="fa fa-phone"></i>042-1213-34349</li>
                                                    <li><i class="fa fa-mobile"></i>03114065583</li>
                                                    <li><i class="fa fa-building-o"></i>FF Block Phase 4 DHA Lahore</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 padding-left padding-right">
                                    <div class="panel panel-default card-view profile-Image-tab profile-interest">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body profile-information profile-checkbox">
                                                <h1>Interests</h1>
                                                <form action="#">
                                                    <ul class="padding-left-profile">
                                                        <li>
                                                            <input type="checkbox" id="test6" />
                                                            <label for="test6">Buying</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="test2" />
                                                            <label for="test2">Selling</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="test3" />
                                                            <label for="test3">Investor</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="test4" />
                                                            <label for="test4">Building</label>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dashboard_agent" class="tab-pane fade" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12 padding-right">
                                    <div class="col-lg-6 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agent_tab_section">
                                            <div class="panel-wrapper collapse in edit-agent-profile">
                                                <div class="panel-body">
                                                    <div class="col-lg-5 col-lg-offset-1 col-sm-12 text-center profile_image">
                                                        <figure>
                                                            <img class="img-profile-agent img-circle" src="dist/img/agent-pic.jpg" alt="Agent Profile Image">
                                                        </figure>
                                                        <a href="" class="edit-agent-btn">Edit your Profile</a>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="profile-second-row">
                                                            <div class="panel panel-default card-view agent_tab_section">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body profile-information">
                                                                        <ul class="edit-agent-li">
                                                                            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Agency Name</li>
                                                                            <li><i class="fa fa-phone"></i>Telephone</li>
                                                                            <li><i class="fa fa-map-marker"></i>Location</li>
                                                                            <li><i class="fa fa-globe"></i>Technological.com</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 padding-left">
                                        <div class="panel panel-default theme-choose">
                                            <div class="panel-wrapper collapse in">
                                                <div class="theme-panel">
                                                    <div class="theme-text">
                                                        <h2>Your Website View</h2>
                                                        <a href="">Change Your Theme</a>
                                                    </div>
                                                    <span class="link-img">
                                                        <img width="300px" height="auto" src="http://dribbble.s3.amazonaws.com/users/197532/screenshots/1145931/freebie-1.png" style="top: 0px" />
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agency-about">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="agency-overview">
                                                        <h2>Agency Overview</h2>
                                                        <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipisicing elit, sed do eiusmod tempor  incididunt ut labore  et dolore magna aliqua Ut enim ad minim veniam.</p>
                                                        <ul class="agency-list profile-information">
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dashboard_architecture" class="tab-pane fade" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12 padding-right">
                                    <div class="col-lg-6 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agent_tab_section">
                                            <div class="panel-wrapper collapse in edit-agent-profile">
                                                <div class="panel-body">
                                                    <div class="col-lg-5 col-lg-offset-1 col-sm-12 text-center profile_image">
                                                        <figure>
                                                            <img class="img-profile-agent img-circle" src="dist/img/agent-pic.jpg" alt="Agent Profile Image">
                                                        </figure>
                                                        <a href="" class="edit-agent-btn">Edit your Profile</a>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="profile-second-row">
                                                            <div class="panel panel-default card-view agent_tab_section">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body profile-information">
                                                                        <ul class="edit-agent-li">
                                                                            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Company Name</li>
                                                                            <li><i class="fa fa-phone"></i>Telephone</li>
                                                                            <li><i class="fa fa-building-o"></i>Experience</li>
                                                                            <li><i class="fa fa-globe"></i>Technological.com</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agency-about">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="agency-overview">
                                                        <h2>Overview</h2>
                                                        <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipisicing elit, sed do eiusmod tempor  incididunt ut labore  et dolore magna aliqua Ut enim ad minim veniam.</p>
                                                        <ul class="agency-list profile-information">
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agency-about">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="agency-overview architecture-portpolio">
                                                        <h2>Portfolio</h2>
                                                        <div class="col-lg-12 padding-left">
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-1.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-2.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-3.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-4.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-5.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dashboard_vendor" class="tab-pane fade" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12 padding-right">
                                    <div class="col-lg-6 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agent_tab_section">
                                            <div class="panel-wrapper collapse in edit-agent-profile">
                                                <div class="panel-body">
                                                    <div class="col-lg-5 col-lg-offset-1 col-sm-12 text-center profile_image">
                                                        <figure>
                                                            <img class="img-profile-agent img-circle" src="dist/img/agent-pic.jpg" alt="Agent Profile Image">
                                                        </figure>
                                                        <a href="" class="edit-agent-btn">Edit your Profile</a>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="profile-second-row">
                                                            <div class="panel panel-default card-view agent_tab_section">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body profile-information">
                                                                        <ul class="edit-agent-li">
                                                                            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Name</li>
                                                                            <li><i class="fa fa-phone"></i>Telephone</li>
                                                                            <li><i class="fa fa-building-o"></i>Experience</li>
                                                                            <li><i class="fa fa-globe"></i>Technological.com</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agency-about">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="agency-overview">
                                                        <h2>Overview</h2>
                                                        <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipisicing elit, sed do eiusmod tempor  incididunt ut labore  et dolore magna aliqua Ut enim ad minim veniam.</p>
                                                        <ul class="agency-list profile-information">
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                            <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agency-about">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="agency-overview architecture-portpolio">
                                                        <h2>Portfolio</h2>
                                                        <div class="col-lg-12 padding-left">
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-1.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal"  href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-2.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-3.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-4.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                            <div class="col-lg-1-5 col-sm-6 portfolio-box padding-right">
                                                                <img class="img-responsive portfolio-img" src="dist/img/portfolio-5.jpg" alt="Portfolio Image" />
                                                                <div class="middle">
                                                                    <a data-toggle="modal" data-target="#responsive-modal" href="">View</a>
                                                                </div>
                                                                <h1>Project Name</h1>
                                                                <a href="">Edit <i class="fa fa-gear"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-sm-12 padding-left">
                                        <div class="panel panel-default card-view agency-about">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="agency-overview architecture-portpolio vendor-portfolio">
                                                        <h2>Products</h2>
                                                        <div class="table-wrap mt-40 vendor-products">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>SR</th>
                                                                            <th>TITLE</th>
                                                                            <th>DESCRIPTION</th>
                                                                            <th>ACTION</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>01</td>
                                                                            <td>Cement</td>
                                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  sed do eiusmod tempor uper df do eiusmod tempor.... <a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal">read more</a></td>
                                                                            <td class="text-center"><a href="#" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>02</td>
                                                                            <td>Iron Rods</td>
                                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  sed do eiusmod tempor uper df do eiusmod tempor.... <a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal">read more</a></td>
                                                                            <td class="text-center"><a href="#" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>03</td>
                                                                            <td>Cement</td>
                                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  sed do eiusmod tempor uper df do eiusmod tempor.... <a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal">read more</a></td>
                                                                            <td class="text-center"><a href="#" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>04</td>
                                                                            <td>Iron Rods</td>
                                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  sed do eiusmod tempor uper df do eiusmod tempor.... <a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal">read more</a></td>
                                                                            <td class="text-center"><a href="#" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>05</td>
                                                                            <td>Cement</td>
                                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  sed do eiusmod tempor uper df do eiusmod tempor.... <a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal">read more</a></td>
                                                                            <td class="text-center"><a href="#" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>06</td>
                                                                            <td>Iron Rods</td>
                                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  sed do eiusmod tempor uper df do eiusmod tempor.... <a class="vendor-product-anchor" href="" data-toggle="modal" data-target="#product-modal">read more</a></td>
                                                                            <td class="text-center"><a href="#" class="mr-15" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> </td>
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
                                </div>
                            </div>
                        </div>


                        <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="row">
                                        <div class="col-lg-12 padding-right">
                                            <div class="col-lg-6 col-md-6 col-sm-12 padding-left">
                                                <div class="panel panel-default card-view agency-about portfolio-view">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <!-- <div id="carousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                                                                <div class="carousel-inner portfolio-slider">
                                                                    <div class="item active">
                                                                        <img src="dist/img/portfolio-1.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-2.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-3.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-4.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-5.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-1.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-2.jpg">
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="dist/img/portfolio-3.jpg">
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <!-- <div class="portfolio-thumbnails">
                                                                <div id="thumbcarousel" class="carousel slide" data-interval="12000" data-ride="carousel">
                                                                    <div class="carousel-inner">
																	    <div class="item active">
                                                                            <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="dist/img/portfolio-1.jpg"></div>
                                                                            <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="dist/img/portfolio-2.jpg"></div>
                                                                            <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="dist/img/portfolio-3.jpg"></div>
                                                                            <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="dist/img/portfolio-4.jpg"></div>
                                                                        </div>
                                                                        <div class="item">
                                                                            <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="dist/img/portfolio-1.jpg"></div>
                                                                            <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="dist/img/portfolio-2.jpg"></div>
                                                                            <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="dist/img/portfolio-3.jpg"></div>
                                                                            <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="dist/img/portfolio-4.jpg"></div>
                                                                        </div>
																	</div>
                                                                    <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                                                                        <span class="glyphicon glyphicon-menu-left"></span>
                                                                    </a>
                                                                    <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                                                                        <span class="glyphicon glyphicon-menu-right"></span>
                                                                    </a>
                                                                </div>
                                                            </div> -->
                                                        
                                                        
                                                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                                              <div id="owl-single-product">
                                                                <div class="single-product-gallery-item" id="slide1"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/1.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/1.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide2"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/2.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/2.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide3"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/3.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/3.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide4"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/1.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/4.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide5"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/2.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/5.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide6"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/3.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/6.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide7"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/1.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/7.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide8"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/2.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/8.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item -->
                                                                
                                                                <div class="single-product-gallery-item" id="slide9"> <a data-lightbox="image-1" data-title="Gallery" href="dist/img/single-product/3.jpg"> <img class="img-responsive" alt="" src="dist/img/single-product/9.jpg" /> </a> </div>
                                                                <!-- /.single-product-gallery-item --> 
                                                                
                                                              </div>
                                                              <!-- /.single-product-slider -->
                                                              
                                                              <div class="single-product-gallery-thumbs gallery-thumbs">
                                                                <div id="owl-single-product-thumbnails">
                                                                  <div class="item"> <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm1.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm2.jpg"/> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm3.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm1.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm2.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm3.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="7" href="#slide7"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm1.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide8"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm2.jpg" /> </a> </div>
                                                                  <div class="item"> <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide9"> <img class="img-responsive" width="85" alt="" src="dist/img/single-product/sm3.jpg" /> </a> </div>
                                                                </div>
                                                                <!-- /#owl-single-product-thumbnails --> 
                                                                
                                                              </div>
                                                              <!-- /.gallery-thumbs --> 
                                                              
                                                            </div>
                                                            <!-- /.single-product-gallery --> 
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 padding-left">
                                                <div class="panel panel-default card-view agency-about">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body profile-information">
                                                            <div class="col-lg-9 col-lg-offset-3 col-sm-12 profile_image">
                                                                <button type="button" class="close btnclose" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <ul class="edit-agent-li portoflio-modal-li">
                                                                    <li><i class="fa fa-user" aria-hidden="true"></i>Title</li>
                                                                    <li><i class="fa fa-calendar"></i>Start Date</li>
                                                                    <li><i class="fa fa-calendar-times-o"></i>End Date</li>
                                                                </ul>
                                                                <a href="" class="edit-agent-btn">Edit your Portfolio</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 padding-right theme-heading">
                                            <div class="col-lg-12 col-sm-12 padding-left">
                                                <div class="panel panel-default card-view agency-about">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="agency-overview">
                                                                <h2>Overview</h2>
                                                                <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipisicing elit, sed do eiusmod tempor  incididunt ut labore  et dolore magna aliqua Ut enim ad minim veniam.</p>
                                                                <ul class="agency-list profile-information">
                                                                    <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                                    <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                                    <li><i class="fa fa-circle"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="product-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Product Description</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uper df do eiusmod tempor. 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uper df do eiusmod tempor. 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uper df do eiusmod tempor. 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uper df do eiusmod tempor. 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uper df do eiusmod tempor. 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor uper df do eiusmod tempor. 
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
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







@include('includes_admin.footer')

<style type="text/css">
    #owl-single-product-thumbnails .owl-controls {
    position: absolute;
    text-align: center;
    top: auto;
    width: 100%;
    margin-top: 10px;
}
#owl-single-product-thumbnails .owl-controls .owl-pagination .owl-page {
    display: inline-block;
}
#owl-single-product-thumbnails .owl-controls .owl-pagination .owl-page span {
    background: none repeat scroll 0 0 #ddd;
    border: medium none;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    display: block;
    height: 12px;
    margin: 0 5px;
    -webkit-transition: all 200ms ease-out 0s;
    -moz-transition: all 200ms ease-out 0s;
    -o-transition: all 200ms ease-out 0s;
    transition: all 200ms ease-out 0s;
    width: 12px;
    cursor: pointer;
}

</style>
<script>
    /*===================================================================================*/
    /* SINGLE PRODUCT GALLERY
    /*===================================================================================*/
    $(document).ready(function() {
        $('#owl-single-product').owlCarousel({
            items: 1,
            itemsTablet: [768, 2],
            itemsDesktop: [1199, 1]

        });

        $('#owl-single-product-thumbnails').owlCarousel({
            items: 4,
            pagination: true,
            rewindNav: true,
            itemsTablet: [768, 4],
            itemsDesktop: [1199, 3]
        });

        $('#owl-single-product2-thumbnails').owlCarousel({
            items: 6,
            pagination: true,
            rewindNav: true,
            itemsTablet: [768, 4],
            itemsDesktop: [1199, 3]
        });

        $('.single-product-slider').owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            singleItem: true,
            pagination: true
        });

        $(".slider-next").click(function() {
            var owl = $($(this).data('target'));
            owl.trigger('owl.next');
            return false;
        });

        $(".slider-prev").click(function() {
            var owl = $($(this).data('target'));
            owl.trigger('owl.prev');
            return false;
        });

        $('.single-product-gallery .horizontal-thumb').click(function() {
            var $this = $(this),
                owl = $($this.data('target')),
                slideTo = $this.data('slide');
            owl.trigger('owl.goTo', slideTo);
            $this.addClass('active').parent().siblings().find('.active').removeClass('active');
            return false;
        });
    });
</script>