@php
$title = "Posts";
$statusLabels = [
    \App\Blog::STATUS_PUBLISHED => ['Published', 'success'],
    \App\Blog::STATUS_DRAFT     => ['Draft', 'warning'],
    \App\Blog::STATUS_TRASHED   => ['Trashed', 'danger'],
];
@endphp
@include("includes_admin.title")
@include('includes_admin.sidebar')

<style type="text/css">
    .post-filters { display:flex; flex-wrap:wrap; gap:10px; align-items:center; justify-content:space-between; margin-bottom:16px; }
    .post-filters form { display:flex; gap:8px; flex-wrap:wrap; margin:0; }
    .post-tabs { list-style:none; padding:0; margin:0 0 14px; display:flex; flex-wrap:wrap; gap:14px; font-size:13px; }
    .post-tabs a { color:#8ab4f8; }
    .post-tabs .is-active a { color:#fff; font-weight:700; text-decoration:underline; }
    .post-table th, .post-table td { vertical-align:middle !important; }
    .post-thumb { width:64px; height:48px; object-fit:cover; background:#111; border-radius:3px; }
    .post-title-cell a { font-weight:600; }
    .post-slug { display:block; color:#8c8c8c; font-size:11px; word-break:break-all; margin-top:2px; }
    .post-badge { padding:3px 9px; border-radius:10px; font-size:11px; font-weight:700; }
    .post-actions { white-space:nowrap; }
    .post-actions-group { display:inline-flex; align-items:center; gap:6px; }
    .post-actions-group form { display:inline-flex; margin:0; }
    .post-action-btn {
        display:inline-flex;
        align-items:center;
        gap:5px;
        padding:6px 12px;
        font-size:12px;
        font-weight:600;
        line-height:1.2;
        border-radius:5px;
        border:1px solid transparent;
        cursor:pointer;
        transition:background-color .15s ease, border-color .15s ease, transform .1s ease;
        white-space:nowrap;
    }
    .post-action-btn:hover { transform:translateY(-1px); text-decoration:none; }
    .post-action-btn:active { transform:translateY(0); }
    .post-action-btn i { font-size:12px; }

    .post-action-btn.is-edit {
        background:#2b6fd4;
        border-color:#2b6fd4;
        color:#fff;
    }
    .post-action-btn.is-edit:hover { background:#3a7de0; color:#fff; }

    .post-action-btn.is-view {
        background:transparent;
        border-color:#4a4a4a;
        color:#d9d9d9;
    }
    .post-action-btn.is-view:hover { background:#333; border-color:#5a5a5a; color:#fff; }

    .post-action-btn.is-restore {
        background:#2f9e5c;
        border-color:#2f9e5c;
        color:#fff;
    }
    .post-action-btn.is-restore:hover { background:#37b568; color:#fff; }

    .post-action-btn.is-trash {
        background:transparent;
        border-color:#c0392b;
        color:#e35d4f;
    }
    .post-action-btn.is-trash:hover { background:#c0392b; border-color:#c0392b; color:#fff; }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>Posts</h2>

                            <ul class="post-tabs">
                                @foreach(['all' => 'All', 'published' => 'Published', 'draft' => 'Drafts', 'trashed' => 'Trash'] as $key => $label)
                                    <li class="{{ $status === $key ? 'is-active' : '' }}">
                                        <a href="{{ route('admin.posts.index', array_filter(['status' => $key, 'type' => $type !== 'all' ? $type : null])) }}">
                                            {{ $label }} ({{ $counts[$key] ?? 0 }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="post-filters">
                                <form method="GET" action="{{ route('admin.posts.index') }}">
                                    <input type="hidden" name="status" value="{{ $status }}">
                                    <input type="text" name="q" value="{{ $search }}" class="form-control"
                                           placeholder="Search title, slug or body" style="min-width:240px;">
                                    <select name="type" class="form-control" style="width:auto;">
                                        <option value="all"  @selected($type === 'all')>All types</option>
                                        <option value="blog" @selected($type === 'blog')>Blog</option>
                                        <option value="news" @selected($type === 'news')>News</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    @if($search !== '' || $type !== 'all')
                                        <a href="{{ route('admin.posts.index', ['status' => $status]) }}" class="btn btn-default">Clear</a>
                                    @endif
                                </form>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add New Post</a>
                            </div>

                            @if($posts->total() === 0)
                                <p style="color:#999;padding:30px 0;text-align:center;">No posts found.</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered post-table">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;">Image</th>
                                            <th>Title / URL</th>
                                            <th style="width:90px;">Type</th>
                                            <th style="width:100px;">Status</th>
                                            <th style="width:120px;">Published</th>
                                            <th style="width:70px;">Views</th>
                                            <th style="width:270px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            @php [$label, $variant] = $statusLabels[$post->status] ?? ['Unknown', 'default']; @endphp
                                            <tr>
                                                <td>
                                                    <img class="post-thumb" loading="lazy"
                                                         src="{{ ab_image('images/blogs_images/' . $post->gallery, 'home_images/placeholders/area-1.svg') }}"
                                                         alt="{{ $post->title }}">
                                                </td>
                                                <td class="post-title-cell">
                                                    <a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                                                    <span class="post-slug">{{ $post->url }}</span>
                                                </td>
                                                <td>{{ $post->identifier === \App\Blog::TYPE_NEWS ? 'News' : 'Blog' }}</td>
                                                <td><span class="post-badge label label-{{ $variant }}">{{ $label }}</span></td>
                                                <td>{{ optional($post->published_at ?: $post->created_at)->format('M j, Y') }}</td>
                                                <td>{{ $post->view }}</td>
                                                <td class="post-actions">
                                                    <div class="post-actions-group">
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="post-action-btn is-edit" title="Edit">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                        <a href="{{ $post->url }}" target="_blank" rel="noopener" class="post-action-btn is-view" title="View on site">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        @if($post->status === \App\Blog::STATUS_TRASHED)
                                                            <form method="POST" action="{{ route('admin.posts.restore', $post->id) }}">
                                                                @csrf
                                                                <button type="submit" class="post-action-btn is-restore" title="Restore">
                                                                    <i class="fa fa-undo"></i> Restore
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form method="POST" action="{{ route('admin.posts.trash', $post->id) }}"
                                                                  onsubmit="return confirm('Move this post to trash? It stays recoverable.');">
                                                                @csrf
                                                                <button type="submit" class="post-action-btn is-trash" title="Move to trash">
                                                                    <i class="fa fa-trash-o"></i> Trash
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div style="margin-top:18px;">
                                {{ $posts->links() }}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('includes_admin.footer')

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
