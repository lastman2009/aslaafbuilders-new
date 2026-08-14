@php
$title = "All Properties List";
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
                            <h2>All Properties</h2>
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

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($properties as $property)
                                                         @if($property->purpose != 4)
                                                        <tr>
                                                            <td>{{$property->id}}</td>
                                                            <td>{{$property->title}}</td>
                                                            <td>{{ $property->propertyType->name }}</td>
                                                            @if($property->purpose == 1)
                                                            <td>For Sale</td>
                                                            @elseif($property->purpose == 2)
                                                            <td>For Rent</td>
                                                            @elseif($property->purpose == 3)
                                                            <td>Wanted</td>
                                                            @else
                                                            <td>Project</td>

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
                                                            @if($property->status == 1)
                                                            <td class="status-user-{{$property->id}}">Published</td>
                                                            @else
                                                            <td class="status-user-{{$property->id}} blocked-text">Un-Published</td>
                                                            @endif

                                                            <td>
                                                                <a href="javascript:void(0)" class="mr-5 trash"  data-id="{{$property->id}}" data-toggle="tooltip" data-original-title="Delete"> 
                                                                    <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                                </a> 
                                                                @if($property->status == 1)
                                                                <a href="javascript:void(0)" id="{{$property->id}}" class="toggle-icon mr-5 " data-toggle="tooltip" data-original-title="publish / Unpublish"> 
                                                                    <i class="fa fa-unlock text-inverse m-r-10"></i> 
                                                                </a> 
                                                                @else
                                                                <a href="javascript:void(0)" id="{{$property->id}}" class="toggle-icon mr-5 " data-toggle="tooltip" data-original-title="publish /Unpublish"> 
                                                                    <i class="fa fa-lock text-inverse m-r-10"></i> 
                                                                </a>
                                                                @endif  
                                                                   @if(App\User::checkAgent(Auth::id()) || (Auth::user()->roleId() == 1))
                                                                 <a href="/dashboard/property/edit/{{App\Property::getId($property->id)}}"  class="  " data-toggle="tooltip" data-original-title="Edit"> 
                                                                    <i class="fa fa-pencil text-inverse "></i> 
                                                                </a>
                                                                @endif
                                                                
                                                                 <a href="/dashboard/property/quickedit/{{App\Property::getId($property->id)}}"  class="  " data-toggle="tooltip" data-original-title="Quick Edit"> 
                                                                    <i class="fa fa-pencil-square-o text-inverse "></i> 
                                                                </a>


                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach                                            
                                                    </tbody>
                                                </table>
                                                {{$properties->links()}}
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
        </div>
    </div>



<!-- /Row -->
@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-userlist').DataTable({
            "bPaginate": false
        });
        $(function () {
            $('.toggle-icon').click(function () {
                $(this).find('i').toggleClass('fa-unlock fa-lock');
            });
        });

        $('.toggle-icon').click(function () {
            var id = $(this).attr('id');


            if ($('.status-user-'+id).text() == 'Published')
            {
                $('.status-user-'+id).text('Un-Published').removeClass('active-text').addClass('blocked-text');

            } else
            {

                $('.status-user-'+id).text('Published').removeClass('blocked-text').addClass('active-text');

            }
            url ='propertyBlockorActive/'+id;

            if (confirm('Are you sure you want to change Status?')) {

                $.ajax({
                    datatype:'json',
                    url:url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:id,
                type:'post',
                success:function(e){     
                }
            });
            }

        });

        $('.trash').click(function()
        {
            var current=$(this);
            var id = $(this).data('id');
            var url ='trashProperty/'+id;

            if (confirm('Are you sure you want to trash this?')) {
                $.ajax({
                    datatype:'json',
                    url:url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:id,
                type:'post',
                success:function(e){
// console.log(e.success);
                current.parent().parent().remove();

}
});
            }
        });
    });
</script>