@extends('layouts.admin')

@section('title', 'Edit Visi Misi')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Visi Misi</h1>

    <form action="{{ route('admin.vision-mission.update', $visionMission) }}" method="POST">
        @method('PUT')
        @include('admin.vision_mission._form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.vision-mission.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
