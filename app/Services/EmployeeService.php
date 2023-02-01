<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public static $employee;

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

    public static function get(): Employee
    {
        return static::$employee;
    }
}
