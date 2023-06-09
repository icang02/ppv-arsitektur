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
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No</th>
                                        <th style="width: 50px">Aksi</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th style="width: 200px">Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visimisi as $vm)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span><button class="btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#modalUpdate{{ $vm->id }}">
                                                        <i class="fas fa-edit"></i></button></span>
                                            </td>
                                            <td>{{ $vm->title }}</td>
                                            <td>{!! $vm->content !!}</td>
                                            <td><img style="width: 100%" src="{{ asset("storage/$vm->image") }}"
                                                    alt=""></td>
                                        </tr>

                                        {{-- modal update data --}}
                                        <div class="modal fade" id="modalUpdate{{ $vm->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body justify-content-end">

                                                        <form action="{{ url("/dashboard/visi-misi/update/$vm->id") }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="container justify-content-center">
                                                                <div class="row">
                                                                    @if ($vm->id == 4)
                                                                        <div class="col-12">
                                                                            <div class="alert alert-warning  fade show"
                                                                                role="alert">
                                                                                <b>PERHATIAN</b>
                                                                                <br>Untuk memasukkan link video profil (link
                                                                                Youtube), cukup masukkan id videonya saja.
                                                                                <br><b>Contohnya :</b>
                                                                                <br>Link :
                                                                                https://youtu.be/55aFUefzsH4
                                                                                <br><b>Inputkan :</b>
                                                                                55aFUefzsH4
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="title">Judul</label>
                                                                            <input type="text"
                                                                                class="form-control @error('title') is-invalid @enderror"
                                                                                value="{{ $vm->title }}" id="title"
                                                                                name="title" required readonly>
                                                                        </div>
                                                                    </div>

                                                                    @if ($vm->id == 3)
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="image">Gambar</label>
                                                                                <img @if (isset($vm)) @if ($vm->image != null) src="{{ asset("storage/$vm->image") }}" @else src="" @endif
                                                                                    @endif
                                                                                alt="Image"
                                                                                class="img-preview img-thumbnail mb-3"
                                                                                @if (!isset($vm)) style="display: none" @else style="display: block" @endif
                                                                                width="300">
                                                                                <input type="file"
                                                                                    onchange="previewImage()"
                                                                                    class="form-control @error('image') is-invalid @enderror"
                                                                                    value="{{ $vm->image }}"
                                                                                    id="image" name="image">
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
                                                                    @endif
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        @if ($vm->id == 4)
                                                                            <div class="col-12">
                                                                                <label for="content">Link</label>
                                                                                <input type="text" name="content"
                                                                                    class="form-control" id="content"
                                                                                    value="{{ $vm->content }}">
                                                                            </div>
                                                                        @else
                                                                            <label
                                                                                for="summernote{{ $vm->id }}">Isi</label>
                                                                            <textarea class="@error('content') is-invalid @enderror" name="content" id="editor{{ $vm->id }}" required>{{ $vm->content }}</textarea>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        {{-- end modal update data --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <script>
            $(function() {
                bsCustomFileInput.init();
            });
        </script>
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
        <script>
            $(function() {
                // Summernote
                // $("#summernote").summernote();
                $('#summernote1').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        // ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        // ['height', ['height']]
                    ]
                })
                $('#summernote2').summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        // ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        // ['height', ['height']]
                    ]
                })

            });
        </script>
    @endpush
@endsection
