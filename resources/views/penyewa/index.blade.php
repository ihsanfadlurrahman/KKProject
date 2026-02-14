@extends('layouts.master')

@section('title', 'Data Penyewa')

@section('content')
<div class="table-box">

    <!-- HEADER + BUTTON -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h4>Data Penyewa</h4>
        <a href="{{ route('penyewa.create') }}"
           style="background:#2563eb; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-size:14px;">
            Tambah Penyewa
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
                <th>Nama Penyewa</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($penyewa as $index => $value)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->no_hp }}</td>
                    <td>{{ $value->alamat }}</td>
                    <td>
                        <div style="display:flex; gap:6px;">

                            <!-- Edit -->
                            <a href="{{ route('penyewa.edit', $value->id) }}"
                               style="background:#f59e0b; color:#fff; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none;">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('penyewa.destroy', $value->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus penyewa ini?');"
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
                    <td colspan="5" style="text-align:center; padding:15px;">
                        Belum ada data penyewa.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
