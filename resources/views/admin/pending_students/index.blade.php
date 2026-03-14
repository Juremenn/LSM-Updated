@extends('layouts.admin')

@section('title', 'Pending Students')

@section('content')
<div class="container">
    <h1>Pending Students</h1>

    <form action="{{ route('admin.pending-students.index') }}" method="GET" class="d-flex gap-2 mb-3">
        <input type="text" name="q" class="form-control" placeholder="Search pending students..." value="{{ $search ?? '' }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                <th>Telepon</th>
                <th>Email</th>
                <th style="width: 280px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendingStudents as $student)
                <tr>
                    <td>{{ $pendingStudents->firstItem() + $loop->index }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('admin.pending-students.show', $student) }}" class="btn btn-sm btn-info text-white">Detail</a>

                        <form action="{{ route('admin.pending-students.update-status', $student) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="btn btn-sm btn-success">Accept</button>
                        </form>

                        <form action="{{ route('admin.pending-students.update-status', $student) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-sm btn-warning">Reject</button>
                        </form>

                        <form action="{{ route('admin.pending-students.destroy', $student) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data pendaftar ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada pendaftar dengan status pending.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $pendingStudents->links() }}
</div>
@endsection
