
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Kepegawaian')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .logout-form {
            margin-top: 20px;
            padding: 0 16px;
        }

        .btn-logout {
            display: block;
            width: 100%;
            padding: 11px 16px;
            background-color: #b42318;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #8f1c13;
        }

        .logout-icon {
            display: inline-block;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
        }

        .user-info strong,
        .user-info span {
            display: block;
        }

        .user-info span {
            font-size: 12px;
            opacity: 0.75;
        }
    </style>
</head>
<body>
    <div class="app-layout">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-logo">SK</div>
                <div>
                    <h2>KEPEGAWAIAN</h2>
                    <span>Management System</span>
                </div>
            </div>

            <div class="menu-label">MENU UTAMA</div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="nav-icon">▦</span>
                    Dashboard
                </a>

                <a href="{{ route('employees.index') }}"
                   class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <span class="nav-icon">♙</span>
                    Data Pegawai
                </a>

                <a href="{{ route('departments.index') }}"
                   class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                    <span class="nav-icon">▤</span>
                    Data Departemen
                </a>
            </nav>

            <div class="sidebar-footer">
                <span class="status-dot"></span>
                Sistem Kepegawaian
                <small>Internal perusahaan</small>
            </div>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf

                <button type="submit" class="btn-logout">
                    <span class="logout-icon">⇥</span>
                    Logout
                </button>
            </form>
        </aside>

        <main class="main-area">
            <header class="topbar">
                <div>
                    <span class="topbar-caption">SISTEM INFORMASI</span>
                    <h3>Manajemen Kepegawaian</h3>
                </div>

                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
                    </div>

                    <div>
                        <strong>
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </strong>
                        <span>Pengelola Sistem</span>
                    </div>
                </div>
            </header>

            <section class="content-area">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </section>

            <footer class="page-footer">
                Sistem Informasi Kepegawaian
                <span>© {{ date('Y') }} · Internal perusahaan</span>
            </footer>
        </main>
    </div>
</body>
</html>
