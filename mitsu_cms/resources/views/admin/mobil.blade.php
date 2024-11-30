@extends('layouts.app')

@section('title', 'Mobil')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Mobil</h5>
                <a class="btn btn-primary btn-sm float-right" href="{{ route('mobil.create') }}">
                    <i class="fas fa-plus"></i> Mobil
                </a>
                <a class="btn btn-primary btn-sm float-right" href="{{ route('dtmobil.create') }}">
                    <i class="fas fa-plus"></i> Harga
                </a>
            </div>

            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Mobil</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Deskripsi</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Foto</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Harga</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mobil as $aa)
                                    <tr class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $aa->nama_mobil }}</td>
                                        <td>
                                            {{-- deskripsi --}}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gambar{{ $aa->id }}"><i class="fas fa-search"></i></button>
                                            <div class="modal fade" id="gambar{{ $aa->id }}" tabindex="-1" aria-modal="true">
                                                <div class="modal-dialog modal-md-8" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel1">Foto</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                                            <img src="{{ asset('mobil/gambar/' . $aa->gambar) }}" alt="gambar {{ $aa->gambar }}" style="max-width:200px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                            {{-- harga --}}
                                        <td>
                                        </td>
                                        <td>
                                            <a href="{{ route('mobil.edit', $aa->id) }}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                            <form action="{{ route('mobil.destroy', $aa->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="nav-icon fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
