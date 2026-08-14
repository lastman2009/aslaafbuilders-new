@php $taxRule = $taxRule ?? null; @endphp

<div class="form-group">
    <label class="control-label col-md-2">Tax Name</label>
    <div class="col-md-10">
        <input type="text" name="tax_name" class="form-control" value="{{ old('tax_name', $taxRule->tax_name ?? '') }}" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Tax Code</label>
    <div class="col-md-10">
        <input type="text" name="tax_code" class="form-control" value="{{ old('tax_code', $taxRule->tax_code ?? '') }}" placeholder="e.g. FBR_236K, STAMP_DUTY, DHA_TRANSFER_FEE" required>
    </div>
</div>

<hr>
<p class="text-muted col-md-offset-2">Scope — leave blank for "applies to any"</p>

<div class="form-group">
    <label class="control-label col-md-2">Province</label>
    <div class="col-md-10">
        <input type="text" name="province" class="form-control" value="{{ old('province', $taxRule->province ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">City</label>
    <div class="col-md-10">
        <input type="text" name="city" class="form-control" value="{{ old('city', $taxRule->city ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Society (Phase)</label>
    <div class="col-md-10">
        <select name="society_id" class="form-control">
            <option value="">Any</option>
            @foreach($societies as $society)
                <option value="{{ $society->id }}" @selected(old('society_id', $taxRule->society_id ?? '') == $society->id)>{{ $society->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Block</label>
    <div class="col-md-10">
        <select name="block_id" class="form-control">
            <option value="">Any</option>
            @foreach($societies as $society)
                @foreach($society->blocks as $block)
                    <option value="{{ $block->id }}" @selected(old('block_id', $taxRule->block_id ?? '') == $block->id)>{{ $society->name }} — {{ $block->name }}</option>
                @endforeach
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Property Type</label>
    <div class="col-md-10">
        <select name="property_type" class="form-control">
            <option value="">Any</option>
            <option value="residential" @selected(old('property_type', $taxRule->property_type ?? '') == 'residential')>Residential</option>
            <option value="commercial" @selected(old('property_type', $taxRule->property_type ?? '') == 'commercial')>Commercial</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Category</label>
    <div class="col-md-10">
        <select name="category" class="form-control">
            <option value="">Any</option>
            <option value="plot" @selected(old('category', $taxRule->category ?? '') == 'plot')>Plot</option>
            <option value="house" @selected(old('category', $taxRule->category ?? '') == 'house')>House</option>
            <option value="apartment" @selected(old('category', $taxRule->category ?? '') == 'apartment')>Apartment</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Plot Size (label)</label>
    <div class="col-md-10">
        <input type="text" name="plot_size" class="form-control" value="{{ old('plot_size', $taxRule->plot_size ?? '') }}" placeholder="e.g. 5_marla, 1_kanal — display label only">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Size Band (in Marla)</label>
    <div class="col-md-5">
        <input type="number" step="0.01" name="size_from" class="form-control" value="{{ old('size_from', $taxRule->size_from ?? '') }}" placeholder="From (Marla)">
    </div>
    <div class="col-md-5">
        <input type="number" step="0.01" name="size_to" class="form-control" value="{{ old('size_to', $taxRule->size_to ?? '') }}" placeholder="To (Marla), 1 Kanal = 20 Marla">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Buyer / Seller</label>
    <div class="col-md-10">
        <select name="buyer_type" class="form-control">
            <option value="">Any</option>
            <option value="buyer" @selected(old('buyer_type', $taxRule->buyer_type ?? '') == 'buyer')>Buyer</option>
            <option value="seller" @selected(old('buyer_type', $taxRule->buyer_type ?? '') == 'seller')>Seller</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Tax Status</label>
    <div class="col-md-10">
        <select name="tax_status" class="form-control">
            <option value="">Any</option>
            <option value="filer" @selected(old('tax_status', $taxRule->tax_status ?? '') == 'filer')>Filer</option>
            <option value="late_filer" @selected(old('tax_status', $taxRule->tax_status ?? '') == 'late_filer')>Late Filer</option>
            <option value="non_filer" @selected(old('tax_status', $taxRule->tax_status ?? '') == 'non_filer')>Non-Filer</option>
            <option value="overseas" @selected(old('tax_status', $taxRule->tax_status ?? '') == 'overseas')>Overseas (NICOP)</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Transfer Type</label>
    <div class="col-md-10">
        <select name="transfer_type" class="form-control">
            <option value="">Any</option>
            <option value="normal" @selected(old('transfer_type', $taxRule->transfer_type ?? '') == 'normal')>Normal</option>
            <option value="gift" @selected(old('transfer_type', $taxRule->transfer_type ?? '') == 'gift')>Gift</option>
            <option value="inheritance" @selected(old('transfer_type', $taxRule->transfer_type ?? '') == 'inheritance')>Inheritance</option>
            <option value="biana_only" @selected(old('transfer_type', $taxRule->transfer_type ?? '') == 'biana_only')>Biana Only</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Property Value Band (PKR)</label>
    <div class="col-md-5">
        <input type="number" name="value_from" class="form-control" value="{{ old('value_from', $taxRule->value_from ?? '') }}" placeholder="From">
    </div>
    <div class="col-md-5">
        <input type="number" name="value_to" class="form-control" value="{{ old('value_to', $taxRule->value_to ?? '') }}" placeholder="To">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Verification Required?</label>
    <div class="col-md-10">
        <select name="requires_verification" class="form-control">
            <option value="" @selected(old('requires_verification', $taxRule->requires_verification ?? '') === '')>Any</option>
            <option value="1" @selected(old('requires_verification', $taxRule->requires_verification ?? '') === true || old('requires_verification') === '1')>Yes only</option>
            <option value="0" @selected(old('requires_verification', $taxRule->requires_verification ?? '') === false || old('requires_verification') === '0')>No only</option>
        </select>
        <p class="help-block">Use this to create a dedicated VERIFICATION_FEE rule that only applies when the toggle is Yes.</p>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Biana Included?</label>
    <div class="col-md-10">
        <select name="biana_included" class="form-control">
            <option value="" @selected(old('biana_included', $taxRule->biana_included ?? '') === '')>Any</option>
            <option value="1" @selected(old('biana_included', $taxRule->biana_included ?? '') === true || old('biana_included') === '1')>Yes only</option>
            <option value="0" @selected(old('biana_included', $taxRule->biana_included ?? '') === false || old('biana_included') === '0')>No only</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Stamp Duty Payment Method</label>
    <div class="col-md-10">
        <select name="stamp_duty_payment_method" class="form-control">
            <option value="">Any</option>
            <option value="bank" @selected(old('stamp_duty_payment_method', $taxRule->stamp_duty_payment_method ?? '') == 'bank')>Bank Paid only</option>
            <option value="online" @selected(old('stamp_duty_payment_method', $taxRule->stamp_duty_payment_method ?? '') == 'online')>Online Paid only</option>
        </select>
        <p class="help-block">Use "Online Paid only" for an ONLINE_PAYMENT_SURCHARGE rule.</p>
    </div>
</div>

<hr>
<p class="text-muted col-md-offset-2">Formula</p>

<div class="form-group">
    <label class="control-label col-md-2">Value Basis</label>
    <div class="col-md-10">
        <select name="value_basis" class="form-control">
            <option value="">Property value (default)</option>
            <option value="declared" @selected(old('value_basis', $taxRule->value_basis ?? '') == 'declared')>Declared value (Simple agreement)</option>
            <option value="dc" @selected(old('value_basis', $taxRule->value_basis ?? '') == 'dc')>DC Value (Agreement to Sell: DC Value)</option>
        </select>
        <p class="help-block">Which figure the percentage applies to. Leave as default unless this charge specifically follows the DC valuation.</p>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Per Owner?</label>
    <div class="col-md-10">
        <label class="checkbox-inline">
            <input type="hidden" name="per_owner" value="0">
            <input type="checkbox" name="per_owner" value="1" @checked(old('per_owner', $taxRule->per_owner ?? false))> Multiply computed amount by Number of Owners
        </label>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Calculation Type</label>
    <div class="col-md-10">
        <select name="calculation_type" class="form-control" required>
            <option value="percentage" @selected(old('calculation_type', $taxRule->calculation_type ?? '') == 'percentage')>Percentage</option>
            <option value="fixed" @selected(old('calculation_type', $taxRule->calculation_type ?? '') == 'fixed')>Fixed Amount</option>
            <option value="percentage_plus_fixed" @selected(old('calculation_type', $taxRule->calculation_type ?? '') == 'percentage_plus_fixed')>Percentage + Fixed</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Percentage (%)</label>
    <div class="col-md-10">
        <input type="number" step="0.0001" name="percentage" class="form-control" value="{{ old('percentage', $taxRule->percentage ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Fixed Amount (PKR)</label>
    <div class="col-md-10">
        <input type="number" step="0.01" name="fixed_amount" class="form-control" value="{{ old('fixed_amount', $taxRule->fixed_amount ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Minimum Amount (PKR)</label>
    <div class="col-md-10">
        <input type="number" step="0.01" name="minimum_amount" class="form-control" value="{{ old('minimum_amount', $taxRule->minimum_amount ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Maximum Amount (PKR)</label>
    <div class="col-md-10">
        <input type="number" step="0.01" name="maximum_amount" class="form-control" value="{{ old('maximum_amount', $taxRule->maximum_amount ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Priority</label>
    <div class="col-md-10">
        <input type="number" name="priority" class="form-control" value="{{ old('priority', $taxRule->priority ?? 0) }}">
    </div>
</div>

<hr>

<div class="form-group">
    <label class="control-label col-md-2">Effective From</label>
    <div class="col-md-10">
        <input type="date" name="effective_from" class="form-control" value="{{ old('effective_from', optional($taxRule->effective_from ?? null)->format('Y-m-d')) }}" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Effective To</label>
    <div class="col-md-10">
        <input type="date" name="effective_to" class="form-control" value="{{ old('effective_to', optional($taxRule->effective_to ?? null)->format('Y-m-d')) }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Status</label>
    <div class="col-md-10">
        <select name="status" class="form-control">
            <option value="1" @selected(old('status', $taxRule->status ?? 1) == 1)>Active</option>
            <option value="0" @selected(old('status', $taxRule->status ?? 1) == 0)>Inactive</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Source URL</label>
    <div class="col-md-10">
        <input type="url" name="source_url" class="form-control" value="{{ old('source_url', $taxRule->source_url ?? '') }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Notes</label>
    <div class="col-md-10">
        <textarea name="notes" class="form-control" rows="3">{{ old('notes', $taxRule->notes ?? '') }}</textarea>
    </div>
</div>
