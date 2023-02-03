<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlacementRequest;
use App\Http\Requests\UpdatePlacementRequest;
use App\Models\Branch;
use App\Models\Position;
use App\Services\EmployeeService;
use App\Services\PlacementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return PlacementService::PlacementIndex();

        if (Auth::user()->role == 1) {
            Gate::authorize('admin');
            if ($request->ajax()) {
                return PlacementService::PlacementIndex();
            }
            return view('admin.placement.index');
        }

        Gate::authorize('employee');
        return view('employee.placement.index')
            ->with(
                [
                    'placements' => PlacementService::LaravelPaginatedPlacementIndex(Auth::id())
                ]
            );
    }

    public function create_new_contract($employee_id)
    {
        Gate::authorize('admin');
        return view('admin.placement.new-contract')
            ->with(
                [
                    'employee' => EmployeeService::DetailEmployee($employee_id)->get(),
                    'positions' => Position::all(),
                ]
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Gate::authorize('admin');

        if ($request->ajax() && $request->type == 'employee') {
            return PlacementService::SelectEmployeeForPlacement($request);
        }

        if ($request->ajax() && $request->type == 'branch') {
            return PlacementService::SelectBranchForPlacement($request);
        }

        return view('admin.placement.create')
            ->with([
                'positions' => Position::all(),
            ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlacementRequest $request)
    {
        Gate::authorize('admin');
        PlacementService::StoreEmployeePlacement($request->validated());
        return redirect()->to(route('placement.index'))->with('success', 'Penempatan pegawai selesai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_id)
    {
        Gate::authorize('admin');
        return view('admin.placement.detail')
            ->with(
                [
                    'employee' => EmployeeService::DetailEmployee($employee_id)->get()
                ]
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($placement_id)
    {
        Gate::authorize('admin');

        return view('admin.placement.edit')
            ->with(
                [
                    'placement' => PlacementService::DetailPlacement($placement_id)->get(),
                    'positions' => Position::all(),
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlacementRequest $request, $placement_id)
    {
        Gate::authorize('admin');

        PlacementService::DetailPlacement($placement_id)->UpdatePlacement($request->validated());
        return redirect()->to(route('placement.show', $request->id_pegawai))->with('success', 'Data Penempatan diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('admin');
        abort(403);
        //
    }
}
