<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';

    protected $fillable = [
        'line_id',
        'tanggal',
        'masalah',
        'status',
        'pic'
    ];

    // RELASI KE LINE
    public function line()
    {
        return $this->belongsTo(LokasiLine::class, 'line_id');
    }

    // RELASI KE TINDAKAN
    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'produksi_id');
    }
}