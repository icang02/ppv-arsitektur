@php
    $profil = App\Models\Menu::where('kategory', 'profil')->get();
    $akademik = App\Models\Menu::where('kategory', 'akademik')->get();
    $survei = App\Models\Menu::where('kategory', 'survei')->get();
    $sarana = App\Models\Fasilitas::all();
@endphp
<style>
    .collapse .navbar-nav a {
        font-size: 0.85rem !important;
    }

    .g-translate {
        width: 20%;
    }

    @media only screen and (max-width: 576px) {
        .nav-desktop {
            display: flex !important;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center !important;
        }

        .g-translate {
            width: 50%;
            margin: auto;
        }
    }
</style>

{{-- Translate --}}
<link rel="stylesheet" href="{{ asset('home-assets/css/navbar.css') }}">
<script type="text/javascript" src="{{ asset('home-assets/js/translate.js') }}"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: "id",
                includedLanguages: 'id,en',
            },
            "google_translate_element"
        );
    }

    window.addEventListener("load", (event) => {
        const select = document.querySelector(".goog-te-combo");
        select.classList.add("form-select");
    });
</script>

{{-- Nav Desktop --}}
<div
    class="nav-desktop bg-white w-100 px-5 py-3 border-bottom border-2 d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}">
        <img src="{{ url('https://arsitektur.ppv.uho.ac.id/img/logo-12.png') }}" alt="Logo" width="250">
    </a>
    {{-- Translate element --}}
    <div class="g-translate">
        <div id="google_translate_element"></div>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0">
    <button type="button" class="navbar-toggler my-3 mx-auto" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-1 p-lg-0">
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

            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('pengumuman*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Pengumuman</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('list-announcement', 'jadwal_ujian') }}"
                        class="dropdown-item {{ request()->is('pengumuman/jadwal_ujian*') ? 'active' : '' }}">Jadwal
                        Ujian</a>
                    <a href="{{ route('list-announcement', 'seminar') }}"
                        class="dropdown-item {{ request()->is('pengumuman/seminar*') ? 'active' : '' }}">Seminar</a>
                    <a href="{{ route('list-announcement', 'kuliah_umum') }}"
                        class="dropdown-item {{ request()->is('pengumuman/kuliah_umum*') ? 'active' : '' }}">Kuliah
                        Umum</a>
                </div>
            </div> --}}

            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('aktivitas*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Aktivitas</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('list-activity', 'kegiatan_mahasiswa') }}"
                        class="dropdown-item {{ request()->is('aktivitas/kegiatan_mahasiswa*') ? 'active' : '' }}">Kegiatan
                        Mahasiswa</a>
                    <a href="{{ route('list-activity', 'ekstrakulikuler') }}"
                        class="dropdown-item {{ request()->is('aktivitas/ekstrakulikuler*') ? 'active' : '' }}">Ekstrakulikuler</a>
                    <a href="{{ route('list-activity', 'kegiatan_kampus') }}"
                        class="dropdown-item {{ request()->is('aktivitas/kegiatan_kampus*') ? 'active' : '' }}">Kegiatan
                        Kampus</a>
                </div>
            </div> --}}

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('sarana_umum*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Sarana Umum</a>
                <div class="dropdown-menu bg-light m-0">
                    @foreach ($sarana as $srn)
                        <a href="{{ url("/sarana_umum/$srn->id") }}"
                            class="dropdown-item {{ request()->is("sarana_umum/$srn->id") ? 'active' : '' }}">{{ $srn->nama }}</a>
                    @endforeach
                </div>
            </div>

            <a href="{{ url('/civitas') }}"
                class="nav-item nav-link {{ request()->is('civitas*') ? 'active' : '' }}">Civitas</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('news*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Berita</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('list-news', 'berita') }}"
                        class="dropdown-item {{ request()->is('berita/berita*') ? 'active' : '' }}">Berita</a>
                    <a href="{{ route('list-news', 'pengumuman') }}"
                        class="dropdown-item {{ request()->is('berita/pengumuman*') ? 'active' : '' }}">Pengumuman</a>
                    <a href="{{ route('list-news', 'agenda') }}"
                        class="dropdown-item {{ request()->is('berita/agenda*') ? 'active' : '' }}">Agenda</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ request()->is('artikel*') || request()->is('penelitian') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Artikel</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ url('penelitian') }}"
                        class="dropdown-item {{ request()->is('penelitian') ? 'active' : '' }}">Jurnal</a>
                    <a href="{{ route('list-artikel', 'sda') }}"
                        class="dropdown-item {{ request()->is('artikel/sda*') ? 'active' : '' }}">SDA</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ request()->is('biodata-alumni*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Alumni</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ url('biodata-alumni') }}"
                        class="dropdown-item {{ request()->is('biodata-alumni*') ? 'active' : '' }}">Biodata Alumni</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('survei*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">E-Survei</a>
                <div class="dropdown-menu bg-light m-0">
                    @foreach ($survei as $pf)
                        <a href="{{ url("/survei/$pf->slug") }}"
                            class="dropdown-item {{ request()->is("survei/$pf->slug") ? 'active' : '' }}">{{ $pf->title }}</a>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</nav>
