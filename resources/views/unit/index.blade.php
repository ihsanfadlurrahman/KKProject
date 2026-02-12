@extends('layouts.master')

@section('title', 'Data Unit')

@section('content')
    <div class="table-box">

        <!-- HEADER + BUTTON -->
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h4>Data Unit</h4>
            <a href="{{ route('units.create') }}"
                style="background:#2563eb; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-size:14px;">
                Tambah Unit
            </a>
        </div>

        @if (session('success'))
            <div style="background:#dcfce7; color:#166534; padding:10px; border-radius:6px; margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        <table style="margin-top:15px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Unit</th>
                    <th>Tipe</th>
                    <th>Harga Sewa</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($units as $index => $value)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $value->nama_unit }}</td>
                        <td>{{ $value->tipe }}</td>
                        <td>Rp {{ number_format($value->harga_sewa, 0, ',', '.') }}</td>
                        <td>{{ $value->status }}</td>
                        <td>{{ $value->keterangan }}</td>
                        <td>
                            <div style="display:flex; gap:6px;">

                                <!-- Edit -->
                                <a href="{{ route('units.edit', $value->id) }}"
                                    style="background:#f59e0b;
                  color:#fff;
                  padding:6px 10px;
                  border-radius:6px;
                  font-size:13px;
                  text-decoration:none;">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('units.destroy', $value->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus unit ini?');"
                                    style="margin:0;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        style="background:#ef4444;
                           color:#fff;
                           padding:6px 10px;
                           border:none;
                           border-radius:6px;
                           font-size:13px;
                           cursor:pointer;">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
