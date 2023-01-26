<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKajianRequest;
use App\Models\Employee;
use App\Services\KajianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KajianController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 1) {
            if ($request->ajax()) {
                return KajianService::kajianIndexJson($request);
            }
            // dd(KajianService::kajiansEmployee());
            return view('kajian.admin.index')
                ->with(
                    [
                        'years' => KajianService::kajiansYear(),
                        'months' => KajianService::kajiansMonth(),
                        'employees' => KajianService::kajiansEmployee(),
                    ]
                );
        }

        $employee_id = Employee::where('user_id', '=', Auth::id())->first()->id;
        return view('kajian.employee.index')
            ->with(
                [
                    'sermons' => KajianService::kajianIndex($employee_id)
                ]
            );
    }

    public function create()
    {
        return view('kajian.employee.create');
    }

    public function store(StoreKajianRequest $request)
    {
        $employee_id = Employee::where('user_id', '=', Auth::id())->first()->id;
        KajianService::storeKajian($request->validated(), $employee_id);
        return redirect()->to(route('kajian.index'));
    }
}
