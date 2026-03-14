<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - Registrasi Calon Siswa</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}?v=20260305">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Instrument Sans", sans-serif;
            background: #f3f4f7;
            color: #1f2937;
        }

        .ppdb-wrap {
            max-width: 860px;
            margin: 0 auto;
            padding: 28px 18px 44px;
        }

        .ppdb-back {
            display: inline-block;
            margin-bottom: 14px;
            color: #4b5563;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .ppdb-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .ppdb-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .ppdb-brand img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .ppdb-brand h1 {
            margin: 0;
            font-size: 1.5rem;
            color: #0f766e;
        }

        .ppdb-brand p {
            margin: 3px 0 0;
            color: #6b7280;
            font-size: 0.92rem;
        }

        .ppdb-success {
            border: 1px solid #bbf7d0;
            color: #166534;
            background: #f0fdf4;
            border-radius: 10px;
            padding: 10px 12px;
            margin-bottom: 14px;
        }

        .ppdb-errors {
            margin: 0 0 14px;
            padding: 10px 12px 10px 28px;
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #991b1b;
            border-radius: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            font-size: 0.9rem;
            color: #4b5563;
            font-weight: 600;
        }

        .field input,
        .field select,
        .field textarea {
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 10px 11px;
            font-size: 0.95rem;
            color: #1f2937;
            background: #ffffff;
            outline: none;
        }

        .field textarea {
            min-height: 92px;
            resize: vertical;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #14b8a6;
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
        }

        .field .error {
            margin: 0;
            color: #b91c1c;
            font-size: 0.82rem;
        }

        .form-actions {
            margin-top: 16px;
            display: flex;
            justify-content: flex-end;
        }

        .submit-btn {
            border: 0;
            border-radius: 10px;
            background: #0f766e;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 10px 16px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #0e6a63;
        }

        @media (max-width: 700px) {
            .ppdb-card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main class="ppdb-wrap">
        <a href="{{ url('/') }}" class="ppdb-back">&larr; Kembali ke beranda</a>

        <section class="ppdb-card">
            <div class="ppdb-brand">
                <img src="{{ asset('img/logo.webp') }}" alt="Logo SMK Metland">
                <div>
                    <h1>PPDB SMK Metland</h1>
                    <p>Form pendaftaran calon siswa baru.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="ppdb-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <ul class="ppdb-errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('ppdb.store') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="field full">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                        @error('full_name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                        @error('birth_date')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="gender">Jenis Kelamin</label>
                        <select id="gender" name="gender" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Male" @selected(old('gender') === 'Male')>Laki-laki</option>
                            <option value="Female" @selected(old('gender') === 'Female')>Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="address">Alamat</label>
                        <textarea id="address" name="address" required>{{ old('address') }}</textarea>
                        @error('address')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">No. Telepon</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">Kirim Pendaftaran</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
