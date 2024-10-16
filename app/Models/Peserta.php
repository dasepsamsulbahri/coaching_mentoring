<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kegiatan',
        'nip',
        'name',
        'unit_kerja',
        'satuan_kerja',
        'jabatan',
        'pangkat',
        'golongan',
    ];
}
