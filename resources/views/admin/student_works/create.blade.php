@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create Student Work</h1>
    <form action="{{ route('admin.student-works.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.student_works._form')
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
