@extends('layouts.home')

@section('main-contents')
    <style>
        body {
            background-color: #EFEFEF
        }

        .dosen {
            transition: 0.3s;
        }

        .dosen:hover {
            filter: brightness(70%);
        }

        .kiri {
            width: 25%;
        }

        .kanan {
            width: 75%;
        }

        @media only screen and (max-width: 576px) {
            .kiri {
                display: none;
            }

            .kanan {
                width: 100%;
                font-size: 0.85rem;
            }
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

    <div class="container p-lg-5 p-3 bg-white shadow-lg" style="margin-top: -150px;">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Civitas</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">Dosen</h1>
        </div>

        <div class="row">
            @foreach ($dosen as $dsn)
                <div class="col-md-6 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item"
                        style="border-style: solid; border-top-color: rgba(2,36,91,.4); border-right-color: rgb(2,36,91,.4); border-left-color: rgba(255,94,20,.4); border-bottom-color: rgba(255,94,20,.4);">
                        <img src="{{ asset('home-assets/img/bg-dosen-foto.jpg') }}" alt="foto"
                            style="object-fit: cover; width: 100%; height: 280px;">
                        <div class="service-img">
                            <a style="cursor: pointer;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $dsn->id }}">

                                @if (is_null($dsn->foto))
                                    <img class="dosen" src="{{ asset('home-assets/img/foto-default.png') }}" alt="foto"
                                        style="object-fit: cover; width: 100%; height: 100%;">
                                @else
                                    <img class="dosen" src="{{ url("storage/$dsn->foto") }}" alt="foto"
                                        style="object-fit: cover; width: 100%; height: 100%;">
                                @endif
                            </a>
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0" style="font-size: 1.2rem;">{{ $dsn->nama }}</h3>
                                <p class="mb-0 mt-3 fw-normal" style="font-size: 0.90rem;">{{ $dsn->jabatan }}</p>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <div class="w-100">
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">
                                        NIP:</p>
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">{{ $dsn->nip }}</p>
                                    <hr class="bg-white">
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">Email:</p>
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">{{ $dsn->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Detail Dosen --}}
                <div class="modal fade" id="exampleModal{{ $dsn->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-lg modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data Dosen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex gap-5">
                                    <div class="kiri align-items-stretch">
                                        @if (is_null($dsn->foto))
                                            <img class="dosen" src="{{ asset('home-assets/img/foto-default.png') }}"
                                                alt="foto" style="object-fit: cover; width: 100%; height: 200px;">
                                        @else
                                            <img class="dosen" src="{{ asset("storage/$dsn->foto") }}" alt="foto"
                                                style="object-fit: cover; width: 100%; height: 200px;">
                                        @endif
                                    </div>
                                    <div class="kanan">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr class="fw-bold">
                                                        <td scope="row">Nama</td>
                                                        <td>:</td>
                                                        <td>{{ $dsn->nama }}</td>
                                                    </tr>
                                                    <tr class="fw-bold">
                                                        <td scope="row">NIDN</td>
                                                        <td>:</td>
                                                        <td>{{ $dsn->nidn }}</td>
                                                    </tr>
                                                    <tr class="fw-bold">
                                                        <td scope="row">NIP</td>
                                                        <td>:</td>
                                                        <td colspan="2">{{ $dsn->nip }}</td>
                                                    </tr>
                                                    <tr class="fw-bold">
                                                        <td scope="row">Pendidikan</td>
                                                        <td>:</td>
                                                        <td colspan="2">{{ $dsn->pendidikan }}</td>
                                                    </tr>
                                                    <tr class="fw-bold">
                                                        <td scope="row">Email</td>
                                                        <td>:</td>
                                                        <td colspan="2">{{ $dsn->email }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $dosen->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>

    </div>
@endsection
