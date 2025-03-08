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
              <h4 class="card-title">Add Pegawai</h4>
              <form action="{{ route('pegawais.store') }}" method="POST">
                @csrf
<div class="form-group">
<label for="nip">Nip</label>
<input type="text" class="form-control" id="nip" name="nip" placeholder=Nip required>
</div>
<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
    </div>
<div class="form-group">
<label for="jabatan">Jabatan</label>
<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" required>
</div>
<div class="form-group">
<label for="pangkat">Pangkat</label>
<input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="pangkat" required>
</div>
<div class="form-group">
    <label for="golongan_id">Golongan</label>
    <select class="form-control" id="golongan_id" name="golongan_id" required>
        <option value="">Pilih Golongan</option>
        @foreach ($golongans as $golongan)
            <option value="{{ $golongan->id }}"
                {{ isset($pegawai) && $pegawai->golongan_id == $golongan->id ? 'selected' : '' }}>
                {{ $golongan->nama_golongan }}
            </option>
        @endforeach
    </select>
</div>
<input type="submit" name="submit" class="btn btn-primary me-2" value="Simpan">
<a href="{{(route('pegawais.index'))}}" class="btn btn-light">Cancel</a>
</form>

            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}', 'Berhasil');
        </script>
    @endif
@endsection
