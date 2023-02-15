<?php

namespace App\Services;

use App\Imports\SalaryImport;
use App\Models\Employee;
use App\Models\Salary;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\Cast\Array_;
use Yajra\DataTables\Facades\DataTables;

class SalaryService
{
    public static function SalaryIndex($request)
    {
        $query = Salary::select('tahun', 'bulan', 'nip')
            ->where([
                ['tahun', '=', $request->year],
                ['bulan', '=', $request->month],
            ])
            ->distinct();

        $salary_index = DataTables::eloquent($query)
            ->addColumn('employee_name', function ($q) {
                $placeholder = Employee::where('nip', '=', $q->nip)->first()->nama_lengkap;
                $url = route('salary.show', [
                    'year' => $q->tahun,
                    'month' => $q->bulan,
                    'nip' => $q->nip
                ]);
                return view('datatables.link')
                    ->with([
                        'placeholder' => $placeholder,
                        'url' => $url,
                    ]);
            })
            ->addColumn('basic_salary', function ($q) {
                return "Rp " . number_format($q->where('judul', '=', 'Jumlah Gaji Tetap')->first()->value, 0, ",", ".");
            })
            ->addColumn('variable_salary', function ($q) {
                return "Rp " . number_format($q->where('judul', '=', 'Jumlah Gaji Variabel')->first()->value, 0, ",", ".");
            })
            ->addColumn('salary_cuts', function ($q) {
                return "Rp " . number_format($q->where('judul', '=', 'Jumlah Potongan')->first()->value, 0, ",", ".");
            })
            ->addColumn('total_salary', function ($q) {
                return "Rp " . number_format($q->where('judul', '=', 'Gaji Bersih')->first()->value, 0, ",", ".");
            })
            ->addColumn('paid_leave', function ($q) {
                return $q->where('judul', '=', 'Jatah Cuti')->first()->value;
            })
            ->toJson();

        return $salary_index;
    }

    public static function ImportSalaryFromExcel($request): Void
    {
        $raws = Excel::toArray(new SalaryImport, $request['file_excel']);

        foreach ($raws as $key => $value) {
            $column_name = $value[0];
            foreach ($value as $key => $value) {
                if ($key > 0) {
                    $nip = $value[0];
                    foreach ($value as $key => $value) {
                        if ($key > 0) {
                            DB::transaction(
                                function () use ($column_name, $value, $request, $nip, $key) {
                                    Salary::create(
                                        [
                                            'bulan' => $request['month'],
                                            'tahun' => $request['year'],
                                            'nip' => $nip,
                                            'judul' => $column_name[$key],
                                            'value' => $value
                                        ]
                                    );
                                }
                            );
                        }
                    }
                }
            }
        }

        // foreach ($raws as $key => $value) {
        //     $nip = $value[0][2];
        //     foreach ($value as $key => $value) {
        //         if ($key > 0) {
        //             Salary::create(
        //                 [
        //                     'bulan' => $request['month'],
        //                     'tahun' => $request['year'],
        //                     'nip' => $nip,
        //                     'judul' => $value[0],
        //                     'style' => $value[1],
        //                     'value' => $value[2]
        //                 ]
        //             );
        //         }
        //     }
        // }
    }

    public static function SalaryReportYear(): Collection
    {
        return Salary::select('tahun')->distinct()->get();
    }

    public static function SalaryDetail($year, $month, $nip): Collection
    {
        $q = Salary::where([
            ['tahun', '=', $year],
            ['bulan', '=', $month],
            ['nip', '=', $nip],
        ])->get();

        return $q;
    }

    public static function AvailableSalaryDate($nip)
    {
        $q = Salary::select('tahun', 'bulan')
            ->distinct()
            ->orderBy('tahun', 'ASC')
            ->where('nip', '=', $nip)->get();

        $months = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $mapped_date = [];

        foreach ($q as $date) {
            $mapped_date[] = [
                'year' => $date->tahun,
                'month' => $date->bulan,
                'url' => route('salary.employee-salary', ['year' => $date->tahun, 'month' => $date->bulan]),
                'placeholder' => $months[$date->bulan] . ' ' . $date->tahun
            ];
        }
        return $mapped_date;
    }

    public static function SelectedSalaryDate($year, $month)
    {
        $months = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        return $months[$month] . ' ' . $year;
    }
}
