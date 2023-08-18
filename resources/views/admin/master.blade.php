<!DOCTYPE html>
<html lang="en">

@include('admin.inc.head')

<body>

  <!-- ======= Header ======= -->
    @include('admin.inc.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('admin.inc.sidebar')
  <!-- End Sidebar-->
  <main id="main" class="main">
    @yield('content')
      </main>
 <!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('admin.inc.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('admin.inc.adminJs')
  @yield('script')

</body>

</html>
