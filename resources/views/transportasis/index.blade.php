@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Transportasi Table</h4>
                            <a href="{{ route('transportasis.create') }}" class="btn btn-primary">Add Transportasi</a>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('transportasis.index') }}" method="GET" class="mb-3">
                            <input type="text" name="search" class="form-control small-search" placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                        <div class="table-responsive">
                            <table id="example" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Transportasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTransportasi as $key => $transportasi)
                                        <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $transportasi->jenis_transportasi }}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-warning btn-icon">
                                                <a href="{{ route('transportasis.edit', $transportasi->id) }}" ><i class='fa fa-pencil fa-lg'></i></a>
                                            </button>
                                            <form action="{{ route('transportasis.destroy', $transportasi->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        {{-- <div class="mt-3 text-center">
                            {{ $pegawais->appends(['search' => request()->input('search')])->links('pagination::bootstrap-5') }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
@endsection

