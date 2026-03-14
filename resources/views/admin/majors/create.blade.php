@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Jurusan</h1>

    <form action="{{ route('admin.majors.store') }}" method="POST">
        @include('admin.majors._form')

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.majors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
