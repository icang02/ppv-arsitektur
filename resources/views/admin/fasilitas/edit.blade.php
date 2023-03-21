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

                    <form action="{{ url('dashboard/fasilitas/update/' . $fasilitas->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card mt-2">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h5 class="card-title"><span class="font-weight-bold">
                                                Tambah Fasilitas Baru
                                            </span></h5>
                                    </div>
                                    <div class="col-md-6 col-12 d-md-flex justify-content-end">
                                        <h5 class="card-title">
                                            <a href="{{ url('dashboard/fasilitas') }}"
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
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $fasilitas->nama) }}" id="nama" name="nama"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="foto_fasilitas">
                                        <div class="form-group">
                                            <label for="foto_fasilitas">Foto Fasilitas</label>
                                            <div class="form-group d-flex">
                                                <input type="file" name="foto_fasilitas[]"
                                                    class="form-control @error('foto_fasilitas') is-invalid @enderror"
                                                    multiple accept="images/*">
                                                <button type="button" class="btn btn-primary text-nowrap"
                                                    data-toggle="modal" data-target="#modalAdd">Lihat Foto</button>
                                            </div>
                                            {{-- <button type="button" class="btn btn-primary btn-sm d-block"
                                                data-toggle="modal" data-target="#modalAdd">Lihat Foto Fasilitas</button> --}}

                                            <div class="modal fade" id="modalAdd">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Foto Fasilitas</h4>

                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body justify-content-end">
                                                            <div class="container justify-content-center">
                                                                {{-- <div class="row">
                                                                    <div class="col-12">
                                                                        <form
                                                                            action="{{ url('/dashboard/fasilitas/foto/store') }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-group d-flex">
                                                                                <input type="file"
                                                                                    name="foto_fasilitas[]"
                                                                                    class="form-control @error('foto_fasilitas') is-invalid @enderror"
                                                                                    multiple required>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Upload</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                                <hr> --}}

                                                                <div class="row justify-content-center">
                                                                    @foreach ($fasilitas->foto_fasilitas as $item)
                                                                        <div class="col-lg-3 position-relative"
                                                                            style="border: 3px solid #fff; height: 115px; background-image: url({{ asset("storage/$item->foto") }}); background-size: cover; background-position: center;">

                                                                            {{-- <form
                                                                                action="{{ url('dashboard/fasilitas/foto/delete/' . $item->id) }}"
                                                                                method="post"class="d-inline">
                                                                                @csrf
                                                                                @method('delete') --}}
                                                                            <a href="{{ url('dashboard/fasilitas/foto/delete/' . $item->id . '/' . $fasilitas->id) }}"
                                                                                onclick="return confirm('Hapus foto?')"
                                                                                class="btn btn-sm badge btn-danger position-absolute"
                                                                                style="right: -2px; top: -2px;">x</a>
                                                                            {{-- </form> --}}
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jenis_fasilitas">Jenis Fasilitas</label>
                                            <select onchange="valueJenisFasilitas()" class="form-control"
                                                name="jenis_fasilitas" id="jenis_fasilitas" required>
                                                <option value="">Pilih ...</option>
                                                <option value="1" @if (old('jenis_fasilitas', $fasilitas->is_lab) == 1) selected @endif>
                                                    Laboratorium</option>
                                                <option value="0" @if (old('jenis_fasilitas', $fasilitas->is_lab) == 0) selected @endif>
                                                    Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="kepala"
                                        style="display: {{ $fasilitas->is_lab == 1 ? 'block' : 'none' }};">
                                        <div class="form-group">
                                            <label for="kepala">Kepala Laboratorium</label>
                                            <input type="text"
                                                class="form-control input-kepala @error('kepala') is-invalid @enderror"
                                                value="{{ old('kepala', $fasilitas->kepala) }}" name="kepala">
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="nip"
                                        style="display: {{ $fasilitas->is_lab == 1 ? 'block' : 'none' }};">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text"
                                                class="form-control input-nip @error('nip') is-invalid @enderror"
                                                value="{{ old('nip', $fasilitas->nip) }}" maxlength="18" name="nip">
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="foto_kepala"
                                        style="display: {{ $fasilitas->is_lab == 1 ? 'block' : 'none' }};">
                                        <div class="form-group">
                                            <label for="image">Foto Kepala Laboratorium</label>
                                            @if ($fasilitas->foto != null)
                                                <img alt="Image" src="{{ asset("storage/$fasilitas->foto") }}"
                                                    class="img-preview img-thumbnail mb-3" style="display: block"
                                                    width="150">
                                            @else
                                                <img alt="Image" class="img-preview img-thumbnail mb-3"
                                                    style="display: none" width="150">
                                            @endif

                                            <input id="image" onchange="previewImage()" accept="image/*"
                                                type="file"
                                                class="form-control input-foto-kepala @error('image') is-invalid @enderror"
                                                id="image" name="foto_kepala">
                                        </div>
                                    </div>

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

                                        // jenis fasilitas muncul
                                        // jenis fasilitas muncul
                                        function valueJenisFasilitas() {
                                            const jenisFasilitas = document.querySelector('#jenis_fasilitas');
                                            const kepala = document.querySelector('#kepala');
                                            const fotoKepala = document.querySelector('#foto_kepala');
                                            const nip = document.querySelector('#nip');

                                            const inputKepala = document.querySelector('.input-kepala');
                                            const inputFotoKepala = document.querySelector('.input-foto-kepala');
                                            const inputNip = document.querySelector('.input-nip');

                                            if (jenisFasilitas.value == 1) {

                                                kepala.style.display = 'block';
                                                fotoKepala.style.display = 'block';
                                                nip.style.display = 'block';

                                                inputKepala.setAttribute('name', 'kepala');
                                                inputKepala.setAttribute('required', '');

                                                inputFotoKepala.setAttribute('name', 'foto_kepala');

                                                inputNip.setAttribute('name', 'nip');
                                                inputNip.setAttribute('required', '');
                                            } else if (jenisFasilitas.value == 0) {

                                                fotoKepala.style.display = 'none';
                                                kepala.style.display = 'none';
                                                nip.style.display = 'none';

                                                inputKepala.removeAttribute('name', '');
                                                inputKepala.removeAttribute('required', '');

                                                inputFotoKepala.removeAttribute('name', '');
                                                inputFotoKepala.removeAttribute('required', '');

                                                inputNip.removeAttribute('name', '');
                                                inputNip.removeAttribute('required', '');
                                            }
                                        }
                                    </script>
                                @endpush

                                <div class="dropdown-divider"></div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
    @endpush
@endsection
