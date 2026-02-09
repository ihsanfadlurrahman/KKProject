<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f5f7fa;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: #1e293b;
            color: #fff;
            height: 100vh;
            padding: 20px;
            position: fixed;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 18px;
            text-align: center;
        }

        .menu a {
            display: block;
            padding: 12px;
            margin-bottom: 8px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #2563eb;
            color: #fff;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            width: calc(100% - 240px);
        }

        /* TOPBAR */
        .topbar {
            background: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        /* CONTENT */
        .content {
            padding: 25px;
        }
    </style>

    @stack('css')
</head>
<body>

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    <div class="main">
        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Content --}}
        <div class="content">
            @yield('content')
        </div>
    </div>

    @stack('js')
</body>
</html>
