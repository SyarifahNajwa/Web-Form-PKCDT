<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengangkutan extends Model
{
    use HasFactory;

    protected $table = 'pengangkutan';

    protected $fillable = [
        'penomoran_id',
        'cara_pengangkutan',
        'nama_sarkut',
        'no_flight',
        'pelabuhan_muat',
        'pelabuhan_bongkar',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
