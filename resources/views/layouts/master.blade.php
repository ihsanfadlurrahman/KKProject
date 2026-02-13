<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Pendataan Kios & Kontrakan</title>
    <link href="{{ asset('../../assets/css/style.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<style>
    #floatingClock {
        position: fixed;
        top: 100px;
        right: 30px;
        background: #1e293b;
        color: #fff;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 14px;
        cursor: move;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        user-select: none;
    }
</style>
<div id="floatingClock">
    <span id="clockText"></span>
</div>
<script>
    // 🔥 Real-time clock
    function updateClock() {
        const now = new Date();

        const formatted =
            now.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) +
            " | " +
            now.toLocaleTimeString('id-ID');

        document.getElementById('clockText').innerText = formatted;
    }

    setInterval(updateClock, 1000);
    updateClock();

    // 🔥 Drag functionality
    const clock = document.getElementById("floatingClock");

    let isDragging = false;
    let offsetX, offsetY;

    clock.addEventListener("mousedown", function(e) {
        isDragging = true;
        offsetX = e.clientX - clock.offsetLeft;
        offsetY = e.clientY - clock.offsetTop;
    });

    document.addEventListener("mousemove", function(e) {
        if (isDragging) {
            clock.style.left = (e.clientX - offsetX) + "px";
            clock.style.top = (e.clientY - offsetY) + "px";
            clock.style.right = "auto";
        }
    });

    document.addEventListener("mouseup", function() {
        isDragging = false;
    });
</script>

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
