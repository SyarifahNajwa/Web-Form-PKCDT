<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penomoran extends Model
{
    use HasFactory;

    // TAMBAHKAN BARIS INI:
    protected $table = 'penomoran'; 

    protected $fillable = [
        'penomoran',
        'tanggal_pibk',
        'nama_pfpd',
        'nip_pfpd',
    ];

    protected $casts = [
        'tanggal_pibk' => 'date',
    ];
}