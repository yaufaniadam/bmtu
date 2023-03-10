<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementRequest;
use App\Http\Requests\UpdateAchievementRequest;
use App\Services\AchievementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AchievementController extends Controller
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
    public function store(StoreAchievementRequest $request)
    {
        Gate::authorize('admin');

        AchievementService::StoreAchievement($request->all());
        return redirect()->back()->with('success', 'Prestasi pegawai berhasil ditambahkan');
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
    public function edit($user_id, $achievement_id)
    {
        Gate::authorize('admin');

        $achievement = AchievementService::DetailAchievement($achievement_id)->get();

        return view('achievements.edit')
            ->with([
                'achievement' => $achievement,
                'user_id' => $user_id
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAchievementRequest $request, $user_id, $achievement_id)
    {
        Gate::authorize('admin');

        AchievementService::DetailAchievement($achievement_id)->UpdateAchievement($request->all());
        return redirect()->to(route('user.show', $user_id))->with('success', 'Perubahan data prestasi berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $achievement_id)
    {
        Gate::authorize('admin');

        AchievementService::DetailAchievement($achievement_id)->DeleteAchievement();
        return redirect()->back()->with('success', 'Prestasi dihapus');
    }
}
