<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportSalaryRequest;
use App\Imports\SalaryImport;
use App\Models\Employee;
use App\Models\Salary;
use App\Services\EmployeeService;
use App\Services\PositionService;
use App\Services\SalaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return (SalaryService::SalaryIndex($request));

        if ($request->ajax()) {
            return (SalaryService::SalaryIndex($request));
        }

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

        return view('admin.salary.index')
            ->with([
                'requested_year' => $request->year,
                'requested_month' => $request->month,
                'salary_report_years' => SalaryService::SalaryReportYear(),
                'months' => $months,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('admin.salary.create')
            ->with([
                'months' => $months,
                'salary_report_years' => SalaryService::SalaryReportYear(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImportSalaryRequest $request)
    {
        // $raw = Excel::toArray(new SalaryImport, $request->file_excel);
        // dd($raw);
        SalaryService::ImportSalaryFromExcel($request->validated());
        return redirect()->back()->with('success', 'Laporan gaji pegawai berhasil diimport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($year, $month, $nip)
    {
        // dd(SalaryService::SalaryDetail($year, $month, $nip));
        // dd(PositionService::EmployeePositionByNip($nip)->position->posisi);
        return view('admin.salary.detail')
            ->with([
                'employee' => EmployeeService::DetailEmployeeByNip($nip)->get(),
                'position' => PositionService::EmployeePositionByNip($nip)->position->posisi,
                'salary_detail' => SalaryService::SalaryDetail($year, $month, $nip)
            ]);
    }

    public function employee_salary($year = null, $month = null)
    {
        $nip = Employee::where('user_id', '=', Auth::user()->id)->firstOrFail()->nip;
        $available_date = SalaryService::AvailableSalaryDate($nip);

        if ($year == null) {
            $year = date('Y');
        }
        if ($month == null) {
            $month = date('n');
        }

        $salary = SalaryService::SalaryDetail($year, $month, $nip);

        return view('employee.salary.detail')
            ->with([
                'salary_detail' => $salary,
                'available_date' => $available_date,
                'selected_date' => SalaryService::SelectedSalaryDate($year, $month)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
