@extends('layouts.admin')

@section('title', 'Create Student')

@section('content')
<div class="container">
    <h1 class="mb-4">Create Student</h1>

    <form action="{{ route('admin.student.store') }}" method="POST">
        @include('admin.student._form')

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
