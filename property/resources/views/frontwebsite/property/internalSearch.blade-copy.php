@php
$title = "Search";
$base = "https://www.rightdeed.com/";
@endphp
@include("includes.title")

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
                $purposes =['1'=>'Buy','2'=>'Rent','3'=>'Wanted'];

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
          <input class="form-control advance-measure" id="number" type="number" value="<?php
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
     @if(isset($_GET['town_id']))
     
     {{$towns = App\City::getTowns($_GET['city_id'])}}
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
<div class="recent-blogs">
  <img class="img-responsive" src="/assets/images/img2.jpg">
</div>
<div class="recent-blogs">
  <img class="img-responsive" src="/assets/images/img2.jpg">
</div>

</div>
<div class="col-md-9 col-sm-12 col-xs-12">

  <div class="row">
    <div class="col-md-12 features">
      <figure class="pull-left home-icon"><img src="/assets/images/home-icon.jpg"> </figure>
      <div class="feature-heading advance-feature-heading pull-left">
        <h6><span>{{$count}}</span> Results found for Property  {{$name}} in Pakistan</h6>
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

@include('includes.footer')
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

      $.ajax({url:'/project', data:{ construction_status :construction_status ,construction_year:construction_year , project: project}, success:function(result){
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

      $.ajax({url:'/project',data:{ construction_status :construction_status ,construction_year:construction_year ,project :project},success:function(result){
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
          url: 'townPhase/' + phase_id,
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
          url: 'cityTown/' + town_id,
          type: 'POST',
          datatype: 'html',
          data: town_id,
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
          success: function ( json ) {
            $( '#phase' ).html( json );
            $( '.selectpicker' ).selectpicker( 'refresh' );
            loadBlocks();
          }
        } );
      }

      function loadTowns() {
        id = $( '#city option:selected' ).val()
        $.ajax( {
          url: 'LocationCity/' + id,
          type: 'POST',
          datatype: 'html',
          data: id,
          headers: {
            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
          },
          success: function ( json ) {
            $( '#town' ).html( json );
            $( '.selectpicker' ).selectpicker( 'refresh' );
            loadPhases();
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
       loadPhases();
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

</script>
<script>
  $('form').on('reset', function() {
      var _this = this;
      setTimeout(function() {
      $('.selectpicker',_this).selectpicker('refresh');
      });
    });
</script>