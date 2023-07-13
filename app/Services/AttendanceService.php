<?php

namespace App\Services;

use App\Imports\AttendanceImport;
use App\Models\Attendance;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService
{
    public static function StoreEmployeeAttendances($request)
    {
        $raw = Excel::toArray(new AttendanceImport, $request['file_excel']);
        $raw_date = explode("~", $raw[0][2][2]);
        $month = date("n", strtotime($raw_date[0]));
        $year = date("Y", strtotime($raw_date[0]));

        $attendance = Attendance::where([
            'bulan' => $month,
            'tahun' => $year
        ])
            ->distinct('bulan')
            ->count();

        if ($attendance > 0) {
            throw new Exception("Data presensi bulan ini sudah ada.");
        }
        // dump($month);
        // dump($year);

        $date_data = [];
        $employee_data = [];
        $attendance_data = [];
        foreach ($raw as $key => $value) {
            $chunked_data = array_chunk($value, 3);
            foreach ($chunked_data as $key => $value) {
                if ($key != 0) {
                    $date_data[] = $value[0];
                    $employee_data[] = $value[1];
                    $attendance_data[] = $value[2];
                }
            }
        }

        foreach ($employee_data as $key => $employee) {
            foreach ($date_data[$key] as $key => $value) {
                // dump($employee[10]);
                DB::transaction(function () use ($key, $value, $employee, $month, $year) {
                    Attendance::create([
                        'nama_panggilan' => $employee[10],
                        'tanggal' => $year . "-" . $month . "-" . $value,
                        'bulan' => $month,
                        'tahun' => $year,
                    ]);
                });
            }
        }

        // dump($date_data);
        // dump($employee_data);
        // dump($attendance_data);

        // die();
        // $date = [];
        // $employee_data = [];
        // foreach ($raw as $key => $value) {
        //     foreach ($value[0] as $key => $isi) {
        //         if ($key != 0 && $key != 1 && $isi != null) {
        //             $date[] = $isi;
        //         }
        //     }

        //     foreach ($value as $key => $value) {
        //         if ($key != 1) {
        //             if ($key != 0) {
        //                 $employee_data[] = $value;
        //             }
        //         }
        //     }
        // }
        // foreach ($employee_data as $key => $value) {
        //     $nip = $value[1];
        //     unset($value[0]);
        //     unset($value[1]);
        //     $employee_attendance = array_chunk($value, 5);

        //     foreach ($date as $key => $value) {
        //         $php_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        //         $date_data = date_format($php_date, 'Y-m-d');
        //         $month = date_format($php_date, 'n');
        //         $year = date_format($php_date, 'Y');

        //         DB::transaction(function () use ($key, $nip, $date_data, $month, $year, $employee_attendance) {
        //             Attendance::create([
        //                 'nip' => $nip,
        //                 'tanggal' => $date_data,
        //                 'bulan' => $month,
        //                 'tahun' => $year,
        //                 'jam_masuk' => $employee_attendance[$key][0] == null ? '' : date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($employee_attendance[$key][0]), 'H:i:s'),
        //                 'jam_pulang' => $employee_attendance[$key][1] == null ? '' : date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($employee_attendance[$key][1]), 'H:i:s'),
        //                 'terlambat' => $employee_attendance[$key][2] == null ? '' : date_format(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($employee_attendance[$key][2]), 'H:i:s'),
        //                 'hadir' => $employee_attendance[$key][3],
        //                 'keterangan' => $employee_attendance[$key][4],
        //             ]);
        //         });
        //     }
        // }
    }

    public static function EmployeeAttendanceDetail($nama_panggilan, $month)
    {
        $attendances = Attendance::select(
            'tr_presensi.*'
        )
            ->where([
                ['tr_presensi.nama_panggilan', '=', $nama_panggilan],
                ['tr_presensi.bulan', '=', $month]
            ])
            ->leftJoin('tr_pegawai', 'tr_pegawai.nama_panggilan', '=', 'tr_presensi.nama_panggilan')
            ->get();
        return $attendances;
    }

    public static function EmployeeAttendanceSummary($nama_panggilan, $month)
    {
        $day_in = Attendance::where([
            ['tr_presensi.nama_panggilan', '=', $nama_panggilan],
            ['tr_presensi.bulan', '=', $month],
            ['tr_presensi.hadir', '!=', " "]
        ])->count();

        $late = Attendance::where([
            ['tr_presensi.nama_panggilan', '=', $nama_panggilan],
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
