@extends('layouts.admin')

@section('title', 'Tambah Ekskul')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Ekskul</h1>

    <form action="{{ route('admin.ekskuls.store') }}" method="POST">
        @include('admin.ekskuls._form')

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.ekskuls.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
