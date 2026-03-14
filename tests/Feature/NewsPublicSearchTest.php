<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsPublicSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_news_search_matches_english_title(): void
    {
        app()->setLocale('en');

        $author = User::factory()->create();

        News::create([
            'title' => 'Berita Kompetisi Robotik',
            'title_en' => 'Robotics Team Wins Gold',
            'content' => 'Tim robotik SMK Metland memenangkan lomba.',
            'content_en' => 'SMK Metland robotics team won the competition.',
            'published_at' => now()->subHour(),
            'author_id' => $author->id,
        ]);

        News::create([
            'title' => 'Kegiatan Pramuka',
            'title_en' => 'Scout Program Update',
            'content' => 'Kegiatan rutin pramuka berjalan lancar.',
            'content_en' => 'Weekly scout program activities ran as planned.',
            'published_at' => now()->subHours(2),
            'author_id' => $author->id,
        ]);

        $response = $this->get('/news?q=Gold');

        $response->assertStatus(200);
        $response->assertSeeText('Robotics Team Wins Gold');
        $response->assertDontSeeText('Scout Program Update');
    }

    public function test_public_news_search_matches_english_content_keywords(): void
    {
        app()->setLocale('en');

        $author = User::factory()->create();

        News::create([
            'title' => 'Pengumuman Siswa',
            'title_en' => 'Student Announcement',
            'content' => 'Informasi umum untuk seluruh siswa.',
            'content_en' => 'Metland students earned a global coding scholarship this year.',
            'published_at' => now()->subHour(),
            'author_id' => $author->id,
        ]);

        News::create([
            'title' => 'Info Ekstrakurikuler',
            'title_en' => 'Extracurricular Info',
            'content' => 'Pendaftaran ekskul telah dibuka.',
            'content_en' => 'Registration for extracurricular clubs is now open.',
            'published_at' => now()->subHours(2),
            'author_id' => $author->id,
        ]);

        $response = $this->get('/news?q=global scholarship');

        $response->assertStatus(200);
        $response->assertSeeText('Student Announcement');
        $response->assertDontSeeText('Extracurricular Info');
    }
}
