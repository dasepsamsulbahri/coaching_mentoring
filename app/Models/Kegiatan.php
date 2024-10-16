<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_mentor',
        'nama_kegiatan',
        'jml_pertemuan',
        'metode_diskusi'
    ];

    public function mentor()
    {
        return $this->belongsTo(mentor::class);
    }
}
