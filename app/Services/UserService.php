<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public static $user;

    public static function UserIndex($request): JsonResponse
    {
        $model = User::select('users.id', 'users.name')
            ->leftJoin('tr_pegawai', 'tr_pegawai.user_id', '=', 'users.id')
            ->where('users.role', '!=', 1)
            ->with(
                [
                    'employee' => function ($query) {
                        $query->select('user_id', 'nama_lengkap', 'telepon', 'email', 'foto');
                    }
                ]
            )
            ->when(!empty($request->term), function ($q) use ($request) {
                $q->where('tr_pegawai.nama_lengkap', 'like', '%' . $request->term . '%')
                    ->orWhere('tr_pegawai.email', 'like', '%' . $request->term . '%');
            });

        $users = DataTables::eloquent($model)
            ->addColumn('photo', function ($user) {
                return view('datatables.photo')->with(['src' => url('image?file=' . $user->employee->foto)]);
            })
            ->addColumn(
                'detail',
                function ($user) {
                    return view('datatables.link')
                        ->with(
                            [
                                'url' => url('user' . '/' . $user->id),
                                'placeholder' => $user->employee->nama_lengkap
                            ]
                        );
                }
            )
            ->addColumn(
                'photo',
                function ($user) {
                    return view('datatables.photo')
                        ->with(
                            [
                                'src' => url('user' . '/' . $user->id),
                                'placeholder' => $user->employee->nama_lengkap
                            ]
                        );
                }
            )
            ->addColumn(
                'delete',
                function ($user) {
                    return view('datatables.delete-button')
                        ->with(
                            [
                                'user_id' => $user->id
                            ]
                        );
                }
            )
            ->toJson();
        if (empty($users)) {
            return "Belum ada daftar pengguna.";
        }

        return $users;
    }

    public static function StoreUser($request): Void
    {
        DB::transaction(
            function () use ($request) {
                $user_name = explode('@', $request['email']);

                $user = User::create(
                    [
                        'name' => $user_name[0],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                        'role' => $request['role'],
                    ]
                );

                // throw new Exception('error');

                if ($user) {
                    $file = $request['foto'];
                    $fileName = $file->getClientOriginalName();
                    $fileLocation = 'users/photo/' . $user->id . '/';

                    Storage::putFileAs($fileLocation, $file, $fileName);

                    Employee::create(
                        [
                            'user_id' => $user->id,
                            'nama_lengkap' => $request['nama_lengkap'],
                            'jenis_kelamin' => $request['jenis_kelamin'],
                            'nip' => $request['nip'],
                            'email' => $request['email'],
                            'telepon' => $request['telepon'],
                            'nip' => $request['nip'],
                            'alamat' => $request['alamat'],
                            'tempat_lahir' => $request['tempat_lahir'],
                            'tanggal_lahir' => $request['tanggal_lahir'],
                            'foto' => $fileLocation . $fileName
                        ]
                    );
                }
            }
        );
    }

    public static function DetailUser($id): UserService
    {
        static::$user = User::with('employee')->findOrFail($id);
        return new static;
    }

    public static function UpdateUserProfile($request): Void
    {
        $user = static::$user;

        DB::transaction(
            function () use ($request, $user) {
                if (isset($request['role'])) {
                    $user->update(
                        [
                            'role' => $request['role'],
                        ]
                    );
                }

                if (isset($request['status']) == 1) {
                    $user->update(
                        [
                            'status' => 1
                        ]
                    );
                } else {
                    $user->update(
                        [
                            'status' => 0
                        ]
                    );
                }

                $user->employee()
                    ->when(
                        isset($request['foto']),
                        function ($q) use ($request, $user) {

                            if ($user->employee->foto != null) {
                                if (Storage::exists($user->employee->foto)) {
                                    Storage::delete($user->employee->foto);
                                }
                            }

                            $file = $request['foto'];
                            $fileName = $file->getClientOriginalName();
                            $fileLocation = 'users/photo/' . $user->id . '/';
                            Storage::putFileAs($fileLocation, $file, $fileName);

                            $q->update(
                                [
                                    'foto' => $fileLocation . $fileName
                                ]
                            );
                        }
                    )
                    ->update(
                        [
                            'nama_lengkap' => $request['nama_lengkap'],
                            'nama_panggilan' => $request['nama_panggilan'],
                            'jenis_kelamin' => $request['jenis_kelamin'],
                            'tempat_lahir' => $request['tempat_lahir'],
                            'tanggal_lahir' => $request['tanggal_lahir'],
                            'nip' => $request['nip'],
                            'telepon' => $request['telepon'],
                            'alamat' => $request['alamat'],
                        ]
                    );
            }
        );
    }

    public static function DeleteUser()
    {
        $user = static::$user;

        DB::transaction(
            function () use ($user) {
                $user->delete();
            }
        );
    }

    public function get()
    {
        return static::$user;
    }
}
