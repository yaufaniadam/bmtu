<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'tr_gaji';

    protected $fillable = [
        'bulan',
        'tahun',
        'nip',
        'judul',
        'style',
        'value',
    ];
}
