@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Profil Sekolah</h1>

    <form action="{{ route('admin.school-profile.update', $schoolProfile) }}" method="POST">
        @method('PUT')
        @include('admin.school_profile._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.school-profile.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
