@php
$title = "Search User";
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
                            <h2>Search </h2>
                            <div class="table-wrap">
                                <div class="table-responsive">


									<div class="panel panel-default card-view user-list-form">
										<div class="panel-wrapper collapse in">
											<div class="panel-body">


								
											<form class="" action="/dashboard/admin/search/user/property" method="POST">
												{{ csrf_field() }}
												<div class="">
							                    	<div class="col-lg-12 padding-right" style="padding-left: 10px;">
								                    	<div class="form-group col-md-1 padding-left">
									                      <label for="id">ID</label>
									                      <input type="text" name="id" class="form-control" id="id" placeholder="ID">
									                    </div>
									                    <div class="form-group col-md-3 padding-left">
									                      <label for="name">Name</label>
									                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
									                    </div>
									                    <div class="form-group col-md-3 padding-left">
									                      <label for="name">Email</label>
									                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
									                    </div>
									                    <div class="form-group col-md-3 padding-left">
									                      <label for="name">Phone No</label>
									                      <input type="text" name="phone" class="form-control" id="mobile" placeholder="Phone">
									                    </div>
									                  
									                    <div class="form-group col-md-2 padding-left">
									                      <button type=" submit" class="btn btn-danger btn-anim btn-user-search"><i class="fa fa-search"></i><span class="btn-text">Search</span></button>
									                    </div>
								                    </div>
							                    </div>
						                    </form>



				                    		</div>
				                    	</div>
				                    </div>

                                     
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
                                                <th>City</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Agent_name</th>
                                                <!-- <th>Properties</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                     <?php 

                                          if(isset($somedetails))
                                       {
                                        ?> 
                                            @for($i = 0; $i < count($somedetails[1]); $i++)
                                            <tr>
                                                <td>{{$somedetails['1'][$i]['first_name']}} {{$somedetails['1'][$i]['last_name']}} </td>
                                                <td>{{$somedetails['1'][$i]['email']}}</td>
                                                <td>{{$somedetails['1'][$i]['mobile']}}</td>
                                                <td>{{$somedetails['1'][$i]['city']}}</td>
                                                @if($somedetails['1'][$i]['status'] == 1)
                                                <td class="status-user">Active</td>
                                                @elseif($somedetails['1'][$i]['status'] == 0)
                                                <td class="status-user">Pending</td>
                                                
                                                @elseif($somedetails['1'][$i]['status'] == 2)
                                                <td class="status-user">In-Active</td>
                                                
    
                                                @elseif($somedetails['1'][$i]['status'] == 3)
                                                <td class="status-user">Trash</td>
                                                    
                                                @endif
                                                <td>{{$somedetails['1'][$i]['created_at']}}</td>
                                           
                                           
                                                <td>{{$somedetails['2'][$i]['name']}}</td>
                                                <!-- <td><a href="">View</a></td> -->
                                                <td>   
                                                    <a href="/dashboard/profile/pk1000{{$somedetails['1'][$i]['id']}}/{{$somedetails['1'][$i]['first_name']}}" class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a> 
                                                    <a href="/dashboard/admin/allProperties/{{$somedetails['1'][$i]['id']}}" data-toggle="tooltip" data-original-title="Edit"> 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                </td>
                                            </tr>
                                               
                                            @endfor
                                        <?php
                                        }
                                        ?>
                                          <?php 

                                          if(isset($detail))
                                       {
                                       	?> 
                                            @for($i = 0; $i < count($detail[1]); $i++)
                                            <tr>
                                                <td>{{$detail['1'][$i][0]->first_name}} {{$detail['1'][$i][0]->last_name}} </td>
                                                <td>{{$detail['1'][$i][0]->email}}</td>
                                                <td>{{$detail['1'][$i][0]->mobile}}</td>
                                                <td>{{$detail['1'][$i][0]->city}}</td>
                                                @if($detail['1'][$i][0]->status == 1)
                                                <td class="status-user">Active</td>
                                                @elseif($detail['1'][$i][0]->status == 0)
                                                <td class="status-user">Pending</td>
                                                
                                                @elseif($detail['1'][$i][0]->status == 2)
                                                <td class="status-user">In-Active</td>
                                                
    
                                                @elseif($detail['1'][$i][0]->status == 3)
                                                <td class="status-user">Trash</td>
                                                    
                                                @endif
                                                <td>{{$detail['1'][$i][0]->created_at}}</td>
                                           
                                           
                                                <td>{{$detail['2'][$i]->name}}</td>
                                                <td><a href="">View</a></td>
                                                <td>
                                                    <a href="/dashboard/profile/pk1000{{$detail['1'][$i][0]->id}}/{{$detail['1'][$i][0]->first_name}}"  class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a> 
                                                   <a href="/dashboard/admin/allProperties/{{$detail['1'][$i]['0']->id}}" data-toggle="tooltip" data-original-title="Edit"> 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
                                                </td>
                                            </tr>
                                               
                                            @endfor
										<?php
										}
										?>
                                           
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
            <!-- /Basic Table -->
        </div>
    </div>






















@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-userlist').DataTable();
    });
</script>