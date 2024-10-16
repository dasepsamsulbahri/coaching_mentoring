<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mentor extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'image'
    ];

    public function kegiatan(){
        return $this->hasOne(Kegiatan::class);
    }
}
