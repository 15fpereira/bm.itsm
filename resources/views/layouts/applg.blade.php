<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.parciais.head')
</head>
<body>

  <!-- @include('layouts.parciais.header') -->
    @yield('content')

</body>
</html>
