<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        // Pemasukan
        $pemasukan = Pembayaran::whereMonth('bulan', $bulan)
            ->whereYear('bulan', $tahun)
            ->where('status', 'lunas')
            ->get();

        $totalPemasukan = $pemasukan->sum('jumlah');

        // Pengeluaran
        $pengeluaran = Pengeluaran::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        $totalPengeluaran = $pengeluaran->sum('jumlah');

        $laba = $totalPemasukan - $totalPengeluaran;

        return view('laporan.index', compact(
            'pemasukan',
            'pengeluaran',
            'totalPemasukan',
            'totalPengeluaran',
            'laba',
            'bulan',
            'tahun'
        ));
    }
    public function exportPdf(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $pemasukan = Pembayaran::whereMonth('bulan', $bulan)
            ->whereYear('bulan', $tahun)
            ->where('status', 'lunas')
            ->get();

        $totalPemasukan = $pemasukan->sum('jumlah');

        $pengeluaran = Pengeluaran::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        $totalPengeluaran = $pengeluaran->sum('jumlah');
        $laba = $totalPemasukan - $totalPengeluaran;

        $pdf = Pdf::loadView('laporan.pdf', compact(
            'pemasukan',
            'pengeluaran',
            'totalPemasukan',
            'totalPengeluaran',
            'laba',
            'bulan',
            'tahun'
        ));

        return $pdf->download("laporan-$bulan-$tahun.pdf");
    }
}
