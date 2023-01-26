<?php

namespace App\Http\Controllers;

use App\Imports\SalaryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($month)
    {
        return view('admin.salary.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $raws = Excel::toArray(new SalaryImport, $request->file_excel);
        $mapped = [];
        foreach ($raws as $key => $value) {
            $index = 0;
            foreach ($value as $key => $value) {
                $number_of_data = count($value);

                $mapped[] = [
                    $value
                ];
                // for ($i = 0; $i < $number_of_data; $i++) {
                // }
            }
        }

        dd($mapped);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
