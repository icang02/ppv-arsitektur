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
                        {{-- <div class="card-header">
                            <h3 class="card-title">prfs</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAdd"><i
                                    class="fas fa-plus"></i>
                                Tambah Data</button>

                            <div class="row">
                                <div class="col-md-7 table-responsive">
                                    <table id="example1" class="table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Title</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dt)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span>
                                                            <a href="{{ url('dashboard/' . $slug . '/' . $dt->slug) }}">
                                                                <button class="btn-sm btn-warning">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </a>
                                                        </span>

                                                        <form class="d-inline"
                                                            action="{{ url('dashboard/' . $slug . '/delete/' . $dt->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <span><button
                                                                    onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                                    type="submit" class="btn-sm btn-danger">
                                                                    <i class="fas  fa-trash"></i></button></span>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        {{ $dt->title }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        {{-- modal add data --}}
                        <div class="modal fade" id="modalAdd">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Menu</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body justify-content-end">

                                        <form action="{{ url("/dashboard/$slug/store") }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="container justify-content-center">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="title" class="form-label">Masukan Judul</label>
                                                            <input type="text" class="form-control" name="title"
                                                                id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-end">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
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
