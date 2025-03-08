@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Daftar Nominatif</h4>
                        </div>

                        <!-- Form pencarian -->
                        <form action="{{ route('daftar_nominatif.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Cari pegawai..." value="{{ request('search') }}">
                        </form>

                        <div class="table-responsive">
                            <table id="nominatifTable" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nomor SPD</th>
                                        <th>Uang Harian</th>
                                        <th>Transportasi</th>
                                        <th>Penginapan</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarNominatif as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->pegawai->nama ?? '-' }}</td>
                                        <td>{{ $item->spd->no_spd ?? '-' }}</td>
                                        <td>Rp {{ number_format($item->uang_harian, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($item->transportasi, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($item->penginapan, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($item->total, 2, ',', '.') }}</td>
                                        <td>
                                            <!-- Tombol Tambah Data -->
                                            <a href="{{ route('daftar_nominatif.create', ['id_spd' => $item->spd->id_spd]) }}" class="btn btn-success btn-sm">
                                                <i class="ti-plus"></i> Tambah
                                            </a>

                                            <!-- Tombol Edit -->
                                            <a href="{{ route('daftar_nominatif.edit', $item->id_nominatif) }}" class="btn btn-warning btn-sm">
                                                <i class='fa fa-pencil'></i> Edit
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('daftar_nominatif.destroy', $item->id_nominatif) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Yakin ingin menghapus data ini?')">
                                                    <i class="ti-trash"></i> Hapus
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
                            {{ $daftarNominatif->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
