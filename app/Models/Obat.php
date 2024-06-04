<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'dosis',
        'satuan',
        'periode',
        'hari_pilihan',
        'jam_minum',
        'aturan_minum',
        'tanggal_mulai',
        'lama_konsumsi',
        'satuan_konsumsi',
        'catatan',
    ];

    protected $casts = [
        'hari_pilihan' => 'array',
        'jam_minum' => 'array',
    ];
}
