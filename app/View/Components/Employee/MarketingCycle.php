<?php

namespace App\View\Components\Employee;

use App\Models\Cycle;
use App\Models\FinancingCycle;
use Illuminate\View\Component;

class MarketingCycle extends Component
{
    public $cycles;
    public $financing_cycles;
    public $finished_cycles = [];
    public $current_cycle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($financingId)
    {
        $this->cycles = Cycle::all();

        $this->financing_cycles = FinancingCycle::where('id_laporan_marketing', '=', $financingId)->get();

        $q2 = FinancingCycle::where(
            [
                ['id_laporan_marketing', '=', $financingId],
                ['keterangan', '!=', ''],
            ]
        )->get();

        foreach ($q2 as $cycle) {
            $this->finished_cycles[] = $cycle->id_cycle;
        }

        $this->current_cycle = FinancingCycle::where('id_laporan_marketing', '=', $financingId)->latest()->first();

        // dd($this->current_cycle);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee.marketing-cycle');
    }
}
