<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi Sekolah</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}?v=20260305">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset("css/visimisi.css") }}">
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
    <div class="slider-container">
        <div class="slider-items">
            <img src="{{ asset("img/hero.png") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">VISI</h2>
                <p class="slider-description">“Menjadi SMK Yang Lulusannya Memiliki Performa Karakter Unggul Dan Berkompetensi Berstandar Internasional”</p>
            </div>
        </div>
        <div class="slider-items">
            <img src="{{ asset("img/hero2.JPG") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">MISI</h2>
                <a href="#mission" class="slider-action">SEE HERE!</a>
            </div>
        </div>
        <button class="slider-nav slider-prev" type="button" aria-label="{{ __('ui.home.slider_prev_aria') }}">&#8249;</button>
        <button class="slider-nav slider-next" type="button" aria-label="{{ __('ui.home.slider_next_aria') }}">&#8250;</button>
        <div class="slider-dots" aria-label="{{ __('ui.home.slider_pagination_aria') }}"></div>
</div>
    <section class="vision-mission-section" id="mission">
        <div class="container">
            <div class="hero-badge">Misi Kami</div>
            <h4>Membangun<span>GENERASI CINTA PRESTASI</span></h4>
        </div>
        
        <main class="section-wrap">
            <div class="container">
                @if($visionMission)
                @php
                    $missionLines = preg_split('/\r\n|\r|\n/', (string) $visionMission->mission);
                    $missionLines = array_values(array_filter(array_map('trim', $missionLines)));
                @endphp

<div class="row g-4">
    <div class="col-lg-12">
        <article class="vm-card">
            <h2>Misi</h2>
            @if(count($missionLines) > 1)
            <ol class="mission-list">
                @foreach($missionLines as $line)
                <li>{{ ltrim($line, "-• \t") }}</li>
                @endforeach
            </ol>
            @else
            <p>{{ $visionMission->mission }}</p>
            @endif
        </article>
    </div>
</div>
@else
<div class="panel empty-state">
                    Data visi misi belum tersedia.
                </div>
                @endif
                
                <div class="panel mt-4">
                    <h3 class="panel-title">Akses Cepat</h3>
                    <div class="quick-actions">
                        <a href="{{ url('/') }}" class="btn btn-school btn-outline-school">Kembali ke Beranda</a>
                        <a href="{{ route('ppdb.create') }}" class="btn btn-school btn-primary-school">Pendaftaran PPDB</a>
                        <a href="{{ url('/news') }}" class="btn btn-school btn-outline-school">Lihat Berita Sekolah</a>
                    </div>
                </div>
            </div>
        </main>
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
