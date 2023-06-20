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
                            <a href="{{ url('/dashboard/alumni/form') }}"><button class="btn btn-primary mb-2"><i
                                        class="fas fa-plus"></i>
                                    Tambah Data Alumni</button></a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 25px">No</th>
                                        <th style="width: 100px">Aksi</th>
                                        <th>Nama</th>
                                        <th style="width: 200px">Tahun Masuk</th>
                                        <th style="width: 200px">Bulan dan Tahun Lulus</th>
                                        <th style="width: 200px">Nomor Hp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumni as $alu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <button
                                                    onclick="window.location.href='/dashboard/alumni/view/{{ $alu->id }}'"
                                                    class="btn-sm btn-info">
                                                    <i class="fas fa-eye"></i></button>
                                                <button
                                                    onclick="window.location.href='/dashboard/alumni/form/{{ $alu->id }}'"
                                                    class="btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i></button>

                                                <form class="d-inline" action="{{ url("/dashboard/alumni/$alu->id") }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <span><button onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                            type="submit" class="btn-sm btn-danger">
                                                            <i class="fas  fa-trash"></i></button></span>
                                                </form>
                                            </td>
                                            <td>{{ $alu->nama }}</td>
                                            <td>{{ $alu->tanggal_masuk }}</td>
                                            <td>{{ $alu->bulan_tahun_lulus }}</td>
                                            <td>{{ $alu->hp }}</td>
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
