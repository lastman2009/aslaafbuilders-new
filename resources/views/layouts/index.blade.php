@extends('layouts.masterindexNew')

@section('body')

@php
if (!function_exists('ab_image')) {
    /**
     * Return the asset URL when the file really exists on disk,
     * otherwise fall back to a local dummy placeholder.
     */
    function ab_image($path, $fallback = 'home_images/placeholders/property.svg')
    {
        $path = ltrim((string) $path, '/');
        return ($path !== '' && file_exists(public_path($path))) ? asset($path) : asset($fallback);
    }
}
if (!function_exists('ab_nice_number')) {
    function ab_nice_number($n)
    {
        $n = 0 + str_replace(',', '', (string) $n);
        if (!is_numeric($n)) return '';
        if ($n >= 10000000) return round($n / 10000000, 2) . ' Crore';
        if ($n >= 100000)   return round($n / 100000, 2) . ' Lakh';
        return number_format($n);
    }
}

// Hero banner: use a local banner when one exists, otherwise the design's stock photo.
$heroImg = file_exists(public_path('home_images/banners/home-hero.jpg'))
    ? asset('home_images/banners/home-hero.jpg')
    : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1600&q=80';

// Areas to feature: top Lahore towns first, then fill from other cities (real DB data).
$featuredAreas = array_slice(array_merge(
    $townData['lahore'] ?? [], $townData['karachi'] ?? [], $townData['islamabad'] ?? []
), 0, 5);
$cityNames = [1 => 'lahore', 2 => 'karachi', 3 => 'islamabad'];

$totalListings = 0;
foreach ($locations as $loc) { $totalListings += $loc->number; }

// Same stock photos as the design mock — used only until a real area image exists on disk.
$areaStockPhotos = [
    'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&q=80',
    'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=80',
    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&q=80',
    'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?w=600&q=80',
    'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600&q=80',
];
@endphp

