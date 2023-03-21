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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 100px">Aksi</th>
                                        <th>Nama</th>
                                        <th>Link URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($links as $link)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span><button class="btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#modalUpdate{{ $link->id }}">
                                                        <i class="fas fa-edit"></i></button></span>
                                            </td>
                                            <td>{{ $link->name }}</td>
                                            <td>{{ $link->url }}</td>
                                        </tr>

                                        {{-- modal update data --}}
                                        <div class="modal fade" id="modalUpdate{{ $link->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Link</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body justify-content-end">

                                                        <form action="{{ url("/dashboard/links/update/$link->id") }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="container justify-content-center">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Nama</label>
                                                                            <input type="text"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                value="{{ $link->name }}" id="name"
                                                                                name="name" required readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="url">Link URL</label>
                                                                            <input type="link"
                                                                                class="form-control @error('url') is-invalid @enderror"
                                                                                value="{{ $link->url }}" id="url"
                                                                                name="url" required>
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
@endsection
