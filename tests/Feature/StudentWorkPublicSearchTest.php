<?php

namespace Tests\Feature;

use App\Models\StudentWork;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentWorkPublicSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_student_work_search_matches_english_title(): void
    {
        app()->setLocale('en');

        $author = User::factory()->create();

        StudentWork::create([
            'title' => 'Karya Robotik',
            'title_en' => 'Robotics Prototype',
            'content' => 'Karya robotik siswa SMK Metland.',
            'content_en' => 'Student robotics prototype from SMK Metland.',
            'published_at' => now()->subHour(),
            'author_id' => $author->id,
            'work_name' => 'Karya Robotik',
            'description' => 'Karya robotik siswa SMK Metland.',
            'creator_name' => 'Siswa 1',
            'created_date' => now()->toDateString(),
        ]);

        StudentWork::create([
            'title' => 'Portofolio Desain',
            'title_en' => 'UI Design Portfolio',
            'content' => 'Portofolio karya desain antarmuka.',
            'content_en' => 'A collection of user interface design works.',
            'published_at' => now()->subHours(2),
            'author_id' => $author->id,
            'work_name' => 'Portofolio Desain',
            'description' => 'Portofolio karya desain antarmuka.',
            'creator_name' => 'Siswa 2',
            'created_date' => now()->toDateString(),
        ]);

        $response = $this->get('/student-works?q=Prototype');

        $response->assertStatus(200);
        $response->assertSeeText('Robotics Prototype');
        $response->assertDontSeeText('UI Design Portfolio');
    }

    public function test_public_student_work_search_matches_english_content_keywords(): void
    {
        app()->setLocale('en');

        $author = User::factory()->create();

        StudentWork::create([
            'title' => 'Aplikasi Mobile',
            'title_en' => 'Mobile App Showcase',
            'content' => 'Siswa menampilkan aplikasi mobile buatan sendiri.',
            'content_en' => 'Students built a mobile app with augmented reality features.',
            'published_at' => now()->subHour(),
            'author_id' => $author->id,
            'work_name' => 'Aplikasi Mobile',
            'description' => 'Siswa menampilkan aplikasi mobile buatan sendiri.',
            'creator_name' => 'Siswa 3',
            'created_date' => now()->toDateString(),
        ]);

        StudentWork::create([
            'title' => 'Animasi 2D',
            'title_en' => '2D Animation Demo',
            'content' => 'Demo animasi 2D karya siswa.',
            'content_en' => 'Student demo for a short 2D animation project.',
            'published_at' => now()->subHours(2),
            'author_id' => $author->id,
            'work_name' => 'Animasi 2D',
            'description' => 'Demo animasi 2D karya siswa.',
            'creator_name' => 'Siswa 4',
            'created_date' => now()->toDateString(),
        ]);

        $response = $this->get('/student-works?q=augmented reality');

        $response->assertStatus(200);
        $response->assertSeeText('Mobile App Showcase');
        $response->assertDontSeeText('2D Animation Demo');
    }
}
