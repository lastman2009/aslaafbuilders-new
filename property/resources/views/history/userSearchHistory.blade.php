@php
$title = "Search Result";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')


<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 inventory-search">
                <!-- <div class="panel panel-default card-view add-new-blog"> -->
                <div class="panel panel-default card-view user-list-section">
                    <!-- <div class="panel panel-default card-view inventory-add-class-padding"> -->
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body"> 
                            <!-- <h2 class="panel-title inventory-add-class client-list-heading txt-dark">Architecture Directory Search Result.</h2> -->
                            <h2><a class="add-blog">User Search Result</a></h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">

                                            <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Controls</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @foreach($searchTracks as $searchTrack)
                                            
                                            <tr>
                                               <td>{{date('M jS, Y',strtotime($searchTrack->created_at))}}</td>
                                               <td>{{date('H:i:s',strtotime($searchTrack->created_at))}}</td>
                                               <td><a href="{{$searchTrack->search_string}}" class="btn btn-success" title="View" data-toggle="tooltip">View</a></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                        {{$searchTracks->links()}}
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
			$(document).ready(function () {
				$('#datable_property').DataTable({
                    "bPaginate": false
                });
			});
		</script>
        

