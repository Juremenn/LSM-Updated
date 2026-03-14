@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container">
    <h1>Profil Sekolah</h1>

    <a href="{{ route('admin.school-profile.create') }}" class="btn btn-primary mb-3">Tambah Profil Sekolah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Sejarah Sekolah</th>
                <th>Poin Value</th>
                <th>Rules</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schoolProfiles as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->sejarah_sekolah }}</td>
                    <td>{{ $item->poin_value }}</td>
                    <td>{{ $item->rules }}</td>
                    <td>
                        <a href="{{ route('admin.school-profile.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.school-profile.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus profil sekolah ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data profil sekolah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
