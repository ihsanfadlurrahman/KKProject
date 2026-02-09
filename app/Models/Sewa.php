<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

}
