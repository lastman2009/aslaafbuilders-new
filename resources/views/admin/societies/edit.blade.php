@php
$title = "Edit Society";
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
                            <h2>Edit Society</h2>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.societies.update', $society) }}" class="form-horizontal" method="post">
                                @csrf
                                @method('PUT')
                                @include('admin.societies._form')

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-primary">Update Society</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h3>Blocks</h3>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-0" style="max-width:600px">
                                    <thead>
                                    <tr><th>Name</th><th>Status</th><th>Action</th></tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blocks as $block)
                                        <tr>
                                            <td>{{ $block->name }}</td>
                                            <td>
                                                <form action="{{ route('admin.societies.blocks.toggle-status', [$society, $block]) }}" method="post" style="display:inline">
                                                    @csrf
                                                    <button type="submit" class="label {{ $block->status ? 'label-success' : 'label-default' }}" style="border:none">
                                                        {{ $block->status ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.societies.blocks.destroy', [$society, $block]) }}" method="post" style="display:inline" onsubmit="return confirm('Delete this block?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-link" style="border:none;background:none" data-toggle="tooltip" data-original-title="Delete">
                                                        <i class="fa fa-trash-o text-inverse m-r-10"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form action="{{ route('admin.societies.blocks.store', $society) }}" method="post" class="form-inline">
                                @csrf
                                <input type="text" name="name" class="form-control" placeholder="Block name" required>
                                <button type="submit" class="btn btn-primary">Add Block</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes_admin.footer')
