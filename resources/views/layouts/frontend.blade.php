<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "Papilaya's University")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,.1); }
        .event-card { transition: transform .2s; }
        .event-card:hover { transform: scale(1.03); }
        /* Style untuk badge notifikasi */
        .navbar .nav-item .badge {
            font-size: 0.6em;
            padding: 0.3em 0.5em;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Papilaya's University</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">Events</a>
                    </li>
                    @auth
                        {{-- ====================================================== --}}
                        {{-- === PERUBAHAN: BLOK NOTIFIKASI BARU === --}}
                        {{-- ====================================================== --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                        <span class="visually-hidden">unread notifications</span>
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="width: 350px; max-height: 400px; overflow-y: auto;">
                                <li class="px-3 py-2 d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Notifikasi</h6>
                                    {{-- Anda bisa menambahkan link 'Mark all as read' di sini nanti --}}
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                @forelse (Auth::user()->notifications->take(5) as $notification)
                                    <li>
                                        <a class="dropdown-item py-2" href="{{ $notification->data['url'] ?? '#' }}" style="white-space: normal;">
                                            <div class="fw-bold {{ $notification->read_at ? 'text-muted' : '' }}">Sertifikat Tersedia!</div>
                                            <small class="{{ $notification->read_at ? 'text-muted' : '' }}">{{ $notification->data['message'] }}</small>
                                            <div class="text-muted" style="font-size: 0.75rem;">{{ $notification->created_at->diffForHumans() }}</div>
                                        </a>
                                    </li>
                                @empty
                                     <li><p class="dropdown-item text-muted text-center my-2">Tidak ada notifikasi.</p></li>
                                @endforelse
                            </ul>
                        </li>
                        {{-- ====================================================== --}}
                        {{-- === AKHIR BLOK NOTIFIKASI BARU === --}}
                        {{-- ====================================================== --}}

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('member.my_registrations') ? 'active' : '' }}" href="{{ route('member.my_registrations') }}">Registrasi Saya</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4 mt-auto bg-light">
        <div class="container">
            <p class="text-muted">&copy; {{ date('Y') }} Papilaya's University. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>