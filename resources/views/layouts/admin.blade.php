<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - School Admin</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}?v=20260305">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 (free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #050912;
            --bg-soft: #0b1220;
            --panel: rgba(13, 21, 36, 0.88);
            --panel-strong: rgba(9, 16, 29, 0.96);
            --line: rgba(115, 213, 255, 0.2);
            --text: #e6f5ff;
            --muted: #99b2c7;
            --accent: #39d1ff;
            --accent-2: #00a8d1;
            --danger: #ff6a73;
            --warning: #ffc65a;
            --success: #39d39a;
            --shadow: 0 18px 45px rgba(0, 0, 0, 0.42);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            color: var(--text);
            min-height: 100vh;
            background:
                radial-gradient(circle at 12% 10%, rgba(57, 209, 255, 0.16), transparent 32%),
                radial-gradient(circle at 90% 18%, rgba(0, 168, 209, 0.14), transparent 35%),
                linear-gradient(160deg, #03070f 0%, #07101c 100%);
        }

        #wrapper {
            --sidebar-width: 280px;
            display: grid;
            grid-template-columns: var(--sidebar-width) 8px minmax(0, 1fr);
            min-height: 100vh;
        }

        #wrapper.compact-sidebar {
            --sidebar-width: 88px;
        }

        #wrapper.compact-sidebar .brand-sub,
        #wrapper.compact-sidebar .admin-nav-link span {
            display: none;
        }

        #wrapper.compact-sidebar .admin-nav-link {
            justify-content: center;
            padding: 10px;
        }

        .admin-sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(8, 15, 27, 0.98), rgba(7, 14, 24, 0.98));
            border-right: 1px solid var(--line);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            overflow: hidden;
            transition: width 0.2s ease;
            z-index: 20;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .sidebar-compact-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: 1px solid var(--line);
            background: rgba(57, 209, 255, 0.12);
            color: var(--text);
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .sidebar-compact-btn:hover {
            background: rgba(57, 209, 255, 0.2);
            border-color: rgba(57, 209, 255, 0.45);
        }

        .brand-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.05rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text);
        }

        .brand-sub {
            font-size: 0.75rem;
            letter-spacing: 0.06em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .sidebar-divider {
            border-color: var(--line);
            opacity: 1;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 12px;
            border: 1px solid transparent;
            color: var(--muted);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .admin-nav-link:hover {
            color: var(--text);
            background: rgba(57, 209, 255, 0.1);
            border-color: rgba(57, 209, 255, 0.22);
            transform: translateX(2px);
        }

        .admin-nav-link.active {
            color: #021018;
            background: linear-gradient(135deg, var(--accent), #89ebff);
            border-color: transparent;
            box-shadow: 0 10px 24px rgba(57, 209, 255, 0.28);
        }

        .sidebar-resizer {
            width: 8px;
            cursor: col-resize;
            background: transparent;
            position: relative;
            z-index: 21;
        }

        .sidebar-resizer::before {
            content: '';
            position: absolute;
            left: 3px;
            top: 0;
            width: 2px;
            height: 100%;
            background: rgba(57, 209, 255, 0.22);
            transition: background 0.2s ease;
        }

        .sidebar-resizer:hover::before {
            background: rgba(57, 209, 255, 0.55);
        }

        .admin-main {
            min-width: 0;
            position: relative;
            z-index: 1;
        }

        .admin-topbar {
            margin: 16px 16px 0 16px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: var(--panel);
            box-shadow: var(--shadow);
            backdrop-filter: blur(8px);
        }

        .topbar-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.82rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .topbar-user {
            color: var(--text) !important;
        }

        main {
            padding: 20px 16px 24px 16px !important;
        }

        .container,
        .container-fluid {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: var(--shadow);
            padding: 24px;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Orbitron', sans-serif;
            color: var(--text);
            letter-spacing: 0.02em;
        }

        .text-muted {
            color: var(--muted) !important;
        }

        .card {
            background: var(--panel-strong);
            border: 1px solid var(--line);
            border-radius: 14px;
            color: var(--text);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            border-color: rgba(57, 209, 255, 0.34);
        }

        .table {
            color: var(--text);
            border-color: var(--line);
        }

        .table > :not(caption) > * > * {
            background: rgba(9, 16, 27, 0.86);
            border-color: var(--line);
            color: var(--text);
        }

        .form-control,
        .form-select,
        textarea {
            background: rgba(8, 14, 24, 0.92);
            border: 1px solid rgba(115, 213, 255, 0.24);
            color: var(--text);
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            background: rgba(8, 14, 24, 1);
            color: var(--text);
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(57, 209, 255, 0.2);
        }

        .form-control[type="file"] {
            padding: 0.35rem 0.5rem;
            color: var(--muted);
            cursor: pointer;
        }

        .form-control[type="file"]::file-selector-button {
            border: 0;
            margin: -0.35rem 0.85rem -0.35rem -0.5rem;
            padding: 0.55rem 0.95rem;
            border-right: 1px solid rgba(5, 14, 26, 0.6);
            border-radius: 10px 0 0 10px;
            background: linear-gradient(135deg, var(--accent-2), var(--accent));
            color: #011019;
            font-weight: 700;
            transition: filter 0.2s ease;
        }

        .form-control[type="file"]:hover::file-selector-button,
        .form-control[type="file"]:focus::file-selector-button {
            filter: brightness(1.08);
        }

        .form-label {
            color: var(--muted);
        }

        .btn {
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-2), var(--accent));
            border: none;
            color: #011019;
        }

        .btn-primary:hover {
            color: #011019;
            background: linear-gradient(135deg, #18bde8, #8cecff);
        }

        .btn-secondary {
            background: #223247;
            border-color: #223247;
        }

        .btn-warning {
            background: var(--warning);
            border-color: var(--warning);
            color: #1a1200;
        }

        .btn-danger {
            background: var(--danger);
            border-color: var(--danger);
        }

        .btn-success {
            background: var(--success);
            border-color: var(--success);
            color: #01160d;
        }

        .alert {
            border-radius: 12px;
        }

        .alert-success {
            color: #98f2cf;
            background: rgba(57, 211, 154, 0.16);
            border: 1px solid rgba(57, 211, 154, 0.3);
        }

        .dropdown-menu {
            background: rgba(10, 17, 29, 0.97);
            border: 1px solid var(--line);
            border-radius: 12px;
        }

        .dropdown-item {
            color: var(--text);
        }

        .dropdown-item:hover {
            background: rgba(57, 209, 255, 0.12);
            color: var(--text);
        }

        .dropdown-divider {
            border-color: var(--line);
        }

        body.is-resizing,
        body.is-resizing * {
            user-select: none !important;
            cursor: col-resize !important;
        }

        @media (max-width: 991px) {
            #wrapper {
                display: block;
            }

            .admin-sidebar {
                width: 100%;
                min-height: auto;
                position: static;
            }

            #wrapper.compact-sidebar .brand-sub,
            #wrapper.compact-sidebar .admin-nav-link span {
                display: inline;
            }

            #wrapper.compact-sidebar .admin-nav-link {
                justify-content: flex-start;
                padding: 10px 12px;
            }

            .admin-topbar {
                margin-top: 10px;
            }

            .sidebar-resizer {
                display: none;
            }
        }
    </style>

    @stack('styles') <!-- For page-specific CSS -->
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="p-3">
                <div class="sidebar-header mb-1">
                    <div>
                        <div class="brand-title">Metschoo Admin</div>
                        <div class="brand-sub">Center of Data SMK Metland</div>
                    </div>
                    <button class="sidebar-compact-btn" id="toggleSidebarBtn" type="button" title="Compact sidebar">
                        <i class="fas fa-angles-left"></i>
                    </button>
                </div>
                <hr class="sidebar-divider">
                <nav class="nav flex-column">
                    <a class="admin-nav-link {{ request()->routeIs('admin.panel') ? 'active' : '' }}" href="{{ route('admin.panel') }}">
                        <i class="fas fa-table-cells-large"></i><span>Admin Panel</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.student.*') ? 'active' : '' }}" href="{{ route('admin.student.index') }}">
                        <i class="fas fa-user-graduate"></i><span>Students</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.pending-students.*') ? 'active' : '' }}" href="{{ route('admin.pending-students.index') }}">
                        <i class="fas fa-user-clock"></i><span>Pending Students</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}" href="{{ route('admin.alumni.index') }}">
                        <i class="fas fa-users"></i><span>Alumni</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.majors.*') ? 'active' : '' }}" href="{{ route('admin.majors.index') }}">
                        <i class="fas fa-layer-group"></i><span>Jurusan</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.ekskuls.*') ? 'active' : '' }}" href="{{ route('admin.ekskuls.index') }}">
                        <i class="fas fa-futbol"></i><span>Ekskul</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.vision-mission.*') ? 'active' : '' }}" href="{{ route('admin.vision-mission.index') }}">
                        <i class="fas fa-bullseye"></i><span>Visi Misi</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.school-profile.*') ? 'active' : '' }}" href="{{ route('admin.school-profile.index') }}">
                        <i class="fas fa-school"></i><span>Profil Sekolah</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.organizations.*') ? 'active' : '' }}" href="{{ route('admin.organizations.index') }}">
                        <i class="fas fa-building"></i><span>Organizations</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.student-works.*') ? 'active' : '' }}" href="{{ route('admin.student-works.index') }}">
                        <i class="fas fa-images"></i><span>Karya Siswa</span>
                    </a>
                    <a class="admin-nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
                        <i class="fas fa-newspaper"></i><span>News</span>
                    </a>
                </nav>
            </div>
        </aside>
        <div class="sidebar-resizer" id="sidebarResizer" title="Drag to resize sidebar"></div>

        <!-- Page Content -->
        <div class="flex-grow-1 admin-main">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand admin-topbar">
                <div class="container-fluid">
                    <span class="topbar-title"> </span>
                    <button class="btn btn-outline-secondary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle topbar-user" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name ?? 'Admin' }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-cog me-2"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            const wrapper = document.getElementById('wrapper');
            const toggleBtn = document.getElementById('toggleSidebarBtn');
            const resizer = document.getElementById('sidebarResizer');
            const compactKey = 'admin_sidebar_compact';
            const widthKey = 'admin_sidebar_width';
            const minWidth = 220;
            const maxWidth = 420;
            const compactWidth = 88;

            if (!wrapper || !toggleBtn) {
                return;
            }

            const setCompactButtonIcon = (isCompact) => {
                toggleBtn.innerHTML = isCompact
                    ? '<i class="fas fa-angles-right"></i>'
                    : '<i class="fas fa-angles-left"></i>';
            };

            const applyCompactState = (isCompact) => {
                wrapper.classList.toggle('compact-sidebar', isCompact);
                setCompactButtonIcon(isCompact);
            };

            const applySidebarWidth = (rawWidth) => {
                const width = Math.max(minWidth, Math.min(maxWidth, rawWidth));
                wrapper.style.setProperty('--sidebar-width', width + 'px');
                localStorage.setItem(widthKey, String(width));
                return width;
            };

            const savedWidth = parseInt(localStorage.getItem(widthKey) || '', 10);
            if (!Number.isNaN(savedWidth)) {
                applySidebarWidth(savedWidth);
            }

            const isCompactSaved = localStorage.getItem(compactKey) === '1';
            applyCompactState(isCompactSaved);
            if (isCompactSaved) {
                wrapper.style.setProperty('--sidebar-width', compactWidth + 'px');
            }

            toggleBtn.addEventListener('click', () => {
                const toCompact = !wrapper.classList.contains('compact-sidebar');
                if (toCompact) {
                    wrapper.style.setProperty('--sidebar-width', compactWidth + 'px');
                } else {
                    const width = parseInt(localStorage.getItem(widthKey) || '', 10);
                    applySidebarWidth(Number.isNaN(width) ? 280 : width);
                }
                applyCompactState(toCompact);
                localStorage.setItem(compactKey, toCompact ? '1' : '0');
            });

            if (!resizer) {
                return;
            }

            resizer.addEventListener('mousedown', (event) => {
                if (window.innerWidth <= 991) {
                    return;
                }

                if (wrapper.classList.contains('compact-sidebar')) {
                    applyCompactState(false);
                    localStorage.setItem(compactKey, '0');
                    const width = parseInt(localStorage.getItem(widthKey) || '', 10);
                    applySidebarWidth(Number.isNaN(width) ? 280 : width);
                }

                const startX = event.clientX;
                const startWidth = parseFloat(getComputedStyle(wrapper).getPropertyValue('--sidebar-width')) || 280;
                document.body.classList.add('is-resizing');

                const onMouseMove = (moveEvent) => {
                    const nextWidth = startWidth + (moveEvent.clientX - startX);
                    const clamped = Math.max(minWidth, Math.min(maxWidth, nextWidth));
                    wrapper.style.setProperty('--sidebar-width', clamped + 'px');
                };

                const onMouseUp = () => {
                    const currentWidth = parseFloat(getComputedStyle(wrapper).getPropertyValue('--sidebar-width')) || 280;
                    applySidebarWidth(currentWidth);
                    document.body.classList.remove('is-resizing');
                    window.removeEventListener('mousemove', onMouseMove);
                    window.removeEventListener('mouseup', onMouseUp);
                };

                window.addEventListener('mousemove', onMouseMove);
                window.addEventListener('mouseup', onMouseUp);
            });
        })();
    </script>

    @stack('scripts') <!-- For page-specific scripts -->
</body>
</html>
