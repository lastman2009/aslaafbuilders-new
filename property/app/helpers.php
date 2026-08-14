<?php

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

if (!function_exists('ab_image_url')) {
    /**
     * Same lookup as ab_image(), but the fallback is an external URL
     * (e.g. the design's Unsplash stock photos) instead of a local asset path.
     * Used where we want the design's real reference imagery to show until
     * real DB images exist at $path, rather than a dummy SVG.
     */
    function ab_image_url($path, $fallbackUrl)
    {
        $path = ltrim((string) $path, '/');
        return ($path !== '' && file_exists(public_path($path))) ? asset($path) : $fallbackUrl;
    }
}

if (!function_exists('nice_number')) {
    /**
     * Format a number into a human readable PKR figure (Crore / Lac / …).
     * Canonical definition — the legacy per-view copies are wrapped in
     * function_exists guards and defer to this one.
     */
    function nice_number($n)
    {
        $n = (0 + str_replace(',', '', (string) $n));

        if (!is_numeric($n)) {
            return false;
        }

        if ($n > 1000000000000) {
            return round(($n / 1000000000000), 2) . ' Trillion';
        } elseif ($n > 1000000000) {
            return round(($n / 1000000000), 2) . ' Billion';
        } elseif ($n > 10000000) {
            return round(($n / 10000000), 2) . ' Crore';
        } elseif ($n > 100000) {
            return round(($n / 100000), 2) . ' Lac';
        } elseif ($n > 1000) {
            return round(($n / 1000), 2) . ' Thousand';
        }

        return number_format($n);
    }
}
