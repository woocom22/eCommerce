<!DOCTYPE html>
<html lang="zxx">

@include('frontend.inc.head')
<body>
    <!-- Humberger Begin -->
@include('frontend.inc.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
@include('frontend.inc.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
@include('frontend.inc.hero')
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
@include('frontend.inc.categorySection')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
@yield('content')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
@include('frontend.inc.banner')
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
@include('frontend.inc.latestProduct')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
 @include('frontend.inc.blog')
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
@include('frontend.inc.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('frontend.inc.frontendJs')



</body>

</html>
