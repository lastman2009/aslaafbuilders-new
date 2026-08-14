@php
$title = "Properties Pending List For Admin";
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
                        <h2>Pending Project List For Admin</h2>
                            <div class="table-wrap">
                             <div class="panel panel-default card-view user-list-portion">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>                                  
                                                <th>City</th>
                                                <th>Town</th>                                        
                                                <th>Address</th>
                                                <th>Publish/Unpublish</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($properties as $property)
                                            <tr>
                                                <td>{{$property->title}}</td>                                      
                                                <td>{{$property->city->name}}</td>
                                                <td>{{$property->town->name}}</td>   
                                                <td>{{$property->address}}</td>
                                                 @if($property->status == 1)
                                                <td class="status-user-{{$property->id}}">Active</td>
                                                @else
                                                <td class="status-user-{{$property->id}} blocked-text">Pending</td>
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
                                                     <a href="{{$property->url}}/{{$property->id}}" class="mr-5 " data-toggle="tooltip" data-original-title="Preview"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
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
                   "bPaginate": false
               });

        $(function () {
            $('.toggle-icon').click(function () {
                $(this).find('i').toggleClass('fa-unlock fa-lock');
            });
                });

                $('.toggle-icon').click(function () {
                    var id = $(this).attr('id');
              
                    var current=$(this);
                    if ($('.status-user-'+id).text() == 'Active')
                    {
                        $('.status-user-'+id).text('Pending').removeClass('active-text').addClass('blocked-text');

                    } else
                    {
                
                        $('.status-user-'+id).text('Active').removeClass('blocked-text').addClass('active-text');

                    }
                    url ='/propertyActiveOrUnactiveByAdmin/'+id;
                
                     if (confirm('Are you sure you want to change Status?')) {
                               $.ajax({

                                datatype:'json',
                                url:url,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                data:id,
                                type:'post',
                                success:function(e){  
                                    
                                 current.parent().parent().remove();


                            }
                           });
                           }
                          
                });

        $('.trash').click(function()
        {
            var current=$(this);
           var id = $(this).data('id');
           var url ='/trashProperty/'+id;

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