{{-- Shared site header (topbar + navbar). No <body> tag here so it can be
     included both by layouts.masterindexNew (via partials.header.navbar)
     and by the legacy includes.header / includes.authHeader chain. --}}

    <!-- Top bar -->
    <div class="ab-topbar">
        <div class="ab-wrap">
            <div class="ab-top-left">
                <span>&#128222; 0321 843 3312 &middot; 0321 433 3103</span>
                <span>&#9993;&#65039; support@aslaafbuilders.com</span>
            </div>
            <div class="ab-top-right">
                @if(empty(Auth::user()))
                <a href="javascript:void(0)" onclick="abOpenModal('#loginModal','#fsModal2')">Post Free Ad</a>
                @else
                <a href="/dashboard/property/add">Post Free Ad</a>
                @endif
                <a href="https://wa.me/923218433312" target="_blank" rel="noopener">&#128172; Join our WhatsApp Channel</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="ab-header">
        <div class="ab-wrap">
            <a class="ab-logo" href="/">
                <span class="ab-badge-mark">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M4 13 L12 5 L20 13" stroke="#e0a400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5 L12 10" stroke="#e0a400" stroke-width="2" stroke-linecap="round"/></svg>
                </span>
                <span class="ab-logo-txt"><b>ASLAAF</b><small>BUILDERS (PVT) LTD</small></span>
            </a>

            <button type="button" class="ab-burger" id="ab-burger" aria-label="Toggle navigation" aria-expanded="false">&#9776;</button>

            <nav class="ab-nav" id="ab-nav">
                <a href="/property/Buy">Buy</a>
                <a href="/property/Rent">Rent</a>
                <a href="/buy/plots">Plots</a>
                <a href="/property/Project">Projects</a>
                <a href="/#filesRates" id="filesRatesLink">Files Rates</a>
                <a href="/blog">Blog</a>
                <a href="/news">News</a>
                <a href="/#calculator" style="color:var(--ab-orange-dark);font-weight:600">Calculator</a>
            </nav>

            <div class="ab-head-actions">
                <a class="ab-btn ab-btn-wa" href="https://wa.me/923218433312" target="_blank" rel="noopener">&#128172; WhatsApp Channel</a>
                @if(empty(Auth::user()))
                <a class="ab-btn ab-btn-primary" href="javascript:void(0)" onclick="abOpenModal('#loginModal','#fsModal2')">Post Property</a>
                @else
                <a class="ab-btn ab-btn-primary" href="/dashboard/property/add">Post Property</a>
                <div class="ab-user" id="ab-user">
                    <a href="javascript:void(0)">Hi! {{ Auth::user()->first_name }} &#9662;</a>
                    <div class="ab-user-menu">
                        <a href="/dashboard">Dashboard</a>
                        <a href="/dashboard/profile/view">Profile</a>
                        <a href="/dashboard/profile/edit">Settings</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </header>

    <script>
    function abOpenModal(primary, fallback) {
        var target = document.querySelector(primary) ? primary
                   : (document.querySelector(fallback) ? fallback : null);
        if (target && window.jQuery && typeof jQuery(target).modal === 'function') {
            jQuery(target).modal('show');
        } else {
            window.location = '/login';
        }
    }
    (function () {
        // Smooth-scroll for homepage anchor links (Calculator, Files Rates, …)
        // when the target section is already on the current page.
        document.querySelectorAll('.ab-nav a[href^="/#"]').forEach(function (link) {
            link.addEventListener('click', function (e) {
                var target = document.getElementById(link.getAttribute('href').slice(2));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    history.replaceState(null, '', link.getAttribute('href'));
                    var nav = document.getElementById('ab-nav');
                    if (nav) { nav.classList.remove('open'); }
                }
            });
        });

        var burger = document.getElementById('ab-burger');
        var nav = document.getElementById('ab-nav');
        if (burger && nav) {
            burger.addEventListener('click', function () {
                var open = nav.classList.toggle('open');
                burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
        }
        var user = document.getElementById('ab-user');
        if (user) {
            user.addEventListener('click', function (e) {
                if (e.target.closest('.ab-user > a')) { user.classList.toggle('open'); }
            });
        }
    })();
    </script>
