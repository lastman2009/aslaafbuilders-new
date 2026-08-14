@if(Auth::check())
@include('includes.authHeader')                  

@else
@include('includes.header')                  
@endif
<style>
  span {
    font-size: 66px;
    color: #555;
    margin-bottom: 350px;
    display: inline-block;
    font-weight: 400;
    text-align: center;
  }
  span > span {
    margin-bottom: 0;
  }
  .circle {
    background: #2980b9;
    width: 200px;
    line-height: 200px;
    display: inline-block;
    color: #fff;
    border-radius: 100%;
  }
  code, code > span {
    text-align: left;
    display: block;
    font-family: Monaco, monospace;
    background: #444;
    color: #fff;
    padding: 20px;
    font-size: 14px;
    margin-bottom: 100px;
  }
  code > span {
    padding: 0;
    margin: 0;
  }
  @media only screen and (max-width: 1024px) {
    span {
      font-size: 33px;
      margin-bottom: 200px;
    }
  }
  @media only screen and (max-width: 800px) {
    div > span {
      font-size: 66px;
      display: block;
      width: 100% !important;
      margin-bottom: 100px;
    }
    span {
      font-size: 66px;
    }
    code {
      margin-bottom: 100px;
    }
  }
</style>
<!-- banner-wraper starts -->
<div class="banner-wraper"> 
  
  <!-- slider ends -->
 
  
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="banner-contents col-md-12">
          <div class="col-md-4 col-sm-4" style="padding:0">
            <div class="banner-inner-contents-left">
              <h4>DREAM LANDS
                PAKISTAN LANDS
                PORTAL</h4>
            </div>
          </div>
          <div class="col-md-8 col-sm-8" style="padding:0">
            <div class="banner-inner-contents basic-srch col-md-12">
              <div class="col-md-9">
                <button type="submit" class="btn btn-default search pull-left"><i class="fa fa-search"></i></button>
                <ul class="nav nav-pills">
                  <li class="active"><a data-toggle="pill" href="#searchBuyTab">Buy</a> </li>
                  <li><a data-toggle="pill" href="#searchRentTab">Rent</a> </li>
                  <li><a data-toggle="pill" href="#searchProjectsTab">Projects</a> </li>
                  <li><a data-toggle="pill" href="#searchWantedTab">Wanted</a> </li>
                </ul>
              </div>
              <div class="col-md-3 srch-id">
                <input type="text" class="input inputid" placeholder="Property ID">
              </div>
              <div class="tab-content col-md-12 srch-content">
                <div id="searchBuyTab" class="tab-pane fade in active">
                  <form class="navbar-form navbar-left" role="search">
                    
                   <div class="col-md-6 form-select">
                      <select class="form-control selectpicker" title="---- Select Cities ----" name="" id="radiusSelect2">
                        <option value="2">Lahore</option>
                        <option value="3">Multan</option>
                        <option value="4">Karachi</option>
                        <option value="5">Islamabad</option>
                      </select>
                    </div>
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect4">
                        <option value="1" selected> ---- Property Type ---- </option>
                        <optgroup label="Homes">
                        <option value="9" class="tabbed">Houses</option>
                        <option value="8" class="tabbed">Flats</option>
                        <option value="21" class="tabbed">Upper Portions</option>
                        <option value="22" class="tabbed">Lower Portions</option>
                        <option value="20" class="tabbed">Farm Houses</option>
                        <option value="24" class="tabbed">Rooms</option>
                        <option value="25" class="tabbed">Penthouse</option>
                        </optgroup>
                        <optgroup label="Plots">
                        <option value="12" class="tabbed">Residential Plots</option>
                        <option value="11" class="tabbed">Commercial Plots</option>
                        <option value="19" class="tabbed">Agricultural Land</option>
                        <option value="27" class="tabbed">Industrial Land</option>
                        <option value="23" class="tabbed">Plot Files</option>
                        <option value="26" class="tabbed">Plot Forms</option>
                        </optgroup>
                        <optgroup label="Commercial">
                        <option value="13" class="tabbed">Offices</option>
                        <option value="15" class="tabbed">Shops</option>
                        <option value="17" class="tabbed">Warehouses</option>
                        <option value="14" class="tabbed">Factories</option>
                        <option value="16" class="tabbed">Buildings</option>
                        <option value="18" class="tabbed">Other</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-md-12 input-address">
                      <input type="text" class="input form-control" placeholder="Address">
                    </div><?php /*?>
                    <div class="col-md-6 form-select">
                      <select class="form-control selectpicker" name="city" title="---- Select City ----" id="radiusSelect2">
                        <option value="0"> Lahore </option>
                        <option value="1"> Karachi </option>
                        <option value="2"> Islamabad </option>
                        <option value="3"> Rawalpindi </option>
                        <option value="4"> Faislabad </option>
                        <option value="5"> Quetta </option>
                        <option value="6"> Peshawar </option>
                      </select>
                    </div>
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect4">
                        <option value="1" selected> ---- Property Type ---- </option>
                        <optgroup label="Homes">
                        <option value="9" class="tabbed">Houses</option>
                        <option value="8" class="tabbed">Flats</option>
                        <option value="21" class="tabbed">Upper Portions</option>
                        <option value="22" class="tabbed">Lower Portions</option>
                        <option value="20" class="tabbed">Farm Houses</option>
                        <option value="24" class="tabbed">Rooms</option>
                        <option value="25" class="tabbed">Penthouse</option>
                        </optgroup>
                        <optgroup label="Plots">
                        <option value="12" class="tabbed">Residential Plots</option>
                        <option value="11" class="tabbed">Commercial Plots</option>
                        <option value="19" class="tabbed">Agricultural Land</option>
                        <option value="27" class="tabbed">Industrial Land</option>
                        <option value="23" class="tabbed">Plot Files</option>
                        <option value="26" class="tabbed">Plot Forms</option>
                        </optgroup>
                        <optgroup label="Commercial">
                        <option value="13" class="tabbed">Offices</option>
                        <option value="15" class="tabbed">Shops</option>
                        <option value="17" class="tabbed">Warehouses</option>
                        <option value="14" class="tabbed">Factories</option>
                        <option value="16" class="tabbed">Buildings</option>
                        <option value="18" class="tabbed">Other</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-md-12 form-select">
                      <select class="form-control" name="sel10" id="sel10" size="11" multiple="">
						  <option value="item0">DHA PHASE 1</option>
						  <option value="item1">DHA PHASE 2</option>
						  <option value="item2">DHA PHASE 3</option>
						  <option value="item3">DHA PHASE 4</option>
						  <option value="item4">DHA PHASE 5</option>
						  <option value="item5">DHA PHASE 6</option>
						  <option value="item6">DHA PHASE 7</option>
						  <option value="item7">DHA PHASE 8</option>
						  <option value="item8">DHA PHASE 9</option>
						  <option value="item9">DHA PHASE 10</option>
						  <option value="item10">DHA PHASE 11</option>
						</select>
						<div class="tagger tagger-loading"></div>
                    </div><?php */?>
                    <div class="col-md-12 range-wraper">
                      <div class="col-md-6 rang-slider">
                        <div id="buyPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
                          <input id="buyPrice-input-0" value="Max" type="text">
                          <input id="buyPrice-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                      <div class="col-md-6 rang-slider rang-slider-next">
                        <div id="buyAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
                          <input id="buyArea-input-0" value="Max" type="text">
                          <input id="buyArea-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-right clearfix">
                      <button type="submit" class="btn btn-default btn-style">Submit</button>
                    </div>
                  </form>
                </div>
                <div id="searchRentTab" class="tab-pane fade in">
                  <form class="navbar-form navbar-left" role="search">
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect2">
                        <option value="1" selected> ---- Select Cities ---- </option>
                        <option value="2">Lahore</option>
                        <option value="3">Multan</option>
                        <option value="4">Karachi</option>
                        <option value="5">Islamabad</option>
                      </select>
                    </div>
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect4">
                        <option value="1" selected> ---- Property Type ---- </option>
                        <optgroup label="Homes">
                        <option value="9" class="tabbed">Houses</option>
                        <option value="8" class="tabbed">Flats</option>
                        <option value="21" class="tabbed">Upper Portions</option>
                        <option value="22" class="tabbed">Lower Portions</option>
                        <option value="20" class="tabbed">Farm Houses</option>
                        <option value="24" class="tabbed">Rooms</option>
                        <option value="25" class="tabbed">Penthouse</option>
                        </optgroup>
                        <optgroup label="Plots">
                        <option value="12" class="tabbed">Residential Plots</option>
                        <option value="11" class="tabbed">Commercial Plots</option>
                        <option value="19" class="tabbed">Agricultural Land</option>
                        <option value="27" class="tabbed">Industrial Land</option>
                        <option value="23" class="tabbed">Plot Files</option>
                        <option value="26" class="tabbed">Plot Forms</option>
                        </optgroup>
                        <optgroup label="Commercial">
                        <option value="13" class="tabbed">Offices</option>
                        <option value="15" class="tabbed">Shops</option>
                        <option value="17" class="tabbed">Warehouses</option>
                        <option value="14" class="tabbed">Factories</option>
                        <option value="16" class="tabbed">Buildings</option>
                        <option value="18" class="tabbed">Other</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-md-12 input-address">
                      <input type="text" class="input form-control" placeholder="Address">
                    </div>
                    <div class="col-md-12 range-wraper">
                      <div class="col-md-6 rang-slider">
                        <div id="rentPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
                          <input id="rentPrice-input-0" value="Max" type="text">
                          <input id="rentPrice-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                     <div class="col-md-6 rang-slider rang-slider-next">
                        <div id="rentAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
                          <input id="rentArea-input-0" value="Max" type="text">
                          <input id="rentArea-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-right clearfix">
                      <button type="submit" class="btn btn-default btn-style">Submit</button>
                    </div>
                  </form>
                </div>
                <div id="searchProjectsTab" class="tab-pane fade in ">
                  <form class="navbar-form navbar-left" role="search">
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect2">
                        <option value="1" selected> ---- Select Cities ---- </option>
                        <option value="2">Lahore</option>
                        <option value="3">Multan</option>
                        <option value="4">Karachi</option>
                        <option value="5">Islamabad</option>
                      </select>
                    </div>
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect4">
                        <option value="1" selected> ---- Property Type ---- </option>
                        <optgroup label="Homes">
                        <option value="9" class="tabbed">Houses</option>
                        <option value="8" class="tabbed">Flats</option>
                        <option value="21" class="tabbed">Upper Portions</option>
                        <option value="22" class="tabbed">Lower Portions</option>
                        <option value="20" class="tabbed">Farm Houses</option>
                        <option value="24" class="tabbed">Rooms</option>
                        <option value="25" class="tabbed">Penthouse</option>
                        </optgroup>
                        <optgroup label="Plots">
                        <option value="12" class="tabbed">Residential Plots</option>
                        <option value="11" class="tabbed">Commercial Plots</option>
                        <option value="19" class="tabbed">Agricultural Land</option>
                        <option value="27" class="tabbed">Industrial Land</option>
                        <option value="23" class="tabbed">Plot Files</option>
                        <option value="26" class="tabbed">Plot Forms</option>
                        </optgroup>
                        <optgroup label="Commercial">
                        <option value="13" class="tabbed">Offices</option>
                        <option value="15" class="tabbed">Shops</option>
                        <option value="17" class="tabbed">Warehouses</option>
                        <option value="14" class="tabbed">Factories</option>
                        <option value="16" class="tabbed">Buildings</option>
                        <option value="18" class="tabbed">Other</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-md-12 input-title">
                      <input type="text" class="input form-control" placeholder="Project Title">
                    </div>
                    <div class="col-md-12 range-wraper">
                      <div class="col-md-6 rang-slider">
                        <div id="projectsPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
                          <input id="projectsPrice-input-0" value="Max" type="text">
                          <input id="projectsPrice-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                      <div class="col-md-6 rang-slider rang-slider-next">
                        <div id="projectsAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
                          <input id="projectsArea-input-0" value="Max" type="text">
                          <input id="projectsArea-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button type="submit" class="btn btn-default btn-style">Submit</button>
                    </div>
                  </form>
                </div>
                <div id="searchWantedTab" class="tab-pane fade in ">
                  <form class="navbar-form navbar-left" role="search">
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect2">
                        <option value="1" selected> ---- Select Cities ---- </option>
                        <option value="2">Lahore</option>
                        <option value="3">Multan</option>
                        <option value="4">Karachi</option>
                        <option value="5">Islamabad</option>
                      </select>
                    </div>
                    <div class="col-md-6 form-select">
                      <select class="form-control" name="" id="radiusSelect4">
                        <option value="1" selected> ---- Property Type ---- </option>
                        <optgroup label="Homes">
                        <option value="9" class="tabbed">Houses</option>
                        <option value="8" class="tabbed">Flats</option>
                        <option value="21" class="tabbed">Upper Portions</option>
                        <option value="22" class="tabbed">Lower Portions</option>
                        <option value="20" class="tabbed">Farm Houses</option>
                        <option value="24" class="tabbed">Rooms</option>
                        <option value="25" class="tabbed">Penthouse</option>
                        </optgroup>
                        <optgroup label="Plots">
                        <option value="12" class="tabbed">Residential Plots</option>
                        <option value="11" class="tabbed">Commercial Plots</option>
                        <option value="19" class="tabbed">Agricultural Land</option>
                        <option value="27" class="tabbed">Industrial Land</option>
                        <option value="23" class="tabbed">Plot Files</option>
                        <option value="26" class="tabbed">Plot Forms</option>
                        </optgroup>
                        <optgroup label="Commercial">
                        <option value="13" class="tabbed">Offices</option>
                        <option value="15" class="tabbed">Shops</option>
                        <option value="17" class="tabbed">Warehouses</option>
                        <option value="14" class="tabbed">Factories</option>
                        <option value="16" class="tabbed">Buildings</option>
                        <option value="18" class="tabbed">Other</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-md-12 input-address">
                      <input type="text" class="input form-control" placeholder="Address">
                    </div>
                    <div class="col-md-12 range-wraper">
                      <div class="col-md-6 rang-slider">
                        <div id="wantedPriceRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Price: </strong></span> <span class="range-inputs">
                          <input id="wantedPrice-input-0" value="Max" type="text">
                          <input id="wantedPrice-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                      <div class="col-md-6 rang-slider rang-slider-next">
                        <div id="wantedAreaRange" class="noUi-target noUi-rtl noUi-horizontal"> </div>
                        <div class="prices-wraper"> <span class="price"><strong> Area: </strong></span> <span class="range-inputs">
                          <input id="wantedArea-input-0" value="Max" type="text">
                          <input id="wantedArea-input-1" value="Min" type="text">
                          </span> </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-right clearfix">
                      <button type="submit" class="btn btn-default btn-style">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="arow-down">
        <button id="button"><img src="assets/images/arow-down.png"></button>
      </div>
    </div>
  </div>
