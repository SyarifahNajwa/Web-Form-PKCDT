<?php

namespace App\Models;

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

    // Relationships
    public function pengirim()
    {
        return $this->hasOne(Pengirim::class);
    }

    public function penerima()
    {
        return $this->hasOne(Penerima::class);
    }

    public function pemberitahu()
    {
        return $this->hasOne(Pemberitahu::class);
    }

    public function suratIzin()
    {
        return $this->hasOne(SuratIzin::class);
    }

    public function pengangkutan()
    {
        return $this->hasOne(Pengangkutan::class);
    }

    public function pib()
    {
        return $this->hasOne(Pib::class);
    }

    public function uraianBarangs()
    {
        return $this->hasMany(UraianBarang::class);
    }

    public function pfpd()
    {
        return $this->hasOne(Pfpd::class);
    }

    public function pemeriksa()
    {
        return $this->hasOne(Pemeriksa::class);
    }

    public function jaminan()
    {
        return $this->hasOne(Jaminan::class);
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class);
    }
}