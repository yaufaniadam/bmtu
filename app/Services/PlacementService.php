<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Placement;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PlacementService
{
    static $placement;

    public static function PlacementIndex($request)
    {
        $model = Placement::select(
            'tr_penempatan.*',
            'tr_pegawai.nama_lengkap as employee_name',
            'tr_pegawai.id as employee_id',
            'tr_pegawai.foto as employee_photo',
            'tr_pegawai.nip as employee_idcard',
            'mstr_cabang.cabang as branch',
            'mstr_posisi.posisi as position',
            DB::raw("DATEDIFF(tr_penempatan.tanggal_selesai,NOW()) as remaining_days")
        )
            ->join('tr_pegawai', 'tr_pegawai.id', '=', 'tr_penempatan.id_pegawai')
            ->join('mstr_cabang', 'mstr_cabang.id', '=', 'tr_penempatan.id_cabang')
            ->join('mstr_posisi', 'mstr_posisi.id', '=', 'tr_penempatan.id_posisi')
            ->where('tr_penempatan.status_penempatan', '=', 1)
            ->when(!empty($request->term), function ($q) use ($request) {
                $q->where('tr_pegawai.nama_lengkap', 'like', '%' . $request->term . '%');
            })
            ->orderBy('remaining_days', 'ASC');

        $placements = DataTables::eloquent($model)
            ->addColumn('photo', function ($placement) {
                return view('datatables.photo')->with(['src' => url('image?file=' . $placement->employee_photo)]);
            })
            ->editColumn('remaining_days', function ($placement) {
                return $placement->remaining_days . ' hari';
            })
            ->editColumn('employee_name', function ($placement) {
                return view('datatables.link')
                    ->with([
                        'url' => route('placement.show', $placement->employee_id),
                        'placeholder' => $placement->employee_name,
                    ]);
            })
            ->toJson();

        return $placements;
    }

    public static function LaravelPaginatedPlacementIndex($employee_id)
    {
        $placements = Placement::where('id_pegawai', '=', $employee_id)->orderBy('tanggal_mulai', 'DESC')->paginate(10);
        $placements->withPath('placement');
        return $placements;
    }

    public static function SelectEmployeeForPlacement($request)
    {
        $employees = Employee::select('tr_pegawai.*')
            ->limit(10)
            ->leftJoin('users', 'users.id', '=', 'tr_pegawai.user_id')
            ->when($request->has('q'), function ($query) use ($request) {
                $query->where('nama_lengkap', 'LIKE', "%$request->q%");
            })
            ->where('users.role', '!=', 1)
            ->whereNotIn('tr_pegawai.id', Placement::select('id_pegawai')->get()->toArray())
            ->get();

        return response()->json($employees);
    }

    public static function SelectBranchForPlacement($request): JsonResponse
    {
        $branches = Branch::when($request->has('q'), function ($query) use ($request) {
            $query->where('cabang', 'LIKE', "%$request->q%");
        })
            ->get();

        return response()->json($branches);
    }

    public static function StoreEmployeePlacement($request): Void
    {
        // dd($request);

        DB::transaction(
            function () use ($request) {
                $user_id = Employee::find($request['id_pegawai'])->user_id;

                $old_placement = Placement::where('id_pegawai', '=', $user_id)->latest()->first();

                if ($old_placement != null) {
                    $old_placement->update(
                        [
                            'status_penempatan' => 0
                        ]
                    );
                }

                $placement = Placement::create(
                    [
                        'id_pegawai' => $request['id_pegawai'],
                        'id_cabang' => $request['id_cabang'],
                        'id_posisi' => $request['id_posisi'],
                        'tanggal_mulai' => $request['tanggal_mulai'],
                        'tanggal_selesai' => $request['tanggal_selesai'],
                        'status_penempatan' => 1
                    ]
                );

                $file = $request['file_sk'];
                $fileName = $file->getClientOriginalName();

                $fileLocation = 'users/file_sk/' . $user_id . '/' . $placement->id . '/';
                // $file->move($fileLocation, $fileName);
                Storage::putFileAs($fileLocation, $file, $fileName);

                $placement->update(
                    [
                        'file_sk' => $fileLocation . $fileName
                    ]
                );
            }
        );
    }

    public static function DetailPlacement($placement_id): PlacementService
    {
        static::$placement = Placement::findOrFail($placement_id);
        return new static;
    }

    public static function UpdatePlacement($request)
    {
        DB::transaction(function () use ($request) {
            $placement = static::$placement;
            $placement->update(
                [
                    'id_cabang' => $request['id_cabang'],
                    'id_posisi' => $request['id_posisi'],
                    'tanggal_mulai' => $request['tanggal_mulai'],
                    'tanggal_selesai' => $request['tanggal_selesai'],
                ]
            );

            if (isset($request['file_sk'])) {
                $user_id = Employee::find($placement->id_pegawai)->user_id;
                if (Storage::exists($placement->file_sk)) {
                    Storage::delete($placement->file_sk);
                }

                $file = $request['file_sk'];
                $fileName = $file->getClientOriginalName();
                $fileLocation = 'users/file_sk/' . $user_id . '/' . $placement->id . '/';
                // $file->move($fileLocation, $fileName);
                Storage::putFileAs($fileLocation, $file, $fileName);

                $placement->update(
                    [
                        'file_sk' => $fileLocation . $fileName
                    ]
                );
            }
        });
    }

    public static function get(): Placement
    {
        return static::$placement;
    }
}
