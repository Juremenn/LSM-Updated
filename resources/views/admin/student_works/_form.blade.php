@php
    $published_at = old('published_at', $studentWork->published_at ?? '');
@endphp

<style>
    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>

<div class="form-group">
    <label for="title">Title (Indonesia)</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $studentWork->title ?? $studentWork->work_name ?? '') }}">
    @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="title_en">Title (English)</label>
    <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $studentWork->title_en ?? '') }}">
    @error('title_en')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="content">Content (Indonesia)</label>
    <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content', $studentWork->content ?? $studentWork->description ?? '') }}</textarea>
    @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="content_en">Content (English)</label>
    <textarea name="content_en" id="content_en" rows="5" class="form-control @error('content_en') is-invalid @enderror">{{ old('content_en', $studentWork->content_en ?? '') }}</textarea>
    @error('content_en')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.gif">
    @if(isset($studentWork) && ($studentWork->image || $studentWork->photo))
        <div class="mt-2">
            <img src="{{ $studentWork->image_url }}" alt="Current image" style="max-width: 200px;">
        </div>
    @endif
    @error('image')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="published_at">Published At</label>
    <input type="datetime-local" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', isset($studentWork) && $studentWork->published_at ? $studentWork->published_at->format('Y-m-d\TH:i') : '') }}">
    @error('published_at')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

@csrf
