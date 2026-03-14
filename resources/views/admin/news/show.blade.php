@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ $news->title }}</h1>
    @if($news->title_en)
        <p class="mb-2"><strong>English Title:</strong> {{ $news->title_en }}</p>
    @endif

    <p class="text-muted">
        Author: {{ $news->author?->name ?? 'Unknown' }} |
        Status:
        @if($news->published_at && $news->published_at->isFuture())
            Upcoming ({{ $news->published_at->format('Y-m-d H:i') }})
        @elseif($news->published_at)
            Published ({{ $news->published_at->format('Y-m-d H:i') }})
        @else
            Draft
        @endif
    </p>

    @if($news->image)
        <div class="mb-3">
            <img src="{{ $news->image_url }}" alt="{{ $news->title }}" style="max-width: 400px;">
        </div>
    @endif

    <div class="mb-3">
        {!! nl2br(e($news->content)) !!}
    </div>

    @if($news->content_en)
        <div class="mb-3">
            <h5>English Content</h5>
            {!! nl2br(e($news->content_en)) !!}
        </div>
    @endif

    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
