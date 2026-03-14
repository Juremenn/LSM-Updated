# LSM Project

Project ini adalah aplikasi Laravel untuk website sekolah dengan modul public page, PPDB, dan admin panel.

## Stack

- Laravel 12
- PHP 8.5
- Blade
- MySQL (default Laravel config)

## Menjalankan Project

1. Install dependency PHP:

```bash
composer install
```

2. Install dependency frontend:

```bash
npm install
```

3. Pastikan file `.env` ada, lalu generate key:

```bash
php artisan key:generate
```

4. Jalankan migrasi:

```bash
php artisan migrate
```

5. Jalankan server:

```bash
php artisan serve
```

## Peta Struktur Project

Dokumen struktur detail ada di:

- `docs/PROJECT_STRUCTURE.md`
- `docs/REFACTOR_PLAYBOOK.md`
- `docs/UI_EDIT_MAP.md`

Mulai baca alur fitur dari:

- `routes/web.php`
- `app/Http/Controllers`
- `app/Models`
- `resources/views`

## Tujuan Refactor Bertahap

Project ini sedang disiapkan untuk perombakan besar dengan fokus:

- Kode lebih mudah dibaca
- Penamaan lebih konsisten
- Logic kompleks dipecah bertahap
- Risiko regression tetap minim
