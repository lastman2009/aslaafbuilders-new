@php
$title = "Properties Pending List ";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')




<div class="page-wrapper">
    <div class="container-fluid">


        <div class="row">
            <!-- Basic Table -->
            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                        <h2>My Pending Property</h2>
                            <div class="table-wrap">
                             <div class="panel panel-default card-view user-list-portion">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Purpose</th>
                                                <th>Price</th>
                                                <th>City</th>
                                                <th>Town</th>
                                                <th>Phase</th>
                                                <th>Block</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                <th>Publish/Unpublish</th>
                                                <th>Preview</th></th>

                                  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($properties as $property)
                                            <tr>
                                                <td>{{$property->id}}</td>
                                                <td>{{$property->title}}</td>
                                                <td>{{ $property->propertyType->name }}</td>
                                                @if($property->purpose == 1)
                                                <td>For Sale</td>
                                                @elseif($property->purpose == 2)
                                                <td>For Rent</td>
                                                @else($property->purpose == 3)
                                                <td>Wanted</td>
                                                @endif

                                                <td>{{$property->price}}</td>
                                                <td>{{$property->city->name}}</td>
                                                <td>{{$property->town->name}}</td>
                                                <td>{{$property->phase->name}}</td>
                                                <td>{{$property->block->name}}</td>
                                                <td>{{$property->address}}</td>
                                                @if($property->gallery != "")
                                                <?php
                                                $images = explode(';', $property->gallery);
                                                ?>
                                                <td><img src="/images/property/user_property/thumb_{{$images[0]}}" alt="image"></td>
                                                @else
                                                <td>No Image</td>
                                                @endif
                                                <td class="status-user-{{$property->id}} blocked-text">Pending</td>
                                                <td> <a href="{{$property->url}}/{{$property->id}}" class="toggle-icon mr-5 " data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a></td>
                                            </tr>
                                        @endforeach                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    {{$properties->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Basic Table -->
        </div>
    </div>
</div>



    <!-- /Row -->
@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-userlist').DataTable({
            "bPaginate": false,
        });
    });
</script>