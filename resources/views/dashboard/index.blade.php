@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <!-- CARDS -->
    <div class="cards">
        <div class="card">
            <h4>Total Unit</h4>
            <p>{{ $totalUnit }}</p>
        </div>

        <div class="card">
            <h4>Disewa</h4>
            <p>{{ $disewa }}</p>
        </div>

        <div class="card">
            <h4>Kosong</h4>
            <p>{{ $kosong }}</p>
        </div>

        <div class="card">
            <h4>Pemasukan Bulan Ini</h4>
            <p>Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</p>
        </div>
    </div>
@endsection
