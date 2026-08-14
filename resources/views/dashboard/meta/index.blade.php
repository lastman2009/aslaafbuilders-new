@php
$title = "Meta";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search add-client">
                <div class="panel panel-default card-view">
                    <h6 class="panel-title txt-dark">Add Meta </h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/dashboard/meta/store" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 padding-left">
                                            <div class="form-group">
                                                <input type="text" class="form-control inventory-area" placeholder="Meta Name" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <button type="submit" class="btn btn-submit-webinfo btn-client btn-anim"><i class="fa fa-paper-plane"></i><span class="btn-text">Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @foreach($allData as $meta)
    <div class="col-lg-4  inventory-search add-client">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h3 class="panel-title  txt-dark" style="color:#f58e21 !important;">{{ $meta->title }} Page </h3>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/dashboard/meta/update/{{ $meta->id }}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 padding-left">
                                            <div class="form-group">
                                                <input type="text" class="form-control inventory-area" placeholder="Title" name="title" value="{{ $meta->title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <div class="form-group">
                                                <input type="text" class="form-control inventory-area" placeholder="Meta Title" name="meta_title" value="{{ $meta->meta_title }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <div class="form-group">
                                                <input type="text" class="form-control inventory-area" placeholder="Meta Keyword" name="meta_keyword" value="{{ $meta->meta_keyword }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <div class="form-group">
                                                <input type="text" class="form-control inventory-area" placeholder="Meta Description" name="meta_description"  value="{{ $meta->meta_description }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <button type="submit" class="btn btn-submit-webinfo btn-client btn-anim"><i class="fa fa-paper-plane"></i><span class="btn-text">Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <!-- /Row -->

@include( 'includes_admin.footer' )


