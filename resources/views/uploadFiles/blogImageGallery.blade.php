@php
$title = "Blog Images Gallery";
@endphp

@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<style type="text/css">
    .gallery-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }
    .gallery-toolbar form { display: flex; gap: 8px; flex-wrap: wrap; margin: 0; }
    .gallery-toolbar .form-control, .gallery-toolbar .btn { height: 36px; }
    .gallery-count { color: #9c9c9c; font-size: 13px; }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
        gap: 16px;
    }
    .gallery-card {
        background: #1f1f1f;
        border: 1px solid #333;
        border-radius: 6px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    /* Fixed-ratio box so the grid never reflows as images decode. */
    .gallery-thumb {
        position: relative;
        display: block;
        background: #111;
        aspect-ratio: 4 / 3;
        overflow: hidden;
    }
    .gallery-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    /* Marked by JS when the file 404s, so a dead row is obvious. */
    .gallery-thumb.is-missing {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .gallery-thumb.is-missing img { display: none; }
    .gallery-thumb.is-missing:after {
        content: "File missing on disk";
        color: #d9534f;
        font-size: 12px;
        text-align: center;
        padding: 0 10px;
    }
    .gallery-body { padding: 10px; display: flex; flex-direction: column; gap: 8px; }
    .gallery-title {
        color: #ddd;
        font-size: 12px;
        line-height: 1.35;
        word-break: break-word;
        margin: 0;
        min-height: 32px;
    }
    .gallery-url {
        width: 100%;
        font-size: 11px;
        background: #2b2b2b;
        border: 1px solid #3d3d3d;
        color: #bbb;
        border-radius: 3px;
        padding: 5px 7px;
    }
    .gallery-actions { display: flex; gap: 6px; }
    .gallery-actions .btn { flex: 1; font-size: 11px; padding: 5px 8px; }
    .gallery-empty { color: #999; padding: 40px 0; text-align: center; }
    .gallery-pager { margin-top: 22px; }
    .gallery-pager .pagination { margin: 0; }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>Blog Image Gallery</h2>

                            <div class="gallery-toolbar">
                                <form method="GET" action="/blogImageGallery">
                                    <input type="text" name="q" value="{{ $search }}" class="form-control"
                                           placeholder="Search title, description or filename" style="min-width:260px;">
                                    <select name="per_page" class="form-control" style="width:auto;">
                                        @foreach ([12, 24, 48, 96] as $size)
                                            <option value="{{ $size }}" @selected($perPage === $size)>{{ $size }} per page</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    @if ($search !== '')
                                        <a href="/blogImageGallery" class="btn btn-default">Clear</a>
                                    @endif
                                </form>

                                <span class="gallery-count">
                                    @if ($rows->total() > 0)
                                        Showing {{ $rows->firstItem() }}&ndash;{{ $rows->lastItem() }}
                                        of {{ $rows->total() }} uploads ({{ count($images) }} images on this page)
                                    @else
                                        No uploads found
                                    @endif
                                </span>
                            </div>

                            @if (count($images) === 0)
                                <p class="gallery-empty">
                                    @if ($search !== '')
                                        No images match &ldquo;{{ $search }}&rdquo;.
                                    @else
                                        No images have been uploaded yet.
                                        <a href="/uploadImagesView">Upload some images</a>.
                                    @endif
                                </p>
                            @else
                                <div class="gallery-grid">
                                    @foreach ($images as $image)
                                        <div class="gallery-card">
                                            <a class="gallery-thumb" href="{{ $image['url'] }}" target="_blank" rel="noopener">
                                                <img src="{{ $image['url'] }}"
                                                     alt="{{ $image['title'] ?: $image['file'] }}"
                                                     width="210" height="158" loading="lazy" decoding="async">
                                            </a>
                                            <div class="gallery-body">
                                                <p class="gallery-title" title="{{ $image['title'] }}">{{ $image['title'] }}</p>
                                                <input type="text" class="gallery-url" readonly
                                                       value="{{ $image['url'] }}" aria-label="Image URL">
                                                <div class="gallery-actions">
                                                    <button type="button" class="btn btn-success btn-copy"
                                                            data-url="{{ $image['url'] }}">Copy URL</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="gallery-pager">
                                    {{ $rows->links() }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- /Row -->
@include('includes_admin.footer')

<script type="text/javascript">
(function () {
    // Copy: use the async Clipboard API, falling back to the legacy selection
    // trick on non-secure origins where navigator.clipboard is unavailable.
    function legacyCopy(text) {
        var input = document.createElement('textarea');
        input.value = text;
        input.setAttribute('readonly', '');
        input.style.position = 'fixed';
        input.style.opacity = '0';
        document.body.appendChild(input);
        input.select();
        try { document.execCommand('copy'); } catch (e) { /* nothing else to try */ }
        document.body.removeChild(input);
    }

    function flash(button) {
        var original = button.innerHTML;
        button.innerHTML = 'Copied';
        setTimeout(function () { button.innerHTML = original; }, 1200);
    }

    document.querySelectorAll('.btn-copy').forEach(function (button) {
        button.addEventListener('click', function () {
            var url = button.getAttribute('data-url');
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(function () { flash(button); },
                                                        function () { legacyCopy(url); flash(button); });
            } else {
                legacyCopy(url);
                flash(button);
            }
        });
    });

    // Flag rows whose file is no longer on disk instead of showing a broken icon.
    document.querySelectorAll('.gallery-thumb img').forEach(function (img) {
        img.addEventListener('error', function () {
            img.parentNode.classList.add('is-missing');
        });
    });
})();
</script>
