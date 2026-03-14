<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurusan AKuntansi - SMK Metland</title>
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
<style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            scroll-behavior: smooth;
        }

        .akuntansi-profile {
            padding: 68px 0 64px;
        }

        .akuntansi-profile-shell {
            width: min(980px, 92vw);
            margin: 0 auto;
        }

        .akuntansi-profile-top {
            display: grid;
            grid-template-columns: minmax(250px, 390px) minmax(280px, 1fr);
            align-items: center;
            gap: 100px;
            margin-bottom: 52px;
        }

        .akuntansi-profile-title {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.55rem, 3vw, 3rem);
            font-weight: 700;
            color: #101010;
            line-height: 1.1;
        }

        span {
            color: #1f8f8b;
            font-weight: 600;
        }

        .akuntansi-title-line {
            width: min(170px, 36vw);
            height: 4px;
            margin: 10px 0 20px;
            border-radius: 999px;
            background: #1f8f8b;
        }

        .akuntansi-gallery {
            width: 100%;
            border: 2px solid rgba(20, 20, 20, 0.18);
            border-radius: 6px;
            background: #fff;
            overflow: hidden;
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .akuntansi-gallery:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 36px rgba(11, 78, 88, 0.18);
            border-color: rgba(21, 135, 142, 0.45);
        }

        .akuntansi-gallery img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
            transition: transform 0.45s ease, filter 0.45s ease;
        }

        .akuntansi-gallery:hover img {
            transform: scale(1.035);
            filter: saturate(1.05);
        }

        .akuntansi-profile-copy {
            margin: 0;
            color: #0e7881;
            font-size: clamp(1rem, 1.05vw, 1.7rem);
            line-height: 1.48;
            font-weight: 500;
            max-width: 36ch;
        }

        .akuntansi-skill-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 24px;
        }

        .akuntansi-skill-card {
            background: #0f8e94;
            border-radius: 14px;
            min-height: 122px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 12px 8px 10px;
            color: #f4ffff;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.14);
            box-shadow: none;
        }

        .akuntansi-skill-card i {
            font-size: 1.7rem;
            line-height: 1;
            margin-bottom: 6px;
        }

        .akuntansi-skill-card strong {
            display: block;
            font-size: 1.5rem;
            line-height: 1.05;
            letter-spacing: 0.01em;
        }

        .akuntansi-skill-card small {
            display: block;
            margin-top: 2px;
            font-size: 1rem;
            line-height: 1.15;
            font-weight: 600;
        }

        .akuntansi-partnership {
            padding: 56px 0 64px;
        }

        .akuntansi-partnership-shell {
            margin: 0 auto;
        }

        .akuntansi-partnership-head {
            text-align: center;
            margin-bottom: 26px;
        }

        .akuntansi-partnership-head h3 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.6rem, 2.8vw, 2.2rem);
            color: #11444b;
        }

        .akuntansi-partnership-head p {
            margin: 10px auto 0;
            max-width: 64ch;
            color: #2b666f;
            font-size: 1rem;
            line-height: 1.7;
        }

        .akuntansi-partnership-slider {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.82);
            padding: 20px 0;
        }

        .akuntansi-partnership-slider::before,
        .akuntansi-partnership-slider::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: 88px;
            z-index: 2;
            pointer-events: none;
        }

        .akuntansi-partnership-slider::before {
            left: 0;
            background: linear-gradient(90deg, rgba(235, 246, 250, 1), rgba(235, 246, 250, 0));
        }

        .akuntansi-partnership-slider::after {
            right: 0;
            background: linear-gradient(270deg, rgba(235, 246, 250, 1), rgba(235, 246, 250, 0));
        }

        .akuntansi-partnership-track {
            display: flex;
            align-items: center;
            gap: 16px;
            width: max-content;
            animation: akuntansi-partner-scroll 28s linear infinite;
        }

        .akuntansi-partnership-slider:hover .akuntansi-partnership-track {
            animation-play-state: paused;
        }

        .akuntansi-partner-card {
            width: 190px;
            min-height: 128px;
            border-radius: 14px;
            border: 1px solid rgba(65, 164, 175, 0.2);
            background: #ffffff;
            padding: 14px 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex: 0 0 auto;
        }

        .akuntansi-partner-card img {
            width: 110px;
            height: 62px;
            object-fit: contain;
            display: block;
        }

        .akuntansi-partner-card span {
            margin-top: 8px;
            color: #2b5960;
            font-size: 0.82rem;
            line-height: 1.35;
            font-weight: 600;
        }

        @keyframes akuntansi-partner-scroll {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(calc(-50% - 8px));
            }
        }

        @media (max-width: 900px) {
            .akuntansi-profile {
                padding: 54px 0 48px;
            }

            .akuntansi-profile-top {
                grid-template-columns: 1fr;
                gap: 24px;
                margin-bottom: 34px;
            }

            .akuntansi-profile-copy {
                max-width: none;
            }

            .akuntansi-skill-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .akuntansi-partnership {
                padding: 46px 0 52px;
            }

            .akuntansi-partnership-slider::before,
            .akuntansi-partnership-slider::after {
                width: 42px;
            }

            .akuntansi-partner-card {
                width: 156px;
                min-height: 112px;
            }

            .akuntansi-partner-card img {
                width: 94px;
                height: 52px;
            }
        }

        @media (max-width: 600px) {
            .akuntansi-profile-copy {
                font-size: 1rem;
                line-height: 1.72;
            }

            .akuntansi-skill-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }

            .akuntansi-skill-card {
                min-height: 122px;
                padding: 10px 8px;
            }

            .akuntansi-skill-card i {
                font-size: 1.7rem;
            }

            .akuntansi-skill-card strong {
                font-size: 1.55rem;
            }

            .akuntansi-skill-card small {
                font-size: 0.86rem;
            }

            .akuntansi-partnership-head p {
                font-size: 0.92rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .akuntansi-partnership-track {
                animation: none;
            }
        }
    </style>
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
            <img src="{{ asset("img/akuntansi/akuntansi1.png") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">Akuntansi Bisnis</h2>
                <p class="slider-description">hadir sebagai jawaban atas kebutuhan dunia usaha dan industri yang semakin dinamis, transparan, dan berbasis data.</p>
                <a href="#akuntansiProfile" class="slider-action">SEE MORE!</a>
            </div>
        </div>
        <div class="slider-items">
            <img src="{{ asset("img/akuntansi/akuntansi2.png") }}" alt="">
            <div class="slider-content">
                <p class="slider-subtitle">{{ __('ui.home.slider_subtitle') }}</p>
                <h2 class="slider-title">Akuntansi Bisnis</h2>
                <p class="slider-description">hadir sebagai jawaban atas kebutuhan dunia usaha dan industri yang semakin dinamis, transparan, dan berbasis data.</p>
                <a href="#akuntansiProfile" class="slider-action">SEE MORE!</a>
            </div>
        </div>
        <button class="slider-nav slider-prev" type="button" aria-label="{{ __('ui.home.slider_prev_aria') }}">&#8249;</button>
        <button class="slider-nav slider-next" type="button" aria-label="{{ __('ui.home.slider_next_aria') }}">&#8250;</button>
        <div class="slider-dots" aria-label="{{ __('ui.home.slider_pagination_aria') }}"></div>
