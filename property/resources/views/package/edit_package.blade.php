@php
$title = "Edit Package -$package->name";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid create-package">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default card-view mt-30">
                    <div class="panel-wrapper collapse in category-multi newmulti pkgtitle">
                    <h2>Edit Packages</h2>
                        <div class="panel-body add_product add_tags">
                            <form action="/updatePackage/{{$package->id}}" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                <div class="form-group">
                                <label class="col-lg-12 control-label mb-10 text-left padding-left">Name</label>
                                    <input class="form-control" type="text" id="" name="name" placeholder="Name" value="{{$package->name}}"  required />
                                    @if ($errors->has('name'))
                                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                                                            @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-12 control-label mb-10 text-left padding-left">Category</label>
                                    <select class="selectpicker" title="Select Category" name="adcategory_id" data-style="form-control btn-font btn-default btn-outline" required>
                                        <?php 
                                            $selected = "";
                                             ?>
                                            @foreach($adCategorys as $adCategory)

                                            @if($package->adcategory_id == $adCategory->id)
                                            <?php 
                                            $selected = "selected"; 
                                            ?>
                                            
                                            <option value="{{$adCategory->id}}" <?php echo $selected; ?>>{{$adCategory->name}}</option>
                                            @else
                                            <option value="{{$adCategory->id}}">{{$adCategory->name}}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                     @if ($errors->has('adcategory_id'))
                                    <div class="error" style="color: red">{{ $errors->first('adcategory_id') }}</div>
                                                                            @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-12 control-label mb-10 text-left padding-left">Pages</label>
                                    <select class="selectpicker" title="Select Page" name="adpage_id" data-style="form-control btn-font btn-default btn-outline" required>
                                         <?php 
                                            $selected = "";
                                             ?>
                                            @foreach($adPages as $adPages)

                                            @if($package->adpage_id == $adPages->id)
                                            <?php 
                                            $selected = "selected"; 
                                            ?>
                                            
                                            <option value="{{$adPages->id}}" <?php echo $selected; ?>>{{$adPages->name}}</option>
                                            @else
                                            <option value="{{$adPages->id}}">{{$adPages->name}}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                     @if ($errors->has('adpage_id'))
                                    <div class="error" style="color: red">{{ $errors->first('adpage_id') }}</div>
                                                                            @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-12 control-label mb-10 text-left padding-left">Position</label>
                                    <select class="selectpicker" title="Select Position" name="adposition_id" data-style="form-control btn-font btn-default btn-outline" required>
                                        <?php 
                                            $selected = "";
                                             ?>
                                            @foreach($adPositions as $adPosition)

                                            @if($package->adposition_id == $adPosition->id)
                                            <?php 
                                            $selected = "selected"; 
                                            ?>
                                            
                                            <option value="{{$adPosition->id}}" <?php echo $selected; ?>>{{$adPosition->name}}</option>
                                            @else
                                            <option value="{{$adPosition->id}}">{{$adPosition->name}}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                       @if ($errors->has('adposition_id'))
                                    <div class="error" style="color: red">{{ $errors->first('adposition_id') }}</div>
                                                                            @endif
                                </div>
                                <div class="form-group">
                                <label class="col-lg-12 control-label mb-10 text-left padding-left">Duration</label>
                                    <input class="form-control" type="text" id="duration" name="duration" placeholder="Duration" value="{{$package->duration}}"  required />
                                       @if ($errors->has('Duration'))
                                    <div class="error" style="color: red">{{ $errors->first('Duration') }}</div>
                                                                            @endif
                                </div>
                                <div class="form-group">
                                <label class="col-lg-12 control-label mb-10 text-left padding-left">Price</label>
                                    <input class="form-control" type="text" id="price" name="price" placeholder="Price" value="{{$package->price}}"  required />
                                       @if ($errors->has('price'))
                                    <div class="error" style="color: red">{{ $errors->first('price') }}</div>
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

            onlyNumeric( "#price" );
            onlyNumeric( "#duration" );
        });
</script>
