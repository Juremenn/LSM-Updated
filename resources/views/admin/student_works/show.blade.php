@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ $studentWork->title ?? $studentWork->work_name }}</h1>
    @if($studentWork->title_en)
        <p class="mb-2"><strong>English Title:</strong> {{ $studentWork->title_en }}</p>
    @endif

    <p class="text-muted">
        Author: {{ $studentWork->author?->name ?? 'Unknown' }} |
        Published: {{ $studentWork->published_at ? $studentWork->published_at->format('Y-m-d H:i') : 'Draft' }}
    </p>

    @if($studentWork->image || $studentWork->photo)
        <div class="mb-3">
            <img src="{{ $studentWork->image_url }}" alt="{{ $studentWork->title ?? $studentWork->work_name }}" style="max-width: 400px;">
        </div>
    @endif

    <div class="mb-3">
        {!! nl2br(e($studentWork->content)) !!}
    </div>

    @if($studentWork->content_en)
        <div class="mb-3">
            <h5>English Content</h5>
            {!! nl2br(e($studentWork->content_en)) !!}
        </div>
    @endif

    <a href="{{ route('admin.student-works.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.student-works.edit', $studentWork) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
