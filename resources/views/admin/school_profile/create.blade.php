@extends('layouts.admin')

@section('title', 'Tambah Profil Sekolah')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Profil Sekolah</h1>

    <form action="{{ route('admin.school-profile.store') }}" method="POST">
        @include('admin.school_profile._form')

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.school-profile.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
