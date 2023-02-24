<?php

namespace App\Services;

use App\Imports\AttendanceImport;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService
{
    public static function StoreEmployeeAttendances($request)
    {
        $raw = Excel::toArray(new AttendanceImport, $request['file_excel']);

        $date = [];
        $employee_data = [];
        foreach ($raw as $key => $value) {
            foreach ($value[0] as $key => $isi) {
                if ($key != 0 && $key != 1 && $isi != null) {
                    $date[] = $isi;
                }
            }

            foreach ($value as $key => $value) {
                if ($key != 1) {
                    if ($key != 0) {
                        $employee_data[] = $value;
                    }
                }
            }
        }
        foreach ($employee_data as $key => $value) {
            $nip = $value[1];
            unset($value[0]);
            unset($value[1]);
            $employee_attendance = array_chunk($value, 5);

            foreach ($date as $key => $value) {
                $php_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
                $date_data = date_format($php_date, 'Y-m-d');
                $month = date_format($php_date, 'n');
                $year = date_format($php_date, 'Y');

                DB::transaction(function () use ($key, $nip, $date_data, $month, $year, $employee_attendance) {
                    Attendance::create([
                        'nip' => $nip,
                        'tanggal' => $date_data,
                        'bulan' => $month,
                        'tahun' => $year,
                        'jam_masuk' => $employee_attendance[$key][0] == null ? '' : date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($employee_attendance[$key][0]), 'H:i:s'),
                        'jam_pulang' => $employee_attendance[$key][1] == null ? '' : date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($employee_attendance[$key][1]), 'H:i:s'),
                        'terlambat' => $employee_attendance[$key][2] == null ? '' : date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($employee_attendance[$key][2]), 'H:i:s'),
                        'hadir' => $employee_attendance[$key][3],
                        'keterangan' => $employee_attendance[$key][4],
                    ]);
                });
            }
        }
    }

    public static function EmployeeAttendanceDetail($nip, $month)
    {
        $attendances = Attendance::select(
            'tr_presensi.*'
        )
            ->where([
                ['tr_presensi.nip', '=', $nip],
                ['tr_presensi.bulan', '=', $month]
            ])
            ->leftJoin('tr_pegawai', 'tr_pegawai.nip', '=', 'tr_presensi.nip')
            ->get();

        return $attendances;
    }

    public static function EmployeeAttendanceSummary($nip, $month)
    {
        $day_in = Attendance::where([
            ['tr_presensi.nip', '=', $nip],
            ['tr_presensi.bulan', '=', $month],
            ['tr_presensi.hadir', '!=', " "]
        ])->count();

        $late = Attendance::where([
            ['tr_presensi.nip', '=', $nip],
            ['tr_presensi.bulan', '=', $month],
            ['tr_presensi.terlambat', '!=', " "]
        ])->count();

        $attendance_summary = [
            'day_in' => $day_in,
            'late' => $late
        ];

        return $attendance_summary;
    }

    public static function EmployeeAbsenceDetail($request)
    {
        $absence_detail = Attendance::findOrFail($request->keterangan);
        return response()->json($absence_detail);
    }
}
