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
                                <h4 class="card-title">Edit Pegawai</h4>
                                <!-- Formulir Edit -->
                                <form class="forms-sample" method="POST" action="{{ route('pegawais.update', $pegawai->uuid) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="nip">Nip</label>
                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="nip" value="{{ old('nip', $pegawai->nip) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ old('nama', $pegawai->nama) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pangkat">pangkat</label>
                                        <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="pangkat" value="{{ old('pangkat', $pegawai->pangkat) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="golongan_id">Golongan</label>
                                        <select class="form-control" id="golongan_id" name="golongan_id" required>
                                            <option value="">Pilih Golongan</option>
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}"
                                                    {{ old('golongan_id', $pegawai->golongan_id) == $golongan->id ? 'selected' : '' }}>
                                                    {{ $golongan->nama_golongan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                    <a href="{{ route('pegawais.index') }}" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


