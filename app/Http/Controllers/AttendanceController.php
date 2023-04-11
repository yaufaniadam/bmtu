<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Employee;
use App\Services\AttendanceService;
use App\Services\EmployeeService;
use Exception;
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
        try {
            AttendanceService::StoreEmployeeAttendances($request->validated());
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
        return redirect()->back()->with('success', 'Data Presensi berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $nama_panggilan = null, $month = null)
    {
        if ($request->ajax() && $request->has('keterangan')) {
            return AttendanceService::EmployeeAbsenceDetail($request);
        }

        // dd(AttendanceService::EmployeeAttendanceSummary($nama_panggilan, $month));

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

        if ($nama_panggilan == null || $month == null) {
            $nama_panggilan = Employee::where('user_id', '=', Auth::id())->first()->nama_panggilan;
            $month = date('n');
            $exploded_url = explode('/', route('attendance.show', [$nama_panggilan, $month]));
        }

        return view('admin.attendance.detail')
            ->with([
                'attendances' => AttendanceService::EmployeeAttendanceDetail($nama_panggilan, $month),
                'attendance_summary' => AttendanceService::EmployeeAttendanceSummary($nama_panggilan, $month),
                'url' => url()->current(),
                'months' => $months,
                'nip' => $nama_panggilan,
                'employee_name' => Employee::where('nama_panggilan', '=', $nama_panggilan)->firstOrFail()->nama_lengkap,
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
