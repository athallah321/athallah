@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Daftar Riil</h1>

    <table class="table">
        <tr>
            <th>SPD</th>
            <td>{{ $daftarRiil->spd->no_spd }}</td>
        </tr>
        <tr>
            <th>Uraian</th>
            <td>{{ $daftarRiil->uraian }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $daftarRiil->jumlah }}</td>
        </tr>
        <tr>
            <th>Satuan</th>
            <td>{{ $daftarRiil->satuan }}</td>
        </tr>
        <tr>
            <th>Harga Satuan</th>
            <td>{{ number_format($daftarRiil->harga_satuan, 2) }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{ number_format($daftarRiil->total, 2) }}</td>
        </tr>
    </table>

    <a href="{{ route('daftar-riils.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
