{{--
    Keeps the price field (and any .numeric-only input) to digits alone.

    The old guard was an onkeypress handler, which only blocks typed
    characters - pasting, drag-and-drop and browser autofill all slipped
    through. A value like "1235 lack" then reached the server and broke the
    per-square-foot calculation with "A non-numeric value encountered".

    Listening on 'input' catches every path that can change the value.
--}}
<script>
(function ($) {
    'use strict';

    // #mytext is the price field on the add and edit property forms.
    var SELECTOR = '#mytext, input[name="price"], .numeric-only';

    function digitsOnly(value) {
        return String(value == null ? '' : value).replace(/[^0-9]/g, '');
    }

    $(document).on('input paste drop change', SELECTOR, function () {
        var el = this;
        // Defer for paste/drop: the value is not updated until after the event.
        window.setTimeout(function () {
            var clean = digitsOnly(el.value);
            if (el.value === clean) {
                return;
            }
            // Keep the caret where the user left it rather than jumping to the end.
            var pos = el.selectionStart;
            var removedBefore = String(el.value).slice(0, pos).replace(/[0-9]/g, '').length;
            el.value = clean;
            if (el.type === 'text' && el.setSelectionRange) {
                var next = Math.max(0, pos - removedBefore);
                try { el.setSelectionRange(next, next); } catch (e) { /* detached */ }
            }
            // The price field mirrors its value into a words label.
            $(el).trigger('keyup');
        }, 0);
    });

    // Last line of defence: strip anything left in the field on submit, so a
    // value set by script or autofill cannot reach the server.
    $(document).on('submit', 'form', function () {
        $(this).find(SELECTOR).each(function () {
            this.value = digitsOnly(this.value);
        });
    });
})(jQuery);
</script>
