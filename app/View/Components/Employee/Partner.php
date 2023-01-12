<?php

namespace App\View\Components\Employee;

use App\Models\MarketingReport;
use Illuminate\View\Component;

class Partner extends Component
{
    public $marketing_reports;
    public $employee_id;
    public $month;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeId, $month = null)
    {
        $this->month = $month;
        $this->employee_id = $employeeId;
        $this->marketing_reports = MarketingReport::where('id_pegawai', '=', $employeeId)
            ->paginate(5)
            ->withPath(route('marketing-reports.show', $employeeId))
            ->withQueryString();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee.partner');
    }
}
