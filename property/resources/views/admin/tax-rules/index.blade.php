@php
$title = "Tax Rules";
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
                            <h2>Tax Rules</h2>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="tax-rules-toolbar">
                                <div class="tax-rules-toolbar-row">
                                    <a href="{{ route('admin.tax-rules.create') }}" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Tax Rule</a>
                                    <a href="/dashboard/admin/societies" class="btn btn-default"><i class="fa fa-building m-r-5"></i>Societies</a>
                                    <a href="{{ route('admin.tax-rules.export-csv') }}" class="btn btn-default"><i class="fa fa-download m-r-5"></i>Export CSV</a>

                                    <form action="{{ route('admin.tax-rules.import-csv') }}" method="post" enctype="multipart/form-data" class="form-inline tax-rules-import-form">
                                        @csrf
                                        <label class="sr-only" for="csv_file">Choose CSV file to import</label>
                                        <input type="file" id="csv_file" name="csv_file" accept=".csv" required class="form-control tax-rules-file-input">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload m-r-5"></i>Import CSV</button>
                                    </form>
                                </div>

                                <form action="{{ route('admin.tax-rules.index') }}" method="get" class="form-inline tax-rules-filter-form">
                                    <div class="form-group">
                                        <label class="tax-rules-filter-label" for="filter_city">City</label>
                                        <select id="filter_city" name="city" class="form-control">
                                            <option value="">All Cities</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}" @selected(request('city') == $city)>{{ $city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="tax-rules-filter-label" for="filter_society_id">Society</label>
                                        <select id="filter_society_id" name="society_id" class="form-control">
                                            <option value="">All Societies</option>
                                            @foreach($societies as $society)
                                                <option value="{{ $society->id }}" @selected(request('society_id') == $society->id)>{{ $society->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default"><i class="fa fa-filter m-r-5"></i>Filter</button>
                                    @if(request('city') || request('society_id'))
                                        <a href="{{ route('admin.tax-rules.index') }}" class="btn btn-link">Clear</a>
                                    @endif
                                </form>
                            </div>

                            <div class="table-wrap" style="margin-top:15px">
                                <div class="table-responsive">
                                    <table id="datatable-taxrules" class="table table-striped table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tax Code</th>
                                            <th>Name</th>
                                            <th>Scope</th>
                                            <th>Calc</th>
                                            <th>Value</th>
                                            <th>Effective</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($taxRules as $rule)
                                            <tr>
                                                <td>{{ $rule->id }}</td>
                                                <td>{{ $rule->tax_code }}</td>
                                                <td>{{ $rule->tax_name }}</td>
                                                <td>
                                                    {{ $rule->province ?? '*' }} / {{ $rule->city ?? '*' }}
                                                    @if($rule->society) / {{ $rule->society->name }} @endif
                                                </td>
                                                <td>{{ $rule->calculation_type }}</td>
                                                <td>
                                                    @if($rule->percentage) {{ $rule->percentage }}% @endif
                                                    @if($rule->fixed_amount) +{{ number_format($rule->fixed_amount) }} @endif
                                                </td>
                                                <td>{{ $rule->effective_from->format('Y-m-d') }}</td>
                                                <td>
                                                    <form action="{{ route('admin.tax-rules.toggle-status', $rule) }}" method="post" style="display:inline">
                                                        @csrf
                                                        <button type="submit" class="label {{ $rule->status ? 'label-success' : 'label-default' }}" style="border:none">
                                                            {{ $rule->status ? 'Active' : 'Inactive' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.tax-rules.edit', $rule) }}" data-toggle="tooltip" data-original-title="Edit">
                                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                    </a>
                                                    <form action="{{ route('admin.tax-rules.clone', $rule) }}" method="post" style="display:inline">
                                                        @csrf
                                                        <button type="submit" class="btn-link" style="border:none;background:none" data-toggle="tooltip" data-original-title="Clone">
                                                            <i class="fa fa-copy text-inverse m-r-10"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.tax-rules.destroy', $rule) }}" method="post" style="display:inline" onsubmit="return confirm('Delete this tax rule?')">
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
                                    {{ $taxRules->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.tax-rules-toolbar{margin-bottom:15px}
.tax-rules-toolbar-row{display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin-bottom:15px}
.tax-rules-import-form{display:flex;align-items:center;gap:8px;margin-left:auto}
.tax-rules-file-input{display:inline-block;width:auto;max-width:220px}
.tax-rules-filter-form{display:flex;flex-wrap:wrap;align-items:flex-end;gap:12px;padding:12px 15px;background:#f7f7f9;border:1px solid #e5e5e5;border-radius:4px}
.tax-rules-filter-form .form-group{margin-bottom:0}
.tax-rules-filter-label{display:block;font-size:12px;font-weight:600;color:#666;margin-bottom:4px}
.tax-rules-filter-form select.form-control{width:200px}
@media(max-width:768px){
  .tax-rules-import-form{margin-left:0;width:100%}
  .tax-rules-filter-form{flex-direction:column;align-items:stretch}
  .tax-rules-filter-form select.form-control{width:100%}
}
</style>

@include('includes_admin.footer')
<script>
    $(document).ready(function () {
        $('#datatable-taxrules').DataTable({
            "bPaginate": false,
            "bInfo": false,
            "searching": false,
        });
    });
</script>
