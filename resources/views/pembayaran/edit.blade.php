@extends('layouts.master')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="table-box" style="max-width:600px;">

    <h4 style="margin-bottom:20px;">Edit Pembayaran</h4>

    @if ($errors->any())
        <div style="background:#fee2e2; padding:10px; border-radius:6px; margin-bottom:15px; color:#b91c1c;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li style="font-size:14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Info Penyewa -->
        <div style="margin-bottom:15px;">
            <label>Penyewa & Unit</label>
            <input type="text"
                   value="{{ $pembayaran->sewa->penyewa->nama }} - {{ $pembayaran->sewa->unit->nama_unit }}"
                   disabled
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px; background:#f1f5f9;">
        </div>

        <!-- Bulan -->
        <div style="margin-bottom:15px;">
            <label>Bulan</label>
            <input type="month"
                   name="bulan"
                   value="{{ \Carbon\Carbon::parse($pembayaran->bulan)->format('Y-m') }}"
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <!-- Tanggal Bayar -->
        <div style="margin-bottom:15px;">
            <label>Tanggal Bayar</label>
            <input type="date"
                   name="tanggal_bayar"
                   value="{{ $pembayaran->tanggal_bayar }}"
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <!-- Jumlah -->
        <div style="margin-bottom:20px;">
            <label>Jumlah</label>
            <input type="number"
                   name="jumlah"
                   value="{{ $pembayaran->jumlah }}"
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <div style="display:flex; gap:10px;">
            <button type="submit"
                    style="background:#2563eb; color:#fff; padding:8px 14px; border:none; border-radius:6px;">
                Update
            </button>

            <a href="{{ route('pembayaran.index') }}"
               style="background:#94a3b8; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none;">
                Batal
            </a>
        </div>

    </form>

</div>
@endsection
