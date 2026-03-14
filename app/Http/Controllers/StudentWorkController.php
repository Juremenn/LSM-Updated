<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentWorkRequest;
use App\Http\Requests\UpdateStudentWorkRequest;
use App\Models\StudentWork;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class StudentWorkController extends Controller
{
    private function visibleStudentWorksQuery(): Builder
    {
        $published = StudentWork::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        if ($published->exists()) {
            return StudentWork::with('author')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now());
        }

        return StudentWork::with('author');
    }

    public function publicIndex(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $studentWorksQuery = $this->visibleStudentWorksQuery();

        if ($search !== '') {
            $keywords = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

            $studentWorksQuery->where(function (Builder $query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $likeKeyword = '%' . $keyword . '%';

                    $query->where(function (Builder $subQuery) use ($likeKeyword) {
                        $subQuery->where('title', 'like', $likeKeyword)
                            ->orWhere('title_en', 'like', $likeKeyword)
                            ->orWhere('content', 'like', $likeKeyword)
                            ->orWhere('content_en', 'like', $likeKeyword)
                            ->orWhere('work_name', 'like', $likeKeyword)
                            ->orWhere('description', 'like', $likeKeyword)
                            ->orWhere('creator_name', 'like', $likeKeyword);
                    });
                }
            });
        }

        $studentWorks = $studentWorksQuery
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        return view('student_works.index', compact('studentWorks', 'search'));
    }

    public function publicShow(StudentWork $studentWork)
    {
        $isPublished = !is_null($studentWork->published_at) && $studentWork->published_at->lte(now());
        $hasPublishedStudentWorks = StudentWork::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->exists();

        if ($hasPublishedStudentWorks && !$isPublished) {
            abort(404);
        }

        $sidebarStudentWorks = $this->visibleStudentWorksQuery()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        return view('student_works.show', compact('studentWork', 'sidebarStudentWorks'));
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $studentWorks = StudentWork::with('author')
            ->when($search !== '', function (Builder $query) use ($search) {
                $keywords = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

                $query->where(function (Builder $q) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $likeKeyword = '%' . $keyword . '%';
                        $q->where(function (Builder $subQuery) use ($likeKeyword) {
                            $subQuery->where('title', 'like', $likeKeyword)
                                ->orWhere('title_en', 'like', $likeKeyword)
                                ->orWhere('content', 'like', $likeKeyword)
                                ->orWhere('content_en', 'like', $likeKeyword)
                                ->orWhere('work_name', 'like', $likeKeyword)
                                ->orWhere('description', 'like', $likeKeyword)
                                ->orWhere('creator_name', 'like', $likeKeyword);
                        });
                    }
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.student_works.index', compact('studentWorks', 'search'));
    }

    public function create()
    {
        return view('admin.student_works.create');
    }

    public function store(StoreStudentWorkRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('student-works', 'public');
            $validated['image'] = $path;
        }

        $validated['author_id'] = auth()->id();
        $validated['work_name'] = $validated['title'];
        $validated['description'] = $validated['content'];
        $validated['creator_name'] = auth()->user()?->name ?? 'Administrator';
        $validated['created_date'] = !empty($validated['published_at'])
            ? Carbon::parse($validated['published_at'])->toDateString()
            : now()->toDateString();
        $validated['photo'] = $validated['image'] ?? null;

        StudentWork::create($validated);

        return redirect()->route('admin.student-works.index')->with('success', 'Student work created successfully.');
    }

    public function show(StudentWork $studentWork)
    {
        return view('admin.student_works.show', compact('studentWork'));
    }

    public function edit(StudentWork $studentWork)
    {
        return view('admin.student_works.edit', compact('studentWork'));
    }

    public function update(UpdateStudentWorkRequest $request, StudentWork $studentWork)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $oldImagePath = $studentWork->image ?? $studentWork->photo;
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
            $path = $request->file('image')->store('student-works', 'public');
            $validated['image'] = $path;
            $validated['photo'] = $path;
        }

        $validated['work_name'] = $validated['title'];
        $validated['description'] = $validated['content'];
        $validated['creator_name'] = $studentWork->creator_name ?: (auth()->user()?->name ?? 'Administrator');
        $validated['created_date'] = !empty($validated['published_at'])
            ? Carbon::parse($validated['published_at'])->toDateString()
            : ($studentWork->created_date?->toDateString() ?? now()->toDateString());

        $studentWork->update($validated);

        return redirect()->route('admin.student-works.index')->with('success', 'Student work updated successfully.');
    }

    public function destroy(StudentWork $studentWork)
    {
        $imagePath = $studentWork->image ?? $studentWork->photo;
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        $studentWork->delete();

        return redirect()->route('admin.student-works.index')->with('success', 'Student work deleted successfully.');
    }
}
