<?php

namespace App\Services;

use App\Models\FinancingCycle;
use App\Models\FinancingStatus;
use App\Models\MarketingReport;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public static function UpdateFinancingCycle($request, $employee_id)
    {
        if (MarketingReport::find(static::$financing_cycle->id_laporan_marketing)->id_pegawai != $employee_id) {
            throw new Exception("Unauthorized Employee", 403);
        }

        DB::transaction(
            function () use ($request) {
                $financing_cycle = static::$financing_cycle;
                $financing_cycle->update(
                    [
                        'tanggal' => now(),
                        'keterangan' => $request['keterangan']
                    ]
                );

                if (isset($request['foto'])) {
                    // if (File::exists(public_path($financing_cycle->foto))) {
                    //     File::delete(public_path($financing_cycle->foto));
                    // }
                    // $file = $request['foto'];
                    // $fileName = $file->getClientOriginalName();
                    // $fileLocation = 'mitra/pembiayaan/' . $financing_cycle->id_laporan_marketing . '/' . $financing_cycle->id . '/';
                    // $file->move($fileLocation, $fileName);

                    if ($financing_cycle->foto != null) {
                        if (Storage::exists($financing_cycle->foto)) {
                            Storage::delete($financing_cycle->foto);
                        }
                    }

                    $file = $request['foto'];
                    $fileName = str_replace(" ", "_", $file->getClientOriginalName());
                    $fileLocation = 'mitra/pembiayaan/' . $financing_cycle->id_laporan_marketing . '/' . $financing_cycle->id . '/';
                    Storage::putFileAs($fileLocation, $file, $fileName);

                    $financing_cycle->update(
                        [
                            'tanggal' => now(),
                            'foto' => $fileLocation . $fileName
                        ]
                    );
                }

                $financing_status = FinancingStatus::where('id_laporan_marketing', '=', $financing_cycle->id_laporan_marketing)->first();
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
                        $financing_status->update(
                            [
                                'id_cycle' => $financing_cycle->id_cycle + 1
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
