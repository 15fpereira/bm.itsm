<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.parciais.head')
</head>
<body>
    @include('layouts.parciais.nav')
 <!-- @include('layouts.parciais.header') -->
    @yield('content')
    @include('layouts.parciais.footer')
</body>
</html>
