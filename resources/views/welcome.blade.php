<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK METLAND</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}?v=20260305">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
    />
</head>
<body>
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
            <li><a href="#partnership-section">{{ __('ui.nav.partnership') }}</a></li>
            <li><a href="{{ route('news.index') }}">{{ __('ui.nav.news') }}</a></li>
            <li class="nav-mobile-only"><a href="{{ route('ppdb.create') }}">{{ __('ui.nav.ppdb') }}</a></li>
            <li><a href="#contact">{{ __('ui.nav.contact') }}</a></li>
            <li class="nav-has-dropdown">
                <button type="button" class="nav-dropdown-toggle">
                    {{ __('ui.nav.more') }} <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </button>
                <ul class="nav-dropdown">
                    <li><a href="{{ route('student-works.index') }}">{{ __('ui.nav.student_works') }}</a></li>
                    <li><a href="#alumni-section">{{ __('ui.nav.alumni') }}</a></li>
                    <li><a href="#majors-smk">{{ __('ui.nav.organization') }}</a></li>
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
    <div class="slider-container">
        <div class="slider-items">
            <img src="{{ asset("img/hero.png") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">SMK METLAND</h2>
                <p class="slider-description">{{ __('ui.home.slider_desc_1') }}</p>
                <a href="#" class="slider-action">{{ __('ui.home.slider_cta_1') }}</a>
            </div>
        </div>
        <div class="slider-items">
            <img src="{{ asset("img/hero2.JPG") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">SMK METLAND</h2>
                <p class="slider-description">{{ __('ui.home.slider_desc_2') }}</p>
                <a href="#" class="slider-action">{{ __('ui.home.slider_cta_2') }}</a>
            </div>
        </div>
        <div class="slider-items">
            <img src="{{ asset("img/hero3.png") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">SMK METLAND</h2>
                <p class="slider-description">{{ __('ui.home.slider_desc_3') }}</p>
                <a href="#" class="slider-action">{{ __('ui.home.slider_cta_3') }}</a>
            </div>
        </div>
        <button class="slider-nav slider-prev" type="button" aria-label="{{ __('ui.home.slider_prev_aria') }}">&#8249;</button>
        <button class="slider-nav slider-next" type="button" aria-label="{{ __('ui.home.slider_next_aria') }}">&#8250;</button>
        <div class="slider-dots" aria-label="{{ __('ui.home.slider_pagination_aria') }}"></div>
    </div>
    <section id="about-smk" class="about-smk-section">
        <div class="about-smk-wrap">
            <div class="about-card">
                <a href="{{ url('/about-smk') }}" class="about-head-link">
                    <div class="about-head">
                        <i class="bi bi-mortarboard about-icon" aria-hidden="true"></i>
                        <div>
                            <h3>{{ __('ui.home.about_title_1') }}</h3>
                            <span class="about-head-cta">{{ __('ui.home.about_cta') }}</span>
                        </div>
                    </div>
                </a>
                <div class="about-image-frame">
                    <img src="{{ asset("img/hero.png") }}" alt="Area sekolah" class="about-image">
                </div>
                <div class="about-body">
                    <p>{{ __('ui.home.about_desc_1') }}</p>
                </div>
            </div>
            <div class="about-card">
                <a href="{{ url('/program-keahlian') }}" class="about-head-link">
                    <div class="about-head">
                        <i class="bi bi-buildings about-icon" aria-hidden="true"></i>
                        <div>
                            <h3>{{ __('ui.home.about_title_2') }}</h3>
                            <span class="about-head-cta">{{ __('ui.home.about_cta') }}</span>
                        </div>
                    </div>
                </a>
                <div class="about-image-frame">
                    <img src="{{ asset("img/about.png") }}" alt="Program keahlian" class="about-image">
                </div>
                <div class="about-body">
                    <p>{{ __('ui.home.about_desc_2') }}</p>
                </div>
            </div>
            <div class="about-card">
                <a href="{{ url('/campus-life') }}" class="about-head-link">
                    <div class="about-head">
                        <i class="bi bi-people about-icon" aria-hidden="true"></i>
                        <div>
                            <h3>{{ __('ui.home.about_title_3') }}</h3>
                            <span class="about-head-cta">{{ __('ui.home.about_cta') }}</span>
                        </div>
                    </div>
                </a>
                <div class="about-image-frame">
                    <img src="{{ asset("img/about2.png") }}" alt="Kegiatan siswa" class="about-image">
                </div>
                <div class="about-body">
                    <p>{{ __('ui.home.about_desc_3') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="feature-carousel-section" aria-label="{{ __('ui.home.majors_section_aria') }}" id="majors-smk">
        <div class="feature-carousel-badges">
            <button type="button" class="feature-carousel-title feature-tab is-active" data-feature-group="majors" data-feature-desc="{{ __('ui.home.majors_desc') }}">{{ __('ui.home.majors_title') }}</button>
            <button type="button" class="feature-carousel-title feature-tab is-alt" data-feature-group="extracurricular" data-feature-desc="{{ __('ui.home.extracurricular_desc') }}">{{ __('ui.home.extracurricular_title') }}</button>
            <button type="button" class="feature-carousel-title feature-tab is-alt" data-feature-group="organization" data-feature-desc="{{ __('ui.home.organization_desc') }}">{{ __('ui.home.organization_title') }}</button>
        </div>
        <p class="feature-carousel-description">{{ __('ui.home.majors_desc') }}</p>
        <div class="feature-carousel">
            <article class="feature-card is-active" data-feature-group="majors">
                <div class="feature-media">
                    <img src="{{ asset("img/pplg/pplg2.png") }}" alt="Belajar praktis di SMK Metland">
                </div>
                <div class="feature-content">
                    <i class="ph ph-desktop-tower"></i>
                    <h3>PPLG/IT</h3>
                    <p>{{ __('ui.home.major_pplg_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="majors">
                <div class="feature-media">
                    <img src="{{ asset("img/dkv/dkv2.png") }}" alt="Guru pembimbing berpengalaman">
                </div>
                <div class="feature-content">
                    <i class="ph ph-pen-nib-straight"></i>
                    <h3>DKV</h3>
                    <p>{{ __('ui.home.major_dkv_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="majors">
                <div class="feature-media">
                    <img src="{{ asset("img/akuntansi/akuntansi1.png") }}" alt="Kehidupan sekolah aktif">
                </div>
                <div class="feature-content">
                    <i class="ph ph-currency-dollar"></i>
                    <h3>Akuntansi</h3>
                    <p>{{ __('ui.home.major_akuntansi_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="majors">
                <div class="feature-media">
                    <img src="{{ asset("img/hotel/hotel1.png") }}" alt="Kehidupan sekolah aktif">
                </div>
                <div class="feature-content">
                    <i class="ph ph-bank"></i>
                    <h3>Perhotelan</h3>
                    <p>{{ __('ui.home.major_hotel_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="majors">
                <div class="feature-media">
                    <img src="{{ asset("img/kuliner/kuliner1.png") }}" alt="Kehidupan sekolah aktif">
                </div>
                <div class="feature-content">
                    <i class="ph ph-chef-hat"></i>
                    <h3>Kuliner/Tata boga</h3>
                    <p>{{ __('ui.home.major_kuliner_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="extracurricular">
                <div class="feature-media">
                    <img src="{{ asset("img/hero2.JPG") }}" alt="Ekstrakurikuler futsal">
                </div>
                <div class="feature-content">
                    <i class="ph ph-soccer-ball"></i>
                    <h3>Futsal</h3>
                    <p>Sesi latihan rutin, sparing, dan pembinaan teamwork untuk membangun mental kompetitif siswa.</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="extracurricular">
                <div class="feature-media">
                    <img src="{{ asset("img/about3.png") }}" alt="Ekstrakurikuler pramuka">
                </div>
                <div class="feature-content">
                    <i class="ph ph-campfire"></i>
                    <h3>Pramuka</h3>
                    <p>Kegiatan kepemimpinan, kedisiplinan, dan survival skill lewat program lapangan terstruktur.</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="extracurricular">
                <div class="feature-media">
                    <img src="{{ asset("img/hero3.png") }}" alt="Ekstrakurikuler english club">
                </div>
                <div class="feature-content">
                    <i class="ph ph-microphone-stage"></i>
                    <h3>English Club</h3>
                    <p>Fokus public speaking, debate, dan conversation practice untuk persiapan akademik global.</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="organization">
                <div class="feature-media">
                    <img src="{{ asset('img/organization/LOGO MAHES.png') }}" alt="Organisasi Maheswara Maheswari">
                </div>
                <div class="feature-content">
                    <i class="ph ph-users-three"></i>
                    <h3>{{ __('ui.home.organization_card_1_title') }}</h3>
                    <p>{{ __('ui.home.organization_card_1_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="organization">
                <div class="feature-media">
                    <img src="{{ asset("img/organization/logo osis.png") }}" alt="Organisasi PMR SMK Metland">
                </div>
                <div class="feature-content">
                    <i class="ph ph-heartbeat"></i>
                    <h3>{{ __('ui.home.organization_card_2_title') }}</h3>
                    <p>{{ __('ui.home.organization_card_2_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <article class="feature-card" data-feature-group="organization">
                <div class="feature-media">
                    <img src="{{ asset("img/organization/logo mpk.png") }}" alt="Organisasi Paskibra SMK Metland">
                </div>
                <div class="feature-content">
                    <i class="ph ph-flag-banner"></i>
                    <h3>{{ __('ui.home.organization_card_3_title') }}</h3>
                    <p>{{ __('ui.home.organization_card_3_desc') }}</p>
                    <a href="#" class="feature-btn">{{ __('ui.home.major_more') }}</a>
                </div>
            </article>
            <div class="feature-controls">
                <button type="button" class="feature-nav feature-prev" aria-label="{{ __('ui.home.feature_prev_aria') }}">&lt;</button>
                <div class="feature-dots" aria-label="{{ __('ui.home.feature_dots_aria') }}"></div>
                <button type="button" class="feature-nav feature-next" aria-label="{{ __('ui.home.feature_next_aria') }}">&gt;</button>
            </div>
        </div>
    </section>
    <section class="news-section" id="news-section" aria-label="{{ __('ui.home.news_section_aria') }}">
        @php
            $latestNewsCollection = $latestNews ?? collect();
            $featuredNews = $latestNewsCollection->first();
            $sideNews = $latestNewsCollection->slice(1, 3);
        @endphp
        <div class="news-shell">
            <div class="news-head">
                <span class="news-badge">{{ __('ui.news.latest_badge') }}</span>
                <a href="{{ route('news.index') }}" class="news-all-link">{{ __('ui.news.see_all') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="news-layout">
                @if($featuredNews)
                    <article class="news-featured-card">
                        <div class="news-featured-media">
                            <img src="{{ $featuredNews->image_url }}" alt="{{ $featuredNews->localized_title }}">
                            <span class="news-tag">{{ __('ui.news.tag') }}</span>
                        </div>
                        <div class="news-featured-body">
                            <p class="news-meta"><i class="fa-regular fa-calendar"></i> {{ ($featuredNews->published_at ?? $featuredNews->created_at)->translatedFormat('d M Y') }}</p>
                            <h3>{{ $featuredNews->localized_title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($featuredNews->localized_content), 180) }}</p>
                            <a href="{{ route('news.show', $featuredNews->slug) }}" class="news-read-more">{{ __('ui.news.read_more') }}</a>
                        </div>
                    </article>

                    <div class="news-side-list">
                        @foreach($sideNews as $item)
                            <article class="news-mini-card">
                                <a href="{{ route('news.show', $item->slug) }}" class="news-mini-thumb-link">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->localized_title }}">
                                </a>
                                <div>
                                    <p class="news-mini-meta">{{ ($item->published_at ?? $item->created_at)->translatedFormat('d M Y') }}</p>
                                    <h4><a href="{{ route('news.show', $item->slug) }}" class="news-mini-link">{{ \Illuminate\Support\Str::limit($item->localized_title, 68) }}</a></h4>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <article class="news-featured-card">
                        <div class="news-featured-media">
                            <img src="{{ asset('img/hero2.JPG') }}" alt="{{ __('ui.home.news_default_alt') }}">
                            <span class="news-tag">{{ __('ui.news.tag') }}</span>
                        </div>
                        <div class="news-featured-body">
                            <p class="news-meta"><i class="fa-regular fa-calendar"></i> {{ __('ui.news.no_data_date') }}</p>
                            <h3>{{ __('ui.news.none_title') }}</h3>
                            <p>{{ __('ui.news.none_desc') }}</p>
                            <a href="{{ route('news.index') }}" class="news-read-more">{{ __('ui.news.view_news_page') }}</a>
                        </div>
                    </article>
                @endif
            </div>
        </div>
    </section>
    <section class="alumni-section" id="alumni-section">
        <div class="alumni-shell">
            <div class="alumni-head">
                <span class="alumni-badge"><span>{{ __('ui.nav.alumni') }}</span></span>
                <h2>{{ __('ui.home.alumni_heading_prefix') }} <span>{{ __('ui.home.alumni_heading_highlight') }}</span></h2>
                <p>{{ __('ui.home.alumni_heading_desc') }}</p>
            </div>

            <div class="alumni-slide-container swiper">
                <ul class="alumni-card-list swiper-wrapper">
                    <li class="alumni-card-item swiper-slide">
                        <a href="#" class="alumni-card-link">
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo MPK SMK Metland" class="alumni-card-image" data-swiper-parallax="-80">
                            <p class="alumni-card-badge" data-swiper-parallax="-40">{{ __('ui.home.alumni_person_1_name') }}</p>
                            <h2 class="alumni-card-title" data-swiper-parallax="-20">{{ __('ui.home.alumni_person_1_quote') }}</h2>
                            <span class="alumni-card-button" data-swiper-parallax="-8"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </li>
                    <li class="alumni-card-item swiper-slide">
                        <a href="#" class="alumni-card-link">
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo Rohis SMK Metland" class="alumni-card-image" data-swiper-parallax="-80">
                            <p class="alumni-card-badge" data-swiper-parallax="-40">{{ __('ui.home.alumni_person_2_name') }}</p>
                            <h2 class="alumni-card-title" data-swiper-parallax="-20">{{ __('ui.home.alumni_person_2_quote') }}</h2>
                            <span class="alumni-card-button" data-swiper-parallax="-8"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </li>
                    <li class="alumni-card-item swiper-slide">
                        <a href="#" class="alumni-card-link">
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo Rohis SMK Metland" class="alumni-card-image" data-swiper-parallax="-80">
                            <p class="alumni-card-badge" data-swiper-parallax="-40">{{ __('ui.home.alumni_person_3_name') }}</p>
                            <h2 class="alumni-card-title" data-swiper-parallax="-20">{{ __('ui.home.alumni_person_3_quote') }}</h2>
                            <span class="alumni-card-button" data-swiper-parallax="-8"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </li>
                    <li class="alumni-card-item swiper-slide">
                        <a href="#" class="alumni-card-link">
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo PMR SMK Metland" class="alumni-card-image" data-swiper-parallax="-80">
                            <p class="alumni-card-badge" data-swiper-parallax="-40">{{ __('ui.home.alumni_person_4_name') }}</p>
                            <h2 class="alumni-card-title" data-swiper-parallax="-20">{{ __('ui.home.alumni_person_4_quote') }}</h2>
                            <span class="alumni-card-button" data-swiper-parallax="-8"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </li>
                    <li class="alumni-card-item swiper-slide">
                        <a href="#" class="alumni-card-link">
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo Paskibra SMK Metland" class="alumni-card-image" data-swiper-parallax="-80">
                            <p class="alumni-card-badge" data-swiper-parallax="-40">{{ __('ui.home.alumni_person_5_name') }}</p>
                            <h2 class="alumni-card-title" data-swiper-parallax="-20">{{ __('ui.home.alumni_person_5_quote') }}</h2>
                            <span class="alumni-card-button" data-swiper-parallax="-8"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </li>
                </ul>

                <div class="alumni-controls">
                    <div class="swiper-pagination" aria-label="Alumni slide pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
      <div class="contact-header">
        <span class="contact-label">{{ __('ui.contact.badge') }}</span>
        <h2>{{ __('ui.contact.title') }}</h2>
        <p>{{ __('ui.contact.subtitle') }}</p>
      </div>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9227473878086!2d106.97256397475222!3d-6.4039541935867605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699445f0d1c541%3A0x3c8a27a75eb76093!2sSMK%20Metland%20School!5e0!3m2!1sid!2sid!4v1771736307836!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="" id="contact-form" novalidate>
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" name="name" placeholder="{{ __('ui.contact.name_placeholder') }}" required minlength="2" />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="email" name="email" placeholder="{{ __('ui.contact.email_placeholder') }}" required />
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="tel" name="phone" placeholder="{{ __('ui.contact.phone_placeholder') }}" required />
          </div>
          <p class="contact-feedback" id="contact-feedback" role="status" aria-live="polite"></p>
          <button type="submit" class="btn contact-btn">{{ __('ui.contact.send') }}</button>
        </form>
      </div>
    </section>

    <section class="school-partnership" id="partnership-section" aria-label="{{ __('ui.home.partnership_section_aria') }}">
        <div class="partnership-shell">
            <div class="partnership-head">
                <span class="partnership-badge">{{ __('ui.home.partnership_badge') }}</span>
                <h2>{{ __('ui.home.partnership_title') }}</h2>
                <p>{{ __('ui.home.partnership_desc') }}</p>
            </div>

            <div class="partner-group">
                <h3>{{ __('ui.home.partner_group_industry') }}</h3>
                <div class="partner-logo-grid">
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/virtalus-150x150.png') }}" alt="Logo Virtalus">
                        <p>Virtalus</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Grand_Metropolitan-removebg-preview-150x150.png') }}" alt="Logo Grand Metropolitan">
                        <p>Grand Metropolitan</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Kaliana_Apartment-removebg-preview-150x150.png') }}" alt="Logo Kaliana Apartment">
                        <p>Kaliana Apartment</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Indesso-removebg-preview-150x150.png') }}" alt="Logo Indesso">
                        <p>Indesso</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Metropolitan_Mall_Cibubur-removebg-preview-150x150.png') }}" alt="Logo Metropolitan Mall Cibubur">
                        <p>Metropolitan Mall Cibubur</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/PT_Metland-removebg-preview-e1704943421395-150x150.png') }}" alt="Logo PT Metropolitan Land">
                        <p>PT Metropolitan Land</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Sila_Tea-removebg-preview-150x150.png') }}" alt="Logo Sila Tea">
                        <p>Sila Tea</p>
                    </article>
                </div>
            </div>

            <div class="partner-group">
                <h3>{{ __('ui.home.partner_group_hospitality') }}</h3>
                <div class="partner-logo-grid">
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Metland-Hotels-Group-150x150.png') }}" alt="Logo Metland Hotels Group">
                        <p>Metland Hotels Group</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Ayana-removebg-preview-1-150x150.png') }}" alt="Logo Ayana Midplaza Jakarta">
                        <p>Ayana Midplaza Jakarta</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Harris_Hotel-removebg-preview-150x150.png') }}" alt="Logo Harris Hotels">
                        <p>Harris Hotels</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/accor-e1705022947913-150x150.png') }}" alt="Logo Accor">
                        <p>Accor</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/ritz-calton-150x150.png') }}" alt="Logo The Ritz-Carlton">
                        <p>The Ritz-Carlton</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/shangri-150x150.png') }}" alt="Logo Shangri-La">
                        <p>Shangri-La</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Kempinski-removebg-preview-150x150.png') }}" alt="Logo Kempinski">
                        <p>Kempinski</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Horison_Hotels_Group__1_-removebg-preview-150x150.png') }}" alt="Logo Horison Hotels Group">
                        <p>Horison Hotels Group</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Ra_Suites-removebg-preview-150x150.png') }}" alt="Logo RA Suites">
                        <p>RA Suites</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Hotel_Ciputra_Cibubur-removebg-preview-150x150.png') }}" alt="Logo Hotel Ciputra Cibubur">
                        <p>Hotel Ciputra Cibubur</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Pullman-removebg-preview-150x150.png') }}" alt="Logo Pullman">
                        <p>Pullman</p>
                    </article>
                </div>
            </div>

            <div class="partner-group">
                <h3>{{ __('ui.home.partner_group_college') }}</h3>
                <div class="partner-logo-grid">
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/biru-150x150.png') }}" alt="Logo STIE Pariwisata YAPARI-AKTRIPA">
                        <p>STIE Pariwisata YAPARI-AKTRIPA</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/Phitsanulok_Logo-1-150x150.jpg') }}" alt="Logo Petchruniversity">
                        <p>Petchruniversity</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/dt_153037286-150x90.png') }}" alt="Logo Anabuki">
                        <p>Anabuki</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/long-beach-150x150.png') }}" alt="Logo Longbeach">
                        <p>Longbeach</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/philipin-university-150x150.png') }}" alt="Logo Philippine University">
                        <p>Philippine University</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/puket-1-150x150.png') }}" alt="Logo Phuket Partner">
                        <p>Phuket Partner</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/teii-e1705024305638-150x150.png') }}" alt="Logo TEII Program">
                        <p>TEII Program</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/trskt-150x150.png') }}" alt="Logo TRSKT Partner">
                        <p>TRSKT Partner</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/unesco-150x150.png') }}" alt="Logo UNESCO Partner">
                        <p>UNESCO Partner</p>
                    </article>
                    <article class="partner-logo-card">
                        <img src="{{ asset('img/partners/IMG-20230612-WA0015-1-150x150.jpg') }}" alt="Logo International Campus Partner">
                        <p>International Campus Partner</p>
                    </article>
                </div>
            </div>

            <div class="partnership-source">
                <a href="https://smkmetland.net/ppdb/" target="_blank" rel="noopener noreferrer">{{ __('ui.home.partner_source') }}</a>
            </div>
        </div>
    </section>

    <footer class="school-footer" id="school-footer">
        <div class="footer-shell">
            <div class="footer-brand">
                <div class="footer-brand-head">
                    <img src="{{ asset("img/logo.webp") }}" alt="Logo SMK Metland" class="footer-logo">
                    <h3>METLAND SCHOOL</h3>
                </div>
                <p>{{ __('ui.home.footer_tagline') }}</p>
            </div>

            <div class="footer-posts">
                <h4>{{ __('ui.footer.recent_posts') }}</h4>
                <div class="footer-post-list">
                    @php
                        $footerNews = ($latestNews ?? collect())->take(2);
                    @endphp
                    @forelse($footerNews as $item)
                        <article class="footer-post-item">
                            <img src="{{ $item->image_url }}" alt="{{ $item->localized_title }}" class="footer-post-thumb">
                            <div class="footer-post-content">
                                <a href="{{ route('news.show', $item->slug) }}">{{ \Illuminate\Support\Str::limit($item->localized_title, 76) }}</a>
                                <p class="footer-post-date">{{ ($item->published_at ?? $item->created_at)->translatedFormat('d M Y') }}</p>
                            </div>
                        </article>
                    @empty
                        <article class="footer-post-item">
                            <img src="{{ asset('img/hero2.JPG') }}" alt="{{ __('ui.footer.no_news_alt') }}" class="footer-post-thumb">
                            <div class="footer-post-content">
                                <a href="{{ route('news.index') }}">{{ __('ui.footer.no_published_news') }}</a>
                                <p class="footer-post-date">{{ __('ui.footer.check_again_later') }}</p>
                            </div>
                        </article>
                    @endforelse
                </div>
            </div>

            <div class="footer-links">
                <h4>{{ __('ui.footer.quick_access') }}</h4>
                <a href="#about-smk">{{ __('ui.footer.profile') }}</a>
                <a href="#majors-smk">{{ __('ui.footer.majors') }}</a>
                <a href="#partnership-section">{{ __('ui.footer.industry_partnership') }}</a>
                <a href="#partnership-section">{{ __('ui.footer.college_partnership') }}</a>
                <a href="{{ route('news.index') }}">{{ __('ui.footer.school_news') }}</a>
                <a href="#school-footer">{{ __('ui.footer.school_contact') }}</a>
            </div>

            <div class="footer-contact-map">
                <h4>{{ __('ui.footer.contact_us') }}</h4>
                <p><strong>{{ __('ui.footer.location') }}:</strong><br>{{ __('ui.footer.address') }}</p>
                <p><strong>{{ __('ui.footer.phone') }}:</strong> (021) 82496976</p>
                <p><strong>{{ __('ui.footer.whatsapp') }}:</strong> +6281293395500</p>
                <p><strong>{{ __('ui.footer.website') }}:</strong> <a href="https://www.smkmetland.net" target="_blank" rel="noopener noreferrer">www.smkmetland.net</a></p>
                <div class="footer-socials">
                    <a href="https://youtube.com/@metlandschool?si=H326T8TIsX0qFjtO" target="_blank" rel="noopener noreferrer" aria-label="YouTube SMK Metland">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://www.tiktok.com/@smkmetland" target="_blank" rel="noopener noreferrer" aria-label="TikTok SMK Metland">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.facebook.com/smkmetland" target="_blank" rel="noopener noreferrer" aria-label="Facebook SMK Metland">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/smkmetland?igsh=M2Q5aHJuMzB4MWNp" target="_blank" rel="noopener noreferrer" aria-label="Instagram SMK Metland">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
                <iframe
                    class="footer-map-frame"
                    title="{{ __('ui.footer.map_title') }}"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?cid=4362342788863844499&hl=id&gl=ID&output=embed">
                </iframe>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ __('ui.footer.copyright') }}</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="{{ asset("js/script.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
</body>
</html>
