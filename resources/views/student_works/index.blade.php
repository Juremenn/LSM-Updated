<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('ui.student_works.title') }} - SMK Metland</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}?v=20260305">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="news-page-body">
    <main class="news-page-main">
        <header class="news-page-head">
            <a href="{{ url('/') }}" class="news-page-home-link"><i class="bi bi-arrow-left"></i> {{ __('ui.student_works.back_home') }}</a>
            <h1>{{ __('ui.student_works.title') }}</h1>
            <p>{{ __('ui.student_works.latest_subtitle') }}</p>
        </header>
        <form action="{{ route('student-works.index') }}" method="GET" class="news-search-inline" role="search">
            <input
                type="text"
                name="q"
                value="{{ $search ?? '' }}"
                placeholder="{{ __('ui.student_works.search_placeholder') }}"
                aria-label="{{ __('ui.student_works.search_placeholder') }}">
            <button type="submit" aria-label="{{ __('ui.student_works.search_title') }}">
                <i class="bi bi-search"></i>
            </button>
        </form>
        @if(!empty($search))
            <p class="news-search-result">{{ __('ui.student_works.search_result_for', ['query' => $search]) }}</p>
        @endif

        @if($studentWorks->count())
            <section class="news-page-grid" aria-label="{{ __('ui.student_works.list_aria') }}">
                @foreach($studentWorks as $item)
                    <article class="news-page-card">
                        <div class="news-page-media">
                            <img src="{{ $item->image_url }}" alt="{{ $item->localized_title }}">
                            <span class="news-page-tag">{{ __('ui.student_works.tag') }}</span>
                        </div>
                        <div class="news-page-content">
                            <h2>{{ $item->localized_title }}</h2>
                            <p class="news-page-meta">
                                <i class="bi bi-person-circle"></i> {{ $item->author?->name ?? __('ui.student_works.admin') }}
                                <span>&bull;</span>
                                <i class="bi bi-calendar4-week"></i> {{ ($item->published_at ?? $item->created_at)->translatedFormat('d M Y H:i') }}
                            </p>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->localized_content), 220) }}</p>
                            <a href="{{ route('student-works.show', $item->slug) }}" class="news-page-btn">{{ __('ui.student_works.read_more') }}</a>
                        </div>
                    </article>
                @endforeach
            </section>

            @if($studentWorks->hasPages())
                <nav class="news-page-pagination" aria-label="{{ __('ui.student_works.title') }} pagination">
                    @if($studentWorks->onFirstPage())
                        <span class="news-page-page is-disabled">{{ __('ui.student_works.pagination_prev') }}</span>
                    @else
                        <a href="{{ $studentWorks->previousPageUrl() }}" class="news-page-page">{{ __('ui.student_works.pagination_prev') }}</a>
                    @endif

                    @foreach($studentWorks->getUrlRange(1, $studentWorks->lastPage()) as $page => $url)
                        @if($page == $studentWorks->currentPage())
                            <span class="news-page-page is-active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="news-page-page">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($studentWorks->hasMorePages())
                        <a href="{{ $studentWorks->nextPageUrl() }}" class="news-page-page">{{ __('ui.student_works.pagination_next') }}</a>
                    @else
                        <span class="news-page-page is-disabled">{{ __('ui.student_works.pagination_next') }}</span>
                    @endif
                </nav>
            @endif
        @else
            <section class="news-page-empty">
                <h2>{{ __('ui.student_works.empty_title') }}</h2>
                <p>{{ __('ui.student_works.empty_desc') }}</p>
            </section>
        @endif
    </main>
</body>
</html>
