<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'tr_cuti';

    protected $fillable = [
        'id_pegawai',
        'keperluan',
        'tanggal_mulai',
        'tanggal_berakhir'
    ];
}
