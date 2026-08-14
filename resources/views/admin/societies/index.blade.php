@php
$title = "DHA Societies";
@endphp
@include("includes_admin.title")
@include('includes_admin.sidebar')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>DHA Societies</h2>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <a href="{{ route('admin.societies.create') }}" class="btn btn-primary">Add New Society</a>
                            <a href="/dashboard/admin/tax-rules" class="btn btn-default">Tax Rules</a>

                            <div class="table-wrap" style="margin-top:15px">
                                <div class="table-responsive">
                                    <table id="datatable-societies" class="table table-striped table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Province</th>
                                            <th>City</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($societies as $society)
                                            <tr>
                                                <td>{{ $society->id }}</td>
                                                <td>{{ $society->province }}</td>
                                                <td>{{ $society->city }}</td>
                                                <td>{{ $society->name }}</td>
                                                <td>
                                                    <form action="{{ route('admin.societies.toggle-status', $society) }}" method="post" style="display:inline">
                                                        @csrf
                                                        <button type="submit" class="label {{ $society->status ? 'label-success' : 'label-default' }}" style="border:none">
                                                            {{ $society->status ? 'Active' : 'Inactive' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.societies.edit', $society) }}" data-toggle="tooltip" data-original-title="Edit">
                                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                    </a>
                                                    <form action="{{ route('admin.societies.destroy', $society) }}" method="post" style="display:inline" onsubmit="return confirm('Delete this society?')">
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
                                    {{ $societies->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-societies').DataTable({
            "bPaginate": false,
            "bInfo": false,
            "searching": false,
        });
    });
</script>
