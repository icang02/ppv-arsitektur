@extends('layouts.home')

@section('main-contents')
    <style>
        body {
            background-color: #EFEFEF
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight" style="opacity: 0">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0" style="opacity: 0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .cont {
            padding: 0 8rem;
        }

        #container-berita {
            flex-wrap: nowrap;
        }

        #berita {
            width: 100%;
        }

        #gambar-berita {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 4px;
        }

        @media only screen and (max-width: 576px) {
            .cont {
                padding: 0 0.5rem;
            }
        }
    </style>

    <div class="cont">
        <div class="p-5 bg-white shadow-lg mb-3">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <p class="fw-medium text-uppercase text-primary mb-4">PPV Arsitektur</p>
                <hr style="background: #FF5E14; width: 15%; height: 4px; margin: auto; margin-bottom: 0.6rem;">
                <h1 style="font-size: 2rem;">Penelitian</h1>
                <hr style="background: #FF5E14; width: 15%; height: 4px; margin: auto; margin-top: 1rem;">
            </div>
        </div>

        <div class="d-flex gap-3 align-items-start" id="container-berita">
            {{-- Content berita --}}
            <div class="p-lg-5 px-4 py-5 bg-white shadow-lg" id="berita">
                <div class="table-responsive" style="font-size: 0.85rem;">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="fw-bold">
                                <th scope="col">No.</th>
                                <th scope="col">Judul Penelitian</th>
                                <th scope="col">Nama Dosen</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->nama_dosen }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>
                                        <a href="{{ $item->link }}">Unduh</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">Belum ada data penelitian.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
