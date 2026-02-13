@extends('layouts.master')

@section('title', 'Edit Penyewa')

@section('content')

<div class="table-box" style="max-width:600px;">

    <h4 style="margin-bottom:20px;">Edit Penyewa</h4>

    {{-- Error Validation --}}
    @if ($errors->any())
        <div style="background:#fee2e2; padding:10px; border-radius:6px; margin-bottom:15px; color:#b91c1c;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li style="font-size:14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penyewa.update', $penyewa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:6px;">Nama Penyewa</label>
            <input type="text"
                   name="nama"
                   value="{{ old('nama', $penyewa->nama) }}"
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <!-- No HP -->
        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:6px;">No HP</label>
            <input type="text"
                   name="no_hp"
                   value="{{ old('no_hp', $penyewa->no_hp) }}"
                   style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
        </div>

        <!-- Alamat -->
        <div style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:6px;">Alamat</label>
            <textarea name="alamat"
                      rows="3"
                      style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">{{ old('alamat', $penyewa->alamat) }}</textarea>
        </div>

        <!-- Buttons -->
        <div style="display:flex; gap:10px;">
            <button type="submit"
                    style="background:#2563eb; color:#fff; padding:8px 14px; border:none; border-radius:6px;">
                Update
            </button>

            <a href="{{ route('penyewa.index') }}"
               style="background:#94a3b8; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none;">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection
