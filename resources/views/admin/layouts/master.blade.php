<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title','Laravel Ecommerce ')
  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.partials.nav')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.partials.left-sidebar')
      <!-- partial -->

        @yield('content')

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>

  <script src="{{ asset('js/popper.min.js') }}" ></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
</script>


  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="js/maps.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
