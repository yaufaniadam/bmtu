<?php

namespace App\Services;

use App\Models\MarketingReport;
use Illuminate\Support\Facades\DB;

class MarketingReportService
{
    public static function StoreMarketingReport($partner_id, $request)
    {
        DB::transaction(
            function () use ($partner_id, $request) {
                MarketingReport::create(
                    [
                        'id_mitra_pembiayaan' => ''
                    ]
                );
            }
        );
    }
}
