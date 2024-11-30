@extends('layouts.app')

@section('title', 'Tambah Mobil')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Mobil</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('mobil.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Mobil</label>
                                <input type="text" name="nama_mobil" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tipe Mobil</label>
                                <select class="form-control" name="tipe_mobil" id="">
                                    @forelse ($tipe as $aa)
                                    <option value="{{ $aa->tipe }}">{{ $aa->tipe }}</option>
                                    @empty
                                    <span>Tidak ada data</span>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('mobil') }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left fa-fw"></i>Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
