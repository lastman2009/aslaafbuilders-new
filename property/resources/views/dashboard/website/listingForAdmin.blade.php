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
                        <h2>All Website Listing</h2>
                            <div class="table-wrap">
                            
                             <div class="panel panel-default card-view user-list-portion">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Agency Name</th>
                                                <th>Status</th>
                                                <th>Theme</th>
                                                <th>Dcoument</th>
                                                <th>Contact No</th>
                                                <th>URL</th>
                                                <th>Website</th>
                                              

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($websites as $user_website)
                                           <tr>
                                               <td>
                                                   #
                                               </td>
                                               <td>{{$user_website->agency_name}}</td>
                                               <td>{{$user_website->status}}</td>
                                                <td>{{App\Theme::getThemeName($user_website->theme_id)}}</td>
                                                
                                               <!-- <td>{{$user_website->verification_documents}}</td> -->
                                               <td> 
                                               @if($user_website->verification_documents)
                                                   <ul ">
                                                    @php
                                                        $data =explode(';',$user_website->verification_documents);
                                                        $i =1;
                                                    @endphp
                                                    @foreach($data as $dat)
                                                    <li><a href="/documents/{{$dat}}" download="" style="color: red"> Download File No {{$i++}}</li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                               </td>
                                               <td>{{$user_website->contact_number}}</td>
                                               <td>{{$user_website->url}}</td>
                                               <td><a href="/agency/{{$user_website->url}}">View Website</a></td>
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