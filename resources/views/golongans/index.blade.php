@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Golongan Table</h4>
                            <a href="{{ route('golongans.create') }}" class="btn btn-primary">Add Golongan</a>
                        </div>
                        <form action="{{ route('surat_tugas.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                        <div class="table-responsive">
                            <table id="userTable" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                <th>No</th>
                <th>Kode Golongan</th>
                <th>Nama Golongan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($golongan as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->kode_golongan }}</td>
                <td>{{ $item->nama_golongan }}</td>
                <td>
                    <button type="button" class="btn btn-inverse-warning btn-icon">
                        <a href="{{ route('golongans.edit', $item->id) }}" ><i class='fa fa-pencil fa-lg'></i></a>
                    </button>
                    {{-- <form action="{{ route('golongans.destroy', $item->id) }}" method="POST" style="display:inline;"> --}}
                        @csrf
                        @method('DELETE')
                       <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Apakah Yakin ingin menghapus data ini?')">
                                                    <i class="ti-trash"></i>
                                                </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
@endsection
