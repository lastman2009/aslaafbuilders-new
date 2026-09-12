{{--
    Side-by-side maps for the property comparison page.

    Uses Leaflet + OpenStreetMap tiles, so it needs no API key. Replaces the
    Google Maps embed, which rendered "Oops! Something went wrong" because no
    usable Maps key is available for this project.

    Expects the page to provide #map1 and #map2, and the $firstproperty /
    $secondproperty models.
--}}

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="anonymous">

<style>
    #map1, #map2 { height: 311px; width: 100%; }
    .compare-map-empty {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #777;
        font-size: 13px;
        background: #f3f3f3;
        text-align: center;
        padding: 12px;
    }
</style>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="anonymous"></script>

<script>
(function () {
    'use strict';

    var maps = [
        { id: 'map1',
          lat: parseFloat("{{ $firstproperty->latitude ?? '' }}"),
          lng: parseFloat("{{ $firstproperty->longitude ?? '' }}"),
          title: @json($firstproperty->title ?? '') },
        { id: 'map2',
          lat: parseFloat("{{ $secondproperty->latitude ?? '' }}"),
          lng: parseFloat("{{ $secondproperty->longitude ?? '' }}"),
          title: @json($secondproperty->title ?? '') }
    ];

    function draw(cfg) {
        var el = document.getElementById(cfg.id);
        if (!el) {
            return;
        }
        if (isNaN(cfg.lat) || isNaN(cfg.lng)) {
            el.innerHTML = '<div class="compare-map-empty">No location set for this property.</div>';
            return;
        }
        if (typeof L === 'undefined') {
            el.innerHTML = '<div class="compare-map-empty">The map could not be loaded.</div>';
            return;
        }

        var map = L.map(cfg.id).setView([cfg.lat, cfg.lng], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([cfg.lat, cfg.lng]).addTo(map);
        if (cfg.title) {
            marker.bindPopup(document.createTextNode(cfg.title).textContent);
        }

        // The maps sit in comparison panels that may start hidden.
        setTimeout(function () { map.invalidateSize(); }, 250);
        window.addEventListener('resize', function () { map.invalidateSize(); });
    }

    function init() { maps.forEach(draw); }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
