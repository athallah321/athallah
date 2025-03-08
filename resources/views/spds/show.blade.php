@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title text-black"><i class="mdi mdi-file-document-box-outline"></i> Detail SPD</h4>
                        <a href="{{ route('spds.pdf', $spds->id) }}" class="btn btn-primary">
                            <i class="mdi mdi-printer"></i> Cetak PDF
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-light text-primary" style="width: 30%;">No SPD</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <span class="badge badge-info">{{ $spds->no_spd }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tanggal SPD</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ \Carbon\Carbon::parse($spds->tgl_spd)->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Nama Pegawai</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $spds->pegawai->nama ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">NIP</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $spds->pegawai->nip ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Pangkat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $spds->pegawai->pangkat ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tempat Berangkat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-map-marker"></i> {{ $spds->asal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tempat Tujuan</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-map-marker-check"></i> {{ $spds->tujuan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Untuk</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $spds->untuk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Lamanya Perjalanan Dinas</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ \Carbon\Carbon::parse($spds->tgl_berangkat)->diffInDays(\Carbon\Carbon::parse($spds->tgl_kembali)) + 1 }} hari
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tanggal Berangkat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-calendar"></i> {{ \Carbon\Carbon::parse($spds->tgl_berangkat)->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tanggal Kembali</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-calendar"></i> {{ \Carbon\Carbon::parse($spds->tgl_kembali)->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Alat angkutan yang dipergunakan</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                         {{ $spds->jns_transportasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Instansi</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $spds->instansi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Keterangan</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $spds->ket }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('spds.index') }}" class="btn btn-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
