<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFinancingCycleRequest;
use App\Services\FinancingCycleService;
use Illuminate\Http\Request;

class FinancingCycleController extends Controller
{
    public function update($financing_cycle_id, UpdateFinancingCycleRequest $request)
    {
        FinancingCycleService::DetailFinancingCycle($financing_cycle_id)->UpdateFinancingCycle($request->validated());
        return redirect()->back();
        // dd($request->all());
    }
}
