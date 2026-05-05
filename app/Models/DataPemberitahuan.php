<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemberitahuan extends Model
{
    use HasFactory;

    protected $table = 'data_pemberitahuan';

    protected $fillable = [
        'penomoran_id',
        'nama_barang',
        'alamat_pengiriman',
        'identitas_penerima',
        'nama_penerima',
        'alamat_penerima',
        'identitas_pemberitahu',
        'nama_pemberitahu',
        'alamat_pemberitahu',
        'no_tgl_izin_pjt',
        'cara_pengangkut',
        'nama_sarana_angkut',
        'no_flight',
        'pelabuhan_muat',
        'pelabuhan_bongkar',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
