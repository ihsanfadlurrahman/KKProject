@extends('layouts.master')

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="table-box">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h4>Laporan Keuangan</h4>
            <a href="{{ route('laporan.pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
                style="background:#16a34a; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none;">
                Export PDF
            </a>
        </div>

        <!-- Filter -->
        <form method="GET" style="display:flex; gap:10px; margin-bottom:20px;">
            <input type="number" name="bulan" min="1" max="12" value="{{ $bulan }}" style="padding:6px;">
            <input type="number" name="tahun" value="{{ $tahun }}" style="padding:6px;">
            <button type="submit" style="padding:6px 12px;">Filter</button>
        </form>

        <!-- Ringkasan -->
        <div style="display:flex; gap:20px; margin-bottom:20px;">
            <div style="background:#dcfce7; padding:15px; border-radius:6px;">
                <strong>Total Pemasukan</strong><br>
                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
            </div>

            <div style="background:#fee2e2; padding:15px; border-radius:6px;">
                <strong>Total Pengeluaran</strong><br>
                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </div>

            <div style="background:#dbeafe; padding:15px; border-radius:6px;">
                <strong>Laba / Rugi</strong><br>
                Rp {{ number_format($laba, 0, ',', '.') }}
            </div>
        </div>

        <hr>

        <h5>Detail Pemasukan</h5>
        <ul>
            @foreach ($pemasukan as $p)
                <li>{{ $p->sewa->penyewa->nama }} - Rp {{ number_format($p->jumlah, 0, ',', '.') }}</li>
            @endforeach
        </ul>

        <hr>

        <h5>Detail Pengeluaran</h5>
        <ul>
            @foreach ($pengeluaran as $p)
                <li>{{ $p->kategori }} - Rp {{ number_format($p->jumlah, 0, ',', '.') }}</li>
            @endforeach
        </ul>

    </div>
@endsection
