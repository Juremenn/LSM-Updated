@csrf

<div class="mb-3">
    <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
    <input
        type="text"
        id="nama_ekskul"
        name="nama_ekskul"
        class="form-control @error('nama_ekskul') is-invalid @enderror"
        value="{{ old('nama_ekskul', $ekskul->nama_ekskul ?? '') }}"
        required
    >
    @error('nama_ekskul')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="pembina" class="form-label">Pembina</label>
    <input
        type="text"
        id="pembina"
        name="pembina"
        class="form-control @error('pembina') is-invalid @enderror"
        value="{{ old('pembina', $ekskul->pembina ?? '') }}"
    >
    @error('pembina')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jadwal" class="form-label">Jadwal</label>
    <input
        type="text"
        id="jadwal"
        name="jadwal"
        class="form-control @error('jadwal') is-invalid @enderror"
        value="{{ old('jadwal', $ekskul->jadwal ?? '') }}"
        placeholder="Contoh: Senin & Rabu, 15:00 - 17:00"
    >
    @error('jadwal')
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
    >{{ old('deskripsi', $ekskul->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
