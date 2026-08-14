@php
$title = "Blog Listing";
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
					                        	<th>controls</th>
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blogs as $blog)
                                                   <tr>
                                                <td>{{$blog->id}}</td>
					                        	<td><a href="blogView/{{$blog->id}}">{{$blog->title}}</a></td>
					                        	<td>
                                         	<?php echo substr(strip_tags($blog->contant),0,40).'...';?>
					                        		
					                        	</td>
					                        	<td>{{$blog->created_at}}</td>
					                        	<td class="blog-img"><img src="../../images/blogs_images/{{$blog->gallery}}" height="60" width="60"></td>

			                    				@if($blog->status == 2)
					                        	<td><a href="javascipt:void(0);" class="blogstatus" data-url="blogStatusChange/{{$blog->id}}/{{$blog->status}}" data-id="{{$blog->id}}">
					                        	<span 
                                				class="label label-success ">Publish</span></a></td>
			                    				@else
												<td><a href="javascipt:void(0);" class="blogstatus" data-url="blogStatusChange/{{$blog->id}}/{{$blog->status}}" data-id="{{$blog->id}}">
					                        	<span 
                                				class="label label-default ">Un publish</span></a></td>
			                    				@endif
											    <?php
										             $title = str_slug($blog->title);
										          ?>
					                        	<td>
													<a href="javascript:void(0)" data-id="{{$blog->id}}" class="delete mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="/blog/{{$blog->id}}/{{$title}}" class="mr-5" data-toggle="tooltip" data-original-title="View"> 
                                                        <i class="fa fa-eye text-inverse m-r-10"></i> 
                                                    </a>
												
													<a href="{{ route('blogs.edit', $blog->id) }}" data-toggle="tooltip" data-original-title="Edit"> 
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
												</td>
												
                        	 </tr>
                        	 @endforeach
                                        </tbody>
                                    </table>
									
									{{$blogs->links()}}
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
	    $('#blog-listing').DataTable({
            "bPaginate": false,
             "searching": true
	    });


	
	    $('.blogstatus').click(function()
	    {
	    	var url = $(this).data('url');
	    	var current =$(this);
	    	var id =$(this).data('id');
	    	// alert(id);
	    	$.ajax({
	    		url:url,
	    		datatype: 'json',
				method: 'POST',
				headers: {
							'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				success: function ( e ) {
					if(e.success ==  2)
					{
						$(current).children("span").attr("class", "label label-success");
						$(current).children("span").text("Publish");
						$(current).data("url", "blogStatusChange/"+id+"/"+e.success);
					}
					else
					{	
						$(current).children("span").attr("class", "label label-default");
						$(current).children("span").text("Un Publish");
						$(current).data("url", "blogStatusChange/"+id+"/"+e.success);
					}

				}
	    	});
		});

		$('.delete').click(function(){
			var id=$(this).data('id');
			var url ='blogDelete/'+id;
			var current =$(this);
			  if (confirm('Are you sure you want to remove this?')) {
			$.ajax({
	    		url:url,
	    		datatype: 'json',
				method: 'POST',
				headers: {
							'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
				},
				success: function ( e ) {
				current.parent().parent().remove();

				}
			});
		}
		});
    });
</script>