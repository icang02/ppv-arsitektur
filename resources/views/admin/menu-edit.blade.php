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

                    <form action="{{ url("dashboard/$slug/$menu->id") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card mt-2">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h5 class="card-title"><span class="font-weight-bold">Menu
                                                {{ ucfirst($slug) }}</span></h5>
                                    </div>
                                    <div class="col-md-6 col-12 d-md-flex justify-content-end">
                                        <h5 class="card-title">
                                            <a href="{{ url("dashboard/$slug") }}"
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
                                            <label for="title">Judul</label>
                                            <input value="{{ old('title', $menu->title) }}" type="text"
                                                class="form-control" id="title" placeholder="Menu" name="title"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if (request()->is('dashboard/akademik/kalender-akademik'))
                                                <label for="image">File</label>
                                                <p>Masukan File Kalender Akademik Di Sini</p>
                                                <input id="image" onchange="previewImage()" accept="file/*"
                                                    type="file" class="form-control" id="image" placeholder="image"
                                                    name="image">
                                            @elseif(request()->is('dashboard/survei*'))
                                                <label for="image">Link Survei</label>
                                                <p>Isikan link g-form anda di sini (ex :
                                                    https://forms.gle/kMnKcm9H86nZA)</p>
                                                <input type="url" name="image" id="image" class="form-control"
                                                    value="{{ old('image', $menu->image) }}"
                                                    placeholder="Shortcut link google form">
                                            @else
                                                <label for="image">Gambar</label>
                                                <input id="image" onchange="previewImage()" accept="image/*"
                                                    type="file" class="form-control" id="image" placeholder="image"
                                                    name="image">
                                                @if ($menu->image != null)
                                                    <img src="{{ asset("storage/$menu->image") }}" alt="Gambar"
                                                        class="img-preview img-thumbnail mt-2" width="150">
                                                @else
                                                    <img alt="Gambar" class="img-preview img-thumbnail mt-2"
                                                        width="150" style="display: none;">
                                                @endif
                                            @endif
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
                                    </script>
                                @endpush

                                <div class="dropdown-divider"></div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>

                                            <label for="editor">Isi</label>
                                            <textarea id="editor" name="content">{{ old('content', $menu->content) }}</textarea>

                                            @error('content')
                                                <h6 class="text-danger">{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button class="btn btn-primary">Simpan Perubahan</button>
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
