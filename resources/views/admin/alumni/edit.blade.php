@extends('layouts.admin')

@section('title', 'Edit Alumni')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Alumni</h1>

    <form action="{{ route('admin.alumni.update', $alumniItem) }}" method="POST">
        @method('PUT')
        @include('admin.alumni._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
