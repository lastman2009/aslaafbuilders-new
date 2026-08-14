@php
$title = "List FAQ";
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
							<h2><a class="add-blog" href="/dashboard/faqs/create">Add Faq</a></h2>
							<div class="table-wrap loadyou">
								<div class="table-responsive">
									<table id="blog-listing" class="table mb-0 table-class">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
					                        	<th>Title</th>
					                        	<th>Description</th>
					                        	<th>controls</th>
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($faqs as $faq)
                                            <tr>
                                                <td>{{$faq->id}}</td>
					                        	<td>{{$faq->title}}</td>
					                        	<td><?php echo strip_tags($faq->description); ?></td>
					                        	<td>
													<a href="javascript:void(0)" data-id="{{$faq->id}}" class="delete mr-5" data-toggle="tooltip" data-original-title="Delete"> 
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i> 
                                                    </a>
													<a href="/dashboard/faqs/edit/{{$faq->id}}" data-toggle="tooltip" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i> 
                                                    </a>
												
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
			<!-- /Basic Table -->
		</div>
	</div>
@include( 'includes_admin.footer' )
<script type="text/javascript">
	$(document).ready(function(){
	    $('#blog-listing').DataTable();

		$('.delete').click(function(){
			var id=$(this).data('id');
			var url ='/dashboard/faqs/delete/'+id;
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