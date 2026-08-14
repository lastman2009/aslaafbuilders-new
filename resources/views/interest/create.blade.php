@php
$title = "Add Blog";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar' )

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-12 col-sm-12">
                <div  class="tab-struct custom-tab-2 mt-40">
                    <div class="tab-content">
                        <form action="/interest" class="form-horizontal" method="post" enctype="multipart/form-data">
        						{{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 padding-right theme-heading">
                                    <div class="col-lg-12 col-md-12 col-sm-12 blog-portion padding-left">
                                        <div class="panel panel-default card-view blog-image-height">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
													<div class="row">
														<label for="interest">Interest</label> 
                                                        <div>
                                                            
                                                        <input type="text"> 
                                                        </div>
													</div>
                                                            <button>submit</button>
                        </form>
                                                </div>
                                                <h1>new</h1>
    <ul>
    @foreach($interests as $interest)
        
        <li>{{$interest->name}}
        <a href="/interest/{{$interest->id}}"><button class="btn-primary">delete</button></a>
        <a href="/interest/edit/{{$interest->id}}"><button class="btn-primary">edit</button></a>

        </li>   
        @endforeach
    </ul>


<h1>Trash</h1>

<ul>
    @foreach($interestsdelete as $interest)
        
        <li>{{$interest->name}}
        <a href="/reterive/{{$interest->id}}"><button class="btn btn-primary">Reterive</button></a>
        

        </li>   
        @endforeach
    </ul>
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
    <!-- /Row -->

@include( 'includes_admin.footer' )
   