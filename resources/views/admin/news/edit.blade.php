@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit News</h1>
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.news._form')
        <div class="d-flex flex-wrap gap-2">
            <button type="submit" name="save_action" value="publish" class="btn btn-primary">Update & Publish</button>
            <button type="submit" name="save_action" value="draft" class="btn btn-outline-secondary">Save as Draft</button>
        </div>
    </form>
</div>
@endsection
