<?php

namespace App\View\Components;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    public $employee_name;
    public $employee_photo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        $this->employee_name = $employee->nama_lengkap;
        $this->employee_photo = $employee->foto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile');
    }
}
