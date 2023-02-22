<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public static $employee;

    public static function EmployeeSelection($request)
    {
        $employees = Employee::select('tr_pegawai.*')
            ->limit(10)
            ->leftJoin('users', 'users.id', '=', 'tr_pegawai.user_id')
            ->when($request->has('q'), function ($query) use ($request) {
                $query->where('nama_lengkap', 'LIKE', "%$request->q%");
            })
            ->where('users.role', '!=', 1)
            ->get();

        return response()->json($employees);
    }

    public static function DetailEmployee($employee_id): EmployeeService
    {
        static::$employee = Employee::findOrFail($employee_id);

        return new static;
    }

    public static function DetailEmployeeByNip($employee_nip): EmployeeService
    {
        static::$employee = Employee::where('nip', '=', $employee_nip)->firstOrFail();

        return new static;
    }

    // public static function EmployeePartners($employee_id){
    //     return 
    // }

    public static function get(): Employee
    {
        return static::$employee;
    }
}
