<?php

namespace App\Services;

use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    public static $user;
    public static $token_exists;

    public static function login($credentials): Bool
    {
        $result = true;
        return $result;
    }

    public static function UserByEmail($email): AuthService
    {
        static::$user = User::where('email', '=', $email)->firstOrFail();
        return new static;
    }

    public static function SendResetPasswordLink(): Void
    {
        $user = static::$user;
        $token = app(PasswordBroker::class)->createToken($user);
        $url = url("reset_password?email=$user->email&token=$token");
        Mail::to($user->email)->send(new ResetPassword($url));
    }

    public static function CheckResetPasswordToken($request)
    {
        $user = static::$user;

        static::$token_exists = app(PasswordBroker::class)->tokenExists($user, $request['token']);

        return new static;
    }

    public static function ResetPassword($request): Void
    {
        $user = static::$user;

        $user->update([
            'password' => Hash::make($request)
        ]);
        app(PasswordBroker::class)->deleteToken($user);
    }

    public static function get()
    {
        return static::$user;
    }

    public static function TokenExists()
    {
        return static::$token_exists;
    }
}
