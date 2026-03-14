@extends('layouts.admin')

@section('title', 'Students')

@section('content')
<div class="container">
    <h1>Students</h1>

    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.student.create') }}" class="btn btn-primary">Add Student</a>
        <form action="{{ route('admin.student.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="q" class="form-control" placeholder="Search students..." value="{{ $search ?? '' }}">
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
                <th>Name</th>
                <th>Birth Date</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $students->firstItem() + $loop->index }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('admin.student.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.student.destroy', $student) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No students yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection
