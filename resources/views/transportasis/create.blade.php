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
              <h4 class="card-title">Add Transportasi</h4>
              <form action="{{ route('transportasis.store') }}" method="POST">
                @csrf
<div class="form-group">
<label for="jenis_transportasi">Jenis Transportasi</label>
<input type="text" class="form-control" id="jenis_transportasi" name="jenis_transportasi" placeholder= Transportasi required>
</div>
<input type="submit" name="submit" class="btn btn-primary me-2" value="Simpan">
<a href="{{(route('transportasis.index'))}}" class="btn btn-light">Cancel</a>
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
