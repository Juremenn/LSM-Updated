<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private function visibleNewsQuery(): Builder
    {
        return News::with('author')->published();
    }

    public function publicIndex(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $newsQuery = $this->visibleNewsQuery();
        $recentNews = $this->visibleNewsQuery()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        if ($search !== '') {
            $keywords = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

            $newsQuery->where(function (Builder $query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $likeKeyword = '%' . $keyword . '%';

                    $query->where(function (Builder $subQuery) use ($likeKeyword) {
                        $subQuery->where('title', 'like', $likeKeyword)
                            ->orWhere('title_en', 'like', $likeKeyword)
                            ->orWhere('content', 'like', $likeKeyword)
                            ->orWhere('content_en', 'like', $likeKeyword);
                    });
                }
            });
        }

        $news = $newsQuery
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        $featuredNews = $recentNews->first();

        return view('news.index', compact('news', 'search', 'recentNews', 'featuredNews'));
    }

    public function publicShow(News $news)
    {
        if (!$news->isPublished()) {
            abort(404);
        }

        $sidebarNews = $this->visibleNewsQuery()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        return view('news.show', compact('news', 'sidebarNews'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $status = (string) $request->query('status', 'published');
        if (!in_array($status, ['published', 'draft', 'all'], true)) {
            $status = 'published';
        }

        $news = News::with('author')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('title_en', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orWhere('content_en', 'like', '%' . $search . '%');
                });
            })
            ->when($status === 'published', function (Builder $query) {
                $query->published();
            })
            ->when($status === 'draft', function (Builder $query) {
                $query->draftOrScheduled();
            })
            ->orderByRaw('CASE WHEN published_at IS NULL THEN 1 ELSE 0 END')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.news.index', [
            'news' => $news,
            'search' => $search,
            'status' => $status,
            'publishedCount' => News::query()->published()->count(),
            'draftCount' => News::query()
                ->draftOrScheduled()
                ->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();
        $saveAction = $validated['save_action'] ?? 'publish';
        unset($validated['save_action']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $validated['image'] = $path;
        }

        $validated['author_id'] = Auth::id();
        if ($saveAction === 'draft') {
            $validated['published_at'] = null;
        } else {
            // Always publish immediately when Publish button is clicked.
            $validated['published_at'] = now();
        }

        // Create news
        News::create($validated);

        $message = $saveAction === 'draft'
            ? 'News saved to draft successfully.'
            : 'News published successfully.';

        return redirect()->route('admin.news.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $validated = $request->validated();
        $saveAction = $validated['save_action'] ?? 'publish';
        unset($validated['save_action']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $path = $request->file('image')->store('news', 'public');
            $validated['image'] = $path;
        }

        if ($saveAction === 'draft') {
            $validated['published_at'] = null;
        } else {
            // Always publish immediately when Publish button is clicked.
            $validated['published_at'] = now();
        }

        $news->update($validated);

        $message = $saveAction === 'draft'
            ? 'Draft updated successfully.'
            : 'News updated successfully.';

        return redirect()->route('admin.news.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Delete associated image
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
