<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzin extends Model
{
    use HasFactory;

    protected $table = 'surat_izin';

    protected $fillable = [
        'penomoran_id',
        'nomor_surat_izin_pjt_ppjk',
        'tanggal_surat_izin_pjt_ppjk',
    ];

    protected $casts = [
        'tanggal_surat_izin_pjt_ppjk' => 'date',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
