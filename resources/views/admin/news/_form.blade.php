@php
    $published_at = old('published_at', $news->published_at ?? '');
@endphp

<style>
    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>

<div class="form-group">
    <label for="title">Title (Indonesia)</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $news->title ?? '') }}">
    @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="title_en">Title (English)</label>
    <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $news->title_en ?? '') }}">
    @error('title_en')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="content">Content (Indonesia)</label>
    <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content', $news->content ?? '') }}</textarea>
    @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="content_en">Content (English)</label>
    <textarea name="content_en" id="content_en" rows="5" class="form-control @error('content_en') is-invalid @enderror">{{ old('content_en', $news->content_en ?? '') }}</textarea>
    @error('content_en')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.gif">
    @if(isset($news) && $news->image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $news->image) }}" alt="Current image" style="max-width: 200px;">
        </div>
    @endif
    @error('image')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="published_at">Published At</label>
    <input type="datetime-local" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', isset($news) && $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
    <small class="form-text text-muted">Leave empty and click Publish to publish now. Use Save as Draft to keep it hidden from frontend.</small>
    @error('published_at')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

@error('save_action')
    <div class="text-danger mt-2">{{ $message }}</div>
@enderror

@csrf
