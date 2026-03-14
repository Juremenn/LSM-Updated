@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create News</h1>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.news._form')
        <div class="d-flex flex-wrap gap-2">
            <button type="submit" name="save_action" value="draft" class="btn btn-outline-secondary">Save as Draft</button>
            <button type="submit" name="save_action" value="publish" class="btn btn-success">Publish</button>
        </div>
    </form>
</div>
@endsection
