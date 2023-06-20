@extends('layouts.home')

@section('main-contents')
    <style>
        body {
            background-color: #EFEFEF
        }
    </style>
    <!-- Page Header Start -->
    @php
        $image = 'home-assets/img/bg-page.jpg';
    @endphp

    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(24, 29, 56, .4), rgba(24, 29, 56, .4)), url({{ asset($image) }}); background-size: cover; background-position: bottom;"
        data-wow-delay="0.1s">
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
            <p class="fw-medium text-uppercase text-primary mb-2">Alumni</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">Form Registrasi Alumni</h1>
        </div>
        <div class="row gy-5 gx-4 justify-content-center">
            <div class="col-lg-11">
                <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">

                    <div class="row justify-content-center ">

                        @if (session('success'))
                            <div class="mb-5">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        <form action="{{ url('/biodata-alumni') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama Lengkap dan Gelar</label>
                                <input class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                    id="nama" type="text" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select form-select-sm @error('jenis_kelamin') is-invalid @enderror"
                                    id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki Laki" {{ old('jenis_kelamin') == 'Laki Laki' ? 'selected' : '' }}>
                                        Laki Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        <input
                                            class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir" type="text" name="tempat_lahir"
                                            value="{{ old('tempat_lahir') }}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                        <input
                                            class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" type="date" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir') }}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input class="form-control form-control-sm @error('alamat') is-invalid @enderror"
                                    id="alamat" type="text" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    id="email" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="hp">Nomor Handphone</label>
                                <input class="form-control form-control-sm @error('hp') is-invalid @enderror" id="hp"
                                    type="telp" name="hp" value="{{ old('hp') }}">
                                @error('hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                                        <input
                                            class="form-control form-control-sm @error('tanggal_masuk') is-invalid @enderror"
                                            id="tanggal_masuk" type="date" name="tanggal_masuk"
                                            value="{{ old('tanggal_masuk') }}">
                                        @error('tanggal_masuk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="bulan_tahun_lulus">Bulan Dan Tahun Lulus</label>
                                        <input
                                            class="form-control form-control-sm @error('bulan_tahun_lulus') is-invalid @enderror"
                                            id="bulan_tahun_lulus" type="month" name="bulan_tahun_lulus"
                                            value="{{ old('bulan_tahun_lulus') }}">
                                        @error('bulan_tahun_lulus')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="judul">Apakah Saat Ini Anda Sudah Bekerja ?</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('status_kerja') is-invalid @enderror"
                                        id="kerja" type="radio" name="status_kerja" value="Ya, Sudah"
                                        {{ old('status_kerja') == 'Ya, Sudah' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kerja">Ya, Sudah</label>
                                    <br>

                                    <input class="form-check-input @error('status_kerja') is-invalid @enderror"
                                        id="belum_kerja" type="radio" name="status_kerja" value="Belum, Tidak Bekerja"
                                        {{ old('status_kerja') == 'Belum, Tidak Bekerja' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="belum_kerja">Belum, Tidak Bekerja</label>
                                    <br>
                                    @error('status_kerja')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="judul">Status Berkerja Saat Ini ?</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('is_pns') is-invalid @enderror" id="pns"
                                        type="radio" name="is_pns" value="PNS"
                                        {{ old('is_pns') == 'PNS' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pns">PNS</label>
                                    <br>
                                    <input class="form-check-input @error('is_pns') is-invalid @enderror" id="non-pns"
                                        type="radio" name="is_pns" value="Non PNS"
                                        {{ old('is_pns') == 'Non PNS' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="non-pns">Non PNS</label>
                                    <br>
                                    @error('is_pns')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="judul">Apakah pekerjaan Anda saat ini sesuai dengan
                                    latar belakang
                                    pendidikan Anda di PPV-Arsitektur</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('kesesuaian_pekerjaan') is-invalid @enderror"
                                        id="sesuai" type="radio" name="kesesuaian_pekerjaan" value="Ya, Sesuai"
                                        {{ old('kesesuaian_pekerjaan') == 'Ya, Sesuai' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sesuai">Ya, Sesuai</label>
                                    <br>

                                    <input class="form-check-input @error('kesesuaian_pekerjaan') is-invalid @enderror"
                                        id="tidak-sesuai" type="radio" name="kesesuaian_pekerjaan"
                                        value="Tidak, tidak sesuai"
                                        {{ old('kesesuaian_pekerjaan') == 'Tidak, tidak sesuai' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tidak-sesuai">Tidak, tidak sesuai</label>
                                    <br>
                                    @error('kesesuaian_pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="lama_menganggur"> Berapa lama Anda menunggu sejak lulus
                                    dari PPV-Arsitektur hingga
                                    mendapat pekerjaan pertama Anda?</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                        id="lama_menganggur1" type="radio" name="lama_menganggur"
                                        value="Kurang dari 6 bulan"
                                        {{ old('lama_menganggur') == 'Kurang dari 6 bulan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lama_menganggur1">Kurang dari 6 bulan</label>
                                    <br>

                                    <input class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                        id="lama_menganggur2" type="radio" name="lama_menganggur"
                                        value="Antara 6 bulan sampai 1 tahun"
                                        {{ old('lama_menganggur') == 'Antara 6 bulan sampai 1 tahun' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lama_menganggur2">Antara 6 bulan sampai 1
                                        tahun</label>
                                    <br>

                                    <input class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                        id="lama_menganggur3" type="radio" name="lama_menganggur"
                                        value="Antara 1 tahun sampai 3 tahun"
                                        {{ old('lama_menganggur') == 'Antara 1 tahun sampai 3 tahun' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lama_menganggur3">Antara 1 tahun sampai 3
                                        tahun</label>
                                    <br>

                                    <input class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                        id="lama_menganggur4" type="radio" name="lama_menganggur"
                                        value="Lebih dari 3 tahun"
                                        {{ old('lama_menganggur') == 'Lebih dari 3 tahun' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lama_menganggur4">Lebih dari 3 tahun</label>
                                    <br>
                                    @error('lama_menganggur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="saran">Saran/masukan Anda untuk pengembangan dan
                                    penguatan alumni
                                    PPV-Arsitektur </label>
                                <div>
                                    <textarea name="saran" class="form-control" placeholder="Silahkan beri saran/masukan Anda" id="floatingTextarea2"
                                        style="height: 100px"></textarea>
                                    <label for="floatingTextarea2"></label>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success text-light">Simpan</button>
                                <button type="reset" class="btn btn-danger text-light">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
