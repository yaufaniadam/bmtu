<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $table = 'tr_keluarga';

    protected $fillable = [
        'id_pegawai',
        'nama',
        'status',
        'tanggal_lahir',
        'jenis_kelamin',
        'bpjs',
        'bpjs_ketenagakerjaan'
    ];
}
