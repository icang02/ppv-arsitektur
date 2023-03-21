@extends('layouts.admin')
@section('main-contents')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if (session('success'))
                        @include('admin.components.alert-success', ['message' => session('success')])
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAdd"><i
                                    class="fas fa-plus"></i> Tambah Data</button>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 100px">Aksi</th>
                                        <th>Gambar</th>
                                        <th>Nama Mitra</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sponsors as $sponsor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span>
                                                    <button class="btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#modalUpdate{{ $sponsor->id }}">
                                                        <i class="fas fa-edit"></i></button>
                                                </span>
                                                <form class="d-inline"
                                                    action="{{ url('dashboard/sponsor/delete/' . $sponsor->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <span>
                                                        <button onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                            type="submit" class="btn-sm btn-danger">
                                                            <i class="fas  fa-trash"></i></button>
                                                    </span>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="filtr-item col-sm-2" data-sort="white sample">
                                                    <a href="{{ asset("storage/$sponsor->image") }}" data-toggle="lightbox"
                                                        data-title="Sponsor">
                                                        <img src="{{ asset("storage/$sponsor->image") }}"
                                                            class="img-fluid mb-2" alt="white sample" />
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $sponsor->nama }}</td>
                                        </tr>

                                        {{-- modal update data --}}
                                        <div class="modal fade" id="modalUpdate{{ $sponsor->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Mitra</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body justify-content-end">

                                                        <form action="{{ url("/dashboard/sponsor/update/$sponsor->id") }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="container justify-content-center">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="nama">Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                id="nama" name="nama" required
                                                                                value="{{ old('nama', $sponsor->nama) }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="nama">Logo</label>
                                                                            @if ($sponsor->image != null)
                                                                                <img src="{{ asset("storage/$sponsor->image") }}"
                                                                                    alt="sponsor" width="200"
                                                                                    class="img-thumbnail d-block mb-3">
                                                                            @endif
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input" id="image"
                                                                                    name="image" accept="image/*">
                                                                                <label class="custom-file-label"
                                                                                    for="image">Choose
                                                                                    file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
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

                        {{-- modal add data --}}
                        <div class="modal fade" id="modalAdd">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Mitra</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body justify-content-end">

                                        <form action="{{ url('/dashboard/sponsor/store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="container justify-content-center">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="nama">Logo</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="image" name="image" required
                                                                    accept="image/*">
                                                                <label class="custom-file-label" for="image">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-end">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {{-- end modal add data --}}
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
@endsection
