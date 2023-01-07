<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketingReportRequest;
use App\Models\Employee;
use App\Services\MarketingReportService;
use Illuminate\Http\Request;

class MarketingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
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
    public function show($id)
    {
        abort(404);
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
