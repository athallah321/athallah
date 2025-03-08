@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">SPD Table</h4>
                            <a href="{{ route('spds.create') }}" class="btn btn-primary">Add SPD</a>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('spds.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                        <div class="table-responsive">
                            <table id="example" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No SPD</th>
                                        <th>Tanggal Surat</th>
                                        <th>Tempat Berangkat</th>
                                        <th>Tujuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spds as $index => $spd )
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $spd->pegawai ? $spd->pegawai->nama : '-' }}</td>
                                        <td>{{ $spd->no_spd }}</td>
                                        <td>{{ $spd->tgl_spd }}</td>
                                        <td>{{ $spd->asal }}</td>
                                        <td>{{ $spd->tujuan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-warning btn-icon">
                                                <a href="{{ route('spds.edit', $spd->id) }}" ><i class='fa fa-pencil fa-lg'></i></a>
                                            </button>
                                            <form action="{{ route('spds.destroy', $spd->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="ti-trash"></i>
                                                </button>

                                                <button type="button" class="btn btn-inverse-dark btn-icon">
                                                    <a href="{{ route('spds.show', $spd->id) }}" class="mdi mdi-tooltip-text"></a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="mt-3 text-center">
                            {{ $spds->appends(['search' => request()->input('search')])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
