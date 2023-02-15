<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Placement;

class PositionService
{
    public static function EmployeePositionByNip($nip)
    {
        $employee_id = Employee::where('nip', '=', $nip)->firstOrFail()->id;

        return Placement::where('id_pegawai', '=', $employee_id)->latest()->firstOrFail();
    }
}
