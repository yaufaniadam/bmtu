<?php

namespace App\Services;

use App\Models\FinancingCycle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FinancingCycleService
{
    protected static $financing_cycle;

    public static function FinancingCycles($marketing_report_id)
    {
        return FinancingCycle::where('id_laporan_marketing', '=', $marketing_report_id)->get();
    }

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

                if (File::exists(public_path($financing_cycle->foto))) {
                    File::delete(public_path($financing_cycle->foto));
                }

                if (isset($request['foto'])) {
                    $file = $request['foto'];
                    $fileName = $file->getClientOriginalName();
                    $fileLocation = 'mitra/pembiayaan/' . $financing_cycle->id_laporan_marketing . '/' . $financing_cycle->id . '/';
                    $file->move($fileLocation, $fileName);

                    $financing_cycle->update(
                        [
                            'tanggal' => now(),
                            'foto' => $fileLocation . $fileName
                        ]
                    );
                }

                if (empty(FinancingCycle::where(
                    [
                        ['id_laporan_marketing', '=', $financing_cycle->id_laporan_marketing],
                        ['id_cycle', '=', $financing_cycle->id_cycle + 1],
                    ]
                )->first())) {
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
