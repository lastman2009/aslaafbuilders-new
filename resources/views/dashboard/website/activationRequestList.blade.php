@php
$title = "Request List For Website Agency";
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
                            <h2>Request List For Agency Website Activation</h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Theme</th>
                                                             <th>URl</th>
                                                             <th>Documents</th>
                                                             <th>Activate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($activation_requests as $activation_request)
                                                    <tr>
                                                        <td>{{$activation_request->agency_name}}</td>
                                                        <td>{{App\Theme::getThemeName($activation_request->theme_id)}}</td>
                                                        <td class="url-{{$activation_request->id}}">{{$activation_request->url}}</td>
                                                       <td> 
                                                           @if($activation_request->verification_documents)
                                                               <ul>
                                                                @php
                                                                    $data =explode(';',$activation_request->verification_documents);
                                                                    $i =1;
                                                                @endphp
                                                                @foreach($data as $dat)
                                                                <li><a href="/documents/{{$dat}}" download="" style="color: red"> Download File No {{$i++}}</li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" class="activeme" name="activate" id="{{$activation_request->id}}">
                                                        </td>
                                                    </tr>                  
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$activation_requests->links()}}
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
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.activeme').click(function(){

        current =$(this);
        var id=$(this).attr('id');
         url ="/dashboard/admin/activateWebsite/"+id;
if (confirm('Are you sure you want to change Status?')) {

            $.ajax({
                    url: url,
                    method: "post",
                    datatype: "json",
                    headers: {
                        'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                    },
                    data: {
                        'status': id
                    },
                    success: function ( e ) {
                            current.parent().parent().remove();
                    }
                } );
        }
    });
});

</script>