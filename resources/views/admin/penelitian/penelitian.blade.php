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
                            <a href="{{ url('dashboard/penelitian/create') }}" class="btn btn-primary mb-2"><i
                                    class="fas fa-plus"></i> Tambah Data</a>
                            <table id="example1" class="table-sm table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 100px">Aksi</th>
                                        <th>Judul Penelitian</th>
                                        <th>Nama Dosen</th>
                                        <th>Tahun</th>
                                        <th>Kategori</th>
                                        <th>Link Penelitian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $penelitian)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span>
                                                    <button
                                                        onclick="window.location.href='/dashboard/penelitian/{{ $penelitian->id }}'"
                                                        class="btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </span>
                                                <form class="d-inline"
                                                    action="{{ url('dashboard/penelitian/destroy/' . $penelitian->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <span>
                                                        <button onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                            type="submit" class="btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i></button>
                                                    </span>
                                                </form>
                                            </td>
                                            <td>{{ $penelitian->judul }}</td>
                                            <td>{{ $penelitian->nama_dosen }}</td>
                                            <td>{{ $penelitian->tahun }}</td>
                                            <td>{{ str()->title($penelitian->kategori) }}</td>
                                            <td>
                                                <a href="{{ $penelitian->link }}" target="_blank">Lihat</a>
                                            </td>
                                        </tr>
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
@endsection
