@php $society = $society ?? null; @endphp

<div class="form-group">
    <label class="control-label col-md-2">Province</label>
    <div class="col-md-10">
        <input type="text" name="province" class="form-control" value="{{ old('province', $society->province ?? '') }}" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">City</label>
    <div class="col-md-10">
        <input type="text" name="city" class="form-control" value="{{ old('city', $society->city ?? '') }}" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Name</label>
    <div class="col-md-10">
        <input type="text" name="name" class="form-control" value="{{ old('name', $society->name ?? '') }}" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Slug</label>
    <div class="col-md-10">
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $society->slug ?? '') }}" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Status</label>
    <div class="col-md-10">
        <select name="status" class="form-control">
            <option value="1" @selected(old('status', $society->status ?? 1) == 1)>Active</option>
            <option value="0" @selected(old('status', $society->status ?? 1) == 0)>Inactive</option>
        </select>
    </div>
</div>
