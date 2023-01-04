<?php

namespace App\View\Components\Employee;

use App\Models\Cycle;
use Illuminate\View\Component;

class MarketingCycle extends Component
{
    public $cycles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($financingId)
    {
        $this->cycles = Cycle::all();
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
