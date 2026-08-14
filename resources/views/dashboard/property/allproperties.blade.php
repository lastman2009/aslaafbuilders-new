@php
$title = "Properties List";
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
                        <h2>All Property List</h2>
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
                                                <th>Actions</th>

                                                
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
                                                @if($property->status ==0)
                                                <td class="Pending-{{$property->id}} ">Pending</td>
                                                @elseif($property->status == 1)
                                                 <td class="Active-{{$property->id}} ">Active</td>   
                                                @elseif($property->status == 2)
                                                <td class="status-user-{{$property->id}} ">Un-Active</td>
                                                @elseif($property->status ==3)
                                                <td class="Trashed-{{$property->id}}">Trashed</td>
                                                @endif
                                                <td>
                                                    <a href="javascript:void(0)" data-status="1"  data-id="{{$property->id}}" class="btn btn danger changeStatus">Active</a>
                                                    <a href="javascript:void(0)" data-status="0" data-id="{{$property->id}}"  class="btn btn success changeStatus">Pending</a>
                                                    <a href="javascript:void(0)" data-status="3" data-id="{{$property->id}}" class="btn btn info changeStatus">Trashed</a>
                                                </td>
                                               
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
            <!-- /Basic Table -->
        </
    </div>
</div>



    <!-- /Row -->
@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-userlist').DataTable();   
    });
</script>
<script>
       $('.changeStatus').click(function(e)
        {
            e.preventDefault();
           var current=$(this);
           var status = $(this).data('status');
           var id = $(this).data('id');
            var text= $(this).text();
          
            var url= '/changeStatusofproperty/'+status+'/'+id;
        
    if (confirm('Are you sure you want to change Status this?')) {
           $.ajax({
            datatype:'json',
            url:url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            data:id,
            type:'post',
            success:function(e){
               location.reload();  
        }
       });
       }
    });
</script>