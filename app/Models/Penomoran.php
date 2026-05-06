<?php

namespace App\Models;

use App\Models\DataPemberitahuan;
use App\Models\DiisiBc;
use App\Models\Jaminan;
use App\Models\Pemberitahu;
use App\Models\Pemeriksa;
use App\Models\Pemeriksaan;
use App\Models\Pengangkutan;
use App\Models\Pengirim;
use App\Models\Penerima;
use App\Models\Pib;
use App\Models\Pfpd;
use App\Models\SuratIzin;
use App\Models\UraianBarang;
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

    public function pengirim()
    {
        return $this->hasOne(Pengirim::class, 'penomoran_id');
    }

    public function penerima()
    {
        return $this->hasOne(Penerima::class, 'penomoran_id');
    }

    public function pemberitahu()
    {
        return $this->hasOne(Pemberitahu::class, 'penomoran_id');
    }

    public function suratIzin()
    {
        return $this->hasOne(SuratIzin::class, 'penomoran_id');
    }

    public function pengangkutan()
    {
        return $this->hasOne(Pengangkutan::class, 'penomoran_id');
    }

    public function pib()
    {
        return $this->hasOne(Pib::class, 'penomoran_id');
    }

    public function uraianBarang()
    {
        return $this->hasOne(UraianBarang::class, 'penomoran_id');
    }

    public function pfpd()
    {
        return $this->hasOne(Pfpd::class, 'penomoran_id');
    }

    public function pemeriksa()
    {
        return $this->hasOne(Pemeriksa::class, 'penomoran_id');
    }

    public function jaminan()
    {
        return $this->hasOne(Jaminan::class, 'penomoran_id');
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class, 'penomoran_id');
    }
}