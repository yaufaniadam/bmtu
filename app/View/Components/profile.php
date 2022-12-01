<?php

namespace App\View\Components;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        return view('components.profile', [
            'employee_name' => $employee->nama_lengkap
        ]);
    }
}
