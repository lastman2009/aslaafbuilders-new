@php
$title = "Add Map To Phase";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search add-client">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Add Map To Phase</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/assignMaptoPhase" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 padding-left">
                                             <h4>City</h4>
                                            <select name="city" id="city" class="form-control form-select">
                                                    <option value="0">Select</option>

                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                             <h4>Town</h4>
                                            
                                            <div id="phase1" class="form-group padding-left">
                                                <select name="town" id="town"  class="form-control" >
                                                </select>
                                            </div>
                                        </div>                               
                                        <div class="col-md-3 padding-left">
                                             <h4>Phase</h4>
                                            <div id="town2" class="form-group padding-left">
                                                <select name="phase" id="phase" class="form-control" >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                             <h4>Map</h4>
                                           <select name="map" id="map" class="form-control form-select">
                                                    <option value="0">Select</option>
                                                @foreach($maps as $map)
                                                    <option value="{{ $map->image }}">{{$map->image}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                    <div class="row" >
                                        <div class="col-md-1 col-md-offset-10 padding-right">
                                        
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Row -->

@include( 'includes_admin.footer' )

<script>
    function loadPhases(){
                town_id =$('#town option:selected').val();
                $.ajax({
                    url: '/cityTown/'+town_id,
                    type: 'POST',
                    datatype:'html',
                    data:town_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        $('#phase').html(json);
                        loadBlocks();
                    }
                });
            }
            function loadTowns(){
                id =$('#city option:selected').val()
                $.ajax({
                    url: '/LocationCity/'+id,
                    type:'POST',
                    datatype:'html',
                    data: id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        $('#town').html(json);
                        loadPhases();
                    }
                });
            }
            $('#city').change(function () {
                loadTowns();
            });
            $('#town').change(function () {
                loadPhases();
            });
            $('#phase').change(function () {
                loadBlocks();
            });
</script>

