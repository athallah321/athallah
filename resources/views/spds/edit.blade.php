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
                                <h4 class="card-title">Edit SPD</h4>
                                <!-- Formulir Edit -->
                                <form class="forms-sample" method="POST" action="{{ route('spds.update', $spds->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Pilih Pegawai -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="id_pegawai">Nama Pegawai</label>
                                            <select name="id_pegawai" id="id_pegawai" class="form-control">
                                                <option value="">-- Pilih Pegawai --</option>
                                                @foreach($pegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}"
                                                        {{ $spds->id_pegawai == $pegawai->id ? 'selected' : '' }}>
                                                        {{ $pegawai->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- No SPD -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="no_spd">No SPD</label>
                                            <input type="text" class="form-control" id="no_spd" name="no_spd" placeholder="No SPD" value="{{ old('no_spd', $spds->no_spd) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_spd">Tanggal SPD</label>
                                            <input type="date" class="form-control" id="tgl_spd" name="tgl_spd" value="{{ old('tgl_spd', $spds->tgl_spd) }}" required>
                                        </div>
                                    </div>

                                    <!-- Pejabat Pemberi Perintah dan Mata Anggaran -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="pb_perintah">Pejabat Pemberi Perintah</label>
                                            <input type="text" class="form-control" id="pb_perintah" name="pb_perintah" placeholder="Pejabat Pemberi Perintah" value="{{ old('pb_perintah', $spds->pb_perintah) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="mata_anggaran">Mata Anggaran</label>
                                            <input type="text" class="form-control" id="mata_anggaran" name="mata_anggaran" placeholder="Mata Anggaran" value="{{ old('mata_anggaran', $spds->mata_anggaran) }}" required>
                                        </div>
                                    </div>

                                    <!-- Tanggal Berangkat dan Kembali -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="tgl_berangkat">Tanggal Berangkat</label>
                                            <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" value="{{ old('tgl_berangkat', $spds->tgl_berangkat) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_kembali">Tanggal Kembali</label>
                                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{ old('tgl_kembali', $spds->tgl_kembali) }}" required>
                                        </div>
                                    </div>

                                    <!-- Asal dan Tujuan -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="asal">Asal</label>
                                            <input type="text" class="form-control" id="asal" name="asal" placeholder="Asal" value="{{ old('asal', $spds->asal) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tujuan">Tujuan</label>
                                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" value="{{ old('tujuan', $spds->tujuan) }}" required>
                                        </div>
                                    </div>

                                    <!-- Keperluan dan Transportasi -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="untuk">Untuk</label>
                                            <textarea class="form-control" id="untuk" name="untuk" rows="4" placeholder="Contoh: Menghadiri acara..." required>{{ old('untuk', $spds->untuk) }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jns_transportasi">Alat angkutan yang dipergunakan</label>
                                            <input type="text" class="form-control" id="jns_transportasi" name="jns_transportasi" placeholder="Alat angkutan yang dipergunakan" value="{{ old('jns_transportasi', $spds->jns_transportasi) }}" required>
                                        </div>
                                    </div>

                                    <!-- Instansi dan Keterangan -->
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="instansi">Instansi</label>
                                            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" value="{{ old('instansi', $spds->instansi) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ket">Keterangan (Opsional)</label>
                                            <textarea class="form-control" id="ket" name="ket" rows="3" placeholder="Keterangan tambahan...">{{ old('ket', $spds->ket) }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <a href="{{ route('spds.index') }}" class="btn btn-light">Cancel</a>
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
