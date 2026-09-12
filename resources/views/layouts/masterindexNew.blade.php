
@include("includes.header-new")

@include('partials.header.navbar')
<?php
 $buffer=ob_get_contents();

    ob_end_clean();
    // Restart output buffering immediately: ending it above closes PHP's
    // SAPI-level buffer (output_buffering ini setting) too, which forces
    // headers to be sent on the next echo below — silently dropping the
    // session/CSRF cookie Laravel queues on Response::send() for any
    // first-time visit to a page using this layout.
    ob_start();
    // Every placeholder is always replaced. Pages that do not set a value
    // get the site default - leaving a token unreplaced used to ship the
    // literal "%DESCRIPTION%" to search engines.
    $seo_defaults = [
        '%TITLE%'       => 'Aslaaf Builders',
        '%DESCRIPTION%' => 'Aslaaf Builders - buy, sell and rent property across Pakistan.',
        '%KEYWORD%'     => 'property, real estate, Pakistan, Aslaaf Builders',
        '%CANONICAL%'   => url()->current(),
        '%OGIMAGE%'     => url('/image/favicon-32x32.png'),
    ];
    $seo_values = [
        '%TITLE%'       => isset($title)       ? $title       : null,
        '%DESCRIPTION%' => isset($description) ? $description : null,
        '%KEYWORD%'     => isset($keyword)     ? $keyword     : null,
        '%CANONICAL%'   => isset($canonical)   ? $canonical   : null,
        '%OGIMAGE%'     => isset($og_image)    ? $og_image    : null,
    ];
    foreach ($seo_defaults as $token => $default) {
        $value = $seo_values[$token];
        if ($value === null || trim((string) $value) === '') {
            $value = $default;
        }
        // These land inside HTML attributes, so quotes must be escaped.
        $buffer = str_replace($token, e($value), $buffer);
    }

    echo $buffer;
?>
@yield('body')

@include("includes.footer-new")