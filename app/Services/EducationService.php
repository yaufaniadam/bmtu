<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EducationService
{
    public static $education;

    public static function StoreEducationHistory($request): Void
    {
        DB::transaction(
            function () use ($request) {
                $user_id = Employee::findOrFail($request['id_pegawai'])->user_id;

                $file = $request['file_ijazah'];
                $fileName = $file->getClientOriginalName();
                $fileLocation = 'users/ijazah/' . $user_id . '/';
                Storage::putFileAs($fileLocation, $file, $fileName);
                // $file->move($fileLocation, $fileName);

                EmployeeEducation::create(
                    [
                        'id_pegawai' => $request['id_pegawai'],
                        'pendidikan' => $request['pendidikan'],
                        'nama_lembaga_pendidikan' => $request['nama_lembaga_pendidikan'],
                        'jurusan' => $request['jurusan'],
                        'tahun' => $request['tahun'],
                        'file_ijazah' => $fileLocation . $fileName
                    ]
                );
            }
        );
    }

    public static function DetailEducation($education_id): EducationService
    {
        static::$education = EmployeeEducation::findOrFail($education_id);

        return new static;
    }

    public static function UpdateEducation($user_id, $request)
    {
        $education = static::$education;
        DB::transaction(
            function () use ($user_id, $request, $education) {
                if (isset($request['file_ijazah'])) {
                    if (Storage::exists($education->file_ijazah)) {
                        Storage::delete($education->file_ijazah);
                    }

                    $file = $request['file_ijazah'];
                    $fileName = $file->getClientOriginalName();
                    $fileLocation = 'users/ijazah/' . $user_id . '/';
                    Storage::putFileAs($fileLocation, $file, $fileName);
                    // $file->move($fileLocation, $fileName);
                    $education->update(
                        [
                            'file_ijazah' => $fileLocation . $fileName
                        ]
                    );
                }

                $education->update(
                    [
                        'pendidikan' => $request['pendidikan'],
                        'nama_lembaga_pendidikan' => $request['nama_lembaga_pendidikan'],
                        'jurusan' => $request['jurusan'],
                        'tahun' => $request['tahun'],
                    ]
                );
            }
        );
    }

    public static function DeleteEducation()
    {
        $education = static::$education;
        DB::transaction(
            function () use ($education) {
                $education->delete();
            }
        );
    }

    public static function get()
    {
        return static::$education;
    }
}
