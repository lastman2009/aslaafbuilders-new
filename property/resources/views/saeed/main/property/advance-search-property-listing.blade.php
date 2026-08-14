@include('includes.header')

<!-- Main Starts -->
<main class="main-section">
  <section class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-3 col-sm-12 col-xs-12 advance-search-sidebar">
            <form>
              <div class="advance-search-id">
               <h3>Advanced Search</h3>
               <div class="srch-id">
                <input class="input inputid" placeholder="SEARCH BY ID" type="text">
              </div>  
            </div>
            <div class="advance-search-dropdown">
              <div class="form-group">
                <button type="button" class="btn btn-default search pull-left"><i class="fa fa-search"></i></button>
                <select class="selectpicker" data-style="form-control btn-default btn-outline">
                  <option>Buy</option>
                  <option>Rent</option>
                  <option>Project</option>
                </select>
              </div>  
            </div>


            <!--------- Advance Buy Search ------------>

            <div class="advance-dropdown-section">
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>All Residential</option>
                <option>All Commercial</option>
                <option>All Projects</option>
              </select>

              <!--------- Advance Buy Search All Residential  ------------>
              <select class="selectpicker" multiple data-style="form-control btn-default btn-outline">
                <option>Residential Apartments</option>
                <option>Independent / Builder Floor</option>
                <option>Independent House / Villa</option>
                <option>Residential Land</option>
                <option>Studio Apartment</option>
                <option>Farm House</option>
                <option>Serviced Apartments</option>
                <option>Other</option>
              </select>

              <!--------- Advance Buy Search All Commercial  ------------>


              <select class="selectpicker" multiple data-style="form-control btn-default btn-outline">
                <option>Commercial Shops</option>
                <option>Commercial Showrooms</option>
                <option>Commercial Office / Space</option>
                <option>Commercial Land</option>
                <option>Industrial Lands / Plots</option>
                <option>Agriculture / Farm Land</option>
                <option>Hotel / Resorts</option>
                <option>Guest-House / Banquet-Halls</option>
                <option>Space in Retail Mall</option>
                <option>Office in Business Tower</option>
                <option>Office in IT Tower</option>
                <option>Ware House</option>
                <option>Cold Storage</option>
                <option>Factory</option>
                <option>Manufacturing</option>
                <option>Business Center</option>
                <option>Others</option>
              </select>

              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Bed Rooms</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>10</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Age</option>
                <option>New Construction</option>
                <option>1-5 Years Old</option>
                <option>6-10 Years Old</option>
                <option>15-20 Years Old</option>
                <option>20-25 Years Old</option>
                <option>26-30 Years Old</option>
                <option>31-35 Years Old</option>
                <option>41+ Years Old</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Construction Status</option>
                <option>Under Construction</option>
                <option>Ready to Move</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Posted By</option>
                <option>Owner</option>
                <option>Builder</option>
                <option>Dealer</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Garages</option>
                <option>1+ Car Garages</option>
                <option>2+ Car Garages</option>
                <option>3+ Car Garages</option>
              </select>
            </div>




            <!--------- Advance Rent Search ------------>

            <div class="advance-dropdown-section">
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>All Residential</option>
                <option>All Commercial</option>
                <option>All Projects</option>
              </select>

              <!--------- Advance Rent Search All Residential  ------------>
              <select class="selectpicker" multiple data-style="form-control btn-default btn-outline">
                <option>Residential Apartments</option>
                <option>Independent / Builder Floor</option>
                <option>Independent House / Villa</option>
                <option>Residential Land</option>
                <option>Studio Apartment</option>
                <option>Farm House</option>
                <option>Serviced Apartments</option>
                <option>Other</option>
              </select>

              <!--------- Advance Rent Search All Commercial  ------------>


              <select class="selectpicker" multiple data-style="form-control btn-default btn-outline">
                <option>Commercial Shops</option>
                <option>Commercial Showrooms</option>
                <option>Commercial Office / Space</option>
                <option>Commercial Land</option>
                <option>Industrial Lands / Plots</option>
                <option>Agriculture / Farm Land</option>
                <option>Hotel / Resorts</option>
                <option>Guest-House / Banquet-Halls</option>
                <option>Space in Retail Mall</option>
                <option>Office in Business Tower</option>
                <option>Office in IT Tower</option>
                <option>Ware House</option>
                <option>Cold Storage</option>
                <option>Factory</option>
                <option>Manufacturing</option>
                <option>Business Center</option>
                <option>Others</option>
              </select>

              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Bed Rooms</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>10</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Age</option>
                <option>New Construction</option>
                <option>1-5 Years Old</option>
                <option>6-10 Years Old</option>
                <option>15-20 Years Old</option>
                <option>20-25 Years Old</option>
                <option>26-30 Years Old</option>
                <option>31-35 Years Old</option>
                <option>41+ Years Old</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Posted By</option>
                <option>Owner</option>
                <option>Builder</option>
                <option>Dealer</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Garages</option>
                <option>1+ Car Garages</option>
                <option>2+ Car Garages</option>
                <option>3+ Car Garages</option>
              </select>
            </div>



            <!--------- Advance Projects Search ------------>

            <div class="advance-dropdown-section">
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Residential Projects</option>
                <option>Commercial Projects</option>
              </select>

              <!--------- Advance Project Search All Residential & Commercial  ------------>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>New Launch</option>
                <option>Under Construction</option>
                <option>Ready to Move</option>
              </select>

              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Bed Rooms</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>10</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Age</option>
                <option>New Construction</option>
                <option>1-5 Years Old</option>
                <option>6-10 Years Old</option>
                <option>15-20 Years Old</option>
                <option>20-25 Years Old</option>
                <option>26-30 Years Old</option>
                <option>31-35 Years Old</option>
                <option>41+ Years Old</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Posted By</option>
                <option>Owner</option>
                <option>Builder</option>
                <option>Dealer</option>
              </select>
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Garages</option>
                <option>1+ Car Garages</option>
                <option>2+ Car Garages</option>
                <option>3+ Car Garages</option>
              </select>
            </div>




            <!--------- Advance Dealers & Agents Search ------------>

