@php
$title = "Add Files";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search add-client">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Add File</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/dashboard/addfileName" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 padding-left">
                                             <h4>City</h4>
                                            <select name="city_id" id="city" class="form-control form-select">
                                                    <option value="0">Select</option>

                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                             <h4>Town</h4>
                                            
                                            <div id="phase1" class="form-group padding-left">
                                                <select name="town_id" id="town"  class="form-control" >
                                                </select>
                                            </div>
                                        </div>                               
                                        <div class="col-md-3 padding-left">
                                             <h4>Phase</h4>
                                            <div id="town2" class="form-group padding-left">
                                                <select name="phase_id" id="phase" class="form-control" >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                             <h4>Block</h4>
                                            <div id="town2" class="form-group padding-left">
                                                <select name="block_id" id="block" class="form-control" >
                                                </select>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                    <div class="row" >
                                        <div class="col-md-12">
                                            <div class="col-md-10 padding-left">
                                                 <h4>Title</h4>
                                                <div  class="form-group padding-left">
                                                    <input type="text" class="form-control" name="title">
                                                  
                                                </div>
                                            </div>
                                            <div class="col-md-2 padding-left">
                                                 <h4>Block</h4>
                                                <div class="form-group padding-left">
                                                    <button class="btn btn-primary" type="submit">Submit</button>                                      
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                            </form>
                            </div>
                                    
                        </div>
                        <div class="row">
            <!-- Basic Table -->
            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>All Files</h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Link</th>
                                                            <th>Title</th>
                                                            {{-- <th>URL</th> --}}
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($files as $file)
                                                        <tr>
                                                        <td>{{$file->id}}</td>
                                                        <td><a href="/dashboard/file/{{ $file->id }}/{{ str_slug($file->title)}}" target="_blank"  type="button" class="btn btn-success">Click to Add File Rates</a></td>
                                                        <td>{{ $file->title }}</td>
                                                        {{-- <td>{{ $file->url }}</td> --}}
    
                                                        <td><button  data-id="{{ $file->id }}" class="btn btn-danger delete">Delete</button></td>

                                                        </tr>
                                                        @endforeach
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

            function loadBlocks() {
            phase_id = $( '#phase option:selected' ).val();
            $('#block').empty();
            if(phase_id != ""){

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
                                            }
                });
            }
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
<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var current = $(this);
            var id = current.attr("data-id");
            if (confirm('Are you sure you want to trash this?')) {
               $.ajax({
               type:'post',
               datatype:'json',
               url:'/dashboard/delete_files',
               data:{'id': id , '_token': $('meta[name="csrf-token"]').attr('content')},
               success:function(e){
               current.parent().parent().remove();

                }
            });
            }
        });
        });
</script>

