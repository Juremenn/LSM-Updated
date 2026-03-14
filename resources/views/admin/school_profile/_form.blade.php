@csrf

<div class="mb-3">
    <label for="sejarah_sekolah" class="form-label">Sejarah Sekolah</label>
    <textarea
        id="sejarah_sekolah"
        name="sejarah_sekolah"
        rows="5"
        class="form-control @error('sejarah_sekolah') is-invalid @enderror"
        required
    >{{ old('sejarah_sekolah', $schoolProfile->sejarah_sekolah ?? '') }}</textarea>
    @error('sejarah_sekolah')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="poin_value" class="form-label">Poin Value Sekolah</label>
    <textarea
        id="poin_value"
        name="poin_value"
        rows="5"
        class="form-control @error('poin_value') is-invalid @enderror"
        required
    >{{ old('poin_value', $schoolProfile->poin_value ?? '') }}</textarea>
    @error('poin_value')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="rules" class="form-label">Rules Sekolah</label>
    <textarea
        id="rules"
        name="rules"
        rows="5"
        class="form-control @error('rules') is-invalid @enderror"
        required
    >{{ old('rules', $schoolProfile->rules ?? '') }}</textarea>
    @error('rules')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
