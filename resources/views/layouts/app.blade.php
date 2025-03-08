<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPPD</title>

    <!-- CSS: Plugins -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" rel="stylesheet">

  </head>
  <body>
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="main-panel">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Header -->
    @include('partials.header')

    <!-- Plugins -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>

<!-- Template JS -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>



    <!-- End custom js for this page-->
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- DataTables JS -->
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}

    <!-- Custom Scripts -->
    <script>
      // Toastr Configuration
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
      };

      // DataTable Initialization
    //   $(document).ready(function() {
    //     $('#userTable').DataTable({
    //       "paging": true,
    //       "searching": true,
    //       "ordering": true,
    //       "info": true,
    //       "autoWidth": false
    //     });
    //   });

      // Toastr Session Notifications
      @if (session('success'))
        toastr.success('{{ session('success') }}', 'Berhasil');
      @endif

      @if (session('error'))
        toastr.error('{{ session('error') }}', 'Gagal');
      @endif

      @if (session('warning'))
        toastr.error('{{ session('warning') }}', 'Perbarui');
      @endif

      @if (session('info'))
        toastr.error('{{ session('info') }}', 'Informasi');
      @endif
    </script>
  </body>
</html>
<!-- Form Logout -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>




