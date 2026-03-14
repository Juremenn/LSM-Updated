<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('ui.news.title') }} - SMK Metland</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}?v=20260305">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="news-page-body">
    <nav>
        <div class="logo">
            <img src="{{ asset("img/logo.webp") }}" alt="Logo SMK Metland" class="logo-img">METLAND SCHOOL
        </div>
        <ul id="primary-nav">
            <li><a href="{{ url('/') }}">{{ __('ui.nav.home') }}</a></li>
            <li class="nav-has-dropdown">
                <button type="button" class="nav-dropdown-toggle">
                    {{ __('ui.nav.school_profile') }} <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </button>
                <ul class="nav-dropdown">
                    <li><a href="{{ route('vision-mission') }}">{{ __('ui.nav.profile_vision') }}</a></li>
                    <li><a href="{{ route('sejarah') }}">{{ __('ui.nav.profile_history') }}</a></li>
                </ul>
            </li>
            <li class="nav-has-dropdown">
                <button type="button" class="nav-dropdown-toggle">
                    {{ __('ui.nav.majors') }} <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </button>
                <ul class="nav-dropdown">
                    <li><a href="{{ route('majors.akuntansi') }}">{{ __('ui.nav.major_accounting') }}</a></li>
                    <li><a href="{{ route('majors.pplg') }}">{{ __('ui.nav.major_pplg') }}</a></li>
                    <li><a href="{{ route('majors.dkv') }}">{{ __('ui.nav.major_dkv') }}</a></li>
                    <li><a href="{{ route('majors.kuliner') }}">{{ __('ui.nav.major_culinary') }}</a></li>
                    <li><a href="{{ route('majors.hotel') }}">{{ __('ui.nav.major_hotel') }}</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/#partnership-section') }}">{{ __('ui.nav.partnership') }}</a></li>
            <li><a href="{{ route('news.index') }}">{{ __('ui.nav.news') }}</a></li>
            <li class="nav-mobile-only"><a href="{{ route('ppdb.create') }}">{{ __('ui.nav.ppdb') }}</a></li>
            <li><a href="{{ url('/#contact') }}">{{ __('ui.nav.contact') }}</a></li>
            <li class="nav-has-dropdown">
                <button type="button" class="nav-dropdown-toggle">
                    {{ __('ui.nav.more') }} <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </button>
                <ul class="nav-dropdown">
                    <li><a href="{{ route('student-works.index') }}">{{ __('ui.nav.student_works') }}</a></li>
                    <li><a href="{{ url('/#alumni-section') }}">{{ __('ui.nav.alumni') }}</a></li>
                    <li><a href="{{ url('/#majors-smk') }}">{{ __('ui.nav.organization') }}</a></li>
                </ul>
            </li>
        </ul>
        <div class="ppdb-btn">
            <button type="button" onclick="window.location.href='{{ route('ppdb.create') }}'">{{ __('ui.nav.ppdb') }}</button>
        </div>
        <div class="lang-switch" aria-label="{{ __('ui.lang.switcher_aria') }}">
            <a href="{{ route('language.switch', 'id') }}" class="{{ app()->getLocale() === 'id' ? 'is-active' : '' }}">{{ __('ui.lang.id') }}</a>
            <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'is-active' : '' }}">{{ __('ui.lang.en') }}</a>
        </div>
        <div class="nav-mobile-actions" aria-label="{{ __('ui.nav.mobile_controls_aria') }}">
            <a href="{{ route('news.index') }}" class="nav-mobile-search" aria-label="{{ __('ui.news.search_placeholder') }}">
                <i class="bi bi-search"></i>
            </a>
            <button type="button" class="nav-mobile-menu" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="primary-nav">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <main class="news-page-main">
        <header class="news-page-head">
            <p class="news-page-crumb"><a href="{{ url('/') }}">{{ __('ui.nav.home') }}</a> <span>&rsaquo;</span> {{ __('ui.nav.news') }}</p>
            <h1>{{ __('ui.news.title') }}</h1>
            <p>{{ __('ui.news.latest_subtitle') }}</p>
        </header>

        <section class="news-page-layout" aria-label="{{ __('ui.news.list_aria') }}">
            <div class="news-page-content-area">
                <form action="{{ route('news.index') }}" method="GET" class="news-search-inline" role="search">
                    <input
                        type="text"
                        name="q"
                        value="{{ $search ?? '' }}"
                        placeholder="{{ __('ui.news.search_placeholder') }}"
                        aria-label="{{ __('ui.news.search_placeholder') }}">
                    <button type="submit" aria-label="{{ __('ui.news.search_title') }}">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                @if(!empty($search))
                    <p class="news-search-result">{{ __('ui.news.search_result_for', ['query' => $search]) }}</p>
                @endif

                @if($featuredNews && empty($search))
                    <article class="news-page-featured">
                        <div class="news-page-featured-media">
                            <img src="{{ $featuredNews->image_url }}" alt="{{ $featuredNews->localized_title }}">
                            <span class="news-page-tag">{{ __('ui.news.tag') }}</span>
                        </div>
                        <div class="news-page-featured-body">
                            <p class="news-page-meta">
                                <i class="bi bi-person-circle"></i> {{ $featuredNews->author?->name ?? __('ui.news.admin') }}
                                <span>&bull;</span>
                                <i class="bi bi-calendar4-week"></i> {{ ($featuredNews->published_at ?? $featuredNews->created_at)->translatedFormat('d M Y H:i') }}
                            </p>
                            <h2>{{ $featuredNews->localized_title }}</h2>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($featuredNews->localized_content), 220) }}</p>
                            <a href="{{ route('news.show', $featuredNews->slug) }}" class="news-page-btn">{{ __('ui.news.read_more') }}</a>
                        </div>
                    </article>
                @endif

                @if($news->count())
                    <section class="news-portal-list" aria-label="{{ __('ui.news.list_aria') }}">
                        @foreach($news as $item)
                            <article class="news-portal-item">
                                <a href="{{ route('news.show', $item->slug) }}" class="news-portal-thumb-link">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->localized_title }}">
                                </a>
                                <div class="news-portal-content">
                                    <span class="news-portal-badge">{{ __('ui.news.tag') }}</span>
                                    <h2>{{ $item->localized_title }}</h2>
                                    <p class="news-portal-meta">
                                        <i class="bi bi-person-circle"></i> {{ $item->author?->name ?? __('ui.news.admin') }}
                                        <span>&bull;</span>
                                        <i class="bi bi-calendar4-week"></i> {{ ($item->published_at ?? $item->created_at)->translatedFormat('d M Y H:i') }}
                                    </p>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->localized_content), 220) }}</p>
                                    <a href="{{ route('news.show', $item->slug) }}" class="news-portal-link">{{ __('ui.news.read_more') }} <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </article>
                        @endforeach
                    </section>

                    @if($news->hasPages())
                        <nav class="news-page-pagination" aria-label="{{ __('ui.news.title') }} pagination">
                            @if($news->onFirstPage())
                                <span class="news-page-page is-disabled">{{ __('ui.news.pagination_prev') }}</span>
                            @else
                                <a href="{{ $news->previousPageUrl() }}" class="news-page-page">{{ __('ui.news.pagination_prev') }}</a>
                            @endif

                            @foreach($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                @if($page == $news->currentPage())
                                    <span class="news-page-page is-active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="news-page-page">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if($news->hasMorePages())
                                <a href="{{ $news->nextPageUrl() }}" class="news-page-page">{{ __('ui.news.pagination_next') }}</a>
                            @else
                                <span class="news-page-page is-disabled">{{ __('ui.news.pagination_next') }}</span>
                            @endif
                        </nav>
                    @endif
                @else
                    <section class="news-page-empty">
                        <h2>{{ __('ui.news.empty_title') }}</h2>
                        <p>{{ __('ui.news.empty_desc') }}</p>
                    </section>
                @endif
            </div>

            <aside class="news-page-sidebar">
                <section class="news-sidebar-card">
                    <h2>{{ __('ui.news.latest_sidebar_title') }}</h2>
                    <div class="news-sidebar-list">
                        @forelse($recentNews ?? collect() as $item)
                            <a href="{{ route('news.show', $item->slug) }}" class="news-sidebar-item">
                                <img src="{{ $item->image_url }}" alt="{{ $item->localized_title }}">
                                <div>
                                    <p class="news-sidebar-item-title">{{ \Illuminate\Support\Str::limit($item->localized_title, 68) }}</p>
                                    <p class="news-sidebar-item-date">{{ ($item->published_at ?? $item->created_at)->translatedFormat('d M Y') }}</p>
                                </div>
                            </a>
                        @empty
                            <p class="news-sidebar-empty">{{ __('ui.news.empty_desc') }}</p>
                        @endforelse
                    </div>
                </section>
            </aside>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="{{ asset("js/script.js") }}"></script>
</body>
</html>

