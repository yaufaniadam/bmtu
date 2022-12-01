<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'tr_presensi';

    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'bulan',
        'tahun',
        'jam_masuk',
        'jam_pulang'
    ];
}
