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
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="title">Judul</label>
                                                                            <input type="text"
                                                                                class="form-control @error('title') is-invalid @enderror"
                                                                                value="{{ $vm->title }}" id="title"
                                                                                name="title" required readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <label
                                                                                for="summernote{{ $vm->id }}">Isi</label>
                                                                            <textarea class="@error('content') is-invalid @enderror" name="content" id="editor{{ $vm->id }}" required>{{ $vm->content }}</textarea>
                                                                            {{-- @error('content')
                                                                                <h6 class="text-danger">{{ $message }}</h6>
                                                                            @enderror --}}
                                                                        </div>
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
