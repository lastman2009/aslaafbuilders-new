{{--
    Location picker for the property add/edit screens.

    Uses Leaflet + OpenStreetMap tiles and Nominatim search, so it needs no
    API key. Replaces the old Google Maps picker, which rendered blank because
    no usable Maps key is available for this project.

    Expects the including page to provide:
      #locationpicker  - map container
      #address5        - address search box (display only, never submitted)
      #latitude        - lat input  (name="latitude"  - this is the real payload)
      #longitude       - lng input  (name="longitude" - this is the real payload)
      #city #town #phase #block - cascading location selects (all optional)

    The human-readable address column is built server-side from the
    block/phase/town/city selects, so #address5 only has to drive coordinates.
--}}

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="anonymous">

<style>
    /* The old Google build left this container with no height, so the map
       had nowhere to draw. */
    #locationpicker.gmap-frame { width: 100%; height: 340px; border-radius: 4px; z-index: 0; }
    .map-status {
        display: none;
        margin-top: 8px;
        padding: 7px 12px;
        border-radius: 4px;
        font-size: 13px;
        line-height: 1.4;
    }
    .map-status.is-busy  { display: block; background: #eef3fb; color: #2b5797; border: 1px solid #c7d9f2; }
    .map-status.is-warn  { display: block; background: #fdf5e3; color: #8a6100; border: 1px solid #f3e0b0; }
    .map-status.is-error { display: block; background: #fdeaea; color: #97231f; border: 1px solid #f3c2c0; }
    .map-coords {
        margin-top: 6px;
        font-size: 12px;
        color: #9a9a9a;
    }
    .map-hint { margin-top: 6px; font-size: 12px; color: #9a9a9a; }
    /* Search suggestion list */
    .map-suggest {
        position: absolute;
        z-index: 1000;
        left: 15px;
        right: 15px;
        background: #2b2b2b;
        border: 1px solid #444;
        border-top: none;
        max-height: 240px;
        overflow-y: auto;
        display: none;
    }
    .map-suggest div {
        padding: 8px 12px;
        cursor: pointer;
        font-size: 13px;
        color: #ddd;
        border-bottom: 1px solid #3a3a3a;
    }
    .map-suggest div:hover { background: #3a3a3a; }
</style>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="anonymous"></script>

<script>
(function ($) {
    'use strict';

    var DEFAULT_LAT = 31.554397; // Lahore, Pakistan
    var DEFAULT_LNG = 74.356078;

    var $map = $('#locationpicker');
    if (!$map.length) {
        return;
    }

    var $lat     = $('#latitude');
    var $lng     = $('#longitude');
    var $address = $('#address5');

    // The old markup hid lat/lng off-screen because they were machine-set.
    // They are user-editable now, so show them and let the map keep them in sync.
    var $coordWrap = $lat.parent();
    $coordWrap.removeAttr('style').addClass('map-coords');
    $lat.add($lng).removeAttr('readonly').removeAttr('hidden')
        .css({ width: '160px', display: 'inline-block', marginRight: '8px' });

    // A cleared address box must not block submit on a long form.
    $address.removeAttr('required');

    var $status = $('<div class="map-status" role="status" aria-live="polite"></div>');
    $map.after($status);

    function setStatus(message, kind) {
        if (!message) {
            $status.removeClass('is-busy is-warn is-error').hide().text('');
            return;
        }
        $status.removeClass('is-busy is-warn is-error')
               .addClass('is-' + (kind || 'busy')).text(message).show();
    }

    if (typeof L === 'undefined') {
        setStatus('Map library could not be loaded (no internet connection?). You can still type the latitude and longitude directly in the boxes below.', 'warn');
        $map.hide();
        return;
    }

    // Edit screens arrive with saved coordinates - keep them, never clobber
    // them with the Lahore default.
    function num(v) {
        v = parseFloat(v);
        return isNaN(v) ? null : v;
    }
    var savedLat = num($lat.val());
    var savedLng = num($lng.val());
    var hasSaved = savedLat !== null && savedLng !== null;

    var startLat = hasSaved ? savedLat : DEFAULT_LAT;
    var startLng = hasSaved ? savedLng : DEFAULT_LNG;

    var map = L.map('locationpicker').setView([startLat, startLng], hasSaved ? 16 : 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([startLat, startLng], { draggable: true }).addTo(map);

    function writeCoords(lat, lng) {
        // Trim to 6dp - roughly 0.1m, far more precision than a listing needs.
        $lat.val(lat.toFixed(6)).attr('value', lat.toFixed(6));
        $lng.val(lng.toFixed(6)).attr('value', lng.toFixed(6));
    }

    function moveTo(lat, lng, zoom) {
        marker.setLatLng([lat, lng]);
        map.setView([lat, lng], zoom || Math.max(map.getZoom(), 16));
        writeCoords(lat, lng);
    }

    if (!hasSaved) {
        writeCoords(startLat, startLng);
    }

    marker.on('dragend', function () {
        var p = marker.getLatLng();
        writeCoords(p.lat, p.lng);
        setStatus('');
    });

    map.on('click', function (e) {
        moveTo(e.latlng.lat, e.latlng.lng, map.getZoom());
        setStatus('');
    });

    // Typing coordinates by hand moves the map.
    $lat.add($lng).on('change', function () {
        var la = num($lat.val());
        var ln = num($lng.val());
        if (la === null || ln === null) {
            return;
        }
        if (la < -90 || la > 90 || ln < -180 || ln > 180) {
            setStatus('Latitude must be between -90 and 90, longitude between -180 and 180.', 'warn');
            return;
        }
        setStatus('');
        marker.setLatLng([la, ln]);
        map.setView([la, ln], Math.max(map.getZoom(), 16));
    });

    map.invalidateSize();
    // The picker often sits in a panel that is hidden at load; recalculate
    // once it becomes visible or Leaflet renders only a grey strip.
    setTimeout(function () { map.invalidateSize(); }, 400);
    $(window).on('resize', function () { map.invalidateSize(); });

    /* ---------------- address search (Nominatim, keyless) ---------------- */

    var $suggest = $('<div class="map-suggest"></div>');
    $address.closest('.row').css('position', 'relative').append($suggest);
    $address.attr('placeholder', 'Type an address, then pick a suggestion - or drag the marker');
    $address.after('<div class="map-hint">Search an address, click the map, or drag the marker. You can also type coordinates directly.</div>');

    function search(query, onDone) {
        $.ajax({
            url: 'https://nominatim.openstreetmap.org/search',
            data: { q: query, format: 'json', limit: 6, countrycodes: 'pk', addressdetails: 1 },
            dataType: 'json'
        }).done(onDone).fail(function () {
            setStatus('Address lookup is unavailable right now. Drag the marker or type coordinates instead.', 'warn');
        });
    }

    function showSuggestions(results) {
        $suggest.empty();
        if (!results || !results.length) {
            $suggest.hide();
            setStatus('No match for that address. Drag the marker to set the location manually.', 'warn');
            return;
        }
        setStatus('');
        $.each(results, function (_, r) {
            $('<div></div>').text(r.display_name).on('click', function () {
                $address.val(r.display_name);
                $suggest.hide();
                moveTo(parseFloat(r.lat), parseFloat(r.lon));
            }).appendTo($suggest);
        });
        $suggest.show();
    }

    var timer = null;
    $address.on('input', function () {
        var q = $.trim($address.val());
        clearTimeout(timer);
        if (q.length < 3) {
            $suggest.hide();
            return;
        }
        // Nominatim asks for at most 1 request/second.
        timer = setTimeout(function () {
            setStatus('Searching for "' + q + '"…', 'busy');
            search(q, showSuggestions);
        }, 600);
    });

    // Enter picks the first match instead of submitting the form.
    $address.on('keydown', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            var q = $.trim($address.val());
            if (q.length >= 3) {
                setStatus('Searching for "' + q + '"…', 'busy');
                search(q, function (results) {
                    if (results && results.length) {
                        $address.val(results[0].display_name);
                        $suggest.hide();
                        moveTo(parseFloat(results[0].lat), parseFloat(results[0].lon));
                        setStatus('');
                    } else {
                        showSuggestions(results);
                    }
                });
            }
        }
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest($suggest).length && e.target !== $address[0]) {
            $suggest.hide();
        }
    });

    /* ------------- follow the cascading location dropdowns -------------- */

    function selectedText(selector) {
        var $opt = $(selector + ' option:selected');
        if (!$opt.length) { return ''; }
        var text = $.trim($opt.text());
        if (!text || !$opt.val() || /^(select|choose|--)/i.test(text)) { return ''; }
        return text;
    }

    var userPlacedMarker = false;
    marker.on('dragend', function () { userPlacedMarker = true; });
    map.on('click', function () { userPlacedMarker = true; });

    $('#city, #town, #phase, #block').on('change', function () {
        // Never override a location the user placed by hand.
        if (userPlacedMarker) { return; }

        // Cascading selects repopulate over AJAX; let them settle first.
        setTimeout(function () {
            var parts = [];
            $.each(['#block', '#phase', '#town', '#city'], function (_, sel) {
                var t = selectedText(sel);
                if (t) { parts.push(t); }
            });
            if (!parts.length) { return; }

            var label = parts.join(', ');
            setStatus('Locating ' + label + '…', 'busy');
            search(label + ', Pakistan', function (results) {
                if (results && results.length) {
                    $address.val(label);
                    moveTo(parseFloat(results[0].lat), parseFloat(results[0].lon));
                    setStatus('');
                } else {
                    // Small blocks and phases are frequently not mapped - this
                    // is normal, not an error worth shouting about.
                    setStatus('Could not pin "' + label + '" automatically. Drag the marker to set the exact location.', 'warn');
                }
            });
        }, 300);
    });
})(jQuery);
</script>
