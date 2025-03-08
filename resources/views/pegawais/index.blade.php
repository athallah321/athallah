@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Pegawai Table</h4>
                            <a href="{{ route('pegawais.create') }}" class="btn btn-primary">Add Pegawai</a>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('pegawais.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                        <div class="table-responsive">
                            <table id="example" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Pangkat</th>
                                        <th>Golongan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $index => $pegawai)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pegawai->nip }}</td>
                                        <td>{{ $pegawai->nama }}</td>
                                        <td>{{ $pegawai->jabatan }}</td>
                                        <td>{{ $pegawai->pangkat }}</td>
                                        <td>{{ $pegawai->golongan ? $pegawai->golongan->nama_golongan : '-' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-warning btn-icon">
                                                <a href="{{ route('pegawais.edit', $pegawai->uuid) }}" ><i class='fa fa-pencil fa-lg'></i></a>
                                            </button>
                                            <form action="{{ route('pegawais.destroy', $pegawai->uuid) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="ti-trash"></i>
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
                            {{ $pegawais->appends(['search' => request()->input('search')])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

