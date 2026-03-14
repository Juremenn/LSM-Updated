@extends('layouts.admin')

@section('title', 'Ekskul')

@section('content')
<div class="container">
    <h1>Ekskul</h1>

    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.ekskuls.create') }}" class="btn btn-primary">Tambah Ekskul</a>
        <form action="{{ route('admin.ekskuls.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="q" class="form-control" placeholder="Search ekskul..." value="{{ $search ?? '' }}">
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
                <th>Nama Ekskul</th>
                <th>Pembina</th>
                <th>Jadwal</th>
                <th>Deskripsi</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ekskuls as $ekskul)
                <tr>
                    <td>{{ $ekskuls->firstItem() + $loop->index }}</td>
                    <td>{{ $ekskul->nama_ekskul }}</td>
                    <td>{{ $ekskul->pembina ?: '-' }}</td>
                    <td>{{ $ekskul->jadwal ?: '-' }}</td>
                    <td>{{ $ekskul->deskripsi ?: '-' }}</td>
                    <td>
                        <a href="{{ route('admin.ekskuls.edit', $ekskul) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.ekskuls.destroy', $ekskul) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus ekskul ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data ekskul.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $ekskuls->links() }}
</div>
@endsection
