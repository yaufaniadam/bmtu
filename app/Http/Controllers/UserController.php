<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('admin');
        // return UserService::UserIndex($request);

        if ($request->ajax()) {
            return UserService::UserIndex($request);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin');
        return view('admin.users.create')->with(['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('admin');

        UserService::StoreUser($request->validated());

        return redirect()->to(url('user'))->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role != 1 && UserService::DetailUser($id)->get()->id != Auth::id()) {
            abort(403);
        }

        return view('admin.users.detail')
            ->with([
                'user' => UserService::DetailUser($id)->get(),
                'roles' => Role::all()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        if (Auth::user()->role != 1 && UserService::DetailUser($id)->get()->id != Auth::id()) {
            abort(403);
        }

        UserService::DetailUser($id)->UpdateUserProfile($request->validated());
        return redirect()->back()->with('success', 'Perubahan Data Pegawai Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 1 && UserService::DetailUser($id)->get()->id != Auth::id()) {
            abort(403);
        }
        UserService::DetailUser($id)->DeleteUser($id);
        return redirect()->back()->with('success', 'Data pegawai dihapus.');
    }
}
