@php
$title = "Career edit";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid whyus">
        <div class="row">
        
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <div class="tab-content">
                        <form action="/dashboard/career-center/update" class="form-horizontal" method="post" enctype="multipart/form-data">
        						{{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                                        <div class="panel panel-default card-view blog-image-height">
                                            <div class="panel-wrapper collapse in">
                                                <h2 class="whyus-heading">Career Center</h2>
                                                <div class="panel-body">
													<div class="row">
														<div class="col-md-12 padding-right">
															
															<div class="col-md-12 padding-left">
																<div class="form-group">
																	<textarea class="form-control summernote" rows="8" cols="50" name="contant" id="" placeholder="Content ...">{{$whyUs->contant}}</textarea>
                                                                      @if ($errors->has('contant'))
                                                                    <div class="error" style="color: red">{{ $errors->first('contant') }}</div>
                                                                    @endif
																</div>
                                                                 <div class="submit-whyus"> 
                                                                    <button type="submit" class="btn btn-submit">Save</button>
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
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

@include( 'includes_admin.footer' )