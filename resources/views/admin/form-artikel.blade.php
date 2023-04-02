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
                        @if (request()->is('dashboard/prestasi*')) @if (!isset($data)) action="{{ url('dashboard/prestasi/form/store') }}" @else action="{{ url('dashboard/prestasi/form/update/' . $data->id) }}" @endif
                    @else
                        @if (!isset($data)) action="{{ url('dashboard/news/form/store') }}" @else action="{{ url("dashboard/news/form/update/$data->id") }}" @endif
                        @endif
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
                                                    Edit Artikel
                                                @else
                                                    Buat Artikel Baru
                                                @endif
                                            </span></h5>
                                    </div>
                                    <div class="col-md-6 col-12 d-md-flex justify-content-end">
                                        <h5 class="card-title">
                                            @if (request()->is('dashboard/prestasi*'))
                                                <a href="{{ url('dashboard/prestasi') }}"
                                                    class="btn btn-secondary btn-sm">Kembali</a>
                                            @else
                                                <a href="{{ url('dashboard/news') }}"
                                                    class="btn btn-secondary btn-sm">Kembali</a>
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title', !isset($data) ? '' : $data->title) }}"
                                                id="title" name="title" required>
                                        </div>
                                    </div>

                                    @if (request()->is('dashboard/news*'))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kategory">Kategori</label>
                                                <select class="form-control" name="kategory" id="kategory" required>
                                                    @if (!isset($data))
                                                        <option selected>Pilih Kategori</option>
                                                    @endif
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'berita') selected @endif
                                                        @endif value="berita">Berita</option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'pengumuman') selected @endif
                                                        @endif value="pengumuman">Pengumuman</option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'agenda') selected @endif
                                                        @endif value="agenda">Agenda</option>
                                                </select>
                                            </div>
                                        </div>
                                    @elseif (request()->is('dashboard/pengumuman*'))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kategory">Kategori</label>
                                                <select class="form-control" name="kategory" id="kategory" required>
                                                    @if (!isset($data))
                                                        <option selected>Pilih Kategori</option>
                                                    @endif
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'jadwal_ujian') selected @endif
                                                        @endif value="jadwal_ujian">Jadwal Ujian
                                                    </option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'seminar') selected @endif
                                                        @endif value="seminar">Seminar</option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'kuliah_umum') selected @endif
                                                        @endif value="kuliah_umum">Kuliah Umum</option>
                                                </select>
                                            </div>
                                        </div>
                                    @elseif (request()->is('dashboard/aktivitas*'))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kategory">Kategori</label>
                                                <select class="form-control" name="kategory" id="kategory" required>
                                                    @if (!isset($data))
                                                        <option selected>Pilih Kategori</option>
                                                    @endif
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'kegiatan_mahasiswa') selected @endif
                                                        @endif value="kegiatan_mahasiswa">Kegiatan
                                                        Mahasiswa
                                                    </option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'ekstrakulikuler') selected @endif
                                                        @endif value="ekstrakulikuler">Ekstrakulikuler
                                                    </option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'kegiatan_kampus') selected @endif
                                                        @endif value="kegiatan_kampus">Kegiatan Kampus
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    @elseif (request()->is('dashboard/artikel*'))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kategory">Kategori</label>
                                                <select class="form-control" name="kategory" id="kategory" required>
                                                    @if (!isset($data))
                                                        <option selected>Pilih Kategori</option>
                                                    @endif
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'jurnal') selected @endif
                                                        @endif value="jurnal">Jurnal
                                                    </option>
                                                    <option
                                                        @if (isset($data)) @if ($data->kategory == 'sda') selected @endif
                                                        @endif value="sda">SDA</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Tanggal Publikasi</label>
                                            <input type="date"
                                                class="form-control @error('date') is-invalid @enderror"
                                                value="{{ old('date', !isset($data) ? '' : $data->date) }}"
                                                id="date" name="date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Cover</label>
                                            <img @if (isset($data)) @if ($data->image != null) src="{{ asset("storage/$data->image") }}" @else src="https://imgcdn.oto.com/large/gallery/exterior/38/1900/toyota-rush-front-angle-low-view-490775.jpg" @endif
                                                @endif
                                            alt="Image" class="img-preview img-thumbnail mb-3"
                                            @if (!isset($data)) style="display: none" @else style="display: block" @endif
                                            width="300">

                                            <input id="image" onchange="previewImage()" accept="image/*"
                                                type="file" class="form-control @error('image') is-invalid @enderror"
                                                id="image" name="image">
                                        </div>
                                    </div>

                                    @if (request()->is('dashboard/prestasi*'))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="foto">Foto Kegiatan</label>
                                                @if (isset($data))
                                                    @if ($data->foto_prestasi->count() != 0)
                                                        {{-- {{ $data->foto_prestasi }} --}}
                                                        <br>
                                                        <a href="{{ url("dashboard/prestasi/foto/$data->id") }}"
                                                            class="btn btn-secondary">Lihat
                                                            Foto</a>
                                                    @else
                                                        <input id="foto" accept="foto/*" type="file"
                                                            class="form-control @error('foto') is-invalid @enderror"
                                                            id="foto" name="foto[]" multiple>
                                                    @endif
                                                @else
                                                    <input id="foto" accept="foto/*" type="file"
                                                        class="form-control @error('foto') is-invalid @enderror"
                                                        id="foto" name="foto[]" multiple>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @push('script')
                                    <script>
                                        function previewImage() {
                                            const image = document.querySelector('#image');
                                            const imgPreview = document.querySelector('.img-preview');

                                            imgPreview.style.display = 'block';

                                            const oFReader = new FileReader();
                                            oFReader.readAsDataURL(image.files[0]);

                                            oFReader.onload = function(oFREvent) {
                                                imgPreview.src = oFREvent.target.result;
                                            }
                                        }
                                    </script>
                                @endpush

                                <div class="dropdown-divider"></div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="summernote">Isi Artikel</label>
                                        <div>
                                            <textarea class="@error('content') is-invalid @enderror" name="content" id="editor">{{ old('content', !isset($data) ? '' : $data->content) }}</textarea>
                                            @error('content')
                                                <h6 class="text-danger">{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button class="btn btn-primary">Simpan</button>
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
