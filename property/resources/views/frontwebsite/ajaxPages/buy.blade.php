 <?php 

 ?>
<div class="advance-dropdown-section buy">
  <select class="selectpicker rent_property_type" title="Property Type" id="rent_property_type" name="property_type" data-style="form-control btn-default btn-outline" >
    @foreach($propertyTypes as $propertyType)
    <optgroup label="{{$propertyType->name}}">
      @foreach($data[$propertyType->id] as $datas)
        @if(isset($_GET['property_type']) && $datas->id == $_GET['property_type'])
      <option value="{{$datas->id}}" selected>{{$datas->name}}</option>
        @else
      <option value="{{$datas->id}}">{{$datas->name}}</option>
        @endif
      @endforeach
      <hr>
    </optgroup>
    @endforeach
  </select>
  <select class="selectpicker" name="bed" title="Bed Room" data-style="form-control btn-default btn-outline">
    <?php $bed_rooms =['1','2','3','4','5','6','7','8','9','10']?>
    @foreach($bed_rooms as $room)
     @if(isset($_GET['bed']) && $room == $_GET['bed'])
      <option value="{{$room}}" selected>{{$room}}</option>
        @else
      <option value="{{$room}}">{{$room}}</option>
        @endif
    @endforeach
  </select>
   <select class="selectpicker"  title="Construction Year" name="construction_year" data-style="form-control btn-default btn-outline">
      <?php $construction_years =['1-5','6-10','15-20','20-25','31-35','41'];?>

      @foreach($construction_years as $construction_year)

       @if(isset($_GET['construction_year']) && $construction_year == $_GET['construction_year'])
        <option value="{{$construction_year}}" selected>{{$construction_year}} Years Old</option>
     
        @else
        <option value="{{$construction_year}}">{{$construction_year}} Years Old</option>
      
        @endif

      @endforeach
    
  </select>
    
  <select class="selectpicker" name="construction_status" title="Construction Status" data-style="form-control btn-default btn-outline">
    <?php $construction_status=['Complete' ,'Under Construction' ,'Grey Structure']; ?>
    @foreach($construction_status as $construction)


       @if(isset($_GET['construction_status']) && $construction == $_GET['construction_status'])
        <option value="{{$construction}}" selected >{{$construction}}</option>
     
        @else
          <option value="{{$construction}}">{{$construction}}</option>
      @endif
    @endforeach
  </select>
   <select class="selectpicker"  title="Parking Space"  name="parking_space" data-style="form-control btn-default btn-outline">
    <?php $parking_spaces =['1','2','3','4','5'];?>
      @foreach($parking_spaces as $parking)
      @if(isset($_GET['parking_space']) && $parking == $_GET['parking_space'])
    <option value="{{$parking}}" selected>{{$parking}}+ Car </option>
    @else
    <option value="{{$parking}}">{{$parking}}+ Car </option>
    
    @endif
    @endforeach
  </select>
</div>
<!-- <button type="reset" class="btn-advance-search">Reset</button> -->

