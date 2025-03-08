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
              <h4 class="card-title">Add User</h4>
              <form action="{{ route('users.store') }}" method="POST">
                @csrf
<div class="form-group">
<label for="name">Nama</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
</div>
<div class="form-group">
    <label for="level">Level</label>
    <input type="text" class="form-control" id="level" name="level" placeholder="level" required>
    </div>
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" id="username" name="username" placeholder="username" required>
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="password" required>
</div>
<input type="submit" name="submit" class="btn btn-primary me-2" value="Simpan">
<a href="{{(route('users.index'))}}" class="btn btn-light">Cancel</a>
</form>

            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection
