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
                            <a href="{{ url('/dashboard/civitas/create') }}"><button class="btn btn-primary mb-2"><i
                                        class="fas fa-plus"></i>
                                    Tambah Data</button></a>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example1" class="table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>NIDN</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dosen as $dsn)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span>
                                                            <a href="{{ url("dashboard/civitas/$dsn->id") }}">
                                                                <button class="btn-sm btn-warning">
                                                                    <i class="fas fa-edit"></i>
                                                                </button></a>
                                                        </span>
                                                        <form class="d-inline"
                                                            action="{{ url("dashboard/civitas/destroy/$dsn->id") }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <span>
                                                                <button
                                                                    onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                                    type="submit" class="btn-sm btn-danger">
                                                                    <i class="fas  fa-trash"></i></button>
                                                            </span>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset("storage/$dsn->foto") }}" alt="foto.jpg  "
                                                            class="img-thumnail" width="100">
                                                    </td>
                                                    <td>{{ $dsn->nama }}</td>
                                                    <td>{{ $dsn->nip }}</td>
                                                    <td>{{ $dsn->nidn }}</td>
                                                    <td>{{ $dsn->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
