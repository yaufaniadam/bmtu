<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingStatus extends Model
{
    use HasFactory;
    protected $table = 'tr_status_pembiayaan';

    public function marketingReport()
    {
        return $this->belongsTo(MarketingReport::class, 'id_laporan_marketing');
    }
}
