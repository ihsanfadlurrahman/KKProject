<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'pengeluarans'; // Sesuaikan dengan nama tabel
    protected $fillable = [
    'tanggal',
    'kategori',
    'keterangan',
    'jumlah',
];
}
