@extends('layouts.master')

@section('title', 'Data Pembayaran')

@section('content')
<div class="table-box">

    <!-- HEADER + BUTTON -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h4>Data Pembayaran</h4>
        <a href="{{ route('pembayaran.create') }}"
           style="background:#2563eb; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-size:14px;">
            Tambah Pembayaran
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:10px; border-radius:6px; margin:15px 0;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
        <div style="background:#fee2e2; color:#b91c1c; padding:10px; border-radius:6px; margin:15px 0;">
            {{ session('error') }}
        </div>
    @endif

    <table style="margin-top:15px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Penyewa</th>
                <th>Unit</th>
                <th>Bulan</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pembayaran as $index => $value)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $value->sewa->penyewa->nama ?? '-' }}</td>
                    <td>{{ $value->sewa->unit->nama_unit ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($value->bulan)->translatedFormat('F Y') }}</td>
                    <td>{{ $value->tanggal_bayar }}</td>
                    <td>Rp {{ number_format($value->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if($value->status == 'lunas')
                            <span style="background:#22c55e; color:#fff; padding:4px 8px; border-radius:6px; font-size:12px;">
                                Lunas
                            </span>
                        @else
                            <span style="background:#ef4444; color:#fff; padding:4px 8px; border-radius:6px; font-size:12px;">
                                Belum
                            </span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:6px;">

                            <!-- Edit -->
                            <a href="{{ route('pembayaran.edit', $value->id) }}"
                               style="background:#f59e0b; color:#fff; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none;">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('pembayaran.destroy', $value->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?');"
                                  style="margin:0;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="background:#ef4444; color:#fff; padding:6px 10px; border:none; border-radius:6px; font-size:13px; cursor:pointer;">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center; padding:15px;">
                        Belum ada data pembayaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
