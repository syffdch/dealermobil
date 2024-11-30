@extends('layouts.app')

@section('title', 'Tipe')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tipe Mobil</h5>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
                <div class="modal fade" id="tambah" tabindex="-1" aria-modal="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('tipe.create') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Tipe</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label class="form-label">Tipe Mobil</label>
                                            <input type="text" class="form-control" name="tipe" placeholder="Enter Type">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Tipe Mobil</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tipe as $aa)
                                    <tr class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $aa->tipe }}</td>
                                        <td>
                                            {{-- edit --}}
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{ $aa->id }}"><i class="nav-icon fas fa-edit"></i></button>
                                            <div class="modal fade" id="edit{{ $aa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('tipe.edit') }}" method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="tipe_id" value="{{ $aa->id }}">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="">Edit Tipe</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label class="form-label">Tipe Mobil</label>
                                                                        <input type="text" class="form-control" value="{{ old('tipe', $aa->tipe) }}" name="tipe" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <form action="{{ route('tipe.destroy', $aa->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="nav-icon fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
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
