<?php

namespace App\Services;

use App\Models\FinancingCycle;
use App\Models\MarketingReport;
use Illuminate\Support\Facades\DB;

class MarketingReportService
{
    public static function StoreMarketingReport($employee_id, $request)
    {
        DB::transaction(
            function () use ($employee_id, $request) {
                $marketing_report = MarketingReport::create(
                    [
                        'id_mitra_pembiayaan' => $request['id_mitra_pembiayaan'],
                        'id_pegawai' => $employee_id,
                        'jenis_pembiayaan' => $request['jenis_pembiayaan'],
                        'nominal' => $request['nominal'],
                        'keterangan' => $request['keterangan'],
                        'tanggal' => now(),
                    ]
                );

                FinancingCycle::create(
                    [
                        'id_laporan_marketing' => $marketing_report->id,
                        'id_cycle' => 1,
                    ]
                );
            }
        );
    }
}
