@php
$title = "Properties Saved List FAQ";
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
                            <h2>My Saved Property</h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Type</th>
                                                            <th>City</th>
                                                            <th>Town</th>
                                                            <th>Image</th>
                                                            <th>Address</th>
                                                            <th>Publish/Unpublish</th>
                                                            <th>View Property</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($properties as $property)
                                                        <tr>
                                                           <td>{{$property->title}}</td> 
                                                           <td>
                                                           	@if($property->purpose  == 1)
                                                           	Buy/Sale
                                                           	@elseif($property->purpose == 2)
                                                           	Rent
                                                           	@elseif($property->purpose == 2)
                                                           	Wanted
                                                           	@else
                                                           	Project
                                                           	@endif


                                                           </td>                          
                                                            <td>{{$property->city->name}}</td>
                                                            <td>{{$property->town->name}}</td>
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
                                                                
                                                                 <a  href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}"  class="  " data-toggle="tooltip" data-original-title="Edit"> 
                                                                    <i class="fa fa-eye text-inverse "></i> 
                                                                </a>


                                                            </td>
                                                            <td>
                                                            	<a href="javascript:void(0)" class="mr-5 trash"  data-toggle="tooltip" data-id="{{$property->id}}" data-original-title="Delete"> 
                                                                    <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                                </a> 
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
        </div>
    </div>



<!-- /Row -->
@include('includes_admin.footer')
<script>
    $(document).ready(function () {
       $('#datatable-userlist').DataTable({
         "bPaginate": false,
       });
        $(function () {
            $('.toggle-icon').click(function () {
                $(this).find('i').toggleClass('fa-unlock fa-lock');
            });
        });

        $('.trash').click(function()
        {
            var current=$(this);
            var id = $(this).data('id');
            var url ='/dashboard/unsave/property/'+id;

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