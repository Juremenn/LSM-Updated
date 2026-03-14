@csrf

<div class="mb-3">
    <label for="name" class="form-label">Organization Name</label>
    <input
        type="text"
        id="name"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $organization->name ?? '') }}"
        required
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea
        id="description"
        name="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $organization->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input
        type="file"
        id="logo"
        name="logo"
        class="form-control @error('logo') is-invalid @enderror"
        accept=".jpg,.jpeg,.png,.webp"
    >
    @error('logo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if(isset($organization) && $organization->logo)
        <div class="mt-3">
            <p class="mb-1 text-muted">Current logo:</p>
            <img
                src="{{ asset('storage/' . $organization->logo) }}"
                alt="{{ $organization->name }}"
                style="max-width: 180px; height: auto;"
            >
        </div>
    @endif
</div>
