@extends('layouts.admin')

@section('title', 'Edit Student')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Student</h1>

    <form action="{{ route('admin.student.update', $student) }}" method="POST">
        @method('PUT')
        @include('admin.student._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
