<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.inc.head')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        @include('admin.inc.header')
        @include('admin.inc.sidebar')

      <!-- Main Content -->
      @yield('content')
      @include('admin.inc.footer')
    </div>
  </div>

 @include('admin.inc.adminJs')
</body>
</html>
