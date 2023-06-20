@extends('layouts.admin')
@section('main-contents')
    @push('link')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/fontawesome-free/css/all.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-assets') }}/dist/css/adminlte.min.css" />
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/summernote/summernote-bs4.min.css" />
        <!-- CodeMirror -->
        <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/codemirror/codemirror.css" />
        <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/codemirror/theme/monokai.css" />
        <!-- SimpleMDE -->
        <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/simplemde/simplemde.min.css" />
    @endpush
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {!! session('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('info'))
                        <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                            {!! session('info') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @error('nama')
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror

                    <form
                        @if (!isset($data)) action="{{ url('dashboard/alumni/form/store') }}" @else action="{{ url("dashboard/alumni/form/update/$data->id") }}" @endif
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ !isset($data) ? '' : $data->id }}">
                        @endif
                        <div class="card mt-2">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h5 class="card-title"><span class="font-weight-bold">
                                                @if (isset($data))
                                                    Update Data Alumni
                                                @else
                                                    Tambah Data Alumni
                                                @endif
                                            </span></h5>
                                    </div>
                                    <div class="col-md-6 col-12 d-md-flex justify-content-end">
                                        <h5 class="card-title">
                                            <a href="{{ url('dashboard/alumni') }}"
                                                class="btn btn-secondary btn-sm">Kembali</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap dan Gelar</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', !isset($data) ? '' : $data->nama) }}" id="nama"
                                                name="nama" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                                @if (!isset($data))
                                                    <option selected>Pilih Jenis Kelamin</option>
                                                @endif
                                                <option
                                                    @if (isset($data)) @if ($data->jenis_kelamin == 'Laki Laki') selected @endif
                                                    @endif value="Laki Laki">Laki Laki</option>
                                                <option
                                                    @if (isset($data)) @if ($data->jenis_kelamin == 'Perempuan') selected @endif
                                                    @endif value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                value="{{ old('tempat_lahir', !isset($data) ? '' : $data->tempat_lahir) }}"
                                                id="tempat_lahir" name="tempat_lahir" required>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                value="{{ old('tanggal_lahir', !isset($data) ? '' : $data->tanggal_lahir) }}"
                                                id="tanggal_lahir" name="tanggal_lahir" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                value="{{ old('alamat', !isset($data) ? '' : $data->alamat) }}"
                                                id="alamat" name="alamat" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Alamat Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', !isset($data) ? '' : $data->email) }}"
                                                id="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="hp">Nomor Handphone</label>
                                            <input type="telp" class="form-control @error('hp') is-invalid @enderror"
                                                value="{{ old('hp', !isset($data) ? '' : $data->hp) }}" id="hp"
                                                name="hp" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                                value="{{ old('tanggal_masuk', !isset($data) ? '' : $data->tanggal_masuk) }}"
                                                id="tanggal_masuk" name="tanggal_masuk" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bulan_tahun_lulus">Bulan dan Tahun Lulus</label>
                                            <input type="month"
                                                class="form-control @error('bulan_tahun_lulus') is-invalid @enderror"
                                                value="{{ old('bulan_tahun_lulus', !isset($data) ? '' : $data->bulan_tahun_lulus) }}"
                                                id="bulan_tahun_lulus" name="bulan_tahun_lulus" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="judul">Apakah Saat Ini Anda Sudah
                                                Bekerja?</label>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('status_kerja') is-invalid @enderror"
                                                    id="kerja" type="radio" name="status_kerja" value="Ya, Sudah"
                                                    {{ old('status_kerja', isset($data) && $data->status_kerja == 'Ya, Sudah' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="kerja">Ya, Sudah</label>
                                                <br>

                                                <input
                                                    class="form-check-input @error('status_kerja') is-invalid @enderror"
                                                    id="belum_kerja" type="radio" name="status_kerja"
                                                    value="Belum, Tidak Bekerja"
                                                    {{ old('status_kerja', isset($data) && $data->status_kerja == 'Belum, Tidak Bekerja' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="belum_kerja">Belum, Tidak
                                                    Bekerja</label>
                                                <br>
                                                @error('status_kerja')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="judul">Status Bekerja Saat Ini?</label>
                                            <div class="form-check">
                                                <input class="form-check-input @error('is_pns') is-invalid @enderror"
                                                    id="pns" type="radio" name="is_pns" value="PNS"
                                                    {{ isset($data) && $data->is_pns == 'PNS' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pns">PNS</label>
                                                <br>
                                                <input class="form-check-input @error('is_pns') is-invalid @enderror"
                                                    id="non-pns" type="radio" name="is_pns" value="Non PNS"
                                                    {{ isset($data) && $data->is_pns == 'Non PNS' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="non-pns">Non PNS</label>
                                                <br>
                                                @error('is_pns')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="judul">Apakah pekerjaan Anda saat ini sesuai
                                                dengan latar belakang
                                                pendidikan Anda di PPV-Arsitektur</label>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('kesesuaian_pekerjaan') is-invalid @enderror"
                                                    id="sesuai" type="radio" name="kesesuaian_pekerjaan"
                                                    value="Ya, Sesuai"
                                                    {{ old('kesesuaian_pekerjaan', isset($data) && $data->kesesuaian_pekerjaan == 'Ya, Sesuai' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="sesuai">Ya, Sesuai</label>
                                                <br>

                                                <input
                                                    class="form-check-input @error('kesesuaian_pekerjaan') is-invalid @enderror"
                                                    id="tidak-sesuai" type="radio" name="kesesuaian_pekerjaan"
                                                    value="Tidak, tidak sesuai"
                                                    {{ old('kesesuaian_pekerjaan', isset($data) && $data->kesesuaian_pekerjaan == 'Tidak, tidak sesuai' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="tidak-sesuai">Tidak, tidak
                                                    sesuai</label>
                                                <br>
                                                @error('kesesuaian_pekerjaan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="lama_menganggur"> Berapa lama Anda menunggu
                                                sejak lulus dari PPV-Arsitektur hingga
                                                mendapat pekerjaan pertama Anda?</label>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                                    id="lama_menganggur1" type="radio" name="lama_menganggur"
                                                    value="Kurang dari 6 bulan"
                                                    {{ old('lama_menganggur', isset($data) && $data->lama_menganggur == 'Kurang dari 6 bulan' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="lama_menganggur1">Kurang dari 6
                                                    bulan</label>
                                                <br>

                                                <input
                                                    class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                                    id="lama_menganggur2" type="radio" name="lama_menganggur"
                                                    value="Antara 6 bulan sampai 1 tahun"
                                                    {{ old('lama_menganggur', isset($data) && $data->lama_menganggur == 'Antara 6 bulan sampai 1 tahun' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="lama_menganggur2">Antara 6 bulan
                                                    sampai 1 tahun</label>
                                                <br>

                                                <input
                                                    class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                                    id="lama_menganggur3" type="radio" name="lama_menganggur"
                                                    value="Antara 1 tahun sampai 3 tahun"
                                                    {{ old('lama_menganggur', isset($data) && $data->lama_menganggur == 'Antara 1 tahun sampai 3 tahun' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="lama_menganggur3">Antara 1 tahun
                                                    sampai 3 tahun</label>
                                                <br>

                                                <input
                                                    class="form-check-input @error('lama_menganggur') is-invalid @enderror"
                                                    id="lama_menganggur4" type="radio" name="lama_menganggur"
                                                    value="Lebih dari 3 tahun"
                                                    {{ old('lama_menganggur', isset($data) && $data->lama_menganggur == 'Lebih dari 3 tahun' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="lama_menganggur4">Lebih dari 3
                                                    tahun</label>
                                                <br>
                                                @error('lama_menganggur')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="saran">Saran/masukan Anda untuk
                                                pengembangan dan
                                                penguatan alumni
                                                PPV-Arsitektur </label>
                                            <div>
                                                <textarea name="saran" class="form-control" placeholder="Silahkan beri saran/masukan Anda" id="floatingTextarea2"
                                                    style="height: 100px">{{ old('saran', !isset($data) ? '' : $data->saran) }}</textarea>
                                                <label for="floatingTextarea2"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                </div>
                </form>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    @push('script')
        <!-- jQuery -->
        <script src="{{ asset('admin-assets') }}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin-assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin-assets') }}/dist/js/adminlte.min.js"></script>
        <!-- Summernote -->
        <script src="{{ asset('admin-assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- CodeMirror -->
        <script src="{{ asset('admin-assets') }}/plugins/codemirror/codemirror.js"></script>
        <script src="{{ asset('admin-assets') }}/plugins/codemirror/mode/css/css.js"></script>
        <script src="{{ asset('admin-assets') }}/plugins/codemirror/mode/xml/xml.js"></script>
        <script src="{{ asset('admin-assets') }}/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <!-- Page specific script -->
        {{-- <script>
            $(function() {
                // Summernote
                $("#summernote").summernote();
                // $('#summernote').summernote({
                //     height: 200,
                //     toolbar: [
                //         ['style', ['bold', 'italic', 'underline', 'clear']],
                //         ['font', ['strikethrough', 'superscript', 'subscript']],
                //         // ['fontsize', ['fontsize']],
                //         ['color', ['color']],
                //         ['para', ['ul', 'ol', 'paragraph']],
                //         // ['height', ['height']]
                //     ]
                // })

            });
        </script> --}}
    @endpush
@endsection
