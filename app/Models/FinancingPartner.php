<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingPartner extends Model
{
    use HasFactory;
    protected $table = 'mitra_pembiayaan';

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'kabupaten',
        'telepon',
        'email',
        'jenis_pembiayaan',
        'pekerjaan',
        'pendidikan_terakhir'
    ];
}
