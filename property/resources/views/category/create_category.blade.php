@php
$title = "Category Create";
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
                            <form action="/category" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                <div class="form-group">
                                <label class="col-lg-12 control-label mb-10 text-left padding-left">Title</label>
                                    <input class="form-control" type="text" id="" name="title" placeholder="Title"  required />
                                        @if ($errors->has('title'))
                                        <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                        @endif
                                </div>
								<div class="form-group">
                                    <label class="control-label mb-10 text-left">Description</label>
                                    <textarea class="form-control textarea-product" rows="5" name="description" required> </textarea>
                                        @if ($errors->has('description'))
                                        <div class="error" style="color: red">{{ $errors->first('description') }}</div>
                                        @endif
                                </div>  
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
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

