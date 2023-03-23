@php
    $profil = App\Models\Menu::where('kategory', 'profil')->get();
    $akademik = App\Models\Menu::where('kategory', 'akademik')->get();
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
    <a href="index.html" class="navbar-brand ps-5 me-0">
        <h1 class="text-white m-0">Industro</h1>
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <style>
        .collapse .navbar-nav a {
            font-size: 0.85rem !important;
        }
    </style>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-1 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Profil</a>
                <div class="dropdown-menu bg-light m-0">
                    @foreach ($profil as $pf)
                        <a href="{{ url("/profil/$pf->slug") }}"
                            class="dropdown-item {{ request()->is("profil/$pf->slug") ? 'active' : '' }}">{{ $pf->title }}</a>
                    @endforeach
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('akademik*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Akademik</a>
                <div class="dropdown-menu bg-light m-0">
                    @foreach ($akademik as $akd)
                        <a href="{{ url("/akademik/$akd->slug") }}"
                            class="dropdown-item {{ request()->is("akademik/$akd->slug") ? 'active' : '' }}">{{ $akd->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>
