@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Setting Profile</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('setting.update') }}" method="post">
            @csrf
            @foreach ($setting as $aa)
            <div class="form-group">
                <label>
                    <i class="{{ $aa->icon }}"></i>
                    {{ $aa->display_name }}
                </label>
                @if ($aa->form === 'text')
                    <input type="text" class="form-control" name="{{ $aa->nama_setting }}" value="{{ $aa->value }}">
                @elseif ($aa->form === 'textarea')
                    <textarea class="form-control" name="{{ $aa->nama_setting }}">{{ $aa->value }}</textarea>
                @endif
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Carousel</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('setting.carousel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto" required>
                <small class="text-muted">Ukuran file maksimum 5MB dengan rasio 16:9.</small>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <div class="mt-4">
            <div class="row">
                @foreach ($carousel as $bb)
                <div class="col-md-3 text-center">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('carousel/' . $bb->foto) }}"
                             alt="Foto {{ $bb->foto }}"
                             class="card-img-top img-thumbnail"
                             style="width: 100%; height: auto; aspect-ratio: 16 / 9; object-fit: cover;">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 text-truncate" style="max-width: 80%;">{{ $bb->judul }}</p>
                                <form action="{{ route('carousel.destroy', $bb->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            style="border-radius: 50%;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
