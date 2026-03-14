@extends('layouts.admin')

@section('title', 'Jurusan')

@section('content')
<div class="container">
    <h1>Jurusan</h1>

    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.majors.create') }}" class="btn btn-primary">Tambah Jurusan</a>
        <form action="{{ route('admin.majors.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="q" class="form-control" placeholder="Search jurusan..." value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Nama Jurusan</th>
                <th>Kode Jurusan</th>
                <th>Deskripsi</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($majors as $major)
                <tr>
                    <td>{{ $majors->firstItem() + $loop->index }}</td>
                    <td>{{ $major->nama_jurusan }}</td>
                    <td>{{ $major->kode_jurusan }}</td>
                    <td>{{ $major->deskripsi ?: '-' }}</td>
                    <td>
                        <a href="{{ route('admin.majors.edit', $major) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.majors.destroy', $major) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus jurusan ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data jurusan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $majors->links() }}
</div>
@endsection
