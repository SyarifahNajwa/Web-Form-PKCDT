<?php

namespace App\Models;

use App\Models\DataPemberitahuan;
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
    ];

    protected $casts = [
        'tanggal_pibk' => 'date',
    ];

    public function diisiBc()
    {
        return $this->hasOne(DiisiBc::class, 'penomoran_id');
    }

    public function dataPemberitahuan()
    {
        return $this->hasOne(DataPemberitahuan::class, 'penomoran_id');
    }
}