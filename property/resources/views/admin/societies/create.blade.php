@php
$title = "Add New Society";
@endphp
@include("includes_admin.title")
@include('includes_admin.sidebar')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>Add New Society</h2>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.societies.store') }}" class="form-horizontal" method="post">
                                @csrf
                                @include('admin.societies._form')

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-primary">Create Society</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes_admin.footer')
