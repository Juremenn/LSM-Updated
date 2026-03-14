@csrf

<div class="mb-3">
    <label for="full_name" class="form-label">Full Name</label>
    <input
        type="text"
        id="full_name"
        name="full_name"
        class="form-control @error('full_name') is-invalid @enderror"
        value="{{ old('full_name', $student->full_name ?? '') }}"
        required
    >
    @error('full_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="birth_date" class="form-label">Birth Date</label>
    <input
        type="date"
        id="birth_date"
        name="birth_date"
        class="form-control @error('birth_date') is-invalid @enderror"
        value="{{ old('birth_date', $student->birth_date ?? '') }}"
        required
    >
    @error('birth_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select
        id="gender"
        name="gender"
        class="form-select @error('gender') is-invalid @enderror"
        required
    >
        <option value="">Choose gender</option>
        <option value="Male" @selected(old('gender', $student->gender ?? '') === 'Male')>Male</option>
        <option value="Female" @selected(old('gender', $student->gender ?? '') === 'Female')>Female</option>
    </select>
    @error('gender')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea
        id="address"
        name="address"
        rows="3"
        class="form-control @error('address') is-invalid @enderror"
        required
    >{{ old('address', $student->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input
        type="text"
        id="phone"
        name="phone"
        class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone', $student->phone ?? '') }}"
        required
    >
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $student->email ?? '') }}"
        required
    >
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
