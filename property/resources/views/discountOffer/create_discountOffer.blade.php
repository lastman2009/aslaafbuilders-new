@php
$title = "Create Offers For Discount";
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
                            <form action="/saveDiscountOffer" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                <div class="form-group">
                                <label class="col-lg-12 control-label mb-10 text-left padding-left">Name</label>
                                    <input class="form-control" type="text" id="" name="name" placeholder="Name"  required />
                                </div>
                                <div class="form-group">
                                <label class="col-lg-12 control-label mb-10 text-left padding-left">Percentage Price</label>
                                    <input class="form-control" type="text" id="percent_price" name="percent_price" placeholder="Percentage Price"  required />
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
<script type="text/javascript">
$( document ).ready( function () {
    function onlyNumeric( id ) {
                $( id ).keydown( function ( e ) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ( $.inArray( e.keyCode, [ 46, 8, 9, 27, 13, 110, 190 ] ) !== -1 ||
                        // Allow: Ctrl+A, Command+A
                        ( e.keyCode === 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                        // Allow: home, end, left, right, down, up
                        ( e.keyCode >= 35 && e.keyCode <= 40 ) ) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ( ( e.shiftKey || ( e.keyCode < 48 || e.keyCode > 57 ) ) && ( e.keyCode < 96 || e.keyCode > 105 ) ) {
                        e.preventDefault();
                    }
                } );
            }

            onlyNumeric( "#percent_price" );
        });
</script>
