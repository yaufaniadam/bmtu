<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingCycle extends Model
{
    use HasFactory;

    protected $table = 'tr_cycle_pembiayaan';

    protected $casts = [
        'tanggal' => 'date',
    ];

    protected $fillable = [
        'id_laporan_marketing',
        'id_cycle',
        'keterangan',
        'foto',
        'tanggal',
    ];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'id_cycle');
    }
}
