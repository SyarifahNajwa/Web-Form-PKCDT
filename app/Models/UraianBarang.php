<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianBarang extends Model
{
    use HasFactory;

    protected $table = 'uraian_barang';

    protected $fillable = [
        'penomoran_id',
        'uraian_barang',
        'jumlah_kemasan',
        'berat',
        'nilai_cif',
        'kota_pibk',
        'pemberitahu',
        'np',
        'pos_tarif_hs',
        'ndpbm',
        'dalam_rupiah',
        'bm',
        'cukai',
        'ppn',
        'ppnbm',
        'pph',
        'total',
    ];

    protected $casts = [
        'berat' => 'decimal:2',
        'nilai_cif' => 'decimal:2',
        'ndpbm' => 'decimal:2',
        'dalam_rupiah' => 'decimal:2',
        'bm' => 'decimal:2',
        'cukai' => 'decimal:2',
        'ppn' => 'decimal:2',
        'ppnbm' => 'decimal:2',
        'pph' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
