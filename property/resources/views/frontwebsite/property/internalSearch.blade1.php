@include("includes.title")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Main Starts -->
<main class="main-section">
  <section class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-3 col-sm-12 col-xs-12 advance-search-sidebar">
            <form method="get" action="/property">
            {{ csrf_field()}}
              <div class="advance-search-id">
               <h3>Advanced Search</h3>

               <div class="srch-id">
                <input class="input inputid" name="id" placeholder="SEARCH BY ID" type="text">
              </div>  
            </div>
            <div class="advance-search-dropdown">
              <div class="form-group">
                <button type="button" class="btn btn-default search pull-left"><i class="fa fa-search"></i></button>
                <select class="selectpicker" name="search_purpose" id="selete_type" data-style="form-control btn-default btn-outline">
                <?php 
                // $purposes =['1'=>'Buy','2'=>'Rent' ,'4'=>'Project'];
                $purposes =['1'=>'Buy','2'=>'Rent','3'=>'Wanted' ,'4' =>'Project'];

                ?>
                @foreach($purposes as $key => $value)
                 @if(isset($_GET['search_purpose']) && $key ==$_GET['search_purpose']) )
                   <option value="{{$key}}" selected>{{$value}}</option>
                 @else
                   <option value="{{$key}}">{{$value}}</option>
                @endif
                @endforeach
                </select>
              </div>  
            </div>
            <div id="div1">
              
            </div>
         
<div class="advance-search-area">
  <h3>Area</h3>  
  <div class="advance-dropdown-section">
    <div class="row">
      <div class="col-md-12 padding-right">
        <div class="col-md-6 padding-left">
           <input  class="form-control advance-measure" type="number" id="number" step="0.1" value="<?php
          if(isset($_GET['area']))
          {
            echo $_GET['area'];
          } 
            ?>" name="area" placeholder="Measure">
        </div>
        <div class="col-md-6 padding-left">
          <select class="selectpicker" data-style="form-control btn-default btn-outline" title="Area Type" name="area_type">
            <?php
          $area_types =['Square Feet','Square Yards' ,'Square Meters' ,'Marla' ,'Kanal' ,' Arce'];
            ?>
            @foreach($area_types as $type)
             @if(isset($_GET['area_type']) && $type ==$_GET['area_type']) )
             <option value="{{$type}}" selected>{{$type}}</option>
              @else
             <option value="{{$type}}">{{$type}}</option>
              @endif

            @endforeach
          </select>
        </div>
      </div>
    </div>
    <select class="selectpicker" data-style="form-control btn-default btn-outline" title="Select City" name="city_id" id="city">        
      @foreach($cities as $city) 
      @if(isset($_GET['city_id']) && $city->id == $_GET['city_id'])
          <option value="{{ $city->id }}" selected>{{$city->name}}</option>
          @else
          <option value="{{ $city->id }}">{{$city->name}}
          </option>
          @endif 
      @endforeach
    </select>
    <select class="selectpicker" data-style="form-control btn-default btn-outline" title="Select Town"   name="town_id" id="town">
     @if(isset($_GET['city_id']))
       @if(isset($_GET['city_id']))
     {{$towns = App\City::getTowns($_GET['city_id'])}}
     @endif
      @foreach($towns as $town)
        @if(isset($_GET['town_id']) && $town->id == $_GET['town_id'])
        <option value="{{ $town->id }}" selected>{{$town->name}}</option>
        @else

        <option value="{{ $town->id }}">{{$town->name}}</option>
        @endif
      @endforeach
      @endif
      </select>
    <select class="selectpicker" data-style="form-control btn-default btn-outline" title="Select Phase"  name="phase_id" id="phase">
       @if(isset($_GET['phase_id']))
      @foreach($phases as $phase)
      @if(isset($_GET['phase_id']) && $phase->id == $_GET['phase_id'])
      <option value="{{ $phase->id}}" selected>{{ $phase->name}}</option>
      @else

      <option value="{{ $phase->id }}">{{$phase->name}}</option>
      @endif
        @endforeach
        @endif
    </select>
    <select class="selectpicker" data-style="form-control btn-default btn-outline" title="Select Block"  name="block_id" id="block">
       @if(isset($_GET['block_id']))  
          @foreach($blocks as $block)
             @if(isset($_GET['block_id']) && $block->id == $_GET['block_id'])
            <option value="{{ $block->id}}" selected>{{ $block->name}}</option>
            @else

            <option value="{{ $block->id }}">{{$block->name}}</option>
            @endif
          @endforeach
      @endif
  </select>
  </div>  
