<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Employee;
use App\Services\AttendanceService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Gate::authorize('admin');

        if ($request->ajax()) {
            return EmployeeService::EmployeeSelection($request);
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

        return view('admin.attendance.create')
            ->with([
                'months' => $months
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        Gate::authorize('admin');
        AttendanceService::StoreEmployeeAttendances($request->validated());
        return redirect()->back()->with('success', 'Data Presensi berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip = null, $month = null, Request $request)
    {
        if ($request->ajax() && $request->has('keterangan')) {
            return AttendanceService::EmployeeAbsenceDetail($request);
        }

        // dd(AttendanceService::EmployeeAttendanceSummary($nip, $month));

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

        $exploded_url = explode('/', url()->current());

        if ($nip == null || $month == null) {
            $nip = Employee::where('user_id', '=', Auth::id())->first()->nip;
            $month = date('n');
            $exploded_url = explode('/', route('attendance.show', [$nip, $month]));
        }

        return view('admin.attendance.detail')
            ->with([
                'attendances' => AttendanceService::EmployeeAttendanceDetail($nip, $month),
                'attendance_summary' => AttendanceService::EmployeeAttendanceSummary($nip, $month),
                'url' => url()->current(),
                'months' => $months,
                'nip' => $nip,
                'employee_name' => Employee::where('nip', '=', $nip)->firstOrFail()->nama_lengkap,
                'selected_month' => $months[$exploded_url[6]],
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
