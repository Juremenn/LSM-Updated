@csrf

<div class="mb-3">
    <label for="vision" class="form-label">Visi Sekolah</label>
    <textarea
        id="vision"
        name="vision"
        rows="4"
        class="form-control @error('vision') is-invalid @enderror"
        required
    >{{ old('vision', $visionMission->vision ?? '') }}</textarea>
    @error('vision')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="mission" class="form-label">Misi Sekolah</label>
    <textarea
        id="mission"
        name="mission"
        rows="6"
        class="form-control @error('mission') is-invalid @enderror"
        required
    >{{ old('mission', $visionMission->mission ?? '') }}</textarea>
    @error('mission')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
