@extends('layouts.masterindexNew')

@php
    $old = $old ?? [];
    $val = fn($key, $default = '') => old($key, $old[$key] ?? $default);
@endphp

@section('body')
<div class="main home ab-home" id="main">

    <section class="ab-block ab-calc-sec" style="padding-top:40px">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div>
                    <h2>Advanced DHA Property Transfer Cost Calculator</h2>
                    <p>A complete, itemised estimate of every charge involved in a DHA property transfer.</p>
                </div>
                <a href="/#calculator">&larr; Back to quick calculator</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger" style="margin-bottom:16px">
                    <ul style="margin:0;padding-left:18px">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="ab-adv-calc" method="POST" action="{{ route('property-transfer-calculator.calculate') }}">
                @csrf
                <!-- ================= LEFT: PROPERTY DETAILS FORM ================= -->
                <div class="ab-adv-form">

                    <div class="ab-step-head"><span class="ab-step-badge">STEP 1</span> Location</div>

                    <div class="ab-adv-grid3">
                        <div class="ab-cfield @error('city_filter') ab-cfield-error @enderror" id="field-city_filter">
                            <label for="pv-city">City <span class="ab-req">*</span></label>
                            <select id="pv-city" name="city_filter" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}" @selected($val('city_filter') == $city)>{{ $city }}</option>
                                @endforeach
                            </select>
                            @error('city_filter')<p class="ab-error-msg">{{ $message }}</p>@enderror
                        </div>
                        <div class="ab-cfield @error('society') ab-cfield-error @enderror" id="field-society">
                            <label for="pv-society">Society / Phase <span class="ab-req">*</span></label>
                            <select id="pv-society" name="society" required>
                                <option value="">Select Society</option>
                                @foreach($societies as $society)
                                    <option value="{{ $society->id }}" data-city="{{ $society->city }}" @selected($val('society') == $society->id)>{{ $society->name }} ({{ $society->city }})</option>
                                @endforeach
                            </select>
                            @error('society')<p class="ab-error-msg">{{ $message }}</p>@enderror
                        </div>
                        <div class="ab-cfield @error('block') ab-cfield-error @enderror" id="field-block">
                            <label for="pv-block">Block <span class="ab-req">*</span></label>
                            <select id="pv-block" name="block" required @if(!count($blocks)) disabled @endif>
                                @if(count($blocks))
                                    <option value="">Select Block</option>
                                    @foreach($blocks as $block)
                                        <option value="{{ $block->id }}" @selected($val('block') == $block->id)>{{ $block->name }}</option>
                                    @endforeach
                                @else
                                    <option value="">Select Society first</option>
                                @endif
                            </select>
                            @error('block')<p class="ab-error-msg">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <p class="ab-hint" style="margin-top:-4px">Province and city are taken automatically from the selected society — they aren't set independently.</p>

                    <div class="ab-step-head"><span class="ab-step-badge">STEP 2</span> Property Details</div>

                    <div class="ab-adv-grid3">
                        <div class="ab-cfield">
                            <label for="pv-value">Property Value (PKR)</label>
                            <input type="number" id="pv-value" name="property_value" min="0" step="50000" value="{{ $val('property_value', 30000000) }}">
                        </div>

                        <div class="ab-cfield">
                            <label for="pv-category">Property Category</label>
                            <select id="pv-category" name="property_type">
                                <option value="residential" @selected($val('property_type', 'residential') == 'residential')>Residential</option>
                                <option value="commercial" @selected($val('property_type') == 'commercial')>Commercial</option>
                                <option value="sector_shop" @selected($val('property_type') == 'sector_shop')>Sector Shop</option>
                            </select>
                        </div>

                        <div class="ab-cfield">
                            <label for="pv-type">Property Type</label>
                            <select id="pv-type" name="category">
                                <option value="plot" @selected($val('category', 'plot') == 'plot')>Plot</option>
                                <option value="house" @selected($val('category') == 'house')>House</option>
                                <option value="apartment" @selected($val('category') == 'apartment')>Apartment</option>
                                <option value="file" @selected($val('category') == 'file')>File</option>
                            </select>
                        </div>
                    </div>

                    <div class="ab-cfield" id="pv-dcvalue-wrap" @if($val('agreement_type', 'simple') !== 'dc_value') hidden @endif>
                        <label for="pv-dcvalue">DC Value (PKR)</label>
                        <input type="number" id="pv-dcvalue" name="dc_value" min="0" step="50000" value="{{ $val('dc_value', 20000000) }}">
                        <p class="ab-hint" style="margin-top:6px">Used instead of property value for taxes that apply to the DC valuation.</p>
                    </div>

                    <div class="ab-cfield">
                        <label>Property Size</label>
                        <div class="ab-quicksize" id="pv-quicksize">
                            <button type="button" data-kanal="2" data-marla="0">2 Kanal</button>
                            <button type="button" data-kanal="1" data-marla="0" class="{{ $val('kanal', 1) == 1 && $val('marla', 0) == 0 ? 'on' : '' }}">1 Kanal</button>
                            <button type="button" data-kanal="0" data-marla="12">12 Marla</button>
                            <button type="button" data-kanal="0" data-marla="10">10 Marla</button>
                            <button type="button" data-kanal="0" data-marla="8">8 Marla</button>
                            <button type="button" data-kanal="0" data-marla="5">5 Marla</button>
                        </div>
                        <div class="ab-adv-grid3">
                            <div>
                                <label for="pv-kanal">Kanal</label>
                                <input type="number" id="pv-kanal" name="kanal" min="0" value="{{ $val('kanal', 1) }}">
                            </div>
                            <div>
                                <label for="pv-marla">Marla</label>
                                <input type="number" id="pv-marla" name="marla" min="0" max="19" value="{{ $val('marla', 0) }}">
                            </div>
                            <div>
                                <label for="pv-sqft">Sq. Ft.</label>
                                <input type="number" id="pv-sqft" name="sqft" min="0" value="{{ $val('sqft', 0) }}">
                            </div>
                        </div>
                        <p class="ab-hint" style="margin-top:6px">Enter size in any combination of Kanal / Marla / Sqft, or use the quick buttons above.</p>
                    </div>

                    <div class="ab-step-head"><span class="ab-step-badge">STEP 3</span> Transfer Options</div>

                    <div class="ab-cfield">
                        <label for="pv-transfertype">Transfer Type (DHA)</label>
                        <select id="pv-transfertype" name="transfer_type">
                            <option value="normal" @selected($val('transfer_type', 'normal') == 'normal')>Regular Transfer</option>
                            <option value="gift" @selected($val('transfer_type') == 'gift')>Gift</option>
                            <option value="inheritance" @selected($val('transfer_type') == 'inheritance')>Inheritance</option>
                            <option value="biana_only" @selected($val('transfer_type') == 'biana_only')>Biana Only</option>
                        </select>
                    </div>

                    <div class="ab-adv-grid3">
                        <div class="ab-cfield">
                            <label>Buyer / Seller</label>
                            <input type="hidden" name="buyer_type" id="pv-buyertype-input" value="{{ $val('buyer_type', 'buyer') }}">
                            <div class="ab-seg" id="pv-buyertype">
                                <button type="button" class="{{ $val('buyer_type', 'buyer') == 'buyer' ? 'on' : '' }}" data-v="buyer">Buyer</button>
                                <button type="button" class="{{ $val('buyer_type') == 'seller' ? 'on' : '' }}" data-v="seller">Seller</button>
                            </div>
                        </div>

                        <div class="ab-cfield">
                            <label for="pv-owners">Number of Owners</label>
                            <input type="number" id="pv-owners" name="owner_count" min="1" max="50" value="{{ $val('owner_count', 1) }}">
                        </div>

                        <div class="ab-cfield">
                            <label for="pv-taxstatus">Taxpayer Status (FBR)</label>
                            <select id="pv-taxstatus" name="tax_status">
                                <option value="filer" @selected($val('tax_status', 'filer') == 'filer')>Active Filer</option>
                                <option value="late_filer" @selected($val('tax_status') == 'late_filer')>Late Filer</option>
                                <option value="non_filer" @selected($val('tax_status') == 'non_filer')>Non-Filer</option>
                                <option value="overseas" @selected($val('tax_status') == 'overseas')>Overseas Pakistani (NICOP)</option>
                            </select>
                        </div>
                    </div>
                    <p class="ab-hint" style="margin-top:-4px">Default is 1 owner. Enter total purchasers/sellers on title.</p>

                    <div class="ab-cfield ab-toggle-row">
                        <label>Verification Required?</label>
                        <input type="hidden" name="requires_verification" id="pv-verification-input" value="{{ $val('requires_verification', '1') }}">
                        <div class="ab-seg ab-seg-sm" id="pv-verification">
                            <button type="button" class="{{ $val('requires_verification', '1') == '1' ? 'on' : '' }}" data-v="1">Yes</button>
                            <button type="button" class="{{ $val('requires_verification') == '0' ? 'on' : '' }}" data-v="0">No</button>
                        </div>
                    </div>

                    <div class="ab-cfield ab-toggle-row">
                        <label>Biana Included?</label>
                        <input type="hidden" name="biana_included" id="pv-biana-input" value="{{ $val('biana_included', '0') }}">
                        <div class="ab-seg ab-seg-sm" id="pv-biana">
                            <button type="button" class="{{ $val('biana_included') == '1' ? 'on' : '' }}" data-v="1">Yes</button>
                            <button type="button" class="{{ $val('biana_included', '0') == '0' ? 'on' : '' }}" data-v="0">No</button>
                        </div>
                    </div>

                    <div class="ab-cfield ab-toggle-row">
                        <label>Agreement to Sell</label>
                        <input type="hidden" name="agreement_type" id="pv-agreement-input" value="{{ $val('agreement_type', 'simple') }}">
                        <div class="ab-seg ab-seg-sm" id="pv-agreement">
                            <button type="button" class="{{ $val('agreement_type', 'simple') == 'simple' ? 'on' : '' }}" data-v="simple">Simple</button>
                            <button type="button" class="{{ $val('agreement_type') == 'dc_value' ? 'on' : '' }}" data-v="dc_value">DC Value</button>
                        </div>
                    </div>

                    <div class="ab-cfield ab-toggle-row">
                        <label>Stamp Duty Payment Method</label>
                        <input type="hidden" name="stamp_duty_payment_method" id="pv-stampmethod-input" value="{{ $val('stamp_duty_payment_method', 'bank') }}">
                        <div class="ab-seg ab-seg-sm" id="pv-stampmethod">
                            <button type="button" class="{{ $val('stamp_duty_payment_method', 'bank') == 'bank' ? 'on' : '' }}" data-v="bank">Bank Paid</button>
                            <button type="button" class="{{ $val('stamp_duty_payment_method') == 'online' ? 'on' : '' }}" data-v="online">Online Paid</button>
                        </div>
                    </div>

                    <button type="submit" class="ab-btn ab-btn-primary" id="pv-submit" style="width:100%;padding:14px;font-size:15px;margin-top:10px">
                        <span class="ab-btn-spinner" aria-hidden="true"></span>
                        <span class="ab-btn-label">Calculate</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>

