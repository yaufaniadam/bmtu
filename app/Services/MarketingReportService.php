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

    public static function MarketingReportIndex($request)
    {
        $q = Employee::select('tr_pegawai.*')
            ->leftJoin('users', 'users.id', '=', 'tr_pegawai.user_id')
            ->where('users.role', '!=', 1)
            ->when(!empty($request->term), function ($q) use ($request) {
                $q->where('tr_pegawai.nama_lengkap', 'like', '%' . $request->term . '%');
            })
            ->has('marketingReports');

        $employees = DataTables::eloquent($q)
            ->editColumn('nama_lengkap', function ($q) {
                return view('datatables.link')->with([
                    'url' => route('marketing-reports.show', $q->id),
                    'placeholder' => $q->nama_lengkap
                ]);
            })
            ->addColumn('reports', function (Employee $employee) {
                return $employee->marketingReports->count();
            })
            ->addColumn('finished_reports', function (Employee $employee) {
                return $employee->marketingReportsDone->count();
            })

            ->toJson();

        return $employees;
    }

    public static function MarketingReportByEmployee($employee_id, $request)
    {
        $model = MarketingReport::select('tr_laporan_marketing.*')
            ->leftJoin('tr_mitra_pembiayaan', 'tr_mitra_pembiayaan.id', '=', 'tr_laporan_marketing.id_mitra_pembiayaan')
            ->where('tr_laporan_marketing.id_pegawai', '=', $employee_id)
            ->when(!empty($request->term), function ($q) use ($request) {
                $q->where('tr_mitra_pembiayaan.nama_lengkap', 'like', "%" . $request->term . "%");
            })
            ->when(!empty($request->month), function ($q) use ($request) {
                $q->whereRaw("MONTH(tr_laporan_marketing.tanggal) =" . $request->month);
            })
            ->when(!empty($request->year), function ($q) use ($request) {
                $q->whereRaw("YEAR(tr_laporan_marketing.tanggal) =" . $request->year);
            });


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
            ->addColumn('status', function ($q) {
                return $q->financingStatus->statusName->cycle;
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

    public static function MarketingReportsMonth($employee_id)
    {
        $months = [];

        $q = MarketingReport::where('id_pegawai', '=', $employee_id)->orderBy(DB::raw("Month(tanggal)"))->get();

        foreach ($q as $q) {
            $months[] = [
                'id' => date_format($q->tanggal, 'n'),
                'name' => $q->tanggal->isoFormat("MMMM"),
            ];
        }

        return $months;
    }

    public static function MarketingReportsYear($employee_id)
    {
        $years = [];

        $q = MarketingReport::where('id_pegawai', '=', $employee_id)->orderBy('tanggal')->get();

        foreach ($q as $q) {
            $years[] = [
                'id' => date_format($q->tanggal, 'Y'),
            ];
        }

        return $years;
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
