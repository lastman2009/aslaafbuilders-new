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
                <select class="selectpicker" id="selete_type" data-style="form-control btn-default btn-outline">
                  <option>Buy</option>
                  <option>Rent</option>
                  <option>Project</option>
                </select>
              </div>  
            </div>
            <!--------- Advance Buy Search ------------>
          <div id="Buy">
            <div class="advance-dropdown-section">
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                @foreach($propertyTypes as $propertyType)
                    <optgroup label="{{$propertyType->name}}">
                      @foreach($data[$propertyType->id] as $datas)
                        <option value="{{$datas->id}}">{{$datas->name}}</option>
                      @endforeach
                      <hr>
                    </optgroup>
                @endforeach
              </select>
              <select class="selectpicker" name="bed" data-style="form-control btn-default btn-outline">
                <option>Bed Rooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="10">10</option>
              </select>
              <select class="selectpicker" name="construction_year" data-style="form-control btn-default btn-outline">
                <option>Construction Year</option>
                <option value="1-5">1-5 Years Old</option>
                <option value="6-10">6-10 Years Old</option>
                <option value="15-20">15-20 Years Old</option>
                <option value="20-25">20-25 Years Old</option>
                <option value="26-30">26-30 Years Old</option>
                <option value="31-35">31-35 Years Old</option>
                <option value="41">41+ Years Old</option>
              </select>
              <select class="selectpicker" name="construction_status" data-style="form-control btn-default btn-outline">
                <option>Construction Status</option>
                <option value="Complete">Complete</option>
                <option value="Under Construction">Under Construction</option>
                <option value="Grey Structure">Grey Structure</option>

              </select>
              <select class="selectpicker" name="parking_space" data-style="form-control btn-default btn-outline">
                <option>Parking Space</option>
                <option value="1">1+ Car </option>
                <option value="2">2+ Car </option>
                <option value="3">3+ Car </option>
              </select>
            </div>
        </div>
            <!--------- Advance Rent Search ------------>
            <div id="Rent">
              <div class="advance-dropdown-section">
                 <select class="selectpicker" data-style="form-control btn-default btn-outline">
                @foreach($propertyTypes as $propertyType)
                    <optgroup label="{{$propertyType->name}}">
                      @foreach($data[$propertyType->id] as $datas)
                        <option value="{{$datas->id}}">{{$datas->name}}</option>
                      @endforeach
                      <hr>
                    </optgroup>
                @endforeach
              </select>

                <select class="selectpicker" name="bed" data-style="form-control btn-default btn-outline">
                <option>Bed Rooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="10">10</option>
              </select>
                <select class="selectpicker" name="construction_year" data-style="form-control btn-default btn-outline">
                <option>Construction Year</option>
                <option value="1-5">1-5 Years Old</option>
                <option value="6-10">6-10 Years Old</option>
                <option value="15-20">15-20 Years Old</option>
                <option value="20-25">20-25 Years Old</option>
                <option value="26-30">26-30 Years Old</option>
                <option value="31-35">31-35 Years Old</option>
                <option value="41">41+ Years Old</option>
              </select>
               <select class="selectpicker" name="parking_space" data-style="form-control btn-default btn-outline">
                <option>Parking Space</option>
                <option value="1">1+ Car </option>
                <option value="2">2+ Car </option>
                <option value="3">3+ Car </option>
              </select>
              </div>
            </div>


            <!--------- Advance Projects Search ------------>
          <div id="Project">
            <div class="advance-dropdown-section">
              <select class="selectpicker" data-style="form-control btn-default btn-outline">
                <option>Residential Projects</option>
                <option>Commercial Projects</option>
              </select>

              <!--------- Advance Project Search All Residential & Commercial  ------------>
              <select class="selectpicker" name="construction_status" data-style="form-control btn-default btn-outline">
                <option>Construction Status</option>
                <option value="Complete">Complete</option>
                <option value="Under Construction">Under Construction</option>
                <option value="Grey Structure">Grey Structure</option>

              </select>
              <select class="selectpicker" name="construction_year" data-style="form-control btn-default btn-outline">
                <option>Construction Year</option>
                <option value="1-5">1-5 Years Old</option>
                <option value="6-10">6-10 Years Old</option>
                <option value="15-20">15-20 Years Old</option>
                <option value="20-25">20-25 Years Old</option>
                <option value="26-30">26-30 Years Old</option>
                <option value="31-35">31-35 Years Old</option>
                <option value="41">41+ Years Old</option>
              </select>
            </div>
          </div>
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
    @include('frontwebsite.include.searchproperty')
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
<script>
  $(document).ready(function(){
    $('#Buy').hide();
    $('#Rent').hide();
    $('#Project').hide();
    var value = $('select#selete_type option:selected').text();
    if(value == "Rent")
    {
     
        $('#Buy').hide();
        $('#Project').hide();
        $('#Rent').show();
    }
    else if(value == "Buy")
    {
   

        $('#Buy').show();
        $('#Project').hide();
        $('#Rent').hide();
    }
    else if (value =="Project")
    {
    

        $('#Buy').hide();
        $('#Project').show();
        $('#Rent').hide();
    }
      $(document).on("change", "select[id^='selete_type']", function() {
      value =$('select#selete_type option:selected').text();
        if(value == "Rent")
    {
     
        $('#Buy').hide();
        $('#Project').hide();
        $('#Rent').show();
    }
    else if(value == "Buy")
    {
   

        $('#Buy').show();
        $('#Project').hide();
        $('#Rent').hide();
    }
    else if (value =="Project")
    {
    

        $('#Buy').hide();
        $('#Project').show();
        $('#Rent').hide();
    }
      });
    });

</script>