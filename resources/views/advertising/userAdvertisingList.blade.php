@php
$title = "Adversiting Property";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<style type="text/css">
    td.phn-email span{
        display: block;
    } 
</style>
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">


        <div class="row">
            <!-- Responsive Table -->
            <div class="col-lg-12">
                <div class="panel panel-default card-view recent-add-class-padding mt-40">
                    <h6 class="panel-title recent-add-class txt-dark mt-20">All Active Properties</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">	
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="user_active_property" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
												<th>ID</th>
                                                <th>Title</th>
                                                <th>Created</th>
                                                <th>Address</th>
                                                <th>Phone / Email</th>
                                                <th>Add To Featured</th>
                                                <!--<th>Add To Hot</th>
                                                <th>Add To Chilli</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($allNonFeaturedProperties as $allNonFeaturedPropertie)
                                            <tr>

                                                <td><?php echo $i ?></td>
												<td>{{$allNonFeaturedPropertie->p_id}}</td>
                                                <td>{{$allNonFeaturedPropertie->title}}</td>
                                                <td>{{date('M jS, Y',strtotime($allNonFeaturedPropertie->p_created_at))}}</td>
                                                <td>{{$allNonFeaturedPropertie->p_address}}</td>
                                                <td class="phn-email"><span>{{$allNonFeaturedPropertie->mobile}}</span><span>{{$allNonFeaturedPropertie->email}}</span></td>
                                                <td><a href="/listPackagesForAd/{{$allNonFeaturedPropertie->p_id}}"class="btn btn-sm add-property-featured">ADD</a></td>
                                                <?php $i++ ?>
                                               @endforeach
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Responsive Table -->
        </div>
        <div class="row">
            <div class="page-nation">
                <ul class="pagination pagination-large">
                {{$allNonFeaturedProperties->links()}}
                    
                </ul>
            </div>
        </div>



        <!-- /Row -->

        @include( 'includes_admin.footer' )
        <script>
            $(document).ready(function () {
                $('#user_active_property').DataTable({
                    "lengthMenu": false,
                    "paginate": false
                });
            });
        </script>

