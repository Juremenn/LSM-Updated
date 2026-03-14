@extends('layouts.admin')

@section('title', 'Edit Organization')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Organization</h1>

    <form action="{{ route('admin.organizations.update', $organization) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.organizations._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.organizations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
