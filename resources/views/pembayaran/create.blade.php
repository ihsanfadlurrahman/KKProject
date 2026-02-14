@extends('layouts.master')

@section('title', 'Tambah Pembayaran')

@section('content')

    <div class="table-box" style="max-width:600px;">

        <h4 style="margin-bottom:20px;">Tambah Pembayaran</h4>

        @if ($errors->any())
            <div style="background:#fee2e2; padding:10px; border-radius:6px; margin-bottom:15px; color:#b91c1c;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li style="font-size:14px;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div style="background:#fee2e2; color:#b91c1c; padding:10px; border-radius:6px; margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf

            <!-- Pilih Sewa -->
            <div style="margin-bottom:15px;">
                <label>Pilih Penyewa & Unit</label>
                <select name="sewa_id" style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
                    <option value="">-- Pilih Sewa Aktif --</option>
                    @foreach ($sewa as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->penyewa->nama }} - {{ $value->unit->nama_unit }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bulan -->
            <div style="margin-bottom:15px;">
                <label>Bulan Pembayaran</label>
                <input type="month" name="bulan" value="{{ old('bulan') }}"
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
            </div>

            <!-- Tanggal Bayar -->
            <div style="margin-bottom:15px;">
                <label>Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" value="{{ old('tanggal_bayar') }}"
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
            </div>

            <!-- Jumlah -->
            <div style="margin-bottom:20px;">
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan nominal"
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
            </div>

            <div style="display:flex; gap:10px;">
                <button type="submit"
                    style="background:#2563eb; color:#fff; padding:8px 14px; border:none; border-radius:6px;">
                    Simpan
                </button>

                <a href="{{ route('pembayaran.index') }}"
                    style="background:#94a3b8; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none;">
                    Batal
                </a>
            </div>

        </form>

    </div>

@endsection
