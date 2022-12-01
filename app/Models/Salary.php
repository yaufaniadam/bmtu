<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'tr_gaji';

    protected $fillable = [
        'id_pegawai',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total',
        'sisa_cuti',
        'hari_kerja'
    ];
}
