<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Ekskul;
use App\Models\Major;
use App\Models\News;
use App\Models\Organization;
use App\Models\Registration;
use App\Models\Student;
use App\Models\StudentWork;
use Illuminate\Support\Collection;

class AdminPanelController extends Controller
{
    public function index()
    {
        $stats = [
            'students' => Student::count(),
            'pending_students' => Registration::where('status', 'pending')->count(),
            'alumni' => Alumni::count(),
            'published_news' => News::whereNotNull('published_at')->where('published_at', '<=', now())->count(),
            'ppdb_today' => Registration::whereDate('created_at', today())->count(),
            'ppdb_this_month' => Registration::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count(),
        ];

        $moduleTotals = [
            ['label' => 'Jurusan', 'count' => Major::count(), 'icon' => 'fa-layer-group'],
            ['label' => 'Ekskul', 'count' => Ekskul::count(), 'icon' => 'fa-futbol'],
            ['label' => 'Organisasi', 'count' => Organization::count(), 'icon' => 'fa-building'],
            ['label' => 'Karya Siswa', 'count' => StudentWork::count(), 'icon' => 'fa-images'],
        ];

        $ppdbStatus = [
            'pending' => Registration::where('status', 'pending')->count(),
            'accepted' => Registration::where('status', 'accepted')->count(),
            'rejected' => Registration::where('status', 'rejected')->count(),
        ];

        $recentActivities = $this->recentActivities();

        return view('admin.panel', compact('stats', 'moduleTotals', 'ppdbStatus', 'recentActivities'));
    }

    private function recentActivities(): Collection
    {
        $latestStudents = Student::latest()->take(4)->get()->map(fn (Student $student) => [
            'type' => 'student',
            'title' => 'Student added: ' . $student->full_name,
            'time' => $student->created_at,
            'icon' => 'fa-user-graduate',
        ]);

        $latestRegistrations = Registration::latest()->take(4)->get()->map(fn (Registration $registration) => [
            'type' => 'ppdb',
            'title' => 'PPDB submission: ' . $registration->full_name,
            'time' => $registration->created_at,
            'icon' => 'fa-user-clock',
        ]);

        $latestNews = News::latest()->take(4)->get()->map(fn (News $news) => [
            'type' => 'news',
            'title' => 'News updated: ' . $news->title,
            'time' => $news->updated_at,
            'icon' => 'fa-newspaper',
        ]);

        return collect()
            ->merge($latestStudents)
            ->merge($latestRegistrations)
            ->merge($latestNews)
            ->sortByDesc('time')
            ->take(8)
            ->values();
    }
}
