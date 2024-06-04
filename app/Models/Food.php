<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';

    protected $fillable = [
        'jenis_makanan',
        'item_makanan',
        'tanggal_makan',
        'waktu_makan',
    ];
}
