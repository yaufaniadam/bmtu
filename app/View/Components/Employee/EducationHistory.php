<?php

namespace App\View\Components\Employee;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use Illuminate\View\Component;

class EducationHistory extends Component
{
    public $user_id;
    public $employee_id;
    public $education_histories;
    public $level_of_educations;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeId)
    {
        $this->employee_id = $employeeId;
        $this->user_id = Employee::findOrFail($employeeId)->user_id;
        $this->education_histories = EmployeeEducation::where('id_pegawai', $employeeId)->get();
        $this->level_of_educations = [
            ['value' => 'SMA / Sederajat'],
            ['value' => 'S1'],
            ['value' => 'S2'],
            ['value' => 'S3'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee.education-history')
            ->with(
                [
                    'education_histories' => $this->education_histories
                ]
            );
    }
}
