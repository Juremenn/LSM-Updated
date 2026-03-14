@extends('layouts.admin')

@section('title', 'Tambah Visi Misi')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Visi Misi</h1>

    <form action="{{ route('admin.vision-mission.store') }}" method="POST">
        @include('admin.vision_mission._form')

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.vision-mission.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
