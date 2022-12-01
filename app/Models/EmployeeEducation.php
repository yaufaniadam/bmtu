<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    use HasFactory;
    protected $table = 'tr_pendidikan_pegawai';

    protected $fillable = [
        'id_pegawai',
        'pendidikan',
        'tahun',
        'file_ijazah',
        'nama_lembaga_pendidikan',
        'jurusan'
    ];
}
