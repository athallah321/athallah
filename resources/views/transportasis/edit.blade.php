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
                                <h4 class="card-title">Edit Transportasi</h4>
                                <!-- Formulir Edit -->
                                <form class="forms-sample" method="POST" action="{{ route('transportasis.update', $transportasi->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="jenis_transportasi">Jenis Transportasi</label>
                                        <input type="text" class="form-control" id="jenis_transportasi" name="jenis_transportasi" placeholder="jenis_transportasi" value="{{ old('jenis_transportasi', $transportasi->jenis_transportasi) }}" required>
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


