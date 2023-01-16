<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingStatus extends Model
{
    use HasFactory;
    protected $table = 'tr_status_pembiayaan';
    protected $fillable = [
        'id_laporan_marketing',
        'id_cycle'
    ];

    public function marketingReport()
    {
        return $this->belongsTo(MarketingReport::class, 'id_laporan_marketing');
    }

    public function statusName()
    {
        return $this->belongsTo(Cycle::class, 'id_cycle');
    }
}
