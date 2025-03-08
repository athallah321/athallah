@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Daftar Riil</h4>
                    <form action="{{ route('daftar_riils.store') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Uraian</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Biaya Penginapan</td>
                                        <td><input type="number" name="jumlah[]" class="form-control"></td>
                                        <td><input type="number" name="nilai_satuan[]" class="form-control"></td>
                                        <td><input type="text" name="uraian[]" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Transportasi</td>
                                        <td><input type="number" name="jumlah[]" class="form-control"></td>
                                        <td><input type="number" name="nilai_satuan[]" class="form-control"></td>
                                        <td><input type="text" name="uraian[]" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Uang Harian/Saku</td>
                                        <td><input type="number" name="jumlah[]" class="form-control"></td>
                                        <td><input type="number" name="nilai_satuan[]" class="form-control"></td>
                                        <td><input type="text" name="uraian[]" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="{{ route('daftar_riils.index') }}" class="btn btn-secondary mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
