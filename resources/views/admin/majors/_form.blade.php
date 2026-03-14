@csrf

<div class="mb-3">
    <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
    <input
        type="text"
        id="nama_jurusan"
        name="nama_jurusan"
        class="form-control @error('nama_jurusan') is-invalid @enderror"
        value="{{ old('nama_jurusan', $major->nama_jurusan ?? '') }}"
        required
    >
    @error('nama_jurusan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
    <input
        type="text"
        id="kode_jurusan"
        name="kode_jurusan"
        class="form-control @error('kode_jurusan') is-invalid @enderror"
        value="{{ old('kode_jurusan', $major->kode_jurusan ?? '') }}"
        required
    >
    @error('kode_jurusan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea
        id="deskripsi"
        name="deskripsi"
        rows="4"
        class="form-control @error('deskripsi') is-invalid @enderror"
    >{{ old('deskripsi', $major->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
