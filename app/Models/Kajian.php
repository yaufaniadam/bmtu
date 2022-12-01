<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    use HasFactory;
    protected $table = 'tr_kajian';

    protected $fillable = [
        'id_pegawai',
        'faidah',
        'foto',
        'tanggal'
    ];
}
