<?php

namespace App\Models;

use App\Models\Penomoran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pfpd extends Model
{
    use HasFactory;

    protected $table = 'pfpd';

    protected $fillable = [
        'penomoran_id',
        'nama_pfpd',
        'nip_pfpd',
    ];

    public function penomoran()
    {
        return $this->belongsTo(Penomoran::class, 'penomoran_id');
    }
}
