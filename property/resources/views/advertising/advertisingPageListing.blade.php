@php
$title = "Packages Listing";
@endphp
@include("includes_admin.title")
@include('includes_admin.sidebar')
<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid create-package">
        
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default card-view mt-30">
                    <div class="panel-wrapper collapse in category-multi newmulti pkglisttitle">
                        <h2>Packages Listing</h2>
                        <div class="panel-body add_product add_tags"> 
                            <form action="/testme" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-12 control-label mb-10 text-left padding-left">Select Package </label>
                                    <div class="form-group">
                                        <select class="selectpicker" id="pkg" data-url="/getPackagedetail/" title="Select Package" name="package_id" data-style="form-control btn-font btn-default btn-outline">
                                            @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->name}}</option>
                                         @endforeach
                                         </select>
                                         
                                    </div>
                                </div>
                                 

                                <h3>Package Detail</h3>
                                <ul class="add-staff-portion packlist">
                                    <li><span class="lable">Package Name: </span><span id="name" class="value"></span></li>
                                    <li><span class="lable">Package Category: </span><span id="category" class="value"></span></li>
                                    <li><span class="lable">Ad Page: </span><span id="page" class="value"></span></li>
                                    <li><span class="lable">Page position: </span><span id="position" class="value"></span></li>
                                    <li><span class="lable">Package Duration: </span><span id="duration" class="value"></span></li>
                                    <li><span class="lable" style="color: #f0b709; font-weight: bold;">Package Price: </span><span id="price" class="value"></span></li>
                                </ul>
                                
                                <div class="form-group mb-0 mt-15">
                                    <input type="hidden" value="{{$property_id}}" name="property_id"/>
                                    <input type="hidden" value="" name="price" id="pkg_price"/>
                                    <input type="submit" class="btn btn-success btn-anim" value="submit"/>
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
     
     $(document).ready(function(){


       $('#pkg').change(function()
        {
            var id =this.value;
            var url = $(this).data('url')+id;
            $.ajax({
                url:url,
                datatype: 'json',
                method: 'POST',
                headers: {
                            'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                success: function ( e ) {
                    var obj = e.success;
                    var name =obj.package_name;
                    var category =obj.category_name;
                    var page =obj.page_name;
                    var position =obj.position_name;
                    var duration =obj.duration;
                    var price =obj.price;
                    $('#name').html(name);
                    $('#category').html(category);
                    $('#page').html(page);
                    $('#position').html(position);
                    $('#duration').html(duration);
                    $('#price').html(price);
                    $('#pkg_price').val(price);


                    
                  }
                });

         });
   });
 </script>
