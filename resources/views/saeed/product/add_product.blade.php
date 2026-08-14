@include('includes_admin.header')
@include('includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view add_product">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Description</label>
                                    <textarea class="form-control textarea-product" rows="5"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
@include('includes_admin.footer')

