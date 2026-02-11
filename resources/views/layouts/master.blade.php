<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Pendataan Kios & Kontrakan</title>
    <link href="{{ asset('../../assets/css/style.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body>
    @include('layouts.sidebar')
    <!-- MAIN -->
    <div class="main">
        @include('layouts.navbar')

        <!-- CONTENT -->
        <div class="content">
            @yield('content')

        </div>
    </div>

    @yield('js')

</body>

</html>
