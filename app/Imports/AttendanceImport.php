<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Attendance([
            'id_pegawai' => $row[1],
            'tanggal' => $row[2],
            'bulan' => $row[3],
            'tahun' => $row[4],
            'jam_masuk' => $row[5],
            'jam_pulang' => $row[6]
        ]);
    }
}
