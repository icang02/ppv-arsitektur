<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link text-center">
        <img src="{{ asset('home-assets/img/logo-uho.png') }}" width="125" alt="ppv uho" widht="50px"
            class="img-fluid"> <br>
        Prodi D3 Arsitektur
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

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
                                <a href="{{ url('/dashboard/visi-misi') }}"
                                    class="nav-link {{ request()->is('dashboard/visi-misi') ? 'active' : '' }}">
                                    <i class="far fa-star nav-icon"></i>
                                    <p>Video Profil & Visi - Misi</p>
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
                            <i class="nav-icon fas fa-user"></i>
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

                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/penelitian') }}"
                            class="nav-link {{ request()->is('dashboard/penelitian*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Jurnal
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/alumni') }}"
                            class="nav-link {{ request()->is('dashboard/alumni*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Alumni
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/survei') }}"
                            class="nav-link {{ request()->is('dashboard/survei*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Penelitian & Pengabdian
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/download') }}"
                            class="nav-link {{ request()->is('dashboard/download*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Download
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
                @endcan
                <br><br><br><br><br><br>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
