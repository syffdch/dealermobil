@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Artikel</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('artikel.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">

                    <div class="row">
                        <!-- Gambar -->
                        <div class="col-lg-6">
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
                                                <img src="data:," alt="" data-dz-thumbnail />
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
                                <div class="mt-2">
                                    <label>Gambar Lama:</label>
                                    <ul>
                                        @foreach (json_decode($artikel->gambar, true) ?? [] as $gambar)
                                            <li>
                                                <img src="{{ asset('artikel/gambar/' . $gambar) }}" alt="gambar" width="100">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- File -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control">
                                @if ($artikel->file)
                                    <a href="{{ asset('artikel/file/' . $artikel->file) }}" target="_blank" class="d-block mt-2">File Saat Ini</a>
                                @endif
                            </div>
                        </div>

                        <!-- Judul -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}" required>
                                @error('judul')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $artikel->tanggal) }}" required>
                                @error('tanggal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi Artikel -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea id="summernote" name="deskripsi" class="form-control" required>{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
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
