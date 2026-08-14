@php
$title = "Blog Trash";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )


<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<!-- Basic Table -->
			
			<div class="col-sm-12">
				<div class="panel panel-default card-view add-new-blog">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<h2><a class="add-blog" href="/blogs/create">Add New Blog</a></h2>
							<div class="table-wrap loadyou">
								<div class="table-responsive">
									<table id="blog-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Title</th>
					                        	<th>Content</th>
					                        	<th>Created At</th>
					                        	<th>images</th>
					                        	<th>Status</th>
					                   
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blogs as $blog)
                                         
                                                   <tr>
                                                <td>{{$blog->id}}</td>
					                        	<td><a href="blogView/{{$blog->id}}">{{$blog->title}}</a></td>
					                        	<td><?php echo strip_tags($blog->contant); ?></td>
					                        	<td>{{$blog->created_at}}</td>
					                        	<td class="blog-img"><img src="../../images/blogs_images/{{$blog->gallery}}" height="60" width="60"></td>

			                    				
					                        	<td><a href="blogRestore/{{$blog->id}}/{{$blog->status}}" class="blogstatus" >
					                        	<span 
                                				class="label label-success ">Restore</span></a></td>
			                    									                      											
                        	 </tr>
                        	 @endforeach
                                        </tbody>
                                    </table>
									
									
								</div>
							</div>
							{{$blogs->links()}}
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
	    $('#blog-listing').DataTable({
	    	 "bPaginate": false,
	    });

    });
</script>