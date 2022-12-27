<?php

namespace App\View\Components\Employee;

use App\Models\Employee;
use App\Models\Family;
use Illuminate\View\Component;

class FamilyMember extends Component
{
    protected $families;
    public $employee_id;
    public $user_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeId)
    {
        $this->employee_id = $employeeId;
        $this->user_id = Employee::findOrFail($employeeId)->user_id;
        $this->families = Family::where('id_pegawai', $employeeId)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee.family-member')
            ->with(
                [
                    'families' => $this->families
                ]
            );
    }
}
