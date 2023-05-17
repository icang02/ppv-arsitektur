@extends('layouts.admin')
@section('main-contents')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 100%;">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 style="font-weight: bold" class="card-title fw-bold">Nama Alumni</h6>
                                    <p class="card-text">{{ ucfirst($data->nama) }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <h6 style="font-weight: bold"class="card-title fw-bold">Tempat Lahir</h6>
                                    <p class="card-text">{{ str()->title($data->tempat_lahir) }}</p>
                                </div>
                                <div class="ms-5">
                                    <h6 style="font-weight: bold"class="card-title fw-bold">Tanggal Lahir</h6>
                                    <p class="card-text">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal_lahir)->format('d F Y') }}
                                    </p>
                                    </p>
                                </div>

                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold" class="card-title fw-bold">Jenis Kelamin</h6>
                                <p class="card-text">{{ str()->title($data->jenis_kelamin) }}</p>
                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold"class="card-title fw-bold">Alamat</h6>
                                <p class="card-text">{{ str()->title($data->alamat) }}</p>
                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold"class="card-title fw-bold">No Handphone</h6>
                                <p class="card-text">{{ $data->hp }}</p>
                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold"class="card-title fw-bold">Email</h6>
                                <p class="card-text">{{ $data->email }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="card-body d-flex">
                            <div class="mr-3">
                                <h6 style="font-weight: bold" class="card-title">Tahun Masuk</h6>
                                <p class="card-text">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal_masuk)->format('d F Y') }}
                                </p>
                            </div>
                            <div>
                                <h6 style="font-weight: bold"class="card-title fw-bold">Bulan dan Tahun Lulus</h6>
                                <p class="card-text">
                                    {{ date($data->bulan_tahun_lulus) }}</p>
                                </p>
                            </div>

                        </div>

                        <hr>

                        <div class="card-body">
                            <h6 style="font-weight: bold" class="card-title fw-bold">Isi Survei</h6>
                            <div class="mt-5">
                                <h6 style="font-weight: bold" class="card-title fw-bold">Apakah Saat Ini Anda Sudah Berkerja
                                    ?</h6>
                                <p class="card-text">{{ str()->title($data->status_kerja) }}</p>
                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold" class="card-title fw-bold">Status Bekerja Saat Ini ?</h6>
                                <p class="card-text">{{ $data->is_pns }}</p>
                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold" class="card-title fw-bold">Apakah pekerjaan Anda saat ini
                                    sesuai dengan latar belakang
                                    pendidikan Anda di FH-UHO?</h6>
                                <p class="card-text">{{ str()->title($data->kesesuaian_pekerjaan) }}</p>
                            </div>

                            <div class="mt-4">
                                <h6 style="font-weight: bold" class="card-title fw-bold">Berapa lama Anda menunggu sejak
                                    lulus dari FH-UHO hingga
                                    mendapat pekerjaan pertama Anda?</h6>
                                <p class="card-text">{{ $data->lama_menganggur }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="card-body">
                            <h6 style="font-weight: bold" class="card-title fw-bold">Saran</h6>
                            <p class="card-text">
                                {{ $data->saran ?? '-' }}
                            </p>
                        </div>

                        <div class="card-body">
                            <a href="{{ url('/dashboard/alumni') }}" class="btn btn-danger text-light">Kembali</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

















        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
