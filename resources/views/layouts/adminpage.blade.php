<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('partials._header ')
        @include('partials._aside')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @yield('content')

        </main>
        @include('partials._footer')
    </div>

    @include('partials._scripts')
</body>


</html>
