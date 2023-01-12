<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinancingPartnerRequest;
use App\Models\Employee;
use App\Services\PartnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FinancingPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.financing-partner.index')
            ->with(
                [
                    'partners' => PartnerService::PartnerIndex()
                ]
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('employee,marketing_manager,marketing_employee');

        return view('employee.financing-partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinancingPartnerRequest $request)
    {
        Gate::authorize('employee,marketing_manager,marketing_employee');

        $employee_id = Employee::where('user_id', '=', Auth::id())->first()->id;
        $partner_id = PartnerService::StoreFinancingPartner($request->validated(), $employee_id);
        return redirect()->to(route('financing-partner.show', $partner_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($financing_partner_id)
    {
        // dd(PartnerService::DetailPartner($financing_partner_id)->get());
        // dd(auth()->id());
        return view('employee.financing-partner.detail')
            ->with(
                [
                    'partner' => PartnerService::DetailPartner($financing_partner_id)->get()
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
