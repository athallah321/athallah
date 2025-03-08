@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0"></div>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Surat Tugas</h4>
                                <form action="{{ route('surat_tugas.update', $suratTugas->uuid) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Pilih Pegawai -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="pegawai_id">Pilih Pegawai</label>
                                            <select name="pegawai_id[]" id="pegawai_id" class="js-example-basic-multiple" multiple="multiple" required>
                                                @foreach ($pegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}"
                                                        {{ in_array($pegawai->id, $suratTugas->pegawai->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $pegawai->nama }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="pangkat">Pangkat</label>
                                            <input type="text" class="form-control" id="pangkat" name="pangkat" value="{{ old('pangkat', $suratTugas->pangkat) }}" placeholder="Pangkat" readonly>
                                        </div>
                                    </div>

                                    <!-- Golongan dan NIP -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="golongan">Golongan</label>
                                            <input type="text" class="form-control" id="golongan" name="golongan" value="{{ old('golongan', $suratTugas->golongan) }}" placeholder="Golongan" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $suratTugas->nip) }}" placeholder="NIP" readonly>
                                        </div>
                                    </div>

                                    <!-- No Surat -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="no_surat">No Surat</label>
                                            <input type="text" class="form-control" id="no_surat" name="no_surat" value="{{ old('no_surat', $suratTugas->no_surat) }}" placeholder="No Surat" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_surat">Tanggal Surat</label>
                                            <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="{{ old('tgl_surat', $suratTugas->tgl_surat) }}" required>
                                        </div>
                                    </div>

                                    <!-- Tempat Berangkat dan Tujuan -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="tempat_berangkat">Tempat Berangkat</label>
                                            <input type="text" class="form-control" id="tempat_berangkat" name="tempat_berangkat" value="{{ old('tempat_berangkat', $suratTugas->tempat_berangkat) }}" placeholder="Tempat Berangkat" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat_tujuan">Tempat Tujuan</label>
                                            <input type="text" class="form-control" id="tempat_tujuan" name="tempat_tujuan" value="{{ old('tempat_tujuan', $suratTugas->tempat_tujuan) }}" placeholder="Tempat Tujuan" required>
                                        </div>
                                    </div>

                                    <!-- Tanggal Berangkat dan Kembali -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="tgl_berangkat">Tanggal Berangkat</label>
                                            <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" value="{{ old('tgl_berangkat', $suratTugas->tgl_berangkat) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_kembali">Tanggal Kembali</label>
                                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{ old('tgl_kembali', $suratTugas->tgl_kembali) }}" required>
                                        </div>
                                    </div>

                                    <!-- Instansi dan Untuk -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="instansi">Instansi</label>
                                            <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old('instansi', $suratTugas->instansi) }}" placeholder="Instansi" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="untuk">Untuk</label>
                                            <textarea class="form-control" id="untuk" name="untuk" rows="4" placeholder="Contoh: Menghadiri kegiatan..." required>{{ old('untuk', $suratTugas->untuk) }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Tombol -->
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <a href="{{ route('surat_tugas.index') }}" class="btn btn-light">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
