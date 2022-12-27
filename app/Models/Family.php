<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $table = 'tr_keluarga';
    protected $casts = [
        // 'tanggal_lahir' => 'datetime:Y-M-d',
        'tanggal_lahir' => 'date',
    ];

    protected $fillable = [
        'id_pegawai',
        'nama',
        'status',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'bpjs',
        'bpjs_ketenagakerjaan'
    ];
}
