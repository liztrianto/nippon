<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/Nippon-Paint-Favicon.png')}}">      
  <title> @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/toastr/css/toast.css')}}" >
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}" >
  <link rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2-bootstrap-5-theme.min.css')}}"/>

  @yield('css-extra')


</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/images/Nippon-Paint.png')}}" height="135" width="240">
  </div>

  @include('layouts.header')
  @include('layouts.sidebar')
  @yield('content')
  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('assets/adminlte/dist/js/pages/dashboard.js') }}"></script> -->
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/toastr/js/toast.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>


<script type="text/javascript"> 

        
    @if(Session::has('danger'))
      toastr.error("{{ Session::get('danger') }}");
    @elseif(Session::has('warning'))
      toastr.warning("{{ Session::get('warning') }}");
    @elseif(Session::has('success'))
      Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
      });
      // toastr.success("{{ Session::get('success') }}");
    @endif
</script>
<script>
  // Deteksi apakah tema gelap diaktifkan pada browser
  // const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
  
  // Fungsi untuk menetapkan tema AdminLTE berdasarkan preferensi tema
  // function setAdminLTEDarkMode() {
  //   const body = document.body;

  //   if (prefersDarkScheme.matches) {
  //     // Aktifkan mode gelap
  //     body.classList.add('dark-mode');
  //   } else {
  //     // Nonaktifkan mode gelap
  //     body.classList.remove('dark-mode');
  //   }
  // }

  // Inisialisasi pada saat halaman dimuat
  // document.addEventListener('DOMContentLoaded', () => {
  //   setAdminLTEDarkMode();
  // });

  // Pantau perubahan preferensi tema
  // prefersDarkScheme.addListener(setAdminLTEDarkMode);

  //Copy
  $("body").on("click", "#btn-copy", function (event) {
      var copyText = document.getElementById("copy_target");
      copyText.type = 'text';
      copyText.select();
      document.execCommand('copy');
      copyText.type = 'hidden';
      swal({
        type: "success",
        title: "Success!",
        text: "Link has been copied!",
      });
    });
</script>

@yield('js-extra')

</body>
</html>
