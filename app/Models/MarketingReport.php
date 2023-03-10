<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingReport extends Model
{
    use HasFactory;
    protected $table = 'tr_laporan_marketing';
    protected $casts = [
        'tanggal' => 'date',
    ];

    protected $fillable = [
        'id_mitra_pembiayaan',
        'id_pegawai',
        'id_pembiayaan',
        'jenis_pembiayaan',
        'nominal',
        'tanggal',
        'keterangan'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_pegawai');
    }

    public function partner()
    {
        return $this->belongsTo(FinancingPartner::class, 'id_mitra_pembiayaan');
    }

    public function cycles()
    {
        return $this->hasMany(FinancingCycle::class, 'id_laporan_marketing');
    }

    public function financingStatus()
    {
        return $this->hasOne(FinancingStatus::class, 'id_laporan_marketing');
    }
}
