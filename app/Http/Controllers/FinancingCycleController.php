<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFinancingCycleRequest;
use App\Models\Employee;
use App\Services\FinancingCycleService;
use Exception;
use Illuminate\Http\Request;

class FinancingCycleController extends Controller
{
    public function update($financing_cycle_id, UpdateFinancingCycleRequest $request)
    {
        $employee_id = Employee::where('user_id', '=', auth()->id())->first()->id;
        try {
            FinancingCycleService::DetailFinancingCycle($financing_cycle_id)->UpdateFinancingCycle($request->validated(), $employee_id);
            return redirect()->back();
        } catch (Exception $exception) {
            abort(403);
        }
    }
}
