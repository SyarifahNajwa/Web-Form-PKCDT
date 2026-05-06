<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksa extends Model
{
    use HasFactory;

    protected $table = 'pemeriksa';

    protected $fillable = [
        'penomoran_id',
        'nama_pemeriksa',
        'nip_pemeriksa',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
