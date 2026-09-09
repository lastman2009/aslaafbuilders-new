@php
$title = $isEdit ? 'Edit Post' : 'Add New Post';
$action = $isEdit ? route('admin.posts.update', $post->id) : route('admin.posts.store');
// Repopulate from old() on validation failure so nothing typed is lost.
$val = fn($field, $default = null) => old($field, $default);
$selCats = old('category_id', $selectedCats);
$selTags = old('tags_ids', $selectedTags);
$publishedAt = old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '');
@endphp
@include("includes_admin.title")
@include('includes_admin.sidebar')

<link rel="stylesheet" href="{{ asset('assets_admin/vendors/bower_components/summernote/dist/summernote.css') }}">

<style type="text/css">
    .pe-layout { display:grid; grid-template-columns: minmax(0,1fr) 320px; gap:20px; align-items:start; }
    @media (max-width: 1100px) { .pe-layout { grid-template-columns: minmax(0,1fr); } }
    .pe-box { background:#1f1f1f; border:1px solid #333; border-radius:6px; margin-bottom:18px; }
    .pe-box > h3 { margin:0; padding:11px 14px; font-size:13px; font-weight:700; text-transform:uppercase;
                   letter-spacing:.04em; color:#ddd; border-bottom:1px solid #333; }
    .pe-box > .pe-body { padding:14px; }
    .pe-field { margin-bottom:14px; }
    .pe-field:last-child { margin-bottom:0; }
    .pe-field label { display:block; font-size:12px; font-weight:600; color:#c9c9c9; margin-bottom:5px; }
    .pe-field .help { font-size:11px; color:#8c8c8c; margin-top:4px; display:block; }
    .pe-title-input { font-size:20px !important; height:auto !important; padding:10px 12px !important; font-weight:600; }
    .pe-url { display:flex; align-items:center; gap:6px; flex-wrap:wrap; font-size:12px; }
    .pe-url .pe-url-prefix { color:#8c8c8c; white-space:nowrap; }
    .pe-url input { flex:1; min-width:160px; }
    .pe-slug-msg { font-size:11px; margin-top:5px; min-height:15px; }
    .pe-slug-msg.ok { color:#5cb85c; }
    .pe-slug-msg.bad { color:#d9534f; }
    .pe-checklist { max-height:190px; overflow-y:auto; border:1px solid #3a3a3a; border-radius:4px; padding:9px; background:#191919; }
    .pe-checklist label { display:block; font-weight:400; font-size:13px; color:#ddd; margin:0 0 6px; cursor:pointer; }
    .pe-checklist input { margin-right:7px; }
    .pe-counter { font-size:11px; color:#8c8c8c; float:right; font-weight:400; }
    .pe-counter.over { color:#d9534f; font-weight:700; }
    .pe-preview { background:#fff; border-radius:4px; padding:12px 14px; }
    .pe-preview .g-title { color:#1a0dab; font-size:17px; line-height:1.3; margin-bottom:2px; }
    .pe-preview .g-url { color:#006621; font-size:12px; word-break:break-all; }
    .pe-preview .g-desc { color:#545454; font-size:12.5px; line-height:1.45; margin-top:3px; }
    .pe-img-preview { width:100%; max-height:170px; object-fit:contain; background:#111; border-radius:4px;
                      display:block; margin-bottom:8px; }
    .pe-actions { display:flex; gap:8px; flex-wrap:wrap; }
    .pe-errors { margin-bottom:16px; }
    .pe-sticky-save { position:sticky; top:10px; z-index:5; }
</style>

<div class="page-wrapper">
    <div class="container-fluid">

        @if($errors->any())
            <div class="alert alert-danger pe-errors">
                <strong>Please fix the following:</strong>
                <ul style="margin:8px 0 0 18px;">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ $action }}" enctype="multipart/form-data" id="pe-form">
            @csrf
            @if($isEdit) @method('PUT') @endif

            <div class="pe-layout">
                {{-- ================= MAIN COLUMN ================= --}}
                <div>
                    <div class="pe-box">
                        <div class="pe-body">
                            <div class="pe-field">
                                <label for="pe-title">Title</label>
                                <input type="text" id="pe-title" name="title" required maxlength="255"
                                       class="form-control pe-title-input"
                                       value="{{ $val('title', $post->title) }}"
                                       placeholder="Add title">
                            </div>

                            <div class="pe-field">
                                <label for="pe-slug">Permalink</label>
                                <div class="pe-url">
                                    <span class="pe-url-prefix">{{ url('/blog') }}/{{ $isEdit ? $post->id : 'ID' }}/</span>
                                    <input type="text" id="pe-slug" name="slug" class="form-control"
                                           value="{{ $val('slug', $post->slug) }}"
                                           placeholder="auto-generated-from-title">
                                    <button type="button" class="btn btn-default btn-sm" id="pe-slug-check">Check</button>
                                </div>
                                <div class="pe-slug-msg" id="pe-slug-msg"></div>
                                <span class="help">
                                    Lowercase letters, numbers and hyphens only. Leave blank to generate from the title.
                                    @if($isEdit)
                                        Changing this issues a 301 redirect from the old URL, so existing links keep working.
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Content</h3>
                        <div class="pe-body">
                            <textarea id="pe-editor" name="contant" class="form-control" rows="18">{{ $val('contant', $post->contant) }}</textarea>
                            <span class="help">Use the image button to insert pictures. Existing uploads live in the
                                <a href="/blogImageGallery" target="_blank" rel="noopener">Blog Gallery</a>.</span>
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Search Engine Optimisation</h3>
                        <div class="pe-body">
                            <div class="pe-field">
                                <label for="pe-focus">Focus keyword</label>
                                <input type="text" id="pe-focus" name="focus_keyword" class="form-control" maxlength="255"
                                       value="{{ $val('focus_keyword', $post->focus_keyword) }}"
                                       placeholder="e.g. DHA Peshawar plot prices">
                                <span class="help">The main phrase you want this post to rank for. Used for the checks below.</span>
                            </div>

                            <div class="pe-field">
                                <label for="pe-meta-title">
                                    SEO title
                                    <span class="pe-counter" id="pe-mt-count">0 / 60</span>
                                </label>
                                <input type="text" id="pe-meta-title" name="meta_title" class="form-control" maxlength="255"
                                       value="{{ $val('meta_title', $post->meta_title) }}"
                                       placeholder="Defaults to the post title">
                                <span class="help">Aim for under 60 characters so Google does not truncate it.</span>
                            </div>

                            <div class="pe-field">
                                <label for="pe-meta-desc">
                                    Meta description
                                    <span class="pe-counter" id="pe-md-count">0 / 160</span>
                                </label>
                                <textarea id="pe-meta-desc" name="meta_description" class="form-control" rows="3" maxlength="320"
                                          placeholder="A one or two sentence summary shown in search results.">{{ $val('meta_description', $post->meta_description) }}</textarea>
                                <span class="help">Aim for 120&ndash;160 characters. Left blank, an excerpt of the body is used.</span>
                            </div>

                            <div class="pe-field">
                                <label for="pe-meta-keyword">Meta keywords</label>
                                <input type="text" id="pe-meta-keyword" name="meta_keyword" class="form-control" maxlength="255"
                                       value="{{ $val('meta_keyword', $post->meta_keyword) }}"
                                       placeholder="comma, separated, keywords">
                            </div>

                            <div class="pe-field">
                                <label for="pe-canonical">Canonical URL</label>
                                <input type="url" id="pe-canonical" name="canonical_url" class="form-control" maxlength="255"
                                       value="{{ $val('canonical_url', $post->canonical_url) }}"
                                       placeholder="Leave blank to use this post's own URL">
                                <span class="help">Only set this if the same content is published elsewhere and that copy should rank.</span>
                            </div>

                            <div class="pe-field">
                                <label>Google preview</label>
                                <div class="pe-preview">
                                    <div class="g-title" id="pe-prev-title">&nbsp;</div>
                                    <div class="g-url" id="pe-prev-url">&nbsp;</div>
                                    <div class="g-desc" id="pe-prev-desc">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= SIDEBAR ================= --}}
                <div>
                    <div class="pe-box pe-sticky-save">
                        <h3>Publish</h3>
                        <div class="pe-body">
                            <div class="pe-field">
                                <label for="pe-status">Status</label>
                                <select id="pe-status" name="status" class="form-control">
                                    <option value="{{ \App\Blog::STATUS_PUBLISHED }}" @selected((int) $val('status', $post->status) === \App\Blog::STATUS_PUBLISHED)>Published</option>
                                    <option value="{{ \App\Blog::STATUS_DRAFT }}"     @selected((int) $val('status', $post->status) === \App\Blog::STATUS_DRAFT)>Draft</option>
                                    <option value="{{ \App\Blog::STATUS_TRASHED }}"   @selected((int) $val('status', $post->status) === \App\Blog::STATUS_TRASHED)>Trashed</option>
                                </select>
                                <span class="help">Only <strong>Published</strong> posts appear on the website.</span>
                            </div>

                            <div class="pe-field">
                                <label for="pe-published-at">Publish date</label>
                                <input type="datetime-local" id="pe-published-at" name="published_at"
                                       class="form-control" value="{{ $publishedAt }}">
                                <span class="help">Set a future date and time to schedule the post.</span>
                            </div>

                            <div class="pe-field">
                                <label for="pe-identifier">Section</label>
                                <select id="pe-identifier" name="identifier" class="form-control">
                                    <option value="{{ \App\Blog::TYPE_BLOG }}" @selected((int) $val('identifier', $post->identifier) === \App\Blog::TYPE_BLOG)>Blog</option>
                                    <option value="{{ \App\Blog::TYPE_NEWS }}" @selected((int) $val('identifier', $post->identifier) === \App\Blog::TYPE_NEWS)>News</option>
                                </select>
                                <span class="help">Chooses which listing the post shows in.</span>
                            </div>

                            <div class="pe-field">
                                <label for="pe-author">Author name</label>
                                <input type="text" id="pe-author" name="author_name" class="form-control" maxlength="255"
                                       value="{{ $val('author_name', $post->author_name) }}">
                            </div>

                            <div class="pe-actions">
                                <button type="submit" class="btn btn-success">{{ $isEdit ? 'Update Post' : 'Save Post' }}</button>
                                @if($isEdit)
                                    <a href="{{ $post->url }}" target="_blank" rel="noopener" class="btn btn-default">View</a>
                                @endif
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Featured image</h3>
                        <div class="pe-body">
                            <img class="pe-img-preview" id="pe-featured-preview"
                                 src="{{ ab_image('images/blogs_images/' . $post->gallery, 'assets_admin/dist/img/selcetimg.jpg') }}"
                                 alt="Featured image preview">
                            <input type="file" name="photo" id="pe-photo" accept="image/*" class="form-control">
                            <span class="help">Scaled to 1200px wide, aspect ratio preserved &mdash; nothing is cropped.
                                @if($isEdit && $post->gallery) Leave empty to keep the current image. @endif
                            </span>
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Infographic (optional)</h3>
                        <div class="pe-body">
                            <img class="pe-img-preview" id="pe-info-preview"
                                 src="{{ ab_image('images/blogs_images/' . $post->info_graphic, 'assets_admin/dist/img/selcetimg.jpg') }}"
                                 alt="Infographic preview">
                            <input type="file" name="info_graphic" id="pe-infographic" accept="image/*" class="form-control">
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Social share image</h3>
                        <div class="pe-body">
                            <div class="pe-field">
                                <input type="text" name="og_image" class="form-control" maxlength="255"
                                       value="{{ $val('og_image', $post->og_image) }}"
                                       placeholder="filename.jpg or full URL">
                                <span class="help">Used for Facebook/Twitter cards. Blank falls back to the featured image.</span>
                            </div>
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Categories</h3>
                        <div class="pe-body">
                            <div class="pe-checklist">
                                @forelse($categories as $category)
                                    <label>
                                        <input type="checkbox" name="category_id[]" value="{{ $category->id }}"
                                               @checked(in_array($category->id, (array) $selCats))>
                                        {{ $category->title }}
                                    </label>
                                @empty
                                    <span style="color:#8c8c8c;font-size:12px;">No categories yet.</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="pe-box">
                        <h3>Tags</h3>
                        <div class="pe-body">
                            <div class="pe-checklist" style="max-height:150px;">
                                @forelse($tags as $tag)
                                    <label>
                                        <input type="checkbox" name="tags_ids[]" value="{{ $tag->id }}"
                                               @checked(in_array($tag->id, (array) $selTags))>
                                        {{ $tag->title }}
                                    </label>
                                @empty
                                    <span style="color:#8c8c8c;font-size:12px;">No tags yet.</span>
                                @endforelse
                            </div>
                            <div class="pe-field" style="margin-top:10px;">
                                <label for="pe-new-tags">Add new tags</label>
                                <input type="text" id="pe-new-tags" name="new_tags" class="form-control" maxlength="500"
                                       value="{{ old('new_tags') }}" placeholder="comma, separated">
                                <span class="help">Existing tag names are reused rather than duplicated.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@include('includes_admin.footer')

<script src="{{ asset('assets_admin/vendors/bower_components/summernote/dist/summernote.min.js') }}"></script>
<script type="text/javascript">
(function () {
    var $ = window.jQuery;

    /* ---------- Rich text editor ---------- */
    if ($ && $.fn && $.fn.summernote) {
        $('#pe-editor').summernote({
            height: 420,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                ['misc', ['codeview', 'undo', 'redo', 'fullscreen']]
            ],
            callbacks: {
                // Without this, Summernote's picture button reads the file
                // with FileReader and embeds it as a base64 data: URI right
                // in the saved HTML -- one photo can add several hundred KB
                // of base64 text to the post body (one existing post here
                // reached ~390KB this way). A contenteditable that large
                // re-diffs on every keystroke, which is what made typing near
                // an inserted image feel broken. Upload the file for a real
                // URL instead.
                onImageUpload: function (files) {
                    for (var i = 0; i < files.length; i++) {
                        uploadContentImage(files[i]);
                    }
                }
            }
        });

        function uploadContentImage(file) {
            var data = new FormData();
            data.append('file', file);
            $.ajax({
                url: @json(route('admin.posts.upload-content-image')),
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }).done(function (res) {
                $('#pe-editor').summernote('insertImage', res.url);
            }).fail(function () {
                if (window.$ && $.toast) {
                    $.toast({ heading: 'Error', text: 'Image upload failed.', icon: 'error', position: 'top-right', hideAfter: 5000 });
                } else {
                    alert('Image upload failed.');
                }
            });
        }
        // Summernote hides the textarea; sync its value back before submit.
        $('#pe-form').on('submit', function () {
            $('#pe-editor').val($('#pe-editor').summernote('code'));
        });
    }

    /* ---------- Helpers ---------- */
    function el(id) { return document.getElementById(id); }
    function slugify(s) {
        return String(s).toLowerCase().trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/[\s-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    var titleEl = el('pe-title'), slugEl = el('pe-slug');
    var mtEl = el('pe-meta-title'), mdEl = el('pe-meta-desc');
    var slugTouched = slugEl.value.trim() !== '';

    slugEl.addEventListener('input', function () { slugTouched = true; });

    /* ---------- Auto-slug from title (only until the user edits it) ---------- */
    titleEl.addEventListener('input', function () {
        if (!slugTouched) { slugEl.value = slugify(titleEl.value); }
        updatePreview();
    });

    /* ---------- Character counters ---------- */
    function counter(input, out, limit) {
        var n = input.value.length;
        out.textContent = n + ' / ' + limit;
        out.classList.toggle('over', n > limit);
    }
    function refreshCounters() {
        counter(mtEl, el('pe-mt-count'), 60);
        counter(mdEl, el('pe-md-count'), 160);
    }
    mtEl.addEventListener('input', function () { refreshCounters(); updatePreview(); });
    mdEl.addEventListener('input', function () { refreshCounters(); updatePreview(); });

    /* ---------- Google preview ---------- */
    var urlBase = @json(url('/blog')) + '/' + @json($isEdit ? (string) $post->id : 'ID') + '/';
    function updatePreview() {
        var t = (mtEl.value || titleEl.value || 'Post title').trim();
        var d = (mdEl.value || 'Add a meta description to control the snippet shown here.').trim();
        el('pe-prev-title').textContent = t.length > 60 ? t.slice(0, 60) + '…' : t;
        el('pe-prev-url').textContent = urlBase + (slugEl.value || slugify(titleEl.value) || 'post-slug');
        el('pe-prev-desc').textContent = d.length > 160 ? d.slice(0, 160) + '…' : d;
    }
    slugEl.addEventListener('input', updatePreview);

    /* ---------- Live slug availability ---------- */
    el('pe-slug-check').addEventListener('click', function () {
        var msg = el('pe-slug-msg');
        var candidate = slugify(slugEl.value || titleEl.value);
        if (!candidate) { msg.className = 'pe-slug-msg bad'; msg.textContent = 'Enter a title or slug first.'; return; }

        msg.className = 'pe-slug-msg';
        msg.textContent = 'Checking…';

        var body = new FormData();
        body.append('slug', candidate);
        @if($isEdit) body.append('id', @json($post->id)); @endif

        fetch(@json(route('admin.posts.check-slug')), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: body
        })
        .then(function (r) { return r.json(); })
        .then(function (d) {
            if (d.ok) {
                msg.className = 'pe-slug-msg ok';
                msg.textContent = '✓ "' + d.slug + '" is available.';
                slugEl.value = d.slug;
            } else {
                msg.className = 'pe-slug-msg bad';
                msg.textContent = d.message + ' Suggested: ' + d.suggestion;
            }
            updatePreview();
        })
        .catch(function () {
            msg.className = 'pe-slug-msg bad';
            msg.textContent = 'Could not check right now.';
        });
    });

    /* ---------- Image previews ---------- */
    function bindPreview(inputId, imgId) {
        var input = el(inputId);
        if (!input) return;
        input.addEventListener('change', function () {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) { el(imgId).src = e.target.result; };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
    bindPreview('pe-photo', 'pe-featured-preview');
    bindPreview('pe-infographic', 'pe-info-preview');

    refreshCounters();
    updatePreview();
})();
</script>

@if (session('status'))
<script>
    $(window).load(function(){
        $.toast({
            heading: 'Success',
            text: '{{ session('status') }}',
            position: 'top-right',
            loaderBg: '#5cb85c',
            icon: 'success',
            hideAfter: 4000,
            stack: 6
        });
    });
</script>
@endif
