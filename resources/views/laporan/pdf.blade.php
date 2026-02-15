<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h2 { margin-bottom: 5px; }
    </style>
</head>
<body>

<h2>Laporan Keuangan</h2>
<p>Bulan: {{ $bulan }} / {{ $tahun }}</p>

<h3>Ringkasan</h3>
<table>
    <tr>
        <th>Total Pemasukan</th>
        <td>Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <th>Total Pengeluaran</th>
        <td>Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <th>Laba / Rugi</th>
        <td>Rp {{ number_format($laba, 0, ',', '.') }}</td>
    </tr>
</table>

<h3>Detail Pemasukan</h3>
<table>
    <thead>
        <tr>
            <th>Penyewa</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemasukan as $p)
        <tr>
            <td>{{ $p->sewa->penyewa->nama }}</td>
            <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Detail Pengeluaran</h3>
<table>
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengeluaran as $p)
        <tr>
            <td>{{ $p->kategori }}</td>
            <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
