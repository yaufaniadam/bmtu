<?php

namespace App\Services;

use App\Models\FinancingPartner;
use Illuminate\Support\Facades\DB;

class PartnerService
{
    protected static $financing_partner;

    public static function PartnerIndex()
    {
        $partners = FinancingPartner::paginate(10);
        $partners->withPath('financing-partner');
        return $partners;
    }

    public static function StoreFinancingPartner($request, $employee_id)
    {
        // dd($request);
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
            }
        );
    }

    public static function DetailPartner($financing_partner_id)
    {
        static::$financing_partner = FinancingPartner::findOrFail($financing_partner_id);
        return new static;
    }

    public static function get()
    {
        return static::$financing_partner;
    }
}
