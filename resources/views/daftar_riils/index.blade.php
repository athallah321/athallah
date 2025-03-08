@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Daftar Riil Table</h4>
                            <a href="{{ route('daftar_riils.create') }}" class="btn btn-primary">Add Daftar Riil</a>
                        </div>
                        <!-- Form pencarian -->
                        <form action="{{ route('daftar_riils.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                        <div class="table-responsive">
                            <table id="userTable" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor SPD</th>
                                        <th>Tanggal SPD</th>
                                        <th>Nama Pegawai</th>
                                        <th>Uraian</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarRiils as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->spd->no_spd ?? '-' }}</td>
                                        <td>{{ $item->spd->tgl_spd ?? '-' }}</td>
                                        <td>{{ $item->spd->pegawai->nama ?? '-' }}</td>
                                        <td>{{ $item->uraian }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button type="button" class="btn btn-inverse-warning btn-icon">
                                                <a href="{{ route('daftar_riils.edit', $item->id) }}"><i class='fa fa-pencil fa-lg'></i></a>
                                            </button>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('daftar_riils.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Apakah Yakin ingin menghapus data ini?')">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Tambahkan pagination -->
                        <div class="mt-3">
                            {{ $daftarRiils->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
