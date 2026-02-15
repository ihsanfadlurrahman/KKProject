@extends('layouts.master')

@section('title', 'Data Pengeluaran')

@section('content')
<div class="table-box">

    <!-- HEADER + BUTTON -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h4>Data Pengeluaran</h4>
        <a href="{{ route('pengeluaran.create') }}"
           style="background:#2563eb; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-size:14px;">
            Tambah Pengeluaran
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
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pengeluaran as $index => $value)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $value->tanggal }}</td>
                    <td>{{ $value->kategori }}</td>
                    <td>{{ $value->keterangan ?? '-' }}</td>
                    <td>Rp {{ number_format($value->jumlah, 0, ',', '.') }}</td>
                    <td>
                        <div style="display:flex; gap:6px;">

                            <!-- Edit -->
                            <a href="{{ route('pengeluaran.edit', $value->id) }}"
                               style="background:#f59e0b; color:#fff; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none;">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('pengeluaran.destroy', $value->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus pengeluaran ini?');"
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
                    <td colspan="6" style="text-align:center; padding:15px;">
                        Belum ada data pengeluaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
