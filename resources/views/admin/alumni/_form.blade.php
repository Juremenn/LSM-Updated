@csrf

<div class="mb-3">
    <label for="nama_alumni" class="form-label">Nama Alumni</label>
    <input
        type="text"
        id="nama_alumni"
        name="nama_alumni"
        class="form-control @error('nama_alumni') is-invalid @enderror"
        value="{{ old('nama_alumni', $alumniItem->nama_alumni ?? '') }}"
        required
    >
    @error('nama_alumni')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
    <input
        type="number"
        id="tahun_lulus"
        name="tahun_lulus"
        class="form-control @error('tahun_lulus') is-invalid @enderror"
        value="{{ old('tahun_lulus', $alumniItem->tahun_lulus ?? '') }}"
        min="1950"
        max="{{ date('Y') }}"
        required
    >
    @error('tahun_lulus')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <input
        type="text"
        id="jurusan"
        name="jurusan"
        class="form-control @error('jurusan') is-invalid @enderror"
        value="{{ old('jurusan', $alumniItem->jurusan ?? '') }}"
        required
    >
    @error('jurusan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="pekerjaan" class="form-label">Pekerjaan</label>
    <input
        type="text"
        id="pekerjaan"
        name="pekerjaan"
        class="form-control @error('pekerjaan') is-invalid @enderror"
        value="{{ old('pekerjaan', $alumniItem->pekerjaan ?? '') }}"
    >
    @error('pekerjaan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kontak" class="form-label">Kontak</label>
    <input
        type="text"
        id="kontak"
        name="kontak"
        class="form-control @error('kontak') is-invalid @enderror"
        value="{{ old('kontak', $alumniItem->kontak ?? '') }}"
    >
    @error('kontak')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
