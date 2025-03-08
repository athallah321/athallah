@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Dashboard</h3>
          <h6 class="font-weight-normal mb-0">
            Welcome To SPD. <span class="text-primary">Aplikasi Sistem Informasi Surat Perjalanan Dinas!</span>
          </h6>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <button class="btn btn-light bg-white btn-large" type="button" aria-haspopup="false" aria-expanded="true">
                <i class="mdi mdi-clock"></i> <span id="currentDateTime">Today</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cards Section -->
  <div class="col-md-12 grid-margin transparent">
    <div class="row d-flex flex-wrap justify-content-between">

      <!-- Card Pegawai -->
      <div class="col-md-3 mb-4 stretch-card transparent">
        <a href="{{ route('pegawais.index') }}" class="card card-tale text-decoration-none">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <p class="mb-4">Pegawai</p>
              <p class="fs-30 mb-2">{{ $pegawaiCount ?? '0' }}</p>
              <p>(Total Pegawai)</p>
            </div>
            <i class="mdi mdi-account-group text-white" style="font-size: 40px;"></i>
          </div>
        </a>
      </div>

      <!-- Card SPD -->
      <div class="col-md-3 mb-4 stretch-card transparent">
        <a href="{{ route('spds.index') }}" class="card card-dark-blue text-decoration-none">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <p class="mb-4">SPD</p>
              <p class="fs-30 mb-2">{{ $spdCount ?? '0' }}</p>
              <p>(Total SPD)</p>
            </div>
            <i class="mdi mdi-file-document text-white" style="font-size: 40px;"></i>
          </div>
        </a>
      </div>

      <!-- Card ST -->
      <div class="col-md-3 mb-4 stretch-card transparent">
        <a href="{{ route('surat_tugas.index') }}" class="card card-light-blue text-decoration-none">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <p class="mb-4">ST</p>
              <p class="fs-30 mb-2">{{ $surattugasCount ?? '0' }}</p>
              <p>(Total Surat Tugas)</p>
            </div>
            <i class="mdi mdi-file-certificate text-white" style="font-size: 40px;"></i>
          </div>
        </a>
      </div>

      <!-- Card Kwitansi -->
      <div class="col-md-3 mb-4 stretch-card transparent">
        {{-- <a href="{{ route('kwitansi.index') }}" class="card card-light-danger text-decoration-none"> --}}
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <p class="mb-4">Kwitansi</p>
              <p class="fs-30 mb-2">{{ $kwitansiCount ?? '0' }}</p>
              <p>(Total Kwitansi)</p>
            </div>
            <i class="mdi mdi-receipt text-white" style="font-size: 40px;"></i>
          </div>
        </a>
      </div>

    </div>
  </div>
@endsection

<script>
  function updateDateTime() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
    const formattedDate = now.toLocaleDateString('id-ID', options);
    const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
    const formattedTime = now.toLocaleTimeString('id-ID', timeOptions);

    const element = document.getElementById('currentDateTime');
    if (element) {
      element.innerText = `${formattedDate} - ${formattedTime}`;
    }
  }

  setInterval(updateDateTime, 1000);
  updateDateTime();
</script>
