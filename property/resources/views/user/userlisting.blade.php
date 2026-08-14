@php
$title = "Users List";
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
                        <h2>User List For Admin</h2>
                            <div class="table-wrap">
                             <div class="panel panel-default card-view user-list-portion">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Telephone</th>
                                                <th>City</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->mobile}}</td>
                                                <td>{{$user->telephone}}</td>
                                                <td>{{$user->city}}</td>
                                                @if($user->status == 1)
                                                <td class="status-user-{{$user->id}}">Active</td>
                                                @else
                                                <td class="status-user-{{$user->id}} blocked-text">Blocked</td>
                                                @endif
                                                <td><?php 
                                                $date = strtotime($user->created_at);
                                                echo date('Y-m-d',$date);?></td>
                                                @if($user->role_id ==1 )
                                                <td>Admin</td>
                                                @else
                                                <td>User</td>
                                                @endif
                                                <td>
                                                    <a href="#" class="mr-5 trash"  data-id="{{$user->id}}" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a> 
                                                    @if($user->status == 1)
                                                    <a href="#" id="{{$user->id}}" class="toggle-icon mr-5 " data-toggle="tooltip" data-original-title="Blocked / Active"> 
                                                        <i class="fa fa-unlock text-inverse m-r-10"></i> 
                                                    </a> 
                                                    @else
                                                    <a href="#" id="{{$user->id}}" class="toggle-icon mr-5 " data-toggle="tooltip" data-original-title="Blocked / Active"> 
                                                        <i class="fa fa-lock text-inverse m-r-10"></i> 
                                                    </a>
                                                    @endif   
                                                    <a href="/dashboard/profile/pk1000-{{$user->id}}/{{$user->first_name}}" class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a> 
                                                  
                                                    <!-- <a href="#" data-toggle="tooltip" data-original-title="Edit" > 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a> -->
                                                </td>
                                            </tr>
                                        @endforeach                                            
                                        </tbody>
                                    </table>
                                    {{$users->links()}}
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
                // $(this).find('i').toggleClass('fa-unlock fa-lock');
            });
                });

                $('.toggle-icon').click(function () {
                    var id = $(this).attr('id');
                    var _this = $(this);

                  
                    url ='/blockORactive/'+id;
                      if (confirm("OK to submit?")) {
                               $.ajax({
                                datatype:'json',
                                url:url,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                data:id,
                                type:'post',
                                success:function(e){ 
                                    _this.find('i').toggleClass('fa-unlock fa-lock');
                  if ($('.status-user-'+id).text() == 'Active')
                    {
                        // $(this).find('i').toggleClass('fa-unlock fa-lock');

                        $('.status-user-'+id).text('Blocked').removeClass('active-text').addClass('blocked-text');

                    } else
                    {
                        // $(this).find('i').toggleClass('fa-lock fa-lock');

                                    // _this.find('i').toggleClass('fa-lock fa-lock');
                        $('.status-user-'+id).text('Active').removeClass('blocked-text').addClass('active-text');

                    }    
                            }
                           });
                           }
                });

        $('.trash').click(function()
        {
            var current=$(this);
           var id = $(this).data('id');
           var url ='/trashUser/'+id;
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