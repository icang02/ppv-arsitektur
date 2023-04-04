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

    <div class="container p-5 bg-white shadow-lg">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Fasilitas</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">{{ $fasilitas->nama }}</h1>
        </div>
        <div class="row gy-5 gx-4 justify-content-center">
            <div class="col-lg-11">
                <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">
                    @if ($fasilitas->is_lab == 1)
                        <div class="row justify-content-center mb-5">
                            <div class="col col-md-9">
                                <table class="table">
                                    <tr>
                                        <td>Nama Fasilitas</td>
                                        <td>:</td>
                                        <td>{{ $fasilitas->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kepala Laboratorium</td>
                                        <td>:</td>
                                        <td>{{ $fasilitas->kepala }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIP</td>
                                        <td>:</td>
                                        <td>{{ $fasilitas->nip }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col col-md-3">
                                <img src="{{ asset("storage/$fasilitas->foto") }}" alt="Kepala Lab" class="card-img-top"
                                    width="100%" id="gambar">
                            </div>
                        </div>
                    @endif
                    {{-- KALAU BUKAN LAB LANGSUNG FOTO2 SAJA --}}
                    <hr style="height: 2px">
                    <div class="row">
                        @foreach ($foto as $ft)
                            <div class="col col-md-4 p-2" id="bg-image">
                                <img src="{{ asset("storage/$ft->foto") }}" width="100%" alt="foto" id="gambar"
                                    class="shadows">
                            </div>

                            <style>
                                #gambar {
                                    border-radius: 4px;
                                    border-top: 4px solid rgb(0, 74, 173, 0.85);
                                    border-right: 4px solid rgb(0, 74, 173, 0.85);
                                    border-bottom: 4px solid rgb(255, 172, 39, 0.85);
                                    border-left: 4px solid rgb(255, 172, 39, 0.85);
                                    border-style: double;
                                }
                            </style>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
