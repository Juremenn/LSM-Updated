@extends('layouts.admin')

@section('title', 'Detail Pending Student')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Pendaftar PPDB</h1>

    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Nama Lengkap</div>
                <div class="col-md-9">{{ $pendingStudent->full_name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Tanggal Lahir</div>
                <div class="col-md-9">{{ $pendingStudent->birth_date }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Gender</div>
                <div class="col-md-9">{{ $pendingStudent->gender }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Alamat</div>
                <div class="col-md-9">{{ $pendingStudent->address }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Telepon</div>
                <div class="col-md-9">{{ $pendingStudent->phone }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Email</div>
                <div class="col-md-9">{{ $pendingStudent->email }}</div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3 fw-bold">Status</div>
                <div class="col-md-9 text-capitalize">{{ $pendingStudent->status }}</div>
            </div>

            <a href="{{ route('admin.pending-students.index') }}" class="btn btn-secondary">Back</a>

            <form action="{{ route('admin.pending-students.update-status', $pendingStudent) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="accepted">
                <button type="submit" class="btn btn-success">Accept</button>
            </form>

            <form action="{{ route('admin.pending-students.update-status', $pendingStudent) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="rejected">
                <button type="submit" class="btn btn-warning">Reject</button>
            </form>
        </div>
    </div>
</div>
@endsection
