@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Daftar Riil</h1>

    <form action="{{ route('daftar-riils.update', $daftarRiil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_spd">SPD</label>
            <select name="id_spd" class="form-control">
                @foreach ($spds as $spd)
                    <option value="{{ $spd->id_spd }}" {{ $spd->id_spd == $daftarRiil->id_spd ? 'selected' : '' }}>
                        {{ $spd->no_spd }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="uraian">Uraian</label>
            <input type="text" name="uraian" class="form-control" value="{{ $daftarRiil->uraian }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $daftarRiil->jumlah }}" required>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" value="{{ $daftarRiil->satuan }}" required>
        </div>

        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" step="0.01" name="harga_satuan" class="form-control" value="{{ $daftarRiil->harga_satuan }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
