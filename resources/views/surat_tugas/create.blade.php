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
                            <h4 class="card-title">Add Surat Tugas</h4>
                            <form action="{{ route('surat_tugas.store') }}" method="POST">
                                @csrf

                                <!-- Pilih Pegawai dan Nomor Surat -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="pegawai_id">Pilih Pegawai:</label>
                                        <select id="pegawai_id" name="pegawai_id[]" multiple="multiple" class="js-example-basic-multiple" required>
                                            @foreach ($pegawais as $pegawai)
                                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                        <div class="col-md-6">
                                            <label for="pangkat">Pangkat</label>
                                            <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat" readonly>
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="golongan">Golongan</label>
                                            <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan" readonly>
                                        </div>

                                            <div class="col-md-6">
                                                <label for="nip">Nip</label>
                                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip" readonly>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="no_surat">No Surat</label>
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="No Surat" required>
                                    </div>


                                <!-- Tanggal Surat dan Tempat Berangkat -->

                                    <div class="col-md-6">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="Tanggal Surat" required>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="tempat_berangkat">Tempat Berangkat</label>
                                        <input type="text" class="form-control" id="tempat_berangkat" name="tempat_berangkat" placeholder="Tempat Berangkat" required>
                                    </div>


                                <!-- Tempat Tujuan dan Instansi -->

                                    <div class="col-md-6">
                                        <label for="tempat_tujuan">Tempat Tujuan</label>
                                        <input type="text" class="form-control" id="tempat_tujuan" name="tempat_tujuan" placeholder="Tempat Tujuan" required>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="instansi">Instansi</label>
                                        <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Isi Instansi" required>
                                    </div>

                                <!-- Untuk -->
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="untuk">Untuk</label>
                                    <textarea class="form-control" id="untuk" name="untuk" rows="4" placeholder="Contoh : Menghadiri Kegiatan..." required></textarea>
                                </div>
                            </div>

                                <!-- Tanggal Berangkat dan Tanggal Kembali -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="tgl_berangkat">Tanggal Berangkat</label>
                                        <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" placeholder="Tanggal Berangkat" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="tgl_kembali">Tanggal Kembali</label>
                                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" placeholder="Tanggal Kembali" required>
                                    </div>
                                </div>
                            </div>
                                <!-- Submit dan Cancel -->
                                <input type="submit" name="submit" class="btn btn-primary me-2" value="Simpan">
                                <a href="{{ route('surat_tugas.index') }}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

