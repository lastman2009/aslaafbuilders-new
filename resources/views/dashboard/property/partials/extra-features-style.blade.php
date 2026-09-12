{{--
    Compact layout for the "Extra Features" block on the property add and
    edit screens.

    These fields hold very short values - a number, a yes/no, or one word -
    so the original two-per-row layout with full-width inputs left most of
    each row empty. Scoped to .extra-feature so nothing else is affected.
--}}
<style>
    .extra-feature-tab .panel-body { padding: 15px 20px; }
    .extra-feature-tab h1,
    .property-section h1 {
        font-size: 18px;
        margin: 0 0 14px;
        padding-bottom: 8px;
        border-bottom: 1px solid #3a3a3a;
    }

    .row.extra-feature .form-group { margin-bottom: 12px; }
    .row.extra-feature .control-label {
        margin-bottom: 4px !important;
        font-size: 12px;
        text-transform: capitalize;
        /* Labels like "Distance From Railway Station (Kms)" would otherwise
           push their row taller than its neighbours. */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
    }
    .row.extra-feature input[type="text"],
    .row.extra-feature input[type="number"],
    .row.extra-feature select { height: 34px; padding: 4px 8px; }

    /* The section keeps its own scrollbar so the page stays manageable, but
       at a height that actually shows several rows. slimscroll's default
       left it about 100px tall, which hid most fields. */
    .row.extra-feature .extra-feature-scroll,
    .row.extra-feature .nicescroll-bar {
        height: 520px;
        max-height: 520px;
        overflow-y: auto;
        /* Leave room for the scrollbar so it never sits on top of a field. */
        padding-right: 12px;
    }

    /* The input fields are laid out as a flex grid too. With floats, one
       tall field overhung the rows beneath it, pushing the checkbox block
       up into a large blank gap. Flex wrapping has no such carry-over. */
    .row.extra-feature .extra-feature-inputs {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }
    .row.extra-feature .col-md-6:not(.extra-feature-check) {
        float: none !important;
        clear: none !important;
        width: 100%;
    }
    @media (min-width: 768px) {
        .row.extra-feature .col-md-6:not(.extra-feature-check) { width: 50%; }
    }
    @media (min-width: 992px) {
        .row.extra-feature .col-md-6:not(.extra-feature-check) { width: 33.3333%; }
    }
    @media (min-width: 1200px) {
        .row.extra-feature .col-md-6:not(.extra-feature-check) { width: 25%; }
        /* Flooring and Electricity Backup are multi-selects holding several
           values at once, so they share the first row at half width each. */
        .row.extra-feature .extra-feature-inputs > .col-md-6:nth-child(-n+2) { width: 50%; }
    }

    /* Checkbox fields reuse .col-md-6 like the inputs above, so without this
       they continue the same 4-up sequence and start mid-row. Giving the
       group a full-width break and its own even columns keeps them tidy and
       stops two-line labels ("Broadband Internet Access") from staggering. */
    /* The checkbox group is laid out as its own flex grid. Floats made it
       depend on the height of whatever input row preceded it, which left
       ragged part-rows; flex wrapping is unaffected by that. */
    .row.extra-feature .extra-feature-checks {
        clear: both;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        padding-top: 6px;
    }
    .row.extra-feature .col-md-6.extra-feature-check {
        min-height: 46px;
        float: none !important;
        clear: none !important;
        width: 100%;            /* mobile default */
    }
    @media (min-width: 768px) {
        .row.extra-feature .col-md-6.extra-feature-check { width: 50%; }
    }
    @media (min-width: 992px) {
        .row.extra-feature .col-md-6.extra-feature-check { width: 33.3333%; }
    }
    @media (min-width: 1200px) {
        .row.extra-feature .col-md-6.extra-feature-check { width: 25%; }
    }
    .row.extra-feature .col-md-6.extra-feature-check .form-group { margin-bottom: 4px; }
    .row.extra-feature .extra-select { margin: 0; padding: 0; list-style: none; }
    .row.extra-feature .extra-select li {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        min-height: 34px;
    }
    .row.extra-feature .extra-select input[type="checkbox"] {
        margin: 2px 0 0;
        flex: 0 0 auto;
    }
    .row.extra-feature .extra-select label {
        margin: 0;
        font-size: 13px;
        line-height: 1.35;
        white-space: normal;   /* these labels may wrap; inputs' may not */
        font-weight: normal;
        cursor: pointer;
    }
</style>

<script>
(function ($) {
    'use strict';
    // init.js calls slimscroll on every .nicescroll-bar, which wraps this
    // container in a .slimScrollDiv, fixes its height at ~100px and breaks
    // the parent chain the layout rules rely on. We keep the scrolling but
    // do it with plain CSS, so the class is dropped before slimscroll sees
    // it and anything it already built is unwrapped.
    function release() {
        var $bar = $('.row.extra-feature .nicescroll-bar');
        if ($bar.length) {
            $bar.removeClass('nicescroll-bar').addClass('extra-feature-scroll')
                .css({ height: '', maxHeight: '', overflow: '' });
        }
        $('.row.extra-feature .slimScrollDiv').each(function () {
            $(this).children().first().unwrap();
        });
        $('.row.extra-feature').find('.slimScrollBar, .slimScrollRail').remove();

        // Checkboxes reuse .col-md-6; tag them so the grid rules can treat
        // them separately without relying on :has(), which older browsers
        // in this admin theme do not support.
        var $checks = $('.row.extra-feature .col-md-6').filter(function () {
            return $(this).find('.extra-select').length > 0;
        });
        $checks.addClass('extra-feature-check');
        // Wrap the input fields in their own flex container, so the two
        // groups lay out independently of each other.
        var $inputs = $('.row.extra-feature > * > .col-md-6, .row.extra-feature > .col-md-6').filter(function () {
            return $(this).find('.extra-select').length === 0;
        });
        if ($inputs.length && !$inputs.first().parent().hasClass('extra-feature-inputs')) {
            $inputs.first().before('<div class="extra-feature-inputs"></div>');
            $('.row.extra-feature .extra-feature-inputs').first().append($inputs);
        }

        // Move the whole checkbox group into one flex container so it lays
        // out independently of the input fields above it.
        if ($checks.length && !$checks.first().parent().hasClass('extra-feature-checks')) {
            $checks.first().before('<div class="extra-feature-checks"></div>');
            $('.row.extra-feature .extra-feature-checks').first().append($checks);
        }
    }
    release();
    $(function () { release(); });
    $(window).on('load', release);
})(jQuery);
</script>
