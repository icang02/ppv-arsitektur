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
                            @if (request()->is('dashboard/prestasi'))
                                <a href="{{ url('/dashboard/prestasi/form') }}"><button class="btn btn-primary mb-2"><i
                                            class="fas fa-plus"></i>
                                        Tambah Artikel</button></a>
                            @else
                                <a href="{{ url('/dashboard/news/form') }}"><button class="btn btn-primary mb-2"><i
                                            class="fas fa-plus"></i>
                                        Tambah Artikel</button></a>
                            @endif

                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example1" class="table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Date</th>
                                                @if (!request()->is('dashboard/prestasi'))
                                                    <th>Kategori</th>
                                                @endif
                                                <th>Title</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($artikel as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @php
                                                            if (request()->is('dashboard/prestasi*')) {
                                                                $text = 'prestasi';
                                                            } else {
                                                                $text = 'news';
                                                            }
                                                        @endphp
                                                        <span>
                                                            <a href="{{ url("dashboard/$text/form/$item->id") }}">
                                                                <button class="btn-sm btn-warning">
                                                                    <i class="fas fa-edit"></i>
                                                                </button></a>
                                                        </span>
                                                        <form class="d-inline"
                                                            action="{{ url("dashboard/$text/form/delete/$item->id") }}"
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
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->date)->format('d F Y') }}
                                                    </td>
                                                    @if (!request()->is('dashboard/prestasi'))
                                                        <td>{{ $item->kategory }}</td>
                                                    @endif
                                                    <td>{{ $item->title }}</td>
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
