<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StudentWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'content',
        'content_en',
        'image',
        'published_at',
        'author_id',
        'photo',
        'work_name',
        'description',
        'creator_name',
        'created_date',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_date' => 'date',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getLocalizedTitleAttribute(): string
    {
        if (app()->getLocale() === 'en' && filled($this->title_en)) {
            return $this->title_en;
        }

        return $this->title ?? $this->work_name ?? '';
    }

    public function getLocalizedContentAttribute(): string
    {
        if (app()->getLocale() === 'en' && filled($this->content_en)) {
            return $this->content_en;
        }

        return $this->content ?? $this->description ?? '';
    }

    public function getImageUrlAttribute(): string
    {
        $path = $this->image ?? $this->photo;

        if (blank($path)) {
            return asset('img/hero2.JPG');
        }

        $relativeImagePath = ltrim($path, '/');
        $publicImagePath = public_path('storage/' . $relativeImagePath);

        if (is_file($publicImagePath)) {
            return asset('storage/' . $relativeImagePath);
        }

        return asset('img/hero2.JPG');
    }

    protected static function booted()
    {
        static::creating(function (self $studentWork) {
            if (empty($studentWork->slug) && filled($studentWork->title)) {
                $studentWork->slug = static::generateUniqueSlug($studentWork->title);
            }
        });

        static::updating(function (self $studentWork) {
            if ($studentWork->isDirty('title') && filled($studentWork->title)) {
                $studentWork->slug = static::generateUniqueSlug($studentWork->title, $studentWork->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug !== '' ? $baseSlug : 'karya-siswa';
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = ($baseSlug !== '' ? $baseSlug : 'karya-siswa') . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
