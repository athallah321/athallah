@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Daftar Nominatif</h4>

                    <form action="{{ route('daftar_nominatif.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>SPD</label>
                            <select name="id_spd" class="form-control">
                                @foreach ($spds as $spd)
                                    <option value="{{ $spd->id_spd }}">{{ $spd->no_spd }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pegawai</label>
                            <select name="id_pegawai" class="form-control">
                                @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id_pegawai }}">{{ $pegawai->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
