<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_works', function (Blueprint $table) {
            $table->string('title')->nullable()->after('photo');
            $table->string('title_en')->nullable()->after('title');
            $table->string('slug')->nullable()->after('title_en');
            $table->text('content')->nullable()->after('description');
            $table->text('content_en')->nullable()->after('content');
            $table->string('image')->nullable()->after('photo');
            $table->timestamp('published_at')->nullable()->after('image');
            $table->unsignedBigInteger('author_id')->nullable()->after('published_at');
        });

        $studentWorks = DB::table('student_works')
            ->select('id', 'title', 'slug', 'content', 'image', 'published_at', 'work_name', 'description', 'photo', 'created_date')
            ->orderBy('id')
            ->get();

        foreach ($studentWorks as $studentWork) {
            $title = trim((string) ($studentWork->title ?: $studentWork->work_name ?: ('Karya Siswa ' . $studentWork->id)));
            if ($title === '') {
                $title = 'Karya Siswa ' . $studentWork->id;
            }

            $baseSlug = Str::slug($title);
            $slugPrefix = $baseSlug !== '' ? $baseSlug : ('karya-siswa-' . $studentWork->id);
            $slug = $slugPrefix;
            $counter = 1;

            while (
                DB::table('student_works')
                    ->where('slug', $slug)
                    ->where('id', '!=', $studentWork->id)
                    ->exists()
            ) {
                $slug = $slugPrefix . '-' . $counter;
                $counter++;
            }

            $content = $studentWork->content ?? $studentWork->description ?? '';
            $publishedAt = $studentWork->published_at;
            if ($publishedAt === null && !empty($studentWork->created_date)) {
                $publishedAt = $studentWork->created_date . ' 00:00:00';
            }

            DB::table('student_works')
                ->where('id', $studentWork->id)
                ->update([
                    'title' => $title,
                    'slug' => $slug,
                    'content' => $content,
                    'image' => $studentWork->image ?? $studentWork->photo,
                    'published_at' => $publishedAt,
                ]);
        }

        Schema::table('student_works', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('student_works', function (Blueprint $table) {
            $table->dropUnique('student_works_slug_unique');
            $table->dropColumn([
                'title',
                'title_en',
                'slug',
                'content',
                'content_en',
                'image',
                'published_at',
                'author_id',
            ]);
        });
    }
};
