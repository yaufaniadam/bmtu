<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Services\EducationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        Gate::authorize('admin');
        EducationService::StoreEducationHistory($request->validated());
        return redirect()->back()->with('success', 'Riwayat pendidikan ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $education_id)
    {
        Gate::authorize('admin');
        $education = EducationService::DetailEducation($education_id)->get();
        return view('educations.edit')->with(
            [
                'user_id' => $user_id,
                'education' => $education,
                'level_of_educations' => [
                    ['value' => 'SMA / Sederajat'],
                    ['value' => 'S1'],
                    ['value' => 'S2'],
                    ['value' => 'S3'],
                ]
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, $user_id, $education_id)
    {
        Gate::authorize('admin');
        EducationService::DetailEducation($education_id)->UpdateEducation($user_id, $request->validated());
        return redirect()->to(route('user.show', $user_id))->with('success', 'Perubahan data riwayat pendidikan selesai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $education_id)
    {
        Gate::authorize('admin');
        EducationService::DetailEducation($education_id)->DeleteEducation();
        return redirect()->to(route('user.show', $user_id))->with('success', 'Perubahan data riwayat pendidikan selesai');
    }
}
