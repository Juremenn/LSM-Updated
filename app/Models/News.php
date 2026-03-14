<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class News extends Model
{
     use HasFactory;

    protected $fillable = ['title', 'title_en', 'slug', 'content', 'content_en', 'image', 'published_at', 'author_id'];

    protected $casts = [
        'published_at' => 'datetime',
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

        return $this->title;
    }

    public function getLocalizedContentAttribute(): string
    {
        if (app()->getLocale() === 'en' && filled($this->content_en)) {
            return $this->content_en;
        }

        return $this->content;
    }

    public function getImageUrlAttribute(): string
    {
        if (blank($this->image)) {
            return asset('img/hero2.JPG');
        }

        $relativeImagePath = ltrim($this->image, '/');
        $publicImagePath = public_path('storage/' . $relativeImagePath);

        if (is_file($publicImagePath)) {
            return asset('storage/' . $relativeImagePath);
        }

        return asset('img/hero2.JPG');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeDraftOrScheduled(Builder $query): Builder
    {
        return $query->where(function (Builder $subQuery) {
            $subQuery->whereNull('published_at')
                ->orWhere('published_at', '>', now());
        });
    }

    public function isPublished(): bool
    {
        return !is_null($this->published_at) && $this->published_at->lte(now());
    }

    public function isDraft(): bool
    {
        return is_null($this->published_at);
    }

    public function isScheduled(): bool
    {
        return !is_null($this->published_at) && $this->published_at->gt(now());
    }

    // Automatically generate slug from title
    protected static function booted()
    {
        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = static::generateUniqueSlug($news->title);
            }
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) {
                $news->slug = static::generateUniqueSlug($news->title, $news->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
