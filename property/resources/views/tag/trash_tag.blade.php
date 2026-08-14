@php
$title = "Tags Trash List";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')



<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<!-- Basic Table -->
			
			<div class="col-sm-12">
				<div class="panel panel-default card-view add-new-blog">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<h2><a class="add-blog" href="/category/create">Add New Category</a></h2>
							<div class="table-wrap loadyou">
								<div class="table-responsive">
									<table id="blog-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Title</th>
					                        	<th>Description</th>
					                        	<th>Status</th>
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td>{{$tag->id}}</td>
								                <td>{{$tag->title}}</td>
								                <td>{{$tag->description}}</td>

					                        	<td><a href="/tagStatusChange/{{$tag->id}}/{{$tag->status}}" class="blogstatus" >
					                        	<span 
                                				class="label label-success ">Restore</span></a></td>
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
			<!-- /Basic Table -->
		</div>
	</div>
@include( 'includes_admin.footer' )
<script type="text/javascript">
	$(document).ready(function(){
	    $('#blog-listing').DataTable();
    });
</script>