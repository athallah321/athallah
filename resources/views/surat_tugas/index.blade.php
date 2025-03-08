@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Surat Tugas Table</h4>
                            <a href="{{ route('surat_tugas.create') }}" class="btn btn-primary">Add Surat Tugas</a>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('surat_tugas.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                        <div class="table-responsive">
                            <table id="example" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Surat</th>
                                        <th>Pegawai (Jumlah)</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal Surat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suratTugas as $surattugas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $surattugas->no_surat }}</td>
                                            <td>
                                                {{ $surattugas->pegawai->pluck('nama')->join(', ') }}
                                                ({{ $surattugas->pegawai->count() }})
                                            </td>
                                            <td>{{ $surattugas->tempat_tujuan }}</td>
                                            <td>{{ \Carbon\Carbon::parse($surattugas->tgl_surat)->format('d F Y') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-warning btn-icon">
                                                    <a href="{{ route('surat_tugas.edit', $surattugas->uuid) }}" ><i class='fa fa-pencil fa-lg'></i></a>
                                                </button>
                                                <form action="{{ route('surat_tugas.destroy', $surattugas->uuid) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-inverse-dark btn-icon">
                                                        <a href="{{ route('surat_tugas.show', $surattugas->uuid) }}" class="mdi mdi-tooltip-text"></a>
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
                            {{ $suratTugas->appends(['search' => request()->input('search')])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
