<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class AttendanceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    // public function mapping(): array
    // {
    //     return [
    //         'id_pegawai' => '1',
    //         'tanggal' => '2',
    //         'bulan' => '3',
    //         'tahun' => '4',
    //         'jam_masuk' => '5',
    //         'jam_pulang' => '6',
    //     ];
    // }

    public function model(array $row)
    {
        return new Attendance([
            'id_pegawai' => $row[1],
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'bulan' => $row[3],
            'tahun' => $row[4],
            'jam_masuk' =>  $row[5],
            'jam_pulang' => $row[6]
        ]);
        // return new Attendance([
        //     'id_pegawai' => $row['id_pegawai'],
        //     'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
        //     'bulan' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['bulan']),
        //     'tahun' => $row['tahun'],
        //     'jam_masuk' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['jam_masuk']),
        //     'jam_pulang' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['jam_pulang'])
        // ]);
    }
}
