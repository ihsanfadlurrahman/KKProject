<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::with(['sewa.penyewa', 'sewa.unit'])
            ->latest()
            ->get();

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // hanya sewa yang masih aktif
        $sewa = Sewa::with(['penyewa', 'unit'])
            ->where('status', 'aktif')
            ->get();

        return view('pembayaran.create', compact('sewa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sewa_id'      => 'required|exists:sewas,id',
            'bulan'        => 'required|date_format:Y-m',
            'tanggal_bayar' => 'required|date',
            'jumlah'       => 'required|numeric|min:0',
        ]);

        // ❌ Cegah pembayaran bulan yang sama untuk sewa yang sama
        $sudahAda = Pembayaran::where('sewa_id', $validated['sewa_id'])
            ->where('bulan', $validated['bulan'])
            ->exists();

        if ($sudahAda) {
            return back()
                ->withInput()
                ->with('error', 'Pembayaran untuk bulan ini sudah ada.');
        }

        Pembayaran::create([
            'sewa_id'       => $validated['sewa_id'],
            'bulan'         => $validated['bulan'] . '-01', // 🔥 tambahin ini
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'jumlah'        => $validated['jumlah'],
            'status'        => 'lunas',
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $sewa = Sewa::with(['penyewa', 'unit'])
            ->where('status', 'aktif')
            ->get();

        return view('pembayaran.edit', compact('pembayaran', 'sewa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'bulan'         => 'required|date_format:Y-m',
            'tanggal_bayar' => 'required|date',
            'jumlah'        => 'required|numeric|min:0',
        ]);

        $bulanFix = $validated['bulan'] . '-01';

        // ❌ Cegah duplicate bulan kecuali record ini sendiri
        $sudahAda = Pembayaran::where('sewa_id', $pembayaran->sewa_id)
            ->where('bulan', $bulanFix)
            ->where('id', '!=', $pembayaran->id)
            ->exists();

        if ($sudahAda) {
            return back()
                ->withInput()
                ->with('error', 'Pembayaran untuk bulan ini sudah ada.');
        }

        $pembayaran->update([
            'bulan'         => $bulanFix,
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'jumlah'        => $validated['jumlah'],
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
