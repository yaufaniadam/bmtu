<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Kajian;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KajianService
{
    public static function kajianIndexJson($request): JsonResponse
    {
        $model = Kajian::select('tr_kajian.*')
            ->leftJoin('tr_pegawai', 'tr_pegawai.id', '=', 'tr_kajian.id_pegawai')
            ->when(!empty($request->month), function ($q) use ($request) {
                $q->whereRaw("MONTH(tanggal) =" . $request->month);
            })
            ->when(!empty($request->year), function ($q) use ($request) {
                $q->whereRaw("YEAR(tanggal) =" . $request->year);
            })
            ->when(!empty($request->term), function ($q) use ($request) {
                $q->where('tr_pegawai.nama_lengkap', 'like', '%' . $request->term . '%')
                    ->orWhere('tr_kajian.faidah', 'like', '%' . $request->term . '%');
            });

        return DataTables::of($model)
            ->addColumn('employeeName', function (Kajian $kajian) {
                return $kajian->employee->nama_lengkap;
            })
            ->editColumn('tanggal', function (Kajian $kajian) {
                return $kajian->tanggal->isoFormat("D MMMM Y");
            })
            ->toJson();
    }

    public static function kajiansMonth()
    {
        $month_name = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $months = [];
        $q = Kajian::selectRaw("distinct(MONTH(tanggal)) as month")->orderBy('month', 'ASC')->get();
        foreach ($q as $item) {
            $months[] = [
                'id' => $item->month,
                'name' => $month_name[$item->month],
            ];
        }

        return $months;
    }

    public static function kajiansYear()
    {
        $years = [];
        $q = Kajian::selectRaw("distinct(YEAR(tanggal)) as year")->orderBy('year', 'ASC')->get();

        foreach ($q as $item) {
            $years[] = [
                'id' => $item->year,
            ];
        }
        return $years;
    }

    public static function kajiansEmployee()
    {
        $employees = [];
        $q = Kajian::selectRaw("distinct(id_pegawai) as id_pegawai")->get();
        foreach ($q as $item) {
            $employees[] = [
                'id' => $item->id_pegawai,
                'name' => Employee::find($item->id_pegawai)->nama_lengkap
            ];
        }
        return $employees;
    }

    public static function kajianIndex($employee_id): LengthAwarePaginator
    {
        return Kajian::where('id_pegawai', '=', $employee_id)->orderBy('tanggal', 'DESC')->paginate(10);
    }

    public static function storeKajian($request, $employee_id): Void
    {
        DB::transaction(
            function () use ($request, $employee_id) {
                Kajian::create(
                    [
                        'id_pegawai' => $employee_id,
                        'tanggal' => $request['tanggal'],
                        'faidah' => $request['faidah'],
                    ]
                );
            }
        );
    }
}
