<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SendPasswordResetRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->to(route('dashboard'));
        }
        return view('login');
    }

    public function AttemptLogin(LoginRequest $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('dashboard'));
        }

        // dd($request->all());
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password yang anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }

    public function PasswordResetForm()
    {
        return view('auth.request-password-reset');
    }

    public function SendPasswordReset(SendPasswordResetRequest $request)
    {
        AuthService::UserByEmail($request->only('email'))->SendResetPasswordLink();
        return redirect()->back()->with('success', 'Link untuk mereset password telah dikirimkan ke email anda.');
    }

    public function ResetPasswordForm(Request $request)
    {
        $validated = $request->validate([
            'email' => ['string'],
            'token' => ['string'],
        ]);

        if (AuthService::UserByEmail($validated['email'])->CheckResetPasswordToken($validated)->TokenExists() == true) {
            return view('auth.reset-password-form')->with([
                'email' => $validated['email'],
                'token' => $validated['token'],
            ]);
        }

        return redirect()->to(route('login'))->with('danger', 'Link sudah kedaluwarsa.');
    }

    public function ResetUserPassword(UpdatePasswordRequest $request)
    {
        AuthService::UserByEmail($request->validated('email'))->CheckResetPasswordToken($request->validated())->ResetPassword($request->validated('new_password'));
        return redirect()->to(route('login'))->with('success', 'Password berhasil diubah, silahkan login kembali.');
    }
}
