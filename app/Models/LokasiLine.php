<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiLine extends Model
{
    protected $table = 'lokasi_line';

    protected $fillable = [
        'nama_line',
        'deskripsi',
    ];

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'line_id');
    }
}