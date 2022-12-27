<?php

namespace App\Services;

use App\Models\Achievement;
use Illuminate\Support\Facades\DB;

class AchievementService
{
    public static $achievement;

    public static function StoreAchievement($request): void
    {
        DB::transaction(
            function () use ($request) {
                Achievement::create(
                    [
                        'id_pegawai' => $request['id_pegawai'],
                        'prestasi' => $request['prestasi'],
                        'tanggal' => $request['tanggal'],
                    ]
                );
            }
        );
    }

    public static function DetailAchievement($id): AchievementService
    {
        static::$achievement = Achievement::findOrFail($id);

        return new static;
    }

    public static function UpdateAchievement($request): Void
    {
        $achievement = static::$achievement;
        DB::transaction(
            function () use ($request, $achievement) {
                $achievement->update(
                    [
                        'prestasi' => $request['prestasi'],
                        'tanggal' => $request['tanggal'],
                    ]
                );
            }
        );
    }

    public static function DeleteAchievement(): Void
    {
        $achievement = static::$achievement;
        DB::transaction(
            function () use ($achievement) {
                $achievement->delete();
            }
        );
    }

    public static function get()
    {
        return static::$achievement;
    }
}