<style>
.ab-calc-sec .ab-wrap{max-width:900px}
.ab-adv-calc{background:var(--ab-white);border:1px solid var(--ab-line);border-radius:14px;overflow:hidden;box-shadow:0 10px 28px rgba(0,0,0,.06)}
.ab-adv-form{padding:18px 20px}
.ab-adv-form .ab-cfield{margin-bottom:6px}
.ab-adv-form label{font-size:12px;margin-bottom:4px}
.ab-adv-form input,.ab-adv-form select{padding:8px 10px;font-size:13px}
.ab-adv-form .ab-hint{font-size:11px}
.ab-step-head{display:flex;align-items:center;gap:8px;font-size:14px;font-weight:700;color:var(--ab-ink);margin:10px 0 6px}
.ab-step-head:first-child{margin-top:0}
.ab-step-badge{background:var(--ab-ink);color:#fff;font-size:10px;font-weight:700;padding:3px 8px;border-radius:20px;letter-spacing:.4px}
.ab-adv-grid2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.ab-adv-grid3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-top:8px}
.ab-adv-grid3 label{display:block;font-size:11px;font-weight:600;margin-bottom:4px;color:var(--ab-muted)}
.ab-adv-grid3 input{width:100%;padding:8px;border:1px solid var(--ab-line);border-radius:6px;font-size:13px;background:var(--ab-bg);color:var(--ab-ink)}
.ab-adv-grid3 .ab-seg button{padding:8px 6px;font-size:13px}
.ab-quicksize{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:8px}
.ab-quicksize button{border:1px solid var(--ab-line);background:var(--ab-bg);color:var(--ab-muted);font-size:11px;font-weight:600;padding:5px 10px;border-radius:16px;cursor:pointer}
.ab-quicksize button.on{background:var(--ab-ink);color:#fff;border-color:var(--ab-ink)}
.ab-toggle-row{display:flex;align-items:center;justify-content:space-between;gap:10px}
.ab-toggle-row label{margin-bottom:0}
.ab-toggle-row .ab-seg-sm{width:auto;flex:0 0 auto}
.ab-seg-sm button{padding:7px 13px;font-size:12px;flex:none}
.ab-req{color:var(--ab-orange-dark)}
.ab-cfield-error select,.ab-cfield-error input{border-color:#c0392b !important}
.ab-error-msg{color:#c0392b;font-size:11px;margin:4px 0 0}
#pv-submit{display:flex;align-items:center;justify-content:center;gap:10px}
#pv-submit:disabled{opacity:.75;cursor:not-allowed}
.ab-btn-spinner{display:none;width:16px;height:16px;border:2px solid rgba(255,255,255,.5);border-top-color:#fff;border-radius:50%;animation:ab-spin .7s linear infinite}
#pv-submit.is-loading .ab-btn-spinner{display:inline-block}
@keyframes ab-spin{to{transform:rotate(360deg)}}
@media(max-width:900px){.ab-adv-grid2,.ab-adv-grid3{grid-template-columns:1fr}}
</style>

<script>
(function () {
    'use strict';

    // All calculation happens server-side on submit. This script only handles
    // pure UI concerns: segmented-button selection state and the Phase -> Block
    // dropdown lookup (populating options, not computing anything).

    function bindSeg(id, hiddenInputId, after) {
        document.querySelectorAll('#' + id + ' button').forEach(function (b) {
            b.addEventListener('click', function () {
                document.querySelectorAll('#' + id + ' button').forEach(function (x) { x.classList.remove('on'); });
                b.classList.add('on');
                document.getElementById(hiddenInputId).value = b.dataset.v;
                if (after) after(b.dataset.v);
            });
        });
    }
    bindSeg('pv-buyertype', 'pv-buyertype-input');
    bindSeg('pv-verification', 'pv-verification-input');
    bindSeg('pv-biana', 'pv-biana-input');
    bindSeg('pv-stampmethod', 'pv-stampmethod-input');
    bindSeg('pv-agreement', 'pv-agreement-input', function (value) {
        document.getElementById('pv-dcvalue-wrap').hidden = value !== 'dc_value';
    });

    document.querySelectorAll('#pv-quicksize button').forEach(function (b) {
        b.addEventListener('click', function () {
            document.querySelectorAll('#pv-quicksize button').forEach(function (x) { x.classList.remove('on'); });
            b.classList.add('on');
            document.getElementById('pv-kanal').value = b.dataset.kanal;
            document.getElementById('pv-marla').value = b.dataset.marla;
            document.getElementById('pv-sqft').value = 0;
        });
    });
    ['pv-kanal', 'pv-marla', 'pv-sqft'].forEach(function (id) {
        document.getElementById(id).addEventListener('input', function () {
            document.querySelectorAll('#pv-quicksize button').forEach(function (x) { x.classList.remove('on'); });
        });
    });

    // City filter narrows the Society dropdown to matching options (client-side
    // only — the server never trusts city_filter, it derives city from society_id).
    document.getElementById('pv-city').addEventListener('change', function () {
        var city = this.value;
        var societySelect = document.getElementById('pv-society');
        Array.prototype.forEach.call(societySelect.options, function (opt) {
            if (!opt.value) return;
            opt.hidden = !!city && opt.dataset.city !== city;
        });
        if (societySelect.selectedOptions[0] && societySelect.selectedOptions[0].hidden) {
            societySelect.value = '';
            societySelect.dispatchEvent(new Event('change'));
        }
    });

    // Society -> Block cascade: fetches the list of blocks to populate a dropdown.
    // This is a lookup for form options, not a calculation — the form still
    // submits normally to the server for the actual tax breakdown.
    document.getElementById('pv-society').addEventListener('change', function () {
        var societyId = this.value;
        var blockSelect = document.getElementById('pv-block');
        blockSelect.innerHTML = '<option value="">Loading...</option>';
        blockSelect.disabled = true;

        if (!societyId) {
            blockSelect.innerHTML = '<option value="">Select Phase first</option>';
            return;
        }

        fetch('/api/societies/' + societyId + '/blocks', { headers: { 'Accept': 'application/json' } })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                blockSelect.innerHTML = '<option value="">Select Block</option>';
                (data.blocks || []).forEach(function (block) {
                    var opt = document.createElement('option');
                    opt.value = block.id;
                    opt.textContent = block.name;
                    blockSelect.appendChild(opt);
                });
                blockSelect.disabled = false;
            })
            .catch(function () {
                blockSelect.innerHTML = '<option value="">Unable to load blocks</option>';
            });
    });

    // Scroll to the first invalid field after a failed submit (server-rendered
    // error blocks add .ab-cfield-error to that field's wrapper).
    var firstError = document.querySelector('.ab-cfield-error');
    if (firstError) {
        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Show a spinner on the Calculate button once the form actually submits
    // (after HTML5 required-field validation passes), so the user gets
    // feedback while the server computes the breakdown.
    var form = document.querySelector('.ab-adv-calc');
    var submitBtn = document.getElementById('pv-submit');
    if (form && submitBtn) {
        form.addEventListener('submit', function () {
            submitBtn.classList.add('is-loading');
            submitBtn.disabled = true;
            submitBtn.querySelector('.ab-btn-label').textContent = 'Calculating…';
        });
    }
})();
</script>
@endsection
