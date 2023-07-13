<?php

namespace App\View\Components;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $employee_name;
    public $employee_photo;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        $this->employee_name = $employee->nama_lengkap;
        $this->employee_photo = $employee->foto;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
