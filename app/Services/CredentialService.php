<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CredentialService
{
    public static $user;

    public static function DetailUser($id): CredentialService
    {
        static::$user = User::findOrFail($id);
        return new static;
    }

    public static function get()
    {
        return static::$user;
    }

    public static function UpdatePassword($request)
    {
        $user = static::$user;

        DB::transaction(
            function () use ($user, $request) {
                $user->update(
                    [
                        'password' => Hash::make($request['new_password'])
                    ]
                );
            }
        );
    }
}
