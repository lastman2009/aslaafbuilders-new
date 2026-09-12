{{--
    Public property-detail map.

    Uses Leaflet + OpenStreetMap tiles, so it needs no API key. Replaces the
    Google Maps embed, which showed "Oops! Something went wrong" because no
    usable Maps key is available for this project.

    Expects the page to provide:
      #map       - the map container (rendered once, inside an @if/@else pair)
      #show-map  - button that reveals the map

    Reads coordinates from $property.
--}}

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="anonymous">

<style>
    #map { width: 100%; height: 400px; }
    .map-unavailable {
        padding: 24px;
        text-align: center;
        color: #777;
        font-size: 14px;
        background: #f3f3f3;
    }
</style>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="anonymous"></script>

<script>
(function ($) {
    'use strict';

    var lat = parseFloat("{{ $property->latitude }}");
    var lng = parseFloat("{{ $property->longitude }}");
    var title = @json($property->title);
    var address = @json($property->address);

    var map = null;

    function render() {
        var el = document.getElementById('map');
        if (!el || map) {
            return; // already drawn, or nothing to draw into
        }

        if (isNaN(lat) || isNaN(lng)) {
            el.innerHTML = '<div class="map-unavailable">No location has been set for this property.</div>';
            return;
        }

        if (typeof L === 'undefined') {
            el.innerHTML = '<div class="map-unavailable">The map could not be loaded. Please check your connection and try again.</div>';
            return;
        }

        map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup('<strong>' + $('<div>').text(title).html() + '</strong>'
                + (address ? '<br>' + $('<div>').text(address).html() : ''));

        // The map is inside a panel that is hidden until "Show Map" is
        // clicked; Leaflet needs to recalculate once it becomes visible or
        // it renders only a grey strip.
        setTimeout(function () { map.invalidateSize(); }, 200);
    }

    $(document).ready(function () {
        $('#show-map').on('click', function (e) {
            e.preventDefault();
            render();
        });

        // If the map container is already visible on load, draw it straight away.
        var el = document.getElementById('map');
        if (el && $(el).is(':visible')) {
            render();
        }
    });

    $(window).on('resize', function () {
        if (map) { map.invalidateSize(); }
    });
})(jQuery);
</script>
