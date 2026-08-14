@include( 'includes_admin.header' )
@include( 'includes_admin.sidebar' )


<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<!-- Basic Table -->
			
			<div class="col-sm-12">
				<div class="panel panel-default card-view add-new-blog">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<h2><a class="add-blog" href="">Add New Blog</a></h2>
							<div class="table-wrap">
								<div class="table-responsive">
									<table id="blog-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Title</th>
					                        	<th>Content</th>
					                        	<th>Created At</th>
					                        	<th>images</th>
					                        	<th>controls</th>
					                        	<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                        	<td>we are Going</td>
                        	<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</td>
                        	<td>24/8/22016</td>
                        	<td class="blog-img"><img src="dist/img/blog-img.jpg"></td>
                        	<td>
													<a href="#" class="mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="#" class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="#" data-toggle="tooltip" data-original-title="Edit"> 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
												</td>	
												<td><a href="" class="btn btn-xs label-default">Publish</a></td>
                        	
                                            </tr>
                                                   <tr>
                                                <td>01</td>
                        	<td>we are Going</td>
                        	<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</td>
                        	<td>24/8/22016</td>
                        	<td class="blog-img"><img src="dist/img/blog-img.jpg"></td>
                        	<td>
													<a href="#" class="mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
												
												
													<a href="#" class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="#" data-toggle="tooltip" data-original-title="Edit"> 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
												</td>
												<td><a href="" class="btn btn-xs label-default">Publish</a></td>
                        	
                                            </tr>
                                                   <tr>
                                                <td>01</td>
                        	<td>we are Going</td>
                        	<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</td>
                        	<td>24/8/22016</td>
                        	<td class="blog-img"><img src="dist/img/blog-img.jpg"></td>
                        	<td>
													<a href="#" class="mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="#" class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="#" data-toggle="tooltip" data-original-title="Edit"> 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
												</td>
												<td><a href="" class="btn btn-xs label-default">Publish</a></td>
                        	 </tr>
                                        </tbody>
                                    </table>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Basic Table -->
		</div>
	</div>






@include( 'includes_admin.footer' )
<script type="text/javascript">
	$(document).ready(function(){
	    $('#blog-listing').DataTable();
	});
</script>