<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFamilyMemberRequest;
use App\Http\Requests\UpdateFamilyMemberRequest;
use App\Services\FamilyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFamilyMemberRequest $request)
    {
        Gate::authorize('admin');

        FamilyService::StoreFamilyMember($request->validated());
        return redirect()->back()->with('success', 'Anggota Keluarga berhasil ditambahkan.');
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
    public function edit($user_id, $family_member_id)
    {
        Gate::authorize('admin');

        $family_member = FamilyService::DetailFamilyMember($family_member_id)->get();
        return view('families.edit')
            ->with(
                [
                    'user_id' => $user_id,
                    'family_member' => $family_member,
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
    public function update(UpdateFamilyMemberRequest $request, $user_id, $family_member_id)
    {
        Gate::authorize('admin');

        FamilyService::DetailFamilyMember($family_member_id)->UpdateFamilyMember($request->validated());

        return redirect()->to(route('user.show', $user_id))->with('success', 'Data anggota keluarga diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $family_member_id)
    {
        FamilyService::DetailFamilyMember($family_member_id)->DeleteFamilyMember();
        return redirect()->to(route('user.show', $user_id))->with('success', 'Anggota keluarga dihapus.');
    }
}
