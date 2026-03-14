@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Karya Siswa</h1>

    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.student-works.create') }}" class="btn btn-primary">Tambah Karya</a>
        <form action="{{ route('admin.student-works.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="q" class="form-control" placeholder="Search karya siswa..." value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($studentWorks as $item)
                <tr>
                    <td>{{ $item->title ?? $item->work_name }}</td>
                    <td>{{ $item->author?->name ?? 'Unknown' }}</td>
                    <td>{{ $item->published_at ? $item->published_at->format('Y-m-d') : 'Draft' }}</td>
                    <td>
                        <a href="{{ route('admin.student-works.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.student-works.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data karya siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $studentWorks->links() }}
</div>
@endsection
