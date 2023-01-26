<?php

namespace App\Imports;

use App\Models\Salary;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class SalaryImport implements ToModel
{
    /**
     * @param Collection $collection
     */

    public function model(array $row)
    {
        return new Salary();
    }

    // public function collection(Collection $collection)
    // {
    //     //
    // }
}
