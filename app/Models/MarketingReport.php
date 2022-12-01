<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingReport extends Model
{
    use HasFactory;
    protected $table = 'tr_laporan_marketing';

    protected $fillable = [
        'id_mitra_pembiayaan',
        'id_cycle',
        'tanggal',
        'foto',
        'keterangan'
    ];
}
