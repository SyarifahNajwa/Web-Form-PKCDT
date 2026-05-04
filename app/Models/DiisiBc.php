<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiisiBc extends Model
{
    use HasFactory;

    protected $table = 'diisi_bc';

    protected $fillable = [
        'penomoran_id',
        'nomor_bc11',
        'nomor_pos',
        'invoice',
        'tanggal_invoice',
        'nomor_bl_awb',
        'tanggal_bl_awb',
        'negara_asal',
        'valuta',
        'fob',
        'freight',
        'asuransi',
        'nilai_cif',
    ];

    protected $casts = [
        'tanggal_invoice' => 'date',
        'tanggal_bl_awb' => 'date',
        'fob' => 'decimal:2',
        'freight' => 'decimal:2',
        'asuransi' => 'decimal:2',
        'nilai_cif' => 'decimal:2',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
