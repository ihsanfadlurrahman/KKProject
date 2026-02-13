@extends('layouts.master')

@section('title', 'Edit Sewa')

@section('content')

    <div class="table-box" style="max-width:600px;">

        <h4 style="margin-bottom:20px;">Edit Sewa</h4>

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

        <form id="formSewa" action="{{ route('sewa.update', $sewa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Penyewa -->
            <div style="margin-bottom:15px;">
                <label>Pilih Penyewa</label>
                <select name="penyewa_id" style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
                    @foreach ($penyewa as $value)
                        <option value="{{ $value->id }}"
                            {{ old('penyewa_id', $sewa->penyewa_id) == $value->id ? 'selected' : '' }}>
                            {{ $value->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Unit -->
            <div style="margin-bottom:15px;">
                <label>Pilih Unit</label>
                <select name="unit_id" style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}"
                            {{ old('unit_id', $sewa->unit_id) == $unit->id ? 'selected' : '' }}>
                            {{ $unit->nama_unit }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Mulai -->
            <div style="margin-bottom:15px;">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $sewa->tanggal_mulai) }}"
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
            </div>

            <!-- Tanggal Selesai -->
            <div style="margin-bottom:15px;">
                <label>Tanggal Selesai</label>
                <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                    value="{{ old('tanggal_selesai', $sewa->tanggal_selesai) }}"
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
            </div>

            <!-- Status -->
            <div style="margin-bottom:20px;">
                <label>Status</label>
                <select name="status" id="status_sewa"
                    style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
                    <option value="aktif" {{ old('status', $sewa->status) == 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="selesai" {{ old('status', $sewa->status) == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>
            </div>

            <!-- Buttons -->
            <div style="display:flex; gap:10px;">
                <button type="submit"
                    style="background:#2563eb; color:#fff; padding:8px 14px; border:none; border-radius:6px;">
                    Update
                </button>

                <a href="{{ route('sewa.index') }}"
                    style="background:#94a3b8; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none;">
                    Batal
                </a>
            </div>

        </form>

    </div>
    <script>
        document.getElementById('formSewa').addEventListener('submit', function(e) {

            const status = document.getElementById('status_sewa').value;
            const tanggalSelesai = document.getElementById('tanggal_selesai').value;

            if (status === 'selesai' && tanggalSelesai) {

                const today = new Date();
                const endDate = new Date(tanggalSelesai);

                // reset jam supaya tidak beda timezone
                today.setHours(0, 0, 0, 0);
                endDate.setHours(0, 0, 0, 0);

                if (endDate > today) {

                    const confirmResult = confirm(
                        "Tanggal berakhir sewa belum tiba.\nApakah Anda yakin ingin menyelesaikan sewa ini sekarang?"
                    );

                    if (!confirmResult) {
                        e.preventDefault();
                    }
                }
            }
        });
    </script>

@endsection
