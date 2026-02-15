@extends('layouts.master')

@section('title', 'Edit Pengeluaran')

@section('content')
<div class="table-box" style="max-width:600px;">

    <h4 style="margin-bottom:20px;">Edit Pengeluaran</h4>

    {{-- Error --}}
    @if ($errors->any())
        <div style="background:#fee2e2; padding:10px; border-radius:6px; margin-bottom:15px; color:#b91c1c;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li style="font-size:14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tanggal -->
        <div style="margin-bottom:15px;">
            <label>Tanggal</label>
            <input type="date"
                   name="tanggal"
                   value="{{ old('tanggal', $pengeluaran->tanggal) }}"
                   required
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <!-- Kategori -->
        <div style="margin-bottom:15px;">
            <label>Kategori</label>
            <select name="kategori"
                    required
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
                <option value="">-- Pilih Kategori --</option>
                <option value="listrik" {{ old('kategori', $pengeluaran->kategori) == 'listrik' ? 'selected' : '' }}>Listrik</option>
                <option value="air" {{ old('kategori', $pengeluaran->kategori) == 'air' ? 'selected' : '' }}>Air</option>
                <option value="perbaikan" {{ old('kategori', $pengeluaran->kategori) == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                <option value="lainnya" {{ old('kategori', $pengeluaran->kategori) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <!-- Keterangan -->
        <div style="margin-bottom:15px;">
            <label>Keterangan</label>
            <input type="text"
                   name="keterangan"
                   value="{{ old('keterangan', $pengeluaran->keterangan) }}"
                   required
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <!-- Jumlah -->
        <div style="margin-bottom:20px;">
            <label>Jumlah (Rp)</label>
            <input type="number"
                   name="jumlah"
                   value="{{ old('jumlah', $pengeluaran->jumlah) }}"
                   required
                   min="0"
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <div style="display:flex; gap:10px;">
            <button type="submit"
                    style="background:#2563eb; color:#fff; padding:8px 14px; border:none; border-radius:6px;">
                Update
            </button>

            <a href="{{ route('pengeluaran.index') }}"
               style="background:#94a3b8; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none;">
                Batal
            </a>
        </div>

    </form>

</div>
@endsection