<!--<div class="advance-dropdown-section">
<div class="row">
<div class="col-md-12 padding-right">
<div class="col-md-12 padding-left">
<input class="form-control dealer-search" id="" type="text" name="" placeholder="Phone Number">
</div>
<div class="col-md-12 padding-left">
<input class="form-control  dealer-search" id="" type="text" name="" placeholder="Real Estate Name">
</div>
<div class="col-md-12 padding-left">
<input class="form-control  dealer-search" id="" type="text" name="" placeholder="Properitor Name">
</div>
</div>
</div>
</div>-->





<div class="advance-search-area">
  <h3>Area</h3>  
  <div class="advance-dropdown-section">
    <div class="row">
      <div class="col-md-12 padding-right">
        <div class="col-md-6 padding-left">
          <input class="form-control advance-measure" id="number" type="number" name="" placeholder="Measure">
        </div>
        <div class="col-md-6 padding-left">
          <select class="selectpicker" data-style="form-control btn-default btn-outline">
            <option>Square Feet</option>
            <option>Square Yards</option>
            <option>Square Meters</option>
            <option>Marla</option>
            <option>Kanal</option>
            <option>Acre</option>
          </select>
        </div>
      </div>
    </div>
    <select class="selectpicker" data-style="form-control btn-default btn-outline">
      <option>City</option>
    </select>
    <select class="selectpicker" data-style="form-control btn-default btn-outline">
      <option>Town</option>
    </select>
    <select class="selectpicker" data-style="form-control btn-default btn-outline">
      <option>Phase</option>
    </select>
    <select class="selectpicker" data-style="form-control btn-default btn-outline">
      <option>Block</option>
    </select>
  </div>  
</div>
<div class="advance-search-price-range">
  <h3>Price Range</h3>
  <div class="advance-dropdown-section">
    <div class="row">
      <div class="col-md-12 padding-right">
        <div class="col-md-6 padding-left">
          <input class="form-control advance-min-max-price" id="advance-min-price" type="text" name="" placeholder="Min Price">
        </div>
        <div class="col-md-6 padding-left">
          <input class="form-control advance-min-max-price" id="advance-max-price" type="text" name="" placeholder="Max Price">
        </div>
      </div>
    </div>
  </div>      
