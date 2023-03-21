<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('home-assets/img/vokasi-logo.png') }}" alt="ppv uho" widht="50px" class="img-fluid">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 text-center">
            <div class="info">
                <a href="#" class="d-block">Program Pendidikan Vokasi</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ request()->is('dashboard/sliders*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Halaman Depan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/sliders') }}"
                                    class="nav-link {{ request()->is('dashboard/sliders') ? 'active' : '' }}">
                                    <i class="far fa-image nav-icon"></i>
                                    <p>Sliders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/direktur') }}"
                                    class="nav-link {{ request()->is('dashboard/direktur') ? 'active' : '' }}">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Direktur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/visi-misi') }}"
                                    class="nav-link {{ request()->is('dashboard/visi-misi') ? 'active' : '' }}">
                                    <i class="far fa-star nav-icon"></i>
                                    <p>Visi - Misi</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/profil') }}"
                            class="nav-link {{ request()->is('dashboard/profil') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profil
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/fasilitas') }}"
                            class="nav-link {{ request()->is('dashboard/fasilitas*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Fasilitas
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/akademik') }}"
                            class="nav-link {{ request()->is('dashboard/akademik') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                                Akademik
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/dokumen') }}"
                            class="nav-link {{ request()->is('dashboard/dokumen') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Dokumen
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ url('/dashboard/prestasi') }}"
                        class="nav-link {{ request()->is('dashboard/prestasi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Prestasi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/news') }}"
                        class="nav-link {{ request()->is('dashboard/news*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>

                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/survei') }}"
                            class="nav-link {{ request()->is('dashboard/survei*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Survei
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/gallery') }}"
                            class="nav-link {{ request()->is('dashboard/gallery*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/sponsor') }}"
                            class="nav-link {{ request()->is('dashboard/sponsor*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Mitra
                            </p>
                        </a>
                    </li>

                    <li class="nav-item pb-5">
                        <a href="{{ url('/dashboard/links') }}"
                            class="nav-link {{ request()->is('dashboard/link*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Link Terkait
                            </p>
                        </a>
                    </li>
                @endcan

                <hr />

                <li class="nav-item">
                    <a href="{{ url('/logout') }}"
                        class="nav-link {{ request()->is('dashboard/link*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
