<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';

    protected $fillable = [
        'produksi_id',
        'tindakan',
        'tanggal',
        'pic'
    ];

    // RELASI KE PRODUKSI (MASALAH)
    public function produksi()
    {
        return $this->belongsTo(Produksi::class, 'produksi_id');
    }
}