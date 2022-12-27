<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Services\CredentialService;
use Illuminate\Http\Request;

class ChangeUserCredentialController extends Controller
{
    public function EditEmail($id)
    {
        dd('form edit email');
    }

    public function UpdateEmail(Request $request, $id)
    {
    }

    public function EditPassword($id)
    {
        return view('users.change-password')->with([
            'user_id' => $id
        ]);
    }

    public function UpdatePassword(UpdatePasswordRequest $request, $user_id)
    {
        CredentialService::DetailUser($user_id)->UpdatePassword($request->validated());
        return redirect()->to(route('user.show', $user_id))->with('success', 'Password berhasil diubah');
    }
}
