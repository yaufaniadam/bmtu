<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\FinancingCycle;
use App\Models\FinancingStatus;
use App\Models\MarketingReport;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MarketingReportService
{
    protected static $marketing_report;

    public static function MarketingReportIndex()
    {
        $employees = Employee::select('tr_pegawai.*')
            ->leftJoin('users', 'users.id', '=', 'tr_pegawai.user_id')
            ->where('users.role', '!=', 1)
            ->has('marketingReports')
            ->paginate(10)
            ->withPath('marketing-reports');

        return $employees;
    }

    public static function MarketingReportByEmployee($employee_id)
    {
        $model = MarketingReport::where('id_pegawai', '=', $employee_id);

        $marketing_reports = DataTables::eloquent($model)
            ->addColumn('partnerName', function (MarketingReport $marketing_report) {
                return $marketing_report->partner->nama_lengkap;
            })
            ->addColumn('month', function (MarketingReport $marketing_report) {
                return $marketing_report->tanggal->isoFormat('MMMM');
            })
            ->addColumn('year', function (MarketingReport $marketing_report) {
                return $marketing_report->tanggal->isoFormat('Y');
            })
            ->addColumn('phone', function (MarketingReport $marketing_report) {
                return $marketing_report->partner->telepon;
            })
            ->addColumn('address', function (MarketingReport $marketing_report) {
                return $marketing_report->partner->alamat;
            })
            ->addColumn('detail', function ($query) {
                return view('datatables.link')->with(
                    [
                        'url' => route('marketing-report.detail', $query->id),
                        'placeholder' => "<i class='fas fa-fw fa-eye'></i>"
                    ]
                );
            })
            ->toJson();

        return $marketing_reports;
    }

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

                FinancingStatus::create(
                    [
                        'id_laporan_marketing' => $marketing_report->id,
                        'id_cycle' => 1,
                    ]
                );
            }
        );
    }

    public static function MarketingReportDetail($marketing_report_id)
    {
        static::$marketing_report = MarketingReport::findOrFail($marketing_report_id);
        return new static;
    }

    public static function get()
    {
        return static::$marketing_report;
    }
}
