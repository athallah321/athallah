<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link" href="{{ route('dashboard') }}">
    <i class="icon-grid menu-icon"></i>
    <span class="menu-title">Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <i class="icon-layout menu-icon"></i>
    <span class="menu-title">Data Master</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="{{ route('users.index')}}">User<a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('golongans.index')}}">Golongan</a></li>
      <li class="nav-item"> <a class="nav-link" href="{{ route('transportasis.index')}}">Transportasi</a></li>
      <li class="nav-item"> <a class="nav-link" href="#">Tanda Tangan</a></li>
    </ul>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('pegawais.index')}}">
    <i class="icon-head menu-icon"></i>
    <span class="menu-title">Data Pegawai</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('surat_tugas.index')}}">
    <i class="icon-paper menu-icon"></i>
    <span class="menu-title">Surat Tugas</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('spds.index')}}">
    <i class="icon-file menu-icon"></i>
    <span class="menu-title">SPD</span>
  </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="spj">
      <i class="icon-paper menu-icon"></i>
      <span class="menu-title">SPJ</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="error">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{ route('daftar_nominatif.index')}}"> Daftar Nominatif </a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('daftar_riils.index')}}"> Daftar Riil </a></li>
        <li class="nav-item"> <a class="nav-link" href=#> Kwitansi/Rincian </a></li>
        {{-- <li class="nav-item"> <a class="nav-link" href=#> Kwitansi/Rincian </a></li> --}}
      </ul>
    </div>
  </li>
</ul>
</nav>



