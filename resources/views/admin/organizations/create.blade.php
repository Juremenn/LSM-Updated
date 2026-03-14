@extends('layouts.admin')

@section('title', 'Create Organization')

@section('content')
<div class="container">
    <h1 class="mb-4">Create Organization</h1>

    <form action="{{ route('admin.organizations.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.organizations._form')

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.organizations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
