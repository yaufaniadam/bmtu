<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketingReportRequest;
use App\Models\Employee;
use App\Models\FinancingStatus;
use App\Services\EmployeeService;
use App\Services\FinancingCycleService;
use App\Services\MarketingReportService;
use App\Services\PartnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MarketingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin');
        // dd(MarketingReportService::MarketingReportIndex());

        return view('admin.marketing-reports.index')
            ->with(
                [
                    'employees' => MarketingReportService::MarketingReportIndex()
                ]
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($partner_id)
    {
        return view('employee.financing-partner.financing.create')->with(
            [
                'partner_id' => $partner_id,
                'title' => 'Tambah Mitra Pembiayaan'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarketingReportRequest $request)
    {;
        Gate::authorize('marketing_manager', 'marketing_employee', 'employee');
        $employee_id = Employee::where('user_id', '=', auth()->id())->firstOrFail()->id;
        MarketingReportService::StoreMarketingReport($employee_id, $request->validated());
        return redirect()->to(route('financing-partner.show', $request->id_mitra_pembiayaan));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_id, Request $request)
    {
        // return MarketingReportService::MarketingReportByEmployee($employee_id);
        if ($request->ajax()) {
            return MarketingReportService::MarketingReportByEmployee($employee_id);
        }

        return view('admin.marketing-reports.detail-employee')
            ->with(
                [
                    'employee' => EmployeeService::DetailEmployee($employee_id)->get(),
                ]
            );
    }

    public function detail($marketing_report_id)
    {
        // dd(FinancingCycleService::FinancingCycles($marketing_report_id));
        $marketing_report = MarketingReportService::MarketingReportDetail($marketing_report_id)->get();
        return view('admin.marketing-reports.detail')
            ->with(
                [
                    'marketing_report' => $marketing_report,
                    'partner' => PartnerService::DetailPartner($marketing_report->id_mitra_pembiayaan)->get(),
                    'financing_cycles' => FinancingCycleService::FinancingCycles($marketing_report_id),
                    'financing_status' => FinancingStatus::where('id_laporan_marketing', '=', $marketing_report_id)->first()->id_cycle
                ]
            );
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
