@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            </div>

<div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Golongan</h4>
              <form action="{{ route('golongans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_golongan">Kode Golongan</label>
            <input type="text" class="form-control" id="kode_golongan" name="kode_golongan" required>
        </div>
        <div class="form-group">
            <label for="nama_golongan">Nama Golongan</label>
            <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
