@php
$title = "About Us";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view add_product add_tags">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/dashboard/about-us-content-save" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">First Content</label>
                                    <textarea class="form-control textarea-product summernote" rows="5" name="first_area" required> {{$content->first_area}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Second Content</label>
                                    <textarea class="form-control textarea-product summernote" rows="5" name="second_area" required> {{$content->second_area}}</textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Update</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
@include( 'includes_admin.footer' )

