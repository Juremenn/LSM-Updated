@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>News</h1>
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add News</a>
        <form action="{{ route('admin.news.index') }}" method="GET" class="d-flex gap-2">
            <input type="hidden" name="status" value="{{ $status ?? 'published' }}">
            <input type="text" name="q" class="form-control" placeholder="Search news..." value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>

    <div class="d-flex flex-wrap gap-2 mb-3">
        <a href="{{ route('admin.news.index', ['status' => 'published', 'q' => $search ?: null]) }}"
           class="btn btn-sm {{ ($status ?? 'published') === 'published' ? 'btn-primary' : 'btn-outline-primary' }}">
            Published ({{ $publishedCount ?? 0 }})
        </a>
        <a href="{{ route('admin.news.index', ['status' => 'draft', 'q' => $search ?: null]) }}"
           class="btn btn-sm {{ ($status ?? 'published') === 'draft' ? 'btn-warning' : 'btn-outline-warning' }}">
            Draft / Upcoming ({{ $draftCount ?? 0 }})
        </a>
        <a href="{{ route('admin.news.index', ['status' => 'all', 'q' => $search ?: null]) }}"
           class="btn btn-sm {{ ($status ?? 'published') === 'all' ? 'btn-dark' : 'btn-outline-dark' }}">
            All
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Publish Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author?->name ?? '-' }}</td>
                    <td>
                        @if($item->published_at && $item->published_at->isFuture())
                            <span class="badge bg-info text-dark">Upcoming</span>
                        @elseif($item->published_at)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>{{ $item->published_at ? $item->published_at->format('Y-m-d H:i') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.news.show', $item) }}" class="btn btn-sm btn-info text-white">View</a>
                        <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No news found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $news->links() }}
</div>
@endsection
