<?php

namespace App\Models;

use App\Models\DiisiBc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penomoran extends Model
{
    use HasFactory;

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

    public function diisiBc()
    {
        return $this->hasOne(DiisiBc::class, 'penomoran_id');
    }
}