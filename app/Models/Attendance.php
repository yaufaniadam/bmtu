<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'tr_presensi';
    protected $casts = [
        'tanggal' => 'date',
        // 'jam_masuk' => 'datetime',
        // 'jam_pulang' => 'datetime',
    ];

    protected $fillable = [
        'id_pegawai',
        'nip',
        'tanggal',
        'bulan',
        'tahun',
        'jam_masuk',
        'jam_pulang',
        'terlambat',
        'hadir',
        'keterangan'
    ];
}
