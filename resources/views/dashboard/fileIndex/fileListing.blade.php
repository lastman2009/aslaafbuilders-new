@php
$title = "Add Files";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search add-client">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h5  style="color: #f0b709;">Add File against {{ $file_title }}</h5>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/dashboard/addfiles" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 padding-left">
                                            <h5>Title</h5>
                                            <input type="text" class="form-control" name="title">
                                        </div>     
                                        <div class="col-md-2 padding-left">
                                            <h5>Area</h5>
                                            <div id="town2" class="form-group padding-left">
                                                <select name="area" class="form-control" >
                                                    <option value="0">Select</option>
                                                        @for($i=1; $i<=10; $i++ )
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>     
                                        <div class="col-md-2 padding-left">
                                            <h5>Type</h5>
                                            <div id="town2" class="form-group padding-left">
                                                <select name="type" id="type" class="form-control" >
                                                    <option value="0">Select</option>
                                                    <option value="marla">Marla</option>
                                                    <option value="kanal">Kanal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 padding-left">
                                            <h5>Price</h5>
                                            <input type="number" class="form-control" name="price">
                                        </div>                           
                                        <div class="col-md-3 padding-left">
                                             <h5>Purpose</h5>
                                            <div id="purpose" class="form-group padding-left">
                                                <select name="purpose" id="purpose" class="form-control" >
                                                    <option value="0">Select</option>
                                                    <option value="residential">Residential</option>
                                                    <option value="commercial">Commercial</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 padding-left">
                                             <h5>Date</h5>
                                             <input type="date" name="date" class="form-control" name="title">
                                             <input type="hidden" value="{{$id}}" name="id">
                                        </div>
                                        <div class="col-md-3  padding-left">
                                             <h5>Contact</h5>
                                             <input type="text" name="contact" class="form-control" name="title">
                                        </div>
                                        <div class="col-md-6 padding-left">
                                                 <h5>Button</h5>
                                                <div class="form-group padding-left">
                                                    <button class="btn btn-success" type="submit">Submit</button>                                      
                                                </div>
                                        </div>                                              
                                    </div>
                                </div>
                            </form>
                            </div>
                                    
                        </div>
            <div class="row">
            <!-- Basic Table -->
            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>All Files</h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="datatable-userlist" class="table table-striped table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                           <th>Title</th>
                                                            <th>Area</th>
                                                            <th>Purpose</th>
                                                            <th>Price</th>
                                                            <th>Date</th>
                                                            <th>Contact</th>
                                                            <th>Difference</th>
                                                            <th>Index</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                      @foreach($file_listings as $file_listing)
                                                       <?php 
                                                            $color =($file_listing->color == "G")? "green" :"red";
                                                            $sign =($file_listing->color == "G")? "+" :"-";
                                                         ?>
                                                      <tr>
                                                         <td>{{ $file_listing->title }} </td> 
                                                         <td>{{ $file_listing->area }} {{ $file_listing->type }}</td> 
                                                         <td>{{ $file_listing->purpose }}</td> 
                                                         <td>{{ $file_listing->price }}</td> 
                                                         <td>{{ $file_listing->date }}</td> 
                                                         <td>{{ $file_listing->contact }}</td> 
                                                         <td style="color:{{ $color }}">{{ $sign }}{{ $file_listing->difference }}</td> 

                                                        
                                                         <td style="color:{{ $color }}">{{ $sign }}{{ $file_listing->index }}</td> 




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
        </div>
                    </div>
                </div>
            </div>

            
        </div>

        <!-- /Row -->

@include( 'includes_admin.footer' )

<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var current = $(this);
            var id = current.attr("data-id");
            if (confirm('Are you sure you want to trash this?')) {
               $.ajax({
               type:'post',
               datatype:'json',
               url:'/dashboard/delete_files',
               data:{'id': id , '_token': $('meta[name="csrf-token"]').attr('content')},
               success:function(e){
               current.parent().parent().remove();

                }
            });
            }
        });
        });
</script>

