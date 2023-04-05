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
                                    <p>Pimpinan</p>
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
                        <a href="{{ url('/dashboard/akademik') }}"
                            class="nav-link {{ request()->is('dashboard/akademik') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                                Akademik
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ url('/dashboard/pengumuman') }}"
                        class="nav-link {{ request()->is('dashboard/pengumuman*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-megaphone-fill" viewBox="0 0 16 16">
                            <path
                                d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z" />
                        </svg>
                        <p style="opacity: 0;">i</p>
                        <p>
                            Pengumuman
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/aktivitas') }}"
                        class="nav-link {{ request()->is('dashboard/aktivitas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Aktivitas
                        </p>
                    </a>
                </li>

                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/fasilitas') }}"
                            class="nav-link {{ request()->is('dashboard/fasilitas*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Sarana Umum
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/civitas') }}"
                            class="nav-link {{ request()->is('dashboard/civitas*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Civitas
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ url('/dashboard/news') }}"
                        class="nav-link {{ request()->is('dashboard/news*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/artikel') }}"
                        class="nav-link {{ request()->is('dashboard/artikel*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Artikel
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