<div class="main home ab-home" id="main">

    <!-- ================= HERO + SEARCH ================= -->
    <div class="ab-hero" style="background-image:linear-gradient(rgba(40,20,8,.62),rgba(40,20,8,.66)),url('{{ $heroImg }}')">
        <div class="ab-wrap">
            <span class="ab-tag">&#127968; Building Trust, Brick by Brick</span>
            <h1>Find or construct your dream home with Pakistan's most trusted builders and real estate experts</h1>
            <p class="ab-hero-sub">Timely delivery, guaranteed low prices, and a dedicated team of professionals. Come to us with confidence.</p>

            <form class="ab-search" action="/property" method="get" id="ab-search-form">
                <div class="ab-tabs" id="ab-purpose-tabs">
                    <button type="button" class="ab-tab active" data-purpose="1">Buy</button>
                    <button type="button" class="ab-tab" data-purpose="2">Rent</button>
                    <button type="button" class="ab-tab" data-purpose="3">Wanted</button>
                    <button type="button" class="ab-tab" data-purpose="4">New Projects</button>
                </div>
                <input type="hidden" name="search_purpose" id="ab-purpose" value="1">
                <div class="ab-search-body">
                    <div class="ab-field ab-has-suggest">
                        <label for="ab-keyword">Location / Keyword</label>
                        <input type="text" id="ab-keyword" name="address" placeholder="e.g. DHA Phase 6, keyword or property id" autocomplete="off">
                        <div class="ab-suggest" id="ab-suggest"></div>
                    </div>
                    <div class="ab-field">
                        <label for="ab-city">City</label>
                        <select id="ab-city" name="city_id_new">
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ab-field">
                        <label for="ab-ptype">Property Type</label>
                        <select id="ab-ptype" name="property_type">
                            <option value="">All Types</option>
                            @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ab-field">
                        <label for="ab-price">Price Range (PKR)</label>
                        <select id="ab-price">
                            <option value="">Any Price</option>
                            <option value="0-5000000">Under 50 Lakh</option>
                            <option value="5000000-10000000">50 Lakh &ndash; 1 Crore</option>
                            <option value="10000000-30000000">1 &ndash; 3 Crore</option>
                            <option value="30000000-1000000000">3 Crore +</option>
                        </select>
                        <input type="hidden" name="min_price" id="ab-min-price" value="">
                        <input type="hidden" name="max_price" id="ab-max-price" value="">
                    </div>
                    <button type="submit" class="ab-search-btn">&#128269; Search</button>
                </div>
                @if(count($featuredAreas))
                <div class="ab-quick">
                    <span>Popular:</span>
                    @foreach(array_slice($featuredAreas, 0, 4) as $town)
                    <a href="/property/{{ $cityNames[$town->town_city_id] ?? 'lahore' }}/{{ $town->town_city_id }}/{{ str_slug($town->name) }}/{{ $town->townid }}">{{ $town->name }}</a>
                    @endforeach
                </div>
                @endif
            </form>
        </div>
    </div>

    <!-- ================= STATS ================= -->
    <div class="ab-stats">
        <div class="ab-wrap">
            <div class="ab-stat"><b>{{ number_format($totalListings) }}+</b><span>Active Listings</span></div>
            <div class="ab-stat"><b>{{ count($cities) }}</b><span>Cities Covered</span></div>
            <div class="ab-stat"><b>{{ count($propertyTypes) }}</b><span>Property Types</span></div>
            <div class="ab-stat"><b>15+</b><span>Years of Trust</span></div>
        </div>
    </div>

    <!-- ================= EXPLORE BY AREA ================= -->
    @if(count($featuredAreas))
    <section class="ab-block" id="areas">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div><h2>Explore by Area</h2><p>Prime societies and locations we specialise in</p></div>
                <a href="/property/Buy">View all areas &rarr;</a>
            </div>
            <div class="ab-cities">
                @foreach($featuredAreas as $i => $town)
                <a class="ab-city" href="/property/{{ $cityNames[$town->town_city_id] ?? 'lahore' }}/{{ $town->town_city_id }}/{{ str_slug($town->name) }}/{{ $town->townid }}">
                    <img src="{{ ab_image_url('home_images/areas/' . str_slug($town->name) . '.jpg', $areaStockPhotos[$i % 5]) }}" alt="{{ $town->name }}">
                    <div class="ab-city-lbl">
                        <b>{{ $town->name }}</b>
                        <span>{{ number_format($town->number) }} listings &middot; {{ ucfirst($cityNames[$town->town_city_id] ?? '') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ================= DHA FILE PRICES ================= -->
    <section class="ab-block ab-tight" id="filesRates">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div><h2>DHA File Prices</h2><p>Live indicative rates for DHA allocation &amp; affidavit files</p></div>
                <a href="https://wa.me/923218433312" target="_blank" rel="noopener">Confirm today's rates &rarr;</a>
            </div>
            <div class="ab-files">
                @php
                $fileBoxes = [
                    ['name' => 'DHA Phase 7 Files',       'sub' => 'DHA Lahore · Confirmed',      'rows' => [['1 Kanal File', 'PKR 62 – 68 Lakh'], ['10 Marla File', 'PKR 38 – 42 Lakh'], ['5 Marla File', 'PKR 24 – 27 Lakh']]],
                    ['name' => 'DHA Phase 9 Prism Files', 'sub' => 'DHA Lahore · Balloted',       'rows' => [['1 Kanal File', 'PKR 78 – 90 Lakh'], ['10 Marla File', 'PKR 46 – 52 Lakh'], ['8 Marla Comm.', 'PKR 3.1 – 3.6 Cr']]],
                    ['name' => 'DHA Quetta Files',        'sub' => 'DHA Quetta · Allocation',     'rows' => [['1 Kanal File', 'PKR 14 – 17 Lakh'], ['10 Marla File', 'PKR 9 – 11 Lakh'],  ['5 Marla File', 'PKR 6 – 7 Lakh']]],
                    ['name' => 'DHA Phase 6 Files',       'sub' => 'DHA Lahore · Confirmed',      'rows' => [['1 Kanal File', 'PKR 85 – 95 Lakh'], ['10 Marla File', 'PKR 52 – 58 Lakh'], ['5 Marla File', 'PKR 30 – 34 Lakh']]],
                    ['name' => 'DHA Multan Files',        'sub' => 'DHA Multan · Balloted',       'rows' => [['1 Kanal File', 'PKR 32 – 38 Lakh'], ['10 Marla File', 'PKR 21 – 24 Lakh'], ['5 Marla File', 'PKR 13 – 15 Lakh']]],
                    ['name' => 'DHA Gujranwala Files',    'sub' => 'DHA Gujranwala · Allocation', 'rows' => [['1 Kanal File', 'PKR 18 – 22 Lakh'], ['10 Marla File', 'PKR 12 – 14 Lakh'], ['5 Marla File', 'PKR 8 – 9 Lakh']]],
                ];
                @endphp
                @foreach($fileBoxes as $box)
                <div class="ab-filebox">
                    <div class="ab-file-top">
                        <span class="ab-ficon">&#128196;</span>
                        <div><h3>{{ $box['name'] }}</h3><span class="ab-file-sub">{{ $box['sub'] }}</span></div>
                    </div>
                    @foreach($box['rows'] as $row)
                    <div class="ab-prow"><span>{{ $row[0] }}</span><b>{{ $row[1] }}</b></div>
                    @endforeach
                    <div class="ab-file-foot">
                        <span class="ab-trend">&#9650; Trending up</span>
                        <a class="ab-more" href="https://wa.me/923218433312" target="_blank" rel="noopener">Get details &rarr;</a>
                    </div>
                </div>
                @endforeach
            </div>
            <p class="ab-indic">Prices are indicative and update with the market. Contact us on WhatsApp for today's confirmed file prices.</p>
        </div>
    </section>

    <!-- ================= TRANSFER EXPENSE CALCULATOR ================= -->
    <section class="ab-block ab-calc-sec" id="calculator">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div><h2>DHA Transfer Expense Calculator</h2><p>Instantly estimate stamp duty, FBR taxes, and DHA fees</p></div>
            </div>
            <div class="ab-calc">
                <div class="ab-calc-in">
                    <h3>Enter property details</h3>
                    <p class="ab-hint">Adjust the values below to estimate your total transfer cost.</p>

                    <div class="ab-cfield">
                        <label for="ab-dcval">Property value / DC value (PKR)</label>
                        <input type="number" id="ab-dcval" value="30000000" min="0" step="100000">
                    </div>

                    <div class="ab-cfield">
                        <label>I am the</label>
                        <div class="ab-seg" id="ab-party">
                            <button type="button" class="on" data-v="buyer">Buyer (purchasing)</button>
                            <button type="button" data-v="seller">Seller (selling)</button>
                        </div>
                    </div>

                    <div class="ab-cfield">
                        <label>Tax status</label>
                        <div class="ab-seg" id="ab-filer">
                            <button type="button" class="on" data-v="filer">Filer</button>
                            <button type="button" data-v="nonfiler">Non-filer</button>
                        </div>
                    </div>

                    <div class="ab-cfield">
                        <label for="ab-plot">Plot size (for DHA fee)</label>
                        <select id="ab-plot">
                            <option value="70000">5 Marla</option>
                            <option value="90000">8 Marla</option>
                            <option value="100000" selected>10 Marla</option>
                            <option value="150000">1 Kanal</option>
                            <option value="250000">2 Kanal</option>
                        </select>
                    </div>
                </div>

                <div class="ab-calc-out">
                    <h3>Estimated breakdown</h3>
                    <div class="ab-orow"><span id="ab-fbrLabel">FBR advance tax (236K)</span><b id="ab-oFbr">&mdash;</b></div>
                    <div class="ab-orow"><span>Stamp duty (1%)</span><b id="ab-oStamp">&mdash;</b></div>
                    <div class="ab-orow"><span>Registration &amp; e-stamp (1%)</span><b id="ab-oReg">&mdash;</b></div>
                    <div class="ab-orow"><span>DHA transfer &amp; membership</span><b id="ab-oDha">&mdash;</b></div>
                    <div class="ab-orow"><span>Cantonment / TIP tax</span><b id="ab-oCant">&mdash;</b></div>
                    <div class="ab-total">
                        <div class="ab-total-lbl">Total estimated transfer expense</div>
                        <div class="ab-amt" id="ab-oTotal">&mdash;</div>
                        <button type="button" class="ab-wa-btn" onclick="window.open('https://wa.me/923218433312?text=I%20would%20like%20exact%20DHA%20transfer%20figures','_blank')">&#128172; Get exact figures on WhatsApp</button>
                        <p class="ab-calc-note">Indicative estimate only. Rates for FBR (236K/236C), stamp duty, and DHA fees change with each budget &mdash; confirm current figures with our team before transacting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FEATURED PROPERTIES (real DB data) ================= -->
    @if(count($properties))
    <section class="ab-block">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div><h2>Featured Properties</h2><p>Hand-picked listings, verified by our team</p></div>
                <a href="/property/Buy">All listings &rarr;</a>
            </div>
            <div class="ab-grid ab-grid-4">
                @foreach($properties as $property)
                @php
                $propImg = 'home_images/placeholders/property.svg';
                if (!empty($property->gallery)) {
                    $galleryImages = explode(';', $property->gallery);
                    $propImg = 'images/property/user_property/original_' . $galleryImages[0];
                }
                $propUrl = $property->url . '/' . $property->id;
                @endphp
                <div class="ab-card">
                    <a class="ab-ph" href="{{ $propUrl }}">
                        <img src="{{ ab_image($propImg) }}" alt="{{ str_limit(strip_tags($property->title), 60) }}">
                        @if($property->purpose == 2)
                        <span class="ab-badge ab-rent">For Rent</span>
                        @elseif($property->purpose == 4)
                        <span class="ab-badge">Project</span>
                        @elseif($property->purpose == 3)
                        <span class="ab-badge ab-rent">Wanted</span>
                        @else
                        <span class="ab-badge">For Sale</span>
                        @endif
                    </a>
                    <div class="ab-card-body">
                        <div class="ab-price">PKR {{ ab_nice_number($property->price) }}</div>
                        <h3><a href="{{ $propUrl }}">{{ str_limit(strip_tags($property->title), 45) }}</a></h3>
                        <div class="ab-loc">&#128205; {{ str_limit($property->address, 45) }}</div>
                        <div class="ab-specs">
                            @if(!empty($property->bed))<span>&#128716; {{ $property->bed }} Beds</span>@endif
                            @if(!empty($property->bath))<span>&#128703; {{ $property->bath }} Baths</span>@endif
                            <span>&#128207; {{ $property->area }} {{ $property->area_type }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ================= WHY CHOOSE US ================= -->
    <section class="ab-block ab-tight">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div><h2>Why Choose Aslaaf Builders</h2><p>Built on 15 years of trust and thousands of happy families</p></div>
            </div>
            <div class="ab-why">
                <div><div class="ab-ic">&#9989;</div><h3>100% Verified Listings</h3><p>Every property is physically checked and documents verified before it goes live.</p></div>
                <div><div class="ab-ic">&#129309;</div><h3>Expert Agents</h3><p>Certified agents guide you at every step, from viewing to paperwork.</p></div>
                <div><div class="ab-ic">&#128274;</div><h3>Secure Transactions</h3><p>Transparent pricing and legal support ensure a safe, worry-free deal.</p></div>
            </div>
        </div>
    </section>

    <!-- ================= LATEST FROM BLOG (real DB data) ================= -->
    @if(count($blogs))
    <section class="ab-block ab-tight">
        <div class="ab-wrap">
            <div class="ab-sec-head">
                <div><h2>Latest from our Blog</h2><p>Market insights, guides and news</p></div>
                <a href="/blog">All articles &rarr;</a>
            </div>
            <div class="ab-grid">
                @foreach($blogs->take(3) as $i => $blog)
                @php $blogUrl = '/blog/' . $blog->id . '/' . str_slug($blog->title); @endphp
                <div class="ab-card">
                    <a class="ab-ph" href="{{ $blogUrl }}">
                        <img src="{{ ab_image('images/blogs_images/original_' . $blog->gallery, 'home_images/placeholders/area-' . (($i % 5) + 1) . '.svg') }}" alt="{{ str_limit(strip_tags($blog->title), 60) }}">
                    </a>
                    <div class="ab-card-body">
                        <h3><a href="{{ $blogUrl }}">{{ str_limit(strip_tags($blog->title), 65) }}</a></h3>
                        <div class="ab-specs"><span>&#128065; {{ $blog->view }} views</span><a href="{{ $blogUrl }}" style="color:var(--ab-orange);font-weight:600">Read more &rarr;</a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ================= CTA ================= -->
    <section class="ab-block ab-tight">
        <div class="ab-wrap">
            <div class="ab-cta">
                <h2>Have a property to sell or rent?</h2>
                <p>List it free on Aslaaf Builders and reach thousands of serious buyers today.</p>
                @if(empty(Auth::user()))
                <a class="ab-btn ab-btn-primary" href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">Post Your Property</a>
                @else
                <a class="ab-btn ab-btn-primary" href="/dashboard/property/add">Post Your Property</a>
                @endif
                <a class="ab-btn ab-btn-wa" href="https://wa.me/923218433312" target="_blank" rel="noopener">&#128172; WhatsApp Us</a>
            </div>
        </div>
    </section>

</div>
@endsection

@section('script')
<script type="text/javascript">
(function () {
    /* ---- Search card: purpose tabs + price range ---- */
    var tabs = document.querySelectorAll('#ab-purpose-tabs .ab-tab');
    var purposeInput = document.getElementById('ab-purpose');
    tabs.forEach(function (t) {
        t.addEventListener('click', function () {
            tabs.forEach(function (x) { x.classList.remove('active'); });
            t.classList.add('active');
            purposeInput.value = t.dataset.purpose;
        });
    });
    var priceSel = document.getElementById('ab-price');
    priceSel.addEventListener('change', function () {
        var parts = (priceSel.value || '').split('-');
        document.getElementById('ab-min-price').value = parts[0] || '';
        document.getElementById('ab-max-price').value = parts[1] || '';
    });

    /* ---- Location autocomplete (same /search_home endpoint as the old design) ---- */
    var keywordInput = document.getElementById('ab-keyword');
    var suggestBox = document.getElementById('ab-suggest');
    var csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var suggestTimer = null;
    var suggestSeq = 0;

    function closeSuggest() {
        suggestBox.classList.remove('open');
        suggestBox.innerHTML = '';
    }

    function renderSuggest(items) {
        suggestBox.innerHTML = '';
        if (!items.length) {
            var empty = document.createElement('div');
            empty.className = 'ab-suggest-empty';
            empty.textContent = 'No matching locations — press Search to look up this keyword.';
            suggestBox.appendChild(empty);
        } else {
            items.slice(0, 10).forEach(function (item) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'ab-suggest-item';
                var pin = document.createElement('span');
                pin.className = 'ab-suggest-pin';
                pin.textContent = '📍';
                btn.appendChild(pin);
                btn.appendChild(document.createTextNode(item.address));
                btn.addEventListener('click', function () {
                    keywordInput.value = item.address;
                    closeSuggest();
                    keywordInput.focus();
                });
                suggestBox.appendChild(btn);
            });
        }
        suggestBox.classList.add('open');
    }

    keywordInput.addEventListener('input', function () {
        var term = keywordInput.value.trim();
        clearTimeout(suggestTimer);
        if (term.length < 3) { closeSuggest(); return; }
        suggestTimer = setTimeout(function () {
            var seq = ++suggestSeq;
            var body = new URLSearchParams();
            body.append('_token', csrf);
            body.append('city_id', document.getElementById('ab-city').value);
            body.append('search', term);
            fetch('/search_home', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
                body: body.toString()
            })
            .then(function (r) { return r.ok ? r.json() : []; })
            .then(function (data) {
                if (seq !== suggestSeq) { return; } // stale response
                renderSuggest(Array.isArray(data) ? data : []);
            })
            .catch(function () { closeSuggest(); });
        }, 250);
    });

    // Refresh suggestions when the city changes while a term is typed
    document.getElementById('ab-city').addEventListener('change', function () {
        if (keywordInput.value.trim().length >= 3) {
            keywordInput.dispatchEvent(new Event('input'));
        } else {
            closeSuggest();
        }
    });

    // Close on outside click or Escape
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.ab-has-suggest')) { closeSuggest(); }
    });
    keywordInput.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { closeSuggest(); }
    });

    /* ---- DHA Transfer Expense Calculator ---- */
    /* Indicative rate assumptions — edit to match current DHA/FBR rules */
    var RATES = {
        stamp: 0.01,          // stamp duty
        registration: 0.01,   // registration + e-stamp
        cantonment: 0.005,    // cantonment / TIP tax
        fbr: {                // FBR advance tax on the DC/property value
            buyer:  { filer: 0.03, nonfiler: 0.105 },  // 236K
            seller: { filer: 0.03, nonfiler: 0.06  }   // 236C
        }
    };
    var state = { party: 'buyer', filer: 'filer' };

    function fmt(n) { return 'PKR ' + Math.round(n).toLocaleString('en-PK'); }

    function bindSeg(id, key) {
        document.querySelectorAll('#' + id + ' button').forEach(function (b) {
            b.addEventListener('click', function () {
                document.querySelectorAll('#' + id + ' button').forEach(function (x) { x.classList.remove('on'); });
                b.classList.add('on');
                state[key] = b.dataset.v;
                calc();
            });
        });
    }
    bindSeg('ab-party', 'party');
    bindSeg('ab-filer', 'filer');
    document.getElementById('ab-dcval').addEventListener('input', calc);
    document.getElementById('ab-plot').addEventListener('change', calc);

    function calc() {
        var v = parseFloat(document.getElementById('ab-dcval').value) || 0;
        var dha = parseFloat(document.getElementById('ab-plot').value) || 0;
        var fbr = v * RATES.fbr[state.party][state.filer];
        var stamp = v * RATES.stamp;
        var reg = v * RATES.registration;
        var cant = v * RATES.cantonment;
        var total = fbr + stamp + reg + dha + cant;

        document.getElementById('ab-fbrLabel').textContent =
            'FBR advance tax (' + (state.party === 'buyer' ? '236K' : '236C') + ', ' +
            (state.filer === 'filer' ? 'Filer' : 'Non-filer') + ')';
        document.getElementById('ab-oFbr').textContent = fmt(fbr);
        document.getElementById('ab-oStamp').textContent = fmt(stamp);
        document.getElementById('ab-oReg').textContent = fmt(reg);
        document.getElementById('ab-oDha').textContent = fmt(dha);
        document.getElementById('ab-oCant').textContent = fmt(cant);
        document.getElementById('ab-oTotal').textContent = fmt(total);
    }
    calc();
})();
</script>
@endsection
