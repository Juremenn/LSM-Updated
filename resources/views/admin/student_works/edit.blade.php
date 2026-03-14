@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Student Work</h1>
    <form action="{{ route('admin.student-works.update', $studentWork) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.student_works._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
