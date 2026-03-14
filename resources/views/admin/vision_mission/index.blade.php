@extends('layouts.admin')

@section('title', 'Visi Misi')

@section('content')
<div class="container">
    <h1>Visi Misi Sekolah</h1>

    <a href="{{ route('admin.vision-mission.create') }}" class="btn btn-primary mb-3">Tambah Visi Misi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Visi</th>
                <th>Misi</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($visionMissions as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->vision }}</td>
                    <td>{{ $item->mission }}</td>
                    <td>
                        <a href="{{ route('admin.vision-mission.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.vision-mission.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data visi misi ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data visi misi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
