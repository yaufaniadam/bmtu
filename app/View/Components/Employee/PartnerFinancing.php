<?php

namespace App\View\Components\Employee;

use App\Models\MarketingReport;
use Illuminate\View\Component;

class PartnerFinancing extends Component
{
    public $financing_histories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($partnerId)
    {
        $this->financing_histories = MarketingReport::where('id_mitra_pembiayaan', '=', $partnerId)->paginate(1)->withPath($partnerId);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee.partner-financing');
    }
}
