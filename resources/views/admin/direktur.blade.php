@extends('layouts.admin')
@section('main-contents')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        PERHATIAN : Semua foto pimpinan direktur harus dalam rasio yang sama agar rapi di tampilan halaman
                        depan
                    </div>
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No</th>
                                        <th style="width: 50px">Aksi</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($direktur as $drt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span><button class="btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#modalUpdate{{ $drt->id }}">
                                                        <i class="fas fa-edit"></i></button></span>
                                            </td>
                                            <td>{{ $drt->name }}</td>
                                            <td>{{ $drt->position }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $drt->image) }}" alt="{{ $drt->position }}"
                                                    style="width: 100px">
                                            </td>
                                        </tr>

                                        {{-- modal update data --}}
                                        <div class="modal fade" id="modalUpdate{{ $drt->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body justify-content-end">

                                                        <form action="{{ url("/dashboard/direktur/update/$drt->id") }}"
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
                                                                                value="{{ $drt->name }}" id="name"
                                                                                name="name" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="position">Jabatan</label>
                                                                            <input type="text"
                                                                                class="form-control @error('position') is-invalid @enderror"
                                                                                value="{{ $drt->position }}" id="position"
                                                                                name="position" required readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="image">Foto</label>
                                                                            <img @if (isset($drt)) @if ($drt->image != null) src="{{ asset("storage/$drt->image") }}" @endif
                                                                                @endif
                                                                            alt="Image"
                                                                            class="img-preview img-thumbnail mb-3"
                                                                            @if (!isset($drt)) style="display: none" @else style="display: block" @endif
                                                                            width="300">

                                                                            <input id="image" onchange="previewImage()"
                                                                                accept="image/*" type="file"
                                                                                class="form-control @error('image') is-invalid @enderror"
                                                                                id="image" name="image">
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
