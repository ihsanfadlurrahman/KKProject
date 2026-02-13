<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <div class="menu">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>

        <a href="{{ route('units.index') }}" class="{{ request()->routeIs('units.*') ? 'active' : '' }}">
            Unit
        </a>
        <a href="{{ route('penyewa.index') }}" class="{{ request()->routeIs('penyewa.*') ? 'active' : '' }}">
            Penyewa
        </a>
        <a href="">Sewa</a>
        <a href="#">Pembayaran</a>
        <a href="#">Pengeluaran</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</div>

{{-- <div class="sidebar">
    <h2>Admin Panel</h2>

    <div class="menu">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('unit.index') }}" class="{{ request()->routeIs('unit.*') ? 'active' : '' }}">
            Unit
        </a>

        <a href="{{ route('penyewa.index') }}" class="{{ request()->routeIs('penyewa.*') ? 'active' : '' }}">
            Penyewa
        </a>

        <a href="{{ route('sewa.index') }}" class="{{ request()->routeIs('sewa.*') ? 'active' : '' }}">
            Sewa
        </a>

        <a href="{{ route('pembayaran.index') }}" class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
            Pembayaran
        </a>

        <a href="{{ route('pengeluaran.index') }}" class="{{ request()->routeIs('pengeluaran.*') ? 'active' : '' }}">
            Pengeluaran
        </a>

        <hr style="margin:15px 0; border-color:#334155">

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
</div> --}}
