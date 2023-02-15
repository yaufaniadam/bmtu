<?php

namespace App\Services;

use App\Models\Cycle;
use App\Models\FinancingPartner;
use App\Models\MarketingReport;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PartnerService
{
    protected static $financing_partner;
    protected static $partner_id;

    public static function PartnerIndex($role, $employee_id = null)
    {
        if ($role == 1) {
            $partners = FinancingPartner::orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $partners = FinancingPartner::where('id_pegawai', '=', $employee_id)
                ->orderBy('created_at', 'DESC')->paginate(10);
        }
        return $partners;
    }

    public static function PartnerIndexJson($request)
    {
        $q = FinancingPartner::orderBy('created_at', 'DESC');
        $index = DataTables::eloquent($q)
            ->editColumn('nama_lengkap', function ($q) {
                return view('datatables.link')
                    ->with([
                        'url' => route('financing-partner.show', $q->id),
                        'placeholder' => $q->nama_lengkap
                    ]);
            })
            ->addColumn('employee', function ($q) {
                return $q->employee->nama_lengkap;
            })
            ->toJson();

        return $index;
    }

    public static function StoreFinancingPartner($request, $employee_id)
    {
        DB::transaction(
            function () use ($request, $employee_id) {
                $financing_partner = FinancingPartner::create(
                    [
                        'id_pegawai' => $employee_id,
                        'nama_lengkap' => $request['nama_lengkap'],
                        'alamat' => $request['alamat'],
                        'kabupaten' => $request['kabupaten'],
                        'telepon' => $request['telepon'],
                        'email' => $request['email'],
                        'pekerjaan' => $request['pekerjaan'],
                        'pendidikan_terakhir' => $request['pendidikan_terakhir'],
                    ]
                );

                // dd($financing_partner->id);

                $file = $request['foto'];
                $fileName = $file->getClientOriginalName();
                $fileLocation = 'mitra/photo/' . $financing_partner->id . '/';
                $file->move($fileLocation, $fileName);

                $financing_partner->update(
                    [
                        'foto' => $fileLocation . $fileName,
                    ]
                );

                self::$partner_id = $financing_partner->id;
            }
        );

        return self::$partner_id;
    }

    public static function DetailPartner($financing_partner_id)
    {
        static::$financing_partner = FinancingPartner::findOrFail($financing_partner_id);
        return new static;
    }

    public static function PartnerFinancingJson()
    {
        $financing_partner = static::$financing_partner;

        $financings = [];
        $q = MarketingReport::where('id_mitra_pembiayaan', '=', $financing_partner->id)->orderBy('created_at', 'DESC')->get();
        $index = 1;
        foreach ($q as $key => $value) {
            $financings[] = [
                'id' => $value->id,
                'no' => $index++,
                'jenis_pembiayaan' => $value->jenis_pembiayaan,
                'tanggal' => $value->tanggal->isoFormat('D MMMM Y'),
                'status' => Cycle::find($value->financingStatus->id_cycle)->cycle,
                'id_status' => Cycle::find($value->financingStatus->id_cycle)->id,
                'marketing' => $value->employee->nama_lengkap
            ];
        }

        return DataTables::of($financings)
            ->editColumn('jenis_pembiayaan', function ($financing) {
                return view('datatables.link')->with([
                    'url' => route('marketing-report.detail', $financing['id']),
                    'placeholder' => $financing['jenis_pembiayaan']
                ]);
            })
            ->toJson();
    }

    public static function get()
    {
        return static::$financing_partner;
    }
}
