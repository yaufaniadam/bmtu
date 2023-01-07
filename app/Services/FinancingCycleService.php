<?php

namespace App\Services;

use App\Models\FinancingCycle;
use Illuminate\Support\Facades\DB;

class FinancingCycleService
{
    protected static $financing_cycle;

    public static function DetailFinancingCycle($financing_cycle_id)
    {
        static::$financing_cycle = FinancingCycle::findOrFail($financing_cycle_id);
        return new static;
    }

    public static function UpdateFinancingCycle($request)
    {
        DB::transaction(
            function () use ($request) {
                $financing_cycle = static::$financing_cycle;
                $financing_cycle->update(
                    [
                        'tanggal' => now(),
                        'keterangan' => $request['keterangan']
                    ]
                );

                if (empty(FinancingCycle::where([
                    ['id_laporan_marketing', '=', $financing_cycle->id_laporan_marketing],
                    ['id_cycle', '=', $financing_cycle->id_cycle + 1],
                ]))) {
                    if (in_array($financing_cycle->id_cycle, [1, 2, 3, 4])) {
                        FinancingCycle::create(
                            [
                                'id_laporan_marketing' => $financing_cycle->id_laporan_marketing,
                                'id_cycle' => $financing_cycle->id_cycle + 1,
                            ]
                        );
                    }
                }
            }
        );
    }

    public static function get()
    {
        return static::$financing_cycle;
    }
}
