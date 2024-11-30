@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Artikel</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uploaded_images" value="[]">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Dropzone Area -->
                            <div class="form-group">
                                <label>Gambar</label>
                                <div id="actions" class="row">
                                    <div class="col-lg-6">
                                        <div class="btn-group">
                                            <span class="btn btn-success col fileinput-button">
                                                <i class="fas fa-plus"></i>
                                                <span>Add Photos</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table table-striped files" id="previews">
                                    <div id="template" class="row mt-2">
                                        <div class="col-auto">
                                            <span class="preview">
                                                <img src="data:," alt="Preview" data-dz-thumbnail />
                                            </span>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <p class="mb-0">
                                                <span data-dz-name></span> (<span data-dz-size></span>)
                                            </p>
                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <div class="btn-group">
                                                <button data-dz-remove class="btn btn-danger delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea id="summernote" name="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('artikel') }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left fa-fw"></i>Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
