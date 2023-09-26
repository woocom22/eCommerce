<!DOCTYPE html>
<html lang="en">
	@include('frontend.inc.head')
	<body>
        @include('frontend.inc.header')

		<!-- NAVIGATION -->
        @include('frontend.inc.nav')
		<!-- /NAVIGATION -->
        @yield('content')
		<!-- FOOTER -->
		@include('frontend.inc.footer')
		<!-- /FOOTER -->

        @include('frontend.inc.frontendJs')
	</body>
</html>
