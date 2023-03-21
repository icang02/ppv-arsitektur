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
                                        <th style="width: 25px">No</th>
                                        <th style="width: 100px">Aksi</th>
                                        <th>Judul</th>
                                        <th style="width: 200px">Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gallery as $glr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span><button class="btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#modalUpdate{{ $glr->id }}">
                                                        <i class="fas fa-edit"></i></button></span>
                                                <form class="d-inline"
                                                    action="{{ url('dashboard/gallery/delete/' . $glr->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <span><button onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                            type="submit" class="btn-sm btn-danger">
                                                            <i class="fas  fa-trash"></i></button></span>
                                                </form>
                                            </td>
                                            <td>{{ $glr->caption }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $glr->image) }}" alt="{{ $glr->caption }}"
                                                    style="width: 200px">
                                            </td>
                                        </tr>

                                        {{-- modal update data --}}
                                        <div class="modal fade" id="modalUpdate{{ $glr->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Gallery</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body justify-content-end">

                                                        <form action="{{ url("/dashboard/gallery/update/$glr->id") }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="container justify-content-center">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="caption">Judul</label>
                                                                            <input type="text"
                                                                                class="form-control @error('caption') is-invalid @enderror"
                                                                                value="{{ $glr->caption }}" id="caption"
                                                                                name="caption" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 d-none">
                                                                        <div class="form-group">
                                                                            <label for="kategory">Kategori</label>
                                                                            <select class="form-control" name="kategory"
                                                                                id="kategory" required>
                                                                                <option
                                                                                    @if ($glr->kategory == 'lanskap') selected @endif
                                                                                    value="lanskap">Lanskap</option>
                                                                                <option
                                                                                    @if ($glr->kategory == 'kegiatan') selected @endif
                                                                                    value="kegiatan">Kegiatan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="image">Gambar</label>
                                                                            <img @if ($glr->image != null) src="{{ asset("storage/$glr->image") }}" @endif
                                                                                alt="Image"
                                                                                class="img-preview img-thumbnail mb-3"
                                                                                style="display: block" width="300">

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
                                                        <button type="submit" class="btn btn-primary">Update</button>
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
                                        <h4 class="modal-title">Tambah Gallery</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body justify-content-end">

                                        <form action="{{ url('/dashboard/gallery/store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="container justify-content-center">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="caption">Judul</label>
                                                            <input type="text" placeholder="Masukkan Judul"
                                                                class="form-control @error('caption') is-invalid @enderror"
                                                                id="caption" name="caption" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 d-none">
                                                        <div class="form-group">
                                                            <label for="kategory">Kategori</label>
                                                            <select class="form-control" name="kategory" id="kategory"
                                                                required>
                                                                <option selected value="kegiatan">Kegiatan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="image">Gambar</label>
                                                            <img alt="Image" class="img-preview img-thumbnail mb-3"
                                                                style="display: none" width="300">

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