</div>

    <section class="akuntansi-profile" id="akuntansiProfile">
        <div class="akuntansi-profile-shell">
            <div class="akuntansi-profile-top">
                <figure class="akuntansi-gallery m-0">
                    <img src="{{ asset('img/akuntansi/akuntansi3.png') }}" alt="Aktivitas siswa PPLG SMK Metland">
                </figure>

                <div>
                    <h2 class="akuntansi-profile-title">apa itu <span>Akuntansi?</span></h2>
                    <div class="akuntansi-title-line" aria-hidden="true"></div>
                    <p class="akuntansi-profile-copy">
                        Kurikulum Akuntansi Bisnis dikembangkan selaras dengan kebutuhan industri, meliputi akuntansi perusahaan jasa, dagang, dan manufaktur, komputer akuntansi, perpajakan, administrasi keuangan, hingga pengelolaan bisnis dan kewirausahaan. Pembelajaran berbasis proyek (project-based learning) serta kolaborasi dengan dunia industri membentuk karakter siswa yang teliti, bertanggung jawab, dan adaptif terhadap perkembangan teknologi finansial.
                    </p>
                </div>
            </div>

            <div class="akuntansi-skill-grid" aria-label="Kompetensi utama PPLG">
                <article class="akuntansi-skill-card">
                    <i class="bi bi-receipt-cutoff"></i>
                    <strong>Staff</strong>
                    <small>Perpajakan</small>
                </article>
                <article class="akuntansi-skill-card">
                    <i class="bi bi-wallet2"></i>
                    <strong>Administrasi</strong>
                    <small>Keuangan</small>
                </article>
                <article class="akuntansi-skill-card">
                    <i class="bi bi-calculator"></i>
                    <strong>Staf</strong>
                    <small>Akuntansi</small>
                </article>
                <article class="akuntansi-skill-card">
                    <i class="bi bi-graph-up-arrow"></i>
                    <strong>Keuangan</strong>
                </article>
                <article class="akuntansi-skill-card">
                    <i class="bi bi-briefcase"></i>
                    <strong>Manajemen</strong>
                </article>
            </div>
        </div>
    </section>

    <section class="akuntansi-partnership" id="partnership-section">
        <div class="akuntansi-partnership-shell">
            <div class="akuntansi-partnership-head">
                <h3>Partnership <span>Akuntansi</span></h3>
                <p>Kolaborasi Program Akuntansi SMK Metland dengan perusahaan properti, retail, manufaktur, dan hospitality untuk penguatan praktik pembukuan, perpajakan, serta administrasi keuangan.</p>
            </div>

            <div class="akuntansi-partnership-slider" aria-label="Slider partnership Akuntansi berjalan otomatis">
                <div class="akuntansi-partnership-track">
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/PT_Metland-removebg-preview-e1704943421395-150x150.png') }}" alt="Logo PT Metropolitan Land"><span>PT Metropolitan Land</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Grand_Metropolitan-removebg-preview-150x150.png') }}" alt="Logo Grand Metropolitan"><span>Grand Metropolitan</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Metropolitan_Mall_Cibubur-removebg-preview-150x150.png') }}" alt="Logo Metropolitan Mall Cibubur"><span>Metropolitan Mall Cibubur</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Indesso-removebg-preview-150x150.png') }}" alt="Logo Indesso"><span>Indesso</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Kaliana_Apartment-removebg-preview-150x150.png') }}" alt="Logo Kaliana Apartment"><span>Kaliana Apartment</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Metland-Hotels-Group-150x150.png') }}" alt="Logo Metland Hotels Group"><span>Metland Hotels Group</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/PT_Metland-removebg-preview-e1704943421395-150x150.png') }}" alt="Logo PT Metropolitan Land"><span>PT Metropolitan Land</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Grand_Metropolitan-removebg-preview-150x150.png') }}" alt="Logo Grand Metropolitan"><span>Grand Metropolitan</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Metropolitan_Mall_Cibubur-removebg-preview-150x150.png') }}" alt="Logo Metropolitan Mall Cibubur"><span>Metropolitan Mall Cibubur</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Indesso-removebg-preview-150x150.png') }}" alt="Logo Indesso"><span>Indesso</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Kaliana_Apartment-removebg-preview-150x150.png') }}" alt="Logo Kaliana Apartment"><span>Kaliana Apartment</span></article>
                    <article class="akuntansi-partner-card"><img src="{{ asset('img/partners/Metland-Hotels-Group-150x150.png') }}" alt="Logo Metland Hotels Group"><span>Metland Hotels Group</span></article>
                </div>
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

