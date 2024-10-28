<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'id_peserta',
        'id_kegiatan',
        'title',
        'description',
        'status',
        'keterangan',
        'file'
    ];
}
