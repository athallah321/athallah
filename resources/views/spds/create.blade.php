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
                            <h4 class="card-title">Add SPD</h4>
                            <form action="{{ route('spds.store') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                                <!-- Pilih Pegawai -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="pegawai_id" class="form-label">Pilih Pegawai:</label>
                                        <select name="pegawai_id" id="pegawai_id" class="form-select" required>
                                            <option value="" selected>-- Pilih Pegawai --</option>
                                            @foreach ($pegawais as $pegawai)
                                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- No SPD -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="no_spd">No SPD</label>
                                        <input type="text" class="form-control" id="no_spd" name="no_spd" placeholder="Nomor Spd" required>
                                    </div>

                                    <!-- Tanggal SPD -->
                                    <div class="col-md-6">
                                        <label for="tgl_spd">Tanggal SPD</label>
                                        <input type="date" class="form-control" id="tgl_spd" name="tgl_spd" required>
                                    </div>
                                </div>

                                <!-- Pejabat Pemberi Perintah dan Mata Anggaran -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="pb_perintah">Pejabat Pemberi Perintah</label>
                                        <input type="text" class="form-control" id="pb_perintah" name="pb_perintah" placeholder="Pejabat Pemberi Perintah" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="mata_anggaran">Mata Anggaran</label>
                                        <input type="text" class="form-control" id="mata_anggaran" name="mata_anggaran" placeholder="Mata Anggaran" required>
                                    </div>
                                </div>

                                <!-- Tanggal Berangkat dan Kembali -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="tgl_berangkat">Tanggal Berangkat</label>
                                        <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="tgl_kembali">Tanggal Kembali</label>
                                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                                    </div>
                                </div>

                                <!-- Asal dan Tujuan -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="asal">Asal</label>
                                        <input type="text" class="form-control" id="asal" name="asal" placeholder="Asal" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="tujuan">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" required>
                                    </div>
                                </div>

                                <!-- Keperluan -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <label for="untuk">Untuk</label>
                                    <textarea class="form-control" id="untuk" name="untuk" rows="4" placeholder="Contoh: Menghadiri acara..." required></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="jns_transportasi">Alat angkutan yang dipergunakan</label>
                                    <input type="text" class="form-control" id="jns_transportasi" name="jns_transportasi" placeholder="Alat angkutan yang dipergunakan" required>
                                </div>
                            </div>

                                <!-- Instansi -->
                                <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" required>
                                </div>

                                <!-- Keterangan -->
                                    <div class="col-md-6">
                                    <label for="ket">Keterangan (Opsional)</label>
                                    <textarea class="form-control" id="ket" name="ket" rows="3" placeholder="Keterangan tambahan..."></textarea>
                                </div>
                            </div>

                                <!-- Submit dan Cancel -->
                                <input type="submit" name="submit" class="btn btn-primary me-2" value="Simpan">
                                <a href="{{ route('spds.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
