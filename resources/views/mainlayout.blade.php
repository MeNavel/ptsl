<!DOCTYPE html>

<html lang="en">

 <head>

   @include('partials.head')

 </head>

 <body>
    @include('partials.nav')

    @include('partials.css')

    @yield('content')

    {{-- @include('partials.footer') --}}

    @include('partials.footer-scripts')

 </body>

</html>