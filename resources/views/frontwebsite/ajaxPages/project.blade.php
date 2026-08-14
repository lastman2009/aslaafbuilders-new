<div class="advance-dropdown-section project">
  <select class="selectpicker" title="Projects" name="project" data-style="form-control btn-default btn-outline">
    <?php $projects =['Residential Projects','Commercial Projects']; ?>
    @foreach($projects  as $project )
       @if(isset($_GET['project']) && $project == $_GET['project'])

        <option value="{{$project}}" selected>{{$project}}</option>
        @else
        <option value="{{$project}}">{{$project}}</option>
      @endif
    @endforeach
  </select>

<!--    Advance Project Search All Residential & Commercial -->
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
</div>
