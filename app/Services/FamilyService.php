<?php

namespace App\Services;

use App\Models\Family;
use Illuminate\Support\Facades\DB;

class FamilyService
{
    public static $family;

    public static function StoreFamilyMember($request)
    {
        DB::transaction(
            function () use ($request) {
                Family::create(
                    [
                        'id_pegawai' => $request['id_pegawai'],
                        'nama' => $request['nama_keluarga'],
                        'jenis_kelamin' => $request['jenis_kelamin_keluarga'],
                        'status' => $request['status_keluarga'],
                        'tempat_lahir' => $request['tempat_lahir_keluarga'],
                        'tanggal_lahir' => $request['tanggal_lahir_keluarga'],
                        'bpjs' => isset($request['bpjs_keluarga']) == true ? 'Ya' : null,
                        'bpjs_ketenagakerjaan' => isset($request['bpjs_ketenagakerjaan_keluarga']) == true ? 'Ya' : null,
                    ]
                );
            }
        );
    }

    public static function DetailFamilyMember($family_member_id): FamilyService
    {
        static::$family = Family::findOrFail($family_member_id);
        return new static;
    }

    public static function UpdateFamilyMember($request): Void
    {
        $family = static::$family;
        DB::transaction(function () use ($family, $request) {
            $family->update(
                [
                    'nama' => $request['nama'],
                    'status' => $request['status'],
                    'tempat_lahir' => $request['tempat_lahir'],
                    'tanggal_lahir' => $request['tanggal_lahir'],
                    'jenis_kelamin' => $request['jenis_kelamin'],
                    'bpjs' => isset($request['bpjs']) == true ? 'Ya' : null,
                    'bpjs_ketenagakerjaan' => isset($request['bpjs_ketenagakerjaan']) == true ? 'Ya' : null,
                ]
            );
        });
    }

    public function DeleteFamilyMember()
    {
        $family = static::$family;
        DB::transaction(function () use ($family) {
            $family->delete();
        });
    }

    public function get()
    {
        return static::$family;
    }
}
