@php
$title = "Activated List For Website Agency";
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
                            <h2>Activated  List For Agency Website</h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                            <div class="panel panel-default card-view user-list-form">
                                                  <div class="panel-wrapper collapse in">
                                                <div class="panel-body">


                                
                                            <form class="" action="/dashboard/admin/search/activated/website" method="POST">
                                                {{ csrf_field() }}
                                                <div class="">
                                                    <div class="col-lg-12 padding-right" style="padding-left: 10px;">
                                                        <div class="form-group col-md-2 padding-left">
                                                          <label for="id">ID</label>
                                                          <input type="text" name="id" class="form-control" id="id" placeholder="ID">
                                                        </div>
                                                        <div class="form-group col-md-2 padding-left">
                                                          <label for="name">Agency Name</label>
                                                          <input type="text" class="form-control" name="agency_name" id="name" placeholder="Name">
                                                        </div>
                                                        <div class="form-group col-md-2 padding-left">
                                                          <label for="name">Email</label>
                                                          <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group col-md-2 padding-left">
                                                          <label for="name">Contact Number</label>
                                                          <input type="text" name="contact_number" class="form-control" id="email" placeholder="Contact Number">
                                                        </div>
                                                       
                                                        <div class="form-group col-md-2 padding-left pull-right">
                                                          <button  style="margin-top: 15px;" class="btn btn-danger btn-anim btn-user-search"><i class="fa fa-trash-o"></i><span class="btn-text">Search</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                            </div>
                                        </div>
                                    </div>



                                                <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Theme</th>
                                                             <th>URl</th>
                                                             <th>Documents</th>
                                                             <th>De-activate</th>


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
                                                               <ul ">
                                                                @php
                                                                    $data =explode(';',$activation_request->verification_documents);
                                                                    $i =1;
                                                                @endphp
                                                                @foreach($data as $dat)
                                                                <li><a href="/documents/{{$dat}}" download style="color: red"> Download File No {{$i++}}</li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" class="deactive" name="activate" id="{{$activation_request->id}}">
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
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.deactive').click(function(){

        current =$(this);
        var id=$(this).attr('id');
         url ="/dashboard/admin/deactivateWebsite/"+id;
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