</div>
<button type="submit" class="btn-advance-search">Submit</button>
</form>
<div class="recent-blogs">
  <img class="img-responsive" src="assets/images/img2.jpg">
</div>
<div class="recent-blogs">
  <img class="img-responsive" src="assets/images/img2.jpg">
</div>

</div>
<div class="col-md-9 col-sm-12 col-xs-12">

  <div class="row">
    <div class="col-md-12 features">
      <figure class="pull-left home-icon"><img src="assets/images/home-icon.jpg"> </figure>
      <div class="feature-heading advance-feature-heading pull-left">
        <h6><span>19812</span> Results found for Property for Rent in Pakistan</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisi.</p>
      </div>
    </div>
  </div>

  <div class="row advance-property-row">
  <div class="col-md-12">
    <div class="col-md-5 col-sm-12 col-xs-12 padding-left">
      <div class="advance-property-section">
        <div class="family-house advance-house">
          <figure>
            <div class="img-container">
              <div class="img-block"> <img class="img-responsive" src="assets/images/property-image.jpg"></div>
            </div>
            <figcaption>
              <div class="feature-tag">for Sale</div>
              <div class="feature-icons"><a href="" data-toggle="tooltip" data-placement="top" title="Saved Properties"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
              <div class="feature-photo-tag"><a href="">6 More Photos</a></div>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-sm-12 col-xs-12 advance-padding">
      <div class="advance-property-detail">
        <div class="advance-property-heading">
          <h1>1 Kanal House, <span>DHA Phase 3, Lahore For sale</span></h1>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <p>Block BB, DHA Phase 4, Lahore, Punjab</p> 
        </div>
        <div class="advance-property-detail-section">
          <h3>Rs 1,50,0000</h3>
          <ul>
            <li>5 bedrooms<span><i class="fa fa-bed" aria-hidden="true"></i></span></li>
            <li>5 bath<span><i class="fa fa-bath" aria-hidden="true"></i></span></li>
            <li>5 floors<span><i class="fa fa-university" aria-hidden="true"></i></span></li>
          </ul>
        </div>
        <hr>
        <div class="advance-property-button">
          <a href="">View Detail</a>
          <div class="advance-property-btn-icon">
            <a href="javascript:void(0);" data-toggle="popover" title="Contact Number" data-content="+92-568-5789" data-placement="top"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email"><i class="fa fa-envelope" aria-hidden="true"></i></a>

            <a data-toggle="dropdown" class="share-advance" href="javascript:void(0);">
             <i class="fa fa-share-alt" aria-hidden="true"></i>
              <span class="caret"></span>
           </a>
          <ul class="share-search dropdown-menu">
            <li>
              <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                <i class="fa fa-facebook"></i>
              </a>
            </li>         
            <li>
              <a data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                <i class="fa fa-envelope"></i>
              </a>
            </li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row advance-property-row">
  <div class="col-md-12">
    <div class="col-md-5 col-sm-12 col-xs-12 padding-left">
      <div class="advance-property-section">
        <div class="family-house advance-house">
          <figure>
            <div class="img-container">
              <div class="img-block"> <img class="img-responsive" src="assets/images/property-image.jpg"></div>
            </div>
            <figcaption>
              <div class="feature-tag-rent">for Rent</div>
              <div class="feature-icons"><a href="" data-toggle="tooltip" data-placement="top" title="Saved Properties"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
              <div class="feature-photo-tag"><a href="">6 More Photos</a></div>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-sm-12 col-xs-12 advance-padding">
      <div class="advance-property-detail">
        <div class="advance-property-heading">
          <h1>1 Kanal House, <span>DHA Phase 3, Lahore For sale</span></h1>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <p>Block BB, DHA Phase 4, Lahore, Punjab</p> 
        </div>
        <div class="advance-property-detail-section">
          <h3>Rs 1,50,0000</h3>
          <ul>
            <li>5 bedrooms<span><i class="fa fa-bed" aria-hidden="true"></i></span></li>
            <li>5 bath<span><i class="fa fa-bath" aria-hidden="true"></i></span></li>
            <li>5 floors<span><i class="fa fa-university" aria-hidden="true"></i></span></li>
          </ul>
        </div>
        <hr>
        <div class="advance-property-button">
          <a href="">View Detail</a>
          <div class="advance-property-btn-icon">
            <a href="javascript:void(0);" data-toggle="popover" title="Contact Number" data-content="+92-568-5789" data-placement="top"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email"><i class="fa fa-envelope" aria-hidden="true"></i></a>

            <a data-toggle="dropdown" class="share-advance" href="javascript:void(0);">
             <i class="fa fa-share-alt" aria-hidden="true"></i>
              <span class="caret"></span>
           </a>
          <ul class="share-search dropdown-menu">
            <li>
              <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                <i class="fa fa-facebook"></i>
              </a>
            </li>         
            <li>
              <a data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                <i class="fa fa-envelope"></i>
              </a>
            </li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row advance-property-row">
  <div class="col-md-12">
    <div class="col-md-5 col-sm-12 col-xs-12 padding-left">
      <div class="advance-property-section">
        <div class="family-house advance-house">
          <figure>
            <div class="img-container">
              <div class="img-block"> <img class="img-responsive" src="assets/images/img3.jpg"></div>
            </div>
            <figcaption>
              <div class="feature-tag-wanted">Wanted</div>
              <div class="feature-icons"><a href="" data-toggle="tooltip" data-placement="top" title="Saved Properties"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
              <div class="feature-photo-tag"><a href="">6 More Photos</a></div>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-sm-12 col-xs-12 advance-padding">
      <div class="advance-property-detail">
        <div class="advance-property-heading">
          <h1>1 Kanal House, <span>DHA Phase 3, Lahore For sale</span></h1>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <p>Block BB, DHA Phase 4, Lahore, Punjab</p> 
        </div>
        <div class="advance-property-detail-section">
          <h3>Rs 1,50,0000</h3>
          <ul>
            <li>5 bedrooms<span><i class="fa fa-bed" aria-hidden="true"></i></span></li>
            <li>5 bath<span><i class="fa fa-bath" aria-hidden="true"></i></span></li>
            <li>5 floors<span><i class="fa fa-university" aria-hidden="true"></i></li>
          </ul>
        </div>
        <hr>
        <div class="advance-property-button">
          <a href="">View Detail</a>
          <div class="advance-property-btn-icon">
            <a href="javascript:void(0);" data-toggle="popover" title="Contact Number" data-content="+92-568-5789" data-placement="top"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <a data-toggle="popover" data-placement="top" data-html="true" href="javascript:void(0);" id="email"><i class="fa fa-envelope" aria-hidden="true"></i></a>

            <a data-toggle="dropdown" class="share-advance" href="javascript:void(0);">
             <i class="fa fa-share-alt" aria-hidden="true"></i>
              <span class="caret"></span>
           </a>
          <ul class="share-search dropdown-menu">
            <li>
              <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                <i class="fa fa-facebook"></i>
              </a>
            </li>         
            <li>
              <a data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                <i class="fa fa-envelope"></i>
              </a>
            </li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 advanced-pagination">
    <ul class="pagination pull-right">
      <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li class="active"><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</div>





</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- main ends -->


<div id="popover-content-email" class="hide">
  <form class="form-inline" role="form">
    <div class="form-group text-center"> 
      <input class="headerSearch search-query" id="" name="" type="text" placeholder="Email Address" style="padding-left: 10px;margin-bottom: 8px;width: 100%;" />
      <input class="btn btn-primary btn-xs" id="phSearchButton" type="submit" value="Send" style="width: 100%;height: 25px;background: #fa6919;border: 1px solid #fa6919;" />
    </div>
  </form>
</div>



@include('includes.footer')
<script>

  $(function () {
    $('[data-toggle="tooltip"]').tooltip(); 
  });

  $("[data-toggle=popover]").each(function(i, obj) {
    $(this).popover({
//trigger: 'focus',
html: true,
content: function() {
  var id = $(this).attr('id')
  return $('#popover-content-' + id).html();
}
});
  });

</script>