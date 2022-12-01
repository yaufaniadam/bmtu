<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $table = 'tr_prestasi';

    protected $fillable = [
        'id_pegawai',
        'prestasi',
        'tanggal'
    ];
}
