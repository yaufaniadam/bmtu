<?php

namespace App\Services;

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
        $model = Kajian::query();

        return DataTables::of($model)
            ->editColumn('tanggal', function (Kajian $kajian) {
                return $kajian->tanggal->isoFormat("D MMMMM Y");
            })
            ->toJson();
    }

    public static function kajianIndex($employee_id): LengthAwarePaginator
    {
        return Kajian::where('id_pegawai', '=', $employee_id)->paginate(10);
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
