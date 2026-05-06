<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberitahu extends Model
{
    use HasFactory;

    protected $table = 'pemberitahu';

    protected $fillable = [
        'penomoran_id',
        'identitas_pemberitahu',
        'nama_pemberitahu',
        'alamat_pemberitahu',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
