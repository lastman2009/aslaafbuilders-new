@php
$title = "Property Messages";
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
                        <h2>Message Listing</h2>
                        <div class="table-wrap">
                             <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone no</th>
                                                            <th>Message</th>
                                                            <th>Property no</th> 
                                                            <th>Actions</th>
                                                            <th>Read</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                    <?php $i=1?>
                                                    @foreach($messages as $message)
                                                    <tr>
                                                        <td>{{$message->name}}</td>
                                                        <td>{{$message->phone}}</td>
                                                        <td><?php if(strlen(strip_tags($message->message)) > 30) echo substr(strip_tags(strip_tags($message->message)),0,30).'...'; else echo strip_tags($message->message); ?></td>
                                                        <?php
                                                            $property =App\Property::getUrl($message->property_id);
                                                        ?>
                                                        <td><a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}">{{$message->property_id}}</a>
                                                        </td>
                                                        <td>
                                                        <a href="#" class="mr-5 trash"  data-id="{{$message->id}}" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i></a> 
                                                        </td>
                                                        <td><a  data-toggle="modal" data-id="{{$message->id}}" data-target="#myModal<?php echo $i;?>" href="javascript:void(0);" class="btn btn-sm add-property-featured message-read-btn @if($message->read_status == 0) btn-success @endif">Read</a></td>
                                                        <!-- <td><a href="javascript:void(0);" class="btn btn-sm add-property-hot">Read</a></td> -->
                                                    </tr>

                                                    <div id="myModal<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h5 class="modal-title" id="myModalLabel">Message</h5>
                                                                </div>
                                                                <div class="modal-body model-popup">
                                                                    
                                                                    <p>{{$message->message}} </p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $i++?>
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
</div>



    <!-- /Row -->
@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-userlist').DataTable();   
    });
</script>
<script>
       $('.trash').click(function(e)
        {
            e.preventDefault();
           var current=$(this);
           var id = $(this).data('id');         
           var url='/deleteMessage/'+id;
        
    if (confirm('Are you sure you want to change Status this?')) {
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
       $('.message-read-btn').click(function(e)
        {
            e.preventDefault();
            var current=$(this);
            var id = $(this).data('id');         
            var url='/markMessageAsRead/'+id;
            // alert(id);

            $.ajax({
            datatype:'json',
            url:url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            data:id,
            type:'post',
            success:function(e){
                current.removeClass("btn-success");
                // alert(e.success);
            }
           });
       
        });

</script>