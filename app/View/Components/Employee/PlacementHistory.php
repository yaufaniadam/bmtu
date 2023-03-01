<?php

namespace App\View\Components\Employee;

use App\Models\Placement;
use App\Services\PlacementService;
use Illuminate\View\Component;

class PlacementHistory extends Component
{
    public $employee_id;
    public $placements;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeId)
    {
        $this->employee_id = $employeeId;
        $this->placements = Placement::where('id_pegawai', '=', $this->employee_id)->orderBy('tanggal_mulai', 'DESC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        // foreach (Placement::where('id_pegawai', '=', $this->employee_id)->get() as $placement) {
        //     dump($placement->position);
        // }
        // die();
        return view('components.employee.placement-history')
            ->with([
                'placements' => Placement::where('id_pegawai', '=', $this->employee_id)->get()
            ]);
    }
}