</div>

<!-- slider ends -->
<!-- Main Starts -->
<main class="main-section"> 
  <!-- featured-properties section -->
  <section class="slider main-slider">
    <div class="container">
      <div class="row">
        <div class="col-md-12 features">
          <figure class="pull-left home-icon"><img src="assets/images/home-icon.jpg"> </figure>
          <div class="feature-heading pull-left">
            <h2>FEATURED <span> PROPERTIES</span></h2>
            <p>Browse a range of featured properties with properties online</p>
          </div>
        </div>
        <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag for-rent">for rent</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <h4>Family House in Lahore</h4>
                  <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                  <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                    <figcaption>
                      <div class="feature-tag">for sale</div>
                      <div class="shade"></div>
                    </figcaption>
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                      <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                      <li><a href="#"><i class="fa fa-share"></i></a> </li>
                    </ul>
                  </figure>
                  <p class="meters"><a class="text-muted" href="#"> <img src="assets/images/m2.jpg"> 2100 m2</a> <a class="text-muted" href="#"><img src="assets/images/bedroom.jpg"> 5 Bedrooms</a> </p>
                  <div class="prices-details">
                    <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                    <a class="pull-right btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-caret-left"></i></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-caret-right"></i></a> </div>
      </div>
    </div>
  </section>
  
  <!-- latest-properties section -->
  <section class="page-section latest-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-9 features">
              <div class="feature-heading">
                <figure class="pull-left home-icon"><img src="assets/images/home-icon2.jpg"> </figure>
                <h2>LATEST <span> PROPERTIES</span></h2>
                <p>Browse latest properties with properties online</p>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag for-rent">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag for-rent">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <h4>Family House in Lahore</h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> DHA, Phase 6, Lahore</p>
                    <figure> <img class="img-responsive" src="assets/images/img1.jpg">
                      <figcaption>
                        <div class="feature-tag for-rent">for sale</div>
                        <div class="shade"></div>
                      </figcaption>
                      <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-bookmark"></i> </a> </li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                        <li><a href="#"><i class="fa fa-share"></i></a> </li>
                      </ul>
                    </figure>
                    <div class="prices-details">
                      <p class="pull-left">Rs. 2 Crore 35 Lakhs</p>
                      <a class="pull-right btn-style details no-bg" href="#">Details</a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 verticalCarousel locations">
              <div class="col-md-12">
                <h3><i class="fa fa-map-marker color"></i> Top<span class="color"> Locations</span></h3>
                <div class="verticalCarouselHeader"> <a href="#" class="vc_goDown"><i class="fa fa-fw fa-angle-up"></i></a> </div>
                <ul class="verticalCarouselGroup list-group vc_list">
                  <li class="list-group-item">
                    <h5 class="color">Islamabad <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Lahore <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Karachi <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Multan <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Kasur <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Hyderabad <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Quetta <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Peshawer <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">DI Khan <span class="pull-right">25488</span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5 class="color">Islamabad <span class="pull-right">25488</span></h5>
                  </li>
                </ul>
                <div class="verticalCarouselFooter text-center"> <a href="#" class="vc_goUp"><i class="fa fa-fw fa-angle-down"></i></a> </div>
                </div>
                <div class="col-md-12"> <img class="img-responsive" src="assets/images/img2.jpg"> </div>
                <div class="col-md-12"> <img class="img-responsive" src="assets/images/img2.jpg"> </div>
              
              
            </div>
            <div class="col-md-12 view-more-wraper text-center margin-top"> <a href="#" class="view-more">View More <i class="fa fa-home"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Projects section -->
  <section class="page-section projects">
    <div class="container">
      <div class="row">
        <div class="col-md-12 features">
          <figure class="pull-left home-icon"><img src="assets/images/project.png"> </figure>
          <div class="feature-heading pull-left">
            <h2>Projects </h2>
            <p>Browse new projects on our property portal</p>
          </div>
          <a href="#" class="pull-right viewMore">View More Projects</a> </div>
        <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel2">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel2" data-slide-to="1"></li>
            <li data-target="#myCarousel2" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="family-house">
                  <figure> <img class="img-responsive" src="assets/images/img4.jpg">
                    <figcaption>
                      <div class="feature-tag">SAMAMA Gulberg</div>
                      <div class="feature-tag area"><i class="fa fa-marker"></i> DHA Lahore</div>
                      <div class="shade"></div>
                    </figcaption>
                  </figure>
                  <div class="prices-details"> <a class="btn-style details" href="#">Details</a> </div>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel2" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="right carousel-control" href="#myCarousel2" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
      </div>
    </div>
  </section>
  <!-- projects ends here --> 
  
  <!-- AGENCIES here -->
  <section class="page-section agencies">
    <div class="container">
      <div class="row">
        <div class="col-md-12 features">
          <figure class="pull-left home-icon"><img src="assets/images/home-icon4.jpg"> </figure>
          <div class="feature-heading pull-left">
            <h2>FEATURED <span> AGENCIES</span></h2>
            <p>Browse featured agencies with properties online</p>
          </div>
        </div>
        <div class=" features">
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo2.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo2.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo1.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo6.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo4.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo5.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-12 companies"> <img src="assets/images/logo3.jpg">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-phone"></i> </a> </li>
              <li><a href="#"><i class="fa fa-map-marker"></i></a> </li>
              <li><a href="#"><i class="fa fa-external-link"></i></a> </li>
            </ul>
          </div>
        </div>
        <div class="col-md-12 view-more-wraper text-center margin-top"> <a href="#" class="view-more">Load More <i class="fa fa-refresh"></i></a> </div>
      </div>
    </div>
  </section>
  <!-- company logos section ends --> 
  
  <!-- subscribe News Letter -->
  <section class="page-section">
    <div class="subscribe">
      <div class="container">
        <div class="row">
          <div class=" subscribe-wraper">
            <div class="input-group">
              <input type="email" class="form-control" placeholder="Enter your email">
              <span class="input-group-btn">
              <button class="btn btn-theme" type="submit">Subscribe</button>
              </span> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- blogs started -->
  <section class="page-section blogs">
    <div class="container">
      <div class="row">
        <div class="col-md-12 features">
          <figure class="pull-left home-icon"><img src="assets/images/home-icon5.jpg"> </figure>
          <div class="feature-heading pull-left">
            <h2>FEATURED <span> blog</span></h2>
            <p>Read blogs from our property portal online</p>
          </div>
        </div>
        <div class="">
          <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel3">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="family-house">
                    <figure> <img class="img-responsive" src="assets/images/img5.jpg">
                      <figcaption>
                        <div class="feature-tag">25-Feb-2017</div>
                        <div class="shade"></div>
                      </figcaption>
                    </figure>
                    <h4>Everything you missed on Day 1 of Property Portal</h4>
                    <p>Everything you missed on Day 1 of Property Portal</p>
                    <div class="prices-details"> <a class="btn-style details no-bg" href="#">Read</a> </div>
                  </div>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><i class="fa fa-caret-left"></i></a> <a class="right carousel-control" href="#myCarousel3" data-slide="next"><i class="fa fa-caret-right"></i></a> </div>
        </div>
      </div>
    </div>
  </section>
  <section class="page-section quick-access-wraper">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="col-md-12 features">
          	<div class="feature-heading">
            <figure class="pull-left home-icon"><img src="assets/images/home-icon6.jpg"> </figure>
            
              <h2>Quick <span> Access</span></h2>
            
            </div>
          
            <div class="quick-access">
              <ul>
              <li>
              <h3>Buying Properties in Pakistan</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
              <a class="btn-style details" href="#">List your Property Now</a>
              </li>
              
              <li>
              <h3>Selling Pakistan Real Estate</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
              <a class="btn-style details" href="#">List your Property Now</a>
              </li>
              <li>
              <h3>Renting Properties in Pakistan</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
              <a class="btn-style details" href="#">List your Property Now</a>
              </li>
              <li>
              <h3>New Projects</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
              <a class="btn-style details" href="#">List your Property Now</a>
             </li>
              <li>
              <h3>Pakistan Real Estate Portal</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
            </li></ul>
            
            </div>
          </div>
        </div>
        <div class="col-md-3 text-center q-acces">
        	<div class="col-md-12"> 
        	<img class="img-responsive" src="assets/images/img2.jpg">
         </div>
         <div class="col-md-12">
          <img class="img-responsive" src="assets/images/img2.jpg"> 
          </div>
      </div>
    </div>
  </div>
  </section>
</main>
<!-- wraper ends -->
@include('includes.footer')