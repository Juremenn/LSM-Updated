@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Jurusan</h1>

    <form action="{{ route('admin.majors.update', $major) }}" method="POST">
        @method('PUT')
        @include('admin.majors._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.majors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
