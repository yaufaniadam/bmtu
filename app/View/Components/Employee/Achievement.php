<?php

namespace App\View\Components\Employee;

use App\Models\Achievement as ModelsAchievement;
use App\Models\Employee;
use Illuminate\View\Component;

class Achievement extends Component
{
    public $achievements;
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
        $this->achievements = ModelsAchievement::where('id_pegawai', $employeeId)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee.achievement');
    }
}