</div>
<div class="advance-search-price-range">
  <h3>Price Range</h3>
  <div class="advance-dropdown-section">
    <div class="row">
      <div class="col-md-12 padding-right">
        <div class="col-md-6 padding-left">
          <input class="form-control advance-min-max-price" value="<?php
          if(isset($_GET['min_price']))
          {
            $min_price = $_GET['min_price'];
            if (strpos($_GET['min_price'], 'Rs.') !== false) {      
                $min_price = explode(' ',$min_price)[1];
                $min_price = str_replace(array(','), '',$min_price);
            }
            echo $min_price;
          } 
            ?>" id="advance-min-price" type="text" name="min_price" placeholder="Min Price">
        </div>
        <div class="col-md-6 padding-left">
          <input class="form-control advance-min-max-price" id="advance-max-price" type="text" name="max_price" placeholder="Max Price" value="<?php
          if(isset($_GET['max_price']))
          {
            $max_price = $_GET['max_price'];
            if (strpos($_GET['max_price'], 'Rs.') !== false) {      
                $max_price = explode(' ',$max_price)[1];
                $max_price = str_replace(array(','), '',$max_price);
            }
            echo $max_price;
          } 
            ?>">
        </div>
      </div>
    </div>
  </div>      
</div>
<button type="submit" class="btn-advance-search">Submit</button>
<button type="reset" class="btn-advance-search">Reset</button>

</form>
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 img-rightdeed recent-blogs text-center padding-left padding-right">
    <a href="/blog">
        <img class="img-responsive" src="/assets/images/sidebar_ad_1.jpg">
    </a>
  
</div>
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 img-rightdeed recent-blogs text-center padding-left padding-right">
    <a href="/forums">
		<img class="img-responsive" src="/assets/images/sidebar_ad_2.jpg">
    </a>
</div>
<div class="pop-comparison comparePanle">
              <h2>Select <span>Property</span>.</h2>
              <div class=" titleMargin w3-container comparePan">
                  <?php if(!empty(Session::get("compare"))){
                    foreach (Session::get("compare") as $item) {
                      $id = $item[0]["id"];
                      $image = $item[0]["image"];
                      $title = $item[0]["title"];
                      $address = $item[0]["address"];
                      echo ' 
                      <div id="'.$id.'" class="compare-product">
                        <figure>
                          <div class="img-container"> 
                            <div class="img-block">
                              <img class="img-responsive" src="'.$image.'" alt="image">
                            </div>
                          </div>
                          <figcaption>
                            <h4>'.$title.'</h4>
                            <h6>'.$address.'</h6>
                            <a class="selectedItemCloseBtn">Remove</a>
                          </figcaption>
                        </figure>
                      </div>';
                    }
                  }
                  ?>
              </div>
              <button class="compare-btn notActive cmprBtn" disabled>Compare Now</button>
            </div>
</div>
<div class="col-md-9 col-sm-12 col-xs-12">

  <div class="row">
    <div class="col-md-12 features">
      <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
      <div class="feature-heading advance-feature-heading pull-left">
        @if($count != 0)
          @if($name != 3)
            <h6>We have found <span>{{$count}}</span> closest results {{$name}} in Pakistan</h6>
          @else
            <h6>Post an ad of your property to let others know what you are offering!</h6>
          @endif
        @else
            <h6>No Property {{$name}} found</h6>
        @endif
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
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md">
    <div class="container modal-content model-error">

      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">

        <h2><span>&#x26a0;</span>Error!</h2>
        <h4>Maximum of Two products are allowed for comparision</h4>

      </div>
    </div>
  </div>
