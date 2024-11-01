<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kegiatan',
        'id_mentor',
        'nip',
        'nama_peserta',
        'unit_kerja',
        'satuan_kerja',
        'jabatan',
        'pangkat',
        'golongan',
    ];
}
