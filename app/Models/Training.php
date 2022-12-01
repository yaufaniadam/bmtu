<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = 'tr_pelatihan';

    protected $fillable = [
        'id_pegawai',
        'nama_pelatihan',
        'tanggal'
    ];
}