</div>
@include('includes.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

  $(function () {
    $('[data-toggle="tooltip"]').tooltip(); 
  });

  $("[data-toggle=popover]").each(function(i, obj) {
    $(this).popover({
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
    var value = $('select#selete_type option:selected').text();
    if(value == "Rent")
    {
      var type = '';
      <?php 
      if(isset($_GET['property_type'])){ ?>
        type = '<?php echo $_GET['property_type'] ?>';
      <?php }else{ ?>
        type = '';
      <?php } 
      ?>
      var bed = '';
      <?php 
      if(isset($_GET['bed'])){ ?>
        bed = '<?php echo $_GET['bed'] ?>';
      <?php }else{ ?>
        bed = '';
      <?php } 
      ?>

       var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>
      var parking_space = '';
      <?php 
      if(isset($_GET['parking_space'])){ ?>
        parking_space = '<?php echo $_GET['parking_space'] ?>';
      <?php }else{ ?>
        parking_space = '';
      <?php } 
      ?>
      
     $.ajax({url:'/rent',method: 'get', data:{property_type : type ,bed :bed ,construction_year:construction_year, parking_space : parking_space },success:function(result){
      // alert(result);
      $("#div1").html(result);
      $( '.selectpicker' ).selectpicker( 'refresh' );
    }});
    }


    else if(value == "Wanted")
    {
      var type = '';
      <?php 
      if(isset($_GET['property_type'])){ ?>
        type = '<?php echo $_GET['property_type'] ?>';
      <?php }else{ ?>
        type = '';
      <?php } 
      ?>
      var bed = '';
      <?php 
      if(isset($_GET['bed'])){ ?>
        bed = '<?php echo $_GET['bed'] ?>';
      <?php }else{ ?>
        bed = '';
      <?php } 
      ?>

       var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>
      var parking_space = '';
      <?php 
      if(isset($_GET['parking_space'])){ ?>
        parking_space = '<?php echo $_GET['parking_space'] ?>';
      <?php }else{ ?>
        parking_space = '';
      <?php } 
      ?>
      
     $.ajax({url:'/wanted',method: 'get', data:{property_type : type ,bed :bed ,construction_year:construction_year, parking_space : parking_space },success:function(result){
      // alert(result);
      $("#div1").html(result);
      $( '.selectpicker' ).selectpicker( 'refresh' );
    }});
    }



    else if(value == "Buy")
     {
       var type = '';
      <?php 
      if(isset($_GET['property_type'])){ ?>
        type = '<?php echo $_GET['property_type'] ?>';
      <?php }else{ ?>
        type = '';
      <?php } 
      ?>
      var bed = '';
      <?php 
      if(isset($_GET['bed'])){ ?>
        bed = '<?php echo $_GET['bed'] ?>';
      <?php }else{ ?>
        bed = '';
      <?php } 
      ?>

       var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>
      var parking_space = '';
      <?php 
      if(isset($_GET['parking_space'])){ ?>
        parking_space = '<?php echo $_GET['parking_space'] ?>';
      <?php }else{ ?>
        parking_space = '';
      <?php } 
      ?>


      var construction_status = '';
      <?php 
      if(isset($_GET['construction_status'])){ ?>
        construction_status = '<?php echo $_GET['construction_status'] ?>';
      <?php }else{ ?>
        construction_status = '';
      <?php } 
      ?>


        $.ajax({url:'/buy',  data:{property_type : type ,bed :bed ,construction_year:construction_year, parking_space : parking_space ,construction_status : construction_status },success:function(result){
      $("#div1").html(result);
      $( '.selectpicker' ).selectpicker( 'refresh' );
    }});
    }
    else if (value =="Project")
    {
      var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>


      var construction_status = '';
      <?php 
      if(isset($_GET['construction_status'])){ ?>
        construction_status = '<?php echo $_GET['construction_status'] ?>';
      <?php }else{ ?>
        construction_status = '';
      <?php } 
      ?>
       var project = '';
      <?php 
      if(isset($_GET['project'])){ ?>
        project = '<?php echo $_GET['project'] ?>';
      <?php }else{ ?>
        project = '';
      <?php } 
      ?>

      $.ajax({url:'/projects', data:{ construction_status :construction_status ,construction_year:construction_year , project: project}, success:function(result){
        $("#div1").html(result);
        $( '.selectpicker' ).selectpicker( 'refresh' );
      }});
    }
      $(document).on("change", "select[id^='selete_type']", function() {
      value =$('select#selete_type option:selected').text();
        if(value == "Rent")
    { 
      // alert($(".rent_property_type").val());
      var type = '';
      <?php 
      if(isset($_GET['property_type'])){ ?>
        type = '<?php echo $_GET['property_type'] ?>';
      <?php }else{ ?>
        type = '';
      <?php } 
      ?>
      var bed = '';
      <?php 
      if(isset($_GET['bed'])){ ?>
        bed = '<?php echo $_GET['bed'] ?>';
      <?php }else{ ?>
        bed = '';
      <?php } 
      ?>

       var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>
      var parking_space = '';
      <?php 
      if(isset($_GET['parking_space'])){ ?>
        parking_space = '<?php echo $_GET['parking_space'] ?>';
      <?php }else{ ?>
        parking_space = '';
      <?php } 
      ?>

      $.ajax({url:'/rent',method: 'get', data:{property_type : type ,bed :bed ,construction_year:construction_year, parking_space : parking_space },success:function(result){
        $("#div1").html(result);
        $( '.selectpicker' ).selectpicker( 'refresh' );
        // console.log($(".rent_property_type").val());
      }});
    }
    else if(value == "Buy")
    {
       var type = '';
      <?php 
      if(isset($_GET['property_type'])){ ?>
        type = '<?php echo $_GET['property_type'] ?>';
      <?php }else{ ?>
        type = '';
      <?php } 
      ?>


      var bed = '';
      <?php 
      if(isset($_GET['bed'])){ ?>
        bed = '<?php echo $_GET['bed'] ?>';
      <?php }else{ ?>
        bed = '';
      <?php } 
      ?>

       var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>


      var construction_status = '';
      <?php 
      if(isset($_GET['construction_status'])){ ?>
        construction_status = '<?php echo $_GET['construction_status'] ?>';
      <?php }else{ ?>
        construction_status = '';
      <?php } 
      ?>


      var parking_space = '';
      <?php 
      if(isset($_GET['parking_space'])){ ?>
        parking_space = '<?php echo $_GET['parking_space'] ?>';
      <?php }else{ ?>
        parking_space = '';
      <?php } 
      ?>


    $.ajax({url:'/buy',  data:{property_type : type ,bed :bed ,construction_year:construction_year, parking_space : parking_space , construction_status :construction_status},success:function(result){
        $("#div1").html(result);
       $( '.selectpicker' ).selectpicker( 'refresh' );
      }});
    }

    else if (value =="Project")
    {
      var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>


      var construction_status = '';
      <?php 
      if(isset($_GET['construction_status'])){ ?>
        construction_status = '<?php echo $_GET['construction_status'] ?>';
      <?php }else{ ?>
        construction_status = '';
      <?php } 
      ?>

       var project = '';
      <?php 
      if(isset($_GET['project'])){ ?>
        project = '<?php echo $_GET['project'] ?>';
      <?php }else{ ?>
        project = '';
      <?php } 
      ?>

      $.ajax({url:'/projects',data:{ construction_status :construction_status ,construction_year:construction_year ,project :project},success:function(result){
        $("#div1").html(result);
        $( '.selectpicker' ).selectpicker( 'refresh' );     
         }});
    }

    else if(value == "Wanted")
    {
      var type = '';
      <?php 
      if(isset($_GET['property_type'])){ ?>
        type = '<?php echo $_GET['property_type'] ?>';
      <?php }else{ ?>
        type = '';
      <?php } 
      ?>
      var bed = '';
      <?php 
      if(isset($_GET['bed'])){ ?>
        bed = '<?php echo $_GET['bed'] ?>';
      <?php }else{ ?>
        bed = '';
      <?php } 
      ?>

       var construction_year = '';
      <?php 
      if(isset($_GET['construction_year'])){ ?>
        construction_year = '<?php echo $_GET['construction_year'] ?>';
      <?php }else{ ?>
        construction_year = '';
      <?php } 
      ?>
      var parking_space = '';
      <?php 
      if(isset($_GET['parking_space'])){ ?>
        parking_space = '<?php echo $_GET['parking_space'] ?>';
      <?php }else{ ?>
        parking_space = '';
      <?php } 
      ?>
      
     $.ajax({url:'/wanted',method: 'get', data:{property_type : type ,bed :bed ,construction_year:construction_year, parking_space : parking_space },success:function(result){
      // alert(result);
      $("#div1").html(result);
      $( '.selectpicker' ).selectpicker( 'refresh' );
    }});
    }
      });
    });

</script>

<script>
  function loadBlocks() {
        phase_id = $( '#phase option:selected' ).val();
      
        $.ajax( {
          url: '/townPhase/' + phase_id,
          type: 'POST',
          datatype: 'html',
          data: phase_id,
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
          success: function ( json ) {
            $( '#block' ).html( json );
            $( '.selectpicker' ).selectpicker( 'refresh' );
          }
        } );
      }

      function loadPhases() {
        town_id = $( '#town option:selected' ).val();
      
        $.ajax( {
          url: '/cityTown/' + town_id,
          type: 'POST',
          datatype: 'html',
          data: town_id,
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
          success: function ( json ) {
            $( '#phase' ).html( json );
            $( '.selectpicker' ).selectpicker( 'refresh' );
            //loadBlocks();
          }
        } );
      }

      function loadTowns() {
        id = $( '#city option:selected' ).val()
        $.ajax( {
          url: '/LocationCity/' + id,
          type: 'POST',
          datatype: 'html',
          data: id,
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
          success: function ( json ) {
            $( '#town' ).html( json );
            $( '.selectpicker' ).selectpicker( 'refresh' );
            //loadPhases();
          }
        } );
      }
      $( '#city' ).change( function () {
        loadTowns();
      } );
      $( '#town' ).change( function () {
        loadPhases();
      } );
      $( '#phase' ).change( function () {
        loadBlocks();
      } );
      if(isset($_GET['city_id'])){
       loadPhases();
      }
</script>
<script>
 $(document).on("click", ".lol", function() {
    var id = $(this).attr('data-id');
    var data = $('#emailform-'+id).serialize();
    var url = '/emailForm';
    $.ajax({
      url:url,
      data:data,
      type:'get',
      headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
      datatype: 'json',
      success:function(){
         
      } 

    });
    
});
 $(".saveProperty").on("click",function(e){
 // $('.saveProperty').click(function(e){
  e.preventDefault();
    id =$(this).attr('data-id');
    var url ="/saveProperty/"+id;


    $.ajax({
      url:url,
      data:id,
      method:'post',
      type:'json',
      headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
      success:function(e){
         toastr.success(e.success);

      }

    });
  });
  
  
  $(".favouriteProperty").on("click",function(e){
 // $('.saveProperty').click(function(e){
  e.preventDefault();
    id =$(this).attr('data-id');
    var url ="/favouriteProperty/"+id;


    $.ajax({
      url:url,
      data:id,
      method:'post',
      type:'json',
      headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
      success:function(e){
        $('#counter').text(e.count)
        if(e.val == 2){
         toastr.success(e.success);
        }
        else
        {
         toastr.warning(e.warning);
        }
        // alert(e.success);
      }

    });
  });

</script>
<script>
  $('form').on('reset', function() {
      var _this = this;
      setTimeout(function() {
      $('.selectpicker',_this).selectpicker('refresh');
      });
    });
</script>
<script>

    var list = [];
  $(document).ready(function(){
    // alert("hello");
    <?php if(!empty(Session::get("compare"))){

      // print_r(Session::get("compare")) 
      ?>
    $( ".comparePanle" ).show();

      <?php
      foreach (Session::get("compare") as $item) {
        ?>
        list.push(<?php echo $item[0]["id"];?>);
        <?php
        // $id = $item[0]["id"];
        // $image = $item[0]["image"];
        // $title = $item[0]["title"];
        // $address = $item[0]["address"];
        // echo '$( ".comparePan" ).append( 
        // <div id="'.$id.'" class="compare-product">
        //   <figure>
        //     <div class="img-container"> 
        //       <div class="img-block">
        //         <img class="img-responsive" src="'.$image.'" alt="image">
        //       </div>
        //     </div>
        //     <figcaption>
        //       <h4>'.$title.'</h4>
        //       <h6>'.$address.'</h6>
        //       <a class="selectedItemCloseBtn">Remove</a>
        //     </figcaption>
        //   </figure>
        // </div> );';
      }
    }
    ?>
  });
  ( function ( $ ) {

    


    /* function to be executed when product is selected for comparision*/
    var IDs = [];
    $( document ).on( 'click', '.addToCompare', function () {
      $( ".comparePanle" ).show();
      $( this ).parents( ".selectProduct" ).toggleClass( "selected" );
      var productID = $( this ).parents( '.selectProduct' ).attr( 'data-id' );
      IDs.push(productID);
      var inArray = $.inArray( productID, list );
      if ( inArray < 0 ) {
        if ( list.length > 1 ) {
          $( "#WarningModal" ).show();
          $( "#myModal" ).modal();
          $( "#warningModalClose" ).click( function () {
            $( "#WarningModal" ).hide();
          } );
          $( this ).parents( ".selectProduct" ).toggleClass( "selected" );
          return;
        }

        if ( list.length <= 2 ) {
          list.push( productID );

          var displayTitle = $( this ).parents( '.selectProduct' ).attr( 'data-title' );

          var displayLocation = $( this ).parents( '.selectProduct' ).attr( 'data-location' );
          var image = $( this ).parents( '.selectProduct' ).attr( 'data-img' );

          // var image = $(this).siblings( ".productImg" ).attr( 'src' );

          $( ".comparePan" ).append( '<div id="' + productID + '" class="compare-product"><figure><div class="img-container"> <div class="img-block"><img class="img-responsive" src="' + image + '" alt="image"></div></div><figcaption><h4>' + displayTitle.substr(0, 40)+'...' + '</h4><h6>' + displayLocation.substr(0, 40)+'...' + '</h6><a class="selectedItemCloseBtn">Remove</a></figcaption></figure></div>' );

          //set session//

          id =productID;
          var url ="/serSessionforCompare";

          $.ajax({
            url:url,
            data:{id:id, title:displayTitle, image:image, address:displayLocation},
            method:'get',
            type:'json',
            headers: {
                  'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
            success:function(e){
              //alert(e.success);
            }

          }); 
        }
      } else {
        list.splice( $.inArray( productID, list ), 1 );
        var url ="/removeSessionCompare";
        $.ajax({
          url:url,
          data:{id:productID},
          method:'get',
          type:'json',
          headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
          success:function(e){
            //alert(e.success);
          }
        }); 
        var prod = productID.replace( " ", "" );
        $( '#' + prod ).remove();

        
        hideComparePanel();

      }
      if ( list.length > 1 ) {

        $( ".cmprBtn" ).addClass( "active" );
        $( ".cmprBtn" ).removeAttr( 'disabled' );
      } else {
        $( ".cmprBtn" ).removeClass( "active" );
        $( ".cmprBtn" ).attr( 'disabled', '' );
      }

    });
    /* function to close the comparision popup */
    $( document ).on( 'click', '.closeBtn', function () {
      $( ".contentPop" ).empty();
      $( ".comparePan" ).empty();
      $( ".comparePanle" ).hide();
      $( ".selectProduct" ).removeClass( "selected" );
      $( ".cmprBtn" ).attr( 'disabled', '' );
      list.length = 0;
    });

    $( document ).on( 'click', '.selectedItemCloseBtn', function () {
      
      id = $(this).parent().parent().parent().attr("id");
      $(this).parent().parent().parent().remove();
      
      var removeItem = id;
      
      var url ="/removeSessionCompare";

      $.ajax({
        url:url,
        data:{id:removeItem},
        method:'get',
        type:'json',
        headers: {
              'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
        },
        success:function(e){
          //alert(e.success);
        }
      }); 

      list = jQuery.grep(list, function(value) {
        return value != removeItem;
      });

      hideComparePanel();
    });
    function hideComparePanel() {
      if ( !list.length ) {
        $( ".comparePan" ).empty();
        $( ".comparePanle" ).hide();
      }
    }
    $( document ).on( 'click', '.cmprBtn', function () {
      
      if(list.length == 2 ){
            var url = '/propertyCompare';
            window.location.href = url;
          }
    });
  } )( jQuery );
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $('.share-button').simpleSocialShare();

  });
</script>
<script>
    $("#number").keyup(function () {
   this.value = this.value.replace(/([^\d]*)(\d*(\.\d{0,2})?)(.*)/, '$2');
});
  </script>