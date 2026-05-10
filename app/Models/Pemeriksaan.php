<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $fillable = [
        'penomoran_id',
        'hari',
        'tanggal',
        'nama',
        'contoh',
        'foto',
        'catatan',
        'jam_mulai_periksa',
        'jam_selesai_periksa',
        'lokasi_pemeriksaan',
        'kondisi_segel',
        'jumlah_satuan_barang',
        'satuan_barang',
        'jenis_kemasan',
        'ukuran_kemasan',
        'spesifikasi',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam_mulai_periksa' => 'datetime:H:i',
        'jam_selesai_periksa' => 'datetime:H:i',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
