<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('kaiadmin/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20"/>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                
                {{-- Menu untuk Admin --}}
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                        <h4 class="text-section">Menu Utama</h4>
                    </li>
                    <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fas fa-users-cog"></i>
                            <p>Manajemen User</p>
                        </a>
                    </li>
                @endif

                {{-- Menu untuk Committee --}}
                @if(Auth::user()->role == 'committee')
                    <li class="nav-item {{ request()->routeIs('committee.events.*') ? 'active' : '' }}">
                        <a href="{{ route('committee.events.index') }}">
                            <i class="fas fa-calendar-alt"></i>
                            <p>Manajemen Event</p>
                        </a>
                    </li>
                @endif

                {{-- ====================================================== --}}
                {{-- === PERUBAHAN: MENU UNTUK FINANCE MENJADI DROPDOWN === --}}
                {{-- ====================================================== --}}
                @if(Auth::user()->role == 'finance')
                    <li class="nav-item {{ request()->routeIs('finance.payments.*') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#financeMenu">
                            <i class="fas fa-money-check-alt"></i>
                            <p>Pembayaran</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('finance.payments.*') ? 'show' : '' }}" id="financeMenu">
                            <ul class="nav nav-collapse">
                                <li class="{{ request()->routeIs('finance.payments.pending') ? 'active' : '' }}">
                                    <a href="{{ route('finance.payments.pending') }}">
                                        <span class="sub-item">Verifikasi Tertunda</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('finance.payments.verified') ? 'active' : '' }}">
                                    <a href="{{ route('finance.payments.verified') }}">
                                        <span class="sub-item">Riwayat Terverifikasi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                {{-- ====================================================== --}}

            </ul>
        </div>
    </div>
</div>