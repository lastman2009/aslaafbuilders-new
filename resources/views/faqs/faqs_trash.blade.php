@php
$title = " Trash List FAQ";
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
					                        	<th>Status</th>
					                        	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($faqs as $faq)
                                            <tr>
                                                <td>{{$faq->id}}</td>
					                        	<td>{{$faq->title}}</td>
					                        	<td><?php echo strip_tags($faq->description); ?></td>
					                        	<td><a href="/dashboard/faqs/change/status/{{$faq->id}}/{{$faq->status}}" class="blogstatus" >
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