@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title text-black"><i class="mdi mdi-file-document-box-outline"></i> Detail Surat Tugas</h4>
                        <a href="{{ route('surat_tugas.pdf', $suratTugas->uuid) }}" class="btn btn-primary">
                            <i class="mdi mdi-printer"></i> Cetak PDF
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-light text-primary" style="width: 30%;">No Surat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <span class="badge badge-info">{{ $suratTugas->no_surat }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tanggal Surat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ \Carbon\Carbon::parse($suratTugas->tgl_surat)->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Nama Pegawai</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        @foreach ($suratTugas->pegawai as $pegawai)
                                            <span class="badge badge-info">{{ $pegawai->nama }}</span>
                                        @endforeach
                                        @if($suratTugas->pegawai->isEmpty())
                                            <span>-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tempat Berangkat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-map-marker"></i> {{ $suratTugas->tempat_berangkat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tempat Tujuan</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-map-marker-check"></i> {{ $suratTugas->tempat_tujuan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tanggal Berangkat</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-calendar"></i> {{ \Carbon\Carbon::parse($suratTugas->tgl_berangkat)->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Tanggal Kembali</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        <i class="mdi mdi-calendar"></i> {{ \Carbon\Carbon::parse($suratTugas->tgl_kembali)->format('d M Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Instansi</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $suratTugas->instansi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-primary">Untuk</th>
                                    <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                                        {{ $suratTugas->untuk }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('surat_tugas.index') }}" class="btn btn-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
