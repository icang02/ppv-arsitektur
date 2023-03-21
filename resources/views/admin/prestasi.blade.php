@extends('layouts.admin')
@section('main-contents')
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('dashboard/prestasi/foto/store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            {{-- <label for="foto"></label> --}}
                            <input type="hidden" name="prestasiId" value="{{ $fotos->first()->prestasi->id }}">
                            <input multiple name="foto[]" type="file" class="form-control" id="foto" required
                                accept="image/*">
                            <div class="text form text-muted mt-2">Pilh beberapa gambar sekaligus. Ukuran gambar tidak lebih
                                dari 2MB.
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Unggah</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {!! session('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('info'))
                        <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                            {!! session('info') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @error('foto')
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror


                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5 class="card-title">
                                        <span class="font-weight-bold">{{ $fotos->first()->prestasi->title }}</span>
                                    </h5>
                                </div>
                                <div class="col-md-6 col-12 d-md-flex justify-content-end">
                                    <h5 class="card-title">
                                        <a href="{{ url('dashboard/prestasi/form/' . $fotos->first()->prestasi->id) }}"
                                            class="btn btn-secondary btn-sm">Kembali</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button data-toggle="modal" data-target="#modalTambah" class="btn btn-primary btn-sm">Unggah
                                Foto</button>

                            <div class="mt-4">
                                <div class="row">
                                    @foreach ($fotos as $index => $item)
                                        <div class="col-sm-2 text-center">
                                            <form action="{{ url("dashboard/prestasi/foto/destroy/$item->id") }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="prestasiId"
                                                    value="{{ $fotos->first()->prestasi->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm badge mb-2">Hapus</button>
                                            </form>

                                            <a href="{{ asset("storage/$item->foto") }}?img={{ $index + 1 }}"
                                                data-toggle="lightbox" data-title="{{ 'Gambar ' . $index + 1 }}"
                                                data-gallery="gallery">
                                                <img src="{{ asset("storage/$item->foto") }}?img={{ $index + 1 }}"
                                                    class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                        {{-- <button class="btn btn-primary">Simpan Perubahan</button> --}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
