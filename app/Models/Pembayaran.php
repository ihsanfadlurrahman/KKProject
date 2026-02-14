<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'pembayarans'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'sewa_id',
        'bulan',
        'tanggal_bayar',
        'jumlah',
        'status',
    ];
    public function sewa()
    {
        return $this->belongsTo(Sewa::class);
    }
}
