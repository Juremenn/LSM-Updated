@extends('layouts.admin')

@section('title', 'Edit Ekskul')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Ekskul</h1>

    <form action="{{ route('admin.ekskuls.update', $ekskul) }}" method="POST">
        @method('PUT')
        @include('admin.ekskuls._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.ekskuls.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
