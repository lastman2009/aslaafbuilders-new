@php
$title = "Client Edit";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search add-client">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Edit Client</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/update_client/{{$client->id}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6 padding-left">
                                            <div class="form-group">
                                                <input type="text" value="{{$client->name}}" class="form-control inventory-area" placeholder="Client Name" name="name">
                                                  @if ($errors->has('name'))
                                                <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-left">
                                            <div class="form-group">
                                                <input type="text" value="{{$client->mobile_no}}" class="form-control inventory-area" placeholder="Mobile Number" name="mobile_no">
                                                  @if ($errors->has('mobile_no'))
                                                <div class="error" style="color: red">{{ $errors->first('mobile_no') }}</div>
                                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <div class="form-group">
                                                <input type="text" value="{{$client->address}}" class="form-control inventory-area" placeholder="Address" name="address">
                                                  @if ($errors->has('address'))
                                                <div class="error" style="color: red">{{ $errors->first('address') }}</div>
                                                                    @endif
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
        </div>

        <!-- /Row -->

@include( 'includes_admin.footer' )


