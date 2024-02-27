<!DOCTYPE html>
<html lang="en">

@include('partials\head')

<body>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @yield('content')
        @include('partials\footer')
    </main>
  
</body>


</html>
